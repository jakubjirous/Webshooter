
               var page = require('webpage').create();
                   page.viewportSize = { width: 1280, height: 800 };
                   page.clipRect = { top: 0, left: 0, width: 1280, height: 800 };			    
                   page.open('https://www.czc.cz/', function () {
                   window.setTimeout(function () {
                       page.render('1492420727-www-czc-cz-nexus-10-1280x800.png');
                       phantom.exit();			    
                   }, '500');
                   });
               