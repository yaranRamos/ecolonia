		<nav>
			<div class="container">
				<ul class="navbar izquierda">
 					<li><a href="<?php echo site_url('administrador'); ?>">Menu</a></li>
 					<li><a href="<?php echo site_url('administrador/menu_estructura'); ?>">Estructura</a></li>
 				</ul>
 				<ul class="navbar derecha">
					<a href="<?php echo site_url('administrador/logout'); ?>" class="btn btn-iniciar">
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
							<legend>COMITE DE BARRIO</legend>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label>Nombre</label>
									<input id="comite" type="text" />
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label>No. de integrantes</label>
									<input id="integrantes" type="text" />
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label>Fecha de fundación</label>
									<input id="fundacion" type="text" />
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label>Estado</label>
									<select onchange="getMunicipio(this.value)" name="" id="estado" class="select">
										<option value="">Selecciona Estado</option>
									<?php foreach($estado->result() as $est){?>
										<option value="<?php echo $est->Id?>"><?php echo $est->Nombre?></option>
									<?php }?>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label>Municipio</label>
									<select  onchange="getColonia(this.value)" name="" id="municipio" class="select">
										<option value="">Selecciona Municipio</option>
									</select>
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label>Colonia</label>
									<select name="" id="colonia" class="select">
										<option value="">Selecciona Colonia</option>
									</select>	
								</div>
							</div>
						</fieldset>
						<div id="usuario_contrasena">
							<div id="mensaje" class="alert alert-danger fade in">
								<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
								<div id="text_usuario_contrasena"></div>
							</div>
						</div>
					</div>
					<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
						<fieldset class="panel">
							<legend>PRESIDENTE</legend>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label>Nombre</label>
									<input id="nombre" type="text" />
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label>Apellido Paterno</label>
									<input id="apaterno" type="text" />
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label>Apellido Materno</label>
									<input id="amaterno" type="text" />
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label>Sexo</label>
									<select name="" id="sexo_colono" class="select">
										<option value="">Selecciona Sexo</option>
										<option value="F">Femenino</option>
										<option value="M">Masculino</option>
									</select>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label>E-mail</label>
									<input id="correo" type="text" />
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label>Teléfono Celular</label>
									<input id="cel" type="text" />
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<label>Calle</label>
									<input id="calle" type="text" />
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<label>Número</label>
									<input id="numero" type="text" />
								</div>
							</div>
							<div class="row">
								<div class="col-xs-4 col-xs-offset-8 col-sm-4 col-sm-offset-8 col-md-4 col-md-offset-8 col-lg-4 col-lg-offset-8">
									<input type="button" value="AGREGAR" id="registrar_comite"/>
								</div>
							</div>
						</fieldset>
					</div>
				</div>
			</div>
		</section>
		<script type="text/javascript" src="js/datepicker.js"></script>
		<script type="text/javascript" src="js/datepicker.es.js"></script>
		<script>
			$('#usuario_contrasena').hide();
			$('#fundacion').datepicker({
				language: "es",
				orientation: "bottom auto",
				autoclose: true,
				todayHighlight: true,
				format: "yyyy-mm-dd",
				startView: 2
			});
			$('#registrar_comite').click(function(){
				var fundacion = $('#fundacion').val();
				var comite = $('#comite').val();
				var integrantes = $('#integrantes').val();
				var estado = $('#estado').val();
				var municipio = $('#municipio').val();
				var colonia = $('#colonia').val();
				var nombre = $('#nombre').val();
				var apaterno = $('#apaterno').val();
				var amaterno = $('#amaterno').val();
				var correo = $('#correo').val();
				var cel = $('#cel').val();
				var calle = $('#calle').val();
				var numero = $('#numero').val();
				var sexo = $('#sexo_colono').val();

				if(!comite == "" && !estado == "" && !municipio == "" && !colonia == "" && !nombre == "" && !apaterno == "" && !amaterno == "" && !calle == "" && !numero == ""){
					$.ajax({
						type: "POST",
						url: "http://localhost/ecolonia/index.php/administrador/registrar_comites",
						data: {fundacion:fundacion, comite:comite, integrantes:integrantes,
							estado:estado, municipio:municipio, colonia:colonia, nombre:nombre,
							apaterno:apaterno, amaterno:amaterno, correo:correo, cel:cel, calle:calle, numero:numero ,sexo:sexo},
						success: function(msg){
							var datos = jQuery.parseJSON(msg);
							if(datos.resp == true){
								$('#fundacion').val("");
								$('#comite').val("");
								$('#integrantes').val("");
								$('#estado').val("");
								$('#municipio').val("");
								$('#colonia').val("");
								$('#nombre').val("");
								$('#apaterno').val("");
								$('#amaterno').val("");
								$('#correo').val("");
								$('#cel').val("");
								$('#calle').val("");
								$('#numero').val("");
								$('#sexo_colono').val("");

								$('#titulo_alert').html("Aviso");
								$('#texto_alert').html("Los datos se guardaron correctamente");
								$('#alert').modal('show');

								$('#usuario_contrasena').show();
								$('#text_usuario_contrasena').html("Nombre de usuario: "+datos.usuario+" Contraseña: "+datos.contrasena);
							} else{
								$('#titulo_alert').html("Error..!!");
								$('#texto_alert').html("Error al guardar los datos");
								$('#alert').modal('show');
							}
						}
					});
				} else{
					$('#titulo_alert').html("Error..!!");
					$('#texto_alert').html("Ingrese los datos requeridos");
					$('#alert').modal('show')
				}
			});
		</script>
		<div class="modal dialogo fade" id="alert">
			<div class="modal-dialog modal-sm">
				<div class="modal-content">
					<div class="modal-header">
						<h4 class="modal-title">Error..!!</h4>
					</div>
					<div class="modal-body">
						<p id="texto_alert"></p>
						<input type="button" value="Aceptar" data-dismiss="modal">
					</div>
				</div>
			</div>
		</div>