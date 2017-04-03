<?php
// source: C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\app\FrontModule\presenters/templates/Plan/history.latte

use Latte\Runtime as LR;

class Template8337f7cf84 extends Latte\Runtime\Template
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
		if (isset($this->params['result'])) trigger_error('Variable $result overwritten in foreach on line 29, 199');
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
?>      <h1>Results history</h1>
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
            <li class="breadcrumb-item"><a href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Plan:settings")) ?>">Plan settings</a></li>
            <li class="breadcrumb-item active">Results history</li>
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
      <div class="plan-history">

<?php
		if ($results) {
?>

<?php
			$iterations = 0;
			foreach ($iterator = $this->global->its[] = new LR\CachingIterator($results) as $result) {
				?>               <div class="history-item <?php
				if ($iterator->counter > 1) {
					?>hr<?php
				}
?>">
                  <table class="table table-striped">
                     <thead>
                     <tr>
                        <th>#</th>
                        <th>Date</th>
                        <th>E-mail</th>
                        <th>Result color</th>
                        <th>Result background</th>
                        <th>Tolerance</th>
                        <th>Difference</th>
                        <th>Result difference</th>
                        <th>Ignore part</th>
                        <th></th>
                     </tr>
                     </thead>
                     <tbody>
                     <tr>
                        <td data-title="#"><?php echo LR\Filters::escapeHtmlText($iterator->counter) /* line 48 */ ?></td>
                        <td data-title="Date">
                        <span>
                           <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $result->date, 'j.n.Y')) /* line 51 */ ?> <br>
                           <small>
                              <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $result->date, 'H:i')) /* line 53 */ ?>

                           </small>
                        </span>
                        </td>
                        <td data-title="E-mail">
                        <span>
                           <a href="mailto:<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($plan->primary_email)) /* line 59 */ ?>" title="Primary e-mail"><?php
				echo LR\Filters::escapeHtmlText($plan->primary_email) /* line 59 */ ?></a>
<?php
				if ($plan->secondary_email != NULL) {
?>
                              <br>
                              <small>
                                 <a href="mailto:<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($plan->secondary_email)) /* line 63 */ ?>"
                                    title="Secondary e-mail"><?php echo LR\Filters::escapeHtmlText($plan->secondary_email) /* line 64 */ ?></a>
                              </small>
<?php
				}
?>
                        </span>
                        </td>
                        <td class="color-<?php echo LR\Filters::escapeHtmlAttr($result->color) /* line 69 */ ?>" data-title="Result color">
                           <i class="fa fa-image" title="<?php echo LR\Filters::escapeHtmlAttr($result->color) /* line 70 */ ?>"></i>
                        </td>
                        <td data-title="Result background"><?php echo LR\Filters::escapeHtmlText($result->background) /* line 72 */ ?></td>
                        <td data-title="Tolerance"><?php echo LR\Filters::escapeHtmlText($result->tolerance) /* line 73 */ ?>%</td>
                        <td data-title="Difference">&le; <?php echo LR\Filters::escapeHtmlText($result->difference) /* line 74 */ ?>%</td>
                        <td data-title="Result difference">
<?php
				if ($result->difference_result <= $result->difference) {
					?>                              <i class="tag tag-success"><?php echo LR\Filters::escapeHtmlText($result->difference_result) /* line 77 */ ?>%</i>
<?php
				}
				else {
					?>                              <i class="tag tag-danger"><?php echo LR\Filters::escapeHtmlText($result->difference_result) /* line 79 */ ?>%</i>
<?php
				}
?>
                        </td>
                        <td data-title="Ignore part">
<?php
				if ($result->ignore_active) {
?>
                              <span>
                              <small class="float-xl-left">
                                 Top: <strong><?php echo LR\Filters::escapeHtmlText($result->ignore_top) /* line 86 */ ?></strong> px
                              </small>
                              <small class="float-xl-right">
                                 Left: <strong><?php echo LR\Filters::escapeHtmlText($result->ignore_left) /* line 89 */ ?></strong> px
                              </small>
                              <br>
                              <small class="float-xl-left">
                                 Width: <strong><?php echo LR\Filters::escapeHtmlText($result->ignore_width) /* line 93 */ ?></strong> px
                              </small>
                              <small class="float-xl-right">
                                 Height: <strong><?php echo LR\Filters::escapeHtmlText($result->ignore_height) /* line 96 */ ?></strong> px
                              </small>
                           </span>
<?php
				}
				else {
?>
                              <i class="fa fa-close"></i>
<?php
				}
