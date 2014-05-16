		<nav>
			<div class="container">
 				<ul class="navbar derecha">
					<a href="<?php echo site_url(); ?>" class="btn btn-iniciar">
						Cerrar Sesión
					</a>
 				</ul>
			</div>
		</nav>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
						<fieldset class="menu" id="estructural">
							<center>
								<form id="form_estructura" action="<?php echo site_url('administrador/menu_estructura'); ?>" method="POST">
									<img class="img-menu" src="media/iconos/iconestructural.png">
									<h3>ESTRUCTURAL</h3>
									<p class="text-menu">
										Se establece la estructura base del sistema, determinada por el municipio al que pertenezca la comunidad
									</p>
								</form>
							</center>
						</fieldset>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
						<fieldset class="menu">
							<center>
								<form action="">
									<img class="img-menu" src="media/iconos/icongestion.png">
									<h3>GESTIÓN</h3>
									<p class="text-menu">
										Coordina las gestiones que realizan el Comité de Barrio y la ciudadanía ante las autoridades municipales
									</p>
								</form>
							</center>
						</fieldset>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
						<fieldset class="menu">
							<center>
								<form action="">
									<img class="img-menu" src="media/iconos/iconambiental.png">
									<h3>AMBIENTAL</h3>
									<p class="text-menu">
										Administra todas las actividades, programas y  eventos ambientales que se  organizan en la colonia para promover la cultura ambiental y la participación ciudadana
									</p>
								</form>
							</center>
						</fieldset>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
						<fieldset class="menu">
							<center>
								<form action="">
									<img class="img-menu" src="media/iconos/iconcultura.png">
									<h3>CULTURA Y DEPORTE</h3>
									<p class="text-menu">
										Coordina las actividades, programas y eventos culturales y deportivos que se realicen en la colonia para elevar la calidad de vida
									</p>
								</form>
							</center>
						</fieldset>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
						<fieldset class="menu">
							<center>
								<form action="">
									<img class="img-menu" src="media/iconos/iconseguridad.png">
									<h3>SEGURIDAD</h3>
									<p class="text-menu">
										Coordina acciones para promover la seguridad comunitaria
									</p>
								</form>
							</center>
						</fieldset>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
						<fieldset class="menu">
							<center>
								<form action="">
									<img class="img-menu" src="media/iconos/iconsalud.png">
									<h3>SALUD COMUNITARIA</h3>
									<p class="text-menu">
										Atención que se brinda a la comunidad, basada en la identificación de problemas de salud  y medicina preventiva comunitaria
									</p>
								</form>
							</center>
						</fieldset>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
						<fieldset class="menu">
							<center>
								<form action="">
									<img class="img-menu" src="media/iconos/iconservicios.png">
									<h3>SERVICIOS</h3>
									<p class="text-menu">
										Promueve  los servicios y productos  que proporciona la comunidad para generar el autoconsumo entre los miembros de la colonia
									</p>
								</form>
							</center>
						</fieldset>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
						<fieldset class="menu">
							<center>
								<form action="">
									<img class="img-menu" src="media/iconos/iconayuda.png">
									<h3>AYUDA</h3>
									<p class="text-menu">
										
									</p>
								</form>
							</center>
						</fieldset>
					</div>
				</div>
			</div>
		</section>
		<script>
			$('#estructural').click(function(){
				$('#form_estructura').submit();
			});
		</script>