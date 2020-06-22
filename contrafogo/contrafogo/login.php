<?php
session_start();
  require_once ('classes/verificar_utilizador.php');
  require_once ('classes/login.php');

if(isset($_POST['form']))
if($_POST['form']==1)
{ // verificar se foi submetido o formulário
	//guarda os campos inseridos
	$nome=$_POST['nome'];
	$password=$_POST['password'];
	$erros=NULL;
		// verificar todos os campos
		$verifica = new verificarCampo();
		$nome = $verifica->limparCampo($nome);
		$password =$verifica->limparCampo($password);
		
		if (!$verifica -> campo_vazio ($nome)){
		$erros['nome']= "preencha o campo";
		}
		if (!$verifica -> campo_vazio ($password)){
		$erros['password']= "preencha o campo";
		}
	
			
		//se nao houver erros
		if(count($erros)==0){

			try{
		$registo= new utilizadores();
		$result = $registo->login($nome, $password);
	
		
		if ($result == false){
			$erros['autenticacao']= 'Nome ou Password errados';
		}
	}
	catch(Exception $e){
		echo "Login error!";
	}
}	
}

?>        
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Login</title>
</head>
<body style="background-color:#A9A9A9">      
	<div>       
		
		
		
		</div>
             
            <p>  <a href="index.php">Home</a></li> </br></br></br> </p>                   
                
                <div align="center">
                    <form name="formulario" action="login.php" class="jNice" method="post" enctype="multipart/form-data">
                    <input name="form" type="hidden" value="1" />
                    	<fieldset>
                        	<p><label>Nome:</label><input name="nome" type="text" class="text-long" /></p><?php if(isset($erros['nome'])){echo $erros['nome'];}?>
                        	<p><label>Password:</label><input name="password" type="password" class="text-long" /></p><?php if(isset($erros['password'])){echo $erros['password'];}?>
                            
                           	   <input name="form_user" type="submit" value="Login" />
                        </fieldset>
                    </form>
                    <?php if(isset($erros['autenticacao'])){echo $erros['autenticacao'];}?>
                      <!-- erro caso nao de para autenticar --> 
                </div>
           		
		
		
		
		
		
     
  </div>
	
    
    
    
    
    
  </div>
 <a href='registo.php'>Regista-te</a>
</body>
</html>