
               var page = require('webpage').create();
                   page.viewportSize = { width: 800, height: 1280 };
                   page.clipRect = { top: 0, left: 0, width: 800, height: 1280 };			    
                   page.open('http://www.wpj.cz/', function () {
                   window.setTimeout(function () {
                       page.render('1487747367-www-wpj-cz-dell-venue-8-800x1280.png');
                       phantom.exit();			    
                   }, '500');
                   });
               