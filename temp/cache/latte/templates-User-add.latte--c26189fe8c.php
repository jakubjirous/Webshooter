<?php
// source: C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\app\FrontModule\presenters/templates/User/add.latte

use Latte\Runtime as LR;

class Templatec26189fe8c extends Latte\Runtime\Template
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
?>      <h1>New user</h1>
<?php
	}


	function blockBreadcrumbContent($_args)
	{
		extract($_args);
		?>   <li class="breadcrumb-item"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("User:list")) ?>">User settings</a></li>
   <li class="breadcrumb-item active">New user</li>
<?php
	}


	function blockContent($_args)
	{
		extract($_args);
?>
   <div class="container">
      <div class="device-add">
         <div class="row">
            <div class="col-xs-12">

<?php
		/* line 22 */ $_tmp = $this->global->uiControl->getComponent("userAddForm");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
?>

            </div>
         </div>
      </div>
   </div>
<?php
	}

}
