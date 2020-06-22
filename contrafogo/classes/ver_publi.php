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

//pesquisa dados de uma publicação
	public function ver_publicacao ($id){
		$ver_util = new ligacao_bd();
	
	$resultados = $ver_util->performQuery( "SELECT * FROM  `publicacao` where id_publicacao='$id' ");
	$dados= $resultados->fetch_array(MYSQLI_ASSOC);
	$this->_id_util = $dados['id_util'];
	$this->_pais = $dados['pais'];
	$this->_descricao = $dados['descricao'];
	$this->_imagem = $dados['imagem'];
	
	
	
	return ($dados);
		
	
	}

//display utilizador
public function display(){
	
	echo '
		<div align="center"><br/>
		  </div>
		<p  align="center"> <strong>Pais: </strong></p>
		<div align="center"> ';
		echo $this->_pais ; 
		echo'<br/><br/><br/>
		  </div>
          <p  align="center"> <strong>Imagem: </strong></p>
		<div align="center">';
		 echo '<img height="100" width="100" src="img_upload/'.$this->_imagem.' " />'; 
		 echo'<br/><br/><br/>
		 <p  align="center"> <strong>Descricao: </strong></p>
		<div align="center"> ';
		echo $this->_descricao ; 		
		echo'<br/>
		  </div>
		  <p  align="center"> <strong>Autor: </strong></p>
		<div align="center"> ';
		require_once('classes/utilizador.php');
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