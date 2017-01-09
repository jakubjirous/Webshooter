
			var page = require('webpage').create();
			    page.viewportSize = { width: 360, height: 640 };
			    page.clipRect = { top: 0, left: 0, width: 360, height: 640 };			    
			    page.open('http://seznam.cz/', function () {
				 window.setTimeout(function () {
                 page.render('1483958666-seznam-cz-sony-xperia-z1-compact-360x640.jpg');
                 phantom.exit();			    
			    }, '500');
			    });
			