
			var page = require('webpage').create();
			    page.viewportSize = { width: 415, height: 738 };
			    page.clipRect = { top: 0, left: 0, width: 415, height: 738 };			    
			    page.open('http://www.wpj.cz/', function () {
				page.render('1481488864-www-wpj-cz-google-pixel-415x738.jpg');
				phantom.exit();
			    });
			