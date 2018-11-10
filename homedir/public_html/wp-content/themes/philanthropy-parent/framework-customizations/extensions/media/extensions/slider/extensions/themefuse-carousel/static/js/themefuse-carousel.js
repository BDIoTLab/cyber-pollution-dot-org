jQuery(document).ready(function ($) {
    "use strict";

    var $ = jQuery;
    // start themefuse carousel
    start_themefuse_slider();
    themefuse_carusel_description();
});

function start_themefuse_slider(){
    jQuery('.fw-themefuse-carousel-wrapper').each(function (){
        var themefuse_carousel = jQuery(this).find('.themefuse-slider-items');
        var slider_id = themefuse_carousel.attr('id');
        var play = themefuse_carousel.attr('data-play');
        if(play == 'true') {
            play = true;
        }
        else{
            play = false;
        }
        var interval = parseInt( themefuse_carousel.attr('data-slides-interval') );
        themefuse_carousel.carouFredSel({
            swipe: {
                onTouch: true
            },
            next: "#"+slider_id+"-next",
            prev: "#"+slider_id+"-prev",
            auto: {
                play: play,
                timeoutDuration: interval
            },
            circular: true,
            infinite: true,
            width: '100%',
            scroll: {
                items: 1,
                easing: "swing"
            }
        });
    });
}

function themefuse_carusel_description(){
    var screenRes = jQuery(window).width();
    jQuery('.fw-themefuse-carousel-wrapper').each(function (){
        var themefuse_carousel = jQuery(this).find('.themefuse-slider-items');
        if (screenRes > 480) {
            var item_width = themefuse_carousel.find('li').width();
            var parent_width = themefuse_carousel.parent().width();
            var left = parent_width % item_width / 2 + item_width;
            themefuse_carousel.parent().parent('.fw-themefuse-carousel').find('.fw-themefuse-carousel-control').css('left', left);
        }
        else {
            themefuse_carousel.parent().parent('.fw-themefuse-carousel').find('.fw-themefuse-carousel-control').css('left', '');
        }

        themefuse_carousel.find( '.lazyloaded' ).each(function() {
            lazySizes.loader.unveil(this);
        });
    });
}

// resize themefuse slider
jQuery(window).resize(function() {
    start_themefuse_slider();
    themefuse_carusel_description();
});