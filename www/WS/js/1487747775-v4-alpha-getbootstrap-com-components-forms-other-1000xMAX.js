
               var page = require('webpage').create();
                   page.viewportSize = { width: 1000, height: 768 };
                   page.open('https://v4-alpha.getbootstrap.com/components/forms/', function () {
                   window.setTimeout(function () {
                       page.render('1487747775-v4-alpha-getbootstrap-com-components-forms-other-1000xMAX.png');
                       phantom.exit();			    
                   }, '500');
                   });
               