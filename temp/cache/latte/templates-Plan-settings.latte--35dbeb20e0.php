<?php
// source: C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\app\FrontModule\presenters/templates/Plan/settings.latte

use Latte\Runtime as LR;

class Template35dbeb20e0 extends Latte\Runtime\Template
{
	public $blocks = [
		'header' => 'blockHeader',
		'title' => 'blockTitle',
		'breadcrumb' => 'blockBreadcrumb',
		'content' => 'blockContent',
		'_pagination' => 'blockPagination',
	];

	public $blockTypes = [
		'header' => 'html',
		'title' => 'html',
		'breadcrumb' => 'html',
		'content' => 'html',
		'_pagination' => 'html',
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
		if (isset($this->params['plan'])) trigger_error('Variable $plan overwritten in foreach on line 91, 201');
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
?>      <h1>Plan settings</h1>
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
            <li class="breadcrumb-item active">Plan settings</li>
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
      <div class="plan-settings">

<div id="<?php echo htmlSpecialChars($this->global->snippetDriver->getHtmlId('pagination')) ?>"><?php $this->renderBlock('_pagination', $this->params) ?></div>      </div>
   </div>
<?php
	}


	function blockPagination($_args)
	{
		extract($_args);
		$this->global->snippetDriver->enter("pagination", "static");
?>


<?php
		if ($paginator->getPageCount() > 1) {
?>
            <nav aria-label="Shoots pagination" class="text-xs-center">
               <ul class="pagination pagination-sm justify-content-center">
<?php
			if ($paginator->first) {
?>
                     <li class="page-item disabled">
                        <a href="#" class="page-link" aria-label="Previous">
                           <span aria-hidden="true"><i class="fa fa-chevron-left"></i></span>
                           <span class="sr-only">Previous</span>
                        </a>
                     </li>
<?php
			}
			else {
?>
                     <li class="page-item">
                        <a class="page-link ajax" aria-label="Previous" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("paginator!", [$paginator->getPage() - 1])) ?>">
                           <span aria-hidden="true"><i class="fa fa-chevron-left"></i></span>
                           <span class="sr-only">Previous</span>
                        </a>
                     </li>
<?php
			}
			for ($page = 1;
			$page < $paginator->getPageCount() + 1;
			$page++) {
				?>                     <li class="page-item<?php
				if ($page == $paginator->getPage()) {
					?> active<?php
				}
?>">
                        <a class="page-link ajax" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("paginator!", [$page])) ?>"><?php
				echo LR\Filters::escapeHtmlText($page) /* line 49 */ ?></a>
                     </li>
<?php
			}
			if ($paginator->last) {
?>
                     <li class="page-item disabled">
                        <a href="#" class="page-link" aria-label="Next">
                           <span aria-hidden="true"><i class="fa fa-chevron-right"></i></span>
                           <span class="sr-only">Next</span>
                        </a>
                     </li>
<?php
			}
			else {
?>
                     <li class="page-item">
                        <a class="page-link ajax" aria-label="Next" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("paginator!", [$paginator->getPage() + 1])) ?>">
                           <span aria-hidden="true"><i class="fa fa-chevron-right"></i></span>
                           <span class="sr-only">Next</span>
                        </a>
                     </li>
<?php
			}
?>
               </ul>
            </nav>
<?php
		}
?>


