<?php

namespace App\CliModule\Presenters;

use Nette;


class CliPresenter extends BasePresenter
{

   public function actionCron()
   {
      echo '------------------------------------------------------------------------------------------------------------';
      echo 'FUNGUJU!';
      $this->terminate();
   }

}
