
               var page = require('webpage').create();
                   page.open('http://www.apul.cz/', function () {
                   page.viewportSize = { width: 800, height: 1280 };
                   page.clipRect = { top: 0, left: 0, width: 800, height: 1280 };			    
                   window.setTimeout(function () {
                       page.render('1487517658-www-apul-cz-dell-venue-8-800x1280.jpg', {format: 'jpg', quality: '100'});
                       slimer.exit();			    
                   }, '500');
                   });
               