<?php 
	
	
	class recuperarModel extends Model{
		
		
		
		public function __construct(){
			parent::__construct();
		}
		public function __destruct(){
			;
		}


		function recuperar_c($usuario){

		$this->_query="SELECT * from usuario where usuario ='$usuario'";		
		return $this->Read();

		}

		function update($usuario,$clave){


			$this->_query="UPDATE `usuario` set `clave` = '".md5($clave)."' where `usuario` = '$usuario'";
			$this->CUD();

			}
		

}?>