<?php
//verifica se é administrador
require ('acesso_admin.php');
require_once ('classes/utilizador.php');
$ID=$_GET['ID'];

	$util = new utilizadores();
	$resultado = $util -> ver_utilizador ($ID);
	
	
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contrafogo-Painel-Admininstrador</title>
</head>

<body>
	<div>
    	
    	<h1>Contrafogo</h1>
        
        
        
        	<a href="admin_util.php">Utilizadores</a>    	        	                    
				<?php
                //mostra os dados do utilizador					
				  $util -> display();
				 ?>
                  
                  
                  
                 </div>
                
                
                
            </div>
</body>
</html>