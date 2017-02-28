
               var page = require('webpage').create();
                   page.viewportSize = { width: 1366, height: 768 };
                   page.clipRect = { top: 0, left: 0, width: 1366, height: 768 };			    
                   page.open('http://www.tul.cz/', function () {
                   window.setTimeout(function () {
                       page.render('1488105374-www-tul-cz-macbook-air-11-1366x768.png');
                       phantom.exit();			    
                   }, '500');
                   });
               