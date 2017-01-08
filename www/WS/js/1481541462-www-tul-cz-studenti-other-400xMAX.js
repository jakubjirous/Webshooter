
			var page = require('webpage').create();
			    page.open('http://www.tul.cz/studenti', function () {
				page.viewportSize = { width: 400, height: 768 };
				page.render('1481541462-www-tul-cz-studenti-other-400xMAX.jpg');
				slimer.exit();
			    });
			