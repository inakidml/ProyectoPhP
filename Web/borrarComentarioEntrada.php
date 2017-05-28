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
</head>
<!-- NAVBAR
================================================== -->
<body>
<?php
ini_set('session.save_path',realpath(dirname($_SERVER['DOCUMENT_ROOT']) . '/../session'));
session_name('login');
if(@session_start() == false){session_destroy();session_start();}
if (isset($_SESSION['loggedin']) && $_SESSION['loggedin'] == true) {

    $login = true;

    $now = time();
    if($now > $_SESSION['expire']) {
        session_destroy();
        $login = false;
    }


} else {
    $login = false;
}

?>



<?php

if (isset($_GET['borrarComentario'])) {
    $idComentarioBorrar = $_GET['borrarComentario'];


// date_default_timezone... es obligatorio si usais PHP 5.3 o superior
    date_default_timezone_set('Europe/Madrid');
    $fecha_actual = date("Y-m-d H:i:s");

// Abrir la conexión
    $conexion = mysqli_connect("localhost", "root", "root", "blog");


// Formar la consulta (seleccionando todas las filas)
    $q = "delete from comentario WHERE id= '$idComentarioBorrar'";

// Ejecutar la consulta en la conexión abierta y obtener el "resultset" o abortar y mostrar el error
    $r = mysqli_query($conexion, $q) or die (mysqli_error($conexion));

}

if (isset($_GET['idEntrada'])) {
    $idEntrada = $_GET['idEntrada'];


// date_default_timezone... es obligatorio si usais PHP 5.3 o superior
    date_default_timezone_set('Europe/Madrid');
    $fecha_actual = date("Y-m-d H:i:s");

// Abrir la conexión
    $conexion = mysqli_connect("localhost", "root", "root", "blog");


// Formar la consulta (seleccionando todas las filas)
    $q = "select * from entrada WHERE id= '$idEntrada'";

// Ejecutar la consulta en la conexión abierta y obtener el "resultset" o abortar y mostrar el error
    $r = mysqli_query($conexion, $q) or die (mysqli_error($conexion));

// Calcular el número de filas
    $total = mysqli_num_rows($r);

    $qComen = "SELECT * from comentario WHERE entrada_id='$idEntrada'";
    $rComen = mysqli_query($conexion, $qComen) or die (mysqli_error($conexion));
    $totalComen = mysqli_num_rows($rComen);
}
//seguimos mas abajo
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
                                <li><a href="blog.php">Ver Blog</a></li><!--Marcado como activo -->
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Administrador</li>
                                <li class="active"><a href="entradas.php">Gestión blog</a></li>
                            </ul>
                        </li>
                        <li class="dropdown">
                            <a class="active" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">Usuarios<span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li<?php if($login){echo' hidden';}?>><a href="login.php">Login</a></li>
                                <li<?php if(!$login){echo' hidden';}?>><a href="login.php">Logout</a></li>
                            </ul>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </div>
</div>

<!-- FEATURETTES -->

<hr class="featurette-divider" class="divider-oculto">
<?php
// Mostrar el contenido de las filas, creando una tabla XHTML
if ($total > 0 && $login) {
    while ($fila = mysqli_fetch_assoc($r)) {
        if ($fila['activo'] == 1) {
            echo '
    <div class="container">
    <a name="entrada blog"></a>
        <div class="hero-unit">
            <div class="col-md-12">
            <h1><a href="entradaComentarios.php?idEntrada=' . $fila['id'] . '">' . $fila['titulo'] . ' </a></h1>
            <span class="text-muted" class="fecha">' . $fila['fecha'] . '</span>       
            <p>' . $fila['texto'] . '</p>
            </div>
        </div>';
            echo '<hr class="divider">';//divisor de la entrada
            if ($totalComen > 0) {
                echo '
                <div class="col-md-12 text-center">
                <hr class="divider"> 
                    <h2 class="texto-naranja"> COMENTARIOS</h2>
                
            <div class="col-md-12">';
                while ($filaComen = mysqli_fetch_assoc($rComen)) {

                    echo ' 
                            <div class="container">
                            <div class="col-md-12 text-center">
                                    <hr class="divider">   
                    
                            </div>
                            </div>
                                      
                            <h2>' . $filaComen['email'] . ' </h2>
                            <span class="text-muted" class="fecha">' . $filaComen['fecha'] . '</span>       
                            <p>' . $filaComen['texto'] . '</p>
            
                <div class="col-md-12 text-center">
                    <p><a class="btn btn-lg btn-primary" href="borrarComentarioEntrada.php?borrarComentario=' . $filaComen['id'] . '&idEntrada='.$idEntrada.'" role="button">Borrar comentario</a></p>
                </div>
            
                        ';
                }
                echo'<div class="container">
                     <div class="col-md-12 text-center">
                          <hr class="divider">   
                    
                     </div>
                     </div>
                            
                        </div>
                </div>
    </div>';
            }

            echo '<hr class="featurette-divider">';


        }
    }
}else{
    echo'
<div class="row featurette">
    <div class="col-md-12">
        <div class="container">
            <h2 class="featurette-heading">Necesario <span class="text-muted">Login</span>
            </h2>
            <hr class="featurette-divider">
        </div>
        <div class="container">
                <div class="col-md-12 text-center">
                    <p><a class="btn btn-lg btn-primary" href="login.php" role="button">Login</a></p>
                    <hr class="featurette-divider">
                </div>
        </div>        
    </div>
</div>

';



}
// Cerrar la conexión
mysqli_close($conexion);
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

