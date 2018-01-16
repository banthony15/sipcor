$(document).ready(function ()
{
	

	$("#clave").focusout(function() 
	{
		var tx=$("#clave").val();
		var nMay = 0, nMin = 0, nNum = 0, nEsp = 0
		var t1 = "ABCDEFGHIJKLMNÑOPQRSTUVWXYZ"
		var t2 = "abcdefghijklmnñopqrstuvwxyz"
		var t3 = "0123456789"
		var t4 = "+-*/#$%&/()=?¡"
		for (i=0;i<tx.length;i++) {
			if ( t1.indexOf(tx.charAt(i)) != -1 ) {nMay++}
			if ( t2.indexOf(tx.charAt(i)) != -1 ) {nMin++}
			if ( t3.indexOf(tx.charAt(i)) != -1 ) {nNum++}
			if ( t4.indexOf(tx.charAt(i)) != -1 ) {nEsp++}
		}


		if ( nMay>0 &&  nMin>0  && nNum==0)
		{ 

		 	$("#texto").text("falta al menos un numero a la clave");
		 	$("#texto").css('color','#ff0040');
		 	$("#evento").click(function(event) {
		 		event.preventDefault();	
		 		alert("te falta un numero en la clave");
		 	}); 
		}
		if ( nNum>0 &&  nMin>0  && nMay==0)
		{ 

		 	$("#texto").text("falta al menos una letra mayuscula a la clave"); 
		 	$("#texto").css('color','#ff0040');
		 	$("#evento").click(function(event) {
		 		event.preventDefault();	
		 		alert("te falta un mayuscula en la clave");
		 	}); 
		}
		
		if ( nNum>0 &&  nMay>0  && nMin==0)
		{ 

		 	$("#texto").text("falta al menos una letra minuscula a la clave"); 
		 	$("#texto").css('color','#ff0040');
		 	$("#evento").click(function(event) {
		 		event.preventDefault();	
		 		alert("te falta un minuscula en la clave");
		 	}); 
		}

		if ( nMay>0 && nMin==0 && nNum==0 )
		{ 

		 	$("#texto").text("te falta una letra minuscula y un numero en la clave"); 
		 	$("#texto").css('color','#ff0040');
		 	$("#evento").click(function(event) {
		 		event.preventDefault();	
		 	}); 
		}

		if ( nMay==0 && nMin>0 && nNum==0 )
		{ 

		 	$("#texto").text("te falta una letra mayuscula y un numero en la clave"); 
		 	$("#texto").css('color','#ff0040');
		 	$("#evento").click(function(event) {
		 		event.preventDefault();	
		 	}); 

		}
		if ( nMay==0 && nMin==0 && nNum>0 )
		{ 

		 	$("#texto").text("te falta una letra mayuscula y un minuscula en la clave"); 
		 	$("#texto").css('color','#ff0040');
		 	$("#evento").click(function(event) {
		 		event.preventDefault();	
		 	}); 
		}


		if ( nMay>0 && nMin>0 && nNum>0 )
		{ 

		 	$("#texto").text("clave valida para registrar"); 
		 	$("#texto").css('color','#3c763d');
		 	$("#evento").click(function(event) {
		 		
		 	});
		}


	});

	$("#clave1").focusout(function() {
		x=$("#clave").val();
		y=$("#clave1").val();
		if(x==y)
		{
			$("#val").text("las claves coinciden"); 
		 	$("#val").css('color','#3c763d');
		 	$("#evento").click(function(event) {
		 		
		 	});
		}
		else
		{
			$("#val").text("las claves no coinciden coinciden"); 
		 	$("#val").css('color','#ff0040');
		 	$("#evento").click(function(event) {
		 		event.preventDefault();	
		 	});
		}
	});

});
