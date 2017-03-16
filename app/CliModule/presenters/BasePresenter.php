<?php

namespace App\CliModule\Presenters;

use Nette;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{
   // Engines
   const WEBKIT = 'webkit';
   const GECKO = 'gecko';

   const IMAGE_PNG = 'png';
   const IMAGE_JPG = 'jpg';

   // Device types by ID
   const TYPE_MOBILE = 1;
   const TYPE_TABLET = 2;
   const TYPE_LAPTOP = 3;
   const TYPE_DESKTOP = 4;
   const TYPE_OTHER = 5;
   const TYPE_CROP = 6;

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


   // DIR names in www DIR
   const DIR_WS = 'WS';
   const DIR_BIN = 'bin';
   const DIR_JS = 'js';
   const DIR_SHOOTS = 'shoots';
   const DIR_RESULTS = 'results';
   const DIR_TARGETS = 'targets';
   const DIR_PLANS = 'plans';


   public function startup()
   {
      parent::startup();
      if (!$this->context->parameters['consoleMode']) {
         throw new Nette\Security\AuthenticationException;
      }
   }

}
