<?php 

	include_once 'conexion.php';
	
	class genero
	{

		
		function __construct()
		{ 
	
		}

		function getGenero(){
						$server = new conexion();
				$conexion = $server->conectar();
		$sql = "SELECT * FROM genero";

			$stmts = $conexion->prepare($sql);

			if($stmts->execute()){
				$json = array();
				$stmts->store_result();

				$stmts->bind_result($id_genero, $descripcion);

				while ($stmts->fetch()) {
					$fila = array('id_genero' => $id_genero, 'descripcion' => $descripcion);
					$json[] = $fila;
				}
				$conexion->close();
				return $json;

			}else{
					$conexion->close();
				return $conexion->error;
			}

		}

	}




 ?>