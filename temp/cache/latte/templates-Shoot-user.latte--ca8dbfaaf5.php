<?php
// source: C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\app\FrontModule\presenters/templates/Shoot/user.latte

use Latte\Runtime as LR;

class Templateca8dbfaaf5 extends Latte\Runtime\Template
{
	public $blocks = [
		'header' => 'blockHeader',
		'title' => 'blockTitle',
		'breadcrumb' => 'blockBreadcrumb',
		'content' => 'blockContent',
		'_changeView' => 'blockChangeView',
	];

	public $blockTypes = [
		'header' => 'html',
		'title' => 'html',
		'breadcrumb' => 'html',
		'content' => 'html',
		'_changeView' => 'html',
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
		if (isset($this->params['shoot'])) trigger_error('Variable $shoot overwritten in foreach on line 128, 345, 393, 499');
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
?>      <h1>User shoots</h1>
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
            <li class="breadcrumb-item active">User shoots</li>
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
      <div class="shoot-list">

<div id="<?php echo htmlSpecialChars($this->global->snippetDriver->getHtmlId('changeView')) ?>"><?php $this->renderBlock('_changeView', $this->params) ?></div>      </div>
   </div>
<?php
	}


	function blockChangeView($_args)
	{
		extract($_args);
		$this->global->snippetDriver->enter("changeView", "static");
		if ($isLoggedIn) {
?>
               <div class="shoot-new text-xs-center text-sm-left">
                  <a class="btn btn-success" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Shoot:add")) ?>">
                     <i class="fa fa-plus"></i>
                     Add new shoot
                  </a>
               </div>
<?php
		}
?>


<?php
		$form = $_form = $this->global->formsStack[] = $this->global->uiControl["shootUserForm"];
		?>            <form class="form-horizontal"<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		'class' => NULL,
		), FALSE) ?>>
               <div class="row form-group required">
                  <div class="col-xs-12 col-sm-4 col-lg-3 offset-lg-1 text-sm-right control-label">
                     <label class="required"<?php
		$_input = end($this->global->formsStack)["userID"];
		echo $_input->getLabelPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                        Choose shoots of
                     </label>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-lg-4">
                     <select class="form-control"<?php
		$_input = end($this->global->formsStack)["userID"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
<?php echo $_input->getControl()->getHtml() ?>                     </select>
                  </div>
                  <div class="col-xs-12 col-sm-4 col-lg-3 text-xs-center text-sm-left">
                     <button type="select" class="btn btn-primary"<?php
		$_input = end($this->global->formsStack)["select"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'class' => NULL,
		))->attributes() ?>>
                        Select
                     </button>
                  </div>
               </div>
<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), FALSE);
?>            </form>


            <div class="change-view">
               <div class="btn-group" role="group" aria-label="Shoots change view">
                  <a type="button"
                                                  class="ajax btn btn-secondary <?php
		if ($view == $viewLG) {
			?>active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("changeView!", [$viewLG, $paginator->getPage()])) ?>">
                     <i class="fa fa-th-list"></i>
                  </a>
                  <a type="button"
                                                  class="ajax btn btn-secondary <?php
		if ($view == $viewMD) {
			?>active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("changeView!", [$viewMD, $paginator->getPage()])) ?>">
                     <i class="fa fa-th-large"></i>
                  </a>
                  <a type="button"
                                                  class="ajax btn btn-secondary <?php
		if ($view == $viewSM) {
			?>active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("changeView!", [$viewSM, $paginator->getPage()])) ?>">
                     <i class="fa fa-th"></i>
                  </a>
                  <a type="button"
                                                  class="ajax btn btn-secondary <?php
		if ($view == $viewXS) {
			?>active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("changeView!", [$viewXS, $paginator->getPage()])) ?>">
                     <i class="fa fa-list"></i>
                  </a>
               </div>
            </div>


