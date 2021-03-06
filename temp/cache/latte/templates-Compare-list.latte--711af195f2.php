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
		if (isset($this->params['similar'])) trigger_error('Variable $similar overwritten in foreach on line 257, 509, 617, 776');
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
?>      <h1>Select comparison</h1>
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
            <li class="breadcrumb-item active">Select comparison</li>
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
               <div class="row">
                  <div class="col-xs-12">
                     <div class="compare-item compare-source view-lg">
                        <div class="row">
                           <div class="col-xs-12">
                              <h4>Source shoot</h4>
                              <h3>
                                 <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 58 */ ?>" target="_blank"><?php
			echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 58 */ ?></a>
                              </h3>
                           </div>
                           <div class="col-xs-12 col-lg-4">
                              <div class="image">
                                 <a href="<?php
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 63 */;
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 63 */ ?>" class="shoot-thumbnail" data-toggle="lightbox"
                                    data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 64 */ ?>">
                                    <img class="img-thumbnail img-responsive" src="<?php
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 65 */;
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 65 */ ?>"
                                         alt="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 66 */ ?>">
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
                                          <strong title="<?php echo LR\Filters::escapeHtmlAttr($shoot->device->type->type) /* line 76 */ ?>">
                                             <i class="fa fa-<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->lower, $shoot->device->type->type)) /* line 77 */ ?>"></i>
                                          </strong>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>Device</td>
                                       <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->device->device) /* line 83 */ ?></strong></td>
                                    </tr>
                                    <tr>
                                       <td>Platform</td>
                                       <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->device->platform) /* line 87 */ ?></strong></td>
                                    </tr>
                                    <tr>
                                       <td>Screen dimensions</td>
                                       <td>
                                          <strong>
                                             <?php echo LR\Filters::escapeHtmlText($shoot->device->screen_in) /* line 93 */ ?>

                                             <small>in</small> <?php echo LR\Filters::escapeHtmlText($shoot->device->screen_width_in) /* line 94 */ ?>

                                             <small>×</small><?php echo LR\Filters::escapeHtmlText($shoot->device->screen_height_in) /* line 95 */ ?>

                                             <small>in</small>
                                             <br>
                                             <?php echo LR\Filters::escapeHtmlText($shoot->device->screen_cm) /* line 98 */ ?>

                                             <small>cm</small>
                                             <?php echo LR\Filters::escapeHtmlText($shoot->device->screen_width_cm) /* line 100 */ ?>

                                             <small>×</small><?php echo LR\Filters::escapeHtmlText($shoot->device->screen_height_cm) /* line 101 */ ?>

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
                                             <?php echo LR\Filters::escapeHtmlText($shoot->device->width_px) /* line 113 */ ?>

                                             <small>×</small><?php echo LR\Filters::escapeHtmlText($shoot->device->height_px) /* line 114 */ ?>

                                             <small>px</small>
                                             <br>
                                             <?php echo LR\Filters::escapeHtmlText($shoot->device->width_dp) /* line 117 */ ?>

                                             <small>×</small><?php echo LR\Filters::escapeHtmlText($shoot->device->height_dp) /* line 118 */ ?>

                                             <small>dp</small>
                                          </strong>
                                       </td>
                                    </tr>
                                    <tr>
                                       <td>Aspect ratio</td>
                                       <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->device->aspect_ratio) /* line 125 */ ?></strong></td>
                                    </tr>
                                    <tr>
                                       <td>Density</td>
                                       <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->number, $shoot->device->density, 1)) /* line 129 */ ?></strong></td>
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
                                          <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->other_width) /* line 141 */ ?>

                                                <small>px</small>
                                             </strong></td>
                                       </tr>
                                       <tr>
                                          <td>Custom height</td>
                                          <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->other_height == null ? 'MAX' : $shoot->other_height) /* line 147 */ ?>

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
                                             <strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_viewport_width == null ? 0 : $shoot->crop_viewport_width) /* line 163 */ ?>

                                                <small>px</small>
                                             </strong></td>
                                       </tr>
                                       <tr>
                                          <td>Viewport height</td>
                                          <td>
                                             <strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_viewport_height == null ? 0 : $shoot->crop_viewport_height) /* line 170 */ ?>

                                                <small>px</small>
                                             </strong></td>
                                       </tr>
                                       <tr>
                                          <td>Top</td>
                                          <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_top == null ? 0 : $shoot->crop_top) /* line 176 */ ?>

                                                <small>px</small>
                                             </strong></td>
                                       </tr>
                                       <tr>
                                          <td>Left</td>
                                          <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_left == null ? 0 : $shoot->crop_left) /* line 182 */ ?>

                                                <small>px</small>
                                             </strong></td>
                                       </tr>
                                       <tr>
                                          <td>Crop width</td>
                                          <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_width == null ? 0 : $shoot->crop_width) /* line 188 */ ?>

                                                <small>px</small>
                                             </strong></td>
                                       </tr>
                                       <tr>
                                          <td>Crop height</td>
                                          <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_height == null ? 0 : $shoot->crop_height) /* line 194 */ ?>

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
                                    <td><strong><a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 206 */ ?>"
                                                   target="_blank"><?php echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 207 */ ?></a></strong>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>Engine</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->engine)) /* line 212 */ ?></strong></td>
                                 </tr>
                                 <tr>
                                    <td>Browser</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->browser_name)) /* line 216 */ ?> <?php
			echo LR\Filters::escapeHtmlText($shoot->browser_version) /* line 216 */ ?></strong>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>Image type</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $shoot->img_type)) /* line 221 */ ?></strong></td>
                                 </tr>
                                 <tr>
                                    <td>Created</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $shoot->date, 'd.m.Y H:i:s')) /* line 225 */ ?></strong></td>
                                 </tr>
                                 <tr>
                                    <td>User</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->user->username) /* line 229 */ ?></strong></td>
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

                  <div class="col-xs-12">
                     <hr class="compare">
                  </div>

                  <div class="col-xs-12">
                     <div class="compare-item compare-target view-lg">
                        <h4>Target shoots</h4>

