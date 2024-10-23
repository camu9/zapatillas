<?php
	$conn= mysqli_connect('localhost', 'root','');
	mysqli_select_db($conn, 'zapatillas');
if ($conn->connect_errno) {
		die('conexion mal'. $conn->connect_errno);

	}else{
		// echo "bien";
	}
	

?>