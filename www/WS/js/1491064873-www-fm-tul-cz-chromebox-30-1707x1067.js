
               var page = require('webpage').create();
                   page.viewportSize = { width: 1707, height: 1067 };
                   page.clipRect = { top: 0, left: 0, width: 1707, height: 1067 };			    
                   page.open('http://www.fm.tul.cz/', function () {
                   window.setTimeout(function () {
                       page.render('1491064873-www-fm-tul-cz-chromebox-30-1707x1067.jpg', {format: 'jpeg', quality: '100'});
                       phantom.exit();			    
                   }, '500');
                   });
               