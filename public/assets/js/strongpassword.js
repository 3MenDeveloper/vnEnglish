/*  Author Details
	==============
	Author: Ranjith Pandi

	Author URL: http://ranjithpandi.com

	Attribution is must on every page, where this work is used.

	For Attribution removal request. please consider contacting us through http://ranjithpandi.com/#contact
*/

;(function ($) {

	$.fn.strongPassword = function() {
		var password = [];
		var passlen = $("#pass-len").val();
		var symbols = $("#pass-symbols").is(':checked');
		var digits = $("#pass-digits").is(':checked');
		var lowerCase = $("#pass-lower").is(':checked');
		var upperCase = $("#pass-upper").is(':checked');
		var similar = $("#pass-similar").is(':checked');
		var rememberOptions = $("#pass-remember").is(':checked');

		var chars = '';
		if(symbols){
			if(!similar){
				chars += "#$%&()*+,-./:;<=>?@[]^_{}~";
			}else{
				chars += "!#$%&()*+,-./:;<=>?@[]^_{|}~";
			}
		}

		if(digits){
			if(!similar){
				chars += '23456789';
			}else{
				chars += '0123456789';
			}
		}

		if(lowerCase){
			if(!similar){
				chars += 'abcdefghjkmnpqrstuvwxyz';
			}else{
				chars += 'abcdefghijklmnopqrstuvwxyz';
			}
		}

		if(upperCase){
			if(!similar){
				chars += 'ABCDEFGHJKMNPQRSTUVWXYZ';
			}else{
				chars += 'ABCDEFGHIJKLMNOPQRSTUVWXYZ';
			}
		}

		for(i=0, len = chars.length; i < passlen; i++) {
			var num = randomNumber(len);
			password.push(chars.charAt(num));
		}
		$(this).val(password.join(''));
	}

	randomNumber = function(n) {
		return Math.floor(Math.random() * n);
	}

})(jQuery);