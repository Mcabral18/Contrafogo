<?php
require_once('acesso_util.php');
require_once('classes/pesquisa_pub.php');
	
	$id= $_SESSION['id'];
	//incluir ficheiro com informação da ligação à base de dados 	
	$obj_edit = new pesquisa();
	$resultado =$obj_edit -> pesq_publicacoes($id);
		
	
?>


<!DOCTYPE html>
<html>
<head>
<meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
</head>
<body>
<div>

<body>
	<div>
    	
    	<h1><a><span>Contrafogo</span></a></h1>       
       
        </div>
		
         
		 </div>
    
    
    
       
    
    
	<div>
		<div>
        <ul>

        
		  <li><a href="publicacoes.php">Publicacoes</a></li>
          <li><a href="ver_conta.php">Conta</a></li>
        
       	</ul>
     </div>
       

    
	<div>
     	
      
         <?php 
		 
		 if($resultado-> num_rows != 0)
								{
									
					?>
					<table align="center" border="1">
                    <tr>
                        <td>Pais</td>
                        <td >Acoes</td>
                    </tr> 
                    <?php 			
									
									//enquanto houver dados para imprimir
									while ($resultados = $resultado->fetch_array(MYSQLI_ASSOC))
                                    {
					?>   
                            <tr>
                            	<td><?php echo $resultados["pais"]?></td>
								<td></a>&nbsp;<a href="apagar_publicacao.php?ID=<?php echo $resultados ["id_publicacao"];?>" class="delete">Apagar</a></td></tr>                          
							                      
                        		
					<?php
								   
			
								}}
								else
								{
								   echo '<strong align="center">Nao fez publicacoes</strong>';
								}
							
							
					?>
                    	</table>	
		
		
     
     </div>
	
    
    
    
    
    
  </div>

</body>
</html>