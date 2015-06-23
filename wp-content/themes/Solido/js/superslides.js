"use strict";

jQuery(document).ready(function(){

	function loadsuperslides(){
      jQuery('.slides-1').superslides({
        hashchange: false,
        animation: 'fade',
		play: 10000,
		pagination: false
      });
	}

	loadsuperslides();
});