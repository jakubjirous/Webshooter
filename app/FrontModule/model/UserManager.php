<?php

namespace App\FrontModule\Model;

use Nette;
use Nette\Utils\Strings;
use Nette\Security\Passwords;


/**
 * Users management.
 */
class UserManager implements Nette\Security\IAuthenticator
{
   use Nette\SmartObject;

   const
      TABLE_NAME = 'user',
      COLUMN_ID = 'id_user',
      COLUMN_ROLE = 'id_role',
      COLUMN_USERNAME = 'username',
      COLUMN_EMAIL = 'email',
      COLUMN_PASSWORD_HASH = 'password',
      DEFAULT_USER_ROLE = 1;              // 1 => User


   /** @var Nette\Database\Context */
   private $db;


   public function __construct(Nette\Database\Context $db)
   {
      $this->db = $db;
   }


   /**
    * Performs an authentication.
    * @return Nette\Security\Identity
    * @throws Nette\Security\AuthenticationException
    */
   public function authenticate(array $credentials)
   {
      list($username, $password) = $credentials;

      $row = $this->db->table(self::TABLE_NAME)->where(self::COLUMN_USERNAME, $username)->fetch();

      if (!$row) {
         throw new Nette\Security\AuthenticationException('The username is incorrect.', self::IDENTITY_NOT_FOUND);

      } elseif (!Passwords::verify($password, $row[self::COLUMN_PASSWORD_HASH])) {
         throw new Nette\Security\AuthenticationException('The password is incorrect.', self::INVALID_CREDENTIAL);

      } elseif (Passwords::needsRehash($row[self::COLUMN_PASSWORD_HASH])) {
         $row->update([
            self::COLUMN_PASSWORD_HASH => Passwords::hash($password),
         ]);
      }

      $arr = $row->toArray();
      unset($arr[self::COLUMN_PASSWORD_HASH]);
      return new Nette\Security\Identity($row[self::COLUMN_ID], $row[self::COLUMN_ROLE], $arr);
   }


   /**
    * Get all devices with sorting
    * @param $column
    * @param $order
    * @return array|Nette\Database\IRow[]|Nette\Database\Table\IRow[]|Nette\Database\Table\Selection
    */
   public function getAllUserWithSort($column, $order)
   {
      $queryOrder = $column . ' ' . Strings::upper($order);

      return $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->order(($queryOrder == FALSE) ? self::COLUMN_USERNAME : $queryOrder)
         ->fetchAll();
   }


   /**
    * Get user by ID
    * @param $id
    * @return array|Nette\Database\Table\IRow[]|Nette\Database\Table\Selection
    */
   public function getUserById($id)
   {
      return $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->where(self::COLUMN_ID, $id)
         ->fetch();
   }


   /**
    * Check if user with ID exist
    * @param $id
    * @return bool
    */
   public function existUserById($id)
   {
      $query = $this->getUserById($id);

      return $query == FALSE ? FALSE : TRUE;
   }


   /**
    * Add new user
    * @param $username
    * @param $email
    * @param $password
    * @param null $idRole
    * @throws DuplicateNameException
    */
   public function addUser($username, $email, $password, $idRole = NULL)
   {
      try {
         $this->db->table(self::TABLE_NAME)
            ->insert([
               self::COLUMN_USERNAME => $username,
               self::COLUMN_EMAIL => $email,
               self::COLUMN_PASSWORD_HASH => Passwords::hash($password),
               self::COLUMN_ROLE => ($idRole == NULL) ? self::DEFAULT_USER_ROLE : $idRole,
            ]);
      } catch (Nette\Database\UniqueConstraintViolationException $e) {
         throw new DuplicateNameException;
      }
   }


   /**
    * Edit user
    * @param $id
    * @param $role
    * @param $username
    * @param $email
    */
   public function editUser($id, $role, $username, $email)
   {
      $this->db->table(self::TABLE_NAME)
         ->where(self::COLUMN_ID, $id)
         ->update([
            self::COLUMN_ROLE => $role,
            self::COLUMN_USERNAME => $username,
            self:: COLUMN_EMAIL => $email
         ]);
   }


   /**
    * Delete user
    * @param $id
    */
   public function deleteUser($id)
   {
      $this->db->table(self::TABLE_NAME)->where(self::COLUMN_ID, $id)->delete();
   }
}


class DuplicateNameException extends \Exception
{
}
