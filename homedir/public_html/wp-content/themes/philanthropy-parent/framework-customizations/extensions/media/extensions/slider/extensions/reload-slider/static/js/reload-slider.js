jQuery(document).ready(function ($) {
    "use strict";

    // start reload slider
    reloadSliderInit();
});
function reloadSliderInit() {
    jQuery('.fw-reload-slider').each(function (){
        var reload_slider = jQuery(this).find('.slider-items');
        var slider_id = reload_slider.attr('id');
        var play = reload_slider.attr('data-play'),
            screenRes = $(window).width();

        if(play == 'true') {
            play = true;
        }
        else{
            play = false;
        }

        if(screenRes < 767){
            play = false;
        }
        var interval = parseInt( reload_slider.attr('data-slides-interval') );
        jQuery('#'+slider_id).carouFredSel({
            swipe : {
                onTouch: true
            },
            next : "#"+slider_id+"-next",
            prev : "#"+slider_id+"-prev",
            pagination : "#"+slider_id+"-controls",
            infinite: false,
            width: "100%",
            items: 1,
            auto: {
                play: play,
                timeoutDuration: interval
            },
            scroll: {
                items : 1,
                fx: "crossfade",
                easing: "linear",
                pauseOnHover: true,
                duration: 300
            }
        });

        sliderSetItemHeight(reload_slider);

        var rControlsWidth = jQuery('#'+slider_id+'-controls').outerWidth();
        jQuery('#'+slider_id+'-controls').css('margin-left' , -rControlsWidth/2);
    });

}
// Set height slider
function sliderSetItemHeight(reload_slider) {
    var totalSlideHeight = 0,
        parentContainerWidth = reload_slider.parents('.fw-container, fw-container-fluid').width(),
        parentContainerMobileWidth = reload_slider.parents('.fw-container, fw-container-fluid').outerWidth(),
        screenRes = $(window).width();

    reload_slider.find('li').each(function(){
        var itemHeight = $(this).outerHeight();
        $(this).addClass('item');

        if (itemHeight > totalSlideHeight) {
            totalSlideHeight = itemHeight;
        }
    });
    reload_slider.find('.item').css({
        'width'  : parentContainerWidth,
        'height' : totalSlideHeight
    });
    if(screenRes < 479){
        reload_slider.find('.item').css({
            'width'  : parentContainerMobileWidth
        });
    }
}
// resize reload slider
jQuery(window).resize(function() {
    reloadSliderInit();
});