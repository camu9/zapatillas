<?php


session_start();
include('conexUsuario.php');

    // Verifica si el usuario está logueado
    if (!isset($_SESSION['id'])) {
        header('Location: zapasIndex.php');
        exit;
    }

    
    // Si el producto no está en el carrito, agrégalo con la cantidad especificada
    $insert = mysqli_query($conn, "INSERT INTO carrito_usuarios (id_sesion, id_producto, cantidad) VALUES ('".$_SESSION['id']."', '".$_POST['idProducto']."', 1)");
    
    if($insert) {
        echo "
        <script>alert('Producto agregado al carrito.');
        window.history.go(-1);</script>";
    }

?>
