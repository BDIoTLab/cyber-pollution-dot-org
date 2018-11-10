jQuery(document).ready(function ($) {
    "use strict";

    var $ = jQuery;
    // start easy slider
    jQuery('.fw-easy-slider').each( function(){
        var easySlider = jQuery(this).find('.fw-easy-slider-container');
        var slider_id  = easySlider.attr('id');
        var play = easySlider.attr('data-play');
        if(play == 'true') {
            play = true;
        }
        else{
            play = false;
        }
        var interval = parseInt( easySlider.attr('data-slides-interval') );

        function slideTitle(item) {
            var title = item.children(".fw-easy-slider-title").clone();
            $('#'+slider_id+'-title ').html(title);
        }

        easySlider.carouFredSel({
            swipe: {
                onTouch: true
            },
            next: "#"+slider_id+"-next",
            prev: "#"+slider_id+"-prev",
            pagination: "#"+slider_id+"-controls",
            infinite: true,
            responsive: true,
            width: '100%',
            height: 'variable',
            items: {
                visible: 1,
                height: 'variable'
            },
            auto: {
                play: play,
                timeoutDuration: interval,
                pauseOnHover: false,
                progress: {
                    bar: '#'+slider_id+'-timer',
                    interval: 1
                }
            },
            scroll: {
                items: 1,
                fx: "crossfade",
                onBefore: function (data) {
                    slideTitle(data.items.visible);
                }
            },
            onCreate: function (data) {
                easySlider.parents('.fw-easy-slider').removeClass("hide-elements");
                slideTitle(data.items);
            }
        });
    });
});