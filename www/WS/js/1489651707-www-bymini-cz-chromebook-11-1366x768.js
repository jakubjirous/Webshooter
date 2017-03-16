
               var page = require('webpage').create();
                   page.open('http://www.bymini.cz/', function () {
                   page.viewportSize = { width: 1366, height: 768 };
                   page.clipRect = { top: 0, left: 0, width: 1366, height: 768 };			    
                   window.setTimeout(function () {
                       page.render('1489651707-www-bymini-cz-chromebook-11-1366x768.png');
                       slimer.exit();			    
                   }, '500');
                   });
               