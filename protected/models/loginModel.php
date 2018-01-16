<?php
	
	class loginModel extends Model {
		
		protected 	$query;
		
		public function __construct() {
			parent::__construct();
		}
		
		public function __destruct() {
			;
		}
		
		public function getUser($user, $pass) {
			$data = $this->_db->query(
				'SELECT
					persona.id,
					usuario.id,
					persona.nombre_1,
					persona.apellido_1,
					usuario.usuario,
					usuario.clave,
					referencia.referencia as "perfil"
					FROM
					persona
					INNER JOIN usuario ON usuario.persona_id = persona.id
					INNER JOIN referencia ON referencia.id = usuario.perfil_id

					WHERE 
						usuario.usuario = "'.$user.'" 
					AND 
						usuario.clave = "'.md5($pass).'"'
			);

			return $data->fetch();
		}
		
		
		
	}
?>