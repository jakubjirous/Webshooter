<?php

namespace App\FrontModule\Presenters;

use Nette;
use App\FrontModule\Model;
use App\FrontModule\Forms;
use Nette\Application\Responses\FileResponse;
use Nette\Utils\FileSystem;


class ShootPresenter extends BasePresenter
{

   /** @var Model\SessionManager */
   private $sm;

   /** @var Model\DeviceManager */
   private $dm;

   /** @var Model\ShootManager */
   private $stm;

   /** @var Forms\ShootAddFormFactory @inject */
   public $shootAddFactory;

   private $wwwDir;
   private $wwwBinDir;
   private $wwwJsDir;
   private $wwwShootsDir;

   private $binDir;
   private $jsDir;
   private $shootsDir;


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
      $this->template->shoots = $this->stm->getAllShoot();
   }


   public function renderSettings()
   {
      $this->template->shoots = $this->stm->getAllShoot();

      // admin identity
      $identity = $this->user->getIdentity();
      if ($identity->id_role == self::ROLE_ADMIN) {
         $this->template->roleAdmin = TRUE;
      }
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

