<?php

namespace App\FrontModule\Forms;

use App\FrontModule\Model\DeviceManager;
use App\FrontModule\Model\DeviceTypeManager;
use App\FrontModule\Model\SessionManager;
use Nette;
use Nette\Application\UI\Form;


class DeviceEditFormFactory
{
   use Nette\SmartObject;

   /** @var FormFactory */
   private $factory;

   /** @var SessionManager */
   private $sm;

   /** @var DeviceManager */
   private $dm;

   /** @var DeviceTypeManager */
   private $tm;


   public function __construct(FormFactory $factory, SessionManager $sm, DeviceManager $dm, DeviceTypeManager $tm)
   {
      $this->factory = $factory;
      $this->sm = $sm;
      $this->dm = $dm;
      $this->tm = $tm;
   }


   /**
    * @return Form
    */
   public function create(callable $onSuccess)
   {
      $form = $this->factory->create();

      // load device ID from session
      $deviceID = $this->sm->getDeviceEditID();

      // get device from DB
      $device = $this->dm->getDeviceById($deviceID);

      $deviceType = $this->tm->getAllDeviceType();

      // query to array for form select
      $deviceTypeSelect = [];
      foreach ($deviceType as $type) {
         $deviceTypeSelect[$type->id_type] = $type->type;
      }

      $form->addGroup('Basic options');

      $form->addHidden('id_device', $deviceID);

      $form->addSelect('id_type', 'Type:', $deviceTypeSelect)
         ->setPrompt('--- Choose device type ---')
         ->setDefaultValue($device->id_type)
         ->setRequired('Please choose type of device.');

      $form->addText('device', 'Device:')
         ->setDefaultValue($device->device)
         ->setRequired('Please enter device name.');

      $form->addText('platform', 'Platform:')
         ->setDefaultValue($device->platform)
         ->setRequired('Please enter platform.');

      $form->addGroup('Screen dimensions in centimetres');

      $form->addText('screen_cm', 'Screen (cm):')
         ->setDefaultValue($device->screen_cm)
         ->addRule($form::FLOAT, 'Screen must be number')
         ->setRequired('Please enter screen size in centimetres.');

      $form->addText('screen_width_cm', 'Screen width (cm):')
         ->setDefaultValue($device->screen_width_cm)
         ->addRule($form::FLOAT, 'Screen width must be number')
         ->setRequired('Please enter screen width in centimetres.');

      $form->addText('screen_height_cm', 'Screen height (cm):')
         ->setDefaultValue($device->screen_height_cm)
         ->addRule($form::FLOAT, 'Screen height must be number')
         ->setRequired('Please enter screen height in centimetres.');

      $form->addGroup('Screen dimensions in inches');

      $form->addText('screen_in', 'Screen (in):')
         ->setDefaultValue($device->screen_in)
         ->addRule($form::FLOAT, 'Screen must be number')
         ->setRequired('Please enter screen size in inches.');

      $form->addText('screen_width_in', 'Screen width (in):')
         ->setDefaultValue($device->screen_width_in)
         ->addRule($form::FLOAT, 'Screen width must be number')
         ->setRequired('Please enter screen width in inches.');

      $form->addText('screen_height_in', 'Screen height (in):')
         ->setDefaultValue($device->screen_height_in)
         ->addRule($form::FLOAT, 'Screen height must be number')
         ->setRequired('Please enter screen height in inches.');

      $form->addGroup('Device size in pixels');

      $form->addText('width_px', 'Width (px):')
         ->setDefaultValue($device->width_px)
         ->setRequired('Please enter device width in pixels.');

      $form->addText('height_px', 'Height (px):')
         ->setDefaultValue($device->height_px)
         ->setRequired('Please enter device height in pixels.');

      $form->addGroup('Device size in density independent pixels');

      $form->addText('width_dp', 'Width (dp):')
         ->setDefaultValue($device->width_dp)
         ->setRequired('Please enter device width in density independent pixels.');

      $form->addText('height_dp', 'Height (dp):')
         ->setDefaultValue($device->height_dp)
         ->setRequired('Please enter device height in density independent pixels.');

      $form->addGroup('Advanced options');

      $form->addText('aspect_ratio', 'Aspect ratio:')
         ->setDefaultValue($device->aspect_ratio)
         ->setRequired('Please enter aspect ratio.');

      $form->addText('density', 'Density:')
         ->setDefaultValue($device->density)
         ->addRule($form::FLOAT, 'Density must be number')
         ->setRequired('Please enter density.');


      $form->addSubmit('save', 'Save');

      $form->onSuccess[] = function (Form $form, $values) use ($onSuccess) {
         $this->dm->editDevice(
            $values->id_device,
            $values->id_type,
            $values->device,
            $values->platform,
            $values->screen_cm,
            $values->screen_width_cm,
            $values->screen_height_cm,
            $values->screen_in,
            $values->screen_width_in,
            $values->screen_height_in,
            $values->width_px,
            $values->height_px,
            $values->width_dp,
            $values->height_dp,
            $values->aspect_ratio,
            $values->density
         );

         $onSuccess();
      };

      $this->factory->bootstrapRenderer($form);

      return $form;
   }

}


