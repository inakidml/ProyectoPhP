<!DOCTYPE html>
<html lang="en">
<head>
    <title>Registrar Usuario</title>
    <meta charset="utf-8">
</head>
<body>
<header>
    <h1>Registro</h1>
</header>
<form action="anadirUsuario.php" method="post">
    <hr/>
    <h3>Crea una cuenta</h3>
    <!--Nombre Usuario-->
    <label for="username">Nombre de Usuario:</label><br>
    <input type="text" name="username" id="username" maxlength="32" required>
    <br/><br/>
    <!--Password-->
    <label for="password">Password:</label><br>
    <input type="password" name="password" id="password" maxlength="8" required>
    <br/><br/>
    <input type="submit" name="submit" value="Registrarme">
    <input type="reset" name="clear" value="Borrar">
</form>
<hr/>
<br/>
<footer>
</footer>
</body>
</html>

registrar_usuario.php:

<?php
$host_db = "localhost";
$user_db = "root";
$pass_db = "root";
$db_name = "blog";
$tbl_name = "users";

$form_pass = $_POST['password'];

$hash = password_hash($form_pass, PASSWORD_BCRYPT);

$conexion = mysqli_connect($host_db, $user_db, $pass_db, $db_name);
if ($conexion->connect_error) {
    die("La conexion falló: " . $conexion->connect_error);
}
$buscarUsuario = "SELECT * FROM $tbl_name
    WHERE user = '$_POST[username]' ";
$resul = mysqli_query($conexion, $buscarUsuario) or die(mysqli_error($conexion));

$count = mysqli_num_rows($resul);
if ($count == 1) {
    echo "<br />" . "El Nombre de Usuario ya existe." . "<br />";
    echo "<a href='index.html'>Por favor escoja otro Nombre</a>";
} else {

    $query = "INSERT INTO $tbl_name (user, pass)
        	VALUES ('$_POST[username]', '$hash')";
    mysqli_query($conexion, $query) or die(mysqli_error($conexion));

    if (mysqli_affected_rows($conexion) > 0) {
        echo "<br />" . "<h2>" . "Usuario Creado Exitosamente!" . "</h2>";
        echo "<h4>" . "Bienvenido: " . $_POST['username'] . "</h4>" . "\n\n";
        echo "<h5>" . "Hacer Login: " . "<a href='login.html'>Login</a>" . "</h5>";
    } else {
        echo "Error al crear el usuario." . $query . "<br>" . $conexion->error;
    }
}
mysqli_close($conexion);
?>