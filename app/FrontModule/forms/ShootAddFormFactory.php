<?php

namespace App\FrontModule\Forms;

use App\FrontModule\Model\ShootManager;
use App\FrontModule\Model\DeviceManager;
use App\FrontModule\Model\DeviceTypeManager;
use App\FrontModule\Presenters\UserAgentParser;
use Nette;
use Nette\Http\Url;
use Nette\Utils\Html;
use Nette\Utils\Strings;
use Nette\Utils\Validators;
use Nette\Application\UI\Form;
use Nette\Utils\DateTime;


class ShootAddFormFactory
{
   use Nette\SmartObject;

   /** @var FormFactory */
   private $factory;

   /** @var DeviceManager */
   private $dm;

   /** @var DeviceTypeManager */
   private $tm;

   /** @var ShootManager */
   private $stm;


   private $userID = null;

   private $engineTypes;
   private $imageTypes;

   private $webkit;
   private $gecko;

   private $typeMobile;
   private $typeTablet;
   private $typeLaptop;
   private $typeDesktop;
   private $typeOther;
   private $typeCrop;

   private $path;
   private $browserName;
   private $browserVersion;

   // Waiting to load page before creating render
   const RENDER_TIMEOUT = 500;  //ms


   public function __construct(FormFactory $factory, DeviceManager $dm, DeviceTypeManager $tm, ShootManager $stm)
   {
      $this->factory = $factory;
      $this->dm = $dm;
      $this->tm = $tm;
      $this->stm = $stm;

      // user agent parsing browser name and version
      $uap = new UserAgentParser();
      $this->browserName = $uap->getBrowserName();
      $this->browserVersion = $uap->getBrowserVersion();
   }


