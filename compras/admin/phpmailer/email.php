<html>
<head>
<title>PHPMailer - Email</title>
</head>
<body>
<?php
$departamento='';
$nome='samuel';
$email='samuel.caldas@gmail.com';
$fone='';
$corpo='';
//--------------------------------------------------------------------------------------------------------------
//error_reporting(E_ALL);
error_reporting(E_STRICT);
date_default_timezone_set('America/Toronto');
require_once('class.phpmailer.php');
$mail             	= new PHPMailer();
//-------------------------------------DE:----------------------------------------------------------------------
$nomei				="Grupo Criarte - Dept.webdesign";
//$usuario			="samuel.caldas@grupocriarte.com";
//$senha				="samuel17";
//-------------------------------------Mensagem:----------------------------------------------------------------
$titulo				="Formulario de contato do site www.corregonovo.mg.gov.br";
$AVISO				="Para visualizar a mensagem, por favor use um visualizador de e-mail HTML!";
//-------------------------------------Corpo da mensagem-------------------------------------------------------
$corpo =  "
<table width='100%' border='0' align='center' cellpadding='0' cellspacing='0'>
  <tr>
    <td height='20' colspan='4' align='center' valign='middle'>
    <h3><strong>Mensagem automatica gerada pelo site&nbsp; <a href='http://corregonovo.mg.gov.br/'>http://corregonovo.mg.gov.br</a></strong></h3>
    </td>
  </tr>
  <tr>
    <td align='right' valign='middle'><strong>Nome:&nbsp; </strong></td>
    <td align='left' valign='middle'>".$nome."</td>
    <td align='right' valign='middle'><strong>Email:&nbsp; </strong></td>
    <td align='left' valign='middle'>".$email."</td>
  </tr>
  <tr>
    <td align='right' valign='middle'><strong>Para:&nbsp; </strong></td>
    <td align='left' valign='middle'></td>
    <td align='right' valign='middle'><strong>Fone:&nbsp; </strong></td>
    <td align='left' valign='middle'> </td>
  </tr>
  <tr>
    <td colspan='4' align='center' valign='middle'><strong>Mensagem:</strong></td>
  </tr>
  <tr>
    <td colspan='4' align='center' valign='middle'>".$corpo."</td>
  </tr>
</table>
";
//-------------------------------------Para:---------------------------------------------------------------------------------------------------
$destinatarioemail	= $_POST["dpt"];
$destinatarionome	= $_POST["dpt"];
//-------------------------------------Configurações-------------------------------------------------------------------------------------------
$mail->IsSMTP(); 																			// telling the class to use SMTP
$mail->Host       	= "stmp.gmail.com";														// SMTP server
$mail->SMTPDebug  	= 1;                     												// enables SMTP debug information (for testing)
																							// 1 = errors and messages
																							// 2 = messages only
$mail->SMTPAuth   	= true;																	// enable SMTP authentication
$mail->SMTPSecure 	= "ssl";																// sets the prefix to the servier
$mail->Host       	= "smtp.gmail.com"; 													// sets the SMTP server
$mail->Port       	= 465;                    												// set the SMTP port for the GMAIL server
$mail->Username   	= "samuel.caldas@grupocriarte.com";										// SMTP account username
$mail->Password   	= "samuel17";      														// SMTP account password
$mail->SetFrom("samuel.caldas@grupocriarte.com", $nomei);
$mail->AddReplyTo("samuel.caldas@grupocriarte.com", $nomei);
$mail->Subject    	= $titulo;
$mail->AltBody    	= $AVISO;																// optional, comment out and test
$mail->MsgHTML($corpo);
$mail->AddAddress($destinatarioemail, $destinatarionome);
//------------------------------------Enviando------------------------------------------------------------------------------------------------
if(!$mail->Send()) {
  echo("
	<script type='text/javascript'>
		window.alert('Erro: " . $mail->ErrorInfo . "');
		history.back(3);
	</script>
	");
} else {
  echo("
	<script type='text/javascript'>
		window.alert('Mensagem enviada!');
		history.back(3);
	</script>
	");
}
?>
</body>
</html>
