		<nav>
			<div class="container">
				<ul class="navbar izquierda">
 					<li><a href="<?php echo site_url('representante_calle'); ?>">Menu</a></li>
 				</ul>
 				<ul class="navbar derecha">
					<a href="<?php echo site_url(); ?>" class="btn btn-iniciar">
						Cerrar Sesión
					</a>
 				</ul>
			</div>
		</nav>
		<section>
			<div class="container">
				<article>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<article>
								<div class="row">
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"></div>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4">
										<center>
											<img src="" alt=""><br>
											<form action="<?php echo site_url('representante_calle/formulario_registrar_casa'); ?>" method="post">
												<input type="submit" value="REGISTRAR CASA">
											</form>
										</center>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"></div>
								</div>
							</article>					
						</div>
					</div>
				</article>
			</div>
		</section>