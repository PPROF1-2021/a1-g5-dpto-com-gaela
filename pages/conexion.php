<?php
$servidor = "localhost";
$usuario = "id17984331_root";
$clave = "Gael22334455##";
$bd = "id17984331_dpto_punto_com";

//Conexion a la base de datos

$conexion = new mysqli($servidor,$usuario,$clave,$bd);

if (mysqli_connect_errno()) {
  echo "Error de conexion",mysqli_connect_error();
  exit();

}

 ?>
