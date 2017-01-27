<?php
// source: C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\app\FrontModule\presenters/templates/Compare/list.latte

use Latte\Runtime as LR;

class Template711af195f2 extends Latte\Runtime\Template
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
		if (isset($this->params['similar'])) trigger_error('Variable $similar overwritten in foreach on line 71');
		$this->parentName = '../@index.latte';
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockHeader($_args)
	{
		extract($_args);
?>
   <header class="index">
<?php
		$this->renderBlock('title', get_defined_vars());
?>
   </header>
<?php
	}


	function blockTitle($_args)
	{
		extract($_args);
?>      <h1>Compare shoots</h1>
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
            <li class="breadcrumb-item active">Compare shoots</li>
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
      <div class="compare-list">

         <div class="row">
            <div class="col-xs-6">
               <h4><?php echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 29 */ ?></h4>

               <a href="<?php
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 31 */;
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 31 */ ?>" class="shoot-thumbnail" data-toggle="lightbox"
                  data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 32 */ ?>">
                  <img class="img-thumbnail img-responsive" src="<?php
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 33 */;
		echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 33 */ ?>"
                       alt="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 34 */ ?>" width="400">
               </a>

               <ul>
                  <li>
                     <?php echo LR\Filters::escapeHtmlText($shoot->url) /* line 39 */ ?>

                  </li>
                  <li>
                     <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->engine)) /* line 42 */ ?>

                  </li>
                  <li>
                     <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->browser_name)) /* line 45 */ ?> <?php
		echo LR\Filters::escapeHtmlText($shoot->browser_version) /* line 45 */ ?>

                  </li>
                  <li>
                     <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $shoot->img_type)) /* line 48 */ ?>

                  </li>
                  <li>
                     <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $shoot->date, 'd.n.Y H:i:s')) /* line 51 */ ?>

                  </li>
                  <li>

                  </li>
<?php
		if (isset($shoot->device)) {
?>
                     <li>
                        <?php echo LR\Filters::escapeHtmlText($shoot->device->device) /* line 58 */ ?>

                     </li>
                     <li>
                        <?php echo LR\Filters::escapeHtmlText($shoot->device->type->type) /* line 61 */ ?>

                     </li>
<?php
		}
?>
               </ul>
            </div>
            <div class="col-xs-6">
               <h4>Similar shoots</h4>

<?php
		if ($similarShoots != NULL) {
?>

<?php
			$iterations = 0;
			foreach ($similarShoots as $similar) {
				?>                     <h5><?php echo LR\Filters::escapeHtmlText($similar->url_autority) /* line 72 */ ?></h5>

                     <a href="<?php
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 74 */;
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($similar->path_img)) /* line 74 */ ?>" class="shoot-thumbnail" data-toggle="lightbox"
                        data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($similar->url_autority) /* line 75 */ ?>">
                        <img class="img-thumbnail img-responsive" src="<?php
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 76 */;
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($similar->path_img)) /* line 76 */ ?>"
                             alt="<?php echo LR\Filters::escapeHtmlAttr($similar->url_autority) /* line 77 */ ?>" width="400">
                     </a>

                     <ul>
                        <li>
                           <?php echo LR\Filters::escapeHtmlText($similar->url) /* line 82 */ ?>

                        </li>
                        <li>
                           <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $similar->engine)) /* line 85 */ ?>

                        </li>
                        <li>
                           <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $similar->browser_name)) /* line 88 */ ?> <?php
				echo LR\Filters::escapeHtmlText($similar->browser_version) /* line 88 */ ?>

                        </li>
                        <li>
                           <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $similar->img_type)) /* line 91 */ ?>

                        </li>
                        <li>
                           <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $similar->date, 'd.n.Y H:i:s')) /* line 94 */ ?>

                        </li>
                        <li>

                        </li>
<?php
				if (isset($similar->device)) {
?>
                           <li>
                              <?php echo LR\Filters::escapeHtmlText($similar->device->device) /* line 101 */ ?>

                           </li>
                           <li>
                              <?php echo LR\Filters::escapeHtmlText($similar->device->type->type) /* line 104 */ ?>

                           </li>
<?php
				}
?>
                     </ul>

                     <hr>
<?php
				$iterations++;
			}
		}
		else {
?>
                  <div class="alert alert-success fade in" role="alert">
                     <strong>This shoot hasn't any similar shoot to compare yet!</strong>
                  </div>
<?php
		}
?>

            </div>
         </div>

      </div>
   </div>
<?php
	}

}
