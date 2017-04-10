<?php
// source: C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\app\FrontModule\presenters/templates/Shoot/list.latte

use Latte\Runtime as LR;

class Template9fa0555ad6 extends Latte\Runtime\Template
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
		if (isset($this->params['shoot'])) trigger_error('Variable $shoot overwritten in foreach on line 88, 292, 332, 423');
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
?>      <h1>Web shoots</h1>
<?php
	}


	function blockBreadcrumb($_args)
	{
		
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
?>
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
				echo LR\Filters::escapeHtmlText($page) /* line 61 */ ?></a>
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
			if ($shoots) {
				$iterations = 0;
				foreach ($iterator = $this->global->its[] = new LR\CachingIterator($shoots) as $shoot) {
?>
                  <div class="shoot-item view-lg">
                     <div class="row">
                        <div class="col-xs-12">
                           <h3>
                              <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 93 */ ?>" target="_blank"><?php
					echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 93 */ ?></a>
                           </h3>
                        </div>
                        <div class="col-xs-12 col-lg-4">
                           <div class="image">
                              <a href="<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 98 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 98 */ ?>" class="shoot-thumbnail" data-toggle="lightbox"
                                 data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 99 */ ?>">
                                 <img class="img-thumbnail img-responsive" src="<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 100 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 100 */ ?>"
                                      alt="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 101 */ ?>">
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
                                       <strong title="<?php echo LR\Filters::escapeHtmlAttr($shoot->device->type->type) /* line 111 */ ?>">
                                          <i class="fa fa-<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->lower, $shoot->device->type->type)) /* line 112 */ ?>"></i>
                                       </strong>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>Device</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->device->device) /* line 118 */ ?></strong></td>
                                 </tr>
                                 <tr>
                                    <td>Platform</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->device->platform) /* line 122 */ ?></strong></td>
                                 </tr>
                                 <tr>
                                    <td>Screen dimensions</td>
                                    <td>
                                       <strong>
                                          <?php echo LR\Filters::escapeHtmlText($shoot->device->screen_in) /* line 128 */ ?>

                                          <small>in</small> <?php echo LR\Filters::escapeHtmlText($shoot->device->screen_width_in) /* line 129 */ ?>

                                          <small>×</small><?php echo LR\Filters::escapeHtmlText($shoot->device->screen_height_in) /* line 130 */ ?>

                                          <small>in</small>
                                          <br>
                                          <?php echo LR\Filters::escapeHtmlText($shoot->device->screen_cm) /* line 133 */ ?>

                                          <small>cm</small>
                                          <?php echo LR\Filters::escapeHtmlText($shoot->device->screen_width_cm) /* line 135 */ ?>

                                          <small>×</small><?php echo LR\Filters::escapeHtmlText($shoot->device->screen_height_cm) /* line 136 */ ?>

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
                                          <?php echo LR\Filters::escapeHtmlText($shoot->device->width_px) /* line 148 */ ?>

                                          <small>×</small><?php echo LR\Filters::escapeHtmlText($shoot->device->height_px) /* line 149 */ ?>

                                          <small>px</small>
                                          <br>
                                          <?php echo LR\Filters::escapeHtmlText($shoot->device->width_dp) /* line 152 */ ?>

                                          <small>×</small><?php echo LR\Filters::escapeHtmlText($shoot->device->height_dp) /* line 153 */ ?>

                                          <small>dp</small>
                                       </strong>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>Aspect ratio</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->device->aspect_ratio) /* line 160 */ ?></strong></td>
                                 </tr>
                                 <tr>
                                    <td>Density</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->number, $shoot->device->density, 1)) /* line 164 */ ?></strong></td>
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
                                       <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->other_width) /* line 176 */ ?>

                                             <small>px</small>
                                          </strong></td>
                                    </tr>
                                    <tr>
                                       <td>Custom height</td>
                                       <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->other_height == null ? 'MAX' : $shoot->other_height) /* line 182 */ ?>

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
                                          <strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_viewport_width == null ? 0 : $shoot->crop_viewport_width) /* line 198 */ ?>

                                             <small>px</small>
                                          </strong></td>
                                    </tr>
                                    <tr>
                                       <td>Viewport height</td>
                                       <td>
                                          <strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_viewport_height == null ? 0 : $shoot->crop_viewport_height) /* line 205 */ ?>

                                             <small>px</small>
                                          </strong></td>
                                    </tr>
                                    <tr>
                                       <td>Top</td>
                                       <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_top == null ? 0 : $shoot->crop_top) /* line 211 */ ?>

                                             <small>px</small>
                                          </strong></td>
                                    </tr>
                                    <tr>
                                       <td>Left</td>
                                       <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_left == null ? 0 : $shoot->crop_left) /* line 217 */ ?>

                                             <small>px</small>
                                          </strong></td>
                                    </tr>
                                    <tr>
                                       <td>Crop width</td>
                                       <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_width == null ? 0 : $shoot->crop_width) /* line 223 */ ?>

                                             <small>px</small>
                                          </strong></td>
                                    </tr>
                                    <tr>
                                       <td>Crop height</td>
                                       <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_height == null ? 0 : $shoot->crop_height) /* line 229 */ ?>

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
                                 <td><strong><a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 241 */ ?>" target="_blank"><?php
					echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 241 */ ?></a></strong>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Engine</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->engine)) /* line 246 */ ?></strong></td>
                              </tr>
                              <tr>
                                 <td>Browser</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->browser_name)) /* line 250 */ ?> <?php
					echo LR\Filters::escapeHtmlText($shoot->browser_version) /* line 250 */ ?></strong></td>
                              </tr>
                              <tr>
                                 <td>Image type</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $shoot->img_type)) /* line 254 */ ?></strong></td>
                              </tr>
                              <tr>
                                 <td>Created</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $shoot->date, 'd.m.Y H:i:s')) /* line 258 */ ?></strong></td>
                              </tr>
                              <tr>
                                 <td>User</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->user->username) /* line 262 */ ?></strong></td>
                              </tr>
                              <tr>
                                 <td></td>
                                 <td>
                                    <a class="btn btn-primary btn-outline-primary" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("download!", [$shoot->id_shoot])) ?>">
                                       <i class="fa fa-download"></i>
                                       Download
                                    </a>
                                 </td>
                              </tr>
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
                  There is now shoots yet.
               </div>
