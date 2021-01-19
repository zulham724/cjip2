	/*
	 * VARIABLES
	 * Description: All Global Vars
	 */
	// Impacts the responce rate of some of the responsive elements (lower value affects CPU but improves speed)
	$.throttle_delay = 350;
	
	// The rate at which the menu expands revealing child elements on click
	$.menu_speed = 235;
	
	// Note: You will also need to change this variable in the "variable.less" file.
	$.navbar_height = 49; 

	/*
	 * APP DOM REFERENCES
	 * Description: Obj DOM reference, please try to avoid changing these
	 */	
	$.root_ = $('body');
	$.left_panel = $('#left-panel');
	$.shortcut_dropdown = $('#shortcut');
	$.bread_crumb = $('#ribbon ol.breadcrumb');

    // desktop or mobile
    $.device = null;

	/*
	 * APP CONFIGURATION
	 * Description: Enable / disable certain theme features here
	 */		
	$.navAsAjax = true; // Your left nav in your app will no longer fire ajax calls
	
	// Please make sure you have included "jarvis.widget.js" for this below feature to work
	$.enableJarvisWidgets = true;
	
	// Warning: Enabling mobile widgets could potentially crash your webApp if you have too many 
	// 			widgets running at once (must have $.enableJarvisWidgets = true)
	$.enableMobileWidgets = false;

	


	/*
	 * DETECT MOBILE DEVICES
	 * Description: Detects mobile device - if any of the listed device is detected
	 * a class is inserted to $.root_ and the variable $.device is decleard. 
	 */	
	
	/* so far this is covering most hand held devices */
	var ismobile = (/iphone|ipad|ipod|android|blackberry|mini|windows\sce|palm/i.test(navigator.userAgent.toLowerCase()));

	if (!ismobile) {
		// Desktop
		$.root_.addClass("desktop-detected");
		$.device = "desktop";
	} else {
		// Mobile
		$.root_.addClass("mobile-detected");
		$.device = "mobile";
		
		// Removes the tap delay in idevices
		// dependency: js/plugin/fastclick/fastclick.js 
		// FastClick.attach(document.body);
	}

/* ~ END: CHECK MOBILE DEVICE */

/*
 * DOCUMENT LOADED EVENT
 * Description: Fire when DOM is ready
 */

$(document).ready(function() {
	/*
	 * Fire tooltips
	 */
	if ($("[rel=tooltip]").length) {
		$("[rel=tooltip]").tooltip();
	}

	
	if(window.isLogin) {
		do_idle(window.APLIKASI_TIMEOUT_MINUTES);
	}
	/*setTimeout(function () {         
			 cek();
			 alert("dasd");                       
		  }, 2000);*/

	//TODO: was moved from window.load due to IE not firing consist
	nav_page_height()

	// INITIALIZE LEFT NAV
	if (!null) {
		$('nav ul').jarvismenu({
			accordion : true,
			speed : $.menu_speed,
			closedSign : '<em class="fa fa-expand-o"></em>',
			openedSign : '<em class="fa fa-collapse-o"></em>'
		});
	} else {
		alert("Error - menu anchor does not exist");
	}

	// COLLAPSE LEFT NAV
	$('.minifyme').click(function(e) {
		$('body').toggleClass("minified");
		$(this).effect("highlight", {}, 500);
		e.preventDefault();
	});

	// HIDE MENU
	$('#hide-menu >:first-child > a').click(function(e) {
		$('body').toggleClass("hidden-menu");
		e.preventDefault();
	});
	
	$('#show-shortcut').click(function(e) {
		if ($.shortcut_dropdown.is(":visible")) {
			shortcut_buttons_hide();
		} else {
			shortcut_buttons_show();
		}
		e.preventDefault();
	});

	$('#tampil-berkas').click(function(e) {
		if ($.shortcut_dropdown.is(":visible")) {
			shortcut_buttons_hide();
		} else {
			shortcut_buttons_show();
		}
		e.preventDefault();
	});

	// SHOW & HIDE MOBILE SEARCH FIELD
	$('#search-mobile').click(function() {
		$.root_.addClass('search-mobile');
	});

	$('#cancel-search-js').click(function() {
		$.root_.removeClass('search-mobile');
	});

	// ACTIVITY
	// ajax drop
	$('#activity').click(function(e) {
		var $this = $(this);

		if ($this.find('.badge').hasClass('bg-color-red')) {
			$this.find('.badge').removeClassPrefix('bg-color-');
			$this.find('.badge').text("0");
			// console.log("Ajax call for activity")
		}

		if (!$this.next('.ajax-dropdown').is(':visible')) {
			$this.next('.ajax-dropdown').fadeIn(150);
			$this.addClass('active');
		} else {
			$this.next('.ajax-dropdown').fadeOut(150);
			$this.removeClass('active')
		}

		var mytest = $this.next('.ajax-dropdown').find('.btn-group > .active > input').attr('id');
		//console.log(mytest)

		e.preventDefault();
	});

	$('input[name="activity"]').change(function() {
		//alert($(this).val())
		var $this = $(this);

		url = $this.attr('id');
		container = $('.ajax-notifications');

		loadURL(url, container);

	});

	$(document).mouseup(function(e) {
		if (!$('.ajax-dropdown').is(e.target)// if the target of the click isn't the container...
		&& $('.ajax-dropdown').has(e.target).length === 0) {
			$('.ajax-dropdown').fadeOut(150);
			$('.ajax-dropdown').prev().removeClass("active")
		}
	});

	$('button[data-loading-text]').on('click', function() {
		var btn = $(this)
		btn.button('loading')
		setTimeout(function() {
			btn.button('reset')
		}, 3000)
	});

	// NOTIFICATION IS PRESENT

	function notification_check() {
		$this = $('#activity > .badge');

		if (parseInt($this.text()) > 0) {
			$this.addClass("bg-color-red bounceIn animated")
		}
	}

	notification_check();

	// RESET WIDGETS
	$('#refresh').click(function(e) {
		
		var $this = $(this);
		
		$.widresetMSG = $this.data('reset-msg');
		
		$.SmartMessageBox({
			title : "<i class='fa fa-refresh' style='color:green'>Membersihkan Pengaturan Lokal</i> ",
			content : $.widresetMSG || "Apakah Anda ingin MERESET pengaturan widgets di Aplikasi ini?",
			buttons : '[Tidak][Ya]'
		}, function(ButtonPressed) {
			if (ButtonPressed == "Ya" && localStorage) {
				localStorage.clear();
				location.reload();
			}

		});
		e.preventDefault();
	});

	// LOGOUT BUTTON
	$('#logout a').click(function(e) {
		//get the link
		var $this = $(this);
		$.loginURL = $this.attr('href');
		$.logoutMSG = $this.data('logout-msg');

		// ask verification
		$.SmartMessageBox({
			title : "<i class='fa fa-sign-out txt-color-orangeDark'></i> Logout <span class='txt-color-orangeDark'><strong>" + $('#show-shortcut').text() + "</strong></span> ?",
			content : $.logoutMSG || "Terima Kasih, telah menggunakan aplikasi ini. Klik Ya untuk logout.",
			buttons : '[Tidak][Ya]'

		}, function(ButtonPressed) {
			if (ButtonPressed == "Ya") {
				$.root_.addClass('animated fadeOutUp');
				setTimeout(logout, 1000)
			}

		});
		e.preventDefault();
	});

	/*
	 * LOGOUT ACTION
	 */

	function logout() {
		window.location = $.loginURL;
	}

	/*
	* SHORTCUTS
	*/

	// SHORT CUT (buttons that appear when clicked on user name)
	$.shortcut_dropdown.find('a').click(function(e) {

		e.preventDefault();

		window.location = $(this).attr('href');
		setTimeout(shortcut_buttons_hide, 300);

	});

	// SHORTCUT buttons goes away if mouse is clicked outside of the area
	$(document).mouseup(function(e) {
		if (!$.shortcut_dropdown.is(e.target)// if the target of the click isn't the container...
		&& $.shortcut_dropdown.has(e.target).length === 0) {
			shortcut_buttons_hide()
		}
	});

	// SHORTCUT ANIMATE HIDE
	function shortcut_buttons_hide() {
		$.shortcut_dropdown.animate({
			height : "hide"
		}, 300, "easeOutCirc");
		$.root_.removeClass('shortcut-on');

	}

	// SHORTCUT ANIMATE SHOW
	function shortcut_buttons_show() {
		$.shortcut_dropdown.animate({
			height : "show"
		}, 200, "easeOutCirc")
		$.root_.addClass('shortcut-on');
	}

});

/*
 * RESIZER WITH THROTTLE
 * Source: http://benalman.com/code/projects/jquery-resize/examples/resize/
 */

