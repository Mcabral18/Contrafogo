<?php
	require ('acesso_admin.php');
	?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contrafogo-Administrador</title>
</head>

<body>
	<div>
    	
    	<h1>Contrafogo</h1>
        
        
        
        	<a href="admin_gestao.php">Gestao</a>     	        
        
 <p>----------------------------------------------------------------------------------------------------------------------------------</p>                     
                <div>
                 
                 
                <?php
				require_once('classes/pesquisa_util.php');
				$teste = new pesquisa;
				$dados = $teste -> pesq_util_total();
				            
                if($dados -> num_rows != 0)
							{
								
					?>
					<table>
                    <tr>
                        
                        <td>Nome**</td>
                        
                        <td>acoes</td>
                    </tr> 
                    <?php 	                           					
									$contador=0;
									
									while ($util = $dados->fetch_array(MYSQLI_ASSOC))
                                    {
										
										if($contador%2==0){
					?>   
                            <tr>
                            	
                                <td><?php echo $util["nome"];?></td>
								<td><a href="admin_ver.php?ID=<?php echo $util["id_utilizador"];?> "view">Visualizar</a>**<a href="apagar_util.php?ID=<?php echo $util["id_utilizador"];?> "delete">Apagar</a></td></tr>  
                            
                    <?php 				}else{	?>       
                            <tr>
                            	
                                <td><?php echo $util["nome"];?></td>
                                <td><a href="admin_ver_util.php=<?php echo $util["id_utilizador"];?> "view">Visualizar</a>**<a href="apagar_util.php?ID=<?php echo $util["id_utilizador"];?> "delete">Apagar</a></td>
                            </tr>                        
							                      
                        		
					<?php
								   
										}	
									  $contador++;
								   }
								}	
								else
								{//caso nao consiga encontrar dados para listar
								   echo "Não existem dados para listar.";
								}
							
							
					?>
                    	</table>	 
                
                </div>
                
                
                
            </div>

</body>
</html>