   /**
    * @return Form
    */
   public function create(callable $onSuccess)
   {
      $urlFilter = function ($value) {
         $newValue = 'http://' . $value;
         return Validators::isUrl($newValue) ? $newValue : $value;
      };

      $form = $this->factory->create();

      /* WEB BROWSER ENGINE */
      $form->addGroup('Web browser engine');
      $form->addRadioList('engine', 'Choose engine:', $this->getEngineTypes())
         ->setDefaultValue('webkit');


      /* URL */
      $form->addGroup('URL');
      $form->addText('url', 'Website URL:')
         ->addFilter($urlFilter)
         ->addRule($form::URL, 'Please insert URL link of website.')
         ->setRequired('Please insert URL link of website.');

      $form->addSelect('imgType', 'Image type', $this->getImageTypes())
         ->setPrompt('--- File types ---')
         ->setRequired('Choose image file type.');


      /* DEVICE RADIO */
      // query to array for form select
      $deviceType = $this->tm->getAllDeviceType();
      $deviceTypeRadio = [];
      foreach ($deviceType as $device) {
         $deviceTypeRadio[$device->id_type] = $device->type;
      }

      $radioList = $form->addRadioList('deviceType', '', $deviceTypeRadio)
         ->setDefaultValue($deviceType[1]->id_type);

      $radioList->addCondition($form::EQUAL, $deviceType[1]->id_type)
         ->toggle('tab-mobile');

      $radioList->addCondition($form::EQUAL, $deviceType[2]->id_type)
         ->toggle('tab-tablet');

      $radioList->addCondition($form::EQUAL, $deviceType[3]->id_type)
         ->toggle('tab-laptop');

      $radioList->addCondition($form::EQUAL, $deviceType[4]->id_type)
         ->toggle('tab-desktop');

      $radioList->addCondition($form::EQUAL, $deviceType[5]->id_type)
         ->toggle('tab-other');

      $radioList->addCondition($form::EQUAL, $deviceType[6]->id_type)
         ->toggle('tab-crop');


      /* MOBILE RADIO */
      $form->addGroup('Mobile')
         ->setOption('container', Html::el('div')->id('tab-mobile'));

      $deviceMobile = $this->dm->getDeviceByTypeId($this->getTypeMobile());
      $deviceMobileRadio = [];
      foreach ($deviceMobile as $mobile) {
         $deviceMobileRadio[$mobile->id_device] = $mobile->device;
      }
      $form->addRadioList('mobile', null, $deviceMobileRadio)
         ->setDefaultValue(key($deviceMobile));


      /* TABLET RADIO */
      $form->addGroup('Tablet')
         ->setOption('container', Html::el('div')->id('tab-tablet'));

      $deviceTablet = $this->dm->getDeviceByTypeId($this->getTypeTablet());
      $deviceTabletRadio = [];
      foreach ($deviceTablet as $tablet) {
         $deviceTabletRadio[$tablet->id_device] = $tablet->device;
      }
      $form->addRadioList('tablet', null, $deviceTabletRadio)
         ->setDefaultValue(key($deviceTablet));


      /* LAPTOP RADIO */
      $form->addGroup('Laptop')
         ->setOption('container', Html::el('div')->id('tab-laptop'));

      $deviceLaptop = $this->dm->getDeviceByTypeId($this->getTypeLaptop());
      $deviceLaptopRadio = [];
      foreach ($deviceLaptop as $laptop) {
         $deviceLaptopRadio[$laptop->id_device] = $laptop->device;
      }
      $form->addRadioList('laptop', null, $deviceLaptopRadio)
         ->setDefaultValue(key($deviceLaptop));


      /* DESKTOP RADIO */
      $form->addGroup('Desktop')
         ->setOption('container', Html::el('div')->id('tab-desktop'));

      $deviceDesktop = $this->dm->getDeviceByTypeId($this->getTypeDesktop());
      $deviceDesktopRadio = [];
      foreach ($deviceDesktop as $desktop) {
         $deviceDesktopRadio[$desktop->id_device] = $desktop->device;
      }
      $form->addRadioList('desktop', null, $deviceDesktopRadio)
         ->setDefaultValue(key($deviceDesktop));


      /* OTHER RADIO */
      $form->addGroup('Other')
         ->setOption('container', Html::el('div')->id('tab-other'));

      $form->addText('otherWidth', 'Set width:')
         ->setType('number')
         ->setAttribute('min', '0')
         ->addCondition($form::FILLED)
         ->addRule($form::RANGE, 'Width must be positive.', [0, null]);

      $form->addText('otherHeight', 'Set height:')
         ->setType('number')
         ->setAttribute('min', '0')
         ->addCondition($form::FILLED)
         ->addRule($form::RANGE, 'Height must be positive.', [0, null])
         ->endCondition();


      /* CROP RADIO */
      $form->addGroup('Crop')
         ->setOption('container', Html::el('div')->id('tab-crop'));

      $cropViewportWidthMessage = 'Insert viewport Width in pixels.';
      $cropViewportHeightMessage = 'Insert viewport Height in pixels.';
      $cropTopRequired = 'Insert position of crop rectangle from Top in pixels.';
      $cropLeftRequired = 'Insert position of crop rectangle from Left in pixels.';
      $cropWidthRequired = 'Insert Width of crop rectangle in pixels.';
      $cropHeightRequired = 'Insert Height of crop rectangle in pixels.';

      $form->addText('cropViewportWidth', 'Viewport width:')
         ->setType('number')
         ->setAttribute('min', '0');

      $form->addText('cropViewportHeight', 'Viewport height:')
         ->setType('number')
         ->setAttribute('min', '0');

      $form->addText('cropTop', 'Top:')
         ->setType('number')
         ->setAttribute('min', '0');

      $form->addText('cropLeft', 'Left:')
         ->setType('number')
         ->setAttribute('min', '0');

      $form->addText('cropWidth', 'Width:')
         ->setType('number')
         ->setAttribute('min', '0');

      $form->addText('cropHeight', 'Height:')
         ->setType('number')
         ->setAttribute('min', '0');

      $form['cropViewportWidth']
         ->addConditionOn($form['deviceType'], $form::EQUAL, $this->getTypeCrop())
         ->addRule($form::RANGE, 'Viewport width must be positive.', [0, null])
         ->setRequired($cropViewportWidthMessage)
         ->endCondition();

      $form['cropViewportHeight']
         ->addConditionOn($form['deviceType'], $form::EQUAL, $this->getTypeCrop())
         ->addRule($form::RANGE, 'Viewport height must be positive.', [0, null])
         ->setRequired($cropViewportHeightMessage)
         ->endCondition();

      /* SUBMIT */
      $form->addGroup('');
      $form->addSubmit('save', 'Make new shoot !');

      $form->onSuccess[] = function (Form $form, $values) use ($onSuccess) {

         $userId = ($this->getUserID() == null) ? null : $this->getUserID();

         $engine = $values->engine;
         $imgType = $values->imgType;
         $deviceType = $values->deviceType;
         $deviceID = null;
         $date = new DateTime();
         $timestamp = $date->getTimestamp();

         // url from form
         $url = new Url($values->url);
         $pathUrl = Strings::webalize($url->host . $url->path);
         $absoluteUrl = escapeshellcmd($url->absoluteUrl);
         $authorityUrl = $url->authority;
         $absoluteUrlDB = $url->absoluteUrl;

         // other params
         $otherWidth = ($values->otherWidth == null) ? null : $values->otherWidth;
         $otherHeight = ($values->otherHeight == null) ? null : $values->otherHeight;

         // crop params
         $cropViewportWidth = $values->cropViewportWidth;
         $cropViewportHeight = $values->cropViewportHeight;
         $cropTop = $values->cropTop;
         $cropLeft = $values->cropLeft;
         $cropWidth = $values->cropWidth;
         $cropHeight = $values->cropHeight;

         $filenameShoot = "";
         $filenameJS = "";


         /* MOBILE TYPE */
         if ($deviceType === $this->getTypeMobile()) {
            $device = $this->dm->getDeviceById($values->mobile);
            $deviceID = $device->id_device;
            $width = intval(round(($device->width_px / $device->density), 0));
            $height = intval(round(($device->height_px / $device->density), 0));
            $filenameShoot = $timestamp . '-' . $pathUrl . '-' . Strings::webalize($device->device) . '-' . $width . 'x' . $height . '.' . $imgType;
            $filenameJS = $timestamp . '-' . $pathUrl . '-' . Strings::webalize($device->device) . '-' . $width . 'x' . $height . '.js';

            if ($engine === $this->getWebkit()) {
               $this->devicePhantomJS(
                  $absoluteUrl,
                  $filenameShoot,
                  $filenameJS,
                  $width,
                  $height
               );
            } else if ($engine === $this->getGecko()) {
               $this->deviceSlimerJS(
                  $absoluteUrl,
                  $filenameShoot,
                  $filenameJS,
                  $width,
                  $height
               );
            }


            /* TABLET TYPE */
         } else if ($deviceType === $this->getTypeTablet()) {
            $device = $this->dm->getDeviceById($values->tablet);
            $deviceID = $device->id_device;
            $width = intval(round(($device->width_px / $device->density), 0));
            $height = intval(round(($device->height_px / $device->density), 0));
            $filenameShoot = $timestamp . '-' . $pathUrl . '-' . Strings::webalize($device->device) . '-' . $width . 'x' . $height . '.' . $imgType;
            $filenameJS = $timestamp . '-' . $pathUrl . '-' . Strings::webalize($device->device) . '-' . $width . 'x' . $height . '.js';

            if ($engine === $this->getWebkit()) {
               $this->devicePhantomJS(
                  $absoluteUrl,
                  $filenameShoot,
                  $filenameJS,
                  $width,
                  $height
               );
            } else if ($engine === $this->getGecko()) {
               $this->deviceSlimerJS(
                  $absoluteUrl,
                  $filenameShoot,
                  $filenameJS,
                  $width,
                  $height
               );
            }


            /* LAPTOP TYPE */
         } else if ($deviceType === $this->getTypeLaptop()) {
            $device = $this->dm->getDeviceById($values->laptop);
            $deviceID = $device->id_device;
            $width = intval(round(($device->width_px / $device->density), 0));
            $height = intval(round(($device->height_px / $device->density), 0));
            $filenameShoot = $timestamp . '-' . $pathUrl . '-' . Strings::webalize($device->device) . '-' . $width . 'x' . $height . '.' . $imgType;
            $filenameJS = $timestamp . '-' . $pathUrl . '-' . Strings::webalize($device->device) . '-' . $width . 'x' . $height . '.js';

            if ($engine === $this->getWebkit()) {
               $this->devicePhantomJS(
                  $absoluteUrl,
                  $filenameShoot,
                  $filenameJS,
                  $width,
                  $height
               );
            } else if ($engine === $this->getGecko()) {
               $this->deviceSlimerJS(
                  $absoluteUrl,
                  $filenameShoot,
                  $filenameJS,
                  $width,
                  $height
               );
            }


            /* DESKTOP TYPE */
         } else if ($deviceType === $this->getTypeDesktop()) {
            $device = $this->dm->getDeviceById($values->desktop);
            $deviceID = $device->id_device;
            $width = intval(round(($device->width_px / $device->density), 0));
            $height = intval(round(($device->height_px / $device->density), 0));
            $filenameShoot = $timestamp . '-' . $pathUrl . '-' . Strings::webalize($device->device) . '-' . $width . 'x' . $height . '.' . $imgType;
            $filenameJS = $timestamp . '-' . $pathUrl . '-' . Strings::webalize($device->device) . '-' . $width . 'x' . $height . '.js';

            if ($engine === $this->getWebkit()) {
               $this->devicePhantomJS(
                  $absoluteUrl,
                  $filenameShoot,
                  $filenameJS,
                  $width,
                  $height
               );
            } else if ($engine === $this->getGecko()) {
               $this->deviceSlimerJS(
                  $absoluteUrl,
                  $filenameShoot,
                  $filenameJS,
                  $width,
                  $height
               );
            }


            /* OTHER TYPE */
         } else if ($deviceType === $this->getTypeOther()) {
            if ($otherHeight === null) {
               $filenameShoot = $timestamp . '-' . $pathUrl . '-other-' . $otherWidth . 'xMAX.' . $imgType;
               $filenameJS = $timestamp . '-' . $pathUrl . '-other-' . $otherWidth . 'xMAX.js';
            } else {
               $filenameShoot = $timestamp . '-' . $pathUrl . '-other-' . $otherWidth . 'x' . $otherHeight . '.' . $imgType;
               $filenameJS = $timestamp . '-' . $pathUrl . '-other-' . $otherWidth . 'x' . $otherHeight . '.js';
            }

            if ($engine === $this->getWebkit()) {
               $this->devicePhantomJS(
                  $absoluteUrl,
                  $filenameShoot,
                  $filenameJS,
                  $otherWidth,
                  $otherHeight
               );
            } else if ($engine === $this->getGecko()) {
               $this->deviceSlimerJS(
                  $absoluteUrl,
                  $filenameShoot,
                  $filenameJS,
                  $otherWidth,
                  $otherHeight
               );
            }


            /* CROP TYPE */
         } else if ($deviceType === $this->getTypeCrop()) {
            $filenameShoot = $timestamp . '-' . $pathUrl . '-' . $cropWidth . 'x' . $cropHeight . '-crop.' . $imgType;
            $filenameJS = $timestamp . '-' . $pathUrl . '-' . $cropWidth . 'x' . $cropHeight . '-crop.js';

            $err = false;

            if ($cropTop > $cropViewportHeight) {
//               $this->flashMessage('Top < Viewport height ', 'danger');
               $err = true;
            }

            if ($cropLeft > $cropViewportWidth) {
//               $this->flashMessage('Left < Viewport width', 'danger');
               $err = true;
            }

            if ($cropWidth > ($cropViewportWidth - $cropLeft)) {
//               $this->flashMessage('Width <= (Viewport width - Left)', 'danger');
               $err = true;
            }

            if ($cropHeight > ($cropViewportHeight - $cropTop)) {
//               $this->flashMessage('Height <= (Viewport height - Top)', 'danger');
               $err = true;
            }

            if ($err == true) {
               goto end;
            }


            if ($engine === $this->getWebkit()) {
               $this->cropPhantomJS(
                  $absoluteUrl,
                  $filenameShoot,
                  $filenameJS,
                  $cropViewportWidth,
                  $cropViewportHeight,
                  $cropTop,
                  $cropLeft,
                  $cropWidth,
                  $cropHeight
               );
            } else if ($engine === $this->getGecko()) {
               $this->cropSlimerJS(
                  $absoluteUrl,
                  $filenameShoot,
                  $filenameJS,
                  $cropViewportWidth,
                  $cropViewportHeight,
                  $cropTop,
                  $cropLeft,
                  $cropWidth,
                  $cropHeight
               );
            }
         }

         $path = $this->getPath();

         /* ADD SHOOT TO DB */
         $this->stm->addShoot(
            $userId,
            $deviceID,
            $date->__toString(),
            $engine,
            $this->browserName,
            $this->browserVersion,
            $absoluteUrlDB,
            $authorityUrl,
            $imgType,
            'image/' . $imgType,
            $path['shootsDir'] . $filenameShoot,
            $path['jsDir'] . $filenameJS,
            $otherWidth = ($otherWidth == null) ? null : $otherWidth,
            $otherHeight = ($otherHeight == null) ? null : $otherHeight,
            $cropViewportWidth = ($cropViewportWidth == null) ? null : $cropViewportWidth,
            $cropViewportHeight = ($cropViewportHeight == null) ? null : $cropViewportHeight,
            $cropTop = ($cropTop == null) ? null : $cropTop,
            $cropLeft = ($cropLeft == null) ? null : $cropLeft,
            $cropWidth = ($cropWidth == null) ? null : $cropWidth,
            $cropHeight = ($cropHeight == null) ? null : $cropHeight
         );


         $onSuccess();

         end:
      };

      $this->factory->bootstrapRenderer($form);

      return $form;
   }


