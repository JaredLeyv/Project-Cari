<?php 
    include('ConexionBD.php')
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $sql = "DELETE FROM Productos WHERE ID_Producto='".$_GET['ID_Producto']."' ";
    
        if (mysqli_query($conn,$sql)) {
            echo "PRODCUTO BORRADO";
            header("Location: ModificarProducto.php");
            exit();
        } else {
            echo "NO SE ELIMINO EL PRODUCTO" . $sql . mysqli_error($conn);
        }
        
    ?>



</body>
</html>