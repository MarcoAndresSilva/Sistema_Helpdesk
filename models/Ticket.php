
<?php
  class Ticket extends Conectar {
  public function insert_ticket($usu_id,$cat_id,$tic_titulo,$tic_descrip){
    $conectar = parent::conexion();
    parent::set_names();
    $sql = "INSERT INTO tm_ticket (tic_id, usu_id, cat_id, tic_titulo, tic_descrip,tic_estado,fech_crea, tic_status) VALUES (NULL, ?, ?, ?, ?,'abierto',now(), '1')";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $usu_id);
    $sql->bindValue(2, $cat_id);
    $sql->bindValue(3, $tic_titulo);
    $sql->bindValue(4, $tic_descrip);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }

  public function listar_ticket_by_user($usu_id){
    $conectar = parent::conexion();
    parent::set_names();
    $sql = "SELECT
    tm_ticket.tic_id,
    tm_ticket.usu_id,
    tm_ticket.cat_id,
    tm_ticket.tic_titulo,
    tm_ticket.tic_descrip,
    tm_ticket.tic_estado,
    tm_ticket.fech_crea,
    tm_usuario.user_name,
    tm_usuario.user_lastname,
    tm_categoria.cat_name
    FROM
    tm_ticket
    INNER join tm_categoria on tm_ticket.cat_id = tm_categoria.cat_id
    INNER join tm_usuario on tm_ticket.usu_id = tm_usuario.user_id
    WHERE
    tm_ticket.tic_status=1
    AND tm_usuario.user_id=?";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $usu_id);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }

   public function listar_ticket(){
    $conectar = parent::conexion();
    parent::set_names();
    $sql = "SELECT
    tm_ticket.tic_id,
    tm_ticket.usu_id,
    tm_ticket.cat_id,
    tm_ticket.tic_titulo,
    tm_ticket.tic_descrip,
    tm_ticket.tic_estado,
    tm_ticket.fech_crea,
    tm_usuario.user_name,
    tm_usuario.user_lastname,
    tm_categoria.cat_name
    FROM
    tm_ticket
    INNER join tm_categoria on tm_ticket.cat_id = tm_categoria.cat_id
    INNER join tm_usuario on tm_ticket.usu_id = tm_usuario.user_id
    WHERE
    tm_ticket.tic_status=1";

    $sql=$conectar->prepare($sql);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }

  public function listar_ticket_by_id($tic_id){
    $conectar= parent::conexion();
    parent::set_names();
    $sql="SELECT
    tm_ticket.tic_id,
    tm_ticket.usu_id,
    tm_ticket.cat_id,
    tm_ticket.tic_titulo,
    tm_ticket.tic_descrip,
    tm_ticket.tic_estado,
    tm_ticket.fech_crea,
    tm_usuario.user_name,
    tm_usuario.user_lastname,
    tm_categoria.cat_name
    FROM
    tm_ticket
    INNER join tm_categoria on tm_ticket.cat_id = tm_categoria.cat_id
    INNER join tm_usuario on tm_ticket.usu_id = tm_usuario.user_id
    WHERE
    tm_ticket.tic_status = 1
    AND tm_ticket.tic_id = ?";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $tic_id);
    $sql->execute();
    return $resultado=$sql->fetchAll();
  }


   public function listar_ticketdetalle_by_ticket($tic_id){
    $conectar = parent::conexion();
    parent::set_names();
    $sql ="SELECT
    td_detalle_ticket.tic_det_id,
    td_detalle_ticket.tic_det_descrip,
    td_detalle_ticket.fech_crea,
    tm_usuario.user_name,
    tm_usuario.user_lastname,
    tm_usuario.rol_id
    FROM
    td_detalle_ticket INNER JOIN tm_usuario on td_detalle_ticket.usu_id = tm_usuario.user_id
    WHERE tic_id = ?";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $tic_id);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }

  public function insert_ticket_detalle($tic_id,$usu_id,$tic_det_descrip){
    try{
      $conectar = parent::conexion();
      parent::set_names();
      $sql= "INSERT INTO
      td_detalle_ticket (tic_det_id, tic_id, usu_id, tic_det_descrip, fech_crea, est) VALUES (NULL, ?, ?, ?, now(), '1');";
      $sql=$conectar->prepare($sql);
      $sql->bindValue(1, $tic_id);
      $sql->bindValue(2, $usu_id);
      $sql->bindValue(3, $tic_det_descrip);
      $sql->execute();

      if ($sql){
        return true;
      }else{
        return 0;
      }

    }catch (Exception $e){
      return $e;
    }
  }

  public function update_ticket($tic_id){
    $conectar = parent::conexion();
    parent::set_names();
    $sql="UPDATE tm_ticket SET tic_estado = 'cerrado' WHERE tic_id = ?";
    $sql=$conectar->prepare($sql);
    $sql->bindValue(1, $tic_id);
    $sql->execute();
    return $resultado = $sql->fetchAll();
  }

  public function insert_ticket_detalle_cerrar($tic_id,$usu_id){
    try{
      $conectar = parent::conexion();
      parent::set_names();
      $sql= "INSERT INTO
      td_detalle_ticket (tic_det_id, tic_id, usu_id, tic_det_descrip, fech_crea, est) VALUES (NULL, ?, ?, 'Ticket Cerrado...', now(), '1');";
      $sql=$conectar->prepare($sql);
      $sql->bindValue(1, $tic_id);
      $sql->bindValue(2, $usu_id);
      $sql->execute();

      if ($sql){
        return true;
      }else{
        return 0;
      }

    }catch (Exception $e){
      return $e;
    }
  }





  }



?>