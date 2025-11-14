<?php
require 'includes/app.php';
$baseDatos = conectarBD();

//Autenticacion de usario

$errores = [];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
  // echo '<pre>';
  // var_dump($_POST);
  // echo '</pre>';

  $email = mysqli_real_escape_string($baseDatos, filter_var($_POST['iemail'], FILTER_VALIDATE_EMAIL) );
  var_dump($email);
  $password = mysqli_real_escape_string($baseDatos, $_POST['ipassword']);


  if(!$email) {
    $errores[] = 'No existe o hay un email valido';
  }

  if(!$password) {
    $errores[] = 'No hay o esta mal el password';
  }

  if(empty($errores)) {
    //Revisar si existe el usuario
    $queryRevision = "SELECT * FROM usuarios WHERE email  = '$email' ";
    $rRevision = mysqli_query($baseDatos, $queryRevision);
    //var_dump($rRevision);


    if($rRevision->num_rows) {
      //Revisar si el password es correcto
      $usuario =mysqli_fetch_assoc($rRevision);
      //var_dump($usuario);

      //Verificar si el password es correcto o no
      $autentificacion = password_verify($password, $usuario['pasword']);
      //var_dump($autentificacion);
      if($autentificacion) {
        //El usuario es correcto

        session_start();

        //Llenar el arreglo de la session
        $_SESSION['usuario'] = $usuario['email'];
        $_SESSION['login'] = true;

        header('location: /admin?resultado=4');


      } else {
        $errores[] = 'El password o contrasena es incorrecto';
      }
    } else {
      $errores[] = 'El usuario no existe o no es correcto';
    }
  }
} 


  //header

  incluirTemplate('header');
?>

  <main class="contenedor seccion contanido-centrado">
    <h1>Login de usuario</h1>
    <?php foreach($errores as $alertas):?>
      <div class="alerta error">
        <?php echo $alertas; ?>
      </div>
    <?php endforeach; ?>
    <form action="" class="formulario" method="POST">
      <fielset>
        <legend>Email y password</legend>

        <label for="email">E-mail</label>
        <input type="email" placeholder="Tu e-mail" id="email" name="iemail">

        <label for="password">Password</label>
        <input type="password" placeholder="*****" id="password" name="ipassword">

      </fielset>
      <input type="submit" value="Iniciar Sesion"  class="boton-verde">
    </form>
  </main>

  <?php incluirTemplate('footer');?>
