
               var page = require('webpage').create();
                   page.open('https://www.czc.cz/', function () {
                   page.viewportSize = { width: 1280, height: 800 };
                   page.clipRect = { top: 0, left: 0, width: 1280, height: 800 };			    
                   window.setTimeout(function () {
                       page.render('1492420791-www-czc-cz-nexus-10-1280x800.jpg', {format: 'jpg', quality: '100'});
                       slimer.exit();			    
                   }, '500');
                   });
               