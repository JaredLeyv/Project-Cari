<?php 
    include('ConexionBD.php');
?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/Estilos/FormularioProducto.css?v=1.0">
    <title>Editar producto</title>
</head>
<body>
<?php 

$sql2 = "SELECT * FROM Productos WHERE ID_Producto = ?";
$stmt = $conn->prepare($sql2);
$stmt->bind_param("i", $_GET['ID_Producto']);
$stmt->execute();
$result2 = $stmt->get_result();
$fila2 = $result2->fetch_assoc();
$stmt->close();

?>

<div class="container">
    <h2 style="color: white;">Editar un producto ya registrado</h2>
    <form action="EnviarProductoModificado.php?ID_Producto=<?php echo htmlspecialchars($_GET['ID_Producto']); ?>" method="post" enctype="multipart/form-data">
        <div class="input-group">
            <label for="NombreProducto">Nombre del Producto:</label>
            <input type="text" id="NombreProducto" name="NombreProducto" value="<?php echo htmlspecialchars($fila2['NombreProducto']); ?>" required>
        </div>
        <div class="input-group">
            <label for="Precio">Nuevo Precio:</label>
            <input type="number" id="Precio" name="Precio" step="0.01" value="<?php echo htmlspecialchars($fila2['Precio']); ?>" required>
        </div>
        <div class="input-group">
            <label for="Categoria">Categoría del producto:</label>
            <input type="text" id="Categoria" name="Categoria" value="<?php echo htmlspecialchars($fila2['Categoria']); ?>" required>
        </div>
        <div class="input-group">
            <label for="Existencia">Existencias:</label>
            <input type="number" id="Existencia" name="Existencia" value="<?php echo htmlspecialchars($fila2['Existencia']); ?>" required>
        </div>
        <button type="submit" class="btn-login">Guardar</button>
    </form> 
    <button class="regresar"><a href="ModificarProducto.php">Regresar</a></button>
</div>

</body>
</html>
