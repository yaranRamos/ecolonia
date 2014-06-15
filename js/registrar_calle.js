var calles = [];
var cadena = "";
$('#agregar').click(function(){
	var nombre = $('#nombre').val();
	if(!nombre == ""){
		calles.push(nombre);
		cadena += "<li><spam class='glyphicon glyphicon-road'></spam>&nbsp;"+nombre+"</li>";
		$('#nombre').val("");
		$('#nombre').focus();
		$("#calles").html(cadena);
	} else{
		$('#titulo_alert').html("Error..!!");
		$('#texto_alert').html("Ingrese los datos requeridos");
		$('#alert').modal('show');
	}
});
$('#cancelar').click(function(){
	calles = [];
	cadena = "";
	$("#calles").html(cadena);
});
$('#guardar').click(function(){
	$.ajax({
		type: "POST",
		url: "http://localhost/ecolonia/index.php/presidente/inserta_calles",
		data: {calles:calles},
		success: function(msg){
			var datos = jQuery.parseJSON(msg);
			if(datos == true){
				calles = [];
				cadena = "";
				$("#calles").html(cadena);
	
				$('#titulo_alert').html("Aviso");
				$('#texto_alert').html("Registro guardado con exito");
				$('#alert').modal('show');
			} else{
				$('#titulo_alert').html("Error..!!");
				$('#texto_alert').html("error al guardar el registro");
				$('#alert').modal('show');
			}
		}
	});
});