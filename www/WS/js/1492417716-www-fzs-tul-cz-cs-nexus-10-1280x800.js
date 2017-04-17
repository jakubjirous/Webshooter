
               var page = require('webpage').create();
                   page.viewportSize = { width: 1280, height: 800 };
                   page.clipRect = { top: 0, left: 0, width: 1280, height: 800 };			    
                   page.open('http://www.fzs.tul.cz/cs/', function () {
                   window.setTimeout(function () {
                       page.render('1492417716-www-fzs-tul-cz-cs-nexus-10-1280x800.png');
                       phantom.exit();			    
                   }, '500');
                   });
               