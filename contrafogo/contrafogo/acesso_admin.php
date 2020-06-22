<?php
session_start ();
// apenas deixa entrar se tiver autenticado e for do tipo administrador
if( ! empty($_SESSION)){
				if ($_SESSION['nivel'] != 0  ){
				header ('location: login.php');	
	
					}
			}else {
				header ('location: login.php');
				}
?>