<?php
			if ($similarShoots) {
?>

<?php
				$iterations = 0;
				foreach ($iterator = $this->global->its[] = new LR\CachingIterator($similarShoots) as $similar) {
?>
                              <div class="row">
                                 <div class="col-xs-12">
                                    <h3>
                                       <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($similar->url)) /* line 261 */ ?>" target="_blank"><?php
					echo LR\Filters::escapeHtmlText($similar->url_autority) /* line 261 */ ?></a>
                                    </h3>
                                 </div>
                                 <div class="col-xs-12 col-lg-4">
                                    <div class="image">
                                       <a href="<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 266 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($similar->path_img)) /* line 266 */ ?>" class="shoot-thumbnail"
                                          data-toggle="lightbox"
                                          data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($similar->url_autority) /* line 268 */ ?>">
                                          <img class="img-thumbnail img-responsive"
                                               src="<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 270 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($similar->path_img)) /* line 270 */ ?>"
                                               alt="<?php echo LR\Filters::escapeHtmlAttr($similar->url_autority) /* line 271 */ ?>">
                                       </a>
                                    </div>
                                 </div>
                                 <div class="col-xs-12 col-md-6 push-md-6 col-lg-4 push-lg-4">
<?php
					if ($similar->device != null) {
?>
                                       <table class="table">
                                          <tr>
                                             <td>Device type</td>
                                             <td>
                                                <strong title="<?php echo LR\Filters::escapeHtmlAttr($similar->device->type->type) /* line 281 */ ?>">
                                                   <i class="fa fa-<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->lower, $similar->device->type->type)) /* line 282 */ ?>"></i>
                                                </strong>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>Device</td>
                                             <td><strong><?php echo LR\Filters::escapeHtmlText($similar->device->device) /* line 288 */ ?></strong></td>
                                          </tr>
                                          <tr>
                                             <td>Platform</td>
                                             <td><strong><?php echo LR\Filters::escapeHtmlText($similar->device->platform) /* line 292 */ ?></strong></td>
                                          </tr>
                                          <tr>
                                             <td>Screen dimensions</td>
                                             <td>
                                                <strong>
                                                   <?php echo LR\Filters::escapeHtmlText($similar->device->screen_in) /* line 298 */ ?>

                                                   <small>in</small> <?php echo LR\Filters::escapeHtmlText($similar->device->screen_width_in) /* line 299 */ ?>

                                                   <small>×</small><?php echo LR\Filters::escapeHtmlText($similar->device->screen_height_in) /* line 300 */ ?>

                                                   <small>in</small>
                                                   <br>
                                                   <?php echo LR\Filters::escapeHtmlText($similar->device->screen_cm) /* line 303 */ ?>

                                                   <small>cm</small>
                                                   <?php echo LR\Filters::escapeHtmlText($similar->device->screen_width_cm) /* line 305 */ ?>

                                                   <small>×</small><?php echo LR\Filters::escapeHtmlText($similar->device->screen_height_cm) /* line 306 */ ?>

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
                                                   <?php echo LR\Filters::escapeHtmlText($similar->device->width_px) /* line 318 */ ?>

                                                   <small>×</small><?php echo LR\Filters::escapeHtmlText($similar->device->height_px) /* line 319 */ ?>

                                                   <small>px</small>
                                                   <br>
                                                   <?php echo LR\Filters::escapeHtmlText($similar->device->width_dp) /* line 322 */ ?>

                                                   <small>×</small><?php echo LR\Filters::escapeHtmlText($similar->device->height_dp) /* line 323 */ ?>

                                                   <small>dp</small>
                                                </strong>
                                             </td>
                                          </tr>
                                          <tr>
                                             <td>Aspect ratio</td>
                                             <td><strong><?php echo LR\Filters::escapeHtmlText($similar->device->aspect_ratio) /* line 330 */ ?></strong></td>
                                          </tr>
                                          <tr>
                                             <td>Density</td>
                                             <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->number, $similar->device->density, 1)) /* line 334 */ ?></strong></td>
                                          </tr>
                                       </table>
