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




   /**
    * SHOOT
    */
   public function setShootView($view)
   {
      $this->section->shootView = $view;
   }
   public function getShootView()
   {
      return $this->section->shootView;
   }


   /**
    * COMPARE RESULT COLOR
    */
   public function setResultColor($color)
   {
      $this->section->resultColor = $color;
   }
   public function getResultColor()
   {
      return $this->section->resultColor;
   }


   /**
    * COMPARE RESULT BACKGROUND
    */
   public function setResultBackground($background)
   {
      $this->section->resultBackground = $background;
   }
   public function getResultBackground()
   {
      return $this->section->resultBackground;
   }


   /**
    * COMPARE RESULT TOLERANCE
    */
   public function setResultTolerance($tolerance)
   {
      $this->section->resultTolerance = $tolerance;
   }
   public function getResultTolerance()
   {
      return $this->section->resultTolerance;
   }


   /**
    * COMPARE RESULT IGNORE ACTIVE
    */
   public function setResultIgnoreActive($ignoreActive)
   {
      $this->section->resultIgnoreActive = $ignoreActive;
   }
   public function getResultIgnoreActive()
   {
      return $this->section->resultIgnoreActive;
   }


   /**
    * COMPARE RESULT IGNORE
    */
   public function setResultIgnore($ignore)
   {
      $this->section->resultIgnore = $ignore;
   }
   public function getResultIgnore()
   {
      return $this->section->resultIgnore;
   }


   /**
    * PLAN
    */
   public function setPlanEditID($id)
   {
      $this->section->planEditID = $id;
   }
   public function getPlanEditID()
   {
      return $this->section->planEditID;
   }

}