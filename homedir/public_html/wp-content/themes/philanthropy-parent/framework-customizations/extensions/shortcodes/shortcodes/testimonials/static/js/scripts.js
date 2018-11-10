function testimonialsInit() {
    jQuery('.fw-testimonials').each( function(){
        var slider = jQuery(this).find('.fw-testimonials-list');
        var show_in_slider = slider.attr('data-show-in-slider');
        if(show_in_slider != 'yes'){
            return;
        }

        var slider_id = slider.attr('id');
        var timeoutDuration = parseInt( slider.attr('data-timeoutDuration') );
        var animation = slider.attr('data-animation');
        var play = slider.attr('data-play');
        if(play == 'true') {
            play = true;
        }
        else{
            play = false;
        }

        jQuery('#'+slider_id).carouFredSel({
            swipe: {
                onTouch: true
            },
            next: "#"+slider_id+"-next",
            prev: "#"+slider_id+"-prev",
            pagination: "#"+slider_id+"-controls",
            responsive: true,
            infinite: false,
            items: 1,
            auto: {
                play: play,
                timeoutDuration: timeoutDuration
            },
            scroll: {
                items: 1,
                fx: animation,
                easing: "linear",
                pauseOnHover: true,
                duration: 300
            },
            onCreate : function () {
                slider.parents(".fw-testimonials").removeClass("hide-slider");
            }
        });
    });
}

jQuery(document).ready(function () {
    testimonialsInit();
});

jQuery(window).load(function(){
    testimonialsInit();
});

jQuery(window).resize(function(){
    testimonialsInit();
});