<?php
					}
					else {
						if ($similar->other_width != null) {
?>
                                          <table class="table">
                                             <tr>
                                                <td>Type</td>
                                                <td><strong title="Custom"><i class="fa fa-cogs"></i></strong></td>
                                             </tr>
                                             <tr>
                                                <td>Custom width</td>
                                                <td><strong><?php echo LR\Filters::escapeHtmlText($similar->other_width) /* line 346 */ ?>

                                                      <small>px</small>
                                                   </strong></td>
                                             </tr>
                                             <tr>
                                                <td>Custom height</td>
                                                <td>
                                                   <strong><?php echo LR\Filters::escapeHtmlText($similar->other_height == null ? 'MAX' : $similar->other_height) /* line 353 */ ?>

                                                      <small>px</small>
                                                   </strong></td>
                                             </tr>
                                          </table>
<?php
						}
?>

<?php
						if ($similar->crop_viewport_width != null and $similar->crop_viewport_height != null) {
?>
                                          <table class="table">
                                             <tr>
                                                <td>Type</td>
                                                <td><strong title="Crop"><i class="fa fa-crop"></i></strong></td>
                                             </tr>
                                             <tr>
                                                <td>Viewport width</td>
                                                <td>
                                                   <strong><?php echo LR\Filters::escapeHtmlText($similar->crop_viewport_width == null ? 0 : $similar->crop_viewport_width) /* line 369 */ ?>

                                                      <small>px</small>
                                                   </strong></td>
                                             </tr>
                                             <tr>
                                                <td>Viewport height</td>
                                                <td>
                                                   <strong><?php echo LR\Filters::escapeHtmlText($similar->crop_viewport_height == null ? 0 : $similar->crop_viewport_height) /* line 376 */ ?>

                                                      <small>px</small>
                                                   </strong></td>
                                             </tr>
                                             <tr>
                                                <td>Top</td>
                                                <td><strong><?php echo LR\Filters::escapeHtmlText($similar->crop_top == null ? 0 : $similar->crop_top) /* line 382 */ ?>

                                                      <small>px</small>
                                                   </strong></td>
                                             </tr>
                                             <tr>
                                                <td>Left</td>
                                                <td><strong><?php echo LR\Filters::escapeHtmlText($similar->crop_left == null ? 0 : $similar->crop_left) /* line 388 */ ?>

                                                      <small>px</small>
                                                   </strong></td>
                                             </tr>
                                             <tr>
                                                <td>Crop width</td>
                                                <td><strong><?php echo LR\Filters::escapeHtmlText($similar->crop_width == null ? 0 : $similar->crop_width) /* line 394 */ ?>

                                                      <small>px</small>
                                                   </strong></td>
                                             </tr>
                                             <tr>
                                                <td>Crop height</td>
                                                <td><strong><?php echo LR\Filters::escapeHtmlText($similar->crop_height == null ? 0 : $similar->crop_height) /* line 400 */ ?>

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
                                          <td><strong><a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($similar->url)) /* line 412 */ ?>"
                                                         target="_blank"><?php echo LR\Filters::escapeHtmlText($similar->url_autority) /* line 413 */ ?></a></strong>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>Engine</td>
                                          <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $similar->engine)) /* line 418 */ ?></strong></td>
                                       </tr>
                                       <tr>
                                          <td>Browser</td>
                                          <td>
                                             <strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $similar->browser_name)) /* line 423 */ ?> <?php
					echo LR\Filters::escapeHtmlText($similar->browser_version) /* line 423 */ ?></strong>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>Image type</td>
                                          <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $similar->img_type)) /* line 428 */ ?></strong></td>
                                       </tr>
                                       <tr>
                                          <td>Created</td>
                                          <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $similar->date, 'd.m.Y H:i:s')) /* line 432 */ ?></strong></td>
                                       </tr>
                                       <tr>
                                          <td>User</td>
                                          <td><strong><?php echo LR\Filters::escapeHtmlText($similar->user->username) /* line 436 */ ?></strong></td>
                                       </tr>
                                       <tr>
                                          <td>
                                             <a
                                                   class="btn btn-primary btn-outline-primary" href="<?php
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("download!", [$similar->id_shoot])) ?>">
                                                <i class="fa fa-download"></i>
                                                Download
                                             </a>
                                          </td>
                                          <td>
                                             <a
                                                   class="btn btn-success btn-outline-success" href="<?php
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Compare:result", [$shoot->id_shoot, $similar->id_shoot])) ?>">
                                                <i class="fa fa-exchange"></i>
                                                Compare
                                             </a>
                                          </td>
                                       </tr>
                                    </table>
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
                              There is no similar shoots with this source shoot yet.
                              <strong><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Shoot:add")) ?>">Make new here</a></strong>
                           </div>
