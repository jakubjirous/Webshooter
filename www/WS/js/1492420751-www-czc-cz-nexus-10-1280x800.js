
               var page = require('webpage').create();
                   page.viewportSize = { width: 1280, height: 800 };
                   page.clipRect = { top: 0, left: 0, width: 1280, height: 800 };			    
                   page.open('https://www.czc.cz/', function () {
                   window.setTimeout(function () {
                       page.render('1492420751-www-czc-cz-nexus-10-1280x800.jpg', {format: 'jpeg', quality: '100'});
                       phantom.exit();			    
                   }, '500');
                   });
               