<?php
    
    include 'conexUsuario.php';


    $consulta = mysqli_query($conn, "SELECT * FROM usuarios WHERE email='".$_POST['email']."' ");
    while ($row = mysqli_fetch_array($consulta)) {  
        
        if (password_verify($_POST['password'], $row['password'])){

            session_start();
            $_SESSION['id'] = $row['id'];   
            $_SESSION['nombre'] = $row['nombre'];
            $_SESSION['email']= $row['email'];
            $_SESSION['rol'] = $row['rol'];

    
            if ($row['rol'] == 'admin') {
                // header("Location: productos/productos.php");
                header("Location: perfil.php");

            }if ($row['rol'] == 'usuario'){
                header("Location: perfilUsuario.php");

            } else {
                header("Location: zapasIndex.php");
            }

        } else {

            header("Location: sesion.php");

        }


    }




?>





