
               var page = require('webpage').create();
                   page.open('http://manboxeo.cz/eshop/bedna-pro-whiskare-xxl', function () {
                   page.viewportSize = { width: 1707, height: 1067 };
                   page.clipRect = { top: 0, left: 0, width: 1707, height: 1067 };			    
                   window.setTimeout(function () {
                       page.render('1490090336-manboxeo-cz-eshop-bedna-pro-whiskare-xxl-chromebox-30-1707x1067.jpg', {format: 'jpg', quality: '100'});
                       slimer.exit();			    
                   }, '500');
                   });
               