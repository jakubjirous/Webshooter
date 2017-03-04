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
		if (isset($this->params['plan'])) trigger_error('Variable $plan overwritten in foreach on line 43');
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
               <td><?php echo LR\Filters::escapeHtmlText($iterator->counter) /* line 45 */ ?></td>
               <td><?php echo LR\Filters::escapeHtmlText($plan->user->username) /* line 46 */ ?></td>
               <td>
                  <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $plan->start_date, 'd.m.Y')) /* line 48 */ ?>

                  <br>
                  <small><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $plan->start_date, 'H:i')) /* line 50 */ ?></small>
               </td>
               <td>
                  <a href="mailto:<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($plan->primary_email)) /* line 53 */ ?>"><?php
			echo LR\Filters::escapeHtmlText($plan->primary_email) /* line 53 */ ?></a>
<?php
			if ($plan->secondary_email != NULL) {
				?>                     <br> <a href="mailto:<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($plan->secondary_email)) /* line 55 */ ?>"><?php
				echo LR\Filters::escapeHtmlText($plan->secondary_email) /* line 55 */ ?></a>
<?php
			}
?>
               </td>
               <td>
<?php
			if ($plan->status == TRUE) {
				?>                     <?php echo LR\Filters::escapeHtmlText($plan->start->type) /* line 60 */ ?>

                     <br>
                     <small>
                        every <?php echo LR\Filters::escapeHtmlText($plan->start_value) /* line 63 */ ?>

<?php
				if ($plan->start_type == $daily) {
					?>                           <?php echo LR\Filters::escapeHtmlText($plan->start_value == 1 ? 'day' : 'days') /* line 65 */ ?>

<?php
				}
				elseif ($plan->start_type == $weekly) {
					?>                           <?php echo LR\Filters::escapeHtmlText($plan->start_value == 1 ? 'week' : 'weeks') /* line 67 */ ?>

<?php
				}
				elseif ($plan->start_type == $monthly) {
					?>                           <?php echo LR\Filters::escapeHtmlText($plan->start_value == 1 ? 'month' : 'monthss') /* line 69 */ ?>

<?php
				}
				elseif ($plan->start_type == $yearly) {
					?>                           <?php echo LR\Filters::escapeHtmlText($plan->start_value == 1 ? 'year' : 'years') /* line 71 */ ?>

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
               </td>
               <td>
<?php
			if ($plan->status == TRUE) {
				if ($plan->end_type == $never) {
					?>                        <?php echo LR\Filters::escapeHtmlText($plan->end->type) /* line 81 */ ?>

<?php
				}
				elseif ($plan->end_type == $occurrence) {
					?>                        After <strong><?php echo LR\Filters::escapeHtmlText($plan->end_occurrence) /* line 83 */ ?></strong>
                        <br>
                        <small><?php echo LR\Filters::escapeHtmlText($plan->end_occurrence == 1 ? 'occurence' : 'occurences') /* line 85 */ ?></small>
<?php
				}
				elseif ($plan->end_type == $date) {
					?>                     <?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $plan->end_date, 'd.m.Y')) /* line 87 */ ?>

                        <br>
                        <small><?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $plan->end_date, 'H:i')) /* line 89 */ ?></small>
<?php
				}
			}
			else {
?>
                     <i class="fa fa-close"></i>
<?php
			}
?>
               </td>
               <td class="color-<?php echo LR\Filters::escapeHtmlAttr($plan->color) /* line 95 */ ?>">
                  <i class="fa fa-image" title="<?php echo LR\Filters::escapeHtmlAttr($plan->color) /* line 96 */ ?>"></i>
               </td>
               <td><?php echo LR\Filters::escapeHtmlText($plan->background) /* line 98 */ ?></td>
               <td><?php echo LR\Filters::escapeHtmlText($plan->tolerance) /* line 99 */ ?> %</td>
               <td>&le; <?php echo LR\Filters::escapeHtmlText($plan->difference) /* line 100 */ ?> %</td>
               <td>
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
                  <a class="btn btn-primary btn-sm" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("Plan:detail", [$plan->id_plan])) ?>">
                     <i class="fa fa-edit"></i>
                  </a>
                  <a class="btn btn-danger btn-sm" title="Delete plan"
                     data-confirm="Are you sure to delete this plan?" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("delete!", [$plan->id_plan])) ?>">
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
   </div>
<?php
	}

}
