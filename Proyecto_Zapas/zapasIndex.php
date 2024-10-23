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

<script>
    function toggleMenu() {
        var menu = document.getElementById("dropdownMenu");
        if (menu.style.display === "block") {
            menu.style.display = "none";
        } else {
            menu.style.display = "block";
        }
    }
</script>

<style>
    .dropdown-content {
        display: none;
        position: absolute;
        background-color: #f9f9f9;
        min-width: 160px;
        box-shadow: 0px 8px 16px 0px rgba(0,0,0,0.2);
        z-index: 1;
    }

    .dropdown-content a {
        color: black;
        padding: 12px 16px;
        text-decoration: none;
        display: block;
    }

    .dropdown-content a:hover {
        background-color: #f1f1f1;
    }

    .menu-container {
        position: relative;
    }
</style>



<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mostrar Datos</title>

    <style>
       .carousel {
    width: auto;
    height: 500px;
    overflow: hidden;
    margin: 0 auto;
    position: relative;
    padding: 10px;
  }
  .carousel img {
    width: 100%;
    height: 100%;
    display: block;
  }
    </style>

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
</head>
<body>





    <div class="carousel">
  <img src="NIKE _index.jpg" alt="Imagen 1">
  <img src="Converse.jpg" alt="Imagen 2">
  <img src=" " alt="Imagen 3">
</div>
<script>
    (function() {
    var index = 0;
    var images = document.querySelectorAll('.carousel img');
    var totalImages = images.length;
    
    function showImage(i) {
      images[i].style.display = 'block';
    }
    
    function hideImage(i) {
      images[i].style.display = 'none';
    }
    
    function nextImage() {
      hideImage(index);
      index = (index + 1) % totalImages;
      showImage(index);
    }
    
    function startCarousel() {
      showImage(index);
      setInterval(nextImage, 3000); // Cambia la imagen cada 3 segundos
    }
    
    startCarousel();
  })();

</script>

 
<h1 >Productos</h1></div>
<?php
include './productos/conex.php';




// Consulta SQL para seleccionar todos los datos de la tabla zapas_producto
$sql = "SELECT * FROM zapas_producto";
$resultado = mysqli_query($con, $sql);


if (mysqli_num_rows($resultado) > 0) {
    // Mostrar los datos en contenedores separados
    while($fila = mysqli_fetch_assoc($resultado)) { ?>

        <a href="detalles.php?idProducto=<?php echo $fila['idProducto'] ?>">
            <div class='container'>
             <p> <img src='productos/<?php echo $fila['Foto'] ?>' alt='Foto'></p>
            <p><?php echo $fila['Nombre'] ?></p>
            <p>$<?php echo $fila['Precio'] ?></p>
            <button id='boton' >agregar al carrito</button>
        </div>
        </a>
       
        <?php
    }
} else {
    echo "No hay datos en la tabla.";
}



// Liberar el resultado
mysqli_free_result($resultado);

// Cerrar la conexión
mysqli_close($con);
?>

</body>
</html>



  <!-- <a href="eliminar.php?j=${elemento.id}" class="card-link">eliminar</a> -->

    <!-- Pie de página -->
    
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