<?php
// source: C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\WS\app\FrontModule\presenters/templates/Shoot/settings.latte

use Latte\Runtime as LR;

class Templateb89302296d extends Latte\Runtime\Template
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
		if (isset($this->params['shoot'])) trigger_error('Variable $shoot overwritten in foreach on line 35');
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

<?php
		$iterations = 0;
		foreach ($iterator = $this->global->its[] = new LR\CachingIterator($shoots) as $shoot) {
?>
            <div class="shoot-item">
               <div class="row">
                  <div class="col-xs-12">
                     <h3>
                        <a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 40 */ ?>" target="_blank"><?php
			echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 40 */ ?></a>
                     </h3>
                  </div>
                  <div class="col-xs-12 col-md-4">
                     <div class="image">
                        <a href="<?php
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 45 */;
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 45 */ ?>" class="shoot-thumbnail" data-toggle="lightbox"
                           data-parent="" data-gallery="#shoots" data-title="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 46 */ ?>">
                           <img class="img-thumbnail img-responsive" src="<?php
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 47 */;
			echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->path_img)) /* line 47 */ ?>"
                                alt="<?php echo LR\Filters::escapeHtmlAttr($shoot->url_autority) /* line 48 */ ?>">
                        </a>
                     </div>
                  </div>
                  <div class="col-xs-12 col-md-4">
                     <table class="table">
                        <tr>
                           <td>URL</td>
                           <td><strong><a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($shoot->url)) /* line 56 */ ?>" target="_blank"><?php
			echo LR\Filters::escapeHtmlText($shoot->url_autority) /* line 56 */ ?></a></strong></td>
                        </tr>
                        <tr>
                           <td>Created</td>
                           <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $shoot->date, 'd.n.Y H:i:s')) /* line 60 */ ?></strong></td>
                        </tr>
                        <tr>
                           <td>Engine</td>
                           <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $shoot->engine)) /* line 64 */ ?></strong></td>
                        </tr>
                        <tr>
                           <td>Image type</td>
                           <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $shoot->img_type)) /* line 68 */ ?></strong></td>
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
                                 <strong title="<?php echo LR\Filters::escapeHtmlAttr($shoot->device->type->type) /* line 95 */ ?>">
                                    <i class="fa fa-<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->lower, $shoot->device->type->type)) /* line 96 */ ?>"></i>
                                 </strong>
                              </td>
                           </tr>
                           <tr>
                              <td>Device</td>
                              <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->device->device) /* line 102 */ ?></strong></td>
                           </tr>
                           <tr>
                              <td>Platform</td>
                              <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->device->platform) /* line 106 */ ?></strong></td>
                           </tr>
                           <tr>
                              <td>Screen dimensions</td>
                              <td>
                                 <strong>
                                    <?php echo LR\Filters::escapeHtmlText($shoot->device->screen_in) /* line 112 */ ?>

                                    <small>in</small> <?php echo LR\Filters::escapeHtmlText($shoot->device->screen_width_in) /* line 113 */ ?><small>×</small><?php
				echo LR\Filters::escapeHtmlText($shoot->device->screen_height_in) /* line 113 */ ?>

                                    <small>in</small>
                                    <br>
                                    <?php echo LR\Filters::escapeHtmlText($shoot->device->screen_cm) /* line 116 */ ?>

                                    <small>cm</small>
                                    <?php echo LR\Filters::escapeHtmlText($shoot->device->screen_width_cm) /* line 118 */ ?><small>×</small><?php
				echo LR\Filters::escapeHtmlText($shoot->device->screen_height_cm) /* line 118 */ ?>

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
                                    <?php echo LR\Filters::escapeHtmlText($shoot->device->width_px) /* line 130 */ ?><small>×</small><?php
				echo LR\Filters::escapeHtmlText($shoot->device->height_px) /* line 130 */ ?>

                                    <small>px</small>
                                    <br>
                                    <?php echo LR\Filters::escapeHtmlText($shoot->device->width_dp) /* line 133 */ ?><small>×</small><?php
				echo LR\Filters::escapeHtmlText($shoot->device->height_dp) /* line 133 */ ?>

                                    <small>dp</small>
                                 </strong>
                              </td>
                           </tr>
                           <tr>
                              <td>Aspect ratio</td>
                              <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->device->aspect_ratio) /* line 140 */ ?></strong></td>
                           </tr>
                           <tr>
                              <td>Density</td>
                              <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->number, $shoot->device->density, 1)) /* line 144 */ ?></strong></td>
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
                                 <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->other_width) /* line 156 */ ?>

                                       <small>px</small>
                                    </strong></td>
                              </tr>
                              <tr>
                                 <td>Custom height</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->other_height == null ? 'MAX' : $shoot->other_height) /* line 162 */ ?>

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
                                 <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_viewport_width == null ? 0 : $shoot->crop_viewport_width) /* line 177 */ ?>

                                       <small>px</small>
                                    </strong></td>
                              </tr>
                              <tr>
                                 <td>Viewport height</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_viewport_height == null ? 0 : $shoot->crop_viewport_height) /* line 183 */ ?>

                                       <small>px</small>
                                    </strong></td>
                              </tr>
                              <tr>
                                 <td>Top</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_top == null ? 0 : $shoot->crop_top) /* line 189 */ ?>

                                       <small>px</small>
                                    </strong></td>
                              </tr>
                              <tr>
                                 <td>Left</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_left == null ? 0 : $shoot->crop_left) /* line 195 */ ?>

                                       <small>px</small>
                                    </strong></td>
                              </tr>
                              <tr>
                                 <td>Crop width</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_width == null ? 0 : $shoot->crop_width) /* line 201 */ ?>

                                       <small>px</small>
                                    </strong></td>
                              </tr>
                              <tr>
                                 <td>Crop height</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText($shoot->crop_height == null ? 0 : $shoot->crop_height) /* line 207 */ ?>

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
