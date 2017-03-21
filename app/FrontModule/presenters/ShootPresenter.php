<?php

namespace App\FrontModule\Presenters;

use Nette;
use App\FrontModule\Model;
use App\FrontModule\Forms;
use Nette\Application\Responses\FileResponse;
use Nette\Utils\FileSystem;
use Nette\Utils\Paginator;


class ShootPresenter extends BasePresenter
{

   /** @var Model\SessionManager */
   private $sm;

   /** @var Model\DeviceManager */
   private $dm;

   /** @var Model\ShootManager */
   private $stm;

   /** @var Model\ResultManager */
   private $rm;

   /** @var Forms\ShootAddFormFactory @inject */
   public $shootAddFactory;

   /** @var Forms\ShootUserFormFactory @inject */
   public $shootUserFactory;


   private $wwwDir;
   private $wwwBinDir;
   private $wwwJsDir;
   private $wwwShootsDir;

   private $binDir;
   private $jsDir;
   private $shootsDir;

   /**
    * LG, MD, SM, XS
    */
   private $view = self::VIEW_MD;
   private $page;


   public function __construct(Model\SessionManager $sm, Model\DeviceManager $dm, Model\ShootManager $stm, Model\ResultManager $rm)
   {
      $this->sm = $sm;
      $this->dm = $dm;
      $this->stm = $stm;
      $this->rm = $rm;
   }


   public function startup()
   {
      parent::startup();

      $ds = DIRECTORY_SEPARATOR;
      $ds2 = '/';
      $this->wwwDir = $this->context->parameters['wwwDir'] . $ds;
      $this->wwwBinDir = $this->wwwDir . self::DIR_WS . $ds . self::DIR_BIN . $ds;
      $this->wwwJsDir = $this->wwwDir . self::DIR_WS . $ds . self::DIR_JS . $ds;
      $this->wwwShootsDir = $this->wwwDir . self::DIR_WS . $ds . self::DIR_SHOOTS . $ds;

      $this->binDir = $ds2 . self::DIR_WS . $ds2 . self::DIR_BIN . $ds2;
      $this->jsDir = $ds2 . self::DIR_WS . $ds2 . self::DIR_JS . $ds2;
      $this->shootsDir = $ds2 . self::DIR_WS . $ds2 . self::DIR_SHOOTS . $ds2;
   }


   public function renderAdd()
   {
      $this->isLoggedIn();

      $this->template->mobiles = $this->dm->getDeviceByTypeId(self::TYPE_MOBILE);
      $this->template->tablets = $this->dm->getDeviceByTypeId(self::TYPE_TABLET);
      $this->template->laptops = $this->dm->getDeviceByTypeId(self::TYPE_LAPTOP);
      $this->template->desktops = $this->dm->getDeviceByTypeId(self::TYPE_DESKTOP);
   }


   public function renderList()
   {
      $shootsCount = $this->stm->getAllShootsCount();

      $paginator = new Paginator();
      $paginator->setItemCount($shootsCount);
      $paginator->setItemsPerPage(self::PAGINATION_SHOOTS);
      $paginator->setPage($this->page === NULL ? 1 : $this->page);
      $this->template->shoots = $this->stm->getAllShootLimit($paginator);
      $this->template->paginator = $paginator;

      $sessionView = $this->sm->getShootView();
      $this->template->view = ($sessionView == FALSE) ? $this->view : $sessionView;

      $this->template->viewLG = self::VIEW_LG;
      $this->template->viewMD = self::VIEW_MD;
      $this->template->viewSM = self::VIEW_SM;
      $this->template->viewXS = self::VIEW_XS;
   }


   public function renderUser()
   {
      $this->isLoggedIn();
      $identity = $this->user->getIdentity();
      $roleID = $identity->id_role;
      $this->template->isLoggedIn = $this->user->isLoggedIn();

      $shootsCount = $this->stm->getAllShootsCount();

      $paginator = new Paginator();
      if($roleID == self::ROLE_ADMIN or $roleID == self::ROLE_SUPER_USER) {
         $shootUserID = $this->sm->getShootUserID();
         if($shootUserID and $shootUserID != -1) {
            $shootsCount = $this->stm->getAllShootsCountByUserID($shootUserID);
            $paginator->setItemCount($shootsCount);
            $paginator->setItemsPerPage(self::PAGINATION_SHOOTS);
            $paginator->setPage($this->page === NULL ? 1 : $this->page);
            $shoots = $this->stm->getAllShootLimitByUserID($paginator, $shootUserID);
            $this->template->shoots = $shoots;

         } else {
            $shootsCount = $this->stm->getAllShootsCount();
            $paginator->setItemCount($shootsCount);
            $paginator->setItemsPerPage(self::PAGINATION_SHOOTS);
            $paginator->setPage($this->page === NULL ? 1 : $this->page);
            $shoots = $this->stm->getAllShootLimit($paginator);
            $this->template->shoots = $shoots;
         }
      } else {
         $this->error();
      }
      $this->template->paginator = $paginator;

      $sessionView = $this->sm->getShootView();
      $this->template->view = ($sessionView == FALSE) ? $this->view : $sessionView;

      $this->template->viewLG = self::VIEW_LG;
      $this->template->viewMD = self::VIEW_MD;
      $this->template->viewSM = self::VIEW_SM;
      $this->template->viewXS = self::VIEW_XS;
   }


