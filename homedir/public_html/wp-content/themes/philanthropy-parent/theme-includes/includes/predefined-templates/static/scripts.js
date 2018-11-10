(function ($, fwe, _, localized) {
	$(document.body).on('fw:option-type:builder:init', function(e, data) {
		if (data.type !== 'page-builder') {
			return;
		}

		var prefix = 'tf-theme-';
		var inst = {
			$el: {
				builder: $(e.target),
				tooltipContent: $('<div class="'+ prefix +'pred-tpl-tooltip-content"></div>'),
				tooltipLoading: $(
					'<div class="'+ prefix +'pred-tpl-tooltip-loading">'+
					/**/'<div class="loading-icon fw-animation-rotate-reverse-180 unycon unycon-unyson-o"></div>'+
					'</div>'
				),
				headerTools: data.$headerTools
			},
			builder: data.builder,
			isBusy: false,
			tooltipLoading: {
				show: function() {
					inst.$el.tooltipContent.prepend(inst.$el.tooltipLoading);
				},
				hide: function() {
					inst.$el.tooltipLoading.detach();
				}
			},
			tooltipApi: null, // initialized below
			refresh: function() {
				if (this.isBusy) {
					console.log('Working... Try again later');
					return;
				} else {
					this.isBusy = true;
					this.tooltipLoading.show();
				}

				$.ajax({
					type: 'post',
					dataType: 'json',
					url: ajaxurl,
					data: {
						'action': prefix +'predefined-templates-render'
					}
				})
				.done(_.bind(function(json){
					this.isBusy = false;
					this.tooltipLoading.hide();

					if (!json.success) {
						console.error('Failed to render builder templates', json);
						return;
					}

					this.$el.tooltipContent
						.html(json.data.html)
						.trigger('fw:option-type:page-builder:'+ prefix +'pred-tpl:after-html-replace');
				}, this))
				.fail(_.bind(function(xhr, status, error){
					this.isBusy = false;
					this.tooltipLoading.hide();

					fw.soleModal.show(
						prefix +'templates-error',
						'<h4>Ajax Error</h4><p class="fw-text-danger">'+ String(error) +'</p>',
						{showCloseButton: false}
					);
				}, this));
			},
			load: function (id) {
				if (this.isBusy) {
					console.log('Working... Try again later');
					return;
				} else {
					this.isBusy = true;
					this.tooltipLoading.show();
				}

				$.ajax({
					type: 'post',
					dataType: 'json',
					url: ajaxurl,
					data: {
						'action': prefix +'predefined-templates-load',
						id: id
					}
				})
					.done(_.bind(function(r){
						this.isBusy = false;
						this.tooltipLoading.hide();

						if (!r.success) {
							console.error('Failed to load template', r);
							return;
						}

						this.tooltipApi.hide();
						this.builder.rootItems.add(JSON.parse(r.data.json));
					}, this))
					.fail(_.bind(function(xhr, status, error){
						this.isBusy = false;
						this.tooltipLoading.hide();

						fw.soleModal.show(
							prefix +'templates-error',
							'<h4>Ajax Error</h4><p class="fw-text-danger">'+ String(error) +'</p>',
							{showCloseButton: false}
						);
					}, this));
			}
		};

		inst.$el.headerTools
			.removeClass('fw-hidden')
			.append(
				'<div class="'+ prefix +'pred-tpl-add-btn-wrap fw-pull-right">' +
				/**/'<a class="tpl-btn" href="#" onclick="return false;">'+ localized.l10n.add_button +'</a>' +
				'</div>'
			);

		inst.tooltipApi = inst.$el.headerTools
			.find('.'+ prefix +'pred-tpl-add-btn-wrap .tpl-btn')
			.qtip({
				show: 'click',
				hide: 'unfocus',
				position: {
					at: 'bottom center',
					my: 'top center',
					viewport: $(document.body)
				},
				events: {
					show: function () {
						inst.refresh();
					}
				},
				style: {
					classes: 'qtip-fw qtip-fw-builder '+ prefix +'pred-tpl-qtip',
					tip: {
						width: 12,
						height: 5
					},
					width: 700
				},
				content: {
					text: inst.$el.tooltipContent
				}
			})
			.qtip('api');

		inst.$el.tooltipContent
			.on('change', '.'+ prefix +'pred-tpl-cat select', function (e) {
				var cat = $(this).val(),
					$thumbs = inst.$el.tooltipContent.find('.'+ prefix +'pred-tpl-thumb-list .'+ prefix +'pred-tpl-thumb');

				if (!cat.length) { // show all
					$thumbs.removeClass('fw-hidden');
				} else { // show one category
					$thumbs.each(function(){
						var $thumb = $(this),
							categs = JSON.parse($thumb.attr('data-categs'));

						$thumb[ (typeof categs[cat] === 'undefined') ? 'addClass' : 'removeClass' ]('fw-hidden');
					});
				}
			})
			.on('click', '.'+ prefix +'pred-tpl-thumb-list .'+ prefix +'pred-tpl-thumb > img', function (e) {
				inst.load($(this).closest('.'+ prefix +'pred-tpl-thumb').attr('data-id'));
			})
			.on('fw:option-type:page-builder:'+ prefix +'pred-tpl:after-html-replace', function(){
				//
			});
	});
})(jQuery, fwEvents, _, _theme_pb_pred_tpl);
