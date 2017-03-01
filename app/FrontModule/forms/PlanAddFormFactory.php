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

   private $email;
   private $colors;
   private $backgrounds;
   private $width;
   private $height;


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
      $form->addText('startDate', 'Start date & time:')
         ->setType('datetime-local')
         ->setDefaultValue('2017-01-01T12:00')
         ->setRequired('Please set start date and time for comparision plan');

      $form->addEmail('primaryEmail', 'Primary e-mail:')
         ->setDefaultValue($this->email ? $this->email : '')
         ->setRequired('Please fill your primary e-mail address for comparision plan');

      $form->addText('secondaryEmail', 'Secondary e-mail:')
         ->addCondition($form::FILLED)
            ->addRule($form::EMAIL)
            ->setRequired('Please fill your secondary e-mail address for comparision plan')
         ->endCondition();

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
         ->setPrompt('--- Choose days ---')
         ->addConditionOn($repeateStartType, $form::EQUAL, $repeateStart[1]->id_repeate)
            ->setRequired('Please select after how many days a plan to repeat')
         ->endCondition();

      $form->addGroup('')
         ->setOption('container', Html::el('div')->id('repeate-weekly'));

      $repeateWeeklyValueSelect = [];
      for ($i = 1; $i <= 30; $i++) {
         $repeateWeeklyValueSelect[$i] = $i . (($i == 1) ? ' week' : ' weeks');
      }
      $form->addSelect('repeateStartWeeklyValue', 'Repeat once per:', $repeateWeeklyValueSelect)
         ->setPrompt('--- Choose weeks ---')
         ->addConditionOn($repeateStartType, $form::EQUAL, $repeateStart[2]->id_repeate)
         ->setRequired('Please select after how many weeks a plan to repeat')
         ->endCondition();

      $form->addGroup('')
         ->setOption('container', Html::el('div')->id('repeate-monthly'));

      $repeateMonthlyValueSelect = [];
      for ($i = 1; $i <= 30; $i++) {
         $repeateMonthlyValueSelect[$i] = $i . (($i == 1) ? ' month' : ' months');
      }
      $form->addSelect('repeateStartMonthlyValue', 'Repeat once per:', $repeateMonthlyValueSelect)
         ->setPrompt('--- Choose months ---')
         ->addConditionOn($repeateStartType, $form::EQUAL, $repeateStart[3]->id_repeate)
         ->setRequired('Please select after how many months a plan to repeat')
         ->endCondition();

      $form->addGroup('')
         ->setOption('container', Html::el('div')->id('repeate-yearly'));

      $repeateYearlyValueSelect = [];
      for ($i = 1; $i <= 30; $i++) {
         $repeateYearlyValueSelect[$i] = $i . (($i == 1) ? ' year' : ' years');
      }
      $form->addSelect('repeateStartYearlyValue', 'Repeat once per:', $repeateYearlyValueSelect)
         ->setPrompt('--- Choose years ---')
         ->addConditionOn($repeateStartType, $form::EQUAL, $repeateStart[4]->id_repeate)
         ->setRequired('Please select after how many years a plan to repeat')
         ->endCondition();


      /* REPEATE END */
      $form->addGroup('');

      $repeateEnd = $this->rem->getAllTypes();
      $repeateEndSelect = [];
      foreach ($repeateEnd as $end) {
         $repeateEndSelect[$end->id_repeate] =  $end->type;
      }
      $repeateEndType = $form->addRadioList('repeateEndType', 'Ends:', $repeateEndSelect)
         ->setDefaultValue($repeateEnd[1]->id_repeate);

      $repeateEndType->addCondition($form::EQUAL, $repeateEnd[2]->id_repeate)
         ->toggle('end-after');

      $repeateEndType->addCondition($form::EQUAL, $repeateEnd[3]->id_repeate)
         ->toggle('end-date');

      $form->addGroup('')
         ->setOption('container', Html::el('div')->id('end-after'));

      $form->addText('repeateEndOccurrence', 'Number of occurrences:')
         ->setType('number')
         ->setAttribute('min', 0)
         ->addConditionOn($repeateEndType, $form::EQUAL, $repeateEnd[2]->id_repeate)
         ->setRequired('Please select how many occurrences of plan termination')
         ->endCondition();

      $form->addGroup('')
         ->setOption('container', Html::el('div')->id('end-date'));

      $form->addText('endDate', 'End date & time:')
         ->setType('datetime-local')
         ->addConditionOn($repeateEndType, $form::EQUAL, $repeateEnd[3]->id_repeate)
         ->setRequired('Please select the date of plan termination')
         ->endCondition();


      /* COMPARISION SETTINGS */
      $form->addGroup('Comparision settings');

      $form->addSelect('color', 'Result color:', $this->colors)
         ->setPrompt('--- Choose color ---')
         ->setDefaultValue($this->sm->getResultColor() ? $this->sm->getResultColor() : $this->colors['red'])
         ->setRequired('Please choose color for comparision plan');

      $form->addSelect('background', 'Result background:', $this->backgrounds)
         ->setPrompt('--- Choose background ---')
         ->setDefaultValue($this->sm->getResultBackground() ? $this->sm->getResultBackground() : $this->backgrounds['grayscale'])
         ->setRequired('Please choose background color for comparision plan');

      $form->addText('tolerance', 'Tolerance:')
         ->setType('number')
         ->setAttribute('min', 0)
         ->setAttribute('max', 100)
         ->setAttribute('step', 1)
         ->setDefaultValue($this->sm->getResultTolerance() ? $this->sm->getResultTolerance() : 50)
         ->setRequired('Please set tolerance for comparision plan');

      $form->addText('difference', 'Difference:')
         ->setType('number')
         ->setAttribute('min', 0)
         ->setAttribute('max', 100)
         ->setAttribute('step', 0.01)
         ->setDefaultValue(0)
         ->setRequired('Please set difference for comparision plan')
         ->setOption('description', 'If will be difference larger than you set, Webshooter send notification on your e-mail with comparision result');


      /* IGNORE PART DEFINITION */
      $ignoreActiveSession = $this->sm->getResultIgnoreActive();
      $ignoreActive = ($ignoreActiveSession == FALSE) ? FALSE : $ignoreActiveSession;

      $ignore = $this->sm->getResultIgnore();
      $ignoreTop = ($ignore['top'] == FALSE) ? 0 : $ignore['top'];
      $ignoreLeft = ($ignore['left'] == FALSE) ? 0 : $ignore['left'];
      $ignoreWidth = ($ignore['width'] == FALSE) ? 0 : $ignore['width'];
      $ignoreHeight = ($ignore['height'] == FALSE) ? 0 : $ignore['height'];

      $form->addCheckbox('ignoreActive', 'Active ignore part')
         ->setDefaultValue($ignoreActive)
         ->addCondition($form::EQUAL, TRUE)
         ->toggle('ignore-part-definition');

      $form->addGroup('')
         ->setOption('container', Html::el('div')->id('ignore-part-definition'));

      $form->addText('ignoreTop', 'Top:')
         ->setType('number')
         ->setDefaultValue($ignoreTop)
         ->addConditionOn($form['ignoreActive'], $form::EQUAL, TRUE)
         ->addRule($form::RANGE, 'Top position must be in range %d–%d px', [0, $this->height])
         ->setRequired('Set top position of ignore part')
         ->endCondition();

      $form->addText('ignoreLeft', 'Left:')
         ->setType('number')
         ->setDefaultValue($ignoreLeft)
         ->addConditionOn($form['ignoreActive'], $form::EQUAL, TRUE)
         ->addRule($form::RANGE, 'Left position must be in range %d–%d px', [0, $this->width])
         ->setRequired('Set left position of ignore part')
         ->endCondition();

      $form->addText('ignoreWidth', 'Width:')
         ->setType('number')
         ->setDefaultValue($ignoreWidth)
         ->addConditionOn($form['ignoreActive'], $form::EQUAL, TRUE)
         ->addRule($form::RANGE, 'Width must be in range %d–%d px', [0, $this->width])
         ->setRequired('Set width of ignore part')
         ->endCondition();

      $form->addText('ignoreHeight', 'Height:')
         ->setType('number')
         ->setDefaultValue($ignoreHeight)
         ->addConditionOn($form['ignoreActive'], $form::EQUAL, TRUE)
         ->addRule($form::RANGE, 'Height must be in range %d–%d px', [0, $this->height])
         ->setRequired('Set height of ignore part')
         ->endCondition();


      $form->addGroup('');
      $form->addSubmit('create', 'Create plan');

      $this->factory->bootstrapRenderer($form);

      $form->onSuccess[] = function (Form $form, $values) use ($onSuccess) {

         dump('');
         dump('');dump('');
         dump('');
         dump($values);

         $onSuccess();
      };

      return $form;
   }


   /**
    * @return mixed
    */
   public function getEmail()
   {
      return $this->email;
   }

   /**
    * @param mixed $email
    */
   public function setEmail($email)
   {
      $this->email = $email;
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
}


