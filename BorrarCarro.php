<?php
	include('ConexionBD.php');
?>

<?php
    
    $sql="DELETE FROM Carrito";

    if (mysqli_query($conn, $sql)) {
        header("Location: Carr.php");
        exit();
    } else {
        echo "Error: ". $sql . mysqli_error($conn);
    }

?>