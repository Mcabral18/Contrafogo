<?php
require_once('classes/comentario_edit_apa.php');
require_once('classes/verificar_publicacao.php');

$obj_edit = new comentarios();
$resultados = $obj_edit -> displayComentario($_POST['id_coment'], 'id_coment', '');
$dados = $resultados->fetch_array(MYSQLI_ASSOC);
if(isset($_POST['id_coment'])) 
{	
	//guarda os dados nas variaves
	$id_coment = $_POST['id_coment'];
	$descricao = $_POST['descricao'];

	$erros = NULL;
	
	//validar campos
	$validar = new verificarPublicacao();
	
	$descricao = $validar->limparpublicacao($descricao);
	
	//verificaчуo nome
	if($descricao != $dados['descricao']){
		if (!$validar -> ver_Tamanho ($descricao,3)){
		$erros['descricao']= "comentario invalido";
		}
		
	}
	else{
		$descricao = $dados['descricao'];
	}
	
	//se nуo houver erros ele envia os dados novos para a base de dados
	if(!$erros){
		
		try{
			$obj_edit = new comentarios();
			
			$resultado = $obj_edit -> editComentario($id_coment, $descricao);
			$location = explode('&', $_SERVER['HTTP_REFERER']);
			header('location:'.$location[0]);
		}
		//caso tenha havido erro na execuчуo da querry
		catch(Exception $e){
			echo "erro de ediчуo";
		}
	}
}
?>