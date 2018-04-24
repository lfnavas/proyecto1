<?php

session_start();


	include_once 'conexion.php';
		
	
	$resultado = false;
	$server = new conexion();
	$conexion = mysqli_connect("localhost", "root", "root", "proyecto_Actualizacion");

	if(!empty($_POST)){
		$usuario = $_POST["username"];
		$password = $_POST["password"];
		$rs = mysqli_query($conexion, "SELECT * FROM usuario WHERE usuario = '$usuario' and contrasena = '$password'");
		 

		if($rs->num_rows>0){
			while ($row = mysqli_fetch_array($rs)) {
				echo "Bienvenido ".$row['usuario'];
				@session_start();
				$_SESSION["usuario"] = $row["usuario"];
				$_SESSION["id"] = $row["id_usuario"];
				header("Location: ../inicio-cliente.php");
			}	
		}else{
			$usuario = $_POST["username"];
			$password = $_POST["password"];
			$rs = mysqli_query($conexion, "SELECT * FROM administrador WHERE usuario = '$usuario' and contrasena = '$password'");
			 

			if($rs->num_rows>0){
				while ($row = mysqli_fetch_array($rs)) {
					echo "Bienvenido ".$row['usuario'];
					@session_start();
					$_SESSION["usuario"] = $row["usuario"];
					$_SESSION["id"] = $row["id_administrador"];
					header("Location: ../inicio-administrador.php");
				}	
			}else{
				echo "Usuario no se encuentra registrado";
			}
		}

	}else{
		echo "Error ";
	}



?>
