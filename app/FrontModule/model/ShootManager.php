<?php

namespace App\FrontModule\Model;

use Nette;
use Nette\Utils\Strings;

/**
 * Shoot management.
 */
class ShootManager
{
   const
      TABLE_NAME = 'shoot',
      COLUMN_ID = 'id_shoot',
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
    * Get all shoots
    * @return array|Nette\Database\Table\IRow[]|Nette\Database\Table\Selection
    */
   public function getAllShoot()
   {
      return $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->order(self::COLUMN_DATE . ' DESC')
         ->fetchAll();
   }


   /**
    * Get shoots limited by count
    * @param $count
    * @return array|Nette\Database\Table\IRow[]|Nette\Database\Table\Selection
    */
   public function getShootBox($count)
   {
      return $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->order(self::COLUMN_DATE . ' DESC')
         ->limit($count)
         ->fetchAll();
   }


   /**
    * Get shoot by ID
    * @param $id
    * @return array|Nette\Database\Table\IRow[]|Nette\Database\Table\Selection
    */
   public function getShootById($id)
   {
      return $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->where(self::COLUMN_ID, $id)
         ->fetch();
   }


   /**
    * Check if shoot by ID exist
    * @param $id
    * @return bool
    */
   public function existShootById($id)
   {
      $result = $this->db->table(self::TABLE_NAME)
         ->select(self::COLUMN_ID)
         ->where(self::COLUMN_ID, $id)
         ->fetch();

      return $result == NULL ? FALSE : TRUE;
   }


   /**
    * Get similar shoot with shoot get by ID
    * URL, Device, Other or Crop options must be same
    * @param $id
    * @return array|Nette\Database\Table\IRow[]|Nette\Database\Table\Selection|null
    */
   public function getSimilarShootsWithShootById($id)
   {
      $shoot = $this->getShootById($id);
      $url = $shoot->url;
      $deviceId = $shoot->id_device;

      $otherWidth = $shoot->other_width;
      $otherHeight = $shoot->other_height;

      $cropViewportWidth = $shoot->crop_viewport_width;
      $cropViewportHeight = $shoot->crop_viewport_height;
      $cropTop = $shoot->crop_top;
      $cropLeft = $shoot->crop_left;
      $cropWidth = $shoot->crop_width;
      $cropHeight = $shoot->crop_height;

      $result = NULL;

      if ($deviceId != NULL) {
         /**
          * Compare same URL and Device
          */

         $result = $this->db->table(self::TABLE_NAME)
            ->select('*')
            ->where(self::COLUMN_URL, $url)
            ->where(self::COLUMN_DEVICE, $deviceId)
            ->where(self::COLUMN_ID . ' != ', $id)
            ->order(self::COLUMN_DATE . ' DESC')
            ->fetchAll();

      } else {

         if ($otherWidth != NULL) {
            /**
             * Compare same URL and Other
             */
            $result = $this->db->table(self::TABLE_NAME)
               ->select('*')
               ->where(self::COLUMN_URL, $url)
               ->where(self::COLUMN_OTHER_WIDTH, $otherWidth)
               ->where(self::COLUMN_OTHER_HEIGHT, $otherHeight)
               ->where(self::COLUMN_ID . ' != ', $id)
               ->order(self::COLUMN_DATE . ' DESC')
               ->fetchAll();
         } else {

            /**
             * Compare same URL and Crop
             */
            $result = $this->db->table(self::TABLE_NAME)
               ->select('*')
               ->where(self::COLUMN_URL, $url)
               ->where(self::COLUMN_CROP_VIEWPORT_WIDTH, $cropViewportWidth)
               ->where(self::COLUMN_CROP_VIEWPORT_HEIGHT, $cropViewportHeight)
               ->where(self::COLUMN_CROP_TOP, $cropTop)
               ->where(self::COLUMN_CROP_LEFT, $cropLeft)
               ->where(self::COLUMN_CROP_WIDTH, $cropWidth)
               ->where(self::COLUMN_CROP_HEIGHT, $cropHeight)
               ->where(self::COLUMN_ID . ' != ', $id)
               ->order(self::COLUMN_DATE . ' DESC')
               ->fetchAll();
         }
      }

      return $result;
   }


   /** Add new web shoot to DB
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
   public function addShoot(
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


   /**
    * Delete shoot
    * @param $id
    */
   public function deleteShoot($id)
   {
      $this->db->table(self::TABLE_NAME)->where(self::COLUMN_ID, $id)->delete();
   }
}