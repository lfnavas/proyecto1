<?php 

include_once 'servidor/programa.php';

$server = new programa();

$programas = $server->getPrograma();

include_once 'servidor/genero.php';

$server1 = new genero();

$genero1 = $server1->getGenero();


?>
<!DOCTYPE html>
<html lang="es">
<head>
  <meta charset="UTF-8">
    <title>
	   SOCEA - Registro
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
            <li><a href="../index.php">Inicio</a></li>
            <li class="active"><a href="registro.php">Registrarse</a></li>
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
          		<h2>Realiza el proceso de registros</h2>
          		<h3>Al registrarte pudes tener acceso a los distintos test de estilos de aprendizaje y ver con cual estilo(s) te identifica(s) </h3>
        	</div>
    	</div>  
    </div>
    <div class="container">
	    <div class="row">
	    	<div class="col s12">
	    			<div class="row">
	    				<div class="col s3"></div>
	    				<div class="col s4">
					        <div class="login center-align">
					          <div style="margin:15px 0;">
					            <i class="large material-icons">account_circle</i>
					            <p>Registrate</p> 
					          </div> 
					        </div> 	    				
	    				</div>
	    			</div>
   			
		    	<form>
				    <div class="row">
				      <div class="input-field col s12">
				        <input id="documento" type="text" class="validate">
				        <label for="documento">Documento</label>
				      </div>
				    </div>
					<div class="row">
						<div class="input-field col s6">
						    <input id="nombre" name="nombre" type="text" class="validate">
						    <label for="nombre">Nombre</label>
						</div>   
						<div class="input-field col s6">
							<input id="apellido" name="apellido" type="text" class="validate">
							<label for="apellido">Apellido</label>
						</div>  				    				
					</div>	
					<div class="row">
						<div class="input-field col s6">
									<label for="genero">Genero</label>
									<br><br>
									<select id="genero">
										
										<?php 
											for ($i=0; $i <count($genero1) ; $i++) { 
												echo '
													
													<option value="'.$genero1[$i]['id_genero'].'">'.$genero1[$i]['descripcion'].'</option>
												';
											}



										 ?>
									  
									</select>
							
						</div> 				    				
					</div>									    
				    <div class="row">
				      <div class="input-field col s12">
				        <input id="email" name="email" type="email" class="validate">
				        <label for="email">Email</label>
				      </div>
				    </div>	
		    
					<div class="row">
						<div class="input-field col s6">
									<label for="programa">PROGRAMA</label>
									<br><br>
									<select id="programa" name="programa">
										<?php 
											for ($i=0; $i <count($programas) ; $i++) { 
												echo '
													
													<option value="'.$programas[$i]['id'].'">'.$programas[$i]['nombre'].'</option>
												';
											}



										 ?>
									  
									</select>
						</div>   
						<div class="input-field col s6">
							<input id="semestre" name="semestre" type="text" class="validate">
							<label for="semestre">Semestre</label>
						</div>  				    				
					</div>			    			    
					<div class="row">
						<div class="input-field col s6">
						    <input id="usuario" name="usuario" type="text" class="validate">
						    <label for="usuario">Usuario</label>
						</div>   
						<div class="input-field col s6">
							<input id="contraseña" name="contraseña" type="password" class="validate">
							<label for="contraseña">Password</label>
						</div>  				    				
					</div>
				    <div class="row">
				      <div class="col s12">
				   		<button class="btn waves-effect waves-light" type="submit" name="action" id="registrarUsuario">Registrar
				        	<i class="material-icons right">send</i>
				    	</button>	
				      </div>
				    </div>	
					
	    			
		    	</form>      		
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
       	    				"genero": $("#genero").val(),
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