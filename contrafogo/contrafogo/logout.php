<?php
//abre a sessão para poder fechar a sessão
session_start();

//fecha a sessão e depois recaminha para o index
session_destroy();
unset($_SESSION);
header ('location: index.php');

?>