<?php
//chama a pagina que verifica se esta ou não autentificado
session_start();
 require_once('classes/verificar_utilizador.php');
 require_once('classes/registo.php');

if(isset($_POST['form'])) //verifica se existem dados inseridos pelo formulario
if($_POST['form']==1) // verificar se foi submetido o formulário
{ 
//leitura dos campos para variaveis
	$nome=$_POST['nome'];
	$apelido=$_POST['apelido'];
	$password=$_POST['password'];
	$rpassword=$_POST['rpassword'];
	$email=$_POST['email'];
	$erros = NULL;
	
	
	$verifica = new verificarCampo();
	
	//limpar campos
	$nome = $verifica->limparCampo($nome);
	$apelido = $verifica->limparCampo($apelido);
	$password = $verifica->limparCampo($password);
	$rpassword = $verifica->limparCampo($rpassword);
	$email = $verifica->limparCampo($email);
	

	//verificação nome
	if (!$verifica -> ver_Tamanho ($nome,3)){
	$erros['nome']= "nome invalido";
	}
	if (!$verifica -> ver_Texto ($nome)){
	$erros['nome']= "nome invalido";
	}
	
	//verificar apelido
	if (!$verifica -> ver_Tamanho ($apelido,2)){
	$erros['apelido']= "apelido invalido";
	}
	if (!$verifica -> ver_Texto ($apelido)){
	$erros['apelido']= "apelido invalido";
	}
	
	//verificar password
	if (!$verifica -> ver_Tamanho ($password,5)){
	$erros['password']= "comprimento invalido";
	}
	
	if (!$verifica -> ver_Password ($password)){
	$erros['password']= "verificação invalida";
	}
	
	if (!$verifica -> conf_Password ($password,$rpassword)){
	$erros['rpassword']= "as passes não combinam";
	}

	//verificar email
	if (!$verifica -> ver_Email ($email, 9)){
		$erros['email']= "email invalido";
	}
	
	//existe email
	if (!$verifica -> exist_email ($email)){
		$erros['email']= "email existente";
	}
	

if ( !$erros){
			
			
			
			try{
		
			$obj_registo = new utilizadores();
			
		
			$resultado = $obj_registo -> registar_utilizador($nome, $apelido, $password, $email);
								
			}//caso tenha havido erro na execução da querry
				catch(Exception $e){
					echo "erro de inserção";
					
				}




}


}
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pagina de Registo</title>
</head>
<body style="background-color:	#A9A9A9">
		<div>
        <ul>
        <li><a href="index.php">Home</a></li>
        </li>
       	</ul>
    
	<div>
     	<!-- Formulario do resgisto -->
		
		           <form  id="registo" name="formulario" action="registo.php" method="post" enctype="multipart/form-data">
						<input name="form" value="1" type="hidden" />
                        
                        	<p><label>Nome:</label>
                            <input name="nome" type="text" class="text-long" /><?php if(isset($erros['nome']))if($erros['nome']!=''){ echo $erros['nome'];} ?> </p>
                        	
                            <p><label>Apelido:</label>
                            <input name="apelido" type="text" class="text-long" /><?php if(isset($erros['apelido']))if($erros['apelido']!=''){ echo $erros['apelido'];} ?> </p>
                            
                            <p><label>Password:</label>
                            <input name="password" type="password" class="text-long" /><?php if(isset($erros['password']))if($erros['password']!=''){ echo $erros['password'];} ?> </p>
                            <p><label>Email: </label>
                            <input name="email" type="text" class="text-long" /><?php if(isset($erros['email']))if($erros['email']!=''){ echo $erros['email'];} ?></p>
                            
                            <p><label>Confirma Password:</label>
                            <input   name="rpassword" type="password" class="text-long" /> <?php if(isset($erros['rpassword']))if($erros['rpassword']!=''){ echo $erros['rpassword'];} ?><p/>
                            
                           	   <input name="form_user" type="submit" value="Inserir" />
                              
                             
                        
  </form>
		
		
		
     
     </div>
	
    
    
    
    
    
  </div>

</body>
</html>