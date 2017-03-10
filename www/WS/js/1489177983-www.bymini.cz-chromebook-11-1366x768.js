
               var page = require('webpage').create();
                   page.viewportSize = { width: 1366, height: 768 };
                   page.clipRect = { top: 0, left: 0, width: 1366, height: 768 };			    
                   page.open('http://www.bymini.cz/', function () {
                   window.setTimeout(function () {
                       page.render('1489177983-www.bymini.cz-chromebook-11-1366x768.png');
                       phantom.exit();			    
                   }, '500');
                   });
               