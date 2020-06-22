<?php
require_once('bd.php');
class comentarios{
	
	private $myDb = null;
	
	public function __construct(){}
		
	//editar comentario
	public function editComentario($id_coment, $descricao){
		
		$objeto = new ligacao_bd();
		$query = "UPDATE comentario SET descricao='$descricao' WHERE id_coment = '$id_coment'";
		
		$resultado = $objeto ->performQuery($query);
		
	}
	
	//apagar comentario
	public function apagarComentario($id_coment){
		
		$apagar_util = new ligacao_bd();
		$query = "DELETE FROM comentario WHERE id_coment = '$id_coment'";
		
		$result = $apagar_util->performQuery($query);
		
		if ( $result == 1){
			header('location: ../index.php?msg=OK');
		}
		
		}
					
	//pesquisar comentarios
	public function displayComentario ($id, $condicao, $ordem){
		$vercomentario = new ligacao_bd();
		
		$resultados = $vercomentario->performQuery("SELECT * FROM comentario WHERE $condicao = '$id' $ordem ");
		return ($resultados);
	}
	
	
}
?>