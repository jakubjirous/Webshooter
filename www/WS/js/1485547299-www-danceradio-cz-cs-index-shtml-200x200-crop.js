
			var page = require('webpage').create();
			    page.open('http://www.danceradio.cz/cs/index.shtml', function () {
				 page.viewportSize = { width: 500, height: 500 };
				 page.clipRect = { top: 100, left: 100, width: 200, height: 200 };			    				
				 window.setTimeout(function () {
                 page.render('1485547299-www-danceradio-cz-cs-index-shtml-200x200-crop.jpg');
                 slimer.exit();			    
			    }, '500');
			    });
			