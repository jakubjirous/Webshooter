
			var page = require('webpage').create();
			    page.viewportSize = { width: 411, height: 731 };
			    page.clipRect = { top: 0, left: 0, width: 411, height: 731 };			    
			    page.open('http://www.tul.cz/', function () {
				page.render('1481541428-www-tul-cz-google-pixel-xl-411x731.png');
				phantom.exit();
			    });
			