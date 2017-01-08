
			var page = require('webpage').create();
			    page.open('http://www.vzhurudolu.cz/prirucka/reseni-zeldmanovo-zatrzitko', function () {
                page.viewportSize = { width: 1024, height: 768 };
				page.clipRect = { top: 0, left: 0, width: 1024, height: 768 };			    
				page.render('1481535542-www-vzhurudolu-cz-prirucka-reseni-zeldmanovo-zatrzitko-nexus-9-1024x768.png');
				slimer.exit();
			    });
			