<?php
			}
?>

<?php
		}
		elseif ($view == $viewMD) {
?>

<?php
			if ($shoots) {
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
                                    <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 298 */ ?>" target="_blank"><?php
					echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 298 */ ?></a>
                                 </h3>
                              </div>
                              <div class="col-xs-12">
                                 <div class="image">
                                    <a href="<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 303 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 303 */ ?>" class="shoot-thumbnail"
                                       data-toggle="lightbox"
                                       data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 305 */ ?>">
                                       <img class="img-thumbnail img-responsive" src="<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 306 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 306 */ ?>"
                                            alt="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 307 */ ?>">
                                    </a>
                                 </div>
                                 <div class="action">
                                    <a class="btn btn-primary btn-outline-primary"
                                                                           title="Download" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("download!", [$shoot->id_shoot])) ?>">
                                       <i class="fa fa-download"></i>
                                    </a>
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
                  There is now shoots yet.
               </div>
<?php
			}
?>

<?php
		}
		elseif ($view == $viewSM) {
?>

<?php
			if ($shoots) {
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
                                    <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 338 */ ?>" target="_blank"><?php
					echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 338 */ ?></a>
                                 </h3>
                              </div>
                              <div class="col-xs-12">
                                 <div class="image">
                                    <a href="<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 343 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 343 */ ?>" class="shoot-thumbnail"
                                       data-toggle="lightbox"
                                       data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 345 */ ?>">
                                       <img class="img-thumbnail img-responsive" src="<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 346 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 346 */ ?>"
                                            alt="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 347 */ ?>">
                                    </a>
                                 </div>
                              </div>
                              <div class="col-xs-12">
                                 <table class="table">
                                    <tr>
                                       <td>URL</td>
                                       <td><strong><a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 355 */ ?>"
                                                      target="_blank"><?php echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 356 */ ?></a></strong>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>Engine</td>
                                       <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->engine)) /* line 361 */ ?></strong></td>
                                    </tr>
                                    <tr>
                                       <td>Browser</td>
                                       <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->browser_name)) /* line 365 */ ?> <?php
					echo LR\Filters::escapeHtmlText($shoot->browser_version) /* line 365 */ ?></strong>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>Image type</td>
                                       <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $shoot->img_type)) /* line 370 */ ?></strong></td>
                                    </tr>
                                    <tr>
                                       <td>Created</td>
                                       <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $shoot->date, 'd.m.Y H:i:s')) /* line 374 */ ?></strong></td>
                                    </tr>
                                    <tr>
                                       <td>User</td>
                                       <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->user->username) /* line 378 */ ?></strong></td>
                                    </tr>
                                    <tr>
                                       <td></td>
                                       <td>
                                          <a
                                                class="btn btn-primary btn-outline-primary" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("download!", [$shoot->id_shoot])) ?>">
                                             <i class="fa fa-download"></i>
                                             Download
                                          </a>
                                       </td>
                                    </tr>
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
                  There is now shoots yet.
               </div>
<?php
			}
?>

<?php
		}
		elseif ($view == $viewXS) {
?>

<?php
			if ($shoots) {
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
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 427 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 427 */ ?>" class="shoot-thumbnail"
                                          data-toggle="lightbox"
                                          data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 429 */ ?>">
                                          <img class="img-thumbnail img-responsive" src="<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 430 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 430 */ ?>"
                                               alt="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 431 */ ?>">
                                       </a>
                                    </div>
                                 </td>
                                 <td data-title="URL" data-url>
                                    <strong><a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 436 */ ?>" target="_blank"><?php
					echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 436 */ ?></a></strong>
                                 </td>
                                 <td data-title="Engine">
                                    <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->engine)) /* line 439 */ ?>

                                 </td>
                                 <td data-title="Browser">
                                    <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->browser_name)) /* line 442 */ ?> <?php
					echo LR\Filters::escapeHtmlText($shoot->browser_version) /* line 442 */ ?>

                                 </td>
                                 <td data-title="Image type">
                                    <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $shoot->img_type)) /* line 445 */ ?>

                                 </td>
                                 <td data-title="Created">
                                    <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $shoot->date, 'd.m.Y H:i:s')) /* line 448 */ ?>

                                 </td>
                                 <td data-title="User">
                                    <?php echo LR\Filters::escapeHtmlText($shoot->user->username) /* line 451 */ ?>

                                 </td>
                                 <td data-title="Action">
                                    <a
                                          class="btn btn-primary btn-outline-primary btn-sm" href="<?php
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("download!", [$shoot->id_shoot])) ?>">
                                       <i class="fa fa-download"></i>
                                       Download
                                    </a>
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
                  There is now shoots yet.
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
				echo LR\Filters::escapeHtmlText($page) /* line 495 */ ?></a>
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
