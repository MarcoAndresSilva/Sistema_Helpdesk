<header class="site-header">
	<div class="container-fluid">

		<a href="../Home/" class="site-logo">
			<img class="hidden-md-down" src="../../public/img/logo-meli.png" alt="">
		</a>

		<button id="show-hide-sidebar-toggle" class="show-hide-sidebar">
			<span>toggle menu</span>
		</button>

		<div class="site-header-content">
			<div class="site-header-content-in">
				<div class="site-header-shown">
					<div class="dropdown user-menu">
						<button class="dropdown-toggle" id="dd-user-menu" type="button" data-toggle="dropdown"
							aria-haspopup="true" aria-expanded="false">
							<img src="../../public/<?php echo $_SESSION["rol_id"] ?>.png" alt=""> <!-- le puse 1-2 a als imagens de avaar para aprovechar ese id para cambiar el icono de foto del usuario-->
						</button>
						<div class="dropdown-menu dropdown-menu-right" aria-labelledby="dd-user-menu">
							<a class="dropdown-item" href="#"><span
									class="font-icon glyphicon glyphicon-user"></span>Perfil</a>
							<a class="dropdown-item" href="#"><span
									class="font-icon glyphicon glyphicon-cog"></span>Configuración</a>
							<a class="dropdown-item" href="#"><span
									class="font-icon glyphicon glyphicon-question-sign"></span>Ayuda</a>
							<div class="dropdown-divider"></div>
							<a class="dropdown-item" href="../Logout/logout.php"><span
									class="font-icon glyphicon glyphicon-log-out"></span>Cerrar Sesión</a>
						</div>
					</div>

				</div><!--.site-header-shown-->

				<div class="mobile-menu-right-overlay"></div>

				<input type="hidden" id="user_idx" value="<?php echo $_SESSION["user_id"]?>">  <!--id del usuario-->
				<input type="hidden" id="rol_idx" value="<?php echo $_SESSION["rol_id"]?>">		<!--rol del usuario-->


				<div class="site-header-collapsed">
					<div class="dropdown dropdown-typical">
						<a href="#" class="dropdown-toggle no-arr">
							<span class="font-icon font-icon-user"></span>
							<span class="lblcontactonomx">
								<?php  echo $_SESSION["user_name"] ?>
								<?php  echo $_SESSION["user_lastname"] ?>
							</span>
						</a>
					</div>

					<div class="site-header-collapsed-in">
						<div class="site-header-search-container">
							<form class="site-header-search closed">
								<input type="text" placeholder="Search" />
								<button type="submit">
									<span class="font-icon-search"></span>
								</button>
								<div class="overlay"></div>
							</form>
						</div>
					</div><!--.site-header-collapsed-in-->

				</div><!--.site-header-collapsed-->

			</div><!--site-header-content-in-->
		</div><!--.site-header-content-->
	</div><!--.container-fluid-->
</header><!--.site-header-->
