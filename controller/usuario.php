<?php
require_once("../config/conexion.php");
require_once("../models/Usuario.php");
$usuario = new Usuario();

switch ($_GET["op"]) {
  case "guardaryeditar":
    if (empty($_POST["user_id"])){
        if (is_array($datos) == true and count($datos) == 0){
          $usuario->insert_usuario($_POST["user_name"],$_POST["user_lastname"],$_POST["user_mail"],$_POST["user_pass"],$_POST["rol_id"]);
        }
    }else {
      $usuario->update_usuario($_POST["user_id"], $_POST["user_name"],$_POST["user_lastname"],$_POST["user_mail"],$_POST["user_pass"],$_POST["rol_id"]);
    }
  break;

  case "listar":

      $datos = $usuario->get_usuario();
      $data = Array();
      foreach ($datos as $row) {
        $sub_array = array();
        $sub_array[] = $row["user_name"];
        $sub_array[] = $row["user_lastname"];
        $sub_array[] = $row["user_mail"];
        $sub_array[] = $row["user_pass"];

        if ($row["rol_id"] == 1) {
          $sub_array[] = '<span class="label label-pill label-success">Usuario</span>';
        } else {
          $sub_array[] = '<span class="label label-pill label-info">Soporte</span>';
        }

        $sub_array[] = '<button type="button" onClick="editar('.$row["user_id"].');" id="'.$row["user_id"].'" class="btn btn-inline btn-warning btn-sm ladda-button"><i class="fa fa-edit"></i></button>';
        $sub_array[] = '<button type="button" onClick="eliminar('.$row["user_id"].');" id="'.$row["user_id"].'" class="btn btn-inline btn-danger btn-sm ladda-button"><i class="fa fa-trash"></i></button>';

        $data[] = $sub_array;
      }

      $results = array(
        "sEcho" => 1,
        "iTotalRecords" =>count($data),
        "iTotalDisplayRecords" => count($data),
        "aaData" => $data);

      echo json_encode($results);
  break;

  case "eliminar":
      $usuario->delete_usuario($_POST["user_id"]);
  break;

  case "mostrar":
      $datos = $usuario->get_usuario_by_id($_POST["user_id"]);
      if (is_array($datos) == true and count($datos) > 0) {
        foreach ($datos as $row) {
          $output["user_id"] = $row["user_id"];
          $output["user_name"] = $row["user_name"];
          $output["user_lastname"] = $row["user_lastname"];
          $output["user_mail"] = $row["user_mail"];
          $output["user_pass"] = $row["user_pass"];
          $output["rol_id"] = $row["rol_id"];
        }
        echo json_encode($output);
      }
  break;

}


?>