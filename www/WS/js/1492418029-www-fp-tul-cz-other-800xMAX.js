
               var page = require('webpage').create();
                   page.viewportSize = { width: 800, height: 768 };
                   page.open('https://www.fp.tul.cz/', function () {
                   window.setTimeout(function () {
                       page.render('1492418029-www-fp-tul-cz-other-800xMAX.png');
                       phantom.exit();			    
                   }, '500');
                   });
               