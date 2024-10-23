<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<title>
		
	</title>
</head>
<body>

 <?php
include 'conex.php';
    
    $Marca=$_POST['Marca'];
    $Talle=$_POST['Talle'];
    $Descripcion=$_POST['Descripcion'];
    $Precio=$_POST['Precio'];
    $Nombre=$_POST['Nombre'];
    // $ID=$_POST['ID
// echo "<pre>";
// print_r($_FILES);
// die;
    // Directorio donde se guardarán las imágenes
    $target_dir = "productosImg/";
    // Nombre del archivo subido
    $target_file = $target_dir .  "zapatillas" . $_FILES["foto"]["name"];
        
    // Intentar mover el archivo subido al directorio de destino
    if (move_uploaded_file($_FILES["foto"]["tmp_name"], $target_file)) { 
        echo "El archivo ". "zapatillas" . $_FILES["foto"]["name"] . " ha sido subido.";     

}

 $consulta = "INSERT INTO zapas_producto(Marca, Talle, Descripcion, Precio, Nombre, Foto)VALUES ( '$Marca', '$Talle', '$Descripcion', '$Precio', '$Nombre', '$target_file')";


 $sql = "SELECT * FROM `zapas_producto`";     
  
  $query= mysqli_query($con, $consulta);




 
  ?>

  


 <a  href="cargar productos.php" ><input type="button" name="button" value=" Volver"></a>

</body>
</html>