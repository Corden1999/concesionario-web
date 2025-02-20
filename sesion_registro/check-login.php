
<?php
    session_start();
	// Connection info. file
	include 'conn.php';	
	
	$conn = mysqli_connect($dbhost, $dbuser, $dbpass, $dbname);

	if (!$conn) {
		die("Connection failed: " . mysqli_connect_error());
	}
	
	$email = $_POST['email']; 
	$password = $_POST['password'];
	
	$result = mysqli_query($conn, "SELECT Email, Password, Name, tipo FROM usuarios WHERE Email = '$email'");
	
	$row = mysqli_fetch_assoc($result);
	
	// Variable $hash hold the password hash on database
	$hash = $row['Password'];
	
	
	if ($_POST['password']== $hash) {	
		$_SESSION['loggedin'] = true;
		$_SESSION['name'] = $row['Name'];
        $_SESSION['tipo'] = $row['tipo'];
		$_SESSION['start'] = time();
		$_SESSION['expire'] = $_SESSION['start'] + (1 * 60) ;						
	

      if ($_SESSION['tipo'] == 'administrador') {
        header("Location: ../administrador/index_administrador.php");
      } elseif ($_SESSION['tipo'] == 'comprador') {
        header("Location: ../comprador/index_comprador.php");
      } elseif ($_SESSION['tipo'] == 'vendedor') {
        header("Location: ../vendedor/index_vendedor.php");
      }
	
	} else {
		echo "<div >Email o Password incorrectos!
		<p><a href='login.html'><strong>¡Intentalo de nuevo!</strong></a></p></div>";			
	}	
?>
