<?php
  session_start();
  // Varios destinatarios
  $para  = 'davidarturoloera@gmail.com';

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
  </html>
  ';

  // Para enviar un correo HTML, debe establecerse la cabecera Content-type
  $cabeceras  = 'MIME-Version: 1.0' . "\r\n";
  $cabeceras .= 'From: Papercut@user.com' . "\r\n";
  $cabeceras .= 'Content-type: text/html; charset=iso-8859-1' . "\r\n";

  // Enviarlo
  $enviado = false;

  if(mail($para, $titulo, $mensaje, $cabeceras)){
    $enviado = true;
  }
?>