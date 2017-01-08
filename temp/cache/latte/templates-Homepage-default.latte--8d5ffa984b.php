<?php
// source: C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\WS\app\FrontModule\presenters/templates/Homepage/default.latte

use Latte\Runtime as LR;

class Template8d5ffa984b extends Latte\Runtime\Template
{
	public $blocks = [
		'header' => 'blockHeader',
		'breadcrumb' => 'blockBreadcrumb',
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'header' => 'html',
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
   <header class="homepage">
      <div class="container">
         <div class="row">
            <div class="col-xs-12 text-xs-center">
               <div class="inner">
                  <h1>What is Webshooter?</h1>
                  <h5>Web page application to creating website screenshots</h5>
                  <h6>You can use a lot of prepared settings</h6>
                  <a class="btn btn-primary btn-outline-primary btn-lg" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Shoot:add")) ?>">Get started</a>
               </div>
            </div>
         </div>
      </div>
   </header>
<?php
	}


	function blockBreadcrumb($_args)
	{
		
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
