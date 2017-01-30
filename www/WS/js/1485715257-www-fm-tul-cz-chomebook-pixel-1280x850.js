
			var page = require('webpage').create();
			    page.viewportSize = { width: 1280, height: 850 };
			    page.clipRect = { top: 0, left: 0, width: 1280, height: 850 };			    
			    page.open('http://www.fm.tul.cz/', function () {
				 window.setTimeout(function () {
                 page.render('1485715257-www-fm-tul-cz-chomebook-pixel-1280x850.jpg');
                 phantom.exit();			    
			    }, '500');
			    });
			