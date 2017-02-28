<?php

namespace App\FrontModule\Model;

use Nette;
use Nette\Utils\Strings;
use Nette\Utils\DateTime;

/**
 * Plan management.
 */
class PlanManager
{
   const
      TABLE_NAME = 'plan',
      COLUMN_PLAN = 'id_plan',
      COLUMN_SOURCE = 'id_source',
      COLUMN_TARGET = 'id_target',
      COLUMN_DATE = 'date',
      COLUMN_EMAIL = 'email',
      COLUMN_REPEATE_STATUS = 'repeate_status',
      COLUMN_REPEATE_START_TYPE = 'repeate_start_type',
      COLUMN_REPEATE_START_VALUE = 'repeate_start_value',
      COLUMN_REPEATE_END_TYPE = 'repeate_end_type',
      COLUMN_REPEATE_END_NEVER = 'repeate_end_never',
      COLUMN_REPEATE_END_DATE = 'repeate_end_date',
      COLUMN_REPEATE_END_OCCURRENCE = 'repeate_end_occurrence',
      COLUMN_COLOR = 'color',
      COLUMN_BACKGROUND = 'background',
      COLUMN_TOLERANCE = 'tolerance',
      COLUMN_DIFFERENCE = 'difference',
      COLUMN_IGNORE_TOP = 'ignore_top',
      COLUMN_IGNORE_LEFT = 'ignore_left',
      COLUMN_IGNORE_WIDTH = 'ignore_width',
      COLUMN_IGNORE_HEIGHT = 'ignore_height';


   /** @var Nette\Database\Context */
   private $db;


   public function __construct(Nette\Database\Context $db)
   {
      $this->db = $db;
   }


//   /**
//    * Get result by source ID and target ID
//    * @param $source
//    * @param $target
//    * @return bool|mixed|Nette\Database\IRow|Nette\Database\Table\IRow
//    */
//   public function getResult($source, $target)
//   {
//       return $this->db->table(self::TABLE_NAME)
//         ->select('*')
//         ->where(self::COLUMN_SOURCE, $source)
//         ->where(self::COLUMN_TARGET, $target)
//         ->fetch();
//   }
//
//
//   /**
//    * Add new result
//    * @param $source
//    * @param $target
//    * @param $difference
//    * @param $path
//    */
//   public function addResult($source, $target, $difference, $path)
//   {
//      try {
//         $this->db->table(self::TABLE_NAME)
//            ->insert([
//               self::COLUMN_SOURCE => $source,
//               self::COLUMN_TARGET => $target,
//               self::COLUMN_DIFFERENCE => $difference,
//               self::COLUMN_PATH_IMG => $path,
//               self::COLUMN_DATE => new DateTime(),
//            ]);
//
//      } catch (Nette\Database\UniqueConstraintViolationException $e) {
//         $this->db->table(self::TABLE_NAME)
//            ->where(self::COLUMN_SOURCE, $source)
//            ->where(self::COLUMN_TARGET, $target)
//            ->update([
//               self::COLUMN_DIFFERENCE => $difference,
//               self::COLUMN_PATH_IMG => $path,
//               self::COLUMN_DATE => new DateTime(),
//            ]);
//      }
//   }
}