<?php
		if ($plans) {
?>
            <table class="table table-striped">
               <thead>
               <tr>
                  <th>#</th>
                  <th>User</th>
                  <th>Start date</th>
                  <th>E-mail</th>
                  <th>Start <br> options</th>
                  <th>End <br> options</th>
                  <th>Result <br> color</th>
                  <th>Result <br> background</th>
                  <th>Result <br> tolerance</th>
                  <th>Result <br> difference</th>
                  <th>Ignore <br> part</th>
                  <th></th>
               </tr>
               </thead>
               <tbody>
<?php
			$iterations = 0;
			foreach ($iterator = $this->global->its[] = new LR\CachingIterator($plans) as $plan) {
?>
                  <tr>
                     <td data-title="#"><?php echo LR\Filters::escapeHtmlText($iterator->counter) /* line 93 */ ?></td>
                     <td data-title="User"><?php echo LR\Filters::escapeHtmlText($plan->user->username) /* line 94 */ ?></td>
                     <td data-title="Start date">
                           <span>
                              <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $plan->start_date, 'd.m.Y')) /* line 97 */ ?> <br>
                              <small><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $plan->start_date, 'H:i')) /* line 98 */ ?></small>
                           </span>
                     </td>
                     <td data-title="E-mail">
                           <span>
                              <a href="mailto:<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($plan->primary_email)) /* line 103 */ ?>" title="Primary e-mail"><?php
				echo LR\Filters::escapeHtmlText($plan->primary_email) /* line 103 */ ?></a>
<?php
				if ($plan->secondary_email != NULL) {
?>
                                 <br>
                                 <small>
                                    <a href="mailto:<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($plan->secondary_email)) /* line 107 */ ?>"
                                       title="Secondary e-mail"><?php echo LR\Filters::escapeHtmlText($plan->secondary_email) /* line 108 */ ?></a>
                                 </small>
<?php
				}
?>
                           </span>
                     </td>
                     <td data-title="Start options">
                           <span>
<?php
				if ($plan->status == TRUE) {
					?>                              <?php echo LR\Filters::escapeHtmlText($plan->start->type) /* line 116 */ ?>

                              <br>
                              <small>
                                 every <?php echo LR\Filters::escapeHtmlText($plan->start_value) /* line 119 */ ?>

<?php
					if ($plan->start_type == $daily) {
						?>                                    <?php echo LR\Filters::escapeHtmlText($plan->start_value == 1 ? 'day' : 'days') /* line 121 */ ?>

<?php
					}
					elseif ($plan->start_type == $weekly) {
						?>                                    <?php echo LR\Filters::escapeHtmlText($plan->start_value == 1 ? 'week' : 'weeks') /* line 123 */ ?>

<?php
					}
					elseif ($plan->start_type == $monthly) {
						?>                                    <?php echo LR\Filters::escapeHtmlText($plan->start_value == 1 ? 'month' : 'months') /* line 125 */ ?>

<?php
					}
					elseif ($plan->start_type == $yearly) {
						?>                                    <?php echo LR\Filters::escapeHtmlText($plan->start_value == 1 ? 'year' : 'years') /* line 127 */ ?>

<?php
					}
?>
                              </small>
<?php
				}
				else {
?>
                              <i class="fa fa-close"></i>
<?php
				}
?>
                           </span>
                     </td>
                     <td data-title="End options">
                           <span>
<?php
				if ($plan->status == TRUE) {
					if ($plan->end_type == $never) {
						?>                                 <?php echo LR\Filters::escapeHtmlText($plan->end->type) /* line 139 */ ?>

<?php
					}
					elseif ($plan->end_type == $occurrence) {
						?>                                 After <strong><?php echo LR\Filters::escapeHtmlText($plan->end_occurrence) /* line 141 */ ?></strong>
                                 <br>
                                 <small><?php echo LR\Filters::escapeHtmlText($plan->end_occurrence == 1 ? 'occurence' : 'occurences') /* line 143 */ ?></small>
<?php
					}
					elseif ($plan->end_type == $date) {
						?>                              <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $plan->end_date, 'd.m.Y')) /* line 145 */ ?>

                                 <br>
                                 <small><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $plan->end_date, 'H:i')) /* line 147 */ ?></small>
<?php
					}
				}
				else {
?>
                              <i class="fa fa-close"></i>
<?php
				}
?>
                           </span>
                     </td>
                     <td class="color-<?php echo LR\Filters::escapeHtmlAttr($plan->color) /* line 154 */ ?>" data-title="Result color">
                        <i class="fa fa-image" title="<?php echo LR\Filters::escapeHtmlAttr($plan->color) /* line 155 */ ?>"></i>
                     </td>
                     <td data-title="Result background"><?php echo LR\Filters::escapeHtmlText($plan->background) /* line 157 */ ?></td>
                     <td data-title="Result tolerance"><?php echo LR\Filters::escapeHtmlText($plan->tolerance) /* line 158 */ ?> %</td>
                     <td data-title="Result difference">&le; <?php echo LR\Filters::escapeHtmlText($plan->difference) /* line 159 */ ?> %</td>
                     <td data-title="Ignore part">