?>
                        </td>
                        <td>
                           <a title="E-mail preview" target="_blank"
                                 class="btn btn-primary btn-sm" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Plan:emailPreview", [$result->id_plan_result])) ?>">
                              @
                           </a>
                           <button class="btn btn-warning btn-sm" title="History information" data-toggle="modal"
                                   data-target="#info-modal-<?php echo LR\Filters::escapeHtmlAttr($iterator->counter) /* line 109 */ ?>">
                              <i class="fa fa-info-circle"></i>
                           </button>
                           <a
                                 class="btn btn-success btn-sm"
                                 title="Send e-mail with result" data-confirm="Are you sure to send this result?" href="<?php
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sendEmail!", [$result->id_plan_result])) ?>">
                              <i class="fa fa-envelope"></i> Send
                           </a>
<?php
				if (isset($roleAdmin)) {
?>
                           <a
                                 class="btn btn-danger btn-sm float-sm-right float-lg-none" title="Delete history"
                                 data-confirm="Are you sure to delete this record in plan history?" href="<?php
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("deleteHistory!", [$result->id_plan_result])) ?>">
                              <i class="fa fa-trash"></i>
                           </a>
<?php
				}
?>
                        </td>
                     </tr>
                     </tbody>
                  </table>
                  <div class="row">
                     <div class="col-xs-12 col-sm-6 col-lg-4">
                        <div class="compare-result source">
                           <h5>Plan source</h5>
                           <div class="image">
                              <a href="<?php
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 133 */;
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($result->source->path_img)) /* line 133 */ ?>" class="shoot-thumbnail"
                                 data-toggle="lightbox"
                                 data-parent="" data-gallery="#history-<?php echo LR\Filters::escapeHtmlAttr($iterator->counter) /* line 135 */ ?>" data-title="Plan source">
                                 <img class="img-thumbnail img-responsive" src="<?php
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 136 */;
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($result->source->path_img)) /* line 136 */ ?>"
                                      alt="<?php echo LR\Filters::escapeHtmlAttr($result->source->url_autority) /* line 137 */ ?>">
                              </a>
                           </div>

                           <a
                                 class="btn btn-primary btn-outline-primary btn-sm" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("download!", [$result->source->id_shoot])) ?>">
                              <i class="fa fa-download"></i>
                              Download
                           </a>
                        </div>
                     </div>
                     <div class="col-xs-12 col-sm-6 col-lg-4">
                        <div class="compare-result target">
                           <h5>Plan target</h5>
                           <div class="image">
                              <a href="<?php
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 152 */;
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($result->plan_target->path_img)) /* line 152 */ ?>" class="shoot-thumbnail"
                                 data-toggle="lightbox"
                                 data-parent="" data-gallery="#history-<?php echo LR\Filters::escapeHtmlAttr($iterator->counter) /* line 154 */ ?>" data-title="Plan target">
                                 <img class="img-thumbnail img-responsive"
                                      src="<?php
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 156 */;
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($result->plan_target->path_img)) /* line 156 */ ?>"
                                      alt="<?php echo LR\Filters::escapeHtmlAttr($result->plan_target->url_autority) /* line 157 */ ?>">
                              </a>
                           </div>

                           <a
                                 class="btn btn-primary btn-outline-primary btn-sm" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("downloadTarget!", [$result->plan_target->id_plan_target])) ?>">
                              <i class="fa fa-download"></i>
                              Download
                           </a>
                        </div>
                     </div>

                     <div class="col-xs-12 col-lg-4">
                        <div class="compare-result result">
                           <h5>Plan result</h5>
                           <div class="image">
                              <a href="<?php
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 173 */;
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($result->path_img)) /* line 173 */ ?>" class="shoot-thumbnail"
                                 data-toggle="lightbox"
                                 data-parent="" data-gallery="#history-<?php echo LR\Filters::escapeHtmlAttr($iterator->counter) /* line 175 */ ?>" data-title="Plan result">
                                 <img class="img-thumbnail img-responsive"
                                      src="<?php
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 177 */;
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($result->path_img)) /* line 177 */ ?>"
                                      alt="<?php echo LR\Filters::escapeHtmlAttr($result->plan_target->url_autority) /* line 178 */ ?>">
                              </a>
                           </div>
                           <a
                                 class="btn btn-primary btn-outline-primary btn-sm" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("downloadResult!", [$result->id_plan_result])) ?>">
                              <i class="fa fa-download"></i>
                              Download
                           </a>
                        </div>
                     </div>
                  </div>
               </div>
