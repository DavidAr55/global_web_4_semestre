<?php
	include('php/conectar.php');
	session_start();

	$total = $_GET['total'];
	$iva = $_GET['total'] * 0.16;

	$total += $iva;

	if(isset($_SESSION['email'])){
        $identificador = $_SESSION['email'];
        $buscarUsuario = $conexion->query("SELECT * FROM usuarios WHERE email LIKE '%$identificador%'");
        $row = $buscarUsuario->fetch_array();
        $user = $row['username'];
    }


	echo $user . " tu pago total fue de: " . $total;
	$para  = $_SESSION['email'];

  	// título
  	$titulo = 'Gracias por tu compra!!';

  	//Generar codigo de verificacion
  	$codigo = rand(100000, 999999);

  	// mensaje
  	$mensaje = '
  	<html>
    	<head>
      		<title>Total de la compra: '.$total.'</title>
    	</head>
    	<body>
      		<p>Gracias por tu compra, tu comprobante de pago es: '.$codigo.'</p>
    	</body>
  	</html>';

  	// Para enviar un correo HTML, debe establecerse la cabecera Content-type
  	$cabeceras  = 'MIME-Version: 1.0' . "\r\n";
  	$cabeceras .= 'From: Papercut@user.com' . "\r\n";
  	$cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

  	// Enviarlo
  	if(mail($para, $titulo, $mensaje, $cabeceras)){
  		unset($_SESSION['carrito']);
  		echo "<script>
			alert('Pago finalizado!! Gracias por tu compra');
			location.href = 'index.php';
		</script>";
  	}
  	else{
  		echo "<script>
			alert('Ocurrio un error al realizar el pago');
			location.href = 'index.php';
		</script>";
  	}
?>