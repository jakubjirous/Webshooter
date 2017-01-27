<?php

namespace App\FrontModule\Presenters;

use Nette;
use App\FrontModule\Model;


class HomepagePresenter extends BasePresenter
{

   private $stm;


   public function __construct(Model\ShootManager $stm)
   {
      $this->stm = $stm;
   }

   public function renderDefault()
   {
      $this->template->shoots = $this->stm->getShootBox(4);
   }
}
