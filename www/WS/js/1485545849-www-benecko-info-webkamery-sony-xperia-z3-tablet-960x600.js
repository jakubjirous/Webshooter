
			var page = require('webpage').create();
			    page.viewportSize = { width: 960, height: 600 };
			    page.clipRect = { top: 0, left: 0, width: 960, height: 600 };			    
			    page.open('http://www.benecko.info/webkamery/', function () {
				 window.setTimeout(function () {
                 page.render('1485545849-www-benecko-info-webkamery-sony-xperia-z3-tablet-960x600.png');
                 phantom.exit();			    
			    }, '500');
			    });
			