		<nav>
			<div class="container">
				<ul class="navbar izquierda">
 					<li><a href="<?php echo site_url('presidente'); ?>">Menú</a></li>
 					<li><a href="<?php echo site_url('presidente/estructura'); ?>">Estructura</a></li>
 					<li><a href="<?php echo site_url('presidente/representantes'); ?>">Representantes</a></li>
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
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<div id="usuario_contrasena">
							<div id="mensaje" class="alert alert-info fade in">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<div id="text_usuario_contrasena"></div>
							</div>
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
						<fieldset>
							<legend>Representante</legend>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label for="nombre_colono">
										<spam class="glyphicon glyphicon-asterisk requerido"></spam>Nombre
									</label>
									<input type="text" id="nombre_colono"/>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label for="apellido_p_colono">
										<spam class="glyphicon glyphicon-asterisk requerido"></spam>Apellido Paterno
									</label>
									<input type="text" id="apellido_p_colono"/>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label for="apellido_m_colono">
										<spam class="glyphicon glyphicon-asterisk requerido"></spam>Apellido Materno
									</label>
									<input type="text" id="apellido_m_colono"/>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label for="edad_colono">Fecha de Nacimiento</label>
									<input type="text" id="edad_colono">
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label for="sexo_colono">Sexo</label>
									<select id="sexo_colono" class="select">
										<option value="">Selecciona Sexo</option>
										<option value="F">Femenino</option>
										<option value="M">Masculino</option>
									</select>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label for="calle_representar">
										<spam class="glyphicon glyphicon-asterisk requerido"></spam>Calle a Representar
									</label>
									<select id="calle_representar">
										<option value="">Selecciona Calle</option>
										<?php foreach ($calles as $row) { ?>
										<option value="<?php echo $row->Id; ?>"><?php echo $row->Nombre; ?></option>
										<?php } ?>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label for="email_colono">E-mail</label>
									<input type="text" id="email_colono"/>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label for="celular_colono">Telefono Celular</label>
									<input type="text" id="celular_colono"/>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label for="calle_colono">
										<spam class="glyphicon glyphicon-asterisk requerido"></spam>Calle
									</label>
									<select id="calle_colono">
										<option value="">Selecciona Calle</option>
										<?php foreach ($calles as $row) { ?>
										<option value="<?php echo $row->Id; ?>"><?php echo $row->Nombre; ?></option>
										<?php } ?>
									</select>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label for="numero_colono">
										<spam class="glyphicon glyphicon-asterisk requerido"></spam>Numero
									</label>
									<input type="text" id="numero_colono">
								</div>
							</div>
							<div class="row">
								<div class="col-xs-4 col-xs-offset-8 col-sm-4 col-sm-offset-8 col-md-4 col-md-offset-8 col-lg-4 col-lg-offset-8">
									<label>
										<input type="button" value="Agregar" class="btn-lg btn-azul derecha" id="copia_datos"/>
									</label>
								</div>
							</div>
						</fieldset>
					</div>
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<fieldset>
							<legend>Integrantes</legend>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<ul class="integrantes" id="integrantes"></ul>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<input type="button" value="Cancelar" id="cancelar_envio" class="btn-lg btn-block btn-rojo">
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<input type="button" value="Guardar" id="enviar_datos" class="btn-lg btn-block btn-azul">
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
		<script type="text/javascript" src="js/datepicker.js"></script>
		<script type="text/javascript" src="js/datepicker.es.js"></script>
		<script type="text/javascript" src="js/formatter.js"></script>
		<script type="text/javascript" src="js/registrar_representantes.js"></script>