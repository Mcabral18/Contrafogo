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
	
//editar utilizador
public function editar_utilizador($id, $nome, $apelido, $password, $email)
{

			$registo = new ligacao_bd();
	$query = "UPDATE `utilizador` set nome='$nome', apelido='$apelido', password='$password', email='$email'  WHERE id_utilizador='$id'" ;
		$result = $registo->performQuery ( $query );
		
		if ( $result == 1){
			header('location: index.php');
			}
	
}



//pesquisa dados de um utilizador
	public function ver_utilizador ($id){
	$ver_util = new ligacao_bd();
	
	$resultados = $ver_util->performQuery( "SELECT * FROM  `utilizador` where id_utilizador='$id' ");
	$dados= $resultados->fetch_array(MYSQLI_ASSOC);
	$this->_nome = $dados['nome'];
	$this->_apelido = $dados['apelido'];
	$this->_email = $dados['email'];
	return ($dados);
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