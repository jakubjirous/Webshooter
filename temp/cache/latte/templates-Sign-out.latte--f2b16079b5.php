<?php
// source: C:\Users\WPJ3Station\Disk Google\James\LOCALHOST\DP\WSM\app\FrontModule\presenters/templates/Sign/out.latte

use Latte\Runtime as LR;

class Templatef2b16079b5 extends Latte\Runtime\Template
{
	public $blocks = [
		'menu' => 'blockMenu',
		'header' => 'blockHeader',
		'footer' => 'blockFooter',
		'content' => 'blockContent',
		'title' => 'blockTitle',
	];

	public $blockTypes = [
		'menu' => 'html',
		'header' => 'html',
		'footer' => 'html',
		'content' => 'html',
		'title' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('menu', get_defined_vars());
?>


<?php
		$this->renderBlock('header', get_defined_vars());
?>

<?php
		$this->renderBlock('footer', get_defined_vars());
?>

<?php
		$this->renderBlock('content', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockMenu($_args)
	{
		extract($_args);
		/* line 4 */ $_tmp = $this->global->uiControl->getComponent("frontMenu");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
		
	}


	function blockHeader($_args)
	{
		
	}


	function blockFooter($_args)
	{
		extract($_args);
		/* line 12 */ $_tmp = $this->global->uiControl->getComponent("footer");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
   <div class="container">
<?php
		$this->renderBlock('title', get_defined_vars());
?>

      <p><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:in")) ?>">Sign in to another account</a></p>
   </div>
<?php
	}


	function blockTitle($_args)
	{
		extract($_args);
?>      <h1>You have been signed out</h1>
<?php
	}

}
