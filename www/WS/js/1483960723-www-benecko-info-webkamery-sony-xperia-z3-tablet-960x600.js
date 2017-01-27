
			var page = require('webpage').create();
			    page.open('http://www.benecko.info/webkamery/', function () {
             page.viewportSize = { width: 960, height: 600 };
				 page.clipRect = { top: 0, left: 0, width: 960, height: 600 };			    
				 window.setTimeout(function () {
                 page.render('1483960723-www-benecko-info-webkamery-sony-xperia-z3-tablet-960x600.png');
                 slimer.exit();			    
			    }, '500');
			    });
			