<?php
// source: C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\app\FrontModule\presenters/templates/Sign/in.latte

use Latte\Runtime as LR;

class Template031aebc938 extends Latte\Runtime\Template
{
	public $blocks = [
		'header' => 'blockHeader',
		'title' => 'blockTitle',
		'breadcrumb' => 'blockBreadcrumb',
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'header' => 'html',
		'title' => 'html',
		'breadcrumb' => 'html',
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
		$this->renderBlock('breadcrumb', get_defined_vars());
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
   <header class="index">
<?php
		$this->renderBlock('title', get_defined_vars());
?>
   </header>
<?php
	}


	function blockTitle($_args)
	{
		extract($_args);
?>      <h1>Sign in</h1>
<?php
	}


	function blockBreadcrumb($_args)
	{
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
   <div class="container">
      <div class="row">
         <div class="col-xs-12">
<?php
		$form = $_form = $this->global->formsStack[] = $this->global->uiControl["signInForm"];
		?>            <form<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		), FALSE) ?>>
               <div class="form-group row required">
                  <div class="col-xs-12 col-sm-4 col-md-4 text-sm-right control-label">
                     <label class="required"<?php
		$_input = end($this->global->formsStack)["username"];
		echo $_input->getLabelPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                        Username:
                     </label>
                  </div>
                  <div class="col-xs-12 col-sm-8 col-md-5 col-lg-4">
                     <input type="text" class="form-control text" required=""<?php
		$_input = end($this->global->formsStack)["username"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'class' => NULL,
		'required' => NULL,
		))->attributes() ?>>
                  </div>
               </div>

               <div class="form-group row required">
                  <div class="col-xs-12 col-sm-4 col-md-4 text-sm-right control-label">
                     <label class="required"<?php
		$_input = end($this->global->formsStack)["password"];
		echo $_input->getLabelPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>Password:</label>
                  </div>

                  <div class="col-xs-12 col-sm-8 col-md-5 col-lg-4">
                     <input type="password" class="form-control text"<?php
		$_input = end($this->global->formsStack)["password"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'class' => NULL,
		))->attributes() ?>>
                  </div>
               </div>

               <div class="form-group row">
                  <div class="col-xs-12 col-sm-4 col-md-4 text-sm-right control-label"></div>

                  <div class="col-xs-12 col-sm-8 col-md-5 col-lg-4">
                     <label class="custom-checkbox"<?php
		$_input = end($this->global->formsStack)["remember"];
		echo $_input->getLabelPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                        <input type="checkbox" class="checkbox-input"<?php
		$_input = end($this->global->formsStack)["remember"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'class' => NULL,
		))->attributes() ?>>
                        <span class="checkbox-label">Keep me signed in</span>
                     </label>
                  </div>
               </div>

               <div class="form-group row">
                  <div class="col-xs-12 col-sm-4 col-md-4 text-sm-right control-label"></div>

                  <div class="col-xs-12 col-sm-8 col-md-5 col-lg-4"><input type="submit" name="send"
                                                                           class="btn btn-primary button"
                                                                           value="Sign in"></div>
               </div>


               <input type="hidden" name="_do" value="signInForm-submit">
<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), FALSE);
?>            </form>

            <p class="text-xs-center"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("up")) ?>">Don't have an account yet? Sign up.</a></p>
         </div>
      </div>
   </div>
<?php
	}

}
