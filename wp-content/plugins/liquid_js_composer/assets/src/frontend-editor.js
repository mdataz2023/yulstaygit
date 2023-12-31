/*!
* WPBakery Page Builder v6.0.0 (https://wpbakery.com)
* Copyright 2011-2020 Michael M, WPBakery
* License: Commercial. More details: http://go.wpbakery.com/licensing
*/

// jscs:disable
// jshint ignore: start
function vc_guid() {
	return VCS4() + VCS4() + "-" + VCS4()
}

function VCS4() {
	return (65536 * (1 + Math.random()) | 0).toString(16).substring(1)
}
window.vc || (window.vc = {}),
function() {
	"use strict";
	vc.templateOptions = {
		default: {
			evaluate: /<%([\s\S]+?)%>/g,
			interpolate: /<%=([\s\S]+?)%>/g,
			escape: /<%-([\s\S]+?)%>/g
		},
		custom: {
			evaluate: /<#([\s\S]+?)#>/g,
			interpolate: /\{\{\{([\s\S]+?)\}\}\}/g,
			escape: /\{\{([^\}]+?)\}\}(?!\})/g
		}
	};
	
	function escapeChar(match) {
		return "\\" + escapes[match]
	}
	var noMatch = /(.)^/,
	escapes = {
		"'": "'",
		"\\": "\\",
		"\r": "r",
		"\n": "n",
		"\u2028": "u2028",
		"\u2029": "u2029"
	},
	escapeRegExp = /\\|'|\r|\n|\u2028|\u2029/g;
	vc.template = function(text, settings) {
		settings = _.defaults({}, settings, vc.templateOptions.default);
		var render, matcher = RegExp([(settings.escape || noMatch).source, (settings.interpolate || noMatch).source, (settings.evaluate || noMatch).source].join("|") + "|$", "g"),
		index = 0,
		source = "__p+='";
		text.replace(matcher, function(match, escape, interpolate, evaluate, offset) {
			return source += text.slice(index, offset).replace(escapeRegExp, escapeChar), index = offset + match.length, escape ? source += "'+\n((__t=(" + escape + "))==null?'':_.escape(__t))+\n'" : interpolate ? source += "'+\n((__t=(" + interpolate + "))==null?'':__t)+\n'" : evaluate && (source += "';\n" + evaluate + "\n__p+='"), match
		}), source += "';\n", settings.variable || (source = "with(obj||{}){\n" + source + "}\n"), source = "var __t,__p='',__j=Array.prototype.join,print=function(){__p+=__j.call(arguments,'');};\n" + source + "return __p;\n";
		try {
			render = new Function(settings.variable || "obj", "_", source)
		} catch (e) {
			throw e.source = source, e
		}
		
		function template(data) {
			return render.call(this, data, _)
		}
		var argument = settings.variable || "obj";
		return template.source = "function(" + argument + "){\n" + source + "}", template
	}
}(),
function($) {
	"use strict";
	var TabsLine, Plugin, old;
	(TabsLine = function(element, options) {
		var _this = this;
		this.options = options;
		this.$element = $(element);
		this.$dropdownContainer = this.$element.find(this.options.dropdownContainerSelector);
		this.$dropdown = this.$dropdownContainer.find(this.options.dropdownSelector);
		if ( this.options.delayInit ) {
			_this.$element.addClass(this.options.initializingClass);
			setTimeout(function() {
				_this.options.autoRefresh || _this.refresh();
				_this.moveTabs();
				_this.$element.removeClass(_this.options.initializingClass);
			}, 	_this.options.delayInitTime);
		} else {
			this.options.autoRefresh || this.refresh();
			this.moveTabs();
		}
		$(window).on("resize", $.proxy(this.moveTabs, this));
		this.$dropdownContainer.on("click.vc.tabsLine", $.proxy(this.checkDropdownContainerActive, this));
	}).DEFAULTS = {
		initializingClass: "vc_initializing",
		delayInit: !1,
		delayInitTime: 1e3,
		activeClass: "vc_active",
		visibleClass: "vc_visible",
		dropdownContainerSelector: '[data-vc-ui-element="panel-tabs-line-toggle"]',
		dropdownSelector: '[data-vc-ui-element="panel-tabs-line-dropdown"]',
		tabSelector: '>li:not([data-vc-ui-element="panel-tabs-line-toggle"])',
		dropdownTabSelector: "li",
		freeSpaceOffset: 5,
		autoRefresh: !1,
		showDevInfo: !1
	}, TabsLine.prototype.refresh = function() {
		var addClick, _this = this;
		return _this.tabs = [], _this.dropdownTabs = [], _this.$element.find(_this.options.tabSelector).each(function() {
			_this.tabs.push({
				$tab: $(this),
				width: $(this).outerWidth()
			})
		}), _this.$dropdown.find(_this.options.dropdownTabSelector).each(function() {
			var $tempElement = $(this).clone().css({
				visibility: "hidden",
				position: "fixed"
			});
			$tempElement.appendTo(_this.$element), _this.dropdownTabs.push({
				$tab: $(this),
				width: $tempElement.outerWidth()
			}), $tempElement.remove(), $(this).on("click", _this.options.onTabClick)
		}), "function" == typeof this.options.onTabClick && (addClick = function(el) {
			void 0 === el.$tab.data("tabClickSet") && (el.$tab.on("click", $.proxy(_this.options.onTabClick, el.$tab)), el.$tab.data("tabClickSet", !0))
		}, _this.tabs.map(addClick), _this.dropdownTabs.map(addClick)), this
	}, TabsLine.prototype.moveLastToDropdown = function() {
		var $element;
		return this.tabs.length && (($element = this.tabs.pop()).$tab.prependTo(this.$dropdown), this.dropdownTabs.unshift($element)), this.checkDropdownContainer(), this
	}, TabsLine.prototype.moveFirstToContainer = function() {
		var $element;
		return this.dropdownTabs.length && (($element = this.dropdownTabs.shift()).$tab.appendTo(this.$element), this.tabs.push($element)), this.checkDropdownContainer(), this
	}, TabsLine.prototype.getTabsWidth = function() {
		var tabsWidth = 0;
		return this.tabs.forEach(function(entry) {
			tabsWidth += entry.width
		}), tabsWidth
	}, TabsLine.prototype.isDropdownContainerVisible = function() {
		return this.$dropdownContainer.hasClass(this.options.visibleClass)
	}, TabsLine.prototype.getFreeSpace = function() {
		var freeSpace = this.$element.width() - this.getTabsWidth() - this.options.freeSpaceOffset;
		return this.isDropdownContainerVisible() && (freeSpace -= this.$dropdownContainer.outerWidth(), 1 === this.dropdownTabs.length && 0 <= freeSpace - this.dropdownTabs[0].width + this.$dropdownContainer.outerWidth() && (freeSpace += this.$dropdownContainer.outerWidth())), freeSpace
	}, TabsLine.prototype.moveTabsToDropdown = function() {
		for (var i = this.tabs.length - 1; 0 <= i; i--) {
			if (!(this.getFreeSpace() < 0)) return this;
			this.moveLastToDropdown()
		}
		return this
	}, TabsLine.prototype.moveDropdownToTabs = function() {
		for (var dropdownTabsCount = this.dropdownTabs.length, i = 0; i < dropdownTabsCount; i++) {
			if (!(0 <= this.getFreeSpace() - this.dropdownTabs[0].width)) return this;
			this.moveFirstToContainer()
		}
		return this
	}, TabsLine.prototype.showDropdownContainer = function() {
		return this.$dropdownContainer.addClass(this.options.visibleClass), this
	}, TabsLine.prototype.hideDropdownContainer = function() {
		return this.$dropdownContainer.removeClass(this.options.visibleClass), this
	}, TabsLine.prototype.activateDropdownContainer = function() {
		return this.$dropdownContainer.addClass(this.options.activeClass), this
	}, TabsLine.prototype.deactivateDropdownContainer = function() {
		return this.$dropdownContainer.removeClass(this.options.activeClass), this
	}, TabsLine.prototype.checkDropdownContainerActive = function() {
		return this.$dropdown.find("." + this.options.activeClass + ":first").length ? this.activateDropdownContainer() : this.deactivateDropdownContainer(), this
	}, TabsLine.prototype.checkDropdownContainer = function() {
		return this.dropdownTabs.length ? this.showDropdownContainer() : this.hideDropdownContainer(), this.checkDropdownContainerActive(), this
	}, TabsLine.prototype.moveTabs = function() {
		this.options.autoRefresh && this.refresh();
		this.checkDropdownContainer();
		this.moveTabsToDropdown();
		this.moveDropdownToTabs();
		this.options.showDevInfo && this.showDevInfo();
		return this;
	}, TabsLine.prototype.showDevInfo = function() {
		var $devInfoBlock = $("#vc-ui-tabs-line-dev-info");
		$devInfoBlock.length && (this.$devBlock = $devInfoBlock), void 0 === this.$devBlock && (this.$devBlock = $('<div id="vc-ui-tabs-line-dev-info" />').css({
			position: "fixed",
			right: "40px",
			top: "40px",
			padding: "7px 12px",
			border: "1px solid rgba(0, 0, 0, 0.2)",
			background: "rgba(0, 0, 0, 0.7)",
			color: "#0a0",
			"border-radius": "5px",
			"font-family": "tahoma",
			"font-size": "12px",
			"z-index": 1100
		}), this.$devBlock.appendTo("body")), void 0 === this.$devInfo && (this.$devInfo = $("<div />").css({
			"margin-bottom": "7px",
			"padding-bottom": "7px",
			"border-bottom": "1px dashed rgba(0, 200, 0, .35)"
		}), this.$devInfo.appendTo(this.$devBlock)), this.$devInfo.empty(), this.$devInfo.append($("<div />").text("Tabs count: " + this.tabs.length)), this.$devInfo.append($("<div />").text("Dropdown count: " + this.dropdownTabs.length)), this.$devInfo.append($("<div />").text("El width: " + this.$element.width())), this.$devInfo.append($("<div />").text("Tabs width: " + this.getTabsWidth())), this.$devInfo.append($("<div />").text("Tabs width with dots: " + (this.getTabsWidth() + this.$dropdownContainer.outerWidth()))), this.$devInfo.append($("<div />").text("Free space: " + this.getFreeSpace())), this.tabs.length && this.$devInfo.append($("<div />").text("Last tab width: " + this.tabs[this.tabs.length - 1].width)), this.dropdownTabs.length && this.$devInfo.append($("<div />").text("First dropdown tab width: " + this.dropdownTabs[0].width))
	}, Plugin = function(option) {
		return this.each(function() {
			var $this = $(this),
			optionsData = $this.data("vcUiTabsLine"),
			data = $this.data("vc.tabsLine"),
			options = $.extend(!0, {}, TabsLine.DEFAULTS, $this.data(), optionsData, "object" == typeof option && option),
			action = "string" == typeof option ? option : options.action;
			data || $this.data("vc.tabsLine", data = new TabsLine(this, options)), action && data[action]()
		})
	}, old = $.fn.vcTabsLine, $.fn.vcTabsLine = Plugin, $.fn.vcTabsLine.Constructor = TabsLine, $.fn.vcTabsLine.noConflict = function() {
		return $.fn.vcTabsLine = old, this
	}, $(window).on("load", function() {
		$("[data-vc-ui-tabs-line]").each(function() {
			var $vcTabsLine = $(this);
			Plugin.call($vcTabsLine, $vcTabsLine.data())
		})
	})
}(window.jQuery), window.vc || (window.vc = {}),
function() {
	var ListenerHelper = vc.events = {};
	_.extend(ListenerHelper, Backbone.Events), ListenerHelper.triggerShortcodeEvents = function(eventType, shortcodeModel) {
		var shortcodeTag;
		shortcodeTag = shortcodeModel.get("shortcode"), this.trigger("shortcodes", shortcodeModel, eventType), this.trigger("shortcodes:" + shortcodeTag, shortcodeModel, eventType), this.trigger("shortcodes:" + eventType, shortcodeModel), this.trigger("shortcodes:" + shortcodeTag + ":" + eventType, shortcodeModel), this.trigger("shortcodes:" + shortcodeTag + ":" + eventType + ":parent:" + shortcodeModel.get("parent_id"), shortcodeModel), this.triggerParamsEvents(eventType, shortcodeModel)
	}, ListenerHelper.triggerParamsEvents = function(eventType, shortcodeModel) {
		var shortcodeTag, params, settings;
		shortcodeTag = shortcodeModel.get("shortcode"), params = _.extend({}, shortcodeModel.get("params")), settings = vc.map[shortcodeTag], _.isArray(settings.params) && _.each(settings.params, function(paramSettings) {
			this.trigger("shortcodes:" + eventType + ":param", shortcodeModel, params[paramSettings.param_name], paramSettings), this.trigger("shortcodes:" + shortcodeTag + ":" + eventType + ":param", shortcodeModel, params[paramSettings.param_name], paramSettings), this.trigger("shortcodes:" + eventType + ":param:type:" + paramSettings.type, shortcodeModel, params[paramSettings.param_name], paramSettings), this.trigger("shortcodes:" + shortcodeTag + ":" + eventType + ":param:type:" + paramSettings.type, shortcodeModel, params[paramSettings.param_name], paramSettings), this.trigger("shortcodes:" + eventType + ":param:name:" + paramSettings.param_name, shortcodeModel, params[paramSettings.param_name], paramSettings), this.trigger("shortcodes:" + shortcodeTag + ":" + eventType + ":param:name:" + paramSettings.param_name, shortcodeModel, params[paramSettings.param_name], paramSettings)
		}, this)
	}
}(window.jQuery),
function($) {
	"use strict";
	_.isUndefined(window.vc) && (window.vc = {}), window.Vc_postSettingsEditor = Backbone.View.extend({
		$editor: !1,
		sel: "wpb_csseditor",
		ace_enabled: !1,
		initialize: function(sel) {
			sel && 0 < sel.length && (this.sel = sel), this.ace_enabled = !0
		},
		aceEnabled: function() {
			return this.ace_enabled && window.ace && window.ace.edit
		},
		setEditor: function(value) {
			return this.aceEnabled() ? this.setEditorAce(value) : this.setEditorTextarea(value), this.$editor
		},
		focus: function() {
			if (this.aceEnabled()) {
				this.$editor.focus();
				var count = this.$editor.session.getLength();
				this.$editor.gotoLine(count, this.$editor.session.getLine(count - 1).length)
			} else this.$editor.focus()
		},
		setEditorAce: function(value) {
			this.$editor || (this.$editor = ace.edit(this.sel), this.$editor.getSession().setMode("ace/mode/css"), this.$editor.setTheme("ace/theme/chrome")), this.$editor.setValue(value), this.$editor.clearSelection(), this.$editor.focus();
			var count = this.$editor.getSession().getLength();
			return this.$editor.gotoLine(count, this.$editor.getSession().getLine(count - 1).length), this.$editor
		},
		setEditorTextarea: function(value) {
			return this.$editor || (this.$editor = $("<textarea></textarea>").css({
				width: "100%",
				height: "100%",
				minHeight: "300px"
			}), $("#" + this.sel).empty().append(this.$editor).css({
				overflowLeft: "hidden",
				width: "100%",
				height: "100%"
			})), this.$editor.val(value), this.$editor.focus(), this.$editor.parent().css({
				overflow: "auto"
			}), this.$editor
		},
		setSize: function() {
			var height = $(window).height() - 380;
			this.aceEnabled() ? $("#" + this.sel).css({
				height: height,
				minHeight: height
			}) : (this.$editor.parent().css({
				height: height,
				minHeight: height
			}), this.$editor.css({
				height: "98%",
				width: "98%"
			}))
		},
		setSizeResizable: function() {
			var height, editorPositionTop, $editor = $("#" + this.sel);
			editorPositionTop = $editor.offset().top, height = vc.active_panel.$el.find('[data-vc-ui-element="panel-footer"]').offset().top - editorPositionTop - 70, this.aceEnabled() ? $editor.css({
				height: height,
				minHeight: height
			}) : (this.$editor.parent().css({
				height: height,
				minHeight: height
			}), this.$editor.css({
				height: "98%",
				width: "98%"
			}))
		},
		getEditor: function() {
			return this.$editor
		},
		getValue: function() {
			return this.aceEnabled() ? this.$editor.getValue() : this.$editor.val()
		}
	})
}(window.jQuery),
function() {
	"use strict";
	window.Backbone.View.vcExtendUI = function(object) {
		var newObject = this.extend(object);
		return newObject.prototype._vcUIEventsHooks || (newObject.prototype._vcUIEventsHooks = []), object.uiEvents && newObject.prototype._vcUIEventsHooks.push(object.uiEvents), newObject
	}, window.vc.View = Backbone.View.extend({
		delegateEvents: function() {
			vc.View.__super__.delegateEvents.call(this), this._vcUIEventsHooks && this._vcUIEventsHooks.length && _.each(this._vcUIEventsHooks, function(events) {
				_.isObject(events) && _.each(events, function(methods, e) {
					_.isString(methods) && _.each(methods.split(/\s+/), function(method) {
						this.on(e, this[method], this)
					}, this)
				}, this)
			}, this)
		}
	})
}(), window._.isUndefined(window.vc) && (window.vc = {}),
function(vc, _, $) {
	"use strict";
	window.vc_toTitleCase = function(str) {
		return str.replace(/\w\S*/g, function(txt) {
			return txt.charAt(0).toUpperCase() + txt.substr(1).toLowerCase()
		})
	}, window.vc_convert_column_size = function(width) {
		var numbers, range, num, dev;
		return numbers = width ? width.split("/") : [1, 1], range = _.range(1, 13), num = !_.isUndefined(numbers[0]) && 0 <= _.indexOf(range, parseInt(numbers[0], 10)) && parseInt(numbers[0], 10), dev = !_.isUndefined(numbers[1]) && 0 <= _.indexOf(range, parseInt(numbers[1], 10)) && parseInt(numbers[1], 10), !1 !== num && !1 !== dev ? "vc_col-sm-" + 12 * num / dev : "vc_col-sm-12"
	}, window.vc_convert_column_span_size = function(width) {
		return "span12" === (width = width.replace(/^vc_/, "")) ? "1/1" : "span11" === width ? "11/12" : "span10" === width ? "5/6" : "span9" === width ? "3/4" : "span8" === width ? "2/3" : "span7" === width ? "7/12" : "span6" === width ? "1/2" : "span5" === width ? "5/12" : "span4" === width ? "1/3" : "span3" === width ? "1/4" : "span2" === width ? "1/6" : "span1" === width && "1/12"
	}, window.vc_get_column_mask = function(cells) {
		var columns, columns_count, numbers_sum, i;
		for (i in columns_count = (columns = cells.split("_")).length, numbers_sum = 0, columns)
		if (!isNaN(parseFloat(columns[i])) && isFinite(columns[i])) {
			var sp = columns[i].match(/(\d{1,2})(\d{1,2})/);
			numbers_sum = _.reduce(sp.slice(1), function(memo, num) {
				return memo + parseInt(num, 10)
			}, numbers_sum)
		} return columns_count + "" + numbers_sum
	}, window.VCS4 = function() {
		return (65536 * (1 + Math.random()) | 0).toString(16).substring(1)
	}, window.vc_guid = function() {
		return window.VCS4() + window.VCS4() + "-" + window.VCS4()
	}, window.vc_button_param_target_callback = function() {
		var $link_target, $link_field;
		$link_target = this.$content.find("[name=target]").parents('[data-vc-ui-element="panel-shortcode-param"]:first'), $link_field = $(".wpb-edit-form [name=href]");
		var key_up_callback = _.debounce(function() {
			var val = $(this).val();
			0 < val.length && "http://" !== val && "https://" !== val ? $link_target.show() : $link_target.hide()
		}, 300);
		$link_field.on("keyup", key_up_callback).trigger("keyup")
	}, window.vc_cta_button_param_target_callback = function() {
		var $link_target, $link_field;
		$link_target = this.$content.find("[name=target]").parents('[data-vc-ui-element="panel-shortcode-param"]:first'), $link_field = $(".wpb-edit-form [name=href]");
		var key_up_callback = _.debounce(function() {
			var val = $(this).val();
			0 < val.length && "http://" !== val && "https://" !== val ? $link_target.show() : $link_target.hide()
		}, 300);
		$link_field.on("keyup", key_up_callback).trigger("keyup")
	}, window.vc_grid_exclude_dependency_callback = function() {
		var exclude_obj = $(".wpb_vc_param_value[name=exclude]", this.$content).data("vc-param-object");
		if (!exclude_obj) return !1;
		var post_type_object = $('select.wpb_vc_param_value[name="post_type"]', this.$content),
		val = post_type_object.val();
		exclude_obj.source_data = function(request, response) {
			return {
				query: {
					query: val,
					term: request.term
				}
			}
		}, exclude_obj.source_data_val = val, post_type_object.on("change", function() {
			val = $(this).val(), exclude_obj.source_data_val != val && (exclude_obj.source_data = function(request, response) {
				return {
					query: {
						query: val,
						term: request.term
					}
				}
			}, exclude_obj.$el.data("uiAutocomplete").destroy(), exclude_obj.$sortable_wrapper.find(".vc_data").remove(), exclude_obj.render(), exclude_obj.source_data_val = val)
		})
	}, window.vcGridFilterExcludeCallBack = function() {
		var $filterBy, $exclude, autocomplete, defaultValue;
		if ($filterBy = $(".wpb_vc_param_value[name=filter_source]", this.$content), defaultValue = $filterBy.val(), $exclude = $(".wpb_vc_param_value[name=exclude_filter]", this.$content), void 0 === (autocomplete = $exclude.data("vc-param-object"))) return !1;
		$filterBy.on("change", function() {
			var $this = $(this);
			defaultValue !== $this.val() && autocomplete.clearValue(), autocomplete.source_data = function() {
				return {
					vc_filter_by: $this.val()
				}
			}
		}).trigger("change")
	}, window.vcGridTaxonomiesCallBack = function() {
		var $filterByPostType, $taxonomies, autocomplete, defaultValue;
		if ($filterByPostType = $(".wpb_vc_param_value[name=post_type]", this.$content), defaultValue = $filterByPostType.val(), $taxonomies = $(".wpb_vc_param_value[name=taxonomies]", this.$content), void 0 === (autocomplete = $taxonomies.data("vc-param-object"))) return !1;
		$filterByPostType.on("change", function() {
			var $this = $(this);
			defaultValue !== $this.val() && autocomplete.clearValue(), autocomplete.source_data = function() {
				return {
					vc_filter_post_type: $filterByPostType.val()
				}
			}
		}).trigger("change")
	}, window.vcChartCustomColorDependency = function() {
		var $masterEl, $content;
		$masterEl = $(".wpb_vc_param_value[name=style]", this.$content), $content = this.$content, $masterEl.on("change", function() {
			var masterValue;
			masterValue = $(this).val(), $content.toggleClass("vc_chart-edit-form-custom-color", "custom" === masterValue)
		}), $masterEl.trigger("change")
	}, window.vc_wpnop = function(html) {
		if (html = void 0 !== html ? html + "" : "", window.switchEditors && void 0 !== window.switchEditors.pre_wpautop) return html = (html = window.switchEditors.pre_wpautop(html)).replace(/<p>(<!--(?:.*)-->)<\/p>/g, "$1");
		if (!html) return "";
		var blocklist = "blockquote|ul|ol|li|dl|dt|dd|table|thead|tbody|tfoot|tr|th|td|h[1-6]|fieldset|figure",
		blocklist1 = blocklist + "|div|p",
		blocklist2 = blocklist + "|pre",
		preserve_linebreaks = !1,
		preserve_br = !1,
		preserve = [];
		return -1 === html.indexOf("<script") && -1 === html.indexOf("<style") || (html = html.replace(/<(script|style)[^>]*>[\s\S]*?<\/\1>/g, function(match) {
			return preserve.push(match), "<wp-preserve>"
		})), -1 !== html.indexOf("<pre") && (preserve_linebreaks = !0, html = html.replace(/<pre[^>]*>[\s\S]+?<\/pre>/g, function(a) {
			return (a = (a = a.replace(/<br ?\/?>(\r\n|\n)?/g, "<wp-line-break>")).replace(/<\/?p( [^>]*)?>(\r\n|\n)?/g, "<wp-line-break>")).replace(/\r?\n/g, "<wp-line-break>")
		})), -1 !== html.indexOf("[caption") && (preserve_br = !0, html = html.replace(/\[caption[\s\S]+?\[\/caption\]/g, function(a) {
			return a.replace(/<br([^>]*)>/g, "<wp-temp-br$1>").replace(/[\r\n\t]+/, "")
		})), -1 !== (html = (html = (html = (html = (html = (html = (html = (html = (html = (html = (html = (html = (html = (html = (html = html.replace(new RegExp("\\s*</(" + blocklist1 + ")>\\s*", "g"), "</$1>\n")).replace(new RegExp("\\s*<((?:" + blocklist1 + ")(?: [^>]*)?)>", "g"), "\n<$1>")).replace(/(<p [^>]+>.*?)<\/p>/g, "$1</p#>")).replace(/<div( [^>]*)?>\s*<p>/gi, "<div$1>\n\n")).replace(/\s*<p>/gi, "")).replace(/\s*<\/p>\s*/gi, "\n\n")).replace(/\n[\s\u00a0]+\n/g, "\n\n")).replace(/(\s*)<br ?\/?>\s*/gi, function(match, space) {
			return space && -1 !== space.indexOf("\n") ? "\n\n" : "\n"
		})).replace(/\s*<div/g, "\n<div")).replace(/<\/div>\s*/g, "</div>\n")).replace(/\s*\[caption([^\[]+)\[\/caption\]\s*/gi, "\n\n[caption$1[/caption]\n\n")).replace(/caption\]\n\n+\[caption/g, "caption]\n\n[caption")).replace(new RegExp("\\s*<((?:" + blocklist2 + ")(?: [^>]*)?)\\s*>", "g"), "\n<$1>")).replace(new RegExp("\\s*</(" + blocklist2 + ")>\\s*", "g"), "</$1>\n")).replace(/<((li|dt|dd)[^>]*)>/g, " \t<$1>")).indexOf("<option") && (html = (html = html.replace(/\s*<option/g, "\n<option")).replace(/\s*<\/select>/g, "\n</select>")), -1 !== html.indexOf("<hr") && (html = html.replace(/\s*<hr( [^>]*)?>\s*/g, "\n\n<hr$1>\n\n")), -1 !== html.indexOf("<object") && (html = html.replace(/<object[\s\S]+?<\/object>/g, function(a) {
			return a.replace(/[\r\n]+/g, "")
		})), html = (html = (html = (html = html.replace(/<\/p#>/g, "</p>\n")).replace(/\s*(<p [^>]+>[\s\S]*?<\/p>)/g, "\n$1")).replace(/^\s+/, "")).replace(/[\s\u00a0]+$/, ""), preserve_linebreaks && (html = html.replace(/<wp-line-break>/g, "\n")), preserve_br && (html = html.replace(/<wp-temp-br([^>]*)>/g, "<br$1>")), preserve.length && (html = html.replace(/<wp-preserve>/g, function() {
			return preserve.shift()
		})), html
	}, window.vc_wpautop = function(text) {
		if (text = void 0 !== text ? text + "" : "", window.switchEditors && void 0 !== window.switchEditors.wpautop) return text = (text = window.switchEditors.wpautop(text)).replace(/<p>(<!--(?:.*)-->)<\/p>/g, "$1");
		var preserve_linebreaks = !1,
		preserve_br = !1,
		blocklist = "table|thead|tfoot|caption|col|colgroup|tbody|tr|td|th|div|dl|dd|dt|ul|ol|li|pre|form|map|area|blockquote|address|math|style|p|h[1-6]|hr|fieldset|legend|section|article|aside|hgroup|header|footer|nav|figure|figcaption|details|menu|summary";
		return -1 !== (text = text.replace(/\r\n|\r/g, "\n")).indexOf("<object") && (text = text.replace(/<object[\s\S]+?<\/object>/g, function(a) {
			return a.replace(/\n+/g, "")
		})), -1 === (text = text.replace(/<[^<>]+>/g, function(a) {
			return a.replace(/[\n\t ]+/g, " ")
		})).indexOf("<pre") && -1 === text.indexOf("<script") || (preserve_linebreaks = !0, text = text.replace(/<(pre|script)[^>]*>[\s\S]*?<\/\1>/g, function(a) {
			return a.replace(/\n/g, "<wp-line-break>")
		})), -1 !== text.indexOf("<figcaption") && (text = (text = text.replace(/\s*(<figcaption[^>]*>)/g, "$1")).replace(/<\/figcaption>\s*/g, "</figcaption>")), -1 !== text.indexOf("[caption") && (preserve_br = !0, text = text.replace(/\[caption[\s\S]+?\[\/caption\]/g, function(a) {
			return (a = (a = a.replace(/<br([^>]*)>/g, "<wp-temp-br$1>")).replace(/<[^<>]+>/g, function(b) {
				return b.replace(/[\n\t ]+/, " ")
			})).replace(/\s*\n\s*/g, "<wp-temp-br />")
		})), text = (text = (text = (text = (text = (text = (text = (text = (text = (text = (text = (text = (text = (text = (text = (text = (text = (text = (text = (text = (text = (text += "\n\n").replace(/<br \/>\s*<br \/>/gi, "\n\n")).replace(new RegExp("(<(?:" + blocklist + ")(?: [^>]*)?>)", "gi"), "\n\n$1")).replace(new RegExp("(</(?:" + blocklist + ")>)", "gi"), "$1\n\n")).replace(/<hr( [^>]*)?>/gi, "<hr$1>\n\n")).replace(/\s*<option/gi, "<option")).replace(/<\/option>\s*/gi, "</option>")).replace(/\n\s*\n+/g, "\n\n")).replace(/([\s\S]+?)\n\n/g, "<p>$1</p>\n")).replace(/<p>\s*?<\/p>/gi, "")).replace(new RegExp("<p>\\s*(</?(?:" + blocklist + ")(?: [^>]*)?>)\\s*</p>", "gi"), "$1")).replace(/<p>(<li.+?)<\/p>/gi, "$1")).replace(/<p>\s*<blockquote([^>]*)>/gi, "<blockquote$1><p>")).replace(/<\/blockquote>\s*<\/p>/gi, "</p></blockquote>")).replace(new RegExp("<p>\\s*(</?(?:" + blocklist + ")(?: [^>]*)?>)", "gi"), "$1")).replace(new RegExp("(</?(?:" + blocklist + ")(?: [^>]*)?>)\\s*</p>", "gi"), "$1")).replace(/(<br[^>]*>)\s*\n/gi, "$1")).replace(/\s*\n/g, "<br />\n")).replace(new RegExp("(</?(?:" + blocklist + ")[^>]*>)\\s*<br />", "gi"), "$1")).replace(/<br \/>(\s*<\/?(?:p|li|div|dl|dd|dt|th|pre|td|ul|ol)>)/gi, "$1")).replace(/(?:<p>|<br ?\/?>)*\s*\[caption([^\[]+)\[\/caption\]\s*(?:<\/p>|<br ?\/?>)*/gi, "[caption$1[/caption]")).replace(/(<(?:div|th|td|form|fieldset|dd)[^>]*>)(.*?)<\/p>/g, function(a, b, c) {
			return c.match(/<p( [^>]*)?>/) ? a : b + "<p>" + c + "</p>"
		}), preserve_linebreaks && (text = text.replace(/<wp-line-break>/g, "\n")), preserve_br && (text = text.replace(/<wp-temp-br([^>]*)>/g, "<br$1>")), text = text.replace(/<p>(<!--(?:.*)-->)<\/p>/g, "$1")
	}, window.vc_regexp_shortcode = _.memoize(function() {
		return RegExp("\\[(\\[?)([\\w|-]+\\b)(?![\\w-])([^\\]\\/]*(?:\\/(?!\\])[^\\]\\/]*)*?)(?:(\\/)\\]|\\](?:([^\\[]*(?:\\[(?!\\/\\2\\])[^\\[]*)*)(\\[\\/\\2\\]))?)(\\]?)")
	}), window.vcAddShortcodeDefaultParams = function(model) {
		var params = model.get("params"),
		preset = model.get("preset");
		params = _.extend({}, vc.getDefaults(model.get("shortcode")), params), preset && window.vc_all_presets[preset] && (params = window.vc_all_presets[preset], void 0 !== vc.frame_window && window.vc_all_presets[preset].css && vc.frame_window.vc_iframe.setCustomShortcodeCss(window.vc_all_presets[preset].css)), model.set({
			params: params
		}, {
			silent: !0
		})
	}, window.vc_globalHashCode = function(obj) {
		return "string" != typeof obj && (obj = JSON.stringify(obj)), obj.length ? obj.split("").reduce(function(a, b) {
			return (a = (a << 5) - a + b.charCodeAt(0)) & a
		}, 0) : 0
	}, vc.memoizeWrapper = function(func, resolver) {
		var cache = {};
		return function() {
			var key = resolver ? resolver.apply(this, arguments) : arguments[0];
			return _.hasOwnProperty.call(cache, key) || (cache[key] = func.apply(this, arguments)), _.isObject(cache[key]) ? window.jQuery.fn.extend(!0, {}, cache[key]) : cache[key]
		}
	}, window.vcChartParamAfterAddCallback = function($elem, action) {
		if ("new" !== action && "clone" !== action || $elem.find(".vc_control.column_toggle").click(), "new" === action) {
			var i, $select, $options, random, exclude, colors;
			for (exclude = ["white", "black"], $options = ($select = $elem.find("[name=values_color]")).find("option"), i = 0; !(100 < i++);)
			if (random = Math.floor(Math.random() * $options.length), -1 === window.jQuery.inArray($options.eq(random).val(), exclude)) {
				$options.eq(random).prop("selected", !0), $select.change();
				break
			} colors = ["#5472d2", "#00c1cf", "#fe6c61", "#8d6dc4", "#4cadc9", "#cec2ab", "#50485b", "#75d69c", "#f7be68", "#5aa1e3", "#6dab3c", "#f4524d", "#f79468", "#b97ebb", "#ebebeb", "#f7f7f7", "#0088cc", "#58b9da", "#6ab165", "#ff9900", "#ff675b", "#555555"], random = Math.floor(Math.random() * colors.length), $elem.find("[name=values_custom_color]").val(colors[random]).change()
		}
	}, vc.events.on("shortcodes:vc_row:add:param:name:parallax shortcodes:vc_row:update:param:name:parallax", function(model, value) {
		if (value) {
			var params = model.get("params");
			params && params.css && (params.css = params.css.replace(/(background(\-position)?\s*\:\s*[\S]+(\s*[^\!\s]+)?)[\s*\!important]*/g, "$1"), model.set("params", params, {
				silent: !0
			}))
		}
	}), vc.events.on("shortcodes:vc_single_image:sync shortcodes:vc_single_image:add", function(model) {
		var params = model.get("params");
		params.link && !params.onclick && (params.onclick = "custom_link", model.save({
			params: params
		}))
	}), window.vcEscapeHtml = function(text) {
		var map = {
			"&": "&amp;",
			"<": "&lt;",
			">": "&gt;",
			'"': "&quot;",
			"'": "&#039;"
		};
		return null == text ? "" : text.replace(/[&<>"']/g, function(m) {
			return map[m]
		})
	}, window.vc_slugify = function(text) {
		return text.toLowerCase().replace(/[^\w ]+/g, "").replace(/ +/g, "-")
	}
}(window.vc, window._, window.jQuery), window.jQuery.expr[":"].containsi = function(a, i, m) {
	return 0 <= window.jQuery(a).text().toUpperCase().indexOf(m[3].toUpperCase())
},
function($, _) {
	"use strict";
	var attachmentCompatRender, attachCb = [],
	media = wp.media,
	origFeaturedImageSet = media.featuredImage.set,
	origEditorSendAttachment = media.editor.send.attachment,
	l10n = i18nLocale,
	workflows = {};
	
	function processImages(attachments, callback) {
		var ids = attachments.models ? attachments.pluck("id") : attachments;
		$.ajax({
			dataType: "json",
			type: "POST",
			url: window.ajaxurl,
			data: {
				action: "vc_media_editor_add_image",
				filters: window.vc_selectedFilters,
				ids: ids,
				vc_inline: !0,
				_vcnonce: window.vcAdminNonce
			}
		}).done(function(response) {
			var models, attachment, i;
			if ("function" == typeof callback) {
				for (models = [], i = 0; i < response.data.ids.length; i++) attachment = (attachment = "function" == typeof attachment ? attachments.get(response.data.ids[i]) : attachments[response.data.ids[i]]) || media.model.Attachment.get(response.data.ids[i]), models.push(attachment);
				var promises = function(models) {
					for (var promises = [], i = 0; i < models.length; i++) models[i].get("url") || promises.push(models[i].fetch());
					return promises
				}(models);
				$.when.apply($, promises).done(function() {
					callback(models)
				})
			}
		}).fail(function(response) {
			$(".media-modal-close").click(), attachCb = [], window.vc && window.vc.active_panel && window.i18nLocale && window.i18nLocale.error_while_saving_image_filtered && window.vc.active_panel.showMessage(window.i18nLocale.error_while_saving_image_filtered, "error"), window.console && window.console.warn && window.console.warn("processImages failed", response)
		}).always(function() {
			$(".media-modal").removeClass("processing-media")
		})
	}
	
	function previewFilter(attachmentId) {
		var $previewContainer, $preview, $filter;
		if (($filter = $(".media-frame:visible [data-vc-preview-image-filter=" + attachmentId + "]")).length) {
			if ($previewContainer = $(".media-frame:visible .attachment-info .thumbnail-image").eq(-1), $preview = $previewContainer.find("img"), $previewContainer.addClass("loading"), $preview.data("original-src") || $preview.data("original-src", $preview.attr("src")), !$filter.val().length) return $preview.attr("src", $preview.data("original-src")), void $previewContainer.removeClass("loading");
			$.ajax({
				type: "POST",
				dataType: "json",
				url: window.ajaxurl,
				data: {
					action: "vc_media_editor_preview_image",
					filter: $filter.val(),
					attachment_id: attachmentId,
					preferred_size: window.getUserSetting("imgsize", "medium"),
					_vcnonce: window.vcAdminNonce
				}
			}).done(function(response) {
				response.success && response.data.src.length && $preview.attr("src", response.data.src)
			}).fail(function(jqXHR, textStatus, errorThrown) {
				window.console.warn("Filter preview failed:", textStatus, errorThrown)
			}).always(function() {
				$previewContainer.removeClass("loading")
			})
		}
	}
	attachmentCompatRender = _.extend(media.view.AttachmentCompat.prototype.render), media.view.AttachmentCompat.prototype.render = function() {
		var attachmentId, that = this;
		return attachmentId = this.model.get("id"), attachmentCompatRender.call(this), _.defer(function() {
			var $container, html, $filter, $input;
			$container = that.controller.$el.find(".attachment-info"), $input = that.controller.$el.find("[data-vc-preview-image-filter]"), $container.length && $input.length && (html = '<label class="setting vc-image-filter-setting">', html += '<span class="name">' + $input.parent().find(".vc-filter-label").text() + "</span>", html += $input[0].outerHTML, html += "</label>", $container.before(html), $input.parents("tr").remove()), void 0 !== window.vc_selectedFilters && void 0 !== window.vc_selectedFilters[attachmentId] && ($filter = $(".media-frame:visible [data-vc-preview-image-filter=" + attachmentId + "]")).length && $filter.val(window.vc_selectedFilters[attachmentId]).change(), previewFilter(attachmentId)
		}), this
	}, media.editor.send.attachment = function(props, attachment) {
		attachCb.push(attachment.id), processImages([attachment.id], function(newAttachment) {
			var attachment = newAttachment.slice(0).pop().attributes;
			origEditorSendAttachment(props, attachment).done(function(html) {
				! function origEditorSendAttachmentCallback(html, id) {
					attachCb && attachCb[0] !== id ? setTimeout(function() {
						origEditorSendAttachmentCallback(html, id)
					}, 50) : (attachCb.shift(), media.editor.insert(html))
				}(html, attachment.id)
			})
		})
	}, media.featuredImage.set = function(id) {
		var ids = [id]; - 1 !== id ? $.ajax({
			type: "POST",
			url: window.ajaxurl,
			data: {
				action: "vc_media_editor_add_image",
				filters: window.vc_selectedFilters,
				ids: ids,
				_vcnonce: window.vcAdminNonce
			}
		}).done(function(response) {
			var newId;
			!0 === response.success && response.data.ids.length ? (newId = response.data.ids.pop(), origFeaturedImageSet(newId)) : origFeaturedImageSet(id)
		}).fail(function() {
			origFeaturedImageSet(id)
		}) : origFeaturedImageSet(id)
	}, media.controller.VcSingleImage = media.controller.FeaturedImage.extend({
		defaults: _.defaults({
			id: "vc_single-image",
			filterable: "uploaded",
			multiple: !1,
			toolbar: "vc_single-image",
			title: l10n.set_image,
			priority: 60,
			syncSelection: !1
		}, media.controller.Library.prototype.defaults),
		updateSelection: function() {
			var attachments, selection = this.get("selection"),
			ids = media.vc_editor.getData();
			void 0 !== ids && "" !== ids && -1 !== ids && (attachments = _.map(ids.toString().split(/,/), function(id) {
				var attachment = media.model.Attachment.get(id);
				return attachment.get("url") && attachment.get("url").length || attachment.fetch(), attachment
			})), selection.reset(attachments)
		}
	}), media.controller.VcGallery = media.controller.VcSingleImage.extend({
		defaults: _.defaults({
			id: "vc_gallery",
			title: l10n.add_images,
			toolbar: "main-insert",
			filterable: "uploaded",
			library: media.query({
				type: "image"
			}),
			multiple: "add",
			editable: !0,
			priority: 60,
			syncSelection: !1
		}, media.controller.Library.prototype.defaults)
	}), media.VcSingleImage = {
		getData: function() {
			return this.$hidden_ids.val()
		},
		set: function(selection) {
			var template = vc.template($("#vc_settings-image-block").html(), vc.templateOptions.custom);
			return this.$img_ul.html(template(selection)), this.$clear_button.show(), this.$hidden_ids.val(selection.id).trigger("change"), !1
		},
		frame: function(element) {
			window.vc_selectedFilters = {};
			this.element = element;
			this.$button = $(this.element);
			this.$block = this.$button.closest(".edit_form_line");
			this.$hidden_ids = this.$block.find(".gallery_widget_attached_images_ids");
			this.$img_ul = this.$block.find(".gallery_widget_attached_images_list");
			this.$clear_button = this.$img_ul.next();
			this._frame || (this._frame = media({
				state: "vc_single-image",
				states: [new media.controller.VcSingleImage]
			}), this._frame.on("toolbar:create:vc_single-image", function(toolbar) {
				this.createSelectToolbar(toolbar, {
					text: l10n.set_image,
					close: !1
				})
			}, this._frame), this._frame.state("vc_single-image").on("select", this.select));
			return this._frame
		},
		select: function() {
			var selection = this.get("selection");
			vc.events.trigger("click:media_editor:add_image", selection, "single")
		}
	}, media.view.MediaFrame.VcGallery = media.view.MediaFrame.Post.extend({
		createStates: function() {
			this.states.add([new media.controller.VcGallery])
		},
		bindHandlers: function() {
			media.view.MediaFrame.Select.prototype.bindHandlers.apply(this, arguments), this.on("toolbar:create:main-insert", this.createToolbar, this);
			_.each({
				content: {
					embed: "embedContent",
					"edit-selection": "editSelectionContent"
				},
				toolbar: {
					"main-insert": "mainInsertToolbar"
				}
			}, function(regionHandlers, region) {
				_.each(regionHandlers, function(callback, handler) {
					this.on(region + ":render:" + handler, this[callback], this)
				}, this)
			}, this)
		},
		mainInsertToolbar: function(view) {
			var controller = this;
			this.selectionStatusToolbar(view), view.set("insert", {
				style: "primary",
				priority: 80,
				text: l10n.add_images,
				requires: {
					selection: !0
				},
				click: function() {
					var state = controller.state(),
					selection = state.get("selection");
					vc.events.trigger("click:media_editor:add_image", selection, "gallery"), state.trigger("insert", selection)
				}
			})
		}
	}), media.vc_editor = _.clone(media.editor), _.extend(media.vc_editor, {
		$vc_editor_element: null,
		getData: function() {
			return media.vc_editor.$vc_editor_element.closest(".edit_form_line").find(".gallery_widget_attached_images_ids").val()
		},
		insert: function(images) {
			var $block = media.vc_editor.$vc_editor_element.closest(".edit_form_line"),
			$hidden_ids = $block.find(".gallery_widget_attached_images_ids"),
			$img_ul = $block.find(".gallery_widget_attached_images_list"),
			$thumbnails_string = "",
			template = vc.template($("#vc_settings-image-block").html(), vc.templateOptions.custom);
			_.each(images, function(image) {
				$thumbnails_string += template(image)
			}), $hidden_ids.val(_.map(images, function(image) {
				return image.id
			}).join(",")).trigger("change"), $img_ul.html($thumbnails_string)
		},
		open: function(id) {
			var workflow;
			return id = this.id(id), workflow = (workflow = this.get(id)) || this.add(id), window.vc_selectedFilters = {}, workflow.open()
		},
		add: function(id, options) {
			var workflow = this.get(id);
			return workflow || (workflows[id] ? workflows[id] : workflow = workflows[id] = new media.view.MediaFrame.VcGallery(_.defaults(options || {}, {
				state: "vc_gallery",
				title: l10n.add_images,
				library: {
					type: "image"
				},
				multiple: !0
			})))
		},
		init: function() {
			$("body").unbind("click.vcGalleryWidget").on("click.vcGalleryWidget", ".gallery_widget_add_images", function(event) {
				event.preventDefault();
				var $this = $(this);
				media.vc_editor.$vc_editor_element = $(this), "true" !== $this.attr("use-single") ? ($this.blur(), media.vc_editor.open("visual-composer")) : media.VcSingleImage.frame(this).open("vc_editor")
			})
		}
	}), _.bindAll(media.vc_editor, "open"), $(document).ready(function() {
		media.vc_editor.init()
	}), vc.events.on("click:media_editor:add_image", function(selection, type) {
		$(".media-modal").addClass("processing-media"), processImages(selection, function(newAttachments) {
			var attachments, objects;
			switch (attachments = _.map(newAttachments, function(newAttachment) {
				return newAttachment.attributes
			}), selection.reset(attachments), objects = _.map(selection.models, function(model) {
				return model.attributes
			}), void 0 === type && (type = ""), type) {
				case "gallery":
				media.vc_editor.insert(objects);
				break;
				case "single":
				media.VcSingleImage.set(objects[0])
			}
			$(".media-modal").removeClass("processing-media"), $(".media-modal-close").click()
		})
	}), $("body").on("change", "[data-vc-preview-image-filter]", function() {
		var id;
		id = $(this).data("vcPreviewImageFilter"), void 0 === window.vc_selectedFilters && (window.vc_selectedFilters = {}), window.vc_selectedFilters[id] = $(this).val(), previewFilter(id)
	})
}(window.jQuery, window._), _.isUndefined(window.vc) && (window.vc = {}), window.vc.filters = {
	templates: []
}, window.vc.addTemplateFilter = function(callback) {
	_.isFunction(callback) && this.filters.templates.push(callback)
},
function($) {
	"use strict";
	
	function fixedEncodeURIComponent(str) {
		return encodeURIComponent(str).replace(/[!'()*]/g, escape)
	}
	
	function Suggester(element, options) {
		this.el = element, this.$el = $(this.el), this.$el_wrap = "", this.$block = "", this.suggester = "", this.selected_items = [], this.options = _.isObject(options) ? options : {}, _.defaults(this.options, {
			css_class: "vc_suggester",
			limit: !1,
			source: {},
			predefined: [],
			locked: !1,
			select_callback: function(label, data) {},
			remove_callback: function(label, data) {},
			update_callback: function(label, data) {},
			check_locked_callback: function(el, data) {
				return !1
			}
		}), this.init()
	}
	window.init_textarea_html = function($element) {
		var $wp_link, textfield_id, $form_line, $content_holder;
		($wp_link = $("#wp-link")).parent().hasClass("wp-dialog") && $wp_link.wpdialog("destroy"), textfield_id = $element.attr("id"), $content_holder = ($form_line = $element.closest(".edit_form_line")).find(".vc_textarea_html_content");
		try {
			_.isUndefined(tinyMCEPreInit.qtInit[textfield_id]) && (window.tinyMCEPreInit.qtInit[textfield_id] = _.extend({}, window.tinyMCEPreInit.qtInit[window.wpActiveEditor], {
				id: textfield_id
			})), window.tinyMCEPreInit && window.tinyMCEPreInit.mceInit[window.wpActiveEditor] && (window.tinyMCEPreInit.mceInit[textfield_id] = _.extend({}, window.tinyMCEPreInit.mceInit[window.wpActiveEditor], {
				resize: "vertical",
				height: 200,
				id: textfield_id,
				setup: function(ed) {
					void 0 !== ed.on ? ed.on("init", function(ed) {
						window.wpActiveEditor = textfield_id
					}) : ed.onInit.add(function(ed) {
						window.wpActiveEditor = textfield_id
					})
				}
			}), window.tinyMCEPreInit.mceInit[textfield_id].plugins = window.tinyMCEPreInit.mceInit[textfield_id].plugins.replace(/,?wpfullscreen/, ""), window.tinyMCEPreInit.mceInit[textfield_id].wp_autoresize_on = !1), vc.edit_element_block_view && vc.edit_element_block_view.currentModelParams ? $element.val(vc_wpautop(vc.edit_element_block_view.currentModelParams[$content_holder.attr("name")] || "")) : $element.val($content_holder.val()), quicktags(window.tinyMCEPreInit.qtInit[textfield_id]), QTags._buttonsInit(), window.tinymce && (window.switchEditors && window.switchEditors.go(textfield_id, "tmce"), "4" === tinymce.majorVersion && tinymce.execCommand("mceAddEditor", !0, textfield_id)), window.wpActiveEditor = textfield_id
		} catch (e) {
			$element.data("vcTinyMceDisabled", !0).appendTo($form_line), $("#wp-" + textfield_id + "-wrap").remove(), console && console.error && (console.error("VC: Tinymce error! Compatibility problem with other plugins."), console.error(e))
		}
	}, Color.prototype.toString = function() {
		if (this._alpha < 1) return this.toCSS("rgba", this._alpha).replace(/\s+/g, "");
		var hex = parseInt(this._color, 10).toString(16);
		if (this.error) return "";
		if (hex.length < 6)
		for (var i = 6 - hex.length - 1; 0 <= i; i--) hex = "0" + hex;
		return "#" + hex
	}, vc.loop_partial = function(template_name, key, loop, settings) {
		var data = _.isObject(loop) && !_.isUndefined(loop[key]) ? loop[key] : "";
		return vc.template($("#_vcl-" + template_name).html(), vc.templateOptions.custom)({
			name: key,
			data: data,
			settings: settings
		})
	}, vc.loop_field_not_hidden = function(key, loop) {
		return !(_.isObject(loop[key]) && _.isBoolean(loop[key].hidden) && !0 === loop[key].hidden)
	}, vc.is_locked = function(data) {
		return _.isObject(data) && _.isBoolean(data.locked) && !0 === data.locked
	}, Suggester.prototype = {
		constructor: Suggester,
		init: function() {
			_.bindAll(this, "buildSource", "itemSelected", "labelClick", "setFocus", "resize"), this.$el.wrap('<ul class="' + this.options.css_class + '"><li class="input"/></ul>'), this.$el_wrap = this.$el.parent(), this.$block = this.$el_wrap.closest("ul").append($('<li class="clear"/>')), this.$el.on("focus", this.resize).on("blur", function() {
				$(this).parent().width(170), $(this).val("")
			}), this.$block.on("click", this.setFocus), this.suggester = this.$el.data("suggest"), this.$el.autocomplete({
				source: this.buildSource,
				select: this.itemSelected,
				minLength: 2,
				focus: function(event, ui) {
					return !1
				}
			}).data("ui-autocomplete")._renderItem = function(ul, item) {
				return $('<li data-value="' + item.value + '">').append("<a>" + item.name + "</a>").appendTo(ul)
			}, this.$el.autocomplete("widget").addClass("vc_ui-front"), _.isArray(this.options.predefined) && _.each(this.options.predefined, function(item) {
				this.create(item)
			}, this)
		},
		resize: function() {
			var position = this.$el_wrap.position(),
			block_position = this.$block.position();
			this.$el_wrap.width(parseFloat(this.$block.width()) - (parseFloat(position.left) - parseFloat(block_position.left) + 4))
		},
		setFocus: function(e) {
			e.preventDefault(), $(e.target).hasClass(this.options.css_class) && this.$el.trigger("focus")
		},
		itemSelected: function(event, ui) {
			return this.$el.blur(), this.create(ui.item), this.$el.focus(), !1
		},
		create: function(item) {
			var $label, exclude_css, index = this.selected_items.push(item) - 1,
			remove = !0 === this.options.check_locked_callback(this.$el, item) ? "" : ' <a class="remove">&times;</a>';
			_.isUndefined(this.selected_items[index].action) && (this.selected_items[index].action = "+"), exclude_css = "-" === this.selected_items[index].action ? " exclude" : " include", ($label = $('<li class="vc_suggest-label' + exclude_css + '" data-index="' + index + '" data-value="' + item.value + '"><span class="label">' + item.name + "</span>" + remove + "</li>")).insertBefore(this.$el_wrap), _.isEmpty(remove) || $label.on("click", this.labelClick), this.options.select_callback($label, this.selected_items)
		},
		labelClick: function(e) {
			e.preventDefault();
			var $label = $(e.currentTarget),
			index = parseInt($label.data("index"), 10);
			if ($(e.target).is(".remove")) return this.selected_items.splice(index, 1), this.options.remove_callback($label, this.selected_items), $label.remove(), !1;
			this.selected_items[index].action = "+" === this.selected_items[index].action ? "-" : "+", "+" === this.selected_items[index].action ? $label.removeClass("exclude").addClass("include") : $label.removeClass("include").addClass("exclude"), this.options.update_callback($label, this.selected_items)
		},
		buildSource: function(request, response) {
			this.ajax && (this.ajax.abort(), response([]), this.ajax = !1);
			var exclude = _.filter(_.map(this.selected_items, function(item) {
				return item ? item.value : void 0
			})).join(",");
			this.ajax = $.ajax({
				type: "POST",
				dataType: "json",
				url: window.ajaxurl,
				data: {
					action: "wpb_get_loop_suggestion",
					field: this.suggester,
					exclude: exclude,
					query: request.term,
					_vcnonce: window.vcAdminNonce
				}
			}).done(function(data) {
				response(data)
			})
		}
	}, $.fn.suggester = function(option) {
		return this.each(function() {
			var $this = $(this),
			data = $this.data("suggester");
			data || $this.data("suggester", data = new Suggester(this, option)), "string" == typeof option && data[option]()
		})
	};
	var VcLoopEditorView = Backbone.View.extend({
		className: "loop_params_holder",
		events: {
			"click input, select": "save",
			"change input, select": "save",
			"change :checkbox[data-input]": "updateCheckbox"
		},
		query_options: {},
		return_array: {},
		controller: "",
		initialize: function() {
			_.bindAll(this, "save", "updateSuggestion", "suggestionLocked")
		},
		render: function(controller) {
			var template = vc.template($("#vcl-loop-frame").html(), _.extend({}, vc.templateOptions.custom, {
				variable: "loop"
			}));
			return this.controller = controller, this.$el.html(template(this.model)), this.controller.$el.append(this.$el), _.each($("[data-suggest]"), function(object) {
				var $field = $(object),
				current_value = window.decodeURIComponent($("[data-suggest-prefill=" + $field.data("suggest") + "]").val());
				$field.suggester({
					predefined: $.parseJSON(current_value),
					select_callback: this.updateSuggestion,
					update_callback: this.updateSuggestion,
					remove_callback: this.updateSuggestion,
					check_locked_callback: this.suggestionLocked
				})
			}, this), this.save(), this
		},
		show: function() {
			this.$el.slideDown()
		},
		save: function(e) {
			this.return_array = {}, _.each(this.model, function(value, key) {
				var parsedValue = this.getValue(key, value);
				_.isString(parsedValue) && !_.isEmpty(parsedValue) && (this.return_array[key] = parsedValue)
			}, this), this.controller.setInputValue(this.return_array)
		},
		getValue: function(key) {
			return $("[name=" + key + "]", this.$el).val()
		},
		hide: function() {
			this.$el.slideUp()
		},
		toggle: function() {
			this.$el.is(":animated") || this.$el.slideToggle()
		},
		updateCheckbox: function(e) {
			var input_name = $(e.currentTarget).data("input"),
			$input = $("[data-name=" + input_name + "]", this.$el),
			value = [];
			$("[data-input=" + input_name + "]:checked").each(function() {
				value.push($(this).val())
			}), $input.val(value), this.save()
		},
		updateSuggestion: function($elem, data) {
			var value, $suggestion_block = $elem.closest("[data-block=suggestion]");
			value = _.reduce(data, function(memo, label) {
				return _.isEmpty(label) ? "" : memo + (_.isEmpty(memo) ? "" : ",") + ("-" === label.action ? "-" : "") + label.value
			}, "").trim(), $suggestion_block.find("[data-suggest-value]").val(value).trigger("change")
		},
		suggestionLocked: function($elem, data) {
			var value, field;
			return value = data.value, field = $elem.closest("[data-block=suggestion]").find("[data-suggest-value]").data("suggest-value"), this.controller.settings && this.controller.settings[field] && _.isBoolean(this.controller.settings[field].locked) && 1 == this.controller.settings[field].locked && _.isString(this.controller.settings[field].value) && 0 <= _.indexOf(this.controller.settings[field].value.replace("-", "").split(/\,/), "" + value)
		}
	}),
	VcLoop = Backbone.View.extend({
		events: {
			"click .vc_loop-build": "showEditor"
		},
		initialize: function() {
			_.bindAll(this, "createEditor"), this.$input = $(".wpb_vc_param_value", this.$el), this.$button = this.$el.find(".vc_loop-build"), this.data = this.$input.val(), this.settings = $.parseJSON(window.decodeURIComponent(this.$button.data("settings")))
		},
		render: function() {
			return this
		},
		showEditor: function(e) {
			if (e.preventDefault(), _.isObject(this.loop_editor_view)) return this.loop_editor_view.toggle(), !1;
			$.ajax({
				type: "POST",
				dataType: "json",
				url: window.ajaxurl,
				data: {
					action: "wpb_get_loop_settings",
					value: this.data,
					settings: this.settings,
					post_id: vc_post_id,
					_vcnonce: window.vcAdminNonce
				}
			}).done(this.createEditor)
		},
		createEditor: function(data) {
			this.loop_editor_view = new VcLoopEditorView({
				model: _.isEmpty(data) ? {} : data
			}), this.loop_editor_view.render(this).show()
		},
		setInputValue: function(value) {
			this.$input.val(_.map(value, function(value, key) {
				return key + ":" + value
			}).join("|"))
		}
	}),
	VcOptionsField = Backbone.View.extend({
		events: {
			"click .vc_options-edit": "showEditor",
			"click .vc_close-button": "showEditor",
			"click input, select": "save",
			"change input, select": "save",
			"keyup input": "save"
		},
		data: {},
		fields: {},
		initialize: function() {
			this.$button = this.$el.find(".vc_options-edit"), this.$form = this.$el.find(".vc_options-fields"), this.$input = this.$el.find(".wpb_vc_param_value"), this.settings = this.$form.data("settings"), this.parseData(), this.render()
		},
		render: function() {
			var html = "";
			return _.each(this.settings, function(field) {
				_.isUndefined(this.data[field.name]) ? _.isUndefined(field.value) || (field.value = field.value.toString().split(","), this.data[field.name] = field.value) : field.value = this.data[field.name], this.fields[field.name] = field;
				var $field = $("#vcl-options-field-" + field.type);
				if ($field.is("script")) {
					var template = vc.template($field.html(), vc.templateOptions.custom);
					html += template(_.extend({}, {
						name: "",
						label: "",
						value: [],
						options: "",
						description: ""
					}, field))
				}
			}, this), this.$form.html(html + this.$form.html()), this
		},
		parseData: function() {
			_.each(this.$input.val().split("|"), function(data) {
				if (data.match(/\:/)) {
					var split = data.split(":"),
					name = split[0],
					value = split[1];
					this.data[name] = _.map(value.split(","), function(v) {
						return window.decodeURIComponent(v)
					})
				}
			}, this)
		},
		saveData: function() {
			var data_string = _.map(this.data, function(value, key) {
				return key + ":" + _.map(value, function(v) {
					return window.encodeURIComponent(v)
				}).join(",")
			}).join("|");
			this.$input.val(data_string)
		},
		showEditor: function() {
			this.$form.slideToggle()
		},
		save: function(e) {
			var $field = $(e.currentTarget);
			if ($field.is(":checkbox")) {
				var value = [];
				this.$el.find("input[name=" + $field.attr("name") + "]").each(function() {
					this.checked && value.push($(this).val())
				}), this.data[$field.attr("name")] = value
			} else this.data[$field.attr("name")] = [$field.val()];
			this.saveData()
		}
	});
	
	function VcSortedList(element, settings) {
		this.el = element, this.$el = $(this.el), this.$data_field = this.$el.find(".wpb_vc_param_value"), this.$toolbar = this.$el.find(".vc_sorted-list-toolbar"), this.$current_control = this.$el.find(".vc_sorted-list-container"), _.defaults(this.options, {}), this.init()
	}
	VcSortedList.prototype = {
		constructor: VcSortedList,
		init: function() {
			_.bindAll(this, "controlEvent", "save"), this.$toolbar.on("change", "input", this.controlEvent);
			
			function iteratee(item) {
				return window.decodeURIComponent(item)
			}
			var selected_data = this.$data_field.val().split(",");
			for (var i in selected_data) {
				var control_settings, $control;
				!1 !== ($control = !(!(control_settings = selected_data[i].split("|")).length || !control_settings[0].length) && this.$toolbar.find("[data-element=" + decodeURIComponent(control_settings[0]) + "]")) && $control.is("input") && ($control.prop("checked", !0), this.createControl({
					value: $control.val(),
					label: $control.parent().text(),
					sub: $control.data("subcontrol"),
					sub_value: _.map(control_settings.slice(1), iteratee)
				}))
			}
			this.$current_control.sortable({
				stop: this.save
			}).on("change", "select", this.save)
		},
		createControl: function(data) {
			var sub_control = "",
			selected_sub_value = _.isUndefined(data.sub_value) ? [] : data.sub_value;
			_.isArray(data.sub) && _.each(data.sub, function(sub, index) {
				sub_control += " <select>", _.each(sub, function(item) {
					sub_control += '<option value="' + item[0] + '"' + (_.isString(selected_sub_value[index]) && selected_sub_value[index] === item[0] ? ' selected="true"' : "") + ">" + item[1] + "</option>"
				}), sub_control += "</select>"
			}, this), this.$current_control.append('<li class="vc_control-' + data.value + '" data-name="' + data.value + '">' + data.label + sub_control + "</li>")
		},
		controlEvent: function(e) {
			var $control = $(e.currentTarget);
			$control[0].checked ? this.createControl({
				value: $control.val(),
				label: $control.parent().text(),
				sub: $control.data("subcontrol")
			}) : this.$current_control.find(".vc_control-" + $control.val()).remove(), this.save()
		},
		save: function() {
			var string_value = _.map(this.$current_control.find("[data-name]"), function(element) {
				var return_string = encodeURIComponent($(element).data("name"));
				return $(element).find("select").each(function() {
					var $sub_control = $(this);
					$sub_control.is("select") && "" !== $sub_control.val() && (return_string += "|" + encodeURIComponent($sub_control.val()))
				}), return_string
			}).join(",");
			this.$data_field.val(string_value)
		}
	}, $.fn.VcSortedList = function(option) {
		return this.each(function() {
			var $this = $(this),
			data = $this.data("vc_sorted_list");
			_.isObject(option);
			data || $this.data("vc_sorted_list", data = new VcSortedList(this)), "string" == typeof option && data[option]()
		})
	};
	var GoogleFonts = Backbone.View.extend({
		preview_el: ".vc_google_fonts_form_field-preview-container > span",
		font_family_dropdown_el: ".vc_google_fonts_form_field-font_family-container > select",
		font_style_dropdown_el: ".vc_google_fonts_form_field-font_style-container > select",
		font_style_dropdown_el_container: ".vc_google_fonts_form_field-font_style-container",
		status_el: ".vc_google_fonts_form_field-status-container > span",
		events: {
			"change .vc_google_fonts_form_field-font_family-container > select": "fontFamilyDropdownChange",
			"change .vc_google_fonts_form_field-font_style-container > select": "fontStyleDropdownChange"
		},
		initialize: function(attr) {
			_.bindAll(this, "previewElementInactive", "previewElementActive", "previewElementLoading"), this.$preview_el = $(this.preview_el, this.$el), this.$font_family_dropdown_el = $(this.font_family_dropdown_el, this.$el), this.$font_style_dropdown_el = $(this.font_style_dropdown_el, this.$el), this.$font_style_dropdown_el_container = $(this.font_style_dropdown_el_container, this.$el), this.$status_el = $(this.status_el, this.$el), this.fontFamilyDropdownRender()
		},
		render: function() {
			return this
		},
		previewElementRender: function() {
			return this.$preview_el.css({
				"font-family": this.font_family,
				"font-style": this.font_style,
				"font-weight": this.font_weight
			}), this
		},
		previewElementInactive: function() {
			this.$status_el.text(window.i18nLocale.gfonts_loading_google_font_failed || "Loading google font failed.").css("color", "#FF0000")
		},
		previewElementActive: function() {
			this.$preview_el.text("Grumpy wizards make toxic brew for the evil Queen and Jack.").css("color", "inherit"), this.fontStyleDropdownRender()
		},
		previewElementLoading: function() {
			this.$preview_el.text(window.i18nLocale.gfonts_loading_google_font || "Loading Font...")
		},
		fontFamilyDropdownRender: function() {
			return this.fontFamilyDropdownChange(), this
		},
		fontFamilyDropdownChange: function() {
			var $font_family_selected = this.$font_family_dropdown_el.find(":selected");
			return this.font_family_url = $font_family_selected.val(), this.font_family = $font_family_selected.attr("data[font_family]"), this.font_types = $font_family_selected.attr("data[font_types]"), this.$font_style_dropdown_el_container.parent().hide(), this.font_family_url && 0 < this.font_family_url.length && WebFont.load({
				google: {
					families: [this.font_family_url]
				},
				inactive: this.previewElementInactive,
				active: this.previewElementActive,
				loading: this.previewElementLoading
			}), this
		},
		fontStyleDropdownRender: function() {
			var str_arr = this.font_types.split(","),
			oel = "",
			default_f_style = this.$font_family_dropdown_el.attr("default[font_style]");
			for (var str_inner in str_arr) {
				var str_arr_inner = str_arr[str_inner].split(":"),
				sel = "";
				_.isString(default_f_style) && 0 < default_f_style.length && str_arr[str_inner] == default_f_style && (sel = "selected"), oel = oel + "<option " + sel + ' value="' + str_arr[str_inner] + '" data[font_weight]="' + str_arr_inner[1] + '" data[font_style]="' + str_arr_inner[2] + '" class="' + str_arr_inner[2] + "_" + str_arr_inner[1] + '" >' + str_arr_inner[0] + "</option>"
			}
			return this.$font_style_dropdown_el.html(oel), this.$font_style_dropdown_el_container.parent().show(), this.fontStyleDropdownChange(), this
		},
		fontStyleDropdownChange: function() {
			var $font_style_selected = this.$font_style_dropdown_el.find(":selected");
			return this.font_weight = $font_style_selected.attr("data[font_weight]"), this.font_style = $font_style_selected.attr("data[font_style]"), this.previewElementRender(), this
		}
	}),
	VC_AutoComplete = Backbone.View.extend({
		min_length: 2,
		delay: 500,
		auto_focus: !0,
		ajax_url: window.ajaxurl,
		source_data: function() {
			return {}
		},
		replace_values_on_select: !1,
		initialize: function(params) {
			_.bindAll(this, "sortableChange", "resize", "labelRemoveHook", "updateItems", "sortableCreate", "sortableUpdate", "source", "select", "labelRemoveClick", "createBox", "focus", "response", "change", "close", "open", "create", "search", "_renderItem", "_renderMenu", "_renderItemData", "_resizeMenu"), params = $.extend({
				min_length: this.min_length,
				delay: this.delay,
				auto_focus: this.auto_focus,
				replace_values_on_select: this.replace_values_on_select
			}, params), this.options = params, this.param_name = this.options.param_name, this.$el = this.options.$el, this.$el_wrap = this.$el.parent(), this.$sortable_wrapper = this.$el_wrap.parent(), this.$input_param = this.options.$param_input, this.selected_items = [], this.isMultiple = !1, this.render()
		},
		resize: function() {
			var position = this.$el_wrap.position(),
			block_position = this.$block.position();
			this.$el.autocomplete("widget").width(parseFloat(this.$block.width()) - (parseFloat(position.left) - parseFloat(block_position.left) + 4) + 11)
		},
		enableMultiple: function() {
			this.isMultiple = !0, this.$el.show(), this.$el.focus()
		},
		enableSortable: function() {
			this.sortable = this.$sortable_wrapper.sortable({
				items: ".vc_data",
				axis: "y",
				change: this.sortableChange,
				create: this.sortableCreate,
				update: this.sortableUpdate
			})
		},
		updateItems: function() {
			this.selected_items.length ? this.$input_param.val(this.getSelectedItems().join(", ")) : this.$input_param.val("")
		},
		sortableChange: function(event, ui) {},
		itemsCreate: function() {
			var sel_items = [];
			this.$block.find(".vc_data").each(function(key, item) {
				sel_items.push({
					label: item.dataset.label,
					value: item.dataset.value
				})
			}), this.selected_items = sel_items
		},
		sortableCreate: function(event, ui) {},
		sortableUpdate: function(event, ui) {
			var elems = this.$sortable_wrapper.sortable("toArray", {
				attribute: "data-index"
			}),
			items = [];
			_.each(elems, function(index) {
				items.push(this.selected_items[index])
			}, this);
			var index = 0;
			$("li.vc_data", this.$sortable_wrapper).each(function() {
				$(this).attr("data-index", index++)
			}), this.selected_items = items, this.updateItems()
		},
		getWidget: function() {
			return this.$el.autocomplete("widget")
		},
		render: function() {
			if (this.$el.on("focus", this.resize), this.data = this.$el.autocomplete({
				source: this.source,
				minLength: this.options.min_length,
				delay: this.options.delay,
				autoFocus: this.options.auto_focus,
				select: this.select,
				focus: this.focus,
				response: this.response,
				change: this.change,
				close: this.close,
				open: this.open,
				create: this.create,
				search: this.search
			}), this.data.data("ui-autocomplete")._renderItem = this._renderItem, this.data.data("ui-autocomplete")._renderMenu = this._renderMenu, this.data.data("ui-autocomplete")._resizeMenu = this._resizeMenu, 0 < this.$input_param.val().length) {
				this.isMultiple ? this.$el.focus() : this.$el.hide();
				var that = this;
				$(".vc_autocomplete-label.vc_data", this.$sortable_wrapper).each(function() {
					that.labelRemoveHook($(this))
				})
			}
			return this.getWidget().addClass("vc_ui-front").addClass("vc_ui-auotocomplete"), this.$block = this.$el_wrap.closest("ul").append($('<li class="clear"/>')), this.itemsCreate(), this
		},
		close: function(event, ui) {
			this.selected && this.options.no_hide && (this.getWidget().show(), this.selected++, 2 < this.selected && (this.selected = void 0))
		},
		open: function(event, ui) {
			var widget = this.getWidget().menu(),
			widget_position = widget.position();
			widget.css("left", widget_position.left - 6), widget.css("top", widget_position.top + 2)
		},
		focus: function(event, ui) {
			if (!this.options.replace_values_on_select) return event.preventDefault(), !1
		},
		create: function(event, ui) {},
		change: function(event, ui) {},
		response: function(event, ui) {},
		search: function(event, ui) {},
		select: function(event, ui) {
			if (this.selected = 1, ui.item) {
				if (this.options.unique_values) {
					var $li_el = this.getWidget().data("uiMenu").active;
					if (this.options.groups) {
						var $prev_el = $li_el.prev(),
						$next_el = $li_el.next();
						$prev_el.hasClass("vc_autocomplete-group") && !$next_el.hasClass("vc_autocomplete-item") && $prev_el.remove()
					}
					$li_el.remove();
					$("li.ui-menu-item", this.getWidget()).length || (this.selected = void 0)
				}
				this.createBox(ui.item), this.isMultiple ? this.$el.focus() : this.$el.hide()
			}
			return !1
		},
		createBox: function(item) {
			var $label, index = this.selected_items.push(item) - 1;
			this.updateItems(), ($label = $('<li class="vc_autocomplete-label vc_data" data-index="' + index + '" data-value="' + item.value + '" data-label="' + item.label + '"><span class="vc_autocomplete-label"><a>' + item.label + '</a></span><a class="vc_autocomplete-remove">&times;</a></li>')).insertBefore(this.$el_wrap), this.labelRemoveHook($label)
		},
		labelRemoveHook: function($label) {
			this.$el.blur(), this.$el.val(""), $label.on("click", this.labelRemoveClick)
		},
		labelRemoveClick: function(e, ui) {
			e.preventDefault();
			var $label = $(e.currentTarget);
			if ($(e.target).is(".vc_autocomplete-remove")) return this.selected_items.splice($label.index(), 1), $label.remove(), this.updateItems(), this.$el.show(), !1
		},
		getSelectedItems: function() {
			if (this.selected_items.length) {
				var results = [];
				return _.each(this.selected_items, function(item) {
					results.push(item.value)
				}), results
			}
			return !1
		},
		_renderMenu: function(ul, items) {
			var that = this,
			group = null;
			this.options.groups && items.sort(function(a, b) {
				return a.group > b.group
			}), $.each(items, function(index, item) {
				that.options.groups && item.group != group && (group = item.group, ul.append("<li class='ui-autocomplete-group vc_autocomplete-group' aria-label='" + group + "'>" + group + "</li>")), that._renderItemData(ul, item)
			})
		},
		_renderItem: function(ul, item) {
			return $('<li data-value="' + item.value + '" class="vc_autocomplete-item">').append("<a>" + item.label + "</a>").appendTo(ul)
		},
		_renderItemData: function(ul, item) {
			return this._renderItem(ul, item).data("ui-autocomplete-item", item)
		},
		_resizeMenu: function() {},
		clearValue: function() {
			this.selected_items = [], this.updateItems(), $(".vc_autocomplete-label.vc_data", this.$sortable_wrapper).remove()
		},
		source: function(request, response) {
			var that = this;
			this.options.values && 0 < this.options.values.length ? this.options.unique_values ? response($.ui.autocomplete.filter(_.difference(this.options.values, this.selected_items), request.term)) : response($.ui.autocomplete.filter(this.options.values, request.term)) : $.ajax({
				type: "POST",
				dataType: "json",
				url: this.ajax_url,
				data: $.extend({
					action: "vc_get_autocomplete_suggestion",
					shortcode: vc.active_panel.model.get("shortcode"),
					param: this.param_name,
					query: request.term,
					_vcnonce: window.vcAdminNonce
				}, this.source_data(request, response))
			}).done(function(data) {
				that.options.unique_values ? response(_.filter(data, function(obj) {
					return !_.findWhere(that.selected_items, obj)
				})) : response(data)
			})
		}
	}),
	Vc_ParamInitializer = Backbone.View.extend({
		$content: {},
		initialize: function() {
			_.bindAll(this, "content"), this.$content = this.$el, this.model = vc.active_panel.model
		},
		setContent: function($el) {
			this.$content = $el
		},
		content: function() {
			return this.$content
		},
		render: function() {
			var self;
			return $('[data-vc-ui-element="panel-shortcode-param"]', (self = this).content()).each(function() {
				var _this = $(this),
				param = _this.data("param_settings");
				vc.atts.init.call(self, param, _this), _this.data("vcInitParam", !0)
			}), this
		}
	}),
	VC_ParamGroup = Backbone.View.extend({
		options: {
			max_items: 0,
			sortable: !0,
			deletable: !0,
			collapsible: !0
		},
		items: 0,
		$ul: !1,
		initializer: {},
		mappedParams: {},
		adminLabelParams: [],
		groupParamName: "",
		events: {
			"click > .edit_form_line > .vc_param_group-list > .vc_param_group-add_content": "addNew"
		},
		initialize: function(data) {
			var $elParam, settings, self;
			this.$ul = this.$el.find("> .edit_form_line > .vc_param_group-list"), $elParam = $("> .wpb_vc_row", this.$ul), this.initializer = new Vc_ParamInitializer({
				el: this.$el
			}), this.model = vc.active_panel.model, settings = this.$ul.data("settings"), this.mappedParams = {}, this.adminLabelParams = [], this.options = _.defaults({}, _.isObject(data.settings) ? data.settings : {}, settings, this.options), this.groupParamName = this.options.param.param_name, _.isObject(this.options.param) && _.isArray(this.options.param.params) && _.each(this.options.param.params, function(param) {
				var elemName;
				elemName = this.groupParamName + "_" + param.param_name, this.mappedParams[elemName] = param, _.isObject(param) && !0 === param.admin_label && this.adminLabelParams.push(elemName)
			}, this), this.items = 0, self = this, $elParam.length && $elParam.each(function() {
				$elParam.data("vc-param-group-param", new VC_ParamGroup_Param({
					el: $(this),
					parent: self
				})), self.items++, self.afterAdd($(this), "init")
			}), this.options.sortable && this.$ul.sortable({
				handle: ".vc_control.column_move",
				items: "> .wpb_vc_row:not(vc_param_group-add_content-wrapper)",
				placeholder: "vc_placeholder"
			})
		},
		addNew: function(ev) {
			if (ev.preventDefault(), this.addAllowed()) {
				var $newEl, fn;
				if (void 0 !== this.options.param.callbacks && void 0 !== this.options.param.callbacks.before_add && "function" == typeof(fn = window[this.options.param.callbacks.before_add]) && !fn()) return;
				($newEl = $(JSON.parse(this.$ul.next(".vc_param_group-template").html()))).removeClass("vc_param_group-add_content-wrapper"), $newEl.insertBefore(ev.currentTarget), $newEl.show(), this.initializer.setContent($newEl.find("> .wpb_element_wrapper")), this.initializer.render(), this.items++, $newEl.data("vc-param-group-param", new VC_ParamGroup_Param({
					el: $newEl,
					parent: this
				})), this.afterAdd($newEl, "new"), vc.events.trigger("vc-param-group-add-new", ev, $newEl, this)
			}
		},
		addAllowed: function() {
			return 0 < this.options.max_items && this.items + 1 <= this.options.max_items || this.options.max_items <= 0
		},
		afterAdd: function($newEl, action) {
			var fn;
			this.addAllowed() || (this.$ul.find("> .wpb_vc_row > .vc_param_group-controls > .vc_row_edit_clone_delete > .vc_control.column_clone").hide(), this.$ul.find("> .vc_param_group-add_content").hide()), this.options.sortable || this.$ul.find("> .wpb_vc_row > .vc_param_group-controls > .vc_control.column_move").hide(), this.options.deletable || this.$ul.find("> .wpb_vc_row > .vc_param_group-controls > .vc_row_edit_clone_delete > .vc_control.column_delete").hide(), this.options.collapsible || this.$ul.find("> .wpb_vc_row > .vc_param_group-controls > .vc_row_edit_clone_delete > .vc_control.column_toggle").hide(), void 0 !== this.options.param.callbacks && void 0 !== this.options.param.callbacks.after_add && "function" == typeof(fn = window[this.options.param.callbacks.after_add]) && fn($newEl, action)
		},
		afterDelete: function() {
			var fn;
			this.addAllowed() && (this.$ul.find("> .wpb_vc_row > .vc_param_group-controls > .vc_row_edit_clone_delete > .vc_control.column_clone").show(), this.$ul.find("> .vc_param_group-add_content").show()), void 0 !== this.options.param.callbacks && void 0 !== this.options.param.callbacks.after_delete && "function" == typeof(fn = window[this.options.param.callbacks.after_delete]) && fn()
		}
	}),
	VC_ParamGroup_Param = Backbone.View.extend({
		dependentElements: !1,
		mappedParams: !1,
		groupParamName: "",
		adminLabelParams: [],
		events: {
			"click > .vc_controls > .vc_row_edit_clone_delete > .vc_control.column_toggle": "toggle",
			"click > .vc_controls > .vc_row_edit_clone_delete > .vc_control.column_delete": "deleteParam",
			"click > .vc_controls > .vc_row_edit_clone_delete > .vc_control.column_clone": "clone"
		},
		initialize: function(options) {
			this.options = options, this.$content = this.options.parent.$ul, this.model = vc.active_panel.model, this.mappedParams = this.options.parent.mappedParams, this.groupParamName = this.options.parent.groupParamName, this.adminLabelParams = this.options.parent.adminLabelParams, this.dependentElements = {}, _.bindAll(this, "hookDependent"), this.initializeDependency(), _.bindAll(this, "hookAdminLabel"), this.initializeAdminLabels()
		},
		initializeAdminLabels: function() {
			var i, callback;
			callback = this.hookAdminLabel;
			
			function f() {
				var $field = $(this);
				$field.data("vc_admin_labels") || ($field.data("vc_admin_labels", !0), $field.bind("keyup change", callback), callback({
					currentTarget: this
				}))
			}
			for (i = 0; i < this.adminLabelParams.length; i++) $("[name=" + this.adminLabelParams[i] + "].wpb_vc_param_value", this.$el).each(f)
		},
		hookAdminLabel: function(e) {
			var i, $wrapperLabel, elemName, paramSettings, labelName, labelValue, labels, $field, $parent;
			for (labelValue = labelName = "", labels = [], $parent = ($field = $(e.currentTarget)).closest(".vc_param_group-wrapper"), $wrapperLabel = $field.closest(".vc_param").find(".vc_param-group-admin-labels"), i = 0; i < this.adminLabelParams.length; i++) {
				var $paramWrapper;
				elemName = this.adminLabelParams[i], $paramWrapper = ($field = $parent.find("[name=" + elemName + "]")).closest('[data-vc-ui-element="panel-shortcode-param"]'), void 0 !== this.mappedParams[elemName] && (labelName = this.mappedParams[elemName].heading), labelValue = $field.is("select") ? $field.find("option:selected").text() : !$field.is("input:checkbox") || $field[0].checked ? $field.val() : "", paramSettings = {
					type: $paramWrapper.data("param_type"),
					param_name: $paramWrapper.data("param_name")
				}, _.isObject(vc.atts[paramSettings.type]) && _.isFunction(vc.atts[paramSettings.type].render) && (labelValue = vc.atts[paramSettings.type].render.call(this, paramSettings, labelValue)), "" !== labelValue && labels.push("<label>" + labelName + "</label>: " + labelValue)
			}
			$wrapperLabel.html(labels.join(", ")).toggleClass("vc_hidden-label", !labels.length)
		},
		initializeDependency: function() {
			var callDependencies;
			callDependencies = {}, _.each(this.mappedParams, function(param, name) {
				var $masters, $slave;
				_.isObject(param) && _.isObject(param.dependency) && _.isString(param.dependency.element) && ($masters = $("[name=" + this.groupParamName + "_" + param.dependency.element + "].wpb_vc_param_value", this.$el), ($slave = $("[name=" + name + "].wpb_vc_param_value", this.$el)).length && _.each($masters, function(master) {
					var $master, masterName, rules;
					masterName = ($master = $(master)).attr("name"), rules = param.dependency, _.isArray(this.dependentElements[masterName]) || (this.dependentElements[masterName] = []), this.dependentElements[masterName].push($slave), $master.data("dependentSet") || ($master.attr("data-dependent-set", "true"), $master.bind("keyup change", this.hookDependent)), callDependencies[masterName] || (callDependencies[masterName] = $master), _.isString(rules.callback) && window[rules.callback].call(this)
				}, this))
			}, this), _.each(callDependencies, function(obj) {
				this.hookDependent({
					currentTarget: obj
				})
			}, this)
		},
		hookDependent: function(e) {
			var $master, $masterContainer, isMasterEmpty, dependentElements, masterValue;
			return $masterContainer = ($master = $(e.currentTarget)).closest(".vc_column"), dependentElements = this.dependentElements[$master.attr("name")], masterValue = $master.is(":checkbox") ? _.map(this.$el.find("[name=" + $master.attr("name") + "].wpb_vc_param_value:checked"), function(element) {
				return $(element).val()
			}) : $master.val(), isMasterEmpty = $master.is(":checkbox") ? !this.$el.find("[name=" + $master.attr("name") + "].wpb_vc_param_value:checked").length : !masterValue.length, $masterContainer.hasClass("vc_dependent-hidden") ? _.each(dependentElements, function($element) {
				var event = $.Event("change");
				event.extra_type = "vcHookDependedParamGroup", $element.closest(".vc_column").addClass("vc_dependent-hidden"), $element.trigger(event)
			}) : _.each(dependentElements, function($element) {
				var event, paramName, rules, $paramBlock;
				paramName = $element.attr("name"), rules = _.isObject(this.mappedParams[paramName]) && _.isObject(this.mappedParams[paramName].dependency) ? this.mappedParams[paramName].dependency : {}, $paramBlock = $element.closest(".vc_column"), _.isBoolean(rules.not_empty) && !0 === rules.not_empty && !isMasterEmpty || _.isBoolean(rules.is_empty) && !0 === rules.is_empty && isMasterEmpty || rules.value && _.intersection(_.isArray(rules.value) ? rules.value : [rules.value], _.isArray(masterValue) ? masterValue : [masterValue]).length || rules.value_not_equal_to && !_.intersection(_.isArray(rules.value_not_equal_to) ? rules.value_not_equal_to : [rules.value_not_equal_to], _.isArray(masterValue) ? masterValue : [masterValue]).length ? $paramBlock.removeClass("vc_dependent-hidden") : $paramBlock.addClass("vc_dependent-hidden"), (event = $.Event("change")).extra_type = "vcHookDependedParamGroup", $element.trigger(event)
			}, this), this
		},
		deleteParam: function(ev) {
			ev && ev.preventDefault && ev.preventDefault(), !0 === confirm(window.i18nLocale.press_ok_to_delete_section) && (this.options.parent.items--, this.options.parent.afterDelete(), this.$el.remove(), this.unbind(), this.remove())
		},
		content: function() {
			return this.$content
		},
		clone: function(ev) {
			if (ev.preventDefault(), this.options.parent.addAllowed()) {
				var param = this.options.parent.$ul.data("settings"),
				$content = this.$content;
				this.$content = this.$el;
				var value = vc.atts.param_group.parseOne.call(this, param);
				$.ajax({
					type: "POST",
					url: window.ajaxurl,
					data: {
						action: "vc_param_group_clone",
						param: fixedEncodeURIComponent(JSON.stringify(param)),
						shortcode: vc.active_panel.model.get("shortcode"),
						value: value,
						vc_inline: !0,
						_vcnonce: window.vcAdminNonce
					},
					dataType: "json",
					context: this
				}).done(function(response) {
					var $newEl, html = response.data || "";
					($newEl = $(html)).insertAfter(this.$el), this.$content = $content, this.options.parent.initializer.$content = $("> .wpb_element_wrapper", $newEl), this.options.parent.initializer.render(), $newEl.data("vc-param-group-param", new VC_ParamGroup_Param({
						el: $newEl,
						parent: this.options.parent
					})), this.options.parent.items++, this.options.parent.afterAdd($newEl, "clone")
				})
			}
		},
		toggle: function(ev) {
			ev.preventDefault();
			var $parent = this.$el;
			$parent.find("> .wpb_element_wrapper").slideToggle(), $parent.toggleClass("vc_param_group-collapsed").siblings(":not(.vc_param_group-collapsed)").addClass("vc_param_group-collapsed").find("> .wpb_element_wrapper").slideUp()
		}
	});
	window.i18nLocale;
	vc.edit_form_callbacks = [];
	
	vc.atts = {
		parse: function(param) {
			var value, params, $param, $field;
			$param = ($field = this.content().find(".wpb_vc_param_value[name=" + param.param_name + "]")).closest('[data-vc-ui-element="panel-shortcode-param"]');
			value = _.isUndefined(vc.atts[param.type]) || _.isUndefined(vc.atts[param.type].parse) ? $field.length ? $field.val() : null : $param.data("vcInitParam") ? vc.atts[param.type].parse.call(this, param) : (params = this.model.get("params"), _.isUndefined(params[param.param_name]) ? $field.length ? $field.val() : null : params[param.param_name]);
			void 0 !== $field.data("js-function") && void 0 !== window[$field.data("js-function")] && (0, window[$field.data("js-function")])(this.$el, this, param);
			return value
		},
		parseFrame: function(param) {
			return vc.atts.parse.call(this, param)
		},
		init: function(param, $field) {
			_.isUndefined(vc.atts[param.type]) || _.isUndefined(vc.atts[param.type].init) || vc.atts[param.type].init.call(this, param, $field)
		}
	};
	vc.atts.textarea_html = {
		parse: function(param) {
			var _window = this.window(),
			$field = this.content().find(".textarea_html." + param.param_name);
			try {
				_window.tinyMCE && _.isArray(_window.tinyMCE.editors) && _.each(_window.tinyMCE.editors, function(_editor) {
					"wpb_tinymce_content" === _editor.id && _editor.save()
				})
			} catch (err) {
				window.console && window.console.warn && window.console.warn("textarea_html atts parse error", err)
			}
			return $field.val()
		},
		render: function(param, value) {
			return _.isUndefined(value) ? value : vc_wpautop(value)
		}
	};
	vc.atts.textarea_safe = {
		parse: function(param) {
			var new_value = this.content().find(".wpb_vc_param_value[name=" + param.param_name + "]").val();
			return new_value.match(/"|(http)/) ? "#E-8_" + base64_encode(rawurlencode(new_value)) : new_value
		},
		render: function(param, value) {
			return value && value.match(/^#E\-8_/) ? $("<div/>").text(rawurldecode(base64_decode(value.replace(/^#E\-8_/, "")))).html() : value
		}
	};
	vc.atts.checkbox = {
		parse: function(param) {
			const arr = [];
			let newValue = "";
			$("input[name=" + param.param_name + "]", this.content()).each(function() {
				const span = $('<span class="checkbox"></span>');
				const self = $(this);
				this.checked && arr.push(self.attr("value"))
				if (!self.siblings('span.checkbox').length) {
					span.insertAfter(self);
				}
				if ( self.parent().siblings('.vc_checkbox-label').length ) {
					self.parent().addClass('show-label');
				}
			});
			0 < arr.length && (newValue = arr.join(","));
			return newValue;
		},
		defaults: function(param) {
			return ""
		}
	};
	vc.atts.el_id = {
		clone: function(clonedModel, paramValue, paramSettings) {
			var shortcodeParams;
			shortcodeParams = clonedModel.get("params");
			_.isUndefined(paramSettings) ||
			_.isUndefined(paramSettings.settings) ||
			_.isUndefined(paramSettings.settings.auto_generate) ||
			!0 !== paramSettings.settings.auto_generate ?
				shortcodeParams[paramSettings.param_name] = ""	 :
				shortcodeParams[paramSettings.param_name] = 'lqd-' + Date.now() + "-" + vc_guid();
			
			clonedModel.set({
				params: shortcodeParams
			}, {
				silent: !0
			})
		},
		create: function(shortcodeModel, paramValue, paramSettings) {
			if (shortcodeModel.get("cloned")) return vc.atts.el_id.clone(shortcodeModel, paramValue, paramSettings);
			var shortcodeParams;
			!_.isEmpty(paramValue) ||
			_.isUndefined(paramSettings) ||
			_.isUndefined(paramSettings.settings) ||
			_.isUndefined(paramSettings.settings.auto_generate) ||
			1 != paramSettings.settings.auto_generate ||
			((shortcodeParams = shortcodeModel.get("params"))[paramSettings.param_name] = 'lqd-' + Date.now() + "-" + vc_guid(),
			shortcodeModel.set({
				params: shortcodeParams
			}, {
				silent: !0
			}))
		}
	};
	vc.events.on("shortcodes:add:param:type:el_id", vc.atts.el_id.create);
	
	vc.atts.posttypes = {
		parse: function(param) {
			var posstypes_arr = [],
			new_value = "";
			return $("input[name=" + param.param_name + "]", this.content()).each(function() {
				var self = $(this);
				this.checked && posstypes_arr.push(self.attr("value"))
			}), 0 < posstypes_arr.length && (new_value = posstypes_arr.join(",")), new_value
		}
	};
	vc.atts.taxonomies = {
		parse: function(param) {
			var posstypes_arr = [],
			new_value = "";
			return $("input[name=" + param.param_name + "]", this.content()).each(function() {
				var self = $(this);
				this.checked && posstypes_arr.push(self.attr("value"))
			}), 0 < posstypes_arr.length && (new_value = posstypes_arr.join(",")), new_value
		}
	};
	vc.atts.exploded_textarea = {
		parse: function(param) {
			return this.content().find(".wpb_vc_param_value[name=" + param.param_name + "]").val().replace(/\n/g, ",")
		}
	};
	vc.atts.exploded_textarea_safe = {
		parse: function(param) {
			var new_value;
			return (new_value = (new_value = this.content().find(".wpb_vc_param_value[name=" + param.param_name + "]").val()).replace(/\n/g, ",")).match(/"|(http)/) ? "#E-8_" + base64_encode(rawurlencode(new_value)) : new_value
		},
		render: function(param, value) {
			return value && value.match(/^#E\-8_/) ? $("<div/>").text(rawurldecode(base64_decode(value.replace(/^#E\-8_/, "")))).html() : value
		}
	};
	vc.atts.textarea_raw_html = {
		parse: function(param) {
			var new_value;
			return new_value = this.content().find(".wpb_vc_param_value[name=" + param.param_name + "]").val(), base64_encode(rawurlencode(new_value))
		},
		render: function(param, value) {
			return value ? $("<div/>").text(rawurldecode(base64_decode(value.trim()))).html() : ""
		}
	};
	vc.atts.dropdown = {
		render: function(param, value) {
			return value
		},
		init: function(param, $field) {
			$(".wpb_vc_param_value.dropdown", $field).on("change", function() {
				var $this, $options, prev_option_class, option_class;
				$options = ($this = $(this)).find(":selected"), prev_option_class = $this.data("option"), option_class = (option_class = $options.length ? $options.attr("class").replace(/\s/g, "_") : "").replace("#", "hash-"), void 0 !== prev_option_class && $this.removeClass(prev_option_class), void 0 !== option_class && ($this.data("option", option_class), $this.addClass(option_class))
			})
		},
		defaults: function(param) {
			var values;
			return _.isArray(param.value) || _.isString(param.value) ? _.isArray(param.value) ? (values = param.value[0], _.isArray(values) && values.length ? values[0] : values) : "" : (values = _.values(param.value)[0]).label ? values.value : values
		}
	};
	vc.atts.attach_images = {
		parse: function(param) {
			var $field, thumbnails_html;
			$field = this.content().find(".wpb_vc_param_value[name=" + param.param_name + "]");
			thumbnails_html = "";
			$field.parent().find("li.added").each(function() {
				thumbnails_html += '<li><img src="' + $(this).find("img").attr("src") + '" alt=""></li>'
			});
			$("[data-model-id=" + this.model.id + "]").data("field-" + param.param_name + "-attach-images", thumbnails_html);
			return $field.length ? $field.val() : null
		},
		render: function(param, value) {
			var $thumbnails = this.$el.find(".attachment-thumbnails[data-name=" + param.param_name + "]");
			"external_link" === this.model.getParam("source") && (value = this.model.getParam("custom_srcs"));
			if ( _.isEmpty(value) ) {
				this.$el.removeData("field-" + param.param_name + "-attach-images");
				vc.atts.attach_images.updateImages($thumbnails, "");
			} else {
				$.ajax({
				 type: "POST",
				 url: window.ajaxurl,
				 data: {
					 action: "wpb_gallery_html",
					 content: value,
					 _vcnonce: window.vcAdminNonce
				 },
				 dataType: "json",
				 context: this
			 }).done(function(response) {
				 var html = response.data;
				 vc.atts.attach_images.updateImages($thumbnails, html)
			 });
			}
			return value
		},
		updateImages: function($thumbnails, thumbnails_html) {
			$thumbnails.html(thumbnails_html);
			if ( thumbnails_html.length ) {
				$thumbnails.removeClass("image-exists").siblings('.no_image_image').addClass("image-exists")
			}	 else {
				$thumbnails.addClass("image-exists").siblings('.no_image_image').removeClass("image-exists");
			}
		}
	};
	vc.atts.href = {
		parse: function(param) {
			var $field, val;
			return val = "", ($field = this.content().find(".wpb_vc_param_value[name=" + param.param_name + "]")).length && "http://" !== $field.val() && (val = $field.val()), val
		}
	};
	vc.atts.attach_image = {
		parse: function(param) {
			var $field, image_src;
			image_src = "";
			$field = this.content().find(".wpb_vc_param_value[name=" + param.param_name + "]");
			if ( $field.parent().find("li.added").length ) {
				image_src = $field.parent().find("li.added img").attr("src");
			}
			$("[data-model-id=" + this.model.id + "]").data("field-" + param.param_name + "-attach-image", image_src);
			return $field.length ? $field.val() : null
		},
		render: function(param, value) {
			var $model = $("[data-model-id=" + this.model.id + "]"),
			image_src = $model.data("field-" + param.param_name + "-attach-image"),
			$thumbnail = this.$el.find(".attachment-thumbnail[data-name=" + param.param_name + "]");
			if ("image" === param.param_name) switch (this.model.getParam("source")) {
				case "external_link":
				vc.atts.attach_image.updateImage($thumbnail, this.model.getParam("custom_src"));
				break;
				default:
				_.isEmpty(value) && "featured_image" !== this.model.getParam("source") ? _.isUndefined(image_src) || ($model.removeData("field-" + param.param_name + "-attach-image"), vc.atts.attach_image.updateImage($thumbnail, image_src)) : $.ajax({
					type: "POST",
					url: window.ajaxurl,
					data: {
						action: "wpb_single_image_src",
						content: value,
						params: this.model.get("params"),
						post_id: vc_post_id,
						_vcnonce: window.vcAdminNonce
					},
					dataType: "html",
					context: this
				}).done(function(image_src) {
					var image_exists = image_src.length || "featured_image" === this.model.getParam("source");
					vc.atts.attach_image.updateImage($thumbnail, image_src, image_exists)
				})
			}
			return value
		},
		updateImage: function($thumbnail, image_src, image_exists) {
			if ( $thumbnail.length ) {
				(void 0 === image_exists && (image_exists = !1), image_exists || !_.isEmpty(image_src) ?
				($thumbnail.attr("src", image_src), _.isEmpty(image_src) ? ($thumbnail.hide(), $thumbnail.siblings('.no_image_image').removeClass("image-exists").siblings('.no_image_image').addClass("image-exists")) :
				($thumbnail.show(), $thumbnail.siblings('.no_image_image').addClass("image-exists").siblings('.no_image_image').addClass("image-exists"))) :
				$thumbnail.attr("src", "").hide().siblings('.no_image_image').removeClass("image-exists").siblings('.no_image_image').removeClass("image-exists"))
			}
		}
	};
	vc.atts.google_fonts = {
		parse: function(param) {
			var string_pieces, $block = this.content().find(".wpb_vc_param_value[name=" + param.param_name + "]").parent(),
			options = {};
			return options.font_family = $block.find(".vc_google_fonts_form_field-font_family-select > option:selected").val(), options.font_style = $block.find(".vc_google_fonts_form_field-font_style-select > option:selected").val(), string_pieces = _.map(options, function(value, key) {
				if (_.isString(value) && 0 < value.length) return key + ":" + encodeURIComponent(value)
			}), $.grep(string_pieces, function(value) {
				return _.isString(value) && 0 < value.length
			}).join("|")
		},
		init: function(param, $field) {
			var $g_fonts = $field;
			$g_fonts.length && ("undefined" != typeof WebFont ? $field.data("vc-param-object", new GoogleFonts({
				el: $g_fonts
			})) : $g_fonts.find("> .edit_form_line").html(window.i18nLocale.gfonts_unable_to_load_google_fonts || "Unable to load Google Fonts"))
		}
	};
	vc.atts.font_container = {
		parse: function(param) {
			var options, string_pieces, $block = this.content().find(".wpb_vc_param_value[name=" + param.param_name + "]").parent();
			return (options = {}).tag = $block.find(".vc_font_container_form_field-tag-select > option:selected").val(), options.font_size = $block.find(".vc_font_container_form_field-font_size-input").val(), options.text_align = $block.find(".vc_font_container_form_field-text_align-select > option:selected").val(), options.font_family = $block.find(".vc_font_container_form_field-font_family-select > option:selected").val(), options.color = $block.find(".vc_font_container_form_field-color-input").val(), options.line_height = $block.find(".vc_font_container_form_field-line_height-input").val(), options.font_style_italic = $block.find(".vc_font_container_form_field-font_style-checkbox.italic").prop("checked") ? "1" : "", options.font_style_bold = $block.find(".vc_font_container_form_field-font_style-checkbox.bold").prop("checked") ? "1" : "", string_pieces = _.map(options, function(value, key) {
				if (_.isString(value) && 0 < value.length) return key + ":" + encodeURIComponent(value)
			}), $.grep(string_pieces, function(value) {
				return _.isString(value) && 0 < value.length
			}).join("|")
		},
		init: function(param, $field) {
			vc.atts.colorpicker.init.call(this, param, $field)
		}
	};
	vc.atts.param_group = {
		parse: function(param) {
			var data, $content, $list;
			return $list = ($content = this.content()).find('.wpb_el_type_param_group[data-vc-ui-element="panel-shortcode-param"][data-vc-shortcode-param-name="' + param.param_name + '"]').find("> .edit_form_line > .vc_param_group-list"), data = vc.atts.param_group.extractValues.call(this, param, $('>.wpb_vc_row:not(".vc_param_group-add_content-wrapper")', $list)), this.$content = $content, encodeURIComponent(JSON.stringify(data))
		},
		extractValues: function(param, $el) {
			var data, self;
			return data = [], self = this, $el.each(function() {
				var innerData;
				innerData = {}, self.$content = $(this), _.each(param.params, function(par) {
					var innerParam, innerParamName, value;
					innerParamName = (innerParam = $.extend({}, par)).param_name, innerParam.param_name = param.param_name + "_" + innerParamName, ((value = vc.atts.parse.call(self, innerParam)).length || innerParam.save_always) && (innerData[innerParamName] = value)
				}), data.push(innerData)
			}), data
		},
		parseOne: function(param) {
			var $content, data;
			return $content = this.content(), data = vc.atts.param_group.extractValues.call(this, param, $content), this.$content = $content, fixedEncodeURIComponent(JSON.stringify(data))
		},
		init: function(param, $field) {
			$field.data("vc-param-object", new VC_ParamGroup({
				el: $field,
				settings: {
					param: param
				}
			}))
		}
	};
	vc.atts.colorpicker = {
		init: function(param, $field) {
			$(".vc_color-control", $field).each(function() {
				var $alpha, $alpha_output, $pickerContainer, $control = $(this),
				value = $control.val().replace(/\s+/g, ""),
				alpha_val = 100;
				value.match(/rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/) && (alpha_val = 100 * parseFloat(value.match(/rgba\(\d+\,\d+\,\d+\,([^\)]+)\)/)[1])), $control.wpColorPicker({
					clear: function(event, ui) {
						$alpha.val(100), $alpha_output.val("100%")
					},
					change: _.debounce(function() {
						$(this).trigger("change")
					}, 500)
				}), $pickerContainer = $control.closest(".wp-picker-container"), $('<div class="vc_alpha-container"><label>Alpha: <output class="rangevalue">' + alpha_val + '%</output></label><input type="range" min="1" max="100" value="' + alpha_val + '" name="alpha" class="vc_alpha-field"></div>').appendTo($pickerContainer.addClass("vc_color-picker").find(".iris-picker")), $alpha = $pickerContainer.find(".vc_alpha-field"), $alpha_output = $pickerContainer.find(".vc_alpha-container output"), $alpha.bind("change keyup", function() {
					var alpha_val, iris, color_picker;
					alpha_val = parseFloat($alpha.val()), iris = $control.data("a8c-iris"), color_picker = $control.data("wp-wpColorPicker"), $alpha_output.val($alpha.val() + "%"), iris._color._alpha = alpha_val / 100, $control.val(iris._color.toString()), color_picker.toggler.css({
						backgroundColor: $control.val()
					})
				}).val(alpha_val).trigger("change")
			})
		}
	};
	vc.atts.autocomplete = {
		init: function(param, $field) {
			$field.length && $field.each(function() {
				var options, $param, param_name, $el, ac;
				param_name = ($param = $(".wpb_vc_param_value", this)).attr("name"), $el = $(".vc_auto_complete_param", this), options = $.extend({
					$param_input: $param,
					param_name: param_name,
					$el: $el
				}, $param.data("settings")), ac = new VC_AutoComplete(options), options.multiple && ac.enableMultiple(), options.sortable && ac.enableSortable(), $param.data("vc-param-object", ac)
			})
		}
	};
	vc.atts.loop = {
		init: function(param, $field) {
			$field.data("vc-param-object", new VcLoop({
				el: $field
			}))
		}
	};
	vc.atts.vc_link = {
		init: function(param, $field) {
			$(".vc_link-build", $field).on("click", function(e) {
				var $block, $input, $url_label, $title_label, value_object, $link_submit, $vc_link_submit, $vc_link_nofollow, dialog;
				e && e.preventDefault && e.preventDefault(), $block = $(this).closest(".vc_link"), $input = $block.find(".wpb_vc_param_value"), $url_label = $block.find(".url-label"), $title_label = $block.find(".title-label"), value_object = $input.data("json"), $link_submit = $("#wp-link-submit"), $vc_link_submit = $('<input type="submit" name="vc_link-submit" id="vc_link-submit" class="button-primary" value="Set Link">'), $link_submit.hide(), $("#vc_link-submit").remove(), $vc_link_submit.insertBefore($link_submit), $vc_link_nofollow = $('<div class="link-target vc-link-nofollow"><label><span></span> <input type="checkbox" id="vc-link-nofollow"> Add nofollow option to link</label></div>'), $("#link-options .vc-link-nofollow").remove(), $vc_link_nofollow.insertAfter($("#link-options .link-target")), setTimeout(function() {
					var currentHeight = $("#most-recent-results").css("top");
					$("#most-recent-results").css("top", parseInt(currentHeight, 10) + $vc_link_nofollow.height())
				}, 200), dialog = !window.wpLink && $.fn.wpdialog && $("#wp-link").length ? {
					$link: !1,
					open: function() {
						this.$link = $("#wp-link").wpdialog({
							title: wpLinkL10n.title,
							width: 480,
							height: "auto",
							modal: !0,
							dialogClass: "wp-dialog",
							zIndex: 3e5
						}), this.$link.addClass("vc-link-wrapper")
					},
					close: function() {
						this.$link && (this.$link.wpdialog("close"), this.$link.removeClass("vc-link-wrapper"))
					}
				} : window.wpLink;
				
				function onOpen(e, wrap) {
					jQuery(wrap).addClass("vc-link-wrapper")
				}
				var onClose = function(e, wrap) {
					jQuery(wrap).removeClass("vc-link-wrapper"), jQuery(document).off("wplink-open", onOpen), jQuery(document).off("wplink-close", onClose)
				};
				jQuery(document).off("wplink-open", onOpen).on("wplink-open", onOpen), jQuery(document).off("wplink-close", onClose).on("wplink-close", onClose), "admin_frontend_editor" === vc_mode ? dialog.open("vc-hidden-editor") : dialog.open("content"), _.isString(value_object.url) && ($("#wp-link-url").length ? $("#wp-link-url").val(value_object.url) : $("#url-field").val(value_object.url)), _.isString(value_object.title) && ($("#wp-link-text").length ? $("#wp-link-text").val(value_object.title) : $("#link-title-field").val(value_object.title)), $("#wp-link-target").length ? $("#wp-link-target").prop("checked", !_.isEmpty(value_object.target)) : $("#link-target-checkbox").prop("checked", !_.isEmpty(value_object.target)), $("#vc-link-nofollow").length && $("#vc-link-nofollow").prop("checked", !_.isEmpty(value_object.rel)), $vc_link_submit.unbind("click.vcLink").bind("click.vcLink", function(e) {
					var options, string;
					e && e.preventDefault && e.preventDefault(), e && e.stopImmediatePropagation && e.stopImmediatePropagation(), (options = {}).url = $("#wp-link-url").length ? $("#wp-link-url").val() : $("#url-field").val(), options.title = $("#wp-link-text").length ? $("#wp-link-text").val() : $("#link-title-field").val();
					var $checkbox = $("#wp-link-target").length ? $("#wp-link-target") : $("#link-target-checkbox");
					return options.target = $checkbox[0].checked ? " _blank" : "", options.rel = $("#vc-link-nofollow")[0].checked ? "nofollow" : "", string = _.map(options, function(value, key) {
						if (_.isString(value) && 0 < value.length) return key + ":" + encodeURIComponent(value)
					}).join("|"), $input.val(string), $input.data("json", options), $url_label.html(options.url + options.target), $title_label.html(options.title), dialog.close(), $link_submit.show(), $vc_link_submit.unbind("click.vcLink"), $vc_link_submit.remove(), $("#wp-link-cancel").unbind("click.vcLink"), window.wpLink.textarea = "", $checkbox.attr("checked", !1), $("#most-recent-results").css("top", ""), $("#vc-link-nofollow").attr("checked", !1), !1
				}), $("#wp-link-cancel").unbind("click.vcLink").bind("click.vcLink", function(e) {
					e && e.preventDefault && e.preventDefault(), dialog.close(), $vc_link_submit.unbind("click.vcLink"), $vc_link_submit.remove(), $("#wp-link-cancel").unbind("click.vcLink"), window.wpLink.textarea = ""
				})
			})
		}
	};
	vc.atts.sorted_list = {
		init: function(param, $field) {
			$(".vc_sorted-list", $field).VcSortedList()
		}
	};
	vc.atts.options = {
		init: function(param, $field) {
			$field.data("vc-param-object", new VcOptionsField({
				el: $field
			}))
		}
	};
	vc.atts.iconpicker = {
		change: function(param, $field) {
			var $select = $field.find(".vc-iconpicker");
			$select.val(this.value), $select.data("vc-no-check", !0), $select.find('[value="' + this.value + '"]').attr("selected", "selected"), $select.data("vcFontIconPicker").loadIcons()
		},
		parse: function(param) {
			return this.content().find(".wpb_vc_param_value[name=" + param.param_name + "]").parent().find(".vc-iconpicker").val()
		},
		init: function(param, $field) {
			var $el = $field.find(".wpb_vc_param_value"),
			settings = $.extend({
				iconsPerPage: 100,
				iconDownClass: "fip-fa fa fa-arrow-down",
				iconUpClass: "fip-fa fa fa-arrow-up",
				iconLeftClass: "fip-fa fa fa-arrow-left",
				iconRightClass: "fip-fa fa fa-arrow-right",
				iconSearchClass: "fip-fa fa fa-search",
				iconCancelClass: "fip-fa fa fa-remove",
				iconBlockClass: "fip-fa"
			}, $el.data("settings"));
			$field.find(".vc-iconpicker").vcFontIconPicker(settings).on("change", function(e) {
				var $select = $(this);
				$select.data("vc-no-check") || $el.data("vc-no-check", !0).val(this.value).trigger("change"), $select.data("vc-no-check", !1)
			}), $el.on("change", function(e) {
				$el.data("vc-no-check") || vc.atts.iconpicker.change.call(this, param, $field), $el.data("vc-no-check", !1)
			})
		}
	};
	vc.atts.animation_style = {
		init: function(param, $field) {
			var content = $field,
			$field_input = $(".wpb_vc_param_value[name=" + param.param_name + "]", content);
			
			function animation_style_test(el, x) {
				$(el).removeClass().addClass(x + " animated").one("webkitAnimationEnd mozAnimationEnd MSAnimationEnd oanimationend animationend", function() {
					$(this).removeClass().addClass("vc_param-animation-style-preview")
				})
			}
			$('option[value="' + $field_input.val() + '"]', content).attr("selected", !0), $(".vc_param-animation-style-trigger", content).on("click", function(e) {
				e.preventDefault();
				var animation = $(".vc_param-animation-style", content).val();
				"none" !== animation && animation_style_test(this.parentNode, "vc_param-animation-style-preview " + animation)
			}), $(".vc_param-animation-style", content).on("change", function() {
				var animation = $(this).val();
				$field_input.val(animation), "none" !== animation && animation_style_test($(".vc_param-animation-style-preview", content), "vc_param-animation-style-preview " + animation)
			})
		}
	};
	vc.atts.gutenberg = {
		content: null,
		gutenbergParamObj: null,
		$frame: null,
		closeEditor: function(e) {
			e && e.preventDefault && e.preventDefault();
			var _this = this;
			_.delay(function() {
				_this.content.find(".vc_gutenberg-modal-wrapper").html(""), _this.$frame = null, _this.gutenbergParamObj = null
			}, 100)
		},
		updateEditor: function(e) {
			e && e.preventDefault && e.preventDefault(), this.gutenbergParamObj && this.gutenbergParamObj.updateValueFromIframe(), this.closeEditor()
		},
		init: function(param, $field) {
			var _this = vc.atts.gutenberg;
			_this.content = $field;
			var $field_input = $(".wpb_vc_param_value[name=" + param.param_name + "]", _this.content);
			$('[data-vc-action="open"]', _this.content).on("click", function(e) {
				e.preventDefault();
				var iframeURL, value = $field_input.val();
				iframeURL = window.wpbGutenbergEditorUrl ? window.wpbGutenbergEditorUrl : "/wp-admin/post-new.php?post_type=wpb_gutenberg_param", _this.gutenbergParamObj = new GutenbergParam({
					onSetValue: function(value) {
						$field_input.val(value)
					},
					onError: _this.closeEditor,
					value: value
				}), vc.createOverlaySpinner(), _this.content.find(".vc_gutenberg-modal-wrapper").html('<div class="wpb-gutenberg-modal"><div class="wpb-gutenberg-modal-inner"><iframe style="width: 100%;" data-vc-gutenberg-param-iframe></iframe></div></div>'), _this.$frame = _this.content.find("iframe[data-vc-gutenberg-param-iframe]"), _this.$frame.attr("src", iframeURL), _this.$frame.on("load", function() {
					vc.removeOverlaySpinner(), _this.gutenbergParamObj && (_this.gutenbergParamObj.iframe = _this.$frame.get(0), _this.gutenbergParamObj.iframeLoaded())
				})
			})
		}
	};
	vc.atts.subheading = {
		init: function(param, $field) {
			const $params = $field.nextUntil('.wpb_el_type_subheading');
			if ( $params.length ) {
				$params.hide();
				$field.addClass('is-collapse');
				$field.on('click', () => {
					$params.toggle(20);
					$field.toggleClass('is-collapse');
				})
			}
		}
	}
	
	function renderGutenbergControls(iframe) {
		var $iframeDocument = $(iframe).contents(),
		postToolbar = $iframeDocument.find(".edit-post-header-toolbar"),
		controlHTML = '<div class="wpb-gutenberg-controls-container"><style>.wpb-gutenberg-controls-container {display: flex;justify-content: center;align-items: center;}.vc_gutenberg-modal-update-button {padding-top: 8px;padding-bottom: 8px;min-height: 10px;padding: 5px 10px;font-size: 12px;line-height: 1.5;border-radius: 3px;color: #fff;background-color: #00aef0;border-color: transparent;cursor: pointer;display: inline-block;text-decoration: none !important;}.vc_gutenberg-modal-update-button:hover {background-color: #0089bd;}.wpb-gutenberg-modal-close-button {display: inline-flex;justify-content: center;align-items: center;margin: 0 0 0 10px;background: transparent;border: 0;box-shadow: none;padding: 5px;cursor: pointer;outline: none;}.wpb-gutenberg-modal-close-button:hover .vc-c-icon-close {opacity: 1;}.vc-c-icon-close {position: relative;display: inline-flex;width: 13px;height: 13px;justify-content: center;align-items: center;transform: rotate(45deg);opacity: .65;transition: opacity .2s ease-in-out;}.vc-c-icon-close::before,.vc-c-icon-close::after {content: "";position: absolute;background: #353535;}.vc-c-icon-close::before {width: 1px;height: 100%;}.vc-c-icon-close::after {width: 100%;height: 1px;}</style><button class="vc_gutenberg-modal-update-button">' + (window.i18nLocale.gutenbergEditorUpdateButton ? window.i18nLocale.gutenbergEditorUpdateButton : "Update") + '</button><button class="wpb-gutenberg-modal-close-button"><i class="la la-times"></i></button></div>';
		$(controlHTML).insertAfter(postToolbar);
		var gutenberg = vc.atts.gutenberg;
		$iframeDocument.find(".wpb-gutenberg-modal-close-button").on("click", gutenberg.closeEditor.bind(gutenberg)), $iframeDocument.find(".vc_gutenberg-modal-update-button").on("click", gutenberg.updateEditor.bind(gutenberg))
	}
	var GutenbergParam = function(options) {
		return this.iframe = null, this.options = options || {}, this.value = this.options && this.options.value ? this.options.value : "", this.iframeLoaded = function() {
			var localizations, alertNotice, wpData, selectEditor, editor, newPost;
			(wpData = !!this.iframe.contentWindow.wp && this.iframe.contentWindow.wp.data) || (alertNotice = (localizations = !!window.i18nLocale && window.i18nLocale) && localizations.gutenbergDoesntWorkProperly ? localizations.gutenbergDoesntWorkProperly : "Gutenberg plugin doesn't work properly. Please check Gutenberg plugin.", window.alert(alertNotice), this.options && this.options.onError && this.options.onError()), newPost = {
				id: parseInt(this.iframe.contentWindow.document.getElementById("post_ID").value),
				guid: {
					raw: "/?",
					rendered: "/?"
				},
				title: {
					raw: ""
				},
				content: {
					raw: this.value,
					rendered: this.value
				},
				type: "wpb_gutenberg_param",
				slug: "",
				status: "auto-draft",
				link: "/?",
				format: "standard",
				categories: []
			}, editor = wpData.dispatch("core/editor"), selectEditor = wpData.select("core/edit-post");
			var postTitle = this.iframe.contentWindow.document.querySelector(".editor-post-title"),
			notice = this.iframe.contentWindow.document.querySelector(".components-notice-list");
			postTitle && postTitle.classList.add("hidden"), notice && notice.classList.add("hidden"), selectEditor.isPublishSidebarOpened = function() {
				return !0
			}, "function" == typeof editor.autosave && (editor.autosave = function() {}), editor.setupEditor(newPost), renderGutenbergControls(this.iframe)
		}, this.updateValueFromIframe = function() {
			var wpData, value;
			this.iframe && this.iframe.contentWindow && this.iframe.contentWindow.wp && this.iframe.contentWindow.wp.data && (wpData = this.iframe.contentWindow.wp.data) && (value = wpData.select("core/editor").getEditedPostContent(), this.setValue(value))
		}, this.setValue = function(value) {
			this.value = value, this.options.onSetValue && this.options.onSetValue(value)
		}, this
	};
	vc.atts.vc_grid_id = {
		parse: function() {
			return "vc_gid:" + Date.now() + "-" + this.model.get("id") + "-" + Math.floor(11 * Math.random())
		}
	};
	vc.atts.addShortcodeIdParam = function(model) {
		var params, settings, _changed = !1;
		params = model.get("params"), settings = vc.map[model.get("shortcode")], _.isArray(settings.params) && _.each(settings.params, function(p) {
			p && !_.isUndefined(p.type) && ("tab_id" === p.type && _.isEmpty(params[p.param_name]) ? (_changed = !0, params[p.param_name] = vc_guid() + "-" + Math.floor(11 * Math.random())) : "vc_grid_id" === p.type && (_changed = !0, params[p.param_name] = vc.atts.vc_grid_id.parse.call({
				model: model
			})))
		}), _changed && model.save("params", params, {
			silent: !0
		})
	}, vc.getMapped = vc.memoizeWrapper(function(tag) {
		return vc.map[tag] || {}
	})
}(window.jQuery),
function($) {
	"use strict";
	void 0 === window.vc && (window.vc = {}), window.vc.ShortcodesBuilder = function(models) {
		return this.models = models || [], this.is_build_complete = !0, this
	}, window.vc.ShortcodesBuilder.prototype = {
		_ajax: !1,
		message: !1,
		isBuildComplete: function() {
			return this.is_build_complete
		},
		create: function(attributes) {
			return this.is_build_complete = !1, this.models.push(window.vc.shortcodes.create(attributes)), this
		},
		render: function(callback) {
			var shortcodes;
			shortcodes = _.map(this.models, function(model) {
				var string = this.toString(model);
				return {
					id: model.get("id"),
					string: string,
					tag: model.get("shortcode")
				}
			}, this), window.vc.setDataChanged(), this.build(shortcodes, callback)
		},
		build: function(shortcodes, callback) {
			this.ajax({
				action: "vc_load_shortcode",
				shortcodes: shortcodes,
				_vcnonce: window.vcAdminNonce
			}, window.vc.frame_window.location.href).done(function(html) {
				_.each($(html), function(block) {
					this._renderBlockCallback(block)
				}, this);
				_.isFunction(callback) && callback(html);
				window.vc.frame.setSortable();
				window.vc.activity = !1;
				this.checkNoContent();
				window.vc.frame_window.vc_iframe.loadScripts();
				this.last() && vc.frame.scrollTo(this.first());
				this.models = [];
				this.showResultMessage();
				this.is_build_complete = !0;
			})
		},
		lastID: function() {
			return this.models.length ? _.last(this.models).get("id") : ""
		},
		last: function() {
			return !!this.models.length && _.last(this.models)
		},
		firstID: function() {
			return this.models.length ? _.first(this.models).get("id") : ""
		},
		first: function() {
			return !!this.models.length && _.first(this.models)
		},
		buildFromContent: function() {
			var content;
			content = decodeURIComponent(window.vc.frame_window.jQuery("#vc_template-post-content").html() + "").replace(/<style([^>]*)>\/\*\* vc_js-placeholder \*\*\//g, "<script$1>").replace(/<\/style([^>]*)><!-- vc_js-placeholder -->/g, "</script$1>");
			try {
				window.vc.$page.html(content).prepend($('<div class="vc_empty-placeholder"></div>'))
			} catch (err) {
				window.console && window.console.warn && window.console.warn("BuildFromContent error", err)
			}
			_.each(window.vc.post_shortcodes, function(data) {
				var shortcode, $block, params;
				shortcode = JSON.parse(decodeURIComponent(data + "")), ($block = window.vc.$page.find("[data-model-id=" + shortcode.id + "]")).parents("[data-model-id]"), params = _.isObject(shortcode.attrs) ? shortcode.attrs : {};
				var model = window.vc.shortcodes.create({
					id: shortcode.id,
					shortcode: shortcode.tag,
					params: this.unescapeParams(params),
					parent_id: shortcode.parent_id,
					from_content: !0
				}, {
					silent: !0
				});
				$block.attr("data-model-id", model.get("id")), this._renderBlockCallback($block.get(0))
			}, this), window.vc.frame.setSortable(), this.checkNoContent(), window.vc.frame.render();
			try {
				window.vc.frame_window.vc_iframe.reload()
			} catch (err) {
				window.console && window.console.warn && window.console.warn("BuildFromContent render error", err)
			}
		},
		buildFromTemplate: function(html, data) {
			var templateShortcodesHasId;
			return templateShortcodesHasId = !1, _.each($(html), function(block) {
				var $block = $(block);
				$block.is("[data-type=files]") ? this._renderBlockCallback(block) : window.vc.app.placeElement($block)
			}, this), _.each(data, function(encoded_shortcode) {
				var shortcode, $block, params, model, id_param;
				shortcode = JSON.parse(decodeURIComponent(encoded_shortcode + "")), $block = window.vc.$page.find("[data-model-id=" + shortcode.id + "]"), params = _.isObject(shortcode.attrs) ? shortcode.attrs : {}, templateShortcodesHasId || (id_param = window.vc.shortcodeHasIdParam(shortcode.tag)) && !_.isUndefined(params) && !_.isUndefined(params[id_param.param_name]) && 0 < params[id_param.param_name].length && (templateShortcodesHasId = !0), model = window.vc.shortcodes.create({
					id: shortcode.id,
					shortcode: shortcode.tag,
					params: this.unescapeParams(params),
					parent_id: shortcode.parent_id,
					from_template: !0
				}), $block.attr("data-model-id", model.get("id")), this._renderBlockCallback($block.get(0))
			}, this), window.vc.frame.setSortable(), window.vc.activity = !1, this.checkNoContent(), window.vc.frame_window.vc_iframe.loadScripts(), this.last() && window.vc.frame.scrollTo(this.first()), this.models = [], this.showResultMessage(), window.vc.frame.render(), this.is_build_complete = !0, templateShortcodesHasId
		},
		_renderBlockCallback: function(block) {
			var $html, model, $this = $(block);
			"files" === $this.data("type") ? (window.vc.frame_window.vc_iframe.addScripts($this.find("script,link")), window.vc.frame_window.vc_iframe.addStyles($this.find("style"))) : (model = window.vc.shortcodes.get($this.data("modelId")), $html = $this.is("[data-type=element]") ? $($this.html()) : $this, model && model.get("shortcode") && this.renderShortcode($html, model)), window.vc.setFrameSize()
		},
		renderShortcode: function($html, model) {
			var view_name, inner_html, update_inner;
			view_name = this.getView(model), inner_html = $html, window.vc.last_inner = inner_html.html(), $("script", inner_html).each(function() {
				if ($(this).attr("src")) {
					var key = window.vc.frame.addInlineScript($(this));
					$('<span class="js_placeholder_' + key + '"></span>').insertAfter($(this)), update_inner = !0
				} else {
					var key_inline = window.vc.frame.addInlineScriptBody($(this));
					$('<span class="js_placeholder_inline_' + key_inline + '"></span>').insertAfter($(this)), update_inner = !0
				}
				$(this).remove()
			}), update_inner && $html.html(inner_html.html()), model.get("from_content") || model.get("from_template") || this.placeContainer($html, model), model.view = new view_name({
				model: model,
				el: $html
			}).render(), this.notifyParent(model.get("parent_id")), model.view.rendered()
		},
		getView: function(model) {
			var view = model.setting("is_container") || model.setting("as_parent") ? InlineShortcodeViewContainer : InlineShortcodeView;
			return _.isObject(window["InlineShortcodeView_" + model.get("shortcode")]) && (view = window["InlineShortcodeView_" + model.get("shortcode")]), view
		},
		update: function(model) {
			var tag, shortcode;
			tag = model.get("shortcode"), shortcode = this.toString(model), window.vc.setDataChanged(), this.ajax({
				action: "vc_load_shortcode",
				shortcodes: [{
					id: model.get("id"),
					string: shortcode,
					tag: tag
				}],
				_vcnonce: window.vcAdminNonce
			}, window.vc.frame_window.location.href).done(function(html) {
				var old_view;
				old_view = model.view, _.each($(html), function(block) {
					this._renderBlockCallback(block)
				}, this), model.view && (model.view.$el.insertAfter(old_view.$el), window.vc.shortcodes.where({
					parent_id: model.get("id")
				}).length && old_view.content().find("> *").appendTo(model.view.content()), old_view.remove(), window.vc.frame_window.vc_iframe.loadScripts(), model.view.changed(), window.vc.frame.setSortable(), model.view.updated())
			})
		},
		ajax: function(data, url) {
			return this._ajax = $.ajax({
				url: url || window.vc.admin_ajax,
				type: "POST",
				dataType: "html",
				data: _.extend({
					post_id: vc_post_id,
					vc_inline: !0,
					_vcnonce: window.vcAdminNonce
				}, data),
				context: this
			}), this._ajax
		},
		notifyParent: function(parent_id) {
			var parent = window.vc.shortcodes.get(parent_id);
			parent && parent.view && parent.view.changed()
		},
		remove: function() {},
		_getContainer: function(model) {
			var container, parent_model, parent_id;
			if (!1 !== (parent_id = model.get("parent_id"))) {
				if (parent_model = window.vc.shortcodes.get(parent_id), _.isUndefined(parent_model)) return window.vc.app;
				container = parent_model.view
			} else container = window.vc.app;
			return container
		},
		placeContainer: function($html, model) {
			var container = this._getContainer(model);
			return container && container.placeElement($html, window.vc.activity), container
		},
		toString: function(model, type) {
			var paramsForString, params, content, mergedParams, tag;
			return paramsForString = {}, tag = model.get("shortcode"), params = _.extend({}, model.get("params")), mergedParams = window.vc.getMergedParams(tag, params), content = _.isString(params.content) ? params.content : "", _.each(mergedParams, function(value, key) {
				paramsForString[key] = this.escapeParam(value)
			}, this), wp.shortcode.string({
				tag: tag,
				attrs: paramsForString,
				content: content,
				type: _.isString(type) ? type : ""
			})
		},
		getContent: function() {
			var models;
			return models = _.sortBy(window.vc.shortcodes.where({
				parent_id: !1
			}), function(model) {
				return model.get("order")
			}), window.vc.shortcodes.modelsToString(models)
		},
		getTitle: function() {
			return window.vc.title
		},
		checkNoContent: function() {
			window.vc.frame.noContent(!vc.shortcodes.length)
		},
		save: function(status) {
			var string, data;
			string = this.getContent(), (data = {
				action: "vc_save"
			}).vc_post_custom_css = window.vc.$custom_css.val(), data.content = this.wpautop(string), status && (data.post_status = status, $(".vc_button_save_draft").hide(100), $("#vc_button-update").text(window.i18nLocale.update_all)), window.vc.update_title && (data.post_title = this.getTitle()), this.ajax(data).done(function() {
				window.vc.unsetDataChanged(), window.vc.showMessage(window.i18nLocale.vc_successfully_updated || "Successfully updated!")
			})
		},
		parse: function(data, content, parent) {
			var tags, reg, matches;
			return tags = _.keys(window.vc.map).join("|"), reg = window.wp.shortcode.regexp(tags), matches = content.trim().match(reg), _.isNull(matches) || _.each(matches, function(raw) {
				var sub_matches, sub_content, sub_regexp, atts_raw, atts, shortcode, id, map_settings;
				sub_content = (sub_matches = raw.match(this.regexp(tags)))[5], sub_regexp = new RegExp("^[\\s]*\\[\\[?(" + _.keys(window.vc.map).join("|") + ")(?![\\w-])"), atts_raw = window.wp.shortcode.attrs(sub_matches[3]), atts = {}, id = vc_guid(), _.each(atts_raw.named, function(value, key) {
					atts[key] = this.unescapeParam(value)
				}, this), shortcode = {
					id: id,
					shortcode: sub_matches[2],
					params: _.extend({}, atts),
					parent_id: !!_.isObject(parent) && parent.id
				}, map_settings = window.vc.getMapped(shortcode.shortcode), _.isArray(data) ? (data.push(shortcode), id = data.length - 1) : data[id] = shortcode, id == shortcode.root_id && (data[id].html = raw), _.isString(sub_content) && sub_content.match(sub_regexp) && (map_settings.is_container && _.isBoolean(map_settings.is_container) && !0 === map_settings.is_container || !_.isEmpty(map_settings.as_parent) && !1 !== map_settings.as_parent) ? data = this.parse(data, sub_content, data[id]) : _.isString(sub_content) && sub_content.length && "vc_row" === sub_matches[2] ? data = this.parse(data, '[vc_column width="1/1"][vc_column_text]' + sub_content + "[/vc_column_text][/vc_column]", data[id]) : _.isString(sub_content) && sub_content.length && "vc_column" === sub_matches[2] ? data = this.parse(data, "[vc_column_text]" + sub_content + "[/vc_column_text]", data[id]) : _.isString(sub_content) && (data[id].params.content = sub_content)
			}, this), data
		},
		regexp: _.memoize(function(tags) {
			return new RegExp("\\[(\\[?)(" + tags + ")(?![\\w-])([^\\]\\/]*(?:\\/(?!\\])[^\\]\\/]*)*?)(?:(\\/)\\]|\\](?:([^\\[]*(?:\\[(?!\\/\\2\\])[^\\[]*)*)(\\[\\/\\2\\]))?)(\\]?)")
		}),
		wpautop: function(str) {
			return str = vc_wpautop(str)
		},
		escapeParam: function(value) {
			return _.isUndefined(value) || _.isNull(value) || !value.toString ? "" : value.toString().replace(/"/g, "``").replace(/\[/g, "`{`").replace(/\]/g, "`}`")
		},
		unescapeParam: function(value) {
			return value = value.replace(/(\`{\`)/g, "[").replace(/(\`}\`)/g, "]").replace(/(\`{2})/g, '"'), value = vc_wpnop(value)
		},
		unescapeParams: function(params) {
			return _.object(_.map(params, function(value, key) {
				return [key, this.unescapeParam(value)]
			}, this))
		},
		setResultMessage: function(str) {
			this.message = str
		},
		showResultMessage: function() {
			!1 !== this.message && window.vc.showMessage(this.message), this.message = !1
		}
	}, window.vc.builder = new window.vc.ShortcodesBuilder
}(window.jQuery),
function() {
	"use strict";
	_.isUndefined(window.vc) && (window.vc = {});
	var Shortcode = Backbone.Model.extend({
		defaults: function() {
			return {
				id: vc_guid(),
				shortcode: "vc_text_block",
				order: vc.shortcodes.nextOrder(),
				params: {},
				parent_id: !1
			}
		},
		settings: !1,
		getParam: function(key) {
			return _.isObject(this.get("params")) && !_.isUndefined(this.get("params")[key]) ? this.get("params")[key] : ""
		},
		sync: function() {
			return !1
		},
		setting: function(name) {
			return !1 === this.settings && (this.settings = vc.getMapped(this.get("shortcode")) || {}), this.settings[name]
		},
		view: !1
	}),
	Shortcodes = Backbone.Collection.extend({
		model: Shortcode,
		sync: function() {
			return !1
		},
		nextOrder: function() {
			return this.length ? this.last().get("order") + 1 : 1
		},
		initialize: function() {
			this.bind("remove", this.removeChildren, this), this.bind("remove", vc.builder.checkNoContent), this.bind("remove", this.removeEvents, this)
		},
		comparator: function(model) {
			return model.get("order")
		},
		removeEvents: function(model) {
			window.vc.events.triggerShortcodeEvents("destroy", model)
		},
		removeChildren: function(parent) {
			var models = vc.shortcodes.where({
				parent_id: parent.id
			});
			_.each(models, function(model) {
				model.destroy()
			}, this)
		},
		stringify: function(state) {
			var models = _.sortBy(vc.shortcodes.where({
				parent_id: !1
			}), function(model) {
				return model.get("order")
			});
			return this.modelsToString(models, state)
		},
		singleStringify: function(id, state) {
			return this.modelsToString([vc.shortcodes.get(id)], state)
		},
		createShortcodeString: function(model, state) {
			var mapped, data, tag, params, content, paramsForString, mergedParams, isContainer;
			return tag = model.get("shortcode"), params = _.extend({}, model.get("params")), paramsForString = {}, mergedParams = vc.getMergedParams(tag, params), _.each(mergedParams, function(value, key) {
				paramsForString[key] = vc.builder.escapeParam(value)
			}, this), mapped = vc.getMapped(tag), isContainer = _.isObject(mapped) && (_.isBoolean(mapped.is_container) && !0 === mapped.is_container || !_.isEmpty(mapped.as_parent)), content = this._getShortcodeContent(model, state), data = {
				tag: tag,
				attrs: paramsForString,
				content: content,
				type: _.isUndefined(vc.getParamSettings(tag, "content")) && !isContainer ? "single" : ""
			}, _.isUndefined(state) ? model.trigger("stringify", model, data) : model.trigger("stringify:" + state, model, data), wp.shortcode.string(data)
		},
		modelsToString: function(models, state) {
			return _.reduce(models, function(memo, model) {
				return memo + this.createShortcodeString(model, state)
			}, "", this)
		},
		_getShortcodeContent: function(parent, state) {
			var models, params;
			return (models = _.sortBy(window.vc.shortcodes.where({
				parent_id: parent.get("id")
			}), function(model) {
				return model.get("order")
			})).length ? _.reduce(models, function(memo, model) {
				return memo + this.createShortcodeString(model, state)
			}, "", this) : (params = _.extend({}, parent.get("params")), _.isUndefined(params.content) ? "" : params.content)
		},
		create: function(model, options) {
			return (model = Shortcodes.__super__.create.call(this, model, options)).get("cloned") && window.vc.events.triggerShortcodeEvents("clone", model), window.vc.events.triggerShortcodeEvents("add", model), model
		}
	});
	window.vc.shortcodes = new Shortcodes
}(window.jQuery),
function($) {
	"use strict";
	_.isUndefined(window.vc) && (window.vc = {});
	vc.showSpinner = function() {
		$("#vc_logo").addClass("vc_ui-wp-spinner")
	};
	vc.hideSpinner = function() {
		$("#vc_logo").removeClass("vc_ui-wp-spinner")
	};
	$(document).ajaxSend(function(e, xhr, req) {
		req && req.data && "string" == typeof req.data && req.data.match(/vc_inline=true/) && vc.showSpinner()
	}).ajaxStop(function() {
		vc.hideSpinner()
	});
	vc.active_panel = !1;
	vc.sidebar_active = false;
	vc.closeActivePanel = function(model) {
		if (!this.active_panel) return !1;
		(model && vc.active_panel.model && vc.active_panel.model.get("id") === model.get("id") || !model) && (vc.active_panel.model = null, this.active_panel.hide());
	};
	vc.activePanelName = function() {
		return this.active_panel && this.active_panel.panelName ? this.active_panel.panelName : null
	};
	vc.updateSettingsBadge = function() {
		var value = vc.$custom_css.val();
		value && "" !== value.trim() ? $("#vc_post-css-badge").show() : $("#vc_post-css-badge").hide()
	};
	vc.ModalView = Backbone.View.extend({
		message_box_timeout: !1,
		events: {
			"hidden.bs.modal": "hide",
			"shown.bs.modal": "shown"
		},
		initialize: function() {
			_.bindAll(this, "setSize", "hide")
		},
		setSize: function() {
			var height = $(window).height() - 150;
			this.$content.css("maxHeight", height), this.trigger("setSize")
		},
		render: function() {
			$(window).bind("resize.ModalView", this.setSize);
			this.setSize();
			vc.closeActivePanel();
			this.$el.modal("show");
			return this
		},
		showMessage: function(text, type) {
			this.message_box_timeout && this.$el.find(".vc_message").remove() && window.clearTimeout(this.message_box_timeout), this.message_box_timeout = !1;
			var $message_box = $('<div class="vc_message type-' + type + '"></div>');
			this.$el.find(".vc_modal-body").prepend($message_box), $message_box.text(text).fadeIn(), this.message_box_timeout = window.setTimeout(function() {
				$message_box.remove()
			}, 6e3)
		},
		hide: function() {
			$(window).unbind("resize.ModalView")
		},
		shown: function() {}
	});
	vc.element_start_index = 0;
	vc.PanelView = vc.View.extend({
		mediaSizeClassPrefix: "vc_media-",
		customMediaQuery: !0,
		panelName: "panel",
		draggable: !1,
		$body: !1,
		$tabs: !1,
		$content: !1,
		events: {
			"click [data-dismiss=panel]": "hide",
			"mouseover [data-transparent=panel]": "addOpacity",
			"click [data-transparent=panel]": "toggleOpacity",
			"mouseout [data-transparent=panel]": "removeOpacity",
			"click .vc_panel-tabs-link": "changeTab"
		},
		_vcUIEventsHooks: [{
			resize: "setResize"
		}],
		options: {
			startTab: 0
		},
		clicked: !1,
		showMessageDisabled: !0,
		saveUpdateSelector: '.vc_navbar-frontend .vc_navbar-saveupdate button',
		initialize: function() {
			this.clicked = !1;
			this.$el.removeClass("vc_panel-opacity");
			this.$body = $("body");
			this.$content = this.$el.find(".vc_panel-body");
			_.bindAll(this, "setSize", "fixElContainment", "changeTab", "setTabsSize", "cloneNavButtons");
			this.on("show", this.setSize, this);
			this.on("setSize", this.setResize, this);
			this.on("render", this.resetMinimize, this);
			_.defer(() => {
				this.cloneNavButtons();
				$(document).on('lqd-sidebar-active', () => {
					if ( ! vc.sidebar_active ) {
						this.customMediaQuery && this.setMediaSizeClass();
					}
				})
			});
		},
		toggleOpacity: function() {
			this.clicked = !this.clicked
		},
		addOpacity: function() {
			this.clicked || this.$el.addClass("vc_panel-opacity")
		},
		removeOpacity: function() {
			this.clicked || this.$el.removeClass("vc_panel-opacity")
		},
		message_box_timeout: !1,
		init: function() {},
		render: function() {
			this.trigger("render");
			this.trigger("afterRender");
			return this;
		},
		show: function() {
			if (!this.$el.hasClass("vc_active")) {
				vc.closeActivePanel();
				this.init();
				(vc.active_panel = this).clicked = !1;
				this.$el.removeClass("vc_panel-opacity");
				var $tabs = this.$el.find(".vc_panel-tabs");
				$tabs.length && (this.$tabs = $tabs, this.setTabs());
				this.$el.addClass("vc_active");
				this.draggable ? this.initDraggable() : $(window).trigger("resize");
				this.fixElContainment();
				this.trigger("show");
			}
		},
		hide: function(e) {
			e && e.preventDefault && e.preventDefault();
			this.model && (this.model = null);
			this.$el.removeClass("vc_active")
			vc.active_panel = !1;
			this.trigger('hide');
			vc.sidebar_active && vc.activePanelName() !== 'panel' && vc.add_element_block_view.render(!1);
		},
		content: function() {
			return this.$el.find(".panel-body")
		},
		setResize: function() {
			this.customMediaQuery && this.setMediaSizeClass()
		},
		setMediaSizeClass: function() {
			var modalWidth, classes;
			classes = {
				xs: !0,
				sm: !1,
				md: !1,
				lg: !1
			}, 740 <= (modalWidth = this.$el.width()) && (classes.sm = !0), 810 <= modalWidth && (classes.md = !0), 945 <= modalWidth && (classes.lg = !0), _.each(classes, function(value, key) {
				value ? this.$el.addClass(this.mediaSizeClassPrefix + key) : this.$el.removeClass(this.mediaSizeClassPrefix + key)
			}, this)
		},
		fixElContainment: function() {
			this.$body || (this.$body = $("body"));
			var containment = [20 - this.$el.width(), 0, this.$body.width() - 20, this.$body.height() - 30],
			positions = this.$el.position(),
			new_positions = {};
			positions.left < containment[0] && (new_positions.left = containment[0]);
			positions.top < 0 && (new_positions.top = 0);
			positions.left > containment[2] && (new_positions.left = containment[2]);
			positions.top > containment[3] && (new_positions.top = containment[3]);
			this.$el.css(new_positions);
			this.trigger("fixElContainment");
			this.setSize();
		},
		initDraggable: function() {
			this.$el.draggable({
				iframeFix: !0,
				handle: ".vc_panel-heading",
				start: this.fixElContainment,
				stop: this.fixElContainment
			}), this.draggable = !0
		},
		setSize: function() {
			this.trigger("setSize")
		},
		setTabs: function() {
			this.$tabs.length && (this.$tabs.find(".vc_panel-tabs-control").removeClass("vc_active").eq(this.options.startTab).addClass("vc_active"), this.$tabs.find(".vc_panel-tab").removeClass("vc_active").eq(this.options.startTab).addClass("vc_active"), window.setTimeout(this.setTabsSize, 100))
		},
		setTabsSize: function() {
			this.$tabs && this.$tabs.parents(".vc_with-tabs.vc_panel-body").css("margin-top", this.$tabs.find(".vc_panel-tabs-menu").outerHeight())
		},
		changeTab: function(e) {
			if (e && e.preventDefault && e.preventDefault(), e.target && this.$tabs) {
				var $tab = $(e.target);
				this.$tabs.find(".vc_active").removeClass("vc_active"), $tab.parent().addClass("vc_active"), this.$el.find($tab.data("target")).addClass("vc_active"), window.setTimeout(this.setTabsSize, 100)
			}
		},
		showMessage: function(text, type) {
			if (this.showMessageDisabled) return !1;
			this.message_box_timeout && (this.$el.find(".vc_panel-message").remove(), window.clearTimeout(this.message_box_timeout)), this.message_box_timeout = !1;
			var $message_box = $('<div class="vc_panel-message type-' + type + '"></div>').appendTo(this.$el.find(".vc_ui-panel-content-container"));
			$message_box.text(text).fadeIn(), this.message_box_timeout = window.setTimeout(function() {
				$message_box.remove()
			}, 6e3)
		},
		isVisible: function() {
			return this.$el.is(":visible")
		},
		resetMinimize: function() {
			this.$el.removeClass("vc_panel-opacity")
		},
		cloneNavButtons: function() {
			if ( $(this.saveUpdateSelector).length ) {
				$(this.saveUpdateSelector).clone(true).appendTo(this.$el.find('.vc_ui-panel-footer'));
			}
		},
	}), vc.PostSettingsPanelView = vc.PanelView.extend({
		events: {
			"click [data-save=true]": "save",
			"click [data-dismiss=panel]": "hide",
			"click [data-transparent=panel]": "toggleOpacity",
			"mouseover [data-transparent=panel]": "addOpacity",
			"mouseout [data-transparent=panel]": "removeOpacity"
		},
		saved_css_data: "",
		saved_title: "",
		$title: !1,
		editor: !1,
		post_settings_editor: !1,
		initialize: function() {
			vc.$custom_css = $("#vc_post-custom-css");
			this.saved_css_data = vc.$custom_css.val();
			this.saved_title = vc.title;
			this.initEditor();
			this.$body = $("body");
			_.bindAll(this, "setSize", "fixElContainment");
			this.on("show", this.setSize, this);
			this.on("setSize", this.setResize, this);
			this.on("render", this.resetMinimize, this);
			_.defer(() => {
				this.cloneNavButtons();
			});
		},
		initEditor: function() {
			this.editor = new Vc_postSettingsEditor
		},
		render: function() {
			return this.trigger("render"), this.$title = this.$el.find("#vc_page-title-field"), this.$title.val(vc.title), this.setEditor(), this.trigger("afterRender"), this
		},
		setEditor: function() {
			this.editor.setEditor(vc.$custom_css.val())
		},
		setSize: function() {
			this.editor.setSize(), this.trigger("setSize")
		},
		save: function() {
			if (this.$title) {
				var title = this.$title.val();
				title !== vc.title && vc.frame.setTitle(title)
			}
			this.setAlertOnDataChange(), vc.$custom_css.val(this.editor.getValue()), vc.frame_window && vc.frame_window.vc_iframe.loadCustomCss(vc.$custom_css.val()), vc.updateSettingsBadge(), this.showMessage(window.i18nLocale.css_updated, "success"), this.trigger("save")
		},
		setAlertOnDataChange: function() {
			(this.saved_css_data !== this.editor.getValue() || this.$title && this.saved_title !== this.$title.val()) && vc.setDataChanged()
		}
	});
	vc.PostSettingsPanelViewBackendEditor = vc.PostSettingsPanelView.extend({
		render: function() {
			return this.trigger("render"), this.setEditor(), this.trigger("afterRender"), this
		},
		setAlertOnDataChange: function() {
			vc.saved_custom_css !== this.editor.getValue() && window.tinymce && (window.switchEditors.go("content", "tmce"), window.setTimeout(function() {
				window.tinymce.get("content").isNotDirty = !1
			}, 1e3))
		},
		save: function() {
			vc.PostSettingsPanelViewBackendEditor.__super__.save.call(this);
			this.hide()
		}
	});
	vc.TemplatesEditorPanelView = vc.PanelView.extend({
		events: {
			"click [data-dismiss=panel]": "hide",
			"click [data-transparent=panel]": "toggleOpacity",
			"mouseover [data-transparent=panel]": "addOpacity",
			"mouseout [data-transparent=panel]": "removeOpacity",
			"click .wpb_remove_template": "removeTemplate",
			"click [data-template_id]": "loadTemplate",
			"click [data-template_name]": "loadDefaultTemplate",
			"click #vc_template-save": "saveTemplate"
		},
		render: function() {
			this.trigger("render"), this.$name = $("#vc_template-name"), this.$list = $("#vc_template-list");
			var $tabs = $("#vc_tabs-templates");
			return $tabs.find(".vc_edit-form-tab-control").removeClass("vc_active").eq(0).addClass("vc_active"), $tabs.find('[data-vc-ui-element="panel-edit-element-tab"]').removeClass("vc_active").eq(0).addClass("vc_active"), $tabs.find(".vc_edit-form-link").on("click", function(e) {
				e.preventDefault();
				var $this = $(this);
				$tabs.find(".vc_active").removeClass("vc_active"), $this.parent().addClass("vc_active"), $($this.attr("href")).addClass("vc_active")
			}), this.trigger("afterRender"), this
		},
		removeTemplate: function(e) {
			e && e.preventDefault && e.preventDefault();
			var $button = $(e.currentTarget),
			template_name = $button.closest('[data-vc-ui-element="template-title"]').text();
			confirm(window.i18nLocale.confirm_deleting_template.replace("{template_name}", template_name)) && ($button.closest('[data-vc-ui-element="template"]').remove(), this.$list.html(window.i18nLocale.loading), $.ajax({
				type: "POST",
				url: window.ajaxurl,
				data: {
					action: "wpb_delete_template",
					template_id: $button.attr("rel"),
					vc_inline: !0,
					_vcnonce: window.vcAdminNonce
				},
				context: this
			}).done(function(html) {
				this.$list.html(html)
			}))
		},
		loadTemplate: function(e) {
			e && e.preventDefault && e.preventDefault();
			var $button = $(e.currentTarget);
			$.ajax({
				type: "POST",
				url: vc.frame_window.location.href,
				data: {
					action: "vc_frontend_template",
					template_id: $button.data("template_id"),
					vc_inline: !0,
					_vcnonce: window.vcAdminNonce
				},
				context: this
			}).done(function(html) {
				var template, data;
				_.each($(html), function(element) {
					if ("vc_template-data" === element.id) try {
						data = JSON.parse(element.innerHTML)
					} catch (err) {
						window.console && window.console.warn && window.console.warn("loadTemplate json error", err)
					}
					"vc_template-html" === element.id && (template = element.innerHTML)
				});
				template && data && vc.builder.buildFromTemplate(template, data);
				this.showMessage(window.i18nLocale.template_added, "success");
				vc.activePanelName() === 'template_window' && vc.closeActivePanel();
			})
		},
		ajaxData: function($button) {
			return {
				action: "vc_frontend_default_template",
				template_name: $button.data("template_name"),
				vc_inline: !0,
				_vcnonce: window.vcAdminNonce
			}
		},
		loadDefaultTemplate: function(e) {
			e && e.preventDefault && e.preventDefault();
			var $button = $(e.currentTarget);
			$.ajax({
				type: "POST",
				url: vc.frame_window.location.href,
				data: this.ajaxData($button),
				context: this
			}).done(function(html) {
				var template, data;
				_.each($(html), function(element) {
					if ("vc_template-data" === element.id) try {
						data = JSON.parse(element.innerHTML)
					} catch (err) {
						window.console && window.console.warn && window.console.warn("loadDefaultTemplate json error", err)
					}
					"vc_template-html" === element.id && (template = element.innerHTML)
				}), template && data && vc.builder.buildFromTemplate(template, data), this.showMessage(window.i18nLocale.template_added, "success")
			})
		},
		saveTemplate: function(e) {
			e && e.preventDefault && e.preventDefault();
			var data, shortcodes, name = this.$name.val();
			if (_.isString(name) && name.length) {
				if (!(shortcodes = this.getPostContent()).trim().length) return this.showMessage(window.i18nLocale.template_is_empty, "error"), !1;
				data = {
					action: "wpb_save_template",
					template: shortcodes,
					template_name: name,
					frontend: !0,
					vc_inline: !0,
					_vcnonce: window.vcAdminNonce
				}, this.$name.val(""), this.showMessage(window.i18nLocale.template_save, "success"), this.reloadTemplateList(data)
			} else this.showMessage(window.i18nLocale.please_enter_templates_name, "error")
		},
		reloadTemplateList: function(data) {
			this.$list.html(window.i18nLocale.loading).load(window.ajaxurl, data)
		},
		getPostContent: function() {
			return vc.builder.getContent()
		}
	});
	vc.TemplatesEditorPanelViewBackendEditor = vc.TemplatesEditorPanelView.extend({
		ajaxData: function($button) {
			return {
				action: "vc_backend_template",
				template_id: $button.attr("data-template_id"),
				vc_inline: !0,
				_vcnonce: window.vcAdminNonce
			}
		},
		loadTemplate: function(e) {
			e && e.preventDefault && e.preventDefault();
			var $button = $(e.currentTarget);
			$.ajax({
				type: "POST",
				url: window.ajaxurl,
				data: this.ajaxData($button),
				context: this
			}).done(function(shortcodes) {
				_.each(vc.filters.templates, function(callback) {
					shortcodes = callback(shortcodes)
				}), vc.storage.append(shortcodes), vc.shortcodes.fetch({
					reset: !0
				}), vc.closeActivePanel()
			})
		},
		loadDefaultTemplate: function(e) {
			e && e.preventDefault && e.preventDefault();
			var $button = $(e.currentTarget);
			$.ajax({
				type: "POST",
				url: window.ajaxurl,
				data: {
					action: "vc_backend_default_template",
					template_name: $button.attr("data-template_name"),
					vc_inline: !0,
					_vcnonce: window.vcAdminNonce
				},
				context: this
			}).done(function(shortcodes) {
				_.each(vc.filters.templates, function(callback) {
					shortcodes = callback(shortcodes)
				}), vc.storage.append(shortcodes), vc.shortcodes.fetch({
					reset: !0
				})
			})
		},
		getPostContent: function() {
			return vc.storage.getContent()
		}
	});
	vc.TemplatesPanelViewBackend = vc.PanelView.extend({
		$name: !1,
		$list: !1,
		template_load_action: "vc_backend_load_template",
		templateLoadPreviewAction: "vc_load_template_preview",
		save_template_action: "vc_save_template",
		delete_template_action: "vc_delete_template",
		appendedTemplateType: "my_templates",
		appendedTemplateCategory: "my_templates",
		appendedCategory: "my_templates",
		appendedClass: "my_templates",
		loadUrl: window.ajaxurl,
		events: $.extend(vc.PanelView.prototype.events, {
			"click .vc_template-save-btn": "saveTemplate",
			"click [data-template_id] [data-template-handler]": "loadTemplate",
			"click .vc_template-delete-icon": "removeTemplate"
		}),
		initialize: function() {
			_.bindAll(this, "checkInput", "saveTemplate");
			vc.TemplatesPanelViewBackend.__super__.initialize.call(this)
		},
		render: function() {
			this.$el.css("left", ($(window).width() - this.$el.width()) / 2);
			this.$name = this.$el.find('[data-js-element="vc-templates-input"]');
			this.$name.off("keypress").on("keypress", this.checkInput);
			this.$list = this.$el.find(".vc_templates-list-my_templates");
			vc.TemplatesPanelViewBackend.__super__.render.call(this);
			return this;
		},
		saveTemplate: function(e) {
			var name, data, shortcodes, _this;
			return e && e.preventDefault && e.preventDefault(), name = this.$name.val(), _this = this, _.isString(name) && name.length ? (shortcodes = this.getPostContent()).trim().length ? (data = {
				action: this.save_template_action,
				template: shortcodes,
				template_name: name,
				vc_inline: !0,
				_vcnonce: window.vcAdminNonce
			}, void this.setButtonMessage(void 0, void 0, !0).reloadTemplateList(data, function() {
				_this.$name.val("").change()
			}, function() {
				_this.showMessage(window.i18nLocale.template_save_error, "error"), _this.clearButtonMessage()
			})) : (this.showMessage(window.i18nLocale.template_is_empty, "error"), !1) : (this.showMessage(window.i18nLocale.please_enter_templates_name, "error"), !1)
		},
		checkInput: function(e) {
			if (13 === e.which) return this.saveTemplate(), !1
		},
		removeTemplate: function(e) {
			e && e.preventDefault && e.preventDefault(), e && e.stopPropagation && e.stopPropagation();
			var $template = $(e.target).closest("[data-template_id]"),
			template_name = $template.find('[data-vc-ui-element="template-title"]').text();
			if (confirm(window.i18nLocale.confirm_deleting_template.replace("{template_name}", template_name))) {
				var template_id = $template.data("template_id"),
				template_type = $template.data("template_type"),
				template_action = $template.data("template_action");
				$template.remove(), $.ajax({
					type: "POST",
					url: window.ajaxurl,
					data: {
						action: template_action || this.delete_template_action,
						template_id: template_id,
						template_type: template_type,
						vc_inline: !0,
						_vcnonce: window.vcAdminNonce
					},
					context: this
				}).done(function() {
					this.showMessage(window.i18nLocale.template_removed, "success"), vc.events.trigger("templates:delete", {
						id: template_id,
						type: template_type
					})
				})
			}
		},
		reloadTemplateList: function(data, successCallback, errorCallback) {
			var _this = this;
			$.ajax({
				type: "POST",
				url: window.ajaxurl,
				data: data,
				context: this
			}).done(function(html) {
				_this.filter = !1, _this.$list || (_this.$list = _this.$el.find(".vc_templates-list-my_templates")), _this.$list.prepend($(html)), "function" == typeof successCallback && successCallback(html)
			}).error("function" == typeof errorCallback ? errorCallback : function() {})
		},
		getPostContent: function() {
			return vc.shortcodes.stringify("template")
		},
		loadTemplate: function(e) {
			e && e.preventDefault && e.preventDefault(), e && e.stopPropagation && e.stopPropagation();
			var $template = $(e.target).closest("[data-template_id][data-template_type]");
			$.ajax({
				type: "POST",
				url: this.loadUrl,
				data: {
					action: this.template_load_action,
					template_unique_id: $template.data("template_id"),
					template_type: $template.data("template_type"),
					vc_inline: !0,
					_vcnonce: window.vcAdminNonce
				},
				context: this
			}).done(this.renderTemplate)
		},
		renderTemplate: function(html) {
			var models;
			_.each(vc.filters.templates, function(callback) {
				html = callback(html)
			}), models = vc.storage.parseContent({}, html), _.each(models, function(model) {
				vc.shortcodes.create(model)
			}), vc.closeActivePanel()
		},
		buildTemplatePreview: function(e) {
			e && e.preventDefault && e.preventDefault();
			try {
				var url, $el = $(e.currentTarget),
				$wrapper = $el.closest("[data-template_id]");
				if ($wrapper.hasClass("vc_active") || $wrapper.hasClass("vc_loading")) $el.vcAccordion("collapseTemplate");
				else {
					var $localContent = $wrapper.find("[data-js-content]"),
					localContentChilds = 0 < $localContent.children().length;
					if (this.$content = $localContent, this.$content.find("iframe").length) return $el.vcAccordion("collapseTemplate"), !0;
					var _this = this;
					$el.vcAccordion("collapseTemplate", function() {
						var templateId = $wrapper.data("template_id"),
						templateType = $wrapper.data("template_type");
						if (templateId && !localContentChilds) {
							var question = "?"; - 1 < window.ajaxurl.indexOf("?") && (question = "&"), url = window.ajaxurl + question + $.param({
								action: _this.templateLoadPreviewAction,
								template_unique_id: templateId,
								template_type: templateType,
								vc_inline: !0,
								post_id: vc_post_id,
								_vcnonce: window.vcAdminNonce
							}), $el.find("i").addClass("vc_ui-wp-spinner"), _this.$content.html('<iframe style="width: 100%;" data-vc-template-preview-frame="' + templateId + '"></iframe>');
							var $frame = _this.$content.find("[data-vc-template-preview-frame]");
							$frame.attr("src", url), $wrapper.addClass("vc_loading"), $frame.on("load", function() {
								$wrapper.removeClass("vc_loading"), $el.find("i").removeClass("vc_ui-wp-spinner")
							})
						}
					})
				}
			} catch (err) {
				window.console && window.console.warn && window.console.warn("buildTemplatePreview error", err), this.showMessage("Failed to build preview", "error")
			}
		},
		setTemplatePreviewSize: function(height) {
			var iframe = this.$content.find("iframe");
			0 < iframe.length && (iframe = iframe[0], void 0 === height && (iframe.height = iframe.contentWindow.document.body.offsetHeight, height = iframe.contentWindow.document.body.scrollHeight), iframe.height = height + "px")
		}
	});
	vc.TemplatesPanelViewFrontend = vc.TemplatesPanelViewBackend.extend({
		template_load_action: "vc_frontend_load_template",
		loadUrl: !1,
		initialize: function() {
			this.loadUrl = vc.$frame.attr("src"), vc.TemplatesPanelViewFrontend.__super__.initialize.call(this)
		},
		render: function() {
			return vc.TemplatesPanelViewFrontend.__super__.render.call(this)
		},
		renderTemplate: function(html) {
			var template, data;
			_.each($(html), function(element) {
				if ("vc_template-data" === element.id) try {
					data = JSON.parse(element.innerHTML)
				} catch (err) {
					window.console && window.console.warn && window.console.warn("renderTemplate error", err)
				}
				"vc_template-html" === element.id && (template = element.innerHTML)
			}), template && data && vc.builder.buildFromTemplate(template, data) ? this.showMessage(window.i18nLocale.template_added_with_id, "error") : this.showMessage(window.i18nLocale.template_added, "success"), vc.sidebar_active || vc.closeActivePanel()
		}
	});
	vc.RowLayoutEditorPanelView = vc.PanelView.extend({
		events: {
			"click [data-dismiss=panel]": "hide",
			"click [data-transparent=panel]": "toggleOpacity",
			"mouseover [data-transparent=panel]": "addOpacity",
			"mouseout [data-transparent=panel]": "removeOpacity",
			"click .vc_layout-btn": "setLayout",
			"click #vc_row-layout-update": "updateFromInput"
		},
		_builder: !1,
		initialize: function() {
			window.vc.RowLayoutEditorPanelView.__super__.initialize.call(this);
		},
		render: function(model) {
			return this.$input = $("#vc_row-layout"), model && (this.model = model), this.addCurrentLayout(), this.resetMinimize(), vc.column_trig_changes = !0, this
		},
		builder: function() {
			return this._builder || (this._builder = new vc.ShortcodesBuilder), this._builder
		},
		addCurrentLayout: function() {
			vc.shortcodes.sort();
			var string = _.map(vc.shortcodes.where({
				parent_id: this.model.get("id")
			}), function(model) {
				var width = model.getParam("width");
				return width || "1/1"
			}, "", this).join(" + ");
			this.$input.val(string)
		},
		isBuildComplete: function() {
			return this.builder().isBuildComplete()
		},
		setLayout: function(e) {
			if (e && e.preventDefault && e.preventDefault(), !this.isBuildComplete()) return !1;
			var layout = $(e.currentTarget).attr("data-cells"),
			columns = this.model.view.convertRowColumns(layout, this.builder());
			this.$input.val(columns.join(" + "))
		},
		updateFromInput: function(e) {
			if (e && e.preventDefault && e.preventDefault(), !this.isBuildComplete()) return !1;
			var layout, cells = this.$input.val();
			!1 !== (layout = this.validateCellsList(cells)) ? this.model.view.convertRowColumns(layout, this.builder()) : window.alert(window.i18nLocale.wrong_cells_layout)
		},
		validateCellsList: function(cells) {
			var return_cells, split, b, num, denom;
			return return_cells = [], split = cells.replace(/\s/g, "").split("+"), !(1e3 <= _.reduce(_.map(split, function(c) {
				if (c.match(/^[vc\_]{0,1}span\d{1,2}$/)) {
					var converted_c = vc_convert_column_span_size(c);
					return !1 === converted_c ? 1e3 : (b = converted_c.split(/\//), return_cells.push(b[0] + "" + b[1]), 12 * parseInt(b[0], 10) / parseInt(b[1], 10))
				}
				return c.match(/^[1-9]|1[0-2]\/[1-9]|1[0-2]$/) ? (b = c.split(/\//), num = parseInt(b[0], 10), 5 !== (denom = parseInt(b[1], 10)) && 0 != 12 % denom || denom < num ? 1e3 : (return_cells.push(num + "" + denom), 5 === denom ? num : 12 * num / denom)) : 1e3
			}), function(num, memo) {
				return memo += num
			}, 0)) && return_cells.join("_")
		}
	}), vc.RowLayoutEditorPanelViewBackend = vc.RowLayoutEditorPanelView.extend({
		builder: function() {
			return this.builder || (this.builder = vc.storage), this.builder
		},
		isBuildComplete: function() {
			return !0
		},
		setLayout: function(e) {
			e && e.preventDefault && e.preventDefault();
			var layout = $(e.currentTarget).attr("data-cells"),
			columns = this.model.view.convertRowColumns(layout);
			this.$input.val(columns.join(" + "))
		}
	}), $(window).on("orientationchange", function() {
		vc.active_panel && vc.active_panel.$el.css({
			top: "",
			left: "auto",
			height: "auto",
			width: "auto"
		})
	}), $(window).bind("resize.fixElContainment", function() {
		vc.active_panel && vc.active_panel.fixElContainment && vc.active_panel.fixElContainment()
	}), $("body").on("keyup change input", "[data-vc-disable-empty]", function() {
		var _this = $(this),
		target = $(_this.data("vcDisableEmpty"))[0];
		_this.val() != '' ? target.removeAttribute("disabled") : target.setAttribute("disabled", !0)
	})
}(window.jQuery),
function() {
	"use strict";
	window.vc.HelperAjax = {
		ajax: !1,
		checkAjax: function() {
			this.ajax && this.ajax.abort()
		},
		resetAjax: function() {
			this.ajax = !1
		}
	}
}(),
function() {
	"use strict";
	window.vc.HelperPrompts = {
		uiEvents: {
			render: "removeAllPrompts"
		},
		removeAllPrompts: function() {
			this.$el.find(".vc_ui-panel-content-container").removeClass("vc_ui-content-hidden"), this.$el.find(".vc_ui-prompt").remove()
		}
	}
}(),
function($) {
	"use strict";
	window.vc.HelperPanelViewHeaderFooter = {
		buttonMessageTimeout: !1,
		events: {
			'click [data-vc-ui-element="button-save"]': "save",
			'click [data-vc-ui-element="button-close"]': "hide",
			'click [data-vc-ui-element="button-minimize"]': "toggleOpacity"
		},
		uiEvents: {
			save: "setButtonMessage",
			render: "clearButtonMessage"
		},
		resetMinimize: function() {
			this.$el.removeClass("vc_panel-opacity"), this.$el.removeClass("vc_minimized")
		},
		toggleOpacity: function(e) {
			e.preventDefault();
			var styles, hasStyle, _this = this,
			$target = this.$el,
			$panel = $target.find($target.data("vcPanel")),
			$panelContainer = $panel.closest($panel.data("vcPanelContainer")),
			$trigger = $(e.currentTarget);
			void 0 === $target.data("vcHasHeight") && $target.data("vcHasHeight", (styles = $target.attr("style"), hasStyle = !1, styles && styles.split(";").forEach(function(e) {
				var style = e.split(":");
				"height" === $.trim(style[0]) && (hasStyle = !0)
			}), hasStyle)), $target.hasClass("vc_minimized") ? (void 0 === $target.data("vcMinimizeHeight") && $target.data("vcMinimizeHeight", $(window).height() - .2 * $(window).height()), $target.animate({
				height: $target.data("vcMinimizeHeight")
			}, {
				duration: 400,
				start: function() {
					$trigger.prop("disabled", !0), $target.addClass("vc_animating"), _this.tabsMenu && _this.tabsMenu() && _this.tabsMenu().vcTabsLine("moveTabs")
				},
				complete: function() {
					$target.removeClass("vc_minimized"), $target.removeClass("vc_animating"), $target.data("vcHasHeight") || $target.css({
						height: ""
					}), _this.trigger("afterUnminimize"), $trigger.prop("disabled", !1)
				}
			})) : ($target.data("vcMinimizeHeight", $target.height()), $target.animate({
				height: $panel.outerHeight() + $panelContainer.outerHeight() - $panelContainer.height()
			}, {
				duration: 400,
				start: function() {
					$trigger.prop("disabled", !0), $target.addClass("vc_animating")
				},
				complete: function() {
					$target.addClass("vc_minimized"), $target.removeClass("vc_animating"), $target.css({
						height: ""
					}), _this.trigger("afterMinimize"), $trigger.prop("disabled", !1)
				}
			}))
		},
		setButtonMessage: function(message, type, showInBackend) {
			var currentTextHtml, $saveBtn;
			return void 0 === showInBackend && (showInBackend = !1), this.clearButtonMessage = _.bind(this.clearButtonMessage, this), !showInBackend && !vc.frame_window || this.buttonMessageTimeout || (void 0 === message && (message = window.i18nLocale.ui_saved), void 0 === type && (type = "success"), currentTextHtml = ($saveBtn = this.$el.find('[data-vc-ui-element="button-save"]')).html(), $saveBtn.addClass("vc_ui-button-" + type + " vc_ui-button-undisabled").removeClass("vc_ui-button-action").data("vcCurrentTextHtml", currentTextHtml).data("vcCurrentTextType", type).html(message), _.delay(this.clearButtonMessage, 5e3), this.buttonMessageTimeout = !0), this
		},
		clearButtonMessage: function() {
			var type, currentTextHtml, $saveBtn;
			this.buttonMessageTimeout && (window.clearTimeout(this.buttonMessageTimeout), currentTextHtml = ($saveBtn = this.$el.find('[data-vc-ui-element="button-save"]')).data("vcCurrentTextHtml") || "Save", type = $saveBtn.data("vcCurrentTextType"), $saveBtn.html(currentTextHtml).removeClass("vc_ui-button-" + type + " vc_ui-button-undisabled").addClass("vc_ui-button-action"), this.buttonMessageTimeout = !1)
		}
	}
}(window.jQuery),
function($) {
	"use strict";
	window.vc.HelperTemplatesPanelViewSearch = {
		searchSelector: "[data-vc-templates-name-filter]",
		events: {
			"keyup [data-vc-templates-name-filter]": "searchTemplate",
			"search [data-vc-templates-name-filter]": "searchTemplate"
		},
		uiEvents: {
			show: "focusToSearch"
		},
		focusToSearch: function() {
			vc.is_mobile || $(this.searchSelector, this.$el).focus()
		},
		searchTemplate: function(e) {
			var $el = $(e.currentTarget);
			$el.val().length ? this.searchByName($el.val()) : this.clearSearch()
		},
		clearSearch: function() {
			this.$el.find("[data-vc-templates-name-filter]").val(""), this.$el.find("[data-template_name]").css("display", "block"), this.$el.removeAttr("data-vc-template-search"), this.$el.find(".vc-search-result-empty").removeClass("vc-search-result-empty");
			var ev = new jQuery.Event("click");
			ev.isClearSearch = !0, this.$el.find('.vc_panel-tabs-control:first [data-vc-ui-element="panel-tab-control"]').trigger(ev)
		},
		searchByName: function(name) {
			this.$el.find(".vc_panel-tabs-control.vc_active").removeClass("vc_active"), this.$el.attr("data-vc-template-search", "true"), this.$el.find("[data-template_name]").css("display", "none"), this.$el.find('[data-template_name*="' + vc_slugify(name) + '"]').css("display", "block"), this.$el.find('[data-vc-ui-element="panel-edit-element-tab"]').each(function() {
				var $el = $(this);
				$el.removeClass("vc-search-result-empty"), $el.find("[data-template_name]:visible").length || $el.addClass("vc-search-result-empty")
			})
		}
	}
}(window.jQuery),
function($) {
	"use strict";
	window.vc.HelperPanelViewResizable = {
		sizeInitialized: !1,
		uiEvents: {
			show: "setSavedSize initResize",
			tabChange: "setDefaultHeightSettings",
			afterMinimize: "setupOnMinimize",
			afterUnminimize: "initResize",
			fixElContainment: "saveUIPanelSizes"
		},
		setDefaultHeightSettings: function() {
			this.$el.css({
				maxHeight: "75vh",
				height: "auto"
			})
			if ( ! this.sizeInitialized ) {
				this.$el.css({
					width: 450,
					top: 100,
					left: 'calc(50% - (450px / 2))'
				})
			}
		},
		initResize: function() {
			var _this = this;
			this.$el.data("uiResizable") && this.$el.resizable("destroy");
			this.$el.resizable({
				minHeight: 240,
				minWidth: 380,
				resize: function() {
					_this.trigger("resize")
				},
				handles: "n, e, s, w, ne, se, sw, nw",
				start: function(e, ui) {
					_this.trigger("beforeResizeStart");
					_this.$el.css("maxHeight", "none");
					_this.$el.css("height", ui.size.height);
					$("iframe").css("pointerEvents", "none");
					_this.trigger("afterResizeStart");
				},
				stop: function() {
					_this.trigger("beforeResizeStop");
					$("iframe").css("pointerEvents", "");
					_this.saveUIPanelSizes();
					_this.trigger("afterResizeStop");
				}
			});
			this.content().addClass("vc_properties-list-init");
			this.trigger("resize");
		},
		setSavedSize: function() {
			if (this.setDefaultHeightSettings(), vc.is_mobile) return !1;
			var sizes = {
				width: getUserSetting(this.panelName + "_vcUIPanelWidth"),
				left: getUserSetting(this.panelName + "_vcUIPanelLeft").replace("minus", "-"),
				top: getUserSetting(this.panelName + "_vcUIPanelTop").replace("minus", "-")
			};
			_.isEmpty(sizes.width) || this.$el.width(sizes.width);
			_.isEmpty(sizes.left) || this.$el.css("left", sizes.left);
			_.isEmpty(sizes.top) || this.$el.css("top", sizes.top);
			this.sizeInitialized = !0;
		},
		saveUIPanelSizes: function() {
			if (!1 === this.sizeInitialized) return !1;
			var sizes = {
				width: this.$el.width(),
				left: parseInt(this.$el.css("left"), 10),
				top: parseInt(this.$el.css("top"), 10)
			};
			setUserSetting(this.panelName + "_vcUIPanelWidth", sizes.width);
			setUserSetting(this.panelName + "_vcUIPanelLeft", sizes.left.toString().replace("-", "minus") + "px");
			setUserSetting(this.panelName + "_vcUIPanelTop", sizes.top.toString().replace("-", "minus") + "px");
		},
		setupOnMinimize: function() {
			this.$el.data("uiResizable") && this.$el.resizable("destroy");
			this.$el.resizable({
				minWidth: 380,
				handles: "w, e",
				start: function(e) {
					$("iframe").css("pointerEvents", "none")
				},
				stop: function() {
					$("iframe").css("pointerEvents", "")
				}
			})
		}
	}
}(window.jQuery),
function() {
	"use strict";
	window.vc.HelperPanelViewDraggable = {
		draggable: !0,
		draggableOptions: {
			iframeFix: !0,
			handle: '[data-vc-ui-element="panel-heading"]'
		},
		uiEvents: {
			show: "initDraggable"
		},
		initDraggable: function() {
			this.$el.draggable(_.extend({}, this.draggableOptions, {
				start: this.fixElContainment,
				stop: this.fixElContainment
			}))
		}
	}
}(),
function($) {
	"use strict";
	window.vc.TemplateWindowUIPanelBackendEditor = vc.TemplatesPanelViewBackend.vcExtendUI(vc.HelperPanelViewHeaderFooter).vcExtendUI(vc.HelperTemplatesPanelViewSearch).extend({
		panelName: "template_window",
		showMessageDisabled: !1,
		initialize: function() {
			window.vc.TemplateWindowUIPanelBackendEditor.__super__.initialize.call(this);
			this.trigger("show", this.initTemplatesTabs, this);
		},
		show: function() {
			this.clearSearch();
			window.vc.TemplateWindowUIPanelBackendEditor.__super__.show.call(this);
		},
		initTemplatesTabs: function() {
			this.$el.find('[data-vc-ui-element="panel-tabs-controls"]').vcTabsLine("moveTabs")
		},
		showMessage: function(text, type) {
			if (this.showMessageDisabled) return !1;
			this.message_box_timeout && (this.$el.find("[data-vc-panel-message]").remove(), window.clearTimeout(this.message_box_timeout)), this.message_box_timeout = !1;
			var $messageBox, messageBoxTemplate = vc.template('<div class="vc_message_box vc_message_box-standard vc_message_box-rounded vc_color-<%- color %>"><div class="vc_message_box-icon"><i class="fa fa fa-<%- icon %>"></i></div><p><%- text %></p></div>');
			switch (type) {
				case "error":
				$messageBox = $('<div class="vc_col-xs-12 wpb_element_wrapper" data-vc-panel-message>').html(messageBoxTemplate({
					color: "danger",
					icon: "times",
					text: text
				}));
				break;
				case "warning":
				$messageBox = $('<div class="vc_col-xs-12 wpb_element_wrapper" data-vc-panel-message>').html(messageBoxTemplate({
					color: "warning",
					icon: "exclamation-triangle",
					text: text
				}));
				break;
				case "success":
				$messageBox = $('<div class="vc_col-xs-12 wpb_element_wrapper" data-vc-panel-message>').html(messageBoxTemplate({
					color: "success",
					icon: "check",
					text: text
				}))
			}
			$messageBox.prependTo(this.$el.find('[data-vc-ui-element="panel-edit-element-tab"].vc_row.vc_active')), $messageBox.fadeIn(), this.message_box_timeout = window.setTimeout(function() {
				$messageBox.remove()
			}, 6e3)
		},
		changeTab: function(e) {
			e && e.preventDefault && e.preventDefault(), e && !e.isClearSearch && this.clearSearch();
			var $tab = $(e.currentTarget);
			$tab.parent().hasClass("vc_active") || (this.$el.find('[data-vc-ui-element="panel-tabs-controls"] .vc_active:not([data-vc-ui-element="panel-tabs-line-dropdown"])').removeClass("vc_active"), $tab.parent().addClass("vc_active"), this.$el.find('[data-vc-ui-element="panel-edit-element-tab"].vc_active').removeClass("vc_active"), this.$el.find($tab.data("vcUiElementTarget")).addClass("vc_active"), this.$tabsMenu && this.$tabsMenu.vcTabsLine("checkDropdownContainerActive"))
		},
		setPreviewFrameHeight: function(templateID, height) {
			parseInt(height, 10) < 100 && (height = 100), $('data-vc-template-preview-frame="' + templateID + '"').height(height)
		}
	}), window.vc.TemplateWindowUIPanelFrontendEditor = vc.TemplatesPanelViewFrontend.vcExtendUI(vc.HelperPanelViewHeaderFooter).vcExtendUI(vc.HelperTemplatesPanelViewSearch).extend({
		panelName: "template_window",
		showMessageDisabled: !1,
		events: {
			'click [data-vc-ui-element="button-save"]': "save",
			'click [data-vc-ui-element="button-close"]': "hide",
			'click [data-vc-ui-element="button-minimize"]': "toggleOpacity",
			"keyup [data-vc-templates-name-filter]": "searchTemplate",
			"search [data-vc-templates-name-filter]": "searchTemplate",
			"click .vc_template-save-btn": "saveTemplate",
			"click [data-template_id] [data-template-handler]": "loadTemplate",
			'click [data-vc-container=".vc_ui-list-bar"][data-vc-preview-handler]': "buildTemplatePreview",
			'click [data-vc-ui-delete="template-title"]': "removeTemplate",
			'click [data-vc-ui-element="panel-tab-control"]': "changeTab"
		},
		initialize: function() {
			window.vc.TemplateWindowUIPanelFrontendEditor.__super__.initialize.call(this);

			var self = this;
			var $templates = $('.vc_edit-form-tab[data-tab=liquid_templates], .vc_edit-form-tab[data-tab=liquid_page_templates]', this.el);
			var $sortItems = $('.sortable_templates ul > li', $templates);
			var $tmpItemsContainer = $('.liquid-templates-container', $templates);
			var $tmpItems = $('.vc_ui-template', $tmpItemsContainer);

			$sortItems.each(function() {

				"all" == $(this).attr("data-sort") ?
					$(this).find(".count").html($tmpItems.length) :
					$(this).find(".count").html($tmpItems.filter((i, el) => el.classList.contains($(this).attr('data-sort'))).length);

			});

		},
		show: function() {	
			this.clearSearch();
			window.vc.TemplateWindowUIPanelFrontendEditor.__super__.show.call(this);

			var self = this;
			var $templates = $('.vc_edit-form-tab[data-tab=liquid_templates], .vc_edit-form-tab[data-tab=liquid_page_templates]', this.el);
			var $sortItems = $('.sortable_templates ul > li', $templates);
			var $tmpItemsContainer = $('.liquid-templates-container', $templates);
			var $tmpItems = $('.vc_ui-template', $tmpItemsContainer);

			$sortItems.filter((i, el) => $(el).attr('data-sort') === 'all').addClass("active").trigger("click");
			
			$sortItems.on('click', function() {

				var $this = $(this);
				var sortVal = $this.attr("data-sort");

				self.clearSearch();

				$sortItems.removeClass("active");
				$this.addClass("active");

				$tmpItems.removeClass("hidden");

				"all" !== sortVal && $tmpItems.filter((i, el) => ! el.classList.contains(sortVal)).addClass("hidden");

				$tmpItemsContainer.attr('data-filtered-items', sortVal);
				
			});

			$tmpItems.removeClass('is-loading').find('.vc-composer-icon').removeClass('vc-c-icon-sync').addClass('vc-c-icon-add');

			$(this.el).on('click', '.vc_ui-template [data-template-handler]' ,function() {

				var $this = $(this);
				
				$this.closest('.vc_ui-template').addClass('is-loading');
				
				if ( $this.hasClass('vc_ui-control-button') ) {
					$this.find('.vc-composer-icon').removeClass('vc-c-icon-add').addClass('vc-c-icon-sync');
				} else {
					$this.next('.vc_ui-list-bar-item-actions').find('.vc-composer-icon').removeClass('vc-c-icon-add').addClass('vc-c-icon-sync');
				}

			})
		},
		showMessage: function(text, type) {
			if (this.showMessageDisabled) return !1;
			this.message_box_timeout && (this.$el.find("[data-vc-panel-message]").remove(), window.clearTimeout(this.message_box_timeout)), this.message_box_timeout = !1;
			var $messageBox, messageBoxTemplate = vc.template('<div class="vc_message_box vc_message_box-standard vc_message_box-rounded vc_color-<%- color %>"><div class="vc_message_box-icon"><i class="fa fa fa-<%- icon %>"></i></div><p><%- text %></p></div>');
			switch (type) {
				case "error":
				$messageBox = $('<div class="vc_col-xs-12 wpb_element_wrapper" data-vc-panel-message>').html(messageBoxTemplate({
					color: "danger",
					icon: "times",
					text: text
				}));
				break;
				case "warning":
				$messageBox = $('<div class="vc_col-xs-12 wpb_element_wrapper" data-vc-panel-message>').html(messageBoxTemplate({
					color: "warning",
					icon: "exclamation-triangle",
					text: text
				}));
				break;
				case "success":
				$messageBox = $('<div class="vc_col-xs-12 wpb_element_wrapper" data-vc-panel-message>').html(messageBoxTemplate({
					color: "success",
					icon: "check",
					text: text
				}))
			}
			$messageBox.prependTo(this.$el.find('[data-vc-ui-element="panel-edit-element-tab"].vc_row.vc_active')), $messageBox.fadeIn(), this.message_box_timeout = window.setTimeout(function() {
				$messageBox.remove()
			}, 6e3)
		},
		changeTab: function(e) {
			e && e.preventDefault && e.preventDefault(), e && !e.isClearSearch && this.clearSearch();
			var $tab = $(e.currentTarget);
			$tab.parent().hasClass("vc_active") || (this.$el.find('[data-vc-ui-element="panel-tabs-controls"] .vc_active:not([data-vc-ui-element="panel-tabs-line-dropdown"])').removeClass("vc_active"), $tab.parent().addClass("vc_active"), this.$el.find('[data-vc-ui-element="panel-edit-element-tab"].vc_active').removeClass("vc_active"), this.$el.find($tab.data("vcUiElementTarget")).addClass("vc_active"), this.$tabsMenu && this.$tabsMenu.vcTabsLine("checkDropdownContainerActive"))
		}
	}), window.vc.PagesTemplateWindowUIPanelFrontendEditor = window.vc.TemplateWindowUIPanelFrontendEditor.extend({
		initialize: function() {
			window.vc.PagesTemplateWindowUIPanelFrontendEditor.__super__.initialize.call(this);
		},
	}), $.fn.vcAccordion.Constructor.prototype.collapseTemplate = function(showCallback) {
		var $this, $triggers, i;
		if ($this = this.$element, i = 0, ($triggers = this.getContainer().find("[data-vc-preview-handler]").each(function() {
			var accordion, $this;
			void 0 === (accordion = ($this = $(this)).data("vc.accordion")) && ($this.vcAccordion(), accordion = $this.data("vc.accordion")), accordion && accordion.setIndex && accordion.setIndex(i++)
		}).filter(function() {
			var accordion;
			return (accordion = $(this).data("vc.accordion")).getTarget().hasClass(accordion.activeClass)
		}).filter(function() {
			return $this[0] !== this
		})).length && $.fn.vcAccordion.call($triggers, "hide"), this.isActive()) $.fn.vcAccordion.call($this, "hide");
		else {
			$.fn.vcAccordion.call($this, "show");
			var $triggerPanel = $this.closest(".vc_ui-list-bar-item"),
			$wrapper = $this.closest("[data-template_id]"),
			$panel = $wrapper.closest("[data-vc-ui-element=panel-content]").parent();
			setTimeout(function() {
				if (Math.round($wrapper.offset().top - $panel.offset().top) < 0) {
					var posit = Math.round($wrapper.offset().top - $panel.offset().top + $panel.scrollTop() - $triggerPanel.height());
					$panel.animate({
						scrollTop: posit
					}, 400)
				}
				"function" == typeof showCallback && showCallback($wrapper, $panel)
			}, 400)
		}
	}
}(window.jQuery),
function($) {
	"use strict";
	window.vc.element_start_index = 0,
	window.vc.AddElementUIPanelBackendEditor = vc.PanelView.vcExtendUI(vc.HelperPanelViewHeaderFooter).extend({
		el: "#vc_ui-panel-add-element",
		searchSelector: "#vc_elements_name_filter",
		prepend: !1,
		builder: "",
		toggleTriggerAdded: false,
		events: {
			'click [data-vc-ui-element="button-close"]': "hide",
			'click [data-vc-ui-element="panel-tab-control"]': "filterElements",
			"click .vc_shortcode-link": "createElement",
			"keyup #vc_elements_name_filter": "filterElements",
			"search #vc_elements_name_filter": "filterElements",
			"click [data-vc-manage-elements]": "openPresetWindow"
		},
		initialize: function() {
			window.vc.AddElementUIPanelBackendEditor.__super__.initialize.call(this);
			window.vc.events.on("shortcodes:add", this.addCustomCssStyleTag.bind(this));
			window.vc.events.on("vc:savePreset", this.updateAddElementPopUp.bind(this));
			window.vc.events.on("vc:deletePreset", this.removePresetFromAddElementPopUp.bind(this));
		},
		render: function(model, prepend) {
			_.bindAll(this, 'cloneTabControls')
			_.isUndefined(vc.ShortcodesBuilder) || (this.builder = new vc.ShortcodesBuilder);
			this.$el.is(":hidden") && window.vc.closeActivePanel();
			(window.vc.active_panel = this).prepend = !!_.isBoolean(prepend) && prepend;
			this.place_after_id = !!_.isString(prepend) && prepend;
			this.model = !!_.isObject(model) && model;
			this.$content = this.$el.find('[data-vc-ui-element="panel-add-element-list"]');
			this.$buttons = $('[data-vc-ui-element="add-element-button"]', this.$content);
			this.buildFiltering();
			this.$el.find('[data-vc-ui-element="panel-tab-control"]').eq(0).click();
			this.show();
			!this.toggleTriggerAdded && this.cloneTabControls();
			this.toggleTriggerAdded = true;
			this.$el.find('[data-vc-ui-element="panel-tabs-controls"]').vcTabsLine("moveTabs");
			_.defer(() => {
				if ( ! vc.is_mobile ) {
					$(this.searchSelector).focus();
				}
				if ( this.$content && this.$content.find('.wpb-content-layouts').length ) {
					const $firstBtn = this.$content.find('.wpb-content-layouts').children('button').first();
					$firstBtn.hasClass('vc_active') || $firstBtn.click();
				}
			});
			vc.AddElementUIPanelBackendEditor.__super__.render.call(this);
			return this;
		},
		cloneTabControls: function() {
			this.$el.find('[data-vc-ui-element="panel-tab-control"]').each((i, btn) => {
				const $toggleBtn = $(btn);
				const dataFilter = $toggleBtn.attr('data-filter');
				if ( dataFilter === '*' ) return;
				this.$buttons.filter((i, addElementBtn) => $(addElementBtn).is(dataFilter)).appendTo(this.$content.find('.wpb-content-layouts'));
				const $firstButton = this.$buttons.filter( (i, button) => $(button).is(dataFilter) ).first();
				const $clonedBtn = $toggleBtn.clone(false).insertBefore($firstButton).removeAttr('class data-vc-ui-element');
				$clonedBtn.off();
				$clonedBtn.on('click', this.toggleElements.bind(this));
				$(document).on('lqd-sidebar-active', () => {
					vc.sidebar_active ? this.$buttons.removeClass('vc_visible') : this.$el.find('[data-vc-ui-element="panel-tab-control"]').eq(0).click();
				})
			})
		},
		buildFiltering: function() {
			var itemSelector, tag, notIn, asParent, parentSelector;
			itemSelector = '[data-vc-ui-element="add-element-button"]';
			notIn = this._getNotIn(this.model ? this.model.get("shortcode") : "");
			$(this.searchSelector).val("");
			this.$content.addClass("vc_filter-all");
			this.$content.attr("data-vc-ui-filter", "*");
			this.$content.find('.wpb-content-layouts').children('button.vc_active').removeClass('vc_active');
			asParent = !(!(tag = this.model ? this.model.get( "shortcode") : "vc_column") || _.isUndefined(vc.getMapped(tag).as_parent)) && vc.getMapped(tag).as_parent;
			_.isObject(asParent) ?
				(parentSelector = [], _.isString(asParent.only) && parentSelector.push(_.reduce(asParent.only.replace(/\s/, "").split(","),
					function(memo, val) {
						return memo + (_.isEmpty(memo) ? "" : ",") + '[data-element="' + val.trim() + '"]'
					}, "")), _.isString(asParent.except) && parentSelector.push(_.reduce(asParent.except.replace(/\s/, "").split(","),
					function(memo, val) {
						return memo + ':not([data-element="' + val.trim() + '"])'
					}, "")), itemSelector += parentSelector.join(","))
				:
				notIn && (itemSelector = notIn), !1 === tag || _.isUndefined(vc.getMapped(tag).allowed_container_element) || (!1 === vc.getMapped(tag).allowed_container_element ? itemSelector += ":not([data-is-container=true])" : _.isString(vc.getMapped(tag).allowed_container_element) && (itemSelector += ":not([data-is-container=true]), [data-element=" + vc.getMapped(tag).allowed_container_element + "]")), this.$buttons.removeClass("vc_visible").addClass("vc_inappropriate");
			$(itemSelector, this.$content).removeClass("vc_inappropriate").addClass("vc_visible");
			this.hideEmptyFilters();
		},
		hideEmptyFilters: function() {
			var _this = this;
			this.$el.find('[data-vc-ui-element="panel-add-element-tab"].vc_active').removeClass("vc_active");
			this.$el.find('[data-vc-ui-element="panel-add-element-tab"]:first').addClass("vc_active");
			this.$el.find("[data-filter]").each(function() {
				$($(this).data("filter") + ".vc_visible:not(.vc_inappropriate)", _this.$content).length ? $(this).parent().show() : $(this).parent().hide()
			})
		},
		_getNotIn: _.memoize(function(tag) {
			return '[data-vc-ui-element="add-element-button"]:not(' + _.reduce(vc.map, function(memo, shortcode) {
				var separator;
				return separator = _.isEmpty(memo) ? "" : ",", _.isObject(shortcode.as_child) ? (_.isString(shortcode.as_child.only) && (_.contains(shortcode.as_child.only.replace(/\s/, "").split(","), tag) || (memo += separator + "[data-element=" + shortcode.base + "]")), _.isString(shortcode.as_child.except) && _.contains(shortcode.as_child.except.replace(/\s/, "").split(","), tag) && (memo += separator + "[data-element=" + shortcode.base + "]")) : !1 === shortcode.as_child && (memo += separator + "[data-element=" + shortcode.base + "]"), memo
			}, "") + ")"
		}),
		filterElements: function(e) {
			var filterValue, $visibleElements, $control, filter, nameFilter;
			e ? (e.preventDefault && e.preventDefault(), e.stopPropagation && e.stopPropagation()) : e = window.event;
			$control = $(e.currentTarget);
			filter = '[data-vc-ui-element="add-element-button"]';
			nameFilter = $(this.searchSelector).val();
			this.$content.removeClass("vc_filter-all");
			$('[data-vc-ui-element="panel-add-element-tab"].vc_active').removeClass("vc_active");
			$control.is("[data-filter]") ?
				($control.parent().addClass("vc_active"),
					(filter += filterValue = $control.data("filter")),
					"*" === filterValue ? this.$content.addClass("vc_filter-all") : this.$content.removeClass("vc_filter-all"),
					this.$content.attr("data-vc-ui-filter", filterValue.replace(".js-category-", "")),
					$(this.searchSelector).val("")) :
				nameFilter.length ?
				((filter += ":containsi('" + nameFilter + "'):not('.vc_element-deprecated')"), this.$content.attr("data-vc-ui-filter", "name:" + nameFilter)) :
				nameFilter.length || ($('[data-vc-ui-element="panel-tab-control"][data-filter="*"]').parent().addClass("vc_active"), this.$content.attr("data-vc-ui-filter", "*").addClass("vc_filter-all")),
				$(".vc_visible", this.$content).removeClass("vc_visible"),
				!nameFilter.length && vc.sidebar_active ? $(filter, this.$content).removeClass("vc_visible") : $(filter, this.$content).addClass("vc_visible"),
				nameFilter.length && 13 === (e.keyCode || e.which) && 1 === ($visibleElements = $(".vc_visible:not(.vc_inappropriate)", this.$content)).length && $visibleElements.find("[data-vc-clickable]").click();
				
		},
		toggleElements: function(e) {
			e && e.preventDefault && e.preventDefault();
			const $btn = $(e.currentTarget);
			$btn.toggleClass('vc_active').nextUntil('button').toggleClass('vc_visible', $btn.hasClass('vc_active'));
			$(this.searchSelector).val("");
		},
		createElement: function(e) {
			var options, model, column, row, showSettings, row_params, inner_row_params, column_params, inner_column_params, tag, $control, preset, presetType, closestPreset;
			if (e && e.preventDefault && e.preventDefault(), tag = ($control = $(e.currentTarget)).data("tag"), row_params = {}, column_params = {
				width: "1/1"
			}, (closestPreset = $control.closest("[data-preset]")) && (preset = closestPreset.data("preset"), presetType = closestPreset.data("element")), !1 === this.model)
			if (window.vc.storage.lock(), "vc_section" === tag) {
				var modelOptions = {
					shortcode: tag
				};
				preset && "vc_section" === presetType && (modelOptions.preset = preset), model = vc.shortcodes.create(modelOptions)
			} else {
				var rowOptions = {
					shortcode: "vc_row",
					params: row_params
				};
				preset && presetType === tag && (rowOptions.preset = preset);
				var columnOptions = {
					shortcode: "vc_column",
					params: column_params,
					parent_id: (row = vc.shortcodes.create(rowOptions)).id,
					root_id: row.id
				};
				preset && "vc_column" === presetType && (columnOptions.preset = preset), column = vc.shortcodes.create(columnOptions), model = row, "vc_row" !== tag && (options = {
					shortcode: tag,
					parent_id: column.id,
					root_id: row.id
				}, preset && presetType === tag && (options.preset = preset), model = vc.shortcodes.create(options))
			}
			else model = "vc_row" === tag ? (column = "vc_section" === this.model.get("shortcode") ? (window.vc.storage.lock(), row = vc.shortcodes.create({
				shortcode: "vc_row",
				params: row_params,
				parent_id: this.model.id,
				order: this.prepend ? this.getFirstPositionIndex() : vc.shortcodes.getNextOrder()
			}), vc.shortcodes.create({
				shortcode: "vc_column",
				params: column_params,
				parent_id: row.id,
				root_id: row.id
			})) : (inner_row_params = {}, inner_column_params = {
				width: "1/1"
			}, window.vc.storage.lock(), row = vc.shortcodes.create({
				shortcode: "vc_row_inner",
				params: inner_row_params,
				parent_id: this.model.id,
				order: this.prepend ? this.getFirstPositionIndex() : vc.shortcodes.getNextOrder()
			}), vc.shortcodes.create({
				shortcode: "vc_column_inner",
				params: inner_column_params,
				parent_id: row.id,
				root_id: row.id
			})), row) : (options = {
				shortcode: tag,
				parent_id: this.model.id,
				order: this.prepend ? this.getFirstPositionIndex() : vc.shortcodes.getNextOrder(),
				root_id: this.model.get("root_id")
			}, preset && presetType === tag && (options.preset = preset), vc.shortcodes.create(options));
			this.model = model;
			showSettings = !(_.isBoolean(vc.getMapped(tag).show_settings_on_create) && !1 === vc.getMapped(tag).show_settings_on_create);
			this.model.get("shortcode");
			this.hide();
			showSettings && this.showEditForm();
		},
		getFirstPositionIndex: function() {
			return --window.vc.element_start_index, vc.element_start_index
		},
		show: function() {
			this.$el.addClass("vc_active");
			this.trigger("show");
		},
		hide: function() {
			this.$el.removeClass("vc_active");
			vc.active_panel = !1;
			this.trigger("hide");
		},
		showEditForm: function() {
			window.vc.edit_element_block_view.render(this.model)
		},
		addCustomCssStyleTag: function(model) {
			var customCss;
			model && model.getParam && (customCss = model.getParam("css")) && vc.frame_window && window.vc.frame_window.vc_iframe.setCustomShortcodeCss(customCss)
		},
		updateAddElementPopUp: function(id, shortcode, title, data) {
			var $newPreset = this.$el.find('[data-element="' + shortcode + '"]:first').clone(!0);
			vc_all_presets[id] = data;
			$newPreset.find("[data-vc-shortcode-name]").text(title);
			$newPreset.find( ".vc_element-description").text("");
			$newPreset.attr("data-preset", id);
			$newPreset.addClass( "js-category-_my_elements_");
			$newPreset.insertAfter(this.$el.find('[data-element="' + shortcode + '"]:last'));
			this.$el.find('[data-filter="js-category-_my_elements_"]').show();
			var $anotherNewPreset = this.$body.find( '[data-vc-ui-element="panel-preset"] [data-vc-presets-list-content] .vc_ui-template:first').clone(!0);
			$anotherNewPreset.find('[data-vc-ui-element="template-title"]').attr("title", title).text(title);
			$anotherNewPreset.find('[data-vc-ui-delete="preset-title"]').attr("data-preset", id).attr("data-preset-parent", shortcode);
			$anotherNewPreset.find("[data-vc-ui-add-preset]").attr("data-preset", id).attr("id", shortcode).attr("data-tag", shortcode);
			$anotherNewPreset.show();
			$anotherNewPreset.insertAfter(this.$body.find( '[data-vc-ui-element="panel-preset"] [data-vc-presets-list-content] .vc_ui-template:last'));
		},
		removePresetFromAddElementPopUp: function(id) {
			this.$el.find('[data-preset="' + id + '"]').remove()
		},
		openPresetWindow: function(e) {
			e && e.preventDefault && e.preventDefault(), window.vc.preset_panel_view.render().show()
		}
	}), window.vc.AddElementUIPanelFrontendEditor = vc.AddElementUIPanelBackendEditor.vcExtendUI(vc.HelperPanelViewHeaderFooter).extend({
		events: {
			'click [data-vc-ui-element="button-close"]': "hide",
			'click [data-vc-ui-element="panel-tab-control"]': "filterElements",
			"click .vc_shortcode-link": "createElement",
			"keyup #vc_elements_name_filter": "filterElements"
		},
		createElement: function(e) {
			var options, showSettings, newData, i, column_params, row_params, inner_row_params, inner_column_params, $control, tag, preset, presetType, closestPreset;
			if (e && e.preventDefault && e.preventDefault(), tag = ($control = $(e.currentTarget)).data("tag"), row_params = {}, column_params = {
				width: "1/1"
			}, (closestPreset = $control.closest("[data-preset]")) && (preset = closestPreset.data("preset"), presetType = closestPreset.data("element")), this.prepend && (window.vc.activity = "prepend"), 0 == this.model)
			if ("vc_section" === tag) {
				var modelOptions = {
					shortcode: tag
				};
				preset && "vc_section" === presetType && (modelOptions.preset = preset), this.builder.create(modelOptions), this.model = this.builder.last()
			} else {
				var rowOptions = {
					shortcode: "vc_row",
					params: row_params
				};
				preset && "vc_row" === presetType && (rowOptions.preset = preset), this.builder.create(rowOptions);
				var columnOptions = {
					shortcode: "vc_column",
					parent_id: this.builder.lastID(),
					params: column_params
				};
				preset && "vc_column" === presetType && (columnOptions.preset = preset), this.builder.create(columnOptions), "vc_row" !== tag && (options = {
					shortcode: tag,
					parent_id: this.builder.lastID()
				}, preset && presetType === tag && (options.preset = preset), this.builder.create(options)), this.model = this.builder.last()
			}
			else "vc_row" === tag ? "vc_section" === this.model.get("shortcode") ? this.builder.create({
				shortcode: "vc_row",
				params: row_params,
				parent_id: this.model.id,
				order: this.prepend ? this.getFirstPositionIndex() : vc.shortcodes.nextOrder()
			}).create({
				shortcode: "vc_column",
				params: column_params,
				parent_id: this.builder.lastID()
			}) : (inner_row_params = {}, inner_column_params = {
				width: "1/1"
			}, this.builder.create({
				shortcode: "vc_row_inner",
				params: inner_row_params,
				parent_id: this.model.id,
				order: this.prepend ? this.getFirstPositionIndex() : vc.shortcodes.nextOrder()
			}).create({
				shortcode: "vc_column_inner",
				params: inner_column_params,
				parent_id: this.builder.lastID()
			})) : (options = {
				shortcode: tag,
				parent_id: this.model.id,
				order: this.prepend ? this.getFirstPositionIndex() : vc.shortcodes.nextOrder()
			}, preset && presetType === tag && (options.preset = preset), this.builder.create(options)), this.model = this.builder.last();
			for (i = this.builder.models.length - 1; 0 <= i; i--) this.builder.models[i].get("shortcode");
			_.isString(vc.getMapped(tag).default_content) && vc.getMapped(tag).default_content.length && (newData = this.builder.parse({}, window.vc.getMapped(tag).default_content, this.builder.last().toJSON()), _.each(newData, function(object) {
				object.default_content = !0, this.builder.create(object)
			}, this));
			this.model = this.builder.last();
			showSettings = !(_.isBoolean(vc.getMapped(tag).show_settings_on_create) && !1 === vc.getMapped(tag).show_settings_on_create);
			! vc.sidebar_active && this.hide();
			showSettings && this.showEditForm();
			this.builder.render();
		}
	})
}(window.jQuery),
function($) {
	"use strict";
	window.vc.ExtendPresets = {
		settingsMenuSelector: '[data-vc-ui-element="settings-dropdown-list"]',
		settingsButtonSelector: '[data-vc-ui-element="settings-dropdown-button"]',
		settingsDropdownSelector: '[data-vc-ui-element="settings-dropdown"]',
		settingsPresetId: null,
		uiEvents: {
			init: "addEvents",
			render: "hideDropdown",
			afterRender: "afterRenderActions"
		},
		afterRenderActions: function() {
			this.untaintSettingsPresetData(), this.showDropdown()
		},
		hideDropdown: function() {
			this.$el.find('[data-vc-ui-element="settings-dropdown"]').hide()
		},
		showDropdown: function() {
			var tag = this.model.get("shortcode");
			window.vc_settings_show && "vc_column" !== tag && this.$el.find('[data-vc-ui-element="settings-dropdown"]').show()
		},
		showDropdownMenu: function() {
			var tag = this.model.get("shortcode"),
			$this = $(this);
			$this.data("vcSettingsMenuLoaded") && tag === $this.data("vcShortcodeName") || this.reloadSettingsMenuContent()
		},
		addEvents: function() {
			var $tab = this.$el.find(".vc_edit-form-tab.vc_active"),
			tag = this.model.get("shortcode"),
			_this = this;
			$(document).off("beforeMinimize.vc.paramWindow", this.minimizeButtonSelector).on("beforeMinimize.vc.paramWindow", this.minimizeButtonSelector, function() {
				$tab.find(".vc_ui-prompt-presets .vc_ui-prompt-close").trigger("click")
			}), $(document).off("close.vc.paramWindow", this.closeButtonSelector).on("beforeClose.vc.paramWindow", this.closeButtonSelector, function() {
				$tab.find(".vc_ui-prompt-presets .vc_ui-prompt-close").trigger("click")
			}), $(document).off("show.vc.accordion", this.settingsButtonSelector).on("show.vc.accordion", this.settingsButtonSelector, function() {
				var $this = $(this);
				$this.data("vcSettingsMenuLoaded") && tag === $this.data("vcShortcodeName") || _this.reloadSettingsMenuContent()
			})
		},
		saveSettingsAjaxData: function(shortcode_name, title, is_default, data) {
			return {
				action: "vc_action_save_settings_preset",
				shortcode_name: shortcode_name,
				is_default: is_default ? 1 : 0,
				vc_inline: !0,
				title: title,
				data: data,
				_vcnonce: window.vcAdminNonce
			}
		},
		saveSettings: function(title, is_default) {
			var shortcode_name = this.model.get("shortcode"),
			data = JSON.stringify(this.getParamsForSettingsPreset());
			if (void 0 !== title && title.length) return void 0 === is_default && (is_default = !1), this.checkAjax(), this.ajax = $.ajax({
				type: "POST",
				dataType: "json",
				url: window.ajaxurl,
				data: this.saveSettingsAjaxData(shortcode_name, title, is_default, data),
				context: this
			}).done(function(response) {
				response.success && (this.setSettingsMenuContent(response.html), this.settingsPresetId = response.id, this.untaintSettingsPresetData())
			}).always(this.resetAjax), this.ajax
		},
		fetchSaveSettingsDialogAjaxData: function() {
			return {
				action: "vc_action_render_settings_preset_title_prompt",
				vc_inline: !0,
				_vcnonce: window.vcAdminNonce
			}
		},
		fetchSaveSettingsDialog: function(callback) {
			var $contentContainer = this.$el.find(".vc_ui-panel-content-container");
			$contentContainer.find(".vc_ui-prompt-presets").length ? void 0 !== callback && callback(!1) : (this.checkAjax(), this.ajax = $.ajax({
				type: "POST",
				dataType: "json",
				url: window.ajaxurl,
				data: this.fetchSaveSettingsDialogAjaxData()
			}).done(function(response) {
				response.success && ($contentContainer.prepend(response.html), void 0 !== callback && callback(!0))
			}).fail(function() {
				void 0 !== callback && callback(!1)
			}).always(this.resetAjax))
		},
		showSaveSettingsDialog: function(is_default) {
			var _this = this;
			this.isSettingsPresetDefault = !!is_default, this.fetchSaveSettingsDialog(function(created) {
				var $contentContainer = _this.$el.find(".vc_ui-panel-content-container"),
				$prompt = $contentContainer.find(".vc_ui-prompt-presets"),
				$title = $prompt.find(".textfield");
				$contentContainer.find(".vc_ui-prompt.vc_visible").removeClass("vc_visible");
				var $viewPresetsButton = $prompt.find("[data-vc-view-settings-preset]");
				if ("undefined" !== window.vc_vendor_settings_presets[_this.model.get("shortcode")] ? $viewPresetsButton.removeAttr("disabled") : $viewPresetsButton.attr("disabled", "disabled"), $prompt.addClass("vc_visible"), $title.focus(), $contentContainer.addClass("vc_ui-content-hidden"), created) {
					var $btn = $prompt.find("#vc_ui-save-preset-btn"),
					delay = 0;
					$prompt.on("submit", function() {
						var title = $title.val();
						return title.length && _this.saveSettings(title, _this.isSettingsPresetDefault).done(function(e) {
							var data = this.getParamsForSettingsPreset();
							$title.val(""), _this.setCustomButtonMessage($btn, void 0, void 0, !0), vc.events.trigger("vc:savePreset", e.id, _this.model.get("shortcode"), title, data), delay = _.delay(function() {
								$prompt.removeClass("vc_visible"), $contentContainer.removeClass("vc_ui-content-hidden")
							}, 5e3)
						}).fail(function() {
							_this.setCustomButtonMessage($btn, window.i18nLocale.ui_danger, "danger", !0)
						}), !1
					}), $prompt.on("click", ".vc_ui-prompt-close", function() {
						return _this.checkAjax(), $prompt.removeClass("vc_visible"), $contentContainer.removeClass("vc_ui-content-hidden"), _this.clearCustomButtonMessage.call(this, $btn), delay && (window.clearTimeout(delay), delay = 0), !1
					})
				}
			})
		},
		loadSettingsAjaxData: function(id) {
			return {
				action: "vc_action_get_settings_preset",
				vc_inline: !0,
				id: id,
				_vcnonce: window.vcAdminNonce
			}
		},
		loadSettings: function(id) {
			return this.panelInit = !1, this.checkAjax(), this.ajax = $.ajax({
				type: "POST",
				dataType: "json",
				url: window.ajaxurl,
				data: this.loadSettingsAjaxData(id),
				context: this
			}).done(function(response) {
				response.success && (this.settingsPresetId = id, this.applySettingsPreset(response.data))
			}).always(this.resetAjax), this.ajax
		},
		saveAsDefaultSettingsAjaxData: function(shortcode_name, id) {
			return {
				action: "vc_action_set_as_default_settings_preset",
				shortcode_name: shortcode_name,
				id: id,
				vc_inline: !0,
				_vcnonce: window.vcAdminNonce
			}
		},
		saveAsDefaultSettings: function(id, doneCallback) {
			var shortcode_name = this.model.get("shortcode"),
			presetId = id || this.settingsPresetId;
			presetId ? (this.checkAjax(), this.ajax = $.ajax({
				type: "POST",
				dataType: "json",
				url: window.ajaxurl,
				data: this.saveAsDefaultSettingsAjaxData(shortcode_name, presetId),
				context: this
			}).done(function(response) {
				response.success && (this.setSettingsMenuContent(response.html), this.untaintSettingsPresetData(), doneCallback && doneCallback())
			}).always(this.resetAjax)) : this.showSaveSettingsDialog(!0)
		},
		restoreDefaultSettingsAjaxData: function(shortcode_name) {
			return {
				action: "vc_action_restore_default_settings_preset",
				shortcode_name: shortcode_name,
				vc_inline: !0,
				_vcnonce: window.vcAdminNonce
			}
		},
		restoreDefaultSettings: function() {
			var shortcode_name = this.model.get("shortcode");
			this.checkAjax(), this.ajax = $.ajax({
				type: "POST",
				dataType: "json",
				url: window.ajaxurl,
				data: this.restoreDefaultSettingsAjaxData(shortcode_name),
				context: this
			}).done(function(response) {
				response.success && this.setSettingsMenuContent(response.html)
			}).always(this.resetAjax)
		},
		setSettingsMenuContent: function(html) {
			var $button = this.$el.find(this.settingsButtonSelector),
			$menu = this.$el.find(this.settingsMenuSelector),
			shortcode_name = this.model.get("shortcode"),
			_this = this;
			$button.data("vcShortcodeName", shortcode_name), $menu.html(html), window.vc_presets_data && 0 < window.vc_presets_data.presetsCount ? $menu.find("[data-vc-view-settings-preset]").removeAttr("disabled") : $menu.find("[data-vc-view-settings-preset]").attr("disabled", "disabled"), $menu.find("[data-vc-view-settings-preset]").on("click", function() {
				_this.showViewSettingsList(), _this.closeSettings()
			}), $menu.find("[data-vc-save-settings-preset]").on("click", function() {
				_this.showSaveSettingsDialog(), _this.closeSettings()
			}), $menu.find("[data-vc-save-template]").on("click", function() {
				_this.showSaveTemplateDialog(), _this.closeSettings()
			}), $menu.find("[data-vc-save-default-settings-preset]").on("click", function() {
				_this.saveAsDefaultSettings(), _this.closeSettings()
			}), $menu.find("[data-vc-restore-default-settings-preset]").on("click", function() {
				_this.restoreDefaultSettings(), _this.closeSettings()
			})
		},
		reloadSettingsMenuContentAjaxData: function(shortcode_name) {
			return {
				action: "vc_action_render_settings_preset_popup",
				shortcode_name: shortcode_name,
				vc_inline: !0,
				_vcnonce: window.vcAdminNonce
			}
		},
		showViewSettingsList: function() {
			var $contentContainer = this.$el.find(".vc_ui-panel-content-container");
			if ($contentContainer.find(".vc_ui-prompt-view-presets:not(.vc_visible)").remove(), !$contentContainer.find(".vc_ui-prompt-view-presets").length) {
				$contentContainer.find(".vc_ui-prompt.vc_visible").removeClass("vc_visible");
				var _this = this,
				$prompt = jQuery('<form class="vc_ui-prompt vc_ui-prompt-view-presets"><div class="vc_ui-prompt-controls"><button type="button" class="vc_general vc_ui-control-button vc_ui-prompt-close"><i class="la la-times"></i></button></div><div class="vc_ui-prompt-title"><label for="prompt_title" class="wpb_element_label">Elements</label></div><div class="vc_ui-prompt-content"><div class="vc_ui-prompt-column"><div class="vc_ui-template-list vc_ui-list-bar" data-vc-action="collapseAll" style="margin-top: 20px;" data-vc-presets-list-content></div></div></div>');
				this.buildsettingsListContent($prompt), $prompt.appendTo($contentContainer), $prompt.addClass("vc_visible"), $contentContainer.addClass("vc_ui-content-hidden");
				var closePrompt = function() {
					return $prompt.remove(), $contentContainer.removeClass("vc_ui-content-hidden"), !1
				};
				$prompt.off("click.vc1").on("click.vc1", "[data-vc-load-settings-preset]", function(e) {
					_this.loadSettings($(e.currentTarget).data("vcLoadSettingsPreset")), closePrompt()
				}), $prompt.off("click.vc4").on("click.vc4", "[data-vc-set-default-settings-preset]", function() {
					_this.saveAsDefaultSettings($(this).data("vcSetDefaultSettingsPreset"), function() {
						_this.buildsettingsListContent($prompt)
					})
				}), $prompt.off("click.vc3").on("click.vc3", ".vc_ui-prompt-close", function() {
					closePrompt(), _this.checkAjax()
				})
			}
		},
		buildsettingsListContent: function($prompt) {
			var itemsTemplate = vc.template('<div class="vc_ui-template"><div class="vc_ui-list-bar-item"><button class="vc_ui-list-bar-item-trigger" title="Apply Element" type="button" data-vc-load-settings-preset="<%- id %>"><%- title %></button><div class="vc_ui-list-bar-item-actions"><button class="vc_general vc_ui-control-button" title="Apply Element" type="button" data-vc-load-settings-preset="<%- id %>"><i class="la la-plus"></i></button><button class="vc_general vc_ui-control-button" title="Delete Element" type="button" data-vc-delete-settings-preset="<%- id %>"><i class="la la-times"></i></button></div></div></div>'),
			$content = $prompt.find("[data-vc-presets-list-content]");
			$content.empty(), _.each(window.vc_presets_data.presets[0], function(item, id) {
				var title = item;
				0 < window.vc_presets_data.defaultId && parseInt(id, 10) === window.vc_presets_data.defaultId && (title = item + " (default)"), $content.append(itemsTemplate({
					title: title,
					id: id
				}))
			}), _.each(window.vc_presets_data.presets[1], function(item, id) {
				var title = item;
				0 < window.vc_presets_data.defaultId && parseInt(id, 10) === window.vc_presets_data.defaultId && (title = item + " (default)"), $content.append(itemsTemplate({
					title: title,
					id: id
				}))
			})
		},
		reloadSettingsMenuContent: function() {
			var shortcode_name = this.model.get("shortcode"),
			$button = this.$el.find(this.settingsButtonSelector),
			success = !1;
			return this.setSettingsMenuContent(""), this.checkAjax(), this.ajax = $.ajax({
				type: "POST",
				dataType: "json",
				url: window.ajaxurl,
				data: this.reloadSettingsMenuContentAjaxData(shortcode_name),
				context: this
			}).done(function(response) {
				response.success && (success = !0, this.setSettingsMenuContent(response.html), $button.data("vcSettingsMenuLoaded", !0))
			}).always(function() {
				success || this.closeSettings(), this.resetAjax()
			}), this.ajax
		},
		closeSettings: function(destroy) {
			void 0 === destroy && (destroy = !1);
			var $menu = this.$el.find(this.settingsMenuSelector),
			$button = this.$el.find(this.settingsButtonSelector);
			destroy && ($button.data("vcSettingsMenuLoaded", !1), $menu.html("")), $button.vcAccordion("hide")
		},
		isSettingsPresetDataTainted: function() {
			var params = JSON.stringify(this.getParamsForSettingsPreset());
			return params = params.replace(/vc_custom_\d+/, ""), this.$el.data("vcSettingsPresetHash") !== vc_globalHashCode(params)
		},
		untaintSettingsPresetData: function() {
			var params = JSON.stringify(this.getParamsForSettingsPreset());
			params = params.replace(/vc_custom_\d+/, ""), this.$el.data("vcSettingsPresetHash", vc_globalHashCode(params))
		},
		applySettingsPresetAjaxData: function(params) {
			var parent_id;
			return parent_id = this.model.get("parent_id"), {
				action: "vc_edit_form",
				tag: this.model.get("shortcode"),
				parent_tag: parent_id ? vc.shortcodes.get(parent_id).get("shortcode") : null,
				post_id: vc_post_id,
				params: params,
				_vcnonce: window.vcAdminNonce
			}
		},
		applySettingsPreset: function(params) {
			return this.currentModelParams = params, vc.events.trigger("presets:apply", this.model, params), this._killEditor(), this.trigger("render"), this.show(), this.checkAjax(), this.ajax = $.ajax({
				type: "POST",
				url: window.ajaxurl,
				data: this.applySettingsPresetAjaxData(params),
				context: this
			}).done(this.buildParamsContent).always(this.resetAjax), this
		},
		getParamsForSettingsPreset: function() {
			var shortcode = this.model.get("shortcode"),
			params = this.getParams();
			return "vc_column" !== shortcode && "vc_column_inner" !== shortcode || (delete params.width, delete params.offset), params
		}
	}, vc.events.on("presets.apply", function(model, params) {
		return "vc_tta_section" === model.get("shortcode") && void 0 !== params.tab_id && (params.tab_id = vc_guid() + "-cl"), params
	})
}(window.jQuery),
function($) {
	"use strict";
	window.vc.ExtendTemplates = {
		fetchSaveTemplateDialogAjaxData: function() {
			return {
				action: "vc_action_render_settings_templates_prompt",
				vc_inline: !0,
				_vcnonce: window.vcAdminNonce
			}
		},
		fetchSaveTemplateDialog: function(callback) {
			var $tab = this.$el.find(".vc_ui-panel-content-container");
			if (!$tab.find(".vc_ui-prompt-templates").length) return this.checkAjax(), this.ajax = $.ajax({
				type: "POST",
				dataType: "json",
				url: window.ajaxurl,
				data: this.fetchSaveTemplateDialogAjaxData()
			}).done(function(response) {
				response.success && ($tab.prepend(response.html), void 0 !== callback && callback(!0))
			}).always(this.resetAjax), this.ajax;
			void 0 !== callback && callback(!1)
		},
		showSaveTemplateDialog: function() {
			var _this = this;
			this.fetchSaveTemplateDialog(function(created) {
				var $tab = _this.$el.find(".vc_ui-panel-content-container"),
				$prompt = $tab.find(".vc_ui-prompt-templates"),
				$title = $prompt.find(".textfield");
				if ($tab.find(".vc_ui-prompt.vc_visible").removeClass("vc_visible"), $prompt.addClass("vc_visible"), $title.focus(), $tab.addClass("vc_ui-content-hidden"), created) {
					var delay = 0,
					$btn = $prompt.find("#vc_ui-save-templates-btn");
					$prompt.on("submit", function() {
						var title = $title.val();
						_this.$el.find(_this.settingsButtonSelector);
						if (!title.length) return !1;
						var data = {
							action: vc.templates_panel_view.save_template_action,
							template: vc.shortcodes.singleStringify(_this.model.get("id"), "template"),
							template_name: title,
							vc_inline: !0,
							_vcnonce: window.vcAdminNonce
						};
						return vc.templates_panel_view.reloadTemplateList(data, function() {
							$title.val(""), _this.setCustomButtonMessage($btn, void 0, void 0, !0), delay = _.delay(function() {
								$prompt.removeClass("vc_visible"), $tab.removeClass("vc_ui-content-hidden")
							}, 5e3)
						}, function() {
							_this.setCustomButtonMessage($btn, window.i18nLocale.ui_danger, "danger")
						}), !1
					}), $prompt.on("click", ".vc_ui-prompt-close", function() {
						return _this.checkAjax(), $prompt.removeClass("vc_visible"), $tab.removeClass("vc_ui-content-hidden"), _this.clearCustomButtonMessage.call(this, $btn), delay && (window.clearTimeout(delay), delay = 0), !1
					})
				}
			})
		}
	}
}(window.jQuery),
function($) {
	"use strict";
	window.vc.EditElementPanelView = vc.PanelView.vcExtendUI(vc.HelperAjax).vcExtendUI(vc.ExtendPresets).vcExtendUI(vc.ExtendTemplates).vcExtendUI(vc.HelperPrompts).extend({
		panelName: "edit_element",
		el: "#vc_properties-panel",
		contentSelector: ".vc_ui-panel-content.vc_properties-list",
		minimizeButtonSelector: '[data-vc-ui-element="button-minimize"]',
		closeButtonSelector: '[data-vc-ui-element="button-close"]',
		titleSelector: ".vc_panel-title",
		tabsInit: !1,
		doCheckTabs: !0,
		$tabsMenu: !1,
		dependent_elements: {},
		mapped_params: {},
		draggable: !1,
		panelInit: !1,
		$spinner: !1,
		active_tab_index: 0,
		buttonMessageTimeout: !1,
		notRequestTemplate: !1,
		requiredParamsInitialized: !1,
		currentModelParams: !1,
		customButtonMessageTimeout: !1,
		events: {
			"click [data-save=true]": "save",
			"click [data-dismiss=panel]": "hide",
			"mouseover [data-transparent=panel]": "addOpacity",
			"click [data-transparent=panel]": "toggleOpacity",
			"mouseout [data-transparent=panel]": "removeOpacity"
		},
		initialize: function() {
			_.bindAll(this, "setSize", "setTabsSize", "fixElContainment", "hookDependent", "resetAjax", "removeAllPrompts");
			this.on("setSize", this.setResize, this);
			this.on("render", this.resetMinimize, this);
			this.on("render", this.setTitle, this);
			this.on("render", this.prepareContentBlock, this);
			_.defer(() => {
				this.cloneNavButtons();
			})
		},
		setCustomButtonMessage: function($btn, message, type, showInBackend) {
			var currentTextHtml;
			void 0 === $btn && ($btn = this.$el.find('[data-vc-ui-element="button-save"]'));
			void 0 === showInBackend && (showInBackend = !1);
			this.clearCustomButtonMessage = _.bind(this.clearCustomButtonMessage, this);
			!showInBackend && !vc.frame_window || this.customButtonMessageTimeout || (void 0 === message && (message = window.i18nLocale.ui_saved), void 0 === type && (type = "success"), currentTextHtml = $btn.html(), $btn.addClass("vc_ui-button-" + type + " vc_ui-button-undisabled").removeClass("vc_ui-button-action").data("vcCurrentTextHtml", currentTextHtml).data("vcCurrentTextType", type).html(message), _.delay(this.clearCustomButtonMessage.bind(this, $btn), 5e3), this.customButtonMessageTimeout = !0);
			return this
		},
		clearCustomButtonMessage: function($btn) {
			var type, currentTextHtml;
			this.customButtonMessageTimeout && (window.clearTimeout(this.customButtonMessageTimeout), currentTextHtml = $btn.data("vcCurrentTextHtml") || "Save", type = $btn.data("vcCurrentTextType"), $btn.html(currentTextHtml).removeClass("vc_ui-button-" + type + " vc_ui-button-undisabled").addClass("vc_ui-button-action"), this.customButtonMessageTimeout = !1)
		},
		render: function(model, not_request_template) {
			var params;
			this.$el.is(":hidden") && vc.closeActivePanel();
			not_request_template && (this.notRequestTemplate = !0);
			this.model = model;
			this.currentModelParams = this.model.get("params");
			(vc.active_panel = this).resetMinimize();
			this.clicked = !1;
			this.$el.css("height", "auto");
			this.$el.css("maxHeight", "75vh");
			params = this.model.setting("params") || [];
			this.$el.attr("data-vc-shortcode", this.model.get("shortcode"));
			this.tabsInit = !1;
			this.panelInit = !1;
			this.active_tab_index = 0;
			this.requiredParamsInitialized = !1;
			this.mapped_params = {};
			this.dependent_elements = {};
			_.each(params, function(param) {
				this.mapped_params[param.param_name] = param
			}, this);
			this.trigger("render");
			this.show();
			this.checkAjax();
			this.ajax = $.ajax({
				type: "POST",
				url: window.ajaxurl,
				data: this.ajaxData(),
				context: this
			})
			.done(this.buildParamsContent)
			.always(this.resetAjax);
			return this;
		},
		prepareContentBlock: function() {
			this.$content = this.notRequestTemplate ? this.$el : this.$el.find(this.contentSelector).removeClass("vc_with-tabs");
			this.$content.empty();
			this.$spinner = $('<span class="vc_ui-wp-spinner vc_ui-wp-spinner-lg vc_ui-wp-spinner-dark"></span>');
			this.$content.prepend(this.$spinner);
		},
		buildParamsContent: function(data) {
			var $data, $tabs, $panelHeader;
			($tabs = ($data = $(data)).find('[data-vc-ui-element="panel-tabs-controls"]')).find(".vc_edit-form-tab-control:first-child").addClass("vc_active");
			$panelHeader = this.$el.find('[data-vc-ui-element="panel-header-content"]');
			$tabs.prependTo($panelHeader);
			this.$content.html($data);
			this.$content.removeAttr("data-vc-param-initialized");
			this.active_tab_index = 0, this.tabsInit = !1;
			this.panelInit = !1;
			this.dependent_elements = {};
			this.requiredParamsInitialized = !1;
			this.$content.find("[data-vc-param-initialized]").removeAttr("data-vc-param-initialized");
			this.init();
			this.$content.parent().scrollTop(1).scrollTop(0);
			this.$content.removeClass("vc_properties-list-init");
			this.$el.trigger("vcPanel.shown");
			this.trigger("afterRender");
		},
		resetMinimize: function() {
			this.$el.removeClass("vc_panel-opacity")
		},
		ajaxData: function() {
			var parent_tag, parent_id, params, mergedParams;
			parent_tag = (parent_id = this.model.get("parent_id")) ? this.model.collection.get(parent_id).get("shortcode") : null;
			params = this.model.get("params");
			mergedParams = vc.getMergedParams(this.model.get("shortcode"), _.extend({}, vc.getDefaults(this.model.get("shortcode")), params));
			_.isUndefined(params.content) || (mergedParams.content = params.content);
			return {
				action: "vc_edit_form",
				tag: this.model.get("shortcode"),
				parent_tag: parent_tag,
				post_id: vc_post_id,
				params: mergedParams,
				_vcnonce: window.vcAdminNonce
			}
		},
		init: function() {
			vc.EditElementPanelView.__super__.init.call(this);
			this.initParams();
			this.initDependency();
			$(".wpb_edit_form_elements .textarea_html").each(function() {
				window.init_textarea_html($(this))
			}), this.trigger("init"), this.panelInit = !0
		},
		initParams: function() {
			var _this = this,
			$content = this.content().find('#vc_edit-form-tabs [data-vc-ui-element="panel-edit-element-tab"]:eq(' + this.active_tab_index + ")");
			$content.length || ($content = this.content());
			$content.attr("data-vc-param-initialized") || ($('[data-vc-ui-element="panel-shortcode-param"]', $content).each(function() {
				var $field, param;
				($field = $(this)).data("vcInitParam") || (param = $field.data("param_settings"), vc.atts.init.call(_this, param, $field), $field.data("vcInitParam", !0))
			}), $content.attr("data-vc-param-initialized", !0)), this.requiredParamsInitialized || _.isUndefined(vc.required_params_to_init) || ($('[data-vc-ui-element="panel-shortcode-param"]', this.content()).each(function() {
				var $field, param;
				!($field = $(this)).data("vcInitParam") && -1 < _.indexOf(vc.required_params_to_init, $field.data("param_type")) && (param = $field.data("param_settings"), vc.atts.init.call(_this, param, $field), $field.data("vcInitParam", !0))
			}), this.requiredParamsInitialized = !0)
		},
		initDependency: function() {
			var callDependencies = {};
			_.each(this.mapped_params, function(param) {
				if (_.isObject(param) && _.isObject(param.dependency)) {
					var $masters, $slave, rules = param.dependency;
					if (_.isString(param.dependency.element)) $masters = $("[name=" + param.dependency.element + "].wpb_vc_param_value", this.$content), $slave = $("[name= " + param.param_name + "].wpb_vc_param_value", this.$content), _.each($masters, function(master) {
						var $master, name;
						name = ($master = $(master)).attr("name"), _.isArray(this.dependent_elements[$master.attr("name")]) || (this.dependent_elements[$master.attr("name")] = []), this.dependent_elements[$master.attr("name")].push($slave), $master.data("dependentSet") || ($master.attr("data-dependent-set", "true"), $master.off("keyup change", this.hookDependent).on("keyup change", this.hookDependent)), callDependencies[name] || (callDependencies[name] = $master)
					}, this);
					_.isString(rules.callback) && window[rules.callback].call(this)
				}
			}, this), this.doCheckTabs = !1, _.each(callDependencies, function(obj) {
				this.hookDependent({
					currentTarget: obj
				})
			}, this), this.doCheckTabs = !0, this.checkTabs(), callDependencies = null
		},
		hookDependent: function(e) {
			var $master, $master_container, is_empty, dependent_elements, master_value, checkTabs;
			return $master_container = ($master = $(e.currentTarget)).closest(".vc_column"), dependent_elements = this.dependent_elements[$master.attr("name")], master_value = $master.is(":checkbox") ? _.map(this.$content.find("[name=" + $(e.currentTarget).attr("name") + "].wpb_vc_param_value:checked"), function(element) {
				return $(element).val()
			}) : $master.val(), checkTabs = this.doCheckTabs, this.doCheckTabs = !1, is_empty = $master.is(":checkbox") ? !this.$content.find("[name=" + $master.attr("name") + "].wpb_vc_param_value:checked").length : !master_value.length, $master_container.hasClass("vc_dependent-hidden") ? _.each(dependent_elements, function($element) {
				var event = jQuery.Event("change");
				event.extra_type = "vcHookDepended", $element.closest(".vc_column").addClass("vc_dependent-hidden"), $element.trigger(event)
			}) : _.each(dependent_elements, function($element) {
				var param_name = $element.attr("name"),
				rules = _.isObject(this.mapped_params[param_name]) && _.isObject(this.mapped_params[param_name].dependency) ? this.mapped_params[param_name].dependency : {},
				$param_block = $element.closest(".vc_column");
				_.isBoolean(rules.not_empty) && !0 === rules.not_empty && !is_empty || _.isBoolean(rules.is_empty) && !0 === rules.is_empty && is_empty || rules.value && _.intersection(_.isArray(rules.value) ? rules.value : [rules.value], _.isArray(master_value) ? master_value : [master_value]).length || rules.value_not_equal_to && !_.intersection(_.isArray(rules.value_not_equal_to) ? rules.value_not_equal_to : [rules.value_not_equal_to], _.isArray(master_value) ? master_value : [master_value]).length ? $param_block.removeClass("vc_dependent-hidden") : $param_block.addClass("vc_dependent-hidden");
				var event = jQuery.Event("change");
				event.extra_type = "vcHookDepended", $element.trigger(event)
			}, this), checkTabs && (this.checkTabs(), this.doCheckTabs = !0), this
		},
		checkTabs: function() {
			var that = this;
			!1 === this.tabsInit && (this.tabsInit = !0, this.$content.hasClass("vc_with-tabs") && (this.$tabsMenu = this.$content.find(".vc_edit-form-tabs-menu"))), this.$tabsMenu && (this.$content.find('[data-vc-ui-element="panel-edit-element-tab"]').each(function(index) {
				var $tabControl = that.$tabsMenu.find('> [data-tab-index="' + index + '"]');
				$(this).find('[data-vc-ui-element="panel-shortcode-param"]:not(".vc_dependent-hidden")').length ? $tabControl.hasClass("vc_dependent-hidden") && ($tabControl.removeClass("vc_dependent-hidden").removeClass("vc_tab-color-animated").addClass("vc_tab-color-animated"), window.setTimeout(function() {
					$tabControl.removeClass("vc_tab-color-animated")
				}, 200)) : $tabControl.addClass("vc_dependent-hidden")
			}), window.setTimeout(this.setTabsSize, 100))
		},
		setTabsSize: function() {
			this.$tabsMenu.parents(".vc_with-tabs.vc_panel-body").css("margin-top", this.$tabsMenu.outerHeight())
		},
		setActive: function() {
			this.$el.prev().addClass("active")
		},
		window: function() {
			return window
		},
		getParams: function() {
			var paramsSettings;
			return paramsSettings = this.mapped_params, this.params = _.extend({}, this.model.get("params")), _.each(paramsSettings, function(param) {
				var value;
				value = vc.atts.parseFrame.call(this, param), this.params[param.param_name] = value
			}, this), _.each(vc.edit_form_callbacks, function(callback) {
				callback.call(this)
			}, this), this.params
		},
		content: function() {
			return this.$content
		},
		save: function() {
			if (this.panelInit) {
				var shortcode = this.model.get("shortcode"),
				params = this.getParams(),
				mergedParams = _.extend({}, vc.getDefaults(shortcode), vc.getMergedParams(shortcode, params));
				_.isUndefined(params.content) || (mergedParams.content = params.content);
				this.model.save({
					params: mergedParams
				});
				this.showMessage(window.sprintf(window.i18nLocale.inline_element_saved, vc.getMapped(shortcode).name), "success");
				vc.frame_window || this.hide();
				this.trigger("save");
			}
		},
		show: function() {
			this.$el.hasClass("vc_active") || (this.$el.addClass("vc_active"), this.draggable || this.initDraggable(), this.fixElContainment(), this.trigger("show"))
		},
		hide: function(e) {
			e && e.preventDefault && e.preventDefault();
			this.checkAjax();
			this.ajax = !1;
			this.model && (this.model = null);
			this.currentModelParams = !1;
			this._killEditor();
			this.$el.removeClass("vc_active");
			this.$el.find(".vc_properties-list").removeClass("vc_with-tabs").css("margin-top", "auto");
			this.$content.empty();
			vc.active_panel = !1;
			this.trigger("hide");
			vc.sidebar_active && vc.add_element_block_view.render(!1);
		},
		setTitle: function() {
			return this.$el.find(this.titleSelector).text(vc.getMapped(this.model.get("shortcode")).name + " " + window.i18nLocale.settings), this
		},
		_killEditor: function() {
			_.isUndefined(window.tinyMCE) || $("textarea.textarea_html", this.$el).each(function() {
				var id = $(this).attr("id");
				"4" === tinymce.majorVersion ? window.tinyMCE.execCommand("mceRemoveEditor", !0, id) : window.tinyMCE.execCommand("mceRemoveControl", !0, id)
			}), jQuery("body").off("click.wpcolorpicker")
		}
	}), window.vc.EditElementUIPanel = vc.EditElementPanelView.vcExtendUI(vc.HelperPanelViewHeaderFooter).vcExtendUI(vc.HelperPanelViewResizable).vcExtendUI(vc.HelperPanelViewDraggable).extend({
		el: "#vc_ui-panel-edit-element",
		events: {
			'click [data-vc-ui-element="button-save"]': "save",
			'click [data-vc-ui-element="button-close"]': "hide",
			'click [data-vc-ui-element="button-minimize"]': "toggleOpacity",
			'click [data-vc-ui-element="panel-tab-control"]': "changeTab"
		},
		titleSelector: '[data-vc-ui-element="panel-title"]',
		initialize: function() {
			vc.EditElementUIPanel.__super__.initialize.call(this);
			this.on("afterResizeStart", function() {
				this.$el.css("maxHeight", "none")
			});
			$(document).on('lqd-sidebar-active', () => {
				if ( ! vc.sidebar_active ) {
					this.$el.css({
						width: 650,
						top: 100,
						left: 'calc(50% - (650px / 2))'
					});
				}
				this.customMediaQuery && this.setMediaSizeClass();
			})
		},
		show: function() {
			vc.EditElementUIPanel.__super__.show.call(this);
			$('[data-vc-ui-element="panel-tabs-controls"]', this.$el).remove();
			this.$el.css("maxHeight", "75vh");
		},
		tabsMenu: function() {
			if (!1 === this.tabsInit) {
				this.tabsInit = !0;
				var $tabsMenu = this.$el.find('[data-vc-ui-element="panel-tabs-controls"]');
				$tabsMenu.length && (this.$tabsMenu = $tabsMenu)
			}
			return this.$tabsMenu
		},
		buildTabs: function() {
			this.content().find('[data-vc-ui-element="panel-tabs-controls"]').prependTo('[data-vc-ui-element="panel-header-content"]')
		},
		changeTab: function(e) {
			e && e.preventDefault && e.preventDefault();
			var $tab = $(e.currentTarget);
			$tab.parent().hasClass("vc_active") || (this.$el.find('[data-vc-ui-element="panel-tabs-controls"] .vc_active:not([data-vc-ui-element="panel-tabs-line-dropdown"])').removeClass("vc_active"), $tab.parent().addClass("vc_active"), this.$el.find('[data-vc-ui-element="panel-edit-element-tab"].vc_active').removeClass("vc_active"), this.active_tab_index = this.$el.find($tab.data("vcUiElementTarget")).addClass("vc_active").index(), this.initParams(), this.$tabsMenu && this.$tabsMenu.vcTabsLine("checkDropdownContainerActive"), this.$content.parent().scrollTop(1).scrollTop(0), this.trigger("tabChange"))
		},
		checkTabs: function() {
			var _this = this;
			!1 === this.tabsInit && (this.tabsInit = !0, this.$tabsMenu = this.$el.find('[data-vc-ui-element="panel-tabs-controls"]')), this.tabsMenu() && (this.content().find('[data-vc-ui-element="panel-edit-element-tab"]').each(function(index) {
				var $tabControl = _this.$tabsMenu.find('> [data-tab-index="' + index + '"]');
				$(this).find('[data-vc-ui-element="panel-shortcode-param"]:not(".vc_dependent-hidden")').length ? $tabControl.hasClass("vc_dependent-hidden") && ($tabControl.removeClass("vc_dependent-hidden"), window.setTimeout(function() {
					$tabControl.removeClass("vc_tab-color-animated")
				}, 200)) : $tabControl.addClass("vc_dependent-hidden")
			}), this.$tabsMenu.vcTabsLine("refresh"), this.$tabsMenu.vcTabsLine("moveTabs"))
		}
	})
}(window.jQuery),
function($) {
	"use strict";
	window.vc.TemplateLibraryView = vc.PanelView.vcExtendUI(vc.HelperAjax).extend({
		myTemplates: [],
		$mainPopup: !1,
		$loadingPage: !1,
		$gridContainer: !1,
		$myTemplateContainer: !1,
		$popupItems: !1,
		$previewImage: !1,
		$previewTitle: !1,
		$previewUpdate: !1,
		$previewDownload: !1,
		$previewUpdateBtn: !1,
		$previewDownloadBtn: !1,
		$templatePreview: !1,
		$templatePage: !1,
		$downloadPage: !1,
		$updatePage: !1,
		$content: !1,
		$filter: !1,
		compiledGridTemplate: !1,
		compiledTemplate: !1,
		loaded: !1,
		data: !1,
		events: {
			"click [data-dismiss=panel]": "hide",
			"click .vc_ui-panel-close-button": "closePopupButton",
			"click .vc_ui-access-library-btn": "accessLibrary",
			"click #vc_template-library-template-grid .vc_ui-panel-template-preview-button": "previewButton",
			"click .vc_ui-panel-back-button": "backToTemplates",
			"click .vc_ui-panel-template-download-button, #vc_template-library-download-btn": "downloadButton",
			"click .vc_ui-panel-template-update-button, #vc_template-library-update-btn": "updateButton",
			"keyup #vc_template_lib_name_filter": "filterTemplates",
			"search #vc_template_lib_name_filter": "filterTemplates"
		},
		initialize: function() {
			_.bindAll(this, "loadLibrary", "addTemplateStatus", "loadMyTemplates", "deleteTemplate"), this.$mainPopup = this.$el.find(".vc_ui-panel-popup"), this.$loadingPage = this.$el.find(".vc_ui-panel-loading"), this.$gridContainer = this.$el.find("#vc_template-library-template-grid"), this.$myTemplateContainer = this.$el.find("#vc_template-library-shared_templates"), this.$popupItems = this.$el.find(".vc_ui-panel-popup-item"), this.$previewImage = this.$el.find(".vc_ui-panel-preview-image"), this.$previewTitle = this.$el.find(".vc_ui-panel-template-preview .vc_ui-panel-title"), this.$previewUpdate = this.$el.find("#vc_template-library-update"), this.$previewDownload = this.$el.find("#vc_template-library-download"), this.$previewUpdateBtn = this.$previewUpdate.find("#vc_template-library-update-btn"), this.$previewDownloadBtn = this.$previewUpdate.find("#vc_template-library-download-btn"), this.$templatePreview = this.$el.find(".vc_ui-panel-template-preview"), this.$templatePage = this.$el.find(".vc_ui-panel-template-content"), this.$downloadPage = this.$el.find(".vc_ui-panel-download"), this.$updatePage = this.$el.find(".vc_ui-panel-update"), this.$filter = this.$el.find("#vc_template_lib_name_filter"), this.$content = this.$el.find(".vc_ui-templates-content");
			var gridTemplateHtml = $("#vc_template-grid-item").html();
			this.compiledGridTemplate = vc.template(gridTemplateHtml);
			var myTemplateHtml = $("#vc_template-item").html();
			this.compiledTemplate = vc.template(myTemplateHtml), window.vc.events.on("templates:delete", this.deleteTemplate)
		},
		getLibrary: function() {
			if (this.loaded) this.showLibrary();
			else {
				this.checkAjax();
				var data = this.getStorage("templates"),
				_this = this;
				data && "object" == typeof data && !_.isEmpty(data) ? (this.loaded = !0, this.loadLibrary(data), this.showLibrary()) : this.ajax = $.getJSON("https://vc-cc-templates.wpbakery.com/templates.json").done(function(data) {
				_this.setStorage("templates", data), _this.loaded = !0, _this.loadLibrary(data), _this.showLibrary()
			}).always(this.resetAjax)
		}
	},
	removeStorage: function(name) {
		try {
			localStorage.removeItem("vc4-" + name), localStorage.removeItem("vc4-" + name + "_expiresIn")
		} catch (e) {
			return !1
		}
		return !0
	},
	getStorage: function(key) {
		var now = Date.now(),
		expiresIn = localStorage.getItem("vc4-" + key + "_expiresIn");
		if (null == expiresIn && (expiresIn = 0), expiresIn < now) return this.removeStorage(key), null;
		try {
			return JSON.parse(localStorage.getItem("vc4-" + key))
		} catch (e) {
			return null
		}
	},
	setStorage: function(key, value, expires) {
		expires = null == expires ? 86400 : Math.abs(expires);
		var schedule = Date.now() + 1e3 * expires;
		try {
			localStorage.setItem("vc4-" + key, JSON.stringify(value)), localStorage.setItem("vc4-" + key + "_expiresIn", schedule)
		} catch (err) {
			return window.console && window.console.warn && window.console.warn("template setStorage error", err), !1
		}
		return !0
	},
	loadLibrary: function(data) {
		if (data) {
			var renderedOutput = "",
			_this = this;
			this.loaded = !0, this.data = data, this.$filter.val(""), data.forEach(function(item) {
				item = _this.addTemplateStatus(item), renderedOutput += _this.compiledGridTemplate({
					id: item.id,
					title: item.title,
					thumbnailUrl: item.thumbnailUrl,
					previewUrl: item.previewUrl,
					status: item.status,
					downloaded: _.find(_this.myTemplates, {
						id: item.id
					}),
					version: item.version
				})
			}), this.$gridContainer.html(renderedOutput)
		}
	},
	showLibrary: function() {
		this.$loadingPage.addClass("vc_ui-hidden"), this.$mainPopup.removeClass("vc_ui-hidden"), this.$templatePage.removeClass("vc_ui-hidden")
	},
	addTemplateStatus: function(template) {
		var statusHtml = "",
		myTemplate = _.find(this.myTemplates, {
			id: template.id
		});
		if (myTemplate) {
			var status = window.i18nLocale.ui_template_downloaded;
			template.version > myTemplate.version && (status = window.i18nLocale.ui_template_fupdate), statusHtml = '<span class="vc_ui-panel-template-item-info"><span>' + status + "</span></span>"
		}
		return template.status = statusHtml, template
	},
	loadMyTemplates: function() {
		var renderedOutput = "",
		_this = this;
		this.myTemplates.forEach(function(item) {
			renderedOutput += _this.compiledTemplate({
				post_id: item.post_id,
				title: item.title
			})
		}), this.$myTemplateContainer.html(renderedOutput)
	},
	closePopupButton: function(e) {
		e && e.preventDefault && e.preventDefault(), this.$mainPopup.toggleClass("vc_ui-hidden"), this.$popupItems.addClass("vc_ui-hidden"), this.$content.removeClass("vc_ui-hidden")
	},
	accessLibrary: function() {
		this.$loadingPage.removeClass("vc_ui-hidden"), this.$content.addClass("vc_ui-hidden"), this.getLibrary()
	},
	previewButton: function(e) {
		var $template = $(e.currentTarget),
		imgUrl = $template.data("preview-url"),
		title = $template.data("title"),
		templateId = $template.data("template-id"),
		templateVersion = $template.data("template-version");
		this.$previewImage.attr("src", imgUrl), this.$previewTitle.text(title);
		var myTemplate = _.find(this.myTemplates, {
			id: templateId
		});
		this.$previewUpdate.toggleClass("vc_ui-hidden", !(myTemplate && myTemplate.version < templateVersion)), this.$previewDownload.toggleClass("vc_ui-hidden", !!myTemplate), this.$previewUpdateBtn.data("template-id", templateId), this.$previewDownloadBtn.data("template-id", templateId), this.$popupItems.addClass("vc_ui-hidden"), this.$templatePreview.removeClass("vc_ui-hidden"), this.$templatePreview.attr("data-template-id", templateId)
	},
	backToTemplates: function() {
		this.$popupItems.addClass("vc_ui-hidden"), this.$templatePage.removeClass("vc_ui-hidden")
	},
	deleteTemplate: function(data) {
		if ("shared_templates" === data.type) {
			var index = _.findIndex(this.myTemplates, {
				post_id: data.id
			}); - 1 !== index && (this.myTemplates.splice(index, 1), this.loaded && this.loadLibrary(this.data))
		}
	},
	downloadButton: function(e) {
		e && e.preventDefault && e.preventDefault();
		var id = jQuery(e.currentTarget).closest("[data-template-id]").data("templateId");
		id && (this.showDownloadOverlay(), this.downloadTemplate(id))
	},
	updateButton: function(e) {
		e && e.preventDefault && e.preventDefault(), jQuery(e.currentTarget).closest("[data-template-id]").data("templateId") && this.showUpdateOverlay()
	},
	showDownloadOverlay: function() {
		this.$popupItems.addClass("vc_ui-hidden"), this.$downloadPage.removeClass("vc_ui-hidden")
	},
	hideDownloadOverlay: function(message) {
		message && alert(message), this.$downloadPage.addClass("vc_ui-hidden"), this.$templatePage.removeClass("vc_ui-hidden")
	},
	showUpdateOverlay: function() {
		this.$popupItems.addClass("vc_ui-hidden"), this.$updatePage.removeClass("vc_ui-hidden")
	},
	hideUpdateOverlay: function(message) {
		this.$updatePage.addClass("vc_ui-hidden"), this.$templatePage.removeClass("vc_ui-hidden")
	},
	downloadTemplate: function(id) {
		this.checkAjax();
		var fail = !0;
		this.ajax = $.ajax({
			type: "POST",
			url: window.ajaxurl,
			data: {
				action: "vc_shared_templates_download",
				id: id,
				_vcnonce: window.vcAdminNonce
			},
			dataType: "json",
			context: this
		}).done(function(response) {
			if (response && response.success) {
				var template = _.find(this.data, {
					id: id
				});
				template && (fail = !1, template.post_id = response.data.post_id, this.myTemplates.unshift(template), this.loadMyTemplates(), this.loadLibrary(this.data), this.showLibrary())
			}
		}).always(function(response, status) {
			var message = "";
			"success" === status && !fail || (message = window.i18nLocale.ui_templates_failed_to_download), this.hideDownloadOverlay(message), this.resetAjax()
		})
	},
	filterTemplates: function() {
		var filter = ".vc_ui-panel-template-item .vc_ui-panel-template-item-name:containsi('" + this.$filter.val() + "')";
		$(".vc_ui-panel-template-item.vc_ui-visible", this.$gridContainer).removeClass("vc_ui-visible"), $(filter, this.$gridContainer).closest(".vc_ui-panel-template-item").addClass("vc_ui-visible")
	}
}), $(function() {
	window.vcTemplatesLibraryData && (window.vc.templatesLibrary = new vc.TemplateLibraryView({
		el: '[data-vc-ui-element="panel-edit-element-tab"][data-tab="shared_templates"]'
	}), window.vc.templatesLibrary.myTemplates = window.vcTemplatesLibraryData.templates || [], window.vc.templatesLibrary.loadMyTemplates())
})
}(window.jQuery),
function($) {
	"use strict";
	vc.PostSettingsUIPanelFrontendEditor = vc.PostSettingsPanelView.vcExtendUI(vc.HelperPanelViewHeaderFooter).vcExtendUI(vc.HelperPanelViewResizable).vcExtendUI(vc.HelperPanelViewDraggable).vcExtendUI({
		panelName: "post_settings",
		uiEvents: {
			setSize: "setEditorSize",
			show: "setEditorSize"
		},
		setSize: function() {
			this.trigger("setSize")
		},
		setDefaultHeightSettings: function() {
			this.$el.css("height", "75vh")
		},
		setEditorSize: function() {
			this.editor.setSizeResizable()
		}
	}), vc.PostSettingsUIPanelBackendEditor = vc.PostSettingsPanelViewBackendEditor.vcExtendUI(vc.HelperPanelViewHeaderFooter).vcExtendUI(vc.HelperPanelViewResizable).vcExtendUI(vc.HelperPanelViewDraggable).vcExtendUI({
		uiEvents: {
			setSize: "setEditorSize",
			show: "setEditorSize",
			render: "removeChangeTitleField"
		},
		setSize: function() {
			this.trigger("setSize")
		},
		setEditorSize: function() {
			this.editor.setSizeResizable()
		},
		setDefaultHeightSettings: function() {
			this.$el.css("height", "75vh")
		},
		removeChangeTitleField: function() {
			$("#vc_settings-title-container").remove()
		}
	})
}(window.jQuery),
function() {
	"use strict";
	var events = {
		'click [data-vc-ui-element="button-save"]': "save",
		'click [data-vc-ui-element="button-close"]': "hide",
		'click [data-vc-ui-element="button-minimize"]': "toggleOpacity",
		'click [data-vc-ui-element="button-layout"]': "setLayout",
		'click [data-vc-ui-element="button-update-layout"]': "updateFromInput"
	};
	vc.RowLayoutUIPanelFrontendEditor = vc.RowLayoutEditorPanelView.vcExtendUI(vc.HelperPanelViewHeaderFooter).vcExtendUI(vc.HelperPanelViewDraggable).extend({
		panelName: "rowLayouts",
		events: events
	}), vc.RowLayoutUIPanelBackendEditor = vc.RowLayoutEditorPanelViewBackend.vcExtendUI(vc.HelperPanelViewHeaderFooter).vcExtendUI(vc.HelperPanelViewDraggable).extend({
		panelName: "rowLayouts",
		events: events
	})
}(window.jQuery),
function($) {
	"use strict";
	window.vc.PresetSettingsUIPanelFrontendEditor = vc.PanelView.vcExtendUI(vc.HelperPanelViewHeaderFooter).vcExtendUI(vc.HelperAjax).vcExtendUI({
		panelName: "preset_settings",
		showMessageDisabled: !1,
		events: {
			'click [data-vc-ui-delete="preset-title"]': "removePreset",
			'click [data-vc-ui-element="button-close"]': "hide",
			'click [data-vc-ui-element="button-minimize"]': "toggleOpacity",
			"click [data-vc-ui-add-preset]": "createPreset"
		},
		initialize: function(options) {
			this.frontEnd = options && options.frontEnd
		},
		createPreset: function(e) {
			var options, columnOptions, $control, preset, tag, row, model, column_params, rowOptions;
			_.isUndefined(vc.ShortcodesBuilder) || (this.builder = new vc.ShortcodesBuilder), preset = ($control = $(e.currentTarget)).data("preset"), tag = $control.data("tag"), column_params = {
				width: "1/1"
			}, rowOptions = {
				shortcode: "vc_row",
				params: {}
			}, this.frontEnd ? (this.builder.create(rowOptions), columnOptions = {
				shortcode: "vc_column",
				params: column_params,
				parent_id: this.builder.lastID()
			}, this.builder.create(columnOptions), options = {
				shortcode: tag,
				parent_id: this.builder.lastID()
			}, preset && (options.preset = preset), window.vc.closeActivePanel(), this.builder.create(options), this.model = this.builder.last(), this.builder.render()) : (columnOptions = {
				shortcode: "vc_column",
				params: column_params,
				parent_id: (row = vc.shortcodes.create(rowOptions)).id,
				root_id: row.id
			}, options = {
				shortcode: tag,
				parent_id: vc.shortcodes.create(columnOptions).id,
				root_id: row.id
			}, preset && (options.preset = preset), model = vc.shortcodes.create(options), window.vc.closeActivePanel(), this.model = model), _.isBoolean(vc.getMapped(tag).show_settings_on_create) && !1 === vc.getMapped(tag).show_settings_on_create || this.showEditForm()
		},
		showEditForm: function() {
			window.vc.edit_element_block_view.render(this.model)
		},
		render: function() {
			return this.$el.css("left", ($(window).width() - this.$el.width()) / 2), this
		},
		removePreset: function(e) {
			e && e.preventDefault && e.preventDefault();
			var closestPreset = jQuery(e.currentTarget).closest('[data-vc-ui-delete="preset-title"]'),
			presetId = closestPreset.data("preset"),
			presetParent = closestPreset.data("preset-parent");
			this.deleteSettings(presetId, presetParent, e)
		},
		deleteSettings: function(id, shortcode_name) {
			var _this = this;
			return !!confirm(window.i18nLocale.delete_preset_confirmation) && (this.checkAjax(), this.ajax = $.ajax({
				type: "POST",
				dataType: "json",
				url: window.ajaxurl,
				data: this.deleteSettingsAjaxData(shortcode_name, id),
				context: this
			}).done(function(response) {
				response && response.success && (this.showMessage(window.i18nLocale.preset_removed, "success"), _this.$el.find('[data-preset="' + id + '"]').closest(".vc_ui-template").remove(), window.vc.events.trigger("vc:deletePreset", id))
			}).always(this.resetAjax), this.ajax)
		},
		deleteSettingsAjaxData: function(shortcode_name, id) {
			return {
				action: "vc_action_delete_settings_preset",
				shortcode_name: shortcode_name,
				vc_inline: !0,
				id: id,
				_vcnonce: window.vcAdminNonce
			}
		},
		showMessage: function(text, type) {
			if (this.showMessageDisabled) return !1;
			this.message_box_timeout && (this.$el.find("[data-vc-panel-message]").remove(), window.clearTimeout(this.message_box_timeout)), this.message_box_timeout = !1;
			var $messageBox, messageBoxTemplate = vc.template('<div class="vc_message_box vc_message_box-standard vc_message_box-rounded vc_color-<%- color %>"><div class="vc_message_box-icon"><i class="fa fa fa-<%- icon %>"></i></div><p><%- text %></p></div>');
			switch (type) {
				case "error":
				$messageBox = $('<div class="vc_col-xs-12 wpb_element_wrapper" data-vc-panel-message>').html(messageBoxTemplate({
					color: "danger",
					icon: "times",
					text: text
				}));
				break;
				case "warning":
				$messageBox = $('<div class="vc_col-xs-12 wpb_element_wrapper" data-vc-panel-message>').html(messageBoxTemplate({
					color: "warning",
					icon: "exclamation-triangle",
					text: text
				}));
				break;
				case "success":
				$messageBox = $('<div class="vc_col-xs-12 wpb_element_wrapper" data-vc-panel-message>').html(messageBoxTemplate({
					color: "success",
					icon: "check",
					text: text
				}))
			}
			$messageBox.prependTo(this.$el.find(".vc_properties-list")), $messageBox.fadeIn(), this.message_box_timeout = window.setTimeout(function() {
				$messageBox.remove()
			}, 6e3)
		}
	})
}(window.jQuery), _.isUndefined(window.vc) && (window.vc = {}), _.extend(vc, {
	no_title_placeholder: window.i18nLocale.no_title_parenthesis,
	responsive_disabled: !1,
	activity: !1,
	clone_index: 1,
	loaded: !1,
	path: "",
	admin_ajax: window.ajaxurl,
	filters: {
		templates: []
	},
	title: "",
	$title: !1,
	update_title: !1,
	$hold_active: !1,
	data_changed: !1,
	setDataChanged: function() {
		if (vc.undoRedoApi) {
			var that = this;
			_.defer(function() {
				that.addUndo(vc.builder.getContent())
			})
		}
		window.jQuery(window).bind("beforeunload.vcSave", function(e) {
			return window.i18nLocale.confirm_to_leave
		}), this.data_changed = !0
	},
	addUndo: _.debounce(function(content) {
		vc.undoRedoApi.add(content)
	}, 100),
	unsetDataChanged: function() {
		window.jQuery(window).unbind("beforeunload.vcSave"), this.data_changed = !1
	},
	addTemplateFilter: function(callback) {
		_.isFunction(callback) && this.filters.templates.push(callback)
	},
	unsetHoldActive: function() {
		this.$hold_active && (this.$hold_active.removeClass("vc_hold-active"), this.$hold_active = !1)
	}
}),
function($) {
	"use strict";
	vc.map = {}, vc.setFrameSize = function(size) {
		var $vc_navbar = $("#vc_navbar"),
		height = $(window).height() - $vc_navbar.height();
		vc.$frame.width(size), vc.$frame_wrapper.css({
			top: $vc_navbar.height()
		}), vc.$frame.height(height)
	}, vc.getDefaults = vc.memoizeWrapper(function(tag) {
		var defaults, params;
		return defaults = {}, params = _.isArray(vc.getMapped(tag).params) ? vc.getMapped(tag).params : [], _.each(params, function(param) {
			_.isObject(param) && (_.isUndefined(param.std) ? vc.atts[param.type] && vc.atts[param.type].defaults ? defaults[param.param_name] = vc.atts[param.type].defaults(param) : _.isUndefined(param.value) || (!_.isObject(param.value) || _.isArray(param.value) || _.isString(param.value) ? _.isArray(param.value) ? defaults[param.param_name] = param.value[0] : defaults[param.param_name] = param.value : defaults[param.param_name] = _.values(param.value)[0]) : defaults[param.param_name] = param.std)
		}), defaults
	}), vc.getDefaultsAndDependencyMap = vc.memoizeWrapper(function(tag) {
		var defaults, dependencyMap, params;
		return dependencyMap = {}, defaults = {}, params = _.isArray(vc.getMapped(tag).params) ? vc.getMapped(tag).params : [], _.each(params, function(param) {
			_.isObject(param) && "content" !== param.param_name && (_.isUndefined(param.std) ? _.isUndefined(param.value) || (vc.atts[param.type] && vc.atts[param.type].defaults ? defaults[param.param_name] = vc.atts[param.type].defaults(param) : _.isObject(param.value) ? defaults[param.param_name] = _.values(param.value)[0] : _.isArray(param.value) ? defaults[param.param_name] = param.value[0] : defaults[param.param_name] = param.value) : defaults[param.param_name] = param.std, _.isUndefined(param.dependency) || _.isUndefined(param.dependency.element) || (dependencyMap[param.param_name] = param.dependency))
		}), {
			defaults: defaults,
			dependencyMap: dependencyMap
		}
	}), vc.getMergedParams = function(tag, values) {
		var paramsMap, outputParams, paramsDependencies;
		return paramsMap = vc.getDefaultsAndDependencyMap(tag), outputParams = {}, values = _.extend({}, paramsMap.defaults, values), paramsDependencies = _.extend({}, paramsMap.dependencyMap), _.each(values, function(value, key) {
			if ("content" !== key) {
				var paramSettings;
				if (!_.isUndefined(paramsDependencies[key])) {
					if (!_.isUndefined(paramsDependencies[paramsDependencies[key].element]) && _.isBoolean(paramsDependencies[paramsDependencies[key].element].failed) && !0 === paramsDependencies[paramsDependencies[key].element].failed) return void(paramsDependencies[key].failed = !0);
					var rules, isDependedEmpty, dependedElement, dependedValue;
					dependedElement = paramsDependencies[key].element;
					var dependedValueSplit = !1;
					if ("string" == typeof(dependedValue = values[dependedElement]) && (dependedValueSplit = values[dependedElement].split(",").map(function(i) {
						return i.trim()
					}).filter(function(i) {
						return i
					})), isDependedEmpty = _.isEmpty(dependedValue), rules = _.omit(paramsDependencies[key], "element"), _.isBoolean(rules.not_empty) && !0 === rules.not_empty && isDependedEmpty || _.isBoolean(rules.is_empty) && !0 === rules.is_empty && !isDependedEmpty || rules.value && !_.intersection(_.isArray(rules.value) ? rules.value : [rules.value], _.isArray(dependedValue) ? dependedValue : [dependedValue]).length && dependedValueSplit && rules.value && !_.intersection(_.isArray(rules.value) ? rules.value : [rules.value], _.isArray(dependedValueSplit) ? dependedValueSplit : [dependedValueSplit]).length || rules.value_not_equal_to && _.intersection(_.isArray(rules.value_not_equal_to) ? rules.value_not_equal_to : [rules.value_not_equal_to], _.isArray(dependedValue) ? dependedValue : [dependedValue]).length && dependedValueSplit && rules.value_not_equal_to && _.intersection(_.isArray(rules.value_not_equal_to) ? rules.value_not_equal_to : [rules.value_not_equal_to], _.isArray(dependedValueSplit) ? dependedValueSplit : [dependedValueSplit]).length) return void(paramsDependencies[key].failed = !0)
				}
				paramSettings = vc.getParamSettings(tag, key), (_.isUndefined(paramSettings) || !_.isUndefined(paramsMap.defaults[key]) && paramsMap.defaults[key] !== value || _.isUndefined(paramsMap.defaults[key]) && "" !== value || !_.isUndefined(paramSettings.save_always) && !0 === paramSettings.save_always) && (outputParams[key] = value)
			}
		}), outputParams
	}, vc.getParamSettings = vc.memoizeWrapper(function(tag, paramName) {
		var params;
		return params = _.isArray(vc.getMapped(tag).params) ? vc.getMapped(tag).params : [], _.find(params, function(settings) {
			return _.isObject(settings) && settings.param_name === paramName
		}, this)
	}, function() {
		return arguments[0] + "," + arguments[1]
	}), vc.getParamSettingsByType = vc.memoizeWrapper(function(tag, paramType) {
		var params;
		return params = _.isArray(vc.getMapped(tag).params) ? vc.getMapped(tag).params : [], _.find(params, function(settings) {
			return _.isObject(settings) && settings.type === paramType
		}, this)
	}, function() {
		return arguments[0] + "," + arguments[1]
	}), vc.shortcodeHasIdParam = vc.memoizeWrapper(function(tag) {
		return vc.getParamSettingsByType(tag, "el_id")
	}), vc.buildRelevance = function() {
		vc.shortcode_relevance = {}, _.each(vc.map, function(object) {
			_.isObject(object.as_parent) && _.isString(object.as_parent.only) && (vc.shortcode_relevance["parent_only_" + object.base] = object.as_parent.only.replace(/\s/, "").split(",")), _.isObject(object.as_parent) && _.isString(object.as_parent.except) && (vc.shortcode_relevance["parent_except_" + object.base] = object.as_parent.except.replace(/\s/, "").split(",")), _.isObject(object.as_child) && _.isString(object.as_child.only) && (vc.shortcode_relevance["child_only_" + object.base] = object.as_child.only.replace(/\s/, "").split(",")), _.isObject(object.as_child) && _.isString(object.as_child.except) && (vc.shortcode_relevance["child_except_" + object.base] = object.as_child.except.replace(/\s/, "").split(","))
		}), vc.checkRelevance = function(tag, related_tag) {
			return !(_.isArray(vc.shortcode_relevance["parent_only_" + tag]) && !_.contains(vc.shortcode_relevance["parent_only_" + tag], related_tag)) && ((!_.isArray(vc.shortcode_relevance["parent_except_" + tag]) || !_.contains(vc.shortcode_relevance["parent_except_" + tag], related_tag)) && (!(_.isArray(vc.shortcode_relevance["child_only_" + related_tag]) && !_.contains(vc.shortcode_relevance["child_only_" + related_tag], tag)) && (!_.isArray(vc.shortcode_relevance["child_except_" + related_tag]) || !_.contains(vc.shortcode_relevance["child_except" + related_tag], tag))))
		}
	}, vc.CloneModel = function(builder, model, parent_id, child_of_clone) {
		var newOrder, params, tag, data, newModel;
		return vc.clone_index /= 10, newOrder = _.isBoolean(child_of_clone) && !0 === child_of_clone ? model.get("order") : parseFloat(model.get("order")) + vc.clone_index, params = _.extend({}, model.get("params")), data = {
			shortcode: tag = model.get("shortcode"),
			parent_id: parent_id,
			order: newOrder,
			cloned: !0,
			cloned_from: model.toJSON(),
			params: params
		}, vc["cloneMethod_" + tag] && (data = vc["cloneMethod_" + tag](data, model)), _.isBoolean(child_of_clone) && !0 === child_of_clone || (data.place_after_id = model.get("id")), builder.create(data), newModel = builder.last(), _.each(vc.shortcodes.where({
			parent_id: model.get("id")
		}), function(shortcode) {
			vc.CloneModel(builder, shortcode, newModel.get("id"), !0)
		}, this), newModel
	}, vc.getColumnSize = function(column) {
		var n, mod = 12 % column;
		return 0 < mod && (n = column, _.isNumber(n) && 1 == n % 2) && column % 3 ? column + "/12" : (0 === mod && (mod = column), column / mod + "/" + 12 / mod)
	}, vc.showMessage = function(message) {
		vc.message_timeout && ($(".vc_message").remove(), window.clearTimeout(vc.message_timeout));
		var $message = $('<div class="vc_message success" style="z-index: 999;">' + message + "</div>").prependTo($("body"));
		$message.fadeIn(500), vc.message_timeout = window.setTimeout(function() {
			$message.slideUp(500, function() {
				$(this).remove()
			}), vc.message_timeout = !1
		}, 5500)
	};
	window.InlineShortcodeView = vc.shortcode_view = Backbone.View.extend({
		hold_hover_on: !1,
		events: {
			"click > .vc_controls .vc_control-btn-delete": "destroy",
			"click > .vc_controls .vc_control-btn-edit": "edit",
			"click > .vc_controls .vc_control-btn-clone": "clone",
			mousemove: "checkControlsPosition"
		},
		controls_set: !1,
		$content: !1,
		move_timeout: !1,
		out_timeout: !1,
		hold_active: !0,
		builder: !1,
		default_controls_template: !1,
		initialize: function() {
			this.listenTo(this.model, "destroy", this.removeView);
			this.listenTo(this.model, "change:params", this.update);
			this.listenTo(this.model, "change:parent_id", this.changeParentId);
		},
		render: function() {
			this.$el.attr("data-model-id", this.model.get("id"));
			var tag = this.model.get("shortcode");
			return this.$el.attr("data-tag", tag),
			this.$el.addClass("vc_" + tag),
			this.addControls(),
			_.isObject(vc.getMapped(tag)) && (_.isBoolean(vc.getMapped(tag).is_container) && !0 === vc.getMapped(tag).is_container || !_.isEmpty(vc.getMapped(tag).as_parent)) && this.$el.addClass("vc_container-block"),
			this.changed(),
			this
		},
		checkControlsPosition: function() {
			if (this.$controls_buttons) {
				var window_top, new_position, element_height = this.$el.height();
				vc.$frame.height() < element_height && (window_top = $(vc.frame_window).scrollTop(), this.$controls_buttons.offset().top, 40 < (new_position = window_top - this.$el.offset().top + vc.$frame.height() / 2) && new_position < element_height ? this.$controls_buttons.css("top", new_position) : element_height < new_position ? this.$controls_buttons.css("top", element_height - 40) : this.$controls_buttons.css("top", 40))
			}
		},
		beforeUpdate: function() {},
		updated: function() {
			_.each(vc.shortcodes.where({
				parent_id: this.model.get("id")
			}), function(model) {
				model.view.parent_view = this, model.view.parentChanged()
			}, this), _.defer(_.bind(function() {
				vc.events.trigger("shortcodeView:updated", this.model), vc.events.trigger("shortcodeView:updated:" + this.model.get("shortcode"), this.model), vc.events.trigger("shortcodeView:updated:" + this.model.get("id"), this.model)
			}, this))
		},
		parentChanged: function() {
			this.checkControlsPosition()
		},
		rendered: function() {
			_.defer(_.bind(function() {
				vc.events.trigger("shortcodeView:ready", this.model), vc.events.trigger("shortcodeView:ready:" + this.model.get("shortcode"), this.model), vc.events.trigger("shortcodeView:ready:" + this.model.get("id"), this.model)
			}, this))
		},
		hasUserAccess: function() {
			return !0
		},
		addControls: function() {
			var shortcodeTag, $controls_el, allAccess, editAccess, moveAccess, template, parent, data;
			shortcodeTag = this.model.get("shortcode");
			$controls_el = $("#vc_controls-template-" + shortcodeTag);
			allAccess = vc_user_access().shortcodeAll(shortcodeTag);
			editAccess = vc_user_access().shortcodeEdit(shortcodeTag);
			moveAccess = vc_user_access().partAccess("dragndrop");
			template = $controls_el.length ? $controls_el.html() : this._getDefaultTemplate();
			parent = vc.shortcodes.get(this.model.get("parent_id"));
			data = {
				name: vc.getMapped(shortcodeTag).name,
				icon: vc.getMapped(shortcodeTag).icon,
				tag: shortcodeTag,
				parent_name: parent ? vc.getMapped(parent.get("shortcode")).name : "",
				parent_icon: parent ? vc.getMapped(parent.get("shortcode")).icon : "",
				parent_tag: parent ? parent.get("shortcode") : "",
				can_edit: editAccess,
				can_all: allAccess,
				moveAccess: moveAccess,
				state: vc_user_access().getState("shortcodes"),
				allowAdd: null
			};
			var compiledTemplate = vc.template(_.unescape(template), _.extend({}, vc.templateOptions.custom, {
				evaluate: /\{#([\s\S]+?)#}/g
			}));
			this.$controls = $(compiledTemplate(data).trim()).addClass("vc_controls"), this.$controls.appendTo(this.$el), this.$controls_buttons = this.$controls.find("> :first")
		},
		content: function() {
			return !1 === this.$content && (this.$content = this.$el.find("> :first")), this.$content
		},
		changeParentId: function() {
			var parent, parent_id = this.model.get("parent_id");
			vc.builder.notifyParent(this.model.get("parent_id")), !1 === parent_id ? this.placeElement(this.$el) : (parent = vc.shortcodes.get(parent_id)) && parent.view && parent.view.placeElement(this.$el), this.parentChanged()
		},
		_getDefaultTemplate: function() {
			if (_.isUndefined(this.default_controls_template) || !this.default_controls_template) {
				this.default_controls_template = $("<div><div>").html($("#vc_controls-template-default").html());
				var controls = this.$el.data("shortcode-controls");
				_.isUndefined(controls) || $(".vc_control-btn[data-control]", this.default_controls_template).each(function() {
					-1 == $.inArray($(this).data("control"), controls) && $(this).remove()
				})
			}
			return this.default_controls_template.html()
		},
		changed: function() {
			this.$el.removeClass("vc_empty-shortcode-element"), this.$el.height() < 5 && this.$el.addClass("vc_empty-shortcode-element")
		},
		edit: function(e) {
			e && e.preventDefault && e.preventDefault();
			e && e.stopPropagation && e.stopPropagation();
			"edit_element" === vc.activePanelName() && vc.active_panel.model && vc.active_panel.model.get("id") === this.model.get("id") || (vc.closeActivePanel(), vc.edit_element_block_view.render(this.model))
		},
		destroy: function(e) {
			e && e.preventDefault && e.preventDefault();
			e && e.stopPropagation && e.stopPropagation();
			vc.showMessage(window.sprintf(window.i18nLocale.inline_element_deleted, this.model.setting("name")));
			this.model.destroy();
		},
		removeView: function(model) {
			this.remove();
			vc.setDataChanged();
			vc.builder.notifyParent(this.model.get("parent_id"));
			vc.sidebar_active && vc.active_panel.model && vc.active_panel.model.get('id') === model.get('id') && vc.add_element_block_view.render(!1)
			vc.closeActivePanel(model);
			vc.setFrameSize();
		},
		update: function(model) {
			this.beforeUpdate();
			vc.builder.update(model || this.model)
		},
		clone: function(e) {
			var new_model, builder = new vc.ShortcodesBuilder;
			if (e && e.preventDefault && e.preventDefault(), e && e.stopPropagation && e.stopPropagation(), this.builder && !this.builder.is_build_complete) return !1;
			this.builder = builder, new_model = vc.CloneModel(builder, this.model, this.model.get("parent_id")), builder.setResultMessage(window.sprintf(window.i18nLocale.inline_element_cloned, new_model.setting("name"), new_model.get("id"))), builder.render()
		},
		getParam: function(param_name) {
			return _.isObject(this.model.get("params")) && !_.isUndefined(this.model.get("params")[param_name]) ? this.model.get("params")[param_name] : null
		},
		placeElement: function($el, activity) {
			var model = vc.shortcodes.get($el.data("modelId"));
			model && model.get("place_after_id") ? ($el.insertAfter(vc.$page.find("[data-model-id=" + model.get("place_after_id") + "]")), model.unset("place_after_id")) : _.isString(activity) && "prepend" === activity ? $el.prependTo(this.content()) : $el.appendTo(this.content()), this.changed()
		}
	}), vc.FrameView = Backbone.View.extend({
		events: {
			'click [data-vc-element="add-element-action"]': "addElement",
			"click #vc_no-content-add-text-block": "addTextBlock",
			"click #vc_templates-more-layouts": "openTemplatesWindow",
			"click #vc_templates-more-layouts-ne": "openTemplatesWindow",
			"click #vc_templates-more-pages": "openTemplatesWindow",
			"click #vc_pages-editor-button": "openPagesTemplatesWindow",
			"click .vc_template[data-template_id] > .wpb_wrapper": "loadDefaultTemplate"
		},
		openTemplatesWindow: function(e) {
			vc.templates_panel_view.once("show", function() {
				$('[data-vc-ui-element-target="[data-tab=default_templates]"]').click()
			}), vc.app.openTemplatesWindow.call(this, e)
		},
		openPagesTemplatesWindow: function(e) {
			vc.app.openPagesTemplatesWindow.call(this, e)
		},
		updateKeyPress: function(e) {
			if (13 === e.which) return e && e.preventDefault && e.preventDefault(), vc.$title.attr("contenteditable", !1), $(".entry-content").trigger("click"), !1
		},
		loadDefaultTemplate: function(e) {
			e && e.preventDefault && e.preventDefault(), vc.templates_panel_view.loadTemplate(e), $("#vc_no-content-helper").remove()
		},
		setTitle: function(title) {
			vc.$title.length && vc.$title.text(title || vc.no_title_placeholder), vc.title = title, vc.update_title = !0
		},
		initialize: function() {
			vc.frame_window = vc.$frame.get(0).contentWindow
		},
		setActiveHover: function(e) {
			this.$hover_element && this.$hover_element.removeClass("vc_hover");
			this.$hover_element = $(e.currentTarget).addClass("vc_hover");
			e.stopPropagation()
		},
		unsetActiveHover: function(e) {
			this.$hover_element && this.$hover_element.removeClass("vc_hover")
		},
		setSortable: function() {
			vc.frame_window.vc_iframe.setSortable(vc.app)
		},
		render: function() {
			return !1 !== vc_user_access().getState("post_settings") && (vc.$title = $(vc.$frame.get(0).contentWindow.document).find('h1:contains("' + (vc.title || vc.no_title_placeholder).replace(/"/g, '\\"') + '")'), vc.$title.on("click", function(e) {
				e.preventDefault(), vc.post_settings_view.render().show()
			})), this
		},
		noContent: function(no) {
			vc.frame_window.vc_iframe.showNoContent(no)
		},
		addElement: function(e) {
			e && e.preventDefault && e.preventDefault();
			vc.add_element_block_view.render(!1);
		},
		addTextBlock: function(e) {
			var builder, row_params, column_params, column_text_params;
			e && e.preventDefault && e.preventDefault(), row_params = {}, column_params = {
				width: "1/1"
			}, column_text_params = vc.getDefaults("vc_column_text"), (builder = new vc.ShortcodesBuilder).create({
				shortcode: "vc_row",
				params: row_params
			}).create({
				shortcode: "vc_column",
				parent_id: builder.lastID(),
				params: column_params
			}).create({
				shortcode: "vc_column_text",
				parent_id: builder.lastID(),
				params: column_text_params
			}).render(), vc.edit_element_block_view.render(builder.last())
		},
		scrollTo: function(model) {
			vc.frame_window.vc_iframe.scrollTo(model.get("id"))
		},
		addInlineScript: function(script) {
			return vc.frame_window.vc_iframe.addInlineScript(script)
		},
		addInlineScriptBody: function(script) {
			return vc.frame_window.vc_iframe.addInlineScriptBody(script)
		}
	}), vc.View = Backbone.View.extend({
		el: $("body"),
		mode: "view",
		current_size: "100%",
		events: {
			"click #vc_add-new-row": "createRow",
			"click #vc_add-new-element": "addElement",
			"click #vc_post-settings-button": "editSettings",
			"click #vc_templates-editor-button": "openTemplatesWindow",
			"click #vc_pages-editor-button": "openPagesTemplatesWindow",
			"click #vc_guides-toggle-button": "toggleMode",
			"click #vc_button-cancel": "cancel",
			"click #vc_button-edit-admin": "cancel",
			"click #vc_button-update": "save",
			"click #vc_button-save-draft, #vc_button-save-as-pending": "save",
			"click .vc_screen-width": "resizeFrame",
			"click .vc_edit-cloned": "editCloned",
			"click [data-vc-manage-elements]": "openPresetWindow",
			"click .lqd-switch-lightdark": "switchLightDark",
			"click .lqd-switch-sidebar, [data-vc-ui-element=button-switch_sidebar]": "switchSidebar",
		},
		initialize: function() {
			_.bindAll(this, "saveRowOrder", "saveElementOrder", "saveColumnOrder", "resizeWindow", "switchSidebar", "checkSidebar", "checkDarkMode");
			vc.shortcodes.on("change:params", this.changeParamsEvents, this);
			vc.events.on("shortcodes:add shortcodes:vc_section", vcAddShortcodeDefaultParams, this);
			vc.events.on("shortcodes:add", vc.atts.addShortcodeIdParam, this);
			_.defer(() => {
				this.checkDarkMode();
				this.checkSidebar();
			});
		},
		changeParamsEvents: function(model) {
			vc.events.triggerShortcodeEvents("update", model)
		},
		render: function() {
			vc.updateSettingsBadge();
			vc.$page = $(vc.$frame.get(0).contentWindow.document).find("#vc_inline-anchor").parent();
			vc.$frame_body = $(vc.$frame.get(0).contentWindow.document).find("body").addClass("vc_editor");
			this.setMode("compose");
			this.$size_control = $("#vc_screen-size-control");
			$(".vc_element-container", vc.frame_window.document).droppable({
				accept: ".vc_element_button"
			});
			$(window).resize(this.resizeWindow);
			_.defer(function() {
				vc.events.trigger("app.render")
			})
			return this;
		},
		cancel: function(e) {
			e && e.preventDefault && e.preventDefault(), window.location.href = $(e.currentTarget).data("url")
		},
		save: function(e) {
			e && e.preventDefault && e.preventDefault(), vc.builder.save($(e.currentTarget).data("changeStatus"))
		},
		resizeFrame: function(e) {
			var $control = $(e.currentTarget);
			if (e && e.preventDefault && e.preventDefault(), $control.hasClass("active")) return !1;
			this.$size_control.find(".active").removeClass("active");
			$("#vc_screen-size-current").attr("class", "vc_current-layout-icon " + $control.attr("class"));
			this.current_size = $control.data("size");
			$control.addClass("active");
			vc.setFrameSize(this.current_size);
		},
		editCloned: function(e) {
			var model_id, model;
			e && e.preventDefault && e.preventDefault(), model_id = $(e.currentTarget).data("modelId"), model = vc.shortcodes.get(model_id), vc.edit_element_block_view.render(model)
		},
		resizeWindow: function() {
			vc.setFrameSize(this.current_size)
		},
		switchMode: function(e) {
			var $control = $(e.currentTarget);
			e && e.preventDefault && e.preventDefault();
			this.setMode($control.data("mode"));
			$control.siblings(".vc_active").removeClass("vc_active");
			$control.addClass("vc_active");
		},
		toggleMode: function(e) {
			var $control = $(e.currentTarget);
			e && e.preventDefault && e.preventDefault();
			if ( "compose" === this.mode ) {
				$control.addClass("vc_off");
				this.setMode("view");
			} else {
				$control.removeClass("vc_off");
				this.setMode("compose");
			}
		},
		setMode: function(mode) {
			var $body = $("body").removeClass(this.mode + "-mode");
			vc.$frame_body.removeClass(this.mode + "-mode");
			this.mode = mode;
			$body.addClass(this.mode + "-mode");
			vc.$frame_body.addClass(this.mode + "-mode");
		},
		placeElement: function($view, activity) {
			var model = vc.shortcodes.get($view.data("modelId"));
			model && model.get("place_after_id") ? ($view.insertAfter(vc.$page.find("[data-model-id=" + model.get("place_after_id") + "]")), model.unset("place_after_id")) : _.isString(activity) && "prepend" === activity ? $view.prependTo(vc.$page) : $view.insertBefore(vc.$page.find("#vc_no-content-helper"))
		},
		addShortcodes: function(models) {
			_.each(models, function(model) {
				this.addShortcode(model), this.addShortcodes(vc.shortcodes.where({
					parent_id: model.get("id")
				}))
			}, this)
		},
		createShortcodeHtml: function(model) {
			var $template = $("#vc_template-" + model.get("shortcode")),
			template = $template.length ? $template.html() : '<div class="vc_block"></div>',
			compiledTemplate = vc.template(template, vc.templateOptions.custom);
			return $(compiledTemplate(model.toJSON()).trim())
		},
		addAll: function(models) {
			this.addShortcodes(models.where({
				parent_id: !1
			}))
		},
		createRow: function(e) {
			e && e.preventDefault && e.preventDefault();
			var row_params, column_params, builder = new vc.ShortcodesBuilder;
			row_params = {}, column_params = {
				width: "1/1"
			}, builder.create({
				shortcode: "vc_row",
				params: row_params
			}).create({
				shortcode: "vc_column",
				parent_id: builder.lastID(),
				params: column_params
			}).render()
		},
		addElement: function(e) {
			e && e.preventDefault && e.preventDefault();
			vc.add_element_block_view.render(!1);
		},
		editSettings: function(e) {
			e && e.preventDefault && e.preventDefault();
			vc.post_settings_view.render().show();
		},
		openTemplatesEditor: function(e) {
			e && e.preventDefault && e.preventDefault();
			vc.templates_editor_view.render().show();
		},
		openTemplatesWindow: function(e) {
			e && e.preventDefault && e.preventDefault();
			vc.templates_panel_view.render().show();
		},
		openPagesTemplatesWindow: function(e) {
			e && e.preventDefault && e.preventDefault();
			vc.pages_templates_panel_view.render().show();
		},
		setFrameSize: function() {
			vc.setFrameSize()
		},
		saveRowOrder: function(event, ui) {
			_.defer(function(app) {
				var $current_parent, row_params, column_params, $rows, builder;
				$current_parent = $(ui.item.parent()), $rows = $current_parent.find("> [data-tag=vc_row],> [data-tag=vc_section]"), builder = new vc.ShortcodesBuilder, $rows.each(function(key, value) {
					var $el;
					if (($el = $(this)).is(".droppable")) {
						row_params = {}, column_params = {
							width: "1/1"
						}, $el.remove();
						var row_data = {
							shortcode: "vc_row",
							params: row_params,
							order: key
						};
						0 === key ? vc.activity = "prepend" : key + 1 !== $rows.length && (row_data.place_after_id = vc.$page.find("> [data-tag=vc_row]:eq(" + (key - 1) + ")").data("modelId")), builder.create(row_data).create({
							shortcode: "vc_column",
							parent_id: builder.lastID(),
							params: column_params
						}).render()
					} else {
						var model = vc.shortcodes.get($el.data("modelId")),
						prev_parent = model.get("parent_id"),
						current_parent = $current_parent.closest(".vc_element").data("modelId") || !1;
						model.save({
							order: key,
							parent_id: current_parent
						}, {
							silent: !0
						}), prev_parent !== current_parent && (vc.builder.notifyParent(current_parent), vc.builder.notifyParent(prev_parent))
					}
				}), vc.setDataChanged()
			}, this)
		},
		saveElementOrder: function(event, ui) {
			_.defer(function(app, e, ui) {
				var $column, $elements;
				_.isNull(ui.sender) && ($column = ui.item.parent(), $elements = $column.find("> [data-model-id]"), $column.find("> [data-model-id]").each(function(key, value) {
					var $element, model, prev_parent, current_parent, prepend;
					prepend = !1, ($element = $(this)).is(".droppable") ? (current_parent = vc.shortcodes.get($column.parents(".vc_element[data-tag]:first").data("modelId")), $element.remove(), 0 === key ? prepend = !0 : key + 1 !== $elements.length && (prepend = $column.find("> [data-tag]:eq(" + (key - 1) + ")").data("modelId")), current_parent && vc.add_element_block_view.render(current_parent, prepend)) : (prev_parent = (model = vc.shortcodes.get($element.data("modelId"))).get("parent_id"), current_parent = $column.parents(".vc_element[data-tag]:first").data("modelId"), model.save({
						order: key,
						parent_id: current_parent
					}, {
						silent: !0
					}), prev_parent !== current_parent && (vc.builder.notifyParent(current_parent), vc.builder.notifyParent(prev_parent)))
				})), vc.setDataChanged()
			}, this, event, ui)
		},
		saveColumnOrder: function(event, ui) {
			_.defer(function(app, e, ui) {
				ui.item.parent().find("> [data-model-id]").each(function() {
					var $element, index;
					index = ($element = $(this)).index(), vc.shortcodes.get($element.data("modelId")).save({
						order: index
					})
				})
			}, this, event, ui), vc.setDataChanged()
		},
		openPresetWindow: function(e) {
			e && e.preventDefault && e.preventDefault();
			vc.preset_panel_view.render().show();
		},
		checkDarkMode: function() {
			if ( localStorage.getItem('lqd-dark-mode') === 'yes' ) {
				document.documentElement.classList.add('lqd-dark-mode');
			}
		},
		checkSidebar: function() {
			if ( localStorage.getItem('lqd-sidebar-active') === 'yes' ) {
				document.documentElement.classList.add('lqd-sidebar-active');
				vc.add_element_block_view.render(!1);
				vc.sidebar_active = true;
				$(document).trigger('lqd-sidebar-active');
			}
		},
		switchSidebar: function(e) {
			e && e.preventDefault && e.preventDefault();
			document.documentElement.classList.toggle('lqd-sidebar-active');
			localStorage.setItem('lqd-sidebar-active', localStorage.getItem('lqd-sidebar-active') === 'yes' ? 'no' : 'yes');
			vc.sidebar_active = !vc.sidebar_active;
			if ( vc.sidebar_active && ! vc.active_panel ) {
				vc.add_element_block_view.render(!1);
			} else if ( !vc.sidebar_active && vc.activePanelName() !== 'edit_element' ) {
				vc.closeActivePanel();
			}
			$(document).trigger('lqd-sidebar-active');
		},
		switchLightDark: function(e) {
			e && e.preventDefault && e.preventDefault();
			document.documentElement.classList.toggle('lqd-dark-mode');
			localStorage.setItem('lqd-dark-mode', localStorage.getItem('lqd-dark-mode') === 'yes' ? 'no' : 'yes');
		}
	})
}(window.jQuery),
function() {
	"use strict";
	_.isUndefined(window.vc) && (window.vc = {}), vc.addTemplateFilter(function(str) {
		var random_id = VCS4() + "-" + VCS4();
		return str.replace(/tab\_id\=\"([^\"]+)\"/g, 'tab_id="$1' + random_id + '"')
	})
}(window.jQuery),
function($) {
	"use strict";
	window.vc.events.on("shortcodeView:updated", function(model) {
		var modelId;
		!0 === (vc.map[model.get("shortcode")] || !1).is_container && (modelId = model.get("id"), window.vc.frame_window.vc_iframe.updateChildGrids(modelId))
	}), window.InlineShortcodeViewContainer = window.InlineShortcodeView.extend({
		controls_selector: "#vc_controls-template-container",
		events: {
			"click > .vc_controls .vc_element .vc_control-btn-delete": "destroy",
			"click > .vc_controls .vc_element .vc_control-btn-edit": "edit",
			"click > .vc_controls .vc_element .vc_control-btn-clone": "clone",
			"click > .vc_controls .vc_element .vc_control-btn-prepend": "prependElement",
			"click > .vc_controls .vc_control-btn-append": "appendElement",
			"click > .vc_controls .vc_control-btn-switcher": "switchControls",
			"click > .vc_empty-element": "appendElement",
			mouseenter: "resetActive",
			mouseleave: "holdActive"
		},
		hold_active: !1,
		parent_view: !1,
		initialize: function(params) {
			_.bindAll(this, "holdActive");
			window.InlineShortcodeViewContainer.__super__.initialize.call(this, params);
			this.model.get("parent_id") && (this.parent_view = vc.shortcodes.get(this.model.get("parent_id")).view);
		},
		resetActive: function(e) {
			this.hold_active && window.clearTimeout(this.hold_active)
		},
		holdActive: function(e) {
			this.resetActive();
			this.$el.addClass("vc_hold-active");
			var view = this;
			this.hold_active = window.setTimeout(function() {
				view.hold_active && window.clearTimeout(view.hold_active);
				view.hold_active = !1;
				// view.$el.find('.vc_controls .vc_active').removeClass('vc_active');
				view.$el.removeClass("vc_hold-active");
			}, 700)
		},
		content: function() {
			return !1 === this.$content && (this.$content = this.$el.find(".vc_container-anchor:first").parent(), this.$el.find(".vc_container-anchor:first").remove()), this.$content
		},
		render: function() {
			return window.InlineShortcodeViewContainer.__super__.render.call(this), this.content().addClass("vc_element-container"), this.$el.addClass("vc_container-block"), this
		},
		changed: function() {
			this.allowAddControlOnEmpty() && (0 === this.$el.find(".vc_element[data-tag]").length ? this.$el.addClass("vc_empty").find("> :first").addClass("vc_empty-element") : this.$el.removeClass("vc_empty").find("> .vc_empty-element").removeClass("vc_empty-element"))
		},
		prependElement: function(e) {
			e && e.preventDefault && e.preventDefault(), this.prepend = !0, window.vc.add_element_block_view.render(this.model, !0)
		},
		appendElement: function(e) {
			e && e.preventDefault && e.preventDefault(), window.vc.add_element_block_view.render(this.model)
		},
		addControls: function() {
			var shortcodeTag, parentShortcodeTag, allAccess, moveAccess, editAccess, parentAllAccess, parentEditAccess, template, parent, data, parentName, parentIcon, icon;
			shortcodeTag = this.model.get("shortcode");
			template = $(this.controls_selector).html();
			parent = vc.shortcodes.get( this.model.get( 'parent_id' ) );
			if ( parent ) {
				parentName = vc.getMapped( parent.get( 'shortcode' ) ).name;
				parentIcon = vc.getMapped( parent.get( 'shortcode' ) ).icon;
				parentShortcodeTag = parent.get( 'shortcode' );
			}
			allAccess = vc_user_access().shortcodeAll(shortcodeTag);
			editAccess = vc_user_access().shortcodeEdit(shortcodeTag);
			parentAllAccess = vc_user_access().shortcodeAll(parentShortcodeTag);
			parentEditAccess = vc_user_access().shortcodeEdit(parentShortcodeTag);
			moveAccess = vc_user_access().partAccess("dragndrop");
			icon = vc.getMapped(shortcodeTag).icon;
			data = {
				name: vc.getMapped(shortcodeTag).name,
				icon: icon,
				tag: shortcodeTag,
				parent_name: parentName,
				parent_icon: parentIcon || icon,
				parent_tag: parentShortcodeTag,
				can_edit: editAccess,
				can_all: allAccess,
				moveAccess: moveAccess,
				parent_can_edit: parentEditAccess,
				parent_can_all: parentAllAccess,
				state: vc_user_access().getState("shortcodes"),
				allowAdd: this.allowAddControl(),
				switcherPrefix: parentAllAccess && allAccess ? "" : "-disable-switcher"
			};
			var compiledTemplate = vc.template(_.unescape(template), _.extend({}, vc.templateOptions.custom, {
				evaluate: /\{#([\s\S]+?)#}/g
			}));
			this.$controls = $(compiledTemplate(data).trim()).addClass("vc_controls"), this.$controls.appendTo(this.$el)
		},
		allowAddControl: function() {
			return "edit" !== vc_user_access().getState("shortcodes")
		},
		multi_edit: function(e) {
			var parent, children, models = [];
			e && e.preventDefault && e.preventDefault(), this.model.get("parent_id") && (parent = vc.shortcodes.get(this.model.get("parent_id"))), parent ? (models.push(parent), children = vc.shortcodes.where({
				parent_id: parent.get("id")
			}), window.vc.multi_edit_element_block_view.render(models.concat(children), this.model.get("id"))) : window.vc.edit_element_block_view.render(this.model)
		},
		allowAddControlOnEmpty: function() {
			return "edit" !== vc_user_access().getState("shortcodes")
		},
		switchControls: function(e) {
			var $parent, $current;
			e && e.preventDefault && e.preventDefault();
			vc.unsetHoldActive();
			($parent = $(e.currentTarget).parent()).toggleClass("vc_active");
			($current = $parent.siblings(".vc_active")).removeClass("vc_active");
			$current.hasClass("vc_element") || window.setTimeout(this.holdActive, 500);
		}
	})
}(window.jQuery),
function($) {
	"use strict";
	window.InlineShortcodeViewContainerWithParent = window.InlineShortcodeViewContainer.extend({
		controls_selector: "#vc_controls-template-container-with-parent",
		events: {
			"click > .vc_controls .vc_element .vc_control-btn-delete": "destroy",
			"click > .vc_controls .vc_element .vc_control-btn-edit": "edit",
			"click > .vc_controls .vc_element .vc_control-btn-clone": "clone",
			"click > .vc_controls .vc_element .vc_control-btn-prepend": "prependElement",
			"click > .vc_controls .vc_control-btn-append": "appendElement",
			"click > .vc_controls .vc_parent .vc_control-btn-delete": "destroyParent",
			"click > .vc_controls .vc_parent .vc_control-btn-edit": "editParent",
			"click > .vc_controls .vc_parent .vc_control-btn-clone": "cloneParent",
			"click > .vc_controls .vc_parent .vc_control-btn-prepend": "addSibling",
			"click > .vc_controls .vc_parent .vc_control-btn-layout": "changeLayout",
			"click > .vc_empty-element": "appendElement",
			"click > .vc_controls .vc_control-btn-switcher": "switchControls",
			mouseenter: "resetActive",
			mouseleave: "holdActive"
		},
		destroyParent: function(e) {
			e && e.preventDefault && e.preventDefault(), this.parent_view.destroy(e)
		},
		cloneParent: function(e) {
			e && e.preventDefault && e.preventDefault(), this.parent_view.clone(e)
		},
		editParent: function(e) {
			e && e.preventDefault && e.preventDefault(), this.parent_view.edit(e)
		},
		addSibling: function(e) {
			e && e.preventDefault && e.preventDefault(), this.parent_view.addElement(e)
		},
		changeLayout: function(e) {
			e && e.preventDefault && e.preventDefault(), this.parent_view.changeLayout(e)
		},
	})
}(window.jQuery),
(function ($) {
	'use strict';
	window.InlineShortcodeView_vc_section = window.InlineShortcodeViewContainer.extend( {
		controls_selector: '#vc_controls-template-container',
		initialize: function () {
			_.bindAll( this, 'checkSectionWidth' );
			window.InlineShortcodeView_vc_section.__super__.initialize.call( this );
			vc.frame_window.jQuery( vc.frame_window.document ).off( 'vc-full-width-row-single', this.checkSectionWidth );
			vc.frame_window.jQuery( vc.frame_window.document ).on( 'vc-full-width-row-single', this.checkSectionWidth );
		},
		checkSectionWidth: function ( e, data ) {
			if ( data.el.hasClass( 'vc_section' ) && data.el.attr( 'data-vc-stretch-content' ) ) {
				data.el.siblings( '.vc_controls' ).find( '.vc_controls-out-tl' ).css( { left: data.offset - 17 } );
			}
		},
		render: function () {
			var $content = this.content();
			if ( $content && $content.hasClass( 'vc_row-has-fill' ) ) {
				$content.removeClass( 'vc_row-has-fill' );
				this.$el.addClass( 'vc_row-has-fill' );
			}

			return window.InlineShortcodeView_vc_section.__super__.render.call( this );
		}
	} );
})(window.jQuery),
function($) {
	"use strict";
	window.InlineShortcodeView_vc_row = window.InlineShortcodeView.extend( {
		column_tag: 'vc_column',
		events: {
			'mouseenter': 'removeHoldActive'
		},
		layout: 1,
		// stackSectionAnchor: 0,
		// stackSectionLuminosity: 0,
		addControls: function () {
			this.$controls = $( '<div class="no-controls"></div>' );
			this.$controls.appendTo( this.$el );

			return this;
		},
		render: function () {
			var $content = this.content();
			if ( $content && $content.hasClass( 'vc_row-has-fill' ) ) {
				$content.removeClass( 'vc_row-has-fill' );
				this.$el.addClass( 'vc_row-has-fill' );
			}
			window.InlineShortcodeView_vc_row.__super__.render.call( this );

			if ( vc.frame_window.jQuery('body').hasClass('pp-enabled') ) {
				_.defer(() => {
					this.reInitLiquidStack();
				});
			}

			return this;
		},
		removeHoldActive: function () {
			vc.unsetHoldActive();
		},
		addColumn: function () {
			vc.builder.create( {
				shortcode: this.column_tag,
				parent_id: this.model.get( 'id' )
			} ).render();
		},
		addElement: function ( e ) {
			if ( e && e.preventDefault ) {
				e.preventDefault();
			}
			this.addColumn();
		},
		changeLayout: function ( e ) {
			if ( e && e.preventDefault ) {
				e.preventDefault();
			}
			this.layoutEditor().render( this.model ).show();
		},
		layoutEditor: function () {
			if ( _.isUndefined( vc.row_layout_editor ) ) {
				vc.row_layout_editor = new vc.RowLayoutUIPanelFrontendEditor( { el: $( '#vc_ui-panel-row-layout' ) } );
			}

			return vc.row_layout_editor;
		},
		convertToWidthsArray: function ( string ) {
			return _.map( string.split( /_/ ), function ( c ) {
				var w = c.split( '' );
				w.splice( Math.floor( c.length / 2 ), 0, '/' );
				return w.join( '' );
			} );
		},
		changed: function () {
			window.InlineShortcodeView_vc_row.__super__.changed.call( this );
			this.addLayoutClass();
		},
		updated: function () {
			window.InlineShortcodeView_vc_row.__super__.updated.call( this );
			if ( vc.frame_window.jQuery('body').hasClass('pp-enabled') ) {
				_.defer(() => {
					this.reInitLiquidStack(true);
				});
			}
		},
		content: function () {
			if ( false === this.$content ) {
				this.$content = this.$el.find( '.vc_container-anchor:first' ).parent();
			}
			this.$el.find( '.vc_container-anchor:first' ).remove();

			return this.$content;
		},
		addLayoutClass: function () {
			this.$el.removeClass( 'vc_layout_' + this.layout );
			this.layout = _.reject( vc.shortcodes.where( { parent_id: this.model.get( 'id' ) } ), function ( model ) {
				return model.get( 'deleted' );
			} ).length;
			this.$el.addClass( 'vc_layout_' + this.layout );
		},
		convertRowColumns: function ( layout, builder ) {
			if ( !layout ) {
				return false;
			}
			var column_params, new_model, columns_contents, columns;
			columns_contents = [];
			columns = this.convertToWidthsArray( layout );
			vc.layout_change_shortcodes = [];
			vc.layout_old_columns = vc.shortcodes.where( { parent_id: this.model.get( 'id' ) } );
			_.each( vc.layout_old_columns, function ( column ) {
				column.set( 'deleted', true );
				columns_contents.push( {
					shortcodes: vc.shortcodes.where( { parent_id: column.get( 'id' ) } ),
					params: column.get( 'params' )
				} );
			} );
			_.each( columns, function ( column ) {
				var prev_settings = columns_contents.shift();
				if ( _.isObject( prev_settings ) ) {
					new_model = builder.create( {
						shortcode: this.column_tag,
						parent_id: this.model.get( 'id' ),
						order: vc.shortcodes.nextOrder(),
						params: _.extend( {}, prev_settings.params, { width: column } )
					} ).last();
					_.each( prev_settings.shortcodes, function ( shortcode ) {
						shortcode.save( {
								parent_id: new_model.get( 'id' ),
								order: vc.shortcodes.nextOrder()
							},
							{ silent: true } );
						vc.layout_change_shortcodes.push( shortcode );
					}, this );
				} else {
					column_params = { width: column };

					new_model = builder.create( {
						shortcode: this.column_tag,
						parent_id: this.model.get( 'id' ),
						order: vc.shortcodes.nextOrder(),
						params: column_params
					} ).last();
				}
			}, this );
			_.each( columns_contents, function ( column ) {
				_.each( column.shortcodes, function ( shortcode ) {
					shortcode.save( {
							parent_id: new_model.get( 'id' ),
							order: vc.shortcodes.nextOrder()
						},
						{ silent: true } );
					vc.layout_change_shortcodes.push( shortcode );
					if ( shortcode.view.rowsColumnsConverted ) {
						shortcode.view.rowsColumnsConverted();
					}
				}, this );
			}, this );
			builder.render( function () {
				_.each( vc.layout_change_shortcodes, function ( shortcode ) {
					shortcode.trigger( 'change:parent_id' );
					if ( shortcode.view.rowsColumnsConverted ) {
						shortcode.view.rowsColumnsConverted();
					}
				} );
				_.each( vc.layout_old_columns, function ( column ) {
					column.destroy();
				} );
				vc.layout_old_columns = [];
				vc.layout_change_shortcodes = [];
			} );

			return columns;
		},
		allowAddControl: function () {
			return 'edit' !== vc_user_access().getState( 'shortcodes' );
		},
		allowAddControlOnEmpty: function () {
			return 'edit' !== vc_user_access().getState( 'shortcodes' );
		},
		reInitLiquidStack: function(updated) {
			const $ = vc.frame_window.jQuery;
			const $siteContent = $('#lqd-site-content');
			const $contentsWrap = $('#lqd-contents-wrap', $siteContent);
			const stackData = $siteContent.data('plugin_liquidStack');
			if ( stackData ) {
				stackData.updateSections($contentsWrap.children('.vc_vc_row'));

				const parent_id = this.model.get('parent_id');
				const rows = vc.shortcodes.where( { parent_id: parent_id } )
				const index = _.findIndex(rows, row => this.model === row);

				stackData.setActiveSection(index);
				stackData.activateNavDots(index);
				
			}
		}
	} );
}(window.jQuery),
function($) {
	"use strict";
	window.InlineShortcodeView_vc_column = window.InlineShortcodeViewContainerWithParent.extend( {
		controls_selector: '#vc_controls-template-vc_column',
		resizeDomainName: 'columnSize',
		_x: 0,
		css_width: 12,
		prepend: false,
		$resizeBar: false,
		initialize: function ( params ) {
			
			window.InlineShortcodeView_vc_column.__super__.initialize.call( this, params );
			_.bindAll( this, 'startChangeSize', 'stopChangeSize', 'resize' );
			
		},
		render: function () {
			var width;
			window.InlineShortcodeView_vc_column.__super__.render.call( this );
			this.prepend = false;
			// Here goes width logic
			this.$resizeBar = $( '<div class="vc_resize-bar"></div>' )
				.appendTo( this.$el )
				.mousedown( this.startChangeSize );

			const newParams = this.model.get('params');
			const alignParam = this.model.getParam('align');
			const responsiveAlginParam = this.model.getParam('responsive_align');
			const newResponsiveAlignArr = [];
			if ( alignParam && alignParam !== '' ) {
				
				if ( responsiveAlginParam ) {
					responsiveAlginParam.split(' ').forEach((param, i) => {
						let newParam = param;
						if ( newParam.includes('text-xs-') ) {
							newParam = alignParam;
						}
						newResponsiveAlignArr.push(newParam);
					});
				} else {
					newResponsiveAlignArr.push(alignParam);
				}

				newParams['responsive_align'] = newResponsiveAlignArr.join(' ');
				this.model.save({params: newParams}, {silent: true});
				
			}

			const columnOnTopOnTablet = this.model.getParam('column_top_ontablet');
			const columnOnTopOnMobile = this.model.getParam('column_top_onmobile');

			if ( columnOnTopOnTablet && columnOnTopOnTablet === 'yes' && this.$el ) {
				this.$el.addClass('lqd-column-top-ontablet').children().removeClass('lqd-column-top-ontablet');
			} else {
				this.$el.removeClass('lqd-column-top-ontablet');
			}
			if ( columnOnTopOnMobile && columnOnTopOnMobile === 'yes' && this.$el ) {
				this.$el.addClass('lqd-column-top-onmobile').children().removeClass('lqd-column-top-onmobile');
			} else {
				this.$el.removeClass('lqd-column-top-onmobile');
			}

			this.setColumnClasses();
			this.customCssClassReplace();

			return this;
		},
		destroy: function ( e ) {
			var parent_id = this.model.get( 'parent_id' );
			window.InlineShortcodeView_vc_column.__super__.destroy.call( this, e );
			if ( !vc.shortcodes.where( { parent_id: parent_id } ).length ) {
				vc.shortcodes.get( parent_id ).destroy();
			}
		},
		customCssClassReplace: function () {
			var css_classes, css_regex, class_match;

			css_classes = this.$el.find( '.wpb_column' ).attr( 'class' );
			css_regex = /.*(vc_custom_\d+).*/;
			class_match = css_classes && css_classes.match ? css_classes.match( css_regex ) : false;
			if ( class_match && class_match[ 1 ] ) {
				this.$el.addClass( class_match[ 1 ] );
				this.$el.find( '.wpb_column' ).attr( 'class', css_classes.replace( class_match[ 1 ], '' ).trim() );
			}
		},
		setColumnClasses: function () {
			var offset, width, $content;
			offset = this.getParam( 'offset' ) || '';
			width = this.getParam( 'width' ) || '1/1';
			$content = this.$el.find( '> .wpb_column' );
			this.css_class_width = this.convertSize( width );
			if ( this.css_class_width !== width ) {
				this.css_class_width = this.css_class_width.replace( /[^\d]/g, '' );
			}
			$content.removeClass( 'vc_col-sm-' + this.css_class_width );
			if ( !offset.match( /vc_col\-sm\-\d+/ ) ) {
				this.$el.addClass( 'vc_col-sm-' + this.css_class_width );
			}
			if ( vc.responsive_disabled ) {
				offset = offset.replace( /vc_col\-(lg|md|xs)[^\s]*/g, '' );
			}
			if ( !_.isEmpty( offset ) ) {
				$content.removeClass( offset );
				this.$el.addClass( offset );
			}

			const responsiveAlign = this.getParam('responsive_align');

			if ( responsiveAlign ) {
				$content.removeClass('text-left text-center text-right');
				$content.addClass(responsiveAlign.split(' ')[0]);
			}

		},
		startChangeSize: function ( e ) {
			var width = this.getParam( width ) || 12;
			this._grid_step = this.parent_view.$el.width() / width;
			vc.frame_window.jQuery(this.$resizeBar).addClass('is-dragging');
			vc.frame_window.jQuery( 'body' ).addClass( 'vc_column-dragging' ).disableSelection();
			this._x = parseInt( e.pageX, 10 );
			vc.$page.bind( 'mousemove.' + this.resizeDomainName, this.resize );
			$( vc.frame_window.document ).on( 'mouseup', this.stopChangeSize );
		},
		stopChangeSize: function () {
			this._x = 0;
			vc.frame_window.jQuery( 'body' ).removeClass( 'vc_column-dragging' ).enableSelection();
			vc.frame_window.jQuery(this.$resizeBar).removeClass('is-dragging');
			vc.$page.unbind( 'mousemove.' + this.resizeDomainName );
		},
		resize: function ( e ) {
			var width, old_width, diff, params = this.model.get( 'params' );
			diff = e.pageX - this._x;
			if ( Math.abs( diff ) < this._grid_step ) {
				return;
			}
			this._x = parseInt( e.pageX, 10 );
			old_width = '' + this.css_class_width;
			if ( 0 < diff ) {
				this.css_class_width += 1;
			} else if ( 0 > diff ) {
				this.css_class_width -= 1;
			}
			if ( 12 < this.css_class_width ) {
				this.css_class_width = 12;
			}
			if ( 1 > this.css_class_width ) {
				this.css_class_width = 1;
			}
			params.width = vc.getColumnSize( this.css_class_width );
			this.model.save( { params: params }, { silent: true } );
			this.$el.removeClass( 'vc_col-sm-' + old_width ).addClass( 'vc_col-sm-' + this.css_class_width );
		},
		convertSize: function ( width ) {
			var prefix, numbers, range, num, dev;
			prefix = 'vc_col-sm-';
			numbers = width ? width.split( '/' ) : [
				1,
				1
			];
			range = _.range( 1, 13 );
			num = !_.isUndefined( numbers[ 0 ] ) && 0 <= _.indexOf( range,
				parseInt( numbers[ 0 ], 10 ) ) ? parseInt( numbers[ 0 ], 10 ) : false;
			dev = !_.isUndefined( numbers[ 1 ] ) && 0 <= _.indexOf( range,
				parseInt( numbers[ 1 ], 10 ) ) ? parseInt( numbers[ 1 ], 10 ) : false;
			// Custom fix for 5 columns grid
			if ( '5' === numbers[ 1 ] ) {
				return width;
			}
			if ( false !== num && false !== dev ) {
				return prefix + (12 * num / dev);
			}
			return prefix + '12';
		},
		allowAddControl: function () {
			return vc_user_access().shortcodeAll( 'vc_column' );
		}
	} );
}(window.jQuery),
function() {
	"use strict";
	window.InlineShortcodeView_vc_row_inner = window.InlineShortcodeView_vc_row.extend({
		column_tag: "vc_column_inner"
	})
}(),
function() {
	"use strict";
	window.InlineShortcodeView_vc_column_inner = window.InlineShortcodeView_vc_column.extend({
		controls_selector: '#vc_controls-template-vc_column-inner'
	})
}(),
function() {
	"use strict";
	window.InlineShortcodeView_vc_column_text = window.InlineShortcodeView.extend({
		initialize: function(options) {
			window.InlineShortcodeView_vc_column_text.__super__.initialize.call(this, options), _.bindAll(this, "setupEditor", "updateContent")
		},
		setupEditor: function(ed) {
			ed.on("keyup", this.updateContent)
		},
		updateContent: function() {
			var params = this.model.get("params");
			params.content = tinyMCE.activeEditor.getContent(), this.model.save({
				params: params
			}, {
				silent: !0
			})
		}
	})
}(),
function() {
	"use strict";
	window.InlineShortcodeView_vc_pie = window.InlineShortcodeView.extend({
		render: function() {
			return _.bindAll(this, "parentChanged"), window.InlineShortcodeView_vc_pie.__super__.render.call(this), this.unbindResize(), vc.frame_window.vc_iframe.addActivity(function() {
				this.vc_iframe.vc_pieChart()
			}), this
		},
		unbindResize: function() {
			vc.frame_window.jQuery(vc.frame_window).unbind("resize.vcPieChartEditable")
		},
		parentChanged: function() {
			this.$el.find(".vc_pie_chart").removeClass("vc_ready"), vc.frame_window.vc_pieChart()
		},
		rowsColumnsConverted: function() {
			window.setTimeout(this.parentChanged, 200), this.parentChanged()
		}
	})
}(window.jQuery),
function() {
	"use strict";
	window.InlineShortcodeView_vc_round_chart = window.InlineShortcodeView.extend({
		render: function() {
			var model_id = this.model.get("id");
			return window.InlineShortcodeView_vc_round_chart.__super__.render.call(this), vc.frame_window.vc_iframe.addActivity(function() {
				this.vc_round_charts(model_id)
			}), this
		},
		parentChanged: function() {
			var modelId = this.model.get("id");
			return window.InlineShortcodeView_vc_round_chart.__super__.parentChanged.call(this), _.defer(function() {
				vc.frame_window.vc_round_charts(modelId)
			}), this
		},
		remove: function() {
			var id = this.$el.find(".vc_round-chart").data("vcChartId");
			window.InlineShortcodeView_vc_round_chart.__super__.remove.call(this), id && void 0 !== vc.frame_window.Chart.instances[id] && delete vc.frame_window.Chart.instances[id]
		}
	})
}(window.jQuery),
function() {
	"use strict";
	window.InlineShortcodeView_vc_line_chart = window.InlineShortcodeView.extend({
		render: function() {
			var model_id = this.model.get("id");
			return window.InlineShortcodeView_vc_line_chart.__super__.render.call(this), vc.frame_window.vc_iframe.addActivity(function() {
				this.vc_line_charts(model_id)
			}), this
		},
		parentChanged: function() {
			var modelId = this.model.get("id");
			return window.InlineShortcodeView_vc_line_chart.__super__.parentChanged.call(this), _.defer(function() {
				vc.frame_window.vc_line_charts(modelId)
			}), this
		},
		remove: function() {
			var id = this.$el.find(".vc_line-chart").data("vcChartId");
			window.InlineShortcodeView_vc_line_chart.__super__.remove.call(this), id && void 0 !== vc.frame_window.Chart.instances[id] && delete vc.frame_window.Chart.instances[id]
		}
	})
}(window.jQuery),
function() {
	"use strict";
	window.InlineShortcodeView_vc_single_image = window.InlineShortcodeView.extend({
		render: function() {
			var model_id = this.model.get("id");
			return window.InlineShortcodeView_vc_single_image.__super__.render.call(this), vc.frame_window.vc_iframe.addActivity(function() {
				void 0 !== this.vc_image_zoom && this.vc_image_zoom(model_id)
			}), this
		},
		parentChanged: function() {
			var model_id = this.model.get("id");
			return window.InlineShortcodeView_vc_single_image.__super__.parentChanged.call(this), void 0 !== vc.frame_window.vc_image_zoom && _.defer(function() {
				vc.frame_window.vc_image_zoom(model_id)
			}), this
		}
	})
}(),
function() {
	"use strict";
	window.InlineShortcodeView_vc_images_carousel = window.InlineShortcodeView.extend({
		render: function() {
			var model_id = this.model.get("id");
			return window.InlineShortcodeView_vc_images_carousel.__super__.render.call(this), vc.frame_window.vc_iframe.addActivity(function() {
				this.vc_iframe.vc_imageCarousel(model_id)
			}), this
		}
	})
}(),
function() {
	"use strict";
	window.InlineShortcodeView_vc_gallery = window.InlineShortcodeView.extend({
		render: function() {
			var model_id = this.model.get("id");
			return window.InlineShortcodeView_vc_gallery.__super__.render.call(this), vc.frame_window.vc_iframe.addActivity(function() {
				this.vc_iframe.vc_gallery(model_id)
			}), this
		},
		parentChanged: function() {
			window.InlineShortcodeView_vc_gallery.__super__.parentChanged.call(this), vc.frame_window.vc_iframe.vc_gallery(this.model.get("id"))
		}
	})
}(),
function() {
	"use strict";
	window.InlineShortcodeView_vc_posts_slider = window.InlineShortcodeView.extend({
		render: function() {
			var model_id = this.model.get("id");
			return window.InlineShortcodeView_vc_posts_slider.__super__.render.call(this), vc.frame_window.vc_iframe.addActivity(function() {
				this.vc_iframe.vc_postsSlider(model_id)
			}), this
		}
	})
}(),
function() {
	"use strict";
	window.InlineShortcodeView_vc_toggle = window.InlineShortcodeView.extend({
		render: function() {
			var model_id = this.model.get("id");
			return window.InlineShortcodeView_vc_toggle.__super__.render.call(this), vc.frame_window.vc_iframe.addActivity(function() {
				this.vc_iframe.vc_toggle(model_id)
			}), this
		}
	})
}(),
function() {
	"use strict";
	window.InlineShortcodeView_vc_flickr = window.InlineShortcodeView.extend({
		render: function() {
			window.InlineShortcodeView_vc_flickr.__super__.render.call(this);
			var $placeholder = this.$el.find(".vc_flickr-inline-placeholder");
			return vc.frame_window.vc_iframe.addActivity(function() {
				this.vc_iframe.vc_Flickr($placeholder)
			}), this
		}
	})
}(),
function() {
	"use strict";
	window.InlineShortcodeView_vc_raw_js = window.InlineShortcodeView.extend({
		render: function() {
			window.InlineShortcodeView_vc_raw_js.__super__.render.call(this);
			var script = this.$el.find(".vc_js_inline_holder").val();
			return this.$el.find(".wpb_wrapper").html(script), this
		}
	})
}(),
function() {
	"use strict";
	window.InlineShortcodeView_vc_basic_grid = vc.shortcode_view.extend({
		render: function(e) {
			return window.InlineShortcodeView_vc_basic_grid.__super__.render.call(this, e), this.initGridJs(!0), this
		},
		parentChanged: function() {
			window.InlineShortcodeView_vc_basic_grid.__super__.parentChanged.call(this), this.initGridJs()
		},
		initGridJs: function(useAddActivity) {
			var model = this.model;
			if (!0 === model.get("grid_activity")) return !1;
			model.set("grid_activity", !0), !0 === useAddActivity ? vc.frame_window.vc_iframe.addActivity(function() {
				this.vc_iframe.gridInit(model.get("id")), model.set("grid_activity", !1)
			}) : (vc.frame_window.vc_iframe.gridInit(model.get("id")), model.set("grid_activity", !1))
		}
	})
}(),
function() {
	"use strict";
	window.InlineShortcodeView_vc_masonry_grid = window.InlineShortcodeView_vc_basic_grid.extend()
}(),
function() {
	"use strict";
	window.InlineShortcodeView_vc_media_grid = window.InlineShortcodeView_vc_basic_grid.extend()
}(),
function() {
	"use strict";
	window.InlineShortcodeView_vc_masonry_media_grid = window.InlineShortcodeView_vc_basic_grid.extend()
}(),
function($) {
	"use strict";
	window.InlineShortcodeView_vc_tta_accordion = window.InlineShortcodeViewContainer.extend({
		events: {},
		childTag: "vc_tta_section",
		activeClass: "vc_active",
		defaultSectionTitle: window.i18nLocale.section,
		initialize: function() {
			_.bindAll(this, "buildSortable", "updateSorting"), window.InlineShortcodeView_vc_tta_accordion.__super__.initialize.call(this)
		},
		render: function() {
			return window.InlineShortcodeViewContainer.__super__.render.call(this), this.content(), this.buildPagination(), this
		},
		addControls: function() {
			return this.$controls = $('<div class="no-controls"></div>'), this.$controls.appendTo(this.$el), this
		},
		addElement: function(e) {
			e && e.preventDefault && e.preventDefault(), this.addSection("parent.prepend" === $(e.currentTarget).data("vcControl"))
		},
		appendElement: function(e) {
			return this.addElement(e)
		},
		prependElement: function(e) {
			return this.addElement(e)
		},
		addSection: function(prepend) {
			var params, i;
			for (params = {
				shortcode: this.childTag,
				parent_id: this.model.get("id"),
				isActiveSection: !0,
				params: {
					title: this.defaultSectionTitle
				}
			}, prepend && (vc.activity = "prepend", params.order = this.getSiblingsFirstPositionIndex()), vc.builder.create(params), i = vc.builder.models.length - 1; 0 <= i; i--) vc.builder.models[i].get("shortcode");
			vc.builder.render()
		},
		getSiblingsFirstPositionIndex: function() {
			var order, first_shortcode;
			return order = 0, (first_shortcode = vc.shortcodes.sort().findWhere({
				parent_id: this.model.get("id")
			})) && (order = first_shortcode.get("order") - 1), order
		},
		changed: function() {
			vc.frame_window.vc_iframe.buildTTA(), window.InlineShortcodeView_vc_tta_accordion.__super__.changed.call(this), _.defer(this.buildSortable), this.buildPagination()
		},
		updated: function() {
			window.InlineShortcodeView_vc_tta_accordion.__super__.updated.call(this), _.defer(this.buildSortable), this.buildPagination()
		},
		buildSortable: function() {
			vc_user_access().shortcodeEdit(this.model.get("shortcode")) && this.$el && this.$el.find(".vc_tta-panels").sortable({
				forcePlaceholderSize: !0,
				placeholder: "vc_placeholder-row",
				start: this.startSorting,
				over: function(event, ui) {
					ui.placeholder.css({
						maxWidth: ui.placeholder.parent().width()
					}), ui.placeholder.removeClass("vc_hidden-placeholder")
				},
				items: "> .vc_element",
				handle: ".vc_tta-panel-heading, .vc_child-element-move",
				update: this.updateSorting
			})
		},
		startSorting: function(event, ui) {
			ui.placeholder.width(ui.item.width())
		},
		updateSorting: function(event, ui) {
			var self = this;
			this.getPanelsList().find("> .vc_element").each(function() {
				var model_id, $this;
				model_id = ($this = $(this)).data("modelId"), vc.shortcodes.get(model_id).save({
					order: self.getIndex($this)
				}, {
					silent: !0
				})
			}), this.buildPagination()
		},
		getIndex: function($element) {
			return $element.index()
		},
		getPanelsList: function() {
			return this.$el.find(".vc_tta-panels")
		},
		parentChanged: function() {
			window.InlineShortcodeView_vc_tta_accordion.__super__.parentChanged.call(this), void 0 !== vc.frame_window.vc_round_charts && vc.frame_window.vc_round_charts(this.model.get("id")), void 0 !== vc.frame_window.vc_line_charts && vc.frame_window.vc_line_charts(this.model.get("id"))
		},
		buildPagination: function() {},
		removePagination: function() {
			this.$el.find(".vc_tta-panels-container").find(" > .vc_pagination").remove()
		},
		getPaginationList: function() {
			var $accordions, classes, style_chunks, that, html, params;
			return params = this.model.get("params"), !_.isUndefined(params.pagination_style) && params.pagination_style.length ? ($accordions = this.$el.find("[data-vc-accordion]"), (classes = []).push("vc_general"), classes.push("vc_pagination"), style_chunks = params.pagination_style.split("-"), classes.push("vc_pagination-style-" + style_chunks[0]), classes.push("vc_pagination-shape-" + style_chunks[1]), !_.isUndefined(params.pagination_color) && params.pagination_color.length && classes.push("vc_pagination-color-" + params.pagination_color), (html = []).push('<ul class="' + classes.join(" ") + '">'), that = this, $accordions.each(function() {
				var section_classes, $this, selector, a_html;
				section_classes = ["vc_pagination-item"], ($this = $(this)).closest(".vc_tta-panel").hasClass(that.activeClass) && section_classes.push(that.activeClass), 0 !== (selector = $this.attr("href")).indexOf("#") && (selector = ""), $this.attr("data-vc-target") && (selector = $this.attr("data-vc-target")), a_html = '<a href="javascript:;" data-vc-target="' + selector + '" class="vc_pagination-trigger" data-vc-tabs data-vc-container=".vc_tta"></a>', html.push('<li class="' + section_classes.join(" ") + '" data-vc-tab>' + a_html + "</li>")
			}), html.push("</ul>"), $(html.join(""))) : null
		}
	})
}(window.jQuery),
function($) {
	"use strict";
	window.InlineShortcodeView_vc_tta_tabs = window.InlineShortcodeView_vc_tta_accordion.extend({
		render: function() {
			return window.InlineShortcodeView_vc_tta_tabs.__super__.render.call(this), _.bindAll(this, "buildSortableNavigation", "updateSortingNavigation"), this.createTabs(), _.defer(this.buildSortableNavigation), this
		},
		createTabs: function() {
			var models = _.sortBy(vc.shortcodes.where({
				parent_id: this.model.get("id")
			}), function(model) {
				return model.get("order")
			});
			_.each(models, function(model) {
				this.sectionUpdated(model, !0)
			}, this)
		},
		defaultSectionTitle: window.i18nLocale.tab,
		addIcon: function(model, html) {
			var icon, icon_html;
			return "true" === model.getParam("add_icon") && (icon = model.getParam("i_icon_" + model.getParam("i_type")), _.isUndefined(icon) || (icon_html = '<i class="' + ("vc_tta-icon " + icon) + '"></i>'), "right" === model.getParam("i_position") ? html += icon_html : html = icon_html + html), html
		},
		sectionUpdated: function(model, justAppend) {
			var $tabEl, $navigation, sectionId, html, title, index, tabAdded, $element;
			(tabAdded = !1, sectionId = model.get("id"), $tabEl = ($navigation = this.$el.find(".vc_tta-tabs-container .vc_tta-tabs-list")).find('[data-vc-target="[data-model-id=' + sectionId + ']"]'), title = model.getParam("title"), $tabEl.length) ? (html = '<span class="vc_tta-title-text">' + title + "</span>", html = this.addIcon(model, html), $tabEl.html(html)) : (html = '<span class="vc_tta-title-text">' + title + "</span>", html = this.addIcon(model, html), $element = $('<li class="vc_tta-tab" data-vc-target-model-id="' + sectionId + '" data-vc-tab><a href="javascript:;" data-vc-use-cache="false" data-vc-tabs data-vc-target="[data-model-id=' + sectionId + ']" data-vc-container=".vc_tta">' + html + "</a></li>"), !0 !== justAppend && -1 < (index = _.pluck(_.sortBy(vc.shortcodes.where({
				parent_id: this.model.get("id")
			}), function(childModel) {
				return childModel.get("order")
			}), "id").indexOf(model.get("id")) - 1) && $navigation.find("[data-vc-tab]:eq(" + index + ")").length && ($element.insertAfter($navigation.find("[data-vc-tab]:eq(" + index + ")")), tabAdded = !0), tabAdded || $element.appendTo($navigation), model.get("isActiveSection") && $element.addClass(this.activeClass));
			this.buildPagination()
		},
		getNextTab: function($viewTab) {
			var lastIndex, viewTabIndex, $navigationSections;
			return lastIndex = ($navigationSections = this.$el.find(".vc_tta-tabs-container .vc_tta-tabs-list").children()).length - 1, (viewTabIndex = $viewTab.index()) !== lastIndex ? $navigationSections.eq(viewTabIndex + 1) : $navigationSections.eq(viewTabIndex - 1)
		},
		removeSection: function(modelId) {
			var $viewTab, $nextTab;
			($viewTab = this.$el.find('.vc_tta-tabs-container .vc_tta-tabs-list [data-vc-target="[data-model-id=' + modelId + ']"]').parent()).hasClass(this.activeClass) && ($nextTab = this.getNextTab($viewTab), vc.frame_window.jQuery($nextTab).find("[data-vc-target]").trigger("click")), $viewTab.remove(), this.buildPagination()
		},
		buildSortableNavigation: function() {
			vc_user_access().shortcodeEdit(this.model.get("shortcode")) && this.$el.find(".vc_tta-tabs-container .vc_tta-tabs-list").sortable({
				items: ".vc_tta-tab",
				forcePlaceholderSize: !0,
				placeholder: "vc_tta-tab vc_placeholder-tta-tab",
				helper: this.renderSortingHelper,
				start: function(event, ui) {
					ui.placeholder.width(ui.item.width())
				},
				over: function(event, ui) {
					ui.placeholder.css({
						maxWidth: ui.placeholder.parent().width()
					}), ui.placeholder.removeClass("vc_hidden-placeholder")
				},
				update: this.updateSortingNavigation
			})
		},
		updateSorting: function(event, ui) {
			window.InlineShortcodeView_vc_tta_tabs.__super__.updateSorting.call(this, event, ui), this.updateTabsPositions(this.getPanelsList())
		},
		updateSortingNavigation: function() {
			var $tabs, self;
			($tabs = (self = this).$el.find(".vc_tta-tabs-list")).find("> .vc_tta-tab").each(function() {
				var modelId, $li;
				modelId = ($li = $(this).removeAttr("style")).data("vcTargetModelId"), vc.shortcodes.get(modelId).save({
					order: self.getIndex($li)
				}, {
					silent: !0
				})
			}), this.updatePanelsPositions($tabs)
		},
		updateTabsPositions: function($panels) {
			var $tabs, $elements, tabSortableData;
			($tabs = this.$el.find(".vc_tta-tabs-list")).length && ($elements = [], tabSortableData = $panels.sortable("toArray", {
				attribute: "data-model-id"
			}), _.each(tabSortableData, function(value) {
				$elements.push($tabs.find('[data-vc-target-model-id="' + value + '"]'))
			}, this), $tabs.prepend($elements)), this.buildPagination()
		},
		updatePanelsPositions: function($tabs) {
			var $elements, tabSortableData, $panels;
			$panels = this.getPanelsList(), $elements = [], tabSortableData = $tabs.sortable("toArray", {
				attribute: "data-vc-target-model-id"
			}), _.each(tabSortableData, function(value) {
				$elements.push($panels.find('[data-model-id="' + value + '"]'))
			}, this), $panels.prepend($elements), this.buildPagination()
		},
		renderSortingHelper: function(event, currentItem) {
			var helper, currentItemWidth, currentItemHeight;
			return currentItemWidth = (helper = currentItem).width() + 1, currentItemHeight = currentItem.height(), helper.width(currentItemWidth), helper.height(currentItemHeight), helper
		},
		buildPagination: function() {
			var params;
			this.removePagination(), params = this.model.get("params"), !_.isUndefined(params.pagination_style) && params.pagination_style.length && ("top" === params.tab_position ? this.$el.find(".vc_tta-panels-container").append(this.getPaginationList()) : this.getPaginationList().insertBefore(this.$el.find(".vc_tta-container .vc_tta-panels")))
		}
	})
}(window.jQuery),
function() {
	"use strict";
	window.InlineShortcodeView_vc_tta_tour = window.InlineShortcodeView_vc_tta_tabs.extend({
		defaultSectionTitle: window.i18nLocale.section,
		buildPagination: function() {
			this.removePagination();
			var params = this.model.get("params");
			!_.isUndefined(params.pagination_style) && params.pagination_style.length && this.$el.find(".vc_tta-panels-container").append(this.getPaginationList())
		}
	})
}(),
function() {
	"use strict";
	window.InlineShortcodeView_vc_tta_pageable = window.InlineShortcodeView_vc_tta_tour.extend({})
}(),
function($) {
	"use strict";
	window.vc.ttaSectionActivateOnClone = !1, window.InlineShortcodeView_vc_tta_section = window.InlineShortcodeViewContainerWithParent.extend({
		events: {
			'click > .vc_controls [data-vc-control="destroy"]': "destroy",
			'click > .vc_controls [data-vc-control="edit"]': "edit",
			'click > .vc_controls [data-vc-control="clone"]': "clone",
			'click > .vc_controls [data-vc-control="prepend"]': "prependElement",
			'click > .vc_controls [data-vc-control="append"]': "appendElement",
			'click > .vc_controls [data-vc-control="parent.destroy"]': "destroyParent",
			'click > .vc_controls [data-vc-control="parent.edit"]': "editParent",
			'click > .vc_controls [data-vc-control="parent.clone"]': "cloneParent",
			'click > .vc_controls [data-vc-control="parent.append"]': "addSibling",
			"click .vc_tta-panel-body > [data-js-panel-body].vc_empty-element": "appendElement",
			"click > .vc_controls .vc_control-btn-switcher": "switchControls",
			mouseenter: "resetActive",
			mouseleave: "holdActive"
		},
		controls_selector: "#vc_controls-template-vc_tta_section",
		previousClasses: !1,
		activeClass: "vc_active",
		render: function() {
			var model = this.model;
			return window.InlineShortcodeView_vc_tta_section.__super__.render.call(this), _.bindAll(this, "bindAccordionEvents"), this.refreshContent(), this.moveClasses(), _.defer(this.bindAccordionEvents), this.isAsActiveSection() && window.vc.frame_window.vc_iframe.addActivity(function() {
				window.vc.frame_window.jQuery('[data-vc-accordion][data-vc-target="[data-model-id=' + model.get("id") + ']"]').trigger("click")
			}), this
		},
		allowAddControl: function() {
			return vc_user_access().shortcodeAll("vc_tta_section")
		},
		clone: function(e) {
			vc.ttaSectionActivateOnClone = !0, window.InlineShortcodeView_vc_tta_section.__super__.clone.call(this, e)
		},
		addSibling: function(e) {
			window.InlineShortcodeView_vc_tta_section.__super__.addSibling.call(this, e)
		},
		parentChanged: function() {
			return window.InlineShortcodeView_vc_tta_section.__super__.parentChanged.call(this), this.refreshContent(!0), this
		},
		changed: function() {
			this.allowAddControlOnEmpty() && 0 === this.$el.find(".vc_element[data-tag]").length ? this.$el.addClass("vc_empty").find(".vc_tta-panel-body > [data-js-panel-body]").addClass("vc_empty-element") : this.$el.removeClass("vc_empty").find(".vc_tta-panel-body > [data-js-panel-body].vc_empty-element").removeClass("vc_empty-element")
		},
		moveClasses: function() {
			var panelClassName;
			this.previousClasses && (this.$el.get(0).className = this.$el.get(0).className.replace(this.previousClasses, "")), panelClassName = this.$el.find(".vc_tta-panel").get(0).className, this.$el.attr("data-vc-content", this.$el.find(".vc_tta-panel").data("vcContent")), this.previousClasses = panelClassName, this.$el.find(".vc_tta-panel").get(0).className = "", this.$el.get(0).className = this.$el.get(0).className + " " + this.previousClasses, this.$el.find(".vc_tta-panel-title [data-vc-target]").attr("data-vc-target", "[data-model-id=" + this.model.get("id") + "]")
		},
		refreshContent: function(noSectionUpdate) {
			var $controlsIcon, $controlsIconsPositionEl, parentModel, parentParams, paramsMap;
			parentModel = vc.shortcodes.get(this.model.get("parent_id")), _.isObject(parentModel) && (paramsMap = vc.getDefaultsAndDependencyMap(parentModel.get("shortcode")), parentParams = _.extend({}, paramsMap.defaults, parentModel.get("params")), $controlsIcon = this.$el.find(".vc_tta-controls-icon"), parentParams && !_.isUndefined(parentParams.c_icon) && 0 < parentParams.c_icon.length ? ($controlsIcon.length ? $controlsIcon.attr("data-vc-tta-controls-icon", parentParams.c_icon) : this.$el.find("[data-vc-tta-controls-icon-wrapper]").append($('<i class="vc_tta-controls-icon" data-vc-tta-controls-icon="' + parentParams.c_icon + '"></i>')), !_.isUndefined(parentParams.c_position) && 0 < parentParams.c_position.length && ($controlsIconsPositionEl = this.$el.find("[data-vc-tta-controls-icon-position]")).length && $controlsIconsPositionEl.attr("data-vc-tta-controls-icon-position", parentParams.c_position)) : ($controlsIcon.remove(), this.$el.find("[data-vc-tta-controls-icon-position]").attr("data-vc-tta-controls-icon-position", "")), !0 !== noSectionUpdate && parentModel.view && parentModel.view.sectionUpdated && parentModel.view.sectionUpdated(this.model))
		},
		setAsActiveSection: function(isActive) {
			this.model.set("isActiveSection", !!isActive)
		},
		isAsActiveSection: function() {
			return !!this.model.get("isActiveSection")
		},
		bindAccordionEvents: function() {
			var that = this;
			window.vc.frame_window.jQuery('[data-vc-target="[data-model-id=' + this.model.get("id") + ']"]').on("show.vc.accordion hide.vc.accordion", function(e) {
				that.setAsActiveSection("show" === e.type)
			})
		},
		destroy: function(e) {
			var parentModel, parentId;
			parentId = this.model.get("parent_id"), window.InlineShortcodeView_vc_tta_section.__super__.destroy.call(this, e), parentModel = vc.shortcodes.get(parentId), vc.shortcodes.where({
				parent_id: parentId
			}).length ? parentModel.view && parentModel.view.removeSection && parentModel.view.removeSection(this.model.get("id")) : parentModel.destroy()
		}
	})
}(window.jQuery),
function() {
	"use strict";
	
	function ttaMapChildEvents(model) {
		window.vc.events.on("shortcodes:vc_tta_section:add:parent:" + model.get("id"), function(model) {
			var active_tab_index, parent_model;
			return parent_model = window.vc.shortcodes.get(model.get("parent_id")), void 0 === (active_tab_index = parseInt(parent_model.getParam("active_section"), 10)) && (active_tab_index = 1), _.pluck(_.sortBy(window.vc.shortcodes.where({
				parent_id: parent_model.get("id")
			}), function(model) {
				return model.get("order")
			}), "id").indexOf(model.get("id")) === active_tab_index - 1 && model.set("isActiveSection", !0), model
		}), window.vc.events.on("shortcodes:vc_tta_section:clone:parent:" + model.get("id"), function(model) {
			window.vc.ttaSectionActivateOnClone && model.set("isActiveSection", !0), window.vc.ttaSectionActivateOnClone = !1
		})
	}
	window.vc.events.on("shortcodes:vc_tta_accordion:add", ttaMapChildEvents), window.vc.events.on("shortcodes:vc_tta_tabs:add", ttaMapChildEvents), window.vc.events.on("shortcodes:vc_tta_tour:add", ttaMapChildEvents), window.vc.events.on("shortcodes:vc_tta_pageable:add", ttaMapChildEvents)
}(),
function() {
	"use strict";
	window.InlineShortcodeView_vc_carousel = window.InlineShortcodeView_vc_images_carousel.extend({})
}(),
function($) {
	"use strict";
	window.vc.cloneMethod_vc_tab = function(data, model) {
		return data.params = _.extend({}, data.params), data.params.tab_id = vc_guid() + "-cl", _.isUndefined(model.get("active_before_cloned")) || (data.active_before_cloned = model.get("active_before_cloned")), data
	}, window.InlineShortcodeView_vc_tabs = window.InlineShortcodeView_vc_row.extend({
		events: {
			"click > :first > .vc_empty-element": "addElement",
			"click > :first > .wpb_wrapper > .ui-tabs-nav > li": "setActiveTab"
		},
		already_build: !1,
		active_model_id: !1,
		$tabsNav: !1,
		active: 0,
		render: function() {
			return _.bindAll(this, "stopSorting"), this.$tabs = this.$el.find("> .wpb_tabs"), window.InlineShortcodeView_vc_tabs.__super__.render.call(this), this.buildNav(), this
		},
		buildNav: function() {
			var $nav = this.tabsControls();
			this.$tabs.find('> .wpb_wrapper > .vc_element[data-tag="vc_tab"]').each(function(key) {
				$("li:eq(" + key + ")", $nav).attr("data-m-id", $(this).data("model-id"))
			})
		},
		changed: function() {
			this.allowAddControlOnEmpty() && 0 === this.$el.find(".vc_element[data-tag]").length ? this.$el.addClass("vc_empty").find("> :first > div").addClass("vc_empty-element") : this.$el.removeClass("vc_empty").find("> :first > div").removeClass("vc_empty-element"), this.setSorting()
		},
		setActiveTab: function(e) {
			var $tab = $(e.currentTarget);
			this.active_model_id = $tab.data("m-id")
		},
		tabsControls: function() {
			return this.$tabsNav ? this.$tabsNav : this.$tabsNav = this.$el.find(".wpb_tabs_nav")
		},
		buildTabs: function(active_model) {
			if (active_model && (this.active_model_id = active_model.get("id"), this.active = this.tabsControls().find("[data-m-id=" + this.active_model_id + "]").index()), !1 === this.active_model_id) {
				var active_el = this.tabsControls().find("li:first");
				this.active = active_el.index(), this.active_model_id = active_el.data("m-id")
			}
			this.checkCount() || window.vc.frame_window.vc_iframe.buildTabs(this.$tabs, this.active)
		},
		checkCount: function() {
			return this.$tabs.find('> .wpb_wrapper > .vc_element[data-tag="vc_tab"]').length != this.$tabs.find("> .wpb_wrapper > .vc_element.vc_vc_tab").length
		},
		beforeUpdate: function() {
			this.$tabs.find(".wpb_tabs_heading").remove(), window.vc.frame_window.vc_iframe.destroyTabs(this.$tabs)
		},
		updated: function() {
			window.InlineShortcodeView_vc_tabs.__super__.updated.call(this), this.$tabs.find(".wpb_tabs_nav:first").remove(), this.buildNav(), window.vc.frame_window.vc_iframe.buildTabs(this.$tabs), this.setSorting()
		},
		rowsColumnsConverted: function() {
			_.each(window.vc.shortcodes.where({
				parent_id: this.model.get("id")
			}), function(model) {
				model.view.rowsColumnsConverted && model.view.rowsColumnsConverted()
			})
		},
		addTab: function(model) {
			if (this.updateIfExistTab(model)) return !1;
			var $control = this.buildControlHtml(model);
			return model.get("cloned") && this.tabsControls().find("[data-m-id=" + model.get("cloned_from").id + "]").length ? model.get("cloned_appended") || ($control.appendTo(this.tabsControls()), model.set("cloned_appended", !0)) : $control.appendTo(this.tabsControls()), this.changed(), !0
		},
		cloneTabAfter: function(model) {
			this.$tabs.find("> .wpb_wrapper > .wpb_tabs_nav > div").remove(), this.buildTabs(model)
		},
		updateIfExistTab: function(model) {
			var $tab = this.tabsControls().find("[data-m-id=" + model.get("id") + "]");
			return !!$tab.length && ($tab.attr("aria-controls", "tab-" + model.getParam("tab_id")).find("a").attr("href", "#tab-" + model.getParam("tab_id")).text(model.getParam("title")), !0)
		},
		buildControlHtml: function(model) {
			model.get("params");
			var $tab = $('<li data-m-id="' + model.get("id") + '"><a href="#tab-' + model.getParam("tab_id") + '"></a></li>');
			return $tab.data("model", model), $tab.find("> a").text(model.getParam("title")), $tab
		},
		addElement: function(e) {
			e && e.preventDefault && e.preventDefault(), (new window.vc.ShortcodesBuilder).create({
				shortcode: "vc_tab",
				params: {
					tab_id: vc_guid() + "-" + this.tabsControls().find("li").length,
					title: this.getDefaultTabTitle()
				},
				parent_id: this.model.get("id")
			}).render()
		},
		getDefaultTabTitle: function() {
			return window.i18nLocale.tab
		},
		setSorting: function() {
			this.hasUserAccess() && window.vc.frame_window.vc_iframe.setTabsSorting(this)
		},
		stopSorting: function(event, ui) {
			this.tabsControls().find("> li").each(function(key, value) {
				$(this).data("model").save({
					order: key
				}, {
					silent: !0
				})
			})
		},
		placeElement: function($view, activity) {
			var model = window.vc.shortcodes.get($view.data("modelId"));
			model && model.get("place_after_id") ? ($view.insertAfter(window.vc.$page.find("[data-model-id=" + model.get("place_after_id") + "]")), model.unset("place_after_id")) : $view.insertAfter(this.tabsControls()), this.changed()
		},
		removeTab: function(model) {
			if (1 === window.vc.shortcodes.where({
				parent_id: this.model.get("id")
			}).length) return this.model.destroy();
			var $tab = this.tabsControls().find("[data-m-id=" + model.get("id") + "]"),
			index = $tab.index();
			this.tabsControls().find("[data-m-id]:eq(" + (index + 1) + ")").length ? window.vc.frame_window.vc_iframe.setActiveTab(this.$tabs, index + 1) : this.tabsControls().find("[data-m-id]:eq(" + (index - 1) + ")").length ? window.vc.frame_window.vc_iframe.setActiveTab(this.$tabs, index - 1) : window.vc.frame_window.vc_iframe.setActiveTab(this.$tabs, 0), $tab.remove()
		},
		clone: function(e) {
			_.each(window.vc.shortcodes.where({
				parent_id: this.model.get("id")
			}), function(model) {
				model.set("active_before_cloned", this.active_model_id === model.get("id"))
			}, this), window.InlineShortcodeView_vc_tabs.__super__.clone.call(this, e)
		}
	})
}(window.jQuery),
function() {
	"use strict";
	window.InlineShortcodeView_vc_tour = window.InlineShortcodeView_vc_tabs.extend({
		render: function() {
			return _.bindAll(this, "stopSorting"), this.$tabs = this.$el.find("> .wpb_tour"), window.InlineShortcodeView_vc_tabs.__super__.render.call(this), this.buildNav(), this
		},
		beforeUpdate: function() {
			this.$tabs.find(".wpb_tour_heading,.wpb_tour_next_prev_nav").remove(), vc.frame_window.vc_iframe.destroyTabs(this.$tabs)
		},
		updated: function() {
			this.$tabs.find(".wpb_tour_next_prev_nav").appendTo(this.$tabs), window.InlineShortcodeView_vc_tour.__super__.updated.call(this)
		}
	})
}(),
function() {
	"use strict";
	window.InlineShortcodeView_vc_tab = window.InlineShortcodeViewContainerWithParent.extend({
		controls_selector: "#vc_controls-template-vc_tab",
		render: function() {
			var tab_id, active, params;
			return params = this.model.get("params"), window.InlineShortcodeView_vc_tab.__super__.render.call(this), this.$tab = this.$el.find("> :first"), _.isEmpty(params.tab_id) ? (params.tab_id = vc_guid() + "-" + Math.floor(11 * Math.random()), this.model.save("params", params), tab_id = "tab-" + params.tab_id, this.$tab.attr("id", tab_id)) : tab_id = this.$tab.attr("id"), this.$el.attr("id", tab_id), this.$tab.attr("id", tab_id + "-real"), this.$tab.find(".vc_element[data-tag]").length || this.$tab.empty(), this.$el.addClass("ui-tabs-panel wpb_ui-tabs-hide"), this.$tab.removeClass("ui-tabs-panel wpb_ui-tabs-hide"), this.parent_view && this.parent_view.addTab && (this.parent_view.addTab(this.model) || this.$el.removeClass("wpb_ui-tabs-hide")), active = this.doSetAsActive(), this.parent_view.buildTabs(active), this
		},
		allowAddControl: function() {
			return vc_user_access().shortcodeAll("vc_tab")
		},
		doSetAsActive: function() {
			var active_before_cloned = this.model.get("active_before_cloned");
			return (!this.model.get("from_content") && !this.model.get("default_content") && _.isUndefined(active_before_cloned) || !_.isUndefined(active_before_cloned) && (this.model.unset("active_before_cloned"), !0 === active_before_cloned)) && this.model
		},
		removeView: function(model) {
			window.InlineShortcodeView_vc_tab.__super__.removeView.call(this, model);
			this.parent_view && this.parent_view.removeTab && this.parent_view.removeTab(model)
		},
		clone: function(e) {
			var builder;
			e && e.preventDefault && e.preventDefault(), e && e.stopPropagation && e.stopPropagation(), vc.clone_index /= 10, this.model.clone().get("params"), builder = new vc.ShortcodesBuilder;
			var new_model = vc.CloneModel(builder, this.model, this.model.get("parent_id")),
			that = (this.parent_view.active_model_id, this);
			builder.render(function() {
				that.parent_view.cloneTabAfter && that.parent_view.cloneTabAfter(new_model)
			})
		},
		rowsColumnsConverted: function() {
			_.each(vc.shortcodes.where({
				parent_id: this.model.get("id")
			}), function(model) {
				model.view.rowsColumnsConverted && model.view.rowsColumnsConverted()
			})
		}
	})
}(),
function($) {
	"use strict";
	window.InlineShortcodeView_vc_accordion = window.InlineShortcodeView_vc_row.extend({
		events: {
			"click > .wpb_accordion > .vc_empty-element": "addElement"
		},
		render: function() {
			return _.bindAll(this, "stopSorting"), this.$accordion = this.$el.find("> .wpb_accordion"), window.InlineShortcodeView_vc_accordion.__super__.render.call(this), this
		},
		changed: function() {
			this.allowAddControlOnEmpty() && 0 === this.$el.find(".vc_element[data-tag]").length ? this.$el.addClass("vc_empty").find("> :first").addClass("vc_empty-element") : (this.allowAddControlOnEmpty() && this.$el.removeClass("vc_empty").find("> .vc_empty-element").removeClass("vc_empty-element"), this.setSorting())
		},
		buildAccordion: function(active_model) {
			var active = !1;
			active_model && (active = this.$accordion.find("[data-model-id=" + active_model.get("id") + "]").index()), vc.frame_window.vc_iframe.buildAccordion(this.$accordion, active)
		},
		setSorting: function() {
			vc.frame_window.vc_iframe.setAccordionSorting(this)
		},
		beforeUpdate: function() {
			this.$el.find(".wpb_accordion_heading").remove(), window.InlineShortcodeView_vc_accordion.__super__.beforeUpdate.call(this)
		},
		stopSorting: function() {
			this.$accordion.find("> .wpb_accordion_wrapper > .vc_element[data-tag]").each(function() {
				vc.shortcodes.get($(this).data("modelId")).save({
					order: $(this).index()
				}, {
					silent: !0
				})
			})
		},
		addElement: function(e) {
			e && e.preventDefault && e.preventDefault(), (new vc.ShortcodesBuilder).create({
				shortcode: "vc_accordion_tab",
				params: {
					title: window.i18nLocale.section
				},
				parent_id: this.model.get("id")
			}).render()
		},
		rowsColumnsConverted: function() {
			_.each(vc.shortcodes.where({
				parent_id: this.model.get("id")
			}), function(model) {
				model.view.rowsColumnsConverted && model.view.rowsColumnsConverted()
			})
		}
	})
}(window.jQuery),
function() {
	"use strict";
	window.InlineShortcodeView_vc_accordion_tab = window.InlineShortcodeView_vc_tab.extend({
		events: {
			"click > .vc_controls .vc_element .vc_control-btn-delete": "destroy",
			"click > .vc_controls .vc_element .vc_control-btn-edit": "edit",
			"click > .vc_controls .vc_element .vc_control-btn-clone": "clone",
			"click > .vc_controls .vc_element .vc_control-btn-prepend": "prependElement",
			"click > .vc_controls .vc_control-btn-append": "appendElement",
			"click > .vc_controls .vc_parent .vc_control-btn-delete": "destroyParent",
			"click > .vc_controls .vc_parent .vc_control-btn-edit": "editParent",
			"click > .vc_controls .vc_parent .vc_control-btn-clone": "cloneParent",
			"click > .vc_controls .vc_parent .vc_control-btn-prepend": "addSibling",
			"click > .wpb_accordion_section > .vc_empty-element": "appendElement",
			"click > .vc_controls .vc_control-btn-switcher": "switchControls",
			mouseenter: "resetActive",
			mouseleave: "holdActive"
		},
		changed: function() {
			this.allowAddControlOnEmpty() && 0 === this.$el.find(".vc_element[data-tag]").length ? (this.$el.addClass("vc_empty"), this.content().addClass("vc_empty-element")) : (this.$el.removeClass("vc_empty"), this.content().removeClass("vc_empty-element"))
		},
		render: function() {
			return window.InlineShortcodeView_vc_tab.__super__.render.call(this), this.content().find(".vc_element[data-tag]").length || this.content().empty(), this.parent_view.buildAccordion(!this.model.get("from_content") && !this.model.get("default_content") && this.model), this
		},
		rowsColumnsConverted: function() {
			_.each(vc.shortcodes.where({
				parent_id: this.model.get("id")
			}), function(model) {
				model.view.rowsColumnsConverted && model.view.rowsColumnsConverted()
			})
		},
		destroy: function(e) {
			var parent_id = this.model.get("parent_id");
			window.InlineShortcodeView_vc_accordion_tab.__super__.destroy.call(this, e), vc.shortcodes.where({
				parent_id: parent_id
			}).length || vc.shortcodes.get(parent_id).destroy()
		},
		allowAddControl: function() {
			return vc_user_access().shortcodeAll("vc_accordion_tab")
		}
	})
}(), _.isUndefined(vc) && (window.vc = {}),
function($) {
	"use strict";
	vc.createPreLoader = function() {
		vc.$preloader = $("#vc_preloader").show()
	}, vc.removePreLoader = function() {
		vc.$preloader && vc.$preloader.hide()
	}, vc.createOverlaySpinner = function() {
		vc.$overlaySpinner = $("#vc_overlay_spinner").show()
	}, vc.removeOverlaySpinner = function() {
		vc.$overlaySpinner && vc.$overlaySpinner.hide()
	}, vc.createPreLoader(), vc.$frame_wrapper = $("#vc_inline-frame-wrapper"), vc.$frame = $('<iframe src="' + window.vc_iframe_src + '" scrolling="auto" style="width: 100%;" id="vc_inline-frame"></iframe>'), vc.$frame.appendTo(vc.$frame_wrapper), vc.build = function() {
		if (!vc.loaded) {
			vc.loaded = !0, vc.map = window.vc_mapper, $("#wpadminbar").remove(), $("#screen-meta-links, #screen-meta").hide();
			var $body = $("body");
			$body.attr("data-vc", !0), vc.is_mobile = 0 < $("body.mobile").length, vc.title = $("#vc_title-saved").val(), vc.add_element_block_view = new vc.AddElementUIPanelFrontendEditor({
				el: "#vc_ui-panel-add-element"
			}), vc.edit_element_block_view = new vc.EditElementUIPanel({
				el: "#vc_ui-panel-edit-element"
			}), vc.post_settings_view = new vc.PostSettingsUIPanelFrontendEditor({
				el: "#vc_ui-panel-post-settings"
			}), vc.templates_editor_view = new vc.TemplatesEditorPanelView({
				el: "#vc_templates-editor"
			}), vc.templates_panel_view = new vc.TemplateWindowUIPanelFrontendEditor({
				el: "#vc_ui-panel-templates"
			}), vc.pages_templates_panel_view = new vc.PagesTemplateWindowUIPanelFrontendEditor({
				el: "#vc_ui-panel-pages-templates"
			}), vc.preset_panel_view = new vc.PresetSettingsUIPanelFrontendEditor({
				el: "#vc_ui-panel-preset",
				frontEnd: !0
			}), vc.app = new vc.View, vc.buildRelevance(), $body.hasClass("vc_responsive_disabled") && (vc.responsive_disabled = !0), vc.setFrameSize("100%"), vc.frame = new vc.FrameView({
				el: $(vc.$frame.get(0).contentWindow.document).find("body").get(0)
			}), vc.app.render(), vc.post_shortcodes = vc.frame_window.vc_post_shortcodes, vc.builder.buildFromContent(), void 0 !== window.vc.undoRedoApi && _.defer(function() {
				vc.undoRedoApi.setZeroState(vc.builder.getContent())
			}), vc.removePreLoader(), vc.$frame.get(0).contentWindow.vc_js && vc.$frame.get(0).contentWindow.vc_js(), $(window).trigger("vc_build")
		}
	}, vc.$frame.on("load", function() {
		vc.loaded || window.setTimeout(function() {
			vc.build()
		}, 50)
	})
}(window.jQuery),
function($) {
	"use strict";
	var vcPointerMessage;
	(vcPointerMessage = function(target, pointerOptions, texts) {
		this.target = target, this.$pointer = null, this.texts = texts, this.pointerOptions = pointerOptions, this.init()
	}).prototype = {
		init: function() {
			_.bindAll(this, "openedEvent", "reposition")
		},
		show: function() {
			this.$pointer = $(this.target), this.$pointer.data("vcPointerMessage", this), this.pointerOptions.opened = this.openedEvent, this.$pointer.addClass("vc-with-vc-pointer").pointer(this.pointerOptions).pointer("open"), $(window).on("resize.vcPointer", this.reposition)
		},
		domButtonsWrapper: function() {
			return $('<div class="vc_wp-pointer-controls" />')
		},
		domCloseBtn: function() {
			return $('<a class="vc_pointer-close close">' + this.texts.finish + "</a>")
		},
		domNextBtn: function() {
			return $('<button class="button button-primary button-large vc_wp-pointers-next">' + this.texts.next + '<i class="vc_pointer-icon"></i></button>')
		},
		domPrevBtn: function() {
			return $('<button class="button button-primary button-large vc_wp-pointers-prev"><i class="vc_pointer-icon"></i>' + this.texts.prev + "</button> ")
		},
		openedEvent: function(a, b) {
			var offset = b.pointer.offset();
			b.pointer.css("z-index", 1e5), offset && offset.top && $("body").scrollTop(80 < offset.top ? offset.top - 80 : 0)
		},
		reposition: function() {
			this.$pointer.pointer("reposition")
		},
		close: function() {
			this.$pointer && this.$pointer.removeClass("vc-with-vc-pointer").pointer("close"), $(window).off("resize.vcPointer")
		}
	}, window.vcPointerMessage = vcPointerMessage
}(window.jQuery),
function($) {
	"use strict";
	var vcPointersController;
	(vcPointersController = function(Pointer, texts) {
		this.pointers = Pointer && Pointer.messages || [], this._texts = texts, this.pointerId = Pointer && Pointer.pointer_id ? Pointer.pointer_id : "", this.pointerData = {}, this._index = 0, this.messagesDismissed = !1, this.init()
	}).prototype = {
		init: function() {
			_.bindAll(this, "show", "clickEventClose", "clickEventNext", "clickEventPrev", "buttonsEvent"), this.build()
		},
		getPointer: function(index) {
			return this.pointerData = this.pointers[index] && this.pointers[index].target ? this.pointers[index] : null, this.pointerData && this.pointerData.options ? new vcPointerMessage(this.pointerData.target, this.buildOptions(this.pointerData.options), this._texts) : null
		},
		buildOptions: function(data) {
			return data.buttonsEvent && _.isFunction(window[data.buttonsEvent]) ? data.buttons = _.bind(window[data.buttonsEvent], this) : data.buttons = this.buttonsEvent, data.vcPointerController = this, data
		},
		build: function() {
			if (this.pointer = this.getPointer(this._index), vc.events.once("backendEditor.close", this.close, this), !this.pointer) return !1;
			this.setShowEventHandler()
		},
		show: function() {
			this.pointer.show(), this.setCloseEventHandler(), vc.events.trigger("vcPointer:show")
		},
		setShowEventHandler: function() {
			var showEvent;
			this.pointerData.showCallback && window[this.pointerData.showCallback] ? window[this.pointerData.showCallback].call(this) : this.pointerData.showEvent ? this.pointerData.showEvent.match(/\s/) ? 1 < (showEvent = this.pointerData.closeEvent.split(/\s+(.+)?/)).length && $(showEvent[1]).one(showEvent[0], this.show) : vc.events.once(this.pointerData.showEvent, this.show) : this.show()
		},
		setCloseEventHandler: function() {
			var closeEvent;
			this.pointerData.closeCallback && window[this.pointerData.closeCallback] ? window[this.pointerData.closeCallback].call(this) : this.pointerData.closeEvent ? this.pointerData.closeEvent.match(/\s/) ? (closeEvent = this.pointerData.closeEvent.split(/\s+(.+)?/), $(closeEvent[1] || this.$pointer).one(closeEvent[1] && closeEvent[0] ? closeEvent[0] : "click", this.clickEventNext)) : vc.events.once(this.pointerData.closeEvent, this.nextOnEvent, this) : this.pointer.$pointer && 0 < this.pointer.$pointer.length && $(this.pointer.$pointer).one("click", this.clickEventNext)
		},
		nextOnEvent: function() {
			this.close(), this.next()
		},
		next: function() {
			this._index++, this.build()
		},
		prev: function() {
			this._index--, this.build()
		},
		close: function() {
			this.pointer && (this.pointer.close(), this.pointerData = null, this.pointer = null, vc.events.trigger("vcPointer:close", this))
		},
		buttonsEvent: function() {
			var $closeBtn, $nextBtn, $prevBtn, $buttons;
			return $closeBtn = this.pointer.domCloseBtn(), $nextBtn = this.pointer.domNextBtn(), $prevBtn = this.pointer.domPrevBtn(), $closeBtn.bind("click.vcPointer", this.clickEventClose), $buttons = this.pointer.domButtonsWrapper().append($closeBtn), 0 < this._index && ($prevBtn.bind("click.vcPointer", this.clickEventPrev), $buttons.addClass("vc_wp-pointer-controls-prev").append($prevBtn)), this._index + 1 < this.pointers.length && ($nextBtn.bind("click.vcPointer", this.clickEventNext), $buttons.addClass("vc_wp-pointer-controls-next").append($nextBtn)), $buttons
		},
		clickEventClose: function() {
			this.close(), this.dismissMessages()
		},
		clickEventNext: function() {
			this.close(), this.next()
		},
		clickEventPrev: function() {
			this.close(), this.prev()
		},
		dismissMessages: function() {
			if (this.messagesDismissed) return !1;
			$.post(window.ajaxurl, {
				pointer: this.pointerId,
				action: "dismiss-wp-pointer"
			}), this.messagesDismissed = !0
		}
	}, window.vcPointersController = vcPointersController
}(window.jQuery),
function($) {
	"use strict";
	vc.events.on("app.render", function() {
		window.vcPointer && window.vcPointer.pointers && window.vcPointer.pointers.length && _.each(vcPointer.pointers, function(pointer) {
			new vcPointersController(pointer, vcPointer.texts)
		}, this)
	}), vc.events.on("vcPointer:show", function() {
		vc.app.disableFixedNav = !0
	}), vc.events.on("vcPointer:close", function() {
		vc.app.disableFixedNav = !1
	}), window.vcPointersEditorsTourEvents = function() {
		var $close_btn;
		return ($close_btn = this.pointer.domCloseBtn()).bind("click.vcPointer", this.clickEventClose), $close_btn
	}, window.vcPointersShowOnContentElementControls = function() {
		this.pointer && $(this.pointer.target).length ? ($(this.pointer.target).parent().addClass("vc-with-vc-pointer-controls"), this.show(), $("#wpb_visual_composer").one("click", function() {
			$(".vc-with-vc-pointer-controls").removeClass("vc-with-vc-pointer-controls")
		})) : vc.events.once("shortcodes:add", vcPointersShowOnContentElementControls, this)
	}, window.vcPointersSetInIFrame = function() {
		this.pointerData && vc.frame_window.jQuery(this.pointerData.target).length ? (this.pointer = new vc.frame_window.vcPointerMessage(this.pointerData.target, this.buildOptions(this.pointerData.options), this._texts), this.show(), this.pointer.$pointer.closest(".vc_controls").addClass("vc-with-vc-pointer-controls")) : vc.events.once("shortcodeView:ready", vcPointersSetInIFrame, this)
	}, window.vcPointersCloseInIFrame = function() {
		var controller, _$;
		controller = this, (_$ = vc.frame_window.jQuery)("body").one("click", function() {
			_$(".vc-with-vc-pointer-controls").removeClass("vc-with-vc-pointer-controls"), controller.nextOnEvent()
		})
	}
}(window.jQuery),
function() {
	"use strict";
	var undo_redo_core, undo_redo_api;
	undo_redo_core = {
		stack: [],
		stackPosition: 0,
		stackHash: JSON.stringify(""),
		zeroState: null,
		locked: !1,
		add: function(data) {
			null === this.zeroState && this.setZeroState(data), this.stackHash !== JSON.stringify(data) && (this.can("redo") && (this.stack = this.stack.slice(0, this.stackPosition)), this.stack.push(data), this.stackPosition = this.stack.length, this.stackHash = JSON.stringify(this.get()))
		},
		can: function(what) {
			var result = !1;
			return "undo" === what ? result = 0 < this.stack.length && 0 < this.stackPosition : "redo" === what && (result = 0 < this.stack.length && this.stackPosition < this.stack.length), result
		},
		undo: function() {
			this.can("undo") && (--this.stackPosition, this.stackHash = JSON.stringify(this.get()))
		},
		redo: function() {
			this.can("redo") && (this.stackPosition += 1, this.stackHash = JSON.stringify(this.get()))
		},
		set: function(index) {
			return this.stackPosition < index && (this.stack = this.stack.slice(index - this.stackPosition), this.stackHash = JSON.stringify(this.get()), !0)
		},
		get: function() {
			return this.stackPosition < 1 ? this.zeroState : this.stack[this.stackPosition - 1]
		},
		setZeroState: function(data) {
			this.zeroState = data, this.stackHash = JSON.stringify(this.get())
		}
	}, undo_redo_api = {
		add: function(document) {
			!0 !== undo_redo_core.locked && (undo_redo_core.add(document), window.vc.events.trigger("undoredo:add", document))
		},
		getCurrentPosition: function() {
			return undo_redo_core.stackPosition
		},
		undo: function() {
			return undo_redo_core.undo(), window.vc.events.trigger("undoredo:undo"), undo_redo_api.get()
		},
		redo: function() {
			return undo_redo_core.redo(), window.vc.events.trigger("undoredo:redo"), undo_redo_api.get()
		},
		get: function() {
			return undo_redo_core.get()
		},
		canUndo: function() {
			return !this.isLocked() && undo_redo_core.can("undo")
		},
		canRedo: function() {
			return !this.isLocked() && undo_redo_core.can("redo")
		},
		setZeroState: function(data) {
			null === undo_redo_core.zeroState ? this.add(data) : undo_redo_core.setZeroState(data)
		},
		lock: function() {
			undo_redo_core.locked = !0, window.vc.events.trigger("undoredo:lock")
		},
		unlock: function() {
			undo_redo_core.locked = !1, window.vc.events.trigger("undoredo:unlock")
		},
		isLocked: function() {
			return !0 === undo_redo_core.locked
		}
	}, void 0 === window.vc && (window.vc = {}), window.vc.undoRedoApi = undo_redo_api
}(),
function($) {
	"use strict";
	$(function() {
		var $undoControl, $redoControl, renderNewContent, checkControls;
		window.vc && window.vc.events && ($undoControl = $("#vc_navbar-undo"), $redoControl = $("#vc_navbar-redo"), checkControls = function() {
			$undoControl.attr("disabled", !window.vc.undoRedoApi.canUndo()), $redoControl.attr("disabled", !window.vc.undoRedoApi.canRedo())
		}, renderNewContent = function(content) {
			for (vc.createOverlaySpinner(); vc.shortcodes.models.length;) vc.shortcodes.models[0].destroy();
			vc.shortcodes.reset([], {
				silent: !0
			}), _.delay(function() {
				var models;
				(models = content.length ? vc.builder.parse([], content) : []).length && _.each(models, function(model) {
					vc.builder.create(model)
				}), vc.builder.render(function() {
					_.delay(function() {
						window.vc.undoRedoApi.unlock(), vc.removeOverlaySpinner()
					}, 100)
				})
			}, 50)
		}, window.vc.events.on("undoredo:add undoredo:undo undoredo:redo undoredo:lock undoredo:unlock", checkControls), $undoControl.on("click.vc-undo", function(e) {
			if ($(this).is("[disabled]") || window.vc.undoRedoApi.isLocked()) e && e.preventDefault && e.preventDefault();
			else {
				window.vc.undoRedoApi.lock();
				var newContent = window.vc.undoRedoApi.undo();
				renderNewContent(newContent)
			}
		}), $redoControl.on("click.vc-redo", function(e) {
			if ($(this).is("[disabled]") || window.vc.undoRedoApi.isLocked()) e && e.preventDefault && e.preventDefault();
			else {
				window.vc.undoRedoApi.lock();
				var newContent = window.vc.undoRedoApi.redo();
				renderNewContent(newContent)
			}
		}))
	})
}(window.jQuery);