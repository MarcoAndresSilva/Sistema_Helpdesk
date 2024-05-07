<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["user_id"])) {
	?>

<!DOCTYPE html>
<html>

<?php
		require_once("../MainHead/head.php");
		?>
<title>Sistema Helpdesk - Nuevo Ticket</title>

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
							<h3>Nuevo Ticket</h3>
							<ol class="breadcrumb breadcrumb-simple">
								<li><a href="#">Home</a></li>
								<li class="active">Nuevo Ticket</li>
							</ol>
						</div>
					</div>
				</div>
			</header>

			<div class="box-typical box-typical-padding">

				<div class="row">

					<form method="post" id="ticket_form">

						<input type="hidden" id="usu_id" name="usu_id" value="<?php echo $_SESSION["user_id"]?>">

						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="exampleInput">Categoria</label>
								<select id="cat_id" name="cat_id" class="form-control">
									<!-- <option>Hardware</option>
								<option>Software</option>
								<option>Otros</option> -->

								</select>
							</fieldset>
						</div>
						<div class="col-lg-6">
							<fieldset class="form-group">
								<label class="form-label semibold" for="tic_titulo">Titulo</label>
								<input type="text" class="form-control" id="tic_titulo" name="tic_titulo" placeholder="Ingrese Titulo">
							</fieldset>
						</div>
						<div class="col-lg-12">
							<fieldset class="form-group">
								<label class="form-label semibold" for="tic_descrip">Descripción</label>
								<div class="summernote-theme-1">
									<textarea class="summernote" name="tic_descrip" id="tic_descrip"></textarea>
								</div>
							</fieldset>
						</div>
						<div class="col-lg-12">
							<button type="submit" name="action" value="add"
								class="btn btn-rounded btn-inline btn-primary">Guardar</button>
						</div>
					</form>
				</div>
				<!--.row-->

			</div>
			<!--.box-typical-->
		</div>
	</div>

	<!--.container-fluid-->
	<!--.page-content-->



	<?php require_once("../MainJs/js.php");?>
	<script type="text/javascript" src="nuevoticket.js"></script>



</body>

</html>

<?php
}else{
	header("Location:".Conectar::ruta()."index.php");
}
?>