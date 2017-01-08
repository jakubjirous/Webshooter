<?php

namespace App\FrontModule\Forms;

use Nette;
use Nette\Application\UI\Form;
use App\FrontModule\Model;
use App\FrontModule\Model\UserManager;


class SignUpFormFactory
{
   use Nette\SmartObject;

   const PASSWORD_MIN_LENGTH = 7;

   /** @var FormFactory */
   private $factory;

   /** @var UserManager */
   private $um;


   public function __construct(FormFactory $factory, UserManager $um)
   {
      $this->factory = $factory;
      $this->um = $um;
   }


   /**
    * @return Form
    */
   public function create(callable $onSuccess)
   {
      $form = $this->factory->create();
      $form->addText('username', 'Pick a username:')
         ->setRequired('Please pick a username.');

      $form->addText('email', 'Your e-mail:')
         ->setRequired('Please enter your e-mail.')
         ->addRule($form::EMAIL);

      $form->addPassword('password', 'Create a password:')
         ->setOption('description', sprintf('at least %d characters', self::PASSWORD_MIN_LENGTH))
         ->setRequired('Please create a password.')
         ->addRule($form::MIN_LENGTH, NULL, self::PASSWORD_MIN_LENGTH);

      $form->addSubmit('send', 'Sign up');

      $form->onSuccess[] = function (Form $form, $values) use ($onSuccess) {
         try {
            $this->um->addUser(
               $values->username,
               $values->email,
               $values->password
            );
         } catch (Model\DuplicateNameException $e) {
            $form->addError('Username is already taken.');
            return;
         }
         $onSuccess();
      };

      $this->factory->bootstrapRenderer($form);

      return $form;
   }

}
