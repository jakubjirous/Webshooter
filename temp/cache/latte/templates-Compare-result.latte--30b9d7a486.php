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
		'_changeResult' => 'blockChangeResult',
	];

	public $blockTypes = [
		'header' => 'html',
		'title' => 'html',
		'breadcrumb' => 'html',
		'content' => 'html',
		'_changeResult' => 'html',
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

<div id="<?php echo htmlSpecialChars($this->global->snippetDriver->getHtmlId('changeResult')) ?>"><?php $this->renderBlock('_changeResult', $this->params) ?></div>
      </div>
   </div>
<?php
	}


	function blockChangeResult($_args)
	{
		extract($_args);
		$this->global->snippetDriver->enter("changeResult", "static");
?>
            <h4>Result settings</h4>
            <div class="row">
               <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="change-color">
                     <p><strong>Change result color:</strong></p>
                     <div class="btn-group" role="group" aria-label="Result change color">
                        <a type="button"
                                                         class="btn btn-secondary <?php
		if ($color == $color1) {
			?>active<?php
		}
		?> color-<?php echo LR\Filters::escapeHtmlAttr($color1) /* line 40 */ ?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("changeColor!", [$color1])) ?>">
                           <i class="fa fa-image"></i>
                        </a>
                        <a type="button"
                                                         class="btn btn-secondary <?php
		if ($color == $color2) {
			?>active<?php
		}
		?> color-<?php echo LR\Filters::escapeHtmlAttr($color2) /* line 44 */ ?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("changeColor!", [$color2])) ?>">
                           <i class="fa fa-image"></i>
                        </a>
                        <a type="button"
                                                         class="btn btn-secondary <?php
		if ($color == $color3) {
			?>active<?php
		}
		?> color-<?php echo LR\Filters::escapeHtmlAttr($color3) /* line 48 */ ?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("changeColor!", [$color3])) ?>">
                           <i class="fa fa-image"></i>
                        </a>
                        <a type="button"
                                                         class="btn btn-secondary <?php
		if ($color == $color4) {
			?>active<?php
		}
		?> color-<?php echo LR\Filters::escapeHtmlAttr($color4) /* line 52 */ ?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("changeColor!", [$color4])) ?>">
                           <i class="fa fa-image"></i>
                        </a>
                     </div>
                  </div>
               </div>

               <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="background-color">
                     <p><strong>Change background color:</strong></p>
                     <div class="btn-group" role="group" aria-label="Result background color">
                        <a type="button" class="btn btn-secondary <?php
		if ($background== $background1) {
			?>active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("changeBackground!", [$background1])) ?>">
                           Default
                        </a>
                        <a type="button" class="btn btn-secondary <?php
		if ($background == $background2) {
			?>active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("changeBackground!", [$background2])) ?>">
                           Grayscale
                        </a>
                        <a type="button" class="btn btn-secondary <?php
		if ($background == $background3) {
			?>active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("changeBackground!", [$background3])) ?>">
                           White
                        </a>
                        <a type="button" class="btn btn-secondary <?php
		if ($background == $background4) {
			?>active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("changeBackground!", [$background4])) ?>">
                           Black
                        </a>
                     </div>
                  </div>
               </div>

               <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="stats">
                     <p><strong>Compare different:</strong></p>
                     <p><?php echo LR\Filters::escapeHtmlText($percents) /* line 82 */ ?> %</p>
                  </div>
               </div>

               <div class="col-xs-12 col-sm-6 col-md-4">
                  <div class="stats">
                     <p>
                        <label for="tolerance"><strong>Tolerance:</strong></label>
                     </p>
                     <input type="range" min="0" max="100" value="50" step="1" id="tolerance">
                     <output for="tolerance">50</output>
                  </div>
               </div>
            </div>

            <div class="row">
               <div class="col-xs-12 col-sm-6 col-lg-4">
                  <div class="compare-source">
                     <h4>Source shoot</h4>

                     <div class="image">
                        <a href="<?php
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 103 */;
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 103 */ ?>" class="shoot-thumbnail" data-toggle="lightbox"
                           data-parent="" data-gallery="#shoots" data-title="Source shoot">
                           <img class="img-thumbnail img-responsive" src="<?php
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 105 */;
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 105 */ ?>"
                                alt="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 106 */ ?>">
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
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 122 */;
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($similar->path_img)) /* line 122 */ ?>" class="shoot-thumbnail"
                           data-toggle="lightbox"
                           data-parent="" data-gallery="#shoots" data-title="Target shoot">
                           <img class="img-thumbnail img-responsive"
                                src="<?php
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 126 */;
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($similar->path_img)) /* line 126 */ ?>"
                                alt="<?php echo LR\Filters::escapeHtmlAttr($similar->url_autority) /* line 127 */ ?>">
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

                     <div class="image">
                        <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 144 */ ?>/diff.png" class="shoot-thumbnail"
                           data-toggle="lightbox"
                           data-parent="" data-gallery="#shoots" data-title="Target shoot">
                           <img class="img-thumbnail img-responsive"
                                src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 148 */ ?>/diff.png"
                                alt="<?php echo LR\Filters::escapeHtmlAttr($similar->url_autority) /* line 149 */ ?>">
                        </a>
                     </div>

                  </div>
               </div>
            </div>

<?php
		$image1 = $basePath.$shoot->path_img;
		$image2 = $basePath.$similar->path_img;
?>

            <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 169 */ ?>/js/resemble.js"></script>
            <script>
               var resultThumbnail = resemble(<?php echo LR\Filters::escapeJs($image1) /* line 171 */ ?>)
                     .compareTo(<?php echo LR\Filters::escapeJs($image2) /* line 172 */ ?>)
                     .ignoreColors()
                     .onComplete(function (data) {
                        var diffImage = new Image();
                        diffImage.src = data.getImageDataUrl();

                        $('#result img').attr('src', diffImage.src);
                        $('#result a').attr('href', diffImage.src);
                     });
            </script>
<?php
		$this->global->snippetDriver->leave();
		
	}

}
