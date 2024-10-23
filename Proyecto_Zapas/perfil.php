<!DOCTYPE html>
<html>
<head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

         <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">
   

  <link rel="stylesheet" type="text/css" href="zapas.css">
        <title>registrate</title>
</head>
<body>
        <!-- header -->
        <header>
       
        <div class="row">
           <div class="col-1"> <a  href="#"><img src="menu.png"  class="items"> </a>
                
             </div>
         
             <div class="col-1">  <a  href="zapasindex.php"><img src="Zapas-removebg-preview.png" class="logo-h" class="items"> </a></div>
             <div class="col-5">  <a  href="#"> </a></div>
             <div class="col-3">  <a  href="#"><img src="busqueda.png" class="items"> </a></div>
             <div class="col-1">  <a  href="perfil.php"> <img src="perfil.png" class="items"></a></div>
             <div class="col-1">  <a  href="#"><img src="carrito.png" class="items"> </a></div>
          
        </div>
    </header>

<?php
session_start(); // Iniciar la sesión

include 'conexUsuario.php';

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['id']) || $_SESSION['rol'] == 'admin') {
    $user_id = $_SESSION['id'];

    // Consulta SQL para seleccionar los datos del usuario que ha iniciado sesión
    $sql = "SELECT * FROM usuarios WHERE id = ?";
    $stmt = mysqli_prepare($conn, $sql);
    mysqli_stmt_bind_param($stmt, "i", $user_id);
    mysqli_stmt_execute($stmt);
    $resultado = mysqli_stmt_get_result($stmt);

    if (mysqli_num_rows($resultado) > 0) {
        // Mostrar los datos en una tabla
        echo "<form>";
       
        while($fila = mysqli_fetch_assoc($resultado)) {

            echo "<h2>Hola admin</h2>";
            
            echo "<h3>".$fila['nombre']."</h3>";
            echo "<h3>".$fila['email']."</h3>";
            echo "<button><a href='productos/productos.php'>productos<a></button><br>";
            echo "<button><a href='productos/cargar productos.php'>cargar productos<a></button>";
            // echo "<td><img src='".$fila['Foto']."' width='100'></td>";
            // echo '<td><button onclick="eliminarElemento('.$fila['ID'].')">Eliminar</button></td>';
           
        }
        echo "</form>";
    } else {
       mal;
    }

    // Liberar el resultado
    mysqli_free_result($resultado);
    // Cerrar la conexión
    mysqli_close($conn);
} else {
    echo "No has iniciado sesión.";
}
?>


<!-- Pie de página -->
    
    <footer class="footer">
    
  </video>

    <div class="container">
        <div class="row">
            <div class="col-3">
              <a href="">
                <img src="Zapas-removebg-preview.png" class="logo-f">
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




<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>

</body>
</html>