<?php

session_start();

require_once 'conexion.php';

if (isset($_POST['entrar'])) {

    $cuenta = $_POST['cuenta'];
    $_SESSION['cuenta'] = $cuenta;

    $password = $_POST['password'];
    $_SESSION['password'] = $password;

    $estatus = $_POST['estatus'];
    $_SESSION['estatus'] = $estatus;

    if (empty($password)) {
        # code...
        echo '<div class="card text-white bg-danger mb-3" style="max-width: 18rem height:10%;">';
        echo '<div class="card-header" style="text-align=center;">Upss!</div>';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">Datos incorrectos</h5>';
        echo '<p class="card-text">Por favor, verifica tus datos.</p>';
        echo '</div>';
        echo '</div>';
    }
    if (empty($estatus == 'Activo')) {
        echo '<div class="card text-white bg-danger mb-3" style="max-width: 18rem height:10%;">';
        echo '<div class="card-header" style="text-align=center;">¡Lo sentimos!</div>';
        echo '<div class="card-body">';
        echo '<br>';
        echo '<h5 class="card-title">Tu cuenta esta desactivada</h5>';
        echo '<p class="card-text">Ponte en contacto con el administrador</p>';
        echo '</div>';
        echo '</div>';
    } else {
        # code...
        $sql = $cnnPDO->prepare('SELECT * from users WHERE cuenta=:cuenta AND 	
    password=:password');

        $sql->bindParam(':cuenta', $cuenta);
        $sql->bindParam(':password', $password);

        $sql->execute();

        $count = $sql->rowCount();

        if ($count) {
            $_SESSION['nombre'] = $nombre;
            header("Location:inicio.php");
        } else {
            header("Location:index.html");
        }
    }

    if (isset($cuenta)) {

        if ($cuenta == '@dmin') {

            $sql = $cnnPDO->prepare('SELECT * from users WHERE cuenta=:cuenta AND password=:password');

            $sql->bindParam(':cuenta', $cuenta);
            $sql->bindParam(':password', $password);


            $sql->execute();

            $count = $sql->rowCount();

            if ($count) {
                $_SESSION['nombre'] = $nombre;
                header("Location:vista-admin.php");
            } else {
                header("Location:index.html");
            }
        }
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

    <title>BancaNet | Citibanamex.com</title>

    <!--
Favicon
-->
    <link rel="icon" href="assets/images/banamexlogo.png" type="image/png" />

    <!-- Additional CSS Files -->
    <link rel="stylesheet" type="text/css" href="assets/css/bootstrap.min.css">

    <link rel="stylesheet" type="text/css" href="assets/css/font-awesome.css">

    <link rel="stylesheet" href="assets/css/stylelogin.css">

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

                            <li><a style="color: white;" href="">BancaNet</a></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li></li>
                            <li><a style="color: white;" href="registro.php">Registrate</a></li>
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


    <!-- ***** Home Parallax Start ***** -->
    <section class="mini" id="work-process">
        <div class="mini-content">
            <div class="container">


                <!-- ***** Mini Box Start ***** -->
                <div class="row">
                    <!-- ***** Pricing Item Start ***** -->
                    <div style="margin-top: 3%;" class="col-lg-4 col-md-6 col-sm-12" data-scroll-reveal="enter bottom move 50px over 0.6s after 0.2s">
                        <div class="pricing-item">
                            <!-- ***** Contact Form Start ***** -->
                            <div class="col-lg-8 col-md-6 col-sm-12">
                                <div class="contact-form">
                                    <i><img style="width: 50%; margin: 10px; margin-left: 45%; " src="assets/images/banamexlogo.png" alt=""></i>
                                    <?php

                                    if (isset($_SESSION['cuenta'])) {

                                        require "conexion2.php";

                                        $sqlA = $mysqli->query("SELECT * FROM users WHERE cuenta = '" . $_SESSION['cuenta'] . "'");
                                        $rowA = $sqlA->fetch_array();
                                    }

                                    ?>
                                    <table>
                                        <form id="contact" action="" method="POST">
                                            <div class="row">
                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <tr>
                                                        <td>
                                                            <fieldset>
                                                                <input name="cuenta" type="text" class="form-control" id="cuenta" placeholder="Número de cuenta" required="">
                                                            </fieldset>
                                                        </td>
                                                    </tr>
                                                </div>
                                                <div class="col-lg-6 col-md-12 col-sm-12">
                                                    <tr>
                                                        <td>
                                                            <fieldset>
                                                                <input name="password" type="password" class="form-control" id="password" placeholder="Contraseña" required="">
                                                            </fieldset>
                                                        </td>
                                                    </tr>
                                                </div>
                                                <input readonly type="hidden" name="estatus" placeholder="estatus" for="estatus" value="<?php echo $rowA['estatus'] ?>"></input>
                                                <div class="col-lg-12">
                                                    <tr>
                                                        <td>
                                                            <fieldset>
                                                                <button style="background-image: linear-gradient(127deg, #5bc6e7 10%, #3e52d3 91%); margin-left: 25%; width: 100%;" type="submit" name="entrar" id="entrar" class="main-button">Iniciar</button>
                                                            </fieldset>
                                                        </td>
                                                    </tr>
                                                </div>
                                            </div>
                                        </form>
                                    </table>
                                </div>
                            </div>
                            <!-- ***** Contact Form End ***** -->
                            <div class="pricing-body">
                                <ul class="list">
                                    <br>
                                    <li class="active">▶ Aprende a usar BancaNet</li>
                                    <li class="active">▶ Centro de Seguridad</li>
                                    <li class="active">▶ Herramienta de seguridad</li>
                                </ul>
                            </div>
                            <div class="pricing-footer">
                                <p>¿Eres nuevo?</p><br>
                                <a style="background-image: linear-gradient(127deg, #5bc6e7 10%, #3e52d3 91%);" href="registro.php" class="main-button">Registrate</a>
                            </div>
                        </div>
                    </div>
                    <!-- ***** Pricing Item End ***** -->
                    <div style="margin-top: 34%;" class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href="#" class="mini-box">
                            <i><img style="width: 30%;" src="assets/images/cajero.png" alt=""></i>
                            <strong>Encuentra cajeros automáticos.</strong>

                        </a>
                    </div>
                    <div style="margin-top: 34%;" class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href="#" class="mini-box">
                            <i><img style="width: 30%;" src="assets/images/telefono.png" alt=""></i>
                            <strong>Atención telefónica al 55 1226 3990</strong>

                        </a>
                    </div>
                    <div style="margin-top: 34%;" class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href="#" class="mini-box">
                            <i><img style="width: 30%;" src="assets/images/celular.png" alt=""></i>
                            <strong>Conoce Citibanamex Móvil</strong>

                        </a>
                    </div>
                    <div style="margin-top: 34%;" class="col-lg-2 col-md-3 col-sm-6 col-6">
                        <a href="#" class="mini-box">
                            <i><img style="width: 30%; margin: 12px;" src="assets/images/archivo.png" alt=""></i>
                            <strong>Consulta de aclaraciones</strong>

                        </a>
                    </div>
                </div>
                <!-- ***** Mini Box End ***** -->
            </div>
        </div>
    </section>
    <!-- ***** Home Parallax End ***** -->

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

</body>

</html>