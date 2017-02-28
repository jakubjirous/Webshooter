<?php

namespace App\FrontModule\Presenters;

use Nette;
use App\FrontModule\Model;
use App\FrontModule\Forms;
use Nette\Utils\Validators;
use Nette\Application\Responses\FileResponse;
use Nette\Utils\FileSystem;


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

   private $wwwDir;
   private $resultDir;


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


   public function renderCreate($sourceId, $targetId)
   {
      $this->isLoggedIn();
      $this->validateShootId($sourceId);
      $this->validateShootId($targetId);

      $this->template->isLoggedIn = $this->user->isLoggedIn();
      $this->template->source = $this->stm->getShootById($sourceId);
      $this->template->target = $this->stm->getShootById($targetId);

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
    * Download shoot from server
    * @param Integer $id
    */
   public function handleDownload($id)
   {
      $shoot = $this->stm->getShootById($id);
      $this->sendResponse(new FileResponse($this->wwwDir . $shoot->path_img));
   }


   /**
    * Create plan form factory
    * @return Nette\Application\UI\Form
    */
   protected function createComponentPlanAddForm()
   {
      return $this->planAddFactory->create(function () {
         $this->flashMessage('New comparision plan was successfully created');
         $this->redirect('this');
      });
   }
}