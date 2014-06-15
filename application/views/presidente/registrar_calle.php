		<nav>
			<div class="container">
				<ul class="navbar izquierda">
 					<li><a href="<?php echo site_url('presidente'); ?>">Menú</a></li>
 					<li><a href="<?php echo site_url('presidente/estructura'); ?>">Estructura</a></li>
 					<li><a href="<?php echo site_url('presidente/calles'); ?>">Calles</a></li>
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
				<div class="row">
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<fieldset>
							<legend>Calle</legend>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<label for="nombre">
										<spam class="glyphicon glyphicon-asterisk requerido"></spam>Nombre
									</label>
									<input type="text" id="nombre">
								</div>
							</div>
							<div class="row">
								<div class="col-xs-4 col-xs-offset-8 col-sm-4 col-sm-offset-8 col-md-4 col-md-offset-8 col-lg-4 col-lg-offset-8">
									<label>
										<input type="button" value="Agregar" id="agregar" class="btn-lg btn-azul derecha">
									</label>
								</div>
							</div>
						</fieldset>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<fieldset>
							<legend>Lista</legend>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<ul class="integrantes" id="calles"></ul>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<input type="button" value="Cancelar" id="cancelar" class="btn-lg btn-block btn-rojo">
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<input type="button" value="Guardar" id="guardar" class="btn-lg btn-block btn-azul">
								</div>
							</div>
						</fieldset>
					</div>
				</div>
			</div>
		</section>
		<div class="modal dialogo fade" id="alert">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="titulo_alert"></h4>
					</div>
					<div class="modal-body">
						<p id="texto_alert"></p>
						<input type="button" value="Aceptar" data-dismiss="modal" class="btn-lg btn-block btn-azul">
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="js/registrar_calle.js"></script>