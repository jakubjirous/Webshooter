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
		if (isset($this->params['result'])) trigger_error('Variable $result overwritten in foreach on line 29');
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
                              <small class="float-lg-left">
                                 Top: <?php echo LR\Filters::escapeHtmlText($result->ignore_top) /* line 86 */ ?>px
                              </small>
                              <small class="float-lg-right">
                                 Left: <?php echo LR\Filters::escapeHtmlText($result->ignore_left) /* line 89 */ ?>px
                              </small>
                              <br>
                              <small class="float-lg-left">
                                 Width: <?php echo LR\Filters::escapeHtmlText($result->ignore_width) /* line 93 */ ?>px
                              </small>
                              <small class="float-lg-right">
                                 Height: <?php echo LR\Filters::escapeHtmlText($result->ignore_height) /* line 96 */ ?>px
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
                           <a
                                 class="btn btn-success btn-sm float-sm-right float-lg-none" href="<?php
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Plan:emailPreview", [$result->id_plan_result])) ?>">
                              Preview
                           </a>

                           <a
                                 class="btn btn-success btn-sm float-sm-right float-lg-none"
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
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 130 */;
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($result->source->path_img)) /* line 130 */ ?>" class="shoot-thumbnail"
                                 data-toggle="lightbox"
                                 data-parent="" data-gallery="#history-<?php echo LR\Filters::escapeHtmlAttr($iterator->counter) /* line 132 */ ?>" data-title="Plan source">
                                 <img class="img-thumbnail img-responsive" src="<?php
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 133 */;
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($result->source->path_img)) /* line 133 */ ?>"
                                      alt="<?php echo LR\Filters::escapeHtmlAttr($result->source->url_autority) /* line 134 */ ?>">
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
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 149 */;
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($result->plan_target->path_img)) /* line 149 */ ?>" class="shoot-thumbnail"
                                 data-toggle="lightbox"
                                 data-parent="" data-gallery="#history-<?php echo LR\Filters::escapeHtmlAttr($iterator->counter) /* line 151 */ ?>" data-title="Plan target">
                                 <img class="img-thumbnail img-responsive"
                                      src="<?php
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 153 */;
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($result->plan_target->path_img)) /* line 153 */ ?>"
                                      alt="<?php echo LR\Filters::escapeHtmlAttr($result->plan_target->url_autority) /* line 154 */ ?>">
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
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 170 */;
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($result->path_img)) /* line 170 */ ?>" class="shoot-thumbnail"
                                 data-toggle="lightbox"
                                 data-parent="" data-gallery="#history-<?php echo LR\Filters::escapeHtmlAttr($iterator->counter) /* line 172 */ ?>" data-title="Plan result">
                                 <img class="img-thumbnail img-responsive"
                                      src="<?php
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 174 */;
				echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($result->path_img)) /* line 174 */ ?>"
                                      alt="<?php echo LR\Filters::escapeHtmlAttr($result->plan_target->url_autority) /* line 175 */ ?>">
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
      </div>
   </div>
<?php
	}

}
