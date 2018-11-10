jQuery(document).ready(function ($) {
    "use strict";

    var $ = jQuery;
    // start carousel sliders
    jQuery('.fw-easy-carousel').each(function () {
        var slider = jQuery(this).find('.fw-easy-carousel-items');
        var slider_id = slider.attr('id');
        var play = slider.attr('data-play');
        if(play == 'true') {
            play = true;
        }
        else{
            play = false;
        }
        var interval = parseInt( slider.attr('data-slides-interval') );

        // Add active class for visible item
        var visibleItem = function () {
            var $this = $('#' + slider_id);
            var items = $this.triggerHandler("currentVisible");   // Get all visible items
            items.addClass("active");
        }

        // Initialization the carousel
        $('#' + slider_id).carouFredSel({
            swipe: {
                onTouch: true
            },
            next: "#" + slider_id + "-next",
            prev: "#" + slider_id + "-prev",
            auto: {
                play: play,
                timeoutDuration: interval
            },
            circular: true,
            infinite: true,
            width: '100%',
            height: 'variable',
            scroll: {
                items: 1,
                easing: "swing",
                height: 'variable',
                onAfter: visibleItem
            },
            onCreate: visibleItem
        });

        // Positioning the navigation carousel (next & prev)
        function easyCarouselNavPosition() {
            var widthCarouselItem = parseInt($('#' + slider_id + ' li').width());         // Calculate width carousel container
            var carouselItemActive = $('#' + slider_id + ' li.active').length;            // Calculate carousel how many item is active

            var totalWidth = widthCarouselItem * carouselItemActive,                                     // Calculate total width for carousel
                easyCarouselWrap = $('#' + slider_id),                               // Carousel wrapper
                carouselPosition = easyCarouselWrap.position(),                                          // Calculate carousel left position
                widthCarouselNav = $('#' + slider_id + '-prev').outerWidth(),
                carousel_nav_left = carouselPosition.left,                                               // Calculate position for nav left
                carousel_nav_right = (carousel_nav_left + totalWidth) - widthCarouselNav;                // Calculate position for nav right

            $('.fw-easy-carousel .prev').css({
                'left': carousel_nav_left         // Set position for nav left
            })
            $('.fw-easy-carousel .next').css({
                'left': carousel_nav_right       // Set position for nav left
            })
        }

        easyCarouselNavPosition();
    });
});