<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="../zapas.css">
  <link rel="stylesheet" type="text/css" href="cssProd.css">

    <title>crear</title>
</head>

<body>

    <!-- Encabezado -->
    <header>
       
        <div class="row" class="box">
           <div class="col-1"> <a  href="#"><img src="../menu.png"  class="items"> </a>
                
             </div>
         
             <div class="col-1">  <a  href="#"><img src="../Zapas-removebg-preview.png" class="logo-h" class="items"> </a></div>
             <div class="col-5">  <a  href="#"> </a></div>
             <div class="col-3">  <a  href="#"><img src="../busqueda.png" class="items"> </a></div>
             <div class="col-1">  <a  href="usuarios_registro.php"> <img src="../perfil.png" class="items"></a></div>
             <div class="col-1">  <a  href="#"><img src="../carrito.png" class="items"> </a></div>
          
        </div>
    </header>

<?php
include 'conex.php';

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $id = $_POST['id'];
    $marca = $_POST['marca'];
    $talle = $_POST['talle'];
    $descripcion = $_POST['descripcion'];
    $precio = $_POST['precio'];
    $nombre = $_POST['nombre'];

    // Consulta SQL para actualizar el registro
    $sql = "UPDATE zapas_producto SET Marca = ?, Talle = ?, Descripcion = ?, Precio = ?, Nombre = ? WHERE idProducto = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'sssssi', $marca, $talle, $descripcion, $precio, $nombre, $id);

    if (mysqli_stmt_execute($stmt)) {
        echo "Registro actualizado con éxito. <a href='productos.php'>Volver a la lista de productos</a>";
    } else {
        echo "Error al actualizar el registro: " . mysqli_error($con);
    }

    mysqli_stmt_close($stmt);
    mysqli_close($con);
}
?>
 <!-- Pie de página -->
    
    <footer class="footer">
     
    <div class="container">
        <div class="row">
            <div class="col-3">
              <a href="">
                <img src="../Zapas-removebg-preview.png" class="logo-f">
              </a>
              
            </div>
            <div class="col-3">
                <h5>Enlaces </h5>
               
                    <p><a href="#">Inicio</a></p>
                    <p><a href="#">Productos</a></p>
                    <p><a href="#">Servicios</a></p>
                    <p><a href="#">Contacto</a></p>
               
            </div>
            <div class="col-3">
                <h5>Contacto</h5>
                <address>
                    <p>Dirección: Calle Principal, Ciudad</p>
                    <p>Teléfono: (123) 456-7890</p>
                    <p>Email: zapas@gmail.com</p>
                </address>
            </div>
            <div class="col-3">
                <h5>Síguenos</h5>
                <ul class="list-inline">
                    <li class="list-inline-item"><a href="#"><i class="bi-facebook"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="bi-twitter"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="bi-instagram"></i></a></li>
                    <li class="list-inline-item"><a href="#"><i class="bi-linkedin"></i></a></li>
                </ul>
            </div>
        </div>
        
        <div class="row">
            <div class="col-12 text-center">
                <p>© 2024 Zapas. Todos los derechos reservados.</p>
            </div>
        </div>
    </div>
</footer>


</body>
</html>