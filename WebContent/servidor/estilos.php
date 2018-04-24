<?php 

	include_once 'conexion.php';
	
	class estilo
	{

		
		function __construct()
		{ 
				
		}

		function getEstilo(){
			$server = new conexion();
				$conexion = $server->conectar();
		$sql = "SELECT * FROM estilo_ha";

			$stmts = $conexion->prepare($sql);

			if($stmts->execute()){
				$json = array();
				$stmts->store_result();

				$stmts->bind_result($id_estilo, $nombre_estilo);

				while ($stmts->fetch()) {
					$fila = array('id_estilo' => $id_estilo, 'nombre_estilo' => $nombre_estilo);
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