<?php
		if ($paginator->getPageCount() > 1) {
?>
            <nav aria-label="Shoots pagination" class="text-xs-center">
               <ul class="pagination pagination-sm justify-content-center">
<?php
			if ($paginator->first) {
?>
                     <li class="page-item disabled">
                        <a href="#" class="page-link" aria-label="Previous">
                           <span aria-hidden="true"><i class="fa fa-chevron-left"></i></span>
                           <span class="sr-only">Previous</span>
                        </a>
                     </li>
<?php
			}
			else {
?>
                     <li class="page-item">
                        <a class="page-link ajax" aria-label="Previous" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("paginator!", [$view, $paginator->getPage() - 1])) ?>">
                           <span aria-hidden="true"><i class="fa fa-chevron-left"></i></span>
                           <span class="sr-only">Previous</span>
                        </a>
                     </li>
<?php
			}
			for ($page = 1;
			$page < $paginator->getPageCount() + 1;
			$page++) {
				?>                     <li class="page-item<?php
				if ($page == $paginator->getPage()) {
					?> active<?php
				}
?>">
                        <a class="page-link ajax" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("paginator!", [$view, $page])) ?>"><?php
				echo LR\Filters::escapeHtmlText($page) /* line 101 */ ?></a>
                     </li>
<?php
			}
			if ($paginator->last) {
?>
                     <li class="page-item disabled">
                        <a href="#" class="page-link" aria-label="Next">
                           <span aria-hidden="true"><i class="fa fa-chevron-right"></i></span>
                           <span class="sr-only">Next</span>
                        </a>
                     </li>
<?php
			}
			else {
?>
                     <li class="page-item">
                        <a class="page-link ajax" aria-label="Next" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("paginator!", [$view, $paginator->getPage() + 1])) ?>">
                           <span aria-hidden="true"><i class="fa fa-chevron-right"></i></span>
                           <span class="sr-only">Next</span>
                        </a>
                     </li>
<?php
			}
?>
               </ul>
            </nav>
<?php
		}
?>


<?php
		if ($view == $viewLG) {
?>

<?php
			if (isset($shoots)) {
				$iterations = 0;
				foreach ($iterator = $this->global->its[] = new LR\CachingIterator($shoots) as $shoot) {
?>
                  <div class="shoot-item view-lg">
                     <div class="row">
                        <div class="col-xs-12">
                           <h3>
                              <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 133 */ ?>" target="_blank"><?php
					echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 133 */ ?></a>
                           </h3>
                        </div>
                        <div class="col-xs-12 col-lg-4">
                           <div class="image">
                              <a href="<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 138 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 138 */ ?>" class="shoot-thumbnail" data-toggle="lightbox"
                                 data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 139 */ ?>">
                                 <img class="img-thumbnail img-responsive" src="<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 140 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 140 */ ?>"
                                      alt="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 141 */ ?>">
                              </a>
                           </div>
                        </div>
                        <div class="col-xs-12 col-md-6 push-md-6 col-lg-4 push-lg-4">
<?php
					if ($shoot->device != null) {
?>
                              <table class="table">
                                 <tr>
                                    <td>Device type</td>
                                    <td>
                                       <strong title="<?php echo LR\Filters::escapeHtmlAttr($shoot->device->type->type) /* line 151 */ ?>">
                                          <i class="fa fa-<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->lower, $shoot->device->type->type)) /* line 152 */ ?>"></i>
                                       </strong>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>Device</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->device->device) /* line 158 */ ?></strong></td>
                                 </tr>
                                 <tr>
                                    <td>Platform</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->device->platform) /* line 162 */ ?></strong></td>
                                 </tr>
                                 <tr>
                                    <td>Screen dimensions</td>
                                    <td>
                                       <strong>
                                          <?php echo LR\Filters::escapeHtmlText($shoot->device->screen_in) /* line 168 */ ?>

                                          <small>in</small> <?php echo LR\Filters::escapeHtmlText($shoot->device->screen_width_in) /* line 169 */ ?><small>×</small><?php
						echo LR\Filters::escapeHtmlText($shoot->device->screen_height_in) /* line 169 */ ?>

                                          <small>in</small>
                                          <br>
                                          <?php echo LR\Filters::escapeHtmlText($shoot->device->screen_cm) /* line 172 */ ?>

                                          <small>cm</small>
                                          <?php echo LR\Filters::escapeHtmlText($shoot->device->screen_width_cm) /* line 174 */ ?><small>×</small><?php
						echo LR\Filters::escapeHtmlText($shoot->device->screen_height_cm) /* line 174 */ ?>

                                          <small>cm</small>
                                       </strong>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>Width
                                       <small>×</small>
                                       Height
                                    </td>
                                    <td>
                                       <strong>
                                          <?php echo LR\Filters::escapeHtmlText($shoot->device->width_px) /* line 186 */ ?><small>×</small><?php
						echo LR\Filters::escapeHtmlText($shoot->device->height_px) /* line 186 */ ?>

                                          <small>px</small>
                                          <br>
                                          <?php echo LR\Filters::escapeHtmlText($shoot->device->width_dp) /* line 189 */ ?><small>×</small><?php
						echo LR\Filters::escapeHtmlText($shoot->device->height_dp) /* line 189 */ ?>

                                          <small>dp</small>
                                       </strong>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>Aspect ratio</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->device->aspect_ratio) /* line 196 */ ?></strong></td>
                                 </tr>
                                 <tr>
                                    <td>Density</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->number, $shoot->device->density, 1)) /* line 200 */ ?></strong></td>
                                 </tr>
                              </table>
