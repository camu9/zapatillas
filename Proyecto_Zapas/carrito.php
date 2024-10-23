<?php
session_start();
include('conexUsuario.php');

if (!isset($_SESSION['id'])) {
    header('Location: zapasindex.php');
    exit;
}

$usuario_id = $_SESSION['id'];


$total = 0;
?>

<!DOCTYPE html>
<html lang="es">
<head>
    
	<meta charset="utf-8">
	<meta name="viewport" content="width=device-width, initial-scale=1">

	 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
  <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.0/font/bootstrap-icons.css" rel="stylesheet">

  <link rel="stylesheet" type="text/css" href="zapas.css">

	<title>Zapas</title>

    <meta charset="UTF-8">
    <title>Carrito de Compras</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet">
    <style>
        body {
            background-color: #f8f9fa;
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            color: #495057;
            margin: 0;
            padding: 0;
        }
        .container {
            margin-top: 60px;
            max-width: 1200px;
        }
        h1 {
            font-size: 2.5rem;
            color: #343a40;
            font-weight: 700;
            text-align: center;
            margin-bottom: 30px;
        }
        .table {
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }
        .table th, .table td {
            text-align: center;
            vertical-align: middle;
        }
        .table thead {
            background-color: #007bff;
            color: #ffffff;
        }
        .table tbody tr:nth-child(odd) {
            background-color: #f2f2f2;
        }
        .table tbody tr:hover {
            background-color: #e9ecef;
        }
        .btn-primary {
            background-color: #007bff;
            border-color: #007bff;
            border-radius: 50px;
            padding: 10px 20px;
            font-size: 1rem;
            font-weight: 600;
            transition: background-color 0.3s, border-color 0.3s;
        }
        .btn-primary:hover {
            background-color: #0056b3;
            border-color: #004085;
        }
        .btn-danger {
            border-radius: 50px;
            padding: 5px 15px;
            font-size: 0.875rem;
        }
        .btn-danger:hover {
            background-color: #c82333;
            border-color: #bd2130;
        }
        .total {
            font-size: 1.5rem;
            font-weight: 700;
            color: #343a40;
            margin-top: 20px;
            text-align: center;
        }
        .action-buttons {
            display: flex;
            justify-content: center;
            margin-top: 20px;
        }
        .action-buttons button {
            margin: 0 10px;
        }
    </style>
</head>





<body>

    <!-- Encabezado -->
    <header>
       
        <div class="row" class="box">
            <div  class="col-1" class="menu-container">
           
        <a href="#" class="menu-link"><img src="menu.png" class="menu-icon"></a>
        <div class="dropdown-content">
            <a href="#">Opción 1</a>
            <a href="#">Opción 2</a>
            <a href="#">Opción 3</a>
            <a href="#">Opción 4</a>
        </div>
    
            </div>
         
             <div class="col-1">  <a  href="#"><img src="Zapas-removebg-preview.png" class="logo-h" class="items"> </a></div>
             <div class="col-5">  <a  href="#"> </a></div>
             <div class="col-3">  <a  href="#"><img src="busqueda.png" class="items"> </a></div>
             <div class="col-1">  <a  href="perfil.php "> <img src="perfil.png" class="items"></a></div>
             <div class="col-1">  <a  href="carrito.php"><img src="carrito.png" class="items"> </a></div>
          
        </div>
    </header>



<div class="container">
    <h1>Carrito de Compras</h1>
    <table class="table table-bordered">
        <thead>
        <tr>
            <th>Nombre</th>
            <th>Descripcion</th>
            <th>Talle</th>
            <th>Precio.U</th>
            <th>cantidad</th>
            <th>Acciones</th>
        </tr>
        </thead>
        <tbody>
        <?php 
        
            $carrito = mysqli_query($conn, "SELECT distinct id_producto FROM carrito_usuarios WHERE id_sesion = '".$usuario_id."' ");  
            while ($row = mysqli_fetch_assoc($carrito)){  

                $productos = mysqli_query($conn, "SELECT * FROM zapas_producto WHERE idProducto = '".$row['id_producto']."' ");  
                while ($rowP = mysqli_fetch_assoc($productos)){

                    $cantidad = mysqli_query($conn, "SELECT * FROM carrito_usuarios WHERE id_sesion = '".$usuario_id."' AND id_producto= '".$row['id_producto']."' ");  
               
                    $row_cnt = $cantidad->num_rows;
        ?>

            <tr>
                <td><?php echo $rowP['Nombre'] ?></td>
                <td><?php echo $rowP['Descripcion'] ?></td>
                <td><?php echo $rowP['Talle'] ?></td>
                <td>$<?php echo $rowP['Precio'] ?></td>
                <td><?php echo $row_cnt ?></td>
                <td>
                    <form method="POST" action="deleteCart.php" style="display:inline;">
                        <input type="hidden" name="id" value="<?php echo $rowP['idProducto'] ?>">
                        <button type="submit" class="btn btn-danger">Eliminar</button>
                    </form>
                    <form action="agregar_carrito.php" method="post">
                        <input type="hidden" name="idProducto" value="<?php echo $rowP['idProducto'] ?>">
                        <button type="submit" class="btn btn-primary">+</button>
                    </form>
                </td>
            </tr>

        <?php
                }
            } 
        ?>
            
            
            
          
            
            




        </tbody>
    </table>
    <div class="total">Total: $
        <?php
            $carritoH = mysqli_query($conn, "SELECT SUM(zp.Precio) AS total_precio FROM carrito_usuarios cu JOIN zapas_producto zp ON cu.id_producto = zp.idProducto WHERE cu.id_sesion = '".$_SESSION['id']."' ");  
            while ($rowH = mysqli_fetch_assoc($carritoH)){  
                echo $rowH['total_precio'];   
            } 
        ?>
    </div>
    <div class="action-buttons">
        <button class="btn btn-primary">Proceder al Pago</button>
    </div>
</div>


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
