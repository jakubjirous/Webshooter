<?php
// source: C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\app\FrontModule\presenters/templates/Shoot/add.latte

use Latte\Runtime as LR;

class Template84cea174ae extends Latte\Runtime\Template
{
	public $blocks = [
		'header' => 'blockHeader',
		'title' => 'blockTitle',
		'breadcrumbContent' => 'blockBreadcrumbContent',
		'content' => 'blockContent',
	];

	public $blockTypes = [
		'header' => 'html',
		'title' => 'html',
		'breadcrumbContent' => 'html',
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
		$this->renderBlock('breadcrumbContent', get_defined_vars());
?>

<?php
		$this->renderBlock('content', get_defined_vars());
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['mobile'])) trigger_error('Variable $mobile overwritten in foreach on line 143');
		if (isset($this->params['tablet'])) trigger_error('Variable $tablet overwritten in foreach on line 194');
		if (isset($this->params['laptop'])) trigger_error('Variable $laptop overwritten in foreach on line 245');
		if (isset($this->params['desktop'])) trigger_error('Variable $desktop overwritten in foreach on line 296');
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
?>      <h1>New shoot</h1>
<?php
	}


	function blockBreadcrumbContent($_args)
	{
		extract($_args);
		?>   <li class="breadcrumb-item"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Shoot:settings")) ?>">Shoots settings</a></li>
   <li class="breadcrumb-item active">New shoot</li>
<?php
	}


	function blockContent($_args)
	{
		extract($_args);
?>
   <div class="container">
      <div class="shoot-add">
         <div class="row">
            <div class="col-xs-12">

<?php
		$form = $_form = $this->global->formsStack[] = $this->global->uiControl["shootAddForm"];
		?>               <form<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		), FALSE) ?>>

                  <fieldset>
                     <legend>Choose web browser engine</legend>
                     <div class="row form-group" id="engine-type">
                        <div class="col-sm-2 col-md-3 col-lg-4"></div>
                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 custom-radio-type">
                           <label id="webkit" class="checked">
                              Webkit <br>
                              <input type="radio" name="engine" checked value="webkit">
                              <span></span>
                           </label>
                        </div>
                        <div class="col-xs-6 col-sm-4 col-md-3 col-lg-2 custom-radio-type">
                           <label id="gecko">
                              Gecko <br>
                              <input type="radio" name="engine" value="gecko">
                              <span></span>
                           </label>
                        </div>
                     </div>
                  </fieldset>


                  <fieldset>
                     <legend>URL &amp; Image type</legend>
                     <div class="row form-group required">
                        <div class="col-xs-12 col-sm-5 col-md-4 col-lg-5 text-sm-right control-label">
                           <label class="required"<?php
		$_input = end($this->global->formsStack)["url"];
		echo $_input->getLabelPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                              Insert URL link:
                           </label>
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-8 col-lg-6 col-xl-5 input-group">
                           <input class="form-control text"<?php
		$_input = end($this->global->formsStack)["url"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                           <div class="input-group-addon addon-right-single">
                              <i class="fa fa-link"></i>
                           </div>
                        </div>
                     </div>
                     <div class="row form-group required">
                        <div class="col-xs-12 col-sm-5 col-md-4 col-lg-5 text-sm-right control-label">
                           <label class="required"<?php
		$_input = end($this->global->formsStack)["imgType"];
		echo $_input->getLabelPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                              Choose image file type
                           </label>
                        </div>
                        <div class="col-xs-12 col-sm-7 col-md-5 col-lg-3">
                           <select class="form-control"<?php
		$_input = end($this->global->formsStack)["imgType"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
<?php echo $_input->getControl()->getHtml() ?>                           </select>
                        </div>
                     </div>
                  </fieldset>


                  <fieldset>
                     <legend>Specific shoot type</legend>
                     <div class="form-group">
                        <div class="col-sm-12" id="device-type">
                           <div class="row">
                              <div class="col-xs-4 col-sm-2 col-md-2 text-xs-center custom-radio-type">
                                 <label class="mobile-type checked">
                                    <i class="fa fa-mobile-phone"></i>
                                    <input type="radio" name="deviceType" checked
                                           data-nette-rules='[{"op":":equal","rules":[],"control":"deviceType","toggle":{"tab-mobile":true},"arg":1},{"op":":equal","rules":[],"control":"deviceType","toggle":{"tab-tablet":true},"arg":2},{"op":":equal","rules":[],"control":"deviceType","toggle":{"tab-laptop":true},"arg":3},{"op":":equal","rules":[],"control":"deviceType","toggle":{"tab-desktop":true},"arg":4},{"op":":equal","rules":[],"control":"deviceType","toggle":{"tab-other":true},"arg":5},{"op":":equal","rules":[],"control":"deviceType","toggle":{"tab-crop":true},"arg":6}]'
                                           value="1">
                                    <span></span>
                                 </label>
                              </div>
                              <div class="col-xs-4 col-sm-2 col-md-2 text-xs-center custom-radio-type">
                                 <label class="tablet-type">
                                    <i class="fa fa-tablet"></i>
                                    <input type="radio" name="deviceType" value="2">
                                    <span></span>
                                 </label>
                              </div>
                              <div class="col-xs-4 col-sm-2 col-md-2 text-xs-center custom-radio-type">
                                 <label class="laptop-type">
                                    <i class="fa fa-laptop"></i>
                                    <input type="radio" name="deviceType" value="3">
                                    <span></span>
                                 </label>
                              </div>
                              <div class="col-xs-4 col-sm-2 col-md-2 text-xs-center custom-radio-type">
                                 <label class="desktop-type">
                                    <i class="fa fa-desktop"></i>
                                    <input type="radio" name="deviceType" value="4">
                                    <span></span>
                                 </label>
                              </div>
                              <div class="col-xs-4 col-sm-2 col-md-2 text-xs-center custom-radio-type">
                                 <label class="other-type">
                                    <i class="fa fa-cogs"></i>
                                    <input type="radio" name="deviceType" value="5">
                                    <span></span>
                                 </label>
                              </div>
                              <div class="col-xs-4 col-sm-2 col-md-2 text-xs-center custom-radio-type">
                                 <label class="crop-type">
                                    <i class="fa fa-crop"></i>
                                    <input type="radio" name="deviceType" value="6">
                                    <span></span>
                                 </label>
                              </div>
                           </div>
                        </div>
                     </div>
                  </fieldset>


                  <div id="tab-mobile">
                     <table class="table">
                        <thead>
                        <tr>
                           <th>Device</th>
                           <th>Platform</th>
                           <th>Screen dimensions</th>
                           <th>Width × Height</th>
                           <th>Aspect ratio</th>
                           <th>Density</th>
                        </tr>
                        </thead>
                        <tbody>
<?php
		$iterations = 0;
		foreach ($iterator = $this->global->its[] = new LR\CachingIterator($mobiles) as $mobile) {
			?>                           <tr <?php
			if ($iterator->first) {
				?>class="choose"<?php
			}
?>>
                              <td class="custom-radio">
                                 <label>
                                    <input type="radio" name="mobile" <?php
			if ($iterator->first) {
				?>checked<?php
			}
?>

                                           value="<?php echo LR\Filters::escapeHtmlAttr($mobile->id_device) /* line 148 */ ?>">
                                    <span></span>
                                    <?php echo LR\Filters::escapeHtmlText($mobile->device) /* line 150 */ ?>

                                 </label>
                              </td>
                              <td data-title="Platform"><?php echo LR\Filters::escapeHtmlText($mobile->platform) /* line 153 */ ?></td>
                              <td data-title="Screen dimensions">
                                 <?php echo LR\Filters::escapeHtmlText($mobile->screen_in) /* line 155 */ ?>

                                 <small>in</small>
                                 <?php echo LR\Filters::escapeHtmlText($mobile->screen_width_in) /* line 157 */ ?><small>×</small><?php
			echo LR\Filters::escapeHtmlText($mobile->screen_height_in) /* line 157 */ ?>

                                 <small>in</small>
                                 <br>
                                 <?php echo LR\Filters::escapeHtmlText($mobile->screen_cm) /* line 160 */ ?>

                                 <small>cm</small>
                                 <?php echo LR\Filters::escapeHtmlText($mobile->screen_width_cm) /* line 162 */ ?><small>×</small><?php
			echo LR\Filters::escapeHtmlText($mobile->screen_height_cm) /* line 162 */ ?>

                                 <small>cm</small>
                              </td>
                              <td data-title="Width × Height">
                                 <?php echo LR\Filters::escapeHtmlText($mobile->width_dp) /* line 166 */ ?><small>×</small><?php
			echo LR\Filters::escapeHtmlText($mobile->height_dp) /* line 166 */ ?>

                                 <small>dp</small>
                                 <br>
                                 <?php echo LR\Filters::escapeHtmlText($mobile->width_px) /* line 169 */ ?><small>×</small><?php
			echo LR\Filters::escapeHtmlText($mobile->height_px) /* line 169 */ ?>

                                 <small>px</small>
                              </td>
                              <td data-title="Aspect ratio"><?php echo LR\Filters::escapeHtmlText($mobile->aspect_ratio) /* line 172 */ ?></td>
                              <td data-title="Density"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->number, $mobile->density, 1)) /* line 173 */ ?></td>
                           </tr>
<?php
			$iterations++;
		}
		array_pop($this->global->its);
		$iterator = end($this->global->its);
