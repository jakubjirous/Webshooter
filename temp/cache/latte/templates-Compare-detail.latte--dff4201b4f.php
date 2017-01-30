<?php
// source: C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\app\FrontModule\presenters/templates/Compare/detail.latte

use Latte\Runtime as LR;

class Templatedff4201b4f extends Latte\Runtime\Template
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
      <div class="compare-detail">

         <div class="row">
            <div class="col-xs-12 col-sm-6 col-lg-4">
               <h2>Source shoot</h2>

               <h3>
                  <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 33 */ ?>" target="_blank"><?php
		echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 33 */ ?></a>
               </h3>

               <div class="image">
                  <a href="<?php
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 37 */;
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 37 */ ?>" class="shoot-thumbnail" data-toggle="lightbox"
                     data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 38 */ ?>">
                     <img class="img-thumbnail img-responsive" src="<?php
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 39 */;
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 39 */ ?>"
                          alt="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 40 */ ?>">
                  </a>
               </div>
            </div>
            <div class="col-xs-12 col-sm-6 col-lg-4">
               <h2>Target shoot</h2>

               <h3>
                  <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($similar->url)) /* line 48 */ ?>" target="_blank"><?php
		echo LR\Filters::escapeHtmlText($similar->url_autority) /* line 48 */ ?></a>
               </h3>

               <div class="image">
                  <a href="<?php
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 52 */;
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($similar->path_img)) /* line 52 */ ?>" class="shoot-thumbnail"
                     data-toggle="lightbox"
                     data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($similar->url_autority) /* line 54 */ ?>">
                     <img class="img-thumbnail img-responsive"
                          src="<?php
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 56 */;
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($similar->path_img)) /* line 56 */ ?>"
                          alt="<?php echo LR\Filters::escapeHtmlAttr($similar->url_autority) /* line 57 */ ?>">
                  </a>
               </div>
            </div>

            <div class="col-xs-12 col-lg-4">
               <h2>Result</h2>
            </div>
         </div>

      </div>
   </div>
<?php
	}

}
