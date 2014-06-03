		<nav>
			<div class="container">
				<ul class="navbar izquierda">
 					<li><a href="<?php echo site_url('administrador'); ?>">Menu</a></li>
 					<li><a href="<?php echo site_url('administrador/menu_estructura'); ?>">Estructura</a></li>
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
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<fieldset>
						<legend>Registro de Colonia</legend>
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
								<label for="">Estado</label>
								<select onchange="getMunicipio(this.value)" name="" id="estado">
									<option value="">Selecciona Estado</option>
									<?php foreach($estado->result() as $est){?>
									<option value="<?php echo $est->Id?>"><?php echo $est->Nombre?></option>
									<?php }?>
								</select>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
								<label for="">Municipio</label>
								<select onchange="getColonia1(this.value)" name="" id="municipio">
									<option value="">Selecciona Municipio</option>
								</select>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
								<label for="">Colonia</label>
								<select name="" id="colonia">
									<option value="">Selecciona Colonia</option>
								</select>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
								<label for="">Fecha Fundación</label>
								<input type="text" id="fecha">
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
								<label for="">Número de habitantes</label>
								<input type="text" id="habit">
							</div>
							<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
								<label for="">Ubicación</label>
								<input type="text" id="ubicacion">
							</div>
							<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
								<label for="">Extensión geográfica</label>
								<input type="text" id="extencion">
							</div>
							<div class="col-xs-6 col-sm-6 col-md-3 col-lg-3">
								
							</div>
						</div>
						<div class="row">
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<label for="">Diagnóstico inicial</label>
								<textarea name="" id="diagnostico" cols="30" rows="5"></textarea>
							</div>
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<label for="">Croquis</label>
							</div>
						</div>
						<div class="row">
							<div class="col-xs-3 col-xs-offset-9 col-sm-3 col-sm-offset-9 col-md-3 col-md-offset-9 col-lg-3 col-lg-offset-9">
								<input type="button" value="Registrar" id="registrar_colonia">
							</div>
						</div>
					</fieldset>
				</div>
			</div>
		</section>
		<script type="text/javascript" src="js/datepicker.js"></script>
		<script type="text/javascript" src="js/datepicker.es.js"></script>
		<script>
			$('#fecha').datepicker({
				language: "es",
				orientation: "bottom auto",
				autoclose: true,
				todayHighlight: true,
				format: "yyyy-mm-dd",
				startView: 2
			});
			$('#registrar_colonia').click(function(){
				var estado = $('#estado').val();
				var municipio = $('#municipio').val();
				var nombre = $('#colonia').val();
				var fecha = $('#fecha').val();
				var numHab = $('#habit').val();
				var ubicacion = $('#ubicacion').val();
				var diagnostico = $('#diagnostico').val();
				var extencion = $('#extencion').val();
				if(!estado == "" && !municipio == "" && !nombre == ""){
					$.ajax({
						type: "POST",
						url: "http://localhost/ecolonia/index.php/administrador/registrar_colonia",
						data:{
						 estado:estado,
						 municipio:municipio, 
						 nombre:nombre,
						 fecha:fecha,
						 NumeroHabitantes:numHab, 
						 ubicacion:ubicacion, 
						 diagnostico:diagnostico, 
						 extencion:extencion
						},
						success: function(msg){
							console.log(msg);
							if(msg == "true"){
								$('#titulo_alert').html("¡COLONIA REGISTRADA CON EXITO!");
								$('#texto_alert').html("¡REGISTRO GUARDADO CON EXITO!");
								$('#alert').modal('show');
								
								//Limpiamos los datos
								$('#estado').val(""); $('#municipio').val(""); $('#nombre').val(""); $('#fecha').val(""); $('#habit').val(""); $('#ubicacion').val(""); $('#diagnostico').val(""); $('#extencion').val("");
							} else{
								$('#titulo_alert').html("ERROR");
								$('#texto_alert').html("¡ERROR LA COLONIA YA EXISTE!");
								$('#alert').modal('show');

								//Limpiamos los datos
								//$('#estado').val();$('#municipio').val();$('#nombre').val();$('#fecha').val();$('#habit').val();$('#ubicacion').val();$('#diagnostico').val();$('#extencion').val();
							}
						}
					});
				} else{
					$('#titulo_alert').html("¡REVISA TUS DATOS!");
					$('#texto_alert').html("Ingresa los datos requeridos");
					$('#alert').modal('show');

					//Limpiamos los datos
					//$('#estado').val(); $('#municipio').val(); $('#nombre').val(); $('#fecha').val(); $('#habit').val(); $('#ubicacion').val(); $('#diagnostico').val(); $('#extencion').val();
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