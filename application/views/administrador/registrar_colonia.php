		<nav>
			<div class="container">
				<ul class="navbar izquierda">
 					<li><a href="<?php echo site_url('administrador'); ?>">Menú</a></li>
 					<li><a href="<?php echo site_url('administrador/estructura'); ?>">Estructura</a></li>
 					<li><a href="<?php echo site_url('administrador/colonias'); ?>">Colonias</a></li>
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
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<fieldset>
						<legend>Registro de Colonia</legend>
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
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
							<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
								<label for="municipio">
									<spam class="glyphicon glyphicon-asterisk requerido"></spam>Municipio
								</label>
								<select onchange="getColonia1(this.value)" name="" id="municipio">
									<option value="">Selecciona Municipio</option>
								</select>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
								<label for="colonia">
									<spam class="glyphicon glyphicon-asterisk requerido"></spam>Colonia
								</label>
								<select id="colonia">
									<option value="">Selecciona Colonia</option>
								</select>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
								<label for="fecha">Fecha Fundación</label>
								<input type="text" id="fecha">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
								<label for="habit">Número de habitantes</label>
								<input type="text" id="habit">
							</div>
							<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
								<label for="ubicacion">Ubicación</label>
								<input type="text" id="ubicacion">
							</div>
							<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
								<label for="extencion">Extensión geográfica</label>
								<input type="text" id="extencion">
							</div>
							<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
								
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<label for="diagnostico">
									<spam class="glyphicon glyphicon-asterisk requerido"></spam>Diagnóstico inicial
								</label>
								<textarea name="" id="diagnostico" cols="30" rows="5"></textarea>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<label for="">Croquis</label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3 col-xs-offset-9 col-sm-3 col-sm-offset-9 col-md-3 col-md-offset-9 col-lg-3 col-lg-offset-9">
								<label>
									<input type="button" value="Guardar" id="registrar_colonia" class="btn-lg btn-azul derecha">
								</label>
							</div>
						</div>
					</fieldset>
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
		<script type="text/javascript" src="js/registrar_colonia.js"></script>