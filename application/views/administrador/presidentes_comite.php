		<nav>
			<div class="container">
				<ul class="navbar izquierda">
 					<li><a href="<?php echo site_url('administrador'); ?>">Menú</a></li>
 					<li><a href="<?php echo site_url('administrador/soporte'); ?>">Soporte</a></li>
 				</ul>
 				<ul class="navbar derecha">
					<a href="<?php echo site_url('administrador/logout'); ?>" class="btn btn-rojo">
						Cerrar Sesión
					</a>
 				</ul>
			</div>
		</nav>
		<div class="container">
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<span id="vigente" class="box-status"></span>&nbsp;Vigente
					<span id="no-vigente" class="box-status"></span>&nbsp;No vigente
				</div>
			</div>
			<br>
			<div class="row">
				<div class="col-xs-12 col-sm-12 col-md-12 col-lg-12">
					<div id="tabla">
						<table id="example" class="table table-hover">
					        <thead>
					            <tr>
									<th>Nombre</th>
									<th>Comité</th>
									<th>Colonia</th>
									<th>Usuario</th>
									<th>Password</th>
									<th>Acciones</th>
					            </tr>
					        </thead>
					        <tbody></tbody>
					    </table>
					</div>
				</div>
			</div>
		</div>
		<script type="text/javascript" src="js/jquery.dataTables.min.js"></script>
		<script type="text/javascript" src="js/dataTables.bootstrap.js"></script>
		<script>
			$(document).ready(function() {
				var bandera = 1;
			    $('#example').dataTable();

			    // Metodo ajax
                $.ajax({
                	type:"POST",
                	url:"http://localhost/php/ecolonia/index.php/administrador/get_presidentes", // -- ADAN
                	data:{bool:bandera},
                	success: function(resp){
                		var datos = jQuery.parseJSON(resp);
                		var cadena = "";
                		cadena += "<table id='example' class='table table-hover'><thead><tr><th>Nombre de presidente</th><th>Comité</th><th>Colonia</th><th>Usuario</th><th>Password</th><th>Acciones</th></tr></thead><tbody>";
                		for(var i = 0; i < datos.length; i++){
                			if(datos[i].status_presidente == 1){
                				var status = 'statustrue';
                			}else{
                				var status = 'statusfalse';
                			}	
	                		cadena += "<tr class='"+status+"'><td>"+datos[i].nombre_colono+" "+datos[i].ApellidoPaterno+" "+datos[i].ApellidoMaterno+"</td><td>"+datos[i].nombre_comite+"</td><td>"+datos[i].nombre_colonia+"</td><td>"+datos[i].nombre_usuario+"</td><td>"+datos[i].password_usuario+"</td><td><center><span class='detalles'><button type='submit' class='btn btn-success view'><i class='fa fa-pencil view'></i></button><button type='submit' class='btn btn-success view'><i class='fa fa-trash delete'></i></button></span></center></td></tr>";
                		}
                		cadena += "</tbody></table>";
                        $('#tabla').html(cadena);
                        $('#example').dataTable();
                	}
                });
			});	
		</script>