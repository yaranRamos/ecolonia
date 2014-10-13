$('#usuario_contrasena').hide();
$('#fundacion').datepicker({
	language: "es",
	orientation: "bottom auto",
	autoclose: true,
	todayHighlight: true,
	format: "yyyy-mm-dd",
	startView: 2
});
$('#registrar_comite').click(function(){
	var fundacion = $('#fundacion').val();
	var comite = $('#comite').val(); // este 
	var integrantes = $('#integrantes').val();
	var estado = $('#estado').val();
	var municipio = $('#municipio').val();
	var colonia = $('#colonia').val(); // este
	var nombre = $('#nombre').val();
	var apaterno = $('#apaterno').val();
	var amaterno = $('#amaterno').val();
	var correo = $('#correo').val();
	var cel = $('#cel').val();
	var calle = $('#calle').val();
	var numero = $('#numero').val();
	var sexo = $('#sexo_colono').val();

	if(comite == "" || estado == "" || municipio == "" || colonia == "" || nombre == "" || apaterno == "" || calle == "" || numero == ""){
		$('#titulo_alert').html("!ATENCION¡");
		$('#texto_alert').html("INGRESA LOS DATOS REQUERIDOS");
		$('#alert').modal('show');
		return;
	}else{

		$.ajax({
			type: 	"POST",
			url: 	"http://localhost/php/ecolonia/index.php/administrador/valida_comite",
			data: 	{nombre:comite,colonia:colonia},
			success: function(msg){
				var datos = $.parseJSON(msg);
				if(datos){
					$("#mensaje2").removeClass("mensaje");
					$('#mensaje2').html("<button type='button' class='close' data-dismiss='alert'>&times;</button><p>EL COMITÉ DE BARRIO YA ESTA REGISTRADO!</p>");
					$('#comite').focus();
					return;
				}else{

					$.ajax({
						type:"POST",
						url: "http://localhost/php/ecolonia/index.php/administrador/valida_presidente",
						data:{
							nombre:nombre,
							apaterno:apaterno,
							amaterno:amaterno
						},
						success:function(res){
							var respuesta = jQuery.parseJSON(res);
							if(respuesta){
								$("#mensaje2").removeClass("mensaje");
								$('#mensaje2').html("<button type='button' class='close' data-dismiss='alert'>&times;</button><p>EL PRESIDENTE YA ESTA REGISTRADO!</p>");
								return;
							}else{
								$.ajax({
								type: "POST",
								url: "http://localhost/php/ecolonia/index.php/administrador/inserta_comite",
								data: {fundacion:fundacion, comite:comite, integrantes:integrantes,
									estado:estado, municipio:municipio, colonia:colonia, nombre:nombre,
									apaterno:apaterno, amaterno:amaterno, correo:correo, cel:cel, calle:calle, numero:numero ,sexo:sexo},
								success: function(msg){
									var datos = jQuery.parseJSON(msg);
									console.log(msg);
									if(datos.resp == true){
										$('#fundacion').val("");
										$('#comite').val("");
										$('#integrantes').val("");
										$('#estado').val("");
										$('#municipio').val("");
										$('#colonia').val("");
										$('#nombre').val("");
										$('#apaterno').val("");
										$('#amaterno').val("");
										$('#correo').val("");
										$('#cel').val("");
										$('#calle').val("");
										$('#numero').val("");
										$('#sexo_colono').val("");

										$('#titulo_alert').html("COMITÉ REGISTRADO CON EXITO");
										$('#texto_alert').html("LOS DATOS FUERON GUARDADOS CORRECTAMENTE");
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
							}
						}
					});
				}
			}
		});
	}
});