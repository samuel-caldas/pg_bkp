<?php
//posta na url e retorna o codigo fonte                                                           
function post($url,$query){
	return file_get_contents($url,false,stream_context_create(array('http'=>array('method'=>'POST','header'=>'Content-type:application/x-www-form-urlencoded','content'=>http_build_query($query)))));
};
// Obter um arquivo em um array. Neste exemplo nós vamos passar por HTTP para obter o codigo fonte da url
function getRespFile($email, $token, $transaction) {
    return (
		($file = file('https://ws.pagseguro.uol.com.br/v2/transactions/'.$transaction.'?email='.$email.'&token='.$token)) ? 
			explode('-|-', str_replace('><', '>-|-<', $file[0])) : 
			false
	);
};
//Get String between two other strings
function getStrBtwn($start,$end,$str){
	$separator='-|-';
	if($arraystr=explode($separator,str_ireplace(array($start,$end),$separator,$str))){
		return (
			isset($arraystr[1])?
				trim($arraystr[1]):
				false
		);
	}
}
// Loop através de nossa matriz, mostrando o código fonte.
function getParVal($str,$par){
	$str=(!is_array($str)? explode('-|-',str_replace('><', '>-|-<', $str)):$str);
	foreach($str as $ln){
		if($l=getStrBtwn('<'.$par.'>','</'.$par.'>',$ln)){
			$out[]=trim($l);
		}
	}
	return (
		isset($out)?
			(count($out)>1?
				$out:
				$out[0]
			):
			false
	);
};
//Retorna um array de um produto
function produto($id,$descricao,$preço,$quantidade,$peso){
	return array(
		'itemId'=>$id,
		'itemDescription'=>$descricao,
		'itemAmount'=>$preço,
		'itemQuantity'=>$quantidade,
		'itemWeight'=>$peso
	);
}
//Create Payment
function pay($conf,$sender,$shipping,$produtos){
	$qr=array(
		'email'=>$conf['email'],
		'token'=>$conf['token'],
		'currency'=>$conf['currency']?$conf['currency']:'BRL',
		'reference'=>$sender['reference'],
		'senderName'=>$sender['Name'],
		'senderAreaCode'=>$sender['AreaCode'],
		'senderPhone'=>$sender['Phone'],
		'senderEmail'=>$sender['Email'],
		'shippingType'=>$shipping['Type']?$shipping['Type']:3,
		'shippingAddressStreet'=>$shipping['AddressStreet'],
		'shippingAddressNumber'=>$shipping['AddressNumber'],
		'shippingAddressComplement'=>$shipping['AddressComplement'],
		'shippingAddressDistrict'=>$shipping['AddressDistrict'],
		'shippingAddressPostalCode'=>$shipping['AddressPostalCode'],
		'shippingAddressCity'=>$shipping['AddressCity'],
		'shippingAddressState'=>$shipping['AddressState'],
		'shippingAddressCountry'=>$shipping['AddressCountry'],
		'redirectURL'=>$conf['redirectURL']
	);
	foreach($produto as $i => $pr){
		$qr['itemId'.$i]=$pr['itemId'];
		$qr['itemDescription'.$i]=$pr['itemDescription'];
		$qr['itemAmount'.$i]=$pr['itemAmount'];
		$qr['itemQuantity'.$i]=$pr['itemQuantity'];
		$qr['itemWeight'.$i]=$pr['itemWeight'];
	}
	return 'https://pagseguro.uol.com.br/v2/checkout/payment.html?code='.getParVal(post($url,$qr),'code');
}

?>