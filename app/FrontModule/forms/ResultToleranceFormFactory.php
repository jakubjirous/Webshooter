<?php

namespace App\FrontModule\Forms;

use App\FrontModule\Model\DeviceManager;
use App\FrontModule\Model\DeviceTypeManager;
use App\FrontModule\Model\SessionManager;
use Nette;
use Nette\Application\UI\Form;


class ResultToleranceFormFactory
{
   use Nette\SmartObject;

   /** @var FormFactory */
   private $factory;

   /** @var SessionManager */
   private $sm;

   private $defaultTolerance;


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
      $form = $this->factory->create();

      $sessionTolerance = $this->sm->getResultTolerance();
      $tolerance = ($sessionTolerance == FALSE) ? $this->defaultTolerance : $sessionTolerance;

      $form->addText('tolerance', 'Tolerance:')
         ->setType('range')
         ->setAttribute('min', '0')
         ->setAttribute('max', '100')
         ->setAttribute('step', '1')
         ->setDefaultValue($tolerance);

         $form->addSubmit('set', 'Set');

      $form->onSuccess[] = function (Form $form, $values) use ($onSuccess) {

         $tolerance = $values->tolerance;
         $this->sm->setResultTolerance($tolerance);

         $onSuccess();
      };

      return $form;
   }


   /**
    * @return mixed
    */
   public function getDefaultTolerance()
   {
      return $this->defaultTolerance;
   }

   /**
    * @param mixed $defaultTolerance
    */
   public function setDefaultTolerance($defaultTolerance)
   {
      $this->defaultTolerance = $defaultTolerance;
   }

}


