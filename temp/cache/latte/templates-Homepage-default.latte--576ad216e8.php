<?php
// source: C:\Users\WPJ3Station\Disk Google\James\LOCALHOST\DP\WSM\app\FrontModule\presenters/templates/Homepage/default.latte

use Latte\Runtime as LR;

class Template576ad216e8 extends Latte\Runtime\Template
{
	public $blocks = [
		'menu' => 'blockMenu',
		'header' => 'blockHeader',
		'footer' => 'blockFooter',
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'menu' => 'html',
		'header' => 'html',
		'footer' => 'html',
		'content' => 'html',
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
		extract($_args);
?>
   <header class="homepage">
      <div class="container">
         <div class="row">
            <div class="col-xs-12 text-xs-center">
               <div class="inner">
                  <h1>What is Webshooter?</h1>
                  <h5>Web page application to creating website screenshots</h5>
                  <h6>You can use a lot of prepared settings</h6>
                  <a class="btn btn-primary btn-outline-primary btn-lg" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Sign:in")) ?>">Get started</a>
               </div>
            </div>
         </div>
      </div>
   </header>
<?php
	}


	function blockFooter($_args)
	{
		extract($_args);
		/* line 25 */ $_tmp = $this->global->uiControl->getComponent("footer");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
		
	}


	function blockContent($_args)
	{
?>   <section class="screen-box">
      <div class="container">
         <div class="row">
            <div class="col-xs-12">
               <h2>Screens</h2>
            </div>
         </div>

         <div class="row">
            <div class="col-xs-12">
               <div class="screen-item">

               </div>
            </div>
         </div>

         <div class="row">
            <div class="col-xs-12">
               <div class="screen-item">

               </div>
            </div>
         </div>

         <div class="row">
            <div class="col-xs-12">
               <div class="screen-item">

               </div>
            </div>
         </div>

      </div>
   </section>


   <section class="tech-box">
      <div class="container">
         <div class="row">
            <div class="col-xs-12">
               <h2>Technology</h2>
            </div>
         </div>

         <div class="row">
            <div class="col-xs-12">
               <div class="tech-item">

               </div>
            </div>
         </div>

         <div class="row">
            <div class="col-xs-12">
               <div class="tech-item">

               </div>
            </div>
         </div>

         <div class="row">
            <div class="col-xs-12">
               <div class="tech-item">

               </div>
            </div>
         </div>

      </div>
   </section>


<?php
	}

}
