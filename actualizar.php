<?php
  //PONEMOS LA PAGINA USUARIO
  include 'usuario.php';
  $usuario = new usuario();
  $actperfil=$usuario->ActualizarMiPerfil($_POST['email'], $_POST['nombre'], $_POST['apellidos'], $_POST['roles']);
  if ($actperfil==true) {
    //CON LOCATION VAS A LA PAGINA QUE HEMOS PUESTO, PODEMOS ACTUALIZAR Y NOS LLEVA A MI PERFIL
    header('Location: miperfil.php');
  }else {
    echo "Error al actualizar los datos<br><br>";
    echo "<a href='miperfil.php'>Volver a mi perfil</a>";
  }
 ?>
