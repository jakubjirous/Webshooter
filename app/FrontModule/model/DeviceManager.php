<?php

namespace App\FrontModule\Model;

use Nette;
use Nette\Utils\Strings;

/**
 * Device management.
 */
class DeviceManager
{
   const
      TABLE_NAME = 'device',
      COLUMN_ID = 'id_device',
      COLUMN_TYPE = 'id_type',
      COLUMN_DEVICE = 'device',
      COLUMN_PLATFORM = 'platform',
      COLUMN_SCREEN_IN = 'screen_in',
      COLUMN_SCREEN_WIDTH_IN = 'screen_width_in',
      COLUMN_SCREEN_HEIGHT_IN = 'screen_height_in',
      COLUMN_SCREEN_CM = 'screen_cm',
      COLUMN_SCREEN_WIDTH_CM = 'screen_width_cm',
      COLUMN_SCREEN_HEIGHT_CM = 'screen_height_cm',
      COLUMN_ASPECT_RATIO = 'aspect_ratio',
      COLUMN_WIDTH_DP = 'width_dp',
      COLUMN_HEIGHT_DP = 'height_dp',
      COLUMN_WIDTH_PX = 'width_px',
      COLUMN_HEIGHT_PX = 'height_px',
      COLUMN_DENSITY = 'density';


   /** @var Nette\Database\Context */
   private $db;


   public function __construct(Nette\Database\Context $db)
   {
      $this->db = $db;
   }


   /**
    * Get all devices
    * @return array|Nette\Database\Table\IRow[]|Nette\Database\Table\Selection
    */
   public function getAllDevice()
   {
      return $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->order(self::COLUMN_DEVICE)
         ->fetchAll();
   }


   /**
    * Get all devices with sorting
    * @param $column
    * @param $order
    * @return array|Nette\Database\IRow[]|Nette\Database\Table\IRow[]|Nette\Database\Table\Selection
    */
   public function getAllDeviceWithSort($column, $order)
   {
      $queryOrder = $column .' '. Strings::upper($order);

      return $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->order(($queryOrder == FALSE) ? self::COLUMN_DEVICE : $queryOrder)
         ->fetchAll();
   }



   /**
    * Get device by ID
    * @param $id
    * @return array|Nette\Database\Table\IRow[]|Nette\Database\Table\Selection
    */
   public function getDeviceById($id)
   {
      return $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->where(self::COLUMN_ID, $id)
         ->fetch();
   }


   /**
    * Get device by type ID
    * @param $id
    * @return array|Nette\Database\Table\IRow[]|Nette\Database\Table\Selection
    */
   public function getDeviceByTypeId($id)
   {
      return $this->db->table(self::TABLE_NAME)
         ->select('*')
         ->where(self::COLUMN_TYPE, $id)
         ->fetchAll();
   }


   /**
    * Check if device with ID exist
    * @param $id
    * @return bool
    */
   public function existDeviceById($id)
   {
      $query = $this->getDeviceById($id);

      return $query == FALSE ? FALSE : TRUE;
   }


   /**
    * Add new device
    * @param $type
    * @param $device
    * @param $platform
    * @param $screenCM
    * @param $screenWidthCM
    * @param $screenHeightCM
    * @param $screenIN
    * @param $screenWidthIN
    * @param $screenHeightIN
    * @param $widthPX
    * @param $heightPX
    * @param $widthDP
    * @param $heightDP
    * @param $aspectRatio
    * @param $density
    */
   public function addDevice($type, $device, $platform,
                             $screenCM, $screenWidthCM, $screenHeightCM,
                             $screenIN, $screenWidthIN, $screenHeightIN,
                             $widthPX, $heightPX,
                             $widthDP, $heightDP,
                             $aspectRatio, $density)
   {

      $this->db->table(self::TABLE_NAME)
         ->insert([
            self::COLUMN_TYPE => $type,
            self::COLUMN_DEVICE => $device,
            self::COLUMN_PLATFORM => $platform,
            self::COLUMN_SCREEN_CM => $screenCM,
            self::COLUMN_SCREEN_WIDTH_CM => $screenWidthCM,
            self::COLUMN_SCREEN_HEIGHT_CM => $screenHeightCM,
            self::COLUMN_SCREEN_IN => $screenIN,
            self::COLUMN_SCREEN_WIDTH_IN => $screenWidthIN,
            self::COLUMN_SCREEN_HEIGHT_IN => $screenHeightIN,
            self::COLUMN_WIDTH_PX => $widthPX,
            self::COLUMN_HEIGHT_PX => $heightPX,
            self::COLUMN_WIDTH_DP => $widthDP,
            self::COLUMN_HEIGHT_DP => $heightDP,
            self::COLUMN_ASPECT_RATIO => $aspectRatio,
            self::COLUMN_DENSITY => $density
         ]);
   }


   /**
    * Edit device
    * @param $id
    * @param $type
    * @param $device
    * @param $platform
    * @param $screenCM
    * @param $screenWidthCM
    * @param $screenHeightCM
    * @param $screenIN
    * @param $screenWidthIN
    * @param $screenHeightIN
    * @param $widthPX
    * @param $heightPX
    * @param $widthDP
    * @param $heightDP
    * @param $aspectRatio
    * @param $density
    */
   public function editDevice($id, $type, $device, $platform,
                              $screenCM, $screenWidthCM, $screenHeightCM,
                              $screenIN, $screenWidthIN, $screenHeightIN,
                              $widthPX, $heightPX,
                              $widthDP, $heightDP,
                              $aspectRatio, $density)
   {
      $this->db->table(self::TABLE_NAME)
         ->where(self::COLUMN_ID, $id)
         ->update([
            self::COLUMN_TYPE => $type,
            self::COLUMN_DEVICE => $device,
            self::COLUMN_PLATFORM => $platform,
            self::COLUMN_SCREEN_CM => $screenCM,
            self::COLUMN_SCREEN_WIDTH_CM => $screenWidthCM,
            self::COLUMN_SCREEN_HEIGHT_CM => $screenHeightCM,
            self::COLUMN_SCREEN_IN => $screenIN,
            self::COLUMN_SCREEN_WIDTH_IN => $screenWidthIN,
            self::COLUMN_SCREEN_HEIGHT_IN => $screenHeightIN,
            self::COLUMN_WIDTH_PX => $widthPX,
            self::COLUMN_HEIGHT_PX => $heightPX,
            self::COLUMN_WIDTH_DP => $widthDP,
            self::COLUMN_HEIGHT_DP => $heightDP,
            self::COLUMN_ASPECT_RATIO => $aspectRatio,
            self::COLUMN_DENSITY => $density
         ]);
   }


   /**
    * Delete device
    * @param $id
    */
   public function deleteDevice($id)
   {
      $this->db->table(self::TABLE_NAME)->where(self::COLUMN_ID, $id)->delete();
   }
}