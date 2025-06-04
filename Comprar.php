<?php
include('ConexionBD.php');
session_start();

// Fecha actual
$fechaActual = date("Y-m-d");

// Total a pagar
$Total = 0;
$sqlTotal = "SELECT SUM(Precio * cantidad) AS SumaPrecioPorCantidad FROM Carrito";
$resultTotal = $conn->query($sqlTotal);
if ($resultTotal->num_rows > 0) {
    $row = $resultTotal->fetch_assoc();
    $Total = $row['SumaPrecioPorCantidad'];
}

// Verificar si el usuario ha iniciado sesión
if (isset($_SESSION['username'])) {
    $username = $_SESSION['username'];

    // Obtener el nombre del cliente
    $sqlName = "SELECT Nombre FROM Clientes WHERE Username = ?";
    $stmt = $conn->prepare($sqlName);
    $stmt->bind_param('s', $username);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $NombreCliente = $row['Nombre'];

        // Insertar el nombre del cliente en la tabla Pedidos
        $sqlInsertPedido = "INSERT INTO Pedidos (NombreCliente, Fecha, Pago) VALUES (?, ?, ?)";
        $stmtInsertPedido = $conn->prepare($sqlInsertPedido);
        $stmtInsertPedido->bind_param('ssd', $NombreCliente, $fechaActual, $Total);

        if ($stmtInsertPedido->execute()) {
            echo "Pedido registrado correctamente.";
        } else {
            echo "Error al registrar el pedido: " . $stmtInsertPedido->error;
        }

        // Obtener el folio del pedido recién insertado
        $folio = $conn->insert_id;

        // Obtener productos del carrito
        $sqlCarrito = "SELECT * FROM Carrito";
        $resultCarrito = $conn->query($sqlCarrito);

        // Iterar sobre los productos del carrito e insertarlos en ProductoXPedido
        while ($rowCarrito = $resultCarrito->fetch_assoc()) {
            $nombreProducto = $rowCarrito['NombreProducto'];
            $cantidad = $rowCarrito['cantidad'];

            // Insertar producto en ProductoXPedido
            $sqlInsertProducto = "INSERT INTO ProductoXPedido (Folio, NombreProducto, cantidad) VALUES (?, ?, ?)";
            $stmtInsertProducto = $conn->prepare($sqlInsertProducto);
            $stmtInsertProducto->bind_param('isi', $folio, $nombreProducto, $cantidad);

            if ($stmtInsertProducto->execute()) {
                echo "Producto registrado correctamente en el pedido.";

                // Restar la cantidad de la existencia en la tabla Productos
                $sqlUpdateExistencia = "UPDATE Productos SET Existencia = Existencia - ? WHERE NombreProducto = ?";
                $stmtUpdateExistencia = $conn->prepare($sqlUpdateExistencia);
                $stmtUpdateExistencia->bind_param('is', $cantidad, $nombreProducto);
                $stmtUpdateExistencia->execute();
            } else {
                echo "Error al registrar el producto en el pedido: " . $stmtInsertProducto->error;
            }
        }


      

        header("Location: Compra.php");
        exit();
    } else {
        echo "No se encontró el cliente.";
    }
} else {
    echo "Necesitas iniciar sesión para comprar.";
}

$conn->close();
?>
