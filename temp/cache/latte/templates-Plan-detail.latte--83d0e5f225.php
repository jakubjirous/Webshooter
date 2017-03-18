<?php
// source: C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\app\FrontModule\presenters/templates/Plan/detail.latte

use Latte\Runtime as LR;

class Template83d0e5f225 extends Latte\Runtime\Template
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
?>      <h1>Plan detail</h1>
<?php
	}


	function blockBreadcrumbContent($_args)
	{
		extract($_args);
		?>   <li class="breadcrumb-item"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Plan:settings")) ?>">Plan settings</a></li>
   <li class="breadcrumb-item active">Plan detail</li>
<?php
	}


	function blockContent($_args)
	{
		extract($_args);
?>
   <div class="container">
      <div class="plan-detail">
         <div class="row">
            <div class="col-xs-12">

<?php
		$form = $_form = $this->global->formsStack[] = $this->global->uiControl["planEditForm"];
		?>               <form<?php
		echo Nette\Bridges\FormsLatte\Runtime::renderFormBegin(end($this->global->formsStack), array (
		), FALSE) ?>>

                  <input type="hidden"<?php
		$_input = end($this->global->formsStack)["planID"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		))->attributes() ?>>

                  <fieldset>
                     <legend>Plan options</legend>
                     <div class="row form-group required">
                        <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                           <label<?php
		$_input = end($this->global->formsStack)["startDate"];
		echo $_input->getLabelPart()->attributes() ?>>Start date & time:</label>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4 input-group date">
                           <input class="form-control" data-datetime-picker-start<?php
		$_input = end($this->global->formsStack)["startDate"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		'data-datetime-picker-start' => NULL,
		))->attributes() ?>>
                           <span class="input-group-addon" data-datetime-picker-start-snow><i class="fa fa-calendar"></i></span>
                        </div>
                     </div>

                     <div class="row form-group required">
                        <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                           <label<?php
		$_input = end($this->global->formsStack)["primaryEmail"];
		echo $_input->getLabelPart()->attributes() ?>>Primary e-mail:</label>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4 input-group">
                           <span class="input-group-addon">@</span>
                           <input class="form-control"<?php
		$_input = end($this->global->formsStack)["primaryEmail"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                        </div>
                     </div>

                     <div class="row form-group">
                        <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                           <label<?php
		$_input = end($this->global->formsStack)["secondaryEmail"];
		echo $_input->getLabelPart()->attributes() ?>>Secondary e-mail:</label>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4 input-group">
                           <span class="input-group-addon">@</span>
                           <input class="form-control"<?php
		$_input = end($this->global->formsStack)["secondaryEmail"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                        </div>
                     </div>

                     <div class="row form-group margin-top">
                        <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                           <label<?php
		$_input = end($this->global->formsStack)["status"];
		echo $_input->getLabelPart()->attributes() ?>>Enable repeat:</label>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4 enable-repeat">
                           <label class="switch">
                              <input type="checkbox"<?php
		$_input = end($this->global->formsStack)["status"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		))->attributes() ?>>
                              <div class="slider round"></div>
                           </label>
                        </div>
                     </div>
                  </fieldset>


                  <div id="repeate-options">
                     <fieldset>
                        <legend>Repeat start</legend>

                        <div class="form-group">
                           <div class="row">
                              <div class="col-xs-12 col-md-3 col-lg-2 offset-lg-2 col-xl-2 custom-radio-type text-xs-left text-sm-center">
                                 <label class="checked">
                                    <input type="radio" checked value="<?php echo LR\Filters::escapeHtmlAttr($daily) /* line 82 */ ?>"
                                           data-nette-rules='[{"op":":equal","rules":[],"control":"startType","toggle":{"repeate-daily":true},"arg":1},{"op":":equal","rules":[],"control":"startType","toggle":{"repeate-weekly":true},"arg":2},{"op":":equal","rules":[],"control":"startType","toggle":{"repeate-monthly":true},"arg":3},{"op":":equal","rules":[],"control":"startType","toggle":{"repeate-yearly":true},"arg":4}]'<?php
		$_input = end($this->global->formsStack)["startType"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'checked' => NULL,
		'value' => NULL,
		'data-nette-rules' => NULL,
		))->attributes() ?>>
                                    <span></span>
                                    Daily
                                 </label>
                              </div>
                              <div class="col-xs-12 col-md-3 col-lg-2 col-xl-2 custom-radio-type text-xs-left text-sm-center">
                                 <label>
                                    <input type="radio" value="<?php echo LR\Filters::escapeHtmlAttr($weekly) /* line 90 */ ?>"<?php
		$_input = end($this->global->formsStack)["startType"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'value' => NULL,
		))->attributes() ?>>
                                    <span></span>
                                    Weekly
                                 </label>
                              </div>
                              <div class="col-xs-12 col-md-3 col-lg-2 col-xl-2 custom-radio-type text-xs-left text-sm-center">
                                 <label>
                                    <input type="radio" value="<?php echo LR\Filters::escapeHtmlAttr($monthly) /* line 97 */ ?>"<?php
		$_input = end($this->global->formsStack)["startType"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'value' => NULL,
		))->attributes() ?>>
                                    <span></span>
                                    Monthly
                                 </label>
                              </div>
                              <div class="col-xs-12 col-md-3 col-lg-2 col-xl-2 custom-radio-type text-xs-left text-sm-center">
                                 <label>
                                    <input type="radio" value="<?php echo LR\Filters::escapeHtmlAttr($yearly) /* line 104 */ ?>"<?php
		$_input = end($this->global->formsStack)["startType"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'value' => NULL,
		))->attributes() ?>>
                                    <span></span>
                                    Yearly
                                 </label>
                              </div>
                           </div>
                        </div>

                        <div id="repeate-daily">
                           <div class="row form-group required">
                              <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                                 <label<?php
		$_input = end($this->global->formsStack)["startDailyValue"];
		echo $_input->getLabelPart()->attributes() ?>>Repeat once per:</label>
                              </div>
                              <div class="col-xs-12 col-md-6 col-lg-4">
                                 <select class="form-control"<?php
		$_input = end($this->global->formsStack)["startDailyValue"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
<?php echo $_input->getControl()->getHtml() ?>                                 </select>
                              </div>
                           </div>
                        </div>

                        <div id="repeate-weekly">
                           <div class="row form-group required">
                              <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                                 <label<?php
		$_input = end($this->global->formsStack)["startWeeklyValue"];
		echo $_input->getLabelPart()->attributes() ?>>Repeat once per:</label>
                              </div>
                              <div class="col-xs-12 col-md-6 col-lg-4">
                                 <select class="form-control"<?php
		$_input = end($this->global->formsStack)["startWeeklyValue"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
<?php echo $_input->getControl()->getHtml() ?>                                 </select>
                              </div>
                           </div>
                        </div>

                        <div id="repeate-monthly">
                           <div class="row form-group required">
                              <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                                 <label<?php
		$_input = end($this->global->formsStack)["startMonthlyValue"];
		echo $_input->getLabelPart()->attributes() ?>>Repeat once per:</label>
                              </div>
                              <div class="col-xs-12 col-md-6 col-lg-4">
                                 <select class="form-control"<?php
		$_input = end($this->global->formsStack)["startMonthlyValue"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
<?php echo $_input->getControl()->getHtml() ?>                                 </select>
                              </div>
                           </div>
                        </div>

                        <div id="repeate-yearly">
                           <div class="row form-group required">
                              <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                                 <label<?php
		$_input = end($this->global->formsStack)["startYearlyValue"];
		echo $_input->getLabelPart()->attributes() ?>>Repeat once per:</label>
                              </div>
                              <div class="col-xs-12 col-md-6 col-lg-4">
                                 <select class="form-control"<?php
		$_input = end($this->global->formsStack)["startYearlyValue"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
<?php echo $_input->getControl()->getHtml() ?>                                 </select>
                              </div>
                           </div>
                        </div>
                     </fieldset>

                     <fieldset>
                        <legend>Repeate end</legend>

                        <div class="form-group">
                           <div class="row">
                              <div class="col-xs-12 col-md-3 col-lg-2 offset-lg-2 col-xl-2 custom-radio-type text-xs-left text-sm-center">
                                 <label class="checked">
                                    <input type="radio" checked value="<?php echo LR\Filters::escapeHtmlAttr($never) /* line 169 */ ?>"
                                           data-nette-rules='[{"op":":equal","rules":[],"control":"endType","toggle":{"end-after":true},"arg":2},{"op":":equal","rules":[],"control":"endType","toggle":{"end-date":true},"arg":3}]'<?php
		$_input = end($this->global->formsStack)["endType"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'checked' => NULL,
		'value' => NULL,
		'data-nette-rules' => NULL,
		))->attributes() ?>>
                                    <span></span>
                                    Never
                                 </label>
                              </div>
                              <div class="col-xs-12 col-md-6 col-lg-4 col-xl-4 custom-radio-type text-xs-left text-sm-center">
                                 <label>
                                    <input type="radio" value="<?php echo LR\Filters::escapeHtmlAttr($occurrence) /* line 177 */ ?>"<?php
		$_input = end($this->global->formsStack)["endType"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'value' => NULL,
		))->attributes() ?>>
                                    <span></span>
                                    After X occurrences
                                 </label>
                              </div>
                              <div class="col-xs-12 col-md-3 col-lg-2 col-xl-2 custom-radio-type text-xs-left text-sm-center">
                                 <label>
                                    <input type="radio" value="<?php echo LR\Filters::escapeHtmlAttr($date) /* line 184 */ ?>"<?php
		$_input = end($this->global->formsStack)["endType"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'value' => NULL,
		))->attributes() ?>>
                                    <span></span>
                                    Date
                                 </label>
                              </div>
                           </div>
                        </div>

                        <div id="end-after">
                           <div class="row form-group required">
                              <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                                 <label<?php
		$_input = end($this->global->formsStack)["endOccurrence"];
		echo $_input->getLabelPart()->attributes() ?>>Number of occurrences:</label>
                              </div>
                              <div class="col-xs-12 col-md-6 col-lg-4">
                                 <input class="form-control"<?php
		$_input = end($this->global->formsStack)["endOccurrence"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                              </div>
                           </div>
                        </div>

                        <div id="end-date">
                           <div class="row form-group required">
                              <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                                 <label<?php
		$_input = end($this->global->formsStack)["endDate"];
		echo $_input->getLabelPart()->attributes() ?>>End date & time:</label>
                              </div>
                              <div class="col-xs-12 col-md-6 col-lg-4 input-group date">
                                 <input class="form-control" data-datetime-picker-end<?php
		$_input = end($this->global->formsStack)["endDate"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		'data-datetime-picker-end' => NULL,
		))->attributes() ?>>
                                 <span class="input-group-addon" data-datetime-picker-end-snow><i class="fa fa-calendar"></i></span>
                              </div>
                           </div>
                        </div>
                     </fieldset>
                  </div>


                  <fieldset class="margin-top">
                     <legend>Comparison settings</legend>

                     <div class="row form-group required">
                        <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                           <label<?php
		$_input = end($this->global->formsStack)["color"];
		echo $_input->getLabelPart()->attributes() ?>>Result color:</label>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4">
                           <select class="form-control"<?php
		$_input = end($this->global->formsStack)["color"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>><?php echo $_input->getControl()->getHtml() ?></select>
                        </div>
                     </div>

                     <div class="row form-group required">
                        <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                           <label<?php
		$_input = end($this->global->formsStack)["background"];
		echo $_input->getLabelPart()->attributes() ?>>Result background:</label>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4">
                           <select class="form-control"<?php
		$_input = end($this->global->formsStack)["background"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>><?php echo $_input->getControl()->getHtml() ?></select>
                        </div>
                     </div>

                     <div class="row form-group required">
                        <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                           <label<?php
		$_input = end($this->global->formsStack)["tolerance"];
		echo $_input->getLabelPart()->attributes() ?>>Tolerance:</label>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4 input-group">
                           <input class="form-control"<?php
		$_input = end($this->global->formsStack)["tolerance"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                           <span class="input-group-addon">%</span>
                        </div>
                     </div>

                     <div class="row form-group required">
                        <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                           <label<?php
		$_input = end($this->global->formsStack)["difference"];
		echo $_input->getLabelPart()->attributes() ?>>Difference:</label>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4 input-group">
                           <input class="form-control"<?php
		$_input = end($this->global->formsStack)["difference"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                           <span class="input-group-addon">%</span>
                        </div>
                     </div>

                     <div class="row">
                        <div class="col-xs-12 col-md-6 offset-md-4 col-lg-4">
                           <p class="form-text text-muted">
                              <small>
                                 If will be value of difference larger than you set, Webshooter will send notification
                                 on your e-mail with comparision result.
                              </small>
                           </p>
                        </div>
                     </div>

                     <div class="row form-group margin-top">
                        <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                           <label<?php
		$_input = end($this->global->formsStack)["ignoreActive"];
		echo $_input->getLabelPart()->attributes() ?>>Enable ignore part:</label>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4 enable-repeat">
                           <label class="switch">
                              <input type="checkbox"<?php
		$_input = end($this->global->formsStack)["ignoreActive"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		))->attributes() ?>>
                              <div class="slider round"></div>
                           </label>
                        </div>
                     </div>

                  </fieldset>

                  <div id="ignore-part-definition">
                     <div class="row form-group required">
                        <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                           <label<?php
		$_input = end($this->global->formsStack)["ignoreTop"];
		echo $_input->getLabelPart()->attributes() ?>>Top:</label>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4 input-group">
                           <input class="form-control"<?php
		$_input = end($this->global->formsStack)["ignoreTop"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                           <span class="input-group-addon">px</span>
                        </div>
                     </div>

                     <div class="row form-group required">
                        <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                           <label<?php
		$_input = end($this->global->formsStack)["ignoreLeft"];
		echo $_input->getLabelPart()->attributes() ?>>Left:</label>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4 input-group">
                           <input class="form-control"<?php
		$_input = end($this->global->formsStack)["ignoreLeft"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                           <span class="input-group-addon">px</span>
                        </div>
                     </div>

                     <div class="row form-group required">
                        <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                           <label<?php
		$_input = end($this->global->formsStack)["ignoreWidth"];
		echo $_input->getLabelPart()->attributes() ?>>Width:</label>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4 input-group">
                           <input class="form-control"<?php
		$_input = end($this->global->formsStack)["ignoreWidth"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                           <span class="input-group-addon">px</span>
                        </div>
                     </div>

                     <div class="row form-group required">
                        <div class="col-xs-12 col-md-4 col-lg-4 control-label text-md-right">
                           <label<?php
		$_input = end($this->global->formsStack)["ignoreHeight"];
		echo $_input->getLabelPart()->attributes() ?>>Height:</label>
                        </div>
                        <div class="col-xs-12 col-md-6 col-lg-4 input-group">
                           <input class="form-control"<?php
		$_input = end($this->global->formsStack)["ignoreHeight"];
		echo $_input->getControlPart()->addAttributes(array (
		'class' => NULL,
		))->attributes() ?>>
                           <span class="input-group-addon">px</span>
                        </div>
                     </div>
                  </div>


                  <div class="row form-group margin-bottom">
                     <div class="col-xs-12 col-md-6 offset-md-4 col-lg-4">
                        <button type="submit" class="btn btn-primary"<?php
		$_input = end($this->global->formsStack)["save"];
		echo $_input->getControlPart()->addAttributes(array (
		'type' => NULL,
		'class' => NULL,
		))->attributes() ?>>
                           Save
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
