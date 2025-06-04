<?php
include('ConexionBD.php');

$sql = "SELECT ID_Producto, Existencia FROM Productos";
$result = $conn->query($sql);

$stockData = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $stockData[] = $row;
    }
}

echo json_encode($stockData);

$conn->close();
?>
