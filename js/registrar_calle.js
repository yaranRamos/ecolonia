var calles =  [];
var cadena = "";
var contador = 0;
var resp = 0;
$('#agregar').click(function(){
	var nombre = $('#nombre').val();
	if(!nombre == ""){
		calles.push(nombre);
		cadena += "<li><spam class='glyphicon glyphicon-road'></spam>&nbsp;"+nombre+" <spam id='calle-"+contador+"' onclick='prueba(\"calle-"+contador+"\");' class='glyphicon glyphicon-remove-sign pull-right btn-remove'></spam></li>";
		contador++;
		$('#nombre').val("");
		$('#nombre').focus();
		$("#calles").html(cadena);
	} else{
		$('#titulo_alert').html("!ATENCION¡");
		$('#texto_alert').html("INGRESA LOS DATOS REQUERIDOS");
		$('#alert').modal('show');
	}

	if(resp == 1){
		alert("si se manda a llamar");
	}
});

function prueba(calle){
	var i = calle.split('-');
    var index = i[1];
  	calles.splice(index,1);
  	var tmp = calles;
    calles = [];
    $("#calles").html("");
    cadena = "";
    contador = 0;
    for(var i = 0; i<tmp.length; i++){
    	cadena += "<li><spam class='glyphicon glyphicon-road'></spam>&nbsp;"+tmp[i]+" <spam id='calle-"+contador+"' onclick='prueba(\"calle-"+contador+"\");' class='glyphicon glyphicon-remove-sign pull-right btn-remove'></spam></li>";
    	contador++;
    }
    calles = tmp;
    $("#calles").html(cadena);
}

$('#aceptar').click(function(){
	$('#nombre').focus();
});


$('#cancelar').click(function(){
	calles = [];
	cadena = "";
	$("#calles").html(cadena);
	contador = 0;
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
	
				$('#titulo_alert').html("AVISO");
				$('#texto_alert').html("REGISTRO GUARDADO CON EXITO");
				$('#alert').modal('show');
			} else{
				$('#titulo_alert').html("!ATENCION¡");
				$('#texto_alert').html("ERROR AL GUARDAR LOS DATOS");
				$('#alert').modal('show');
			}
		}
	});
});