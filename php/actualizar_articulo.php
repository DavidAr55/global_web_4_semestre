<?php
	include('conectar.php');

	$admin = $_POST['admin'];

	$id = $_POST['id'];
	$nombre = $_POST['nombre'];
	$cantidad = $_POST['cantidad'];
	$precio = $_POST['precio'];
	$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
	$marca = $_POST['marca'];

	$consulta = "UPDATE inventario SET nombre = '$nombre', cantidad = '$cantidad', precio = '$precio', imagen = '$imagen', marca = '$marca' WHERE id = '$id'";
	$actualizar = mysqli_query($conexion, $consulta);

	if($actualizar){
		echo "<script>
			alert('Articulo actualizado con exito!');
			location.href = 'admin.php?user=".$admin."';
		</script>";
	}
	else{
		echo "<script>
			alert('Error al actualizar el articulo!');
			location.href = 'admin.php?user=".$admin."';
		</script>";
	}
?>