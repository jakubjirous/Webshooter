
			var page = require('webpage').create();
			    page.viewportSize = { width: 1280, height: 720 };
			    page.clipRect = { top: 0, left: 0, width: 1280, height: 720 };			    
			    page.open('http://www.fs.tul.cz/', function () {
				page.render('1481491305-www-fs-tul-cz-surface-2-1280x720.png');
				phantom.exit();
			    });
			