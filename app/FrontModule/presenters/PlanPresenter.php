<?php

namespace App\FrontModule\Presenters;

use Nette;
use App\FrontModule\Model;
use App\FrontModule\Forms;
use Nette\Utils\Validators;
use Nette\Application\Responses\FileResponse;
use Nette\Utils\FileSystem;
use Nette\Utils\Strings;


class PlanPresenter extends BasePresenter
{

   /** @var Model\SessionManager */
   private $sm;

   /** @var Model\ShootManager */
   private $stm;

   /** @var Model\ResultManager */
   private $rm;

   /** @var Model\PlanManager */
   private $pm;

   /** @var Forms\PlanAddFormFactory @inject */
   public $planAddFactory;

   /** @var Forms\PlanEditFormFactory @inject */
   public $planEditFactory;


   /**
    * COLOR_1, COLOR_2, COLOR_3, COLOR_4
    */
   private $color = self::COLOR_1;

   /**
    * BACKGROUND_1, BACKGROUND_2
    */
   private $background = self::BACKGROUND_2;

   /**
    * TOLERANCE
    */
   private $tolerance = self::DEFAULT_TOLERANCE;

   /**
    * IGNORE
    */
   private $ignoreActive = FALSE;
   private $ignore = NULL;

   private $sourceSize;
   private $editSize;

   private $wwwDir;
   private $resultDir;

   private $sourceID;
   private $targetID;


   public function __construct(Model\SessionManager $sm, Model\ShootManager $stm, Model\ResultManager $rm, Model\PlanManager $pm)
   {
      $this->sm = $sm;
      $this->stm = $stm;
      $this->rm = $rm;
      $this->pm = $pm;
   }


   public function startup()
   {
      parent::startup();

      $ds = DIRECTORY_SEPARATOR;
      $ds2 = '/';
      $this->wwwDir = $this->context->parameters['wwwDir'] . $ds;
      $this->resultDir = $this->context->parameters['wwwDir'] . $ds . 'WS' . $ds . 'results' . $ds;

      $sessionColor = $this->sm->getResultColor();
      $this->color = ($sessionColor == FALSE) ? $this->color : $sessionColor;

      $sessionBackground = $this->sm->getResultBackground();
      $this->background = ($sessionBackground == FALSE) ? $this->background : $sessionBackground;

      $sessionTolerance = $this->sm->getResultTolerance();
      $this->tolerance = ($sessionTolerance == FALSE) ? $this->tolerance : $sessionTolerance;

      $sessionIgnoreActive = $this->sm->getResultIgnoreActive();
      $this->ignoreActive = ($sessionIgnoreActive == FALSE) ? $this->ignoreActive : $sessionIgnoreActive;

      $sessionIgnore = $this->sm->getResultIgnore();
      $this->ignore = ($sessionIgnore == FALSE) ? $this->ignore : $sessionIgnore;
   }


   public function renderCron()
   {
      $this->isLoggedIn();
      $this->template->isLoggedIn = $this->user->isLoggedIn();

      dump('');
      dump('');
      dump('');
      $plans = $this->pm->getPlanForTerminate(
         self::REPEATE_START_DAILY,
         self::REPEATE_START_WEEKLY,
         self::REPEATE_START_MONTHLY,
         self::REPEATE_START_YEARLY,
         self::REPEATE_END_NEVER,
         self::REPEATE_END_OCCURRENCES,
         self::REPEATE_END_DATE
      );
      foreach ($plans as $plan) {
         dump($plan);
      }

   }


