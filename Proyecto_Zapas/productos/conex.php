<?php
	$con= mysqli_connect('localhost', 'root','');
	mysqli_select_db($con, 'zapatillas');
if ($con->connect_errno) {
		die('conexion mal'. $con->connect_errno);

	}else{
		// echo "bien";
	}
	

?>