<?php 

	class requerimientosModel extends Model{
		
		
		
		public function __construct(){
			parent::__construct();
		}
		public function __destruct(){
			;
		}

		function insertRequerimiento($requerimiento, $telefono, $datos_has_telefono, $requerimiento_has_persona, $requerimiento_analista){

try {

		$this->_db->beginTransaction();

		$session=Session::get('persona_id');

		$this->_query="INSERT INTO `telefono`(`num_cel`, `cod_area_id`) VALUES 
		(:num_cel, :cod_area)";		
		$this->_db->prepare($this->_query)->execute($telefono);
		$localid = $this->_db->lastinsertid('telefono');


		$this->_query="INSERT INTO `requerimiento`(`fecha`, `tipo_de_solicitud_id`, `numero`, 
		`fecha_documento`, `tipo_de_requerimiento_id`, `status_id`, `descripcion`, `solucion`, `observaciones`, `Modulo_id`) VALUES

		(:fecha, :tipo_de_solicitud, :numero, :fecha_documento, :tipo_de_requerimiento, :status, :descripcion, :solucion, :observaciones, :Modulo)";
		$this->_db->prepare($this->_query)->execute($requerimiento);
		$requerimientoid = $this->_db->lastinsertid('requerimiento');

		$this->_query=" INSERT INTO `datos_has_telefono`(`telefono_id`,`persona_id`) VALUES		
		($localid, :persona)";		
		$this->_db->prepare($this->_query)->execute($datos_has_telefono);

	
		$this->_query=" INSERT INTO `requerimiento_has_persona`(`requerimiento_id`,`persona_id`) VALUES		
		($requerimientoid, :persona)";		
		$this->_db->prepare($this->_query)->execute($requerimiento_has_persona);
	

		$this->_query=" INSERT INTO `requerimiento_analista`(`persona_id`, `requerimiento_id`) VALUES		
		($session, $requerimientoid)";		
		$this->_db->prepare($this->_query)->execute($requerimiento_analista);

		$this->_db->commit();		
} catch (Exception $e) {
		$this->_db->rollBack();
		echo "Error :: ".$e->getMessage();
		exit();
}
		}	

		function insert($persona, $requerimiento, $telefono, $datos_has_telefono, $requerimiento_has_persona, $requerimiento_analista){

		$session=Session::get('persona_id');

try {

		$this->_db->beginTransaction();
			$this->_query="INSERT INTO `persona`(`cedula`, `credencial`, `nombre_1`, `nombre_2`, `apellido_1`, `apellido_2`, 
			`correo`, `cargo`, `jerarquia_id`, `areac_id`) VALUES

			(:cedula,:credencial, :nombre_1, :nombre_2, :apellido_1, :apellido_2,
			 :correo, :cargo, :jerarquia, :areac)";		
		$this->_db->prepare($this->_query)->execute($persona);
		$personaid = $this->_db->lastinsertid('persona');

		$this->_query="INSERT INTO `telefono`(`num_cel`, `cod_area_id`) VALUES 
		(:num_cel, :cod_area)";		
		$this->_db->prepare($this->_query)->execute($telefono);
		$localid = $this->_db->lastinsertid('telefono');
		
		$this->_query="INSERT INTO `requerimiento`(`fecha`, `tipo_de_solicitud_id`, `numero`, 
		`fecha_documento`, `tipo_de_requerimiento_id`, `status_id`, `descripcion`, `solucion`, `observaciones`, `Modulo_id`) VALUES

			(:fecha, :tipo_de_solicitud, :numero, :fecha_documento, 
			:tipo_de_requerimiento, :status, :descripcion, :solucion, :observaciones, :Modulo)";
		$this->_db->prepare($this->_query)->execute($requerimiento);
		$requerimientoid = $this->_db->lastinsertid('requerimiento');

		$this->_query=" INSERT INTO `datos_has_telefono`(`persona_id`, `telefono_id`) VALUES		
		($personaid, $localid)";		
		$this->_db->prepare($this->_query)->execute();


		$this->_query=" INSERT INTO `requerimiento_has_persona`(`persona_id`, `requerimiento_id`) VALUES		
		($personaid, $requerimientoid)";		
		$this->_db->prepare($this->_query)->execute();


		$this->_query=" INSERT INTO `requerimiento_analista`(`persona_id`, `requerimiento_id`) VALUES		
		($session, $requerimientoid)";		
		$this->_db->prepare($this->_query)->execute();		

		

		$this->_db->commit();		
} catch (Exception $e) {
		$this->_db->rollBack();
		echo "Error :: ".$e->getMessage();
		exit();
}		

	}		

	

		function listarrequerimientos(){

			$session=Session::get('persona_id');

			$this->_query= "SELECT requerimiento.id, nombre_1, apellido_1, fecha, ref_solicitud.referencia as 'tipo de solicitud', fecha_documento, ref_requerimiento.referencia as 'tipo de requerimiento', ref_status.referencia as 'status' FROM requerimiento
				inner join referencia as ref_solicitud on ref_solicitud.id = tipo_de_solicitud_id
				inner join referencia as ref_requerimiento on ref_requerimiento.id = tipo_de_requerimiento_id
				inner join referencia as ref_status on ref_status.id = status_id
				inner join requerimiento_analista on requerimiento_analista.requerimiento_id = requerimiento.id 
				inner join persona on persona.id = requerimiento_analista.persona_id 
				where persona.id = $session";
			return $this->Read();
		}

		function totalrequeri(){

			$this->_query= "SELECT requerimiento.id, nombre_1, apellido_1, fecha, ref_solicitud.referencia as 'tipo de solicitud', fecha_documento, ref_requerimiento.referencia as 'tipo de requerimiento', ref_status.referencia as 'status' FROM requerimiento

				inner join referencia as ref_solicitud on ref_solicitud.id = tipo_de_solicitud_id
				inner join referencia as ref_requerimiento on ref_requerimiento.id = tipo_de_requerimiento_id
				inner join referencia as ref_status on ref_status.id = status_id
				inner join requerimiento_analista on requerimiento_analista.requerimiento_id = requerimiento.id 
				inner join persona on persona.id = requerimiento_analista.persona_id ";

			return $this->Read();
		}		

		function getFuncionarios(){

			$this->_query="SELECT persona.id, cedula, credencial, nombre_1,apellido_1, descripcion_depen FROM persona
							inner join dependencias on dependencias.id = persona.areac_id" ;
			return $this->Read();

		}

		function REGperson($id){

			$this->_query= " SELECT persona.id, cedula, credencial, nombre_1, nombre_2, apellido_1, apellido_2, correo, cargo, ref_jerarquia.referencia as 'jerarquia', descripcion_depen FROM persona
							Inner join referencia as ref_jerarquia on ref_jerarquia.id = jerarquia_id
							inner join dependencias on dependencias.id = persona.areac_id 
							where persona.id = $id";

			return $this->Read();
		}

		function getRequerimiento($id){

		$this->_query="SELECT requerimiento.id, ref_cod.referencia as 'cod_area', num_cel, cedula, credencial, nombre_1, nombre_2, apellido_1, apellido_2, correo, cargo, ref_jerarquia.referencia as 'jerarquia', descripcion_depen, fecha, time(hora), ref_solicitud.referencia as 'tipo de solicitud', numero, fecha_documento, ref_requerimiento.referencia as 'tipo de requerimiento', ref_status.referencia as 'status', descripcion, solucion, observaciones, descripcion_sistema, 'sistema' FROM requerimiento

 			inner join referencia as ref_solicitud on ref_solicitud.id = tipo_de_solicitud_id	
            inner join referencia as ref_requerimiento on ref_requerimiento.id = tipo_de_requerimiento_id
            inner join referencia as ref_status on ref_status.id = status_id
  			inner join sistemas on sistemas.id = requerimiento.Modulo_id
            inner join requerimiento_has_persona on requerimiento_has_persona.requerimiento_id = requerimiento.id
			inner join persona on persona.id = requerimiento_has_persona.persona_id            
            Inner join referencia as ref_jerarquia on ref_jerarquia.id = jerarquia_id
			inner join dependencias on dependencias.id = persona.areac_id
			inner join datos_has_telefono on datos_has_telefono.persona_id = persona.id
            inner join telefono on telefono.id = datos_has_telefono.telefono_id
            inner join referencia as ref_cod on ref_cod.id = cod_area_id
			where requerimiento.id = $id";
			
			return $this->Read();
		}

		function updateRequerimiento($requerimiento){

			$this->_query= "UPDATE requerimiento SET 

					fecha                    = :fecha,

					tipo_de_solicitud_id     = :tipo_de_solicitud,
					numero                   = :numero,
					fecha_documento          = :fecha_documento,
					tipo_de_requerimiento_id = :tipo_de_requerimiento,
					status_id                = :status,
					descripcion              = :descripcion,
					solucion                 = :solucion,
					observaciones            = :observaciones,
					Modulo_id                = :Modulo
					where requerimiento.id = :id";
		try {
				$this->_db->beginTransaction();
				$this->_db->prepare($this->_query)->execute($requerimiento);				
				$this->_db->commit();
				

			} catch (Exception $e) {
				$this->_db->rollBack();
				echo "Error :: ".$e->getMessage();
				exit();
			}
		}



}?>