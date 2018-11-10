jQuery(document).ready(function ($) {
	"use strict";

	// Masonry for gallery shortcode type 5
	if ($('.fw-gallery-type5').length > 0) {
		var $gridcontainer = $('.fw-gallery-type5');
		$gridcontainer.masonry({
			percentPosition: true,
			itemSelector: '.fw-gallery-item-wrap',
			columnWidth: '.grid-sizer'
		});
	}
});

