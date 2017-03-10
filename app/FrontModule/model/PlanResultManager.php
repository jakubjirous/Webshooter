<?php

namespace App\FrontModule\Model;

use Nette;
use Nette\Utils\Strings;
use Nette\Utils\DateTime;


/**
 * Plan result management.
 */
class PlanResultManager
{
   const
      TABLE_NAME = 'plan_result',
      COLUMN_ID = 'id_plan_result',
      COLUMN_SOURCE = 'id_source',
      COLUMN_PLAN_TARGET = 'id_plan_target',
      COLUMN_PLAN = 'id_plan',
      COLUMN_COLOR = 'color',
      COLUMN_BACKGROUND = 'background',
      COLUMN_TOLERANCE = 'tolerance',
      COLUMN_DIFFERENCE = 'difference',
      COLUMN_DIFFERENCE_RESULT = 'difference_result',
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
    * Get results by plan ID
    * @param $id
    * @return bool|mixed|Nette\Database\IRow|Nette\Database\Table\IRow
    */
   public function getResultsByPlanID($id)
   {
         return $this->db->table(self::TABLE_NAME)
            ->select('*')
            ->where(self::COLUMN_PLAN, $id)
            ->order(self::COLUMN_DATE . ' DESC')
            ->fetchAll();
   }


   /**
    * Get result by ID
    * @param $id
    * @return bool|mixed|Nette\Database\Table\IRow
    */
   public function getResultByID($id)
   {
      return $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->where(self::COLUMN_ID, $id)
         ->fetch();
   }


   /**
    * Get results count in plan by ID
    * @param $id
    * @return int|mixed
    */
   public function getResultsCountInPlanByID($id)
   {
      return $this->db->table(self::TABLE_NAME)
         ->select(self::COLUMN_ID)
         ->where(self::COLUMN_PLAN, $id)
         ->count();
   }


   /**
    * Get last result created by comparison plan
    * @param $sourceID
    * @param $planTargetID
    * @param $planID
    * @param $date
    * @return bool|mixed|Nette\Database\IRow|Nette\Database\Table\IRow
    */
   public function getLastResult($sourceID, $planTargetID, $planID, $date)
   {
      return $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->where(self::COLUMN_SOURCE, $sourceID)
         ->where(self::COLUMN_PLAN_TARGET, $planTargetID)
         ->where(self::COLUMN_PLAN, $planID)
         ->where(self::COLUMN_DATE, $date)
         ->fetch();
   }


    /**
    * Add new plan result
    * @param $sourceID
    * @param $planTargetID
    * @param $planID
    * @param $color
    * @param $background
    * @param $tolerance
    * @param $difference
    * @param $differenceResult
    * @param $ignoreActive
    * @param $ignoreTop
    * @param $ignoreLeft
    * @param $ignoreWidth
    * @param $ignoreHeight
    * @param $path
    * @param $date
    */
   public function addResult(
      $sourceID,
      $planTargetID,
      $planID,
      $color,
      $background,
      $tolerance,
      $difference,
      $differenceResult,
      $ignoreActive,
      $ignoreTop,
      $ignoreLeft,
      $ignoreWidth,
      $ignoreHeight,
      $path,
      $date
   )
   {
      $this->db->table(self::TABLE_NAME)
         ->insert([
            self::COLUMN_SOURCE => $sourceID,
            self::COLUMN_PLAN_TARGET => $planTargetID,
            self::COLUMN_PLAN => $planID,
            self::COLUMN_COLOR => $color,
            self::COLUMN_BACKGROUND => $background,
            self::COLUMN_TOLERANCE => (int)($tolerance),
            self::COLUMN_DIFFERENCE => floatval($difference),
            self::COLUMN_DIFFERENCE_RESULT => floatval($differenceResult),
            self::COLUMN_IGNORE_ACTIVE => $ignoreActive,
            self::COLUMN_IGNORE_TOP => ($ignoreTop == NULL) ? 0 : $ignoreTop,
            self::COLUMN_IGNORE_LEFT => ($ignoreLeft == NULL) ? 0 : $ignoreLeft,
            self::COLUMN_IGNORE_WIDTH => ($ignoreWidth == NULL) ? 0 : $ignoreWidth,
            self::COLUMN_IGNORE_HEIGHT => ($ignoreHeight == NULL) ? 0 : $ignoreHeight,
            self::COLUMN_PATH_IMG => $path,
            self::COLUMN_DATE => $date,
         ]);
   }
}