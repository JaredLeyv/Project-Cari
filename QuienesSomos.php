<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/Estilos/nav.css">
    <!--http://localhost/CALISFRUTERIA/-->
    <link rel="stylesheet" href="assets/Estilos/Botones.css">
    <link rel="stylesheet" href="assets/Estilos/QuienesSomos.css">
    <link rel="stylesheet" href="assets/Estilos/Footer.css">

    <script src="https://kit.fontawesome.com/585d48aa9b.js" crossorigin="anonymous"></script>

    <title>Fruteria</title>
</head>
<body>
<nav class="nv">
        <div id="LogoNombre">
            <img class="LOGO" src="Imagenes/LOGO.png" alt="LOGO">

            <h1>
                FRUTERIA
            </h1>

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

        <div id="Navegador">
            <ul>

                <li><a class="nav" href="index.php">INICIO</a></li>
                <li><a class="nav" href="QuienesSomos.php">QUIENES SOMOS</a></li>
                <li><a class="nav" href="CarritoLista.php"><i class="fa-solid fa-truck"></i></a></li>

            </ul>
        </div>
    </nav>

    
    <main>
    <section id="about">
        <h2>¿Quiénes Somos?</h2>
        <p>Somos una frutería en línea dedicada a ofrecerte la mejor calidad en frutas y verduras frescas directamente a tu hogar. Nuestra misión es proporcionarte productos frescos y saludables, asegurando una experiencia de compra conveniente y satisfactoria.</p>
        <p>En Frutería Online, trabajamos con proveedores confiables y seleccionamos cuidadosamente cada producto para garantizar su frescura y calidad. Además, ofrecemos un proceso de pedido sencillo y opciones de entrega flexibles para adaptarnos a tus necesidades.</p>
        <p>¡Confía en nosotros para satisfacer tus necesidades de frutas y verduras frescas con la comodidad de hacer tu pedido en línea!</p>
    </section>

    <!-- Puedes agregar más secciones aquí, como testimonios, equipo, etc. -->

</main>

        <!--Pie de pagina-->
        <footer class="pie-pagina">        
        <div id="Grupo1">
            <div id="box">
                <figure>
                    <a href="#">
                        <img src="Imagenes/Logo.png" alt="Logo">
                    </a>
                 </figure>
             </div>
             <div id="box">
                <h2>SOBRE NOSOTROS</h2>
                <P>Lorem ipsum dolor, sit amet consectetu</P>
                <P>Lorem ipsum dolor, sit amet consectetu</P>
             </div>
             <div id="box">
                <h2>SIGUENOS</h2>
                <div id="red_social">
                    <a href="#" class="fa fa-facebook"></a>
                    <a href="#" class="fa fa-instagram"></a>
                    <a href="#" class="fa fa-whatsApp"></a>
                </div>
             </div>
        </div>
    </footer>

</body>
</html>