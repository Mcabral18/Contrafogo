<?php
//abre a sess�o para poder fechar a sess�o
session_start();

//fecha a sess�o e depois recaminha para o index
session_destroy();
unset($_SESSION);
header ('location: index.php');

?>