<?php 
    include('ConexionBD.php')
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Modificar Producto</title>
</head>
<body>
<?php
    // Verificar si se han enviado los datos del formulario
    if(isset($_POST['NombreProducto'], $_POST['Precio'], $_POST['Categoria'], $_POST['Existencia'])) {
        // Recibir los datos del formulario
        $NombreProducto = $_POST['NombreProducto'];
        $Precio = $_POST['Precio'];
        $Categoria = $_POST['Categoria'];
        $Existencia = $_POST['Existencia'];
        
        // Actualizar el producto en la base de datos
        $sql = "UPDATE Productos SET NombreProducto='$NombreProducto', Precio='$Precio', Categoria='$Categoria', Existencia='$Existencia' WHERE ID_Producto='".$_GET['ID_Producto']."'";
        
        if (mysqli_query($conn, $sql)) {
            echo "Producto modificado en la base de datos";
            // Redireccionar a la página de modificación de productos
            header("Location: ModificarProducto.php");
            exit();
        } else {
            echo "Error al intentar modificar el producto: " . mysqli_error($conn);
        }
    } else {
        echo "No se han recibido los datos del formulario";
    }
?>
</body>
</html>