(function($, window, undefined) {

	var elems = $([]), jq_resize = $.resize = $.extend($.resize, {}), timeout_id, str_setTimeout = 'setTimeout', str_resize = 'resize', str_data = str_resize + '-special-event', str_delay = 'delay', str_throttle = 'throttleWindow';

	jq_resize[str_delay] = $.throttle_delay;

	jq_resize[str_throttle] = true;

	$.event.special[str_resize] = {

		setup : function() {
			if (!jq_resize[str_throttle] && this[str_setTimeout]) {
				return false;
			}

			var elem = $(this);
			elems = elems.add(elem);
			$.data(this, str_data, {
				w : elem.width(),
				h : elem.height()
			});
			if (elems.length === 1) {
				loopy();
			}
		},
		teardown : function() {
			if (!jq_resize[str_throttle] && this[str_setTimeout]) {
				return false;
			}

			var elem = $(this);
			elems = elems.not(elem);
			elem.removeData(str_data);
			if (!elems.length) {
				clearTimeout(timeout_id);
			}
		},

		add : function(handleObj) {
			if (!jq_resize[str_throttle] && this[str_setTimeout]) {
				return false;
			}
			var old_handler;

			function new_handler(e, w, h) {
				var elem = $(this), data = $.data(this, str_data);
				data.w = w !== undefined ? w : elem.width();
				data.h = h !== undefined ? h : elem.height();

				old_handler.apply(this, arguments);
			};
			if ($.isFunction(handleObj)) {
				old_handler = handleObj;
				return new_handler;
			} else {
				old_handler = handleObj.handler;
				handleObj.handler = new_handler;
			}
		}
	};

	function loopy() {
		timeout_id = window[str_setTimeout](function() {
			elems.each(function() {
				var elem = $(this), width = elem.width(), height = elem.height(), data = $.data(this, str_data);
				if (width !== data.w || height !== data.h) {
					elem.trigger(str_resize, [data.w = width, data.h = height]);
				}

			});
			loopy();

		}, jq_resize[str_delay]);

	};

})(jQuery, this);

/*
* NAV OR #LEFT-BAR RESIZE DETECT
* Description: changes the page min-width of #CONTENT and NAV when navigation is resized.
* This is to counter bugs for min page width on many desktop and mobile devices.
* Note: This script uses JSthrottle technique so don't worry about memory/CPU usage
*/

// Fix page and nav height
function nav_page_height() {
	var setHeight = $('#main').height();
	//menuHeight = $.left_panel.height();
	
	var windowHeight = $(window).height() - $.navbar_height;
	//set height

	if (setHeight > windowHeight) {// if content height exceedes actual window height and menuHeight
		$.left_panel.css('min-height', setHeight + 'px');
		$.root_.css('min-height', setHeight + $.navbar_height + 'px');

	} else {
		$.left_panel.css('min-height', windowHeight + 'px');
		$.root_.css('min-height', windowHeight + 'px');
	}
}

//CEILING//
function ceiling(number, significance) {
return ( !isNaN(number) && !isNaN(significance) ) ? (Math.ceil(number/significance)*significance) : 0;
}
//CEILING//


$('#main').resize(function() {
	nav_page_height();
	check_if_mobile_width();
})

$('nav').resize(function() {
	nav_page_height();
})

function check_if_mobile_width() {
	if ($(window).width() < 979) {
		$.root_.addClass('mobile-view-activated')
	} else if ($.root_.hasClass('mobile-view-activated')) {
		$.root_.removeClass('mobile-view-activated');
	}
}

function check_if_mobile_width() {
	if ($(window).width() < 480) {
		$.root_.removeClass('fixed-header');
		$.root_.removeClass('fixed-ribbon');
		$.root_.addClass('mobile-view-activated');
	} else if ($.root_.hasClass('mobile-view-activated')) {
		$.root_.removeClass('mobile-view-activated');
		$.root_.addClass('fixed-header');
		$.root_.addClass('fixed-ribbon');
	}
}

/* ~ END: NAV OR #LEFT-BAR RESIZE DETECT */

/*
 * DETECT IE VERSION
 * Description: A short snippet for detecting versions of IE in JavaScript
 * without resorting to user-agent sniffing
 * RETURNS:
 * If you're not in IE (or IE version is less than 5) then:
 * //ie === undefined
 *
 * If you're in IE (>=5) then you can determine which version:
 * // ie === 7; // IE7
 *
 * Thus, to detect IE:
 * // if (ie) {}
 *
 * And to detect the version:
 * ie === 6 // IE6
 * ie > 7 // IE8, IE9 ...
 * ie < 9 // Anything less than IE9
 */

// TODO: delete this function later on - no longer needed (?)
var ie = ( function() {

		var undef, v = 3, div = document.createElement('div'), all = div.getElementsByTagName('i');

		while (div.innerHTML = '<!--[if gt IE ' + (++v) + ']><i></i><![endif]-->', all[0]);

		return v > 4 ? v : undef;

	}()); // do we need this? 

/* ~ END: DETECT IE VERSION */

/*
 * CUSTOM MENU PLUGIN
 */

$.fn.extend({

	//pass the options variable to the function
	jarvismenu : function(options) {

		var defaults = {
			accordion : 'true',
			speed : 200,
			closedSign : '[+]',
			openedSign : '[-]'
		};

		// Extend our default options with those provided.
		var opts = $.extend(defaults, options);
		//Assign current element to variable, in this case is UL element
		var $this = $(this);

		//add a mark [+] to a multilevel menu
		$this.find("li").each(function() {
			if ($(this).find("ul").size() != 0) {
				//add the multilevel sign next to the link
				$(this).find("a:first").append("<b class='collapse-sign'>" + opts.closedSign + "</b>");

				//avoid jumping to the top of the page when the href is an #
				if ($(this).find("a:first").attr('href') == "#") {
					$(this).find("a:first").click(function() {
						return false;
					});
				}
			}
		});

		//open active level
		$this.find("li.active").each(function() {
			$(this).parents("ul").slideDown(opts.speed);
			$(this).parents("ul").parent("li").find("b:first").html(opts.openedSign);
			$(this).parents("ul").parent("li").addClass("open")
		});

		$this.find("li a").click(function() {

			if ($(this).parent().find("ul").size() != 0) {

				if (opts.accordion) {
					//Do nothing when the list is open
					if (!$(this).parent().find("ul").is(':visible')) {
						parents = $(this).parent().parents("ul");
						visible = $this.find("ul:visible");
						visible.each(function(visibleIndex) {
							var close = true;
							parents.each(function(parentIndex) {
								if (parents[parentIndex] == visible[visibleIndex]) {
									close = false;
									return false;
								}
							});
							if (close) {
								if ($(this).parent().find("ul") != visible[visibleIndex]) {
									$(visible[visibleIndex]).slideUp(opts.speed, function() {
										$(this).parent("li").find("b:first").html(opts.closedSign);
										$(this).parent("li").removeClass("open");
									});

								}
							}
						});
					}
				}// end if
				if ($(this).parent().find("ul:first").is(":visible") && !$(this).parent().find("ul:first").hasClass("active")) {
					$(this).parent().find("ul:first").slideUp(opts.speed, function() {
						$(this).parent("li").removeClass("open");
						$(this).parent("li").find("b:first").delay(opts.speed).html(opts.closedSign);
					});

				} else {
					$(this).parent().find("ul:first").slideDown(opts.speed, function() {
						/*$(this).effect("highlight", {color : '#616161'}, 500); - disabled due to CPU clocking on phones*/
						$(this).parent("li").addClass("open");
						$(this).parent("li").find("b:first").delay(opts.speed).html(opts.openedSign);
					});
				} // end else
			} // end if
		});
	} // end function
});

/* ~ END: CUSTOM MENU PLUGIN */

/*
 * ELEMENT EXIST OR NOT
 * Description: returns true or false
 * Usage: $('#myDiv').doesExist();
 */

jQuery.fn.doesExist = function() {
	return jQuery(this).length > 0;
};

/* ~ END: ELEMENT EXIST OR NOT */

/*
 * FULL SCREEN FUNCTION
 */

// Find the right method, call on correct element
function launchFullscreen(element) {

	if (!$.root_.hasClass("full-screen")) {

		$.root_.addClass("full-screen");

		if (element.requestFullscreen) {
			element.requestFullscreen();
		} else if (element.mozRequestFullScreen) {
			element.mozRequestFullScreen();
		} else if (element.webkitRequestFullscreen) {
			element.webkitRequestFullscreen();
		} else if (element.msRequestFullscreen) {
			element.msRequestFullscreen();
		}

	} else {
		
		$.root_.removeClass("full-screen");
		
		if (document.exitFullscreen) {
			document.exitFullscreen();
		} else if (document.mozCancelFullScreen) {
			document.mozCancelFullScreen();
		} else if (document.webkitExitFullscreen) {
			document.webkitExitFullscreen();
		}

	}

}

