
			var page = require('webpage').create();
			    page.viewportSize = { width: 800, height: 800 };
			    page.clipRect = { top: 100, left: 100, width: 100, height: 100 };			    
			    page.open('http://www.fm.tul.cz/', function () {
				page.render('1481492638-www-fm-tul-cz-100x100-crop.png');
				phantom.exit();
			    });
			