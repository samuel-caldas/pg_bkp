<?php
//função de envio de email
function sendMail($email,$senha,$remetente,$assunto,$corpoHTML,$corpoAlt,$destinatario,$anexo){
	//Abrindo o phpmailer
	require 'class.phpmailer.php';
	
	//instanciando a classe
	$PHPMailer = new PHPMailer();
	
	//definindo idioma
	$PHPMailer->SetLanguage("br", 'phpMailer/language/');
	 
	// define que será usado SMTP
	$PHPMailer->IsSMTP();
	 
	// envia email HTML
	$PHPMailer->isHTML( true );
	 
	// codificação UTF-8, a codificação mais usada recentemente
	$PHPMailer->Charset = 'UTF-8';
	 
	// Configurações do SMTP
	$PHPMailer->SMTPAuth = true;
	$PHPMailer->SMTPSecure = 'ssl';
	$PHPMailer->Host = 'smtp.gmail.com';
	$PHPMailer->Port = 465;
	$PHPMailer->Username = $email;
	$PHPMailer->Password = $senha;
	 
	// E-Mail do remetente (deve ser o mesmo de quem fez a autenticação
	// nesse caso seu_login@gmail.com)
	$PHPMailer->From = $email;
	 
	// Nome do rementente
	$PHPMailer->FromName = $remetente;
	 
	// assunto da mensagem
	$PHPMailer->Subject = $assunto;
	 
	// corpo da mensagem
	$PHPMailer->Body = $corpoHTML;
	 
	// corpo da mensagem em modo texto
	$PHPMailer->AltBody = $corpoAlt;
	 
	// adiciona destinatário (pode ser chamado inúmeras vezes)
	
	$PHPMailer->AddAddress( $destinatario );
	 
	// adiciona um anexo
	if($anexo){$PHPMailer->AddAttachment($anexo);}
	 
	// verifica se enviou corretamente
	if ($PHPMailer->Send()){
		return false;//sem erros
	}else{
		return $PHPMailer->ErrorMsg;//erro
	}
}
$email='samuel.caldas@gmail.com';
$senha='samuel18';
$remetente='Samuel Caldas';
$assunto='Teste PHPMailer';
$corpoHTML='Testando';
$corpoAlt='Testando';
$destinatario='samuel.caldas@yahoo.com.br';
$anexo=null;
sendMail($email,$senha,$remetente,$assunto,$corpoHTML,$corpoAlt,$destinatario,$anexo);
?>