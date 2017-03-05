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
      COLUMN_USER = 'id_user',
      COLUMN_SOURCE = 'id_source',
      COLUMN_TARGET = 'id_target',
      COLUMN_START_DATE = 'start_date',
      COLUMN_PRIMARY_EMAIL = 'primary_email',
      COLUMN_SECONDARY_EMAIL = 'secondary_email',
      COLUMN_STATUS = 'status',
      COLUMN_START_TYPE = 'start_type',
      COLUMN_START_VALUE = 'start_value',
      COLUMN_END_TYPE = 'end_type',
      COLUMN_END_OCCURRENCE = 'end_occurrence',
      COLUMN_END_DATE = 'end_date',
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


   /**
    * Get all comparison plans
    * @return array|Nette\Database\IRow[]|Nette\Database\Table\IRow[]|Nette\Database\Table\Selection
    */
   public function getAllPlans()
   {
      return $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->order(self::COLUMN_START_DATE)
         ->fetchAll();
   }


   /**
    * Get plan by ID
    * @param $id
    * @return array|Nette\Database\Table\IRow[]|Nette\Database\Table\Selection
    */
   public function getPlanById($id)
   {
      return $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->where(self::COLUMN_PLAN, $id)
         ->fetch();
   }


   /**
    * Check if user with ID exist
    * @param $id
    * @return bool
    */
   public function existPlanById($id)
   {
      $query = $this->getPlanById($id);

      return $query == FALSE ? FALSE : TRUE;
   }


   /**
    * Create new comparison plan
    * @param $userID
    * @param $sourceID
    * @param $targetID
    * @param $startDate
    * @param $primaryEmail
    * @param $secondaryEmail
    * @param $status
    * @param $startType
    * @param $startValue
    * @param $endType
    * @param $endOccurrence
    * @param $endDate
    * @param $color
    * @param $background
    * @param $tolerance
    * @param $difference
    * @param $ignoreActive
    * @param $ignoreTop
    * @param $ignoreLeft
    * @param $ignoreWidth
    * @param $ignoreHeight
    */
   public function addPlan(
      $userID,
      $sourceID,
      $targetID,
      $startDate,
      $primaryEmail,
      $secondaryEmail,
      $status,
      $startType,
      $startValue,
      $endType,
      $endOccurrence,
      $endDate,
      $color,
      $background,
      $tolerance,
      $difference,
      $ignoreActive,
      $ignoreTop,
      $ignoreLeft,
      $ignoreWidth,
      $ignoreHeight
   )
   {
      $this->db->table(self::TABLE_NAME)
         ->insert([
            self::COLUMN_USER => (int)($userID),
            self::COLUMN_SOURCE => (int)($sourceID),
            self::COLUMN_TARGET => (int)($targetID),
            self::COLUMN_START_DATE => DateTime::from($startDate),
            self::COLUMN_PRIMARY_EMAIL => $primaryEmail,
            self::COLUMN_SECONDARY_EMAIL => $secondaryEmail,
            self::COLUMN_STATUS => $status,
            self::COLUMN_START_TYPE => (int)($startType),
            self::COLUMN_START_VALUE => (int)($startValue),
            self::COLUMN_END_TYPE => (int)($endType),
            self::COLUMN_END_OCCURRENCE => (int)($endOccurrence),
            self::COLUMN_END_DATE => ($endDate != NULL) ? DateTime::from($endDate) : NULL,
            self::COLUMN_COLOR => $color,
            self::COLUMN_BACKGROUND => $background,
            self::COLUMN_TOLERANCE => (int)($tolerance),
            self::COLUMN_DIFFERENCE => floatval($difference),
            self::COLUMN_IGNORE_TOP => ($ignoreActive == TRUE) ? (int)($ignoreTop) : NULL,
            self::COLUMN_IGNORE_LEFT => ($ignoreActive == TRUE) ? (int)($ignoreLeft) : NULL,
            self::COLUMN_IGNORE_WIDTH => ($ignoreActive == TRUE) ? (int)($ignoreWidth) : NULL,
            self::COLUMN_IGNORE_HEIGHT => ($ignoreActive == TRUE) ? (int)($ignoreHeight) : NULL,
         ]);
   }


   /** Edit plan
    * @param $planID
    * @param $startDate
    * @param $primaryEmail
    * @param $secondaryEmail
    * @param $status
    * @param $startType
    * @param $startValue
    * @param $endType
    * @param $endOccurrence
    * @param $endDate
    * @param $color
    * @param $background
    * @param $tolerance
    * @param $difference
    * @param $ignoreActive
    * @param $ignoreTop
    * @param $ignoreLeft
    * @param $ignoreWidth
    * @param $ignoreHeight
    */
   public function editPlan(
      $planID,
      $startDate,
      $primaryEmail,
      $secondaryEmail,
      $status,
      $startType,
      $startValue,
      $endType,
      $endOccurrence,
      $endDate,
      $color,
      $background,
      $tolerance,
      $difference,
      $ignoreActive,
      $ignoreTop,
      $ignoreLeft,
      $ignoreWidth,
      $ignoreHeight
   )
   {
      $this->db->table(self::TABLE_NAME)
         ->where(self::COLUMN_PLAN, $planID)
         ->update([
            self::COLUMN_START_DATE => DateTime::from($startDate),
            self::COLUMN_PRIMARY_EMAIL => $primaryEmail,
            self::COLUMN_SECONDARY_EMAIL => $secondaryEmail,
            self::COLUMN_STATUS => $status,
            self::COLUMN_START_TYPE => (int)($startType),
            self::COLUMN_START_VALUE => (int)($startValue),
            self::COLUMN_END_TYPE => (int)($endType),
            self::COLUMN_END_OCCURRENCE => (int)($endOccurrence),
            self::COLUMN_END_DATE => ($endDate != NULL) ? DateTime::from($endDate) : NULL,
            self::COLUMN_COLOR => $color,
            self::COLUMN_BACKGROUND => $background,
            self::COLUMN_TOLERANCE => (int)($tolerance),
            self::COLUMN_DIFFERENCE => floatval($difference),
            self::COLUMN_IGNORE_TOP => ($ignoreActive == TRUE) ? (int)($ignoreTop) : NULL,
            self::COLUMN_IGNORE_LEFT => ($ignoreActive == TRUE) ? (int)($ignoreLeft) : NULL,
            self::COLUMN_IGNORE_WIDTH => ($ignoreActive == TRUE) ? (int)($ignoreWidth) : NULL,
            self::COLUMN_IGNORE_HEIGHT => ($ignoreActive == TRUE) ? (int)($ignoreHeight) : NULL,
         ]);
   }


   /**
    * Delete plan
    * @param $id
    */
   public function deletePlan($id)
   {
      $this->db->table(self::TABLE_NAME)->where(self::COLUMN_PLAN, $id)->delete();
   }
}