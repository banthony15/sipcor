var BASE_URL = "http://localhost/scrr/";

function LoadReferencia(tabla){
	$.ajax({
		url: BASE_URL +'ajax/LoadReferencia/'+tabla,
		type: 'post',
		dataType: 'json'
	})
	.done(function(data) {

		for (var i = 0; i < data.length; i++) {
			$('#'+tabla).append('<option value='+data[i][3]+'>'+data[i][4]+'</option>');
		};
	})
	.fail(function() {
		//alert("fail");
	})
	.always(function() {
		//alert("always");
	});
}

function LoadDespacho(tabla,item){
	$.ajax({
		url: BASE_URL +'ajax/LoadDespacho/'+tabla+'/'+item,
		type: 'post',
		dataType: 'json'
	})
	.done(function(data) {
		$('#'+tabla).empty();
			$('#'+tabla).append('<option>Seleccione</option>');		
		for (var i = 0; i < data.length; i++) {
			$('#'+tabla).append('<option value='+data[i][0]+'>'+data[i][1]+'</option>');
		};
	})
	.fail(function() {
		//alert("fail");
	})
	.always(function() {
		//alert("always");
	});
}

function loadSystem(tabla,item){
	$.ajax({
		url: BASE_URL +'ajax/loadSystem/'+tabla+'/'+item,
		type: 'post',
		dataType: 'json'
	})
	.done(function(data) {
		$('#'+tabla).empty();
			$('#'+tabla).append('<option>Seleccione</option>');		
		for (var i = 0; i < data.length; i++) {
			$('#'+tabla).append('<option value='+data[i][0]+'>'+data[i][1]+'</option>');
		};
	})
	.fail(function() {
		//alert("fail");
	})
	.always(function() {
		//alert("always");
	});
}

function load(campo,tabla,form)
{

$.ajax({
	url: BASE_URL+'ajax/load/'+campo+'/'+tabla,
	type: 'POST',
	dataType: 'json',
})
.done(function(data) {

$('#'+campo).focusout(function(event) 
{
	var c=0;
	var valor=$("#"+campo).val();
	for (var i = 0; i < data.length; i++) 
	{
		if (data[i][0]== valor)
		{
			c=c+1;
		}
	}
		if (c==0)
		{
			$("#"+campo+'2').css("color","#ff3333");
			$("#"+campo+'1').text('Este '+campo+' no existe');
			$("#"+form).click(function(event) {

		 	});
		}
		else
		{
			$("#"+campo+'2').css("color","#3c763d");
			$("#"+campo+'1').text('Este '+campo+' es valido para la recuperacion de su contraseña');

		}
});
})
.fail(function() {
	alert("error");
})
}

function user(campo,tabla,form){

$.ajax({
	url: BASE_URL+'ajax/load/'+campo+'/'+tabla,
	type: 'POST',
	dataType: 'json',
})
.done(function(data) {

$('#'+campo).focusout(function(event) 
{
	var c=0;
	var valor=$("#"+campo).val();
	for (var i = 0; i < data.length; i++) 
	{
		if (data[i][0]== valor)
		{
			c=c+1;
		}
	}
		if (c==0)
		{
			$("#"+campo+'2').css("color","#3c763d");
			$("#"+campo+'1').text('Su '+campo+' es valido para registrarse');
			$("#"+form).click(function(event) {

		 	});
		}
		else
		{
			$("#"+campo+'2').css("color","#ff3333");
			$("#"+campo+'1').text('Su '+campo+' ya esta registrado');

		}
});
})
.fail(function() {
	alert("error");
})
}

function hacer_click()
{ 
if (confirm('')){ 
   document.tuformulario.submit()
    }
} 

$(function($){
$.datepicker.regional['es'] = {
    closeText: 'Cerrar',
    prevText: '<Ant',
    nextText: 'Sig>',
    currentText: 'Hoy',
    monthNames: ['Enero', 'Febrero', 'Marzo', 'Abril', 'Mayo', 'Junio', 'Julio', 'Agosto', 'Septiembre', 'Octubre', 'Noviembre', 'Diciembre'],
    monthNamesShort: ['Ene','Feb','Mar','Abr', 'May','Jun','Jul','Ago','Sep', 'Oct','Nov','Dic'],
    dayNames: ['Domingo', 'Lunes', 'Martes', 'Miércoles', 'Jueves', 'Viernes', 'Sábado'],
    dayNamesShort: ['Dom','Lun','Mar','Mié','Juv','Vie','Sáb'],
    dayNamesMin: ['Do','Lu','Ma','Mi','Ju','Vi','Sá'],
    weekHeader: 'Sm',
    dateFormat: 'yy-mm-dd',
    firstDay: 7,
    isRTL: false,
    showMonthAfterYear: false,
    yearSuffix: ''
};
$.datepicker.setDefaults($.datepicker.regional['es']);
});

$(document).ready(function() {
 $('#dataTables').DataTable({
		"language": {
	"sProcessing":     "Procesando...",
	"sLengthMenu":     "Mostrar _MENU_ registros",
	"sZeroRecords":    "No se encontraron resultados",
	"sEmptyTable":     "Ningún dato disponible en esta tabla",
	"sInfo":           "Mostrando registros del _START_ al _END_ de un total de _TOTAL_ registros",
	"sInfoEmpty":      "Mostrando registros del 0 al 0 de un total de 0 registros",
	"sInfoFiltered":   "(filtrado de un total de _MAX_ registros)",
	"sInfoPostFix":    "",
	"sSearch":         "Buscar:",
	"sUrl":            "",
	"sInfoThousands":  ",",
	"sLoadingRecords": "Cargando...",
	"oPaginate": {
		"sFirst":    "Primero",
		"sLast":     "Ãšltimo",
		"sNext":     "Siguiente",
		"sPrevious": "Anterior"
	},
	"oAria": {
		"sSortAscending":  ": Activar para ordenar la columna de manera ascendente",
		"sSortDescending": ": Activar para ordenar la columna de manera descendente"
			}
		}	 
	});
 });


$(function () {
    $( "#datepicker" ).datepicker({
        changeMonth: true,
        changeYear: true,
        minDate: "-2Y",
        maxDate: "+0M +0D"
    });
});

$(function () {
    $( "#date" ).datepicker({
        changeMonth: true,
        changeYear: true,
        minDate: "-2Y",
        maxDate: "+0M +0D"
    });
});

$(document).ready(function() {
    $('.js-example-basic-multiple').select2();
});