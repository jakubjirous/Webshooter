
			var page = require('webpage').create();
			    page.open('http://www.fm.tul.cz/', function () {
             page.viewportSize = { width: 1280, height: 850 };
				 page.clipRect = { top: 0, left: 0, width: 1280, height: 850 };			    
				 window.setTimeout(function () {
                 page.render('1485716319-www-fm-tul-cz-chomebook-pixel-1280x850.jpg');
                 slimer.exit();			    
			    }, '500');
			    });
			