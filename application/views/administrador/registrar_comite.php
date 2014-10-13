		<nav>
			<div class="container">
				<ul class="navbar izquierda">
 					<li><a href="<?php echo site_url('administrador'); ?>">Menú</a></li>
 					<li><a href="<?php echo site_url('administrador/estructura'); ?>">Estructura</a></li>
 					<li><a href="<?php echo site_url('administrador/comites'); ?>">Comites</a></li>
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
					<div class="col-xs-12 col-sm-12 col-md-6 col-lg-6 col-md-offset-3 col-lg-offset-3">
						<center>
							<div id="mensaje2" class="alert alert-danger alert-dismissable mensaje"></div>
						</center>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<fieldset>
							<legend>Comité de barrio</legend>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label for="estado">
										<spam class="glyphicon glyphicon-asterisk requerido"></spam>Estado
									</label>
									<select onchange="getMunicipio(this.value)" id="estado">
										<option value="">Selecciona Estado</option>
									<?php foreach($estado->result() as $est){?>
										<option value="<?php echo $est->Id?>"><?php echo $est->Nombre?></option>
									<?php }?>
									</select>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label for="municipio">
										<spam class="glyphicon glyphicon-asterisk requerido"></spam>Municipio
									</label>
									<select  onchange="getColonia(this.value)" id="municipio">
										<option value="">Selecciona Municipio</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label for="colonia">
										<spam class="glyphicon glyphicon-asterisk requerido"></spam>Colonia
									</label>
									<select id="colonia">
										<option value="">Selecciona Colonia</option>
									</select>	
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label for="comite">
										<spam class="glyphicon glyphicon-asterisk requerido"></spam>Nombre
									</label>
									<input id="comite" type="text" />
								</div>
								
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label for="integrantes">No. de integrantes</label>
									<input id="integrantes" type="text" />
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label for="fundacion">Fecha de fundación</label>
									<input id="fundacion" type="text" readonly/>
								</div>
							</div>
						</fieldset>
					</div>
					<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
						<fieldset class="panel">
							<legend>Presidente del Comité</legend>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label for="nombre">
										<spam class="glyphicon glyphicon-asterisk requerido"></spam>Nombre
									</label>
									<input id="nombre" type="text" />
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label for="apaterno">
										<spam class="glyphicon glyphicon-asterisk requerido"></spam>Apellido Paterno
									</label>
									<input id="apaterno" type="text" />
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label for="amaterno">
										<spam class="glyphicon requerido"></spam>Apellido Materno
									</label>
									<input id="amaterno" type="text" />
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label for="sexo_colono">Sexo</label>
									<select id="sexo_colono">
										<option value="">Selecciona Sexo</option>
										<option value="F">Femenino</option>
										<option value="M">Masculino</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label for="correo">E-mail</label>
									<input id="correo" type="text" />
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label for="cel">Teléfono Celular</label>
									<input id="cel" type="text" />
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label for="calle">
										<spam class="glyphicon glyphicon-asterisk requerido"></spam>Calle
									</label>
									<input id="calle" type="text" />
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label for="numero">
										<spam class="glyphicon glyphicon-asterisk requerido"></spam>Número
									</label>
									<input id="numero" type="text" />
								</div>
							</div>
							<div class="row">
								<div class="col-xs-4 col-xs-offset-8 col-sm-4 col-sm-offset-8 col-md-4 col-md-offset-8 col-lg-4 col-lg-offset-8">
									<label>
										<input type="button" value="Guardar" id="registrar_comite" class="btn-lg btn-azul derecha">
									</label>
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
		<script type="text/javascript" src="js/registrar_comite.js"></script>