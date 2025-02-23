<?php
session_start(); // Iniciar sesión

$name = $_SESSION['name'];
echo "<div class='welcome-container'>
    <strong>¡Bienvenido!</strong> $name
    <p><a href='../../sesion_registro/edit-profile.php'>Editar Ficha</a></p>
    <p><a href='../../sesion_registro/logout.php'>Logout</a></p>
    </div>";	

// Verificar si el usuario está logueado
if (!isset($_SESSION['id_usuario'])) {
    die("Usuario no logueado.");
}

// Verificar si se ha enviado el formulario
if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $coche_id = $_POST['coche_id'];

    // Conectar con el servidor de base de datos
    $conexion = mysqli_connect("localhost", "root", "rootroot", "concesionario")
        or die("No se puede conectar con el servidor");

    // Actualizar el coche: establecer id_comprador a NULL y alquilado a 'no'
    $instruccion = "UPDATE coches SET id_comprador = NULL, alquilado = 'no' WHERE id_coche = $coche_id";
    mysqli_query($conexion, $instruccion)
        or die("Fallo en la actualización del coche");

    // Mostrar mensaje de éxito
    echo "Coche devuelto con éxito.";

    // Redirigir al usuario de vuelta a la página anterior
    header("Location: devolvercoches.php"); // Cambia "listar_coches.php" por la página que desees
    exit();

    // Cerrar conexión
    mysqli_close($conexion);
} else {
    echo "Método no permitido.";
}
?>