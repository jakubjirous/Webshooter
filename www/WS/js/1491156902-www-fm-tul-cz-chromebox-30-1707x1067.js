
               var page = require('webpage').create();
                   page.viewportSize = { width: 1707, height: 1067 };
                   page.clipRect = { top: 0, left: 0, width: 1707, height: 1067 };			    
                   page.open('http://www.fm.tul.cz/', function () {
                   window.setTimeout(function () {
                       page.render('1491156902-www-fm-tul-cz-chromebox-30-1707x1067.png');
                       phantom.exit();			    
                   }, '500');
                   });
               