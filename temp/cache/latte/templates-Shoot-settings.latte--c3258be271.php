<?php
// source: C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\app\FrontModule\presenters/templates/Shoot/settings.latte

use Latte\Runtime as LR;

class Templatec3258be271 extends Latte\Runtime\Template
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
		if (isset($this->params['shoot'])) trigger_error('Variable $shoot overwritten in foreach on line 65, 273, 307, 399');
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
?>      <h1>Web shoots</h1>
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
            <li class="breadcrumb-item active">Web shoots</li>
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
?>

<?php
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


            <div class="change-view">
               <div class="btn-group" role="group" aria-label="Shoots change view">
                  <a type="button"
                                                  class="ajax btn btn-secondary <?php
		if ($view == $viewLG) {
			?>active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("changeView!", [$viewLG])) ?>">
                     <i class="fa fa-th-list"></i>
                  </a>
                  <a type="button"
                                                  class="ajax btn btn-secondary <?php
		if ($view == $viewMD) {
			?>active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("changeView!", [$viewMD])) ?>">
                     <i class="fa fa-th-large"></i>
                  </a>
                  <a type="button"
                                                  class="ajax btn btn-secondary <?php
		if ($view == $viewSM) {
			?>active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("changeView!", [$viewSM])) ?>">
                     <i class="fa fa-th"></i>
                  </a>
                  <a type="button"
                                                  class="ajax btn btn-secondary <?php
		if ($view == $viewXS) {
			?>active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("changeView!", [$viewXS])) ?>">
                     <i class="fa fa-list"></i>
                  </a>
               </div>
            </div>


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
                              <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 70 */ ?>" target="_blank"><?php
					echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 70 */ ?></a>
                           </h3>
                        </div>
                        <div class="col-xs-12 col-lg-4">
                           <div class="image">
                              <a href="<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 75 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 75 */ ?>" class="shoot-thumbnail" data-toggle="lightbox"
                                 data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 76 */ ?>">
                                 <img class="img-thumbnail img-responsive" src="<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 77 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 77 */ ?>"
                                      alt="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 78 */ ?>">
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
                                       <strong title="<?php echo LR\Filters::escapeHtmlAttr($shoot->device->type->type) /* line 88 */ ?>">
                                          <i class="fa fa-<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->lower, $shoot->device->type->type)) /* line 89 */ ?>"></i>
                                       </strong>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>Device</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->device->device) /* line 95 */ ?></strong></td>
                                 </tr>
                                 <tr>
                                    <td>Platform</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->device->platform) /* line 99 */ ?></strong></td>
                                 </tr>
                                 <tr>
                                    <td>Screen dimensions</td>
                                    <td>
                                       <strong>
                                          <?php echo LR\Filters::escapeHtmlText($shoot->device->screen_in) /* line 105 */ ?>

                                          <small>in</small> <?php echo LR\Filters::escapeHtmlText($shoot->device->screen_width_in) /* line 106 */ ?>

                                          <small>×</small><?php echo LR\Filters::escapeHtmlText($shoot->device->screen_height_in) /* line 107 */ ?>

                                          <small>in</small>
                                          <br>
                                          <?php echo LR\Filters::escapeHtmlText($shoot->device->screen_cm) /* line 110 */ ?>

                                          <small>cm</small>
                                          <?php echo LR\Filters::escapeHtmlText($shoot->device->screen_width_cm) /* line 112 */ ?>

                                          <small>×</small><?php echo LR\Filters::escapeHtmlText($shoot->device->screen_height_cm) /* line 113 */ ?>

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
                                          <?php echo LR\Filters::escapeHtmlText($shoot->device->width_px) /* line 125 */ ?>

                                          <small>×</small><?php echo LR\Filters::escapeHtmlText($shoot->device->height_px) /* line 126 */ ?>

                                          <small>px</small>
                                          <br>
                                          <?php echo LR\Filters::escapeHtmlText($shoot->device->width_dp) /* line 129 */ ?>

                                          <small>×</small><?php echo LR\Filters::escapeHtmlText($shoot->device->height_dp) /* line 130 */ ?>

                                          <small>dp</small>
                                       </strong>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>Aspect ratio</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->device->aspect_ratio) /* line 137 */ ?></strong></td>
                                 </tr>
                                 <tr>
                                    <td>Density</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->number, $shoot->device->density, 1)) /* line 141 */ ?></strong></td>
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
                                       <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->other_width) /* line 153 */ ?>

                                             <small>px</small>
                                          </strong></td>
                                    </tr>
                                    <tr>
                                       <td>Custom height</td>
                                       <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->other_height == null ? 'MAX' : $shoot->other_height) /* line 159 */ ?>

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
                                          <strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_viewport_width == null ? 0 : $shoot->crop_viewport_width) /* line 175 */ ?>

                                             <small>px</small>
                                          </strong></td>
                                    </tr>
                                    <tr>
                                       <td>Viewport height</td>
                                       <td>
                                          <strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_viewport_height == null ? 0 : $shoot->crop_viewport_height) /* line 182 */ ?>

                                             <small>px</small>
                                          </strong></td>
                                    </tr>
                                    <tr>
                                       <td>Top</td>
                                       <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_top == null ? 0 : $shoot->crop_top) /* line 188 */ ?>

                                             <small>px</small>
                                          </strong></td>
                                    </tr>
                                    <tr>
                                       <td>Left</td>
                                       <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_left == null ? 0 : $shoot->crop_left) /* line 194 */ ?>

                                             <small>px</small>
                                          </strong></td>
                                    </tr>
                                    <tr>
                                       <td>Crop width</td>
                                       <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_width == null ? 0 : $shoot->crop_width) /* line 200 */ ?>

                                             <small>px</small>
                                          </strong></td>
                                    </tr>
                                    <tr>
                                       <td>Crop height</td>
                                       <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_height == null ? 0 : $shoot->crop_height) /* line 206 */ ?>

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
                                 <td><strong><a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 218 */ ?>" target="_blank"><?php
					echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 218 */ ?></a></strong>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Engine</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->engine)) /* line 223 */ ?></strong></td>
                              </tr>
                              <tr>
                                 <td>Browser</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->browser_name)) /* line 227 */ ?> <?php
					echo LR\Filters::escapeHtmlText($shoot->browser_version) /* line 227 */ ?></strong></td>
                              </tr>
                              <tr>
                                 <td>Image type</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $shoot->img_type)) /* line 231 */ ?></strong></td>
                              </tr>
                              <tr>
                                 <td>Created</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $shoot->date, 'd.n.Y H:i:s')) /* line 235 */ ?></strong></td>
                              </tr>
                              <tr>
                                 <td>
                                    <a class="btn btn-primary btn-outline-primary" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("download!", [$shoot->id_shoot])) ?>">
                                       <i class="fa fa-download"></i>
                                       Download
                                    </a>
                                 </td>
