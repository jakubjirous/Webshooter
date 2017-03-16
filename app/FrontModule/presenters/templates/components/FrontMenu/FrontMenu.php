<?php

use
   Nette\Utils\Strings;

class FrontMenu extends Nette\Application\UI\Control
{
   public $user;

   public $roleUser;
   public $roleSuperUser;
   public $roleAdmin;


   function render()
   {
      $this->template->setFile(__DIR__ . '/frontMenu.latte');
      $this->template->identity = $this->user->getIdentity();
      $this->template->isLoggedIn = $this->user->isLoggedIn();

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
