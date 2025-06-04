<?php
include('ConexionBD.php');
session_start();

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $NombreProducto = $_POST['NombreProducto'];
    $Precio = $_POST['PrecioXkg'];

    // Get current stock of the product
    $sql = "SELECT Existencia FROM Productos WHERE NombreProducto = ?";
    $stmt = $conn->prepare($sql);
    $stmt->bind_param('s', $NombreProducto);
    $stmt->execute();
    $result = $stmt->get_result();
    
    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $stock = $row['Existencia'];
        
        // Get current quantity in the cart
        $sql = "SELECT cantidad FROM Carrito WHERE NombreProducto = ?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('s', $NombreProducto);
        $stmt->execute();
        $result = $stmt->get_result();
        
        $currentQuantity = 0;
        if ($result->num_rows > 0) {
            $row = $result->fetch_assoc();
            $currentQuantity = $row['cantidad'];
        }
        
        // Check if adding one more would exceed stock
        if ($currentQuantity + 1 <= $stock) {
            if ($currentQuantity > 0) {
                $sql = "UPDATE Carrito SET cantidad = cantidad + 1 WHERE NombreProducto = ?";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('s', $NombreProducto);
            } else {
                $sql = "INSERT INTO Carrito (NombreProducto, Precio, cantidad) VALUES (?, ?, 1)";
                $stmt = $conn->prepare($sql);
                $stmt->bind_param('sd', $NombreProducto, $Precio);
            }
            
            if ($stmt->execute()) {
                header("Location: Carr.php");
                exit();
            } else {
                $_SESSION['error_message'] = "Error al agregar el producto al carrito: " . $stmt->error;
            }
        } else {
            $_SESSION['error_message'] = "No hay suficiente stock disponible.";
        }
    } else {
        $_SESSION['error_message'] = "Producto no encontrado.";
    }
    $stmt->close();
} else {
    $_SESSION['error_message'] = "Método de solicitud no válido.";
}

header("Location: Carr.php");
$conn->close();
?>
