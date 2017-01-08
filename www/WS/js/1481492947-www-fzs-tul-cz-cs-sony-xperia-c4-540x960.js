
			var page = require('webpage').create();
			    page.open('http://www.fzs.tul.cz/cs/', function () {
                page.viewportSize = { width: 540, height: 960 };
				page.clipRect = { top: 0, left: 0, width: 540, height: 960 };			    
				page.render('1481492947-www-fzs-tul-cz-cs-sony-xperia-c4-540x960.jpg');
				slimer.exit();
			    });
			