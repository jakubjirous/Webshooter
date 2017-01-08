<?php

namespace App\FrontModule\Model;

use Nette;


/**
 * Device type management.
 */
class DeviceTypeManager
{
	const
		TABLE_NAME = 'device_type',
		COLUMN_ID = 'id_type',
      COLUMN_TYPE = 'type';


	/** @var Nette\Database\Context */
	private $db;


	public function __construct(Nette\Database\Context $db)
	{
		$this->db = $db;
	}


   /**
    * Get all device types
    * @return array|Nette\Database\IRow[]|Nette\Database\Table\IRow[]|Nette\Database\Table\Selection
    */
	public function getAllDeviceType()
   {
      return $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->fetchAll();
   }
}