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
	
	//apagar utilizador

public function apagar_utilizador($id){
		
		$apagar_util = new ligacao_bd();
		//apaga comentarios
		$q_coment = "DELETE FROM `comentario` WHERE `id_util`='$id'";
		$result = $apagar_util->performQuery($q_coment);
				//apaga votos
		$q_votacao = "DELETE FROM `votacao` WHERE `id_util`='$id'";
		$result = $apagar_util->performQuery($q_votacao);
				//publicações
		$q_publicacao = "DELETE FROM `publicacao` WHERE `id_util`='$id'";
		$result = $apagar_util->performQuery($q_publicacao);
				//apaga utilizador
		$q_id = "DELETE FROM `utilizador` WHERE `id_utilizador`='$id'";
		$result = $apagar_util->performQuery($q_id);
		
		
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