<?php
				if ($plan->ignore_active) {
?>
                           <i class="fa fa-check"></i>
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
                        <button class="btn btn-warning btn-sm" title="Detail plan information" data-toggle="modal"
                                data-target="#info-modal-<?php echo LR\Filters::escapeHtmlAttr($iterator->counter) /* line 169 */ ?>">
                           <i class="fa fa-info-circle"></i>
                        </button>
                        <a class="btn btn-success btn-sm"
                                                                title="History of plan results" href="<?php
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Plan:history", [$plan->id_plan])) ?>">
                           <i class="fa fa-history"></i>
                           <?php echo LR\Filters::escapeHtmlText($prm->getResultsCountInPlanByID($plan->id_plan)) /* line 175 */ ?>

                        </a>
                        <a class="btn btn-primary btn-sm" title="Detail" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Plan:detail", [$plan->id_plan])) ?>">
                           <i class="fa fa-edit"></i>
                        </a>
<?php
				if (isset($roleAdmin)) {
?>
                           <a class="btn btn-danger btn-sm float-sm-right float-lg-none"
                                                              title="Delete plan"
                                                              data-confirm="Are you sure to delete this plan?" href="<?php
					echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("delete!", [$plan->id_plan])) ?>">
                              <i class="fa fa-trash"></i>
                           </a>
<?php
				}
?>
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
		}
		else {
?>
            <div class="alert alert-info" role="alert">
               There is no plan yet.
            </div>
<?php
		}
?>



<?php
		if ($plans) {
			$iterations = 0;
			foreach ($iterator = $this->global->its[] = new LR\CachingIterator($plans) as $plan) {
				?>            <div class="modal fade" id="info-modal-<?php echo LR\Filters::escapeHtmlAttr($iterator->counter) /* line 202 */ ?>" tabindex="-1" role="dialog"
                 aria-labelledby="info-modal-label-<?php echo LR\Filters::escapeHtmlAttr($iterator->counter) /* line 203 */ ?>" aria-hidden="true">
               <div class="modal-dialog" role="document">
                  <div class="modal-content">
                     <div class="modal-header">
                        <h5 class="modal-title" id="info-modal-label-<?php echo LR\Filters::escapeHtmlAttr($iterator->counter) /* line 207 */ ?>">
                           Plan information <br>
                           <small><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $plan->start_date, 'd.m.Y H:i')) /* line 209 */ ?></small>
                        </h5>
                        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                           <span aria-hidden="true">&times;</span>
                        </button>
                     </div>
                     <div class="modal-body">
                        <h5>Source shoot</h5>

                        <div class="image">
                           <div>
                              <img class="img-thumbnail img-responsive" src="<?php
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 220 */;
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($plan->source->path_img)) /* line 220 */ ?>"
                                   alt="<?php echo LR\Filters::escapeHtmlAttr($plan->source->url_autority) /* line 221 */ ?>">
                           </div>
                        </div>

                        <table class="table">
                           <tr>
                              <td>URL</td>
                              <td><strong><a href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($plan->source->url)) /* line 228 */ ?>" target="_blank"><?php
				echo LR\Filters::escapeHtmlText($plan->source->url_autority) /* line 228 */ ?></a></strong>
                              </td>
                           </tr>
                           <tr>
                              <td>Engine</td>
                              <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $plan->source->engine)) /* line 233 */ ?></strong></td>
                           </tr>
                           <tr>
                              <td>Browser</td>
                              <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->firstupper, $plan->source->browser_name)) /* line 237 */ ?> <?php
				echo LR\Filters::escapeHtmlText($plan->source->browser_version) /* line 237 */ ?></strong></td>
                           </tr>
                           <tr>
                              <td>Image type</td>
                              <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->upper, $plan->source->img_type)) /* line 241 */ ?></strong></td>
                           </tr>
                           <tr>
                              <td>Created</td>
                              <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $plan->source->date, 'd.n.Y H:i:s')) /* line 245 */ ?></strong></td>
                           </tr>
                        </table>

                        <h5>Type definition</h5>

