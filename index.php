<!DOCTYPE html>
<html>
  <head>
    <meta charset="utf-8">
    <title>Login</title>
  </head>
  <body>
    <form action="index.php" method="post">
      Usuario:<input type="text" name="usuario" value=""><br><br>
      Contraseña:<input type="password" name="pass" value=""><br><br>
      <input type="submit" name="login" value="login">
    </form>
      <a href="registro.php">Registrarse</a>
      <?php
      if (isset($_POST['usuario']) && isset($_POST['pass'])) {
        include 'usuario.php';
        include 'seguridad.php';
        $usuario = new usuario();
        $sesion = new seguridad();
        $registrado=$usuario->LoginUsuario($_POST['usuario']);
        if ($registrado!=null) {
            //SI PONEMOS LA MISMA PASS NO PODEMOS ENTRAR
            if ($registrado['pass']==sha1($_POST['pass'])) {
              echo "Usuario logueado";
              $sesion->addUsuario($registrado['usuario']);
              header('Location: miperfil.php');
            }else {
              echo "Usuario o contraseña incorrectas";
            }
          }else {
            echo "Usuario no encontrado";
          }
        }
     ?>
  </body>
</html>
