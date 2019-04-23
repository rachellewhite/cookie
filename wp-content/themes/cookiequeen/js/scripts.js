(function ($, root, undefined) {

	$(function () {

		'use strict';

$('[data-fancybox="gallery"]').fancybox({
	// Options will go here
	arrows: false,
	infobar: false,
	smallBtn: true,
	protect: true,
	image : {
		preload: false
	},
	buttons: [
		"close"
	],
 	animationEffect: "fade",
 	baseTpl:
    '<div class="fancybox-container" role="dialog" tabindex="-1">' +
    '<div class="fancybox-bg"></div>' +
    '<div class="fancybox-inner">' +
    '<div class="fancybox-infobar"><span data-fancybox-index></span>&nbsp;/&nbsp;<span data-fancybox-count></span></div>' +
    '<div class="fancybox-toolbar">{{buttons}}</div>' +
    '<div class="fancybox-navigation">{{arrows}}</div>' +
    '<div class="fancybox-stage"></div>' +
    '<div class="fancybox-caption"></div>' +
    "</div>" +
    "</div>",
		});

		document.addEventListener("DOMContentLoaded", function() {
		  var lazyloadImages = document.querySelectorAll("img.lazy");
		  var lazyloadThrottleTimeout;

		  function lazyload () {
		    if(lazyloadThrottleTimeout) {
		      clearTimeout(lazyloadThrottleTimeout);
		    }

		    lazyloadThrottleTimeout = setTimeout(function() {
		        var scrollTop = window.pageYOffset;
		        lazyloadImages.forEach(function(img) {
		            if(img.offsetTop < (window.innerHeight + scrollTop)) {
		              img.src = img.dataset.src;
		              img.classList.remove('lazy');
		            }
		        });
		        if(lazyloadImages.length == 0) {
		          document.removeEventListener("scroll", lazyload);
		          window.removeEventListener("resize", lazyload);
		          window.removeEventListener("orientationChange", lazyload);
		        }
		    }, 20);
		  }

		  document.addEventListener("scroll", lazyload);
		  window.addEventListener("resize", lazyload);
		  window.addEventListener("orientationChange", lazyload);
		});

	});

})(jQuery, this);
