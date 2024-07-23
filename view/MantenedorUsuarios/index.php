<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["user_id"])) {
?>

<!DOCTYPE html>
<html>
	<?php require_once("../MainHead/head.php");?>

	<title>Sistema Helpdesk - Mantenedor Usuarios</title>
</head>

<body class="with-side-menu">
	<!--.site-header-->
	<?php	require_once("../MainHeader/header.php");?>

	<div class="mobile-menu-left-overlay"></div>

	<!--nav-->
	<?php require_once("../MainNav/nav.php");?>

	<!-- contenido  -->
	 <!-- contenido  -->
    <div class="page-content">
      <div class="container-fluid">
        <header class="section-header">
          <div class="tbl">
            <div class="tbl-row">
              <div class="tbl-cell">
                <h3>Mantenedor Usuarios</h3>
                <ol class="breadcrumb breadcrumb-simple">
                  <li><a href="#">Home</a></li>
                  <li class="active">Mantenedor Usuarios</li>
                </ol>
              </div>
            </div>
          </div>
        </header>

        <div class="box-typical box-typical-padding">
          <button type="button" id="btnNuevoRegistro" class="btn btn-inline btn-primary" data-bs-toggle="modal" data-bs-target="#modalmantenimiento">
            Nuevo Usuario +
          </button>

          <table id="usuario_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
            <thead>
              <tr>
                <th style="width:5%;">Nombre</th>
                <th style="width:10%;">Apellido</th>
                <th class="d-none d-sm-table-cell" style="width:20%;">Correo</th>
                <th class="d-none d-sm-table-cell" style="width:10%;">contraseña</th>
                <th class="d-none d-sm-table-cell" style="width:15%;">Rol</th>
                <th class="text-center" style="width:5%;">Editar</th>
                <th class="text-center" style="width:5%;">Eliminar</th>
              </tr>
            </thead>
            <tbody></tbody>
          </table>
        </div>
      </div>
    </div>

  <?php require_once("modalmantenimiento.php");?>
	<?php require_once("../MainJs/js.php");?>
	<script type="text/javascript" src="mantenedorusuarios.js"></script>

</body>

</html>

<?php
}else{
	header("Location:".Conectar::ruta()."index.php");
}

?>