
               var page = require('webpage').create();
                   page.viewportSize = { width: 1707, height: 1067 };
                   page.clipRect = { top: 0, left: 0, width: 1707, height: 1067 };			    
                   page.open('https://www.kupkolo.cz/', function () {
                   window.setTimeout(function () {
                       page.render('1489836088-www.kupkolo.cz-chromebox-30-1707x1067.png');
                       phantom.exit();			    
                   }, '500');
                   });
               