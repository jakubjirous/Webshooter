<?php
// source: C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\WS\app\FrontModule\presenters/templates/Shoot/list.latte

use Latte\Runtime as LR;

class Template96ad847d5d extends Latte\Runtime\Template
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
		if (isset($this->params['shoot'])) trigger_error('Variable $shoot overwritten in foreach on line 21');
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

<?php
		$iterations = 0;
		foreach ($iterator = $this->global->its[] = new LR\CachingIterator($shoots) as $shoot) {
?>
            <div class="shoot-item">
               <div class="row">
                  <div class="col-xs-12">
                     <h3>
                        <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 26 */ ?>" target="_blank"><?php
			echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 26 */ ?></a>
                     </h3>
                  </div>
                  <div class="col-xs-12 col-md-4">
                     <div class="image">
                        <a href="<?php
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 31 */;
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 31 */ ?>" class="shoot-thumbnail" data-toggle="lightbox"
                           data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 32 */ ?>">
                           <img class="img-thumbnail img-responsive" src="<?php
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 33 */;
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 33 */ ?>"
                                alt="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 34 */ ?>">
                        </a>
                     </div>
                  </div>
                  <div class="col-xs-12 col-md-4">
                     <table class="table">
                        <tr>
                           <td>URL</td>
                           <td><strong><a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 42 */ ?>" target="_blank"><?php
			echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 42 */ ?></a></strong></td>
                        </tr>
                        <tr>
                           <td>Created</td>
                           <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $shoot->date, 'd.n.Y H:i:s')) /* line 46 */ ?></strong></td>
                        </tr>
                        <tr>
                           <td>Engine</td>
                           <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->engine)) /* line 50 */ ?></strong></td>
                        </tr>
                        <tr>
                           <td>Image type</td>
                           <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $shoot->img_type)) /* line 54 */ ?></strong></td>
                        </tr>
                        <tr>
                           <td>
                              <a class="btn btn-primary btn-outline-primary" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("download!", [$shoot->id_shoot])) ?>">
                                 <i class="fa fa-download"></i>
                                 Download
                              </a>
                           </td>
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
                                 <strong title="<?php echo LR\Filters::escapeHtmlAttr($shoot->device->type->type) /* line 72 */ ?>">
                                    <i class="fa fa-<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->lower, $shoot->device->type->type)) /* line 73 */ ?>"></i>
                                 </strong>
                              </td>
                           </tr>
                           <tr>
                              <td>Device</td>
                              <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->device->device) /* line 79 */ ?></strong></td>
                           </tr>
                           <tr>
                              <td>Platform</td>
                              <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->device->platform) /* line 83 */ ?></strong></td>
                           </tr>
                           <tr>
                              <td>Screen dimensions</td>
                              <td>
                                 <strong>
                                    <?php echo LR\Filters::escapeHtmlText($shoot->device->screen_in) /* line 89 */ ?>

                                    <small>in</small> <?php echo LR\Filters::escapeHtmlText($shoot->device->screen_width_in) /* line 90 */ ?><small>×</small><?php
				echo LR\Filters::escapeHtmlText($shoot->device->screen_height_in) /* line 90 */ ?>

                                    <small>in</small>
                                    <br>
                                    <?php echo LR\Filters::escapeHtmlText($shoot->device->screen_cm) /* line 93 */ ?>

                                    <small>cm</small>
                                    <?php echo LR\Filters::escapeHtmlText($shoot->device->screen_width_cm) /* line 95 */ ?><small>×</small><?php
				echo LR\Filters::escapeHtmlText($shoot->device->screen_height_cm) /* line 95 */ ?>

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
                                    <?php echo LR\Filters::escapeHtmlText($shoot->device->width_px) /* line 107 */ ?><small>×</small><?php
				echo LR\Filters::escapeHtmlText($shoot->device->height_px) /* line 107 */ ?>

                                    <small>px</small>
                                    <br>
                                    <?php echo LR\Filters::escapeHtmlText($shoot->device->width_dp) /* line 110 */ ?><small>×</small><?php
				echo LR\Filters::escapeHtmlText($shoot->device->height_dp) /* line 110 */ ?>

                                    <small>dp</small>
                                 </strong>
                              </td>
                           </tr>
                           <tr>
                              <td>Aspect ratio</td>
                              <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->device->aspect_ratio) /* line 117 */ ?></strong></td>
                           </tr>
                           <tr>
                              <td>Density</td>
                              <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->number, $shoot->device->density, 1)) /* line 121 */ ?></strong></td>
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
                                 <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->other_width) /* line 133 */ ?>

                                       <small>px</small>
                                    </strong></td>
                              </tr>
                              <tr>
                                 <td>Custom height</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->other_height == null ? 'MAX' : $shoot->other_height) /* line 139 */ ?>

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
                                 <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_viewport_width == null ? 0 : $shoot->crop_viewport_width) /* line 154 */ ?>

                                       <small>px</small>
                                    </strong></td>
                              </tr>
                              <tr>
                                 <td>Viewport height</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_viewport_height == null ? 0 : $shoot->crop_viewport_height) /* line 160 */ ?>

                                       <small>px</small>
                                    </strong></td>
                              </tr>
                              <tr>
                                 <td>Top</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_top == null ? 0 : $shoot->crop_top) /* line 166 */ ?>

                                       <small>px</small>
                                    </strong></td>
                              </tr>
                              <tr>
                                 <td>Left</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_left == null ? 0 : $shoot->crop_left) /* line 172 */ ?>

                                       <small>px</small>
                                    </strong></td>
                              </tr>
                              <tr>
                                 <td>Crop width</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_width == null ? 0 : $shoot->crop_width) /* line 178 */ ?>

                                       <small>px</small>
                                    </strong></td>
                              </tr>
                              <tr>
                                 <td>Crop height</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_height == null ? 0 : $shoot->crop_height) /* line 184 */ ?>

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

      </div>
   </div>
<?php
	}

}
