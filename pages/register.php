<?php
include("conexion.php");

//Se generan variables con la información del formulario
if (isset($_POST["registro"])) {
  $nombre = mysqli_real_escape_string($conexion,$_POST['nombre']);
  $apellido = mysqli_real_escape_string($conexion,$_POST['apellido']);
  $fechanac = mysqli_real_escape_string($conexion,$_POST['fechanac']);
  $email = mysqli_real_escape_string($conexion,$_POST['email']);
  $clave = mysqli_real_escape_string($conexion,$_POST['clave']);
  //Se encripta la clave de usuario
  $clave_enc = sha1($clave);
  //Se genera consulta sql y se verifica si ya existe un email en la BD
  $sql_email = "SELECT id_usuario FROM usuario WHERE email = '$email'";
  $result_email = $conexion->query($sql_email);
  $filas = $result_email->num_rows;
  if ($filas > 0) {
    echo "<script>
      alert('El email ya está registrado');
      window.location = 'register.php';
    </script>";

  } else {
    //Si no existe el email se insertan los datos en la BD
    $sql_insert = "INSERT INTO usuario(nombre,apellido,fecha_nac,email,contraseña)
    VALUES ('$nombre','$apellido','$fechanac','$email','$clave_enc')";
    $result_insert = $conexion->query($sql_insert);
    //Se verifica inserción correcta
    if ($result_insert > 0) {
      echo "<script>
        alert('Se ha registrado correctamente');
        window.location = 'login.php';
      </script>";
    } else {
      echo "<script>
        alert('Error al registrarse');
        window.location = 'register.php';
      </script>";
    }

  }

}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <meta name="keywords" content="alquiler, venta, casa, departamento, inmueble, inmobiliaria, córdoba, estudiantes">
    <meta name="description" content="Dpto.com es el lugar donde podés encontrar ofertas de alquiler o venta de propiedades inmobiliarias
    . Registrate aqui.">
    <meta name="robots" content="noindex, nofollow">
    <link rel="icon" href="../img/favicon.png" type="image/png" />
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/redes_sociales/style.css" rel="stylesheet">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../js/funcionesGrupo99.js"></script>
    <title>Registrate</title>
</head>
<body>
  <div class="container-fluid bg-dark">
    <nav class="navbar navbar-expand-sm bg-dark navbar-dark">
      <a class="navbar-brand" href="../index.html">
        <img src="../img/logo_dpto2.png" alt="Logo" style="width:50px;" class="rounded-pill">
     </a>
      <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menuColapsable">
        <span class="navbar-toggler-icon"></span>
      </button>
      <div class="collapse navbar-collapse" id="menuColapsable">
        <ul class="navbar-nav">
          <li class="nav-item">
            <a class="nav-link" href="../index.html">Inicio</a>
          </li>
          <li class="nav-item">
            <a class="nav-link active" href="./nosotros.html">Nosotros</a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="contacto.html">Contacto</a>
          </li>
          <li class="nav-item">
              <a class="btn btn-outline-success mx-1" href="./login.php">Ingresar</a>
          </li>
          <li class="nav-item">
              <a class="btn btn-outline-secondary mx-1 active" href="./register.php">Registrate</a>
          </li>
        </ul>
      </div>
      </nav>
  </div>
  <main>
  <h1 class="col-lg-12 col-xs-12 d-flex justify-content-center mt-5" data-aos="fade-down">Registrate</h1>
  <section class="row d-flex justify-content-center my-5">
    <img class="col-lg-6" width="90%" height="90%" src="../img/fondo_buscador.jpg"
      alt="Imagen de Edificio en el inicio de sesion" data-aos="zoom-out">
    <div class="col-lg-3 section__p--posicion" data-aos="fade-left">
      <form id="formRegister" class="form-control form-control-sm" action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
        <div class="mb-3 mt-3 ">
          <label for="nombre">Nombre:</label>
          <input type="text" class="form-control" placeholder="Nombre" name="nombre" minlength="3" id="Nombre" required>
        </div>
        <div class="mb-3 mt-3 ">
          <label for="apellido">Apellido:</label>
          <input type="text" class="form-control"  placeholder="Apellido" name="apellido" minlength="3" id="Apellido" required>
        </div>
        <div class="mb-3 mt-3 ">
          <label for="fechanac">Fecha de Nacimiento:</label>
          <input type="date" class="form-control"  placeholder="Fecha de Nacimiento" name="fechanac" minlength="3" id="FechaNac" required>
        </div>
        <div class="mb-3">
          <label for="email">Email:</label>
          <input type="email" class="form-control"  placeholder="Correo Electrónico" name="email" id="Email" re quired>
        </div>
        <div class="mb-3">
          <label>Repita Email:</label>
          <input type="text" class="form-control"  placeholder="Repita Correo Electrónico" id="Email2" required>
        </div>
        <div class="mb-3">
          <label>Contraseña:</label>
          <input type="password" class="form-control" placeholder="Contraseña" name="clave" minlength="5" id="Contraseña" required>
        </div>
        <div class="mb-3">
          <label for="pwd">Contraseña:</label>
          <input type="password" class="form-control"  placeholder="Repita Contraseña"  minlength="5" id="Contraseña2" required>
        </div>

        <button type="submit" class="btn btn-outline-secondary" name="registro">Registrate</button>
      </form>
    </div>
  </section>
</main>
     <footer>
        <div class="container-fluid mt-2 bg-dark text-white p-4">
          <div class="row">
            <div class="col-sm text-center">
              <h4>Seguinos en las redes sociales</h4>

              <ul class="nav justify-content-center">
                <li class="nav-item">
                  <a class="nav-link text-light" href="https://www.facebook.com/" target="_blank"><span class="icono-facebook2"></span></a>
                </li>
                <li class="nav-item">
                  <a class="nav-link text-light" href="https://www.instagram.com/" target="_blank"><span class="icono-instagram"></span></a>
                </li>
                <li class="nav-item ">
                  <a class="nav-link text-light" href="https://www.twitter.com/" target="_blank"><span class="icono-twitter"></span></a>
                </li>
              </ul>
            </div>

            <div class="col-sm text-center">
              <h4>¿Querés más información?</h4>
              <div class="footer__contacto">
                  <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-envelope-fill" viewBox="0 0 16 16">
                      <path d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z"/>
                  </svg>
                  <a class="text-light" href="mailto:asistencia@dpto.com"><span>asistencia@dpto.com</span></a>
                  <span class="nav-link text-secondary">Tel: 3514558024</span>
                  <a class="text-light" href="https://www.argentina.gob.ar/justicia/derechofacil/leysimple/alquileres" target="_blank">Ley de alquileres</a>
              </div>
          </div>

          </div>
        </div>
      </footer>
</body>
</html>
