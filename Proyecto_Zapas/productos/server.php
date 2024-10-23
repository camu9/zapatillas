<?php



include 'conex.php';

	$sql = mysqli_query($con, "SELECT * FROM zapas_producto");
	while($row = mysqli_fetch_array($sql)){

		$resultadoArray[]= array(
			"Marca" => $row['Marca'], 
			"Talle" => $row['Talle'], 
			"Precio" => $row['Precio'], 
			"Nombre" => $row['Nombre'],
			"Foto" => $row['Foto']
			"ID" => $row['ID']
			
		);
}

echo json_encode($resultadoArray);
?>