<?php

use
   Nette\Utils\Strings;

class Footer extends Nette\Application\UI\Control
{
   function render()
   {
      $this->template->setFile(__DIR__ . '/footer.latte');
      $this->template->render();
   }
}
