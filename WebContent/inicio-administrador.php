<?php 

  @session_start();

  if (!isset($_SESSION["usuario"])) 
      header("Location: ../index.php");

 ?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
    <title>
	   SOCEA - administrador
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
            <li><a href="servidor/logout.php">Cerrar Sesion</a></li>
          </ul>         
      </div>
    </div>
  </div>
</nav>

      <ul id = "tha" class = "dropdown-content">
         <li class="active"><a href = "mis-test.php">Mis Test</a></li>
         <li class = "divider"></li>
         <li><a href = "nuevo-honey-alonso.php">Nuevo</a></li>
         <li class = "divider"></li>
         <li><a href = "actualizar-cuestionario.php">Actualizar</a></li>         
      </ul>    

<div class="contenedor-principal">
      
    <div class="container">
	    <div class="row">
	    	<div class="col s12">
	    			<div class="row">
	    				<div class="col s3"></div>
	    				<div class="col s4">
					        <div class="login center-align">
					          <div style="margin:15px 0;">
					            <i class="large material-icons">account_circle</i>
					            <p>Bienvenido</p> 
					          </div> 
					        </div> 	    				
	    				</div>
	    			</div>     		
		    </div> 
	    </div>    	
    </div>
    <div class="white banner center-align">
    	<div class="row">
        	<div class="bienvenida black-text col s12">
          		<h2>Hola <?php echo $_SESSION["usuario"]; ?></h2>
          		<h3>En este espacio podras agregar, modificar distintos tipos de Test relacionados con los de Honey Alonso y Vark, ademas de ver reportes porcentuales de estudiantes y sus resultado en los test</h3>
        	</div>
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
  </script>

<script type="text/javascript">	 
	
  $(document).ready(function(){
  	$('.tooltipped').tooltip({delay:50});
  	$('select').material_select();

       	    $("#registrarUsuario").click(function(){
    	    	 
       	    	 var datos=[];
       	    	 		datos.push({
       	    	 			"operacion": "registrarUsuario",
       	    				"documento": $("#documento").val(), 
       	    				"nombre": $("#nombre").val(),
       	    				"apellido": $("#apellido").val(), 
       	    				"email": $("#email").val(),
       	    				"programa": $("#programa").val(), 
       	    				"semestre": $("#semestre").val(),
       	    				"usuario": $("#usuario").val(), 
       	    				"contraseña": $("#contraseña").val()
       	    			}); 
       	    	var usuario = {"datos": datos};		
       	    	var json = JSON.stringify(usuario);

       	    	ajax("servidor/usuario.php", {"json": json}).done(function(info) {
       	    		if (info) {
		    			Materialize.toast('Usuario Registrado Corectamente', 3000,'',function(){
							location.reload(true);				    	
		    			});
       	    		}else{
		    			Materialize.toast('Error al Registrar el Usuario', 3000,'',function(){
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