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
<title>Contrafogo-Admininstrador</title>
</head>

<body>
	<div>
    	
    	<h1>Contrafogo</h1>
        
        
        <ul>
        	<li><a href="admin_gestao.php">Gestao</a></li>     	        
        </ul>
        
        
        <div>
			<div>
        		<div>
                <ul>
				        <li><a href="admin_pesq_publicacao.php">Publicacoes</a>    
                    	<li><a href="admin_util.php">Utilizadores</a></li>
                        <li><a href="admin_add_publicacao.php">Adicionar Publicacao</a></li>
                        <li><a href="admin_editar_perfil.php?id=1">Editar Dados</a></li>
                    
                    </ul>
                    
	                    
				<?php
                //mostra os dados do utilizador					
				  $util -> display();
				 ?>
                  
                  
                  
                 </div>
                
                
                <div></div>
            </div>
</body>
</html>