?>
                        </tbody>
                     </table>
                  </div>


                  <div id="tab-tablet">
                     <table class="table">
                        <thead>
                        <tr>
                           <th>Device</th>
                           <th>Platform</th>
                           <th>Screen dimensions</th>
                           <th>Width × Height</th>
                           <th>Aspect ratio</th>
                           <th>Density</th>
                        </tr>
                        </thead>
                        <tbody>
<?php
		$iterations = 0;
		foreach ($iterator = $this->global->its[] = new LR\CachingIterator($tablets) as $tablet) {
			?>                           <tr <?php
			if ($iterator->first) {
				?>class="choose"<?php
			}
?>>
                              <td class="custom-radio">
                                 <label>
                                    <input type="radio" name="tablet" <?php
			if ($iterator->first) {
				?>checked<?php
			}
?>

                                           value="<?php echo LR\Filters::escapeHtmlAttr($tablet->id_device) /* line 199 */ ?>">
                                    <span></span>
                                    <?php echo LR\Filters::escapeHtmlText($tablet->device) /* line 201 */ ?>

                                 </label>
                              </td>
                              <td data-title="Platform"><?php echo LR\Filters::escapeHtmlText($tablet->platform) /* line 204 */ ?></td>
                              <td data-title="Screen dimensions">
                                 <?php echo LR\Filters::escapeHtmlText($tablet->screen_in) /* line 206 */ ?>

                                 <small>in</small>
                                 <?php echo LR\Filters::escapeHtmlText($tablet->screen_width_in) /* line 208 */ ?><small>×</small><?php
			echo LR\Filters::escapeHtmlText($tablet->screen_height_in) /* line 208 */ ?>

                                 <small>in</small>
                                 <br>
                                 <?php echo LR\Filters::escapeHtmlText($tablet->screen_cm) /* line 211 */ ?>

                                 <small>cm</small>
                                 <?php echo LR\Filters::escapeHtmlText($tablet->screen_width_cm) /* line 213 */ ?><small>×</small><?php
			echo LR\Filters::escapeHtmlText($tablet->screen_height_cm) /* line 213 */ ?>

                                 <small>cm</small>
                              </td>
                              <td data-title="Width × Height">
                                 <?php echo LR\Filters::escapeHtmlText($tablet->width_dp) /* line 217 */ ?><small>×</small><?php
			echo LR\Filters::escapeHtmlText($tablet->height_dp) /* line 217 */ ?>

                                 <small>dp</small>
                                 <br>
                                 <?php echo LR\Filters::escapeHtmlText($tablet->width_px) /* line 220 */ ?><small>×</small><?php
			echo LR\Filters::escapeHtmlText($tablet->height_px) /* line 220 */ ?>

                                 <small>px</small>
                              </td>
                              <td data-title="Aspect ratio"><?php echo LR\Filters::escapeHtmlText($tablet->aspect_ratio) /* line 223 */ ?></td>
                              <td data-title="Density"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->number, $tablet->density, 1)) /* line 224 */ ?></td>
                           </tr>
