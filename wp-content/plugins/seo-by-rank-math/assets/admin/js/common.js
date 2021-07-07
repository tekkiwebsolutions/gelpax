!function(e){var t={};function a(n){if(t[n])return t[n].exports;var i=t[n]={i:n,l:!1,exports:{}};return e[n].call(i.exports,i,i.exports,a),i.l=!0,i.exports}a.m=e,a.c=t,a.d=function(e,t,n){a.o(e,t)||Object.defineProperty(e,t,{enumerable:!0,get:n})},a.r=function(e){"undefined"!=typeof Symbol&&Symbol.toStringTag&&Object.defineProperty(e,Symbol.toStringTag,{value:"Module"}),Object.defineProperty(e,"__esModule",{value:!0})},a.t=function(e,t){if(1&t&&(e=a(e)),8&t)return e;if(4&t&&"object"==typeof e&&e&&e.__esModule)return e;var n=Object.create(null);if(a.r(n),Object.defineProperty(n,"default",{enumerable:!0,value:e}),2&t&&"string"!=typeof e)for(var i in e)a.d(n,i,function(t){return e[t]}.bind(null,i));return n},a.n=function(e){var t=e&&e.__esModule?function(){return e.default}:function(){return e};return a.d(t,"a",t),t},a.o=function(e,t){return Object.prototype.hasOwnProperty.call(e,t)},a.p="",a(a.s=85)}({0:function(e,t){e.exports=wp.i18n},1:function(e,t){e.exports=lodash},15:function(e,t,a){"use strict";var n=a(2),i=a.n(n);t.a=function(e,t,a){return i.a.ajax({url:rankMath.ajaxurl,type:a||"POST",dataType:"json",data:i.a.extend(!0,{action:"rank_math_"+e,security:rankMath.security},t)})}},18:function(e,t,a){"use strict";var n=a(2),i=a.n(n);t.a=function(e,t,a,n){t=t||"error",n=n||!1;var o=i()('<div class="notice notice-'+t+' is-dismissible"><p>'+e+"</p></div>").hide();a.next(".notice").remove(),a.after(o),o.slideDown(),i()(document).trigger("wp-updates-notice-added"),n&&setTimeout((function(){o.fadeOut((function(){o.remove()}))}),n)}},2:function(e,t){e.exports=jQuery},54:function(e,t,a){"use strict";var n=a(2),i=a.n(n);t.a=function(e){var t=e||".rank-math-box-tabs";i()(t).children().on("click",(function(e){e.preventDefault();var t=i()(this),a=t.attr("href").substr(1);t.addClass("active-tab").siblings().removeClass("active-tab"),i()("#"+a).addClass("active-tab").siblings().removeClass("active-tab")}))}},85:function(e,t,a){"use strict";a.r(t);var n=a(2),i=a.n(n),o=a(0),r=a(15),c=a(18),s=a(1);function l(e,t){for(var a=0;a<t.length;a++){var n=t[a];n.enumerable=n.enumerable||!1,n.configurable=!0,"value"in n&&(n.writable=!0),Object.defineProperty(e,n.key,n)}}var d,p=new(function(){function e(){!function(e,t){if(!(e instanceof t))throw new TypeError("Cannot call a class as a function")}(this,e),this.response=""}var t,a,n;return t=e,(a=[{key:"checkAll",value:function(){var e=this,t=i()("#setting-panel-analytics .cmb2-id-check-all-services:not(.done), #cmb2-metabox-rank-math-wizard .cmb2-id-check-all-services:not(.done)");t.length>0&&"0"==t.val()&&(t.addClass("done"),Object(r.a)("google_check_all_services").done((function(t){e.response=t,e.fillSelect(),e.accordions.removeClass("locked")})))}},{key:"events",value:function(){var e=this;this.saveChanges=!1,this.accountSelect=i()(".site-analytics-account"),this.profileSelect=i()(".site-console-profile"),this.propertySelect=i()(".site-analytics-property"),this.viewSelect=i()(".site-analytics-view"),this.adsenseSelect=i()(".site-adsense-account"),this.accordions=i()(".rank-math-accordion"),this.countryConsole=i()("#site-console-country"),this.countryAnalytics=i()("#site-analytics-country"),this.accountSelect.on("change",(function(){var t=parseInt(e.accountSelect.val());0!==t?e.fillPropertySelect(t):e.propertySelect.html('<option value="0">Select Property</option>')})),i()([".rank-math-wizard-body--analytics .form-footer.rank-math-ui .button-primary",".rank-math_page_rank-math-options-general .form-footer.rank-math-ui .button-primary"].join(", ")).on("click",(function(t){e.submitButtonHandler(t)})),this.propertySelect.on("change",(function(){var t=e.accountSelect.val(),a=e.propertySelect.val(),n=e.response.accounts;e.response.views=Object(s.get)(n,[t,"properties",a,"profiles"],{}),e.fillViewSelect()})),i()(".rank-math-disconnect-google").on("click",(function(e){e.preventDefault(),confirm(rankMath.confirmDisconnect)&&Object(r.a)("disconnect_google").done((function(){window.location.reload()}))}))}},{key:"submitButtonHandler",value:function(e){var t=i()(e.target);e.preventDefault(),this.saveConsole(),this.saveAnalytics(),this.saveAdsense(),setTimeout((function(){t.off("click").trigger("click")}),100)}},{key:"saveConsole",value:function(){if(0!==parseInt(this.profileSelect.val())){var e={profile:this.profileSelect.val(),country:this.countryConsole.val()},t=i()("#console_caching_control");t.length>0&&(e.days=t.val()),Object(r.a)("save_analytic_profile",e,"post")}}},{key:"saveAnalytics",value:function(){var e={accountID:this.accountSelect.val(),propertyID:this.propertySelect.val(),viewID:this.viewSelect.val(),country:this.countryAnalytics.val(),installCode:i()("#install-code").is(":checked"),anonymizeIP:i()("#anonymize-ip").is(":checked"),localGAJS:i()("#local-ga-js").is(":checked"),cookielessGA:i()("#cookieless-ga").is(":checked"),excludeLoggedin:i()("#exclude-loggedin").is(":checked")};if(0!==parseInt(e.accountID)&&0!==parseInt(e.propertyID)){var t=i()("#console_caching_control");t.length>0&&(e.days=t.val()),Object(r.a)("save_analytic_options",e,"post")}}},{key:"saveAdsense",value:function(){var e={accountID:this.adsenseSelect.val()};e.accountID&&Object(r.a)("save_adsense_account",e,"post")}},{key:"fillSelect",value:function(){var e=this,t=this.response,a=t.inSearchConsole,n=t.isVerified;this.fillProfileSelect(),this.fillAccountSelect(),this.fillAdsenseSelect(),a||Object(r.a)("add_site_console").done((function(t){e.response.sites=t.sites,e.fillProfileSelect()})),a&&!n&&Object(r.a)("verify_site_console"),this.saveChanges=!1}},{key:"fillAdsenseSelect",value:function(){var e=this,t=this.response.adsenseAccounts,a=void 0!==t&&t;!1!==a&&(this.adsenseSelect.html('<option value="0">Select Account</option>'),Object(s.map)(a,(function(t,a){e.adsenseSelect.append('<option value="'+a+'">'+t.name+"</option>")})),this.adsenseSelect.data("selected")&&this.adsenseSelect.val(this.adsenseSelect.data("selected")),this.adsenseSelect.prop("disabled",!1))}},{key:"fillAccountSelect",value:function(){var e=this,t=this.response.accounts;this.accountSelect.html('<option value="0">Select Account</option>'),Object(s.map)(t,(function(t,a){e.accountSelect.append('<option value="'+a+'">'+t.name+"</option>")})),this.accountSelect.data("selected")?this.accountSelect.val(this.accountSelect.data("selected")):(this.accountSelect.prop("disabled",!1),this.countryAnalytics.prop("disabled",!1)),this.accountSelect.trigger("change")}},{key:"fillPropertySelect",value:function(e){var t=this,a=this.response,n=a.accounts,i=a.homeUrl,o=n[e].properties;this.propertySelect.html('<option value="0">Select Property</option>'),Object(s.map)(o,(function(e){var a=e.url===i?' selected="selected"':"";t.propertySelect.append("<option"+a+' value="'+e.id+'">'+e.name+"</option>")})),this.propertySelect.data("selected")?this.propertySelect.val(this.propertySelect.data("selected")):this.propertySelect.prop("disabled",!1),this.propertySelect.trigger("change")}},{key:"fillProfileSelect",value:function(){var e=this,t=this.response,a=t.sites,n=t.homeUrl;this.profileSelect.html('<option value="0">Select Profile</option>');var i=!1;Object(s.map)(a,(function(t,a){i=a===n?' selected="selected"':"",e.profileSelect.append("<option"+i+' value="'+a+'">'+t+"</option>")})),this.profileSelect.data("selected")&&this.profileSelect.closest(".rank-math-accordion").addClass("connected"),this.profileSelect.prop("disabled",!1),this.countryConsole.prop("disabled",!1)}},{key:"fillViewSelect",value:function(){var e=this;this.viewSelect.html('<option value="0">Select Web View</option>');var t=this.response.views;Object(s.map)(t,(function(t){e.viewSelect.append('<option value="'+t.id+'">'+t.name+"</option>")})),this.viewSelect.data("selected")&&this.viewSelect.val(this.viewSelect.data("selected")),this.viewSelect.prop("disabled",!1)}}])&&l(t.prototype,a),n&&l(t,n),e}()),u=a(54);d=i.a,String.prototype.format||(String.prototype.format=function(){var e=arguments;return this.replace(/{(\d+)}/g,(function(t,a){return void 0!==e[a]?e[a]:t}))}),String.prototype.trimRight=function(e){return void 0===e&&(e="s"),this.replace(new RegExp("["+e+"]+$"),"")},d((function(){window.rankMathAdmin={init:function(){this.misc(),this.tabs(),this.dependencyManager(),-1!==Object.values(window.rankMath.modules).indexOf("analytics")&&(p.events(),p.checkAll())},misc:function(){void 0!==i.a.fn.select2&&d("[data-s2]").select2(),d(".cmb-group-text-only,.cmb-group-fix-me").each((function(){var e=d(this),t=e.find(".cmb-repeatable-group"),a=t.find("> .cmb-row:eq(0) > .cmb-th");e.prepend('<div class="cmb-th"><label>'+a.find("h2").text()+"</label></div>"),t.find(".cmb-add-row").append('<span class="cmb2-metabox-description">'+a.find("p").text()+"</span>"),a.parent().remove()})),d(".rank-math-collapsible-trigger").on("click",(function(e){e.preventDefault();var t=d(this),a=d("#"+t.data("target"));t.toggleClass("open"),a.toggleClass("open")}));var e=d("#rank_math_rich_snippet"),t=e.find("option[value=review]"),a=e.val();t&&(t.prop("disabled",!0),"review"===a&&d(".cmb2-id-rank-math-review-schema-notice").removeClass("hidden"),e.on("change",(function(){null!==e.val()&&"review"!==e.val()&&d(".cmb2-id-rank-math-review-schema-notice").addClass("hidden")})))},searchConsole1:function(){var e=d(".cmb2-id-console-authorization-code"),t=d("#console_authorization_code"),a=d("#gsc-dp-info"),n=d("#console_profile"),i=n.parent().find(".rank-math-refresh"),s=t.parent(),l=d("body").hasClass("rank-math-wizard-body--analytics")?d("> p:first-of-type",".cmb-form"):d("h1",".rank-math-wrap-settings");s.on("click",".rank-math-deauthorize-account",(function(a){a.preventDefault();var s=d(this);if(s.prop("disabled",!0),t.data("authorized"))return Object(r.a)("search_console_deauthentication").always((function(){s.prop("disabled",!1)})).done((function(){t.val(""),t.show(),t.data("authorized",!1),e.removeClass("authorized").addClass("unauthorized"),s.html(Object(o.__)("Authorize","rank-math")),n.prop("disabled",!0),i.prop("disabled",!0)})),!1;t.addClass("input-loading"),Object(r.a)("search_console_authentication",{code:t.val()}).always((function(){s.prop("disabled",!1),t.removeClass("input-loading")})).done((function(a){a&&!a.success&&Object(c.a)(a.error,"error",l),a&&a.success&&(t.hide(),t.data("authorized",!0),s.html("De-authorize Account"),i.trigger("click"),n.removeAttr("disabled"),e.removeClass("unauthorized authorizing").addClass("authorized"))}))})),n.on("change",(function(){null!==n.val()&&0===n.val().indexOf("sc-domain:")?a.removeClass("hidden"):a.addClass("hidden")})).change(),i.on("click",(function(e){e.preventDefault(),i.prop("disabled",!0),n.addClass("input-loading"),Object(r.a)("search_console_get_profiles").always((function(){i.prop("disabled",!1),d(".console-cache-update-manually").prop("disabled",!1),n.removeClass("input-loading")})).done((function(e){if(e&&!e.success&&Object(c.a)(e.error,"error",l),e&&e.success){var t=e.selected||n.val();n.html(""),d.each(e.profiles,(function(e,t){n.append('<option value="'+e+'">'+t+"</option>")})),n.val(t||Object.keys(e.profiles)[0]),i.removeClass("hidden")}}))}))},dependencyManager:function(){var e=this,t=d(".cmb-form, .rank-math-metabox-wrap");d(".cmb-repeat-group-wrap",t).each((function(){var e=d(this),t=e.next(".rank-math-cmb-dependency.hidden");t.length&&e.find("> .cmb-td").append(t)})),d(".rank-math-cmb-dependency",t).each((function(){e.loopDependencies(d(this))})),d("input, select",t).on("change",(function(){var t=d(this).attr("name");d('span[data-field="'+t+'"]').each((function(){e.loopDependencies(d(this).closest(".rank-math-cmb-dependency"))}))}))},checkDependency:function(e,t,a){return"string"==typeof t&&t.includes(",")&&"="===a?t.includes(e):"string"==typeof t&&t.includes(",")&&"!="===a?!t.includes(e):"="===a&&e===t||"=="===a&&e===t||">="===a&&e>=t||"<="===a&&e<=t||">"===a&&e>t||"<"===a&&e<t||"!="===a&&e!==t},loopDependencies:function(e){var t=this,a=e.data("relation"),n=null;e.find("span").each((function(){var e=d(this),i=d("[name='"+e.data("field")+"']"),o=i.val();i.is(":radio")&&(o=i.filter(":checked").val()),i.is(":checkbox")&&(o=i.filter(":checked").val());var r=t.checkDependency(o,e.data("value"),e.data("comparison"));if("or"===a&&r)return n=!0,!1;"and"===a&&(n=(null===n||n)&&r)}));var i=e.closest(".rank-math-cmb-group");i.length||(i=e.closest(".cmb-row")),n?i.slideDown(300):i.hide()},tabs:function(){Object(u.a)();var e=d(".rank-math-tabs-navigation");e.length&&e.each((function(){var t=d(this),a=t.closest(".rank-math-tabs"),n=d(">a",t),i=d(">.rank-math-tabs-content>.rank-math-tab",a),o=t.data("active-class")||"active",r=t.hasClass("before-header");n.on("click",(function(){var e=d(this),t=d(e.attr("href"));if(n.removeClass(o),i.hide(),r){var c=t.find(".cmb-type-title.tab-header").clone();c.addClass("before-header-title"),d(".before-header-title").remove(),a.prepend(c)}return e.addClass(o),t.show(),!1}));var c=window.location.hash||window.localStorage.getItem(a.attr("id"));null===c?n.eq(0).trigger("click"):(c=d('a[href="'+c+'"]',t)).length?c.trigger("click"):n.eq(0).trigger("click"),e.next().css("min-height",t.outerHeight())}))},variableInserter:function(e){var t=d("input[type=text], textarea",".rank-math-supports-variables");if(e=void 0===e||e,t.length){var a,n=this,i=d("body");t.attr("autocomplete","off"),t.wrap('<div class="rank-math-variables-wrap"/>'),d(".rank-math-variables-wrap").append('<a href="#" class="rank-math-variables-button button button-secondary"><span class="dashicons dashicons-arrow-down-alt2"></span></a>'),e&&(d(".rank-math-variables-wrap").after('<div class="rank-math-variables-preview" data-title="'+Object(o.__)("Example","rank-math")+'"/>'),t.on("rank_math_variable_change input",(function(e){var t=d(e.currentTarget),a=n.replaceVariables(t.val());60<a.length&&0<=t.attr("name").indexOf("title")?a=a.substring(0,60)+"...":160<a.length&&0<=t.attr("name").indexOf("description")&&(a=a.substring(0,160)+"...");var i=d("<textarea/>").html(a).val();t.parent().next(".rank-math-variables-preview").text(i)})),t.trigger("rank_math_variable_change"));var r=d("<ul/>"),c=d('<div class="rank-math-variables-dropdown"><input type="text" placeholder="'+Object(o.__)("Search &hellip;","rank-math")+'"></div>');d.each(rankMath.variables,(function(){r.append('<li data-var="%'+this.variable+'%" data-example="'+this.example+'"><strong>'+this.name+"</strong><span>"+this.description+"</span></li>")})),c.append(r),d(".rank-math-variables-wrap:eq(0)").append(c);var s=d(".rank-math-variables-button, .rank-math-variables-button *, .rank-math-variables-dropdown, .rank-math-variables-dropdown *");i.on("click",(function(e){d(e.target).is(s)||h()}));var l=c.find("input"),p=c.find("li");i.on("click",".rank-math-variables-button",(function(e){e.preventDefault();var t=d(this);t.after(c),p.show(),void 0!==(a=t.prev().data("exclude-variables"))&&(a=a.split(","),u()),c.show(),l.val("").focus()})),c.on("click","li",(function(e){e.preventDefault();var t=d(this),a=t.closest(".rank-math-variables-wrap").find("input,textarea");a.val(d.trim(a.val())+" "+t.data("var")),a.trigger("rank_math_variable_change").trigger("input"),h()})),c.on("keyup","input",(function(e){e.preventDefault();var t=d(this).val().toLowerCase();if(2>t.length)return p.show(),void u();p.hide().each((function(){var e=d(this);-1!==e.text().toLowerCase().indexOf(t)&&e.show()})),u()}))}function u(){void 0!==a&&a.forEach((function(e){c.find('[data-var="%'+e+'%"]').hide()}))}function h(){a=void 0,c.hide()}},replaceVariables:function(e){return d.each(rankMath.variables,(function(t){if(!this.example)return!0;var a=new RegExp("\\([a-z]+\\)","g");t=t.replace(a,"\\(.*?\\)"),e=e.replace(new RegExp("%+"+t+"%+","g"),this.example)})),e}},window.rankMathAdmin.init()}))}});