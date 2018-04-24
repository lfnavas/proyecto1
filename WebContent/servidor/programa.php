<?php

	/**
	* 
	*/
	include_once 'conexion.php';
	
	class programa {
		private $server;
		private $conexion;
		
		function __construct(){
			

			$this->server = new conexion();

			$this->conexion = $this->server->conectar();
		}

		function getPrograma(){
			
		$sql = "SELECT * FROM programa";

			$stmts = $this->conexion->prepare($sql);

			if($stmts->execute()){
				$json = array();
				$stmts->store_result();

				$stmts->bind_result($id, $nombre, $duracion, $modalidad);

				while ($stmts->fetch()) {
					$fila = array('id' => $id, 'nombre' => $nombre, 'duracion' => $duracion, 'modalidad' => $modalidad);
					$json[] = $fila;
				}
				$this->conexion->close();
				return $json;

			}else{
					$this->conexion->close();
				return $this->conexion->error;
			}/*	
			$sql = "SELECT * FROM programa";
			$stmts = $this->conexion->prepare($sql);
			if($stmts->execute()){
				while ($resultado = $stmts->fetch()) {
					$data["data"][] = $resultado;
				}
				echo json_encode($data);
			}else{
				echo "error";
			}

			$stmts->closeCursor();
			$this->conexion = null;*/

		}


	}




?>
