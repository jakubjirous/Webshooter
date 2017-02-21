<?php
// source: C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\app\FrontModule\presenters/templates/Homepage/default.latte

use Latte\Runtime as LR;

class Template8424a4f969 extends Latte\Runtime\Template
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
		if (isset($this->params['shoot'])) trigger_error('Variable $shoot overwritten in foreach on line 36');
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
                  <i class="fa fa-image"></i>
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
		extract($_args);
?>
   <section class="shoot-box">
      <div class="container">
         <div class="row">
            <div class="col-xs-12">
               <h2>Latest web shoots</h2>
            </div>
         </div>

         <div class="row">
<?php
		$iterations = 0;
		foreach ($shoots as $shoot) {
?>
               <div class="col-xs-12 col-md-6 col-lg-3">
                  <div class="shoot-item">
                     <div class="image">
                        <a href="<?php
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 40 */;
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 40 */ ?>" class="shoot-thumbnail" data-toggle="lightbox"
                           data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 41 */ ?>">
                           <img class="img-thumbnail img-responsive" src="<?php
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 42 */;
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 42 */ ?>"
                                alt="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 43 */ ?>">
                        </a>
                     </div>
                  </div>
               </div>
<?php
			$iterations++;
		}
?>
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
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
               <div class="tech-item">
                  <h5>Nette Framework</h5>
               </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
               <div class="tech-item">
                  <h5>PHP7</h5>
               </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
               <div class="tech-item">
                  <h5>MySQL DB</h5>
               </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
               <div class="tech-item">
                  <h5>Phantom JS</h5>
               </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
               <div class="tech-item">
                  <h5>Slimer JS</h5>
               </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
               <div class="tech-item">
                  <h5>HTML5</h5>
               </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
               <div class="tech-item">
                  <h5>CSS3</h5>
               </div>
            </div>
         </div>

      </div>
   </section>
<?php
	}

}
