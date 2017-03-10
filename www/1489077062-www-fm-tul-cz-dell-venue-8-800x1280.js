
               var page = require('webpage').create();
                   page.viewportSize = { width: 800, height: 1280 };
                   page.clipRect = { top: 0, left: 0, width: 800, height: 1280 };			    
                   page.open('http://www.fm.tul.cz/', function () {
                   window.setTimeout(function () {
                       page.render('1489077062-www-fm-tul-cz-dell-venue-8-800x1280.png');
                       phantom.exit();			    
                   }, '500');
                   });
               