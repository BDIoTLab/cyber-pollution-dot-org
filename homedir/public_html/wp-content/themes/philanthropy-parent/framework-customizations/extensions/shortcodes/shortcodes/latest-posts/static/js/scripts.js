jQuery(document).ready(function () {

	theCorePostsMatchHeight();

	// parse on ready and hide load more button
	jQuery('.fw-js-load-more-posts .fw-btn').each(function () {
		var this_button = jQuery(this),
			page        = jQuery(this).parents('.fw-shortcode-latest-posts').attr('data-page'),
			max_pages   = jQuery(this).parents('.fw-shortcode-latest-posts').data('max-pages');

		// here need ">", because default page is 2 and if you have 4 posts / 2 per page then page=2 and max_pages=2
		if (page > max_pages) {
			this_button.parents('.fw-js-load-more-posts').hide();
		}
	});

	jQuery('.fw-js-load-more-posts').on('click', '.fw-btn', function (e) {
		e.preventDefault();
		var this_button    = jQuery(this),
			page           = jQuery(this).parents('.fw-shortcode-latest-posts').attr('data-page'),
			blog_type      = jQuery(this).parents('.fw-shortcode-latest-posts').data('blog-type'),
			posts_per_page = jQuery(this).parents('.fw-shortcode-latest-posts').data('posts-per-page'),
			max_pages      = jQuery(this).parents('.fw-shortcode-latest-posts').data('max-pages'),
			category       = jQuery(this).parents('.fw-shortcode-latest-posts').data('category'),
			blog_view      = jQuery(this).parents('.fw-shortcode-latest-posts').data('blog-view'),
			columns        = jQuery(this).parents('.fw-shortcode-latest-posts').data('columns'),
			extra          = jQuery(this).parents('.fw-shortcode-latest-posts').data('extra');

		var data = "action=the_core_ajax_get_shortcode_posts&max_pages=" + max_pages + '&blog_type=' + blog_type + '&blog_view=' + blog_view + '&columns=' + columns + '&posts_per_page=' + posts_per_page + '&category=' + category + '&page=' + page + '&extra=' + extra;
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
					this_button.parents('.fw-js-load-more-posts').before(obj.html);
				}

				if ( this_button.parents('.fw-shortcode-latest-posts').hasClass("postlist-grid") && this_button.parents('.fw-shortcode-latest-posts').hasClass("fw-portfolio-masonry-on") ) {
					var $container = this_button.parents('.postlist-grid');
					$container.isotope('reloadItems');
					$container.isotope({
						itemSelector: '.postlist-col'
					});
				}
				else {
					theCorePostsMatchHeight();
				}

				if( page >= max_pages ) {
					this_button.parents('.fw-js-load-more-posts').hide();
				}

				this_button.parents('.fw-shortcode-latest-posts').attr('data-page', parseInt(page) + 1);
			}
		});

		return false;
	});
});


function theCorePostsMatchHeight() {
  if (jQuery('.fw-portfolio-masonry-off').length > 0) {
    $.fn.matchHeight._maintainScroll = true;
    jQuery('.fw-portfolio-masonry-off').each(function () {
      jQuery(this).find('article').matchHeight({
        byRow: true,
        property: 'height',
        target: null,
        remove: false
      });
    });
  }
}

