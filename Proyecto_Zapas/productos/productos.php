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

    
   <?php
//  session_start();
// if (!isset($_SESSION['id']) || $_SESSION['rol'] !== 'admin') {
//    header("Location: inicioSesion.php");
//    exit();
// }
?>


    <header>
       
        <div class="row" class="box">
           <div class="col-1"> <a  href="#"><img src="../menu.png"  class="items"> </a>
                
             </div>
         
             <div class="col-1">  <a  href="../zapasIndex.php"><img src="../Zapas-removebg-preview.png" class="logo-h" class="items"> </a></div>
             <div class="col-5">  <a  href="#"> </a></div>
             <div class="col-3">  <a  href="#"><img src="../busqueda.png" class="items"> </a></div>
             <div class="col-1">
                      <?php
                      // Suponiendo que tienes el rol almacenado en una variable de sesión
                      session_start();
                      $rol = $_SESSION['rol'];

                      // Definir la URL a la que se redirigirá dependiendo del rol
                      $urlPerfil = ($rol === 'admin') ? '../perfil.php' : '../perfilUsuario.php';
                      ?>
                      <a href="<?php echo $urlPerfil; ?>">
                          <img src="../perfil.png" class="items">
                      </a>
                 </div>
             <div class="col-1">  <a  href="#"><img src="../carrito.png" class="items"> </a></div>
          
        </div>
    </header>

	<h3>Productos</h3>

<div id="elementos"></div>

<!DOCTYPE html>
<html>
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Mostrar Datos</title>

    <script>
        function eliminarElemento(id) {
            if (confirm("¿Estás seguro de que quieres eliminar este elemento?")) {
                var xhr = new XMLHttpRequest();
                xhr.open("POST", "eliminar.php", true);
                xhr.setRequestHeader("Content-Type", "application/x-www-form-urlencoded");
                xhr.onreadystatechange = function () {
                    if (xhr.readyState === 4 && xhr.status === 200) {
                        // Eliminar la fila de la tabla
                        var fila = document.getElementById("fila_" + id);
                        fila.parentNode.removeChild(fila);
                    }
                };
                xhr.send("id=" + id);
            }
        }
 </script>

      

</head>
<body>


<?php
include 'conex.php';
// Consulta SQL para seleccionar todos los datos de la tabla zapas_producto
$sql = "SELECT * FROM zapas_producto";
$resultado = mysqli_query($con, $sql);

if (mysqli_num_rows($resultado) > 0) {
    // Mostrar los datos en una tabla
    echo "<table border='1'>";
    echo "<tr><th>ID</th><th>Marca</th><th>Talle</th><th>Descripción</th><th>Precio</th><th>Nombre</th><th>Foto</th></tr>";
    while($fila = mysqli_fetch_assoc($resultado)) {
        echo "<tr>";
        echo "<td>".$fila ['idProducto']."</td>";
        echo "<td>".$fila['Marca']."</td>";
        echo "<td>".$fila['Talle']."</td>";
        echo "<td>".$fila['Descripcion']."</td>";
        echo "<td>".$fila['Precio']."</td>";
        echo "<td>".$fila['Nombre']."</td>";
        echo "<td><img src='".$fila['Foto']."' width='100'></td>";
        echo '<td><button onclick="eliminarElemento('.$fila['idProducto'].')">Eliminar</button></td>';
        echo '<td><a href="editar.php?id='.$fila['idProducto'].'">Modificar</a></td>';
        echo "</tr>";
    }
    echo "</table>";
} else {
    echo "No hay datos en la tabla.";
}

// Liberar el resultado
mysqli_free_result($resultado);

// Cerrar la conexión
mysqli_close($con);
?>




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


