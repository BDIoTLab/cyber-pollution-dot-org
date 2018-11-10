jQuery(document).ready(function ($) {
    "use strict";

    var $ = jQuery,
        screenRes = $(window).width();

    // start image-video slider
    jQuery('.fw-image-video-slider').each( function() {
        var animateClass;
        var slider = jQuery(this).find('.carousel');
        var slider_id = slider.attr('id');
        var interval = parseInt(slider.attr('data-slides-interval'));
        var first_image = slider.find('.fw-first-slider-image').attr('data-image'),
            animationEnd = 'webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend';

        jQuery('.' + slider_id).prepend('<iframe src="' + first_image + '" alt="" class="testimage hidden"></iframe>');
        jQuery('.testimage').load(function () {
            jQuery('.fw-wrap-image-slider.' + slider_id + ' .spinner, .' + slider_id + ' .testimage').remove();
            jQuery('.' + slider_id).removeClass('invisible').addClass('animated fadeIn');

            slider.parents('.fw-wrap-image-slider.animated').one(animationEnd, function() {
                $(this).addClass('fill-mode-none');
            });
            if( slider.parents('.fw-wrap-image-slider').find('.animated').not('.fw-media-wrap .video').length > 0 ) {
                slider.parents('.fw-wrap-image-slider').find('.animated').not('.fw-media-wrap .video').one(animationEnd, function() {
                    $(this).addClass('fill-mode-none');
                });
            }
        });

        slider.carousel({
            interval: interval,
            pause: 'none'
        });

        // Animation Element Slider
        slider.find('[data-animate-in]').addClass('animated');

        var animateSlide = function() {
            slider.find('.item').removeClass('current');

            slider.find('.active').addClass('current').find('[data-animate-in]').each(function () {
                var $this = jQuery(this);
                animateClass = $this.data('animate-in');
                $this.addClass(animateClass)
            });

            slider.find('.active').find('[data-animate-out]').each(function () {
                var $this = jQuery(this);
                animateClass = $this.data('animate-out');
                $this.removeClass(animateClass)
            });
        };

        var animateSlideEnd = function() {
            slider.find('.active').find('[data-animate-in]').each(function () {
                var $this = jQuery(this);
                animateClass = $this.data('animate-in');
                $this.removeClass(animateClass);
            });
            slider.find('.active').find('[data-animate-out]').each(function () {
                var $this = jQuery(this);
                animateClass = $this.data('animate-out');
                $this.addClass(animateClass)
            });
        };

        slider.find('.invisible').removeClass('invisible');
        animateSlide();

        slider.on('slid.bs.carousel', function () {
            animateSlide();
            // Disable animation fill mode if exist video
            if( slider.find('.fw-media-wrap .video').length > 0 ) {
                slider.find('.fw-media-wrap .video').one(animationEnd, function() {
                    $(this).addClass('fill-mode-none');
                });
            }
        });
        slider.on('slide.bs.carousel', function () {
            animateSlideEnd();
            // Disable animation fill mode if exist video
            if( slider.find('.fw-media-wrap .video').length > 0 ) {
                slider.find('.fw-media-wrap .video').one(animationEnd, function() {
                    $(this).removeClass('fill-mode-none');
                });
            }
        });

        if (Modernizr.touch) {
            slider.find('.carousel-inner').swipe({
                swipeLeft: function () {
                    jQuery(this).parent().carousel('prev');
                },
                swipeRight: function () {
                    jQuery(this).parent().carousel('next');
                },
                threshold: 30
            })
        }

        // Deactivation slider cycle for mobile
        if(screenRes < 1199){
            slider.carousel('pause');
            slider.on('slid.bs.carousel', function () {
                $(this).carousel('pause');
            });
            slider.on('slide.bs.carousel', function () {
                $(this).carousel('pause');
            });
        }

        // Call function for item height calculate
        // Call function for change position for text
        if(screenRes < 768){
            imageSliderSetItemHeight(slider);

            $(window).on('resize', function () {
                slider.find('.item').css('height', 'auto');
                imageSliderSetItemHeight(slider);
            });
        }

        sliderChangeTextPosition(slider, screenRes);
        $(window).on('resize', function () {
            screenRes = $(window).width();
            sliderChangeTextPosition(slider, screenRes);
        });

        //Image video slider Full width Indicators
        var height_li_indicator = 0,
            height_indicator = 0,
            slider_full = jQuery(".fw-wrap-fade-slider");

        slider_full.parent('.fw-col-inner').parent(".fw-col-sm-12").parent(".fw-row").css('display', 'block');
        slider_full.parent('.fw-col-inner').parent(".fw-col-sm-12").parent(".fw-row").parent(".fw-container-fluid").css('display', 'block');

        jQuery('.fw-wrap-image-slider .carousel-indicators li').each(function () {
            height_li_indicator += jQuery(this).outerHeight();
            height_indicator = jQuery('.fw-wrap-image-slider .carousel-indicators').css('height', height_li_indicator).outerHeight();
            jQuery('.fw-wrap-image-slider .carousel-indicators').css('margin-top', -(height_indicator / 2));
        });
    });
});

$(window).load(function () {
    "use strict";

    // Stop video
    jQuery('.carousel').on('slide.bs.carousel', function () {
        jQuery(this).find('.item.active .video iframe').each(function () {
            var $theSource = $(this).attr('src');
            $(this).attr('src', $theSource); //reset the video so it
        })
    });

    videoDetectIframeClick();
});

// Detect Click in Iframe
function videoDetectIframeClick() {
    var overiFrame = -1;
    jQuery('.carousel').find('iframe').hover(function () {
        overiFrame = 1;
    }, function () {
        overiFrame = -1
    });
    jQuery(window).on('blur', function () {
        if (overiFrame != -1) {
            jQuery('.carousel').carousel('pause');
        }
    });
    jQuery('.carousel-control, .carousel-indicators li').click(function () {
        jQuery('.carousel').carousel('cycle');
    });
}

// Set height slide for mobile screen
function imageSliderSetItemHeight(slider) {
    var totalSlideHeight = 0;
    slider.find('.item').each(function(){
        var itemHeight = $(this).outerHeight();

        if (itemHeight > totalSlideHeight) {
            totalSlideHeight = itemHeight;
        }
    });
    slider.find('.item').css({'height': totalSlideHeight});
}

// Change HTML for mobile (first image before text)
function sliderChangeTextPosition(slider, screenRes){
    slider.find('.fw-image-video-slider-text-left').each( function(){
        if(screenRes < 768) {
            jQuery(this).find('.fw-text-wrap').insertAfter(jQuery(this).find('.fw-media-wrap'));
        }
        else{
            jQuery(this).find('.fw-text-wrap').insertBefore(jQuery(this).find('.fw-media-wrap'));
        }
    });
}