<?php

use
   Nette\Utils\Strings;

class FrontMenu extends Nette\Application\UI\Control
{
   public $user;

   public $identity;
   public $userID;
   public $isLoggedIn;

   public $roleUser;
   public $roleSuperUser;
   public $roleAdmin;

   /**
    * FrontMenu constructor.
    */
   public function __construct($identity, $userID, $isLoggedIn, $roleUser, $roleSuperUser, $roleAdmin)
   {
      $this->identity = $identity;
      $this->userID = $userID;
      $this->isLoggedIn = $isLoggedIn;
      $this->roleUser = $roleUser;
      $this->roleSuperUser = $roleSuperUser;
      $this->roleAdmin = $roleAdmin;
   }


   function render()
   {
      $this->template->setFile(__DIR__ . '/frontMenu.latte');

      $this->template->identity = $this->identity;
      if($this->isLoggedIn) {
         $this->template->role = $this->identity->id_role;
         $this->template->userID = $this->userID;
         $this->template->isLoggedIn = $this->isLoggedIn;
      }

      $this->template->roleUser = $this->roleUser;
      $this->template->roleSuperUser = $this->roleSuperUser;
      $this->template->roleAdmin = $this->roleAdmin;

      $this->template->render();
   }

   function setUser($user)
   {
      $this->user = $user;
   }


   function setRoleUser($roleUser)
   {
      $this->roleUser = $roleUser;
   }

   function setRoleSuperUser($roleSuperUser)
   {
      $this->roleSuperUser = $roleSuperUser;
   }

   function setRoleAdmin($roleAdmin)
   {
      $this->roleAdmin = $roleAdmin;
   }
}
