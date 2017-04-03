
               var page = require('webpage').create();
                   page.viewportSize = { width: 1440, height: 960 };
                   page.clipRect = { top: 0, left: 0, width: 1440, height: 960 };			    
                   page.open('http://www.fm.tul.cz/', function () {
                   window.setTimeout(function () {
                       page.render('1491129925-www-fm-tul-cz-surface-pro-3-1440x960.png');
                       phantom.exit();			    
                   }, '500');
                   });
               