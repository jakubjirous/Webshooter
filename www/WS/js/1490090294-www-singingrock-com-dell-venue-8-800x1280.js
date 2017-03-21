
               var page = require('webpage').create();
                   page.viewportSize = { width: 800, height: 1280 };
                   page.clipRect = { top: 0, left: 0, width: 800, height: 1280 };			    
                   page.open('http://www.singingrock.com/', function () {
                   window.setTimeout(function () {
                       page.render('1490090294-www-singingrock-com-dell-venue-8-800x1280.png');
                       phantom.exit();			    
                   }, '500');
                   });
               