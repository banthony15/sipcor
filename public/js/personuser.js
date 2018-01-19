//esto captura el ID del formulario al cual se le aplicaran las validaciones.
//dichas validaciones son al campo por nombre 
$('#personuser').bootstrapValidator({
	 feedbackIcons: {
		 valid: 'glyphicon glyphicon-ok',
		 invalid: 'glyphicon glyphicon-remove',
		 validating: 'glyphicon glyphicon-refresh'
	 },
	 fields: {

	 	cedula: { // campo cedula

			 validators: {
			 	 notEmpty: { // No puede ser vacio
					 message: 'La Cedula es requerida'
				 },
				 regexp: { // Solo estos caracteres pueden ser usados
					 regexp: /^[1234567890]+$/,
					 message: 'El Formato de la cedula es incorrecto'
				 },
				 between: { //rango entre 1 y 40 millones
				 			   min: 1,
                        	   max: 90000000,

				 	 message: 'El Rango de la Cedula es de 1 a 90 Millones'
				 	 	
				 }
			 } 
		 },

	 	credencial: { // campo cedula

			 validators: {
			 	 notEmpty: { // No puede ser vacio
					 message: 'La credencial es requerida'
				 },
				 regexp: { // Solo estos caracteres pueden ser usados
					 regexp: /^[1234567890]+$/,
					 message: 'El Formato de la credencia es incorrecto'
				 },
				 between: { //rango entre 1 y 40 millones
				 				min:1,
				 			   	max: 900000,
				 	 message: 'El Rango de la CREDENCIAL es incorrecto'
				 	 	
				 }
			 } 
		 },

		 nombre_1: {
			 validators: {
			 	 notEmpty: { // No puede ser vacio
					 message: 'El nombre es requerido'
				 },
				 regexp: { // Solo estos caracteres pueden ser usados
					 regexp: /^[ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz]+$/,
					 message: 'El Nombre Solo Puede Contener Letras'
				 }
			 }
		 },

		 nombre_2: {
			 validators: {
				 regexp: { // Solo estos caracteres pueden ser usados
					 regexp: /^[ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz]+$/,
					 message: 'El Nombre Solo Puede Contener Letras'
				 }
			 }
		 },

		 apellido_1: {
			 validators: {
				 notEmpty: { // Solo estos caracteres pueden ser usados
					 message: 'El apellido es requerido'
				 },
				 regexp: { // Solo estos caracteres pueden ser usados
					 regexp: /^[ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz]+$/,
					 
					 message: 'El Apellido Solo Puede Contener Letras'

				 }
			 }
		 },

		 apellido_2: {
			 validators: {
				 regexp: { // Solo estos caracteres pueden ser usados
					 regexp: /^[ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz]+$/,
					 message: 'El Apellido Solo Puede Contener Letras'
				 }
			 }
		 },

		 cargo: {
			 validators: {
				 regexp: { // Solo estos caracteres pueden ser usados
					 regexp: /^[ABCDEFGHIJKLMNÑOPQRSTUVWXYZabcdefghijklmnñopqrstuvwxyz]+$/,
					 message: 'El Cargo Solo Puede Contener Letras'
				 }
			 }
		 },

		 jerarquia: { 
			 message: 'El teléfono no es valido',
			 validators: {
				 notEmpty: {
					 message: 'El teléfono es requerido y no puede ser vacio'
				 },
				 regexp: {// valida solo numeros del 0 a 9
					 regexp: /^[0-9]+$/,
					 message: 'seleccione'

				 }
			 }
		 },	

		 correo: {
			 validators: {
				 notEmpty: {
					 message: 'El correo es requerido y no puede ser vacio'
				 },
				 emailAddress: {//valida que sea tipo correo
					 message: 'El correo electronico no es valido'
				 }
			 }
		 },	

		 areaa: { 
			 message: 'El teléfono no es valido',
			 validators: {
				 notEmpty: {
					 message: 'El teléfono es requerido y no puede ser vacio'
				 },
				 regexp: {// valida solo numeros del 0 a 9
					 regexp: /^[0-9]+$/,
					 message: 'seleccione'
				 }
			 }
		 },
	
		 areab: { 
			 message: 'El teléfono no es valido',
			 validators: {
				 notEmpty: {
					 message: 'El teléfono es requerido y no puede ser vacio'
				 },
				 regexp: {// valida solo numeros del 0 a 9
					 regexp: /^[0-9]+$/,
					 message: 'seleccione'
				 }
			 }
		 },	

		 areac: { 
			 message: 'El teléfono no es valido',
			 validators: {
				 notEmpty: {
					 message: 'El teléfono es requerido y no puede ser vacio'
				 },
				 regexp: {// valida solo numeros del 0 a 9
					 regexp: /^[0-9]+$/,
					 message: 'seleccione'
				 }
			 }
		 },

		 usuario: { 
			 message: 'El teléfono no es valido',
			 validators: {
				 notEmpty: {
					 message: 'El usuario es requerido y no puede ser vacio'
				 },
			 }
		 },

		 clave: { 

			 validators: {
				 notEmpty: {
					 message: 'la clave es requerida y no puede ser vacio'
				 },
			 }
		 },		 

		 pregunta: { 
			validators: {
				 notEmpty: {
					 message: 'la pregunta es obligatoria para el registro'
				 },
			 }
		 },	

		 respuesta: { 
			 validators: {
				 notEmpty: {
					 message: 'la respuesta es obligatoria para el registro'
				 },
			 }
		 },	

		 perfil: {
			 validators: {
			 	 notEmpty: { // No puede ser vacio
					 message: 'El perfil es requerido'
				 },
				 regexp: { // Solo estos caracteres pueden ser usados
					 regexp: /^[0-9]+$/,
					 message: 'El perfil es requerido'
				 }
			 }
		 },	

	 }
});
