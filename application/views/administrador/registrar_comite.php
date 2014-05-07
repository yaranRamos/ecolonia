		<section>
			<div class="container">
				<article>
					<form action="">
						<div class="row">
							
							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								
								<fieldset class="panel">
									<legend>COMITE DE BARRIO</legend>
										<label>Fecha de fundación:</label>
										<input id="fundacion" type="date" />
										<label>Nombre:</label>
										<input id="comite" type="text" />
										<label>Numero de integrantes:</label>
										<input id="integrantes" type="text" />
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

							<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
								<fieldset class="panel">
									<legend>PRESIDENTE</legend>
									<label>Nombre:</label>
									<input id="nombre" type="text" />
									<label>Apellido Paterno:</label>
									<input id="apaterno" type="text" />
									<label>Apellido Materno:</label>
									<input id="amaterno" type="text" />
										<label>Sexo:</label>
										<select name="" id="sexo_colono" class="select">
											<option value=""></option>
											<option value="F">Femenino</option>
											<option value="M">Masculino</option>
										</select>
									<label>E-mail:</label>
									<input id="correo" type="text" />
									<label>Telefono Celular:</label>
									<input id="cel" type="text" />
									<label>Calle:</label>
									<input id="calle" type="text" />
									<label>Numero:</label>
									<input id="numero" type="text" />

									<input type="button" value="AGREGAR" id="registrar_comite"/>
								</fieldset>
							</div>

						</div>
					</form>
				</article>
			</div>
		</section>
			<script>

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