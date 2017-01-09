<?php
// source: C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\app\FrontModule\presenters/templates/Device/list.latte

use Latte\Runtime as LR;

class Template1b12d539e2 extends Latte\Runtime\Template
{
	public $blocks = [
		'header' => 'blockHeader',
		'title' => 'blockTitle',
		'breadcrumb' => 'blockBreadcrumb',
		'content' => 'blockContent',
		'_deviceList' => 'blockDeviceList',
		'footer' => 'blockFooter',
	];

	public $blockTypes = [
		'header' => 'html',
		'title' => 'html',
		'breadcrumb' => 'html',
		'content' => 'html',
		'_deviceList' => 'html',
		'footer' => 'html',
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
?>

<?php
		$this->renderBlock('footer', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['device'])) trigger_error('Variable $device overwritten in foreach on line 224');
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
?>      <h1>Device metrics</h1>
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
      <div class="device-list">
         <div class="row">
            <div class="col-xs-12">

<div id="<?php echo htmlSpecialChars($this->global->snippetDriver->getHtmlId('deviceList')) ?>"><?php $this->renderBlock('_deviceList', $this->params) ?></div>            </div>
         </div>
      </div>
   </div>
<?php
	}


	function blockDeviceList($_args)
	{
		extract($_args);
		$this->global->snippetDriver->enter("deviceList", "static");
?>
                  <div class="row hidden-lg-up unit-switch">
                     <div class="col-xs-12 col-sm-8 text-xs-center text-sm-left">
                        <strong>Screen dimensions:</strong>
                     </div>
                     <div class="col-xs-12 col-sm-4 text-xs-center text-sm-right">
                        <div class="btn-group" role="group" aria-label="Units switching">
                           <a
                                 class="btn btn-secondary ajax<?php
		if ($unitDimension == 'cm') {
			?> active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("dimension!", ['cm'])) ?>">cm</a>
                           <a
                                 class="btn btn-secondary ajax<?php
		if ($unitDimension == 'in') {
			?> active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("dimension!", ['in'])) ?>">in</a>
                        </div>
                     </div>
                  </div>

                  <div class="row hidden-lg-up unit-switch">
                     <div class="col-xs-12 col-sm-8 text-xs-center text-sm-left">
                        <strong>Width × Height:</strong>
                     </div>
                     <div class="col-xs-12 col-sm-4 text-xs-center text-sm-right">
                        <div class="btn-group" role="group" aria-label="Units switching">
                           <a
                                 class="btn btn-secondary ajax<?php
		if ($unitSize == 'px') {
			?> active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("size!", ['px'])) ?>">px</a>
                           <a
                                 class="btn btn-secondary ajax<?php
		if ($unitSize == 'dp') {
			?> active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("size!", ['dp'])) ?>">dp</a>
                        </div>
                     </div>
                  </div>

                  <table class="table table-striped">
                     <thead>
                     <tr>
                        <th>
<?php
		if ($sortColumn == 'id_type' and $sortOrder == 'asc') {
			?>                              <a class="ajax active" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['id_type', 'desc'])) ?>">
                                 <i class="fa fa-long-arrow-down"></i>
                                 Type
                              </a>
<?php
		}
		elseif ($sortColumn == 'id_type' and $sortOrder == 'desc') {
			?>                              <a class="ajax active" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['id_type', 'asc'])) ?>">
                                 <i class="fa fa-long-arrow-up"></i>
                                 Type
                              </a>
<?php
		}
		else {
			?>                              <a class="ajax" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['id_type', 'asc'])) ?>">
                                 <i class="fa fa-long-arrow-down"></i>
                                 Type
                              </a>
<?php
		}
?>
                        </th>
                        <th>
<?php
		if ($sortColumn == 'device' and $sortOrder == 'asc') {
			?>                              <a class="ajax active" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['device', 'desc'])) ?>">
                                 <i class="fa fa-long-arrow-down"></i>
                                 Device
                              </a>
<?php
		}
		elseif ($sortColumn == 'device' and $sortOrder == 'desc') {
			?>                              <a class="ajax active" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['device', 'asc'])) ?>">
                                 <i class="fa fa-long-arrow-up"></i>
                                 Device
                              </a>
<?php
		}
		else {
			?>                              <a class="ajax" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['device', 'asc'])) ?>">
                                 <i class="fa fa-long-arrow-down"></i>
                                 Device
                              </a>
<?php
		}
?>
                        </th>
                        <th>
<?php
		if ($sortColumn == 'platform' and $sortOrder == 'asc') {
			?>                              <a class="ajax active" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['platform', 'desc'])) ?>">
                                 <i class="fa fa-long-arrow-down"></i>
                                 Platform
                              </a>
