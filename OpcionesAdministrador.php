<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
    <title>Prototipo</title>
    <link href="https://fonts.googleapis.com/css2?family=Montserrat:wght@400;600&display=swap" rel="stylesheet">
    <style>
        :root {
            --bg-color:rgba(7, 37, 59, 0.06); /* Color claro que ya usabas */
            --primary-color: #008cba; /* Cian/Azul original */
            --button-bg: #008cba;
            --button-hover: #006f98;
            --button-text: white;
            --text-color: #333;
            --header-bg: gray;
        }

        * {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
            font-family: 'Montserrat', sans-serif;
        }

        body {
            background-color: var(--bg-color);
            color: var(--text-color);
        }

        header#header {
            background-color: var(--header-bg);
            padding: 1rem 2rem;
            display: flex;
            flex-wrap: wrap;
            align-items: center;
            justify-content: space-between;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        }

        header img {
            height: 100px;
        }

        .button {
            background-color: var(--button-bg);
            color: var(--button-text);
            border: none;
            padding: 0.6rem 1.2rem;
            margin: 0.3rem;
            border-radius: 8px;
            font-weight: 600;
            cursor: pointer;
            transition: background-color 0.3s ease, transform 0.2s ease;
        }

        .button:hover {
            background-color: var(--button-hover);
            transform: translateY(-2px);
        }

        #contenedor {
            padding: 3rem 2rem;
            max-width: 1000px;
            margin: 0 auto;
        }

        h1 {
            font-size: 2rem;
            color: var(--primary-color);
            margin-bottom: 1rem;
        }

        h2 {
            font-weight: 400;
            color: #444;
        }

        @media (max-width: 768px) {
            header#header {
                flex-direction: column;
                align-items: flex-start;
                gap: 1rem;
            }

            .button {
                width: 100%;
                text-align: center;
            }
        }
    </style>
    <script src="codigo.js"></script>
</head>
<body>
    <header id="header"> 
        <a href="#"><img src="CARI2.png" alt="Logo de CARI"></a>
        <div style="display: flex; flex-wrap: wrap;">
            <button class="button" onclick="window.location.href='Carr.php'">Preview PV</button>
            <button class="button" onclick="window.location.href='BuscarPedidos.html'">Buscar una venta</button>
            <button class="button" onclick="window.location.href='RegistrarPro.html'">Agregar producto</button>
            <button class="button" onclick="window.location.href='ModificarProducto.php'">Modificar un producto</button>
            <button class="button" onclick="window.location.href='RegistroAdministrador.html'">Registrar administrador</button>
            <button class="button" onclick="window.location.href='iniciosesionAdmin.html'">Cerrar sesión</button>
        </div>
    </header>

    <div id="contenedor">
        <div id="cabecera"></div>
        <div id="body">
            <h1>Bienvenido a Cari.</h1>
            <h2>Con Cari puedes administrar, vender y visualizar tu negocio en tiempo real con tan solo unos clics a distancia. Compruébalo por ti mismo.</h2>
        </div>
        <div id="pie"></div>
    </div>
</body>
</html>
