<?php
//conectar
function conect($server,$usr,$pass,$banco){if($cnx=mysql_connect($server,$usr,$pass)){if(mysql_select_db($banco,$cnx)){return true;}else{return false;}}else{return false;}}
//inserir
function insert($tab,$wr,$val){if($wr){$wr="(".$wr.")";};if(mysql_query("INSERT INTO ".$tab." ".$wr." VALUES (".$val.")")){return true;}else{return false;}};
//delete
function del($tab,$wr){if (mysql_query("DELETE FROM ".$tab." WHERE ".$wr)){return true;}else{return false;}};
//Atualisa
function update($tabela,$val,$wr){if($otpt=mysql_query("UPDATE ".$tabela." SET ".$val." WHERE ".$wr)){return true;}else{return false;}
};
//seleciona
function select($wt, $tab, $wr, $order){
if(!$wt){$wt="*";};
if($wr){$wr=" WHERE ".$wr;};
if($order){$order=" ORDER BY ".$order;}; 
	if($sql=MYSQL_QUERY("SELECT ".$wt." FROM ".$tab.$wr.$order)){
		if (mysql_num_rows($sql)!=0){
			$j=0;
			while ($line=mysql_fetch_row($sql)){
				$result[$j]=$line;
				$j++;
			};
			return $result;
		}else{return false;};
	}else{return false;}
};
#Conectar#
#em ordem (servidor, usuario, senha e banco de dados);
conect('localhost','193448','samuel18','193448');
?>