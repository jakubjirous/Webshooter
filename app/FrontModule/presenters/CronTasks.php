<?php

namespace App\FrontModule\Presenters;


class CronTasks
{

   /**
    * @cronner-task E-mail sending
    * @cronner-period 1 day
    * @cronner-days working days
    * @cronner-time 23:30 - 05:00
    */
   public function sendEmails() {
      // Code which sends all your e-mails
   }

   /**
    * @cronner-task Important data replication
    * @cronner-period 3 hours
    */
   public function replicateImportantData() {
      // Replication code
   }
}