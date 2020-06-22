<?php
require_once('classes/votacao_edit_apa.php');

$obj_edit = new votacoes();
$resultados = $obj_edit -> displayVoto('WHERE id_votacao = '.$_POST['id_voto'], '');
$dados = $resultados->fetch_array(MYSQLI_ASSOC);
if(isset($_POST['id_voto'])) 
{	
	
	//guarda os dados nas variaves
	$id_voto = $_POST['id_voto'];
	$valor = $_POST['valor'];
	
	$erros = NULL;
	
	//se nуo houver erros ele envia os dados novos para a base de dados
	if(!$erros){
		
		try{			
			$resultado = $obj_edit -> editVotacao($id_voto, $valor);
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