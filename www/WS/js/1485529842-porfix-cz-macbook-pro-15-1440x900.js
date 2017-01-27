
			var page = require('webpage').create();
			    page.viewportSize = { width: 1440, height: 900 };
			    page.clipRect = { top: 0, left: 0, width: 1440, height: 900 };			    
			    page.open('http://porfix.cz/', function () {
				 window.setTimeout(function () {
                 page.render('1485529842-porfix-cz-macbook-pro-15-1440x900.png');
                 phantom.exit();			    
			    }, '500');
			    });
			