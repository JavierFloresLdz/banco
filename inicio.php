<?php
session_start();

if (isset($_POST['logout'])) {
    # code...

    session_destroy();

    header("Location:index.html");
}
?>
<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link href="https://fonts.googleapis.com/css?family=Raleway:100,300,400,500,700,900" rel="stylesheet">

    <title>Banco Nacional de México | Citibanamex</title>

    <!--
Favicon
-->
    <link rel="icon" href="assets/images/banamexlogo.png" type="image/png" />

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/stylelinicio.css">

</head>

<body>
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="#" class="logo">
                            <img style="top: 43px; width: 15%; height:auto; position:fixed;" src="assets/images/banamexlogo5.png" alt="Softy Pinko" />
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">

                            <li><a href="">Retiro</a></li>
                            <li><a href="desactivar.php">Desactivar cuenta</a></li>
                            <li>
                                <form method="post"><a type="submit" name="logout" href="index.html">Cerrar sesión</a></form>
                            </li>
                        </ul>
                        <a class='menu-trigger'>
                            <span>Menu</span>
                        </a>
                        <!-- ***** Menu End ***** -->
                    </nav>
                </div>
            </div>
        </div>
    </header>
    <!-- ***** Header Area End ***** -->

    <!-- ***** Pricing Plans Start ***** -->
    <section class="section colored" id="pricing-plans">
        <div class="container">
            <!-- ***** Section Title Start ***** -->
            <div class="row">
                <div class="offset-lg-3 col-lg-6">
                    <div class="center-text">
                        <h4 style="margin-top: 10%; margin-bottom: -10%;">¡Bienvenido!</h4>
                    </div>
                </div>
            </div>
            <!-- ***** Section Title End ***** -->

            <div class="row">
                <!-- ***** Pricing Item Start ***** -->
                <?php

                if (isset($_SESSION['cuenta'])) {

                    require "conexion2.php";

                    $sqlA = $mysqli->query("SELECT * FROM users WHERE cuenta = '" . $_SESSION['cuenta'] . "'");
                    $rowA = $sqlA->fetch_array();
                }

                ?>
                <!-- ***** Pricing Item End ***** -->

                <!-- ***** Pricing Item Start ***** -->
                <div style="margin-left: 35%;" class="col-lg-4 col-md-6 col-sm-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.4s">
                    <div class="pricing-item active">
                        <div class="pricing-header">
                            <h3 style="margin-right: 28%;" class="pricing-title"><strong>Datos</strong> </h3>
                        </div>
                        <div class="pricing-body">
                            <img style="width: 20%; margin-left: 32%;" src="assets/images/datos.png" alt="" class="i1"></a>
                            <br>
                            <br>
                            <table style="margin-right: 0px;">
                                <tr>
                                    <td>
                                        <h4 style="font-size: 20px;"><b>Nombre:</b></h4>
                                    </td>
                                    <td>
                                        <h4 style="font-size: 20px; margin-left: 10px;"><?php echo $rowA['nombre']  ?></h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4 style="font-size: 20px;"><b>No. de Cuenta:</b></h4>
                                    </td>
                                    <td>
                                        <h4 style="font-size: 20px; margin-left: 10px;"><?php echo $_SESSION['cuenta']  ?></h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4 style="font-size: 20px;"><b>Tipo de Cuenta:</b></h4>
                                    </td>
                                    <td>
                                        <h4 style="font-size: 20px; margin-left: 10px;"><?php echo $rowA['tipo']  ?></h4>
                                    </td>
                                </tr>
                                <tr>
                                    <td>
                                        <h4 style="font-size: 20px;"><b>Saldo:</b></h4>
                                    </td>
                                    <td>
                                        <h4 style="font-size: 20px; margin-left: 10px;">$<?php echo $rowA['saldo']  ?>.00</h4>
                                    </td>
                                </tr>
                            </table>
                        </div>
                        <div class="pricing-footer">
                            <a style="margin-right: 15%;" href="desactivar.php" class="main-button">Desactivar cuenta</a>
                        </div>
                    </div>
                </div>
                <!-- ***** Pricing Item End ***** -->

                <!-- ***** Pricing Item Start ***** -->

                <!-- ***** Pricing Item End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Pricing Plans End ***** -->

    <!-- ***** Footer Start ***** -->
    <footer>
        <div class="container">
            <div class="row">
                <div class="col-lg-12 col-md-12 col-sm-12">
                    <ul>
                        <li><a style="color: white;" href="#">El Banco Nacional de México ®</a></li>
                    </ul>
                </div>
            </div>
            <div class="container">
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12">
                        <ul class="social">
                            <li><a href="#"><i class="fa fa-facebook"></i></a></li>
                            <li><a href="#"><i class="fa fa-twitter"></i></a></li>
                            <li><a href="#"><i class="fa fa-linkedin"></i></a></li>
                            <li><a href="#"><i class="fa fa-rss"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="row">
                    <div class="col-lg-12">
                        <p class="copyright">Copyright 2022 &copy; Los productos y ofertas de Citibanamex están dirigidos sólo a residentes de México - Design: Francisco Javier Flores Ledezma</p>
                    </div>
                </div>
            </div>
    </footer>

    <!-- jQuery -->
    <script src="assets/js/jquery-2.1.0.min.js"></script>

    <!-- Bootstrap -->
    <script src="assets/js/popper.js"></script>
    <script src="assets/js/bootstrap.min.js"></script>

    <!-- Plugins -->
    <script src="assets/js/scrollreveal.min.js"></script>
    <script src="assets/js/waypoints.min.js"></script>
    <script src="assets/js/jquery.counterup.min.js"></script>
    <script src="assets/js/imgfix.min.js"></script>

    <!-- Global Init -->
    <script src="assets/js/custom.js"></script>
    <!-- Custom scripts -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery-confirm/3.3.0/jquery-confirm.min.js"></script>
    <script src="https://ajax.googleapis.com/ajax/libs/jquery/2.1.1/jquery.min.js"></script>

    <script type="text/javascript">
        var base_url = '';
        var timeout;
        document.onmousemove = function() {
            clearTimeout(timeout);
            contadorSesion(); //aqui cargamos la funcion de inactividad
        }

        function contadorSesion() {
            timeout = setTimeout(function() {
                Swal.fire({
                    icon: 'warning',
                    title: 'La sesión esta a punto de expirar!',
                    text: 'Tu sesió se va a cerrar.',
                    autoClose: 'expirar|10000', //cuanto tiempo necesitamos para cerrar la sess automaticamente
                    timer: 10000,
                    timerPogressBar: true,
                    showDenyButton: true,
                    showCancelButton: false,
                    confirmButtonText: 'Mantener sesión',
                    denyButtonText: 'Cerrar sesión',
                }).then((result) => {
                    if (result.isConfirmed) {
                        contadorSesion();
                        window.location.href = base_url + "inicio.php";
                    } else if (result.isDenied) {
                        salir();
                    } else if (result.dismiss === Swal.DismissReason.timer) {
                        salir();
                    }
                })
            }, 10000); //3 segundos para no demorar tanto 
        };

        function salir() {
            window.location.href = base_url + "index.html"; //esta función te saca
        }
    </script>
    <script type="text/javascript">
        function cerrarSesion() {
            Swal.fire({
                title: '¿Estas seguro de querer cerrar tu sesión?',
                text: "Tendras que iniciar sesión nuevamente!",
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Cerrar sesión',
                cancelButtonText: 'Cancelar'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location = "logout.php";
                }
            })
        };