<?php
				if ($plan->source->device != null) {
?>
                           <table class="table">
                              <tr>
                                 <td>Device type</td>
                                 <td>
                                    <strong title="<?php echo LR\Filters::escapeHtmlAttr($plan->source->device->type->type) /* line 256 */ ?>">
                                       <i class="fa fa-<?php echo LR\Filters::escapeHtmlAttr(call_user_func($this->filters->lower, $plan->source->device->type->type)) /* line 257 */ ?>"></i>
                                    </strong>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Device</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText($plan->source->device->device) /* line 263 */ ?></strong></td>
                              </tr>
                              <tr>
                                 <td>Platform</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText($plan->source->device->platform) /* line 267 */ ?></strong></td>
                              </tr>
                              <tr>
                                 <td>Screen dimensions</td>
                                 <td>
                                    <strong>
                                       <?php echo LR\Filters::escapeHtmlText($plan->source->device->screen_in) /* line 273 */ ?>

                                       <small>in</small> <?php echo LR\Filters::escapeHtmlText($plan->source->device->screen_width_in) /* line 274 */ ?><small>×</small><?php
					echo LR\Filters::escapeHtmlText($plan->source->device->screen_height_in) /* line 274 */ ?>

                                       <small>in</small>
                                       <br>
                                       <?php echo LR\Filters::escapeHtmlText($plan->source->device->screen_cm) /* line 277 */ ?>

                                       <small>cm</small>
                                       <?php echo LR\Filters::escapeHtmlText($plan->source->device->screen_width_cm) /* line 279 */ ?><small>×</small><?php
					echo LR\Filters::escapeHtmlText($plan->source->device->screen_height_cm) /* line 279 */ ?>

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
                                       <?php echo LR\Filters::escapeHtmlText($plan->source->device->width_px) /* line 291 */ ?><small>×</small><?php
					echo LR\Filters::escapeHtmlText($plan->source->device->height_px) /* line 291 */ ?>

                                       <small>px</small>
                                       <br>
                                       <?php echo LR\Filters::escapeHtmlText($plan->source->device->width_dp) /* line 294 */ ?><small>×</small><?php
					echo LR\Filters::escapeHtmlText($plan->source->device->height_dp) /* line 294 */ ?>

                                       <small>dp</small>
                                    </strong>
                                 </td>
                              </tr>
                              <tr>
                                 <td>Aspect ratio</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText($plan->source->device->aspect_ratio) /* line 301 */ ?></strong></td>
                              </tr>
                              <tr>
                                 <td>Density</td>
                                 <td><strong><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->number, $plan->source->device->density, 1)) /* line 305 */ ?></strong></td>
                              </tr>
                           </table>