<?php
			$iterations++;
		}
		array_pop($this->global->its);
		$iterator = end($this->global->its);
?>
                        </tbody>
                     </table>
                  </div>


                  <div id="tab-laptop">
                     <table class="table">
                        <thead>
                        <tr>
                           <th>Device</th>
                           <th>Platform</th>
                           <th>Screen dimensions</th>
                           <th>Width × Height</th>
                           <th>Aspect ratio</th>
                           <th>Density</th>
                        </tr>
                        </thead>
                        <tbody>
<?php
		$iterations = 0;
		foreach ($iterator = $this->global->its[] = new LR\CachingIterator($laptops) as $laptop) {
			?>                           <tr <?php
			if ($iterator->first) {
				?>class="choose"<?php
			}
?>>
                              <td class="custom-radio">
                                 <label>
                                    <input type="radio" name="laptop" <?php
			if ($iterator->first) {
				?>checked<?php
			}
?>

                                           value="<?php echo LR\Filters::escapeHtmlAttr($laptop->id_device) /* line 250 */ ?>">
                                    <span></span>
                                    <?php echo LR\Filters::escapeHtmlText($laptop->device) /* line 252 */ ?>

                                 </label>
                              </td>
                              <td data-title="Platform"><?php echo LR\Filters::escapeHtmlText($laptop->platform) /* line 255 */ ?></td>
                              <td data-title="Screen dimensions">
                                 <?php echo LR\Filters::escapeHtmlText($laptop->screen_in) /* line 257 */ ?>

                                 <small>in</small>
                                 <?php echo LR\Filters::escapeHtmlText($laptop->screen_width_in) /* line 259 */ ?><small>×</small><?php
			echo LR\Filters::escapeHtmlText($laptop->screen_height_in) /* line 259 */ ?>

                                 <small>in</small>
                                 <br>
                                 <?php echo LR\Filters::escapeHtmlText($laptop->screen_cm) /* line 262 */ ?>

                                 <small>cm</small>
                                 <?php echo LR\Filters::escapeHtmlText($laptop->screen_width_cm) /* line 264 */ ?><small>×</small><?php
			echo LR\Filters::escapeHtmlText($laptop->screen_height_cm) /* line 264 */ ?>

                                 <small>cm</small>
                              </td>
                              <td data-title="Width × Height">
                                 <?php echo LR\Filters::escapeHtmlText($laptop->width_dp) /* line 268 */ ?><small>×</small><?php
			echo LR\Filters::escapeHtmlText($laptop->height_dp) /* line 268 */ ?>

                                 <small>dp</small>
                                 <br>
                                 <?php echo LR\Filters::escapeHtmlText($laptop->width_px) /* line 271 */ ?><small>×</small><?php
			echo LR\Filters::escapeHtmlText($laptop->height_px) /* line 271 */ ?>

                                 <small>px</small>
                              </td>
                              <td data-title="Aspect ratio"><?php echo LR\Filters::escapeHtmlText($laptop->aspect_ratio) /* line 274 */ ?></td>
                              <td data-title="Density"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->number, $laptop->density, 1)) /* line 275 */ ?></td>
                           </tr>
