
               var page = require('webpage').create();
                   page.viewportSize = { width: 320, height: 569 };
                   page.clipRect = { top: 0, left: 0, width: 320, height: 569 };			    
                   page.open('http://www.wpj.cz/', function () {
                   window.setTimeout(function () {
                       page.render('1489077921-www-wpj-cz-android-one-320x569.png');
                       phantom.exit();			    
                   }, '500');
                   });
               