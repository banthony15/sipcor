<?php 

	class ajaxModel extends Model{
		
		
		
		public function __construct(){
			parent::__construct();
		}
		public function __destruct(){
			;
		}

	
		
		public function LoadReferencia($tabla)
		{	
			$this->_query="SELECT * FROM `referencia` 
			inner join referencia as ref2 on ref2.padre_id = referencia.id
			where referencia.referencia = '$tabla'";
			return $this->Read();
			
		}

		public function LoadDespacho($tabla,$item)
		{	
			if ($item == "false") {
				$this->_query="SELECT * FROM dependencias 
				inner join referencia on referencia_id = referencia.id
				where referencia.referencia = '$tabla'";
			}else{
				$this->_query="SELECT * FROM dependencias where padre_id = $item";
				 
			}
			
			return $this->Read();
		}

		public function loadSystem($tabla,$item)
		{	
			if ($item == "false") {
				$this->_query="SELECT * FROM sistemas 
				inner join referencia on referencia_id = referencia.id
				where referencia.referencia = '$tabla'";
			}else{
				$this->_query="SELECT * FROM sistemas where padre_id = $item";
				 
			}
			
			return $this->Read();
		}

		public function load($campo,$tabla)
		{
		
				$this->_query="Select ".$campo." from ".$tabla."";
				return $this->Read();				
				

		}

}?>