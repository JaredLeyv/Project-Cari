<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Document</title>
</head>
<body>
    <?php
        $servername= "localhost:3307";
        $database = "leyvaley";
        $username = "root";
        $password = "";

        //creamos la conexion
        $conn = mysqli_connect($servername, $username, $password, $database);
        //checamos la conexion
        if(!$conn){
            die("connection has been failed.". mysqli_connect_error());
        }
    ?>
</body>
</html>