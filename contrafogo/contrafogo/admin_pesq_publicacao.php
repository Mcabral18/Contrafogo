<?php
//vai ver se o utilizador é do tipo admin e apenas deixa aceder o administrador
require ('acesso_admin.php');
?>
<!DOCTYPE>
<html
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contrafogo-Administrador</title>
</head>

<body>
	<div>
    	
    	<h1>Contrafogo</h1>
        
        
        <ul>
        	<li><a href="admin_gestao.php">Conta</a></li>
        </ul>
               <div>
                 
                 
                <?php 
				require_once('classes/pesquisa_pub.php');
				$teste = new pesquisa;
				$dados = $teste -> pesq_publicacao_total();
				            
                if($dados -> num_rows != 0)
							{
								
					?>
					<table>
                    <tr>
                        <td>ID**</td>                     
                        <td>acoes</td>
                    </tr> 
                    <?php 			
									$contador=0;
									
									while ($publicacao = $dados->fetch_array(MYSQLI_ASSOC))
                                    {
										
										if($contador%2==0){
					?>   
                            <tr>
                            	<td><?php echo $publicacao["id_publicacao"];?></td>
                                
								<td><a href="admin_ver_publicacao.php?ID=<?php echo $publicacao["id_publicacao"];?> "view">View</a>**<a href="apagar_publicacao.php?ID=<?php echo $publicacao["id_publicacao"];?>"delete">Delete</a></td></tr>  
                            
                    <?php 				}else{	?>       
                            <tr>
                            	<td><?php echo $publicacao["id_publicacao"];?></td>
                                
                                <td><a href="admin_ver_publicacao.php?ID=<?php echo $publicacao["id_publicacao"];?> "view">View</a>**<a href="apagar_publicacao.php?ID=<?php echo $publicacao["id_publicacao"];?>"delete">Delete</a></td>
                            </tr>                        
							                      
                        		
					<?php
								   
										}	
									  $contador++;
								   }
								}	
								else
								{//caso nao consiga encontrar dados para listar
								   echo "Nao existem dados para listar.";
								}
							
							
					?>
                    	</table>	 
                 
                 
                
                 
                 
                 
                 
                 
                 
                 
                 
                 
                </div>


</body>
</html>