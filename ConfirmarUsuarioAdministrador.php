<?php
include('ConexionBD.php');
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Confirmar Administrador</title>
</head>
<body>
    <?php
    // Obtener datos del formulario
    $username = isset($_POST['username']) ? $_POST['username'] : '';
    $password = isset($_POST['password']) ? $_POST['password'] : '';

    // Validar si se recibieron los datos necesarios
    if (!empty($username) && !empty($password)) {
        // Preparar la consulta SQL para evitar inyecciones SQL
        $sql = "SELECT * FROM Administrador WHERE Username=? AND Passwordd=?";
        $stmt = $conn->prepare($sql);
        $stmt->bind_param('ss', $username, $password);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows > 0) {
            // El usuario está registrado, redirigir a la página de opciones del administrador
            header("Location: OpcionesAdministrador.php");
            exit();
        } else {
            // El usuario no está registrado o la contraseña es incorrecta
            echo "Administrador no encontrado o contraseña incorrecta.";
        }

        // Cerrar la declaración y la conexión
        $stmt->close();
    } else {
        echo "Por favor, complete todos los campos.";
    }

    // Cerrar la conexión
    $conn->close();
    ?>
</body>
</html>
