<?php 

  @session_start();

  if (!isset($_SESSION["usuario"])) 
      header("Location: ../index.php");

  include_once 'servidor/conexion.php';
    
  
  $resultado = false;
  $server = new conexion();
  $conexion = $server->conectar();
  $id_usuario = $_SESSION["id"];

  $sql='SELECT * FROM situacion'; 

      $resultado = $conexion->query($sql);
      $numfilas = $resultado->num_rows;

  $sql1='SELECT id_usuario FROM usuario_selecciona_situacion WHERE id_usuario="$id_usuario"'; 

      $resultado1 = $conexion->query($sql1);
      $numfilas1 = $resultado1->num_rows;    
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
            <li  ><a href="inicio-cliente.php">Inicio</a></li>

          <li class="active"><a href="cuestionario.php">Realizar test</a></li>
            <li><a href="servidor/logout.php">Cerrar Sesion</a></li>
          </ul>         
      </div>
    </div>
  </div>
</nav>


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
          <form class="col s12">    <hr> <h2>Items Cuestionario</h2>     <br><br>  
                  <?php 
                    if ($numfilas > 0 && $numfilas1 == 0) {
                      for ($i=0; $i < $numfilas; $i++) { 
                        $fila = $resultado->fetch_object();
                        echo '      
              
                          <p>
                            <label>
                              <input type="checkbox" class="filled-in" id='.$fila->id_situacion.' />
                              <label for='.$fila->id_situacion.'>'.$fila->descripcion.'</label>
                              
                            </label>
                          </p>
                         
                        ';
                      } 
                      echo '<br><br><input type="button" class="btn" id="enviar" name="enviar" value="enviar">';                     
                    }else{
                      echo "<p style='text-align=center;'><h3>No Existen Cuestionarios Actualmente</h3</p>";
                    }



                   ?>
                   
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
                       var id ="<?php echo $_SESSION['id'] ?>"; 
                          
                     var datos=[];
                        datos.push({
                          "operacion": "agregar",
                          "usuario": id, 
                          "situacion": $(this).attr("id")

                        }); 
                    var seleccion = {"datos": datos};   
                    var json = JSON.stringify(seleccion);

                    ajax("servidor/opcion-seleccionada.php", {"json": json}).done(function(info) {
                      if (info) {
                    Materialize.toast('Items Resueltos Satisfactoriamente', 3000,'',function(){
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