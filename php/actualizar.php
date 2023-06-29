<?php
	include('conectar.php');
	session_start();

	$admin = $_POST['admin'];
	//echo "<script>alert('".$_POST['admin']."');</script>";

	$id = $_POST['id'];
	$user = $_POST['usuario'];
	$email = $_POST['email'];
	$pass = $_POST['password'];
	$tipo = $_POST['tipo'];

	$consulta = "UPDATE usuarios SET username = '$user', email = '$email', password = '$pass', tipo = '$tipo' WHERE id = '$id'";
	$actualizar = mysqli_query($conexion, $consulta);

	if($actualizar){
		echo "<script>
			alert('Usuario actualizadon con exito!');
			location.href = 'admin.php?user=".$admin."';
		</script>";
	}
	else{
		echo "<script>
			alert('Error al actualizar usuario!');
			location.href = 'admin.php?user=".$admin."';
		</script>";
	}
?>