LoadReferencia('jerarquia');
LoadReferencia('perfil');

user('usuario','usuario');
user('cedula','persona');
user('credencial','persona');


LoadDespacho('areaa','false');
$('#areaa').change(function(event) {	
	LoadDespacho('areab',$('#areaa').val());
});
$('#areab').change(function(event) {	
	LoadDespacho('areac',$('#areab').val());
});