/*!
 * WPBakery Page Builder v6.0.0 (https://wpbakery.com)
 * Copyright 2011-2020 Michael M, WPBakery
 * License: Commercial. More details: http://go.wpbakery.com/licensing
 */

// jscs:disable
// jshint ignore: start

! function () {
	"use strict";
	vc.events.on("vc:access:initialize", function (access) {
		access.add("be_editor", vc_user_access().editor("grid_builder")), access.add("classic_editor", !1), vc.events.trigger("vc:access:grid_builder:ready", access)
	})
}(),
function ($) {
	"use strict";
	vc.gridItemEditor = !0, vc.Storage.prototype.getContent = function () {
		var content;
		return _.isObject(window.tinymce) && tinymce.editors.content && tinymce.editors.content.save(), (content = window.vc_wpnop($("#content").val())).length ? content : vcDefaultGridItemContent
	}, vc.visualComposerView.prototype.rowSortableSelector = "> [data-element_type]", vc.visualComposerView.prototype.events = {
		"click #vc_templates-editor-button": "openTemplatesWindow",
		"click #vc_pages-editor-button": "openTemplatesWindow",
		'click [data-vc-navbar-control="edit"]': "openVcGitemEditForm",
		'click [data-vc-navbar-control="preview"]': "renderGitemPreview",
		'change [data-vc-navbar-control="preview_width"]': "setPreviewItemWidth",
		"click #wpb-save-post": "save",
		'change [data-vc-navbar-control="animation"]': "changeAnimation"
	}, vc.visualComposerView.previewActivated = !1, vc.visualComposerView.prototype.renderGitemPreview = function (e) {
		e && e.preventDefaul && e.preventDefault(), this.previewActivated ? this.hidePreview() : (vc.showSpinner(), this.sendDataGitemPreview())
	}, vc.visualComposerView.prototype.sendDataGitemPreview = function () {
		var $form;
		$('[data-vc-grid-item="preview"]').html('<iframe name="vc_gitem-preview-iframe"></iframe>').addClass("vc_visible"), ($form = $('<form id="vc_gitem-preview-form" action="' + encodeURI(ajaxurl) + '" method="post" target="vc_gitem-preview-iframe" style="position: absolute;visibility: hidden;right: 0; bottom:0"><input type="hidden" name="action" value="vc_gitem_preview"><input type="hidden" id="vc_gitem-preview-form-shortcode-string" name="shortcodes_string"><input type="hidden" name="post_id"><input type="hidden" name="_vcnonce" value="' + window.vcAdminNonce + '"><input type="submit" name="submit">').prependTo("body")).find('[name="post_id"]').val($("#post_ID").val()), $form.find('[name="shortcodes_string"]').val(vc.storage.getContent()), $form.find('[type="submit"]').trigger("click"), $form.remove()
	}, vc.visualComposerView.prototype.showPreview = function (e) {
		$("#visual_composer_content").hide(), $('[data-vc-grid-item="preview"]').addClass("vc_visible"), _.isString(e) && $('[data-vc-grid-item="navbar_preview_width"] select').val(e), $('[data-vc-grid-item="navbar_preview_width"]').addClass("vc_visible"), vc.hideSpinner(), $('[data-vc-navbar-control="preview"]').text(i18nLocaleGItem.builder), this.previewActivated = !0
	}, vc.visualComposerView.prototype.hidePreview = function () {
		$("#visual_composer_content").show(), $('[data-vc-grid-item="preview"]').removeClass("vc_visible").empty(), $('[data-vc-grid-item="navbar_preview_width"]').removeClass("vc_visible"), this.previewActivated = !1, $('[data-vc-navbar-control="preview"]').text(i18nLocaleGItem.preview)
	}, vc.visualComposerView.prototype.setPreviewItemWidth = function (e) {
		var iframeWindow = $("#vc_gitem-preview iframe").get(0).contentWindow;
		_.isString(e) ? $('[data-vc-grid-item="navbar_preview_width"] select').val(e) : e && e.currentTarget && iframeWindow.vcSetItemWidth($(e.currentTarget).val())
	}, vc.visualComposerView.prototype.openVcGitemEditForm = function (e) {
		e && e.preventDefaul && e.preventDefault();
		var vcGitemModel = vc.shortcodes.findWhere({
			shortcode: "vc_gitem"
		});
		this.previewActivated && this.hidePreview(), vcGitemModel && vc.edit_element_block_view.render(vcGitemModel)
	}, vc.visualComposerView.prototype.setSortable = function () {
		return $(".wpb_column_container").sortable({
			forcePlaceholderSize: !0,
			forceHelperSize: !1,
			connectWith: ".wpb_column_container",
			placeholder: "vc_placeholder",
			items: "> .wpb_sortable.wpb_content_element,> .wpb_content_element.vc-non-draggable",
			cancel: ".vc-non-draggable",
			helper: this.renderPlaceholder,
			distance: 3,
			scroll: !0,
			scrollSensitivity: 70,
			cursor: "move",
			cursorAt: {
				top: 20,
				left: 16
			},
			tolerance: "intersect",
			start: function () {
				$("#visual_composer_content").addClass("vc_sorting-started"), $(".vc_not_inner_content").addClass("dragging_in")
			},
			stop: function (event, ui) {
				$("#visual_composer_content").removeClass("vc_sorting-started"), $(".dragging_in").removeClass("dragging_in");
				var tag = ui.item.data("element_type"),
					parent_tag = ui.item.parent().closest("[data-element_type]").data("element_type"),
					allowed_container_element = !!_.isUndefined(vc.map[parent_tag].allowed_container_element) || vc.map[parent_tag].allowed_container_element;
				vc.check_relevance(parent_tag, tag) || $(this).sortable("cancel"), _.isObject(vc.map[tag]) && (_.isBoolean(vc.map[tag].is_container) && !0 === vc.map[tag].is_container || !_.isEmpty(vc.map[tag].as_parent)) && !0 !== allowed_container_element && allowed_container_element !== ui.item.data("element_type").replace(/_inner$/, "") && $(this).sortable("cancel"), $(".vc_sorting-empty-container").removeClass("vc_sorting-empty-container")
			},
			update: this.updateElementsSorting,
			over: function (event, ui) {
				var tag, parent_tag, allowed_container_element;
				return tag = ui.item.data("element_type"), parent_tag = ui.placeholder.closest("[data-element_type]").data("element_type"), allowed_container_element = !!_.isUndefined(vc.map[parent_tag].allowed_container_element) || vc.map[parent_tag].allowed_container_element, !vc.check_relevance(parent_tag, tag) || _.isObject(vc.map[tag]) && (_.isBoolean(vc.map[tag].is_container) && !0 === vc.map[tag].is_container || !_.isEmpty(vc.map[tag].as_parent)) && !0 !== allowed_container_element && allowed_container_element !== ui.item.data("element_type").replace(/_inner$/, "") ? (ui.placeholder.addClass("vc_hidden-placeholder"), !1) : (ui.sender && ui.sender.length && !ui.sender.find("[data-element_type]:visible").length && ui.sender.addClass("vc_sorting-empty-container"), ui.placeholder.removeClass("vc_hidden-placeholder"), void ui.placeholder.css({
					maxWidth: ui.placeholder.parent().width()
				}))
			}
		}), this
	}, vc.visualComposerView.prototype.changeAnimation = function (e) {
		var $dropdown, params, model;
		if (!(model = vc.shortcodes.findWhere({
				shortcode: "vc_gitem_animated_block"
			}))) return !1;
		$dropdown = $(e.currentTarget), (params = $.extend({}, model.get("params"))).animation = $dropdown.val(), model.save({
			params: params
		}), this.previewActivated && this.changePreviewAnimation(params.animation)
	}, vc.visualComposerView.prototype.changePreviewAnimation = function (animation) {
		var iframeWindow = $("#vc_gitem-preview iframe").get(0).contentWindow;
		iframeWindow && iframeWindow.changeAnimation(animation)
	}, vc.visualComposerView.prototype.initializeAccessPolicy = function () {
		this.accessPolicy = {
			be_editor: vc_user_access().editor("grid_builder"),
			fe_editor: !1,
			classic_editor: !1
		}
	}, vc.EditElementPanelView.prototype.ajaxData = function () {
		var params, merged_params;
		return params = this.model.get("params"), merged_params = vc.getMergedParams(this.model.get("shortcode"), _.extend({}, vc.getDefaults(this.model.get("shortcode")), params)), _.isUndefined(params.content) || (merged_params.content = params.content), {
			action: "vc_edit_form",
			vc_grid_item_editor: "true",
			tag: this.model.get("shortcode"),
			post_id: $("#post_ID").val(),
			params: merged_params,
			_vcnonce: window.vcAdminNonce
		}
	}, vc.EditElementPanelView.prototype.fetchSaveSettingsDialogAjaxData = function () {
		return {
			action: "vc_action_render_settings_preset_title_prompt",
			vc_inline: !0,
			vc_grid_item_editor: !0,
			_vcnonce: window.vcAdminNonce
		}
	}, vc.EditElementPanelView.prototype.saveSettingsAjaxData = function (shortcode_name, title, is_default, data) {
		return {
			action: "vc_action_save_settings_preset",
			shortcode_name: shortcode_name,
			is_default: is_default ? 1 : 0,
			vc_inline: !0,
			title: title,
			data: data,
			vc_grid_item_editor: !0,
			_vcnonce: window.vcAdminNonce
		}
	}, vc.EditElementPanelView.prototype.fetchSaveSettingsDialogAjaxData = function () {
		return {
			action: "vc_action_render_settings_preset_title_prompt",
			vc_inline: !0,
			vc_grid_item_editor: !0,
			_vcnonce: window.vcAdminNonce
		}
	}, vc.EditElementPanelView.prototype.loadSettingsAjaxData = function (id) {
		return {
			action: "vc_action_get_settings_preset",
			vc_inline: !0,
			id: id,
			vc_grid_item_editor: !0,
			_vcnonce: window.vcAdminNonce
		}
	}, vc.EditElementPanelView.prototype.deleteSettingsAjaxData = function (shortcode_name, id) {
		return {
			action: "vc_action_delete_settings_preset",
			shortcode_name: shortcode_name,
			vc_inline: !0,
			id: id,
			vc_grid_item_editor: !0,
			_vcnonce: window.vcAdminNonce
		}
	}, vc.EditElementPanelView.prototype.saveAsDefaultSettingsAjaxData = function (shortcode_name) {
		return {
			action: "vc_action_set_as_default_settings_preset",
			shortcode_name: shortcode_name,
			id: this.settingsPresetId,
			vc_inline: !0,
			vc_grid_item_editor: !0,
			_vcnonce: window.vcAdminNonce
		}
	}, vc.EditElementPanelView.prototype.restoreDefaultSettingsAjaxData = function (shortcode_name) {
		return {
			action: "vc_action_restore_default_settings_preset",
			shortcode_name: shortcode_name,
			vc_inline: !0,
			vc_grid_item_editor: !0,
			_vcnonce: window.vcAdminNonce
		}
	}, vc.EditElementPanelView.prototype.reloadSettingsMenuContentAjaxData = function (shortcode_name) {
		return {
			action: "vc_action_render_settings_preset_popup",
			shortcode_name: shortcode_name,
			vc_inline: !0,
			vc_grid_item_editor: !0,
			_vcnonce: window.vcAdminNonce
		}
	}, vc.EditElementPanelView.prototype.renderSettingsPresetAjaxData = function (params) {
		var parent_id;
		return parent_id = this.model.get("parent_id"), {
			action: "vc_edit_form",
			tag: this.model.get("shortcode"),
			parent_tag: parent_id ? this.model.collection.get(parent_id).get("shortcode") : null,
			post_id: $("#post_ID").val(),
			params: params,
			vc_grid_item_editor: !0,
			_vcnonce: window.vcAdminNonce
		}
	}, window.VcGitemView = window.VcColumnView.extend({
		animatedBlock: !1,
		cZone: !1,
		events: {
			'click > .vc_controls [data-vc-control="delete"]': "deleteShortcode",
			'click > .vc_controls [data-vc-control="add"]': "addElement",
			'click > .vc_controls [data-vc-control="edit"]': "editElement",
			'click > .vc_controls [data-vc-control="clone"]': "clone",
			'click [data-vc-gitem="add-c"]': "addCZone",
			'click > .vc_empty [data-vc-gitem="add-ab"]': "addAnimatedBlock"
		},
		initialize: function (options) {
			window.VcColumnView.__super__.initialize.call(this, options), vc.shortcodes.on("all", this.setCZoneHeight)
		},
		setContent: function () {
			this.$content = this.$el.find("> .vc_gitem-content"), _.bindAll(this, "savePositionC", "startCDragging", "stopCDragging")
		},
		setCEmpty: function () {
			this.$content.addClass("vc_empty-c")
		},
		unsetCEmpty: function () {
			this.$content.removeClass("vc_empty-c")
		},
		setEmpty: function () {
			this.$content.addClass("vc_empty")
		},
		unsetEmpty: function () {
			this.$content.removeClass("vc_empty")
		},
		checkIsEmpty: function () {
			vc.shortcodes.where({
				parent_id: this.model.id,
				shortcode: "vc_gitem_zone_c"
			}).length ? this.unsetCEmpty() : this.setCEmpty(), vc.shortcodes.where({
				parent_id: this.model.if,
				shortcode: "vc_gitem_animated_block"
			}).length ? this.unsetEmpty() : this.setEmpty(), window.VcColumnView.__super__.checkIsEmpty.call(this)
		},
		addAnimatedBlock: function (e) {
			var animatedBlock;
			e && e.preventDefault && e.preventDefault(), this.animatedBlock || (vc.storage.lock(), animatedBlock = vc.shortcodes.create({
				shortcode: "vc_gitem_animated_block",
				parent_id: this.model.get("id"),
				order: 1,
				params: vc.getDefaults("vc_gitem_animated_block"),
				root_id: this.model.get("id")
			}), vc.storage.lock(), animatedBlock.view.addZone("a"), animatedBlock.view.addZone("b"))
		},
		addCZone: function (e) {
			var model, $column = $(e.currentTarget),
				position = $column.data("vcPosition");
			if (this.cZone) return this.updateCZonePosition($column, position), !1;
			(model = new vc.shortcode({
				shortcode: "vc_gitem_add_c_zone",
				params: {
					cZonePosition: this.getCZoneModelOrder(position),
					position: position
				},
				parent_id: this.model.get("id")
			})).view = this, vc.add_element_block_view.render(model)
		},
		updateCZonePosition: function ($column, position) {
			this.setCZonePosition(position), this.setCZoneOrder(position), this.changeCZonePosition($column), this.setCssPosition($column)
		},
		setCZoneOrder: function (position) {
			this.cZone.save({
				order: this.getCZoneModelOrder(position)
			})
		},
		changeCZonePosition: function ($column) {
			this.cZone.view.$el.appendTo($column)
		},
		setCZonePosition: function (position) {
			this.model.save({
				params: _.extend({}, this.model.get("params") || {}, {
					c_zone_position: position
				})
			})
		},
		setCZoneHeight: function () {
			var $left, $animated, $right, max_height;
			$left = $('[data-vc-gitem="add-c"][data-vc-position="left"]'), $animated = $('[data-element_type="vc_gitem_animated_block"]'), $right = $('[data-vc-gitem="add-c"][data-vc-position="right"]'), $left.height("auto"), $right.height("auto"), max_height = Math.max($left.height(), $animated.height(), $right.height()), $left.css("height", max_height), $right.css("height", max_height)
		},
		getCZoneModelOrder: function (position) {
			var animatedBlockOrder = this.animatedBlock.get("order");
			return "top" === position || "left" === position ? animatedBlockOrder - 1 : animatedBlockOrder + 1
		},
		cZoneRemoved: function () {
			this.cZone = !1, this.$content.find(".vc_zone-added").removeClass("vc_zone-added"), this.setCZonePosition("")
		},
		setDraggableC: function () {
			this.$content.find('[data-vc-gitem="add-c"]').sortable({
				items: '[data-element_type="vc_gitem_zone_c"]:not(.vc-non-draggable)',
				connectWith: '[data-vc-gitem="add-c"]',
				forcePlaceholderSize: !0,
				forceHelperSize: !1,
				placeholder: "vc_placeholder",
				update: this.savePositionC,
				start: this.startCDragging,
				stop: this.stopCDragging
			}).disableSelection()
		},
		startCDragging: function (event, ui) {
			this.$el.addClass("vc_sorting")
		},
		stopCDragging: function (event, ui) {
			this.$el.removeClass("vc_sorting")
		},
		savePositionC: function (event, ui) {
			var cBlockContainer, position;
			position = (cBlockContainer = ui.item.parent()).data("vcPosition") || "bottom", vc.storage.lock(), this.cZone && this.cZone.save({
				order: this.getCZoneModelOrder(position)
			}), this.setCZonePosition(position), this.setCssPosition(cBlockContainer)
		},
		setCssPosition: function ($container) {
			this.$content.find('[data-vc-gitem="add-c"].vc_zone-added').removeClass("vc_zone-added"), $container.addClass("vc_zone-added")
		},
		addShortcode: function (view) {
			var tag, position, $zone;
			tag = view.model.get("shortcode"), view.render(), "vc_gitem_zone_c" === tag ? (position = this.model.getParam("c_zone_position") || "bottom", $zone = this.$content.find('[data-vc-gitem="add-c"][data-vc-position="' + position + '"]'), view.$el.appendTo($zone.addClass("vc_zone-added")), this.setDraggableC(), this.cZone = view.model) : "vc_gitem_animated_block" === tag && (view.$el.appendTo($('[data-vc-gitem="add-ab"]')), this.animatedBlock = view.model)
		}
	}), window.VcGitemAnimatedBlockView = window.VcColumnView.extend({
		aZone: !1,
		bZone: !1,
		currentAnimation: "",
		events: {
			'click > .vc_controls [data-vc-control="delete"]': "deleteShortcode",
			'click > .vc_controls [data-vc-control="add"]': "addElement",
			'click > .vc_controls [data-vc-control="edit"]': "editElement",
			'click > .vc_controls [data-vc-control="clone"]': "clone",
			'click > .vc_empty-a [data-vc-gitem-animated-block="add-a"]': "addAZone",
			'click > .vc_empty-b [data-vc-gitem-animated-block="add-b"]': "addBZone",
			"click > .vc_gitem-animated-block-content [data-vc-gitem-tab-link]": "activateZone",
			'click > .vc_gitem-animated-block-content [data-vc-control="edit"]': "showEditForm"
		},
		render: function () {
			var animation;
			return window.VcGitemAnimatedBlockView.__super__.render.call(this), (animation = this.model.getParam("animation")) && $('[data-vc-navbar-control="animation"]').val(animation), this
		},
		setContent: function () {
			this.$content = this.$el.find("> .vc_gitem-animated-block-content")
		},
		buildDesignHelpers: function () {
			window.VcGitemAnimatedBlockView.__super__.buildDesignHelpers.call(this), this.setAnimationDropDown(), this.setAnimationClassToBlock()
		},
		changeShortcodeParams: function (model) {
			window.VcGitemAnimatedBlockView.__super__.changeShortcodeParams.call(this, model)
		},
		setAnimationClassToBlock: function () {
			var animation = this.model.getParam("animation") || "single";
			this.currentAnimation && this.$el.removeClass("vc_gitem-animation-" + this.currentAnimation), this.$el.addClass("vc_gitem-animation vc_gitem-animation-" + animation), this.currentAnimation = animation
		},
		setAnimationDropDown: function () {
			var animation = this.model.getParam("animation");
			animation && $('[data-vc-gitem-animated-block="animation-dropdown"]').val(animation), "" === animation && this.activateZone({
				currentTarget: $(".vc_gitem-tab-a").get(0)
			})
		},
		addAZone: function (e) {
			e && e.preventDefault && e.preventDefault(), this.addZone("a")
		},
		addBZone: function (e) {
			e && e.preventDefault && e.preventDefault(), this.addZone("b")
		},
		addZone: function (zone) {
			this[zone + "Zone"] || vc.shortcodes.create({
				shortcode: "vc_gitem_zone_" + zone,
				parent_id: this.model.get("id"),
				params: vc.getDefaults("vc_gitem_zone_" + zone)
			})
		},
		addTab: function (zone, id) {
			var $zone = $('<li class="vc_gitem-animated-block-tab vc_gitem-tab-' + zone + '"><a href="#" data-vc-gitem-tab-link="' + zone + '"><span class="vc_label">' + this.getZoneLabel(zone) + '</span></a><a class="vc_control column_edit" data-vc-control="edit" data-vc-zone-model-id="' + id + '"><i class="la la-pen"></i></a></li>');
			$zone.appendTo('[data-vc-gitem-animated-block="tabs"]'), "a" === zone && this.switchZone($zone.find("a"))
		},
		getZoneLabel: function (zone) {
			var zoneSettings = !!vc.map["vc_gitem_zone_" + zone] && vc.map["vc_gitem_zone_" + zone];
			return zoneSettings && zoneSettings.name ? zoneSettings.name : zone
		},
		activateZone: function (e) {
			var $control = $(e.currentTarget);
			e && e.preventDefault && e.preventDefault(), $control.hasClass("vc_active") || this.switchZone($control)
		},
		showEditForm: function (e) {
			var model_id;
			e && e.preventDefault && e.preventDefault(), (model_id = $(e.currentTarget).data("vcZoneModelId")) && vc.app.views[model_id] && vc.app.views[model_id].editElement()
		},
		switchZone: function ($zone) {
			this.$el.find('[data-vc-gitem-animated-block="tabs"] .vc_active, [data-vc-gitem-animated-block].vc_active').removeClass("vc_active"), $zone.parent().addClass("vc_active"), this.$el.find('[data-vc-gitem-animated-block="add-' + $zone.data("vcGitemTabLink") + '"]').addClass("vc_active")
		},
		setAEmpty: function () {
			this.$content.addClass("vc_empty-a")
		},
		unsetAEmpty: function () {
			this.$content.removeClass("vc_empty-a")
		},
		setBEmpty: function () {
			this.$content.addClass("vc_empty-b")
		},
		unsetBEmpty: function () {
			this.$content.removeClass("vc_empty-b")
		},
		setEmpty: function () {
			this.setAEmpty(), this.setBEmpty()
		},
		checkIsEmpty: function () {
			vc.shortcodes.where({
				parent_id: this.model.get("id"),
				shortcode: "vc_gitem_zone_a"
			}).length ? this.unsetAEmpty() : this.setAEmpty(), vc.shortcodes.where({
				parent_id: this.model.get("id"),
				shortcode: "vc_gitem_zone_b"
			}).length ? this.unsetBEmpty() : this.setBEmpty()
		},
		addShortcode: function (view) {
			var tag = view.model.get("shortcode");
			view.render(), "vc_gitem_zone_a" === tag ? (view.$el.appendTo(this.$el.find('[data-vc-gitem-animated-block="add-a"]')), this.aZone = view.model, this.addTab("a", view.model.get("id"))) : "vc_gitem_zone_b" === tag && (view.$el.appendTo(this.$el.find('[data-vc-gitem-animated-block="add-b"]')), this.bZone = view.model, this.addTab("b", view.model.get("id")))
		}
	}), window.VcGitemZoneView = window.VcColumnView.extend({
		addElement: function (e) {
			var row;
			e && e.preventDefault && e.preventDefault(), vc.storage.lock(), row = vc.shortcodes.create({
				shortcode: "vc_gitem_row",
				params: _.extend({}, vc.getDefaults("vc_gitem_row")),
				parent_id: this.model.get("id")
			}), vc.shortcodes.create({
				shortcode: "vc_gitem_col",
				params: _.extend({
					width: "1/1"
				}, vc.getDefaults("vc_gitem_col")),
				parent_id: row.get("id")
			})
		},
		buildDesignHelpers: function () {
			var matches, featuredImage, image, color, css = this.model.getParam("css"),
				$before = this.$el.find("> .vc_controls").get(0);
			featuredImage = this.model.getParam("featured_image"), this.$el.find('> [data-vc-helper="color"]').remove(), this.$el.find('> [data-vc-helper="image"]').remove(), this.$el.find('> [data-vc-helper="image-featured"]').remove(), (matches = css.match(/background\-image:\s*url\(([^\)]+)\)/)) && !_.isUndefined(matches[1]) && (image = matches[1]), (matches = css.match(/background\-color:\s*([^\s\;]+)\b/)) && !_.isUndefined(matches[1]) && (color = matches[1]), (matches = css.match(/background:\s*([^\s]+)\b\s*url\(([^\)]+)\)/)) && !_.isUndefined(matches[1]) && (color = matches[1], image = matches[2]), image && $('<span class="vc_css-helper vc_image-helper" data-vc-helper="image" style="background-image: url(' + image + ');" title="' + i18nLocale.column_background_image + '"></span>').insertBefore($before), color && $('<span class="vc_css-helper vc_color-helper" data-vc-helper="color" style="background-color: ' + color + '" title="' + i18nLocale.column_background_color + '"></span>').insertBefore($before), "yes" === featuredImage && $('<span class="vc_css-helper vc_featured" data-vc-helper="image-featured"></span>').insertBefore($before)
		}
	}), window.VcGitemZoneCView = window.VcGitemZoneView.extend({
		removeView: function () {
			window.VcGitemZoneCView.__super__.removeView.call(this);
			var parentModel = vc.shortcodes.get(this.model.get("parent_id"));
			parentModel && vc.app.views[parentModel.get("id")] && vc.app.views[parentModel.get("id")].cZoneRemoved()
		}
	}), window.VcGitemRowView = window.VcRowView.extend({
		zone: "",
		sortingSelector: "> [data-element_type=vc_gitem_col]",
		getChildTag: function () {
			return "vc_gitem_col"
		},
		addElement: function (e) {
			e && e.preventDefault && e.preventDefault(), vc.shortcodes.create({
				shortcode: this.getChildTag(),
				params: {},
				parent_id: this.model.id
			}), this.setActiveLayoutButton()
		},
		buildDesignHelpers: function () {}
	}), window.VcGitemColView = window.VcColumnView.extend({
		events: {
			'click > .vc_controls [data-vc-control="delete"]': "deleteShortcode",
			'click > .vc_controls [data-vc-control="add"]': "addElement",
			'click > .vc_controls [data-vc-control="edit"]': "editElement",
			'click > .vc_controls [data-vc-control="clone"]': "clone",
			"click > .vc_controls [data-vc-align]": "changeTextAlign",
			"click > .wpb_element_wrapper > .vc_empty-container": "addToEmpty"
		},
		designHelpersSelector: "> .vc_controls .column_edit",
		changeTextAlign: function (e) {
			var $control;
			if (e) {
				if (e.preventDefault && e.preventDefault(), ($control = $(e.currentTarget)).hasClass("vc_active")) return !1;
				$control.parent().find(".vc_active").removeClass("vc_active"), $control.addClass("vc_active"), _.defer(this.setTextAlign, $control.data("vcAlign") || "left")
			} else this.$el.find('> .vc_controls [data-vc-align="' + (this.model.getParam("align") || "left") + '"]').addClass("vc_active")
		},
		setTextAlign: function (align) {
			var params = _.extend({}, this.model.get("params"), {
				align: align
			});
			this.model.save({
				params: params
			})
		},
		render: function () {
			return _.bindAll(this, "setTextAlign"), window.VcGitemColView.__super__.render.call(this), this.changeTextAlign(void 0), this
		}
	}), vc.AddElementUIPanelBackendEditor.prototype.createElement = function (e) {
		e && e.preventDefault && e.preventDefault();
		var model, tag, cZone, cZoneRow, showSettings, parent_id = !1;
		tag = $(e.currentTarget).data("tag"), !1 !== this.model && "vc_gitem_add_c_zone" === this.model.get("shortcode") ? (this.model.view.setCZonePosition(this.model.getParam("position")), vc.storage.lock(), cZone = vc.shortcodes.create({
			shortcode: "vc_gitem_zone_c",
			parent_id: this.model.get("parent_id"),
			params: _.extend({}, vc.getDefaults("vc_gitem_zone_c")),
			order: this.model.getParam("cZonePosition")
		}), this.model.view.cZone = cZone, vc.storage.lock(), cZoneRow = vc.shortcodes.create({
			shortcode: "vc_gitem_row",
			params: _.extend({}, vc.getDefaults("vc_gitem_row")),
			parent_id: cZone.get("id")
		}), vc.storage.lock(), parent_id = vc.shortcodes.create({
			shortcode: "vc_gitem_col",
			params: _.extend({
				width: "1/1"
			}, vc.getDefaults("vc_gitem_col")),
			parent_id: cZoneRow.get("id")
		}).get("id"), cZone = null) : !1 !== this.model && (parent_id = this.model.get("id")), model = vc.shortcodes.create({
			shortcode: tag,
			parent_id: parent_id,
			params: vc.getDefaults(tag),
			root_id: vc.shortcodes.findWhere({
				shortcode: "vc_gitem"
			}) || !1
		}), "vc_gitem_row" === tag && vc.shortcodes.create({
			shortcode: "vc_gitem_col",
			params: {
				width: "1/1"
			},
			parent_id: model.get("id"),
			root_id: model.get("id")
		}), this.model = model, showSettings = !(_.isBoolean(vc.getMapped(tag).show_settings_on_create) && !1 === vc.getMapped(tag).show_settings_on_create), this.model.get("shortcode"), this.hide(), showSettings && this.showEditForm()
	}, vc.TemplatesPanelViewBackend.prototype.templateLoadPreviewAction = "vc_grid_item_editor_load_template_preview", vc.TemplatesPanelViewBackend.prototype.renderTemplate = function (html) {
		_.each(vc.filters.templates, function (callback) {
			html = callback(html)
		}), vc.storage.setContent(html), vc.shortcodes.fetch({
			reset: !0
		}), this.hide()
	}, $(document).ready(function () {
		$('[name="screen_columns"][value="1"]').trigger("click"), $("#screen-meta-links, #screen-meta").hide()
	})
}(window.jQuery);