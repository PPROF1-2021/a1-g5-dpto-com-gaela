<?php
include("conexion.php");
session_start();
if (isset($_SESSION['id_user'])) {
  header("Location: admin.php");
}
//Se generan variables con la información del formulario
if (isset($_POST["login"])) {
  $email = mysqli_real_escape_string($conexion,$_POST['email']);
  $clave = mysqli_real_escape_string($conexion,$_POST['clave']);

  //Se encripta la clave de usuario
  $clave_enc = sha1($clave);

  //Se genera consulta sql y se verifica si existe en la BD
  $sql_usuario = "SELECT id_usuario FROM usuario WHERE email = '$email' AND contraseña = '$clave_enc'";
  $result_usuario = $conexion->query($sql_usuario);
  $acierto = $result_usuario->num_rows;
  //Si existe el email y la contraseña se genera una sesion y se redirige a la página de administrador
  if ($acierto > 0) {

    $fila = $result_usuario->fetch_assoc();
    $_SESSION['id_user'] = $fila["id_usuario"];
    header("Location: admin.php");
  } else {
    echo "<script>
      alert('Usuario o clave incorrecto');
      window.location = 'login.php';
    </script>";
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
 . Ingresá con tu cuenta.">
 <meta name="robots" content="noindex, nofollow">
 <link rel="icon" href="../img/favicon.png" type="image/png" />
 <link href="../css/redes_sociales/style.css" rel="stylesheet">
 <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Roboto|Varela+Round">
 <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css">
 <link rel="stylesheet" href="https://fonts.googleapis.com/icon?family=Material+Icons">
 <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/font-awesome/4.7.0/css/font-awesome.min.css">
 <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
 <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.0/dist/umd/popper.min.js"></script>
 <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/js/bootstrap.min.js"></script>
 <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/css/bootstrap.min.css" rel="stylesheet">
 <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.1/dist/js/bootstrap.bundle.min.js"></script>
 <title>Login</title>
</head>

<body>
 <!--menú de la pagina inicial-->
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
           <a class="nav-link" href="./nosotros.html">Nosotros</a>
         </li>
         <li class="nav-item">
           <a class="nav-link" href="./contacto.html">Contacto</a>
         </li>
         <li class="nav-item">
             <a class="btn btn-outline-success mx-1 active" href="./login.php">Ingresar</a>
         </li>
         <li class="nav-item">
             <a class="btn btn-outline-secondary mx-1" href="./register.php">Registrate</a>
         </li>
       </ul>
     </div>
   </nav>
 </div>
<main>
 <h1 class="col-lg-12 col-xs-12 d-flex justify-content-center mt-5" data-aos="fade-down">Iniciar Sesión</h1>
 <section class="row d-flex justify-content-center my-5">
   <img class="col-lg-6 article__img--tamanio" src="../img//fondo_inicio.png"
     alt="Imagen de Edificio en el inicio de sesion" data-aos="zoom-out">
   <div class="col-lg-3 section__p--posicion" data-aos="fade-left">
     <form action="<?php $_SERVER['PHP_SELF'];?>" method="POST">
       <div class="mb-3 mt-3 ">
         <label for="email">Email:</label>
         <input type="email" class="form-control" id="email" name="email" placeholder="Ingresar email" required>
       </div>
       <div class="mb-3">
         <label for="clave">Contraseña:</label>
         <input type="password" class="form-control" name="clave" placeholder="Ingresar password" required>
       </div>
       <button type="submit" name="login" class="btn btn-outline-info">Ingresar</button>
     </form>
   </div>
      <!-- Modal -->
      <div class="modal fade" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel"></h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">×</span>
                </button>
              </div>
              <div class="modal-body"><div class="alert alert-success">
                  <i class="material-icons">&#xE876;</i>
                  <strong> Ha ingresado correctamente!</strong>
                </div>
              </div>
              <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
              </div>
            </div>
          </div>
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
             <a class="nav-link text-light" href="https://www.facebook.com/" target="_blank"><span
                 class="icono-facebook2"></span></a>
           </li>
           <li class="nav-item">
             <a class="nav-link text-light" href="https://www.instagram.com/" target="_blank"><span
                 class="icono-instagram"></span></a>
           </li>
           <li class="nav-item ">
             <a class="nav-link text-light" href="https://www.twitter.com/" target="_blank"><span
                 class="icono-twitter"></span></a>
           </li>
         </ul>
       </div>

       <div class="col-sm text-center">
         <h4>¿Querés más información?</h4>
         <div>
           <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="white" class="bi bi-envelope-fill"
             viewBox="0 0 16 16">
             <path
               d="M.05 3.555A2 2 0 0 1 2 2h12a2 2 0 0 1 1.95 1.555L8 8.414.05 3.555zM0 4.697v7.104l5.803-3.558L0 4.697zM6.761 8.83l-6.57 4.027A2 2 0 0 0 2 14h12a2 2 0 0 0 1.808-1.144l-6.57-4.027L8 9.586l-1.239-.757zm3.436-.586L16 11.801V4.697l-5.803 3.546z" />
           </svg>
           <a class=" text-light" href="mailto:asistencia@dpto.com"><span>asistencia@dpto.com</span></a>
           <span class="nav-link text-secondary">Tel: 3514558024</span>
           <a class="text-light" href="https://www.argentina.gob.ar/justicia/derechofacil/leysimple/alquileres" target="_blank">Ley de alquileres</a>
         </div>
       </div>

     </div>
   </div>
 </footer>
</body>

</html>
