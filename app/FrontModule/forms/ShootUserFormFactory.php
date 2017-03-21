<?php

namespace App\FrontModule\Forms;

use App\FrontModule\Model\SessionManager;
use App\FrontModule\Model\ShootManager;
use App\FrontModule\Model\DeviceManager;
use App\FrontModule\Model\DeviceTypeManager;
use App\FrontModule\Model\UserManager;
use App\FrontModule\Presenters\UserAgentParser;
use App\FrontModule\Presenters\ShootAdd;
use Nette;
use Nette\Http\Url;
use Nette\Utils\Html;
use Nette\Utils\Strings;
use Nette\Utils\Validators;
use Nette\Application\UI\Form;
use Nette\Utils\DateTime;


class ShootUserFormFactory
{
   use Nette\SmartObject;

   /** @var FormFactory */
   private $factory;

   /** @var SessionManager */
   private $sm;

   /** @var UserManager */
   private $um;


   public function __construct(FormFactory $factory, SessionManager $sm, UserManager $um)
   {
      $this->factory = $factory;
      $this->sm = $sm;
      $this->um = $um;
   }


   /**
    * @return Form
    */
   public function create(callable $onSuccess)
   {
      $form = $this->factory->create();

      $sessionUserID = $this->sm->getShootUserID();

      $users = $this->um->getAllUsers();
      $selectUsers[-1] = 'ALL USERS';
      foreach($users as $user) {
         $selectUsers[$user->id_user] = $user->username;
      }

      if($sessionUserID) {
         $form->addSelect('userID', 'User', $selectUsers)
            ->setPrompt('--- Select user ---')
            ->setDefaultValue($sessionUserID)
            ->setRequired('Choose user.');
      } else {
         $form->addSelect('userID', 'User', $selectUsers)
            ->setPrompt('--- Select user ---')
            ->setRequired('Choose user.');
      }

      $form->addSubmit('select', 'Select');

      $form->onSuccess[] = function (Form $form, $values) use ($onSuccess) {
         $this->sm->setShootUserID($values->userID);
         $onSuccess();
      };

      $this->factory->bootstrapRenderer($form);

      return $form;
   }
}