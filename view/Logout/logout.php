<?php
require_once("../../config/conexion.php");
session_destroy();
header("Location:". "http://localhost/sistema_helpdesk/");
exit();
?>