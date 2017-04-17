
               var page = require('webpage').create();
                   page.open('https://www.czc.cz/', function () {
                   page.viewportSize = { width: 1280, height: 800 };
                   page.clipRect = { top: 0, left: 0, width: 1280, height: 800 };			    
                   window.setTimeout(function () {
                       page.render('1492428061-www.czc.cz-nexus-10-1280x800.png');
                       slimer.exit();			    
                   }, '500');
                   });
               