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
	
<?php
//chama a pagina que verifica se esta ou não autentificado
	require_once('acesso_util.php');
	require_once('classes/verificar_publicacao.php');
	require_once('classes/publicacao.php');
	
if(isset($_POST['form'])) //verifica se existem dados inseridos pelo formulario
if($_POST['form']==1) // verificar se foi submetido o formulário
{ 
//leitura dos campos para variaveis
	$id = $_SESSION['id'];
	
	$pais=$_POST['pais'];
	$descricao=$_POST['descricao'];
	$imagem=$_FILES['file'];
	$erros = NULL;
	
	
	$verifica = new verificarPublicacao();
	
	//limpar campos
	$pais = $verifica->limparPublicacao($pais);
	$descricao = $verifica->limparPublicacao($descricao);
	
	

	//Pais
	if (!$verifica -> ver_Tamanho ($pais,20)){
	$erros['pais']= "pais invalido";
	}
	//descricao
	if (!$verifica -> ver_Tamanho ($descricao,50)){
	$erros['descricao']= "descricao invalida";
	}	
	//imagem
	if (!$verifica -> ver_imagem ($imagem)){
	$erros['imagem']= "imagem  invalida";
	}

if ( !$erros){
			
			
			
			try{
		
			$add_publicacao = new publicacao();
			
		
			$resultado = $add_publicacao -> add_publicacao($id,$pais,$descricao,$imagem);
			
						
			}//caso tenha havido erro na execução da querry
				catch(Exception $e){
					echo "erro de adição de publicacao";
					
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

<body>   
    	<h1>Contrafogo</h1>
				                  
        <a href="ver_conta.php">Conta</a>
                                
	<div>
     	<!-- Formulario do resgisto -->
		
		           <form  id="registo" name="formulario" action="inserir_publicacao.php" method="post" enctype="multipart/form-data">
						<input name="form" value="1" type="hidden" />
                        
                        	<p><label>Pais:</label><br />
                            <input name="pais" type="text" class="text-long" /><?php if(isset($erros['pais']))if($erros['pais']!=''){ echo $erros['pais'];} ?> </p>
                            
                            <p><label>Descricao:</label><br />
                            <textarea name="descricao" cols="30" rows="5"/> </textarea><?php if(isset($erros['descricao']))if($erros['descricao']!=''){ echo $erros['descricao'];} ?> </p>
                            
                           <p><label>Imagem: </label><br />
                             <input name="file" type="file" /><?php if(isset($erros['imagem']))if($erros['imagem']!=''){ echo $erros['imagem'];} ?></p>
                          
                            
                           	   <input name="form_user" type="submit" value="Inserir" />
                              
                             
                        
					</form>
		
		
		
     
     </div>
	

</body>
</html>