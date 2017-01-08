<?php
// source: C:\Users\WPJ3Station\Disk Google\James\LOCALHOST\DP\WSM\app\FrontModule\presenters\templates\components\FrontMenu/frontMenu.latte

use Latte\Runtime as LR;

class Template2f8b012131 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<nav class="navbar navbar-light navbar-fixed-top bg-faded">
   <div class="container">
      <button class="navbar-toggler hidden-lg-up" type="button" data-toggle="collapse" data-target="#navbarResponsive"
              aria-controls="navbarResponsive" aria-expanded="false" aria-label="Toggle navigation"></button>
      <div class="collapse navbar-toggleable-md" id="navbarResponsive">
         <a class="navbar-brand" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Homepage:default")) ?>">
            <i class="fa fa-photo"></i>
            Webshooter
         </a>
         <ul class="nav navbar-nav">
            <li class="nav-item<?php
		if ($this->global->uiPresenter->isLinkCurrent('Homepage:default')) {
			?> active<?php
		}
?>">
               <a class="nav-link" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Homepage:default")) ?>">Homepage</a>
            </li>
         </ul>

         <ul class="nav navbar-nav float-lg-right">
<?php
		if (!$isLoggedIn) {
			?>               <li class="nav-item<?php
			if ($this->global->uiPresenter->isLinkCurrent('Sign:in')) {
				?> active<?php
			}
?>">
                  <a class="nav-link" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Sign:in")) ?>"><i class="fa fa-sign-in"></i> Sign in</a>
               </li>
<?php
		}
		else {
?>
               <li class="nav-item dropdown">
                  <a class="nav-link dropdown-toggle" href="http://example.com" id="responsiveNavbarDropdown"
                     data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                     <i class="fa fa-user"></i>
                     Account
                  </a>
                  <div class="dropdown-menu dropdown-menu-right" aria-labelledby="responsiveNavbarDropdown">
                     <h6 class="dropdown-header"><?php echo LR\Filters::escapeHtmlText($identity->username) /* line 31 */ ?></h6>
                     <a class="dropdown-item" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Sign:change")) ?>">
                        <i class="fa fa-cog"></i>
                        Settings
                     </a>
<?php
			if ($roleAdmin) {
				?>                        <a class="dropdown-item" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Device:list")) ?>">
                           <i class="fa fa-mobile"></i>
                           Devices
                        </a>
<?php
			}
?>
                     <div class="dropdown-divider"></div>
                     <a class="dropdown-item" href="<?php echo LR\Filters::escapeHtmlAttr($this->global->uiPresenter->link("Sign:out")) ?>">
                        <i class="fa fa-sign-out"></i>
                        Logout
                     </a>
                  </div>
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
