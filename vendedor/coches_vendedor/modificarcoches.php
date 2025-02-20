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
            
            .form-container input {
                width: 100%;
                padding: 10px;
                margin-bottom: 15px;
                border: 1px solid #ccc;
                border-radius: 5px;
                font-size: 1em;
            }
            
            .form-container input:focus {
                border-color: #555;
                outline: none;
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
                        <li><a href="../index_vendedor.php">Inicio</a></li>
                        <li><a href="añadircoches1.php">Añadir</a></li>
                        <li><a href="listarcoches.php">Listar</a></li>
                        <li><a href="buscarcoches1.php">Buscar</a></li>
                        <li><a href="modificarcoches1.php">Modificar</a></li>
                        <li><a href="borrarcoches.php">Borrar</a></li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a>Alquileres</a>
                    <ul class="submenu">
                        <li><a href="../index_vendedor.php">Inicio</a></li>
                        <li><a href="../alquileres_vendedor/listaralquileres.php">Listar</a></li>
                        <li><a href="../alquileres_vendedor/borraralquileres.php">Borrar</a></li>
                    </ul>
                </li>
            </ul>
        </nav>
<?php
$name = $_SESSION['name'];

echo "<div class='welcome-container'>
    <strong>¡Bienvenido!</strong> $name
    <p><a href='../../sesion_registro/edit-profile.php'>Editar Ficha</a></p>
    <p><a href='../../sesion_registro/logout.php'>Logout</a></p>
    </div>";	


// Configuración de la base de datos
$servername = "localhost";
$username = "root";
$password = "rootroot";
$dbname = "concesionario";

// Crear conexión
$conn = mysqli_connect($servername, $username, $password, $dbname)
or  die("Conexión fallida: " . mysqli_connect_error());

// Recuperar el ID del formulario
$id_coche = $_POST['id_coche'];

$sql = "SELECT * FROM Coches WHERE id_coche = '$id_coche'";
$result = mysqli_query($conn, $sql);

if (mysqli_num_rows($result) > 0) {
    $row = mysqli_fetch_assoc($result);
?>
    <div class="form-container"> 
    <h2>Modificar coche</h2>  
    <form action="modificarcoches2.php" method="post">
        <input type="hidden" name="id_coche" value="<?php echo $row['id_coche']; ?>">
        
        <label for="modelo">Modelo:</label>
        <input type="text" name="modelo" value="<?php echo $row['modelo']; ?>" required><br>
        
        <label for="marca">Marca:</label>
        <input type="text" name="marca" value="<?php echo $row['marca']; ?>" required><br>

        <label for="color">Color:</label>
        <input type="text" name="color" value="<?php echo $row['color']; ?>" required><br>

        <label for="precio">Precio:</label>
        <input type="text" name="precio" value="<?php echo $row['precio']; ?>" required><br>
        
        <label for="alquilado">Alquilado:</label>
        <select name="alquilado">
            <option value="si" <?php if ($row['alquilado'] == 'si') echo 'selected'; ?> >si</option>
            <option value="no" <?php if ($row['alquilado'] == 'no') echo 'selected'; ?> >no</option>
        </select><br>
        
        <label for="foto">Foto:</label>
        <input type="text" name="foto" value="<?php echo $row['foto']; ?>" required><br>
        
        <div class="buttons">
        <input type="submit" value="Actualizar">
        </div>
    </form>
</div>
</body>
</html>

<?php
} else {
    echo "No se encontró el coche.";
}

// Cerrar la conexión
mysqli_close($conn);
?>