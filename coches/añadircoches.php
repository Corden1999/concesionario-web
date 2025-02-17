<HTML LANG="es">
<HEAD>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concesionario de Autos</title>
</HEAD>
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
    }
    
    /* Estilos para el encabezado */
    header {
        background-color: #333;
        color: #fff;
        text-align: center;
        padding: 40px 0; /* Espaciado mayor para resaltar el encabezado */
    }
    
    header h1 {
        font-size: 2.5em; /* Tamaño grande para el título */
    }
    
    /* Menú de navegación */
    nav {
        background-color: #444;
        width: 100%;
    }
    
    /* Estilo del menú horizontal */
    .menu {
        display: flex;
        justify-content: center;
        list-style-type: none;
        margin: 0;
        padding: 0;
    }
    
    /* Estilo de cada elemento de menú */
    .menu-item {
        position: relative;
        margin-left: 200px;
        margin-right: 200px;
        text-align: center;
        color: white;
    }
    
    .menu-item a {
        display: block;
        padding: 15px 30px;
        color: #fff;
        text-decoration: none;
        background-color: #555;
        border: 1px solid #444;
    }
    
    .menu-item a:hover {
        background-color: #666;
    }
    
    /* Submenú */
    .submenu {
        display: none;
        list-style-type: none;
        position: absolute;
        top: 100%; /* Lo coloca debajo del menú principal */
        left: 0;
        background-color: #555;
        min-width: 180px;
    }
    
    .submenu li a {
        background-color: #666;
        padding: 10px;
        border: 1px solid #555;
    }
    
    .submenu li a:hover {
        background-color: #777;
    }
    
    /* Mostrar submenú al pasar el ratón sobre el ítem del menú */
    .menu-item:hover .submenu {
        display: block;
    }
    
    /* Contenido principal */
    main {
        padding: 20px;
        margin-top: 20px;
        text-align: center;
    }
    
    /* Estilo del pie de página */
    footer {
        background-color: #333;
        color: white;
        text-align: center;
        padding: 10px;
        margin-top: 20px;
    }
    </style>
<BODY>
    <header>
        <h1>Concesionario de Coches</h1>
    </header>
    
    <nav>
        <ul class="menu">
            <!-- Menú principal horizontal -->
            <li class="menu-item">Coches
                <ul class="submenu">
                    <li><a href="../index.html">Inicio</a></li>
                    <li><a href="añadircoches.html">Añadir</a></li>
                    <li><a href="listarcoches.php">Listar</a></li>
                    <li><a href="buscarcoches.html">Buscar</a></li>
                    <li><a href="modificarcoches.html">Modificar</a></li>
                    <li><a href="borrarcoches.php">Borrar</a></li>
                </ul>
            </li>
            <li class="menu-item">Usuarios
                <ul class="submenu">
                    <li><a href="../index.html">Inicio</a></li>
                    <li><a href="../usuarios/añadirusuarios.html">Añadir</a></li>
                    <li><a href="../usuarios/listarusuarios.php">Listar</a></li>
                    <li><a href="../usuarios/buscarusuarios.html">Buscar</a></li>
                    <li><a href="../usuarios/modificarusuarios.html">Modificar</a></li>
                    <li><a href="../usuarios/borrarusuarios.php">Borrar</a></li>
                </ul>
            </li>
            <li class="menu-item">Alquileres
                <ul class="submenu">
                    <li><a href="../index.html">Inicio</a></li>
                    <li><a href="../alquileres/listaralquileres.php">Listar</a></li>
                    <li><a href="../alquileres/borraralquileres.php">Borrar</a></li>
                </ul>
            </li>
        </ul>
    </nav>

<H1>insercion de coche</H1>

<?PHP

   // Conectar con el servidor de base de datos
      $conexion = mysqli_connect ("localhost", "root", "rootroot","concesionario")
         or die ("No se puede conectar con el servidor");
		
   $modelo = $_REQUEST['modelo'];
   $marca = $_REQUEST['marca'];
   $color = $_REQUEST['color'];
   $precio = $_REQUEST['precio'];
   $alquilado = $_REQUEST['alquilado'];
   $target_dir = "./img/";

// Verificar si se envió un archivo
if ($_SERVER['REQUEST_METHOD'] == 'POST' && isset($_FILES['image'])) {
$file = $_FILES['image'];

// Obtener el nombre y ruta del archivo destino
$target_file = $target_dir . basename($file["name"]);

// Verificar si el archivo es realmente una imagen
$check = getimagesize($file["tmp_name"]);
if ($check === false) {
    die("El archivo seleccionado no es una imagen.");
}

// Verificar si el archivo ya existe
if (file_exists($target_file)) {
    die("El archivo ya existe en el servidor.");
}

// Intentar mover el archivo al directorio de destino
if (move_uploaded_file($file["tmp_name"], $target_file)) {
    echo "La imagen " . htmlspecialchars(basename($file["name"])) . " se ha subido correctamente.";
} else {
    echo "Hubo un error al subir el archivo.";
}
} else {
    echo "No se ha seleccionado ningún archivo.";
}  
   // Enviar consulta
      $instruccion = "insert into Coches (modelo, marca, color, precio, alquilado, foto) values ('$modelo', '$marca', '$color', '$precio', '$alquilado', '$target_file')";
      
      if (mysqli_query ($conexion,$instruccion)) {
         echo "coche insertado con exito";
      }
      else{
         echo "Error al insertar coche" . mysqli_error($conexion);
      }

    
// Cerrar 
mysqli_close ($conexion);



?>

</BODY>
</HTML>
