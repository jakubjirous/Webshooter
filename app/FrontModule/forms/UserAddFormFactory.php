<?php

namespace App\FrontModule\Forms;

use Nette;
use Nette\Application\UI\Form;
use App\FrontModule\Model\UserManager;
use App\FrontModule\Model\UserRoleManager;
use App\FrontModule\Model\DuplicateNameException;


class UserAddFormFactory
{
   use Nette\SmartObject;

   const PASSWORD_MIN_LENGTH = 7;

   /** @var FormFactory */
   private $factory;

   /** @var UserManager */
   private $um;

   /** @var UserRoleManager */
   private $rm;


   public function __construct(FormFactory $factory, UserManager $um, UserRoleManager $rm)
   {
      $this->factory = $factory;
      $this->um = $um;
      $this->rm = $rm;
   }


   /**
    * @return Form
    */
   public function create(callable $onSuccess)
   {
      $form = $this->factory->create();

      $userRole = $this->rm->getAllUserRole();

      // query to array for form select
      $userRoleSelect = [];
      foreach ($userRole as $role) {
         $userRoleSelect[$role->id_role] = $role->role;
      }

      $form->addText('username', 'Username:')
         ->setRequired('Please enter username.');

      $form->addText('email', 'E-mail:');
//         ->setRequired('Please enter user e-mail.')
//         ->addRule($form::EMAIL);

      $form->addPassword('password', 'Password:')
         ->setOption('description', sprintf('at least %d characters', self::PASSWORD_MIN_LENGTH))
         ->setRequired('Please create a password.')
         ->addRule($form::MIN_LENGTH, NULL, self::PASSWORD_MIN_LENGTH);

      $form->addSelect('id_role', 'Role:', $userRoleSelect)
         ->setPrompt('--- Choose user role ---')
         ->setRequired('Please choose role role.');

      $form->addSubmit('save', 'Save');

      $form->onSuccess[] = function (Form $form, $values) use ($onSuccess) {
         try {
            $this->um->addUser(
               $values->username,
               $values->email,
               $values->password,
               $values->id_role
            );
         } catch (DuplicateNameException $e) {
            $form->addError('Username is already taken.');
            return;
         }

         $onSuccess();
      };

      $this->factory->bootstrapRenderer($form);

      return $form;
   }

}