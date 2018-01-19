LoadReferencia('jerarquia');
LoadReferencia('tipo_de_solicitud');
LoadReferencia('tipo_de_requerimiento');
LoadReferencia('status');
LoadReferencia('cod_area');


user('cedula','persona');
user('credencial','persona');


LoadDespacho('areaa','false');
$('#areaa').change(function(event) {	
	LoadDespacho('areab',$('#areaa').val());
});
$('#areab').change(function(event) {	
	LoadDespacho('areac',$('#areab').val());
});
loadSystem('Sistema','false');
$('#Sistema').change(function(event) {	
	loadSystem('Modulo',$('#Sistema').val());
});
