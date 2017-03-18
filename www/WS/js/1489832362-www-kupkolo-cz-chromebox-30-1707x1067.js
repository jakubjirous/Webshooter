
               var page = require('webpage').create();
                   page.open('https://www.kupkolo.cz/', function () {
                   page.viewportSize = { width: 1707, height: 1067 };
                   page.clipRect = { top: 0, left: 0, width: 1707, height: 1067 };			    
                   window.setTimeout(function () {
                       page.render('1489832362-www-kupkolo-cz-chromebox-30-1707x1067.png');
                       slimer.exit();			    
                   }, '500');
                   });
               