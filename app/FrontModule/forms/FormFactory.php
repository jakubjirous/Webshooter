<?php

namespace App\FrontModule\Forms;

use Nette;
use Nette\Application\UI\Form;


class FormFactory
{
	use Nette\SmartObject;

	/**
	 * @return Form
	 */
	public function create()
	{
		return new Form;
	}


   /**
    * Bootstrap 4 form renderer
    * @param $form
    * @param string $buttonType
    * @param null $buttonLabel
    */
   public function bootstrapRenderer($form, $buttonType = 'primary', $buttonLabel = NULL)
   {
      $renderer = $form->getRenderer();
      $renderer->wrappers['controls']['container'] = NULL;
      $renderer->wrappers['pair']['container'] = 'div class="form-group row"';
      $renderer->wrappers['pair']['.error'] = 'has-error';
      $renderer->wrappers['label']['container'] = 'div class="col-xs-12 col-sm-4 col-md-4 text-sm-right control-label"';
      $renderer->wrappers['control']['container'] = 'div class="col-xs-12 col-sm-8 col-md-5 col-lg-4"';
      $renderer->wrappers['control']['description'] = 'div class="help-block"';
      $renderer->wrappers['control']['errorcontainer'] = 'span class="help-block"';

      $renderer->wrappers['error'] = [
         'container' => 'div class="alert alert-danger"',
         'item' => 'strong',
      ];

      // make form and controls compatible with Twitter Bootstrap
      $form->getElementPrototype()->class('');

      foreach ($form->getControls() as $control) {

         if ($control instanceof Nette\Forms\Controls\Button) {
            $control->getControlPrototype()->addClass('btn btn-' . $buttonType);
            $usedPrimary = TRUE;

         } elseif ($control instanceof Nette\Forms\Controls\TextBase || $control instanceof Nette\Forms\Controls\SelectBox || $control instanceof Nette\Forms\Controls\MultiSelectBox || $control instanceof Controls\MultiSelectBox) {
            $control->getControlPrototype()->addClass('form-control');

         } elseif ($control instanceof Nette\Forms\Controls\UploadControl) {
            $control->getControlPrototype()->setTitle(
               ($buttonLabel == NULL) ? 'Vybrat soubor ...' : $buttonLabel
            );
         }
      }
   }
}