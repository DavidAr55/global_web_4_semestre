<?php
	include('conectar.php');
    session_start();

	if(isset($_GET['user'])){
		$user = $_GET['user'];
	}

	if(isset($_SESSION['user'])){
		$user = $_SESSION['user'];
	}
?>
<!DOCTYPE html>
<html lang="Es">
<head>
	<!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

	<link rel="icon" href="../img/favicon.ico" type="image/x-icon">
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<meta http-equiv="X-UA-Compatible" content="ie=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="stylesheet" type="text/css" href="../css/style_admin.css">

	<link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans" rel="stylesheet">

	<title>Hot Taco Sk8</title>
</head>
<body>
	<div class="general">
		<header>
			<nav>
				<div class="decoracion_navegador">
					<div class="posicion-logo">
						<a href="../index.php">
							<img src="../img/Logo.png" class="posicion-logo">
						</a>
					</div>
				</div>
				<div class="caja_menu" id="div-menu">
                        <ul id="ul-menu">
                            <li><a href="../index.php">Inicio</a></li>
                            <li><a href="../informacion.php">Informacion</a></li>
                        </ul>
                    </div>
				<div class="opc_usuario">
                    <div class="username">
                        <p><?php echo $user; ?></p>
                    </div>
                    <div class="close">
                        <p><a href="../ingresar.html">Cerrar sercion</a></p>
                    </div>
                    <div class="carrito_compras">
                        <a data-bs-toggle="modal" data-bs-target="#modal_cart" style="color: red;"><i class="fas fa-shopping-cart"></i> <?php if(isset($total_cantidad)){echo $totalcantidad;} ?></a>
                    </div>
                </div>
			</nav>
		</header>
		<div class="destacados">
			<table class="table">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">ID</th>
			      <th scope="col">Usuario</th>
			      <th scope="col">Email</th>
			      <th scope="col">Password</th>
			      <th scope="col">Tipo de usuario</th>
			      <th scope="col">Verificacion</th>
			      <th scope="col">Codigo</th>
			    </tr>
			  </thead>
				<?php
					$sql = "SELECT * FROM usuarios";
					$result = mysqli_query($conexion, $sql);

					while ($mostrar = mysqli_fetch_array($result)) {
					?>
						<tbody>
						    <tr>
						      <th scope="row"><?php echo $mostrar['id']; ?></th>
						      <td><?php echo $mostrar['username']; ?></td>
						      <td><?php echo $mostrar['email']; ?></td>
						      <td><?php echo $mostrar['password']; ?></td>
						      <td><?php echo $mostrar['tipo']; ?></td>
						      <td><?php echo $mostrar['verificacion']; ?></td>
						      <td><?php echo $mostrar['codigo']; ?></td>
						    </tr>
						  </tbody>
					<?php
					}
				?>
			</table>
		</div>
		<div class="container">
	        <div class="row justify-content-md-center" style="margin-top:15%">
	            <form class="col-3" action="agregar.php" method="POST">
	                <h2>Agregar cuenta</h2>
	                <div class="mb-3">
	                    <input type="text" class="form-control" name="usuario" placeholder="Nombre de usuario">
	                    <input type="text" class="form-control" name="email" placeholder="Correo electronico">
	                    <input type="password" class="form-control" name="password" placeholder="Contraseña">

	                    <input name="admin" type="hidden" id="admin" value="<?php echo $user; ?>" />
	                </div>
	                <button type="submit" class="btn btn-primary">Agregar</button>
	            </form>
	        </div>
	    </div>
	    <div class="container">
	        <div class="row justify-content-md-center" style="margin-top:15%">
	            <form class="col-3" action="actualizar.php" method="POST">
	                <h2>Modificar</h2>
	                <div class="mb-3">
	                	<input type="text" class="form-control" name="id" placeholder="ID a buscar">
	                	<label for="c" class="form-label">Datos a actualizar</label>
	                    <input type="text" class="form-control" name="usuario" placeholder="Nombre de usuario">
	                    <input type="text" class="form-control" name="email" placeholder="Correo electronico">
	                    <input type="password" class="form-control" name="password" placeholder="Contraseña">
	                    <input type="password" class="form-control" name="tipo" placeholder="Tipo de usuario">

	                    <input name="admin" type="hidden" id="admin" value="<?php echo $user; ?>" />
	                </div>
	                <button type="submit" class="btn btn-primary">Actualizar</button>
	            </form>
	        </div>
	    </div>
	    <div class="container">
	        <div class="row justify-content-md-center" style="margin-top:15%">
	            <form class="col-3" action="eliminar.php" method="POST">
	                <h2>Eliminar</h2>
	                <div class="mb-3">
	                    <input type="text" class="form-control" name="id" placeholder="ID a buscar">

	                    <input name="admin" type="hidden" id="admin" value="<?php echo $user; ?>" />
	                </div>
	                <button type="submit" class="btn btn-primary">Elimiar</button>
	            </form>
	        </div>
	    </div>
	    <div class="inventario">
			<table class="table">
			  <thead class="thead-dark">
			    <tr>
			      <th scope="col">ID</th>
			      <th scope="col">Nombre</th>
			      <th scope="col">Cantidad</th>
			      <th scope="col">Precio</th>
			      <th scope="col">Imagen</th>
			      <th scope="col">Marca</th>
			    </tr>
			  </thead>
				<?php
					$sql_i = "SELECT * FROM inventario";
					$result2 = $conexion->query($sql_i);

					while ($mostrar = $result2->fetch_assoc()) {
					?>
						<tbody>
						    <tr>
						      <th scope="row"><?php echo $mostrar['id']; ?></th>
						      <td><?php echo $mostrar['nombre']; ?></td>
						      <td><?php echo $mostrar['cantidad']; ?></td>
						      <td><?php echo $mostrar['precio']; ?></td>
						      <td><img height="80px" src="data:image/jpg;base64,<?php echo base64_encode($mostrar['imagen']); ?>"></td>
						      <td><?php echo $mostrar['marca']; ?></td>
						    </tr>
						  </tbody>
					<?php
					}
				?>
			</table>
		</div>
		<div class="container">
	        <div class="row justify-content-md-center" style="margin-top:15%">
	            <form class="col-3" action="agregar_articulo.php" method="POST" enctype="multipart/form-data">
	                <h2>Agregar articulo al inventario</h2>
	                <div class="mb-3">
	                    <input type="text" class="form-control" name="nombre" placeholder="Nombre del articulo">
	                    <input type="text" class="form-control" name="cantidad" placeholder="Cantidad">
	                    <input type="text" class="form-control" name="precio" placeholder="Precio">
	                    <input type="file" class="form-control" name="imagen">
	                    <input type="text" class="form-control" name="marca" placeholder="Marca">

	                    <input name="admin" type="hidden" id="admin" value="<?php echo $user; ?>" />
	                </div>
	                <button type="submit" class="btn btn-primary">Agregar</button>
	            </form>
	        </div>
	    </div>
	    <div class="container">
	        <div class="row justify-content-md-center" style="margin-top:15%">
	            <form class="col-3" action="actualizar_articulo.php" method="POST" enctype="multipart/form-data">
	                <h2>Modificar articulo</h2>
	                <div class="mb-3">
	                	<input type="text" class="form-control" name="id" placeholder="ID a buscar">
	                	<label for="c" class="form-label">Datos a actualizar</label>
	                    <input type="text" class="form-control" name="nombre" placeholder="Nombre del articulo">
	                    <input type="text" class="form-control" name="cantidad" placeholder="Cantidad">
	                    <input type="text" class="form-control" name="precio" placeholder="Precio">
	                    <input type="file" class="form-control" name="imagen" placeholder="Imagen">
	                    <input type="text" class="form-control" name="marca" placeholder="Marca">

	                    <input name="admin" type="hidden" id="admin" value="<?php echo $user; ?>" />
	                </div>
	                <button type="submit" class="btn btn-primary">Actualizar</button>
	            </form>
	        </div>
	    </div>
	    <div class="container">
	        <div class="row justify-content-md-center" style="margin-top:15%">
	            <form class="col-3" action="eliminar_articulo.php" method="POST">
	                <h2>Eliminar articulo</h2>
	                <div class="mb-3">
	                    <input type="text" class="form-control" name="id" placeholder="ID a buscar">

	                    <input name="admin" type="hidden" id="admin" value="<?php echo $user; ?>" />
	                </div>
	                <button type="submit" class="btn btn-primary">Elimiar</button>
	            </form>
	        </div>
	    </div>
    </div>
	<script src="js/popup.js"></script>
	<!-- Optional JavaScript -->
    <!-- jQuery first, then Popper.js, then Bootstrap JS -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/js/bootstrap.min.js" integrity="sha384-JjSmVgyd0p3pXB1rRibZUAYoIIy6OrQ6VrjIEaFf/nJGzIxFDsf4x0xIM+B07jRM" crossorigin="anonymous"></script>
</body>
</html>