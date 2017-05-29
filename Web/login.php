<!DOCTYPE html>
<html lang="en">
<head>

    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
    <meta name="description" content="Proyecto de CSS para la asignatura Lenguaje de marcas">
    <meta name="author" content="Iñaki">
    <link rel="icon" href="imagenes/favicon.png">
    <!-- Estilo para botón github -->
    <link href="https://file.myfontastic.com/XeWxYhMRSjTbPWcVGS8SMT/icons.css" rel="stylesheet">

    <title>Proyecto CSS usando Bootstrap</title>

    <!-- Bootstrap core CSS -->
    <link href="dist/css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="carousel.css" rel="stylesheet">
    <link href="miEstilo.css" rel="stylesheet">
    <link href="miEstiloParrafos.css" rel="stylesheet">
</head>

<body>

<!--Sesión-->
<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) .'/../session'));
session_name('login');
if(@session_start() == false){session_destroy();session_start();}
$login=false;

if(isset($_GET['logout'])){
    unset ($SESSION['username']);
    session_destroy();
    $_SESSION['loggedin'] = false;
    header('Location: http://192.168.33.10/ProyectoPHP/Web/login.php');
}

if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {
    $login=true;
    $now = time();
    if($now > $_SESSION['expire']) {
        session_destroy();
    }
}



?>

<?php
if(isset($_POST['user']) && isset($_POST['pass'])){
$host_db = "localhost";
$user_db = "root";
$pass_db = "root";
$db_name = "blog";
$tbl_name = "users";
$conexion = mysqli_connect($host_db, $user_db, $pass_db, $db_name);
if ($conexion->connect_error) {
    die("La conexion falló: " . $conexion->connect_error);
}
$user = $_POST['user'];
$pass = $_POST['pass'];
$sql = "SELECT * FROM $tbl_name WHERE user = '$user'";
$result = mysqli_query($conexion, $sql);
if (mysqli_num_rows($result) > 0) {

    $row = mysqli_fetch_assoc($result);

    if (password_verify($pass, $row['pass'])) {

        $_SESSION['loggedin'] = true;
        $_SESSION['user'] = $user;
        $_SESSION['start'] = time();
        $_SESSION['expire'] = $_SESSION['start'] + (5 * 60);
        $login = true;

    } else {
        echo "Password incorrecto.";
    }
} else {
    echo "Usuario incorrecto.";
}
mysqli_close($conexion);
}
?>

<!-- Barra de navegación -->
<div class="navbar-wrapper">
    <div class="container">
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-target="#navbar"
                            aria-expanded="false" aria-controls="navbar">
                        <span class="sr-only">Toggle navigation</span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                        <span class="icon-bar"></span>
                    </button>
                    <a class="navbar-brand" href="#sobre-mi">Marca personal Iñaki</a>
                </div>
                <div id="navbar" class="navbar-collapse collapse">
                    <ul class="nav navbar-nav">
                        <li><a href="index.php">Home</a></li>
                        <li><a href="#about">Acerca de</a></li>
                        <li><a href="https://github.com/inakidml/ProyectoPhP">GitHub</a></li>
                        <li class="dropdown">
                            <a class="active" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">Blog <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li ><a href="blog.php">Ver Blog</a></li><!--Marcado como activo -->
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Administrador</li>
                                <li><a href="entradas.php">Gestión blog</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="active" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">Usuarios<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li<?php if($login){echo' hidden';}?> class="active"><a href="login.php">Login</a></li>
                                <li<?php if(!$login){echo' hidden';}?> class="active"><a href="login.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>

<?php
if(!$login){

echo'
<!-- FEATURETTES -->

<hr class="featurette-divider" class="divider-oculto">

<a name="form entrada"></a>
<div class="row featurette">
    <div class="col-md-12">
        <div class="container">
            <h2 class="featurette-heading">User <span class="text-muted">Login</span>
            </h2>
            <form action="login.php" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="user" class="control-label col-sm-2">Usuario:</label>
                    <div class="col-sm-10">
                        <input type="text" id="user" name="user" class="form-control" class="form-horizontal"
                               value=""/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="pass" class="control-label col-sm-2">Contraseña:</label>
                    <div class="col-sm-10">
                        <input type="password" id="pass" name="pass" class="form-control" class="form-horizontal"
                               value=""/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                        <input type="submit" id="login" name="login" value="Login" class="btn btn-default" class="form-inline"/>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<hr class="featurette-divider">
';
}else{echo'
    <a name="form entrada"></a>
<div class="row featurette">
    <div class="col-md-12">
        <div class="container">
            <h2 class="featurette-heading">Usuario <span class="text-muted">Logeado</span>
            </h2>
            <hr class="featurette-divider">
        </div>
        <div class="container">
                <div class="col-md-12 text-center">
                    <p><a class="btn btn-lg btn-primary" href="login.php?logout=1" role="button">Logout</a></p>
                    <hr class="featurette-divider">
                </div>
        </div>        
    </div>
</div>

';

}
?>


<!-- /Fin de las FEATURETTES -->

<!-- logo github -->
<div class="row featurette">
    <div class="col-md-4"></div>
    <div class="col-md-4 text-center" class="github">
        <p><a class="icon-social-github" href="https://github.com/inakidml/ProyectoPhP" role="button"></a></p>
    </div>
    <div class="col-md-4"></div>
</div>

<!-- FOOTER -->
<footer>
    <p class="pull-right"><a href="#">Back to top</a></p>
    <p>&copy; 2017 Iñaki &middot; <a href="#">Terms</a></p>
</footer>

</div><!-- /.fin del container marketing-->


<!-- Bootstrap core JavaScript
================================================== -->
<!-- Placed at the end of the document so the pages load faster -->
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.12.4/jquery.min.js"></script>
<script>window.jQuery || document.write('<script src="assets/js/vendor/jquery.min.js"><\/script>')</script>
<script src="dist/js/bootstrap.min.js"></script>
<!-- Just to make our placeholder images work. Don't actually copy the next line! -->
<script src="assets/js/vendor/holder.min.js"></script>

</body>
</html>
