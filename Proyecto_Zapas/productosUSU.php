<!DOCTYPE html>
<html>
<head>
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="zapas.css">

	<title>Zapas</title>
    <style>
        .container {
            
            border: 1px solid #ccc;
            display: inline-block;
            width: 200px;
            background: white;
            border-radius: 10px;
            padding: 15px;
            margin: 15px;

        }
        .container img {
            max-width: 100px;
            height: auto;
        }
    </style>

<script>
        // Función para enviar la solicitud de filtro al cambiar el select
        function filtrarProductos() {
            var orden = document.getElementById("orden").value; // Obtener el valor seleccionado
            fetch("productos.php?orden=" + orden) // Hacer la solicitud a PHP
                .then(response => response.text()) // Convertir la respuesta a texto
                .then(data => {
                    document.getElementById("productos").innerHTML = data; // Mostrar los productos
                })
                .catch(error => console.log('Error:', error));
        }
    </script>
</head>




<body>
    
    <!-- Encabezado -->
    <header>
    <div class="row">
        <div class="col-1 menu-container">
            <a href="#" class="menu-link" onclick="toggleMenu()">
                <img src="menu.png" class="menu-icon">
            </a>
            <div class="dropdown-content" id="dropdownMenu">
                <a href="productosUSU.php">Productos</a>
                <a href="#">Contacto</a>
                
            </div>
        </div>
        <div class="col-1">
            <a href="#">
                <img src="Zapas-removebg-preview.png" class="logo-h items">
            </a>
        </div>
        <div class="col-5"></div>
        <div class="col-3">
            <a href="#"><img src="busqueda.png" class="items"></a>
        </div>
        <div class="col-1">
            <?php
            session_start();
            $rol = $_SESSION['rol'] ?? '';
            $urlPerfil = ($rol === 'admin') ? 'perfil.php' : (($rol === 'usuario') ? 'perfilUsuario.php' : 'sesion.php');
            ?>
            <a href="<?php echo $urlPerfil; ?>">
                <img src="perfil.png" class="items">
            </a>
        </div>
        <div class="col-1">
            <a href="carrito.php"><img src="carrito.png" class="items"></a>
        </div>
    </div>
</header>


<h1 >Productos</h1></div>
<label for="orden">Ordenar por precio:</label>
    <select name="orden" id="orden" onchange="filtrarProductos()">
        <option value="asc">Menor a mayor</option>
        <option value="desc">Mayor a menor</option>
    </select>
<?php
include './productos/conex.php';

// Verificar si el usuario ha enviado una solicitud de filtro
$orden = isset($_GET['orden']) ? $_GET['orden'] : 'asc'; // Por defecto, orden ascendente

// Validar que el valor de 'orden' sea correcto
if ($orden !== 'asc' && $orden !== 'desc') {
    $orden = 'asc'; // Si no es válido, usar 'asc'
}

// Consulta para obtener productos ordenados por precio
$query = "SELECT * FROM zapas_producto ORDER BY Precio " . strtoupper($orden);
$result = mysqli_query($con, $query);

// Verificar si la consulta devuelve resultados
if (mysqli_num_rows($result) > 0) {
    // Recorrer los productos y mostrarlos
    while ($producto = mysqli_fetch_assoc($result)) {
        echo "<div>";
        echo "<h2>" . $producto['Nombre'] . "</h2>";
        echo "<p>Marca: " . $producto['Marca'] . "</p>";
        echo "<p>Talle: " . $producto['Talle'] . "</p>";
        echo "<p>Descripción: " . $producto['Descripcion'] . "</p>";
        echo "<p>Precio: $" . $producto['Precio'] . "</p>";
        echo "<hr>";
        echo "</div>";
    }
} else {
    echo "No se encontraron productos.";
}

// Cerrar la conexión
mysqli_close($con);
?>


<footer class="footer">
     
     <div class="containe">
         <div class="row">
             <div id="ft" class="col-3">
               <a href="">
                 <img src="Zapas-removebg-preview.png" class="logo-f">
               </a>
               
             </div>
             <div id="enla" class="col-3">
                 <h5>Enlaces </h5>
                
                     <p><a href="button">Inicio</a></p>
                     <p><a href="#">Productos</a></p>
                     <p><a href="#">Servicios</a></p>
                     <p><a href="#">Contacto</a></p>
                
             </div>
             <div id="cont" class="col-3">
                 <h5>Contacto</h5>
                 <address>
                     <p>Dirección: Calle Principal, Ciudad</p>
                     <p>Teléfono: (123) 456-7890</p>
                     <p>Email: zapas@gmail.com</p>
                 </address>
             </div>
             <div id="red" class="col-3">
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