<?php
	include('ConexionBD.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="nav.css">
    <link rel="stylesheet" href="assets/Estilos/Carrito.css">
    <link rel="stylesheet" href="assets/Estilos/Botones.css">

    <script src="https://kit.fontawesome.com/585d48aa9b.js" crossorigin="anonymous"></script>
    <title>Carrito</title>
</head>
<body>
<nav class="nv">
        <div id="LogoNombre">
            <img class="LOGO" src="CARI2.png" alt="LOGO">

        

            <?php
            // Verificar si el usuario ha iniciado sesión
            session_start();
            if(isset($_SESSION['username'])) {
                $username = $_SESSION['username'];

                $mostrarUsuario = true;
            } else {
                $mostrarUsuario = false;
            }
            ?>

            <?php if($mostrarUsuario): ?>
            <div id="contenedor-usuario">
                 Bienvenido, <?php echo $username; ?> <!-- Muestra el nombre de usuario -->
            </div>
                <button class="cerrar"><a href="CerrarSesion.php">Cerrar sesión</a></button>
            <?php else: ?>
                <button class="inicio"><a href="InicioSesion.html">Iniciar sesión</a></button>
            <?php endif; ?>
            
        </div>

      
    </nav>

    <div class="cart-container"> 
    
        <h2>Carrito de Compras</h2>
        <?php
            $Total = 0;   
            $sqlTotal = "SELECT SUM(Precio * kilos) AS SumaPrecioPorKilo
            FROM Carrito";
            $resultTotal = $conn->query($sqlTotal);
            if ($resultTotal->num_rows > 0) {
                // Obtener el resultado de la consulta
                $row = $resultTotal->fetch_assoc();
                // Asignar el valor de Total
                $Total = $row['SumaPrecioPorKilo'];
            }?>


        <div class="cart-item">
           
            <form class="FormularioComprar" action="Comprar.php">
           <?php 

            $sql = "SELECT NombreProducto, Precio, Kilos FROM Carrito";

            $resultado = $conn->query($sql);


?>

<?php
            echo "<br>";
            echo "<table>";
            echo "<thead>";
            echo "<tr>";
            echo "<th scope='col'>Producto</th>";
            echo "<th scope='col'>Nombre del produto</th>";
            echo "<th scope='col'>Precio</th>";
            echo "<th scope='col'>kilos</th>";
            echo "<th scope='col'>Modificar</th>";
            echo "<th scope='col'>Eliminar</th>";
            echo "</tr>";
            echo "<thead>";
            echo "<tbody>";
           
            
        
      

            if ($resultado->num_rows > 0) {
                while($fila = $resultado->fetch_assoc()) {
                echo "<tr>";
                echo "<td><img src='Imagenes/" . $fila['NombreProducto'] . ".png'></td>";
                echo "<td scope='row'>" . $fila['NombreProducto'] . "</td>";
                echo "<td>" . $fila['Precio'] . "</td>";
                echo "<td>" . $fila['Kilos'] . "</td>";
                echo "<td><a class='Modificar' href='ModificarCantidad.php?NombreProducto=" . $fila['NombreProducto'] . "&Kilos=" .$fila['Kilos'] ."'>Modificar cantidad</a></td>";
                echo "<td><a class='Eliminar' href='EliminarProducto.php?NombreProducto=" . $fila['NombreProducto'] . "&Kilos=" .$fila['Kilos'] ."'>Eliminar Producto</a></td>";
                
                echo "</tr>";
                
                }
            } else {
                echo "<tr><td colspan='6'>CARRITO VACIO</td></tr>";
            }
            echo "<tr><td colspan='6'>Total a pagar:$$Total</td></tr>";
  
    ?>
            
                <button type="submit">Comprar</button>
            </form>
            <form action="BorrarCarro.php">
                <button type="submit">
                    Borrar Carrito
                </button>
            </form>
        </div>




                
    
    

    


                


                


</body>
</html>