<?php 
	class ajaxController extends Controller{
		
		
		protected $_sidebar_menu;
		private $_person;
		
		public function __construct(){
			parent::__construct();
			$this->_ajax = $this->loadModel('ajax');
		}
		
		function index(){
			
		}

		function LoadReferencia($tabla){
			$data = $this->_ajax->LoadReferencia($tabla);
			
			echo json_encode($data);
		}
		
		function LoadDespacho($tabla ,$item){
			$data = $this->_ajax->LoadDespacho($tabla,$item);
			
			echo json_encode($data);
		}

		function loadSystem($tabla ,$item){
			$data = $this->_ajax->loadSystem($tabla,$item);
			
			echo json_encode($data);
		}

		function load($campo,$tabla)
		{
		
				$data=$this->_ajax->load($campo,$tabla);
				if(isset($data))
				{
					echo json_encode($data);
				}
		}			


}?>