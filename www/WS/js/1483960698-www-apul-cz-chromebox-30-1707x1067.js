
			var page = require('webpage').create();
			    page.viewportSize = { width: 1707, height: 1067 };
			    page.clipRect = { top: 0, left: 0, width: 1707, height: 1067 };			    
			    page.open('http://www.apul.cz/', function () {
				 window.setTimeout(function () {
                 page.render('1483960698-www-apul-cz-chromebox-30-1707x1067.png');
                 phantom.exit();			    
			    }, '500');
			    });
			