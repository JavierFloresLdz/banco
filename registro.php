<?php

session_start();


if (isset($_POST['registrar'])) {
    # code...

    $cuenta = $_POST['cuenta'];
    $_SESSION['cuenta'] = $cuenta;

    $nombre = $_POST['nombre'];
    $_SESSION['nombre'] = $nombre;

    $tipo = $_POST['tipo'];
    $_SESSION['tipo'] = $tipo;

    $password = $_POST['password'];
    $_SESSION['password'] = $password;


    if (empty($password2)) {

        # code...
        require_once 'conexion.php';

        $sql = $cnnPDO->prepare("INSERT INTO users
            (cuenta, nombre, tipo, password, saldo) VALUES (:cuenta, :nombre, :tipo, :password, 0)");

        //Asignar las variables a los campos de la tabla
        $sql->bindParam(':cuenta', $cuenta);
        $sql->bindParam(':nombre', $nombre);
        $sql->bindParam(':tipo', $tipo);
        $sql->bindParam(':password', $password);

        //Ejecutar la variable $sql
        $sql->execute();
        unset($sql);
        unset($cnnPDO);

        header("Location:registro.php");
        //header("Refresh: 3; URL=login.php");
    } else {
        # code...
        require_once 'conexion.php';

        $sql = $cnnPDO->prepare("INSERT INTO users
            (cuenta, nombre, tipo, password,saldo) VALUES (:cuenta, :nombre, :tipo, :password,:00, :estatus)");

        //Asignar las variables a los campos de la tabla
        $sql->bindParam(':cuenta', $cuenta);
        $sql->bindParam(':nombre', $nombre);
        $sql->bindParam(':tipo', $tipo);
        $sql->bindParam(':password', $password);

        //Ejecutar la variable $sql
        $sql->execute();
        unset($sql);
        unset($cnnPDO);

        header("Location:registro.php");
        //header("Refresh: 3; URL=index.html");
    }
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

    <link rel="stylesheet" href="assets/css/styleregistro1.css">


    <!-- JQuery Validate library -->
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"> </script>

    <!-- Libreria de sweetalert 2-->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@10"></script>


</head>

<body>
    <!-- ***** Header Area Start ***** -->
    <header class="header-area header-sticky">
        <div class="container">
            <div class="row">
                <div class="col-12">
                    <nav class="main-nav">
                        <!-- ***** Logo Start ***** -->
                        <a href="index.html" class="logo">
                            <img style="top: 43px; width: 15%; height:auto; position:fixed;" src="assets/images/banamexlogo5.png" alt="Softy Pinko" />
                        </a>
                        <!-- ***** Logo End ***** -->
                        <!-- ***** Menu Start ***** -->
                        <ul class="nav">
                            <li><a href="">¿Ya estás registrado?</a></li>
                            <li><a href=""></a></li>
                            <li><a href="login.php">Inicia Sesión</a></li>
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

    <!-- ***** Welcome Area Start ***** -->
    <div class="welcome-area" id="welcome">

        <!-- ***** Contact Us Start ***** -->
        <section id="contact-us">
            <div class="container">
                <!-- ***** Section Title Start ***** -->
                <div class="row">
                    <div class="col-lg-12">
                        <div class="center-heading">
                            <br>
                            <br>
                            <h2 style="margin-right: 10%;" class="section-title">¡Bienvenido a <strong>Banca</strong>net!</h2>
                        </div>
                    </div>
                    <div class="offset-lg-3 col-lg-6">
                        <div class="center-text">
                            <p style="margin-right: 15%">Registrarte te tomará 5 minutos</p>
                        </div>
                    </div>
                </div>
                <!-- ***** Section Title End ***** -->

                <div class="row">
                    <!-- ***** Contact Text Start ***** -->
                    <!-- ***** Contact Text End ***** -->

                    <!-- ***** Contact Form Start ***** -->
                    <div class="col-lg-8 col-md-6 col-sm-12">
                        <div class="contact-form">
                            <table>
                                <form id="contact" action="" method="post">
                                    <div class="row">
                                        <tr>
                                            <td>
                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <fieldset>
                                                        <input name="cuenta" type="text" class="form-control" id="cuenta" placeholder="Número de cuenta" required="">
                                                    </fieldset>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <fieldset>
                                                        <input name="nombre" type="text" class="form-control" id="nombre" placeholder="Nombre completo" required="">
                                                    </fieldset>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <fieldset>
                                                        <select id="tipo" name="tipo" class="input">
                                                            <option value="" disabled selected>Tipo de Cuenta</option>
                                                            <option value="Débito">Débito</option>
                                                            <option value="Ahorro">Ahorro</option>
                                                            <option value="Crédito">Crédito</option>
                                                        </select>
                                                    </fieldset>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <fieldset>
                                                        <input name="password" type="password" class="form-control" id="password" placeholder="Contraseña" required="">
                                                    </fieldset>
                                                </div>
                                            </td>
                                        </tr>
                                        <tr>
                                            <td>
                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <fieldset>
                                                        <input name="password2" type="password" class="form-control" id="password2" placeholder="Confirmar contraseña" required="">
                                                    </fieldset>
                                                </div>
                                            </td>
                                        </tr>

                                    </div>
                                    <tr>
                                        <td>
                                            <div class="col-lg-12">
                                                <fieldset>
                                                    <button name="registrar" style="background-image: linear-gradient(127deg, #5bc6e7 10%, #3e52d3 91%);" type="submit" id="registrar" class="main-button">Registrarme</button>
                                                </fieldset>
                                            </div>
                                        </td>
                                    </tr>
                        </div>
                        </form>
                        </table>
                    </div>
                </div>
                <!-- ***** Contact Form End ***** -->
            </div>
    </div>
    </section>
    <!-- ***** Contact Us End ***** -->














    </div>
    <!-- ***** Welcome Area End ***** -->



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


    <!-- alertas -->
    <script type="text/javascript">
        $(document).ready(function() {
            let emailreg = /^[a-zA-Z0-9_\.\-]+@[a-zA-Z0-9\-]+\.[a-zA-Z0-9\-\.]+$/;

            $("#registrar").click(function() {
                if ($("#cuenta").val() == "") {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2500,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: 'error',
                        title: 'Por favor, ingresa tu número de cuenta'
                    })
                    return false;
                } else if ($("#nombre").val() == "") {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2500,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: 'error',
                        title: 'Por favor, ingresa tu nombre completo'
                    })
                    return false;
                } else if ($("#tipo option:selected").val() == "") {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2500,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: 'error',
                        title: 'Selecciona tu tipo de cuenta'
                    })
                    return false;
                } else if ($("#password").val() == "") {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2500,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: 'error',
                        title: 'El campo Contraseña esta vacío, por favor ingresa una contraseña'
                    })
                    return false;
                } else if ($("#password2").val() == "") {
                    const Toast = Swal.mixin({
                        toast: true,
                        position: 'top-end',
                        showConfirmButton: false,
                        timer: 2500,
                        timerProgressBar: true,
                        didOpen: (toast) => {
                            toast.addEventListener('mouseenter', Swal.stopTimer)
                            toast.addEventListener('mouseleave', Swal.resumeTimer)
                        }
                    })
                    Toast.fire({
                        icon: 'error',
                        title: 'Por favor confirma tu Contraseña'
                    })
                    return false;
                }
                with(document) {
                    ok = true;


                    if (ok && password.value != password2.value) {
                        ok = false;

                        alert("Las contraseñas no coinciden, verificalas por favor");
                        password2.focus();

                        return false;


                        if (ok) {
                            submit();
                        }
                    }
                }
            });
        });
    </script>
    <!-- fin alertas -->

</body>

</html>