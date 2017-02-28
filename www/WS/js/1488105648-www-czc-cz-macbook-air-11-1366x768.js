
               var page = require('webpage').create();
                   page.viewportSize = { width: 1366, height: 768 };
                   page.clipRect = { top: 0, left: 0, width: 1366, height: 768 };			    
                   page.open('https://www.czc.cz/', function () {
                   window.setTimeout(function () {
                       page.render('1488105648-www-czc-cz-macbook-air-11-1366x768.jpg', {format: 'jpeg', quality: '100'});
                       phantom.exit();			    
                   }, '500');
                   });
               