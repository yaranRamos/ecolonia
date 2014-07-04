		<nav>
			<div class="container">
				<ul class="navbar izquierda">
 					<li><a href="<?php echo site_url('administrador'); ?>">Menú</a></li>
 					<li><a href="<?php echo site_url('administrador/estructura'); ?>">Estructura</a></li>
 				</ul>
 				<ul class="navbar derecha">
					<a href="<?php echo site_url('administrador/logout'); ?>" class="btn btn-rojo">
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
							<legend>Colonias</legend>
							<div class="row">
								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
									<label for="">Estado</label>
									<select onchange="getMunicipio(this.value)" id="estado">
										<option value="">Selecciona Estado</option>
										<?php foreach($estado->result() as $est){?>
										<option value="<?php echo $est->Id?>"><?php echo $est->Nombre?></option>
										<?php }?>
									</select>
								</div>
								<div class="col-xs-3 col-sm-3 col-md-3 col-lg-3">
									<label for="">Municipio</label>
									<select id="municipio">
										<option value="">Selecciona Municipio</option>
									</select>
								</div>
							</div>
							<div class="separador"></div>
							<div class="row">
								<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
									<div id="tabla">
										<table id="example" class="table table-hover">
									        <thead>
									            <tr>
													<th>Nombre</th>
													<th>Fecha Fundación</th>
													<th>No. Habitantes</th>
													<th>Ubicación</th>
													<th>Diagnostico Inicial</th>
									            </tr>
									        </thead>
									        <tbody>
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
						<a href="<?php echo site_url('administrador/registrar_colonia'); ?>" class="btn btn-lg btn-azul derecha">Registrar Colonia</a>
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
			$('#municipio').change(function(){
				var id = $('#municipio').val();
				if(id != ""){
					$.ajax({
						type: "POST",
						url: "http://localhost/ecolonia/index.php/administrador/get_colonias",
						data:{municipio_id:id},
						success: function(msg){
							var datos = jQuery.parseJSON(msg);
							var cadena = "";
							cadena += "<table id='"+id+"' class='table table-hover'><thead><tr><th>Nombre</th><th>Fecha Fundación</th><th>No. Habitantes</th><th>Ubicación</th><th>Diagnostico Inicial</th></tr></thead><tbody>";
							for(var i = 0; i < datos.length; i++){
								cadena += "<tr><td>"+datos[i].Nombre+"</td><td>"+datos[i].FechaFun+"</td><td>"+datos[i].NumeroHabitantes+"</td><td>"+datos[i].Ubicacion+"</td><td>"+datos[i].Diagnostico_inicial+"</td></tr>"
							}
							cadena += "</tbody></table>";
							$('#tabla').html(cadena);
							$('#'+id).dataTable();
						}
					});
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