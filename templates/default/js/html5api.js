var icms = icms || {};

icms.html5api = (function ($) {

    this.onDocumentReady = function() {
        /* icms.html5api.bind('a.ajax-html5api');
        icms.html5api.bind('.ajax-html5api a'); */
		console.log('html5api activated...');
		
		// we get a normal Location object

        /*
         * Note, this is the only difference when using this library,
         * because the object window.location cannot be overriden,
         * so library the returns generated "location" object within
         * an object window.history, so get it out of "history.location".
         * For browsers supporting "history.pushState" get generated
         * object "location" with the usual "window.location".
         */
        var location = window.history.location || window.location;

        // looking for all the links and hang on the event, all references in this document
        $(document).on('click', 'a11', function() {
			// keep the link in the browser history
			console.log(this.href);
			// history.pushState(null, null, this.href);
			//icms.html5api.openAjax(this.href, 'test');
			// here can cause data loading, etc.
			
			// Getting Content
            // icms.html5api.getContent(this.href, true);
			var segments = this.href.split( '/' );
			var uri = segments[3];
			var uri_obj = new Object();
			uri_obj['uri'] = '/' + uri;
			// console.log(uri);
            icms.html5api.getContent('/index.php', uri_obj, this.href, true);
			// do not give a default action
			return false;
        });
		
        // hang on popstate event triggered by pressing back/forward in browser
        $(window).on('popstate', function(e) {

          // here can cause data loading, etc.

          // just post
          alert("We returned to the page with a link: " + location.href);
        });
    }
	
    //====================================================================//
	this.getContent = function(url, uri, href, addEntry) {
        $.get(url, uri)
        .done(function( data ) {
// console.log(url);
// console.log(uri);
// console.log(data);
            // Updating Content on Page
            // $('#contentHolder').html(data);
            $('body').html(data);

            if(addEntry == true) {
                // Add History Entry using pushState
                // history.pushState(null, null, url);
                history.pushState(null, null, href);
            }

        });
    }
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
