<?php 

	/**
	* 
	*/
	include_once 'conexion.php';
		
	
	$resultado = false;
	$server = new conexion();
	$conexion = $server->conectar();
	

	if (isset($_POST["json"])){
		$usuario = json_decode($_POST["json"]);
		if ($usuario->{"datos"}[0]->{"operacion"} == "registrarUsuario") {

			$documento = $usuario->{"datos"}[0]->{"documento"};	
			$nombre = $usuario->{"datos"}[0]->{"nombre"};
			$apellido = $usuario->{"datos"}[0]->{"apellido"};
			$genero = $usuario->{"datos"}[0]->{"genero"};
			$email = $usuario->{"datos"}[0]->{"email"};
			$programa = $usuario->{"datos"}[0]->{"programa"};
			$semestre = $usuario->{"datos"}[0]->{"semestre"};
			$nombre_usuario = $usuario->{"datos"}[0]->{"usuario"};
			$contraseña = $usuario->{"datos"}[0]->{"contraseña"};
			

			$sql='INSERT INTO usuario(documento, nombre, apellido, email, semestre, usuario, contrasena, id_genero) VALUES("'.$documento.'","'.$nombre.'","'.$apellido.'","'.$email.'","'.$semestre.'","'.$nombre_usuario.'","'.$contraseña.'","'.$genero.'")'; 

			if ($conexion->query($sql)) {
				
				$last_id = $conexion->insert_id;

					$sql2='INSERT INTO usuario_tiene_programa(id_usuario, id_programa) VALUES("'.$last_id.'","'.$programa.'")'; 
					if ($conexion->query($sql2)) {
						$resultado = true;
					}else{
						$conexion->query('DELETE FROM usuario WHERE id="'.$last_id.'"');
						$resultado = false; 
					}
	            
	        }else{
		    	echo false;     	
	        }

		}
 		
		echo $resultado;

		

	}



 ?>