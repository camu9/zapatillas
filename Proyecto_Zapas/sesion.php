

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
             <div class="col-1">
                      <?php
                      // Suponiendo que tienes el rol almacenado en una variable de sesión
                      session_start();
                      $rol = $_SESSION['rol'];

                      // Definir la URL a la que se redirigirá dependiendo del rol
                      $urlPerfil = ($rol === 'admin') ? 'perfil.php' : 'perfilUsuario.php';
                      ?>
                      <a href="<?php echo $urlPerfil; ?>">
                          <img src="perfil.png" class="items">
                      </a>
                 </div>
             <div class="col-1">  <a  href="#"><img src="carrito.png" class="items"> </a></div>
          
        </div>
    </header>
 <center>
<form id="newsForm" action="inicioSesion.php" method="POST">
        <!-- <label for="Nombre">Nombre</label>
        <input class="cuestiones" type="text" name="nombre" required>
         -->
        <label for="Email">Email</label>
       <input class="cuestiones" type="email" name="email" required>
        
        <label  for="Contraseña">Contraseña</label>
        <input class="cuestiones"  type="password" name="password" required>

       	<input type="submit" value="Iniciar Sesión">
        

    </form></center>
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