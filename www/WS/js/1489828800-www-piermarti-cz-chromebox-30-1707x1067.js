
               var page = require('webpage').create();
                   page.open('http://www.piermarti.cz/', function () {
                   page.viewportSize = { width: 1707, height: 1067 };
                   page.clipRect = { top: 0, left: 0, width: 1707, height: 1067 };			    
                   window.setTimeout(function () {
                       page.render('1489828800-www-piermarti-cz-chromebox-30-1707x1067.png');
                       slimer.exit();			    
                   }, '500');
                   });
               