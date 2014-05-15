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
				<article>
					<div class="row">
						<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
							<fieldset class="panel">
								<legend>COLONO</legend>
								<div class="lineal">
									<div class="grupo x3">
										<label>Nombre:</label>
										<input type="text" id="nombre_colono"/>
									</div>
									<div class="grupo x3">
										<label>Apellido Paterno:</label>
										<input type="text" id="apellido_p_colono"/>
									</div>
									<div class="grupo x3">
										<label>Apellido Materno:</label>
										<input type="text" id="apellido_m_colono"/>
									</div>
								</div>
								<div class="lineal">
									<div class="grupo x2">
										<label>Fecha de Nacimiento <small>(yyyy/mm/dd)</small>:</label>
										<input type="text" id="edad_colono">
										<!-- <select name="" id="edad_colono" class="select"></select> -->
									</div>
									<div class="grupo x2">
										<label>Sexo:</label>
										<select name="" id="sexo_colono" class="select">
											<option value=""></option>
											<option value="F">Femenino</option>
											<option value="M">Masculino</option>
										</select>
									</div>
								</div>
								<div class="lineal">
									<div class="grupo x2">
										<label>E-mail:</label>
										<input type="text" id="email_colono"/>
									</div>
									<div class="grupo x2">
										<label>Telefono Celular:</label>
										<input type="text" id="celular_colono"/>
									</div>
								</div>
								<div class="lineal">
									<div class="grupo x2">
										<label for="">Calle:</label>
										<select name="" id=""></select>
									</div>
									<div class="grupo x2">
										<label for="">Numero:</label>
										<input type="text">
									</div>
								</div>
								<label for="">Puesto:</label>
								<select name="" id="puesto"></select>								
								<div class="x3 derecha">
									<input type="button" value="AGREGAR" class="btn-submit" id="copia_datos"/>
								</div>
							</fieldset>
						</div>
						<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
							<fieldset class="panel">
								<legend>INTEGRANTES</legend>
								<ul class="integrantes" id="integrantes">
								</ul>
								<div class="lineal">
									<div class="grupo x2">
										<input type="button" value="CANCELAR" class="cancelar" id="cancelar_envio"/>
									</div>
									<div class="grupo x2">
										<input type="button" value="GUARDAR" id="enviar_datos"/>
									</div>
								</div>
							</fieldset>
						</div>
					</div>
				</article>
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