<?php
			}
?>
                     </div>
                  </div>
               </div>

<?php
		}
		elseif ($view == $viewMD) {
?>
               <div class="row">
                  <div class="col-xs-12 col-sm-6 col-lg-4">
                     <div class="compare-item compare-source view-md">
                        <h4>Source shoot</h4>

                        <h3>
                           <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 479 */ ?>" target="_blank"><?php
			echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 479 */ ?></a>
                        </h3>

                        <div class="image">
                           <a href="<?php
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 483 */;
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 483 */ ?>" class="shoot-thumbnail" data-toggle="lightbox"
                              data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 484 */ ?>">
                              <img class="img-thumbnail img-responsive" src="<?php
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 485 */;
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 485 */ ?>"
                                   alt="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 486 */ ?>">
                           </a>
                        </div>

                        <div class="action">
                           <a class="btn btn-primary btn-outline-primary" title="Download" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("download!", [$shoot->id_shoot])) ?>">
                              <i class="fa fa-download"></i>
                           </a>
                        </div>
                     </div>
                  </div>

                  <div class="col-xs-12 hidden-sm-up">
                     <hr class="compare">
                  </div>

                  <div class="col-xs-12 col-sm-6 col-lg-8">
                     <div class="compare-item compare-target view-md">
                        <h4>Target shoots</h4>

