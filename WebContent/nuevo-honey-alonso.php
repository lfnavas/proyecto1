<?php 
  @session_start();

  if (!isset($_SESSION["usuario"])) 
      header("Location: ../index.php");
include_once 'servidor/estilos.php';

$server = new estilo();

$estilo = $server->getEstilo();
												
													
													


?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
    <title>
	   SOCEA - Cuestionario Honey Alonso
    </title>
    <!--Import Google Icon Font-->
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons"
      rel="stylesheet">
    <!--Import materialize.css-->
    <link type="text/css" rel="stylesheet" href="../css/materialize.min.css"
      media="screen,projection" />
    <link rel="stylesheet" type="text/css" rel="stylesheet" href="../css/estilo.css">  
    <link href="https://fonts.googleapis.com/icon?family=Material+Icons" rel="stylesheet">
    <!--Let browser know website is optimized for mobile-->
    <meta name="viewport" content="width=device-width, initial-scale=1.0" />
        
				
</head>  
     
<body class="font-cover" id="main">
  <!-- MENU DE NAVEGACION --> 
<nav class="#472C85">
  <div class="nav-wrapper">
    <div class="black-text row">
      <div class="z-depth-5 black-text col s12">
          <a href="../index.html" class="brand-logo"><h1>SOCEA</h1></a>      
          <ul id="nav-mobile" class="right hide-on-med-and-down">
            <li ><a href="../index.html">Inicio</a></li>
            <li class="active"><a class = "dropdown-button" href = "#" data-activates = "tha">Test Honey Alonso
         <i class = "mdi-navigation-arrow-drop-down right"></i></a></li>

         	<li><a href="registro.php">Reportes</a></li>
            <li><a href="servidor/logout.php">Cerrar Sesion</a></li>
          </ul>         
      </div>
    </div>
  </div>
</nav>

      <ul id = "tha" class = "dropdown-content">
         <li><a href = "mis-test.php">Mis Test</a></li>
         <li class = "divider"></li>
         <li><a href = "nuevo-honey-alonso.php">Nuevo</a></li>       
      </ul>

<div class="contenedor-principal">
    <div class="banner">
          <img class="z-depth-3 responsive-img" src="../imagenes/aprendizaje.png" class="img-banner">
    </div>

    <div class="white banner center-align">
    	<div class="row">
        	<div class="bienvenida black-text col s12">
          		<h2>Cuestionario Honey Alonso</h2>
          		<h3>Seleccione la cantidad de situaciones para agregar al nuevo cuestionario y agreguelas posteriormente</h3>
        	</div>
    	</div>  
    </div>
    <div class="container">

		
		<form class="formulario">
				<div class="row">
					<div class="col s12">
						<div class="input-field">
					    	<textarea id="descripcion" rows="" cols="" class="materialize-textarea"></textarea>
					      	<label for="descripcion">Situacion</label>
						</div>
						<div class="col s6">
							<label for="estilo">Estilo</label>
														
							<select id="estilo" name="estilo">
							<?php 
								for ($i=0; $i <count($estilo) ; $i++) { 
									echo '											
										<option value="'.$estilo[$i]['id_estilo'].'">'.$estilo[$i]['nombre_estilo'].'</option>
									';
								}
							?>
														  
							</select>
						</div>	
						<div class="row">
							<div class="col s12">
								<div class="col s6"><br>
									<input type="button" id="agregar" value="Agregar" class="btn" />	
			    				</div>	
			    				<div class="col s6"><br>
									<input type="button" id="ver" value="Ver Cuestionario" class="btn" />	
			    				</div>	 								
							</div>
						</div>
	 					
				</div>

				       						

		</form> 	    
	</div>
</div>

      <footer>
       
        <div class="white">
        <div class="row">
          <div class="col s12 m12 l12">
            <img src="" class="img-responsive"><span>Contáctanos:</span>
          </div>
          <div class="col-md-8 col-sm-8 numeros-contacto">
            <div class="col-md-7 col-sm-6">
              <p>Línea de atención a comercios Bogotá:</p>
              <p>327 8690</p>
            </div>
            <div class="col-md-5 col-sm-6">
              <p>Otras ciudades:</p>
              <p> 01 8000 975 806 </p>
            </div>
          </div>
        </div>
      </div>




	<script type="text/javascript"
		src="https://code.jquery.com/jquery-3.2.1.js"></script>
  <script type="text/javascript" src="../js/materialize.js"></script>


  <script type="text/javascript">

    $(document).ready(function() {
    	$('select').material_select();
  	});
	  	 $('#descripcion').trigger('autoresize');

  </script>  
  <script type="text/javascript">

  </script>
<script type="text/javascript">	 
	
  $(document).ready(function(){
  	$('.tooltipped').tooltip({delay:10});
  	$('select').material_select();

  			$("#ver").click(function() {
  				window.open("mis-test.php", "SOCEA - Cuestionario ");

  			});

       	    $("#agregar").click(function(){
    	    	 
       	    	 var datos=[];
       	    	 		datos.push({
       	    	 			"operacion": "agregar",
       	    				"descripcion": $("#descripcion").val(), 
       	    				"estilo": $("#estilo").val()

       	    			}); 
       	    	var ha = {"datos": datos};		
       	    	var json = JSON.stringify(ha);

       	    	ajax("servidor/honeyAlonso.php", {"json": json}).done(function(info) {
       	    		//console.log(info);
       	    		if (info) {
		    			Materialize.toast('Item Agregado Corectamente', 3000,'',function(){
							location.reload(true);				    	
		    			});
       	    		}else{
		    			Materialize.toast('Error al Registrar el Item', 3000,'',function(){
							location.reload(true);				    	
		    			});
       	    		}
       	    	});

       	    	return false;



    	        
    	        
    	    });



  });

  	   function ajax(url, data){

    	    	var ajax = $.ajax({
       	    		"url": url,
       	    		"data": data,
       	    		"type": "POST",

       	    	
       	    	});
       	    	 return ajax;

    	    }

	</script>	
</body>
</html>