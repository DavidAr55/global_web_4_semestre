<?php
    include "conectar.php";

    $codigo =$_POST['codigo'];
    $res = $conexion->query("select * from usuarios 
        where  codigo='$codigo'")or die($conexion->error);
    if( mysqli_num_rows($res) > 0 ){
        $conexion->query("UPDATE usuarios SET verificacion = '1' where codigo = '$codigo' ");
        echo 'TODO CORRECTO  ya puedes <a href="../Ingresar.html">Iniciar sesion </a>';
    }else{
        echo "codigo invalido";
        echo '<a href="enviar_codigo.php">Ingresar codigo de nuevo.</a>';
    }
?>