<?php 
	class recuperarController extends Controller{
		

		protected $_sidebar_menu;
		private $_recuperar;
		
		public function __construct(){
	
			parent::__construct();
			$this->_recuperar = $this->loadModel('recuperar');
		//Objeto donde almacenamos todas las funciones de PersonsModel.php

			$this->_view->setJs(array("js/clave"));
			$this->_view->setJS(array('js/recuperar/recuperar'));			

			$this->_sidebar_menu =array(
					array(
				'id' => 'ini',
				'title' => 'Inicio',
				'link' => BASE_URL . 'recuperar' . DS . 'index'
						)
									);//fin sidebar
		}
		
		function index(){
		
			
			$this->_view->render('index', 'contenido', '',$this->_sidebar_menu);
			// clase  metodo 	  vista    carpeta dentro de views 
		}

		function recu(){

			$this->_view->render('recu','recuperar','');
			
		}



		function recuperar_c()
		{
			$usuario=$_POST['usuario'];
			$clave=$_POST['clave'];
			$pregunta=$_POST['pregunta'];
			$respuesta=$_POST['respuesta'];

			$lista = $this->_recuperar->recuperar_c($usuario,$clave);
			$this->_view->_lista = $lista;
	
			if($pregunta==$lista[0]['pregunta'])
			{
				if($respuesta==$lista[0]['respuesta'])
				{
					$this->_recuperar->update($usuario,$clave);
					$this->_view->mensaje="Se ha cambiado con exito su clave";
					$this->_view->render('mensaje','recuperar','');
				}
			}
			else
			{
				$this->_view->error="Error no se pudo recuperar su clave, la pregunta o respuesta son invalidas";
				$this->_view->render('error','recuperar','');
			}

			
		}


}?>