
			var page = require('webpage').create();
			    page.viewportSize = { width: 2560, height: 1440 };
			    page.clipRect = { top: 0, left: 0, width: 2560, height: 1440 };			    
			    page.open('http://www.fp.tul.cz/', function () {
				page.render('1481492266-www-fp-tul-cz-imac-5k-2560x1440.gif');
				phantom.exit();
			    });
			