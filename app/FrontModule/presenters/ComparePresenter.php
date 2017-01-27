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

   /**
    * LG, MD, SM, XS
    */
   private $view = self::VIEW_MD;


   public function __construct(Model\SessionManager $sm, Model\DeviceManager $dm, Model\ShootManager $stm)
   {
      $this->sm = $sm;
      $this->dm = $dm;
      $this->stm = $stm;
   }


   public function renderList($id)
   {
      $this->isLoggedIn();
      $this->validateShootId($id);

      $this->template->isLoggedIn = $this->user->isLoggedIn();
      $this->template->shoot = $this->stm->getShootById($id);
      $this->template->similarShoots = $this->stm->getSimilarShootsWithShootById($id);
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

      $this->shootAddFactory->setWebkit(self::WEBKIT);
      $this->shootAddFactory->setGecko(self::GECKO);

      $this->shootAddFactory->setTypeMobile(self::TYPE_MOBILE);
      $this->shootAddFactory->setTypeTablet(self::TYPE_TABLET);
      $this->shootAddFactory->setTypeLaptop(self::TYPE_LAPTOP);
      $this->shootAddFactory->setTypeDesktop(self::TYPE_DESKTOP);
      $this->shootAddFactory->setTypeOther(self::TYPE_OTHER);
      $this->shootAddFactory->setTypeCrop(self::TYPE_CROP);

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

