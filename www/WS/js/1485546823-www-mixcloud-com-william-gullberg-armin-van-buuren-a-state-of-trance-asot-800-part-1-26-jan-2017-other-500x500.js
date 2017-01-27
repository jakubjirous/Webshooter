
			var page = require('webpage').create();
			    page.viewportSize = { width: 500, height: 500 };
			    page.clipRect = { top: 0, left: 0, width: 500, height: 500 };			    
			    page.open('https://www.mixcloud.com/william-gullberg/armin-van-buuren-a-state-of-trance-asot-800-part-1-26-jan-2017/', function () {
				 window.setTimeout(function () {
                 page.render('1485546823-www-mixcloud-com-william-gullberg-armin-van-buuren-a-state-of-trance-asot-800-part-1-26-jan-2017-other-500x500.png');
                 phantom.exit();			    
			    }, '500');
			    });
			