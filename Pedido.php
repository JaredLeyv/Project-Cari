<?php
    include('ConexionBD.php');

    $tipoBusqueda = $_POST['tipoBusqueda'];

    if ($tipoBusqueda == 'vendedor') {
        $nombreVendedor = $_POST['NombreCliente'];

        $sql = "SELECT * FROM Pedidos WHERE NombreCliente='$nombreVendedor'";
    } elseif ($tipoBusqueda == 'fecha') {
        $fechaVenta = $_POST['fechaVenta'];

        $sql = "SELECT * FROM Pedidos WHERE Fecha='$fechaVenta'";
    }

    $resultado = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/Estilos/pedido2.css?v=1.0">
    <title>Document</title>
    <style>
        .productos-pedido {
            display: none;
        }
    </style>
    <script>
        function toggleProductos(id) {
            var productos = document.getElementById('productos_' + id);
            if (productos.style.display === 'none') {
                productos.style.display = 'table';
            } else {
                productos.style.display = 'none';
            }
        }
        function cerrarDetalle(id) {
            var productos = document.getElementById('productos_' + id);
            productos.style.display = 'none';
        }
    </script>
</head>
<body class="body">
    <?php 
        echo "<br>";
        echo "<table>";
        echo "<thead>";
        echo "<tr border=1 width=70%>";
        echo "<th scope='col'>Folio</th>";
        echo "<th scope='col'>Nombre del vendedor</th>";
        echo "<th scope='col'>Fecha</th>";
        echo "<th scope='col'>Pago</th>";
        echo "<th scope='col'>Detalles de Venta</th>";
        echo "</tr>";
        echo "<thead>";
        echo "<tbody>";

        if ($resultado->num_rows > 0) {
            while($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td scope='row'>" . $fila['Folio'] . "</td>";
                echo "<td>" . $fila['NombreCliente'] . "</td>";
                echo "<td>" . $fila['Fecha'] . "</td>";
                echo "<td>$" . $fila['Pago'] . "</td>";
                echo "<td><button onclick='toggleProductos(" . $fila['Folio'] . ")'>Detalles de Venta</button></td>";
                echo "</tr>";

                // Mostrar los productos de este pedido
                $sql2 = "SELECT * FROM ProductoXPedido WHERE Folio='" . $fila['Folio'] . "'";
                $resultado2 = $conn->query($sql2);

                echo "<tr class='productos-pedido' id='productos_" . $fila['Folio'] . "'>";
                echo "<td colspan='5'>";
                echo "<table>";
                echo "<thead>";
                echo "<tr class='Titulo'><td colspan='3'>Productos en el pedido</td><td><button onclick='cerrarDetalle(" . $fila['Folio'] . ")'>Cerrar Detalle</button></td></tr>";
                echo "<tr border=1 width=70%>";
                echo "<th scope='col'>Folio</th>";
                echo "<th scope='col'>Nombre del producto</th>";
                echo "<th scope='col'>Cantidad</th>";
                echo "</tr>";
                echo "<thead>";
                echo "<tbody>";

                if ($resultado2->num_rows > 0) {
                    while($fila2 = $resultado2->fetch_assoc()) {
                        echo "<tr>";
                        echo "<td scope='row'>" . $fila2['Folio'] . "</td>";
                        echo "<td>" . $fila2['NombreProducto'] . "</td>";
                        echo "<td>" . $fila2['cantidad'] . "</td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='3'>NO hay productos en este pedido</td></tr>";
                }

                echo "</tbody>";
                echo "</table>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='5'>NO hay ventas registradas</td></tr>";
        }
    ?>

    </tbody>
    </table>

    <div class='Botones'>
        <button type="button" class="button" onclick="window.location.href='BuscarPedidos.html'">Buscar otra venta</button>
        <button type="button" class="button" onclick="window.location.href='OpcionesAdministrador.php'">Regresar</button>
        
    </div>
</body>
</html>
