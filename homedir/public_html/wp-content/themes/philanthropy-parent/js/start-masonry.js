jQuery(document).ready(function ($) {
    "use strict";

    var $ = jQuery;

    // masonry grid view
    if ( $(".postlist").hasClass("postlist-grid") ) {
        var $gridcontainer = $('.postlist-grid');
        $gridcontainer.isotope({
            itemSelector: '.postlist-col'
        });
    }

    // portfolio masonry
    if ( $(".fw-portfolio-list").length > 0 ) {
        var $gridcontainer = $('.fw-portfolio-list');
        $gridcontainer.masonry({
            itemSelector: 'li.fw-portfolio-list-item'
        });

        // Click on item and change window location
        if(jQuery('.fw-portfolio-1').length) {
            jQuery('.fw-portfolio-1 .fw-block-image-child').on('click', function(){
                var detectHref = $(this).data('portfolio-href');
                window.location.href = detectHref;
            });
        }
    }

    // Woocommerce Related Products
    if ( $(".has-sidebar .related.products").length > 0 ) {
        var $gridcontainer = $('ul.products');
        $gridcontainer.masonry({
            itemSelector: 'li'
        });
    }
});