<?php

	require_once('classes/ver_publi.php');
	require_once('classes/votacao.php');
	require_once('classes/comentarios.php');
	require_once('classes/verificar_publicacao.php');
	session_start();
	$id_publicacao=$_GET['ID'];
	
	
	//cria um objecto do tipo publicacao e faz a pesquisa pelo ID 	
	$obj_edit = new publicacao();
	$dados= $obj_edit -> ver_publicacao($id_publicacao); 
	
	if(!empty($_POST['op'])){
	if($_POST['op']=='insert_coment'){
		$descricao = $_POST['descricao'];
		$data = date('Y-m-d');
		$id_publicacao = $_POST['id_publicacao'];
		$id_util = $_SESSION['id'];
		
		$erros = NULL;
		
		//validar campos
		$validar = new verificarpublicacao();
		
		$comentario = $validar->limparpublicacao($descricao);
			
		//validar comentario
		if (!$validar -> ver_Tamanho ($descricao,200)){
			$erros['descricao']= "comentário inválido";
		}
		
		
		if (!$erros){
			
			//adicionar
			try{
				$objeto = new comentarios ();
				$resultado = $objeto->addComentario($descricao, $data, $id_publicacao, $id_util);
				
				if($resultado != '1'){
					header('location: '.$_SERVER["HTTP_REFERER"]);
				}
			}
			catch(Exception $e){
				echo $e->getMessage("Erro");
			}
		}	
	}//Add votacao
	if($_POST['op']=='insert_voto'){
		$valor = $_POST['valor'];
		$id_publicacao = $_POST['id_publicacao'];
		$id_util = $_SESSION['id'];
		
		$erros = NULL;
		
		if (!$erros){
			
			//adicionar
			try{
				$objeto = new votacoes ();
				$resultado = $objeto->addVotacao($valor, $id_publicacao, $id_util);
				
				if($resultado != '1'){
					header('location: '.$_SERVER["HTTP_REFERER"]);
				}
			}
			catch(Exception $e){
				echo $e->getMessage("Erro");
			}
		}	
	}
}
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
    	
    	<h1>Contrafogo</h1>
		
	</div>                   
    </div>
    
    
    
    
    
	<div>
		<div>
        <ul>
         <li><a href="ver_conta.php">Conta</a></li>
        <li><a href="publicacoes.php">Publicacoes</a>

        </li>
       
       	</ul>
     </div>
        
            
    </div>
    
    
    
    
	<div>
     	
      
<!-- chama a função display para visualisar o objecto -->
<?php $obj_edit -> display(); ?>



