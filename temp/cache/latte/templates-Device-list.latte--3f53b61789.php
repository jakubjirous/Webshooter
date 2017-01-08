<?php
// source: C:\Users\WPJ3Station\Disk Google\James\LOCALHOST\DP\WSM\app\FrontModule\presenters/templates/Device/list.latte

use Latte\Runtime as LR;

class Template3f53b61789 extends Latte\Runtime\Template
{
	public $blocks = [
		'menu' => 'blockMenu',
		'header' => 'blockHeader',
		'footer' => 'blockFooter',
		'content' => 'blockContent',
		'_deviceList' => 'blockDeviceList',
	];

	public $blockTypes = [
		'menu' => 'html',
		'header' => 'html',
		'footer' => 'html',
		'content' => 'html',
		'_deviceList' => 'html',
	];


	function main()
	{
		extract($this->params);
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('menu', get_defined_vars());
?>

<?php
		$this->renderBlock('header', get_defined_vars());
?>

<?php
		$this->renderBlock('footer', get_defined_vars());
?>

<?php
		$this->renderBlock('content', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['device'])) trigger_error('Variable $device overwritten in foreach on line 49');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockMenu($_args)
	{
		extract($_args);
		/* line 4 */ $_tmp = $this->global->uiControl->getComponent("frontMenu");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
		
	}


	function blockHeader($_args)
	{
?>   <header>
      <h1>
         Devices
      </h1>
   </header>
<?php
	}


	function blockFooter($_args)
	{
		extract($_args);
		/* line 16 */ $_tmp = $this->global->uiControl->getComponent("footer");
		if ($_tmp instanceof Nette\Application\UI\IRenderable) $_tmp->redrawControl(NULL, FALSE);
		$_tmp->render();
		
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
                  <table class="table table-hover table-sm">
                     <thead class="thead-default">
                     <tr>
                        <th>#</th>
                        <th>Type</th>
                        <th>Device</th>
                        <th>Platform</th>
                        <th>
                           Screen dimensions
                           <a class="ajax<?php
		if ($unitDimension == "in") {
			?> active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("dimension!", ['in'])) ?>">in</a>
                           <a class="ajax<?php
		if ($unitDimension == "cm") {
			?> active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("dimension!", ['cm'])) ?>">cm</a>
                        </th>
                        <th>Aspect ratio</th>
                        <th>
                           Width × Height
                           <a class="ajax<?php
		if ($unitSize == "dp") {
			?> active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("size!", ['dp'])) ?>">dp</a>
                           <a class="ajax<?php
		if ($unitSize == "px") {
			?> active<?php
		}
		?>" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("size!", ['px'])) ?>">px</a>
                        </th>
                        <th>Density</th>
                        <th></th>
                     </tr>
                     </thead>
                     <tbody>
<?php
		$iterations = 0;
		foreach ($iterator = $this->global->its[] = new LR\CachingIterator($deviceList) as $device) {
?>
                        <tr>
                           <th scope="row"><?php echo LR\Filters::escapeHtmlText($iterator->counter) /* line 51 */ ?></th>
                           <td><i class="fa fa-<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->lower, $device->type->type)) /* line 52 */ ?>"></i></td>
                           <td><?php echo LR\Filters::escapeHtmlText($device->device) /* line 53 */ ?></td>
                           <td><?php echo LR\Filters::escapeHtmlText($device->platform) /* line 54 */ ?></td>
                           <td>
<?php
			if ($unitDimension == "in") {
				?>                                 <?php echo LR\Filters::escapeHtmlText($device->screen_in) /* line 57 */ ?> in <?php
				echo LR\Filters::escapeHtmlText($device->screen_width_in) /* line 57 */ ?>×<?php echo LR\Filters::escapeHtmlText($device->screen_height_in) /* line 57 */ ?> in
<?php
			}
			if ($unitDimension == "cm") {
				?>                                 <?php echo LR\Filters::escapeHtmlText($device->screen_cm) /* line 60 */ ?> cm <?php
				echo LR\Filters::escapeHtmlText($device->screen_width_cm) /* line 60 */ ?>×<?php echo LR\Filters::escapeHtmlText($device->screen_height_cm) /* line 60 */ ?> cm
<?php
			}
?>
                           </td>
                           <td><?php echo LR\Filters::escapeHtmlText($device->aspect_ratio) /* line 63 */ ?></td>
                           <td>
<?php
			if ($unitSize == "dp") {
				?>                                 <?php echo LR\Filters::escapeHtmlText($device->width_dp) /* line 66 */ ?>×<?php
				echo LR\Filters::escapeHtmlText($device->height_dp) /* line 66 */ ?> dp
<?php
			}
			if ($unitSize == "px") {
				?>                                 <?php echo LR\Filters::escapeHtmlText($device->width_px) /* line 69 */ ?>×<?php
				echo LR\Filters::escapeHtmlText($device->height_px) /* line 69 */ ?> px
<?php
			}
?>
                           </td>
                           <td><?php echo LR\Filters::escapeHtmlText($device->density) /* line 72 */ ?></td>
                           <td>
                              <a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Device:detail", [$device->id])) ?>">
                                 <i class="fa fa-edit"></i>
                                 Detail
                              </a>
                           </td>
                        </tr>
<?php
			$iterations++;
		}
		array_pop($this->global->its);
		$iterator = end($this->global->its);
?>
                     </tbody>
                  </table>
<?php
		$this->global->snippetDriver->leave();
		
	}

}