<?php
			if ($similarShoots) {
?>

                           <div class="row">
<?php
				$iterations = 0;
				foreach ($similarShoots as $similar) {
?>
                                 <div class="col-xs-12 col-lg-6">
                                    <h3>
                                       <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($similar->url)) /* line 512 */ ?>" target="_blank"><?php
					echo LR\Filters::escapeHtmlText($similar->url_autority) /* line 512 */ ?></a>
                                    </h3>

                                    <div class="image">
                                       <a href="<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 516 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($similar->path_img)) /* line 516 */ ?>" class="shoot-thumbnail"
                                          data-toggle="lightbox"
                                          data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($similar->url_autority) /* line 518 */ ?>">
                                          <img class="img-thumbnail img-responsive"
                                               src="<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 520 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($similar->path_img)) /* line 520 */ ?>"
                                               alt="<?php echo LR\Filters::escapeHtmlAttr($similar->url_autority) /* line 521 */ ?>">
                                       </a>
                                    </div>

                                    <div class="action">
                                       <a class="btn btn-primary btn-outline-primary" title="Download" href="<?php
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("download!", [$shoot->id_shoot])) ?>">
                                          <i class="fa fa-download"></i>
                                       </a>
                                       <a
                                             class="btn btn-success btn-outline-success" title="Compare" href="<?php
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Compare:result", [$shoot->id_shoot, $similar->id_shoot])) ?>">
                                          <i class="fa fa-exchange"></i>
                                       </a>
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
                              There is no similar shoots with this source shoot yet.
                              <strong><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Shoot:add")) ?>">Make new here</a></strong>
                           </div>
<?php
			}
?>
                     </div>
                  </div>
               </div>

<?php
		}
		elseif ($view == $viewSM) {
?>

               <div class="row">
                  <div class="col-xs-12 col-sm-6 col-lg-4">
                     <div class="compare-item compare-source view-sm">
                        <h4>Source shoot</h4>

                        <h3>
                           <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 555 */ ?>" target="_blank"><?php
			echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 555 */ ?></a>
                        </h3>

                        <div class="image">
                           <a href="<?php
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 559 */;
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 559 */ ?>" class="shoot-thumbnail" data-toggle="lightbox"
                              data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 560 */ ?>">
                              <img class="img-thumbnail img-responsive" src="<?php
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 561 */;
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 561 */ ?>"
                                   alt="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 562 */ ?>">
                           </a>
                        </div>

                        <table class="table">
                           <tr>
                              <td>URL</td>
                              <td><strong><a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 569 */ ?>"
                                             target="_blank"><?php echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 570 */ ?></a></strong>
                              </td>
                           </tr>
                           <tr>
                              <td>Engine</td>
                              <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->engine)) /* line 575 */ ?></strong></td>
                           </tr>
                           <tr>
                              <td>Browser</td>
                              <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->browser_name)) /* line 579 */ ?> <?php
			echo LR\Filters::escapeHtmlText($shoot->browser_version) /* line 579 */ ?></strong></td>
                           </tr>
                           <tr>
                              <td>Image type</td>
                              <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $shoot->img_type)) /* line 583 */ ?></strong></td>
                           </tr>
                           <tr>
                              <td>Created</td>
                              <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $shoot->date, 'd.m.Y H:i:s')) /* line 587 */ ?></strong></td>
                           </tr>
                           <tr>
                              <td>User</td>
                              <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->user->username) /* line 591 */ ?></strong></td>
                           </tr>
                           <tr>
                              <td>
                                 <a
                                       class="btn btn-primary btn-outline-primary" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("download!", [$shoot->id_shoot])) ?>">
                                    <i class="fa fa-download"></i>
                                    Download
                                 </a>
                              </td>
                              <td></td>
                           </tr>
                        </table>
                     </div>
                  </div>

                  <div class="col-xs-12 hidden-sm-up">
                     <hr class="compare">
                  </div>

                  <div class="col-xs-12 col-sm-6 col-lg-8">
                     <div class="compare-item compare-target view-sm">
                        <h4>Target shoots</h4>

