<?php
session_start();
//verifica se esta a receber alguma ID
if(!empty($_GET['ID'])){
	
	//ao apagar util apagar primeiro os comentarios votaчoes e receitas do mesmo
	$id_coment=$_GET['ID'];
	
	try{
		require_once("classes/comentario_edit_apa.php");
		$apagar_util = new comentarios();
		$apagar_util->apagarComentario($id_coment);
		header('location: '.$_SERVER['HTTP_REFERER']);
	}
	//caso tenha havido erro na execuчуo da querry
	catch(Exception $e){
		header('location: ver_publicacao.php');
	}
}
?>