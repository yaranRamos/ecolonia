		<nav>
			<div class="container">
				<ul class="navbar izquierda">
 					<li><a href="<?php echo site_url('administrador'); ?>">Menú</a></li>
 				</ul>
 				<ul class="navbar derecha">
					<a href="<?php echo site_url('administrador/logout'); ?>" class="btn btn-rojo">
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
							<fieldset>
								<legend>Menú Soporte</legend>
								<label>
									<a href="<?php echo site_url('administrador/presidentes_comite'); ?>" class="btn btn-lg btn-block btn-azul">Presidentes de comité de barrio</a>
								</label>
								<label>
									<a class="btn btn-lg btn-block btn-azul">Nueva</a>
								</label>
							</fieldset>
						</div>
						<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"></div>
					</div>
				</article>
			</div>
		</section>