$('#usuario_contrasena').hide();
$('#edad_colono').datepicker({
	language: "es",
	orientation: "bottom auto",
	autoclose: true,
	todayHighlight: true,
	format: "yyyy-mm-dd",
	startView: 2
});
var array_miembros = [];
var cadena = "";
$('#copia_datos').click(function(){
	var nombre = $('#nombre_colono').val();
	var apellido_p = $('#apellido_p_colono').val();
	var apellido_m = $('#apellido_m_colono').val();
	var fecha = $('#edad_colono').val();
	var sexo = $('#sexo_colono').val();
	var email = $('#email_colono').val();
	var telefono = $('#celular_colono').val();
	var puesto = $('#puesto').val();
	var t_puesto = $("#puesto option:selected").text();
	if(!nombre == "" && !apellido_p == "" && !apellido_m == ""){
		var array_datos = [nombre, apellido_p, apellido_m, fecha, sexo, puesto, email, telefono];
		array_miembros.push(array_datos);
		cadena +="<li><spam class='glyphicon glyphicon-user'></spam>&nbsp;"+nombre+" "+apellido_p+" "+apellido_m+" - "+t_puesto+"</li>";
		$("#integrantes").html(cadena);
		$('#nombre_colono').val("");
		$('#apellido_p_colono').val("");
		$('#apellido_m_colono').val("");
		$('#edad_colono').val("");
		$('#sexo_colono').val("");
		$('#email_colono').val("");
		$('#celular_colono').val("");
	} else{
		$('#titulo_alert').html("!ATENCION¡");
		$('#texto_alert').html("AGREGAR LOS DATOS REQUERIDOS");
		$('#alert').modal('show');
	}
});

$('#enviar_datos').click(function(){
	$.ajax({
		type: "POST",
		url: "http://localhost/ecolonia/index.php/colono/inserta_miembros",
		data: {miembros:array_miembros},
		success: function(msg){
			var datos = jQuery.parseJSON(msg);
			if(datos.resp == true){
				$('#nombre_colono').val("");
				$('#apellido_p_colono').val("");
				$('#apellido_m_colono').val("");
				$('#edad_colono').val("");
				$('#sexo_colono').val("");
				$('#email_colono').val("");
				$('#celular_colono').val("");
				array_miembros = [];
				cadena = "";
				$("#integrantes").html(cadena);
	
				$('#titulo_alert').html("AVISO");
				$('#texto_alert').html("LOS DATOS SE GUARDARON CON EXITO");
				$('#alert').modal('show');
				var usuarios = datos.datos;
				var cadena = "";
				for(var i = 0; i < usuarios.length; i++){
					cadena += "Nombre de usuario: "+usuarios[i].usuario+" Contraseña: "+usuarios[i].contrasena+"<br>";
				}
				$('#text_usuario_contrasena').html(cadena);
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
});

$('#cancelar_envio').click(function(){
	$('#nombre_colono').val("");
	$('#apellido_p_colono').val("");
	$('#apellido_m_colono').val("");
	$('#edad_colono').val("");
	$('#sexo_colono').val("");
	$('#email_colono').val("");
	$('#celular_colono').val("");
	array_miembros = [];
	cadena = "";
	$("#integrantes").html(cadena);
});