/*
 * ~ END: FULL SCREEN FUNCTION
 */

/*
 * INITIALIZE FORMS
 * Description: Select2, Masking, Datepicker, Autocomplete
 */

function runAllForms() {

	/*
	 * BOOTSTRAP SLIDER PLUGIN
	 * Usage:
	 * Dependency: js/plugin/bootstrap-slider
	 */
	if ($.fn.slider) {
		$('.slider').slider();
	}

	/*
	 * SELECT2 PLUGIN
	 * Usage:
	 * Dependency: js/plugin/select2/
	 */
	if ($.fn.select2) {
		$('select.select2').each(function() {
			var $this = $(this);
			var width = $this.attr('data-select-width') || '100%';
			//, _showSearchInput = $this.attr('data-select-search') === 'true';
			$this.select2({
				//showSearchInput : _showSearchInput,
				allowClear : true,
				width : width
			})
		})
	}

	/*
	 * MASKING
	 * Dependency: js/plugin/masked-input/
	 */
	if ($.fn.mask) {
		$('[data-mask]').each(function() {

			var $this = $(this);
			var mask = $this.attr('data-mask') || 'error...', mask_placeholder = $this.attr('data-mask-placeholder') || 'X';

			$this.mask(mask, {
				placeholder : mask_placeholder
			});
		})
	}

	/*
	 * Autocomplete
	 * Dependency: js/jqui
	 */
	if ($.fn.autocomplete) {
		$('[data-autocomplete]').each(function() {

			var $this = $(this);
			var availableTags = $this.data('autocomplete') || ["The", "Quick", "Brown", "Fox", "Jumps", "Over", "Three", "Lazy", "Dogs"];

			$this.autocomplete({
				source : availableTags
			});
		})
	}

	/*
	 * JQUERY UI DATE
	 * Dependency: js/libs/jquery-ui-1.10.3.min.js
	 * Usage:
	 */
	if ($.fn.datepicker) {
		$('.datepicker').each(function() {

			var $this = $(this);
			var dataDateFormat = $this.attr('data-dateformat') || 'dd.mm.yy';

			$this.datepicker({
				dateFormat : dataDateFormat,
				prevText : '<i class="fa fa-chevron-left"></i>',
				nextText : '<i class="fa fa-chevron-right"></i>',
			});
		})
	}

	/*
	 * AJAX BUTTON LOADING TEXT
	 * Usage: <button type="button" data-loading-text="Loading..." class="btn btn-xs btn-default ajax-refresh"> .. </button>
	 */
	$('button[data-loading-text]').on('click', function() {
		var btn = $(this)
		btn.button('loading')
		setTimeout(function() {
			btn.button('reset')
		}, 3000)
	});

}

/* ~ END: INITIALIZE FORMS */

/*
 * INITIALIZE CHARTS
 * Description: Sparklines, PieCharts
 */

