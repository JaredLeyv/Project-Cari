<?php
	include('ConexionBD.php');
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Administrador nuevo</title>
</head>
<body>
<?php

// Recibir los datos del formulario
$nombre = $_POST['nombre'];
$apellidos = $_POST['apellidos'];
$numero_celular = $_POST['numero_celular'];
$username = $_POST['username'];
$password = $_POST['passwor'];

// Insertar datos en la base de datos
$sql = "INSERT INTO Administrador (Nombre, Apellidos, Numero_Celular,  Username, Passwordd) 
        VALUES ('$nombre', '$apellidos', '$numero_celular','$username', '$password')";

    if (mysqli_query($conn, $sql)) {
        echo "Usuario registrado correctamente.";
        header("Location: OpcionesAdministrador.php");
              exit();
    } else {
        echo "Error al registrar el usuario: " .$sql . mysqli_error($conn);
    }


    ?>
</body>
</html>