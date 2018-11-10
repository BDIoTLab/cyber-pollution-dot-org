/* globals jQuery, ajaxurl */
(function($){
	$(document).on('ready', function(){
		$('div.notice.is-dismissible[data-source="fw-themefuse-update"] button.notice-dismiss').on('click',  function(){
			$.ajax({
				type: 'POST',
				url: ajaxurl,
				data: {
					action: 'fw_ext_themefuse_update_dismiss_notice',
					notice_id: $(this).closest('div.notice').attr('id')
				}
			});
		});
	});
})(jQuery);
