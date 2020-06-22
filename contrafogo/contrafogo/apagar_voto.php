<?php
session_start();
//verifica se esta a receber alguma ID
if(!empty($_GET['idVoto'])){
	
	//ao apagar util apagar primeiro os comentarios votaчoes e receitas do mesmo
	$id_voto=$_GET['idVoto'];
	
	try{
		require_once("classes/votacao_edit_apa.php");
		$apagar_util = new votacoes();
		$apagar_util->apagarVoto($id_voto);
		header('location: '.$_SERVER['HTTP_REFERER']);
	}
	//caso tenha havido erro na execuчуo da querry
	catch(Exception $e){
		header('location: index.php');
	}
}
?>