   public function renderSettings()
   {
      $this->isLoggedIn();
      $identity = $this->user->getIdentity();
      $roleID = $identity->id_role;

      if ($roleID == self::ROLE_ADMIN) {
         $this->template->roleAdmin = TRUE;
         $this->template->shoots = $this->stm->getAllShoot();
      }
      $this->template->isLoggedIn = $this->user->isLoggedIn();


      $paginator = new Paginator();
      if($roleID == self::ROLE_ADMIN or $roleID == self::ROLE_SUPER_USER) {
         $shootsCount = $this->stm->getAllShootsCount();
         $paginator->setItemCount($shootsCount);
         $paginator->setItemsPerPage(self::PAGINATION_SHOOTS);
         $paginator->setPage($this->page === NULL ? 1 : $this->page);
         $shoots = $this->stm->getAllShootLimit($paginator);
      } else {
         $shootsCount = $this->stm->getAllShootsCountByUserID($identity->getId());
         $paginator->setItemCount($shootsCount);
         $paginator->setItemsPerPage(self::PAGINATION_SHOOTS);
         $paginator->setPage($this->page === NULL ? 1 : $this->page);
         $shoots = $this->stm->getAllShootLimitByUserID($paginator, $identity->getId());
      }
      $this->template->shoots = $shoots;
      $this->template->paginator = $paginator;


      $sessionView = $this->sm->getShootView();
      $this->template->view = ($sessionView == FALSE) ? $this->view : $sessionView;

      $this->template->viewLG = self::VIEW_LG;
      $this->template->viewMD = self::VIEW_MD;
      $this->template->viewSM = self::VIEW_SM;
      $this->template->viewXS = self::VIEW_XS;
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
    * Add new shoot form factory.
    * @return Nette\Application\UI\Form
    */
   protected function createComponentShootAddForm()
   {
      if ($this->getUser()->isLoggedIn()) {
         $this->shootAddFactory->setUserId($this->getUser()->getIdentity()->id_user);
      }

      $this->shootAddFactory->setEngineTypes(self::ENGINE_TYPES);
      $this->shootAddFactory->setImageTypes(self::IMAGE_TYPES);

      $this->shootAddFactory->setImagePNG(self::IMAGE_PNG);
      $this->shootAddFactory->setImageJPG(self::IMAGE_JPG);

      $this->shootAddFactory->setWebkit(self::WEBKIT);
      $this->shootAddFactory->setGecko(self::GECKO);

      $this->shootAddFactory->setTypeMobile(self::TYPE_MOBILE);
      $this->shootAddFactory->setTypeTablet(self::TYPE_TABLET);
      $this->shootAddFactory->setTypeLaptop(self::TYPE_LAPTOP);
      $this->shootAddFactory->setTypeDesktop(self::TYPE_DESKTOP);
      $this->shootAddFactory->setTypeOther(self::TYPE_OTHER);
      $this->shootAddFactory->setTypeCrop(self::TYPE_CROP);

      $this->shootAddFactory->setRenderToShoots(self::RENDER_TO_SHOOTS);
      $this->shootAddFactory->setRenderToPlansTargets(self::RENDER_TO_PLANS_TARGETS);

      $this->shootAddFactory->setPath(
         [
            'wwwDir' => $this->wwwDir,
            'wwwBinDir' => $this->wwwBinDir,
            'wwwJsDir' => $this->wwwJsDir,
            'wwwShootsDir' => $this->wwwShootsDir,
            'binDir' => $this->binDir,
            'jsDir' => $this->jsDir,
            'shootsDir' => $this->shootsDir
         ]

      );

      return $this->shootAddFactory->create(function () {
         $this->flashMessage('New web shoot was added.', self::FLASH_MESSAGE_SUCCESS);
         $this->redirect('Shoot:settings');
      });
   }


   /**
    * User shoot select form factory.
    * @return mixed
    */
   protected function createComponentShootUserForm()
   {
      return $this->shootUserFactory->create(function () {
         $this->flashMessage('User shoot by current select.', self::FLASH_MESSAGE_SUCCESS);
         $this->redirect('this');
      });
   }


   /**
    * Switching between shoots view
    * @param $view
    * @param $page
    */
   public function handleChangeView($view, $page)
   {
      $this->view = $view;
      $this->sm->setShootView($view);
      $this->page = $page;

      if ($this->isAjax()) {
         $this->redrawControl('changeView');
      } else {
         $this->redirect('this');
      }
   }


   /**
    * Pagination
    * @param $view
    * @param $page
    */
   public function handlePaginator($view, $page)
   {
      $this->view = $view;
      $this->sm->setShootView($view);
      $this->page = $page;

      if($this->isAjax()) {
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

      // delete results from server
      $results = $this->rm->getResultBySourceTargetID($id);
      foreach($results as $result) {
         $fullPathResult = $this->wwwDir . $result->path_img;
         FileSystem::delete($fullPathResult);
      }

      // delete shoot from server
      FileSystem::delete($fullPathShoot);
      FileSystem::delete($fullPathJS);

      // delete result from DB
      $this->rm->deleteResult($id);

      // delete shoot from DB
      $this->stm->deleteShoot($id);
      $this->flashMessage('Shoot was deleted.', self::FLASH_MESSAGE_SUCCESS);
      $this->redirect('this');
   }

}

