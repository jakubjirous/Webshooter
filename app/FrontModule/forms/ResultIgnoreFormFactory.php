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
      $ignoreWidth = ($ignore["width"] == FALSE) ? 0 : $ignore["width"];
      $ignoreHeight = ($ignore["height"] == FALSE) ? 0 : $ignore["height"];

      $form = $this->factory->create();

      $form->addCheckbox('ignoreActive', 'Active ignore part')
         ->setDefaultValue($ignoreActive);

      $form->addText('ignoreTop', 'Top:')
         ->setType('number')
         ->setDefaultValue($ignoreTop)
         ->addConditionOn($form["ignoreActive"], $form::EQUAL, TRUE)
            ->addRule($form::RANGE, 'Top position must be in range %d–%d px', [0, $this->sourceSize[1]])
            ->setRequired('Set top position of ignore part')
         ->endCondition();

      $form->addText('ignoreLeft', 'Left:')
         ->setType('number')
         ->setDefaultValue($ignoreLeft)
         ->addConditionOn($form["ignoreActive"], $form::EQUAL, TRUE)
            ->addRule($form::RANGE, 'Left position must be in range %d–%d px', [0, $this->sourceSize[0]])
            ->setRequired('Set left position of ignore part')
         ->endCondition();

      $form->addText('ignoreWidth', 'Width:')
         ->setType('number')
         ->setDefaultValue($ignoreWidth)
         ->addConditionOn($form["ignoreActive"], $form::EQUAL, TRUE)
            ->addRule($form::RANGE, 'Width must be in range %d–%d px', [0, $this->sourceSize[0]])
            ->setRequired('Set width of ignore part')
         ->endCondition();

      $form->addText('ignoreHeight', 'Height:')
         ->setType('number')
         ->setDefaultValue($ignoreHeight)
         ->addConditionOn($form["ignoreActive"], $form::EQUAL, TRUE)
            ->addRule($form::RANGE, 'Height must be in range %d–%d px', [0, $this->sourceSize[1]])
            ->setRequired('Set height of ignore part')
         ->endCondition();

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