 <?php
session_start ();

//caso a sessão nao haja nenhuma das outras duas sessões ele cria uma ficticia para visitante
if( ! empty($_SESSION)){
	if($_SESSION['nivel']!= 0 && $_SESSION['nivel']!= 1 )
	{
			header ('location: login.php');
	}
}else {
	header ('location: registo.php');
}


?>