<?php 

	class reportesModel extends Model{
		
		
		
		public function __construct(){
			parent::__construct();
		}
		public function __destruct(){
			;
		}

		function totalanalista(){

			$this->_query= "SELECT requerimiento_analista.id, credencial, nombre_1, apellido_1, COUNT(persona_id) as total from requerimiento_analista
							inner join persona on persona.id = requerimiento_analista.persona_id
							GROUP BY credencial, nombre_1,apellido_1";

			return $this->Read();
		}

		function total(){

			$this->_query= "SELECT requerimiento_analista.id, COUNT(persona_id) as total from requerimiento_analista";

			return $this->Read();
		}

		function totaldespacho(){

			$this->_query= "SELECT requerimiento_has_persona.id, descripcion_depen, COUNT(persona_id) as total from requerimiento_has_persona
							inner join persona on persona.id = requerimiento_has_persona.persona_id
							inner join dependencias on dependencias.id = persona.areac_id 
							GROUP BY descripcion_depen";

			return $this->Read();
		}

		function total1(){

			$this->_query= "SELECT requerimiento_has_persona.id, COUNT(persona_id) as total from requerimiento_has_persona";

			return $this->Read();
		}

}?>