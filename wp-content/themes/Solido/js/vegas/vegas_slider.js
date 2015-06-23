"use strict";

jQuery(document).ready(function(){

/* VEGAS Home Slider */
	function loadVegas(){
		var slides = jQuery('.slide-home').data('slides').trim();
		slides = slides.split(",");
		var images = [];
		jQuery.each(slides, function(i, val) {
	        images.push({'src': val.trim(), fade:1000});
	    });
		jQuery.vegas('slideshow', {
			  backgrounds: images
			})('overlay', {
			  src: jellythemes.theme_path + '/css/vegas/overlays/05.png'
			});
			jQuery( "#vegas-next" ).click(function() {
			  jQuery.vegas('next');
			});
			jQuery( "#vegas-prev" ).click(function() {
			  jQuery.vegas('previous');
		});
	}
	if (jQuery('.slide-home').length>0) {
		loadVegas();
	}
});