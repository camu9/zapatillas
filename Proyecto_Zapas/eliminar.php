<?php
session_start();
require 'productos/conex.php';

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $carrito_id = $_POST['carrito_id'];

    $sql = "DELETE FROM carrito WHERE id = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param("i", $carrito_id);
    $stmt->execute();
    $stmt->close();
    
    header("Location: ../carrito/mostrar.php");
    exit();
}
?>
