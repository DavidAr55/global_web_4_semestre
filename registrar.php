<?php
	require 'php/conectar.php';
	/*include('php/guardarForm.php');*/

	$usuario = $_POST['Usuario'];
	$email = $_POST['Email'];
	$password = $_POST['Password'];
	$password2 = $_POST['Password2'];
	$tipo = 0;

	$validado = 0;

	echo "<script>alert(".$usuario.");</script>";

	if($password === $password2){
		$buscarEmail= $conexion->query("SELECT * FROM usuarios WHERE email LIKE '%$email%'");
		$row = $buscarEmail->fetch_array();
		if($mailEncontrado == $row['email']){
			$para  = $email;
			// título
			$titulo = 'Codigo de verificacion para Hot Taco Sk8';

			//Generar codigo de verificacion
			$codigo = rand(100000, 999999);

			// mensaje
			$mensaje = '
			  	<html>
			    	<head>
			      		<title>Codigo de verificacion</title>
			    	</head>
			    	<body>
			      		<p>Tu codigo de verificacion es: '.$codigo.'</p>
			   	 	</body>
			  	</html>';

			  	// Para enviar un correo HTML, debe establecerse la cabecera Content-type
			  	$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
			  	$cabeceras .= 'From: Papercut@user.com' . "\r\n";
			  	$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

			  	// Enviarlo
			  	$enviado = false;

			  	if(mail($para, $titulo, $mensaje, $cabeceras)){
			    	$enviado = true;
			  	}
				if($enviado){
					$consulta = "INSERT INTO usuarios VALUES ('0', '$usuario', '$email', '$password', '$tipo', '$validado', '$codigo')";
					$query = mysqli_query($conexion, $consulta);
					if($query){
						header('Location: php/enviar_codigo.php');
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
				alert('Hubo un error al enviar el codigo de verificacion, intente más tarde.');
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
	    include("index.html");
		?>
			<h1 class="bad">Las contraseñas no coinciden.</h1>
		<?php
	}
?>