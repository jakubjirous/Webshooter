<?php

use Nette\Utils\DateTime;

class Footer extends Nette\Application\UI\Control
{
   function render()
   {
      $this->template->setFile(__DIR__ . '/footer.latte');
      $this->template->now = new DateTime();
      $this->template->render();
   }
}
