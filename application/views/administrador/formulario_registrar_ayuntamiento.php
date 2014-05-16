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
				<article>
						<div class="row">
							<div class="col-xs-5 col-sm-5 col-md-5 col-lg-5">
								<fieldset>
									<legend>LOCALIDAD</legend>
										<label>Estado:</label>
										<select onchange="getMunicipio(this.value)" name="" id="" class="select">
											<option value="">Selecciona Estado</option>
										<?php foreach($estado->result() as $est){?>
											<option value="<?php echo $est->Id?>"><?php echo $est->Nombre?></option>
										<?php }?>
										</select>
										<label>Municipio:</label>
										<select name="" id="municipio" class="select">
											<option value="">Selecciona Municipio</option>
										</select>
								</fieldset>
							</div>
							<div class="col-xs-7 col-sm-7 col-md-7 col-lg-7">
								<fieldset>
									<legend>CONTACTO</legend>
									<div class="lineal">
										<div class="grupo x3">
											<label>Nombre:</label>
											<input type="text" />
										</div>
										<div class="grupo x3">
											<label>Apellido Paterno:</label>
											<input type="text" />
										</div>
										<div class="grupo x3 sin-padding">
											<label>Apellido Materno:</label>
											<input type="text" />
										</div>
									</div>
									<label>Cargo:</label>
									<input type="text" />
									<label>E-mail:</label>
									<input type="text" />
									<label>Teléfono Celular:</label>
									<input type="text" />
									<input type="submit" value="AGREGAR"/>
								</fieldset>
							</div>
						</div>
				</article>
			</div>
		</section>