<?php
					}
					else {
						if ($shoot->other_width != null) {
?>
                                 <table class="table">
                                    <tr>
                                       <td>Type</td>
                                       <td><strong title="Custom"><i class="fa fa-cogs"></i></strong></td>
                                    </tr>
                                    <tr>
                                       <td>Custom width</td>
                                       <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->other_width) /* line 212 */ ?>

                                             <small>px</small>
                                          </strong></td>
                                    </tr>
                                    <tr>
                                       <td>Custom height</td>
                                       <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->other_height == null ? 'MAX' : $shoot->other_height) /* line 218 */ ?>

                                             <small>px</small>
                                          </strong></td>
                                    </tr>
                                 </table>
<?php
						}
?>

<?php
						if ($shoot->crop_viewport_width != null and $shoot->crop_viewport_height != null) {
?>
                                 <table class="table">
                                    <tr>
                                       <td>Type</td>
                                       <td><strong title="Crop"><i class="fa fa-crop"></i></strong></td>
                                    </tr>
                                    <tr>
                                       <td>Viewport width</td>
                                       <td>
                                          <strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_viewport_width == null ? 0 : $shoot->crop_viewport_width) /* line 234 */ ?>

                                             <small>px</small>
                                          </strong></td>
                                    </tr>
                                    <tr>
                                       <td>Viewport height</td>
                                       <td>
                                          <strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_viewport_height == null ? 0 : $shoot->crop_viewport_height) /* line 241 */ ?>

                                             <small>px</small>
                                          </strong></td>
                                    </tr>
                                    <tr>
                                       <td>Top</td>
                                       <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_top == null ? 0 : $shoot->crop_top) /* line 247 */ ?>

                                             <small>px</small>
                                          </strong></td>
                                    </tr>
                                    <tr>
                                       <td>Left</td>
                                       <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_left == null ? 0 : $shoot->crop_left) /* line 253 */ ?>

                                             <small>px</small>
                                          </strong></td>
                                    </tr>
                                    <tr>
                                       <td>Crop width</td>
                                       <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_width == null ? 0 : $shoot->crop_width) /* line 259 */ ?>

                                             <small>px</small>
                                          </strong></td>
                                    </tr>
                                    <tr>
                                       <td>Crop height</td>
                                       <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_height == null ? 0 : $shoot->crop_height) /* line 265 */ ?>

                                             <small>px</small>
                                          </strong></td>
                                    </tr>
                                 </table>
<?php
						}
					}
