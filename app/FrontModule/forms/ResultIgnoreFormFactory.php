<?php

namespace App\FrontModule\Forms;

use App\FrontModule\Model\DeviceManager;
use App\FrontModule\Model\DeviceTypeManager;
use App\FrontModule\Model\SessionManager;
use Nette;
use Nette\Application\UI\Form;


class ResultIgnoreFormFactory
{
   use Nette\SmartObject;

   /** @var FormFactory */
   private $factory;

   /** @var SessionManager */
   private $sm;

   private $sourceSize;


   public function __construct(FormFactory $factory, SessionManager $sm)
   {
      $this->factory = $factory;
      $this->sm = $sm;
   }


   /**
    * @return Form
    */
   public function create(callable $onSuccess)
   {
      $ignoreActiveSession = $this->sm->getResultIgnoreActive();
      $ignoreActive = ($ignoreActiveSession == FALSE) ? FALSE : $ignoreActiveSession;

      $ignore = $this->sm->getResultIgnore();
      $ignoreTop = ($ignore["top"] == FALSE) ? 0 : $ignore["top"];
      $ignoreLeft = ($ignore["left"] == FALSE) ? 0 : $ignore["left"];
      $ignoreWidth = ($ignore["width"] == FALSE) ? "" : $ignore["width"];
      $ignoreHeight = ($ignore["height"] == FALSE) ? "" : $ignore["height"];

      $form = $this->factory->create();

      $form->addCheckbox('ignoreActive', 'Active ignore part')
         ->setDefaultValue($ignoreActive);
//         ->addCondition($form::EQUAL, TRUE)
//         ->toggle('ignore-top')
//         ->toggle('ignore-left')
//         ->toggle('ignore-width')
//         ->toggle('ignore-height');

      $form->addText('ignoreTop', 'Top:')
         ->setType('number')
         ->setOption('id', 'ignore-top')
         ->addRule($form::RANGE, 'Top position must be in range %d–%d px', [0, $this->sourceSize[1]])
         ->setRequired('Set top position of ignore part')
         ->setDefaultValue($ignoreTop);

      $form->addText('ignoreLeft', 'Left:')
         ->setType('number')
         ->setOption('id', 'ignore-left')
         ->addRule($form::RANGE, 'Left position must be in range %d–%d px', [0, $this->sourceSize[0]])
         ->setRequired('Set left position of ignore part')
         ->setDefaultValue($ignoreLeft);

      $form->addText('ignoreWidth', 'Width:')
         ->setType('number')
         ->setOption('id', 'ignore-width')
         ->addRule($form::RANGE, 'Width must be in range %d–%d px', [0, $this->sourceSize[0]])
         ->setRequired('Set width of ignore part')
         ->setDefaultValue($ignoreWidth);

      $form->addText('ignoreHeight', 'Height:')
         ->setType('number')
         ->setOption('id', 'ignore-height')
         ->addRule($form::RANGE, 'Height must be in range %d–%d px', [0, $this->sourceSize[1]])
         ->setRequired('Set height of ignore part')
         ->setDefaultValue($ignoreHeight);

//      $this->factory->bootstrapRenderer($form, 'primary btn-outline-primary');

      $form->addSubmit('set', 'Set');

      $form->onSuccess[] = function (Form $form, $values) use ($onSuccess) {

         $ignore = [
            'top' => $values->ignoreTop,
            'left' => $values->ignoreLeft,
            'width' => $values->ignoreWidth,
            'height' => $values->ignoreHeight,
         ];

         $this->sm->setResultIgnoreActive($values->ignoreActive);
         $this->sm->setResultIgnore($ignore);


         $onSuccess();
      };

      return $form;
   }

   /**
    * @return mixed
    */
   public function getSourceSize()
   {
      return $this->sourceSize;
   }

   /**
    * @param mixed $sourceSize
    */
   public function setSourceSize($sourceSize)
   {
      $this->sourceSize = $sourceSize;
   }
}