<?php
					if ($roleAdmin) {
?>
                                    <td>
                                       <a class="btn btn-danger btn-outline-danger"
                                                                            data-confirm="Are you sure to delete this shoot?" href="<?php
						echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("delete!", [$shoot->id_shoot])) ?>">
                                          <i class="fa fa-trash"></i>
                                          Delete
                                       </a>
                                    </td>
<?php
					}
?>
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
                  There is now shoots yet. <strong><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Shoot:add")) ?>">Make new here</a></strong>
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
                     <div class="col-xs-12 col-sm-6 col-md-4">
                        <div class="shoot-item view-md">
                           <div class="row">
                              <div class="col-xs-12">
                                 <h3>
                                    <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 279 */ ?>" target="_blank"><?php
					echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 279 */ ?></a>
                                 </h3>
                              </div>
                              <div class="col-xs-12">
                                 <div class="image">
                                    <a href="<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 284 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 284 */ ?>" class="shoot-thumbnail"
                                       data-toggle="lightbox"
                                       data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 286 */ ?>">
                                       <img class="img-thumbnail img-responsive" src="<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 287 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 287 */ ?>"
                                            alt="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 288 */ ?>">
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
                  There is now shoots yet. <strong><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Shoot:add")) ?>">Make new here</a></strong>
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
                                 <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 313 */ ?>" target="_blank"><?php
					echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 313 */ ?></a>
                              </h3>
                           </div>
                           <div class="col-xs-12">
                              <div class="image">
                                 <a href="<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 318 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 318 */ ?>" class="shoot-thumbnail" data-toggle="lightbox"
                                    data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 319 */ ?>">
                                    <img class="img-thumbnail img-responsive" src="<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 320 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 320 */ ?>"
                                         alt="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 321 */ ?>">
                                 </a>
                              </div>
                           </div>
                           <div class="col-xs-12">
                              <table class="table">
                                 <tr>
                                    <td>URL</td>
                                    <td><strong><a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 329 */ ?>"
                                                   target="_blank"><?php echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 330 */ ?></a></strong>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>Engine</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->engine)) /* line 335 */ ?></strong></td>
                                 </tr>
                                 <tr>
                                    <td>Browser</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->browser_name)) /* line 339 */ ?> <?php
					echo LR\Filters::escapeHtmlText($shoot->browser_version) /* line 339 */ ?></strong></td>
                                 </tr>
                                 <tr>
                                    <td>Image type</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $shoot->img_type)) /* line 343 */ ?></strong></td>
                                 </tr>
                                 <tr>
                                    <td>Created</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $shoot->date, 'd.n.Y H:i:s')) /* line 347 */ ?></strong></td>
                                 </tr>
                                 <tr>
                                    <td>
                                       <a
                                             class="btn btn-primary btn-outline-primary" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("download!", [$shoot->id_shoot])) ?>">
                                          <i class="fa fa-download"></i>
                                          Download
                                       </a>
                                    </td>
