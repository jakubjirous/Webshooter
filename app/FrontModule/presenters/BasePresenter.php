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
   const DIR_RESULTS = 'results';
   const DIR_TARGETS = 'targets';
   const DIR_PLANS = 'plans';


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
   ];

   const IMAGE_PNG = 'png';
   const IMAGE_JPG = 'jpg';

   // Device types by ID
   const TYPE_MOBILE = 1;
   const TYPE_TABLET = 2;
   const TYPE_LAPTOP = 3;
   const TYPE_DESKTOP = 4;
   const TYPE_OTHER = 5;
   const TYPE_CROP = 6;


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


   // Shoots render types
   const RENDER_TO_SHOOTS = 'shoots';
   const RENDER_TO_PLANS_TARGETS = 'plans_targets';


   // Webshooter email
   const EMAIL_WEBSHOOTER = 'jakub.jirous@tul.cz';
   const EMAIL_WEBSHOOTER_FULL = 'WEBSHOOTER <jakub.jirous@tul.cz>';


   // Pagination
   const PAGINATION_SHOOTS = 27;
   const PAGINATION_PLANS = 18;


   /**
    * Front menu component
    * @return \FrontMenu
    */
   public function createComponentFrontMenu()
   {
      $frontMenu = new \FrontMenu(
         $this->getUser()->getIdentity(),
         $this->getUser()->isLoggedIn(),
         self::ROLE_USER,
         self::ROLE_SUPER_USER,
         self::ROLE_ADMIN
      );
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
