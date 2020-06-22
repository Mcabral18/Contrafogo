<?php

  require_once('bd.php');

class verificarCampo{
	
		//metodo para remover espaчos, barras e tags html
		public function limparCampo ($campo){
			$campo = trim($campo);	//remove espaчos em branco antes e depois do nome
			$campo = strip_tags($campo); //remove tags html do texto	
			$campo = stripslashes($campo);	 //remove as barras
			return($campo);
		}
		
		//verificaчуo do comprimento da string 
		public function ver_Tamanho($campo,$min){
		
			if (strlen($campo)< $min){
			return (false);	
			} else {
				return (true);				
				}
			
		}
	
		//verificar se щ texto
		public function ver_Texto ($campo){
			
			if(!is_numeric($campo)){
				return (true);
			}else{
				return (false);
			}
			
		}
		
		//verificar se щ numero
		public function ver_Numero ($campo){
			
			if(is_numeric($campo)){
				return (true);
			}else{
				return (false);
			}
			
		}
		
		//ver password
		public function ver_Password ($campo){
				//verifica se a password tem letras minusculas, maiusculas e numeros
		if (preg_match('/[A-Za-z]/', $campo) && preg_match('/[0-9]/', $campo) ) {
					return (true);
			}else{
				return (false);
			
			}
		}
		
			
		
		//confirmar password
		public function conf_Password ($campo, $campo1){
		
			if ($campo == $campo1){
				return (true);
			}else{
				return (false);
			}
		}
			
		//verificaчуo do email
		public function ver_Email ($email){
			
			if(!preg_match('/^[_a-z0-9-]+(\.[_a-z0-9-]+)*@[a-z0-9-]+(\.[a-z0-9-]+)*(\.[a-z]{2,3})$/', $email)){
					return(false);
			}
			else{
				return(true);
			}
			
		}
	
	
	
	// confirmaчуo de email 
	public function exist_email ($email){
		
		$objecto = new ligacao_bd();
		
		$query = "SELECT * FROM `utilizador` WHERE `email`='$email'";
		$resultado = $objecto->performQuery($query);
		
	if($resultado->num_rows != 0){
		return(false);
	}else{
		return(true);
	
	}
	}
	
	//campo vazio
	public function campo_vazio($campo){
		
			if (strlen($campo) == 0){
				return (false);	
			} else {
				return (true);				
				}
			
		}
	
}


?>