<?php
// source: C:\Users\WPJ3Station\DiskGoogle\James\LOCALHOST\DP\Webshooter\app\FrontModule\presenters\templates\components\Email\emailLayout.latte

use Latte\Runtime as LR;

class Templatef9d7b8eaa9 extends Latte\Runtime\Template
{

	function main()
	{
		extract($this->params);
?>
<!DOCTYPE html>
<html>
<head>
   <meta charset=utf-8">
   <title><?php
		$this->renderBlock('emailSubject', $this->params, 'html');
?></title>
   <link href="https://fonts.googleapis.com/css?family=Montserrat" rel="stylesheet">
</head>
<body style="background: #f7f7f9; color: #373a3c; font-family: 'Montserrat', sans-serif; font-size: 14px; min-height: 100%;">

<table border="0" cellpadding="0" cellspacing="0" width="100%" bgcolor="#f2f2f2">
   <tr>
      <td>
         <div align="center" style="padding: 20px 5px 20px 5px;">

            <table border="0" cellpadding="0" cellspacing="0" bgcolor="#f2f2f2"
                   style="width: 100%!important; max-width:780px!important">
               <tr>
                  <td style="font-weight: 700 !important; font-style: normal !important; color: #007fff !important; font-size: 1.25rem !important;padding: 20px 5px 20px 5px; text-align: left;">
                     <img src="<?php
		$this->renderBlock('webURI', $this->params, 'htmlAttrUrl');
?>/images/fa-image.png" alt="Image" style="float: left; margin-right: 10px;">
                     <span><strong>Webshooter</strong></span><br>
                  </td>
               </tr>
            </table>


            <table border="0" cellpadding="0" cellspacing="0" bgcolor="#ffffff"
                   style="width: 100%!important; max-width: 780px!important;">
               <tr>
                  <td style="padding: 40px 50px 40px 50px;">

<?php
		$this->renderBlock('emailBody', $this->params, 'html');
?>

                  </td>
               </tr>
            </table>


            <table border="0" cellpadding="0" cellspacing="0" bgcolor="#007fff"
                   style="width: 100%!important; max-width: 780px!important; margin-bottom: 30px; background: #007fff; padding: 20px 30px 20px 30px;">
               <tr>
                  <td style="color: #ffffff; padding: 5px 15px 5px 15px; text-align: center; font-size: 14px; line-height: 20px;">
                     © <?php
		$this->renderBlock('emailYear', $this->params, 'html');
?> Webshooter <br>
                     <a href="http://www.tul.cz/" style="color: #ffffff; text-decoration: underline; padding: 0 5px;">TUL</a> <span>|</span>
                     <a href="http://www.nti.tul.cz/cz/" style="color: #ffffff; text-decoration: underline; padding: 0 5px;">NTI</a> <span>|</span>
                     <a href="http://www.jakubjirous.cz/" style="color: #ffffff; text-decoration: underline; padding: 0 5px;">&lt;JJ /&gt;</a>
                  </td>
               </tr>
            </table>
         </div>
      </td>
   </tr>
</table>

</body>
</html><?php
		return get_defined_vars();
	}


	function prepare()
	{
		extract($this->params);
		Nette\Bridges\ApplicationLatte\UIRuntime::initialize($this, $this->parentName, $this->blocks);
		
	}

}
