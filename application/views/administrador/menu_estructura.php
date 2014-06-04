		<nav>
			<div class="container">
				<ul class="navbar izquierda">
 					<li><a href="<?php echo site_url('administrador'); ?>">Menu</a></li>
 				</ul>
 				<ul class="navbar derecha">
					<a href="<?php echo site_url('administrador/logout'); ?>" class="btn btn-iniciar">
						Cerrar Sesión
					</a>
 				</ul>
			</div>
		</nav>
		<section>
			<div class="container">
				<article>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"></div>
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
							<center>
								<img src="" alt=""><br>
								<!-- <form action="<?php echo site_url('administrador/formulario_registrar_ayuntamiento'); ?>" method="post">
									<input type="submit" value="REGISTRAR AYUNTAMIENTO">
								</form> -->
								<form action="<?php echo site_url('administrador/formulario_registrar_colonia'); ?>" method="post">
									<input type="submit" value="REGISTRAR COLONIA">
								</form>
								<form action="<?php echo site_url('administrador/formulario_registrar_comite'); ?>" method="post">
									<input type="submit" value="REGISTRAR COMITE">
								</form>
								<!-- <form action="<?php echo site_url('administrador/menu_estructura'); ?>" method="post">
									<input type="submit" value="REGISTRAR FUNCIONARIO">
								</form> -->
							</center>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"></div>
					</div>
				</article>
			</div>
		</section>