
			var page = require('webpage').create();
			    page.viewportSize = { width: 411, height: 731 };
			    page.clipRect = { top: 0, left: 0, width: 411, height: 731 };			    
			    page.open('http://www.bymini.cz/', function () {
				 window.setTimeout(function () {
                 page.render('1483959713-www-bymini-cz-google-pixel-xl-411x731.bmp');
                 phantom.exit();			    
			    }, '500');
			    });
			