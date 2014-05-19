		<nav>
			<div class="container">
				<ul class="navbar izquierda">
 					<li><a href="<?php echo site_url('presidente'); ?>">Menu</a></li>
 					<li><a href="<?php echo site_url('presidente/menu_estructura'); ?>">Estructura</a></li>
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
				<div class="row">
					<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
						<fieldset>
							<legend>COLONO</legend>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label>Nombre</label>
									<input type="text" id="nombre_colono"/>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label>Apellido Paterno</label>
									<input type="text" id="apellido_p_colono"/>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label>Apellido Materno</label>
									<input type="text" id="apellido_m_colono"/>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label>Fecha de Nacimiento</label>
									<input type="text" id="edad_colono">
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label>Sexo</label>
									<select name="" id="sexo_colono" class="select">
										<option value="">Selecciona Sexo</option>
										<option value="F">Femenino</option>
										<option value="M">Masculino</option>
									</select>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label for="">Calle a Representar</label>
									<select name="" id="puesto"></select>	
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label>E-mail</label>
									<input type="text" id="email_colono"/>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label>Telefono Celular</label>
									<input type="text" id="celular_colono"/>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label for="">Calle</label>
									<select name="" id=""></select>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label for="">Numero</label>
									<input type="text">
								</div>
							</div>
							<div class="row">
								<div class="col-xs-4 col-xs-offset-8 col-sm-4 col-sm-offset-8 col-md-4 col-md-offset-8 col-lg-4 col-lg-offset-8">
									<input type="button" value="AGREGAR" class="btn-submit" id="copia_datos"/>
								</div>
							</div>
						</fieldset>
					</div>
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<fieldset>
							<legend>INTEGRANTES</legend>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<ul class="integrantes" id="integrantes"></ul>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<input type="button" value="CANCELAR" id="cancelar_envio" class="rojo">
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<input type="button" value="GUARDAR" id="enviar_datos" class="">
								</div>
							</div>
						</fieldset>
					</div>
				</div>
			</div>
		</section>
		<script>
			var array_colonos = [];
			var cadena = "";
			$('#copia_datos').click(function(){
				var nombre = $('#nombre_colono').val();
				var apellido_p = $('#apellido_p_colono').val();
				var apellido_m = $('#apellido_m_colono').val();
				var fecha = $('#edad_colono').val();
				var sexo = $('#sexo_colono').val();
				var email = $('#email_colono').val();
				var telefono = $('#celular_colono').val();
				var puesto = $('#puesto').val();
				if(!nombre == "" && !apellido_p == "" && !apellido_m == "" && !puesto){
					var array_datos = [apellido_p, apellido_m, fecha, nombre, email, sexo, telefono];
					array_colonos.push(array_datos);
					cadena +="<li><i class='fa fa-user'></i> "+nombre+" "+apellido_p+" "+apellido_m+" "+puesto+"</li>";
					$("#integrantes").html(cadena);
				} else{
					$('#titulo_alert').html("Error..!!");
					$('#texto_alert').html("Error al guardar los datos");
					$('#alert').modal('show');
				}
				
			});
		</script>
		<div class="modal dialogo fade" id="alert">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title" id="titulo_alert"></h4>
					</div>
					<div class="modal-body">
						<p id="texto_alert"></p>
						<input type="button" value="Aceptar" data-dismiss="modal">
					</div>
				</div>
			</div>
		</div>