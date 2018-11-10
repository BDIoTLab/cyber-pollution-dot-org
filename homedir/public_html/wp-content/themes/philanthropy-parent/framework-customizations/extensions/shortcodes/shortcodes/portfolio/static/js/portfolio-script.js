jQuery(document).ready(function ($) {
    "use strict";

    var portfolio_filter = jQuery('.portfolio_filter');
    if (portfolio_filter.length > 0) {
        portfolio_filter.each(function () {
            var filter  = jQuery(this);
            var isotope = jQuery(this).attr('data-isotope');
            var list_id = jQuery(this).attr('data-list-id');

            if (isotope != '1') {
                return;
            }

            /*var columns_number = parseInt( jQuery('#' + list_id).attr('data-columns-number') );
            var gutter = 1;
            if( columns_number == 3) {
                gutter = 2;
            }*/

            jQuery('#' + list_id).isotope({
                itemSelector: 'li.fw-portfolio-list-item',
                transitionDuration: '0.6s',
                layoutMode: 'moduloColumns'
                /*moduloColumns: {
                    columnWidth: columns_number,
                    gutter: gutter
                }*/
            });

            filter.on('click', '.categories-item', function (e) {
                e.preventDefault();
                jQuery('.categories-item').removeClass('active');
                jQuery(this).addClass('active');

                var option = jQuery(this).data('category'),
                    search = option ? function () {
                        var item = jQuery(this),
                            name = item.data('category') ? item.data('category') : '';
                        return name.match(new RegExp('\\b' + option + '\\b'));
                    } : '*';

                jQuery('#' + list_id).isotope({filter: search});
            });
        });
    }
    else {
        /* portfolio without filter */
        var fw_portfolio_list = jQuery('.fw-portfolio-list');

        fw_portfolio_list.each(function () {
            var list_id = jQuery(this).attr('id');
            jQuery('#' + list_id).isotope({
                itemSelector: 'li',
                transitionDuration: '0.6s',
                layoutMode: 'moduloColumns'
            });
        });
    }

    /* Click on item and change window location */
    checkClickPortfolio()

	/* parse on ready and hide load more button */
	jQuery('.fw-js-load-more-projects .fw-btn').each(function () {
		var this_button = jQuery(this),
			page        = jQuery(this).parents('.fw-portfolio').attr('data-page'),
			max_pages   = jQuery(this).parents('.fw-portfolio').data('max-pages');

		// here need ">", because default page is 2 and if you have 4 posts / 2 per page then page=2 and max_pages=2
		if( page > max_pages ) {
			this_button.parents('.fw-js-load-more-projects').hide();
		}
	});

	/* Load more projects */
	jQuery('.fw-js-load-more-projects').on('click', '.fw-btn', function (e) {
		e.preventDefault();
		var this_button    = jQuery(this),
			page           = jQuery(this).parents('.fw-portfolio').attr('data-page'),
			type           = jQuery(this).parents('.fw-portfolio').data('type'),
			posts_per_page = jQuery(this).parents('.fw-portfolio').data('posts-per-page'),
			max_pages      = jQuery(this).parents('.fw-portfolio').data('max-pages'),
			category       = jQuery(this).parents('.fw-portfolio').data('category'),
			extra          = jQuery(this).parents('.fw-portfolio').data('extra');

		var data = "action=the_core_ajax_get_shortcode_portfolio&type=" + type + '&posts_per_page=' + posts_per_page + '&category=' + category + '&page=' + page + '&extra=' + extra;
		jQuery.ajax({
			type: "POST",
			url: FwPhpVars.ajax_url,
			data: data,
			success: function (rsp) {
				//console.log(rsp);
				if ( typeof rsp == 'object' ) {
					var obj = rsp;
				}
				else {
					var obj = jQuery.parseJSON(rsp);
				}

				if ( obj.html != '' ) {
					this_button.parents('.fw-portfolio').find('.fw-portfolio-list li:last-child').after(obj.html);
				}

				var container = jQuery( '#' + this_button.parents('.fw-portfolio').find('.fw-portfolio-list').attr('id') );

				container.isotope('reloadItems');
				container.isotope({
					itemSelector: 'li',
					transitionDuration: '0.6s',
					layoutMode: 'moduloColumns'
				});

				start_prettyphoto();
        checkClickPortfolio();

				if( page >= max_pages ) {
					this_button.parents('.fw-js-load-more-projects').hide();
				}

				this_button.parents('.fw-portfolio').attr('data-page', parseInt(page) + 1);
			}
		});

		return false;
	});
});

function checkClickPortfolio() {
  if (jQuery('.fw-portfolio-1').length) {
    jQuery('.fw-portfolio-1 .fw-block-image-child').on('click', function () {
      var detectHref = $(this).data('portfolio-href');
      window.location.href = detectHref;
    });
  }
}
