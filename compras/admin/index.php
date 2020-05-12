<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Gerenciar compras</title>
<style type="text/css">
body,td,th {
	color: #666;
}
body {
	background-color: #F8F8F8;
	-webkit-transition: all 200ms;
	-moz-transition: all 200ms;
	-ms-transition: all 200ms;
	-o-transition: all 200ms;
	transition: all 200ms;
}
</style>
</head>
<body>
<?php
//////////////////////////////////////////////////////////////////
include('DBFramework.php');										// Abrindo o framework para MySQL
include_once('xml.php');										// Abrindo o framework para XML
if(!require_once('phpmailer/class.phpmailer.php')){				// Abrindo o framework phpmailer
include("phpmailer/class.phpmailer.php");}						// Abrindo o framework phpmailer
$myemail			= 'samuel.caldas@gmail.com';				// Define email padrão
$myname				= 'Samuel Caldas';							// Define nome padrão
$mail               = new PHPMailer();							// Instanciando a classe
$mail->IsSMTP();												// Define que será usado SMTP
$mail->isHTML(true);											// Define que será HTML
$mail->Charset		= 'UTF-8';									// Define que serácodificação UTF-8, a mais usada atualmente
$mail->SMTPAuth		= true;										// Define que será SMTP autenticado
$mail->SMTPSecure	= 'ssl';									// Define que será ssl
$mail->SMTPKeepAlive= true;										// Define que a conecção SMTP seo feixará depois do enviar o email
$mail->Host			= "smtp.gmail.com";							// Define o servidor SMTP
$mail->Port			= 465;										// Define a porta do servidor SMTP
$mail->Username		= $myemail;									// Define o nome do usuário
$mail->Password		= "samuel19";								// Define a senha do usuário
$mail->SetLanguage("br", 'phpMailer/language/');				// Definindo idioma
$mail->SetFrom($myemail, 'Samuel Caldas');						// Email e nome do remetente
$mail->AddReplyTo($myemail, 'Samuel Caldas');					// Email e nome
$mail->Subject		= "Codigo do Ticket";						// Assunto;
//////////////////////////////////////////////////////////////////
$saida=select('','compras',"pago='n'",'');
$leng=count($saida);
if(!$saida){
	echo'Nenhuma operação a ser realizada!';
}else{
	for($i=0;$i<$leng;$i++){
		$file=getFile($email,$token,$saida[$i][1]);
		$usremail=getParVal($file,'email');
		$usrname=getParVal($file,'name');
		if(getParVal($file,'status')>2){
			$pags=getParVal($file,'amount');
			$txt='';
			$html='';
			for($j=0;$j<count($pags);$j++){
				$txt.=base64_encode($pags[$j]).'          ';
				$html.=base64_encode($pags[$j]).'<br />';
			}
			$mail->AltBody="O código de seu Ticket &Eacute;: ".$txt; // optional
			$mail->MsgHTML("O código de seu Ticket &Eacute;:<br />".$txt);
			$mail->AddAddress($usremail, $usrname);
			if(!$mail->Send()) {
			  echo "Erro ao enviar! (".str_replace("@","&#64;",$usremail).') '.$mail->ErrorInfo.';<br>';
			}else{
				update('compras',"pago='s'","id='".$saida[$i][0]."'");
				echo "Ticket enviado para: ".$usrname.' ('.str_replace("@","&#64;",$usremail).');<br>';
			}
			// Clear all addresses and attachments for next loop
			$mail->ClearAddresses();
		}else{echo($usrname.' nao pagou ainda<br />');}
	};
}
?>
</body>
</html>