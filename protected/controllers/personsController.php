<?php 
	class personsController extends Controller{
		
		
		protected $_sidebar_menu;
		private $_person;
		
		public function __construct(){
	
			parent::__construct();
			$this->_person = $this->loadModel('persons');
		//Objeto donde almacenamos todas las funciones de PersonsModel.php
			$this->_view->setJS(array('js/persons/persons'));
			$this->_view->setJs(array("js/clave"));
			$this->_view->setJS(array('js/personuser'));
			$this->_sidebar_menu =array(
					array(
				'id' => 'ini',
				'title' => 'Inicio',
				'link' => BASE_URL . 'persons' . DS . 'index'
						)
									);//fin sidebar
		}
		
		function index(){
		
			
			$this->_view->render('index', 'persons', '',$this->_sidebar_menu);
			// clase  metodo 	  vista    carpeta dentro de views 
		}

		function insert(){
		Session::accessRole(array('Administrador'));
			if($_SERVER['REQUEST_METHOD']=='POST'){

				$persona = array(
				':cedula' => $_POST['cedula'] ,
				':credencial' => $_POST['credencial'] ,
				':nombre_1' => $_POST['nombre_1'] ,
				':nombre_2' => $_POST['nombre_2'] ,						
				':apellido_1' => $_POST['apellido_1'] ,
				':apellido_2' => $_POST['apellido_2'] ,	
				':correo' => $_POST['correo'] ,	
				':cargo' => $_POST['cargo'] ,
				':jerarquia' => $_POST['jerarquia'] ,
				':areac' => $_POST['areac']
			);

				$usuario = array(
				':usuario' => $_POST['usuario'] ,							
				':clave' => md5($_POST['clave']) ,
				':pregunta' => $_POST['pregunta'] ,
				':respuesta' =>  $_POST['respuesta'],				
				':perfil' => $_POST['perfil'] 				
			);

			$this->_person->insertPerson($persona,$usuario);
			$this->_view->redirect('persons/insert');
			
			}else{

				$this->_view->render('insert', 'persons', '',$this->_sidebar_menu);

			}		
				
		}

		function asign($id = false){
		Session::accessRole(array('Administrador'));
			if($_SERVER['REQUEST_METHOD']=='POST'){


				$usuario = array(
				':usuario' => $_POST['usuario'] ,							
				':clave' => md5($_POST['clave']) ,
				':pregunta' => $_POST['pregunta'] ,
				':respuesta' =>  $_POST['respuesta'],
				':persona' => $_POST['persona'],			
				':perfil' => $_POST['perfil']

			);

			$this->_person->asignuser($usuario);
			$this->_view->redirect('persons/consulta');
			
			}else{

				$persona = $this->_person->UnicaPersona($id);
				$this->_view->_persona = $persona;
				$this->_view->render('asign', 'persons', '',$this->_sidebar_menu);

			}		
				
		}		

		function consulta(){
					Session::accessRole(array('Administrador'));	
			//$this->_view->setJS(array('js/persons'));
			$listado = $this->_person->getPersons();
			$this->_view->_listado = $listado;

			$this->_view->render('consulta','persons','',$this->_sidebar_menu);
		}

		function delete($id){
		Session::accessRole(array('Administrador'));
			$this->_person->deletePersons($id);
			$this->_view->redirect('persons/consulta');
		}

		function update($id= false){
		Session::accessRole(array('Administrador'));
			if ($_SERVER['REQUEST_METHOD']=='POST'){

			$persona = array(
				':id' => $_POST['id'] ,
				':cedula' => $_POST['cedula'] ,
				':credencial' => $_POST['credencial'] ,
				':nombre_1' => $_POST['nombre_1'] ,
				':nombre_2' => $_POST['nombre_2'] ,					
				':apellido_1' => $_POST['apellido_1'] ,
				':apellido_2' => $_POST['apellido_2'] ,	
				':correo' => $_POST['correo'] ,	
				':cargo' => $_POST['cargo'] ,
				':jerarquia' => $_POST['jerarquia'] ,
				':areac' => $_POST['areac']
			);
			

			$this->_person->updatePersons($persona);

				$this->_view->redirect('persons/update/'.$persona[':id']);

			}else{

				$persona = $this->_person->UnicaPersona($id);
				$this->_view->_persona = $persona;
				$this->_view->render('update','persons','','');
			}

		}

		function consultaruser(){
		Session::accessRole(array('Administrador'));
			$lista = $this->_person->getUsuario();
			$this->_view->_lista = $lista;
			$this->_view->render('consultaruser','persons','',$this->_sidebar_menu);
		}		

		function updateusuario($id= false){
		Session::accessRole(array('Administrador'));
			if ($_SERVER['REQUEST_METHOD']=='POST'){

			$usuario = array(

				':id' => $_POST['id'] ,
				':usuario' => $_POST['usuario'],
				':perfil' => $_POST['perfil']
			);
			

			$this->_person->updateUser($usuario);

				$this->_view->redirect('persons/consultaruser/');

			}else{

				$usuario = $this->_person->unicouser($id);
				$this->_view->_usuario = $usuario;
				$this->_view->render('updateusuario','persons','','');
			}

		}

		function datospersonales(){
		Session::accessRole(array('Administrador','Super Usuario','Usuario'));
			$lista = $this->_person->getdatospersonales();
			$this->_view->_lista = $lista;
			$this->_view->render('datospersonales','persons','',$this->_sidebar_menu);
		}	

		function updatedatospersonales($id= false){
		Session::accessRole(array('Administrador','Super Usuario','Usuario'));		
			if ($_SERVER['REQUEST_METHOD']=='POST'){

			$usuario = array(
				':id' => $_POST['id'] ,
				':clave' => md5($_POST['clave']) ,
				':pregunta' => $_POST['pregunta'] ,
				':respuesta' =>  $_POST['respuesta']
			);
			

			$this->_person->updatedatos($usuario);
			$this->_view->redirect('persons/datospersonales/');

			}else{

				$usuario = $this->_person->getupdatedatospersonales($id);
				$this->_view->_usuario = $usuario;
				$this->_view->render('updatedatospersonales','persons','','');
			}

		}		


	


}?>