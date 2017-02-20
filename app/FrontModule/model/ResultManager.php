<?php

namespace App\FrontModule\Model;

use Nette;
use Nette\Utils\Strings;
use Nette\Utils\DateTime;

/**
 * Result management.
 */
class ResultManager
{
   const
      TABLE_NAME = 'result',
      COLUMN_SOURCE = 'id_source',
      COLUMN_TARGET = 'id_target',
      COLUMN_DIFFERENCE = 'difference',
      COLUMN_PATH_IMG = 'path_img',
      COLUMN_DATE = 'date';


   /** @var Nette\Database\Context */
   private $db;


   public function __construct(Nette\Database\Context $db)
   {
      $this->db = $db;
   }


   /**
    * Get result by source ID and target ID
    * @param $source
    * @param $target
    * @return bool|mixed|Nette\Database\IRow|Nette\Database\Table\IRow
    */
   public function getResult($source, $target)
   {
       return $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->where(self::COLUMN_SOURCE, $source)
         ->where(self::COLUMN_TARGET, $target)
         ->fetch();
   }


   /**
    * Add new result
    * @param $source
    * @param $target
    * @param $difference
    * @param $path
    */
   public function addResult($source, $target, $difference, $path)
   {
      try {
         $this->db->table(self::TABLE_NAME)
            ->insert([
               self::COLUMN_SOURCE => $source,
               self::COLUMN_TARGET => $target,
               self::COLUMN_DIFFERENCE => $difference,
               self::COLUMN_PATH_IMG => $path,
               self::COLUMN_DATE => new DateTime(),
            ]);

      } catch (Nette\Database\UniqueConstraintViolationException $e) {
         $this->db->table(self::TABLE_NAME)
            ->where(self::COLUMN_SOURCE, $source)
            ->where(self::COLUMN_TARGET, $target)
            ->update([
               self::COLUMN_DIFFERENCE => $difference,
               self::COLUMN_PATH_IMG => $path,
               self::COLUMN_DATE => new DateTime(),
            ]);
      }
   }
}