?>
                        </div>
                        <div class="col-xs-12 col-md-6 pull-md-6 col-lg-4 pull-lg-4">
                           <table class="table">
                              <tr>
                                 <td>URL</td>
                                 <td><strong><a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 277 */ ?>" target="_blank"><?php
					echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 277 */ ?></a></strong>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Engine</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->engine)) /* line 282 */ ?></strong></td>
                              </tr>
                              <tr>
                                 <td>Browser</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->browser_name)) /* line 286 */ ?> <?php
					echo LR\Filters::escapeHtmlText($shoot->browser_version) /* line 286 */ ?></strong></td>
                              </tr>
                              <tr>
                                 <td>Image type</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $shoot->img_type)) /* line 290 */ ?></strong></td>
                              </tr>
                              <tr>
                                 <td>Created</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $shoot->date, 'd.n.Y H:i:s')) /* line 294 */ ?></strong></td>
                              </tr>
                              <tr>
                                 <td>User</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->user->username) /* line 298 */ ?></strong></td>
                              </tr>
                              <tr>
                                 <td>
                                    <a class="btn btn-success btn-outline-success" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Compare:list", [$shoot->id_shoot])) ?>">
                                       <i class="fa fa-exchange"></i>
                                       Comparison
                                    </a>
                                 </td>
                                 <td>
                                    <a class="btn btn-primary btn-outline-primary" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("download!", [$shoot->id_shoot])) ?>">
                                       <i class="fa fa-download"></i>
                                       Download
                                    </a>
                                 </td>
                              </tr>
<?php
					if (isset($roleAdmin)) {
?>
                                 <tr>
                                    <td>
                                       <a class="btn btn-danger btn-outline-danger"
                                                                            data-confirm="Are you sure to delete this shoot?" href="<?php
						echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("delete!", [$shoot->id_shoot])) ?>">
                                          <i class="fa fa-trash"></i>
                                          Delete
                                       </a>
                                    </td>
                                    <td></td>
                                 </tr>
<?php
					}
?>
                           </table>
                        </div>
                     </div>
                  </div>

<?php
					if (!$iterator->last) {
?>
                     <hr>
<?php
					}
					$iterations++;
				}
				array_pop($this->global->its);
				$iterator = end($this->global->its);
			}
			else {
?>
               <div class="alert alert-info" role="alert">
                  There is no shoots yet. <strong><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Shoot:add")) ?>">Make new here</a></strong>
               </div>
<?php
			}
?>

<?php
		}
		elseif ($view == $viewMD) {
?>

<?php
			if (isset($shoots)) {
?>
               <div class="row">
<?php
				$iterations = 0;
				foreach ($shoots as $shoot) {
?>
                     <div class="col-xs-12 col-sm-6 col-lg-4">
                        <div class="shoot-item view-md">
                           <div class="row">
                              <div class="col-xs-12">
                                 <h3>
                                    <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 351 */ ?>" target="_blank"><?php
					echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 351 */ ?></a>
                                 </h3>
                              </div>
                              <div class="col-xs-12">
                                 <div class="image">
                                    <a href="<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 356 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 356 */ ?>" class="shoot-thumbnail"
                                       data-toggle="lightbox"
                                       data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 358 */ ?>">
                                       <img class="img-thumbnail img-responsive" src="<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 359 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 359 */ ?>"
                                            alt="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 360 */ ?>">
                                    </a>
                                 </div>
                                 <div class="action">
                                    <a class="btn btn-success btn-outline-success" title="Comparison" href="<?php
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Compare:list", [$shoot->id_shoot])) ?>">
                                       <i class="fa fa-exchange"></i>
                                    </a>
                                    <a class="btn btn-primary btn-outline-primary" title="Download" href="<?php
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("download!", [$shoot->id_shoot])) ?>">
                                       <i class="fa fa-download"></i>
                                    </a>
<?php
					if (isset($roleAdmin)) {
?>
                                       <a class="btn btn-danger btn-outline-danger float-xs-right"
                                                                            data-confirm="Are you sure to delete this shoot?" title="Delete" href="<?php
						echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("delete!", [$shoot->id_shoot])) ?>">
                                          <i class="fa fa-trash"></i>
                                       </a>
<?php
					}
?>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
<?php
					$iterations++;
				}
?>
               </div>
<?php
			}
			else {
?>
               <div class="alert alert-info" role="alert">
                  There is no shoots yet. <strong><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Shoot:add")) ?>">Make new here</a></strong>
               </div>
<?php
			}
?>

