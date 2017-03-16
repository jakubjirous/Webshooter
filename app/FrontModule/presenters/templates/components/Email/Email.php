<?php

use Latte\Engine;
use Nette\Mail\Message;
use Nette\Mail\SendmailMailer;
use Nette\Mail\SmtpMailer;
use Nette\Utils\DateTime;


class Email extends Nette\Application\UI\Control
{
   private $from;
   private $subject;
   private $source;
   private $plan;
   private $planTarget;
   private $planResult;
   private $webURI;

   private $daily;
   private $weekly;
   private $monthly;
   private $yearly;
   private $never;
   private $occurrence;
   private $date;


   private $_engine;
   private $_message;
   private $_mailer;
   private $_mailerSMTP;


   public function __construct($from, $source, $plan, $planTarget, $planResult, $webURI, $dayily, $weekly, $monthly, $yearly, $never, $occurrence, $date)
   {
      $this->from = $from;
      $this->source = $source;
      $this->plan = $plan;
      $this->planTarget = $planTarget;
      $this->planResult = $planResult;
      $this->webURI = $webURI;

      $this->daily = $dayily;
      $this->weekly = $weekly;
      $this->monthly = $monthly;
      $this->yearly = $yearly;

      $this->never = $never;
      $this->occurrence = $occurrence;
      $this->date = $date;
   }


   public function send()
   {
      $this->_engine = new Engine();
      $this->_message = new Message();
      $this->_mailerSMTP = new SmtpMailer([
         'host' => 'smtp.endora.cz',
         'port' => '587',
         'username' => 'info@jakubjirous.cz',
         'password' => 'James.DJ9',
      ]);

      $this->subject = 'Comparison result from '. $this->planResult->date->format('d.m.Y H:i');

      $params = [
         'subject' => $this->subject,
         'source' => $this->source,
         'plan' => $this->plan,
         'target' => $this->planTarget,
         'result' => $this->planResult,
         'year' => new DateTime(),
         'webURI' => $this->webURI,
         'daily' => $this->daily,
         'weekly' => $this->weekly,
         'monthly' => $this->monthly,
         'yearly' => $this->yearly,
         'never' => $this->never,
         'occurrence' => $this->occurrence,
         'date' => $this->date
      ];


      if($this->plan->secondary_email != '') {
         $this->_message
            ->setFrom($this->from)
            ->addTo($this->plan->primary_email)
            ->addTo($this->plan->secondary_email)
            ->setSubject($this->subject)
            ->setHtmlBody($this->_engine->renderToString(__DIR__ . '/emailMessage.latte',  $params));

      } else {
         $this->_message
            ->setFrom($this->from)
            ->addTo($this->plan->primary_email)
            ->setSubject($this->subject)
            ->setHtmlBody($this->_engine->renderToString(__DIR__ . '/emailMessage.latte',  $params));

      }

//      $this->_message->addAttachment($this->webURI . $this->source->path_img, 'Plan source');
//      $this->_message->addAttachment($this->webURI . $this->planTarget->path_img, 'Plan target');
//      $this->_message->addAttachment($this->webURI . $this->planResult->path_img, 'Plan result');

      $this->_mailerSMTP->send($this->_message);
   }
}
