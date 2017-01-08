<?php

namespace App\FrontModule\Forms;

use App\FrontModule\Model\DeviceManager;
use App\FrontModule\Model\DeviceTypeManager;
use Nette;
use Nette\Application\UI\Form;


class DeviceAddFormFactory
{
   use Nette\SmartObject;

   /** @var FormFactory */
   private $factory;

   /** @var DeviceManager */
   private $dm;

   /** @var DeviceTypeManager */
   private $tm;


   public function __construct(FormFactory $factory, DeviceManager $dm, DeviceTypeManager $tm)
   {
      $this->factory = $factory;
      $this->dm = $dm;
      $this->tm = $tm;
   }


   /**
    * @return Form
    */
   public function create(callable $onSuccess)
   {
      $form = $this->factory->create();

      $deviceType = $this->tm->getAllDeviceType();

      // query to array for form select (only 1, 2, 3, 4)
      $deviceTypeSelect = [];
      for($i = 1; $i <= 4; $i++) {
         $deviceTypeSelect[$deviceType[$i]->id_type] = $deviceType[$i]->type;
      }

      $form->addGroup('Basic options');

      $form->addSelect('id_type', 'Type:', $deviceTypeSelect)
         ->setPrompt('--- Choose device type ---')
         ->setRequired('Please choose type of device.');

      $form->addText('device', 'Device:')
         ->setRequired('Please enter device name.');

      $form->addText('platform', 'Platform:')
         ->setRequired('Please enter platform.');

      $form->addGroup('Screen dimensions in centimetres');

      $form->addText('screen_cm', 'Screen (cm):')
         ->addRule($form::FLOAT, 'Screen must be number')
         ->setRequired('Please enter screen size in centimetres.');

      $form->addText('screen_width_cm', 'Screen width (cm):')
         ->addRule($form::FLOAT, 'Screen width must be number')
         ->setRequired('Please enter screen width in centimetres.');

      $form->addText('screen_height_cm', 'Screen height (cm):')
         ->addRule($form::FLOAT, 'Screen height must be number')
         ->setRequired('Please enter screen height in centimetres.');

      $form->addGroup('Screen dimensions in inches');

      $form->addText('screen_in', 'Screen (in):')
         ->addRule($form::FLOAT, 'Screen must be number')
         ->setRequired('Please enter screen size in inches.');

      $form->addText('screen_width_in', 'Screen width (in):')
         ->addRule($form::FLOAT, 'Screen width must be number')
         ->setRequired('Please enter screen width in inches.');

      $form->addText('screen_height_in', 'Screen height (in):')
         ->addRule($form::FLOAT, 'Screen height must be number')
         ->setRequired('Please enter screen height in inches.');

      $form->addGroup('Device size in pixels');

      $form->addText('width_px', 'Width (px):')
         ->setRequired('Please enter device width in pixels.');

      $form->addText('height_px', 'Height (px):')
         ->setRequired('Please enter device height in pixels.');

      $form->addGroup('Device size in density independent pixels');

      $form->addText('width_dp', 'Width (dp):')
         ->setRequired('Please enter device width in density independent pixels.');

      $form->addText('height_dp', 'Height (dp):')
         ->setRequired('Please enter device height in density independent pixels.');

      $form->addGroup('Advanced options');

      $form->addText('aspect_ratio', 'Aspect ratio:')
         ->setRequired('Please enter aspect ratio.');

      $form->addText('density', 'Density:')
         ->addRule($form::FLOAT, 'Density must be number')
         ->setRequired('Please enter density.');


      $form->addSubmit('save', 'Save');

      $form->onSuccess[] = function (Form $form, $values) use ($onSuccess) {
         $this->dm->addDevice(
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


