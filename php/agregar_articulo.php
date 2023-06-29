<?php
	include('conectar.php');

	$admin = $_POST['admin'];
	
	$nombre = $_POST['nombre'];
	$cantidad = $_POST['cantidad'];
	$precio = $_POST['precio'];
	$imagen = addslashes(file_get_contents($_FILES['imagen']['tmp_name']));
	$marca = $_POST['marca'];

	$consulta = "INSERT INTO inventario VALUES ('0' ,'$nombre', '$cantidad', '$precio', '$imagen', '$marca')";
	$agregar = mysqli_query($conexion, $consulta);

	if($agregar){
		echo "<script>
			alert('Articulo añadido con exito!');
			location.href = 'admin.php?user=".$admin."';
		</script>";
	}
	else{
		echo "<script>
			alert('Error al añadir el articulo!');
			location.href = 'admin.php?user=".$admin."';
		</script>";
	}
?>