<?php
			$iterations++;
		}
		array_pop($this->global->its);
		$iterator = end($this->global->its);
?>
                        </tbody>
                     </table>
                  </div>


                  <div id="tab-desktop">
                     <table class="table">
                        <thead>
                        <tr>
                           <th>Device</th>
                           <th>Platform</th>
                           <th>Screen dimensions</th>
                           <th>Width × Height</th>
                           <th>Aspect ratio</th>
                           <th>Density</th>
                        </tr>
                        </thead>
                        <tbody>
<?php
		$iterations = 0;
		foreach ($iterator = $this->global->its[] = new LR\CachingIterator($desktops) as $desktop) {
			?>                           <tr <?php
			if ($iterator->first) {
				?>class="choose"<?php
			}
?>>
                              <td class="custom-radio">
                                 <label>
                                    <input type="radio" name="desktop" <?php
			if ($iterator->first) {
				?>checked<?php
			}
?>

                                           value="<?php echo LR\Filters::escapeHtmlAttr($desktop->id_device) /* line 301 */ ?>">
                                    <span></span>
                                    <?php echo LR\Filters::escapeHtmlText($desktop->device) /* line 303 */ ?>

                                 </label>
                              </td>
                              <td data-title="Platform"><?php echo LR\Filters::escapeHtmlText($desktop->platform) /* line 306 */ ?></td>
                              <td data-title="Screen dimensions">
                                 <?php echo LR\Filters::escapeHtmlText($desktop->screen_in) /* line 308 */ ?>

                                 <small>in</small>
                                 <?php echo LR\Filters::escapeHtmlText($desktop->screen_width_in) /* line 310 */ ?><small>×</small><?php
			echo LR\Filters::escapeHtmlText($desktop->screen_height_in) /* line 310 */ ?>

                                 <small>in</small>
                                 <br>
                                 <?php echo LR\Filters::escapeHtmlText($desktop->screen_cm) /* line 313 */ ?>

                                 <small>cm</small>
                                 <?php echo LR\Filters::escapeHtmlText($desktop->screen_width_cm) /* line 315 */ ?><small>×</small><?php
			echo LR\Filters::escapeHtmlText($desktop->screen_height_cm) /* line 315 */ ?>

                                 <small>cm</small>
                              </td>
                              <td data-title="Width × Height">
                                 <?php echo LR\Filters::escapeHtmlText($desktop->width_dp) /* line 319 */ ?><small>×</small><?php
			echo LR\Filters::escapeHtmlText($desktop->height_dp) /* line 319 */ ?>

                                 <small>dp</small>
                                 <br>
                                 <?php echo LR\Filters::escapeHtmlText($desktop->width_px) /* line 322 */ ?><small>×</small><?php
			echo LR\Filters::escapeHtmlText($desktop->height_px) /* line 322 */ ?>

                                 <small>px</small>
                              </td>
                              <td data-title="Aspect ratio"><?php echo LR\Filters::escapeHtmlText($desktop->aspect_ratio) /* line 325 */ ?></td>
                              <td data-title="Density"><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->number, $desktop->density, 1)) /* line 326 */ ?></td>
                           </tr>
