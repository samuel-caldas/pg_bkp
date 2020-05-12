<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>PagSeguro</title>
</head>

<body>
<?php
$email='samuel.caldas@gmail.com';
$token='BA2B2B46CACF4D70B7B5AD5293029FA7';
require_once'PagSeguro.php';
$url='https://ws.pagseguro.uol.com.br/v2/checkout/';
$qr=array(
	'email'						=>$email,
	'token'						=>$token,
	'currency'					=>'BRL',

	'itemId1'					=>'0001',
	'itemDescription1'			=>'Notebook Prata',
	'itemAmount1'				=>'24300.00',
	'itemQuantity1'				=>'1',
	'itemWeight1'				=>'1000',
	'itemId2'					=>'0002',
	'itemDescription2'			=>'Notebook Rosa',
	'itemAmount2'				=>'25600.00',
	'itemQuantity2'				=>'2',
	'itemWeight2'				=>'750',
	
	
	'reference'					=>'REF1234',
	'senderName'				=>'Jose Comprador',
	'senderAreaCode'			=>'11',
	'senderPhone'				=>'56273440',
	'senderEmail'				=>'comprador@uol.com.br',
	'shippingType'				=>'1',
	'shippingAddressStreet'		=>'Av. Brig. Faria Lima',
	'shippingAddressNumber'		=>'1384',
	'shippingAddressComplement'	=>'5o andar',
	'shippingAddressDistrict'	=>'Jardim Paulistano',
	'shippingAddressPostalCode'	=>'01452002',
	'shippingAddressCity'		=>'Sao Paulo',
	'shippingAddressState'		=>'SP',
	'shippingAddressCountry'	=>'BRA',
	'redirectURL'				=>''
);
//header('Location: https://pagseguro.uol.com.br/v2/checkout/payment.html?code=' . getParVal(post($url,$qr),'code'));
//teste
$conf=array(
	'email'=>$email,
	'token'=>$token,
	'currency'=>'BRL',
	'redirectURL'=>'localhost/'
);
$sender=array(
	'reference'=>'REF1234',
	'Name'=>'Jose Comprador',
	'AreaCode'=>'11',
	'Phone'=>'99998888',
	'Email'=>'comprador@uol.com.br'
);
$shipping=array(
	'Type'=>'3',
	'AddressStreet'=>'',
	'AddressNumber'=>'',
	'AddressComplement'=>'',
	'AddressDistrict'=>'',
	'AddressPostalCode'=>'',
	'AddressCity'=>'',
	'AddressState'=>'',
	'AddressCountry'=>''
);
$produtos[0]['itemId']='01';
$produtos[0]['itemDescription']='PC rosa';
$produtos[0]['itemAmount']='2000';
$produtos[0]['itemQuantity']='3';
$produtos[0]['itemWeight']='500';
//header('Location:'.pay($conf,$sender,$shipping,$produtos));
/*$x['a']='1';
$x['b']='2';
$x['c']='3';
$x['d']='4';
$x['e']='5';
arr($x);*/
?>

</body>
</html>