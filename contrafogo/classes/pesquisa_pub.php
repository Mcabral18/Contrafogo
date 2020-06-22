<?php

require_once('bd.php');

class pesquisa {


		
	//pesquisa de publicacoes	
		public function pesq_publicacoes($id){
	$query="SELECT * FROM `publicacao` where `id_util` = $id ";
	$ver_nuv = new ligacao_bd();
	$dados = $ver_nuv -> performQuery($query);
	return($dados);
	}
	
		//pesquisa todas as publicações
	public function pesq_publicacao_total(){
	$query="SELECT * FROM `publicacao`";
	$ver_nuv = new ligacao_bd();
	$dados = $ver_nuv -> performQuery($query);
	return($dados);
	}
	
	//pesquisa as publicações de um utilizador
	function pesq_publicacao_util ($id){
		
	$ver_publicacao = new ligacao_bd();
	$dados = $ver_publicacao-> performQuery( "SELECT * FROM  `publicacao` where id_util='$id' ");	
		return ($dados);
	}
}

?>