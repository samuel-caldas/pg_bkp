<!doctype html>
<html>
<head>
<meta charset="utf-8">
<title>Finalizar compras</title>
<style type="text/css">
body,td,th {
	color: #333;
	font-family: "Segoe UI";
	font-size: 14px;
	overflow: hidden;
}
body {
	background-color: #f8f8f8;
}
</style>

<meta http-equiv="refresh" content="11;http://samu.eu5.org">
</head>


<body>
<?php
include('admin/DBFramework.php');
if(!select('','compras',"serial='".$_GET['id']."'",'')){
if(insert('compras','','"","'.$_GET['id'].'","n"')){
?>
<div>
<p>Agradecemos pela preferencia, assim que computarmos seu pagamento estaremos enviando um código para o email escolhido, nescessário para retidada de seu produto.
</p>
<p><strong>Em caso de problemas informe esse código a um de nossos antendentes: <?php echo $_GET['id']; ?></strong></p>
</div>
<?php }else{ ?>
<div>
Ocorreu um erro inesperado mas já estamos trabalhando para concertar, mas não se preoculpe, sua compra foi finalizada com sucesso, basta informar esse codigo a um de nossos atendentes: <strong><?php echo $_GET['id']; ?></strong>
</div>
<?php } ?>
<script>
var time=11;
window.onload=function(){
var	interval=setInterval(function(){
		time=time-1;
		document.getElementById('timer').innerHTML=time;
	},999);
	
};
</script>
<p>A página será redirecionada em 
<strong id="timer">10</strong> Segundos</p>
<?php }else{echo'seu codigo é: '.$_GET['id'];} ?>
</body>
</html>