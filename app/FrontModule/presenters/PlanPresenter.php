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
      $this->template->source = $source = $this->stm->getShootById($sourceId);
      $this->template->target = $target = $this->stm->getShootById($targetId);
      $this->sourceSize = $this->imageSize($source);
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

      $this->planAddFactory->setEmail($this->user->getIdentity()->email);

      $this->planAddFactory->setColors($colors);
      $this->planAddFactory->setBackgrounds($backgrounds);

      $this->planAddFactory->setWidth($this->sourceSize[0]);
      $this->planAddFactory->setHeight($this->sourceSize[1]);

      return $this->planAddFactory->create(function () {
         $this->flashMessage('New comparision plan was successfully created', self::FLASH_MESSAGE_SUCCESS);
//         $this->redirect('this');
      });
   }
}