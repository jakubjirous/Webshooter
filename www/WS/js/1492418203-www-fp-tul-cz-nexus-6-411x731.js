
               var page = require('webpage').create();
                   page.viewportSize = { width: 411, height: 731 };
                   page.clipRect = { top: 0, left: 0, width: 411, height: 731 };			    
                   page.open('https://www.fp.tul.cz/', function () {
                   window.setTimeout(function () {
                       page.render('1492418203-www-fp-tul-cz-nexus-6-411x731.png');
                       phantom.exit();			    
                   }, '500');
                   });
               