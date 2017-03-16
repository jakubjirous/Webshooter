<?php
// source: C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\app\FrontModule\presenters/templates/Device/detail.latte

use Latte\Runtime as LR;

class Templated49c770a04 extends Latte\Runtime\Template
{
	public $blocks = [
		'header' => 'blockHeader',
		'title' => 'blockTitle',
		'breadcrumbContent' => 'blockBreadcrumbContent',
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'header' => 'html',
		'title' => 'html',
		'breadcrumbContent' => 'html',
		'content' => 'html',
	];


	function main()
	{
		extract($this->params);
?>



<?php
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('header', get_defined_vars());
?>

<?php
		$this->renderBlock('breadcrumbContent', get_defined_vars());
?>

<?php
		$this->renderBlock('content', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		$this->parentName = '../@index.latte';
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockHeader($_args)
	{
		extract($_args);
?>
   <header>
<?php
		$this->renderBlock('title', get_defined_vars());
?>
   </header>
<?php
	}


	function blockTitle($_args)
	{
		extract($_args);
		?>      <h1><?php echo LR\Filters::escapeHtmlText($device->device) /* line 7 */ ?></h1>
<?php
	}


	function blockBreadcrumbContent($_args)
	{
		extract($_args);
		?>   <li class="breadcrumb-item"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Device:settings")) ?>">Device settings</a></li>
   <li class="breadcrumb-item active"><?php echo LR\Filters::escapeHtmlText($device->device) /* line 13 */ ?></li>
<?php
	}


	function blockContent($_args)
	{
		extract($_args);
?>
   <div class="container">
      <div class="device-detail">
         <div class="row">
            <div class="col-xs-12">

<?php
		$form = $_form = $this->global->formsStack[] = $this->global->uiControl["deviceEditForm"];
		?>               <form<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		), FALSE) ?>>
                  <fieldset>
                     <legend>Basic options</legend>

                     <div class="row form-group required">
                        <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                           <label<?php
		$_input = end($this->global->formsStack)["id_type"];
		echo $_input->getLabelPart()->attributes() ?>>Type:</label>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4">
                           <select class="form-control"<?php
		$_input = end($this->global->formsStack)["id_type"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
<?php echo $_input->getControl()->getHtml() ?>                           </select>
                        </div>
                     </div>

                     <div class="row form-group required">
                        <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                           <label<?php
		$_input = end($this->global->formsStack)["device"];
		echo $_input->getLabelPart()->attributes() ?>>Device:</label>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4">
                           <input class="form-control"<?php
		$_input = end($this->global->formsStack)["device"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                        </div>
                     </div>

                     <div class="row form-group required">
                        <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                           <label<?php
		$_input = end($this->global->formsStack)["platform"];
		echo $_input->getLabelPart()->attributes() ?>>Platform:</label>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4">
                           <input class="form-control"<?php
		$_input = end($this->global->formsStack)["platform"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                        </div>
                     </div>
                  </fieldset>


                  <fieldset>
                     <legend>Screen dimensions in centimetres</legend>

                     <div class="row form-group required">
                        <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                           <label<?php
		$_input = end($this->global->formsStack)["screen_cm"];
		echo $_input->getLabelPart()->attributes() ?>>Screen:</label>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4 input-group">
                           <input class="form-control"<?php
		$_input = end($this->global->formsStack)["screen_cm"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                           <span class="input-group-addon">cm</span>
                        </div>
                     </div>

                     <div class="row form-group required">
                        <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                           <label<?php
		$_input = end($this->global->formsStack)["screen_width_cm"];
		echo $_input->getLabelPart()->attributes() ?>>Screen width:</label>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4 input-group">
                           <input class="form-control"<?php
		$_input = end($this->global->formsStack)["screen_width_cm"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                           <span class="input-group-addon">cm</span>
                        </div>
                     </div>

                     <div class="row form-group required">
                        <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                           <label<?php
		$_input = end($this->global->formsStack)["screen_height_cm"];
		echo $_input->getLabelPart()->attributes() ?>>Screen height:</label>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4 input-group">
                           <input class="form-control"<?php
		$_input = end($this->global->formsStack)["screen_height_cm"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                           <span class="input-group-addon">cm</span>
                        </div>
                     </div>
                  </fieldset>


                  <fieldset>
                     <legend>Screen dimensions in inches</legend>

                     <div class="row form-group required">
                        <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                           <label<?php
		$_input = end($this->global->formsStack)["screen_in"];
		echo $_input->getLabelPart()->attributes() ?>>Screen:</label>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4 input-group">
                           <input class="form-control"<?php
		$_input = end($this->global->formsStack)["screen_in"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                           <span class="input-group-addon">in</span>
                        </div>
                     </div>

                     <div class="row form-group required">
                        <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                           <label<?php
		$_input = end($this->global->formsStack)["screen_width_in"];
		echo $_input->getLabelPart()->attributes() ?>>Screen width:</label>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4 input-group">
                           <input class="form-control"<?php
		$_input = end($this->global->formsStack)["screen_width_in"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                           <span class="input-group-addon">in</span>
                        </div>
                     </div>

                     <div class="row form-group required">
                        <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                           <label<?php
		$_input = end($this->global->formsStack)["screen_height_in"];
		echo $_input->getLabelPart()->attributes() ?>>Screen height:</label>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4 input-group">
                           <input class="form-control"<?php
		$_input = end($this->global->formsStack)["screen_height_in"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                           <span class="input-group-addon">in</span>
                        </div>
                     </div>
                  </fieldset>


                  <fieldset>
                     <legend>Device size in pixels</legend>

                     <div class="row form-group required">
                        <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                           <label<?php
		$_input = end($this->global->formsStack)["width_px"];
		echo $_input->getLabelPart()->attributes() ?>>Width:</label>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4 input-group">
                           <input class="form-control"<?php
		$_input = end($this->global->formsStack)["width_px"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                           <span class="input-group-addon">px</span>
                        </div>
                     </div>

                     <div class="row form-group required">
                        <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                           <label<?php
		$_input = end($this->global->formsStack)["height_px"];
		echo $_input->getLabelPart()->attributes() ?>>Height:</label>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4 input-group">
                           <input class="form-control"<?php
		$_input = end($this->global->formsStack)["height_px"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                           <span class="input-group-addon">px</span>
                        </div>
                     </div>
                  </fieldset>


                  <fieldset>
                     <legend>Device size in density independent pixels</legend>

                     <div class="row form-group required">
                        <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                           <label<?php
		$_input = end($this->global->formsStack)["width_dp"];
		echo $_input->getLabelPart()->attributes() ?>>Width:</label>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4 input-group">
                           <input class="form-control"<?php
		$_input = end($this->global->formsStack)["width_dp"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                           <span class="input-group-addon">dp</span>
                        </div>
                     </div>

                     <div class="row form-group required">
                        <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                           <label<?php
		$_input = end($this->global->formsStack)["height_dp"];
		echo $_input->getLabelPart()->attributes() ?>>Height:</label>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4 input-group">
                           <input class="form-control"<?php
		$_input = end($this->global->formsStack)["height_dp"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                           <span class="input-group-addon">dp</span>
                        </div>
                     </div>
                  </fieldset>


                  <fieldset>
                     <legend>Advanced options</legend>

                     <div class="row form-group required">
                        <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                           <label<?php
		$_input = end($this->global->formsStack)["aspect_ratio"];
		echo $_input->getLabelPart()->attributes() ?>>Aspect ratio:</label>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4 input-group">
                           <input class="form-control"<?php
		$_input = end($this->global->formsStack)["aspect_ratio"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                           <span class="input-group-addon">X:Y</span>
                        </div>
                     </div>

                     <div class="row form-group required">
                        <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                           <label<?php
		$_input = end($this->global->formsStack)["density"];
		echo $_input->getLabelPart()->attributes() ?>>Density:</label>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4">
                           <input class="form-control"<?php
		$_input = end($this->global->formsStack)["density"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                        </div>
                     </div>
                  </fieldset>

                  <div class="row form-group margin-bottom">
                     <div class="col-xs-12 col-md-6 offset-md-6 col-lg-4 offset-lg-4">
                        <button type="submit" class="btn btn-primary"<?php
		$_input = end($this->global->formsStack)["save"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'class' => NULL,
		))->attributes() ?>>
                           Save
                        </button>
                     </div>
                  </div>
<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), FALSE);
?>               </form>

            </div>
         </div>
      </div>
   </div>
<?php
	}

}
