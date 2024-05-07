<?php
require_once("../../config/conexion.php");
if (isset($_SESSION["user_id"])) {
	?>

<!DOCTYPE html>
<html>

<?php
		require_once("../MainHead/head.php");
		?>

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
	</div>
	<!--.page-content-->


	<?php require_once("../MainJs/js.php");?>
	<script type="text/javascript" src="home.js"></script>



</body>

</html>

<?php
}else{
	header("Location:".Conectar::ruta()."index.php");
}
?>