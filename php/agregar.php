<?php
	include('conectar.php');

	$admin = $_POST['admin'];

	$user = $_POST['usuario'];
	$email = $_POST['email'];
	$pass = $_POST['password'];

	$consulta = "INSERT INTO usuarios VALUES ('0' ,'$user', '$email', '$pass', '1', '1', '100001')";
	$agregar = mysqli_query($conexion, $consulta);

	if($agregar){
		echo "<script>
			alert('Usuario añadido con exito!');
			location.href = 'admin.php?user=".$admin."';
		</script>";
	}
	else{
		echo "<script>
			alert('Error al añadir usuario!');
			location.href = 'admin.php?user=".$admin."';
		</script>";
	}
?>