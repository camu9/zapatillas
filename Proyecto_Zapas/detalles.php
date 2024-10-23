
<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="zapas.css">

	<title>Zapas</title>
</head>




<body>
<?php
        // Mostrar alerta si el producto fue añadido al carrito
        if (isset($_SESSION['producto_agregado'])) {
            if ($_SESSION['producto_agregado']) {
                echo "<script>alert('Producto añadido al carrito exitosamente.');</script>";
            } else {
                echo "<script>alert('Hubo un problema al añadir el producto al carrito.');</script>";
            }
            unset($_SESSION['producto_agregado']); // Limpiar la variable de sesión
        }
        ?>

    <!-- Encabezado -->
    <header>
       
        <div class="row" class="box">
           <div class="col-1"> <a  href="#"><img src="menu.png"  class="items"> </a>
                
             </div>
         
             <div class="col-1">  <a  href="zapasIndex.php"><img src="Zapas-removebg-preview.png" class="logo-h" class="items"> </a></div>
             <div class="col-5">  <a  href="#"> </a></div>
             <div class="col-3">  <a  href="#"><img src="busqueda.png" class="items"> </a></div>
             <div class="col-1">  <a  href="perfil.php"> <img src="perfil.png" class="items"></a></div>
             <div class="col-1">  <a  href="carrito.php"><img src="carrito.png" class="items"> </a></div>
          
        </div>
    </header>

<?php

session_start();
require 'conexUsuario.php';
include('conexUsuario.php');


include 'productos/conex.php';



    
if(isset($_GET['idProducto']) && is_numeric($_GET['idProducto'])) {
    $id = $_GET['idProducto'];

    // Consultar los detalles del producto
    $sql = "SELECT * FROM zapas_producto WHERE idProducto = $id";
    $resultado = mysqli_query($con, $sql);

    // Verificar si se encontró el producto
    if(mysqli_num_rows($resultado) > 0) {
        $producto = mysqli_fetch_assoc($resultado);
        ?>

        <!DOCTYPE html>
        <html lang="es">
        <head>
            <meta charset="UTF-8">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Detalles del Producto</title>
            <style>
                .producto-detalle {
                    border: 1px solid #ccc;
                    padding: 20px;
                    margin: 20px;
                    text-align: center;
                }
                .producto-detalle img {
                    max-width: 300px;
                }
            </style>
        </head>
        <body>
            <div class="producto-detalle">
                <img src="productos/<?php echo $producto['Foto']; ?>" alt="Foto del Producto">
                <h2><?php echo $producto['Nombre']; ?></h2>
                <p>Precio: $<?php echo $producto['Precio']; ?></p>
                <p>Descripción: <?php echo $producto['Descripcion']; ?></p>
                <form action="agregar_carrito.php" method="post">
                    <input type="hidden" name="idProducto" value="<?php echo $producto['idProducto'] ?>">
                    <div class="d-flex justify-content-center align-items-center">
                        <button type="submit" class="btn btn-primary ms-3">Agregar al Carrito</button>
                    </div>
                </form>
            </div>
        </body>
        </html>

        <?php
    } else {
        echo "Producto no encontrado.";
    }

    // Liberar el resultado
    mysqli_free_result($resultado);

} else {
    echo "ID de producto no válido.";
}

// Cerrar la conexión
mysqli_close($con);

?>




  <!-- <a href="eliminar.php?j=${elemento.id}" class="card-link">eliminar</a> -->

    <!-- Pie de página -->
    
    <footer class="footer">
     
    <div class="containe">
        <div class="row">
            <div class="col-3">
              <a href="">
                <img src="Zapas-removebg-preview.png" class="logo-f">
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




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
 </body>
</html>