function runAllCharts() {
	/*
	 * SPARKLINES
	 * DEPENDENCY: js/plugins/sparkline/jquery.sparkline.min.js
	 * See usage example below...
	 */

	/* Usage:
	 * 		<div class="sparkline-line txt-color-blue" data-fill-color="transparent" data-sparkline-height="26px">
	 *			5,6,7,9,9,5,9,6,5,6,6,7,7,6,7,8,9,7
	 *		</div>
	 */

	if ($.fn.sparkline) {

		$('.sparkline').each(function() {
			var $this = $(this);
			var sparklineType = $this.data('sparkline-type') || 'bar';

			// BAR CHART
			if (sparklineType == 'bar') {

				var barColor = $this.data('sparkline-bar-color') || $this.css('color') || '#0000f0', sparklineHeight = $this.data('sparkline-height') || '26px', sparklineBarWidth = $this.data('sparkline-barwidth') || 5, sparklineBarSpacing = $this.data('sparkline-barspacing') || 2, sparklineNegBarColor = $this.data('sparkline-negbar-color') || '#A90329', sparklineStackedColor = $this.data('sparkline-barstacked-color') || ["#A90329", "#0099c6", "#98AA56", "#da532c", "#4490B1", "#6E9461", "#990099", "#B4CAD3"];

				$this.sparkline('html', {
					type : 'bar',
					barColor : barColor,
					type : sparklineType,
					height : sparklineHeight,
					barWidth : sparklineBarWidth,
					barSpacing : sparklineBarSpacing,
					stackedBarColor : sparklineStackedColor,
					negBarColor : sparklineNegBarColor,
					zeroAxis : 'false'
				});

			}

			//LINE CHART
			if (sparklineType == 'line') {

				var sparklineHeight = $this.data('sparkline-height') || '20px', sparklineWidth = $this.data('sparkline-width') || '90px', thisLineColor = $this.data('sparkline-line-color') || $this.css('color') || '#0000f0', thisLineWidth = $this.data('sparkline-line-width') || 1, thisFill = $this.data('fill-color') || '#c0d0f0', thisSpotColor = $this.data('sparkline-spot-color') || '#f08000', thisMinSpotColor = $this.data('sparkline-minspot-color') || '#ed1c24', thisMaxSpotColor = $this.data('sparkline-maxspot-color') || '#f08000', thishighlightSpotColor = $this.data('sparkline-highlightspot-color') || '#50f050', thisHighlightLineColor = $this.data('sparkline-highlightline-color') || 'f02020', thisSpotRadius = $this.data('sparkline-spotradius') || 1.5;
				thisChartMinYRange = $this.data('sparkline-min-y') || 'undefined', thisChartMaxYRange = $this.data('sparkline-max-y') || 'undefined', thisChartMinXRange = $this.data('sparkline-min-x') || 'undefined', thisChartMaxXRange = $this.data('sparkline-max-x') || 'undefined', thisMinNormValue = $this.data('min-val') || 'undefined', thisMaxNormValue = $this.data('max-val') || 'undefined', thisNormColor = $this.data('norm-color') || '#c0c0c0', thisDrawNormalOnTop = $this.data('draw-normal') || false;

				$this.sparkline('html', {
					type : 'line',
					width : sparklineWidth,
					height : sparklineHeight,
					lineWidth : thisLineWidth,
					lineColor : thisLineColor,
					fillColor : thisFill,
					spotColor : thisSpotColor,
					minSpotColor : thisMinSpotColor,
					maxSpotColor : thisMaxSpotColor,
					highlightSpotColor : thishighlightSpotColor,
					highlightLineColor : thisHighlightLineColor,
					spotRadius : thisSpotRadius,
					chartRangeMin : thisChartMinYRange,
					chartRangeMax : thisChartMaxYRange,
					chartRangeMinX : thisChartMinXRange,
					chartRangeMaxX : thisChartMaxXRange,
					normalRangeMin : thisMinNormValue,
					normalRangeMax : thisMaxNormValue,
					normalRangeColor : thisNormColor,
					drawNormalOnTop : thisDrawNormalOnTop

				});

			}

			//PIE CHART
			if (sparklineType == 'pie') {

				var pieColors = $this.data('sparkline-piecolor') || ["#B4CAD3", "#4490B1", "#98AA56", "#da532c", "#6E9461", "#0099c6", "#990099", "#717D8A"], pieWidthHeight = $this.data('sparkline-piesize') || 90, pieBorderColor = $this.data('border-color') || '#45494C', pieOffset = $this.data('sparkline-offset') || 0;

				$this.sparkline('html', {
					type : 'pie',
					width : pieWidthHeight,
					height : pieWidthHeight,
					tooltipFormat : '<span style="color: {{color}}">&#9679;</span> ({{percent.1}}%)',
					sliceColors : pieColors,
					offset : 0,
					borderWidth : 1,
					offset : pieOffset,
					borderColor : pieBorderColor
				});

			}

			//BOX PLOT
			if (sparklineType == 'box') {

				var thisBoxWidth = $this.data('sparkline-width') || 'auto', thisBoxHeight = $this.data('sparkline-height') || 'auto', thisBoxRaw = $this.data('sparkline-boxraw') || false, thisBoxTarget = $this.data('sparkline-targetval') || 'undefined', thisBoxMin = $this.data('sparkline-min') || 'undefined', thisBoxMax = $this.data('sparkline-max') || 'undefined', thisShowOutlier = $this.data('sparkline-showoutlier') || true, thisIQR = $this.data('sparkline-outlier-iqr') || 1.5, thisBoxSpotRadius = $this.data('sparkline-spotradius') || 1.5, thisBoxLineColor = $this.css('color') || '#000000', thisBoxFillColor = $this.data('fill-color') || '#c0d0f0', thisBoxWhisColor = $this.data('sparkline-whis-color') || '#000000', thisBoxOutlineColor = $this.data('sparkline-outline-color') || '#303030', thisBoxOutlineFill = $this.data('sparkline-outlinefill-color') || '#f0f0f0', thisBoxMedianColor = $this.data('sparkline-outlinemedian-color') || '#f00000', thisBoxTargetColor = $this.data('sparkline-outlinetarget-color') || '#40a020';

				$this.sparkline('html', {
					type : 'box',
					width : thisBoxWidth,
					height : thisBoxHeight,
					raw : thisBoxRaw,
					target : thisBoxTarget,
					minValue : thisBoxMin,
					maxValue : thisBoxMax,
					showOutliers : thisShowOutlier,
					outlierIQR : thisIQR,
					spotRadius : thisBoxSpotRadius,
					boxLineColor : thisBoxLineColor,
					boxFillColor : thisBoxFillColor,
					whiskerColor : thisBoxWhisColor,
					outlierLineColor : thisBoxOutlineColor,
					outlierFillColor : thisBoxOutlineFill,
					medianColor : thisBoxMedianColor,
					targetColor : thisBoxTargetColor

				})

			}

			//BULLET
			if (sparklineType == 'bullet') {

				var thisBulletHeight = $this.data('sparkline-height') || 'auto', thisBulletWidth = $this.data('sparkline-width') || 2, thisBulletColor = $this.data('sparkline-bullet-color') || '#ed1c24', thisBulletPerformanceColor = $this.data('sparkline-performance-color') || '#3030f0', thisBulletRangeColors = $this.data('sparkline-bulletrange-color') || ["#d3dafe", "#a8b6ff", "#7f94ff"]

				$this.sparkline('html', {

					type : 'bullet',
					height : thisBulletHeight,
					targetWidth : thisBulletWidth,
					targetColor : thisBulletColor,
					performanceColor : thisBulletPerformanceColor,
					rangeColors : thisBulletRangeColors

				})

			}

			//DISCRETE
			if (sparklineType == 'discrete') {

				var thisDiscreteHeight = $this.data('sparkline-height') || 26, thisDiscreteWidth = $this.data('sparkline-width') || 50, thisDiscreteLineColor = $this.css('color'), thisDiscreteLineHeight = $this.data('sparkline-line-height') || 5, thisDiscreteThrushold = $this.data('sparkline-threshold') || 'undefined', thisDiscreteThrusholdColor = $this.data('sparkline-threshold-color') || '#ed1c24';

				$this.sparkline('html', {

					type : 'discrete',
					width : thisDiscreteWidth,
					height : thisDiscreteHeight,
					lineColor : thisDiscreteLineColor,
					lineHeight : thisDiscreteLineHeight,
					thresholdValue : thisDiscreteThrushold,
					thresholdColor : thisDiscreteThrusholdColor

				})

			}

			//TRISTATE
			if (sparklineType == 'tristate') {

				var thisTristateHeight = $this.data('sparkline-height') || 26, thisTristatePosBarColor = $this.data('sparkline-posbar-color') || '#60f060', thisTristateNegBarColor = $this.data('sparkline-negbar-color') || '#f04040', thisTristateZeroBarColor = $this.data('sparkline-zerobar-color') || '#909090', thisTristateBarWidth = $this.data('sparkline-barwidth') || 5, thisTristateBarSpacing = $this.data('sparkline-barspacing') || 2, thisZeroAxis = $this.data('sparkline-zeroaxis') || false;

				$this.sparkline('html', {

					type : 'tristate',
					height : thisTristateHeight,
					posBarColor : thisBarColor,
					negBarColor : thisTristateNegBarColor,
					zeroBarColor : thisTristateZeroBarColor,
					barWidth : thisTristateBarWidth,
					barSpacing : thisTristateBarSpacing,
					zeroAxis : thisZeroAxis

				})

			}

			//COMPOSITE: BAR
			if (sparklineType == 'compositebar') {

				var sparklineHeight = $this.data('sparkline-height') || '20px', sparklineWidth = $this.data('sparkline-width') || '100%', sparklineBarWidth = $this.data('sparkline-barwidth') || 3, thisLineWidth = $this.data('sparkline-line-width') || 1, thisLineColor = $this.data('sparkline-color-top') || '#ed1c24', thisBarColor = $this.data('sparkline-color-bottom') || '#333333'

				$this.sparkline($this.data('sparkline-bar-val'), {

					type : 'bar',
					width : sparklineWidth,
					height : sparklineHeight,
					barColor : thisBarColor,
					barWidth : sparklineBarWidth
					//barSpacing: 5

				})

				$this.sparkline($this.data('sparkline-line-val'), {

					width : sparklineWidth,
					height : sparklineHeight,
					lineColor : thisLineColor,
					lineWidth : thisLineWidth,
					composite : true,
					fillColor : false

				})

			}

			//COMPOSITE: LINE
			if (sparklineType == 'compositeline') {

				var sparklineHeight = $this.data('sparkline-height') || '20px', sparklineWidth = $this.data('sparkline-width') || '90px', sparklineValue = $this.data('sparkline-bar-val'), sparklineValueSpots1 = $this.data('sparkline-bar-val-spots-top') || null, sparklineValueSpots2 = $this.data('sparkline-bar-val-spots-bottom') || null, thisLineWidth1 = $this.data('sparkline-line-width-top') || 1, thisLineWidth2 = $this.data('sparkline-line-width-bottom') || 1, thisLineColor1 = $this.data('sparkline-color-top') || '#333333', thisLineColor2 = $this.data('sparkline-color-bottom') || '#ed1c24', thisSpotRadius1 = $this.data('sparkline-spotradius-top') || 1.5, thisSpotRadius2 = $this.data('sparkline-spotradius-bottom') || thisSpotRadius1, thisSpotColor = $this.data('sparkline-spot-color') || '#f08000', thisMinSpotColor1 = $this.data('sparkline-minspot-color-top') || '#ed1c24', thisMaxSpotColor1 = $this.data('sparkline-maxspot-color-top') || '#f08000', thisMinSpotColor2 = $this.data('sparkline-minspot-color-bottom') || thisMinSpotColor1, thisMaxSpotColor2 = $this.data('sparkline-maxspot-color-bottom') || thisMaxSpotColor1, thishighlightSpotColor1 = $this.data('sparkline-highlightspot-color-top') || '#50f050', thisHighlightLineColor1 = $this.data('sparkline-highlightline-color-top') || '#f02020', thishighlightSpotColor2 = $this.data('sparkline-highlightspot-color-bottom') || thishighlightSpotColor1, thisHighlightLineColor2 = $this.data('sparkline-highlightline-color-bottom') || thisHighlightLineColor1, thisFillColor1 = $this.data('sparkline-fillcolor-top') || 'transparent', thisFillColor2 = $this.data('sparkline-fillcolor-bottom') || 'transparent';

				$this.sparkline(sparklineValue, {

					type : 'line',
					spotRadius : thisSpotRadius1,

					spotColor : thisSpotColor,
					minSpotColor : thisMinSpotColor1,
					maxSpotColor : thisMaxSpotColor1,
					highlightSpotColor : thishighlightSpotColor1,
					highlightLineColor : thisHighlightLineColor1,

					valueSpots : sparklineValueSpots1,

					lineWidth : thisLineWidth1,
					width : sparklineWidth,
					height : sparklineHeight,
					lineColor : thisLineColor1,
					fillColor : thisFillColor1

				})

				$this.sparkline($this.data('sparkline-line-val'), {

					type : 'line',
					spotRadius : thisSpotRadius2,

					spotColor : thisSpotColor,
					minSpotColor : thisMinSpotColor2,
					maxSpotColor : thisMaxSpotColor2,
					highlightSpotColor : thishighlightSpotColor2,
					highlightLineColor : thisHighlightLineColor2,

					valueSpots : sparklineValueSpots2,

					lineWidth : thisLineWidth2,
					width : sparklineWidth,
					height : sparklineHeight,
					lineColor : thisLineColor2,
					composite : true,
					fillColor : thisFillColor2

				})

			}

		});

	}// end if

	/*
	 * EASY PIE CHARTS
	 * DEPENDENCY: js/plugins/easy-pie-chart/jquery.easy-pie-chart.min.js
	 * Usage: <div class="easy-pie-chart txt-color-orangeDark" data-pie-percent="33" data-pie-size="72" data-size="72">
	 *			<span class="percent percent-sign">35</span>
	 * 	  	  </div>
	 */

	if ($.fn.easyPieChart) {

		$('.easy-pie-chart').each(function() {
			var $this = $(this);
			var barColor = $this.css('color') || $this.data('pie-color'), trackColor = $this.data('pie-track-color') || '#eeeeee', size = parseInt($this.data('pie-size')) || 25;
			$this.easyPieChart({
				barColor : barColor,
				trackColor : trackColor,
				scaleColor : false,
				lineCap : 'butt',
				lineWidth : parseInt(size / 8.5),
				animate : 1500,
				rotate : -90,
				size : size,
				onStep : function(value) {
					this.$el.find('span').text(~~value);
				}
			});
		});

	} // end if

}

