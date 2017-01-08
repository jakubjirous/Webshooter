
			var page = require('webpage').create();
			    page.viewportSize = { width: 2560, height: 1440 };
			    page.clipRect = { top: 0, left: 0, width: 2560, height: 1440 };			    
			    page.open('http://tuni.tul.cz/rubriky/udalosti', function () {
				page.render('1481535485-tuni-tul-cz-rubriky-udalosti-imac-27-2560x1440.jpg');
				phantom.exit();
			    });
			