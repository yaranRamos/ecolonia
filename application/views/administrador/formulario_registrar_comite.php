		<section>
			<div class="container">
				<article>
					<form action="">
						<div class="row">
							
							<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
								<fieldset class="panel">
									<legend>COMITE DE BARRIO</legend>
										<label>Nombre:</label>
										<input id="comite" type="text" />
										<div class="lineal">
											<div class="grupo x2">
												<label>No. de integrantes:</label>
												<input id="integrantes" type="text" />
											</div>
											<div class="grupo x2 sin-padding">
												<label>Fecha de fundación:</label>
												<input id="fundacion" type="text" />
											</div>
										</div>
										<label>Estado:</label>
										<select name="" id="estado" class="select">
											<option value="1">Colima</option>
										</select>
										<label>Municipio:</label>
										<select name="" id="municipio" class="select">
											<option value="1">Colima</option>
										</select>
										<label>Colonia:</label>
										<select name="" id="colonia" class="select">
											<option value="1">La Albarrada</option>
										</select>	
								</fieldset>
							</div>
							<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
								<fieldset class="panel">
									<legend>PRESIDENTE</legend>
									<div class="lineal">
										<div class="grupo x3">
											<label>Nombre:</label>
											<input id="nombre" type="text" />
										</div>
										<div class="grupo x3">
											<label>Apellido Paterno:</label>
											<input id="apaterno" type="text" />
										</div>
										<div class="grupo x3 sin-padding">
											<label>Apellido Materno:</label>
											<input id="amaterno" type="text" />
										</div>
									</div>
									<div class="lineal">
										<div class="grupo x4">
											<label>Sexo:</label>
											<select name="" id="sexo_colono" class="select">
												<option value=""></option>
												<option value="F">Femenino</option>
												<option value="M">Masculino</option>
											</select>
										</div>
										<div class="grupo x-4 sin-padding">
											<label>E-mail:</label>
											<input id="correo" type="text" />
										</div>
									</div>
									<label>Telefono Celular:</label>
									<input id="cel" type="text" />
									<div class="lieneal">
										<div class="grupo x-4">
											<label>Calle:</label>
											<input id="calle" type="text" /></div>
										<div class="grupo x4 sin-padding">
											<label>Numero:</label>
											<input id="numero" type="text" />
										</div>
									</div>
									<input type="button" value="AGREGAR" id="registrar_comite"/>
								</fieldset>
							</div>
						</div>
					</form>
				</article>
			</div>
		</section>
		<script type="text/javascript" src="js/datepicker.js"></script>
		<script type="text/javascript" src="js/datepicker.es.js"></script>
		<script>
			$('#fundacion').datepicker({
				language: "es",
				orientation: "bottom auto",
				autoclose: true,
				todayHighlight: true,
				format: "mm-dd-yyyy",
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

				if(!fundacion == "" && !comite == "" && !integrantes == "" && !estado == "" && !municipio == "" && !colonia == "" && !nombre == "" && !apaterno == "" && !amaterno == "" && !correo == "" && !cel == "" && !calle == "" && !numero == ""){
					$.ajax({
						type: "POST",
						url: "http://localhost/ecolonia/index.php/administrador/registrar_comites",
						data: {fundacion:fundacion, comite:comite, integrantes:integrantes,
						 estado:estado, municipio:municipio, colonia:colonia, nombre:nombre,
						  apaterno:apaterno, amaterno:amaterno, correo:correo, cel:cel, calle:calle, numero:numero ,sexo:sexo},
					});
				} else{
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