/* ~ END: INITIALIZE CHARTS */

/*
 * INITIALIZE JARVIS WIDGETS
 */

// Setup Desktop Widgets
function setup_widgets_desktop() {

	if ($.fn.jarvisWidgets && $.enableJarvisWidgets) {

		$('#widget-grid').jarvisWidgets({

			grid : 'article',
			widgets : '.jarviswidget',
			localStorage : true,
			deleteSettingsKey : '#deletesettingskey-options',
			settingsKeyLabel : 'Reset settings?',
			deletePositionKey : '#deletepositionkey-options',
			positionKeyLabel : 'Reset position?',
			sortable : true,
			buttonsHidden : false,
			// toggle button
			toggleButton : true,
			toggleClass : 'fa fa-minus | fa fa-plus',
			toggleSpeed : 200,
			onToggle : function() {
			},
			// delete btn
			deleteButton : true,
			deleteClass : 'fa fa-times',
			deleteSpeed : 200,
			onDelete : function() {
			},
			// edit btn
			editButton : true,
			editPlaceholder : '.jarviswidget-editbox',
			editClass : 'fa fa-cog | fa fa-save',
			editSpeed : 200,
			onEdit : function() {
			},
			// color button
			colorButton : true,
			// full screen
			fullscreenButton : true,
			fullscreenClass : 'fa fa-resize-full | fa fa-resize-small',
			fullscreenDiff : 3,
			onFullscreen : function() {
			},
			// custom btn
			customButton : false,
			customClass : 'folder-10 | next-10',
			customStart : function() {
				alert('Hello you, this is a custom button...')
			},
			customEnd : function() {
				alert('bye, till next time...')
			},
			// order
			buttonOrder : '%refresh% %custom% %edit% %toggle% %fullscreen% %delete%',
			opacity : 1.0,
			dragHandle : '> header',
			placeholderClass : 'jarviswidget-placeholder',
			indicator : true,
			indicatorTime : 600,
			ajax : true,
			timestampPlaceholder : '.jarviswidget-timestamp',
			timestampFormat : 'Last update: %m%/%d%/%y% %h%:%i%:%s%',
			refreshButton : true,
			refreshButtonClass : 'fa fa-refresh',
			labelError : 'Sorry but there was a error:',
			labelUpdated : 'Last Update:',
			labelRefresh : 'Refresh',
			labelDelete : 'Delete widget:',
			afterLoad : function() {
			},
			rtl : false, // best not to toggle this!
			onChange : function() {
				
			},
			onSave : function() {
				
			},
			ajaxnav : $.navAsAjax // declears how the localstorage should be saved

		});

	}

}

// Setup Desktop Widgets
function setup_widgets_mobile() {

	if ($.enableMobileWidgets && $.enableJarvisWidgets) {
		setup_widgets_desktop();
	}

}

/* ~ END: INITIALIZE JARVIS WIDGETS */

/*
 * GOOGLE MAPS
 * description: Append google maps to head dynamically
 */

var gMapsLoaded = false;
window.gMapsCallback = function() {
	gMapsLoaded = true;
	$(window).trigger('gMapsLoaded');
}
window.loadGoogleMaps = function() {
	if (gMapsLoaded)
		return window.gMapsCallback();
	var script_tag = document.createElement('script');
	script_tag.setAttribute("type", "text/javascript");
	script_tag.setAttribute("src", "http://maps.google.com/maps/api/js?sensor=false&callback=gMapsCallback");
	(document.getElementsByTagName("head")[0] || document.documentElement).appendChild(script_tag);
}
/* ~ END: GOOGLE MAPS */

/*
 * LOAD SCRIPTS
 * Usage:
 * Define function = myPrettyCode ()...
 * loadScript("js/my_lovely_script.js", myPrettyCode);
 */

var jsArray = {};

function loadScript(scriptName, callback) {

	if (!jsArray[scriptName]) {
		jsArray[scriptName] = true;

		// adding the script tag to the head as suggested before
		var body = document.getElementsByTagName('body')[0];
		var script = document.createElement('script');
		script.type = 'text/javascript';
		script.src = scriptName;

		// then bind the event to the callback function
		// there are several events for cross browser compatibility
		//script.onreadystatechange = callback;
		script.onload = callback;

		// fire the loading
		body.appendChild(script);

	} else if (callback) {// changed else to else if(callback)
		//console.log("JS file already added!");
		//execute function
		callback();
	}

}

/* ~ END: LOAD SCRIPTS */

/*
* APP AJAX REQUEST SETUP
* Description: Executes and fetches all ajax requests also
* updates naivgation elements to active
*/
if($.navAsAjax)
{
    // fire this on page load if nav exists
    if ($('nav').length) {
	    checkURL();
    };

    $(document).on('click', 'nav a[href!="#"]', function(e) {
	    e.preventDefault();
	    var $this = $(e.currentTarget);

	    // if parent is not active then get hash, or else page is assumed to be loaded
		if (!$this.parent().hasClass("active") && !$this.attr('target')) {

		    // update window with hash
		    // you could also do here:  $.device === "mobile" - and save a little more memory

		    if ($.root_.hasClass('mobile-view-activated')) {
			    $.root_.removeClass('hidden-menu');			    
			    window.setTimeout(function() {
					if (window.location.search) {
						window.location.href =
							window.location.href.replace(window.location.search, '')
								.replace(window.location.hash, '') + '#' + $this.attr('href');
					} else {
						window.location.hash = $this.attr('href')
					}
			    }, 150);
			    // it may not need this delay...
		    } else {
				if (window.location.search) {
					window.location.href =
						window.location.href.replace(window.location.search, '')
							.replace(window.location.hash, '') + '#' + $this.attr('href');
				} else {
					window.location.hash = $this.attr('href');
				}
		    }
	    }

    });

    // fire links with targets on different window
    $(document).on('click', 'nav a[target="_blank"]', function(e) {
	    e.preventDefault();
	    var $this = $(e.currentTarget);

	    window.open($this.attr('href'));
    });

    // fire links with targets on same window
    $(document).on('click', 'nav a[target="_top"]', function(e) {
	    e.preventDefault();
	    var $this = $(e.currentTarget);

	    window.location = ($this.attr('href'));
    });

    // all links with hash tags are ignored
    $(document).on('click', 'nav a[href="#"]', function(e) {
	    e.preventDefault();
    });

    // DO on hash change
    $(window).on('hashchange', function() {
	    checkURL();
    });
}