<?php
				$iterations++;
			}
			array_pop($this->global->its);
			$iterator = end($this->global->its);
?>

<?php
		}
		else {
?>
            <div class="alert alert-info" role="alert">
               There is no results of comparison plan yet.
            </div>
<?php
		}
?>

<?php
		if ($results) {
			$iterations = 0;
			foreach ($iterator = $this->global->its[] = new LR\CachingIterator($results) as $result) {
				?>               <div class="modal right fade" id="info-modal-<?php echo LR\Filters::escapeHtmlAttr($iterator->counter) /* line 200 */ ?>" tabindex="-1" role="dialog"
                    aria-labelledby="info-modal-label-<?php echo LR\Filters::escapeHtmlAttr($iterator->counter) /* line 201 */ ?>" aria-hidden="true">
                  <div class="modal-dialog" role="document">
                     <div class="modal-content">
                        <div class="modal-header">
                           <h5 class="modal-title" id="info-modal-label-<?php echo LR\Filters::escapeHtmlAttr($iterator->counter) /* line 205 */ ?>">
                              Result information <br>
                              <small><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $result->date, 'd.m.Y H:i')) /* line 207 */ ?></small>
                           </h5>
                           <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                              <span aria-hidden="true">&times;</span>
                           </button>
                        </div>
                        <div class="modal-body">
                           <h5>Plan source</h5>
                           <table class="table">
                              <tr>
                                 <td>URL</td>
                                 <td><strong><a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($result->source->url)) /* line 218 */ ?>" target="_blank"><?php
				echo LR\Filters::escapeHtmlText($result->source->url_autority) /* line 218 */ ?></a></strong>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Engine</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $result->source->engine)) /* line 223 */ ?></strong></td>
                              </tr>
                              <tr>
                                 <td>Browser</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $result->source->browser_name)) /* line 227 */ ?> <?php
				echo LR\Filters::escapeHtmlText($result->source->browser_version) /* line 227 */ ?></strong></td>
                              </tr>
                              <tr>
                                 <td>Image type</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $result->source->img_type)) /* line 231 */ ?></strong></td>
                              </tr>
                              <tr>
                                 <td>Created</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $result->source->date, 'd.m.Y H:i:s')) /* line 235 */ ?></strong></td>
                              </tr>
                              <tr>
                                 <td>User</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText($result->source->user->username) /* line 239 */ ?></strong></td>
                              </tr>
                           </table>

                           <h5>Type definition</h5>

<?php
				if ($result->source->device != null) {
?>
                              <table class="table">
                                 <tr>
                                    <td>Device type</td>
                                    <td>
                                       <strong title="<?php echo LR\Filters::escapeHtmlAttr($result->source->device->type->type) /* line 250 */ ?>">
                                          <i class="fa fa-<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->lower, $result->source->device->type->type)) /* line 251 */ ?>"></i>
                                       </strong>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>Device</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText($result->source->device->device) /* line 257 */ ?></strong></td>
                                 </tr>
                                 <tr>
                                    <td>Platform</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText($result->source->device->platform) /* line 261 */ ?></strong></td>
                                 </tr>
                                 <tr>
                                    <td>Screen dimensions</td>
                                    <td>
                                       <strong>
                                          <?php echo LR\Filters::escapeHtmlText($result->source->device->screen_in) /* line 267 */ ?>

                                          <small>in</small> <?php echo LR\Filters::escapeHtmlText($result->source->device->screen_width_in) /* line 268 */ ?><small>×</small><?php
					echo LR\Filters::escapeHtmlText($result->source->device->screen_height_in) /* line 268 */ ?>

                                          <small>in</small>
                                          <br>
                                          <?php echo LR\Filters::escapeHtmlText($result->source->device->screen_cm) /* line 271 */ ?>

                                          <small>cm</small>
                                          <?php echo LR\Filters::escapeHtmlText($result->source->device->screen_width_cm) /* line 273 */ ?><small>×</small><?php
					echo LR\Filters::escapeHtmlText($result->source->device->screen_height_cm) /* line 273 */ ?>

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
                                          <?php echo LR\Filters::escapeHtmlText($result->source->device->width_px) /* line 285 */ ?><small>×</small><?php
					echo LR\Filters::escapeHtmlText($result->source->device->height_px) /* line 285 */ ?>

                                          <small>px</small>
                                          <br>
                                          <?php echo LR\Filters::escapeHtmlText($result->source->device->width_dp) /* line 288 */ ?><small>×</small><?php
					echo LR\Filters::escapeHtmlText($result->source->device->height_dp) /* line 288 */ ?>

                                          <small>dp</small>
                                       </strong>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td>Aspect ratio</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText($result->source->device->aspect_ratio) /* line 295 */ ?></strong></td>
                                 </tr>
                                 <tr>
                                    <td>Density</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->number, $result->source->device->density, 1)) /* line 299 */ ?></strong></td>
                                 </tr>
                              </table>
