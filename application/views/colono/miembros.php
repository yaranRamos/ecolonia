		<nav>
			<div class="container">
				<ul class="navbar izquierda">
 					<li><a href="<?php echo site_url('colono'); ?>">Menú</a></li>
 					<li><a href="<?php echo site_url('colono/estructura'); ?>">Estructura</a></li>
 				</ul>
 				<ul class="navbar derecha">
					<a href="<?php echo site_url('colono/logout'); ?>" class="btn btn-rojo">
						Cerrar Sesión
					</a>
 				</ul>
			</div>
		</nav>
		<section>
			<div class="container">
				<div class="row">
					<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
						<fieldset>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div id="tabla">
										<table id="example" class="table table-hover">
									        <thead>
									            <tr>
													<th>Nombre</th>
													<th>Fecha de Nacimiento</th>
													<th>Sexo</th>
													<th>Estatura</th>
													<th>Peso</th>
													<th>Email</th>
													<th>Celular</th>
									            </tr>
									        </thead>
									        <tbody>
									        	<?php foreach($integrantes as $row){ ?>
									        	<tr>
									        		<td><?php echo $row->Nombre." ".$row->ApellidoPaterno." ".$row->ApellidoMaterno; ?></td>
									        		<td><?php echo $row->FechaNacimiento; ?></td>
									        		<td><?php echo $row->Sexo; ?></td>
									        		<td><?php echo $row->Estatura; ?></td>
									        		<td><?php echo $row->Peso; ?></td>
									        		<td><?php echo $row->Email; ?></td>
									        		<td><?php echo $row->Tel_celular; ?></td>
									        	</tr>
									        	<?php } ?>
									        </tbody>
									    </table>
									</div>
								</div>
							</div>
						</fieldset>
					</div>
				</div>
				<div class="row">
					<div class="col-xs-4 col-xs-offset-8 col-sm-4 col-sm-offset-8 col-md-2 col-md-offset-10 col-lg-3 col-lg-offset-9">
						<a href="<?php echo site_url('colono/registrar_miembros'); ?>" class="btn btn-lg btn-azul derecha">Registrar Miembros</a>
					</div>
				</div>
			</div>
		</section>
		<script type="text/javascript" src="js/jquery.dataTables.js"></script>
		<script type="text/javascript" src="js/dataTables.bootstrap.js"></script>
		<script>
			$(document).ready(function() {
			    $('#example').dataTable();
			} );
		</script>