<?php
					if ($roleAdmin) {
?>
                                       <td>
                                          <a class="btn btn-danger btn-outline-danger"
                                                                               data-confirm="Are you sure to delete this shoot?" href="<?php
						echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("delete!", [$shoot->id_shoot])) ?>">
                                             <i class="fa fa-trash"></i>
                                             Delete
                                          </a>
                                       </td>
<?php
					}
?>
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
                  There is now shoots yet. <strong><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Shoot:add")) ?>">Make new here</a></strong>
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
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 403 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 403 */ ?>" class="shoot-thumbnail"
                                       data-toggle="lightbox"
                                       data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 405 */ ?>">
                                       <img class="img-thumbnail img-responsive" src="<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 406 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 406 */ ?>"
                                            alt="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 407 */ ?>">
                                    </a>
                                 </div>
                              </td>
                              <td data-title="URL" data-url>
                                 <strong><a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 412 */ ?>" target="_blank"><?php
					echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 412 */ ?></a></strong>
                              </td>
                              <td data-title="Engine">
                                 <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->engine)) /* line 415 */ ?>

                              </td>
                              <td data-title="Browser">
                                 <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->browser_name)) /* line 418 */ ?> <?php
					echo LR\Filters::escapeHtmlText($shoot->browser_version) /* line 418 */ ?>

                              </td>
                              <td data-title="Image type">
                                 <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $shoot->img_type)) /* line 421 */ ?>

                              </td>
                              <td data-title="Created">
                                 <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $shoot->date, 'd.n.Y H:i:s')) /* line 424 */ ?>

                              </td>
                              <td data-title="Action">
                                 <a class="btn btn-primary btn-outline-primary btn-sm" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("download!", [$shoot->id_shoot])) ?>">
                                    <i class="fa fa-download"></i>
                                    Download
                                 </a>
<?php
					if ($roleAdmin) {
?>
                                    <a class="btn btn-danger btn-outline-danger btn-sm"
                                                                         data-confirm="Are you sure to delete this shoot?" href="<?php
						echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("delete!", [$shoot->id_shoot])) ?>">
                                       <i class="fa fa-trash"></i>
                                       Delete
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
                  There is now shoots yet. <strong><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Shoot:add")) ?>">Make new here</a></strong>
               </div>
<?php
			}
?>

<?php
		}
		$this->global->snippetDriver->leave();
		
	}

}
