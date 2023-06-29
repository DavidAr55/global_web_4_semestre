<?php
	include('conectar.php');

	$admin = $_POST['admin'];

	$id = $_POST['id'];

	$consulta = "DELETE FROM usuarios WHERE id = '$id'";
	$eliminar = mysqli_query($conexion, $consulta);

	if($eliminar){
		echo "<script>
			alert('Usuario eliminado con exito!');
			location.href = 'admin.php?user=".$admin."';
		</script>";
	}
	else{
		echo "<script>
			alert('Error al borrar usuario!');
			location.href = 'admin.php?user=".$admin."';
		</script>";
	}
?>