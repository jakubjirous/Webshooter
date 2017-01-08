<?php

namespace App\FrontModule\Model;

use Nette;


/**
 * User role management.
 */
class UserRoleManager
{
	const
		TABLE_NAME = 'user_role',
		COLUMN_ID = 'id_role',
      COLUMN_ROLE = 'role';


	/** @var Nette\Database\Context */
	private $db;


	public function __construct(Nette\Database\Context $db)
	{
		$this->db = $db;
	}


   /**
    * Get all user roles
    * @return array|Nette\Database\IRow[]|Nette\Database\Table\IRow[]|Nette\Database\Table\Selection
    */
	public function getAllUserRole()
   {
      return $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->fetchAll();
   }
}