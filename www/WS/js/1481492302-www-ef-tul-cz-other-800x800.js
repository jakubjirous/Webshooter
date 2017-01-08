
			var page = require('webpage').create();
			    page.viewportSize = { width: 800, height: 800 };
			    page.clipRect = { top: 0, left: 0, width: 800, height: 800 };			    
			    page.open('https://www.ef.tul.cz/', function () {
				page.render('1481492302-www-ef-tul-cz-other-800x800.jpg');
				phantom.exit();
			    });
			