<?php
			if ($similarShoots) {
?>
                           <div class="row">
<?php
				$iterations = 0;
				foreach ($similarShoots as $similar) {
?>
                                 <div class="col-xs-12 col-lg-6">
                                    <h3>
                                       <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($similar->url)) /* line 620 */ ?>" target="_blank"><?php
					echo LR\Filters::escapeHtmlText($similar->url_autority) /* line 620 */ ?></a>
                                    </h3>

                                    <div class="image">
                                       <a href="<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 624 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($similar->path_img)) /* line 624 */ ?>" class="shoot-thumbnail"
                                          data-toggle="lightbox"
                                          data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($similar->url_autority) /* line 626 */ ?>">
                                          <img class="img-thumbnail img-responsive"
                                               src="<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 628 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($similar->path_img)) /* line 628 */ ?>"
                                               alt="<?php echo LR\Filters::escapeHtmlAttr($similar->url_autority) /* line 629 */ ?>">
                                       </a>
                                    </div>

                                    <table class="table">
                                       <tr>
                                          <td>URL</td>
                                          <td><strong><a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($similar->url)) /* line 636 */ ?>"
                                                         target="_blank"><?php echo LR\Filters::escapeHtmlText($similar->url_autority) /* line 637 */ ?></a></strong>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>Engine</td>
                                          <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $similar->engine)) /* line 642 */ ?></strong></td>
                                       </tr>
                                       <tr>
                                          <td>Browser</td>
                                          <td>
                                             <strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $similar->browser_name)) /* line 647 */ ?> <?php
					echo LR\Filters::escapeHtmlText($similar->browser_version) /* line 647 */ ?></strong>
                                          </td>
                                       </tr>
                                       <tr>
                                          <td>Image type</td>
                                          <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $similar->img_type)) /* line 652 */ ?></strong></td>
                                       </tr>
                                       <tr>
                                          <td>Created</td>
                                          <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $similar->date, 'd.m.Y H:i:s')) /* line 656 */ ?></strong></td>
                                       </tr>
                                       <tr>
                                          <td>User</td>
                                          <td><strong><?php echo LR\Filters::escapeHtmlText($similar->user->username) /* line 660 */ ?></strong></td>
                                       </tr>
                                       <tr>
                                          <td>
                                             <a
                                                   class="btn btn-primary btn-outline-primary" href="<?php
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("download!", [$similar->id_shoot])) ?>">
                                                <i class="fa fa-download"></i>
                                                Download
                                             </a>
                                          </td>
                                          <td>
                                             <a
                                                   class="btn btn-success btn-outline-success" href="<?php
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Compare:result", [$shoot->id_shoot, $similar->id_shoot])) ?>">
                                                <i class="fa fa-exchange"></i>
                                                Compare
                                             </a>
                                          </td>
                                       </tr>
                                    </table>
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
                              There is no similar shoots with this source shoot yet.
                              <strong><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Shoot:add")) ?>">Make new here</a></strong>
                           </div>
<?php
			}
?>
                     </div>
                  </div>
               </div>