<?php
		}
		elseif ($sortColumn == 'platform' and $sortOrder == 'desc') {
			?>                              <a class="ajax active" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['platform', 'asc'])) ?>">
                                 <i class="fa fa-long-arrow-up"></i>
                                 Platform
                              </a>
<?php
		}
		else {
			?>                              <a class="ajax" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['platform', 'asc'])) ?>">
                                 <i class="fa fa-long-arrow-down"></i>
                                 Platform
                              </a>
<?php
		}
?>
                        </th>
                        <th>
<?php
		if ($unitDimension == 'cm') {
			if ($sortColumn == 'screen_cm' and $sortOrder == 'asc') {
				?>                                 <a class="ajax active" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['screen_cm', 'desc'])) ?>">
                                    <i class="fa fa-long-arrow-down"></i>
                                    Screen dimensions
                                 </a>
<?php
			}
			elseif ($sortColumn == 'screen_cm' and $sortOrder == 'desc') {
				?>                                 <a class="ajax active" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['screen_cm', 'asc'])) ?>">
                                    <i class="fa fa-long-arrow-up"></i>
                                    Screen dimensions
                                 </a>
<?php
			}
			else {
				?>                                 <a class="ajax" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['screen_cm', 'asc'])) ?>">
                                    <i class="fa fa-long-arrow-down"></i>
                                    Screen dimensions
                                 </a>
<?php
			}
		}
		elseif ($unitDimension == 'in') {
			if ($sortColumn == 'screen_in' and $sortOrder == 'asc') {
				?>                                 <a class="ajax active" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['screen_in', 'desc'])) ?>">
                                    <i class="fa fa-long-arrow-down"></i>
                                    Screen dimensions
                                 </a>
<?php
			}
			elseif ($sortColumn == 'screen_in' and $sortOrder == 'desc') {
				?>                                 <a class="ajax active" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['screen_in', 'asc'])) ?>">
                                    <i class="fa fa-long-arrow-up"></i>
                                    Screen dimensions
                                 </a>
<?php
			}
			else {
				?>                                 <a class="ajax" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['screen_in', 'asc'])) ?>">
                                    <i class="fa fa-long-arrow-down"></i>
                                    Screen dimensions
                                 </a>
<?php
			}
		}
?>

                           <a class="ajax<?php
		if ($unitDimension == 'cm') {
			?> active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("dimension!", ['cm'])) ?>">cm</a>
                           <a class="ajax<?php
		if ($unitDimension == 'in') {
			?> active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("dimension!", ['in'])) ?>">in</a>
                        </th>
                        <th>
<?php
		if ($unitSize == 'px') {
			if ($sortColumn == 'width_px' and $sortOrder == 'asc') {
				?>                                 <a class="ajax active" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['width_px', 'desc'])) ?>">
                                    <i class="fa fa-long-arrow-down"></i>
                                    Width <small>×</small> Height
                                 </a>
<?php
			}
			elseif ($sortColumn == 'width_px' and $sortOrder == 'desc') {
				?>                                 <a class="ajax active" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['width_px', 'asc'])) ?>">
                                    <i class="fa fa-long-arrow-up"></i>
                                    Width <small>×</small> Height
                                 </a>
<?php
			}
			else {
				?>                                 <a class="ajax" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['width_px', 'asc'])) ?>">
                                    <i class="fa fa-long-arrow-down"></i>
                                    Width <small>×</small> Height
                                 </a>
<?php
			}
		}
		elseif ($unitSize == 'dp') {
			if ($sortColumn == 'width_dp' and $sortOrder == 'asc') {
				?>                                 <a class="ajax active" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['width_dp', 'desc'])) ?>">
                                    <i class="fa fa-long-arrow-down"></i>
                                    Width <small>×</small> Height
                                 </a>
<?php
			}
			elseif ($sortColumn == 'width_dp' and $sortOrder == 'desc') {
				?>                                 <a class="ajax active" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['width_dp', 'asc'])) ?>">
                                    <i class="fa fa-long-arrow-up"></i>
                                    Width <small>×</small> Height
                                 </a>
<?php
			}
			else {
				?>                                 <a class="ajax" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['width_dp', 'asc'])) ?>">
                                    <i class="fa fa-long-arrow-down"></i>
                                    Width <small>×</small> Height
                                 </a>
<?php
			}
		}
?>

                           <a class="ajax<?php
		if ($unitSize == 'px') {
			?> active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("size!", ['px'])) ?>">px</a>
                           <a class="ajax<?php
		if ($unitSize == 'dp') {
			?> active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("size!", ['dp'])) ?>">dp</a>
                        </th>
                        <th>
