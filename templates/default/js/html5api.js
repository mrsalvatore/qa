var icms = icms || {};

icms.html5api = (function ($) {

    this.onDocumentReady = function() {
        /* icms.html5api.bind('a.ajax-html5api');
        icms.html5api.bind('.ajax-html5api a'); */
		console.log('html5api activated...');
    }
	
    //====================================================================//

    //====================================================================//

    this.openAjax = function(url, data, open_callback){

        open_callback = open_callback || function(){};

        if (typeof(data)=='undefined'){
            $.nmManual(url, {autoSizable: true, callbacks: {afterShowCont: open_callback}});
            return false;
        }

        $.nmManual(url, {autoSizable: true, callbacks: {afterShowCont: open_callback}, ajax:{data: data, type: "POST"}});
        return false;

    }

	return this;

}).call(icms.html5api || {},jQuery);
