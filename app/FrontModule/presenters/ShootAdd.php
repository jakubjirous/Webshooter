<?php

namespace App\FrontModule\Presenters;

use Nette;


class ShootAdd
{

   // Waiting to load page before creating render
   const RENDER_TIMEOUT = 500;  //ms

   private $path;
   private $imageJPG;
   private $imagePNG;
   private $type;
   private $typeShoot;
   private $typePlanTarget;


   public function __construct($path, $imageJPG, $imagePNG, $type, $typeShoot, $typePlanTarget)
   {
      $this->path = $path;
      $this->imageJPG = $imageJPG;
      $this->imagePNG = $imagePNG;
      $this->type = $type;
      $this->typeShoot = $typeShoot;
      $this->typePlanTarget = $typePlanTarget;
   }


   /** Phantom JS for device
    * @param $absoluteUrl
    * @param $filenameShoot
    * @param $filenameJS
    * @param $width
    * @param $height
    * @param $imgType
    */
   public function devicePhantomJS(
      $absoluteUrl,
      $filenameShoot,
      $filenameJS,
      $width,
      $height,
      $imgType)
   {
      $path = $this->path;

      $fullPathShoot = "";
      if($this->type == $this->typeShoot) {
         $fullPathShoot = $path['wwwShootsDir'] . $filenameShoot;
      } else if($this->type == $this->typePlanTarget) {
         $fullPathShoot = $path['wwwPlansTargetsDir'] . $filenameShoot;
      }

      $fullPathJS = $path['wwwJsDir'] . $filenameJS;
      $renderTimeout = self::RENDER_TIMEOUT;

      if ($height === null) {
         if ($imgType === $this->imageJPG) {
            $content = "
               var page = require('webpage').create();
                   page.viewportSize = { width: {$width}, height: 768 };
                   page.open('{$absoluteUrl}', function () {
                   window.setTimeout(function () {
                       page.render('{$filenameShoot}', {format: 'jpeg', quality: '100'});
                       phantom.exit();			    
                   }, '{$renderTimeout}');
                   });
               ";
         } else {
            $content = "
               var page = require('webpage').create();
                   page.viewportSize = { width: {$width}, height: 768 };
                   page.open('{$absoluteUrl}', function () {
                   window.setTimeout(function () {
                       page.render('{$filenameShoot}');
                       phantom.exit();			    
                   }, '{$renderTimeout}');
                   });
               ";
         }
      } else {
         if ($imgType === $this->imageJPG) {
            $content = "
               var page = require('webpage').create();
                   page.viewportSize = { width: {$width}, height: {$height} };
                   page.clipRect = { top: 0, left: 0, width: {$width}, height: {$height} };			    
                   page.open('{$absoluteUrl}', function () {
                   window.setTimeout(function () {
                       page.render('{$filenameShoot}', {format: 'jpeg', quality: '100'});
                       phantom.exit();			    
                   }, '{$renderTimeout}');
                   });
               ";
         } else {
            $content = "
               var page = require('webpage').create();
                   page.viewportSize = { width: {$width}, height: {$height} };
                   page.clipRect = { top: 0, left: 0, width: {$width}, height: {$height} };			    
                   page.open('{$absoluteUrl}', function () {
                   window.setTimeout(function () {
                       page.render('{$filenameShoot}');
                       phantom.exit();			    
                   }, '{$renderTimeout}');
                   });
               ";
         }
      }

      // get content to server JS file
      file_put_contents($fullPathJS, $content);

      // escape shell command
      $commandPhantomJS = escapeshellcmd($path['wwwBinDir'] . 'phantomjs ' . $fullPathJS);

      // server JS execute
      exec($commandPhantomJS);

      // move image from wwwDir do WS/shoots
      if (is_file($path['wwwDir'] . $filenameShoot)) {
         rename($path['wwwDir'] . $filenameShoot, $fullPathShoot);
      }
   }


