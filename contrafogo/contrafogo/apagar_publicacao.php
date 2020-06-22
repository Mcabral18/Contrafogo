<?php
//verifica se esta a receber alguma ID
if($_GET['ID']!='')
{
	
	$id=$_GET['ID'];
	try{
	require_once("classes/apagar_pub.php");
	$apagar_util = new publicacao();
	
	$apagar_util-> apagar_publicacao($id);
	}//caso tenha havido erro na execuчуo da querry
				catch(Exception $e){
					header('location: ver_conta.php');
					
				}
}
   
?>