<?php
require_once('bd.php');
class comentarios{
	
	private $myDb = null;
	
	public function __construct(){}
	
	//adicionar comentario
	public function addComentario($descricao, $data, $id_publicacao, $id_util){
		
		$objeto = new ligacao_bd();
		$query = "INSERT INTO comentario VALUES('', '$id_util', '$id_publicacao', '$descricao', '$data')";
		$resultado = $objeto ->performQuery($query);
		
	}
		
	//pesquisar comentarios
	public function displayComentario ($id, $condicao, $ordem){
		$vercomentario = new ligacao_bd();
		
		$resultados = $vercomentario->performQuery("SELECT * FROM comentario WHERE $condicao = '$id' $ordem ");
		return ($resultados);
	}
	
	
}
?>