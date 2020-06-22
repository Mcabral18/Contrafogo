<?php

require_once('bd.php');

class pesquisa {

//pesquisa todos os utilizadores excepto o admin
	public function pesq_util_total(){
	$query="SELECT * FROM `utilizador` where `id_utilizador` > 1 ";
	$ver_nuv = new ligacao_bd();
	$dados = $ver_nuv -> performQuery($query);
	return($dados);
	}					
}

?>