<?php
// source: C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\app\FrontModule\presenters\templates\@index.latte

use Latte\Runtime as LR;

class Template2ee99ebe3d extends Latte\Runtime\Template
{
	public $blocks = [
		'header' => 'blockHeader',
		'breadcrumb' => 'blockBreadcrumb',
		'contentLayout' => 'blockContentLayout',
	];

	public $blockTypes = [
		'header' => 'html',
		'breadcrumb' => 'html',
		'contentLayout' => 'html',
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
		$this->renderBlock('contentLayout', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		$this->parentName = '@layout.latte';
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockHeader($_args)
	{
		
	}


	function blockBreadcrumb($_args)
	{
		extract($_args);
?>
   <div class="container">
      <ol class="breadcrumb bg-faded">
         <li class="breadcrumb-item"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default")) ?>"><i class="fa fa-image"></i></a></li>
<?php
		$this->renderBlock('breadcrumbContent', $this->params, 'html');
?>
      </ol>
   </div>
<?php
	}


	function blockContentLayout($_args)
	{
		extract($_args);
?>
   <main>
<?php
		$this->renderBlock('content', $this->params, 'html');
?>
   </main>
<?php
	}

}
