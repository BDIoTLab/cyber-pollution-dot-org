/*jQuery(document).ready(function () {
	jQuery(".flickr_badge_image a").attr('target', '_blank');
	jQuery('.fw-wrap-flickr ul div').wrap('<li></li>');
});*/

/*
* jQuery Flickr Photoset
* https://github.com/hadalin/jquery-flickr-photoset
*
* Copyright 2014, Primož Hadalin
*
* Licensed under the MIT license:
* http://www.opensource.org/licenses/MIT
*/

;(function ($, window, document, undefined) {

    'use strict';

    var pluginName = "flickr",
        defaults = {
            apiKey: "",
            photosetId: "",
            errorText: "Error generating gallery.",
            loadingSpeed: 38,
            photosLimit: 100
        },
        apiUrl = 'https://api.flickr.com/services/rest/',
        photos = [];

    // The actual plugin constructor
    function Plugin(element, options) {
        this.element = $(element);
        this.settings = $.extend({}, defaults, options);
        this._defaults = defaults;
        this._name = pluginName;

        this._printError = function() {
            this.element.find('.gallery-container').append($("<div></div>", { "class": "col-lg-12 col-lg-offset-1" })
                .append($("<div></div>", { "class": "error-wrapper" })
                    .append($("<span></span>", { "class": "label label-danger error" })
                        .html(this.settings.errorText))));
        };

        this._printGallery = function(photos) {
            var element = this.element.find('.gallery-container');
            var count = 0;
            var numberPhotos = this.settings.numberPhotos;
            $.each(photos, function(key, photo) {
                if(count == numberPhotos) {
                    return;
                }
                var img = $('<img>', { 'class': 'flickr-image', src: photo.thumbnail });
                element.append($('<div></div>', { 'class': ' flickr_badge_image' })
                    .append($('<a></a>', { target: '_blank', title: photo.title, href: photo.href}).append(img)));
                count++;
            });

            element.imagesLoaded()
                .done($.proxy(this._flickrAnimate, this));
        };

        this._flickrPhotoset = function(photoset) {
            var _this = this;
            var photo_array = [];
            var item = {};
            photos[photoset.id] = [];
            $.each(photoset.photo, function(key, photo) {
                // Limit number of photos.
                if(key >= _this.settings.photosLimit) {
                    return false;
                }

                item = photos[photoset.id][key] = {
                    thumbnail: 'https://farm' + photo.farm + '.static.flickr.com/' + photo.server + '/' + photo.id + '_' + photo.secret + '_q.jpg',
                    href: 'https://farm' + photo.farm + '.static.flickr.com/' + photo.server + '/' + photo.id + '_' + photo.secret + '_b.jpg',
                    title: photo.title
                };
                photo_array.push(item);
            });
            this._printGallery(photos[photoset.id]);

            // ajax requet to save flickr photos in db
            var photos_send = JSON.stringify({photos: photo_array});
            jQuery.ajax({
                type: "POST",
                url: FwPhpVars.ajax_url,
                dataType: 'json',
                data: { action : '_the_core_action_ajax_save_flickr_photos', photos: photos_send, photosetId: this.settings.photosetId, numberPhotos: this.settings.numberPhotos },
                success: function(rsp){
                    if( typeof rsp == 'object' ) {
                        var obj = rsp;
                    }
                    else {
                        var obj = jQuery.parseJSON(rsp);
                    }

                    // if need some verifications
                    if(obj['success']){
                        // is true
                    }
                    else{
                        // is false
                    }
                }
            });
        };

        this._onFlickrResponse = function(response) {
            if(response.stat === "ok") {
                 this._flickrPhotoset(response.photoset);
            }
            else {
                this._printError();
            }
        };

        this._flickrRequest = function(method, data) {
            var url = apiUrl + "?format=json&jsoncallback=?&method=" + method + "&api_key=" + this.settings.apiKey;

            $.each(data, function(key, value) {
                url += "&" + key + "=" + value;
            });
            //console.log(url);

            $.ajax({
                dataType: "json",
                url: url,
                context: this,
                success: this._onFlickrResponse
            });
        };

        this._flickrInit = function () {
            this._flickrRequest('flickr.photosets.getPhotos', {
                photoset_id: this.settings.photosetId
            });
        };

        // Init
        this.init();
    }

    Plugin.prototype = {
        init: function () {
            this._flickrInit();
        }
    };

    // Wrapper
    $.fn[pluginName] = function (options) {
        this.each(function () {
            if (!$.data(this, "plugin_" + pluginName)) {
                $.data(this, "plugin_" + pluginName, new Plugin(this, options));
            }
        });

        // Chain
        return this;
    };

})(jQuery, window, document);

var flickr_gallery = jQuery('.flickr-gallery-js');
if(flickr_gallery.length > 0){
    flickr_gallery.each(function() {
        var API_KEY      = jQuery(this).attr('data-api-key');
        var Album_ID     = jQuery(this).attr('data-album-id');
        var numberPhotos = jQuery(this).attr('data-photo-number');
        // start gallery
        jQuery(this).flickr({
            apiKey: API_KEY,
            photosetId: Album_ID,
            numberPhotos: numberPhotos
        });
    });
}
