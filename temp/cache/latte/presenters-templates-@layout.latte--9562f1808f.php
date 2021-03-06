<?php
// source: C:\Users\WPJ3Station\Disk Google\James\LOCALHOST\DP\WSM\app\FrontModule\presenters/templates/@layout.latte

use Latte\Runtime as LR;

class Template9562f1808f extends Latte\Runtime\Template
{
	public $blocks = [
		'head' => 'blockHead',
		'scripts' => 'blockScripts',
	];

	public $blockTypes = [
		'head' => 'html',
		'scripts' => 'html',
	];


	function main()
	{
		extract($this->params);
?>
<!DOCTYPE html>
<html lang="en">
<head>
   <meta charset="utf-8">
   <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
   <meta http-equiv="x-ua-compatible" content="ie=edge">

   <title><?php
		if (isset($this->blockQueue["title"])) {
			$this->renderBlock('title', $this->params, function ($s, $type) {
				$_fi = new LR\FilterInfo($type);
				return LR\Filters::convertTo($_fi, 'html', $this->filters->filterContent('striphtml', $_fi, $s));
			});
			?> | <?php
		}
?> WEBSHOOTER </title>

      <link href="https://fonts.googleapis.com/css?family=Montserrat:400,700" rel="stylesheet">

      <link href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css" rel="stylesheet"
            integrity="sha384-wvfXpqpZZVQGK6TAh5PVlGOfQNHSoD2xbE+QkPxCAFlNEevoEH3Sl0sibVcOQVnN" crossorigin="anonymous">

   <link rel="stylesheet" href="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 19 */ ?>/css/style.css">

   <?php
		if ($this->getParentName()) return get_defined_vars();
		$this->renderBlock('head', get_defined_vars());
?>
</head>

<body>
<div class="wrapper">
<?php
		$iterations = 0;
		foreach ($flashes as $flash) {
			?>   <div<?php if ($_tmp = array_filter(['flash', $flash->type])) echo ' class="', LR\Filters::escapeHtmlAttr(implode(" ", array_unique($_tmp))), '"' ?>><?php
			echo LR\Filters::escapeHtmlText($flash->message) /* line 26 */ ?></div>
<?php
			$iterations++;
		}
?>

<?php
		$this->renderBlock('menu', $this->params, 'html');
?>

<?php
		$this->renderBlock('header', $this->params, 'html');
?>

   <main>
<?php
		$this->renderBlock('content', $this->params, 'html');
?>
   </main>

   <footer>
<?php
		$this->renderBlock('footer', $this->params, 'html');
?>
   </footer>
</div>

<?php
		$this->renderBlock('scripts', get_defined_vars());
?>
</body>
</html>
<?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		if (isset($this->params['flash'])) trigger_error('Variable $flash overwritten in foreach on line 26');
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}


	function blockHead($_args)
	{
		
	}


	function blockScripts($_args)
	{
		extract($_args);
?>
   <script src="https://code.jquery.com/jquery-1.12.0.min.js"></script>
   <script src="https://nette.github.io/resources/js/netteForms.min.js"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.3.7/js/tether.min.js"
           integrity="sha256-/5pHDZh2fv1eZImyfiThtB5Ag4LqDjyittT7fLjdT/8=" crossorigin="anonymous"></script>

   <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.5/js/bootstrap.min.js"
           integrity="sha384-BLiI7JTZm+JWlgKa0M0kGRpJbF2J8q+qreVrKBC47e3K6BW78kGLrCkeRX6I9RoK"
           crossorigin="anonymous"></script>

   <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js"></script>
   <script src="https://cdnjs.cloudflare.com/ajax/libs/wow/1.1.2/wow.js"></script>

   <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 57 */ ?>/js/nette.forms.js"></script>
   <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 58 */ ?>/js/nette.ajax.js"></script>

   <script src="<?php echo LR\Filters::escapeHtmlAttr(LR\Filters::safeUrl($basePath)) /* line 60 */ ?>/js/main.js"></script>
<?php
	}

}