   public function renderAdd($sourceId, $targetId)
   {
      $this->isLoggedIn();
      $this->validateShootId($sourceId);
      $this->validateShootId($targetId);

      $this->sourceID = $sourceId;
      $this->targetID = $targetId;

      $this->template->isLoggedIn = $this->user->isLoggedIn();
      $this->template->source = $source = $this->stm->getShootById($sourceId);
      $this->template->target = $target = $this->stm->getShootById($targetId);
      $this->sourceSize = $this->imageSize($source);

      $this->template->daily = self::REPEATE_START_DAILY;
      $this->template->weekly = self::REPEATE_START_WEEKLY;
      $this->template->monthly = self::REPEATE_START_MONTHLY;
      $this->template->yearly = self::REPEATE_START_YEARLY;

      $this->template->never = self::REPEATE_END_NEVER;
      $this->template->occurrence = self::REPEATE_END_OCCURRENCES;
      $this->template->date = self::REPEATE_END_DATE;
   }


   public function renderSettings()
   {
      $this->isLoggedIn();
      $this->template->isLoggedIn = $this->user->isLoggedIn();

      $this->template->plans = $this->pm->getAllPlans();

      $this->template->daily = self::REPEATE_START_DAILY;
      $this->template->weekly = self::REPEATE_START_WEEKLY;
      $this->template->monthly = self::REPEATE_START_MONTHLY;
      $this->template->yearly = self::REPEATE_START_YEARLY;

      $this->template->never = self::REPEATE_END_NEVER;
      $this->template->occurrence = self::REPEATE_END_OCCURRENCES;
      $this->template->date = self::REPEATE_END_DATE;
   }


   public function renderDetail($id)
   {
      $this->validatePlanId($id);
      // save plan ID to session
      $this->sm->setPlanEditID($id);

      $this->template->plan = $plan = $this->pm->getPlanById($id);
      $source = $this->stm->getShootById($plan->id_source);
      $this->editSize = $this->imageSize($source);

      $this->template->daily = self::REPEATE_START_DAILY;
      $this->template->weekly = self::REPEATE_START_WEEKLY;
      $this->template->monthly = self::REPEATE_START_MONTHLY;
      $this->template->yearly = self::REPEATE_START_YEARLY;

      $this->template->never = self::REPEATE_END_NEVER;
      $this->template->occurrence = self::REPEATE_END_OCCURRENCES;
      $this->template->date = self::REPEATE_END_DATE;
   }


   public function renderHistory($id)
   {
      $this->validatePlanId($id);
      $this->template->plan = $this->pm->getPlanById($id);

      $this->isLoggedIn();
      $this->template->isLoggedIn = $this->user->isLoggedIn();
   }


   /**
    * You must be logged in for do this
    */
   public function isLoggedIn()
   {
      if (!$this->getUser()->isLoggedIn()) {
         $this->redirect(self::LOGIN_REDIRECT);
      }
   }


   /**
    * Shoot id validator
    * @param $id
    */
   public function validateShootId($id)
   {
      if (!Validators::isNumericInt($id)) {
         $this->error();
      }
      $exist = $this->stm->existShootById($id);
      if (!$exist) {
         $this->error();
      }
   }


   /**
    * Plan id validator
    * @param $id
    */
   public function validatePlanId($id)
   {
      if (!Validators::isNumericInt($id)) {
         $this->error();
      }
      $exist = $this->pm->existPlanById($id);
      if (!$exist) {
         $this->error();
      }
   }


   /**
    * Get size from image
    * @param $shoot
    * @return array
    */
   public function imageSize($shoot)
   {
      return getimagesize($this->wwwDir . $shoot->path_img);
   }


   /**
    * Download shoot from server
    * @param Integer $id
    */
   public function handleDownload($id)
   {
      $shoot = $this->stm->getShootById($id);
      $this->sendResponse(new FileResponse($this->wwwDir . $shoot->path_img));
   }


   /**
    * Delete plan
    * @param $id
    */
   public function handleDelete($id)
   {
      $this->pm->deletePlan($id);

      $this->flashMessage('Plan was deleted.', self::FLASH_MESSAGE_SUCCESS);
      $this->redirect('this');
   }


