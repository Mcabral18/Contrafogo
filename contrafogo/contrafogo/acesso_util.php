 <?php
session_start ();

//caso a sess�o nao haja nenhuma das outras duas sess�es ele cria uma ficticia para visitante
if( ! empty($_SESSION)){
	if($_SESSION['nivel']!= 0 && $_SESSION['nivel']!= 1 )
	{
			header ('location: login.php');
	}
}else {
	header ('location: registo.php');
}


?>