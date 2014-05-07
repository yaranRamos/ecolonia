// Obtenemos los estados
function getMunicipio(estado_id){
	var estado = estado_id;
	var municipios = $("#municipio");
	// cargamos con ajax los municipios del estado
	municipios.find('option').remove().end().append('<option value="">Seleccione Municipio</option>').val('');
	jQuery.ajax({
		url:'http://localhost/ecolonia/index.php/administrador/get_municipios',
		timeout:3000,
		type:'post',
		data:{
			estado_id: estado
		}
	}).done(function(resp){
		var miJson = jQuery.parseJSON(resp);
		if(miJson){
			for(var item in miJson){
				municipios.append('<option value"' + miJson[item].Id + '">' + miJson[item].Nombre + '</option>');
			}
		}else{
			alert("Algo fallo");
		}
	});
}