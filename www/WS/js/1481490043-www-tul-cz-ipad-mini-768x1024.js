
			var page = require('webpage').create();
			    page.viewportSize = { width: 768, height: 1024 };
			    page.clipRect = { top: 0, left: 0, width: 768, height: 1024 };			    
			    page.open('http://www.tul.cz/', function () {
				page.render('1481490043-www-tul-cz-ipad-mini-768x1024.png');
				phantom.exit();
			    });
			