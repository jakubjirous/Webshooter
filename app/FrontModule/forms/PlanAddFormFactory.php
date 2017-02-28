<?php

namespace App\FrontModule\Forms;

use App\FrontModule\Model\RepeateEndManager;
use App\FrontModule\Model\RepeateStartManager;
use App\FrontModule\Model\SessionManager;
use Nette;
use Nette\Utils\Html;
use Nette\Application\UI\Form;


class PlanAddFormFactory
{
   use Nette\SmartObject;

   /** @var FormFactory */
   private $factory;

   /** @var SessionManager */
   private $sm;

   /** @var RepeateStartManager */
   private $rsm;

   /** @var RepeateEndManager */
   private $rem;


   public function __construct(FormFactory $factory, SessionManager $sm, RepeateStartManager $rsm, RepeateEndManager $rem)
   {
      $this->factory = $factory;
      $this->sm = $sm;
      $this->rsm = $rsm;
      $this->rem = $rem;
   }


   /**
    * @return Form
    */
   public function create(callable $onSuccess)
   {
      $form = $this->factory->create();

      /* DATETIME, EMAIL */
      $form->addGroup('');
      $form->addTbDateTimePicker('date', 'Date & Time:')
         ->setType('datetime-local');

      $form->addEmail('email', 'E-mail:');

      $form->addCheckbox('repeateStatus', 'Enable repeat')
         ->setDefaultValue(TRUE)
         ->addCondition($form::EQUAL, TRUE)
         ->toggle('repeate-options');


      /* REPEATE */
      $form->addGroup('Repeate settings')
         ->setOption('container', Html::el('div')->id('repeate-options'));


      /* REPEATE START */
      $repeateStart = $this->rsm->getAllTypes();
      $repeateStartSelect = [];
      foreach ($repeateStart as $start) {
         $repeateStartSelect[$start->id_repeate] = $start->type;
      }
      $repeateStartType = $form->addRadioList('repeateStartType', 'Repeats:', $repeateStartSelect)
         ->setDefaultValue($repeateStart[1]->id_repeate);

      $repeateStartType->addCondition($form::EQUAL, $repeateStart[1]->id_repeate)
         ->toggle('repeate-daily');

      $repeateStartType->addCondition($form::EQUAL, $repeateStart[2]->id_repeate)
         ->toggle('repeate-weekly');

      $repeateStartType->addCondition($form::EQUAL, $repeateStart[3]->id_repeate)
         ->toggle('repeate-monthly');

      $repeateStartType->addCondition($form::EQUAL, $repeateStart[4]->id_repeate)
         ->toggle('repeate-yearly');

      $form->addGroup('')
         ->setOption('container', Html::el('div')->id('repeate-daily'));

      $repeateDailyValueSelect = [];
      for ($i = 1; $i <= 30; $i++) {
         $repeateDailyValueSelect[$i] = $i . (($i == 1) ? ' day' : ' days');
      }
      $form->addSelect('repeateStartDailyValue', 'Repeat once per:', $repeateDailyValueSelect)
         ->setPrompt('--- Choose days ---');

      $form->addGroup('')
         ->setOption('container', Html::el('div')->id('repeate-weekly'));

      $repeateWeeklyValueSelect = [];
      for ($i = 1; $i <= 30; $i++) {
         $repeateWeeklyValueSelect[$i] = $i . (($i == 1) ? ' week' : ' weeks');
      }
      $form->addSelect('repeateStartWeeklyValue', 'Repeat once per:', $repeateWeeklyValueSelect)
         ->setPrompt('--- Choose weeks ---');

      $form->addGroup('')
         ->setOption('container', Html::el('div')->id('repeate-monthly'));

      $repeateMonthlyValueSelect = [];
      for ($i = 1; $i <= 30; $i++) {
         $repeateMonthlyValueSelect[$i] = $i . (($i == 1) ? ' month' : ' months');
      }
      $form->addSelect('repeateStartMonthlyValue', 'Repeat once per:', $repeateMonthlyValueSelect)
         ->setPrompt('--- Choose months ---');

      $form->addGroup('')
         ->setOption('container', Html::el('div')->id('repeate-yearly'));

      $repeateYearlyValueSelect = [];
      for ($i = 1; $i <= 30; $i++) {
         $repeateYearlyValueSelect[$i] = $i . (($i == 1) ? ' year' : ' years');
      }
      $form->addSelect('repeateStartYearlyValue', 'Repeat once per:', $repeateYearlyValueSelect)
         ->setPrompt('--- Choose years ---');


      /* REPEATE END */
      $form->addGroup('');

      $repeateEnd = $this->rem->getAllTypes();
      $repeateEndSelect = [];
      foreach ($repeateEnd as $end) {
         $repeateEndSelect[$end->id_repeate] =  $end->type;
      }
      $repeateEndType = $form->addRadioList('repeateEndType', 'Ends:', $repeateEndSelect)
         ->setDefaultValue($repeateEnd[1]->id_repeate);

      $repeateEndType->addCondition($form::EQUAL, $repeateStart[2]->id_repeate)
         ->toggle('end-after');

      $repeateEndType->addCondition($form::EQUAL, $repeateStart[3]->id_repeate)
         ->toggle('end-date');

      $form->addGroup('')
         ->setOption('container', Html::el('div')->id('end-after'));

      $form->addText('repeateEndOccurrence', 'Number of occurrences')
         ->setType('number')
         ->setAttribute('min', 0);

      $form->addGroup('')
         ->setOption('container', Html::el('div')->id('end-date'));

      $form->addTbDateTimePicker('repeateEndDate', 'Date & Time:')
         ->setType('datetime-local');


      /* REPEATE END */
      $form->addGroup('');



      $form->addGroup('');
      $form->addSubmit('create', 'Create');

      $this->factory->bootstrapRenderer($form);

      $form->onSuccess[] = function (Form $form, $values) use ($onSuccess) {

         dump($values);

         $onSuccess();
      };

      return $form;
   }

}


