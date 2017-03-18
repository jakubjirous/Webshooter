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
		if (isset($this->params['shoot'])) trigger_error('Variable $shoot overwritten in foreach on line 38');
		if (isset($this->params['result'])) trigger_error('Variable $result overwritten in foreach on line 131');
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
		if ($shoots) {
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
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 42 */;
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 42 */ ?>" class="shoot-thumbnail" data-toggle="lightbox"
                              data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 43 */ ?>">
                              <img class="img-thumbnail img-responsive" src="<?php
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 44 */;
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 44 */ ?>"
                                   alt="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 45 */ ?>">
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
?>

   <section class="tech-box">
      <div class="container">
         <div class="row">
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 offset-lg-1">
               <div class="tech-item">
                  <a href="https://nette.org/cs/" target="_blank" title="Nette Framework">
                     <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 63 */ ?>/images/logo-nette.png" alt="Nette" class="img-fluid">
                  </a>
               </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
               <div class="tech-item">
                  <a href="http://php.net/" target="_blank" title="PHP 7">
                     <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 70 */ ?>/images/logo-php7.png" alt="PHP7" class="img-fluid">
                  </a>
               </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
               <div class="tech-item">
                  <a href="https://www.mysql.com/" target="_blank" title="MySQL">
                     <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 77 */ ?>/images/logo-mysql.png" alt="MySQL" class="img-fluid">
                  </a>
               </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
               <div class="tech-item">
                  <a href="http://phantomjs.org/" target="_blank" title="Phantom JS">
                     <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 84 */ ?>/images/logo-phantomjs.png" alt="PhantomJS" class="img-fluid">
                  </a>
               </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
               <div class="tech-item">
                  <a href="https://slimerjs.org/" target="_blank" title="Slimer JS">
                     <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 91 */ ?>/images/logo-slimerjs.png" alt="SlimerJS" class="img-fluid">
                  </a>
               </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-3 offset-lg-2">
               <div class="tech-item">
                  <a href="http://www.html5.cz/" target="_blank" title="HTML5">
                     <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 98 */ ?>/images/logo-html5.png" alt="HTML5" class="img-fluid">
                  </a>
               </div>
            </div>
            <div class="col-xs-6 col-sm-4 offset-sm-2 col-md-3 offset-md-0 col-lg-2">
               <div class="tech-item">
                  <a href="https://v4-alpha.getbootstrap.com/" target="_blank" title="Bootstrap 4">
                     <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 105 */ ?>/images/logo-bootstrap.png" alt="Bootstrap 4" class="img-fluid">
                  </a>
               </div>
            </div>
            <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2">
               <div class="tech-item">
                  <a href="http://sass-lang.com/" target="_blank" title="SASS">
                     <img src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 112 */ ?>/images/logo-sass.png" alt="SASS" class="img-fluid">
                  </a>
               </div>
            </div>
         </div>

      </div>
   </section>

<?php
		if ($results) {
?>
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
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 135 */;
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($result->path_img)) /* line 135 */ ?>" class="shoot-thumbnail" data-toggle="lightbox"
                              data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($result->source->url_autority) /* line 136 */ ?>">
                              <img class="img-thumbnail img-responsive" src="<?php
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 137 */;
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($result->path_img)) /* line 137 */ ?>"
                                   alt="<?php echo LR\Filters::escapeHtmlAttr($result->source->url_autority) /* line 138 */ ?>">
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

}
