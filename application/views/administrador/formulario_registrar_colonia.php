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
				<div class="col">
				<form id="formulario_registrar_colonia">
					<fieldset class="panel">
						<legend>Colonia</legend>
						<div class="lineal">
							<div class="grupo x3">
								<label for="">Estado</label>
								<select onchange="getMunicipio(this.value)" name="" id="estado">
									<option value="">Selecciona Estado</option>
									<?php foreach($estado->result() as $est){?>
									<option value="<?php echo $est->Id?>"><?php echo $est->Nombre?></option>
									<?php }?>
								</select>
							</div>
							<div class="grupo x3">
								<label for="">Municipio</label>
								<select name="" id="municipio">
									<option value="">Selecciona Municipio</option>
								</select>
							</div>
							<div class="grupo x3 sin-pading">
								<label for="">Nombre de la colonia</label>
								<input type="text" id="nombre">
							</div>
						</div>
						<div class="lineal">
							<div class="grupo x5">
								<label for="">Fecha Fundación:</label>
								<input type="text" id="fecha">
							</div>
							<div class="grupo x5">
								<label for="">Numero de habitantes:</label>
								<input type="text" id="habit">
							</div>
							<div class="grupo x3">
								<label for="">Ubicacion</label>
								<input type="text" id="ubicacion">
							</div>
							<div class="grupo x4">
								<label for="">Extencion geografica</label>
								<input type="text" id="extencion">
							</div>
						</div>
						<div class="lineal">
							<div class="grupo x2 sin-pading">
								<label for="">Diagnostico inicial</label>
								<textarea name="" id="diagnostico" cols="30" rows="5"></textarea>
							</div>
							<div class="grupo x2">
								<label for="">Croquis</label>
							</div>
						</div>
						<div class="x4 derecha">
							<input type="button" value="Registrar" id="registrar_colonia">
						</div>
					</fieldset>
				</form>
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
				format: "mm-dd-yyyy",
				startView: 2
			});
			$('#registrar_colonia').click(function(){
				var estado = $('#estado').val();
				var municipio = $('#municipio').val();
				var nombre = $('#nombre').val();
				var fecha = $('#fecha').val();
				var numHab = $('#habit').val();
				var ubicacion = $('#ubicacion').val();
				var diagnostico = $('#diagnostico').val();
				var extencion = $('#extencion').val();
				if(!estado == "" && !municipio == "" && !nombre == "" && !ubicacion == "" && !fecha == "" && !numHab == "" && !diagnostico == "" && !extencion == ""){
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
								//$('#estado').val(); $('#municipio').val(); $('#nombre').val(); $('#fecha').val(); $('#habit').val(); $('#ubicacion').val(); $('#diagnostico').val(); $('#extencion').val();
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