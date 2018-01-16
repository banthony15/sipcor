	<?php
	class loginController extends Controller {
		private $_login;
		public function __construct() {
			parent::__construct();
			$this->_login = $this->loadModel('login');
			$this->_sidebar_menu = false;
		}
		
		function index() {
					
			if (Session::get('authenticated')) {
				$this->_view->redirect('');
			}else {
			//	$this->_view->render('access','','login');
				$this->_view->render('access', '','login');
			}
			
			
		}
		
		public function signIn() {
			
						
			if ($_SERVER['REQUEST_METHOD'] == 'POST') {
				
				if ((empty($_POST['user_name'])) or (empty($_POST['password']))) {
					$this->_view->_error = Controller::getBoxAlert(
							'Campos requeridos', 
							'Debe suministrar un nombre de usuario y una contrase&ntilde;a validos para el acceso.',
							'danger'
					);
					$this->_view->render('access', '','login');
					exit();
				}
				
				$data = $this->_login->getUser($_POST['user_name'], $_POST['password']);
				
				if (!$data) {
					$this->_view->_error = Controller::getBoxAlert(
							'Usuario no Existente O Contrase&ntilde;a Incorrecta', 
							'',
							'danger'
					);
					$this->_view->render('access', '','login');
					exit();
				}
				
				Session::set('authenticated', true);
				Session::set('level', $data['perfil']);
				session::set('persona_id', $data['id']);
				session::set('usuario_id', $data['id']);

				
				Session::set('time', time());
				
				switch ($data['perfil']) {
					case 'Administrador':
						Session::set('user', 'Admin. '.$data['nombre_1'].' '.$data['apellido_1']);
						$this->_view->redirect('index');
					break;

					case 'Super Usuario':
						Session::set('user', 'Su. '.$data['nombre_1'].' '.$data['apellido_1']);
						$this->_view->redirect('index');
					break;
					
					case 'Inhabilitado':
						Session::set('user', '"Suspendido" '.$data['nombre_1'].' '.$data['apellido_1']);
						$this->_view->redirect('index');
					break;
					

					default:
						Session::set('user', $data['nombre_1'].' '.$data['apellido_1']);
						$this->_view->redirect();
					break;
				}
			}else {
				$this->_view->render('access', '','login');
			}
		}
			
		public function close($param) {
			Session::destroy();
			$this->_view->redirect('login',$this->_sidebar_menu);
		}


	
	}
?>