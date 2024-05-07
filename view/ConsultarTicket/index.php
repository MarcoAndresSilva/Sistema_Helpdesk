<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["user_id"])) {
	?>

<!DOCTYPE html>
<html>

<?php
		require_once("../MainHead/head.php");
		?>

<title>Sistema Helpdesk - Consultar Ticket</title>
<body class="with-side-menu">

	<!--.site-header-->
	<?php
		require_once("../MainHeader/header.php");
		?>

	<!--nav-->
	<?php
		require_once("../MainNav/nav.php");
		?>

	<!-- contenido  -->
	<div class="page-content">
		<div class="container-fluid">
				<header class="section-header">
				<div class="tbl">
					<div class="tbl-row">
						<div class="tbl-cell">
							<h3>Consultar Ticket</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Consultar Ticket</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

		<div class="box-typical box-typical-padding">
			<table id="ticket_data" class="table table-bordered table-striped table-vcenter js-dataTable-full">
				<thead>
					<tr>
						<th style="width:5%;">N° Ticket</th>
						<th style="width:10%;">Categoria</th>
						<th class="d-none d-sm-table-cell" style="width:20%;">Titulo</th>
						<th class="d-none d-sm-table-cell" style="width:10%;">Estado</th>
						<th class="d-none d-sm-table-cell" style="width:15%;">Fecha Creación</th>
						<th class="text-center" style="width:5%;">Vista</th>
					</tr>
				</thead>
			</table>
		</div>

		</div>

	</div>

	<!--.page-content-->



	<?php require_once("../MainJs/js.php");?>
	<script type="text/javascript" src="consultarTicket.js"></script>



</body>

</html>

<?php
}else{
	header("Location:".Conectar::ruta()."index.php");
}
?>