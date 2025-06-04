<?php
include('ConexionBD.php');
session_start();
?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, user-scalable=no, initial-scale=1.0">
  <title>Punto de venta</title>
  <link rel="stylesheet" href="assets/Estilos/Botones.css?v=1.0">
  <link rel="stylesheet" href="assets/Estilos/Carrito.css?v=1.0">
  <link rel="stylesheet" href="assets/Estilos/Compra.css?v=1.0">
  <link rel="stylesheet" href="assets/Estilos/design2.css?v=1.0">
  <style>
    html, body {
        margin: 0;
        padding: 0;
        height: 100%;
        font-family: Arial, sans-serif;
        box-sizing: border-box;
        overflow-x: hidden;
    }

    nav.nv {
        background-color: #222;
        padding: 10px 20px;
        display: flex;
        flex-direction: column;
        gap: 10px;
        position: sticky;
        top: 0;
        z-index: 1000;
    }

    .container {
        display: flex;
        flex-direction: row;
        width: 100%;
        padding: 20px;
    }

    .products, .cart {
        flex: 1;
        padding: 20px;
    }

    .products {
        margin-top: 750px;
        border-right: 1px solid #ccc;
    }

    .cart-item {
        margin-top: 750px;
    }

    table {
        width: 100%;
        border-collapse: collapse;
    }

    th, td {
        border: 1px solid #ccc;
        padding: 10px;
        text-align: left;
    }

    th {
        background-color: black;
        color: white;
    }

    .btn-agregar, .Modificar, .Eliminar {
        text-decoration: none;
        color: white;
        background-color: blue;
        padding: 5px 10px;
        border-radius: 5px;
    }

    .btn-agregar:hover, .Modificar:hover, .Eliminar:hover {
        background-color: darkblue;
    }

    .out-of-stock {
        opacity: 0.5;
        pointer-events: none;
    }

    .out-of-stock-message {
        color: red;
        font-weight: bold;
    }
  </style>
</head>
<body>

<body>
<nav class="nv" style="background-color: #222; padding: 10px 20px; display: flex; flex-direction: column; gap: 10px;">
    <div style="display: flex; justify-content: space-between; align-items: center;">
        <div style="display: flex; align-items: center; gap: 10px;">
            <img src="CARI2.png" alt="LOGO" style="height: 100px;">
            <h1 style="color: white; margin: 0;">Punto de Venta</h1>
        </div>
        <div style="display: flex; align-items: center; gap: 20px;">
            <?php
            if (isset($_SESSION['username'])) {
                $username = htmlspecialchars($_SESSION['username']);
                echo '<div style="color: white;">ATENDIENDO: ' . $username . '</div>';
            }
            ?>
            <a href="CerrarSesion.php" class="cerrar" style="color: white; background-color: crimson; padding: 8px 12px; border-radius: 5px; text-decoration: none;">Cerrar sesión</a>
        </div>
    </div>
    <form action="carr.php" method="GET" id="search-form" style="display: flex; justify-content: center; gap: 10px;">
        <input type="text" name="search" placeholder="Buscar productos..." value="<?php echo htmlspecialchars(isset($_GET['search']) ? $_GET['search'] : ''); ?>" style="padding: 6px; width: 300px; border-radius: 5px; border: 1px solid #ccc;">
        <button type="submit" style="padding: 6px 10px; border-radius: 5px; background-color: green; color: white;">Buscar</button>
        <button type="submit" onclick="clearSearch(); return false;" style="padding: 6px 10px; border-radius: 5px; background-color: orange; color: white;">Borrar selección</button>
    </form>
</nav>


