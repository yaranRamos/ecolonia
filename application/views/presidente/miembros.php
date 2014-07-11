		<nav>
			<div class="container">
				<ul class="navbar izquierda">
 					<li><a href="<?php echo site_url('presidente'); ?>">Menú</a></li>
 					<li><a href="<?php echo site_url('presidente/estructura'); ?>">Estructura</a></li>
 				</ul>
 				<ul class="navbar derecha">
					<a href="<?php echo site_url('presidente/logout'); ?>" class="btn btn-rojo">
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
						<legend>Miembros Comité de Barrio</legend>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div id="tabla">
										<table id="example" class="table table-hover">
									        <thead>
									            <tr>
													<th>Nombre</th>
													<th>Domicilio</th>
													<th>Comité</th>
													<th>Puesto</th>
												</tr>
									        </thead>
									        <tbody>
									        	<?php foreach($integrante as $row) { ?>
													<tr>
														<td><?php echo $row->Nombre." ".$row->ApellidoPaterno." ".$row->ApellidoMaterno;?></td>
														<td><?php echo $row->Nombre_calle." #".$row->Numero;?></td>
														<td><?php echo $row->Nombre_comite;?></td>
														<td><?php if($row->Puesto == 1)echo "Presidente"; else if($row->Puesto == 2)echo "Tesorero"; elseif($row->Puesto == 3)echo"Vocal"; elseif($row->Puesto == 4)echo "Coordinador";?></td>
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
						<a href="<?php echo site_url('presidente/registrar_miembro'); ?>" class="btn btn-lg btn-azul derecha">Registrar Miembro</a>
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