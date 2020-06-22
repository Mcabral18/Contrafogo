<?php
//vai ver se o utilizador é do tipo admin e apenas deixa aceder o administrador
require ('acesso_util.php');
?>
<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
<title>Contrafogo</title>
</head>

<body>
	<div>    	
    	<h1>Contrafogo</h1>
		
		        
         
    
    </div>
        
        
	<div>
		<div>
        <ul>

        <li><a href="ver_conta.php">Conta</a>
        
        </li>
       	</ul>
     </div>   


                
                
                 
                 
                <?php 
				require_once('classes/pesquisa_pub.php');
				$teste = new pesquisa;
				$dados = $teste -> pesq_publicacao_total();
				            
                if($dados -> num_rows != 0)
							{
								
					?>
					<table>
                    <tr>
                        
                        <td></br>&nbsp &nbsp           Pais</td>                        
                    </tr> 
                    <?php 			
									$contador=0;
									
									while ($publicacao = $dados->fetch_array(MYSQLI_ASSOC))
                                    {
										
										if($contador%2==0){
					?>   
                            <tr>
                            	<td></td>
                                <td><?php echo $publicacao["pais"];?></td>
								<td><a href="ver_publicacao.php?ID=<?php echo $publicacao["id_publicacao"];?> "view">Visualizar</a>                           </tr>  
                            
                    <?php 				}else{	?>       
                            <tr>
                            	<td></td>
                                <td><?php echo $publicacao["pais"];?></td>
                                <td><a href="ver_publicacao.php?ID=<?php echo $publicacao["id_publicacao"];?> "view">Visualizar</a>
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
                 
                 
                
                 
                 
                 
                 
                 
                 
                 
                 
                 
                


</body>
</html>