<?php
			$iterations++;
		}
		array_pop($this->global->its);
		$iterator = end($this->global->its);
?>
                        </tbody>
                     </table>
                  </div>


                  <div id="tab-other" class="text-xs-center">
                     <table class="table">
                        <thead>
                        <tr>
                           <th>Custom screenshot</th>
                        </tr>
                        </thead>
                     </table>
                     <div class="form-group row">
                        <div class="col-xs-12 col-sm-4 col-md-5 text-sm-right control-label">
                           <label class="required"<?php
		$_input = end($this->global->formsStack)["otherWidth"];
		echo $_input->getLabelPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                              Set width:
                           </label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-3 input-group input-group-left">
                           <div class="input-group-addon addon-left"><i class="fa fa-arrows-h"></i></div>
                           <input class="form-control text"<?php
		$_input = end($this->global->formsStack)["otherWidth"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                           <div class="input-group-addon addon-right">px</div>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-xs-12 col-sm-4 col-md-5 text-sm-right control-label">
                           <label<?php
		$_input = end($this->global->formsStack)["otherHeight"];
		echo $_input->getLabelPart()->attributes() ?>>
                              Set height:
                           </label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-3 input-group input-group-left">
                           <div class="input-group-addon addon-left"><i class="fa fa-arrows-v"></i></div>
                           <input class="form-control text"<?php
		$_input = end($this->global->formsStack)["otherHeight"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                           <div class="input-group-addon addon-right">px</div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-5"></div>
                        <div class="col-xs-12 col-sm-8 col-md-7 text-xs-center text-sm-left input-help">
                           <p class="help-block">
                              If you don´t set screenshot height, will be set as maximum height of website.
                           </p>
                        </div>
                     </div>
                  </div>


                  <div id="tab-crop" class="text-xs-center">
                     <table class="table">
                        <thead>
                        <tr>
                           <th>Crop rectangle or square from TOP-LEFT corner</th>
                        </tr>
                        </thead>
                     </table>
                     <div class="form-group row">
                        <div class="col-xs-12 col-sm-4 col-md-5 text-sm-right control-label">
                           <label class="required"<?php
		$_input = end($this->global->formsStack)["cropViewportWidth"];
		echo $_input->getLabelPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                              Viewport width:
                           </label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-3 input-group input-group-left">
                           <div class="input-group-addon addon-left"><i class="fa fa-arrows-h"></i></div>
                           <input class="form-control text"<?php
		$_input = end($this->global->formsStack)["cropViewportWidth"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                           <div class="input-group-addon addon-right">px</div>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-xs-12 col-sm-4 col-md-5 text-sm-right control-label">
                           <label class="required"<?php
		$_input = end($this->global->formsStack)["cropViewportHeight"];
		echo $_input->getLabelPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                              Viewport height:
                           </label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-3 input-group input-group-left">
                           <div class="input-group-addon addon-left"><i class="fa fa-arrows-v"></i></div>
                           <input class="form-control text"<?php
		$_input = end($this->global->formsStack)["cropViewportHeight"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                           <div class="input-group-addon addon-right">px</div>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-xs-12 col-sm-4 col-md-5 text-sm-right control-label">
                           <label class="required"<?php
		$_input = end($this->global->formsStack)["cropTop"];
		echo $_input->getLabelPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                              Set top:
                           </label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-3 input-group input-group-left">
                           <div class="input-group-addon addon-left"><i class="fa fa-long-arrow-down"></i></div>
                           <input class="form-control text"<?php
		$_input = end($this->global->formsStack)["cropTop"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                           <div class="input-group-addon addon-right">px</div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-5"></div>
                        <div class="col-xs-12 col-sm-8 col-md-7 text-xs-center text-sm-left input-help">
                           <p class="help-block">
                              Position from top < Viewport height
                           </p>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-xs-12 col-sm-4 col-md-5 text-sm-right control-label">
                           <label class="required"<?php
		$_input = end($this->global->formsStack)["cropLeft"];
		echo $_input->getLabelPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                              Set left:
                           </label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-3 input-group input-group-left">
                           <div class="input-group-addon addon-left"><i class="fa fa-long-arrow-right"></i></div>
                           <input class="form-control text"<?php
		$_input = end($this->global->formsStack)["cropLeft"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                           <div class="input-group-addon addon-right">px</div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-5"></div>
                        <div class="col-xs-12 col-sm-8 col-md-7 text-xs-center text-sm-left input-help">
                           <p class="help-block">
                              Position from left < Viewport width
                           </p>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-xs-12 col-sm-4 col-md-5 text-sm-right control-label">
                           <label class="required"<?php
		$_input = end($this->global->formsStack)["cropWidth"];
		echo $_input->getLabelPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                              Set width:
                           </label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-3 input-group input-group-left">
                           <div class="input-group-addon addon-left"><i class="fa fa-arrow-right"></i></div>
                           <input class="form-control text"<?php
		$_input = end($this->global->formsStack)["cropWidth"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                           <div class="input-group-addon addon-right">px</div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-5"></div>
                        <div class="col-xs-12 col-sm-8 col-md-7 text-xs-center text-sm-left input-help">
                           <p class="help-block">
                              Crop width &#8804; (Viewport width – Left)
                           </p>
                        </div>
                     </div>
                     <div class="form-group row">
                        <div class="col-xs-12 col-sm-4 col-md-5 text-sm-right control-label">
                           <label class="required"<?php
		$_input = end($this->global->formsStack)["cropHeight"];
		echo $_input->getLabelPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                              Set height:
                           </label>
                        </div>
                        <div class="col-xs-12 col-sm-6 col-md-5 col-lg-3 input-group input-group-left">
                           <div class="input-group-addon addon-left"><i class="fa fa-arrow-down"></i></div>
                           <input class="form-control text"<?php
		$_input = end($this->global->formsStack)["cropHeight"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                           <div class="input-group-addon addon-right">px</div>
                        </div>
                        <div class="col-xs-12 col-sm-4 col-md-5"></div>
                        <div class="col-xs-12 col-sm-8 col-md-7 text-xs-center text-sm-left input-help">
                           <p class="help-block">
                              Crop height &#8804; (Viewport height – Top)
                           </p>
                        </div>
                     </div>
                  </div>


                  <div class="form-group margin-top margin-bottom">
                     <div class="col-xs-12 text-xs-center">
                        <button type="submit" class="btn btn-primary btn-lg"<?php
		$_input = end($this->global->formsStack)["save"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'class' => NULL,
		))->attributes() ?>>
                           <i class="fa fa-image"></i> MAKE NEW SHOOT !
                        </button>
                     </div>
                  </div>
<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormEnd(array_pop($this->global->formsStack), FALSE);
?>               </form>


            </div>
         </div>
      </div>
   </div>
<?php
	}

}
