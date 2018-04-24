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
            <li  class="active"><a href="inicio-cliente.php">Inicio</a></li>

         	<li><a href="cuestionario.php">Realizar test</a></li>
            <li><a href="servidor/logout.php">Cerrar Sesion</a></li>
          </ul>         
      </div>
    </div>
  </div>
</nav>

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
          		<h3>En este espacio podras realizar los test, presentados para conocer tu estilo propio de aprendizaje</h3>
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
	

	</script>	
</body>
</html>