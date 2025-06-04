<?php 
include('ConexionBD.php');

// Obtener el nombre del producto desde los parámetros de la URL
$nombreProducto = isset($_GET['NombreProducto']) ? $_GET['NombreProducto'] : '';
$cantidadActual = isset($_GET['cantidad']) ? $_GET['cantidad'] : 0;

// Consulta para obtener la cantidad de existencias del producto
$sql = "SELECT Existencia FROM Productos WHERE NombreProducto = ?";
$stmt = $conn->prepare($sql);
$stmt->bind_param('s', $nombreProducto);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows > 0) {
    $row = $result->fetch_assoc();
    $existencias = $row['Existencia'];
} else {
    // Si el producto no se encuentra, establecer existencias en 0
    $existencias = 0;
}
$stmt->close();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/Estilos/ModificarCantidad.css?v=1.0">
    <title>Modificar Cantidad de un producto</title>
</head>
<body>
    <div class="container">
        <form action="EnviarModificarCantidad.php" method="post">
            <h3><label for="NombreProducto">Nombre del producto:</label></h3>
            <input type="text" id="NombreProducto" name="NombreProducto" value="<?php echo htmlspecialchars($nombreProducto); ?>" readonly>
            <h3><label for="Cantidad">Cantidad nueva:</label></h3>
            <input type="number" id="Cantidad" name="Cantidad" value="<?php echo htmlspecialchars($cantidadActual); ?>" required min="1" max="<?php echo $existencias; ?>">
            <button type="submit">Aceptar</button>
        </form>
        <?php if ($existencias == 0): ?>
            <p class="out-of-stock-message">No hay suficiente stock disponible para este producto.</p>
        <?php endif; ?>
    </div>
</body>
</html>
