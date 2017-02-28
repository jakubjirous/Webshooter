<?php

namespace App\FrontModule\Model;

use Nette;
use Nette\Utils\Strings;
use Nette\Utils\DateTime;

/**
 * Repeate end management.
 */
class RepeateEndManager
{
   const
      TABLE_NAME = 'repeate_end',
      COLUMN_REPEATE = 'id_repeate',
      COLUMN_TYPE = 'type';


   /** @var Nette\Database\Context */
   private $db;


   public function __construct(Nette\Database\Context $db)
   {
      $this->db = $db;
   }


   /**
    * Get all types
    * @return array|Nette\Database\Table\IRow[]|Nette\Database\Table\Selection
    */
   public function getAllTypes()
   {
      return $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->fetchAll();
   }

}