<?php
		}
		elseif ($view == $viewSM) {
?>

<?php
			if (isset($shoots)) {
?>
            <div class="row">
<?php
				$iterations = 0;
				foreach ($shoots as $shoot) {
?>
                  <div class="col-xs-12 col-sm-6 col-lg-4">
                     <div class="shoot-item view-sm">
                        <div class="row">
                           <div class="col-xs-12">
                              <h3>
                                 <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 399 */ ?>" target="_blank"><?php
					echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 399 */ ?></a>
                              </h3>
                           </div>
                           <div class="col-xs-12">
                              <div class="image">
                                 <a href="<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 404 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 404 */ ?>" class="shoot-thumbnail" data-toggle="lightbox"
                                    data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 405 */ ?>">
                                    <img class="img-thumbnail img-responsive" src="<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 406 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 406 */ ?>"
                                         alt="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 407 */ ?>">
                                 </a>
                              </div>
                           </div>
                           <div class="col-xs-12">
                              <table class="table">
                                 <tr>
                                    <td>URL</td>
                                    <td><strong><a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 415 */ ?>"
                                                   target="_blank"><?php echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 416 */ ?></a></strong>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>Engine</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->engine)) /* line 421 */ ?></strong></td>
                                 </tr>
                                 <tr>
                                    <td>Browser</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->browser_name)) /* line 425 */ ?> <?php
					echo LR\Filters::escapeHtmlText($shoot->browser_version) /* line 425 */ ?></strong></td>
                                 </tr>
                                 <tr>
                                    <td>Image type</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $shoot->img_type)) /* line 429 */ ?></strong></td>
                                 </tr>
                                 <tr>
                                    <td>Created</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $shoot->date, 'd.n.Y H:i:s')) /* line 433 */ ?></strong></td>
                                 </tr>
                                 <tr>
                                    <td>User</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->user->username) /* line 437 */ ?></strong></td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <a class="btn btn-success btn-outline-success" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Compare:list", [$shoot->id_shoot])) ?>">
                                          <i class="fa fa-exchange"></i>
                                          Comparison
                                       </a>
                                    </td>
                                    <td>
                                       <a
                                             class="btn btn-primary btn-outline-primary" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("download!", [$shoot->id_shoot])) ?>">
                                          <i class="fa fa-download"></i>
                                          Download
                                       </a>
                                    </td>
                                 </tr>
<?php
					if (isset($roleAdmin)) {
?>
                                    <tr>
                                       <td>
                                          <a class="btn btn-danger btn-outline-danger"
                                                                               data-confirm="Are you sure to delete this shoot?" href="<?php
						echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("delete!", [$shoot->id_shoot])) ?>">
                                             <i class="fa fa-trash"></i>
                                             Delete
                                          </a>
                                       </td>
                                       <td></td>
                                    </tr>
<?php
					}
?>
                              </table>
                           </div>
                        </div>
                     </div>
                  </div>
<?php
					$iterations++;
				}
?>
            </div>
<?php
			}
			else {
?>
               <div class="alert alert-info" role="alert">
                  There is no shoots yet. <strong><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Shoot:add")) ?>">Make new here</a></strong>
               </div>
<?php
			}
?>

<?php
		}
		elseif ($view == $viewXS) {
?>

<?php
			if (isset($shoots)) {
?>
            <div class="row">
               <div class="col-xs-12">
                  <div class="shoot-item view-xs">
                     <table class="table table-striped">
                        <thead>
                        <tr>
                           <th>Shoot</th>
                           <th>URL</th>
                           <th>Engine</th>
                           <th>Browser</th>
                           <th>Image type</th>
                           <th>Created</th>
                           <th>User</th>
                           <th></th>
                        </tr>
                        </thead>
                        <tbody>
<?php
				$iterations = 0;
				foreach ($shoots as $shoot) {
?>
                           <tr>
                              <td data-title="Shoot" data-shoot>
                                 <div class="image">
                                    <a href="<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 503 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 503 */ ?>" class="shoot-thumbnail"
                                       data-toggle="lightbox"
                                       data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 505 */ ?>">
                                       <img class="img-thumbnail img-responsive" src="<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 506 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 506 */ ?>"
                                            alt="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 507 */ ?>">
                                    </a>
                                 </div>
                              </td>
                              <td data-title="URL" data-url>
                                 <strong><a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 512 */ ?>" target="_blank"><?php
					echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 512 */ ?></a></strong>
                              </td>
                              <td data-title="Engine">
                                 <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->engine)) /* line 515 */ ?>

                              </td>
                              <td data-title="Browser">
                                 <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->browser_name)) /* line 518 */ ?> <?php
					echo LR\Filters::escapeHtmlText($shoot->browser_version) /* line 518 */ ?>

                              </td>
                              <td data-title="Image type">
                                 <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $shoot->img_type)) /* line 521 */ ?>

                              </td>
                              <td data-title="Created">
                                 <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $shoot->date, 'd.n.Y H:i:s')) /* line 524 */ ?>

                              </td>
                              <td data-title="User">
                                 <?php echo LR\Filters::escapeHtmlText($shoot->user->username) /* line 527 */ ?>

                              </td>
                              <td data-title="Action">
                                 <a class="btn btn-success btn-outline-success btn-sm" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Compare:list", [$shoot->id_shoot])) ?>">
                                    <i class="fa fa-exchange"></i>
                                    Comparison
                                 </a>
                                 <a class="btn btn-primary btn-outline-primary btn-sm" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("download!", [$shoot->id_shoot])) ?>">
                                    <i class="fa fa-download"></i>
                                    Download
                                 </a>
