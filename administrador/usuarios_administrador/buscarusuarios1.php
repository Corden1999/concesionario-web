<?php
session_start();
?>
<HTML LANG="es">
    <HEAD>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>pruebas</title>
        <style>
            * {
                margin: 0;
                padding: 0;
                box-sizing: border-box;
            }
            
            /* Estilo básico de la página */
            body {
                font-family: Arial, sans-serif;
                background-color: #f4f4f4;
                display: flex;
                flex-direction: column;
                align-items: center;
                min-height: 100vh;
                margin: 0;
            }
            
            /* Estilos para el encabezado */
            header {
                background-color: #333;
                color: #fff;
                padding: 40px 0;
                position: relative;
                text-align: center;
                width: 100%;
            }
            
            header h1 {
                font-size: 2.5em;
                margin: 0;
            }
            
            /* Contenedor para los botones de inicio de sesión y registro */
            .header-buttons {
                position: absolute;
                top: 50%;
                right: 20px;
                transform: translateY(-50%);
                display: flex;
                gap: 10px;
            }
            
            /* Estilo para los botones del encabezado */
            .header-buttons a {
                padding: 10px 20px;
                background-color: #555;
                color: #fff;
                text-decoration: none;
                border: 1px solid #444;
                border-radius: 5px;
            }
            
            .header-buttons a:hover {
                background-color: #666;
            }
            
            /* Estilo del menú horizontal */
            nav {
                background-color: #444;
                width: 100%;
                padding: 10px 0;
            }
            
            .menu {
                display: flex;
                justify-content: center;
                list-style-type: none;
                margin: 0;
                padding: 0;
            }
            
            .menu-item {
                margin: 0 40px; /* Aumentamos el margen horizontal para separar más los botones */
                position: relative;
            }
            
            .menu-item > a {
                display: block;
                padding: 10px 20px;
                color: #fff;
                text-decoration: none;
                cursor: pointer;
            }
            
            .menu-item > a:hover {
                background-color: #555;
                border-radius: 5px;
            }
            
            /* Submenú */
            .submenu {
                display: none;
                list-style-type: none;
                position: absolute;
                top: 100%;
                left: 0;
                background-color: #555;
                min-width: 180px;
                border-radius: 5px;
                padding: 5px 0;
            }
            
            .submenu li a {
                padding: 10px;
                color: #fff;
                text-decoration: none;
                display: block;
            }
            
            .submenu li a:hover {
                background-color: #666;
                border-radius: 5px;
            }
            
            .menu-item:hover .submenu {
                display: block;
            }
            
            /* Estilo del formulario */
            .form-container {
                background-color: #fff;
                padding: 20px;
                border-radius: 10px;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                width: 100%;
                max-width: 400px;
                margin: 20px;
            }
            
            .form-container h2 {
                text-align: center;
                margin-bottom: 20px;
                font-size: 1.5em;
                color: #333;
            }
            
            .form-container label {
                display: block;
                margin-bottom: 5px;
                color: #555;
            }
            
            .form-container input,
            .form-container select {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 1em;
                background-color: #fff;
                color: #333;
            }
            
            .form-container input:focus,
            .form-container select:focus {
                border-color: #555;
                outline: none;
            }
            
            /* Estilo para el select personalizado */
            .form-container select {
                appearance: none; /* Elimina el estilo por defecto del navegador */
                background-image: url('data:image/svg+xml;utf8,<svg fill="%23333" height="24" viewBox="0 0 24 24" width="24" xmlns="http://www.w3.org/2000/svg"><path d="M7 10l5 5 5-5z"/></svg>');
                background-repeat: no-repeat;
                background-position: right 10px center;
                background-size: 12px;
                padding-right: 30px; /* Espacio para la flecha */
            }
            
            /* Estilo para los botones del formulario (igual que los del encabezado) */
            .form-container .buttons {
                display: flex;
                justify-content: space-between;
                gap: 10px;
            }
            
            .form-container .buttons input {
                flex: 1;
                padding: 10px 20px;
                border: 1px solid #444;
                border-radius: 5px;
                font-size: 1em;
                cursor: pointer;
                background-color: #555;
                color: #fff;
            }
            
            .form-container .buttons input:hover {
                background-color: #666;
            }
        
        /* Estilo para el contenedor de bienvenida */
        .welcome-container {
            position: absolute;
            top: 20px;
            right: 20px;
            background-color: #555;
            padding: 10px;
            border-radius: 5px;
            color: #fff;
            text-align: right;
            }

            .welcome-container a {
            color: #fff;
            text-decoration: none;
            font-size: 0.9em;
            }

            .welcome-container a:hover {
            text-decoration: underline;
            }

        </style>
    </HEAD>
    <BODY>
        <header>
            <h1>Concesionario de Coches</h1>
        </header>
        
        <nav>
            <ul class="menu">
                <!-- Menú principal horizontal -->
                <li class="menu-item">
                    <a>Coches</a>
                    <ul class="submenu">
                        <li><a href="../index.html">Inicio</a></li>
                        <li><a href="../coches/añadircoches.html">Añadir</a></li>
                        <li><a href="../coches/listarcoches.php">Listar</a></li>
                        <li><a href="../coches/buscarcoches.html">Buscar</a></li>
                        <li><a href="../coches/modificarcoches.html">Modificar</a></li>
                        <li><a href="../coches/borrarcoches.php">Borrar</a></li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a>Usuarios</a>
                    <ul class="submenu">
                        <li><a href="../index.html">Inicio</a></li>
                        <li><a href="añadirusuarios1.php">Añadir</a></li>
                        <li><a href="listarusuarios.php">Listar</a></li>
                        <li><a href="buscarusuarios1.php">Buscar</a></li>
                        <li><a href="modificarusuarios1.php">Modificar</a></li>
                        <li><a href="borrarusuarios.php">Borrar</a></li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a>Alquileres</a>
                    <ul class="submenu">
                        <li><a href="../index.html">Inicio</a></li>
                        <li><a href="../alquileres/listaralquileres.php">Listar</a></li>
                        <li><a href="../alquileres/borraralquileres.php">Borrar</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
    <div class="form-container">
    <h2>Buscar usuarios</h2>
    <form action="buscarusuarios.php" method="post" enctype="multipart/form-data">
                <label for="nombre">Nombre:</label>
                <input type="text" id="nombre" name="nombre">
    
                <label for="apellidos">Apellidos:</label>
                <input type="text" id="apellidos" name="apellidos">

                <label for="email">Email:</label>
                <input type="email" id="email" name="email">
    
                <label for="contrasena">Contraseña:</label>
                <input type="password" id="contrasena" name="contrasena" >
    
                <label for="dni">DNI:</label>
                <input type="text" id="dni" name="dni" >
    
                <label for="saldo">Saldo:</label>
                <input type="number" id="saldo" name="saldo" >

                <label for="tipo">Tipo de usuario:</label>
                <select id="tipo" name="tipo" >
                    <option value="seleccione">--Seleccione un tipo--</option>
                    <option value="comprador">Comprador</option>
                    <option value="vendedor">Vendedor</option>
                    <option value="administrador">Administrador</option>
                </select>
    
                <div class="buttons">
                    <input type="submit" value="Enviar">
                    <input type="reset" value="Borrar">
                </div>
            </form>
   </div>

<?PHP
$name = $_SESSION['name'];

echo "<div class='welcome-container'>
    <strong>¡Bienvenido!</strong> $name
    <p><a href='../../sesion_registro/edit-profile.php'>Editar Ficha</a></p>
    <p><a href='../../sesion_registro/logout.php'>Logout</a></p>
    </div>";
?>	

</BODY>

</HTML>