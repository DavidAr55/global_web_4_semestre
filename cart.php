<?php session_start(); 
//aqui empieza el carrito

	if(isset($_SESSION['carrito'])){
		$carrito_mio=$_SESSION['carrito'];
		if(isset($_POST['titulo'])){
			$titulo=$_POST['titulo'];
			$marca=$_POST['marca'];
			$precio=$_POST['precio'];
			$cantidad=$_POST['cantidad'];
			$num=0;
     		$carrito_mio[]=array("titulo"=>$titulo,"marca"=>$marca,"precio"=>$precio,"cantidad"=>$cantidad);
 		}
	}else{
		$titulo=$_POST['titulo'];
		$marca=$_POST['marca'];
		$precio=$_POST['precio'];
		$cantidad=$_POST['cantidad'];
		$carrito_mio[]=array("titulo"=>$titulo,"marca"=>$marca,"precio"=>$precio,"cantidad"=>$cantidad);	
	}
	

$_SESSION['carrito']=$carrito_mio;

//aqui termina el carrito


header("Location: ".$_SERVER['HTTP_REFERER']."");
?>



