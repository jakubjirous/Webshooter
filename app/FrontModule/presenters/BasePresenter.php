<?php

namespace App\FrontModule\Presenters;

use Nette;
use App\FrontModule\Model;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{

   // User roles ID
   const
      ROLE_USER = 1,
      ROLE_SUPER_USER = 2,
      ROLE_ADMIN = 3;


   // Redirects
   const LOGIN_REDIRECT = 'Sign:in';


   // Error messages
   const ERROR_404_MESSAGE = 'Error 404: Page not found';


   // Flash messages
   const FLASH_MESSAGE_SUCCESS = 'success';
   const FLASH_MESSAGE_ERROR = 'warning';


   // DIR names in www DIR
   const DIR_WS = 'WS';
   const DIR_BIN = 'bin';
   const DIR_JS = 'js';
   const DIR_SHOOTS = 'shoots';


   // Engines
   const WEBKIT = 'webkit';
   const GECKO = 'gecko';


   // Engine types
   const ENGINE_TYPES = [
      'webkit' => 'Webkit',
      'gecko' => 'Gecko'
   ];

   // Image types
   const IMAGE_TYPES = [
      'png' => 'PNG – image/png',
      'jpg' => 'JPEG – image/jpeg',
//      'gif' => 'GIF – image/gif',
//      'bmp' => 'BMP – image/bmp'
   ];

   const IMAGE_PNG = 'png';
   const IMAGE_JPG = 'jpg';
   const IMAGE_BMP = 'bmp';

   // Device types by ID
   const TYPE_MOBILE = 1;
   const TYPE_TABLET = 2;
   const TYPE_LAPTOP = 3;
   const TYPE_DESKTOP = 4;
   const TYPE_OTHER = 5;
   const TYPE_CROP = 6;


   // Pagination
   const SHOOTS_PER_PAGE = 9;

   // Shoots view switching
   const VIEW_LG = "lg";
   const VIEW_MD = "md";
   const VIEW_SM = "sm";
   const VIEW_XS = "xs";


   // Compare shoots result colors
   const COLOR_1 = "red";
   const COLOR_2 = "green";
   const COLOR_3 = "blue";
   const COLOR_4 = "yellow";

   // Compare shoots result background
   const BACKGROUND_1 = "default";
   const BACKGROUND_2 = "grayscale";
   const BACKGROUND_3 = "white";
   const BACKGROUND_4 = "black";

   // Compare shoots result tolerance
   const DEFAULT_TOLERANCE = 0;

   // Plan comparison
   const REPEATE_START_DAILY = 1;
   const REPEATE_START_WEEKLY = 2;
   const REPEATE_START_MONTHLY = 3;
   const REPEATE_START_YEARLY = 4;

   const REPEATE_END_NEVER = 1;
   const REPEATE_END_OCCURRENCES = 2;
   const REPEATE_END_DATE = 3;


   /**
    * Front menu component
    * @return \FrontMenu
    */
   public function createComponentFrontMenu()
   {
      $frontMenu = new \FrontMenu();
      $frontMenu->setUser($this->getUser());
      $frontMenu->setRoleUser(self::ROLE_USER);
      $frontMenu->setRoleSuperUser(self::ROLE_SUPER_USER);
      $frontMenu->setRoleAdmin(self::ROLE_ADMIN);
      return $frontMenu;
   }


   /**
    * Footer component
    * @return \Footer
    */
   public function createComponentFooter()
   {
      $footer = new \Footer();

      return $footer;
   }
}
