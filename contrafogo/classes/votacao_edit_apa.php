<?php
require_once('bd.php');
class votacoes{
	
	private $myDb = null;
	
	public function __construct(){}
			
	//editar votaηao
	public function editVotacao($id_votacao, $votacao){
		
		$objeto = new ligacao_bd();
		$query = "UPDATE votacao SET votacao='$votacao' WHERE id_votacao = '$id_votacao'";
		$resultado = $objeto ->performQuery($query);
		
	}
	
	//apagar votaηγo
	public function apagarVoto($id_votacao){
		
		$apagar_voto = new ligacao_bd();
		$query = "DELETE FROM votacao WHERE id_votacao = '$id_votacao'";
		
		$result = $apagar_voto->performQuery($query);
		
		
		
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