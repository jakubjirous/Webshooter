
               var page = require('webpage').create();
                   page.viewportSize = { width: 360, height: 640 };
                   page.clipRect = { top: 0, left: 0, width: 360, height: 640 };			    
                   page.open('http://www.fzs.tul.cz/cs/', function () {
                   window.setTimeout(function () {
                       page.render('1492417887-www-fzs-tul-cz-cs-htc-one-m8-360x640.png');
                       phantom.exit();			    
                   }, '500');
                   });
               