<?php
				}
				else {
					if ($plan->source->other_width != null) {
?>
                              <table class="table">
                                 <tr>
                                    <td>Type</td>
                                    <td><strong title="Custom"><i class="fa fa-cogs"></i></strong></td>
                                 </tr>
                                 <tr>
                                    <td>Custom width</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText($plan->source->other_width) /* line 317 */ ?>

                                          <small>px</small>
                                       </strong></td>
                                 </tr>
                                 <tr>
                                    <td>Custom height</td>
                                    <td>
                                       <strong><?php echo LR\Filters::escapeHtmlText($plan->source->other_height == null ? 'MAX' : $plan->source->other_height) /* line 324 */ ?>

                                          <small>px</small>
                                       </strong></td>
                                 </tr>
                              </table>
<?php
					}
?>

<?php
					if ($plan->source->crop_viewport_width != null and $plan->source->crop_viewport_height != null) {
?>
                              <table class="table">
                                 <tr>
                                    <td>Type</td>
                                    <td><strong title="Crop"><i class="fa fa-crop"></i></strong></td>
                                 </tr>
                                 <tr>
                                    <td>Viewport width</td>
                                    <td>
                                       <strong><?php echo LR\Filters::escapeHtmlText($plan->source->crop_viewport_width == null ? 0 : $plan->source->crop_viewport_width) /* line 340 */ ?>

                                          <small>px</small>
                                       </strong></td>
                                 </tr>
                                 <tr>
                                    <td>Viewport height</td>
                                    <td>
                                       <strong><?php echo LR\Filters::escapeHtmlText($plan->source->crop_viewport_height == null ? 0 : $plan->source->crop_viewport_height) /* line 347 */ ?>

                                          <small>px</small>
                                       </strong></td>
                                 </tr>
                                 <tr>
                                    <td>Top</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText($plan->source->crop_top == null ? 0 : $plan->source->crop_top) /* line 353 */ ?>

                                          <small>px</small>
                                       </strong></td>
                                 </tr>
                                 <tr>
                                    <td>Left</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText($plan->source->crop_left == null ? 0 : $plan->source->crop_left) /* line 359 */ ?>

                                          <small>px</small>
                                       </strong></td>
                                 </tr>
                                 <tr>
                                    <td>Crop width</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText($plan->source->crop_width == null ? 0 : $plan->source->crop_width) /* line 365 */ ?>

                                          <small>px</small>
                                       </strong></td>
                                 </tr>
                                 <tr>
                                    <td>Crop height</td>
                                    <td><strong><?php echo LR\Filters::escapeHtmlText($plan->source->crop_height == null ? 0 : $plan->source->crop_height) /* line 371 */ ?>

                                          <small>px</small>
                                       </strong></td>
                                 </tr>
                              </table>
<?php
					}
				}
?>
                     </div>
                     <div class="modal-footer">
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


<?php
		if ($paginator->getPageCount() > 1) {
?>
            <nav aria-label="Shoots pagination" class="text-xs-center">
               <ul class="pagination justify-content-center">
<?php
			if ($paginator->first) {
?>
                     <li class="page-item disabled">
                        <a href="#" class="page-link" aria-label="Previous">
                           <span aria-hidden="true"><i class="fa fa-chevron-left"></i></span>
                           <span class="sr-only">Previous</span>
                        </a>
                     </li>
<?php
			}
			else {
?>
                     <li class="page-item">
                        <a class="page-link ajax" aria-label="Previous" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("paginator!", [$paginator->getPage() - 1])) ?>">
                           <span aria-hidden="true"><i class="fa fa-chevron-left"></i></span>
                           <span class="sr-only">Previous</span>
                        </a>
                     </li>
<?php
			}
			for ($page = 1;
			$page < $paginator->getPageCount() + 1;
			$page++) {
				?>                     <li class="page-item<?php
				if ($page == $paginator->getPage()) {
					?> active<?php
				}
?>">
                        <a class="page-link ajax" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("paginator!", [$page])) ?>"><?php
				echo LR\Filters::escapeHtmlText($page) /* line 409 */ ?></a>
                     </li>
<?php
			}
			if ($paginator->last) {
?>
                     <li class="page-item disabled">
                        <a href="#" class="page-link" aria-label="Next">
                           <span aria-hidden="true"><i class="fa fa-chevron-right"></i></span>
                           <span class="sr-only">Next</span>
                        </a>
                     </li>
<?php
			}
			else {
?>
                     <li class="page-item">
                        <a class="page-link ajax" aria-label="Next" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("paginator!", [$paginator->getPage() + 1])) ?>">
                           <span aria-hidden="true"><i class="fa fa-chevron-right"></i></span>
                           <span class="sr-only">Next</span>
                        </a>
                     </li>
<?php
			}
?>
               </ul>
            </nav>
<?php
		}
?>

            <script>
               $('.page-link').on('click', function () {
                  $('html, body').animate({
                     scrollTop: 0
                  }, 'slow');
                  return false;
               });
            </script>

<?php
		$this->global->snippetDriver->leave();
		
	}

}
