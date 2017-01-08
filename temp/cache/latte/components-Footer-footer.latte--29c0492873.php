<?php
// source: C:\Users\WPJ3Station\Disk Google\James\LOCALHOST\DP\WSM\app\FrontModule\presenters\templates\components\Footer/footer.latte

use Latte\Runtime as LR;

class Template29c0492873 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<div class="container">
   <div class="row">
      <div class="col-xs-12 col-sm-6 flex-xs-middle text-xs-center float-sm-left text-sm-left">
         <p class="text-muted">
            ©2016–2017 – Webshooter
         </p>
      </div>
      <div class="col-xs-12 col-sm-6 flex-xs-middle text-xs-center float-sm-right text-sm-right">
         <p class="text-muted">
            <a href="http://www.tul.cz/">TUL</a> <span>|</span>
            <a href="http://www.nti.tul.cz/cz/">NTI</a> <span>|</span>
            <a href="http://www.jakubjirous.cz/">JJ</a>
         </p>
      </div>
   </div>
</div>
<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}

}
