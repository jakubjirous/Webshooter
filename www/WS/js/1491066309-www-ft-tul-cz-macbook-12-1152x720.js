
               var page = require('webpage').create();
                   page.open('http://www.ft.tul.cz/', function () {
                   page.viewportSize = { width: 1152, height: 720 };
                   page.clipRect = { top: 0, left: 0, width: 1152, height: 720 };			    
                   window.setTimeout(function () {
                       page.render('1491066309-www-ft-tul-cz-macbook-12-1152x720.png');
                       slimer.exit();			    
                   }, '500');
                   });
               