<div class="container">
    <div class="products">
        <div id="Mercancia">
            <h2>Productos</h2>
        </div>
        <div id="Contenedor">
            <?php
            $por_pagina = 1000;
            $pagina = isset($_GET['pagina']) ? (int)$_GET['pagina'] : 1;
            $inicio = ($pagina - 1) * $por_pagina;
            $search = isset($_GET['search']) ? $_GET['search'] : '';

            $sql = "SELECT * FROM Productos";
            if ($search) {
                $sql .= " WHERE NombreProducto LIKE ?";
            }
            $sql .= " LIMIT ?, ?";

            $stmt = $conn->prepare($sql);
            if ($search) {
                $searchTerm = '%' . $search . '%';
                $stmt->bind_param('sii', $searchTerm, $inicio, $por_pagina);
            } else {
                $stmt->bind_param('ii', $inicio, $por_pagina);
            }

            $stmt->execute();
            $result = $stmt->get_result();

            while ($row = $result->fetch_assoc()) {
                $id_producto = $row['ID_Producto'];
                $nombre_producto = htmlspecialchars($row['NombreProducto']);
                $precio = htmlspecialchars($row['Precio']);
                $existencia = htmlspecialchars($row['Existencia']);
                $out_of_stock = $existencia <= 0 ? 'out-of-stock' : '';
                $message = $existencia <= 0 ? '<p class="out-of-stock-message">No quedan existencias</p>' : '';
            ?>
                <div id="Columna-<?php echo $id_producto; ?>" class="Columna <?php echo $out_of_stock; ?>">
                    <div id="Carta-body">
                        <form action="InsertarProducto.php" method="POST" class="product-form">
                            <div class="form-group">
                                <label for="NombreProducto">Nombre del Producto:</label>
                                <input type="text" name="NombreProducto" id="NombreProducto-<?php echo $id_producto; ?>" value="<?php echo $nombre_producto; ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label for="PrecioXkg">Precio</label>
                                <input type="number" name="PrecioXkg" id="PrecioXkg-<?php echo $id_producto; ?>" value="<?php echo $precio; ?>" readonly>
                            </div>
                            <?php echo $message; ?>
                            <button type="submit" name="Agregar" id="Agregar" class="btn-agregar" <?php echo $existencia <= 0 ? 'disabled' : ''; ?>>Agregar</button>
                        </form>
                    </div>
                </div>
            <?php
            }
            $stmt->close();
            ?>
        </div>
    </div>

    <div class="cart">
        <h2>Carrito de Compras</h2>
        <?php
        if (isset($_SESSION['error_message'])) {
            echo '<p class="out-of-stock-message">' . $_SESSION['error_message'] . '</p>';
            unset($_SESSION['error_message']);
        }

        $Total = 0;   
        $sqlTotal = "SELECT SUM(Precio * cantidad) AS SumaPrecioPorCantidad FROM Carrito";
        $resultTotal = $conn->query($sqlTotal);
        if ($resultTotal->num_rows > 0) {
            $row = $resultTotal->fetch_assoc();
            $Total = round($row['SumaPrecioPorCantidad'], 2); // Redondear a dos decimales
        }
        ?>

        <div class="cart-item">
            <form class="FormularioComprar" action="Comprar.php">
                <?php 
                $sql = "SELECT NombreProducto, Precio, cantidad FROM Carrito";
                $resultado = $conn->query($sql);
                ?>
                
                <?php
                echo "<br>";
                echo "<table>";
                echo "<thead>";
                echo "<tr>";
               
                echo "<th scope='col'>Nombre del producto</th>";
                echo "<th scope='col'>Precio</th>";
                echo "<th scope='col'>Cantidad</th>";
                echo "<th scope='col'>Modificar</th>";
                echo "<th scope='col'>Eliminar</th>";
                echo "</tr>";
                echo "<thead>";
                echo "<tbody>";

                if ($resultado->num_rows > 0) {
                    while($fila = $resultado->fetch_assoc()) {
                        echo "<tr>";
                       
                        echo "<td scope='row'>" . htmlspecialchars($fila['NombreProducto']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['Precio']) . "</td>";
                        echo "<td>" . htmlspecialchars($fila['cantidad']) . "</td>";
                        echo "<td><a class='Restar' href='ModificarCantidad.php?NombreProducto=" . urlencode($fila['NombreProducto']) . "&cantidad=" . urlencode($fila['cantidad']) . "'>Modificar cantidad</a></td>";
                        echo "<td><a class='Eliminar' href='EliminarProducto.php?NombreProducto=" . urlencode($fila['NombreProducto']) . "&cantidad=" . urlencode($fila['cantidad']) . "'>Eliminar Producto</a></td>";
                        echo "</tr>";
                    }
                } else {
                    echo "<tr><td colspan='6'>No hay productos en el carrito.</td></tr>";
                }
                echo "<tr><td colspan='6'>Total a pagar: $" . number_format($Total, 2) . " MXN </td></tr>"; // Mostrar total redondeado a dos decimales
                ?>
                </tbody>
                </table>
                
                <button type="submit">Comprar</button>
            </form>
            <form action="BorrarCarro.php">
                <button type="submit">Borrar Carrito</button>
            </form>
        </div>
    </div>
</div>

<script>
function clearSearch() {
    document.querySelector('input[name="search"]').value = '';
    document.getElementById('search-form').submit();
}

function checkStock() {
    const xhr = new XMLHttpRequest();
    xhr.open('GET', 'CheckStock.php', true);
    xhr.onload = function() {
        if (this.status === 200) {
            const stockData = JSON.parse(this.responseText);
            stockData.forEach(product => {
                const productColumn = document.getElementById(`Columna-${product.ID_Producto}`);
                const addButton = productColumn.querySelector('.btn-agregar');
                const stockMessage = productColumn.querySelector('.out-of-stock-message');

                if (product.Existencia <= 0) {
                    productColumn.classList.add('out-of-stock');
                    addButton.disabled = true;
                    if (!stockMessage) {
                        const messageElement = document.createElement('p');
                        messageElement.className = 'out-of-stock-message';
                        messageElement.textContent = 'No quedan existencias';
                        productColumn.querySelector('.product-form').appendChild(messageElement);
                    }
                } else {
                    productColumn.classList.remove('out-of-stock');
                    addButton.disabled = false;
                    if (stockMessage) {
                        stockMessage.remove();
                    }
                }
            });
        }
    };
    xhr.send();
}

setInterval(checkStock, 10000); // Check stock every 10 seconds
</script>

</body>
</html>
