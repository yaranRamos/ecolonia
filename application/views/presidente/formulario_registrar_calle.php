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
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<fieldset>
							<legend>CALLE</legend>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<label for="">Nombre</label>
									<input type="text" id="nombre">
								</div>
							</div>
							<div class="row">
								<div class="col-xs-4 col-xs-offset-8 col-sm-4 col-sm-offset-8 col-md-4 col-md-offset-8 col-lg-4 col-lg-offset-8">
									<input type="button" value="AGREGAR" id="agregar">
								</div>
							</div>
						</fieldset>
					</div>
					<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
						<fieldset>
							<legend>LISTA</legend>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<ul class="integrantes" id="calles"></ul>
								</div>
							</div>
							<div class="row">
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<input type="button" value="CANCELAR" id="cancelar" class="rojo">
								</div>
								<div class="col-xs-6 col-sm-6 col-md-6 col-lg-6">
									<input type="button" value="GUARDAR" id="guardar" class="">
								</div>
							</div>
						</fieldset>
					</div>
				</div>
			</div>
		</section>
		<script>
			var calles = [];
			var cadena = "";
			$('#agregar').click(function(){
				var nombre = $('#nombre').val();
				if(!nombre == ""){
					calles.push(nombre);
					cadena += "<li>"+nombre+"</li>";
					$('#nombre').val("");
					$('#nombre').focus();
					$("#calles").html(cadena);
				} else{
					$('#titulo_alert').html("Error..!!");
					$('#texto_alert').html("Ingrese los datos requeridos");
					$('#alert').modal('show');
				}
			});
			$('#cancelar').click(function(){
				calles = [];
				cadena = "";
				$("#calles").html(cadena);
			});
			$('#guardar').click(function(){
				$.ajax({
					type: "POST",
					url: "http://localhost/ecolonia/index.php/presidente/registrar_calles",
					data: {calles:calles},
					success: function(msg){
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