<?php
					if (isset($roleAdmin)) {
?>
                                    <a class="btn btn-danger btn-outline-danger btn-sm"
                                                                         data-confirm="Are you sure to delete this shoot?" title="Delete" href="<?php
						echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("delete!", [$shoot->id_shoot])) ?>">
                                       <i class="fa fa-trash"></i>
                                    </a>
<?php
					}
?>
                              </td>
                           </tr>
<?php
					$iterations++;
				}
?>
                        </tbody>
                     </table>
                  </div>
               </div>
            </div>
<?php
			}
			else {
?>
               <div class="alert alert-info" role="alert">
                  There is no shoots yet. <strong><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Shoot:add")) ?>">Make new here</a></strong>
               </div>
<?php
			}
		}
?>


<?php
		if ($paginator->getPageCount() > 1) {
?>
            <nav aria-label="Shoots pagination" class="text-xs-center">
               <ul class="pagination justify-content-center">
<?php
			if ($paginator->first) {
?>
                     <li class="page-item disabled">
                        <a href="#" class="page-link" aria-label="Previous">
                           <span aria-hidden="true"><i class="fa fa-chevron-left"></i></span>
                           <span class="sr-only">Previous</span>
                        </a>
                     </li>
<?php
			}
			else {
?>
                     <li class="page-item">
                        <a class="page-link ajax" aria-label="Previous" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("paginator!", [$view, $paginator->getPage() - 1])) ?>">
                           <span aria-hidden="true"><i class="fa fa-chevron-left"></i></span>
                           <span class="sr-only">Previous</span>
                        </a>
                     </li>
<?php
			}
			for ($page = 1;
			$page < $paginator->getPageCount() + 1;
			$page++) {
				?>                     <li class="page-item<?php
				if ($page == $paginator->getPage()) {
					?> active<?php
				}
?>">
                        <a class="page-link ajax" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("paginator!", [$view, $page])) ?>"><?php
				echo LR\Filters::escapeHtmlText($page) /* line 581 */ ?></a>
                     </li>
<?php
			}
			if ($paginator->last) {
?>
                     <li class="page-item disabled">
                        <a href="#" class="page-link" aria-label="Next">
                           <span aria-hidden="true"><i class="fa fa-chevron-right"></i></span>
                           <span class="sr-only">Next</span>
                        </a>
                     </li>
<?php
			}
			else {
?>
                     <li class="page-item">
                        <a class="page-link ajax" aria-label="Next" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("paginator!", [$view, $paginator->getPage() + 1])) ?>">
                           <span aria-hidden="true"><i class="fa fa-chevron-right"></i></span>
                           <span class="sr-only">Next</span>
                        </a>
                     </li>
<?php
			}
?>
               </ul>
            </nav>
<?php
		}
?>

         <script>
            $('.page-link').on('click', function() {
               $('html, body').animate({ scrollTop: 0 }, 'slow');
               return false;
            });
         </script>

<?php
		$this->global->snippetDriver->leave();
		
	}

}
