<?php
//config variables
$email='samuel.caldas@gmail.com';
$token='BA2B2B46CACF4D70B7B5AD5293029FA7';
function post($url,$query){
	$context=stream_context_create(array('http'=>array('method'=>'POST','header'=>'Content-type:application/x-www-form-urlencoded','content'=>http_build_query($query))));
	if($result=file_get_contents($url,false,$context)){return $result;}else{return false;}
}
// Get a file into an array.  In this example we'll go through HTTP to get source of url
function getFile($email,$token,$transaction){return ($file=file('https://ws.pagseguro.uol.com.br/v2/transactions/'.$transaction.'?email='.$email.'&token='.$token)?explode('-|-',str_replace('><', ">-|-<", $file[0])):false);};
// Loop through our array, show source;
function getParVal($file,$par){foreach($file as $line){if(strstr($line, '<'.$par.'>')){$output[]=str_ireplace(array('<'.$par.'>','</'.$par.'>',' '),"", $line);}};return(count($output)>1?$output:$output[0]);};
?>