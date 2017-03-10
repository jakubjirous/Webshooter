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
      COLUMN_COLOR = 'color',
      COLUMN_BACKGROUND = 'background',
      COLUMN_TOLERANCE = 'tolerance',
      COLUMN_DIFFERENCE = 'difference',
      COLUMN_IGNORE_ACTIVE = 'ignore_active',
      COLUMN_IGNORE_TOP = 'ignore_top',
      COLUMN_IGNORE_LEFT = 'ignore_left',
      COLUMN_IGNORE_WIDTH = 'ignore_width',
      COLUMN_IGNORE_HEIGHT = 'ignore_height',
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
   public function addResult(
      $source,
      $target,
      $color,
      $background,
      $tolerance,
      $difference,
      $ignoreActive,
      $ignoreTop,
      $ignoreLeft,
      $ignoreWidth,
      $ignoreHeight,
      $path
   )
   {
      try {
         $this->db->table(self::TABLE_NAME)
            ->insert([
               self::COLUMN_SOURCE => $source,
               self::COLUMN_TARGET => $target,
               self::COLUMN_COLOR => $color,
               self::COLUMN_BACKGROUND => $background,
               self::COLUMN_TOLERANCE => $tolerance,
               self::COLUMN_DIFFERENCE => $difference,
               self::COLUMN_IGNORE_ACTIVE => $ignoreActive,
               self::COLUMN_IGNORE_TOP => $ignoreTop,
               self::COLUMN_IGNORE_LEFT => $ignoreLeft,
               self::COLUMN_IGNORE_WIDTH => $ignoreWidth,
               self::COLUMN_IGNORE_HEIGHT => $ignoreHeight,
               self::COLUMN_PATH_IMG => $path,
               self::COLUMN_DATE => new DateTime(),
            ]);

      } catch (Nette\Database\UniqueConstraintViolationException $e) {
         $this->db->table(self::TABLE_NAME)
            ->where(self::COLUMN_SOURCE, $source)
            ->where(self::COLUMN_TARGET, $target)
            ->update([
               self::COLUMN_COLOR => $color,
               self::COLUMN_BACKGROUND => $background,
               self::COLUMN_TOLERANCE => $tolerance,
               self::COLUMN_DIFFERENCE => $difference,
               self::COLUMN_IGNORE_ACTIVE => $ignoreActive,
               self::COLUMN_IGNORE_TOP => $ignoreTop,
               self::COLUMN_IGNORE_LEFT => $ignoreLeft,
               self::COLUMN_IGNORE_WIDTH => $ignoreWidth,
               self::COLUMN_IGNORE_HEIGHT => $ignoreHeight,
               self::COLUMN_PATH_IMG => $path,
               self::COLUMN_DATE => new DateTime(),
            ]);
      }
   }
}