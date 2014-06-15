		<nav>
			<div class="container">
				<ul class="navbar izquierda">
 					<li><a href="<?php echo site_url('presidente'); ?>">Menú</a></li>
 				</ul>
 				<ul class="navbar derecha">
					<a href="<?php echo site_url('presidente/logout'); ?>" class="btn btn-rojo">
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
										<fieldset>
											<legend>Menú</legend>
											<label>
												<a href="<?php echo site_url('presidente/calles'); ?>" class="btn btn-lg btn-block btn-azul">Calles</a>
											</label>
											<label>
												<a href="<?php echo site_url('presidente/miembros'); ?>" class="btn btn-lg btn-block btn-azul">Miembros del Comite de Barrio</a>
											</label>
											<label>
												<a href="<?php echo site_url('presidente/representantes'); ?>" class="btn btn-lg btn-block btn-azul">Representantes de Calles</a>
											</label>
										</fieldset>
									</div>
									<div class="col-xs-12 col-sm-12 col-md-4 col-lg-4"></div>
								</div>
							</article>					
						</div>
					</div>
				</article>
			</div>
		</section>