<?php
require_once('bd.php');
class votacoes{
	
	private $myDb = null;
	
	public function __construct(){}
	
	//adicionar votaηγo
	public function addVotacao($valor, $id_publicacao, $id_util){
		
		$objeto = new ligacao_bd();
		$query = "INSERT INTO votacao VALUES('', '$id_util', $id_publicacao, '$valor')";

		$resultado = $objeto ->performQuery($query);
		
	}
			
		//pesquisa de votos de uma publicacao 
	public function displayVoto($condicao, $ordem){
		$vercomentario = new ligacao_bd();
	
		$resultados = $vercomentario->performQuery("SELECT * FROM votacao $condicao $ordem ");
		return ($resultados);
	}	
		
	

	//calcula a media 
	public function displayMedia($condicao, $ordem){
		$vercomentario = new ligacao_bd();
		
		$resultados = $vercomentario->performQuery("SELECT AVG(votacao) AS mediavalor FROM votacao $condicao");
		return ($resultados);
	}
	
	
}
?>