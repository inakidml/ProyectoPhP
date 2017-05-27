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
// date_default_timezone... es obligatorio si usais PHP 5.3 o superior
date_default_timezone_set('Europe/Madrid');
$fecha_actual = date("Y-m-d H:i:s");

if (isset($_POST['enviar'])) {

// Recoger los valores
    $titulo = "";
    if (isset($_POST['titulo']))
        $titulo = $_POST['titulo'];

    $texto = "";
    if (isset($_POST['texto']))
        $texto = $_POST['texto'];

    $fecha = $fecha_actual;
    if (isset($_POST['fecha']) && $_POST['fecha'] != "")
        $fecha = $_POST['fecha'];

    $activo = 0;
    if (isset($_POST['activo']))
        $activo = 1;


// Abrir la conexión
    $conexion = mysqli_connect("localhost", "root", "root", "blog");

// Formar la consulta (insertar una fila)

    /*
      Escribir la consulta

        $q = "insert into entrada values( 0, '', '', '', '' )";

      Cortar en los puntos en los que queremos introducir variables con ".."

        $q = "insert into entrada values( 0, '".$titulo."', '".$texto."', '".$fecha."', '".$activo."' )";
    */

    $q = "insert into entrada values ( 0,'" . $titulo . "','" . $texto . "','" . $fecha . "','" . $activo . "' )";


    // Ejecutar la consulta en la conexión abierta. No hay "resultset"
    mysqli_query($conexion, $q) or die(mysqli_error($conexion));

// Cerrar la conexión
    mysqli_close($conexion);
}
?>
<!-- Barra de navegación -->
<div class="navbar-wrapper">
    <div class="container">
        <nav class="navbar navbar-inverse navbar-static-top">
            <div class="container">
                <div class="navbar-header">
                    <button type="button" class="navbar-toggle collapsed" data-toggle="collapse" data-tarPOST="#navbar"
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
                        <li><a href="index.php">Home</a></li><!--Marcado como activo -->
                        <li><a href="#about">Acerca de</a></li>
                        <li><a href="https://github.com/inakidml/ProyectoPhP">GitHub</a></li>
                        <li class="dropdown">
                            <a class="active" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">Blog <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li ><a href="blog.php">Ver Blog</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Administrador</li>
                                <li class="active"><a href="entradas.php">Gestión blog</a></li>
                                <li><a href="#">Añadir usuarios</a></li>
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


<a name="form entrada"></a>
<div class="row featurette">
    <div class="col-md-12">

        <div class="container">

            <h2 class="featurette-heading">Añadir entrada <span class="text-muted">al Blog</span>
            </h2>

            <form action="entradas.php" method="post" class="form-horizontal">
                <div class="form-group">
                    <label for="titulo" class="control-label col-sm-2">Título:</label>
                    <div class="col-sm-10">
                        <input type="text" id="titulo" name="titulo" class="form-control" class="form-horizontal"
                               value=""/>

                    </div>
                </div>
                <div class="form-group">
                    <label for="texto" class="control-label col-sm-2">Texto:</label>
                    <div class="col-sm-10">
                        <textarea id="texto" name="texto" rows="4" cols="40" maxlength="2000" placeholder="max: 2000dig" class="form-control"></textarea>
                    </div>
                </div>
                <div class="form-group">
                    <label for="fecha" class="control-label col-sm-2">Fecha:</label>
                    <div class="col-sm-10">
                        <input type="text" id="fecha" name="fecha" class="form-control"
                               value="<?php echo $fecha_actual; ?>"/>
                    </div>
                </div>
                <div class="form-group">
                    <label for="activo" class="control-label col-sm-2">Activo:</label>
                    <div class="col-sm-10">
                        <input type="checkbox" id="activo" name="activo" checked="checked" class="form-control"/>
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-sm-offset-2 col-sm-10">
                    <input type="reset" id="limpiar" name="limpiar" value="Limpiar" class="btn btn-default" class="form-inline"/>
                    <input type="submit" id="enviar" name="enviar" value="Guardar" class="btn btn-default" class="form-inline"/>
                </div>
                </div>
            </form>
        </div>
    </div>

</div>

<hr class="featurette-divider">


<div class="container">
    <div class="col-md-12 text-center">
        <p><a class="btn btn-lg btn-primary" href="borrarEntradas.php" role="button">Borrar entradas o comentarios</a></p>
    </div>
</div>

<hr class="featurette-divider">//divisor de la entrada

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
