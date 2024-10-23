<?php
session_start();
include('conexUsuario.php');

    // Verifica si el usuario está logueado
    if (!isset($_SESSION['id'])) {
        header('Location: zapasIndex.php');
        exit;
    }

    
    // Si el producto no está en el carrito, agrégalo con la cantidad especificada
    $insert = mysqli_query($conn, "DELETE FROM `carrito_usuarios` WHERE id_producto = '".$_POST['id']."' AND id_sesion='".$_SESSION['id']."' LIMIT 1 ");
    
    if($insert) {
        echo "<script>window.history.go(-1);</script>";
    }

?>