<?php
		}
		elseif ($view == $viewXS) {
?>

               <div class="row">
                  <div class="col-xs-12">
                     <div class="compare-item compare-source view-xs">
                        <h4>Source shoot</h4>

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
                           <tr>
                              <td data-title="Shoot" data-shoot>
                                 <div class="image">
                                    <a href="<?php
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 716 */;
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 716 */ ?>" class="shoot-thumbnail"
                                       data-toggle="lightbox"
                                       data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 718 */ ?>">
                                       <img class="img-thumbnail img-responsive" src="<?php
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 719 */;
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 719 */ ?>"
                                            alt="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 720 */ ?>">
                                    </a>
                                 </div>
                              </td>
                              <td data-title="URL" data-url>
                                 <strong><a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 725 */ ?>" target="_blank"><?php
			echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 725 */ ?></a></strong>
                              </td>
                              <td data-title="Engine">
                                 <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->engine)) /* line 728 */ ?>

                              </td>
                              <td data-title="Browser">
                                 <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->browser_name)) /* line 731 */ ?> <?php
			echo LR\Filters::escapeHtmlText($shoot->browser_version) /* line 731 */ ?>

                              </td>
                              <td data-title="Image type">
                                 <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $shoot->img_type)) /* line 734 */ ?>

                              </td>
                              <td data-title="Created">
                                 <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $shoot->date, 'd.m.Y H:i:s')) /* line 737 */ ?>

                              </td>
                              <td data-title="User">
                                 <?php echo LR\Filters::escapeHtmlText($shoot->user->username) /* line 740 */ ?>

                              </td>
                              <td data-title="Action">
                                 <a
                                       class="btn btn-primary btn-outline-primary btn-sm" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("download!", [$shoot->id_shoot])) ?>">
                                    <i class="fa fa-download"></i>
                                    Download
                                 </a>
                              </td>
                           </tr>
                           </tbody>
                        </table>
                     </div>
                  </div>
               </div>

               <div class="row">
                  <div class="col-xs-12">
                     <div class="compare-item compare-source view-xs">
                        <h4>Target shoots</h4>

<?php
			if ($similarShoots) {
?>
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
				foreach ($similarShoots as $similar) {
?>
                                 <tr>
                                    <td data-title="Shoot" data-shoot>
                                       <div class="image">
                                          <a href="<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 780 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($similar->path_img)) /* line 780 */ ?>" class="shoot-thumbnail"
                                             data-toggle="lightbox"
                                             data-parent="" data-gallery="#shoots"
                                             data-title="<?php echo LR\Filters::escapeHtmlAttr($similar->url_autority) /* line 783 */ ?>">
                                             <img class="img-thumbnail img-responsive"
                                                  src="<?php
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 785 */;
					echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($similar->path_img)) /* line 785 */ ?>"
                                                  alt="<?php echo LR\Filters::escapeHtmlAttr($similar->url_autority) /* line 786 */ ?>">
                                          </a>
                                       </div>
                                    </td>
                                    <td data-title="URL" data-url>
                                       <strong><a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($similar->url)) /* line 791 */ ?>"
                                                  target="_blank"><?php echo LR\Filters::escapeHtmlText($similar->url_autority) /* line 792 */ ?></a></strong>
                                    </td>
                                    <td data-title="Engine">
                                       <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $similar->engine)) /* line 795 */ ?>

                                    </td>
                                    <td data-title="Browser">
                                       <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $similar->browser_name)) /* line 798 */ ?> <?php
					echo LR\Filters::escapeHtmlText($similar->browser_version) /* line 798 */ ?>

                                    </td>
                                    <td data-title="Image type">
                                       <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $similar->img_type)) /* line 801 */ ?>

                                    </td>
                                    <td data-title="Created">
                                       <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $similar->date, 'd.m.Y H:i:s')) /* line 804 */ ?>

                                    </td>
                                    <td data-title="User">
                                       <?php echo LR\Filters::escapeHtmlText($similar->user->username) /* line 807 */ ?>

                                    </td>
                                    <td data-title="Action">
                                       <a
                                             class="btn btn-success btn-outline-success btn-sm" href="<?php
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Compare:result", [$shoot->id_shoot, $similar->id_shoot])) ?>">
                                          <i class="fa fa-exchange"></i>
                                          Compare
                                       </a>
                                       <a
                                             class="btn btn-primary btn-outline-primary btn-sm" href="<?php
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("download!", [$similar->id_shoot])) ?>">
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
<?php
			}
			else {
?>
                           <div class="alert alert-info" role="alert">
                              There is no similar shoots with this source shoot yet. <strong><a href="<?php
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Shoot:add")) ?>">Make new
                                    here</a></strong>
                           </div>
<?php
			}
?>
                     </div>
                  </div>
               </div>
<?php
		}
?>

<?php
		$this->global->snippetDriver->leave();
		
	}

}
