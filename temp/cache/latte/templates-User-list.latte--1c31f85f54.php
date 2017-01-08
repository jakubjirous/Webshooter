<?php
// source: C:\Users\WPJ3Station\Disk Google\James\LOCALHOST\DP\WS\app\FrontModule\presenters/templates/User/list.latte

use Latte\Runtime as LR;

class Template1c31f85f54 extends Latte\Runtime\Template
{
	public $blocks = [
		'header' => 'blockHeader',
		'title' => 'blockTitle',
		'breadcrumbContent' => 'blockBreadcrumbContent',
		'content' => 'blockContent',
		'_userList' => 'blockUserList',
	];

	public $blockTypes = [
		'header' => 'html',
		'title' => 'html',
		'breadcrumbContent' => 'html',
		'content' => 'html',
		'_userList' => 'html',
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
		if (isset($this->params['person'])) trigger_error('Variable $person overwritten in foreach on line 90');
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
?>      <h1>User settings</h1>
<?php
	}


	function blockBreadcrumbContent($_args)
	{
?>   <li class="breadcrumb-item active">User settings</li>
<?php
	}


	function blockContent($_args)
	{
		extract($_args);
?>
   <div class="container">
      <div class="user-list">
         <div class="row">
            <div class="col-xs-12">

               <div class="user-new text-xs-center text-sm-left">
                  <a class="btn btn-success" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("User:add")) ?>">
                     <i class="fa fa-plus"></i>
                     Add new user
                  </a>
               </div>

<div id="<?php echo htmlSpecialChars($this->global->snippetDriver->getHtmlId('userList')) ?>"><?php $this->renderBlock('_userList', $this->params) ?></div>
            </div>
         </div>
      </div>
   </div>
<?php
	}


	function blockUserList($_args)
	{
		extract($_args);
		$this->global->snippetDriver->enter("userList", "static");
?>
                  <table class="table table-striped table-sm">
                     <thead>
                     <tr>
                        <th>
<?php
		if ($sortColumn == 'username' and $sortOrder == 'asc') {
			?>                              <a class="ajax active" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['username', 'desc'])) ?>">
                                 <i class="fa fa-long-arrow-down"></i>
                                 Username
                              </a>
<?php
		}
		elseif ($sortColumn == 'username' and $sortOrder == 'desc') {
			?>                              <a class="ajax active" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['username', 'asc'])) ?>">
                                 <i class="fa fa-long-arrow-up"></i>
                                 Username
                              </a>
<?php
		}
		else {
			?>                              <a class="ajax" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['username', 'asc'])) ?>">
                                 <i class="fa fa-long-arrow-down"></i>
                                 Username
                              </a>
<?php
		}
?>
                        </th>
                        <th>
<?php
		if ($sortColumn == 'email' and $sortOrder == 'asc') {
			?>                              <a class="ajax active" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['email', 'desc'])) ?>">
                                 <i class="fa fa-long-arrow-down"></i>
                                 E-mail
                              </a>
<?php
		}
		elseif ($sortColumn == 'email' and $sortOrder == 'desc') {
			?>                              <a class="ajax active" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['email', 'asc'])) ?>">
                                 <i class="fa fa-long-arrow-up"></i>
                                 E-mail
                              </a>
<?php
		}
		else {
			?>                              <a class="ajax" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['email', 'asc'])) ?>">
                                 <i class="fa fa-long-arrow-down"></i>
                                 E-mail
                              </a>
<?php
		}
?>
                        </th>
                        <th>
<?php
		if ($sortColumn == 'id_role' and $sortOrder == 'asc') {
			?>                              <a class="ajax active" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['id_role', 'desc'])) ?>">
                                 <i class="fa fa-long-arrow-down"></i>
                                 Role
                              </a>
<?php
		}
		elseif ($sortColumn == 'id_role' and $sortOrder == 'desc') {
			?>                              <a class="ajax active" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['id_role', 'asc'])) ?>">
                                 <i class="fa fa-long-arrow-up"></i>
                                 Role
                              </a>
<?php
		}
		else {
			?>                              <a class="ajax" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("sort!", ['id_role', 'asc'])) ?>">
                                 <i class="fa fa-long-arrow-down"></i>
                                 Role
                              </a>
<?php
		}
?>
                        </th>
                        <th></th>
                     </tr>
                     </thead>
                     <tbody>
<?php
		$iterations = 0;
		foreach ($userList as $person) {
?>
                        <tr>
                           <td data-title="Username"><?php echo LR\Filters::escapeHtmlText($person->username) /* line 92 */ ?></td>
                           <td data-title="E-mail"><?php echo LR\Filters::escapeHtmlText($person->email) /* line 93 */ ?></td>
                           <td data-title="Role"><?php echo LR\Filters::escapeHtmlText($person->role->role) /* line 94 */ ?></td>
                           <td>
                              <a class="btn btn-primary btn-sm" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("User:detail", [$person->id_user])) ?>">
                                 <i class="fa fa-edit"></i>
                                 Detail
                              </a>
<?php
			if (isset($isRoleAdmin)) {
				if ($person->id_role != $roleAdmin) {
?>
                                    <a
                                          class="btn btn-danger btn-sm float-sm-right float-lg-none"
                                          data-confirm="Are you sure to delete this user?" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiControl->link("delete!", [$person->id_user])) ?>">
                                       <i class="fa fa-trash"></i>
                                    </a>
<?php
				}
			}
?>
                           </td>
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

}
