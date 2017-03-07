<?php

namespace App\CliModule\Presenters;

use Nette;
use App\FrontModule\Model;


/**
 * Base presenter for all application presenters.
 */
abstract class BasePresenter extends Nette\Application\UI\Presenter
{

   public function startup() {
      parent::startup();
      if (!$this->context->parameters['consoleMode']) {
         throw new Nette\Security\AuthenticationException;
      }
   }

}
