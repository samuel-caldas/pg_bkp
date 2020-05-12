<?php
function post($url,$query){
	$context=stream_context_create(array('http'=>array('method'=>'POST','header'=>'Content-type:application/x-www-form-urlencoded','content'=>http_build_query($query))));
	if($result=file_get_contents($url,false,$context)){return $result;}else{return false;}
}
?>