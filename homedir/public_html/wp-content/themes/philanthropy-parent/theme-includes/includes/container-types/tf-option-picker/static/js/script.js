(function ($, fwEvents) {
	var optionTypeClass = '.fw-container-type-tf-option-picker';
	fwEvents.on('fw:options:init', function (data) {
		data.$elements.find(optionTypeClass + ':not(.initialized)').each(function () {
			var container = $(this);
			var picker = container.find('.picker *[data-type=picker]');
			var showOption = function (id) {
				container
					.find('.options .fw-backend-option')
					.removeClass('tf-options-picker-visible');
				container
					.find(".options .fw-backend-option[id$='" + id + "']")
					.addClass('tf-options-picker-visible');
			};
			showOption(picker.data('value'));

			picker.on('change', function (e) {
				picker.data('value', $(e.target).val());
				showOption($(e.target).val());
			});
		}).addClass('initialized');
	});
})(jQuery, fwEvents);