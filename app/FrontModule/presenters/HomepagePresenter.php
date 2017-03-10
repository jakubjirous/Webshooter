<?php

namespace App\FrontModule\Presenters;

use Nette;
use App\FrontModule\Model;


class HomepagePresenter extends BasePresenter
{

   /**
    * @var Model\ShootManager
    */
   private $stm;

   /**
    * @var Model\PlanResultManager
    */
   private $prm;


   public function __construct(Model\ShootManager $stm, Model\PlanResultManager $prm)
   {
      $this->stm = $stm;
      $this->prm = $prm;
   }

   public function renderDefault()
   {
      $this->template->shoots = $this->stm->getShootBox(4);

      $this->template->results = $this->prm->getResultBox(4);
   }
}
