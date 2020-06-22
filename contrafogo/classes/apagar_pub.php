<?php

require_once('bd.php');

class publicacao {
	
	//propriedades----------------------
	private $_id_util;
	private $_pais;
	private $_descricao;
	private $_imagem;
	
	
	//METODOS---------------------------
public function __construct(){
	
	}

//apagar publicação

public function apagar_publicacao($id){
				
		$apagar_util = new ligacao_bd();
		
		$query_pesq = "SELECT * FROM  `publicacao` WHERE `id_publicacao`='$id' ";
		$result_pesq = $apagar_util->performQuery($query_pesq);
		$result_pesq= $result_pesq->fetch_array(MYSQLI_ASSOC);
		$imagem=$result_pesq['imagem'];
		unlink('img_upload/'.$imagem);
		
		$query = "DELETE FROM `publicacao` WHERE `id_publicacao`='$id' ";
		$result = $apagar_util->performQuery($query);
		
		if ( $result == 1){
			header('location: ver_conta.php');
			} 
							
	}	

//display utilizador
 function display(){
	
	echo '
		<div align="center"><br/>
		  </div>
		<p  align="center"> <strong>País: </strong></p>
		<div align="center"> ';
		echo $this->_pais ; 
		echo'<br/><br/><br/>
		  </div>
          <p  align="center"> <strong>Imagem: </strong></p>
		<div align="center">';
		 echo '<img height="100" width="100" src="img_upload/'.$this->_imagem.' " />'; 
		 echo'<br/><br/><br/>
		 <p  align="center"> <strong>Descrição: </strong></p>
		<div align="center"> ';
		echo $this->_descricao ; 		
		echo'<br/>
		  </div>
		  <p  align="center"> <strong>Autor: </strong></p>
		<div align="center"> ';
		require_once('OOP/utilizador.php');
		$nome = new utilizadores();
		$dados = $nome -> ver_utilizador($this->_id_util);
		echo $dados['nome'];
		 
		echo'<br/>
		  </div>
		  </div>
		  </div>';
	
}


}


?>