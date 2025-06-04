<?php
	include('ConexionBD.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Usuario</title>
</head>
<body>
    <?php

    $username = $_POST['username'];
    $password = $_POST['password'];
   

    $sql = "SELECT * FROM Clientes WHERE Username='$username' AND Passwordd='$password'";

    $result = $conn->query($sql);

if ($result->num_rows > 0) {
    // El usuario está registrado
    session_start();
    $_SESSION['username'] = $username; // $username es el nombre de usuario obtenido del formulario de inicio de sesión
    
    // Redirigir al usuario a la página principal
    header("Location: Carr.php");
    exit();
} else {
    // El usuario no está registrado
    echo "Usuario no encontrado o contraseña incorrecta.";
}


?>
</body>
</html>