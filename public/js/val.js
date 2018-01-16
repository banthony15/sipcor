//esto captura el ID del formulario al cual se le aplicaran las validaciones.
//dichas validaciones son al campo por nombre 
$('#val').bootstrapValidator({
	 feedbackIcons: {
		 valid: 'glyphicon glyphicon-ok',
		 invalid: 'glyphicon glyphicon-remove',
		 validating: 'glyphicon glyphicon-refresh'
	 },
	 fields: {

		 num_cel: {
			 validators: {
			 	 notEmpty: { // No puede ser vacio
					 message: 'el numero de telefono es requerido'
				 },
				 regexp: { // Solo estos caracteres pueden ser usados
					 regexp: /^[0-9]+$/,
					 message: 'el numero de telefono es requerido'
				 }
			 }
		 },

		 cod_area: {
			 validators: {
			 	 notEmpty: { // No puede ser vacio
					 message: 'el codigo de area es requerido'
				 },
				 regexp: { // Solo estos caracteres pueden ser usados
					 regexp: /^[0-9]+$/,
					 message: 'el codigo de area es requerido'
				 }
			 }
		 },		 

		 tipo_de_solicitud: {
			 validators: {
			 	 notEmpty: { // No puede ser vacio
					 message: 'el tipo de solicitud es requerido'
				 },
				 regexp: { // Solo estos caracteres pueden ser usados
					 regexp: /^[0-9]+$/,
					 message: 'El tipo de solicitud es requerido'
				 }
			 }
		 },

		 tipo_de_requerimiento: {
			 validators: {
			 	 notEmpty: { // No puede ser vacio
					 message: 'el tipo de requerimiento es requerido'
				 },
				 regexp: { // Solo estos caracteres pueden ser usados
					 regexp: /^[0-9]+$/,
					 message: 'el tipo de requerimiento es requerido'
				 }
			 }
		 },

		 Sistema: {
			 validators: {
			 	 notEmpty: { // No puede ser vacio
					 message: 'el sistema es requerido'
				 },
				 regexp: { // Solo estos caracteres pueden ser usados
					 regexp: /^[0-9]+$/,
					 message: 'el sistema requerimiento'
				 }
			 }
		 },

		 Modulo: {
			 validators: {
			 	 notEmpty: { // No puede ser vacio
					 message: 'el modulo es requerido'
				 },
				 regexp: { // Solo estos caracteres pueden ser usados
					 regexp: /^[0-9]+$/,
					 message: 'el modulo es requerido'
				 }
			 }
		 },

		 status: {
			 validators: {
			 	 notEmpty: { // No puede ser vacio
					 message: 'el modulo es requerido'
				 },
				 regexp: { // Solo estos caracteres pueden ser usados
					 regexp: /^[0-9]+$/,
					 message: 'el modulo es requerido'
				 }
			 }
		 },	

	 }
});
