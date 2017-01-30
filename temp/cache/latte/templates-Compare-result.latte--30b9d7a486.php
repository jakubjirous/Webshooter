<?php
// source: C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\app\FrontModule\presenters/templates/Compare/result.latte

use Latte\Runtime as LR;

class Template30b9d7a486 extends Latte\Runtime\Template
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
?>      <h1>Comparision result</h1>
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
            <li class="breadcrumb-item"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Compare:list", [$shoot->id_shoot])) ?>">Select comparision</a></li>
            <li class="breadcrumb-item active">Comparision result</li>
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
      <div class="compare-result">

         <h2 class="text-xs-center">
            <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($similar->url)) /* line 29 */ ?>" target="_blank"><?php
		echo LR\Filters::escapeHtmlText($similar->url_autority) /* line 29 */ ?></a>
         </h2>

         <div class="row">
            <div class="col-xs-12 col-sm-6 col-lg-4">
               <div class="compare-source">
                  <h4>Source shoot</h4>

                  <div class="image">
                     <a href="<?php
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 38 */;
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 38 */ ?>" class="shoot-thumbnail" data-toggle="lightbox"
                        data-parent="" data-gallery="#shoots" data-title="Source shoot">
                        <img class="img-thumbnail img-responsive" src="<?php
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 40 */;
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 40 */ ?>"
                             alt="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 41 */ ?>">
                     </a>
                  </div>

                  <a
                        class="btn btn-primary btn-outline-primary" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("download!", [$shoot->id_shoot])) ?>">
                     <i class="fa fa-download"></i>
                     Download
                  </a>
               </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-4">
               <div class="compare-target">
                  <h4>Target shoot</h4>

                  <div class="image">
                     <a href="<?php
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 57 */;
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($similar->path_img)) /* line 57 */ ?>" class="shoot-thumbnail"
                        data-toggle="lightbox"
                        data-parent="" data-gallery="#shoots" data-title="Target shoot">
                        <img class="img-thumbnail img-responsive"
                             src="<?php
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 61 */;
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($similar->path_img)) /* line 61 */ ?>"
                             alt="<?php echo LR\Filters::escapeHtmlAttr($similar->url_autority) /* line 62 */ ?>">
                     </a>
                  </div>

                  <a
                        class="btn btn-primary btn-outline-primary" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("download!", [$similar->id_shoot])) ?>">
                     <i class="fa fa-download"></i>
                     Download
                  </a>
               </div>
            </div>

            <div class="col-xs-12 col-lg-4">
               <div class="compare-result">
                  <h4>Result</h4>

                  <div id="result" class="image">
                     <a href="" class="shoot-thumbnail" data-toggle="lightbox" data-parent="" data-gallery="#shoots" data-title="Result">
                        <img class="img-thumbnail img-responsive"
                             src=""
                             alt="Loading ...">
                     </a>
                  </div>

               </div>
            </div>
         </div>

<?php
		$image1 = $basePath.$shoot->path_img;
		$image2 = $basePath.$similar->path_img;
?>

         <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 93 */ ?>/js/resemble.js"></script>
         <script>
            var resultThumbnail = resemble(<?php echo LR\Filters::escapeJs($image1) /* line 95 */ ?>)
                  .compareTo(<?php echo LR\Filters::escapeJs($image2) /* line 96 */ ?>)
                  .ignoreColors()
                  .onComplete(function (data) {
                     var diffImage = new Image();
                     diffImage.src = data.getImageDataUrl();

                     $('#result img').attr('src', diffImage.src);
                     $('#result a').attr('href', diffImage.src);
                  });
         </script>

      </div>
   </div>
<?php
	}

}
