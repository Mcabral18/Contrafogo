<?php

require_once('bd.php');

class utilizadores {
	
	//propriedades----------------------
	private $_nome;
	private $_apelido;
	private $_email;
	
	
	
	//METODOS---------------------------
public function __construct(){
	
	}
	//login
public function login ($nome, $password){
	
	$login = new ligacao_bd();
	$result = $login->performQuery("SELECT * FROM `utilizador` WHERE `nome` = '$nome' AND `password` = '$password'");
		
		
		if ( $result->num_rows != 1 ){
			return (false);
		}
		else{
				$row = $result->fetch_assoc();
				session_start();
				$_SESSION['nome'] = $row['nome'];
				$_SESSION['apelido'] = $row['apelido'];
				$_SESSION['id'] = $row['id_utilizador'];
				$_SESSION['nivel']=$row['nivel'];
				
			if ($_SESSION['nivel'] == 1){
			header('location: index.php');	
			}else{
			header('location: index.php');
			}
			
		
		}
}

//display utilizador
public function display(){
	
	echo '
		<div align="center"><br/>
		  </div>
		<p  align="center"> <strong>Nome: </strong></p>
		<div align="center"> ';
		echo $this->_nome ; 
		echo'<br/>
		  </div>
          <p  align="center"> <strong>Apelido: </strong></p>
		<div align="center">';
		 echo $this->_apelido; 
		 echo'<br/>
		  </div>
          <p  align="center"> <strong>Email: </strong></p>
		<div align="center">';
		 echo $this->_email;
		 echo'<br/>
		  </div>';
}


}


?>