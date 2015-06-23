// Avoid `console` errors in browsers that lack a console.
"use strict";
(function($) {
	$(document).ready(function(){
		var drag;
		if($(window).width()<796){drag=false;}else{drag=true;}
		/* Color Picker */

	  //demo
	 jQuery('.picker-btn').click(function(){
	  if(jQuery('.color-picker').css('right')=='0px'){
	   jQuery('.color-picker').animate({ "right": "-223px" }, "slow" );
	  }else{
	   jQuery('.color-picker').animate({ "right": "0px" }, "slow" );
	  }
	 });
    setTimeout(function(){
    jQuery('.color-picker').animate({ "right": "-223px" }, "slow" );}, 4000);

	var currentColor = 'blue';
	$('body').addClass(currentColor);

	$('.picker-blue').click(function(){
		$('body').removeClass(currentColor);
		$('body').addClass('blue');
		jellythemes.color='blue';
		wpgmappity_maps_loaded();
	});
	$('.picker-black').click(function(){
		$('body').removeClass(currentColor);
		$('body').addClass('black');
		jellythemes.color='black';
		wpgmappity_maps_loaded();
	});
	$('.picker-green').click(function(){
		$('body').removeClass(currentColor);
		$('body').addClass('green');
		jellythemes.color='green';
		wpgmappity_maps_loaded();
	});
	$('.picker-yellow').click(function(){
		$('body').removeClass(currentColor);
		$('body').addClass('yellow');
		jellythemes.color='yellow';
		wpgmappity_maps_loaded();
	});
	$('.picker-red').click(function(){
		$('body').removeClass(currentColor);
		$('body').addClass('red');
		jellythemes.color='red';
		wpgmappity_maps_loaded();
	});
	$('.picker-turquoise').click(function(){
		$('body').removeClass(currentColor);
		$('body').addClass('turquoise');
		jellythemes.color='turquoise';
		wpgmappity_maps_loaded();
	});
	$('.picker-purple').click(function(){
		$('body').removeClass(currentColor);
		$('body').addClass('purple');
		jellythemes.color='purple';
		wpgmappity_maps_loaded();
	});
	$('.picker-orange').click(function(){
		$('body').removeClass(currentColor);
		$('body').addClass('orange');
		jellythemes.color='orange';
		wpgmappity_maps_loaded();
	});
	$('.dark-version').click(function(){
		$('body').addClass('darker');
	});
	$('.light-version').click(function(){
		$('body').removeClass('darker');
	});


			function wpgmappity_maps_loaded() {
				/* googleMaps Footer Map */
				var blue = "#00D6FF"
				var black = "-100"
				var green = "#77be32"
				var yellow = "#f1d301"
				var orange = "#fda527"
				var purple = "#d786fe"
				var red = "#f2333a"
				var turquoise = "#29deb5"

				var color = blue // set your map color here! (blue, black, green, yellow, purple, orange...)
				var saturation = 100
				var pointerUrl = jellythemes.theme_path + '/img/map/pointer-'+jellythemes.color+'.png' // set your color pointer here! (pointer-blue/green/yellow/fucsia/purple/turquoise/red/orange.png)
				switch(jellythemes.color) {
	            	case ('blue'):
				    var color = blue;
					var saturation = 100;
	                break;
	            case ('black'):
					var saturation = black;
	                break;
	            case ('green'):
	                var color = green;
					var saturation = 100;
	                break;
	            case ('yellow'):
	                var color = yellow;
					var saturation = 100;
	                break;
	            case ('red'):
	                var color = red;
					var saturation = 100;
	                break;
	            case ('turquoise'):
	                var color = turquoise;
					var saturation = 100;
	                break;
	            case ('orange'):
	                var color = orange;
					var saturation = 100;
	                break;
	            case ('purple'):
	                var color = purple;
					var saturation = 100;
	                break;
	        }
			var latlng = new google.maps.LatLng($('#maps').data('lat'), $('#maps').data('lon')); <!-- (Fist Value Longitude, Second Value Latitude), can obtain YOUR coordenates here!: http://universimmedia.pagesperso-orange.fr/geo/loc.htm -->
			var styles = [
				{
					"featureType": "landscape",
					"stylers": [
						{"hue": "#000"},
						{"saturation": -100},
						{"lightness": 40},
						{"gamma": 1}
					]
				},
				{
					"featureType": "road.highway",
					"stylers": [
						{"hue": color},
						{"saturation": saturation},
						{"lightness": 20},
						{"gamma": 1}
					]
				},
				{
					"featureType": "road.arterial",
					"stylers": [
						{"hue": color},
						{"saturation": saturation},
						{"lightness": 20},
						{"gamma": 1}
					]
				},
				{
					"featureType": "road.local",
					"stylers": [
						{"hue": color},
						{"saturation": saturation},
						{"lightness": 50},
						{"gamma": 1}
					]
				},
				{
					"featureType": "water",
					"stylers": [
						{"hue": "#000"},
						{"saturation": -100},
						{"lightness": 15},
						{"gamma": 1}
					]
				},
				{
					"featureType": "poi",
					"stylers": [
						{"hue": "#000"},
						{"saturation": -100},
						{"lightness": 25},
						{"gamma": 1}
					]
				}
			];
			var options = {
			 center : latlng,
			 mapTypeId: google.maps.MapTypeId.ROADMAP,
			 zoomControl : false,
			 mapTypeControl : false,
			 scaleControl : false,
			 streetViewControl : false,
			 draggable:drag,
			 scrollwheel:false,
			 panControl : false, zoom : 17,
			 styles: styles
			};
			var wpgmappitymap = new google.maps.Map(document.getElementById('wpgmappitymap'), options);
			var point0 = new google.maps.LatLng($('#maps').data('lat'),$('#maps').data('lon')); <!-- (Fist Value Longitude, Second Value Latitude), can obtain YOUR coordenates here!: http://universimmedia.pagesperso-orange.fr/geo/loc.htm -->
			var marker0= new google.maps.Marker({
			 position : point0,
			 map : wpgmappitymap,
			 icon: pointerUrl //Custom Pointer URL
			 });
			google.maps.event.addListener(marker0,'click',
			 function() {
			 var infowindow = new google.maps.InfoWindow(
			 {content: jellythemes.marker});
			 infowindow.open(wpgmappitymap,marker0);
			 });
			}
			window.onload = function() {
			 wpgmappity_maps_loaded();
			};
		/* End */
	});
})(jQuery);