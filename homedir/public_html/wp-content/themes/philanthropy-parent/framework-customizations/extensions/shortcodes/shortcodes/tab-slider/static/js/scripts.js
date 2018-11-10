jQuery(document).ready( function(){
    var $ = jQuery;

    $(".fw-tabs-slider").each( function(){
        var tabSlider_id = $(this).data('id'),
            tabSlider = $("#"+tabSlider_id),
            tabSliderWrap = tabSlider.parents('.fw-tabs-slider'),
            itemNumber;

        // if number of item <=1 then loop option disable
        if( tabSlider.find('.item').length <= 1){
            itemNumber = false;
            tabSliderWrap.find('.fw-tabs-slider-nav').css('display', 'block');
        }
        else {
            itemNumber = true
        }

        // call & set option for carousel
        tabSlider.owlCarousel({
            loop: itemNumber,
            dotsContainer: tabSliderWrap.find(".fw-tabs-slider-nav"),
            items: 1
        });

        // navigation
        tabSliderWrap.find('.owl-dot').on('click', function () {
            tabSlider.trigger('to.owl.carousel', [$(this).index(), 300]);
        });
    });
});