( function ($) {
	$(document).ready(function () {

        var _to_ascii = {
            '188': '44',
            '109': '45',
            '190': '46',
            '191': '47',
            '192': '96',
            '220': '92',
            '222': '39',
            '221': '93',
            '219': '91',
            '173': '45',
            '187': '61', //IE Key codes
            '186': '59', //IE Key codes
            '189': '45'  //IE Key codes
        };

        var shiftUps = {
            "96": "~",
            "49": "!",
            "50": "@",
            "51": "#",
            "52": "$",
            "53": "%",
            "54": "^",
            "55": "&",
            "56": "*",
            "57": "(",
            "48": ")",
            "45": "_",
            "61": "+",
            "91": "{",
            "93": "}",
            "92": "|",
            "59": ":",
            "39": "\"",
            "44": "<",
            "46": ">",
            "47": "?"
        };

		fwEvents.on('fw:options:init', function (data) {
			setTimeout(function () {
				data.$elements.find('.fw-option-tf-animation-option-type select:not(.initialized)').each(function () {

                    $(this).selectize({
                        onChange: function (selected) {


                            this.$wrapper.find('input[type="text"]').attr('data-fw-pressed-backspace', 'false');
                        },
                        onInitialize: function(){
                            var self = this;
                            this.$wrapper.find('input[type="text"]').attr('data-fw-pressed-backspace', 'false');
                            this.$wrapper.find('input[type="text"]').on('keydown', function(e){
                                if(e.keyCode === 40) {
                                    $(this).attr('data-fw-pressed-backspace', 'true');
                                }else{
                                    if($(this).attr('data-fw-pressed-backspace') == 'false'){

                                        self.clear(true);

                                        var c = e.which;

                                        if (_to_ascii.hasOwnProperty(c)) {
                                            c = _to_ascii[c];
                                        }

                                        if (!e.shiftKey && (c >= 65 && c <= 90)) {
                                            c = String.fromCharCode(c + 32);
                                        } else if (e.shiftKey && shiftUps.hasOwnProperty(c)) {
                                            c = shiftUps[c];
                                        } else {
                                            c = String.fromCharCode(c);
                                        }
                                        $(this).val(c);

                                        $(this).attr('data-fw-pressed-backspace', 'true');
                                    }
                                }

                            });
                        }
					}).addClass('initialized');
                    $(this).trigger('selectizeLoaded', [$(this)[0].selectize]);
				});
			}, 1500);
		});
	});
}(jQuery));