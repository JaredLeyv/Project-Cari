<?php
include('ConexionBD.php');

if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nombreProducto = $_POST['NombreProducto'];
    $cantidad = $_POST['Cantidad'];

    // Verificar si la cantidad es un número positivo
    if (is_numeric($cantidad) && $cantidad >= 0) {
        // Actualizar la cantidad del producto en el carrito
        $sql = "UPDATE Carrito SET Cantidad = ? WHERE NombreProducto = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('is', $cantidad, $nombreProducto);

        if ($stmt->execute()) {
            header("Location: Carr.php");
            exit();
        } else {
            echo "Error al modificar la cantidad del producto: " . $stmt->error;
        }
        $stmt->close();
    } else {
        echo "Por favor, ingrese una cantidad válida.";
    }
} else {
    echo "Método de solicitud no válido.";
}

$conn->close();
?>
