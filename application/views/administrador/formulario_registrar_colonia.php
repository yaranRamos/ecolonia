		<section>
			<div class="container">
				<div class="col">
					<fieldset class="panel">
						<legend>Colonia</legend>
						<div class="lineal">
							<div class="grupo x2">
								<label for="">Estado</label>
								<select name="" id="estado">
									<option value=""></option>
									<option value="1">Colima</option>
								</select>
							</div>
							<div class="grupo x2">
								<label for="">Municipio</label>
								<select name="" id="municipio">
									<option value=""></option>
									<option value="1">Colima</option>
								</select>
							</div>
						</div>
						<div class="lineal">
							<div class="grupo x2">
								<label for="">Nombre de la colonia</label>
								<input type="text" id="nombre">
							</div>
							<div class="grupo x2">
								<label for="">Ubicacion</label>
								<input type="text" id="ubicacion">
							</div>
						</div>
						<div class="lineal">
							<div class="grupo x2">
								<label for="">Diagnostico inicial</label>
								<textarea name="" id="diagnostico" cols="30" rows="5"></textarea>
							</div>
							<div class="grupo x2">
								<label for="">Extencion geografica</label>
								<input type="text" id="extencion">
								<label for="">Croquis</label>
								<input type="file">
							</div>
						</div>
						<div class="x4 derecha">
							<input type="button" value="Registrar" id="registrar_colonia">
						</div>
					</fieldset>
				</div>
			</div>
		</section>
		<script>
			$('#registrar_colonia').click(function(){
				var estado = $('#estado').val();
				var municipio = $('#municipio').val();
				var nombre = $('#nombre').val();
				var ubicacion = $('#ubicacion').val();
				var diagnostico = $('#diagnostico').val();
				var extencion = $('#extencion').val();
				if(!estado == "" && !municipio == "" && !nombre == "" && !ubicacion == ""){
					$.ajax({
						type: "POST",
						url: "http://localhost/ecolonia/index.php/administrador/registrar_colonia",
						data: {estado:estado, municipio:municipio, nombre:nombre, ubicacion:ubicacion, diagnostico:diagnostico, extencion:extencion},
						success: function(msg){
							console.log(msg);
							if(msg == "true"){
								$('#titulo_alert').html("Aviso");
								$('#texto_alert').html("Registro guardado con exito");
								$('#alert').modal('show');
							} else{
								$('#titulo_alert').html("Error..!!");
								$('#texto_alert').html("error al guardar el registro");
								$('#alert').modal('show');
							}
						}
					});
				} else{
					$('#titulo_alert').html("Error..!!");
					$('#texto_alert').html("Ingrese los datos requeridos");
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