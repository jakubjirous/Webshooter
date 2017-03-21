<?php
// source: C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\app\FrontModule\presenters\templates\components\FrontMenu/frontMenu.latte

use Latte\Runtime as LR;

class Templatea10196a76c extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<nav class="navbar navbar-light navbar-fixed-top bg-faded">
   <div class="container">
      <a class="navbar-brand float-xs-right float-lg-left" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Homepage:default")) ?>">
         <i class="fa fa-photo"></i>
         Webshooter
      </a>
      <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarResponsive"
              aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"></button>
      <div class="collapse navbar-toggleable-md" id="navbarResponsive">
         <ul class="nav navbar-nav">
<?php
		if (isset($isLoggedIn)) {
			if ($role == $roleAdmin or $role == $roleSuperUser) {
				?>                  <li class="nav-item<?php
				if ($this->global->uiPresenter->isLinkCurrent('Device:*')) {
					?> active<?php
				}
?>">
                     <a class="nav-link" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Device:settings")) ?>">Device settings</a>
                  </li>
                  <li class="nav-item<?php
				if ($this->global->uiPresenter->isLinkCurrent('Shoot:add')) {
					?> active<?php
				}
				if ($this->global->uiPresenter->isLinkCurrent('Shoot:list')) {
					?> active<?php
				}
				if ($this->global->uiPresenter->isLinkCurrent('Shoot:settings')) {
					?> active<?php
				}
?>">
                     <a class="nav-link" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Shoot:settings")) ?>">Shoot settings</a>
                  </li>
                  <li class="nav-item<?php
				if ($this->global->uiPresenter->isLinkCurrent('Shoot:user')) {
					?> active<?php
				}
?>">
                     <a class="nav-link" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Shoot:user")) ?>">User shoots</a>
                  </li>
                  <li class="nav-item<?php
				if ($this->global->uiPresenter->isLinkCurrent('Plan:*')) {
					?> active<?php
				}
?>">
                     <a class="nav-link" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Plan:settings")) ?>">Plan settings</a>
                  </li>
<?php
			}
?>

<?php
			if ($role == $roleUser) {
				?>                  <li class="nav-item<?php
				if ($this->global->uiPresenter->isLinkCurrent('Device:*')) {
					?> active<?php
				}
?>">
                     <a class="nav-link" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Device:settings")) ?>">Device settings</a>
                  </li>
                  <li class="nav-item<?php
				if ($this->global->uiPresenter->isLinkCurrent('Shoot:add')) {
					?> active<?php
				}
				if ($this->global->uiPresenter->isLinkCurrent('Shoot:list')) {
					?> active<?php
				}
				if ($this->global->uiPresenter->isLinkCurrent('Shoot:settings')) {
					?> active<?php
				}
?>">
                     <a class="nav-link" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Shoot:settings")) ?>">Shoot settings</a>
                  </li>
                  <li class="nav-item<?php
				if ($this->global->uiPresenter->isLinkCurrent('Plan:*')) {
					?> active<?php
				}
?>">
                     <a class="nav-link" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Plan:settings")) ?>">Plan settings</a>
                  </li>
<?php
			}
?>

<?php
		}
		else {
			?>               <li class="nav-item<?php
			if ($this->global->uiPresenter->isLinkCurrent('Device:*')) {
				?> active<?php
			}
?>">
                  <a class="nav-link" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Device:list")) ?>">Device metrics</a>
               </li>
               <li class="nav-item<?php
			if ($this->global->uiPresenter->isLinkCurrent('Shoot:*')) {
				?> active<?php
			}
?>">
                  <a class="nav-link" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Shoot:list")) ?>">Web shoots</a>
               </li>
<?php
		}
?>
         </ul>

         <ul class="nav navbar-nav float-lg-right">
<?php
		if (isset($isLoggedIn)) {
?>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="#" id="responsiveNavbarDropdown"
                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fa fa-cogs"></i>
                     Settings
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="responsiveNavbarDropdown">
                     <h6 class="dropdown-header"><?php echo LR\Filters::escapeHtmlText($identity->username) /* line 60 */ ?></h6>

                     <a class="dropdown-item" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("User:account", [$userID])) ?>">
                        <i class="fa fa-user"></i>
                        My account
                     </a>

                     <div class="dropdown-divider"></div>

<?php
			if ($role == $roleAdmin) {
				?>                        <a class="dropdown-item" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("User:list")) ?>">
                           <i class="fa fa-users"></i>
                           User settings
                        </a>
                        <a class="dropdown-item" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Device:settings")) ?>">
                           <i class="fa fa-desktop"></i>
                           Device settings
                        </a>
                        <a class="dropdown-item" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Shoot:settings")) ?>">
                           <i class="fa fa-bullseye"></i>
                           Shoots settings
                        </a>
                        <a class="dropdown-item" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Shoot:user")) ?>">
                           <i class="fa fa-bullseye"></i>
                           User shoots
                        </a>
                        <a class="dropdown-item" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Plan:settings")) ?>">
                           <i class="fa fa-calendar-o"></i>
                           Plan settings
                        </a>
<?php
			}
?>

<?php
			if ($role == $roleSuperUser) {
				?>                        <a class="dropdown-item" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Device:settings")) ?>">
                           <i class="fa fa-desktop"></i>
                           Device settings
                        </a>
                        <a class="dropdown-item" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Shoot:settings")) ?>">
                           <i class="fa fa-bullseye"></i>
                           Shoots settings
                        </a>
                        <a class="dropdown-item" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Shoot:user")) ?>">
                           <i class="fa fa-bullseye"></i>
                           User shoots
                        </a>
                        <a class="dropdown-item" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Plan:settings")) ?>">
                           <i class="fa fa-calendar-o"></i>
                           Plan settings
                        </a>
<?php
			}
?>

<?php
			if ($role == $roleUser) {
				?>                        <a class="dropdown-item" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Device:settings")) ?>">
                           <i class="fa fa-desktop"></i>
                           Device settings
                        </a>
                        <a class="dropdown-item" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Shoot:settings")) ?>">
                           <i class="fa fa-bullseye"></i>
                           Shoots settings
                        </a>
                        <a class="dropdown-item" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Plan:settings")) ?>">
                           <i class="fa fa-calendar-o"></i>
                           Plan settings
                        </a>
<?php
			}
?>

                     <div class="dropdown-divider"></div>

                     <a class="dropdown-item" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Sign:out")) ?>">
                        <i class="fa fa-sign-out"></i>
                        Sign out
                     </a>
                  </div>
               </li>
<?php
		}
		else {
			?>               <li class="nav-item<?php
			if ($this->global->uiPresenter->isLinkCurrent('Sign:in')) {
				?> active<?php
			}
?>">
                  <a class="nav-link" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Sign:in")) ?>"><i class="fa fa-sign-in"></i> Sign in</a>
               </li>
<?php
		}
?>
         </ul>
      </div>
   </div>
</nav>
<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}

}
