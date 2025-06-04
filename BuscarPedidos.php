<!DOCTYPE html>
<html lang="es">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Ingreso de Folio y Nombre</title>
    <link rel="stylesheet" href="assets/Estilos/BuscarPedido.css">
</head>
<body>
    <div class="form-container">
        <h2>Buscar ventas</h2>
        <form action="Pedido.php" method="POST">
            <label for="tipoBusqueda">Tipo de búsqueda:</label>
            <select name="tipoBusqueda" id="tipoBusqueda" required onchange="mostrarCampo()">
                <option value="vendedor">Buscar ventas por vendedor</option>
                <option value="fecha">Buscar ventas por fecha</option>
            </select>

            <div id="vendedor">
                <label for="NombreCliente">Nombre del vendedor</label>
                <input type="text" id="NombreCliente" name="NombreCliente">
            </div>

            <div id="fecha" style="display: none;">
                <label for="fechaVenta">Fecha de la venta</label>
                <input type="date" id="fechaVenta" name="fechaVenta">
            </div>

            <button type="submit">Buscar</button>
        </form>
    </div>

    <div class="resultados">
        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
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

            if ($resultado->num_rows > 0) {
                echo "<table>";
                echo "<thead>";
                echo "<tr>";
                echo "<th scope='col'>Folio</th>";
                echo "<th scope='col'>Nombre del vendedor</th>";
                echo "<th scope='col'>Fecha</th>";
                echo "<th scope='col'>Pago</th>";
                echo "<th scope='col'></th>"; // Columna para el botón de detalles
                echo "</tr>";
                echo "</thead>";
                echo "<tbody>";

                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td>" . $fila['Folio'] . "</td>";
                    echo "<td>" . $fila['NombreCliente'] . "</td>";
                    echo "<td>" . $fila['Fecha'] . "</td>";
                    echo "<td>$" . $fila['Pago'] . "</td>";
                    echo "<td><form action='DetallePedido.php' method='POST'>
                            <input type='hidden' name='Folio' value='" . $fila['Folio'] . "'>
                            <button type='submit' name='submit'>Ver detalles de folio</button>
                        </form></td>";
                    echo "</tr>";
                }

                echo "</tbody>";
                echo "</table>";
            } else {
                echo "No se encontraron resultados.";
            }
        }
        ?>
    </div>

    <script>
        function mostrarCampo() {
            var tipoBusqueda = document.getElementById("tipoBusqueda").value;
            var divVendedor = document.getElementById("vendedor");
            var divFecha = document.getElementById("fecha");

            if (tipoBusqueda === "vendedor") {
                divVendedor.style.display = "block";
                divFecha.style.display = "none";
            } else if (tipoBusqueda === "fecha") {
                divVendedor.style.display = "none";
                divFecha.style.display = "block";
            }
        }
    </script>
</body>
</html>
