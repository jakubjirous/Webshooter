
               var page = require('webpage').create();
                   page.viewportSize = { width: 320, height: 480 };
                   page.clipRect = { top: 0, left: 0, width: 320, height: 480 };			    
                   page.open('http://www.fm.tul.cz/', function () {
                   window.setTimeout(function () {
                       page.render('1491129851-www-fm-tul-cz-iphone-320x480.png');
                       phantom.exit();			    
                   }, '500');
                   });
               