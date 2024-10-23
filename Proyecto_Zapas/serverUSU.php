<?php



include 'conexUsuario.php';

	$sql = mysqli_query($con, "SELECT * FROM usuarios");
	while($row = mysqli_fetch_array($sql)){

		$resultadoArray[]= array(
				"Nombre" => $row['nombre'], 
			"Email" => $row['email'], 
			"Contraseña" => $row['password']
			
			
		);
}

echo json_encode($resultadoArray);
?>