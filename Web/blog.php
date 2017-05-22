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
<!-- NAVBAR
================================================== -->
<body>
<?php
$pagina = 1;
if (isset($_GET['pagina'])) {
    $pagina = $_GET['pagina'];
    if($pagina==0){
        $pagina = 1;
    }
}


// date_default_timezone... es obligatorio si usais PHP 5.3 o superior
date_default_timezone_set('Europe/Madrid');
$fecha_actual = date("Y-m-d H:i:s");

// Abrir la conexión
$conexion = mysqli_connect("localhost", "root", "root", "blog");


// Formar la consulta (seleccionando todas las filas)
$q = "select * from entrada";

// Ejecutar la consulta en la conexión abierta y obtener el "resultset" o abortar y mostrar el error
$r = mysqli_query($conexion, $q) or die (mysqli_error($conexion));

// Calcular el número de filas
$total = mysqli_num_rows($r);

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
                                <li class="active"><a href="blog.php">Ver Blog</a></li><!--Marcado como activo -->
                                <li role="separator" class="divider"></li>
                                <li class="dropdown-header">Administrador</li>
                                <li><a href="entradas.php">Gestión blog</a></li>
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
<?php

//5 articulos por página

if ($total > 0) {
    $contador = 0;
    while ($fila = mysqli_fetch_assoc($r)) {

        if ($fila['activo'] == 1) {

            if ($contador < $pagina * 5 && $contador >= ($pagina - 1) * 5) {
                echo '
    <a name="entrada blog"></a>
    <div class="row featurette">
        <div class="col-md-12">
        <h2 class="featurette-heading"><a href="entradaComentarios.php?idEntrada=' . $fila['id'] . '">' . $fila['titulo'] . ' </a></h2><!--Paso el id como get en el link -->
        <span class="text-muted" class="fecha">' . $fila['fecha'] . '</span>       
        <p >' . $fila['texto'] . '</p>
        </div>
    </div>
   
</div>


<hr class="featurette-divider">
       
    ';
            }
            $contador++;
        }
    }

    //número de páginas
    if ($total > 0) {
        $paginas = (int) ($contador / 5);//ojo division con decimales da float
        if ($contador % 5 != 0) {
            $paginas++;
        }
        echo '

<!--//indicadores de paginación -->

<div class="col-md-12 text-center">



    <nav aria-label="Page navigation">
  <ul class="pagination">
    <li>
      <a href="blog.php?pagina=' . ($pagina-1) . '" aria-label="Previous">
        <span aria-hidden="true">&laquo;</span>
      </a>
    </li>';

        for ($i = 1; $i <= $paginas; $i++) {
            echo '<li ';
            if ($pagina == $i) {
                echo 'class="active"';
            }
            echo '><a href="blog.php?pagina=' . $i . '">' . $i . '</a></li>';
        }
        echo '
    <li>
      <a href="';
        if($pagina >= $paginas){
            echo'#';
        }else{
            echo'blog.php?pagina='.($pagina + 1).'';
        }
        echo '" aria-label="Next">
        <span aria-hidden="true">&raquo;</span>
      </a>
    </li>
  </ul>
</nav>
</div>
}
    ';
    }

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


<!--
    <li class="active"><a href="#">1</a></li>
    <li><a href="#">2</a></li>
    <li><a href="#">3</a></li>
    <li><a href="#">4</a></li>
    <li class="disabled"><a href="#">5</a></li>
-->