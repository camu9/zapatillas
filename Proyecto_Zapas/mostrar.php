<?php
session_start();
require 'productos/conex.php';

$usuario_id = $_SESSION['usuario_id'];

$sql = "SELECT c.id, p.nombre, p.precio, c.cantidad 
        FROM carrito c
        JOIN productos p ON c.producto_id = p.id
        WHERE c.usuario_id = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param("i", $usuario_id);
$stmt->execute();
$result = $stmt->get_result();

echo "<h2>Tu Carrito de Compras</h2>";
while ($row = $result->fetch_assoc()) {
    echo "Producto: " . $row['nombre'] . " - Precio: $" . $row['precio'] . " - Cantidad: " . $row['cantidad'];
    echo "<form method='POST' action='actualizar.php'>";
    echo "<input type='hidden' name='carrito_id' value='" . $row['id'] . "'>";
    echo "<input type='number' name='cantidad' value='" . $row['cantidad'] . "'>";
    echo "<button type='submit'>Actualizar</button>";
    echo "</form>";
    echo "<form method='POST' action='eliminar.php'>";
    echo "<input type='hidden' name='carrito_id' value='" . $row['id'] . "'>";
    echo "<button type='submit'>Eliminar</button>";
    echo "</form>";
    echo "<hr>";
}
$stmt->close();
?>
