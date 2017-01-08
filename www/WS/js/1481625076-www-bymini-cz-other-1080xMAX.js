
			var page = require('webpage').create();
			    page.viewportSize = { width: 1080, height: 768 };
			    page.open('http://www.bymini.cz/', function () {
				 window.setTimeout(function () {
                 page.render('1481625076-www-bymini-cz-other-1080xMAX.jpg');
                 phantom.exit();			    
			    }, '1000');
			    });
			