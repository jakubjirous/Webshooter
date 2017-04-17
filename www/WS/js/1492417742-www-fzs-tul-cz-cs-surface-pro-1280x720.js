
               var page = require('webpage').create();
                   page.open('http://www.fzs.tul.cz/cs/', function () {
                   page.viewportSize = { width: 1280, height: 720 };
                   page.clipRect = { top: 0, left: 0, width: 1280, height: 720 };			    
                   window.setTimeout(function () {
                       page.render('1492417742-www-fzs-tul-cz-cs-surface-pro-1280x720.jpg', {format: 'jpg', quality: '100'});
                       slimer.exit();			    
                   }, '500');
                   });
               