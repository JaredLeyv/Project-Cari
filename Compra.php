<?php
include('ConexionBD.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/Estilos/Compra.css?v=1.0">
    <title>Lo que compraste</title>
</head>
<body>

<?php
$Total = 0;   
$sqlTotal = "SELECT SUM(Precio * cantidad) AS SumaPrecioPorKilo FROM Carrito";
$resultTotal = $conn->query($sqlTotal);
if ($resultTotal->num_rows > 0) {
    $row = $resultTotal->fetch_assoc();
    $Total = $row['SumaPrecioPorKilo'];
}
?>

<h1>Compra registrada</h1>

<?php
$sql = "SELECT * FROM Carrito";
$resultado = $conn->query($sql);
if ($resultado) {
?>
    <table>
        <thead>
            <tr>
                <th scope='col'>Nombre del producto</th>
                <th scope='col'>Cantidad</th>
                <th scope='col'>Precio</th>
            </tr>
        </thead>
        <tbody>
            <?php
            if ($resultado->num_rows > 0) {
                while ($fila = $resultado->fetch_assoc()) {
                    echo "<tr>";
                    echo "<td scope='row'>" . htmlspecialchars($fila['NombreProducto']) . "</td>";
                    echo "<td>" . htmlspecialchars($fila['cantidad']) . "</td>";
                    echo "<td>" . htmlspecialchars($fila['Precio']) . "</td>";
                    echo "</tr>";
                }
            } else {
                echo "<tr><td colspan='3'>CARRITO VACÍO</td></tr>";
            }
            ?>
        </tbody>
    </table>
<?php
} else {
    echo "Error al ejecutar la consulta: " . $conn->error;
}
?>

<div class="total">
    <h1>Total: $<?php echo number_format($Total, 2); ?></h1>
</div>

<div class='container'>
    <div class='ContenedorPago'>
        <form action="Compra.php" method="post">
            <label for="cantidad_pago">Cantidad con la que pagará:</label>
            <input type="number" id="cantidad_pago" name="cantidad_pago" min="0" step="0.01" required>
            <button type="submit" class="button">Aceptar</button>
        </form>

        <?php
        if ($_SERVER["REQUEST_METHOD"] == "POST") {
            $cantidad_pago = $_POST["cantidad_pago"];
            $cambio = $cantidad_pago - $Total;
            echo "<p>Pagado: $ " . number_format($cantidad_pago, 2) . " MXN</p>";
            echo "<p>Su cambio es: $ " . number_format($cambio, 2) . " MXN</p>";
            // Vaciamos el carrito después de mostrar la información de pago y cambio
            $conn->query("DELETE FROM Carrito");
        }
        ?>
    </div>
</div>

<div class='boton'>
    <form action="BorrarCarro.php" method="post">
        <button type="submit" class="button">FINALIZAR COMPRA</button>
    </form>
</div>

</body>
</html>
