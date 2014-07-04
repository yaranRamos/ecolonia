$('#usuario_contrasena').hide();
$('#edad_colono').datepicker({
	language: "es",
	orientation: "bottom auto",
	autoclose: true,
	todayHighlight: true,
	format: "yyyy-mm-dd",
	startView: 2
});
$('#telefono_casa').formatter({
	'pattern': '({{999}})-{{999}}-{{9999}}',
	'persistent': true
});
$('#celular_colono').formatter({
	'pattern': '{{999}}-{{999}}-{{9999}}',
	'persistent': true
});
$('#estatura_colono').formatter({
	'pattern': '{{9}}.{{99}}',
	'persistent': true
});
$('#peso_colono').formatter({
	'pattern': '{{999}}',
	'persistent': true
});
$('#numero_casa').formatter({
	'pattern': '{{9999}}',
	'persistent': true
});
$('#enviar_datos').click(function(){
	var familia = $('#familia_casa').val();
	var telefono = $('#telefono_casa').val();
	var numero = $('#numero_casa').val();
	var nombre = $('#nombre_colono').val();
	var apellidoP = $('#apellido_p_colono').val();
	var apellidoM = $('#apellido_m_colono').val();
	var fecha = $('#edad_colono').val();
	var sexo = $('#sexo_colono').val();
	var email = $('#email_colono').val();
	var cel = $('#celular_colono').val();

	if(!familia == "" && !numero == "" && !nombre == "" && !apellidoP == "" && !apellidoM == ""){
		$.ajax({
			type: "POST",
			url: "http://localhost/ecolonia/index.php/representante_calle/inserta_casa",
			data: {familia:familia,telefono:telefono,numero:numero,nombre:nombre,apellidoP:apellidoP,apellidoM:apellidoM,fecha:fecha,sexo:sexo,email:email,cel:cel},
			success: function(msg){
				var datos = jQuery.parseJSON(msg);
				if(datos.resp == true){
					$('#familia_casa').val("");
					$('#telefono_casa').val("");
					$('#numero_casa').val("");
					$('#nombre_colono').val("");
					$('#apellido_p_colono').val("");
					$('#apellido_m_colono').val("");
					$('#edad_colono').val("");
					$('#sexo_colono').val("");
					$('#email_colono').val("");
					$('#celular_colono').val("");

					$('#titulo_alert').html("Aviso");
					$('#texto_alert').html("Los datos se guardaron correctamente");
					$('#alert').modal('show');

					$('#text_usuario_contrasena').html("Nombre de usuario: "+datos.usuario+" Contraseña: "+datos.contrasena);
					$('#usuario_contrasena').show();
					$('body,html').stop(true,true).animate({
						scrollTop: $('#usuario_contrasena').offset().top
					},1000);
				} else{
					$('#titulo_alert').html("!ATENCION¡");
					$('#texto_alert').html("ERROR AL GUARDAR LOS DATOS");
					$('#alert').modal('show');
				}
			}
		});
	} else{
		$('#titulo_alert').html("!ATENCION¡");
		$('#texto_alert').html("AGREGA LOS DATOS REQUERIDOS");
		$('#alert').modal('show');
	}
});