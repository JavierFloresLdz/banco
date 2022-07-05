<?php
session_start();

if (isset($_POST['logout'])) {
    # code...

    session_destroy();

    header("Location:index.html");
}
?>

<?php
require_once 'conexion.php';
?>


<?php
require_once 'conexion.php';

//Valida que el usuario hizo clik en el Boton 
if (isset($_POST['activar'])) {
    //Trae datos del formulario

    $estatus = $_POST['estatus'];

    $cuenta = $_POST['cuenta'];
    $_SESSION['cuenta'] = $cuenta;

    if (empty($cuenta)) {
        # code...
        echo '<div class="card text-white bg-danger mb-3" style="max-width: 18rem height:10%;">';
        echo '<div class="card-header" style="text-align=center;">Upss!</div>';
        echo '<div class="card-body">';
        echo '<h5 class="card-title">Datos incorrectos</h5>';
        echo '<p class="card-text">Por favor, verifica tus datos.</p>';
        echo '</div>';
        echo '</div>';
    } else {
        //Actualizamos los datos en la tabla de la db  
        $sql = $cnnPDO->prepare('UPDATE users SET estatus = :estatus WHERE cuenta = :cuenta');

        //Asignar las variables a los campos de la tabla
        $sql->bindParam(':estatus', $estatus);
        $sql->bindParam(':cuenta', $cuenta);

        //Ejecutar la variable $sql
        $sql->execute();
        unset($sql);
        unset($cnnPDO);
    }
    header("location:vista-admin.php");
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

    <link rel="stylesheet" href="assets/css/stylelinicioadmin.css">

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

                            <li><a href=""></a></li>
                            <li><a href=""></a></li>
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



    <!-- ***** Home Parallax Start ***** -->
    <section class="mini" id="work-process">
        <div class="mini-content">
            <div class="container">
                <div class="row">
                    <div class="col-sm-4">
                        <div class="info">
                            <h1>Clientes Activos</h1>
                        </div>
                    </div>
                </div>

                <?php
                require_once 'conexion3.php';
                $conexion = new conexion();
                $sql = "SELECT * FROM users WHERE cuenta != '@dmin'";
                $stmt = $conexion->prepare($sql);
                $stmt->execute();
                $id = 1;
                while ($campo = $stmt->fetch(PDO::FETCH_ASSOC)) {
                ?>
                    <div style="width: 20%; float: left; margin-right: 20px; position: absoluted;" class='card h-100'>
                        <div class="card-body">
                            <form method="post" action="">
                                <center>
                                    <table>
                                        <tr>
                                            <td>
                                                <div class="small text-black">Número de cuenta:
                                            </td>
                                            <td><b><?php echo $campo['cuenta']; ?></b>
                        </div>
                        </td>
                        </tr>
                        <tr>
                            <td>
                                <div class="small text-black">Nombre del cliente:
                            </td>
                            <td><b><?php echo $campo['nombre']; ?></b>
                    </div>
                    </td>
                    </tr>
                    <tr>
                        <td>
                            <div class="small text-black">Tipo de cuenta:
                        </td>
                        <td><b><?php echo $campo['tipo']; ?></b>
            </div>
            </td>
            </tr>
            <tr>
                <td>
                    <div class="small text-black">Saldo Actual:
                </td>
                <td><b>$<?php echo $campo['saldo']; ?>.00</b>
        </div>
        </td>
        </tr>
        <tr>
            <td>
                <div class="small text-black">Estado de la cuenta:
            </td>
            <td><b><?php echo $campo['estatus']; ?></b>
                </div>
            </td>
        </tr>
        </table>
        <form action="" method="POST">
            <input type="hidden" name="cuenta" id="cuenta" value="<?php echo $campo['cuenta']; ?>">
            <input type="hidden" name="estatus" id="estatus" value="Activo">
            <center>
                <input type="submit" style="width: 80%;" name="activar" id="activar" value="Activar cuenta">
            </center>
        </form>
        </div>
        </div>
        <br>
    <?php $id++;
                }
    ?>


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