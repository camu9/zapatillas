<?php
session_start();
require 'conexUsuario.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $username = $_POST['nombre'];
    $password = $_POST['password'];

    $stmt = $pdo->prepare("SELECT id, password, rol FROM usuarios WHERE nombre = ?");
    $stmt->execute([$username]);
    $user = $stmt->fetch();

    if ($user && password_verify($password, $user['password'])) {
        $_SESSION['user_id'] = $user['id'];
        $_SESSION['role_id'] = $user['rol']; 

        if ($user['rol'] == admin) {
            header('Location: admin_dashboard.php');
        } else {
            header('Location: listado_productos.php');
        }
    } else {
        header('Location: index.php');
    }
}
