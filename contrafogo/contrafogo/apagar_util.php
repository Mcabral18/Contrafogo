<?php
//verifica se esta a receber alguma ID
if($_GET['ID']!='')
{
	
	$id=$_GET['ID'];
	try{
	require_once ("classes/util_apagar.php");
	$apagar_util = new utilizadores();
	$apagar_util-> apagar_utilizador($id);
	header('location: admin_util.php');
	
	}//caso tenha havido erro na execuчуo da querry
				catch(Exception $e){
					header('location: admin_util.php');
					
				}
}
   
?>