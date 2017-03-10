<?php
// source: C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\app\FrontModule\presenters\templates\components\Footer/footer.latte

use Latte\Runtime as LR;

class Template4b7713fc87 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<div class="container">
   <div class="row">
      <div class="col-xs-12 col-sm-6 flex-xs-middle text-xs-center float-sm-left text-sm-left">
         <p class="text-muted">
            ©<?php echo LR\Filters::escapeHtmlText(call_user_func($this->filters->date, $now, 'Y')) /* line 7 */ ?> – Webshooter
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
