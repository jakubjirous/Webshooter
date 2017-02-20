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
            <li class="breadcrumb-item"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Compare:list", [$source->id_shoot])) ?>">Select comparision</a></li>
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
            <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($target->url)) /* line 29 */ ?>" target="_blank"><?php
		echo LR\Filters::escapeHtmlText($target->url_autority) /* line 29 */ ?></a>
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
               <div class="col-xs-12 col-md-6 col-lg-4">
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

               <div class="col-xs-12 col-md-6 col-lg-4">
                  <div class="change-background">
                     <p><strong>Change background color:</strong></p>
                     <div class="btn-group" role="group" aria-label="Result background color">
                        <a type="button"
                                                                   class="btn btn-secondary <?php
		if ($background== $background1) {
			?>active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("changeBackground!", [$background1])) ?>">
                           Default
                        </a>
                        <a type="button"
                                                                   class="btn btn-secondary <?php
		if ($background == $background2) {
			?>active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("changeBackground!", [$background2])) ?>">
                           Grayscale
                        </a>
                        <a type="button"
                                                                   class="btn btn-secondary <?php
		if ($background == $background3) {
			?>active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("changeBackground!", [$background3])) ?>">
                           White
                        </a>
                        <a type="button"
                                                                   class="btn btn-secondary <?php
		if ($background == $background4) {
			?>active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("changeBackground!", [$background4])) ?>">
                           Black
                        </a>
                     </div>
                  </div>
               </div>

               <div class="col-xs-12 col-md-6 push-md-6 col-lg-4 push-lg-0">
                  <div class="change-tolerance">
<?php
		$form = $_form = $this->global->formsStack[] = $this->global->uiControl["resultToleranceForm"];
		?>                     <form<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		), FALSE) ?>>
                        <label<?php
		$_input = end($this->global->formsStack)["tolerance"];
		echo $_input->getLabelPart()->attributes() ?>>
                           <p><strong>Change tolerance:</strong></p>
                           <input type="range" min="0" max="100" step="1" data-tolerance-change<?php
		$_input = end($this->global->formsStack)["tolerance"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'min' => NULL,
		'max' => NULL,
		'step' => NULL,
		'data-tolerance-change' => NULL,
		))->attributes() ?>>
                           <output data-tolerance-value><?php echo LR\Filters::escapeHtmlText($tolerance) /* line 89 */ ?></output>
                        </label>
                        <button type="submit" name="set" class="btn btn-primary btn-outline-primary">Set</button>
<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), FALSE);
?>                     </form>
                  </div>
               </div>

               <div class="col-xs-12 col-md-6 pull-md-6 col-lg-8 pull-lg-0">
                  <div class="change-ignore">
                     <p><strong>Ignore part definition:</strong></p>

<?php
		$form = $_form = $this->global->formsStack[] = $this->global->uiControl["resultIgnoreForm"];
		?>                     <form<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		), FALSE) ?>>
                        <div class="row">
                           <div class="col-xs-12 col-lg-2 custom-switch">
                              <label class="switch">
                                 <input type="checkbox"<?php
		$_input = end($this->global->formsStack)["ignoreActive"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		))->attributes() ?>>
                                 <div class="slider round"></div>
                              </label>
                           </div>
                           <div class="col-xs-12 col-sm-6 col-lg-2 ">
                              <div class="form-group">
                                 <label<?php
		$_input = end($this->global->formsStack)["ignoreTop"];
		echo $_input->getLabelPart()->attributes() ?>>Top (px):</label>
                                 <input type="number" class="form-control"<?php
		$_input = end($this->global->formsStack)["ignoreTop"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'class' => NULL,
		))->attributes() ?>>
                                 <small class="form-text text-muted"></small>
                              </div>

                           </div>
                           <div class="col-xs-12 col-sm-6 col-lg-2">
                              <div class="form-group">
                                 <label<?php
		$_input = end($this->global->formsStack)["ignoreLeft"];
		echo $_input->getLabelPart()->attributes() ?>>Left (px):</label>
                                 <input type="number" class="form-control"<?php
		$_input = end($this->global->formsStack)["ignoreLeft"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'class' => NULL,
		))->attributes() ?>>
                                 <small class="form-text text-muted"></small>
                              </div>
                           </div>
                           <div class="col-xs-12 col-sm-6 col-lg-2">
                              <div class="form-group">
                                 <label<?php
		$_input = end($this->global->formsStack)["ignoreWidth"];
		echo $_input->getLabelPart()->attributes() ?>>Width (px):</label>
                                 <input type="number" class="form-control"<?php
		$_input = end($this->global->formsStack)["ignoreWidth"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'class' => NULL,
		))->attributes() ?>>
                                 <small class="form-text text-muted"></small>
                              </div>
                           </div>
                           <div class="col-xs-12 col-sm-6 col-lg-2">
                              <div class="form-group">
                                 <label<?php
		$_input = end($this->global->formsStack)["ignoreHeight"];
		echo $_input->getLabelPart()->attributes() ?>>Height (px):</label>
                                 <input type="number" class="form-control"<?php
		$_input = end($this->global->formsStack)["ignoreHeight"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'class' => NULL,
		))->attributes() ?>>
                                 <small class="form-text text-muted"></small>
                              </div>
                           </div>
                           <div class="col-xs-12 col-sm-6 col-lg-2">
                              <div class="form-group">
                                 <button type="submit" name="set" class="btn btn-primary btn-outline-primary">Set
                                 </button>
                              </div>

                           </div>
                        </div>
