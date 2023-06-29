<?php 
    include('php/conectar.php');
    session_start();

    $sesion = false;
    
    if(isset($_GET['sesion'])){
        $sesion = false;
        $_SESSION['email'] = "";
    }

    else{  
        if(isset($_SESSION['email'])){
            if($_SESSION['email'] != ""){
                $sesion = true;
                $identificador = $_SESSION['email'];
                $buscarUsuario = $conexion->query("SELECT * FROM usuarios WHERE email='$identificador'");
                $row = $buscarUsuario->fetch_array();
                $user = $row['username'];
                $tipo = $row['tipo'];
            }
        }
    }
    /*echo "<script>
            alert('Hola: ".$identificador."');
        </script>";*/
?>

<!DOCTYPE html>
<html lang="es">
    <head>
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="Description" content="Enter your description here"/>
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/css/bootstrap.min.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
        <link rel="stylesheet" href="assets/css/style.css">
        <!-- Required meta tags -->
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">

        <!-- Bootstrap CSS -->
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.4.1/css/bootstrap.min.css" integrity="sha384-Vkoo8x4CGsO3+Hhxv8T/Q5PaXtkKtu6ug5TOeNV6gBiFeWPGFN9MuhOf23Q9Ifjh" crossorigin="anonymous">
        <!-- Ionicons CSS -->
        <link href="https://unpkg.com/ionicons@4.5.10-0/dist/css/ionicons.min.css" rel="stylesheet">
        <!-- App CSS -->
        <link href="css/app.css" rel="stylesheet">

        <link rel="icon" href="img/favicon.ico" type="image/x-icon">
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1">
        <link rel="stylesheet" type="text/css" href="css/slider.css">
        <link rel="stylesheet" type="text/css" href="css/style.css">

        <link href="https://fonts.googleapis.com/css?family=Montserrat:300,400,600|Open+Sans" rel="stylesheet"> 
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.5.0/css/all.css">

        <!-- Font Awesome -->
        <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.2/css/all.css">

        <title>Hot Taco Sk8</title>
    </head>
    <body>
        <div class="general">
            <?php 
                if(isset($_SESSION['carrito'])){
                    $carrito_mio=$_SESSION['carrito'];
                    $_SESSION['carrito']=$carrito_mio;
                }

                // contamos nuestro carrito
                if(isset($_SESSION['carrito'])){
                    for($i=0;$i<=count($carrito_mio)-1;$i ++){
                    if($carrito_mio[$i]!=NULL){ 
                    if(isset($_GET['cantidad'])){
                        $total_cantidad = $carrito_mio['cantidad'];
                        $total_cantidad ++ ;
                        $totalcantidad += $total_cantidad;
                    }
                }}}
            ?>
            <!-- NAVBAR -->
            <header>
                <nav>
                    <div class="decoracion_navegador">
                        <div class="posicion-logo">
                            <a href="index.php">
                                <img src="img/Logo.png" class="posicion-logo">
                            </a>
                        </div>
                    </div>
                    <div class="caja_menu" id="div-menu">
                        <ul id="ul-menu">
                            <li><a href="index.php">Inicio</a></li>
                            <li><a href="informacion.php">Informacion</a></li>
                            <?php if($sesion == true){
                                if($tipo == 1){?>
                                    <li><a href="php/admin.php?user=<?php echo $user; ?>">Admin</a><?php
                                }
                            }?>
                        </ul>
                    </div>
                    <div class="opc_usuario">
                        <?php if($sesion == true){ ?>
                            <div class="username">
                                <p><?php echo $user; ?></p>
                            </div>
                            <div class="close">
                                <p><a href="index.php?sesion=false">Cerrar sesion</a></p>
                            </div>
                        <?php
                        } else{ ?>
                            <div class="username"></div>
                            <div class="close">
                                <p><a href="ingresar.html">Iniciar sesion</a></p>
                            </div>
                        <?php
                        } ?>
                        <div class="carrito_compras">
                            <a data-bs-toggle="modal" data-bs-target="#modal_cart" style="color: red;"><i class="fas fa-shopping-cart"></i> <?php if(isset($total_cantidad)){echo $totalcantidad;} ?></a>
                        </div>
                    </div>
                </nav>
            </header>
            <!-- END NAVBAR -->
            <!-- MODAL CARRITO -->
            <div class="modal fade" id="modal_cart" tabindex="-1"  aria-hidden="true">
              <div class="modal-dialog">
                <div class="modal-content">
                  <div class="modal-header">
                    <h5 class="modal-title" id="exampleModalLabel">Carrito</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                        <div class="modal-body">
                            <div>
                                <div class="p-2">
                                    <ul class="list-group mb-3">
                                        <?php
                                        if(isset($_SESSION['carrito'])){
                                        $total=0;
                                        for($i=0;$i<=count($carrito_mio)-1;$i ++){
                                        if($carrito_mio[$i]!=NULL){?>
                                        <li class="list-group-item d-flex justify-content-between lh-condensed">
                                            <div class="row col-12" >
                                                <div class="col-6 p-0" style="text-align: left; color: #000000;"><h6 class="my-0">Cantidad: <?php echo $carrito_mio[$i]['cantidad'] ?> : <?php echo $carrito_mio[$i]['titulo']; ?> <?php echo $carrito_mio[$i]['marca']; ?></h6>
                                                </div>
                                                <div class="col-6 p-0"  style="text-align: right; color: #000000;" >
                                                <span   style="text-align: right; color: #000000;">$<?php echo $carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad'];    ?></span>
                                                </div>
                                            </div>
                                        </li>
                                        <?php
                                        $total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
                                        }
                                        }
                                        }
                                        ?>
                                        <li class="list-group-item d-flex justify-content-between">
                                        <span  style="text-align: left; color: #000000;">Total (MXN) + iva</span>
                                        <strong  style="text-align: left; color: #000000;">$<?php
                                        if(isset($_SESSION['carrito'])){
                                        $total=0;
                                        for($i=0;$i<=count($carrito_mio)-1;$i ++){
                                        if($carrito_mio[$i]!=NULL){ 
                                        $total=$total + ($carrito_mio[$i]['precio'] * $carrito_mio[$i]['cantidad']);
                                        }}}
                                        if(isset($total)){ $iva = $total * 0.16; echo $total += $iva;} else{echo "0";}?></strong>
                                        </li>
                                    </ul>
                                </div>
                            </div>
                        </div>
                  </div>
                  <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cerrar</button>
                    <a type="button" class="btn btn-primary" href="borrarcarro.php">Vaciar carrito</a>
                    <?php if($sesion == true){ ?>
                        <a type="button" class="btn btn-success" href="pagar.php?total=<?php echo $total; ?>">Pagar</a>
                    <?php } else{ ?>
                        <a type="button" class="btn btn-success" href="ingresar.html">Login</a>
                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
            <!-- END MODAL CARRITO -->
            <div class="slider" id="animado-top">
                <ul>
                    <li><img src="img/frame1.jpg"></li>
                    <li><img src="img/frame2.jpg"></li>
                    <li><img src="img/frame3.jpg"></li>
                    <li><img src="img/frame4.jpg"></li>
                </ul>
            </div>
            <!-- ARTICULOS -->
            <div class="container mt-5">
                <div class="row" style="justify-content: center;">
                    <div class="articulos">
                        <div class="container pt-5">
                            <div class="row">
                                <?php
                                $sql_i = "SELECT * FROM inventario";
                                $result = $conexion->query($sql_i);

                                while ($mostrar = $result->fetch_assoc()) {
                                ?>
                                <div class="col-sm-3">
                                    <div class="card">
                                        <div class="card-body">
                                            <form id="formulario" name="formulario" method="post" action="cart.php">
                                                <input name="precio" type="hidden" id="precio" value="<?php echo $mostrar['precio']; ?>" />
                                                <input name="titulo" type="hidden" id="titulo" value="<?php echo $mostrar['nombre']; ?>" />
                                                <input name="marca" type="hidden" id="marca" value="<?php echo $mostrar['marca']; ?>"/>
                                                <input name="cantidad" type="hidden" id="cantidad" value="1" class="pl-2" />
                                                <img class="card-img-top" height="200px" src="data:image/jpg;base64,<?php echo base64_encode($mostrar['imagen']); ?>">
                                                <div class="card-body">
                                                        <h5 class="card-title"><?php echo $mostrar['nombre']; ?> Marca: <?php echo $mostrar['marca']; ?></h5>
                                                        <p class="card-text">$<?php echo $mostrar['precio']; ?></p>
                                                        <button class="btn btn-primary" type="submit" ><i class="fas fa-shopping-cart"></i> Añadir al carrito</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                </div>
                                <?php
                                }
                            ?>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <footer>
                <div id="mapa">
                    <div class="titulo-mapa">
                        <h2>Encuentranos en:</h2>
                    </div>
                    <div class="mapa">
                        <iframe src="https://www.google.com/maps/embed?pb=!1m14!1m8!1m3!1d14932.932382257943!2d-103.3139178!3d20.6600937!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x0%3A0x925c57b35e4f78b4!2sThe%20Knife%20Skate%20Shop!5e0!3m2!1ses-419!2smx!4v1663038656387!5m2!1ses-419!2smx" width="500" height="300" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>
                    </div>
                </div>
                <div id="info">
                    <p><h2>Numero de telefono:</h2> 33 3947 2308</p>
                    <p><h2>Correo electronico:</h2> davidarturoloera@gmail.com</p>
                    <p><h2>Ubicacion:</h2> Calle Gral Carlos Fuero 267B, San Antonio, 44800 Guadalajara, Jal.</p>
                </div>
            </footer>
            <!-- END ARTICULOS -->
        </div>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/2.9.2/umd/popper.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/twitter-bootstrap/5.0.1/js/bootstrap.min.js"></script>
    </body>
</html>