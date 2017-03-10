<?php

namespace App\FrontModule\Model;

use Nette;
use Nette\Utils\Strings;
use Nette\Utils\DateTime;

/**
 * Plan history management.
 */
class PlanHistoryManager
{
   const
      TABLE_NAME = 'plan_history',
      COLUMN_PLAN = 'id_history',
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


   public function getPlanForTerminate($daily, $weekly, $monthly, $yearly, $never, $occurrence, $date)
   {
      $cronRunTime = 10;   // cron run each 10 minutes

      $result = [];
      $now = new DateTime();
      $todayDateOnly = $now->format('Y-m-d');


      /**
       * Plans with: start_date == today_date, status = FALSE
       */
      $result += $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->where(self::COLUMN_STATUS, FALSE)
         ->where(self::COLUMN_START_DATE .' BETWEEN DATE_SUB(?, INTERVAL ? MINUTE) AND ?', $now, $cronRunTime, $now)
         ->fetchAll();




      /**
       * Plans with: start_date <= today_date, status = TRUE, start_type = 1, end_type = 1
       */
      $result += $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->where('CAST(start_date AS DATE) <= ?', $todayDateOnly)
         ->where(self::COLUMN_STATUS, TRUE)
         ->where(self::COLUMN_START_TYPE, $daily)
         ->where('MOD(TIMESTAMPDIFF(DAY, start_date, ?), start_value) = 0', $now)
         ->where(self::COLUMN_END_TYPE, $never)
         ->where('DATE_ADD(' . self::COLUMN_START_DATE . ', INTERVAL TIMESTAMPDIFF(DAY, ' . self::COLUMN_START_DATE . ', ?) DAY) BETWEEN DATE_SUB(?, INTERVAL ? MINUTE) AND ?', $now, $now, $cronRunTime, $now)
         ->fetchAll();


      /**
       * Plans with: start_date <= today_date, status = TRUE, start_type = 1, end_type = 2
       */
      $result += $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->where('CAST(start_date AS DATE) <= ?', $todayDateOnly)
         ->where(self::COLUMN_STATUS, TRUE)
         ->where(self::COLUMN_START_TYPE, $daily)
         ->where('MOD(TIMESTAMPDIFF(DAY, start_date, ?), start_value) = 0', $now)
         ->where(self::COLUMN_END_TYPE, $occurrence)
         ->where('? BETWEEN start_date AND DATE_ADD(start_date, INTERVAL (start_value * end_occurrence) DAY)', $now)
         ->where('DATE_ADD(' . self::COLUMN_START_DATE . ', INTERVAL TIMESTAMPDIFF(DAY, ' . self::COLUMN_START_DATE . ', ?) DAY) BETWEEN DATE_SUB(?, INTERVAL ? MINUTE) AND ?', $now, $now, $cronRunTime, $now)
         ->fetchAll();


      /**
       * Plans with: start_date <= today_date, status = TRUE, start_type = 1, end_type = 3
       */
      $result += $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->where('CAST(start_date AS DATE) <= ?', $todayDateOnly)
         ->where(self::COLUMN_STATUS, TRUE)
         ->where(self::COLUMN_START_TYPE, $daily)
         ->where('MOD(TIMESTAMPDIFF(DAY, start_date, ?), start_value) = 0', $now)
         ->where(self::COLUMN_END_TYPE, $date)
         ->where('? BETWEEN start_date AND end_date', $now)
         ->where('DATE_ADD(' . self::COLUMN_START_DATE . ', INTERVAL TIMESTAMPDIFF(DAY, ' . self::COLUMN_START_DATE . ', ?) DAY) BETWEEN DATE_SUB(?, INTERVAL ? MINUTE) AND ?', $now, $now, $cronRunTime, $now)
         ->fetchAll();




      /**
       * Plans with: start_date <= today_date, status = TRUE, start_type = 2, end_type = 1
       */
      $result += $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->where('CAST(start_date AS DATE) <= ?', $todayDateOnly)
         ->where(self::COLUMN_STATUS, TRUE)
         ->where(self::COLUMN_START_TYPE, $weekly)
         ->where('TIMESTAMPDIFF(WEEK, start_date, ?) > 0', $now)
         ->where('MOD(TIMESTAMPDIFF(WEEK, start_date, ?), start_value) = 0', $now)
         ->where(self::COLUMN_END_TYPE, $never)
         ->where('DATE_ADD(' . self::COLUMN_START_DATE . ', INTERVAL TIMESTAMPDIFF(WEEK, ' . self::COLUMN_START_DATE . ', ?) WEEK) BETWEEN DATE_SUB(?, INTERVAL ? MINUTE) AND ?', $now, $now, $cronRunTime, $now)
         ->fetchAll();


      /**
       * Plans with: start_date <= today_date, status = TRUE, start_type = 2, end_type = 2
       */
      $result += $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->where('CAST(start_date AS DATE) <= ?', $todayDateOnly)
         ->where(self::COLUMN_STATUS, TRUE)
         ->where(self::COLUMN_START_TYPE, $weekly)
         ->where('TIMESTAMPDIFF(WEEK, start_date, ?) > 0', $now)
         ->where('MOD(TIMESTAMPDIFF(WEEK, start_date, ?), start_value) = 0', $now)
         ->where(self::COLUMN_END_TYPE, $occurrence)
         ->where('? BETWEEN start_date AND DATE_ADD(start_date, INTERVAL (start_value * end_occurrence) WEEK)', $now)
         ->where('DATE_ADD(' . self::COLUMN_START_DATE . ', INTERVAL TIMESTAMPDIFF(WEEK, ' . self::COLUMN_START_DATE . ', ?) WEEK) BETWEEN DATE_SUB(?, INTERVAL ? MINUTE) AND ?', $now, $now, $cronRunTime, $now)
         ->fetchAll();


      /**
       * Plans with: start_date <= today_date, status = TRUE, start_type = 2, end_type = 3
       */
      $result += $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->where('CAST(start_date AS DATE) <= ?', $todayDateOnly)
         ->where(self::COLUMN_STATUS, TRUE)
         ->where(self::COLUMN_START_TYPE, $weekly)
         ->where('TIMESTAMPDIFF(WEEK, start_date, ?) > 0', $now)
         ->where('MOD(TIMESTAMPDIFF(WEEK, start_date, ?), start_value) = 0', $now)
         ->where(self::COLUMN_END_TYPE, $date)
         ->where('? BETWEEN start_date AND end_date', $now)
         ->where('DATE_ADD(' . self::COLUMN_START_DATE . ', INTERVAL TIMESTAMPDIFF(WEEK, ' . self::COLUMN_START_DATE . ', ?) WEEK) BETWEEN DATE_SUB(?, INTERVAL ? MINUTE) AND ?', $now, $now, $cronRunTime, $now)
         ->fetchAll();




      /**
       * Plans with: start_date <= today_date, status = TRUE, start_type = 3, end_type = 1
       */
      $result += $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->where('CAST(start_date AS DATE) <= ?', $todayDateOnly)
         ->where(self::COLUMN_STATUS, TRUE)
         ->where(self::COLUMN_START_TYPE, $monthly)
         ->where('TIMESTAMPDIFF(MONTH, start_date, ?) > 0', $now)
         ->where('MOD(TIMESTAMPDIFF(MONTH, start_date, ?), start_value) = 0', $now)
         ->where(self::COLUMN_END_TYPE, $never)
         ->where('DATE_ADD(' . self::COLUMN_START_DATE . ', INTERVAL TIMESTAMPDIFF(MONTH, ' . self::COLUMN_START_DATE . ', ?) MONTH) BETWEEN DATE_SUB(?, INTERVAL ? MINUTE) AND ?', $now, $now, $cronRunTime, $now)
         ->fetchAll();


      /**
       * Plans with: start_date <= today_date, status = TRUE, start_type = 3, end_type = 2
       */
      $result += $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->where('CAST(start_date AS DATE) <= ?', $todayDateOnly)
         ->where(self::COLUMN_STATUS, TRUE)
         ->where(self::COLUMN_START_TYPE, $monthly)
         ->where('TIMESTAMPDIFF(MONTH, start_date, ?) > 0', $now)
         ->where('MOD(TIMESTAMPDIFF(MONTH, start_date, ?), start_value) = 0', $now)
         ->where(self::COLUMN_END_TYPE, $occurrence)
         ->where('? BETWEEN start_date AND DATE_ADD(start_date, INTERVAL (start_value * end_occurrence) MONTH)', $now)
         ->where('DATE_ADD(' . self::COLUMN_START_DATE . ', INTERVAL TIMESTAMPDIFF(MONTH, ' . self::COLUMN_START_DATE . ', ?) MONTH) BETWEEN DATE_SUB(?, INTERVAL ? MINUTE) AND ?', $now, $now, $cronRunTime, $now)
         ->fetchAll();


      /**
       * Plans with: start_date <= today_date, status = TRUE, start_type = 3, end_type = 3
       */
      $result += $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->where('CAST(start_date AS DATE) <= ?', $todayDateOnly)
         ->where(self::COLUMN_STATUS, TRUE)
         ->where(self::COLUMN_START_TYPE, $monthly)
         ->where('TIMESTAMPDIFF(MONTH, start_date, ?) > 0', $now)
         ->where('MOD(TIMESTAMPDIFF(MONTH, start_date, ?), start_value) = 0', $now)
         ->where(self::COLUMN_END_TYPE, $date)
         ->where('? BETWEEN start_date AND end_date', $now)
         ->where('DATE_ADD(' . self::COLUMN_START_DATE . ', INTERVAL TIMESTAMPDIFF(MONTH, ' . self::COLUMN_START_DATE . ', ?) MONTH) BETWEEN DATE_SUB(?, INTERVAL ? MINUTE) AND ?', $now, $now, $cronRunTime, $now)
         ->fetchAll();




      /**
       * Plans with: start_date <= today_date, status = TRUE, start_type = 4, end_type = 1
       */
      $result += $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->where('CAST(start_date AS DATE) <= ?', $todayDateOnly)
         ->where(self::COLUMN_STATUS, TRUE)
         ->where(self::COLUMN_START_TYPE, $yearly)
         ->where('TIMESTAMPDIFF(YEAR, start_date, ?) > 0', $now)
         ->where('MOD(TIMESTAMPDIFF(YEAR, start_date, ?), start_value) = 0', $now)
         ->where(self::COLUMN_END_TYPE, $never)
         ->where('DATE_ADD(' . self::COLUMN_START_DATE . ', INTERVAL TIMESTAMPDIFF(YEAR, ' . self::COLUMN_START_DATE . ', ?) YEAR) BETWEEN DATE_SUB(?, INTERVAL ? MINUTE) AND ?', $now, $now, $cronRunTime, $now)
         ->fetchAll();


      /**
       * Plans with: start_date <= today_date, status = TRUE, start_type = 4, end_type = 2
       */
      $result += $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->where('CAST(start_date AS DATE) <= ?', $todayDateOnly)
         ->where(self::COLUMN_STATUS, TRUE)
         ->where(self::COLUMN_START_TYPE, $yearly)
         ->where('TIMESTAMPDIFF(YEAR, start_date, ?) > 0', $now)
         ->where('MOD(TIMESTAMPDIFF(YEAR, start_date, ?), start_value) = 0', $now)
         ->where(self::COLUMN_END_TYPE, $occurrence)
         ->where('? BETWEEN start_date AND DATE_ADD(start_date, INTERVAL (start_value * end_occurrence) MONTH)', $now)
         ->where('DATE_ADD(' . self::COLUMN_START_DATE . ', INTERVAL TIMESTAMPDIFF(MONTH, ' . self::COLUMN_START_DATE . ', ?) MONTH) BETWEEN DATE_SUB(?, INTERVAL ? MINUTE) AND ?', $now, $now, $cronRunTime, $now)
         ->fetchAll();


      /**
       * Plans with: start_date <= today_date, status = TRUE, start_type = 4, end_type = 3
       */
      $result += $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->where('CAST(start_date AS DATE) <= ?', $todayDateOnly)
         ->where(self::COLUMN_STATUS, TRUE)
         ->where(self::COLUMN_START_TYPE, $yearly)
         ->where('TIMESTAMPDIFF(YEAR, start_date, ?) > 0', $now)
         ->where('MOD(TIMESTAMPDIFF(YEAR, start_date, ?), start_value) = 0', $now)
         ->where(self::COLUMN_END_TYPE, $date)
         ->where('? BETWEEN start_date AND end_date', $now)
         ->where('DATE_ADD(' . self::COLUMN_START_DATE . ', INTERVAL TIMESTAMPDIFF(YEAR, ' . self::COLUMN_START_DATE . ', ?) YEAR) BETWEEN DATE_SUB(?, INTERVAL ? MINUTE) AND ?', $now, $now, $cronRunTime, $now)
         ->fetchAll();


      return $result;
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