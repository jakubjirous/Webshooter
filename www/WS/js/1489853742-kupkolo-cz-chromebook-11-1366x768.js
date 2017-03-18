
               var page = require('webpage').create();
                   page.viewportSize = { width: 1366, height: 768 };
                   page.clipRect = { top: 0, left: 0, width: 1366, height: 768 };			    
                   page.open('http://kupkolo.cz/', function () {
                   window.setTimeout(function () {
                       page.render('1489853742-kupkolo-cz-chromebook-11-1366x768.png');
                       phantom.exit();			    
                   }, '500');
                   });
               