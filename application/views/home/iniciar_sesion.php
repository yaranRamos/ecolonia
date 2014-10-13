		<nav>
			<div class="container">
 				<ul class="navbar izquierda">
 					<li><a href="">Inicio</a></li>
 				</ul>
			</div>
		</nav>		
		<section>
			<div class="container">
				<article>
					<div class="row">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<fieldset>
								<legend>Iniciar Sesión</legend>
								<form action="<?php echo site_url('ecolonia/logueo') ?>" method="POST" id="form_sesion">
									<label for="usuario">Usuario:</label>
									<input type="text" name="usuario">
									<label for="password">Contraseña:</label>
									<input type="password" name="password">
									<label for="">Tipo de usuario</label>
									<select name="tipo_usuario" id="tipo_usuario">
										<?php foreach($roles as $rol){ ?>
											<option value="<?php echo $rol->Id;?>"><?php echo $rol->Nombre;?></option>
										<?php } ?>
									</select>
									<label>
										<input type="submit" value="Iniciar" class="btn-lg btn-block btn-azul">
									</label>
								</form>
							</fieldset>
							<?php if ($mensaje != ""){ ?>
								<div id="mensaje" class="alert alert-danger fade in">
									<button type="button" class="close" data-dismiss="alert" aria-hidden="true">&times;</button>
									<?php echo $mensaje;?>
								</div>
							<?php } ?>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						</div>
					</div>
				</article>
			</div>
		</section>
		<script>
			$('#form_sesion').submit(function(event){
				if($('#tipo_usuario').val() != 0){
					return;
				} else{
					$('#titulo_alert').html("Error...!!");
					$('#texto_alert').html("Ingrese los datos requeridos");
					$('#alert').modal('show')
					event.preventDefault();
				}
			});
			$(".alert").alert();
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