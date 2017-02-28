<?php
// source: C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\app\FrontModule\presenters/templates/Plan/create.latte

use Latte\Runtime as LR;

class Template6d388e5232 extends Latte\Runtime\Template
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
?>      <h1>Plan comparision</h1>
<?php
	}


	function blockBreadcrumb($_args)
	{
		extract($_args);
		if ($isLoggedIn) {
?>
      <div class="container">
         <ol class="breadcrumb bg-faded">
            <li class="breadcrumb-item"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Homepage:default")) ?>"><i class="fa fa-image"></i></a></li>
            <li class="breadcrumb-item"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Shoot:settings")) ?>">Shoots settings</a></li>
            <li class="breadcrumb-item"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Compare:list", [$source->id_shoot])) ?>">Select comparision</a></li>
            <li class="breadcrumb-item"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Compare:result", [$source->id_shoot, $target->id_shoot])) ?>">Comparision
                  result</a></li>
            <li class="breadcrumb-item active">Plan comparision</li>
         </ol>
      </div>
<?php
		}
		
	}


	function blockContent($_args)
	{
		extract($_args);
?>
   <div class="container">

<?php
		/* line 29 */ $_tmp = $this->global->uiControl->getComponent("planAddForm");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
?>

   </div>
<?php
	}

}
