<?php

namespace App\FrontModule\Forms;

use App\FrontModule\Model\SessionManager;
use App\FrontModule\Model\UserManager;
use App\FrontModule\Model\UserRoleManager;
use Nette;
use Nette\Application\UI\Form;


class ChangePasswordFormFactory
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

   const PASSWORD_MIN_LENGTH = 7;


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
      $userID = $this->sm->getUserAccountID();

      // get user from DB
      $user = $this->um->getUserById($userID);

      $userRole = $this->rm->getAllUserRole();

      // query to array for form select
      $userRoleSelect = [];
      foreach ($userRole as $role) {
         $userRoleSelect[$role->id_role] = $role->role;
      }

      $form->addGroup('Change password');
      $form->addHidden('id_user', $userID);

      $password = $form->addPassword('password', 'Password:')
         ->setOption('description', sprintf('at least %d characters', self::PASSWORD_MIN_LENGTH))
         ->setRequired('Please create your new password.')
         ->addRule($form::MIN_LENGTH, NULL, self::PASSWORD_MIN_LENGTH);

      $form->addPassword('password2', 'Retype password:')
         ->setRequired('Please retype your new password.')
         ->addRule($form::EQUAL, 'Both passwords must be same.', $password);

      $form->addSubmit('save', 'Save');

      $form->onSuccess[] = function (Form $form, $values) use ($onSuccess) {
         $this->um->changePassword(
            $values->id_user,
            $values->password
         );

         $onSuccess();
      };

      $this->factory->bootstrapRenderer($form);

      return $form;
   }
}