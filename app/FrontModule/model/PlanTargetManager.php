<?php

namespace App\FrontModule\Model;

use Nette;
use Nette\Utils\Strings;

/**
 * Plan target management.
 */
class PlanTargetManager
{
   const
      TABLE_NAME = 'plan_target',
      COLUMN_ID = 'id_plan_target',
      COLUMN_USER = 'id_user',
      COLUMN_DEVICE = 'id_device',
      COLUMN_DATE = 'date',
      COLUMN_ENGINE = 'engine',
      COLUMN_BROWSER_NAME = 'browser_name',
      COLUMN_BROWSER_VERSION = 'browser_version',
      COLUMN_URL = 'url',
      COLUMN_URL_AUTORITY = 'url_autority',
      COLUMN_IMG_TYPE = 'img_type',
      COLUMN_IMG_MIME = 'img_mime',
      COLUMN_PATH_IMG = 'path_img',
      COLUMN_PATH_JS = 'path_js',
      COLUMN_OTHER_WIDTH = 'other_width',
      COLUMN_OTHER_HEIGHT = 'other_height',
      COLUMN_CROP_VIEWPORT_WIDTH = 'crop_viewport_width',
      COLUMN_CROP_VIEWPORT_HEIGHT = 'crop_viewport_height',
      COLUMN_CROP_TOP = 'crop_top',
      COLUMN_CROP_LEFT = 'crop_left',
      COLUMN_CROP_WIDTH = 'crop_width',
      COLUMN_CROP_HEIGHT = 'crop_height';


   /** @var Nette\Database\Context */
   private $db;


   public function __construct(Nette\Database\Context $db)
   {
      $this->db = $db;
   }


   /**
    * Get last target created by comparison plan
    * @param $userID
    * @param $deviceID
    * @param $date
    * @return bool|mixed|Nette\Database\IRow|Nette\Database\Table\IRow
    */
   public function getLastTarget($userID, $deviceID, $date)
   {
      return $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->where(self::COLUMN_USER, $userID)
         ->where(self::COLUMN_DEVICE, $deviceID)
         ->where(self::COLUMN_DATE, $date)
         ->fetch();
   }


   /**
    * Get target by ID
    * @param $id
    * @return bool|mixed|Nette\Database\Table\IRow
    */
   public function getTargetByID($id)
   {
      return $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->where(self::COLUMN_ID, $id)
         ->fetch();
   }


   /** Add plan target shoot to DB
    * @param $userId
    * @param $deviceID
    * @param $date
    * @param $engine
    * @param $absoluteURL
    * @param $autorityURL
    * @param $imgType
    * @param $imgMime
    * @param $pathImg
    * @param $pathJS
    * @param $otherWidth
    * @param $otherHeight
    * @param $cropViewportWidth
    * @param $cropViewportHeight
    * @param $cropTop
    * @param $cropLeft
    * @param $cropWidth
    * @param $cropHeight
    */
   public function addTarget(
      $userId,
      $deviceID,
      $date,
      $engine,
      $browserName,
      $browserVersion,
      $absoluteURL,
      $autorityURL,
      $imgType,
      $imgMime,
      $pathImg,
      $pathJS,
      $otherWidth,
      $otherHeight,
      $cropViewportWidth,
      $cropViewportHeight,
      $cropTop,
      $cropLeft,
      $cropWidth,
      $cropHeight
   )
   {
      $this->db->table(self::TABLE_NAME)
         ->insert([
            self::COLUMN_USER => $userId,
            self::COLUMN_DEVICE => $deviceID,
            self::COLUMN_DATE => $date,
            self::COLUMN_ENGINE => $engine,
            self::COLUMN_BROWSER_NAME => $browserName,
            self::COLUMN_BROWSER_VERSION => $browserVersion,
            self::COLUMN_URL => $absoluteURL,
            self::COLUMN_URL_AUTORITY => $autorityURL,
            self::COLUMN_IMG_TYPE => $imgType,
            self::COLUMN_IMG_MIME => $imgMime,
            self::COLUMN_PATH_IMG => $pathImg,
            self::COLUMN_PATH_JS => $pathJS,
            self::COLUMN_OTHER_WIDTH => $otherWidth,
            self::COLUMN_OTHER_HEIGHT => $otherHeight,
            self::COLUMN_CROP_VIEWPORT_WIDTH => $cropViewportWidth,
            self::COLUMN_CROP_VIEWPORT_HEIGHT => $cropViewportHeight,
            self::COLUMN_CROP_TOP => $cropTop,
            self::COLUMN_CROP_LEFT => $cropLeft,
            self::COLUMN_CROP_WIDTH => $cropWidth,
            self::COLUMN_CROP_HEIGHT => $cropHeight
         ]);
   }

}