   /**
    * Phantom JS for crop
    * @param $absoluteUrl
    * @param $filenameShoot
    * @param $filenameJS
    * @param $viewportWidth
    * @param $viewportHeight
    * @param $cropTop
    * @param $cropLeft
    * @param $cropWidth
    * @param $cropHeight
    * @param $imgType
    */
   public function cropPhantomJS(
      $absoluteUrl,
      $filenameShoot,
      $filenameJS,
      $viewportWidth,
      $viewportHeight,
      $cropTop,
      $cropLeft,
      $cropWidth,
      $cropHeight,
      $imgType)
   {
      $path = $this->path;

      $fullPathShoot = "";
      if($this->type == $this->typeShoot) {
         $fullPathShoot = $path['wwwShootsDir'] . $filenameShoot;
      } else if($this->type == $this->typePlanTarget) {
         $fullPathShoot = $path['wwwPlansTargetsDir'] . $filenameShoot;
      }

      $fullPathJS = $path['wwwJsDir'] . $filenameJS;
      $renderTimeout = self::RENDER_TIMEOUT;

      if ($imgType === $this->imageJPG) {
         $content = "
            var page = require('webpage').create();
                page.viewportSize = { width: {$viewportWidth}, height: {$viewportHeight} };
                page.clipRect = { top: {$cropTop}, left: {$cropLeft}, width: {$cropWidth}, height: {$cropHeight} };			    
                page.open('{$absoluteUrl}', function () {
                window.setTimeout(function () {
                    page.render('{$filenameShoot}', {format: 'jpeg', quality: '100'});
                    phantom.exit();			    
                }, '{$renderTimeout}');
                });
            ";
      } else {
         $content = "
            var page = require('webpage').create();
                page.viewportSize = { width: {$viewportWidth}, height: {$viewportHeight} };
                page.clipRect = { top: {$cropTop}, left: {$cropLeft}, width: {$cropWidth}, height: {$cropHeight} };			    
                page.open('{$absoluteUrl}', function () {
                window.setTimeout(function () {
                    page.render('{$filenameShoot}');
                    phantom.exit();			    
                }, '{$renderTimeout}');
                });
            ";
      }

      // get content to server JS file
      file_put_contents($fullPathJS, $content);

      // escape shell command
      $commandPhantomJS = escapeshellcmd($path['wwwBinDir'] . 'phantomjs ' . $fullPathJS);

      // server JS execute
      exec($commandPhantomJS);

      // move image from wwwDir do WS/shoots
      if (is_file($path['wwwDir'] . $filenameShoot)) {
         rename($path['wwwDir'] . $filenameShoot, $fullPathShoot);
      }
   }


   /**
    * Slimer JS for device
    * @param $absoluteUrl
    * @param $filenameShoot
    * @param $filenameJS
    * @param $width
    * @param $height
    * @param $imgType
    */
   public function deviceSlimerJS(
      $absoluteUrl,
      $filenameShoot,
      $filenameJS,
      $width,
      $height,
      $imgType)
   {
      $path = $this->path;

      $fullPathShoot = "";
      if($this->type == $this->typeShoot) {
         $fullPathShoot = $path['wwwShootsDir'] . $filenameShoot;
      } else if($this->type == $this->typePlanTarget) {
         $fullPathShoot = $path['wwwPlansTargetsDir'] . $filenameShoot;
      }

      $fullPathJS = $path['wwwJsDir'] . $filenameJS;
      $renderTimeout = self::RENDER_TIMEOUT;

      if ($height === null) {
         if ($imgType === $this->imageJPG) {
            $content = "
               var page = require('webpage').create();
                   page.open('{$absoluteUrl}', function () {
                   page.viewportSize = { width: {$width}, height: 768 };
                   window.setTimeout(function () {
                       page.render('{$filenameShoot}', {format: 'jpg', quality: '100'});
                       slimer.exit();			    
                   }, '{$renderTimeout}');
                   });
               ";
         } else {
            $content = "
               var page = require('webpage').create();
                   page.open('{$absoluteUrl}', function () {
                   page.viewportSize = { width: {$width}, height: 768 };
                   window.setTimeout(function () {
                       page.render('{$filenameShoot}');
                       slimer.exit();			    
                   }, '{$renderTimeout}');
                   });
               ";
         }
      } else {
         if ($imgType === $this->imageJPG) {
            $content = "
               var page = require('webpage').create();
                   page.open('{$absoluteUrl}', function () {
                   page.viewportSize = { width: {$width}, height: {$height} };
                   page.clipRect = { top: 0, left: 0, width: {$width}, height: {$height} };			    
                   window.setTimeout(function () {
                       page.render('{$filenameShoot}', {format: 'jpg', quality: '100'});
                       slimer.exit();			    
                   }, '{$renderTimeout}');
                   });
               ";

         } else {
            $content = "
               var page = require('webpage').create();
                   page.open('{$absoluteUrl}', function () {
                   page.viewportSize = { width: {$width}, height: {$height} };
                   page.clipRect = { top: 0, left: 0, width: {$width}, height: {$height} };			    
                   window.setTimeout(function () {
                       page.render('{$filenameShoot}');
                       slimer.exit();			    
                   }, '{$renderTimeout}');
                   });
               ";
         }
      }

      // get content to server JS file
      file_put_contents($fullPathJS, $content);

      // escape shell command
      $commandSlimerJS = escapeshellcmd($path['wwwBinDir'] . '/slimerjs0.10.3/slimerjs ' . $fullPathJS);

      // server JS execute
      exec($commandSlimerJS);

      // move image from wwwDir do WS/shoots
      if (is_file($path['wwwDir'] . $filenameShoot)) {
         rename($path['wwwDir'] . $filenameShoot, $fullPathShoot);
      }
   }