<?php
				}
				else {
					if ($result->source->other_width != null) {
?>
                                 <table class="table">
                                    <tr>
                                       <td>Type</td>
                                       <td><strong title="Custom"><i class="fa fa-cogs"></i></strong></td>
                                    </tr>
                                    <tr>
                                       <td>Custom width</td>
                                       <td><strong><?php echo LR\Filters::escapeHtmlText($result->source->other_width) /* line 311 */ ?>

                                             <small>px</small>
                                          </strong></td>
                                    </tr>
                                    <tr>
                                       <td>Custom height</td>
                                       <td>
                                          <strong><?php echo LR\Filters::escapeHtmlText($result->source->other_height == null ? 'MAX' : $result->source->other_height) /* line 318 */ ?>

                                             <small>px</small>
                                          </strong></td>
                                    </tr>
                                 </table>
<?php
					}
?>

<?php
					if ($result->source->crop_viewport_width != null and $result->source->crop_viewport_height != null) {
?>
                                 <table class="table">
                                    <tr>
                                       <td>Type</td>
                                       <td><strong title="Crop"><i class="fa fa-crop"></i></strong></td>
                                    </tr>
                                    <tr>
                                       <td>Viewport width</td>
                                       <td>
                                          <strong><?php echo LR\Filters::escapeHtmlText($result->source->crop_viewport_width == null ? 0 : $result->source->crop_viewport_width) /* line 334 */ ?>

                                             <small>px</small>
                                          </strong></td>
                                    </tr>
                                    <tr>
                                       <td>Viewport height</td>
                                       <td>
                                          <strong><?php echo LR\Filters::escapeHtmlText($result->source->crop_viewport_height == null ? 0 : $result->source->crop_viewport_height) /* line 341 */ ?>

                                             <small>px</small>
                                          </strong></td>
                                    </tr>
                                    <tr>
                                       <td>Top</td>
                                       <td><strong><?php echo LR\Filters::escapeHtmlText($result->source->crop_top == null ? 0 : $result->source->crop_top) /* line 347 */ ?>

                                             <small>px</small>
                                          </strong></td>
                                    </tr>
                                    <tr>
                                       <td>Left</td>
                                       <td><strong><?php echo LR\Filters::escapeHtmlText($result->source->crop_left == null ? 0 : $result->source->crop_left) /* line 353 */ ?>

                                             <small>px</small>
                                          </strong></td>
                                    </tr>
                                    <tr>
                                       <td>Crop width</td>
                                       <td><strong><?php echo LR\Filters::escapeHtmlText($result->source->crop_width == null ? 0 : $result->source->crop_width) /* line 359 */ ?>

                                             <small>px</small>
                                          </strong></td>
                                    </tr>
                                    <tr>
                                       <td>Crop height</td>
                                       <td><strong><?php echo LR\Filters::escapeHtmlText($result->source->crop_height == null ? 0 : $result->source->crop_height) /* line 365 */ ?>

                                             <small>px</small>
                                          </strong></td>
                                    </tr>
                                 </table>
<?php
					}
				}
?>
                        </div>
                        <div class="modal-footer text-xs-left">
                           <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        </div>
                     </div>
                  </div>
               </div>
<?php
				$iterations++;
			}
			array_pop($this->global->its);
			$iterator = end($this->global->its);
		}
?>
         
      </div>
   </div>
<?php
	}

}
