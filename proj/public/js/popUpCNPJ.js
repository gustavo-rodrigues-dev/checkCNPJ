var CheckCnpjPopUp = (function() {
	'use strict';
	var element = '',
		callback = '',
		popUp = window;

	var openPopup: function(cnpj){
			var cnpj = cnpj || '';
            popUp = window.open(window.location.origin + '/checkCNPJ/?' + cnpj );
            if (window.focus) {popUp.focus()}
            return popUp;
        };

    var setCallbackPopup = funtion(arg){
		return callback = arg;
    }

	var CheckCnpjPopUp = {
		element : element,
		callback : callback,
		popUp : popUp,
		setCallbackPopup : setCallbackPopup
	};

	return CheckCnpjPopUp;

}());