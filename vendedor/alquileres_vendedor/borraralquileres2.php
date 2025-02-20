<?php
session_start();
?>
<!doctype html>
<html>
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Concesionario de Autos</title>
</head>
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
                        <li><a href="../coches_vendedor/añadircoches1.php">Añadir</a></li>
                        <li><a href="../coches_vendedor/listarcoches.php">Listar</a></li>
                        <li><a href="../coches_vendedor/buscarcoches1.php">Buscar</a></li>
                        <li><a href="../coches_vendedor/modificarcoches1.php">Modificar</a></li>
                        <li><a href="../coches_vendedor/borrarcoches.php">Borrar</a></li>
                    </ul>
                </li>
                <li class="menu-item">
                    <a>Alquileres</a>
                    <ul class="submenu">
                        <li><a href="../index_vendedor.php">Inicio</a></li>
                        <li><a href="listaralquileres.php">Listar</a></li>
                        <li><a href="borraralquileres.php">Borrar</a></li>
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

$conn = mysqli_connect("localhost", "root", "rootroot", "concesionario");
if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}
// Comprobar si hay IDs para eliminar
if (isset($_POST['delete_ids']) && is_array($_POST['delete_ids'])) {
    $ids_to_delete = implode(",", array_map('intval', $_POST['delete_ids']));
    /*$ids_to_delete = [];
      foreach ($_POST['delete_ids'] as $id) {
         $ids_to_delete[] = intval($id);
     }
    $ids_to_delete_string = implode(",", $ids_to_delete);*/

    // Eliminar los pisos seleccionados
    $sql = "DELETE FROM usuarios WHERE id_usuario IN ($ids_to_delete)";
    if (mysqli_query($conn, $sql)) {
        echo "<h1>Usuarios eliminados correctamente</h1>";
    } else {
        echo "<h1>Error al eliminar usuarios: " . mysqli_error($conn) . "</h1>";
    }
} else {
    echo "<h1>No se seleccionaron usuarios para eliminar</h1>";
}
// Cerrar conexión
mysqli_close($conn);

// Volver al listado
echo "<a href='borrarusuarios.php'>Volver al listado</a>";
?>
</body>


</html>