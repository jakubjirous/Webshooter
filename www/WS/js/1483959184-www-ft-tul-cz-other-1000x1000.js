
			var page = require('webpage').create();
			    page.open('http://www.ft.tul.cz/', function () {
             page.viewportSize = { width: 1000, height: 1000 };
				 page.clipRect = { top: 0, left: 0, width: 1000, height: 1000 };			    
				 window.setTimeout(function () {
                 page.render('1483959184-www-ft-tul-cz-other-1000x1000.png');
                 slimer.exit();			    
			    }, '500');
			    });
			