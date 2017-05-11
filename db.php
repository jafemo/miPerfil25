<?php
/**
 * CLASE PARA LA BD
 */
class db{
  //ATRIBUTOS PARA LA CONEXION
  private $host="localhost";
  private $user="root";
  private $pass="root";
  private $db_name="a25";
  private $conexion;
  private $error=false;
  private $error_msj="";
  function __construct(){
      $this->conexion = new mysqli($this->host, $this->user, $this->pass, $this->db_name);
      if ($this->conexion->connect_errno) {
        $this->error=true;
        $this->error_msj="No se ha podido realizar la conexion a la bd. Revisar base de datos o parámetros";
      }
  }

  //FUNCION PARA SABER SI HAY ERROR EN LA CONEXIÓN
  function hayError(){
    return $this->error;
  }

  //DEVUELVE EL MENSAJE DE ERROR
  function msjError(){
    return $this->error_msj;
  }

  //CONSULTA
  public function realizarConsulta($consulta){
    if($this->error==false){
      $resultado = $this->conexion->query($consulta);
      return $resultado;
    }else{
      $this->error_msj="Imposible realizar la consulta: ".$consulta;
      return null;
    }
  }
}
 ?>
