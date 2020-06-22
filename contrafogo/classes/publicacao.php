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

//adiciona publicacao
public function add_publicacao($id_util,$pais,$descricao,$imagem){
		
		$upload_dir = "img_upload/";
		$imagem_publicacao = $imagem["name"];
		$pasta = $upload_dir.$imagem_publicacao;
		move_uploaded_file($imagem["tmp_name"],$pasta);
		
		
		
		$registo = new ligacao_bd();
			$query = "INSERT INTO `publicacao` (`id_publicacao`, `id_util`, `pais`, `descricao`, `imagem`) VALUES (NULL, '$id_util', '$pais', '$descricao', '$imagem_publicacao')"; 
			
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