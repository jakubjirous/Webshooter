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
		if (isset($this->params['shoot'])) trigger_error('Variable $shoot overwritten in foreach on line 64, 261, 288, 368');
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
			$iterations = 0;
			foreach ($iterator = $this->global->its[] = new LR\CachingIterator($shoots) as $shoot) {
?>
               <div class="shoot-item view-lg">
                  <div class="row">
                     <div class="col-xs-12">
                        <h3>
                           <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 69 */ ?>" target="_blank"><?php
				echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 69 */ ?></a>
                        </h3>
                     </div>
                     <div class="col-xs-12 col-md-4">
                        <div class="image">
                           <a href="<?php
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 74 */;
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 74 */ ?>" class="shoot-thumbnail" data-toggle="lightbox"
                              data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 75 */ ?>">
                              <img class="img-thumbnail img-responsive" src="<?php
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 76 */;
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 76 */ ?>"
                                   alt="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 77 */ ?>">
                           </a>
                        </div>
                     </div>
                     <div class="col-xs-12 col-md-4">
                        <table class="table">
                           <tr>
                              <td>URL</td>
                              <td><strong><a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 85 */ ?>" target="_blank"><?php
				echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 85 */ ?></a></strong>
                              </td>
                           </tr>
                           <tr>
                              <td>Engine</td>
                              <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->engine)) /* line 90 */ ?></strong></td>
                           </tr>
                           <tr>
                              <td>Image type</td>
                              <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $shoot->img_type)) /* line 94 */ ?></strong></td>
                           </tr>
                           <tr>
                              <td>Created</td>
                              <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $shoot->date, 'd.n.Y H:i:s')) /* line 98 */ ?></strong></td>
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
                     <div class="col-xs-12 col-md-4">
<?php
				if ($shoot->device != null) {
?>
                           <table class="table">
                              <tr>
                                 <td>Device type</td>
                                 <td>
                                    <strong title="<?php echo LR\Filters::escapeHtmlAttr($shoot->device->type->type) /* line 125 */ ?>">
                                       <i class="fa fa-<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->lower, $shoot->device->type->type)) /* line 126 */ ?>"></i>
                                    </strong>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Device</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->device->device) /* line 132 */ ?></strong></td>
                              </tr>
                              <tr>
                                 <td>Platform</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->device->platform) /* line 136 */ ?></strong></td>
                              </tr>
                              <tr>
                                 <td>Screen dimensions</td>
                                 <td>
                                    <strong>
                                       <?php echo LR\Filters::escapeHtmlText($shoot->device->screen_in) /* line 142 */ ?>

                                       <small>in</small> <?php echo LR\Filters::escapeHtmlText($shoot->device->screen_width_in) /* line 143 */ ?>

                                       <small>×</small><?php echo LR\Filters::escapeHtmlText($shoot->device->screen_height_in) /* line 144 */ ?>

                                       <small>in</small>
                                       <br>
                                       <?php echo LR\Filters::escapeHtmlText($shoot->device->screen_cm) /* line 147 */ ?>

                                       <small>cm</small>
                                       <?php echo LR\Filters::escapeHtmlText($shoot->device->screen_width_cm) /* line 149 */ ?>

                                       <small>×</small><?php echo LR\Filters::escapeHtmlText($shoot->device->screen_height_cm) /* line 150 */ ?>

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
                                       <?php echo LR\Filters::escapeHtmlText($shoot->device->width_px) /* line 162 */ ?>

                                       <small>×</small><?php echo LR\Filters::escapeHtmlText($shoot->device->height_px) /* line 163 */ ?>

                                       <small>px</small>
                                       <br>
                                       <?php echo LR\Filters::escapeHtmlText($shoot->device->width_dp) /* line 166 */ ?>

                                       <small>×</small><?php echo LR\Filters::escapeHtmlText($shoot->device->height_dp) /* line 167 */ ?>

                                       <small>dp</small>
                                    </strong>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Aspect ratio</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->device->aspect_ratio) /* line 174 */ ?></strong></td>
                              </tr>
                              <tr>
                                 <td>Density</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->number, $shoot->device->density, 1)) /* line 178 */ ?></strong></td>
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
                                    <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->other_width) /* line 190 */ ?>

                                          <small>px</small>
                                       </strong></td>
                                 </tr>
                                 <tr>
                                    <td>Custom height</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->other_height == null ? 'MAX' : $shoot->other_height) /* line 196 */ ?>

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
                                    <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_viewport_width == null ? 0 : $shoot->crop_viewport_width) /* line 211 */ ?>

                                          <small>px</small>
                                       </strong></td>
                                 </tr>
                                 <tr>
                                    <td>Viewport height</td>
                                    <td>
                                       <strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_viewport_height == null ? 0 : $shoot->crop_viewport_height) /* line 218 */ ?>

                                          <small>px</small>
                                       </strong></td>
                                 </tr>
                                 <tr>
                                    <td>Top</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_top == null ? 0 : $shoot->crop_top) /* line 224 */ ?>

                                          <small>px</small>
                                       </strong></td>
                                 </tr>
                                 <tr>
                                    <td>Left</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_left == null ? 0 : $shoot->crop_left) /* line 230 */ ?>

                                          <small>px</small>
                                       </strong></td>
                                 </tr>
                                 <tr>
                                    <td>Crop width</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_width == null ? 0 : $shoot->crop_width) /* line 236 */ ?>

                                          <small>px</small>
                                       </strong></td>
                                 </tr>
                                 <tr>
                                    <td>Crop height</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_height == null ? 0 : $shoot->crop_height) /* line 242 */ ?>

                                          <small>px</small>
                                       </strong></td>
                                 </tr>
                              </table>
