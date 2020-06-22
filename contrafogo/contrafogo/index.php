<?php 
session_start();
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Pagina Inicial</title>
</head>
<body style="background-color:#d68b00">


<body>  
	<div>
    	
    	<h1>Contra-Fogo</h1>
		<h1>Ajuda no combate contra os incendios</h1>
		
	</div>
        

        <?php 
		 
		//mostra uma mensagem consoante o tipo de utilizador
		if(isset($_SESSION['id'])){ //verifica se existe id na sessao
		if( $_SESSION['nivel']== 1 )
		{
		 echo"<p>***BEM VINDO UTILIZADOR***</p>
		 <p><a href='logout.php'>Logout</a>**<a href='ver_conta.php'>Conta</a> </p>";	
				
		
		}else{if( $_SESSION['nivel']== 0 ){
         echo "<p>***BEM VINDO ADMINISTRADOR***</p>
		 <p><a href='logout.php'>Logout</a>**<a href='admin_gestao.php'>Gestao</a> </p>";
		}
		}
		}else{
			echo "<p>BEM VINDO</p>
		 <p><a href='login.php'>Login</a></p>";
			}
		 
		 ?>
        </div>
        
      
    
    </div>


</body>
</html>