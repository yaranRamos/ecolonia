		<nav>
			<div class="container">
				<ul class="navbar izquierda">
 					<li><a href="<?php echo site_url('representante_calle'); ?>">Menú</a></li>
 					<li><a href="<?php echo site_url('representante_calle/estructura'); ?>">Estructura</a></li>
 				</ul>
 				<ul class="navbar derecha">
					<a href="<?php echo site_url('representante_calle/logout'); ?>" class="btn btn-rojo">
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
													<th>Familia</th>
													<th>Numero de Casa</th>
													<th>Teléfono</th>
									            </tr>
									        </thead>
									        <tbody>
									        	<?php foreach($casas as $row){ ?>
									        	<tr>
									        		<td><?php echo $row->Familia; ?></td>
									        		<td><?php echo $row->Numero; ?></td>
									        		<td><?php echo $row->Tel_Casa; ?></td>
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
						<a href="<?php echo site_url('representante_calle/registrar_casa'); ?>" class="btn btn-lg btn-azul derecha">Registrar Casa</a>
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