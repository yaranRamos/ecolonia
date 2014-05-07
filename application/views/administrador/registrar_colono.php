		<section>
			<div class="container">
				<form action="">
				<article>
					<div class="row">
						<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
							<fieldset class="panel">
								<legend>DOMICILIO</legend>
								<div class="lineal">
									<div class="grupo x3">
										<label for="">Familia</label>
										<input type="text" placeholder="Perez Garcia" id="familia_casa">
									</div>
									<div class="grupo x5">
										<label for="">Telefono:</label>
										<input type="text" id="telefono_casa">
									</div>
								</div>
								<div class="lineal">
									<div class="grupo x5">
										<label for="">Estado:</label>
										<select  onchange="getMunicipio(this.value)" name="estado_id" id="estado">
											<option value="">Selecciona Estado</option>
											<?php foreach($estado->result() as $estado){?>
											<option value="<?php echo $estado->Id?>"><?php echo $estado->Nombre?></option>
											<?php }?>
										</select>
									</div>
									<div class="grupo x5">
										<label for="">Municipio:</label>
										<select name="" id="municipio">
											<option value="">Selecciona Municipio</option>
											
										</select>
									</div>
									<div class="grupo x5">
										<label for="">Colonia:</label>
										<select name="" id="colonia_casa">
											<option value=""></option>
											<option value="1">Fracc. Arboledas</option>
										</select>
									</div>
									<div class="grupo x5">
										<label for="">Calle:</label>
										<select name="" id="calle_casa">
											<option value=""></option>
											<option value="1">Aacias</option>
											<option value="2">Tulipanes</option>
											<option value="3">Parotas</option>
										</select>
									</div>
									<div class="grupo x5">
										<label for="">Numero:</label>
										<input type="text" id="numero_casa">
									</div>
								</div>
								<div class="x4 derecha">
									<input type="button" value="Registrar Casa" id="registrar_casa">
								</div>
							</fieldset>
						</div>
					</div>
				</article>
				<article class="oculto" id="registrar_datos">
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
										<label>Estatura:</label>
										<input type="text" id="estatura_colono">
										<!-- <select name="" id="estatura_colono" class="select"></select> -->
									</div>
									<div class="grupo x2">
										<label>Peso:</label>
										<input type="text" id="peso_colono">
										<!-- <select name="" id="peso_colono" class="select"></select> -->
									</div>
								</div>
								<label>E-mail:</label>
								<input type="text" id="email_colono"/>
								<label>Telefono Celular:</label>
								<input type="text" id="celular_colono"/>
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
				</form>
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
				var estado = $('#estado_casa').val();
				var municipio = $('#municipio_casa').val();
				var colonia = $('#colonia_casa').val();
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