   /** Phantom JS for device
    * @param $absoluteUrl
    * @param $filenameShoot
    * @param $filenameJS
    * @param $width
    * @param $height
    */
   public function devicePhantomJS($absoluteUrl, $filenameShoot, $filenameJS, $width, $height)
   {
      $path = $this->getPath();
      $fullPathShoot = $path['wwwShootsDir'] . $filenameShoot;
      $fullPathJS = $path['wwwJsDir'] . $filenameJS;
      $renderTimeout = self::RENDER_TIMEOUT;

      if ($height === null) {
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
    */
   public function cropPhantomJS($absoluteUrl, $filenameShoot, $filenameJS, $viewportWidth, $viewportHeight, $cropTop, $cropLeft, $cropWidth, $cropHeight)
   {
      $path = $this->getPath();
      $fullPathShoot = $path['wwwShootsDir'] . $filenameShoot;
      $fullPathJS = $path['wwwJsDir'] . $filenameJS;
      $renderTimeout = self::RENDER_TIMEOUT;

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
    */
   public function deviceSlimerJS($absoluteUrl, $filenameShoot, $filenameJS, $width, $height)
   {
      $path = $this->getPath();
      $fullPathShoot = $path['wwwShootsDir'] . $filenameShoot;
      $fullPathJS = $path['wwwJsDir'] . $filenameJS;
      $renderTimeout = self::RENDER_TIMEOUT;

      if ($height === null) {
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

      // get content to server JS file
      file_put_contents($fullPathJS, $content);

      // escape shell command
      $commandSlimerJS = escapeshellcmd($path['wwwBinDir'] . 'slimerjs ' . $fullPathJS);

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
    */
   public function cropSlimerJS($absoluteUrl, $filenameShoot, $filenameJS, $viewportWidth, $viewportHeight, $cropTop, $cropLeft, $cropWidth, $cropHeight)
   {
      $path = $this->getPath();
      $fullPathShoot = $path['wwwShootsDir'] . $filenameShoot;
      $fullPathJS = $path['wwwJsDir'] . $filenameJS;
      $renderTimeout = self::RENDER_TIMEOUT;

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

      // get content to server JS file
      file_put_contents($fullPathJS, $content);

      // escape shell command
      $commandSlimerJS = escapeshellcmd($path['wwwBinDir'] . 'slimerjs ' . $fullPathJS);

      // server JS execute
      exec($commandSlimerJS);

      // move image from wwwDir do WS/shoots
      if (is_file($path['wwwDir'] . $filenameShoot)) {
         rename($path['wwwDir'] . $filenameShoot, $fullPathShoot);
      }
   }


   // Getters
   /**
    * @return mixed
    */
   public function getEngineTypes()
   {
      return $this->engineTypes;
   }

   /**
    * @return mixed
    */
   public function getImageTypes()
   {
      return $this->imageTypes;
   }

   /**
    * @return mixed
    */
   public function getTypeMobile()
   {
      return $this->typeMobile;
   }

   /**
    * @return mixed
    */
   public function getTypeTablet()
   {
      return $this->typeTablet;
   }

   /**
    * @return mixed
    */
   public function getTypeLaptop()
   {
      return $this->typeLaptop;
   }

   /**
    * @return mixed
    */
   public function getTypeDesktop()
   {
      return $this->typeDesktop;
   }

   /**
    * @return mixed
    */
   public function getTypeOther()
   {
      return $this->typeOther;
   }

   /**
    * @return mixed
    */
   public function getTypeCrop()
   {
      return $this->typeCrop;
   }

   // Setters

   /**
    * @param mixed $engineTypes
    */
   public function setEngineTypes($engineTypes)
   {
      $this->engineTypes = $engineTypes;
   }

   /**
    * @param mixed $imageTypes
    */
   public function setImageTypes($imageTypes)
   {
      $this->imageTypes = $imageTypes;
   }

   /**
    * @param mixed $typeMobile
    */
   public function setTypeMobile($typeMobile)
   {
      $this->typeMobile = $typeMobile;
   }

   /**
    * @param mixed $typeTablet
    */
   public function setTypeTablet($typeTablet)
   {
      $this->typeTablet = $typeTablet;
   }

   /**
    * @param mixed $typeLaptop
    */
   public function setTypeLaptop($typeLaptop)
   {
      $this->typeLaptop = $typeLaptop;
   }

   /**
    * @param mixed $typeDesktop
    */
   public function setTypeDesktop($typeDesktop)
   {
      $this->typeDesktop = $typeDesktop;
   }

   /**
    * @param mixed $typeOther
    */
   public function setTypeOther($typeOther)
   {
      $this->typeOther = $typeOther;
   }

   /**
    * @param mixed $typeCrop
    */
   public function setTypeCrop($typeCrop)
   {
      $this->typeCrop = $typeCrop;
   }

   /**
    * @return mixed
    */
   public function getWebkit()
   {
      return $this->webkit;
   }

   /**
    * @param mixed $webkit
    */
   public function setWebkit($webkit)
   {
      $this->webkit = $webkit;
   }

   /**
    * @return mixed
    */
   public function getGecko()
   {
      return $this->gecko;
   }

   /**
    * @param mixed $gecko
    */
   public function setGecko($gecko)
   {
      $this->gecko = $gecko;
   }

   /**
    * @return null
    */
   public function getUserID()
   {
      return $this->userID;
   }

   /**
    * @param null $userID
    */
   public function setUserID($userID)
   {
      $this->userID = $userID;
   }

   /**
    * @return mixed
    */
   public function getPath()
   {
      return $this->path;
   }

   /**
    * @param mixed $path
    */
   public function setPath($path)
   {
      $this->path = $path;
   }
}