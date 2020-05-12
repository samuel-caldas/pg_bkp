<?php
//config variables
$email='samuel.caldas@gmail.com';
$token='BA2B2B46CACF4D70B7B5AD5293029FA7';
// Get a file into an array.  In this example we'll go through HTTP to get source of url
function getFile($email,$token,$transaction){
	if($file=file('https://ws.pagseguro.uol.com.br/v2/transactions/'.$transaction.'?email='.$email.'&token='.$token)){
		return explode('-|-',str_replace('><', ">-|-<", $file[0]));
	}else{return false;};
}
// Loop through our array, show source;
function getParVal($file,$par){
	foreach($file as $line_num => $line){
		if(strstr($line, '<'.$par.'>')){
			$remove=array('<'.$par.'>', '</'.$par.'>',' ');
			 $output[]=str_replace($remove, "", $line);
		}
	}
	if(count($output)>1){
		return $output;
	}else{
		return $output[0];
	}
	
};
?>