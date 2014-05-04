		<section>
			<div class="container">
				<article>
					<div class="row">
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
							<fieldset class="panel">
								<legend>INICIAR SESIÓN</legend>
								<form action="<?php echo base_url('index.php/administrador') ?>" method="POST">
									<label for="usuario">Usuario:</label>
									<input type="text" name="usuario">
									<label for="password">Contraneña:</label>
									<input type="password" name="password">
									<input type="submit" value="iniciar">
								</form>
							</fieldset>
						</div>
						<div class="col-xs-4 col-sm-4 col-md-4 col-lg-4">
						</div>
					</div>
				</article>
			</div>
		</section>