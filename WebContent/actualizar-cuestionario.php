<?php 
  @session_start();

  if (!isset($_SESSION["usuario"])) 
      header("Location: ../index.php");
  include_once 'servidor/conexion.php';
    
  
  $resultado = false;
  $server = new conexion();
  $conexion = $server->conectar();

  $sql='SELECT * FROM situacion'; 

      $resultado = $conexion->query($sql);
      $numfilas = $resultado->num_rows;

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
            <li  class="active"><a href="../index.html">Inicio</a></li>
            <li><a class = "dropdown-button" href = "#" data-activates = "tha">Test Honey Alonso
         <i class = "mdi-navigation-arrow-drop-down right"></i></a></li>
         	<li><a href="registro.php">Reportes</a></li>
            <li><a href="registro.php">Cerrar Sesion</a></li>
          </ul>         
      </div>
    </div>
  </div>
</nav>

<!-- menu test de honey alonso-->
      <ul id = "tha" class = "dropdown-content">
         <li><a href = "mis-honey-alonso.php">Mis Test</a></li>
         <li class = "divider"></li>
         <li><a href = "nuevo-honey-alonso.php">Nuevo</a></li>
         <li class = "divider"></li>
         <li><a href = "actualizar-cuestionario.php">Actualizar</a></li>         
      </ul>


<div class="contenedor-principal">
    <div class="banner">
          <img class="z-depth-3 responsive-img" src="../imagenes/aprendizaje.png" class="img-banner">
    </div>

    <div class="white banner center-align">
    	<div class="row">
        	<div class="bienvenida black-text col s12">
          		<h2>Cuestionario Honey Alonso</h2>
          		<p><h3>Este cuestionario ha sido diseñado para identificar su Estilo preferido de aprendizaje. No es un test de inteligencia ni de personalidad. No hay limite de tiempo para contestar el cuestionario. </h3></p>
              <p><h3>No hay repuestas correctas ni incorrectas. Será útil en la medida que sea sincero/a en sus respuestas. Seleccione las afirmaciones con las que mayor se relacione</h3></p>
        	</div>
    	</div>  
    </div>
    <div class="container">	
      <div class="row">
          <form class="col s12">            
                  <?php 

                      for ($i=0; $i < $numfilas; $i++) { 
                        $fila = $resultado->fetch_object();
                        echo '  
                        <div class="input-field">
					    	<textarea id="'.$fila->id_situacion.'" rows="" cols="" class="materialize-textarea" value="'.$fila->descripcion.'"></textarea>
					      	<label for="descripcion">Situacion</label>
						</div>    

                         <select id="estilo" name="estilo">
                        ';						
							
								for ($i=0; $i <count($estilo) ; $i++) { 
									echo '											
										<option value="'.$estilo[$i]['id_estilo'].'">'.$estilo[$i]['nombre_estilo'].'</option>
									';
								}
							
														  
							echo "</select>";
                      }

                   ?>
                   <input type="button" class="btn" id="enviar" name="enviar" value="enviar">
          </form>            
      </div>
      						

    
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
  	$('.tooltipped').tooltip({delay:50});
  	$('select').material_select();

       	    $("#enviar").click(function(){
                $("input:checkbox:checked").each(function() {
                    //console.log($(this).attr("id"));
                     var datos=[];
                        datos.push({
                          "operacion": "agregar",
                          "usuario": 1, 
                          "situacion": $(this).attr("id")

                        }); 
                    var seleccion = {"datos": datos};   
                    var json = JSON.stringify(seleccion);

                    ajax("servidor/opcion-seleccionada.php", {"json": json}).done(function(info) {
                      if (info) {
                    Materialize.toast('Usuario Registrado Corectamente', 3000,'',function(){
                    //location.reload(true);              
                    });
                      }else{
                    Materialize.toast('Error al Registrar el Usuario', 3000,'',function(){
                    //location.reload(true);              
                    });
                      }
                    });

                                   
                });





    	        
    	        
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