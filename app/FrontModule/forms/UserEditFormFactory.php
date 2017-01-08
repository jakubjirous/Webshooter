<?php

namespace App\FrontModule\Forms;

use App\FrontModule\Model\SessionManager;
use App\FrontModule\Model\UserManager;
use App\FrontModule\Model\UserRoleManager;
use Nette;
use Nette\Application\UI\Form;


class UserEditFormFactory
{
   use Nette\SmartObject;

   /** @var FormFactory */
   private $factory;

   /** @var SessionManager */
   private $sm;

   /** @var UserManager */
   private $um;

   /** @var UserRoleManager */
   private $rm;


   public function __construct(FormFactory $factory, SessionManager $sm, UserManager $um, UserRoleManager $rm)
   {
      $this->factory = $factory;
      $this->sm = $sm;
      $this->um = $um;
      $this->rm = $rm;
   }


   /**
    * @return Form
    */
   public function create(callable $onSuccess)
   {
      $form = $this->factory->create();

      // load user ID from session
      $userID = $this->sm->getUserEditID();

      // get user from DB
      $user = $this->um->getUserById($userID);

      $userRole = $this->rm->getAllUserRole();

      // query to array for form select
      $userRoleSelect = [];
      foreach ($userRole as $role) {
         $userRoleSelect[$role->id_role] = $role->role;
      }

      $form->addHidden('id_user', $userID);

      $form->addText('username', 'Username:')
         ->setDefaultValue($user->username)
         ->setRequired('Please enter username.');

      $form->addText('email', 'E-mail:')
         ->setDefaultValue($user->email)
         ->addRule($form::EMAIL, 'Please enter a valid e-mail address')
         ->setRequired('Please enter user e-mail.');

      $form->addSelect('id_role', 'Role:', $userRoleSelect)
         ->setPrompt('--- Choose user role ---')
         ->setDefaultValue($user->id_role)
         ->setRequired('Please choose role role.');

      $form->addSubmit('save', 'Save');

      $form->onSuccess[] = function (Form $form, $values) use ($onSuccess) {
         $this->um->editUser(
            $values->id_user,
            $values->id_role,
            $values->username,
            $values->email
         );

         $onSuccess();
      };

      $this->factory->bootstrapRenderer($form);

      return $form;
   }

}


