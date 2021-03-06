<?php
// source: C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\app\FrontModule\presenters/templates/User/account.latte

use Latte\Runtime as LR;

class Template05d7e41b7c extends Latte\Runtime\Template
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
		?>      <h1><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->capitalize, $person->username)) /* line 7 */ ?></h1>
<?php
	}


	function blockBreadcrumbContent($_args)
	{
?>   <li class="breadcrumb-item active">My account</li>
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
		/* line 21 */ $_tmp = $this->global->uiControl->getComponent("changeAccountForm");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
?>

<?php
		/* line 23 */ $_tmp = $this->global->uiControl->getComponent("changePasswordForm");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
?>

            </div>
         </div>

         <div class="row margin-top margin-bottom">
            <div class="col-xs-12 text-xs-center">
               <a class="btn btn-danger" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:out")) ?>">
                  <i class="fa fa-sign-out"></i>
                  Sign out
               </a>
            </div>
         </div>

      </div>
   </div>
<?php
	}

}
