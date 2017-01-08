
			var page = require('webpage').create();
			    page.viewportSize = { width: 375, height: 667 };
			    page.clipRect = { top: 0, left: 0, width: 375, height: 667 };			    
			    page.open('http://www.wpj.cz/', function () {
				 window.setTimeout(function () {
                 page.render('1481626184-www-wpj-cz-iphone-6-375x667.png');
                 phantom.exit();			    
			    }, '1000');
			    });
			