// CHECK TO SEE IF URL EXISTS
function checkURL() {

	//get the url by removing the hash
	var url = location.hash.replace(/^#/, '');

	container = $('#content');
	// Do this if url exists (for page refresh, etc...)
	if (url) {
		// remove all active class
		$('nav li.active').removeClass("active");
		// match the url and add the active class
		$('nav li:has(a[href="' + url + '"])').addClass("active");
		var title = ($('nav a[href="' + url + '"]').attr('title'))

		// change page title from global var
		document.title = (title || document.title);
		//console.log("page title: " + document.title);

		// parse url to jquery
		loadURL(url + location.search, container);
	} else {

		// grab the first URL from nav
		var $this = $('nav > ul > li:first-child > a[href!="#"]');

		//update hash
		window.location.hash = $this.attr('href');

	}

}

// LOAD AJAX PAGES

function loadURL(url, container) {
	//console.log(container)

	$.ajax({
		type : "GET",
		url : url,
		dataType : 'html',
		cache : true, // (warning: this will cause a timestamp and will call the request twice)
		beforeSend : function() {
			// cog placed
			container.html('<h1><i class="fa fa-cog fa-spin"></i> Loading...</h1>');
		
			// Only draw breadcrumb if it is main content material
			// TODO: see the framerate for the animation in touch devices
			
			if (container[0] == $("#content")[0]) {
				drawBreadCrumb();
				// scroll up
				$("html").animate({
					scrollTop : 0
				}, "fast");
			} 
		},
		/*complete: function(){
	    	// Handle the complete event
	    	// alert("complete")
		},*/
		success : function(data) {
			// cog replaced here...
			// alert("success")
			/*tambahan jika respon aplikasi NotAutherized maka logout otomatis*/
			/*28Okt2014 07:20*/
			if(data=='NotAuthorized') {
				AppLock();
				
			}
			/* //tambahan jika respon aplikasi NotAutherized maka logout otomatis*/
			container.css({
				opacity : '0.0'
			}).html(data).delay(50).animate({
				opacity : '1.0'
			}, 300);

			$("#TITLE_PAGE").html($("#TITLE_PAGE").html()+" "+document.title);
			

		},
		error : function(xhr, ajaxOptions, thrownError) {
			container.html('<h4 style="margin-top:10px; display:block; text-align:left"><i class="fa fa-warning txt-color-orangeDark"></i> Error 404! Page not found.</h4>');
		},
		async : false
	});

	//console.log("ajax request sent");
}

function AppLock() {
	if (window.isLogin) {
		$.ajax({
			url: 'site/logout',
			type: 'POST',
			data: {logged: true},
			success : function(respon) {
				//loged out
				window.isLogin = false;
			}
		});
	}
	
	$.SmartMessageBox({
		title : "Sesi Anda telah habis", // judul Smart Alert
		content : "Silakan klik tombol Ya untuk Login kembali", // konten dari smart alert
		buttons : '[Ya]' // pengaturan tombol
	}, function(ButtonPressed) {
		if (ButtonPressed === "Ya") {
			$('form#DoLock').submit();
		}

	});
}

// UPDATE BREADCRUMB
function drawBreadCrumb() {
	var nav_elems = $('nav li.active > a'), count = nav_elems.length;
	
	//console.log("breadcrumb")
	$.bread_crumb.empty();
	$.bread_crumb.append($("<li>Home</li>"));
	nav_elems.each(function() {
		$.bread_crumb.append($("<li></li>").html($.trim($(this).clone().children(".badge").remove().end().text())));
		// update title when breadcrumb is finished...
		if (!--count) document.title = $.bread_crumb.find("li:last-child").text();
	});

}

/* ~ END: APP AJAX REQUEST SETUP */

/*
 * PAGE SETUP
 * Description: fire certain scripts that run through the page
 * to check for form elements, tooltip activation, popovers, etc...
 */
function pageSetUp() {

	if ($.device === "desktop"){
		// is desktop
		
		// activate tooltips
		$("[rel=tooltip]").tooltip();
	
		// activate popovers
		$("[rel=popover]").popover();
	
		// activate popovers with hover states
		$("[rel=popover-hover]").popover({
			trigger : "hover"
		});
	
		// activate inline charts
		runAllCharts();
	
		// setup widgets
		setup_widgets_desktop();
	
		//setup nav height (dynamic)
		nav_page_height();
	
		// run form elements
		runAllForms();

	} else {
		
		// is mobile
		
		// activate popovers
		$("[rel=popover]").popover();
	
		// activate popovers with hover states
		$("[rel=popover-hover]").popover({
			trigger : "hover"
		});
	
		// activate inline charts
		runAllCharts();
	
		// setup widgets
		setup_widgets_mobile();
	
		//setup nav height (dynamic)
		nav_page_height();
	
		// run form elements
		runAllForms();
		
	}

}

// Keep only 1 active popover per trigger - also check and hide active popover if user clicks on document
$('body').on('click', function(e) {
	$('[rel="popover"]').each(function() {
		//the 'is' for buttons that trigger popups
		//the 'has' for icons within a button that triggers a popup
		if (!$(this).is(e.target) && $(this).has(e.target).length === 0 && $('.popover').has(e.target).length === 0) {
			$(this).popover('hide');
		}
	});
});

/*Funsi Tambahan Mulai dari sini*/

function refresh () {
	window.location.reload();
}

function notifikasi2(title, msg, type, isrefresh) {
	if (type=='success') {
		var warna = '#296191';
		var icon = 'fa-save';
		if(isrefresh==null || isrefresh==true) 
			var tombol = "<a onclick='refresh()' class='btn bg-color-orange txt-color-white btn-sm'>Klik Untuk Merefresh Halaman</a>"; // jika null maka tampilkan
		else if(!isrefresh)
			var tombol=''; // jika isrefresh = false
	} else {
		var warna = '#B61F1F;';
		var icon = 'fa-warning';
		var tombol = '';
	}
	$.smallBox({
		title : title,
			//content : "<i class='fa fa-clock-o'></i><i>"+msg+"</i>",
			content : msg+"<p class='text-align-right'>"+tombol+"</p>",
			color : warna, // warna background
			icon : "fa "+icon+" swing animated",
			//iconSmall : "fa "+ icon +" bounce animated", // dengan animasi bounce
			timeout : 4000 // lama alert ditampilkan
		});
}

function notifikasi(title, msg, type, istimeout, isrefresh, timeout) {
	if(timeout==null)
		timeout = 4000;

	if(isrefresh==null || isrefresh==true)
		//var tombol = "<a onclick='refresh()' class='btn bg-color-orange txt-color-white btn-sm'>Klik Untuk Merefresh Halaman</a>"; // jika null maka tampilkan
		var tombol = ""; // jika null maka tampilkan
	else if(!isrefresh)
		var tombol=''; // jika isrefresh = true
	if(istimeout==null || istimeout==true)
		var time = timeout;
	else if(!istimeout)
		var time=null; // jika isrefresh = true

	if (type=='success') {
		var warna = '#296191';
		var icon = 'fa-save';
	} else {
		var warna = '#B61F1F;';
		var icon = 'fa-warning';
		var tombol = '';
	}
	$.smallBox({
		title : title,
			//content : "<i class='fa fa-clock-o'></i><i>"+msg+"</i>",
			content : msg+"<p class='text-align-right'>"+tombol+"</p>",
			color : warna, // warna background
			icon : "fa "+icon+" swing animated",
			//iconSmall : "fa "+ icon +" bounce animated", // dengan animasi bounce
			timeout : time // lama alert ditampilkan
		});
	wait(3000);
	if(isrefresh==null || isrefresh==true)
		refresh();
}

	function wait(ms) {
		var i = 1;
		function myLoop () {           //  create a loop function
		   setTimeout(function () {    //  call a 3s setTimeout when the loop is called
			  //alert('delay');          //  your code here
			  i++;                     //  increment the counter
			  if (i < 10) {            //  if the counter < 10, call the loop function
				 myLoop();             //  ..  again which will trigger another 
			  }                        //  ..  setTimeout()
		  }, ms)
		}
		myLoop();
	}

	function cekBelumDataPajak() {
		$.ajax({
			url: 'pendaftaran/berkas/getcount',
			type: 'POST',
			dataType: 'json',
			data: {},
			success: function(respon) {
				$("#number_of_belum_data_pajak").html(respon.WP_BELUM_DATA_BULAN_INI);
			}
		});
	}

	function cekBelumPenetapanPajak() {
		$.ajax({
			url: 'pendaftaran/berkas/getcountbelumpenetapan',
			type: 'POST',
			dataType: 'json',
			data: {},
			success: function(respon) {
				$("#number_of_belum_penetapan_pajak").html(respon.WP_BELUM_PENETAPAN_BULAN_INI);
			}
		});
	}

	function cekBelumPenyetoranPajak() {
		$.ajax({
			url: 'pendaftaran/berkas/getcountbelumpenyetoran',
			type: 'POST',
			dataType: 'json',
			data: {},
			success: function(respon) {
				$("#number_of_belum_penyetoran_pajak").html(respon.WP_BELUM_PENYETORAN_BULAN_INI);
			}
		});
	}

	function cekproses () {
		$.get('berkas/berkasdiproses/cek', function(respon) {
			if(respon=='NotAuthorized') {
				AppLock();
			}
			$("#notif_proses").html(respon);
		});
	}

	function do_idle (ms) {
		$(document).idle({
		  onIdle: function(){
		  	AppLock();
		  },
		  idle: ms
		});
	}
	window.APPTHEMES = "themes/smartadmin/";
	/*tambahan*/
	function reloadDT(idelement, isSort) {
		isSort = ( (typeof isSort!=undefined && isSort) || isSort==null) ? true : false;
		loadScript("themes/smartadmin/ajs/datatables/jquery.dataTables.min.js", function(){
			loadScript("themes/smartadmin/ajs/datatables/dataTables.colVis.min.js", function(){
				loadScript("themes/smartadmin/ajs/datatables/dataTables.tableTools.min.js", function(){
					loadScript("themes/smartadmin/ajs/datatables/dataTables.bootstrap.min.js", function(){
						loadScript("themes/smartadmin/ajs/datatables/datatables.responsive.min.js", pagefunction)
					});
				});
			});
		});
		function pagefunction() {
			var responsiveHelper_dt_basic = undefined;
			var responsiveHelper_datatable_fixed_column = undefined;
			var responsiveHelper_datatable_col_reorder = undefined;
			var responsiveHelper_datatable_tabletools = undefined;
			
			var breakpointDefinition = {
				desktop: 1367,
				tablet : 1024,
				phone : 480
			};

			window.DATATABEL = $('#'+idelement).dataTable({
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
					"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_dt_basic) {
						responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#'+idelement), breakpointDefinition);
					}
				},
				"bDestroy" : true,
				"bSort" : isSort,
				"rowCallback" : function(nRow) {
					responsiveHelper_dt_basic.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_dt_basic.respond();
				}
			});
		}
		
	}

	function reloadDTNoSearch(idelement, isSort) {
		isSort = ( (typeof isSort!=undefined && isSort) || isSort==null) ? true : false;
		loadScript("themes/smartadmin/ajs/datatables/jquery.dataTables.min.js", function(){
			loadScript("themes/smartadmin/ajs/datatables/dataTables.colVis.min.js", function(){
				loadScript("themes/smartadmin/ajs/datatables/dataTables.tableTools.min.js", function(){
					loadScript("themes/smartadmin/ajs/datatables/dataTables.bootstrap.min.js", function(){
						loadScript("themes/smartadmin/ajs/datatables/datatables.responsive.min.js", pagefunction)
					});
				});
			});
		});
		function pagefunction() {
			var responsiveHelper_dt_basic = undefined;
			var responsiveHelper_datatable_fixed_column = undefined;
			var responsiveHelper_datatable_col_reorder = undefined;
			var responsiveHelper_datatable_tabletools = undefined;
			
			var breakpointDefinition = {
				desktop: 1367,
				tablet : 1024,
				phone : 480
			};

			window.DATATABEL = $('#'+idelement).dataTable({
				"sDom": "t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
					"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_dt_basic) {
						responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($('#'+idelement), breakpointDefinition);
					}
				},
				"bDestroy" : true,
				"bSort" : isSort,
				"rowCallback" : function(nRow) {
					responsiveHelper_dt_basic.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_dt_basic.respond();
				}
			});
		}
		
	}

