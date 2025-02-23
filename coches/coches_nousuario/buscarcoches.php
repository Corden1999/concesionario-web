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
            /* Estilos para la tabla */
            table {
                width: 80%;
                margin: 20px auto;
                border-collapse: collapse;
                box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
                background-color: #fff;
            }

            th, td {
                padding: 12px 15px;
                text-align: left;
                border-bottom: 1px solid #ddd;
            }

            th {
                background-color: #333;
                color: #fff;
            }

            tr:hover {
                background-color: #f5f5f5;
            }

            img {
                max-width: 100%;
                height: auto;
            }
        </style>
    </HEAD>
    <BODY>
    <header>
        <h1>Concesionario de Coches</h1>
        <div class="header-buttons">
            <a href="../../sesion_registro/registro.html">Registro</a>
            <a href="../../sesion_registro/login.html">Inicio de sesión</a>
        </div>
    </header>
    
    <nav>
        <ul class="menu">
            <!-- Menú principal horizontal -->
            <li class="menu-item">
                <a>Coches</a>
                <ul class="submenu">
                    <li><a href="../../index.html">Inicio</a></li>
                    <li><a href="listarcoches.php">Listar</a></li>
                    <li><a href="buscarcoches.html">Buscar</a></li>
                </ul>
            </li>
        </ul>
    </nav>
    <H1>busqueda de coche</H1>

    <?PHP
    
       // Conectar con el servidor de base de datos
          $conexion = mysqli_connect ("localhost", "root", "rootroot","concesionario")
             or die ("No se puede conectar con el servidor");
            
       $modelo = $_REQUEST['modelo'];
       $marca = $_REQUEST['marca'];
       $color = $_REQUEST['color'];
       $precio = $_REQUEST['precio'];
       $alquilado = $_REQUEST['alquilado'];
       
    
       // Enviar consulta
          $instruccion = "select * from Coches where modelo='$modelo' or marca='$marca' or color='$color' or precio='$precio' or alquilado='$alquilado'";
          $consulta = mysqli_query ($conexion,$instruccion)
             or die ("Fallo en la consulta");
          
          $nfilas = mysqli_num_rows ($consulta);
          if ($nfilas > 0)
          {
             print ("<TABLE>\n");
             print ("<TR>\n");
             print ("<TH>modelo</TH>\n");
             print ("<TH>marca</TH>\n");
             print ("<TH>color</TH>\n");
             print ("<TH>precio</TH>\n");
             print ("<TH>alquilado</TH>\n");
             print ("<TH>foto</TH>\n");
             print ("</TR>\n");
    
             for ($i=0; $i<$nfilas; $i++)
             {
                $resultado = mysqli_fetch_array ($consulta);
                print ("<TR>\n");
                print ("<TD>" . $resultado['modelo'] . "</TD>\n");
                print ("<TD>" . $resultado['marca'] . "</TD>\n");
                print ("<TD>" . $resultado['color'] . "</TD>\n");
                print ("<TD>" . $resultado['precio'] . "</TD>\n");
                print ("<TD>" . $resultado['alquilado'] . "</TD>\n");
                print ("<TD> <img src='" . $resultado['foto'] . "' width=80px></TD>\n");
                print ("</TR>\n");
             }
    
             print ("</TABLE>\n");
          }
          else {
             print ("No hay cochess que coincidan");
          }
          
    
    // Cerrar 
    mysqli_close ($conexion);
    
    ?>
    
    </BODY>
    </HTML>
    
</BODY>
</HTML>