<?php
					}
				}
?>
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
?>

<?php
		}
		elseif ($view == $viewMD) {
?>

            <div class="row">
<?php
			$iterations = 0;
			foreach ($shoots as $shoot) {
?>
                  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                     <div class="shoot-item view-md">
                        <div class="row">
                           <div class="col-xs-12">
                              <h3>
                                 <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 267 */ ?>" target="_blank"><?php
				echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 267 */ ?></a>
                              </h3>
                           </div>
                           <div class="col-xs-12">
                              <div class="image">
                                 <a href="<?php
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 272 */;
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 272 */ ?>" class="shoot-thumbnail" data-toggle="lightbox"
                                    data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 273 */ ?>">
                                    <img class="img-thumbnail img-responsive" src="<?php
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 274 */;
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 274 */ ?>"
                                         alt="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 275 */ ?>">
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
		elseif ($view == $viewSM) {
?>

            <div class="row">
<?php
			$iterations = 0;
			foreach ($shoots as $shoot) {
?>
                  <div class="col-xs-12 col-sm-6 col-md-4 col-lg-3">
                     <div class="shoot-item view-sm">
                        <div class="row">
                           <div class="col-xs-12">
                              <h3>
                                 <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 294 */ ?>" target="_blank"><?php
				echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 294 */ ?></a>
                              </h3>
                           </div>
                           <div class="col-xs-12">
                              <div class="image">
                                 <a href="<?php
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 299 */;
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 299 */ ?>" class="shoot-thumbnail" data-toggle="lightbox"
                                    data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 300 */ ?>">
                                    <img class="img-thumbnail img-responsive" src="<?php
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 301 */;
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 301 */ ?>"
                                         alt="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 302 */ ?>">
                                 </a>
                              </div>
                           </div>
                           <div class="col-xs-12">
                              <table class="table">
                                 <tr>
                                    <td>URL</td>
                                    <td><strong><a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 310 */ ?>"
                                                   target="_blank"><?php echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 311 */ ?></a></strong>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>Engine</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->engine)) /* line 316 */ ?></strong></td>
                                 </tr>
                                 <tr>
                                    <td>Image type</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $shoot->img_type)) /* line 320 */ ?></strong></td>
                                 </tr>
                                 <tr>
                                    <td>Created</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $shoot->date, 'd.n.Y H:i:s')) /* line 324 */ ?></strong></td>
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
		elseif ($view == $viewXS) {
?>

            <div class="row">
               <div class="col-xs-12">
                  <div class="shoot-item view-xs">
                     <table class="table">
                        <thead>
                        <tr>
                           <th>Shoot</th>
                           <th>URL</th>
                           <th>Engine</th>
                           <th>Image type</th>
                           <th>Created</th>
                        </tr>
                        </thead>
                        <tbody>
<?php
			$iterations = 0;
			foreach ($shoots as $shoot) {
?>
                           <tr>
                              <td>
                                 <div class="image">
                                    <a href="<?php
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 372 */;
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 372 */ ?>" class="shoot-thumbnail"
                                       data-toggle="lightbox"
                                       data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 374 */ ?>">
                                       <img class="img-thumbnail img-responsive" src="<?php
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 375 */;
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 375 */ ?>"
                                            alt="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 376 */ ?>">
                                    </a>
                                 </div>
                              </td>
                              <td>
                                 <strong><a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 381 */ ?>" target="_blank"><?php
				echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 381 */ ?></a></strong>
                              </td>
                              <td>
                                 <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->engine)) /* line 384 */ ?>

                              </td>
                              <td>
                                 <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $shoot->img_type)) /* line 387 */ ?>

                              </td>
                              <td>
                                 <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $shoot->date, 'd.n.Y H:i:s')) /* line 390 */ ?>

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
		$this->global->snippetDriver->leave();
		
	}

}
