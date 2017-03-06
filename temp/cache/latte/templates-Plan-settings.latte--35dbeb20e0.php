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
		if (isset($this->params['plan'])) trigger_error('Variable $plan overwritten in foreach on line 45');
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
                     <td data-title="#"><?php echo LR\Filters::escapeHtmlText($iterator->counter) /* line 47 */ ?></td>
                     <td data-title="User"><?php echo LR\Filters::escapeHtmlText($plan->user->username) /* line 48 */ ?></td>
                     <td data-title="Start date">
                        <span>
                           <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $plan->start_date, 'd.m.Y')) /* line 51 */ ?> <br>
                           <small><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $plan->start_date, 'H:i')) /* line 52 */ ?></small>
                        </span>
                     </td>
                     <td data-title="E-mail">
                        <span>
                           <a href="mailto:<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($plan->primary_email)) /* line 57 */ ?>" title="Primary e-mail"><?php
				echo LR\Filters::escapeHtmlText($plan->primary_email) /* line 57 */ ?></a>
<?php
				if ($plan->secondary_email != NULL) {
?>
                              <br>
                              <small>
                                 <a href="mailto:<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($plan->secondary_email)) /* line 61 */ ?>" title="Secondary e-mail"><?php
					echo LR\Filters::escapeHtmlText($plan->secondary_email) /* line 61 */ ?></a>
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
					?>                           <?php echo LR\Filters::escapeHtmlText($plan->start->type) /* line 69 */ ?>

                           <br>
                           <small>
                              every <?php echo LR\Filters::escapeHtmlText($plan->start_value) /* line 72 */ ?>

<?php
					if ($plan->start_type == $daily) {
						?>                                 <?php echo LR\Filters::escapeHtmlText($plan->start_value == 1 ? 'day' : 'days') /* line 74 */ ?>

<?php
					}
					elseif ($plan->start_type == $weekly) {
						?>                                 <?php echo LR\Filters::escapeHtmlText($plan->start_value == 1 ? 'week' : 'weeks') /* line 76 */ ?>

<?php
					}
					elseif ($plan->start_type == $monthly) {
						?>                                 <?php echo LR\Filters::escapeHtmlText($plan->start_value == 1 ? 'month' : 'months') /* line 78 */ ?>

<?php
					}
					elseif ($plan->start_type == $yearly) {
						?>                                 <?php echo LR\Filters::escapeHtmlText($plan->start_value == 1 ? 'year' : 'years') /* line 80 */ ?>

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
						?>                              <?php echo LR\Filters::escapeHtmlText($plan->end->type) /* line 92 */ ?>

<?php
					}
					elseif ($plan->end_type == $occurrence) {
						?>                              After <strong><?php echo LR\Filters::escapeHtmlText($plan->end_occurrence) /* line 94 */ ?></strong>
                              <br>
                              <small><?php echo LR\Filters::escapeHtmlText($plan->end_occurrence == 1 ? 'occurence' : 'occurences') /* line 96 */ ?></small>
<?php
					}
					elseif ($plan->end_type == $date) {
						?>                           <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $plan->end_date, 'd.m.Y')) /* line 98 */ ?>

                              <br>
                              <small><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $plan->end_date, 'H:i')) /* line 100 */ ?></small>
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
                     <td class="color-<?php echo LR\Filters::escapeHtmlAttr($plan->color) /* line 107 */ ?>" data-title="Result color">
                        <i class="fa fa-image" title="<?php echo LR\Filters::escapeHtmlAttr($plan->color) /* line 108 */ ?>"></i>
                     </td>
                     <td data-title="Result background"><?php echo LR\Filters::escapeHtmlText($plan->background) /* line 110 */ ?></td>
                     <td data-title="Result tolerance"><?php echo LR\Filters::escapeHtmlText($plan->tolerance) /* line 111 */ ?> %</td>
                     <td data-title="Result difference">&le; <?php echo LR\Filters::escapeHtmlText($plan->difference) /* line 112 */ ?> %</td>
                     <td data-title="Ignore part">
<?php
				if ($plan->ignore_top != NULL && $plan->ignore_left != NULL && $plan->ignore_width != NULL && $plan->ignore_height != NULL) {
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
                        <a class="btn btn-primary btn-sm" title="Detail" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Plan:detail", [$plan->id_plan])) ?>">
                           <i class="fa fa-edit"></i>
                        </a>
                        <a class="btn btn-danger btn-sm float-sm-right float-lg-none" title="Delete plan"
                                                           data-confirm="Are you sure to delete this plan?" href="<?php
				echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("delete!", [$plan->id_plan])) ?>">
                           <i class="fa fa-trash"></i>
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
		}
		else {
?>
            <div class="alert alert-info" role="alert">
               There is no comparison plan yet.
            </div>
<?php
		}
?>
      </div>
   </div>
<?php
	}

}