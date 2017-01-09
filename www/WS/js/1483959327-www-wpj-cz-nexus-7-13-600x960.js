
			var page = require('webpage').create();
			    page.viewportSize = { width: 600, height: 960 };
			    page.clipRect = { top: 0, left: 0, width: 600, height: 960 };			    
			    page.open('http://www.wpj.cz/', function () {
				 window.setTimeout(function () {
                 page.render('1483959327-www-wpj-cz-nexus-7-13-600x960.jpg');
                 phantom.exit();			    
			    }, '500');
			    });
			