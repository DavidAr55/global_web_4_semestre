<?php
	include('php/conectar.php');

	$email = $_POST['Email'];
	$password = $_POST['Password'];
	$consulta = "SELECT * FROM usuarios WHERE Email='$email' and Password='$password'";

	/*$buscarUsuario = $conexion->query("SELECT * FROM usuarios WHERE email LIKE '%$email%'");
	$row = $buscarUsuario->fetch_array();
	$user = $row['username'];
	$tipo = $row['tipo'];

	echo "<script>alert('".$row['tipo']."');</script>";
	$i = 0;
	while ($row = $buscarUsuario->fetch_array()) {
		if($i === 0){
			$user = $row['username'];
		}
		echo "<script>alert('".$row[username]."');</script>";
		$i++;
	}*/
	
	$query = mysqli_query($conexion, $consulta);
	$filas = mysqli_num_rows($query);

	/*for ($j=0; $j < $i; $j++) { 
		$carrito[$j] = $;
	}*/

	/*echo "<script>
			alert('Erreglo en 23 es: ".$carrito[23]."');
		</script>";*/

	if($filas){
		session_start();
		$_SESSION['email'] = $_POST['Email'];
		echo "<script>
			
			location.href = 'index.php';
		</script>";
	}
	else{
	    include("ingresar.html");
		?>
			<h1 class="bad">Error de autentificacion.</h1>
		<?php
	}

	/*mysqli_free_result($resultado);
	mysqli_close($conexion);*/
?>