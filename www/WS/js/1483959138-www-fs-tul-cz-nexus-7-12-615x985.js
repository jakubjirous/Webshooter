
			var page = require('webpage').create();
			    page.open('http://www.fs.tul.cz/', function () {
             page.viewportSize = { width: 615, height: 985 };
				 page.clipRect = { top: 0, left: 0, width: 615, height: 985 };			    
				 window.setTimeout(function () {
                 page.render('1483959138-www-fs-tul-cz-nexus-7-12-615x985.jpg');
                 slimer.exit();			    
			    }, '500');
			    });
			