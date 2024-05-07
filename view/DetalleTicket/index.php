<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["user_id"])) {
	?>

<!DOCTYPE html>
<html>

<?php
		require_once("../MainHead/head.php");
		?>

<title>Sistema Helpdesk - Detalle Ticket</title>
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
								<h3 id="lblNomIdTicket"></h3>
								<div id="lblEstado"></div>
								<span class="label label-pill label-primary" id="lblNomUsuario"></span>
								<span class="label label-pill label-warning" id="lblFechaCrea"></span>
								<ol class="breadcrumb breadcrumb-simple">
									<li><a href="#">Inicio</a></li>
									<li class="active">Consultar Ticket</li>
								</ol>
							</div>
						</div>
					</div>
			</header>

			<div class="row">

					<div class="col-lg-6">
						<fieldset class="form-group">
							<label class="form-label semibold" for="exampleInput">Categoria</label>
							<input type="text" class="form-control" id="cat_name" name="cat_name" readonly>
						</fieldset>
					</div>

					<div class="col-lg-6">
						<fieldset class="form-group">
						<label class="form-label semibold" for="tic_titulo">Titulo</label>
							<input type="text" class="form-control" id="tic_titulo" name="tic_titulo" readonly>
						</fieldset>
					</div>

					<div class="col-lg-12">
						<fieldset class="form-group">
							<label class="form-label semibold" for="tic_descripUsu">Descripción</label>
								<div class="summernote-theme-1">
									<textarea class="summernote" name="tic_descripUsu" id="tic_descripUsu"></textarea>
								</div>
						</fieldset>
					</div>

				</div>

      <section class="activity-line" id="lblDetalle">	</section>

				<div class="box-typical box-typical-padding" id="pnlDetalle">
					<p>Actualilce la informacòn del ticket</p>

					<div class="row">
							<div class="col-lg-12">
								<fieldset class="form-group">
									<label class="form-label semibold" for="tic_det_descrip">Descripción</label>
									<div class="summernote-theme-1">
										<textarea class="summernote" id="tic_det_descrip"></textarea>
									</div>
								</fieldset>
							</div>
							<div class="col-lg-12">
								<button type="button" id="btnEnviar" class="btn btn-rounded btn-inline btn-primary">Enviar</button>
							</div>
								<div class="col-lg-12">
								<button type="button" id="btnCerrarTicket" class="btn btn-rounded btn-inline btn-warning">Cerrar Ticket</button>
							</div>
					</div>
					<!--.row-->
				</div>
				<!--.box-typical-->

		</div>

	</div>

	<!--.page-content-->



	<?php require_once("../MainJs/js.php");?>
	<script type="text/javascript" src="./detalleticket.js"></script>


</body>

</html>

<?php
}else{
	header("Location:".Conectar::ruta()."index.php");
}
?>