<?php
include 'db.php';

class usuario extends db{
  function __construct(){
    parent::__construct();
  }

    //FUNCION PARA INSERTAR USUARIOS EN LA BD
    function insertarUsuario($nombre, $apellidos, $email, $pass){
    $sql="INSERT INTO usuarios (id, usuario, nombre, apellidos, email, rol, pass)
          VALUES (NULL, '".$email."', '".$nombre."', '".$apellidos."', '".$email."', 'USER', '".sha1($pass)."')";
      //REALIZAMOS LA CONSULTA
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      //MOSTRAMOS LOS USUARIO EN ORDEN DESCENDENTE
      $sql="SELECT * from usuarios ORDER BY id DESC";
      $resultado=$this->realizarConsulta($sql);
      if($resultado!=false){
        return $resultado->fetch_assoc();
      }else{
        return null;
      }
    }else{
      return null;
    }
  }

  //FUNCION PARA EL LOGIN DE USUARIO
  function LoginUsuario($email){
    //CONSTRUIMOS LA CONSULTA
    $sql="SELECT * from usuarios WHERE usuario='".$email."'";
    //LA HACEMOS
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=false){
      if($resultado!=false){
        return $resultado->fetch_assoc();
      }else{
        return null;
      }
    }else{
      return null;
    }
  }

  //FUNCION PARA MI PERFIL
  function MiPerfil($usuario){
    $sql="SELECT * from usuarios WHERE usuario='".$usuario."'";
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=null){
      //CREAMOS TABLA
      $tabla=[];
      while($fila=$resultado->fetch_assoc()){
        $tabla[]=$fila;
      }
      return $tabla;
    }else{
      return null;
    }
  }

  //FUNCION PARA ACTUALIZAR MI PERFIL
  public function ActualizarMiPerfil($usuario, $nombre, $apellidos, $rol){
    $sql="UPDATE usuarios SET nombre='" .$nombre ."', apellidos='" .$apellidos ."', rol= '".$rol."' WHERE usuario='" .$usuario ."'";
    $actualizarperfil=$this->realizarConsulta($sql);
    if ($actualizarperfil=!false) {
      return true;
    }else {
      return false;
    }
  }

  //FUNCION PARA COMPROBAR EL EMAIL
  function Comprobaremail($email){
    $sql="SELECT email from usuarios WHERE email='".$email."'";
    $resultado=$this->realizarConsulta($sql);
    if($resultado!=null){
      if ($resultado->num_rows>0) {
        return null;
      }else {
        return 1;
      }
    }else{
      return null;
    }
  }

  //FUNCION PARA LOS ROLES
  function Roles(){
      //MOSTRAMOS LOS ROLES
      $sql="SELECT * from roles";
      //REALIZAMOS LA CONSULTA
      $resultado=$this->realizarConsulta($sql);
      if($resultado!=null){
      //CREAMOS LA TABLA
        $tabla=[];
        while($fila=$resultado->fetch_assoc()){
          $tabla[]=$fila;
        }
        return $tabla;
      }else{
        return null;
      }
    }
}
 ?>
