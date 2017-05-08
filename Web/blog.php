<!DOCTYPE html>
<html lang="en">
<head>
    <?php
    ?>

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
                        <li><a href="index.php">Home</a></li><!--Marcado como activo -->
                        <li><a href="#about">Acerca de</a></li>
                        <li><a href="https://github.com/inakidml/ProyectoPhP">GitHub</a></li>
                        <li class="dropdown">
                            <a class="active" href="#" class="dropdown-toggle" data-toggle="dropdown" role="button"
                               aria-haspopup="true" aria-expanded="false">Blog <span class="caret"></span></a>
                            <ul class="dropdown-menu">
                                <li class="active"><a href="blog.php">Ver Blog</a></li>
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Administrador</li>
                                <li><a href="#">Gestión blog</a></li>
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


<a name="tecn-sonido"></a>
<div class="row featurette">
    <div class="col-md-7">
        <h2 class="featurette-heading">Técnico de sonido <span class="text-muted">Sonorización de conciertos</span>
        </h2>
        <p class="lead">Donec ullamcorper nulla non metus auctor fringilla. Vestibulum id ligula porta felis euismod
            semper. Praesent commodo cursus magna, vel scelerisque nisl consectetur. Fusce dapibus, tellus ac cursus
            commodo.</p>
    </div>
    <div class="col-md-5">
        <img class="featurette-image img-responsive center-block"
             src="imagenes/marca%20personal/bajo%20banqueta.jpeg" alt="Generic placeholder image">
    </div>
</div>

<hr class="featurette-divider">

<!-- /Fin de las FEATURETTES -->

<!-- logo github -->
<div class="row featurette">
    <div class="col-md-4"></div>
    <div class="col-md-4 text-center" class="github">
        <p><a class="icon-social-github" href="https://github.com/inakidml/Proyecto-CSS" role="button"></a></p>
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
