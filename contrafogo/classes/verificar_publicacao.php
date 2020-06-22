<?php

require_once('bd.php');

class verificarPublicacao{
	
		//metodo para remover espaços, barras e tags html
		public function limparPublicacao ($campo){
			$campo = trim($campo);	//remove espaços em branco antes e depois do nome
			$campo = strip_tags($campo); //remove tags html do texto	
			$campo = stripslashes($campo);	 //remove as barras
			return($campo);
		}
		
		
		
	//verifica o tamanho de um campo		
		public function ver_Tamanho($campo,$min){
		
	
			if (strlen($campo)< $min){
				return (true);	
			} else {
				return (false);				
			}
			
		}
		
	//ve se o array esta vazio
		public function ver_vazio ($ing){
			$ing = array_filter($ing); 
			if (empty($ing) )
			{ return (false);
				} else { 
				return(true);
				}	
			
		}
	
	//verifica a imagem
		
	public function ver_imagem ($imagem){
			
			
			if ( !empty($imagem) && $imagem["error"] <= 0 && $imagem["size"] <= 1048576 && (($imagem["type"] == "image/gif") || ($imagem["type"] == "image/jpeg") || ($imagem["type"] == "image/jpg") || ($imagem["type"] == "image/png") || ($imagem["type"] == "image/pjpeg"))  ){
			return (true);
		}else{
			return (false);
		}
	
}



}

?>