   /**
    * Slimer JS for crop
    * @param $absoluteUrl
    * @param $filenameShoot
    * @param $filenameJS
    * @param $viewportWidth
    * @param $viewportHeight
    * @param $cropTop
    * @param $cropLeft
    * @param $cropWidth
    * @param $cropHeight
    * @param $imgType
    */
   public function cropSlimerJS(
      $absoluteUrl,
      $filenameShoot,
      $filenameJS,
      $viewportWidth,
      $viewportHeight,
      $cropTop,
      $cropLeft,
      $cropWidth,
      $cropHeight,
      $imgType)
   {
      $path = $this->path;

      $fullPathShoot = "";
      if($this->type == $this->typeShoot) {
         $fullPathShoot = $path['wwwShootsDir'] . $filenameShoot;
      } else if($this->type == $this->typePlanTarget) {
         $fullPathShoot = $path['wwwPlansTargetsDir'] . $filenameShoot;
      }

      $fullPathJS = $path['wwwJsDir'] . $filenameJS;
      $renderTimeout = self::RENDER_TIMEOUT;

      if ($imgType === $this->imageJPG) {
         $content = "
            var page = require('webpage').create();
                page.open('{$absoluteUrl}', function () {
                page.viewportSize = { width: {$viewportWidth}, height: {$viewportHeight} };
                page.clipRect = { top: {$cropTop}, left: {$cropLeft}, width: {$cropWidth}, height: {$cropHeight} };			    				
                window.setTimeout(function () {
                    page.render('{$filenameShoot}', {format: 'jpg', quality: '100'});
                    slimer.exit();			    
                }, '{$renderTimeout}');
                });
            ";
      } else {
         $content = "
            var page = require('webpage').create();
                page.open('{$absoluteUrl}', function () {
                page.viewportSize = { width: {$viewportWidth}, height: {$viewportHeight} };
                page.clipRect = { top: {$cropTop}, left: {$cropLeft}, width: {$cropWidth}, height: {$cropHeight} };			    				
                window.setTimeout(function () {
                    page.render('{$filenameShoot}');
                    slimer.exit();			    
                }, '{$renderTimeout}');
                });
            ";
      }


      // get content to server JS file
      file_put_contents($fullPathJS, $content);

      // escape shell command
      $commandSlimerJS = escapeshellcmd($path['wwwBinDir'] . '/slimerjs0.10.3/slimerjs ' . $fullPathJS);

      // server JS execute
      exec($commandSlimerJS);

      // move image from wwwDir do WS/shoots
      if (is_file($path['wwwDir'] . $filenameShoot)) {
         rename($path['wwwDir'] . $filenameShoot, $fullPathShoot);
      }
   }
}