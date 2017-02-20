
               var page = require('webpage').create();
                   page.viewportSize = { width: 1366, height: 768 };
                   page.clipRect = { top: 0, left: 0, width: 1366, height: 768 };			    
                   page.open('http://www.porfix.cz/', function () {
                   window.setTimeout(function () {
                       page.render('1487533181-www-porfix-cz-chromebook-11-1366x768.jpg', {format: 'jpeg', quality: '100'});
                       phantom.exit();			    
                   }, '500');
                   });
               