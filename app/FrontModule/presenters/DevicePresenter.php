<?php

namespace App\FrontModule\Presenters;

use Nette;
use App\FrontModule\Model;
use App\FrontModule\Forms;


class DevicePresenter extends BasePresenter
{

   /** @var Model\SessionManager */
   private $sm;

   /** @var Model\DeviceManager */
   private $dm;

   /** @var Forms\DeviceAddFormFactory @inject */
   public $deviceAddFactory;

   /** @var Forms\DeviceEditFormFactory @inject */
   public $deviceEditFactory;

   private $unitDimension = "cm";
   private $unitSize = "px";

   private $sortColumn = "device";
   private $sortOrder = "asc";


   public function __construct(Model\SessionManager $sm, Model\DeviceManager $dm)
   {
      $this->sm = $sm;
      $this->dm = $dm;
   }


   /**
    * You must be logged in for do this
    */
   public function isLoggedIn()
   {
      if(!$this->getUser()->isLoggedIn()) {
         $this->redirect(self::LOGIN_REDIRECT);
      }
   }


   public function renderSettings()
   {
      $this->isLoggedIn();

      // sort column and order
      $sessionSortColumn = $this->sm->getDeviceSortColumn();
      $sessionSortOrder = $this->sm->getDeviceSortOrder();

      $this->template->sortColumn = $sortColumn = ($sessionSortColumn == FALSE) ? $this->sortColumn : $sessionSortColumn;
      $this->template->sortOrder =  $sortOrder = ($sessionSortOrder == FALSE) ? $this->sortOrder : $sessionSortOrder;

      $this->template->deviceList = $this->dm->getAllDeviceWithSort($sortColumn, $sortOrder);

      // unit dimension and size
      $sessionUnitDimension = $this->sm->getDeviceUnitDimension();
      $sessionUnitSize = $this->sm->getDeviceUnitSize();

      $this->template->unitDimension = ($sessionUnitDimension == FALSE) ? $this->unitDimension : $sessionUnitDimension;
      $this->template->unitSize = ($sessionUnitSize == FALSE) ? $this->unitSize : $sessionUnitSize;

      // admin identity
      $identity = $this->user->getIdentity();
      if($identity->id_role == self::ROLE_ADMIN) {
         $this->template->roleAdmin = TRUE;
      }
   }


   public function renderList()
   {
      // sort column and order
      $sessionSortColumn = $this->sm->getDeviceSortColumn();
      $sessionSortOrder = $this->sm->getDeviceSortOrder();

      $this->template->sortColumn = $sortColumn = ($sessionSortColumn == FALSE) ? $this->sortColumn : $sessionSortColumn;
      $this->template->sortOrder =  $sortOrder = ($sessionSortOrder == FALSE) ? $this->sortOrder : $sessionSortOrder;

      $this->template->deviceList = $this->dm->getAllDeviceWithSort($sortColumn, $sortOrder);

      // unit dimension and size
      $sessionUnitDimension = $this->sm->getDeviceUnitDimension();
      $sessionUnitSize = $this->sm->getDeviceUnitSize();

      $this->template->unitDimension = ($sessionUnitDimension == FALSE) ? $this->unitDimension : $sessionUnitDimension;
      $this->template->unitSize = ($sessionUnitSize == FALSE) ? $this->unitSize : $sessionUnitSize;
   }


   public function renderDetail($id)
   {
      $this->isLoggedIn();

      if($this->dm->existDeviceById($id)) {
         $this->template->device = $this->dm->getDeviceById($id);
         // save device ID to session
         $this->sm->setDeviceEditID($id);
      } else {
         $this->error(self::ERROR_404_MESSAGE);
      }
   }


   /**
    * Add new device form factory.
    * @return Nette\Application\UI\Form
    */
   protected function createComponentDeviceAddForm()
   {
      return $this->deviceAddFactory->create(function () {
         $this->flashMessage('New device was added.', self::FLASH_MESSAGE_SUCCESS);
         $this->redirect('Device:settings');
      });
   }


   /**
    * Edit device form factory
    * @return Nette\Application\UI\Form
    */
   protected function createComponentDeviceEditForm()
   {
      return $this->deviceEditFactory->create(function () {
         $this->flashMessage('Device was changed.', self::FLASH_MESSAGE_SUCCESS);
         $this->redirect('Device:settings');
      });
   }


   /**
    * Switching between device dimensions
    * @param $unitDimension
    */
   public function handleDimension($unitDimension)
   {
      $this->unitDimension = $unitDimension;
      $this->sm->setDeviceUnitDimension($unitDimension);

      if ($this->isAjax()) {
         $this->redrawControl('deviceList');
      } else {
         $this->redirect('this');
      }
   }


   /**
    * Switching between device dimensions
    * @param $unitSize
    */
   public function handleSize($unitSize)
   {
      $this->unitSize = $unitSize;
      $this->sm->setDeviceUnitSize($unitSize);

      if ($this->isAjax()) {
         $this->redrawControl('deviceList');
      } else {
         $this->redirect('this');
      }
   }


   /**
    * Sorting device list
    * @param $column
    * @param $order
    */
   public function handleSort($column, $order)
   {
      $this->sortColumn = $column;
      $this->sortOrder = $order;
      $this->sm->setDeviceSortColumn($column);
      $this->sm->setDeviceSortOrder($order);

      if ($this->isAjax()) {
         $this->redrawControl('deviceList');
      } else {
         $this->redirect('this');
      }
   }


   /**
    * Delete device handle
    * @param $id
    */
   public function handleDelete($id)
   {
      $this->dm->deleteDevice($id);
      $this->flashMessage('Device was deleted.', self::FLASH_MESSAGE_SUCCESS);
      $this->redirect('this');
   }
}
