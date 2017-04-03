
               var page = require('webpage').create();
                   page.open('https://www.czc.cz/', function () {
                   page.viewportSize = { width: 1707, height: 1067 };
                   page.clipRect = { top: 0, left: 0, width: 1707, height: 1067 };			    
                   window.setTimeout(function () {
                       page.render('1491157722-www-czc-cz-chromebox-30-1707x1067.jpg', {format: 'jpg', quality: '100'});
                       slimer.exit();			    
                   }, '500');
                   });
               