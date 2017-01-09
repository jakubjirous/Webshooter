<?php

namespace App\FrontModule\Presenters;

use UserAgentParser\Provider;


/**
 * Class UserAgentParser
 * @package App\FrontModule\Presenters
 */
class UserAgentParser
{

   private $userAgent;
   private $provider;


   public function __construct()
   {
      $this->userAgent = $_SERVER['HTTP_USER_AGENT'];
      $this->provider = new Provider\PiwikDeviceDetector();
   }


   /**
    * Get browser name from userAgent
    * @return mixed
    */
   public function getBrowserName()
   {
      $result = $this->provider->parse($this->userAgent);

      return $result->getBrowser()->getName();
   }


   /**
    * Get browser version from userAgent
    * @return mixed
    */
   public function getBrowserVersion()
   {
      $result = $this->provider->parse($this->userAgent);

      return $result->getBrowser()->getVersion()->getComplete();
   }
}