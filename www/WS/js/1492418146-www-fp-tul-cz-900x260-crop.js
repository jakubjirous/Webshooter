
            var page = require('webpage').create();
                page.open('https://www.fp.tul.cz/', function () {
                page.viewportSize = { width: 900, height: 500 };
                page.clipRect = { top: 190, left: 0, width: 900, height: 260 };			    				
                window.setTimeout(function () {
                    page.render('1492418146-www-fp-tul-cz-900x260-crop.jpg', {format: 'jpg', quality: '100'});
                    slimer.exit();			    
                }, '500');
                });
            