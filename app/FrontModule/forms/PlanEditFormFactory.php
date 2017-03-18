<?php

namespace App\FrontModule\Forms;

use App\FrontModule\Model\PlanManager;
use App\FrontModule\Model\RepeateEndManager;
use App\FrontModule\Model\RepeateStartManager;
use App\FrontModule\Model\SessionManager;
use Nette;
use Nette\Utils\Html;
use Nette\Application\UI\Form;


class PlanEditFormFactory
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

   /** @var PlanManager */
   private $pm;


   private $primaryEmail;
   private $colors;
   private $backgrounds;
   private $width;
   private $height;
   private $userID;
   private $sourceID;
   private $targetID;

   private $repeateStartDaily;
   private $repeateStartWeekly;
   private $repeateStartMonthly;
   private $repeateStartYearly;

   private $repeateEndNever;
   private $repeateEndOccurrences;
   private $repeateEndDate;


   public function __construct(FormFactory $factory, SessionManager $sm, RepeateStartManager $rsm, RepeateEndManager $rem, PlanManager $pm)
   {
      $this->factory = $factory;
      $this->sm = $sm;
      $this->rsm = $rsm;
      $this->rem = $rem;
      $this->pm = $pm;
   }


   /**
    * @return Form
    */
   public function create(callable $onSuccess)
   {
      $form = $this->factory->create();

      $plan = $this->pm->getPlanById($this->sm->getPlanEditID());

      $form->addHidden('planID', $plan->id_plan);

      /* DATETIME, EMAIL */

      $form->addGroup('');
      $form->addText('startDate', 'Start date & time:')
         ->setDefaultValue($plan->start_date->format('d.m.Y H:i'))
         ->setRequired('Please set start date and time for comparison plan');

      $form->addEmail('primaryEmail', 'Primary e-mail:')
         ->setDefaultValue($plan->primary_email)
         ->setRequired('Please fill your primary e-mail address for comparison plan');

      $form->addText('secondaryEmail', 'Secondary e-mail:')
         ->setDefaultValue($plan->secondary_email)
         ->addCondition($form::FILLED)
         ->addRule($form::EMAIL)
         ->setRequired('Please fill your secondary e-mail address for comparison plan')
         ->endCondition();

      $form->addCheckbox('status', 'Enable repeat')
         ->setDefaultValue($plan->status)
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
      $repeateStartType = $form->addRadioList('startType', 'Repeats:', $repeateStartSelect)
         ->setDefaultValue($plan->start_type);

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
      $form->addSelect('startDailyValue', 'Repeat once per:', $repeateDailyValueSelect)
         ->setPrompt('--- Choose days ---')
         ->setDefaultValue(($plan->status == TRUE) ? $plan->start_value : NULL)
         ->addConditionOn($form["status"], $form::EQUAL, TRUE)
         ->addConditionOn($repeateStartType, $form::EQUAL, $repeateStart[1]->id_repeate)
            ->setRequired('Please select after how many days a plan to repeat')
         ->endCondition();

      $form->addGroup('')
         ->setOption('container', Html::el('div')->id('repeate-weekly'));

      $repeateWeeklyValueSelect = [];
      for ($i = 1; $i <= 30; $i++) {
         $repeateWeeklyValueSelect[$i] = $i . (($i == 1) ? ' week' : ' weeks');
      }
      $form->addSelect('startWeeklyValue', 'Repeat once per:', $repeateWeeklyValueSelect)
         ->setPrompt('--- Choose weeks ---')
         ->setDefaultValue(($plan->status == TRUE) ? $plan->start_value : NULL)
         ->addConditionOn($form["status"], $form::EQUAL, TRUE)
         ->addConditionOn($repeateStartType, $form::EQUAL, $repeateStart[2]->id_repeate)
            ->setRequired('Please select after how many weeks a plan to repeat')
         ->endCondition();

      $form->addGroup('')
         ->setOption('container', Html::el('div')->id('repeate-monthly'));

      $repeateMonthlyValueSelect = [];
      for ($i = 1; $i <= 30; $i++) {
         $repeateMonthlyValueSelect[$i] = $i . (($i == 1) ? ' month' : ' months');
      }
      $form->addSelect('startMonthlyValue', 'Repeat once per:', $repeateMonthlyValueSelect)
         ->setPrompt('--- Choose months ---')
         ->setDefaultValue(($plan->status == TRUE) ? $plan->start_value : NULL)
         ->addConditionOn($form["status"], $form::EQUAL, TRUE)
         ->addConditionOn($repeateStartType, $form::EQUAL, $repeateStart[3]->id_repeate)
            ->setRequired('Please select after how many months a plan to repeat')
         ->endCondition();

      $form->addGroup('')
         ->setOption('container', Html::el('div')->id('repeate-yearly'));

      $repeateYearlyValueSelect = [];
      for ($i = 1; $i <= 30; $i++) {
         $repeateYearlyValueSelect[$i] = $i . (($i == 1) ? ' year' : ' years');
      }
      $form->addSelect('startYearlyValue', 'Repeat once per:', $repeateYearlyValueSelect)
         ->setPrompt('--- Choose years ---')
         ->setDefaultValue(($plan->status == TRUE) ? $plan->start_value : NULL)
         ->addConditionOn($form["status"], $form::EQUAL, TRUE)
         ->addConditionOn($repeateStartType, $form::EQUAL, $repeateStart[4]->id_repeate)
            ->setRequired('Please select after how many years a plan to repeat')
         ->endCondition();


      /* REPEATE END */
      $form->addGroup('');

      $repeateEnd = $this->rem->getAllTypes();
      $repeateEndSelect = [];
      foreach ($repeateEnd as $end) {
         $repeateEndSelect[$end->id_repeate] = $end->type;
      }
      $repeateEndType = $form->addRadioList('endType', 'Ends:', $repeateEndSelect)
         ->setDefaultValue($plan->end_type);

      $repeateEndType->addCondition($form::EQUAL, $repeateEnd[2]->id_repeate)
         ->toggle('end-after');

      $repeateEndType->addCondition($form::EQUAL, $repeateEnd[3]->id_repeate)
         ->toggle('end-date');

      $form->addGroup('')
         ->setOption('container', Html::el('div')->id('end-after'));

      $form->addText('endOccurrence', 'Number of occurrences:')
         ->setType('number')
         ->setAttribute('min', 0)
         ->setDefaultValue($plan->end_occurrence)
         ->addConditionOn($repeateEndType, $form::EQUAL, $repeateEnd[2]->id_repeate)
         ->setRequired('Please select how many occurrences of plan termination')
         ->endCondition();

      $form->addGroup('')
         ->setOption('container', Html::el('div')->id('end-date'));

      $form->addText('endDate', 'End date & time:')
         ->setDefaultValue(($plan->end_date != NULL) ?  $plan->end_date->format('d.m.Y H:i') : '')
         ->addConditionOn($repeateEndType, $form::EQUAL, $repeateEnd[3]->id_repeate)
         ->setRequired('Please select the date of plan termination')
         ->endCondition();


      /* COMPARISON SETTINGS */
      $form->addGroup('Comparison settings');

      $form->addSelect('color', 'Result color:', $this->colors)
         ->setPrompt('--- Choose color ---')
         ->setDefaultValue($plan->color)
         ->setRequired('Please choose color for comparison plan');

      $form->addSelect('background', 'Result background:', $this->backgrounds)
         ->setPrompt('--- Choose background ---')
         ->setDefaultValue($plan->background)
         ->setRequired('Please choose background color for comparison plan');

      $form->addText('tolerance', 'Tolerance:')
         ->setType('number')
         ->setAttribute('min', 0)
         ->setAttribute('max', 100)
         ->setAttribute('step', 1)
         ->setDefaultValue($plan->tolerance)
         ->setRequired('Please set tolerance for comparison plan');

      $form->addText('difference', 'Difference:')
         ->setType('number')
         ->setAttribute('min', 0)
         ->setAttribute('max', 100)
         ->setAttribute('step', 0.01)
         ->setDefaultValue($plan->difference)
         ->setRequired('Please set difference for comparison plan')
         ->setOption('description', 'If will be difference larger than you set, Webshooter send notification on your e-mail with comparison result');


      /* IGNORE PART DEFINITION */
      $form->addCheckbox('ignoreActive', 'Active ignore part')
         ->setDefaultValue($plan->ignore_active)
         ->addCondition($form::EQUAL, TRUE)
         ->toggle('ignore-part-definition');

      $form->addGroup('')
         ->setOption('container', Html::el('div')->id('ignore-part-definition'));

      $form->addText('ignoreTop', 'Top:')
         ->setType('number')
         ->setDefaultValue($plan->ignore_top)
         ->addConditionOn($form['ignoreActive'], $form::EQUAL, TRUE)
         ->addRule($form::RANGE, 'Top position must be in range %d–%d px', [0, $this->height])
         ->setRequired('Set top position of ignore part')
         ->endCondition();

      $form->addText('ignoreLeft', 'Left:')
         ->setType('number')
         ->setDefaultValue($plan->ignore_left)
         ->addConditionOn($form['ignoreActive'], $form::EQUAL, TRUE)
         ->addRule($form::RANGE, 'Left position must be in range %d–%d px', [0, $this->width])
         ->setRequired('Set left position of ignore part')
         ->endCondition();

      $form->addText('ignoreWidth', 'Width:')
         ->setType('number')
         ->setDefaultValue($plan->ignore_width)
         ->addConditionOn($form['ignoreActive'], $form::EQUAL, TRUE)
         ->addRule($form::RANGE, 'Width must be in range %d–%d px', [0, $this->width])
         ->setRequired('Set width of ignore part')
         ->endCondition();

      $form->addText('ignoreHeight', 'Height:')
         ->setType('number')
         ->setDefaultValue($plan->ignore_height)
         ->addConditionOn($form['ignoreActive'], $form::EQUAL, TRUE)
         ->addRule($form::RANGE, 'Height must be in range %d–%d px', [0, $this->height])
         ->setRequired('Set height of ignore part')
         ->endCondition();


      $form->addGroup('');
      $form->addSubmit('save', 'Save');

      $this->factory->bootstrapRenderer($form);

      $form->onSuccess[] = function (Form $form, $values) use ($onSuccess) {

         $startType = $values->startType;
         $startValue = NULL;
         if ($startType == $this->repeateStartDaily) {
            $startValue = $values->startDailyValue;;
         } elseif ($startType == $this->repeateStartWeekly) {
            $startValue = $values->startWeeklyValue;
         } elseif ($startType == $this->repeateStartMonthly) {
            $startValue = $values->startMonthlyValue;
         } elseif ($startType == $this->repeateStartYearly) {
            $startValue = $values->startYearlyValue;
         }

         $this->pm->editPlan(
            $values->planID,
            $values->startDate,
            $values->primaryEmail,
            $values->secondaryEmail,
            $values->status,
            $startType,
            $startValue,
            $values->endType,
            $values->endOccurrence,
            $values->endDate,
            $values->color,
            $values->background,
            $values->tolerance,
            $values->difference,
            $values->ignoreActive,
            $values->ignoreTop,
            $values->ignoreLeft,
            $values->ignoreWidth,
            $values->ignoreHeight
         );

         $onSuccess();
      };

      return $form;
   }


   /**
    * @return mixed
    */
   public function getPrimaryEmail()
   {
      return $this->primaryEmail;
   }

   /**
    * @param mixed $primaryEmail
    */
   public function setPrimaryEmail($primaryEmail)
   {
      $this->primaryEmail = $primaryEmail;
   }

   /**
    * @return mixed
    */
   public function getColors()
   {
      return $this->colors;
   }

   /**
    * @param mixed $colors
    */
   public function setColors($colors)
   {
      $this->colors = $colors;
   }

   /**
    * @return mixed
    */
   public function getBackgrounds()
   {
      return $this->backgrounds;
   }

   /**
    * @param mixed $backgrounds
    */
   public function setBackgrounds($backgrounds)
   {
      $this->backgrounds = $backgrounds;
   }

   /**
    * @return mixed
    */
   public function getWidth()
   {
      return $this->width;
   }

   /**
    * @param mixed $width
    */
   public function setWidth($width)
   {
      $this->width = $width;
   }

   /**
    * @return mixed
    */
   public function getHeight()
   {
      return $this->height;
   }

   /**
    * @param mixed $height
    */
   public function setHeight($height)
   {
      $this->height = $height;
   }

   /**
    * @return mixed
    */
   public function getUserID()
   {
      return $this->userID;
   }

   /**
    * @param mixed $userID
    */
   public function setUserID($userID)
   {
      $this->userID = $userID;
   }


   /**
    * @return mixed
    */
   public function getSourceID()
   {
      return $this->sourceID;
   }

   /**
    * @param mixed $sourceID
    */
   public function setSourceID($sourceID)
   {
      $this->sourceID = $sourceID;
   }

   /**
    * @return mixed
    */
   public function getTargetID()
   {
      return $this->targetID;
   }

   /**
    * @param mixed $targetID
    */
   public function setTargetID($targetID)
   {
      $this->targetID = $targetID;
   }

   /**
    * @return mixed
    */
   public function getRepeateStartDaily()
   {
      return $this->repeateStartDaily;
   }

   /**
    * @param mixed $repeateStartDaily
    */
   public function setRepeateStartDaily($repeateStartDaily)
   {
      $this->repeateStartDaily = $repeateStartDaily;
   }

   /**
    * @return mixed
    */
   public function getRepeateStartWeekly()
   {
      return $this->repeateStartWeekly;
   }

   /**
    * @param mixed $repeateStartWeekly
    */
   public function setRepeateStartWeekly($repeateStartWeekly)
   {
      $this->repeateStartWeekly = $repeateStartWeekly;
   }

   /**
    * @return mixed
    */
   public function getRepeateStartMonthly()
   {
      return $this->repeateStartMonthly;
   }

   /**
    * @param mixed $repeateStartMonthly
    */
   public function setRepeateStartMonthly($repeateStartMonthly)
   {
      $this->repeateStartMonthly = $repeateStartMonthly;
   }

   /**
    * @return mixed
    */
   public function getRepeateStartYearly()
   {
      return $this->repeateStartYearly;
   }

   /**
    * @param mixed $repeateStartYearly
    */
   public function setRepeateStartYearly($repeateStartYearly)
   {
      $this->repeateStartYearly = $repeateStartYearly;
   }

   /**
    * @return mixed
    */
   public function getRepeateEndNever()
   {
      return $this->repeateEndNever;
   }

   /**
    * @param mixed $repeateEndNever
    */
   public function setRepeateEndNever($repeateEndNever)
   {
      $this->repeateEndNever = $repeateEndNever;
   }

   /**
    * @return mixed
    */
   public function getRepeateEndOccurrences()
   {
      return $this->repeateEndOccurrences;
   }

   /**
    * @param mixed $repeateEndOccurrences
    */
   public function setRepeateEndOccurrences($repeateEndOccurrences)
   {
      $this->repeateEndOccurrences = $repeateEndOccurrences;
   }

   /**
    * @return mixed
    */
   public function getRepeateEndDate()
   {
      return $this->repeateEndDate;
   }

   /**
    * @param mixed $repeateEndDate
    */
   public function setRepeateEndDate($repeateEndDate)
   {
      $this->repeateEndDate = $repeateEndDate;
   }
}


