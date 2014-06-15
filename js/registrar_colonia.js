$('#fecha').datepicker({
	language: "es",
	orientation: "bottom auto",
	autoclose: true,
	todayHighlight: true,
	format: "yyyy-mm-dd",
	startView: 2
});
$('#registrar_colonia').click(function(){
	var estado = $('#estado').val();
	var municipio = $('#municipio').val();
	var nombre = $('#colonia').val();
	var fecha = $('#fecha').val();
	var numHab = $('#habit').val();
	var ubicacion = $('#ubicacion').val();
	var diagnostico = $('#diagnostico').val();
	var extencion = $('#extencion').val();
	if(!estado == "" && !municipio == "" && !nombre == "" && !diagnostico == ""){
		$.ajax({
			type: "POST",
			url: "http://localhost/ecolonia/index.php/administrador/inserta_colonia",
			data:{
			 estado:estado,
			 municipio:municipio, 
			 nombre:nombre,
			 fecha:fecha,
			 NumeroHabitantes:numHab, 
			 ubicacion:ubicacion, 
			 diagnostico:diagnostico, 
			 extencion:extencion
			},
			success: function(msg){
				var datos = jQuery.parseJSON(msg);
				if(datos == true){
					$('#estado').val("");
					$('#municipio').val("");
					$('#nombre').val("");
					$('#fecha').val("");
					$('#habit').val("");
					$('#ubicacion').val("");
					$('#diagnostico').val("");
					$('#extencion').val("");

					$('#titulo_alert').html("¡COLONIA REGISTRADA CON EXITO!");
					$('#texto_alert').html("¡REGISTRO GUARDADO CON EXITO!");
					$('#alert').modal('show');
				} else{
					$('#titulo_alert').html("ERROR");
					$('#texto_alert').html("¡ERROR LA COLONIA YA EXISTE!");
					$('#alert').modal('show');
				}
			}
		});
	} else{
		$('#titulo_alert').html("¡REVISA TUS DATOS!");
		$('#texto_alert').html("Ingresa los datos requeridos");
		$('#alert').modal('show');
	}
});