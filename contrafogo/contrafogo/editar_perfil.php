<?php

require_once('acesso_util.php');

require_once('classes/util_perfil.php');
require_once('classes/verificar_utilizador.php');


if(isset($_POST['form'])) 
{
		if($_POST['form']==1)
	{ 	
	
	//guarda os dados nas variaves
	$nome=$_POST['nome'];
	$apelido=$_POST['apelido'];
	$password=$_POST['password'];
	$rpassword=$_POST['rpassword'];
	$email=$_POST['email'];
	$erros = NULL;
	//guarda antigos dados nas variaveis
	$nome_ant=$_POST['nome_ant'];
	$apelido_ant=$_POST['apelido_ant'];
	$password_ant=$_POST['password_ant'];
	$email_ant=$_POST['email_ant'];
	
	$verifica = new verificarCampo();
	
		//limpar campos
		
	$nome = $verifica->limparCampo($nome);
	$apelido = $verifica->limparCampo($apelido);
	$password = $verifica->limparCampo($password);
	$rpassword = $verifica->limparCampo($rpassword);
	$email = $verifica->limparCampo($email);
	

	//verificação nome
	if($nome != $nome_ant){
	if (!$verifica -> ver_Tamanho ($nome,3)){
	$erros['nome']= "nome invalido";
	}
	if (!$verifica -> ver_Texto ($nome)){
	$erros['nome']= "nome invalido";
	}
	}
	
	//verificar apelido
	if($apelido != $apelido_ant){
	if (!$verifica -> ver_Tamanho ($apelido,2)){
	$erros['apelido']= "apelido invalido";
	}
	if (!$verifica -> ver_Texto ($apelido)){
	$erros['apelido']= "apelido invalido";
	}
	}
	
	//verificar password
	if($password != $password_ant){
	if (!$verifica -> ver_Tamanho ($password,5)){
	$erros['password']= "comprimento invalido";
	}
	
	if (!$verifica -> ver_Password ($password)){
	$erros['password']= "verificação invalida";
	}
	
	if (!$verifica -> conf_Password ($password,$rpassword)){
	$erros['rpassword']= "as passes não combinam";
	}
	}
			
	//verificar email
	if($email != $email_ant){
	if (!$verifica -> ver_Email ($email, 9)){
		$erros['email']= "email invalido";
	}
	
	//existe email
	if (!$verifica -> exist_email ($email)){
		$erros['email']= "email existente";
	}
	}
	
	
			
		//se não houver erros ele envia os dados novos para a base de dados
		if(!$erros){
			$ID = $_POST['ID'];
			try{
		
			$obj_edit = new utilizadores();
			
		
			$resultado = $obj_edit -> editar_utilizador ($ID, $nome, $apelido, $password, $email);
			
						
			}//caso tenha havido erro na execução da querry
				catch(Exception $e){
					echo "erro de edição";
					
				}
		}
	}
}
else{
	$ID=$_SESSION['id']; 
	
	//incluir ficheiro com informação da ligação à base de dados 	
	$obj_edit = new utilizadores();
	$dados = $obj_edit -> ver_utilizador($ID); 
	//chama os dados guardados na base de dados para imprimir no ecra
	$nome = $dados['nome'];
	$apelido = $dados['apelido'];
	$password = $dados['password'];
	$email = $dados['email'];
	$cpassword= $dados['password'];
		
}
?>
		


<!DOCTYPE>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<div>

<body>
	<div>
    	
    	<h1>Contrafogo</h1>
		
    
    </div>
                   
	<div>
		<div>
        
     <p></br>   <a href="ver_conta.php">Conta</a>   </p>                
        
       	</ul>
     </div>
    
    
	<div>
     	
		
		<form class="scroll" name="formulario" action="editar_perfil.php"  method="post" enctype="multipart/form-data">
                    <input name="form" type="hidden" value="1" />
                    <input name="ID" type="hidden" value="<?php echo $ID;?>" />
                    	<fieldset>
                        	
                        	<p><label>Nome:</label>
                     		<input name="nome_ant" type="hidden" value="<?php echo $nome;?>" />
                            <input name="nome" type="text" class="text-long" value="<?php echo $nome;?>"/>
							<?php if(isset($erros['nome']))if($erros['nome']!=''){ echo $erros['nome'];} ?> </p>
                        	
                            <p><label>Apelido:</label>
                            <input name="apelido_ant" type="hidden" value="<?php echo $apelido;?>" />
                            <input name="apelido" type="text" class="text-long" value="<?php echo $apelido;?>" /><?php if(isset($erros['apelido']))if($erros['apelido']!=''){ echo $erros['apelido'];} ?> </p>
                            
                            <p><label>Password:</label>
                            <input name="password_ant" type="hidden" value="<?php echo $password;?>" />
                            <input name="password" type="password" class="text-long" value="<?php echo $password;?>"/><?php if(isset($erros['password']))if($erros['password']!=''){ echo $erros['password'];} ?> </p>
                            
                            <p><label>Email: </label>
                            <input name="email_ant" type="hidden" value="<?php echo $email;?>" />
                            <input name="email" type="text" class="text-long" value="<?php echo $email;?>"/><?php if(isset($erros['email']))if($erros['email']!=''){ echo $erros['email'];} ?></p>
                            
                            <p><label>Confirma Password:</label>
                            <input   name="cpassword" type="password" class="text-long" value="<?php echo $cpassword;?>"/> <?php if(isset($erros['cpassword']))if($erros['cpassword']!=''){ echo $erros['cpassword'];} ?><p/>
                                                       
                           	   <input name="form_user" type="submit" value="Inserir" />
                        </fieldset>
                    </form>
        
        
        
        
        
        
        
        
        
		
		
     
     </div>
	
    
    
  
    
    
  </div>

</body>
</html>