<?php
include("conexion.php");
session_start();
if (!isset($_SESSION['id_user'])) {
  header("Location: login.php");
}
$id_usuario = $_SESSION['id_user'];


$sql_usuario = "SELECT id_usuario, nombre, apellido, fecha_nac, email FROM usuario WHERE id_usuario = '$id_usuario'";

$result_usr = $conexion->query($sql_usuario);

$lista = $result_usr->fetch_assoc();



?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="description" content="Bienvenido administrador de dpto.com">
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" href="../img/favicon.png" type="image/png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/redes_sociales/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/funcionesGrupo99.js"></script>
    <title>Administracion</title>
</head>
<body>
<h2>Bienvenido<h2>
<h4>Los datos de su usuario son:</h4>
<ul>
  <li>
    <span>ID de usuario: <?php echo utf8_decode($lista['id_usuario']); ?></span>
  </li>
  <li>
    <span>Nombre: <?php echo utf8_decode($lista['nombre']); ?></span>
  </li>
  <li>
    <span>Apellido: <?php echo utf8_decode($lista['apellido']); ?></span>
  </li>
  <li>
    <span>Fecha de nacimiento: <?php echo utf8_decode($lista['fecha_nac']); ?></span>
  </li>
  <li>
    <span>Email: <?php echo utf8_decode($lista['email']); ?></span>
  </li>
</ul>

<!--  Se imprimen los datos de la tabla localidad  -->

<?php

$sql_localidad = "SELECT * FROM localidad";

if ($resultado = $conexion->query($sql_localidad)) {
    echo "<h4>Los datos de la tabla localidad son:</h4>";
    echo "<ul>";
    /* obtener el array de objetos */
    while ($fila = $resultado->fetch_row()) {
        echo "<li>";
        printf ("%s - Localidad: %s - Provincia:  %s\n",$fila[0], $fila[1],$fila[2]);
        echo "</li>";
    }
    echo "</ul>";
    /* liberar el conjunto de resultados */
    $resultado->close();
}

/* cerrar la conexión */
$conexion->close();

 ?>

<a href="salir.php">Cerrar sesión</a>

</body>
</html>