<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), FALSE);
?>                     </form>
                  </div>
               </div>

               <div class="col-xs-12 col-md-6 col-lg-4">
                  <div class="stats">
                     <p><strong>Differences in comparison:</strong></p>
                     <p class="difference"><?php echo LR\Filters::escapeHtmlText($difference) /* line 156 */ ?> %</p>
                  </div>
               </div>
            </div>

            <div class="row">
               <div class="col-xs-12 col-sm-6 col-lg-4">
                  <div class="compare-source">
                     <h4>Source shoot</h4>

                     <div class="image">
                        <a href="<?php
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 167 */;
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($source->path_img)) /* line 167 */ ?>" class="shoot-thumbnail" data-toggle="lightbox"
                           data-parent="" data-gallery="#shoots" data-title="Source shoot">
                           <img class="img-thumbnail img-responsive" src="<?php
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 169 */;
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($source->path_img)) /* line 169 */ ?>"
                                alt="<?php echo LR\Filters::escapeHtmlAttr($source->url_autority) /* line 170 */ ?>">
                        </a>
                     </div>

                     <a
                           class="btn btn-primary btn-outline-primary" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("download!", [$source->id_shoot])) ?>">
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
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 186 */;
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($target->path_img)) /* line 186 */ ?>" class="shoot-thumbnail"
                           data-toggle="lightbox"
                           data-parent="" data-gallery="#shoots" data-title="Target shoot">
                           <img class="img-thumbnail img-responsive"
                                src="<?php
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 190 */;
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($target->path_img)) /* line 190 */ ?>"
                                alt="<?php echo LR\Filters::escapeHtmlAttr($target->url_autority) /* line 191 */ ?>">
                        </a>
                     </div>

                     <a
                           class="btn btn-primary btn-outline-primary" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("download!", [$target->id_shoot])) ?>">
                        <i class="fa fa-download"></i>
                        Download
                     </a>
                  </div>
               </div>

               <div class="col-xs-12 col-lg-4">
                  <div class="compare-result">
                     <h4>Result</h4>

                     <div class="image">
                        <a href="<?php
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 208 */;
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($result)) /* line 208 */ ?>" class="shoot-thumbnail"
                           data-toggle="lightbox"
                           data-parent="" data-gallery="#shoots" data-title="Result">
                           <img class="img-thumbnail img-responsive"
                                src="<?php
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 212 */;
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($result)) /* line 212 */ ?>"
                                alt="<?php echo LR\Filters::escapeHtmlAttr($target->url_autority) /* line 213 */ ?>">
                        </a>
                     </div>

                     <a
                           class="btn btn-primary btn-outline-primary" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("downloadResult!", [$source->id_shoot, $target->id_shoot])) ?>">
                        <i class="fa fa-download"></i>
                        Download
                     </a>

                  </div>
               </div>
            </div>

<?php
		$image1 = $basePath.$source->path_img;
		$image2 = $basePath.$target->path_img;
?>

            <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 239 */ ?>/js/resemble.js"></script>
            <script>
               var resultThumbnail = resemble(<?php echo LR\Filters::escapeJs($image1) /* line 241 */ ?>)
                     .compareTo(<?php echo LR\Filters::escapeJs($image2) /* line 242 */ ?>)
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
