<?php
  class Usuario extends Conectar{
    public function login(){
    $conectar = parent::conexion(); //llama ala clase conectar de conexion
    parent::set_names(); // llamar paara que no hay aproblema con mayusculas ni minusculas
    if(isset($_POST["enviar"])){
      $name = $_POST["user_name"];
      $pass = $_POST["user_pass"];
      $rol = $_POST["rol_id"];
      if(empty($name) and empty($pass)){
        header("Location:".conectar::ruta()."index.php?m=2");
        exit();
      }else{
          $sql = "SELECT * FROM tm_usuario WHERE user_name= ? and user_pass = ? AND  rol_id=? AND user_state = 1"; // llama la cadena spl
          $stmt = $conectar -> prepare($sql); // llama a conectar y preparar
          $stmt -> bindValue(1, $name);
          $stmt -> bindValue(2, $pass);
          $stmt -> bindValue(3, $rol);
          $stmt->execute(); // executa la consulta
          //se agrega variable $resultado para almacenar el usuario
          $resultado = $stmt->fetch();
          if(is_array($resultado) and count($resultado) > 0){
            $_SESSION["user_id"] = $resultado["user_id"];
            $_SESSION["user_name"] = $resultado["user_name"];
            $_SESSION["user_lastname"] = $resultado["user_lastname"];
            $_SESSION["rol_id"] = $resultado["rol_id"];
            header("Location:".Conectar::ruta()."view/Home/");
            exit();
          }else{
            header("Location:".conectar::ruta()."index.php?m=1");
            exit();
          }
        }
      }
    }

  public function insert_usuario($user_name, $user_lastname, $user_mail,$user_pass, $rol_id){
    $conectar = parent::conexion();
    parent::set_names();
    $sql = "INSERT INTO tm_usuario (user_id, user_name, user_lastname, user_mail, user_pass, rol_id, user_date_crea, user_date_edit, user_date_delete, user_state) VALUES (NULL, ?, ?,?, ?, ?, now(), NULL, NULL, '1');  ";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $user_name);
    $sql->bindValue(2, $$user_lastname);
    $sql->bindValue(3, $user_mail);
    $sql->bindValue(4, $user_pass);
    $sql->bindValue(5, $rol_id);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }

  public function update_usuario($user_id, $user_name, $user_lastname, $user_mail,$user_pass, $rol_id){
    $conectar = parent::conexion();
    parent::set_names();
    $sql = "UPDATE tm_usuario set
      user_name= ?,
      user_lastname = ?,
      user_mail = ?,
      user_pass = ?,
      rol_id = ?,
      where user_id = ?";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $user_name);
    $sql->bindValue(2, $$user_lastname);
    $sql->bindValue(3, $user_mail);
    $sql->bindValue(4, $user_pass);
    $sql->bindValue(5, $rol_id);
    $sql->bindValue(6, $user_id);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }


  public function delete_usuario($user_id){
    $conectar = parent::conexion();
    parent::set_names();
    $sql = " UPDATE tm_usuario
      SET
        user_state='0',
        user_date_delete=now()
      where user_id=?";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $user_id);
    $sql->execute();
    return $resultado = $sql->fetchAll();

  }

  public function  get_usuario(){
    try{
      $conectar = parent::conexion();
      parent::set_names();
      $sql = " SELECT * FROM tm_usuario where user_state='1'";
      $sql=$conectar->prepare($sql);
      $sql->execute();
      $resultado = $sql->fetchAll();
      return $resultado;
    }catch(Exception $e){
      ?> <script>console.log("Error catch     get_usuario")</script> <?php
      throw $e;
    }

  }

  // public function get_usuario_by_id($user_id){
  //   $conectar = parent::conexion();
  //   parent::set_names();
  //   $sql = " SELECT * FROM tm_usuario where user_id=?";
  //   $sql=$conectar->prepare($sql);
  //   $sql->bindValue(1, $user_id);
  //   return $resultado = $sql->fetchAll();
  // }
  public function get_usuario_by_id($user_id) {
    $conectar = parent::conexion();
    parent::set_names();
    $sql = "SELECT * FROM tm_usuario WHERE user_id=?";
    $sql = $conectar->prepare($sql);
    $sql->bindValue(1, $user_id);
    $sql->execute(); // Falta ejecutar la consulta
    return $sql->fetchAll(); // Recupera los resultados de la consulta
}


  }
?>