   /**
    * Create plan form factory
    * @return Nette\Application\UI\Form
    */
   protected function createComponentPlanAddForm()
   {
      $colors = [
         self::COLOR_1 => self::COLOR_1,
         self::COLOR_2 => self::COLOR_2,
         self::COLOR_3 => self::COLOR_3,
         self::COLOR_4 => self::COLOR_4,
      ];

      $backgrounds = [
         self::BACKGROUND_1 => self::BACKGROUND_1,
         self::BACKGROUND_2 => self::BACKGROUND_2,
         self::BACKGROUND_3 => self::BACKGROUND_3,
         self::BACKGROUND_4 => self::BACKGROUND_4,
      ];

      $this->planAddFactory->setPrimaryEmail($this->user->getIdentity()->email);

      $this->planAddFactory->setColors($colors);
      $this->planAddFactory->setBackgrounds($backgrounds);

      $this->planAddFactory->setWidth($this->sourceSize[0]);
      $this->planAddFactory->setHeight($this->sourceSize[1]);

      $this->planAddFactory->setUserID($this->user->getId());
      $this->planAddFactory->setSourceID($this->sourceID);
      $this->planAddFactory->setTargetID($this->targetID);

      $this->planAddFactory->setRepeateStartDaily(self::REPEATE_START_DAILY);
      $this->planAddFactory->setRepeateStartWeekly(self::REPEATE_START_WEEKLY);
      $this->planAddFactory->setRepeateStartMonthly(self::REPEATE_START_MONTHLY);
      $this->planAddFactory->setRepeateStartYearly(self::REPEATE_START_YEARLY);

      $this->planAddFactory->setRepeateEndNever(self::REPEATE_END_NEVER);
      $this->planAddFactory->setRepeateEndOccurrences(self::REPEATE_END_OCCURRENCES);
      $this->planAddFactory->setRepeateEndDate(self::REPEATE_END_DATE);

      return $this->planAddFactory->create(function () {
         $this->flashMessage('New comparision plan was successfully created.', self::FLASH_MESSAGE_SUCCESS);
         $this->redirect('Plan:settings');
      });
   }


   /**
    * Edit plan form factory
    * @return Nette\Application\UI\Form
    */
   protected function createComponentPlanEditForm()
   {
      $colors = [
         self::COLOR_1 => self::COLOR_1,
         self::COLOR_2 => self::COLOR_2,
         self::COLOR_3 => self::COLOR_3,
         self::COLOR_4 => self::COLOR_4,
      ];

      $backgrounds = [
         self::BACKGROUND_1 => self::BACKGROUND_1,
         self::BACKGROUND_2 => self::BACKGROUND_2,
         self::BACKGROUND_3 => self::BACKGROUND_3,
         self::BACKGROUND_4 => self::BACKGROUND_4,
      ];

      $this->planEditFactory->setColors($colors);
      $this->planEditFactory->setBackgrounds($backgrounds);

      $this->planEditFactory->setWidth($this->editSize[0]);
      $this->planEditFactory->setHeight($this->editSize[1]);

      $this->planEditFactory->setRepeateStartDaily(self::REPEATE_START_DAILY);
      $this->planEditFactory->setRepeateStartWeekly(self::REPEATE_START_WEEKLY);
      $this->planEditFactory->setRepeateStartMonthly(self::REPEATE_START_MONTHLY);
      $this->planEditFactory->setRepeateStartYearly(self::REPEATE_START_YEARLY);

      $this->planEditFactory->setRepeateEndNever(self::REPEATE_END_NEVER);
      $this->planEditFactory->setRepeateEndOccurrences(self::REPEATE_END_OCCURRENCES);
      $this->planEditFactory->setRepeateEndDate(self::REPEATE_END_DATE);

      return $this->planEditFactory->create(function () {
         $this->flashMessage('Comparision plan was changed.', self::FLASH_MESSAGE_SUCCESS);
         $this->redirect('Plan:settings');
      });
   }
}