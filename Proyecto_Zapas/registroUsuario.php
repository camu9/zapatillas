<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title></title>
</head>
<body>

<?php
include 'conexUsuario.php';
    
    $Nombre=$_POST['nombre'];
    $Email=$_POST['email'];
    $Contraseña=password_hash($_POST['password'], PASSWORD_DEFAULT);
    $rol = 'usuario'; // Rol por defecto

    


//


 $consulta = "INSERT INTO usuarios(nombre, email, password, rol)VALUES ( '$Nombre', '$Email', '$Contraseña', '$rol')";
   

 $sql = "SELECT * FROM `usuarios`";     
  
  $query= mysqli_query($conn, $consulta);

 
  ?>

</body>
</html>