<?php
		if ($sortColumn == 'aspect_ratio' and $sortOrder == 'asc') {
			?>                              <a class="ajax active" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['aspect_ratio', 'desc'])) ?>">
                                 <i class="fa fa-long-arrow-down"></i>
                                 Aspect ratio
                              </a>
<?php
		}
		elseif ($sortColumn == 'aspect_ratio' and $sortOrder == 'desc') {
			?>                              <a class="ajax active" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['aspect_ratio', 'asc'])) ?>">
                                 <i class="fa fa-long-arrow-up"></i>
                                 Aspect ratio
                              </a>
<?php
		}
		else {
			?>                              <a class="ajax" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['aspect_ratio', 'asc'])) ?>">
                                 <i class="fa fa-long-arrow-down"></i>
                                 Aspect ratio
                              </a>
<?php
		}
?>
                        </th>
                        <th>
<?php
		if ($sortColumn == 'density' and $sortOrder == 'asc') {
			?>                              <a class="ajax active" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['density', 'desc'])) ?>">
                                 <i class="fa fa-long-arrow-down"></i>
                                 Density
                              </a>
<?php
		}
		elseif ($sortColumn == 'density' and $sortOrder == 'desc') {
			?>                              <a class="ajax active" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['density', 'asc'])) ?>">
                                 <i class="fa fa-long-arrow-up"></i>
                                 Density
                              </a>
<?php
		}
		else {
			?>                              <a class="ajax" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['density', 'asc'])) ?>">
                                 <i class="fa fa-long-arrow-down"></i>
                                 Density
                              </a>
<?php
		}
?>
                        </th>
                     </tr>
                     </thead>
                     <tbody>
<?php
		$iterations = 0;
		foreach ($deviceList as $device) {
?>
                        <tr>
                           <td data-title="Type">
                              <i class="fa fa-<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->lower, $device->type->type)) /* line 227 */ ?>" title="<?php
			echo LR\Filters::escapeHtmlAttr($device->type->type) /* line 227 */ ?>"></i>
                           </td>
                           <td data-title="Device"><?php echo LR\Filters::escapeHtmlText($device->device) /* line 229 */ ?></td>
                           <td data-title="Platform"><?php echo LR\Filters::escapeHtmlText($device->platform) /* line 230 */ ?></td>
                           <td data-title="Screen dimensions">
<?php
			if ($unitDimension == 'in') {
				?>                                 <?php echo LR\Filters::escapeHtmlText($device->screen_in) /* line 233 */ ?> <small>in</small>
                                 <?php echo LR\Filters::escapeHtmlText($device->screen_width_in) /* line 234 */ ?><small>×</small><?php
				echo LR\Filters::escapeHtmlText($device->screen_height_in) /* line 234 */ ?> <small>in</small>
<?php
			}
			if ($unitDimension == 'cm') {
				?>                                 <?php echo LR\Filters::escapeHtmlText($device->screen_cm) /* line 237 */ ?> <small>cm</small>
                                 <?php echo LR\Filters::escapeHtmlText($device->screen_width_cm) /* line 238 */ ?><small>×</small><?php
				echo LR\Filters::escapeHtmlText($device->screen_height_cm) /* line 238 */ ?> <small>cm</small>
<?php
			}
?>
                           </td>
                           <td data-title="Width × Height">
<?php
			if ($unitSize == 'dp') {
				?>                                 <?php echo LR\Filters::escapeHtmlText($device->width_dp) /* line 243 */ ?><small>×</small><?php
				echo LR\Filters::escapeHtmlText($device->height_dp) /* line 243 */ ?> <small>dp</small>
<?php
			}
			if ($unitSize == 'px') {
				?>                                 <?php echo LR\Filters::escapeHtmlText($device->width_px) /* line 246 */ ?><small>×</small><?php
				echo LR\Filters::escapeHtmlText($device->height_px) /* line 246 */ ?> <small>px</small>
<?php
			}
?>
                           </td>
                           <td data-title="Aspect ratio"><?php echo LR\Filters::escapeHtmlText($device->aspect_ratio) /* line 249 */ ?></td>
                           <td data-title="Density"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->number, $device->density, 1)) /* line 250 */ ?></td>
                        </tr>
<?php
			$iterations++;
		}
?>
                     </tbody>
                  </table>
<?php
		$this->global->snippetDriver->leave();
		
	}


	function blockFooter($_args)
	{
		extract($_args);
		/* line 263 */ $_tmp = $this->global->uiControl->getComponent("footer");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
		
	}

}