<?php
//VOTAÇAO
$objvoto = new votacoes();
$mediavotos = $objvoto -> displayMedia('WHERE id_publicacao ='.$id_publicacao , ''); //calcula a media
$mediavotacoes = $mediavotos->fetch_array(MYSQLI_ASSOC);
?>
<p>
	<?php  // se a media for maior que 0 
		if($mediavotacoes['mediavalor']>0){
			echo number_format($mediavotacoes['mediavalor'], 1).'/5 Escala<br/>';
		}
		else{//se não for
			echo 'Sem classificacao<br/>';
		}
		if(isset($_SESSION['id'])){ //caso exista sessão aberta
			//consulta o voto 
			$resultadovoto = $objvoto -> displayVoto('WHERE id_util ='.$_SESSION['id'].' AND id_publicacao ='.$id_publicacao, '');
			//se ainda não tiver votado
			if($row_cnt = $resultadovoto->num_rows == 0){ ?>
				<form action="" method="POST" >
                	<input type="hidden" name="id_publicacao" value="<?php echo $id_publicacao; ?>"/>
                    <input type="hidden" name="op" value="insert_voto"/>
                    <input type="number" min="1" max="5" name="valor" value="5"(> Escala<br/>
                    <input type="submit" value="Votar"/>
                </form>
			<?php }
			
			else{ //edição de voto
				$dadosvoto = $resultadovoto->fetch_array(MYSQLI_ASSOC); 
				if(isset($_GET['edit_v'])){?>
				<form action="editar_voto.php" method="POST" >
                    <input type="hidden" name="id_voto" value="<?php echo $dadosvoto['id_votacao']; ?>"/>
                    <input type="number" min="1" max="5" name="valor" value="<?php echo $dadosvoto['votacao']; ?>"(> Escala<br/>
                    <input type="submit" value="Atualizar"/>
                </form>
				<?php }
				else{ //imprime resultado
					echo 'Minha Classificacao: '.$dadosvoto['votacao'].'/5 Escala <a href="ver_publicacao.php?ID='.$id_publicacao.'&edit_v='.$dadosvoto['id_votacao'].'">Editar</a> <a href="apagar_voto.php?idVoto='.$dadosvoto['id_votacao'].'">Remover</a>';
				}
			}
		} ?>
</p>
</div>
<?php 
//COMENTARIOS
if(!empty($_SESSION['id'])){?>
    <div>
        <div>
            <form name="formulario" method="POST" action="">
                <input type="hidden" name="id_publicacao" value="<?php echo $id_publicacao; ?>"/>
                <input type="hidden" name="op" value="insert_coment"/>
                <textarea name="descricao"></textarea>
                <?php if(isset($erros['descricao']))if($erros['descricao']!=''){ echo $erros['descricao'];} ?>
                <input type="submit" value="Enviar"/>
            </form>
         </div>
    </div>
<?php
}
$objComm = new comentarios();
$resultados = $objComm -> displayComentario($id_publicacao, 'id_publicacao', 'ORDER BY id_coment DESC');
while($dados = $resultados->fetch_array(MYSQLI_ASSOC)){
?>
    <hr style="clear: both;"/>
    <div style="width: 500px; clear: both;">
        <div style="float: right;">
			<?php echo  date("d-m-Y", strtotime($dados['data_coment'])); ?>
            <?php if((!empty($_SESSION['id'])) && ($_SESSION['id'] == $dados['id_util'])){?>
            <span style="text-align:right">
                <a href="ver_publicacao.php?ID=<?php echo $id_publicacao; ?>&edit_c=<?php echo $dados['id_coment']?>">Editar</a>
                <a href="apagar_comentario.php?ID=<?php echo $dados['id_coment']?>">Remover</a>
            </span><?php } ?><br/>
            <?php
            	if(isset($_GET['edit_c'])){
					if($_GET['edit_c']==$dados['id_coment']){ ?>
						<form action="editar_comentario.php" method="POST">
                        	<input type="hidden" name="id_coment" value="<?php echo $dados['id_coment']; ?>" />
                        	<textarea name="descricao"><?php echo $dados['descricao']; ?></textarea>
                            <input type="submit" value="Atualizar"/>
                        </form>
			<?php }
					else{
						echo $dados['descricao'];
					}
				}
				if(!isset($_GET['edit_c'])){
					echo $dados['descricao'];
				}
			?>
        </div>
    </div>
    <hr style="clear: both;"/>
<?php } ?>











<div>

</div>	
		
     
     </div>
	
    
    
    
    
    
  </div>


 






<p>-----------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------------</p>
</body>
</html>
<!DOCTYPE html >
  <head>
    <meta name="viewport" content="initial-scale=1.0, user-scalable=no" />
    <meta http-equiv="content-type" content="text/html; charset=UTF-8"/>
    <title>Using MySQL and PHP with Google Maps</title>
    <style>
      /* Always set the map height explicitly to define the size of the div
       * element that contains the map. */
      #map {
        height: 200%;
      }
      /* Optional: Makes the sample page fill the window. */
      html, body {
        height: 50%;
        margin: 0;
        padding: 0;
      }
    </style>
  </head>

<html>
  <body>
    <div id="map"></div>

    <script>
      var customLabel = {
        Incendio: {
          label: 'I'
        },
      };

        function initMap() {
        var map = new google.maps.Map(document.getElementById('map'), {
          center: new google.maps.LatLng(-33.863276, 151.207977),
          zoom: 8
        });
        var infoWindow = new google.maps.InfoWindow;

          // Change this depending on the name of your PHP or XML file
          downloadUrl('https://storage.googleapis.com/mapsdevsite/json/mapmarkers2.xml', function(data) {
            var xml = data.responseXML;
            var markers = xml.documentElement.getElementsByTagName('marker');
            Array.prototype.forEach.call(markers, function(markerElem) {
              var id = markerElem.getAttribute('id');
              var name = markerElem.getAttribute('name');
              var address = markerElem.getAttribute('address');
              var type = markerElem.getAttribute('type');
              var point = new google.maps.LatLng(
                  parseFloat(markerElem.getAttribute('lat')),
                  parseFloat(markerElem.getAttribute('lng')));

              var infowincontent = document.createElement('div');
              var strong = document.createElement('strong');
              strong.textContent = name
              infowincontent.appendChild(strong);
              infowincontent.appendChild(document.createElement('br'));

              var text = document.createElement('text');
              text.textContent = address
              infowincontent.appendChild(text);
              var icon = customLabel[type] || {};
              var marker = new google.maps.Marker({
                map: map,
                position: point,
                label: icon.label
              });
              marker.addListener('click', function() {
                infoWindow.setContent(infowincontent);
                infoWindow.open(map, marker);
              });
            });
          });
        }



      function downloadUrl(url, callback) {
        var request = window.ActiveXObject ?
            new ActiveXObject('Microsoft.XMLHTTP') :
            new XMLHttpRequest;

        request.onreadystatechange = function() {
          if (request.readyState == 4) {
            request.onreadystatechange = doNothing;
            callback(request, request.status);
          }
        };

        request.open('GET', url, true);
        request.send(null);
      }

      function doNothing() {}
    </script>
    <script async defer
    src="https://maps.googleapis.com/maps/api/js?key=AIzaSyBizGcu5s2DXCt0pcJQDGWGhR-N7xEA4L8&callback=initMap">
    </script>