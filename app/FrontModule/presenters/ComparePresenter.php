<?php

namespace App\FrontModule\Presenters;

use Nette;
use App\FrontModule\Model;
use App\FrontModule\Forms;
use Nette\Utils\Validators;
use Nette\Application\Responses\FileResponse;
use Nette\Utils\FileSystem;


class ComparePresenter extends BasePresenter
{

   /** @var Model\SessionManager */
   private $sm;

   /** @var Model\DeviceManager */
   private $dm;

   /** @var Model\ShootManager */
   private $stm;

   private $wwwDir;

   /**
    * MD, SM, XS
    */
   private $view = self::VIEW_MD;


   public function __construct(Model\SessionManager $sm, Model\DeviceManager $dm, Model\ShootManager $stm)
   {
      $this->sm = $sm;
      $this->dm = $dm;
      $this->stm = $stm;
   }


   public function startup()
   {
      parent::startup();

      $ds = DIRECTORY_SEPARATOR;
      $ds2 = '/';
      $this->wwwDir = $this->context->parameters['wwwDir'] . $ds;
   }


   public function renderList($id)
   {
      $this->isLoggedIn();
      $this->validateShootId($id);

      $this->template->isLoggedIn = $this->user->isLoggedIn();
      $this->template->shoot = $this->stm->getShootById($id);
      $this->template->similarShoots = $this->stm->getSimilarShootsWithShootById($id);

      $sessionView = $this->sm->getShootView();
      $this->template->view = ($sessionView == FALSE) ? $this->view : $sessionView;

      $this->template->viewLG = self::VIEW_LG;
      $this->template->viewMD = self::VIEW_MD;
      $this->template->viewSM = self::VIEW_SM;
      $this->template->viewXS = self::VIEW_XS;
   }


   public function renderResult($shootId, $similarId)
   {
      $this->isLoggedIn();
      $this->validateShootId($shootId);
      $this->validateShootId($similarId);

      $this->template->isLoggedIn = $this->user->isLoggedIn();
      $this->template->shoot = $this->stm->getShootById($shootId);
      $this->template->similar = $this->stm->getShootById($similarId);
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
    * Switching between shoots view
    * @param $view
    */
   public function handleChangeView($view)
   {
      $this->view = $view;
      $this->sm->setShootView($view);

      if ($this->isAjax()) {
         $this->redrawControl('changeView');
      } else {
         $this->redirect('this');
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
    * Delete shoot
    * @param Integer $id
    */
   public function handleDelete($id)
   {
      $shoot = $this->stm->getShootById($id);
      $fullPathShoot = $this->wwwDir . $shoot->path_img;
      $fullPathJS = $this->wwwDir . $shoot->path_js;

      // delete shoot from server
      FileSystem::delete($fullPathShoot);
      FileSystem::delete($fullPathJS);

      // delete shoot from DB
      $this->stm->deleteShoot($id);
      $this->redirect('this');
   }

}

