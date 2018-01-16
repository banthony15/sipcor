<?php 

class indexController extends Controller{
	
	public function __construct(){

		
		parent::__construct();
		
	}
	
	function  index(){
	Session::accessRole(array('Administrador','Super Usuario','Usuario','Inhabilitado'));
		$this->_view->render('index');
	}	
	
	
}


?>