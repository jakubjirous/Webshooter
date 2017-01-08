<?php

namespace App\FrontModule\Presenters;

use Nette;
use App\FrontModule\Model;
use App\FrontModule\Forms;


class UserPresenter extends BasePresenter
{

   /** @var Model\SessionManager */
   private $sm;

   /** @var Model\UserManager */
   private $um;

   /** @var Forms\UserEditFormFactory @inject */
   public $userEditFactory;

   /** @var Forms\UserAddFormFactory @inject */
   public $userAddFactory;

   private $sortColumn = "username";
   private $sortOrder = "asc";


   public function __construct(Model\SessionManager $sm, Model\UserManager $um)
   {
      $this->sm = $sm;
      $this->um = $um;
   }


   public function startup()
   {
      parent::startup();

      if(!$this->getUser()->isLoggedIn()) {
         $this->redirect(self::LOGIN_REDIRECT);
      }
   }


   public function renderList()
   {
      // sort column and order
      $sessionSortColumn = $this->sm->getUserSortColumn();
      $sessionSortOrder = $this->sm->getUserSortOrder();

      $this->template->sortColumn = $sortColumn = ($sessionSortColumn == FALSE) ? $this->sortColumn : $sessionSortColumn;
      $this->template->sortOrder =  $sortOrder = ($sessionSortOrder == FALSE) ? $this->sortOrder : $sessionSortOrder;

      $this->template->userList = $this->um->getAllUserWithSort($sortColumn, $sortOrder);


      // admin identity
      $identity = $this->user->getIdentity();
      if($identity->id_role == self::ROLE_ADMIN) {
         $this->template->isRoleAdmin = TRUE;
         $this->template->roleAdmin = self::ROLE_ADMIN;
      }
   }


   public function renderDetail($id)
   {
      if($this->um->existUserById($id)) {
         $this->template->person = $this->um->getUserById($id);
         // save user ID to session
         $this->sm->setUserEditID($id);
      } else {
         $this->error(self::ERROR_404_MESSAGE);
      }
   }


   /**
    * Edit user form factory
    * @return mixed
    */
   protected function createComponentUserEditForm()
   {
      return $this->userEditFactory->create(function () {
         $this->flashMessage('User was edited.', self::FLASH_MESSAGE_SUCCESS);
         $this->redirect('User:list');
      });
   }


   /**
    * New user form factory
    * @return mixed
    */
   protected function createComponentUserAddForm()
   {
      return $this->userAddFactory->create(function () {
         $this->flashMessage('New user was created.', self::FLASH_MESSAGE_SUCCESS);
         $this->redirect('User:list');
      });
   }


   /**
    * Sorting user list
    * @param $column
    * @param $order
    */
   public function handleSort($column, $order)
   {
      $this->sortColumn = $column;
      $this->sortOrder = $order;
      $this->sm->setUserSortColumn($column);
      $this->sm->setUserSortOrder($order);

      if ($this->isAjax()) {
         $this->redrawControl('userList');
      } else {
         $this->redirect('this');
      }
   }


   /**
    * Delete user handle
    * @param $id
    */
   public function handleDelete($id)
   {
      $this->um->deleteUser($id);
      $this->flashMessage('User was deleted.', self::FLASH_MESSAGE_SUCCESS);
      $this->redirect('this');
   }
}
