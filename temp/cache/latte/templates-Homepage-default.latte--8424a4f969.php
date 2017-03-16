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
		if (isset($this->params['shoot'])) trigger_error('Variable $shoot overwritten in foreach on line 37');
		if (isset($this->params['result'])) trigger_error('Variable $result overwritten in foreach on line 129');
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
                  <h5>
                     <span id="typed-element"></span>
                  </h5>
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
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 41 */;
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 41 */ ?>" class="shoot-thumbnail" data-toggle="lightbox"
                           data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 42 */ ?>">
                           <img class="img-thumbnail img-responsive" src="<?php
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 43 */;
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 43 */ ?>"
                                alt="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 44 */ ?>">
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
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 offset-lg-1">
               <div class="tech-item">
                  <a href="https://nette.org/cs/" target="_blank" title="Nette Framework">
                     <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 61 */ ?>/images/logo-nette.png" alt="Nette" class="img-fluid">
                  </a>
               </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
               <div class="tech-item">
                  <a href="http://php.net/" target="_blank" title="PHP 7">
                     <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 68 */ ?>/images/logo-php7.png" alt="PHP7" class="img-fluid">
                  </a>
               </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
               <div class="tech-item">
                  <a href="https://www.mysql.com/" target="_blank" title="MySQL">
                     <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 75 */ ?>/images/logo-mysql.png" alt="MySQL" class="img-fluid">
                  </a>
               </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
               <div class="tech-item">
                  <a href="http://phantomjs.org/" target="_blank" title="Phantom JS">
                     <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 82 */ ?>/images/logo-phantomjs.png" alt="PhantomJS" class="img-fluid">
                  </a>
               </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
               <div class="tech-item">
                  <a href="https://slimerjs.org/" target="_blank" title="Slimer JS">
                     <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 89 */ ?>/images/logo-slimerjs.png" alt="SlimerJS" class="img-fluid">
                  </a>
               </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 offset-lg-2">
               <div class="tech-item">
                  <a href="http://www.html5.cz/" target="_blank" title="HTML5">
                     <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 96 */ ?>/images/logo-html5.png" alt="HTML5" class="img-fluid">
                  </a>
               </div>
            </div>
            <div class="col-xs-6 col-sm-4 offset-sm-2 col-md-3 offset-md-0 col-lg-2">
               <div class="tech-item">
                  <a href="https://v4-alpha.getbootstrap.com/" target="_blank" title="Bootstrap 4">
                     <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 103 */ ?>/images/logo-bootstrap.png" alt="Bootstrap 4" class="img-fluid">
                  </a>
               </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
               <div class="tech-item">
                  <a href="http://sass-lang.com/" target="_blank" title="SASS">
                     <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 110 */ ?>/images/logo-sass.png" alt="SASS" class="img-fluid">
                  </a>
               </div>
            </div>
         </div>

      </div>
   </section>


   <section class="shoot-box">
      <div class="container">
         <div class="row">
            <div class="col-xs-12">
               <h2>Latest plan results</h2>
            </div>
         </div>

         <div class="row">
<?php
		$iterations = 0;
		foreach ($results as $result) {
?>
               <div class="col-xs-12 col-md-6 col-lg-3">
                  <div class="shoot-item">
                     <div class="image">
                        <a href="<?php
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 133 */;
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($result->path_img)) /* line 133 */ ?>" class="shoot-thumbnail" data-toggle="lightbox"
                           data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($result->source->url_autority) /* line 134 */ ?>">
                           <img class="img-thumbnail img-responsive" src="<?php
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 135 */;
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($result->path_img)) /* line 135 */ ?>"
                                alt="<?php echo LR\Filters::escapeHtmlAttr($result->source->url_autority) /* line 136 */ ?>">
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
<?php
	}

}
