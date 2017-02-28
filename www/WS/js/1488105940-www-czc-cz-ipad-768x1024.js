
               var page = require('webpage').create();
                   page.viewportSize = { width: 768, height: 1024 };
                   page.clipRect = { top: 0, left: 0, width: 768, height: 1024 };			    
                   page.open('https://www.czc.cz/', function () {
                   window.setTimeout(function () {
                       page.render('1488105940-www-czc-cz-ipad-768x1024.jpg', {format: 'jpeg', quality: '100'});
                       phantom.exit();			    
                   }, '500');
                   });
               