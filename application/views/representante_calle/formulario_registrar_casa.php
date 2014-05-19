		<nav>
			<div class="container">
				<ul class="navbar izquierda">
 					<li><a href="<?php echo site_url('representante_calle'); ?>">Menu</a></li>
 					<li><a href="<?php echo site_url('representante_calle/menu_estruc_rep'); ?>">Estructura</a></li>
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
					<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
						<fieldset>
							<legend>CASA</legend>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label for="">Familia</label>
									<input type="text" placeholder="Perez Garcia" id="familia_casa">
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label for="">Teléfono:</label>
									<input type="text" id="telefono_casa">
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label for="">Número:</label>
									<input type="text" id="numero_casa">
								</div>
							</div>
						</fieldset>
					</div>
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
									<label>E-mail</label>
									<input type="text" id="email_colono"/>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label>Telefono Celular</label>
									<input type="text" id="celular_colono"/>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									
								</div>
							</div>
							<div class="row">
								<div class="col-xs-4 col-xs-offset-8 col-sm-4 col-sm-offset-8 col-md-4 col-md-offset-8 col-lg-4 col-lg-offset-8">
									<input type="button" value="AGREGAR" class="btn-submit" id="copia_datos"/>
								</div>
							</div>
						</fieldset>
					</div>
				</div>
			</div>
		</section>
		<script type="text/javascript" src="js/jquery.formatter.js"></script>
		<script>
			$('#edad_colono').formatter({
				'pattern': '{{9999}}-{{99}}-{{99}}',
				'persistent': true
			});
			$('#telefono_casa').formatter({
				'pattern': '({{999}})-{{999}}-{{9999}}',
				'persistent': true
			});
			$('#celular_colono').formatter({
				'pattern': '{{999}}-{{999}}-{{9999}}',
				'persistent': true
			});
			$('#estatura_colono').formatter({
				'pattern': '{{9}}.{{99}}',
				'persistent': true
			});
			$('#peso_colono').formatter({
				'pattern': '{{999}}',
				'persistent': true
			});
			$('#numero_casa').formatter({
				'pattern': '{{9999}}',
				'persistent': true
			});
			var id_casa;
			var array_colonos = [];
			var cadena = "";

			$('#registrar_casa').click(function(){
				var familia = $('#familia_casa').val();
				var telefono = $('#telefono_casa').val();
				var estado = $('#estado').val();
				var municipio = $('#municipio').val();
				var colonia = $('#colonia').val();
				var calle = $('#calle_casa').val();
				var numero = $('#numero_casa').val();
				if(!familia == "" && !estado == "" && !municipio == "" && !colonia == "" && !calle == "" && !numero == ""){
					$.ajax({
						type: "POST",
						url: "http://localhost/ecolonia/index.php/administrador/registrar_casa",
						data: {familia:familia, telefono:telefono, estado:estado, municipio:municipio, colonia:colonia, calle:calle, numero:numero},
						success: function(msg){
							var array = msg.split('"');
							id_casa = array[1];
						}
					});
					$('#registrar_casa').attr('disabled','disabled');
					$('#registrar_datos').removeClass('oculto');
				} else{
					$('#titulo_alert').html("Error..!!");
					$('#texto_alert').html("Ingrese los datos requeridos");
					$('#alert').modal('show');
				}
			});

			$('#copia_datos').click(function(){
				var nombre = $('#nombre_colono').val();
				var apellido_p = $('#apellido_p_colono').val();
				var apellido_m = $('#apellido_m_colono').val();
				var fecha = $('#edad_colono').val();
				var sexo = $('#sexo_colono').val();
				var estatura = $('#estatura_colono').val();
				var peso = $('#peso_colono').val();
				var email = $('#email_colono').val();
				var telefono = $('#celular_colono').val();
				var array_datos = [id_casa, apellido_p, apellido_m, fecha, estatura, nombre, peso, email, sexo, telefono];
				array_colonos.push(array_datos);
				cadena +="<li><i class='fa fa-user'></i> "+nombre+" "+apellido_p+" "+apellido_m+"</li>";
				$("#integrantes").html(cadena);
			});

			$('#enviar_datos').click(function(){
				$.ajax({
					type: "POST",
					url: "http://localhost/ecolonia/index.php/administrador/resibe_datos_colono",
					data: {colonos:array_colonos},
					success: function(msg){
						if(msg = "true"){
							$('#titulo_alert').html("Aviso");
							$('#texto_alert').html("Los datos se guardaron correctamente");
							$('#alert').modal('show');
						} else{
							$('#titulo_alert').html("Error..!!");
							$('#texto_alert').html("Error al guardar los datos");
							$('#alert').modal('show');
						}
					}
				});
			});

			$('#cancelar_envio').click(function(){
				array_colonos = [];
				cadena = "";
				$("#integrantes").html(cadena);
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