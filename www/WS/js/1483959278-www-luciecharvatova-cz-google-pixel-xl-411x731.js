
			var page = require('webpage').create();
			    page.viewportSize = { width: 411, height: 731 };
			    page.clipRect = { top: 0, left: 0, width: 411, height: 731 };			    
			    page.open('http://www.luciecharvatova.cz/', function () {
				 window.setTimeout(function () {
                 page.render('1483959278-www-luciecharvatova-cz-google-pixel-xl-411x731.jpg');
                 phantom.exit();			    
			    }, '500');
			    });
			