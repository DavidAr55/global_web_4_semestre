<?php
	require 'php/conectar.php';

	$usuario = $_POST['Usuario'];
	$email = $_POST['Email'];
	$password = $_POST['Password'];
	$password2 = $_POST['Password2'];
	$tipo = 0;

	$validado = 1;

	echo "<script>alert(".$usuario.");</script>";

	if($password === $password2){
		$buscarEmail= $conexion->query("SELECT * FROM usuarios WHERE email='$email'");
			
		if(mysqli_num_rows($buscarEmail) < 1) {
			
			$insertar_usuario = $conexion->query("INSERT INTO usuarios VALUES ('0', '$usuario', '$email', '$password', '$tipo', '$validado', '0')");
			if($insertar_usuario){
				echo "<script>
					alert('Usuario registrado, ahora solo inica sesion');
					location.href = 'ingresar.html';
				</script>";
			}
			else{
				echo "<script>
					alert('Error al conectar con la base de datos');
					location.href = 'ingresar.html';
				</script>";
			}
		}

		else{
			echo "<script>
				alert('Error, el correo que ingresaste ya está registrado.');
				location.href = 'ingresar.html';
			</script>";
		}
	}
	else{
	    include "ingresar.html";
		?>
			<h1 class="bad">Las contraseñas no coinciden.</h1>
		<?php
	}
?>