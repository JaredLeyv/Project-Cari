<?php
include('ConexionBD.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Registrado</title>
</head>
<body>
    <?php
    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        // Obtener y validar los datos del formulario
        $NombreProducto = isset($_POST['NombreProducto']) ? $_POST['NombreProducto'] : '';
        $Categoria = isset($_POST['Categoria']) ? $_POST['Categoria'] : '';
        $PrecioXkg = isset($_POST['PrecioXkg']) ? $_POST['PrecioXkg'] : '';

        if (!empty($NombreProducto) && !empty($Categoria) && !empty($PrecioXkg)) {
            // Preparar la consulta SQL para evitar inyecciones SQL
            $sql = "INSERT INTO Productos (NombreProducto, Categoria, Precio) VALUES (?, ?, ?)";
            $stmt = $conn->prepare($sql);
            $stmt->bind_param('ssi', $NombreProducto, $Categoria, $PrecioXkg);

            if ($stmt->execute()) {
                echo "Producto registrado en la BD";
                header("Location: RegistrarPro.html");
                exit();
            } else {
                echo "Error: " . $stmt->error;
            }
            $stmt->close();
        } else {
            echo "Por favor, complete todos los campos.";
        }
    } else {
        echo "Método de solicitud no válido.";
    }

    // Cerrar la conexión
    $conn->close();
    ?>
</body>
</html>
