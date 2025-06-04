<?php
	include('ConexionBD.php');
?>
<?php

session_start();

// Verificar si se recibió el ID del producto
if(isset($_POST['producto_id'])) {
    $productoID = $_POST['producto_id'];
    
    // Agregar el producto al carrito (puedes almacenar esto en una tabla en la base de datos)
    $_SESSION['carrito'][$productoID] = isset($_SESSION['carrito'][$productoID]) ? $_SESSION['carrito'][$productoID] + 1 : 1;
}
?>

<?php


            session_start();
            // Verificar si el usuario ha iniciado sesión
            if(isset($_SESSION['username'])) {
                $ID_Cliente = $_SESSION['ID_Cliente'];
                $mostrarUsuario = true;
            } else {
                $mostrarUsuario = false;
            }
            ?>

            <?php if($mostrarUsuario): ?>
                 Bienvenido, <?php echo $ID_Cliente; ?> <!-- Muestra el nombre de usuario -->

               

<?php  
        $fecha_actual = date("Y-m-d");

    $sql = "INSERT INTO Pedidos (ID_Cliente, Fecha, Pago) VALUES '$ID_Cliente','$fecha_actual','$pago'";

    if (mysqli_query($conn, $sql)) {
        echo "Pedido Registrado";
    } else{
            echo "Error: ". $sql . mysqli_error($conn);
            }


?>
