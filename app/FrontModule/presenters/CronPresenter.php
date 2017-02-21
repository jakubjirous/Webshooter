<?php

namespace App\FrontModule\Presenters;

use Nette;
use stekycz;


class CronPresenter extends BasePresenter
{

   /**
    * @var \stekycz\Cronner\Cronner
    * @inject
    */
   public $cronner;

   public function actionCron() {
      $this->cronner->run();
   }

}