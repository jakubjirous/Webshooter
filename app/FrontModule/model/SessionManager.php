<?php

namespace App\FrontModule\Model;

use Nette;


/**
 * Session management.
 */
class SessionManager
{

   /** @var Nette\Http\Session */
   private $session;

   /** @var mixed|Nette\Http\SessionSection */
   private $section;


   /**
    * SessionManager constructor.
    * @param Nette\Http\Session $session
    */
   public function __construct(Nette\Http\Session $session)
   {
      $this->session = $session;
      $this->section = $this->session->getSection('webshooter');
   }


   /**
    * DEVICE
    */
   public function setDeviceEditID($id)
   {
      $this->section->deviceEditID = $id;
   }
   public function getDeviceEditID()
   {
      return $this->section->deviceEditID;
   }
   
   
   public function setDeviceUnitSize($unit)
   {
      $this->section->deviceUnitSize = $unit;
   }
   public function getDeviceUnitSize()
   {
      return $this->section->deviceUnitSize;
   }


   public function setDeviceUnitDimension($unit)
   {
      $this->section->deviceUnitDimension = $unit;
   }
   public function getDeviceUnitDimension()
   {
      return $this->section->deviceUnitDimension;
   }


   public function setDeviceSortColumn($column)
   {
      $this->section->deviceSortColumn = $column;
   }
   public function getDeviceSortColumn()
   {
      return $this->section->deviceSortColumn;
   }


   public function setDeviceSortOrder($order)
   {
      $this->section->deviceSortOrder = $order;
   }
   public function getDeviceSortOrder()
   {
      return $this->section->deviceSortOrder;
   }




   /**
    * USER
    */
   public function setUserEditID($id)
   {
      $this->section->userEditID = $id;
   }
   public function getUserEditID()
   {
      return $this->section->userEditID;
   }
   
   
   public function setUserSortColumn($column)
   {
      $this->section->userSortColumn = $column;
   }
   public function getUserSortColumn()
   {
      return $this->section->userSortColumn;
   }


   public function setUserSortOrder($order)
   {
      $this->section->userSortOrder = $order;
   }
   public function getUserSortOrder()
   {
      return $this->section->userSortOrder;
   }


}
