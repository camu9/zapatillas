<?php
include 'conex.php';

if (isset($_GET['id'])) {
    $id = $_GET['id'];

    // Consulta SQL para obtener los datos del producto
    $sql = "SELECT * FROM zapas_producto WHERE idProducto = ?";
    $stmt = mysqli_prepare($con, $sql);
    mysqli_stmt_bind_param($stmt, 'i', $id);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($resultado) == 1) {
        $producto = mysqli_fetch_assoc($resultado);
    } else {
        echo "Producto no encontrado.";
        exit;
    }

    mysqli_stmt_close($stmt);
} else {
    echo "ID de producto no proporcionado.";
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

     <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="../zapas.css">
    <title>Productos</title>
</head>
<body>
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


    <h1>Editar Producto</h1>
    <div class="productos">
    <form action="modificar.php" method="post" >
        <input type="hidden" name="id" value="<?php echo $producto['idProducto']; ?>">
        <label for="marca">Marca:</label>
        <input type="text" id="marca" name="marca" value="<?php echo $producto['Marca']; ?>"><br>
        <label for="talle">Talle:</label>
        <input type="text" id="talle" name="talle" value="<?php echo $producto['Talle']; ?>"><br>
        <label for="descripcion">Descripción:</label>
        <input type="text" id="descripcion" name="descripcion" value="<?php echo $producto['Descripcion']; ?>"><br>
        <label for="precio">Precio:</label>
        <input type="text" id="precio" name="precio" value="<?php echo $producto['Precio']; ?>"><br>
        <label for="nombre">Nombre:</label>
        <input type="text" id="nombre" name="nombre" value="<?php echo $producto['Nombre']; ?>"><br>
        <input type="submit" value="Guardar Cambios">
    </form>
    </div>



<footer class="footer">
     
    <div class="containe">
        <div class="row">
            <div class="col-3">
              <a href="">
                <img src="../Zapas-removebg-preview.png" class="logo-f">
              </a>
              
            </div>
            <div class="col-3">
                <h5>Enlaces </h5>
               
                    <p><a href="button">Inicio</a></p>
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
