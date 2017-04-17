<?php

namespace App\FrontModule\Presenters;

use Nette;
use App\FrontModule\Model;
use App\FrontModule\Forms;
use Nette\Utils\FileSystem;


class UserPresenter extends BasePresenter
{

   /** @var Model\SessionManager */
   private $sm;

   /** @var Model\UserManager */
   private $um;

   /** @var Model\ShootManager */
   private $stm;

   /** @var Model\PlanManager */
   private $pm;

   /** @var Forms\UserEditFormFactory @inject */
   public $userEditFactory;

   /** @var Forms\UserAddFormFactory @inject */
   public $userAddFactory;

   /** @var Forms\ChangeAccountFormFactory @inject */
   public $changeAccountFactory;

   /** @var Forms\ChangePasswordFormFactory @inject */
   public $changePasswordFactory;


   private $sortColumn = "username";
   private $sortOrder = "asc";


   public function __construct(Model\SessionManager $sm, Model\UserManager $um, Model\ShootManager $stm, Model\PlanManager $pm)
   {
      $this->sm = $sm;
      $this->um = $um;
      $this->stm = $stm;
      $this->pm = $pm;
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


   public function renderAccount($id)
   {
      if($this->um->existUserById($id)) {
         $this->template->person = $this->um->getUserById($id);
         // save user ID to session
         $this->sm->setUserAccountID($id);
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
    * Change account form factory
    * @return mixed
    */
   protected function createComponentChangeAccountForm()
   {
      $this->changeAccountFactory->setIdentity($this->getUser()->getIdentity());

      return $this->changeAccountFactory->create(function () {
         $this->flashMessage('Your account was changed.', self::FLASH_MESSAGE_SUCCESS);
         $this->redirect('this');
      });
   }


   /**
    * Change password form factory
    * @return mixed
    */
   protected function createComponentChangePasswordForm()
   {
      return $this->changePasswordFactory->create(function () {
         $this->flashMessage('Your password was changed.', self::FLASH_MESSAGE_SUCCESS);
         $this->redirect('this');
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

      /**
       * Delete all user shoots and results
       */
      $shoots = $this->stm->getAllShootByUserID($id);
      foreach($shoots as $shoot) {
         // delete shoot from server & DB
         $fullPathShoot = $this->wwwDir . $shoot->path_img;
         $fullPathJS = $this->wwwDir . $shoot->path_js;
         FileSystem::delete($fullPathShoot);
         FileSystem::delete($fullPathJS);
         $this->stm->deleteShoot($shoot->id_shoot);

         // delete results from server
         $results = $this->rm->getResultBySourceTargetID($shoot->id_shoot);
         foreach($results as $result) {
            $fullPathResult = $this->wwwDir . $result->path_img;
            FileSystem::delete($fullPathResult);
         }
      }


      /**
       * Delete all users plans with history
       */
      $plans = $this->pm->getAllPlansByUserID($id);
      foreach($plans as $plan) {
         $this->pm->deletePlan($id);

         $results = $this->prm->getResultsByPlanID($plan->id_plan);
         foreach($results as $result) {
            $resultPath = $this->wwwDir . $result->path_img;
            $targetPath = $this->wwwDir . $result->plan_target->path_img;
            $targetPathJS = $this->wwwDir . $result->plan_target->path_js;
            FileSystem::delete($resultPath);
            FileSystem::delete($targetPath);
            FileSystem::delete($targetPathJS);
         }
      }


      $this->flashMessage('User and all his shoots and plans with history was deleted.', self::FLASH_MESSAGE_SUCCESS);
      $this->redirect('this');
   }
}
