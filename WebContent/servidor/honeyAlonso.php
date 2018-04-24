<?php

	/**
	* 
	*/
	include_once 'conexion.php';
		
	
	$resultado = false;
	$server = new conexion();
	$conexion = $server->conectar();
	

	if (isset($_POST["json"])){
		$ha = json_decode($_POST["json"]);
		if ($ha->{"datos"}[0]->{"operacion"} == "agregar") {

			echo $ha->{"datos"}[0]->{"operacion"};
			$descripcion = $ha->{"datos"}[0]->{"descripcion"};	
			$estilo = $ha->{"datos"}[0]->{"estilo"};

			$sql='INSERT INTO situacion(descripcion, id_estilo) VALUES("'.$descripcion.'","'.$estilo.'")'; 

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