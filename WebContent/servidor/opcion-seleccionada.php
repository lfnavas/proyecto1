<?php

	/**
	* 
	*/
	include_once 'conexion.php';
		
	
	$resultado = false;
	$server = new conexion();
	$conexion = $server->conectar();
	

	if (isset($_POST["json"])){
		$seleccion = json_decode($_POST["json"]);
		if ($seleccion->{"datos"}[0]->{"operacion"} == "agregar") {

			echo $seleccion->{"datos"}[0]->{"operacion"};	
			$situacion = $seleccion->{"datos"}[0]->{"situacion"};

			$sql='INSERT INTO usuario_selecciona_situacion(id_usuario, id_situacion) VALUES("'.$usuario.'","'.$situacion.'")'; 

			if ($conexion->query($sql)) {
				
				

					$resultado = true;
					
					
	            
	        }else{
		    	echo false;     	
	        }

		}else if ($seleccion->{"datos"}[0]->{"operacion"} == "eliminar") {
			$situacion = $seleccion->{"datos"}[0]->{"situacion"};
			$sql='DELETE FROM situacion WHERE id_situacion = '.$situacion;
			if ($conexion->query($sql)) {
				
				

					$resultado = true;
					
					
	            
	        }else{
		    	echo false;     	
	        }
		}
 		
		echo $resultado;

		

	}

	/**
	* 
	*/





	




?>