<?php
	class View {
		
		private $_controller;
		private $_js;
		private $_css;
		
		public function __construct(Request $request) {			
		
			$this->_controller = $request->getController();
			$this->_js = array();
			$this->_css = array();
		}
	
		public function render($view, $menu = FALSE, $layout = FALSE, $sidebar_menu=false) {
			
			$login = array(
				'icon'	=>'fa-sign-out',
				'id'	=>'signout',
				'name'	=> utf8_encode('Salir'),
				'href'	=> BASE_URL . 'login/close'
			);

			$recuperar = array(

				'href'	=> BASE_URL . 'recuperar/recu'
			);					


			$menu = array(
							array(
		  	 				'id' => 'index',
		  	 				'title' 	=> 'Inicio',
		  	 				'link'=> BASE_URL . 'index'
					  	 	)
		
					  	 );

			$menu1 =  array(

					  	 	array(
							'id' => 'insert',
							'title' => ' Registrar',				            
							'link'=> BASE_URL . 'persons/insert'

				            )
					  	 );

			$menu2 =  array(
				            array(				            				            	
							'id' => 'consulta',
							'title' => 'Funcionarios',				            
							'link'=> BASE_URL . 'persons/consulta'

				            )
					  	 );

			$menu3 =  array(

							array(
							'id' => 'consultaruser',
							'title' => 'Usuarios del SISRCOR',
							'link' => BASE_URL . 'persons/consultaruser'
								
							)
						);

			$menu4 =  array(

							array(
							'id' => 'funcionarios',
							'title' => 'Nuevo Requerimiento',
							'link' => BASE_URL . 'requerimientos/funcionarios'

							)
						);					

			$menu5 =  array(

							array(
							'id' => 'readrequerimiento',
							'title' => 'Requerimientos Cargados',
							'link' => BASE_URL . 'requerimientos/readrequerimiento'

							)
						);	

				
			$menu6 =  array(

							array(
							'id' => 'totalrequerimiento',
							'title' => 'Requerimientos General',
							'link' => BASE_URL . 'requerimientos/totalrequerimiento'

							)
						);						  	


			$menu7 =  array(

							array(
							'id' => 'reportesporanalista',
							'title' => 'Reportes por Analista',
							'link' => BASE_URL . 'reportes/reportesporanalista'
									
							)
						);

			$menu8 =  array(

							array(
							'id' => 'reportespordespacho',
							'title' => 'Reportes por Despacho',
							'link' => BASE_URL . 'reportes/reportespordespacho'
									
							)
						);
			$menu9 =  array(

							array(
							'id' => 'datospersonales',
							'title' => 'Cambiar mis datos personales',
							'link' => BASE_URL . 'persons/datospersonales'
									
							)
						);

			
			$js = array();
			$css = array();
			
			if (count($this->_js)) {
				$js = $this->_js;
			}
			
			if (count($this->_css)) {
				$css = $this->_css;
			}
			
			$_view_params = array(					
				'menu' => $menu,
				'menu1'=>$menu1,
				'menu2' =>$menu2,
				'menu3' =>$menu3,
				'menu4' =>$menu4,
				'menu5' =>$menu5,
				'menu6' =>$menu6,
				'menu7' =>$menu7,
				'menu8' =>$menu8,
				'menu9' =>$menu9,				
				'sidebar_menu' => $sidebar_menu,

				'js' => $js,
				'css' => $css,
				'login' => $login,
				'recuperar' => $recuperar,					
			);					
			
			$view_route = ROOT . 'protected' . DS . 'views' . DS . $this->_controller . DS . $view . '.phtml';
			
			if (is_readable($view_route)) {
				
				switch ($layout) {
					
					case 'modal': 
						include_once ROOT . 'protected' . DS . 'views' . DS . 'layout/modal' . DS . 'statements.phtml';
						include_once $view_route;
						include_once ROOT . 'protected' . DS . 'views' . DS . 'layout/modal' . DS . 'footer.phtml';
					break;
							
					case 'login':
						include_once ROOT . 'protected' . DS . 'views' . DS . 'layout/login' . DS . 'statements.phtml';
						//include_once $view_route;
						//include_once ROOT . 'protected' . DS . 'views' . DS . 'layout/login' . DS . 'footer.phtml';
					break;
					
					case 'error': //error view
						include_once ROOT . 'protected' . DS . 'views' . DS . 'layout/error' . DS . 'statements.phtml';
						include_once $view_route;
						include_once ROOT . 'protected' . DS . 'views' . DS . 'layout/error' . DS . 'footer.phtml';
					break;
							
					default:
						include_once ROOT . 'protected' . DS . 'views' . DS . 'layout' . DS . 'statements.phtml';
						include_once ROOT . 'protected' . DS . 'views' . DS . 'layout' . DS . 'header.phtml';
						include_once ROOT . 'protected' . DS . 'views' . DS . 'layout' . DS . 'imagalery.phtml';
						include_once ROOT . 'protected' . DS . 'views' . DS . 'layout' . DS . 'sidebar.phtml';
						include_once $view_route;
						include_once ROOT . 'protected' . DS . 'views' . DS . 'layout' . DS . 'footer.phtml';
					break;
				}
				
			}else{
				
				throw new Exception('LA VISTA: "'. $view_route .'" NO FUE ENCONTRADA.');
			}				
		}
		
		public function redirect($route = NULL) {
			if ($route) {
				header('location:' . BASE_URL . $route );
				exit();
			}else {
				header('location:' . BASE_URL );
				exit();
			};
		}
		
		public function setJs(array $js) {
			if (is_array($js) && count($js)) {
				for ($i = 0; $i < count($js); $i++) {
					$this->_js[] = PUBLIC_URL . $js[$i] . '.js';
				}
			}else {
				throw new Exception('El archivo: '. $js . ' No fue encontrado');
			}
		}
		
		public function setCss(array $css) {
			if (is_array($css) && count($css)) {
				for ($i = 0; $i < count($css); $i++) {
					$this->_css[] = PUBLIC_URL . $css[$i] . '.css';
				}
			}else {
				throw new Exception('El archivo: '. $css . ' No fue encontrado');
			}
		}
	}
	
	/*
	 * bucle para el menu y submenu
	 * 
	   <?php 
			if ($_view_params['menu']) {
				for ($i = 0; $i < count($_view_params['menu']); $i++){
					if (isset($_view_params['menu'][$i]['sub'])) {
						echo '<a href="'.$_view_params['menu'][$i]['href'].'">';
						for ($j = 0; $j < count($_view_params['menu'][$i]['sub']); $j++){
							echo '<a href="'.$_view_params['menu'][$i]['sub'][$j]['href'].'"></a>';
						}
					}else{
						echo '<a href="'.$_view_params['menu'][$i]['href'].'"></a>';
					}
				}
        	}
		?>
	 */
	
?>