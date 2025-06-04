<?php 
    include('ConexionBD.php');
?>

<html lang="sp">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/Estilos/TablaModificar.css?v=1.0">
    <title>Modificar un producto</title>
</head>
<body>
    <div class='Tabla'>
        <?php 

        $sql = "SELECT * FROM Productos";

        $resultado = $conn->query($sql);

        echo "<br>";
        echo "<table>";
        echo "<thead>";
        echo "<tr>";

        echo "<th scope='col'>Codigo</th>";
        echo "<th scope='col'>Nombre</th>";
        echo "<th scope='col'>Categoria</th>";
        echo "<th scope='col'>Precio Unitario</th>";
        echo "<th scope='col'>Existencias</th>";
        echo "<th scope='col'>Modificar</th>";
        echo "<th scope='col'>Borrar</th>";
        echo "</tr>";
        echo "<thead>";
        echo "<tbody>";

        if ($resultado->num_rows > 0) {
            while($fila = $resultado->fetch_assoc()) {
                echo "<tr>";

                echo "<td scope='row'>" . htmlspecialchars($fila['ID_Producto']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['NombreProducto']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['Categoria']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['Precio']) . "</td>";
                echo "<td>" . htmlspecialchars($fila['Existencia']) . "</td>";
                echo "<td><a href='Modificar.php?ID_Producto=" . urlencode($fila['ID_Producto']) . "'>Modificar</a></td>";
                echo "<td><a href='BorrarProducto.php?ID_Producto=" . urlencode($fila['ID_Producto']) . "'>Borrar</a></td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='7'>No HAY PRODUCTOS REGISTRADOS</td></tr>";
        }
        echo "</tbody>";
        echo "</table>";

        ?>
    </div>

    <div class='Botón'>
        <button type="button" class="button" onclick="window.location.href='OpcionesAdministrador.php'">Regresar</button>
    </div>

</body>
</html>