function SmartAlert(title,pesan,btn_teks) {
	$.SmartMessageBox({
		title : title, // judul Smart Alert
		content : pesan, // konten dari smart alert
		buttons : '['+btn_teks+']' // pengaturan tombol
	}, function(ButtonPressed) {

	});
}
function panggil_antrian(){
	$.ajax({
		type : "POST",
		url : "antrian/antrian/Panggil",
		success : function(data) {
			
		}
	});
	
}
function panggil_ulang(){
	$.ajax({
		type : "POST",
		url : "antrian/antrian/PanggilUlang",
		success : function(data) {
			
		}
	});
	
}

	function setSelectList (elemen, kata, respon) {
		//data = $.parseJSON(respon);
		data = respon;
		var list_html = '';
		if (data.length>0) {
			list_html += '<option value="" placeholder="=== Pilih '+kata+' ===" selected>=== Pilih '+kata+' ===</option>';
			$.each(data, function(i, item) {
				isDisabled = data[i].isDisabled=="T" ? 'disabled="disabled"' : '';
				list_html += '<option '+isDisabled+' value='+data[i].id+'>'+data[i].value+'</option>';
			});
			$('#'+elemen).html(list_html);
		}
		else {
			$('#'+elemen).html('<option value="">=== Pilih '+kata+' ===</option>');
		}
	}

	function setComboList (elemen, kata, respon) {
		//data = $.parseJSON(respon);
		data = respon;
		var list_html = '';
		kata = (kata.toLowerCase().indexOf("pilih") !== -1) ? kata : "=== Pilih "+kata+" ===";
		if (data.length>0) {
			list_html += '<option value="" selected>'+kata+'</option>';
			$.each(data, function(i, item) {
				var attr = ' ';
				isDisabled = data[i].isDisabled=="T" ? 'disabled="disabled"' : '';
				jQuery.each(item, function(atribut, el) {
				  attr += atribut+'="'+data[i][atribut]+'" ';
					// console.log(atribut+'=>'+el);
					// console.log(atribut+'=>'+data[i][atribut]);
				});
				// console.log(attr+"\n");
				// console.log(item);
				var tulisan = typeof data[i].text!="undefined" ? data[i].text : data[i].value;
				if (typeof data[i].id!="undefined") {
					// console.log('id ada');
					//untuk handling json versi setSelectList yg lama
					var valusselect = typeof data[i].id!="undefined" ? data[i].id : data[i].value;
					attr = 'value="'+valusselect+'" ';
				}
				list_html += '<option '+attr+'>'+tulisan+'</option>';
				// console.log(list_html);
			});
			$('#'+elemen).html(list_html);
		}
		else {
			$('#'+elemen).html('<option value="">'+kata+'</option>');
		}
	}

	function inArray(needle, haystack) {
		var length = haystack.length;
		for(var i = 0; i < length; i++) {
			if(haystack[i] == needle) return true;
		}
		return false;
	}

	/*tambahan untuk Data Tables Pipeline*/

	function drawTablePipeLine(table, noOfPagesToCache, totalRecords, ajaxUrl, COLUMNS, ORDERS, CALLBACK_FUNCTION, isFIXEDHEADER) {
		if (COLUMNS==null || typeof COLUMNS=='undefined') {
			// jika tidak menggunakan definisi kolom, maka anggap gunakan setingan default dari respon server
			COLUMNS = null;
		}
		if (ORDERS==null || typeof ORDERS=='undefined') {
			// jika tidak menggunakan definisi kolom, maka anggap gunakan setingan default dari respon server
			ORDERS = null;
		}
		if (isFIXEDHEADER==null || typeof isFIXEDHEADER=='undefined') {
			// jika tidak menggunakan definisi isFIXEDHEADER, default false
			isFIXEDHEADER = false;
		}
		/* fetch & define Data Table*/
		loadScript(window.APP_THEMES+"ajs/datatables/jquery.dataTables.min.js", function(){
			loadScript(window.APP_THEMES+"ajs/datatables/dataTables.colVis.min.js", function(){
				loadScript(window.APP_THEMES+"ajs/datatables/dataTables.tableTools.min.js", function(){
					loadScript(window.APP_THEMES+"ajs/datatables/dataTables.bootstrap.min.js", function(){
						loadScript(window.APP_THEMES+"ajs/datatables/dataTables.fixedHeader.min.js", function(){
							loadScript(window.APP_THEMES+"ajs/datatables/datatables.responsive.min.js", pagefunction)
						});
					});
				});
			});
		});
		function pagefunction() {
			var responsiveHelper_dt_basic = undefined;
			var responsiveHelper_datatable_fixed_column = undefined;
			var responsiveHelper_datatable_col_reorder = undefined;
			var responsiveHelper_datatable_tabletools = undefined;

			var breakpointDefinition = {
				desktop: 1367,
				tablet : 1024,
				phone : 480
			};

			console.log('Data Table loaded');

			//function enableAjaxifiedDataTable() {
				//var enableAjaxifiedDataTable =function(){
				$.fn.dataTable.pipeline = function (opts) {
					// Configuration options
					var conf = $.extend({
						pages: 1,     // number of pages to cache
						url: '',      // script url
						data: null,   // function or object with parameters to send to the server
						// matching how `ajax.data` works in DataTables
						method: 'POST' // Ajax HTTP method
					}, opts);

					// Private variables for storing the cache
					var cacheLower = -1;
					var cacheUpper = null;
					var cacheLastRequest = null;
					var cacheLastJson = null;

					return function (request, drawCallback, settings) {
						var ajax = false;
						var requestStart = request.start;
						var drawStart = request.start;
						var requestLength = request.length;
						var requestEnd = requestStart + requestLength;

						if (settings.clearCache) {
							// API requested that the cache be cleared
							ajax = true;
							settings.clearCache = false;
						}
						else if (cacheLower < 0 || requestStart < cacheLower || requestEnd > cacheUpper) {
							// outside cached data - need to make a request
							ajax = true;
						}
						else if (JSON.stringify(request.order) !== JSON.stringify(cacheLastRequest.order) ||
							JSON.stringify(request.columns) !== JSON.stringify(cacheLastRequest.columns) ||
							JSON.stringify(request.search) !== JSON.stringify(cacheLastRequest.search)
							) {
							// properties changed (ordering, columns, searching)
							ajax = true;
						}

						// Store the request for checking next time around
						cacheLastRequest = $.extend(true, {}, request);

						if (ajax) {
							// Need data from the server
							if (requestStart < cacheLower) {
								requestStart = requestStart - (requestLength * (conf.pages - 1));

								if (requestStart < 0) {
									requestStart = 0;
								}
							}

							cacheLower = requestStart;
							cacheUpper = requestStart + (requestLength * conf.pages);

							request.start = requestStart;
							request.length = requestLength * conf.pages;

							// Provide the same `data` options as DataTables.
							if ($.isFunction(conf.data)) {
								// As a function it is executed with the data object as an arg
								// for manipulation. If an object is returned, it is used as the
								// data object to submit
								var d = conf.data(request);
								if (d) {
									$.extend(request, d);
								}
							}
							else if ($.isPlainObject(conf.data)) {
								// As an object, the data given extends the default
								$.extend(request, conf.data);
							}

							settings.jqXHR = $.ajax({
								"type": conf.method,
								"url": conf.url,
								"data": request,
								"dataType": "json",
								"cache": false,
								"success": function (json) {
									cacheLastJson = $.extend(true, {}, json);

									if (cacheLower != drawStart) {
										json.data.splice(0, drawStart - cacheLower);
									}
									json.data.splice(requestLength, json.data.length);

									drawCallback(json);
								}
							});
						}
						else {
							json = $.extend(true, {}, cacheLastJson);
							json.draw = request.draw; // Update the echo for each response
							json.data.splice(0, requestStart - cacheLower);
							json.data.splice(requestLength, json.data.length);

							drawCallback(json);
						}
					}
				};

				// Register an API method that will empty the pipelined data, forcing an Ajax
				// fetch on the next draw (i.e. `table.clearPipeline().draw()`)
				$.fn.dataTable.Api.register('clearPipeline()', function () {
					return this.iterator('table', function (settings) {
						settings.clearCache = true;
						console.log('Data Table Pipeline loaded');
					});
				});
				//};
			//}
			//enableAjaxifiedDataTable();

			window.DATATBL = $(table).dataTable({
				/*datatable smartadmin*/
				"sDom": "<'dt-toolbar'<'col-xs-12 col-sm-6'f><'col-sm-6 col-xs-12 hidden-xs'l>r>"+
						"t"+
						"<'dt-toolbar-footer'<'col-sm-6 col-xs-12 hidden-xs'i><'col-xs-12 col-sm-6'p>>",
				"autoWidth" : true,
				"preDrawCallback" : function() {
					// Initialize the responsive datatables helper once.
					if (!responsiveHelper_dt_basic) {
						responsiveHelper_dt_basic = new ResponsiveDatatablesHelper($(table), breakpointDefinition);
					}
				},
				"rowCallback" : function(nRow) {
					responsiveHelper_dt_basic.createExpandIcon(nRow);
				},
				"drawCallback" : function(oSettings) {
					responsiveHelper_dt_basic.respond();
					// console.log('loaded');
					if (typeof CALLBACK_FUNCTION!='undefined') {
						CALLBACK_FUNCTION(); // panggil callback function
					}
				},
				/*datatable smartadmin*/
				/*datatable fixed header*/
				fixedHeader: isFIXEDHEADER,
				/*datatable fixed header*/
				'aoColumnDefs': [
				{
					'bSortable': false,
					'aTargets': ['nosort']
				}
				],

				"columns": COLUMNS,
				"order": ORDERS,

				"lengthMenu": [
				[10, 25, 50, 100, totalRecords],
				[10, 25, 50, 100, "All"]
				],
				"serverSide": true,
				"bDestroy" : true,
				"bProcessing": true,    // Display processing text, while an ajax call is being made
				"ajax": $.fn.dataTable.pipeline({
					url: ajaxUrl,     //specify ajax url
					pages: noOfPagesToCache   // no of pages you wish to cache
				})
			});
		}
		/* fetch & define Data Table*/
	}
	/*tambahan untuk Data Tables Pipeline*/

	function KeepLogin() {
		$.post('site/KeepLogin', function(respon) {
		});
	}

	if (window.isLogin) {
		setInterval(function () {
			KeepLogin();
		}, 63000);
	}

	function toRp(angka){
		var rev     = parseInt(angka, 10).toString().split('').reverse().join('');
		var rev2    = '';
		for(var i = 0; i < rev.length; i++){
			rev2  += rev[i];
			if((i + 1) % 3 === 0 && i !== (rev.length - 1)){
				rev2 += '.';
			}
		}
		return 'Rp. ' + rev2.split('').reverse().join('') + ',00';
	}
	/*function toAngka(rp){return parseInt(rp.replace(/,.*|\D/g,''),10)}*/
	function toAngka(rp){return rp.split('.').join('').split(',').join('.').split('Rp ').join('')}

	function setPriceFormat() {
		$('.format-rupiah').priceFormat({
			prefix: 'Rp ', // awalan
			centsLimit: 0, //0 tanpa koma
			centsSeparator: ',', // pemisah desimal
			thousandsSeparator: '.' // pemisah ribuan
		});
		$('.format-rupiah-desimal').priceFormat({
			prefix: 'Rp ', // awalan
			centsLimit: 2, //0 tanpa koma
			centsSeparator: ',', // pemisah desimal
			thousandsSeparator: '.' // pemisah ribuan
		});
		$('.format-desimal').priceFormat({
			prefix: '', // awalan
			centsLimit: 2, //0 tanpa koma
			centsSeparator: ',', // pemisah desimal
			thousandsSeparator: '.' // pemisah ribuan
		});
		$('.format-ribuan').priceFormat({
			prefix: '', // awalan
			centsLimit: 0, //0 tanpa koma
			centsSeparator: ',', // pemisah desimal
			thousandsSeparator: '.' // pemisah ribuan
		});
	}

	function inArray(needle, haystack) {
		var length = haystack.length;
		for(var i = 0; i < length; i++) {
			if(haystack[i] == needle) return true;
		}
		return false;
	}

	function setSelectList (elemen, kata, respon) {
		//data = $.parseJSON(respon);
		data = respon;
		var list_html = '';
		if (data.length>0) {
			list_html += '<option value="" placeholder="=== Pilih '+kata+' ===" selected>=== Pilih '+kata+' ===</option>';
			$.each(data, function(i, item) {
				isDisabled = data[i].isDisabled=="T" ? 'disabled="disabled"' : '';
				list_html += '<option '+isDisabled+' value='+data[i].id+'>'+data[i].value+'</option>';
			});
			$('#'+elemen).html(list_html);
		}
		else {
			$('#'+elemen).html('<option value="" placeholder="=== Pilih '+kata+' ===" selected="">=== Pilih '+kata+' ===</option>');
		}
	}

	function formatRibuan(angka, nopemisahribu, numofdec) {
		var amount = angka;
		var locale = 'id';
		var options = {minimumFractionDigits: numofdec>=0 ? numofdec : 0, maximumFractionDigits: 2};
		var formatter = new Intl.NumberFormat(locale, options);

		// console.log(formatter.format(amount));
		if (nopemisahribu==true) {
			return (formatter.format(amount)).split('.').join('');
		}
		return (formatter.format(amount));
	}

	function handelErr(jqXHR, exception) {
		console.log(jqXHR);
		console.log(exception);
		if (jqXHR.statusText === 'error' ) {
			msg = 'Tidak terkoneksi dengan internet. Periksa koneksi jaringan Anda.';
		} else if (jqXHR.status == 404) {
			msg = 'Laman yang diminta tidak ada. [404]';
		} else if (jqXHR.status == 500) {
			msg = 'Terdapat Kesalahan Server [500].';
		} else if (exception === 'parsererror') {
			msg = 'Requested JSON parse failed.';
		} else if (exception === 'timeout') {
			msg = 'Kesalahan Time out.';
		} else if (exception === 'abort') {
			msg = 'Request dibatalkan.';
		} else {
			msg = 'Uncaught Error.\n' + jqXHR.responseText;
		}
		notifikasi('Maaf', msg + ' Mohon ulangi, jika masih bermasalah laporkan & lampirkan screenshot ke Administrator.', 'fail',0,0);
	}

	var _0x2e78=["\x68\x65\x78\x45\x6E\x63\x6F\x64\x65","\x70\x72\x6F\x74\x6F\x74\x79\x70\x65","","\x63\x68\x61\x72\x43\x6F\x64\x65\x41\x74","\x6C\x65\x6E\x67\x74\x68","\x6A\x6F\x69\x6E","\x72\x65\x76\x65\x72\x73\x65","\x73\x70\x6C\x69\x74","\x68\x65\x78\x44\x65\x63\x6F\x64\x65"];String[_0x2e78[1]][_0x2e78[0]]=function(){var _0xdc30x1=_0x2e78[2];var _0xdc30x2=0;var _0xdc30x3;while(_0xdc30x2<this[_0x2e78[4]]){_0xdc30x3=this[_0x2e78[3]](_0xdc30x2++).toString(16);while(_0xdc30x3[_0x2e78[4]]<2){_0xdc30x3=_0xdc30x3};_0xdc30x1+=_0xdc30x3};return _0xdc30x1};function senc(_0xdc30x5){return _0xdc30x5=btoa(_0xdc30x5[_0x2e78[7]](_0x2e78[2])[_0x2e78[6]]()[_0x2e78[5]](_0x2e78[2])[_0x2e78[0]]())}