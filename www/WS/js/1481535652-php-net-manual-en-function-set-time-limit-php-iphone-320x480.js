
			var page = require('webpage').create();
			    page.viewportSize = { width: 320, height: 480 };
			    page.clipRect = { top: 0, left: 0, width: 320, height: 480 };			    
			    page.open('http://php.net/manual/en/function.set-time-limit.php', function () {
				page.render('1481535652-php-net-manual-en-function-set-time-limit-php-iphone-320x480.png');
				phantom.exit();
			    });
			