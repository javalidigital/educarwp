"use strict";

jQuery( document ).ready(function() {

///Android|AppleWebKit|webOS|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent)


if( /Android|iPhone|iPad|iPod|BlackBerry|IEMobile|Opera Mini/i.test(navigator.userAgent) ) {
	 jQuery('#home').css('display','none');
	 jQuery('#wrapper_mbYTP_bgndVideo').css('display','none');
	 jQuery('#homedevice').css('display','block');
}

});