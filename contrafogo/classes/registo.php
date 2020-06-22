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

//registo
public function registar_utilizador($nome, $apelido, $password, $email){
						
			$registo = new ligacao_bd();
			$query = "INSERT INTO `utilizador` (`id_utilizador`, `nome`, `apelido`, `password`, `email`, `nivel`) VALUES (NULL, '$nome', '$apelido', '$password', '$email', '1')		"; 
			$result = $registo->performQuery ( $query );
			
			if ( $result == 1){
			header('location: index.php');
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