<?php 
	class requerimientosController extends Controller{
		
		
		protected $_sidebar_menu;
		private $_person;
		
		public function __construct(){
	
			parent::__construct();
			$this->_reque = $this->loadModel('requerimientos');
			
		//Objeto donde almacenamos todas las funciones de PersonsModel.php
			$this->_view->setJS(array('js/val'));
			$this->_view->setJS(array('js/valreque'));
			$this->_view->setJS(array('js/requerimientos/requerimientos'));
		
			$this->_sidebar_menu =array(
					array(
				'id' => 'ini',
				'title' => 'Inicio',
				'link' => BASE_URL . 'requerimientos' . DS . 'index'
						)
									);//fin sidebar
		}
		
		function index(){
		
			
			$this->_view->render('index', 'requerimientos', '',$this->_sidebar_menu);
			// clase  metodo 	  vista    carpeta dentro de views 
		}

		function nuevorequerimiento($id= false){

			Session::accessRole(array('Administrador','Super Usuario','Usuario'));

			if($_SERVER['REQUEST_METHOD']=='POST'){
				$requerimiento = array(
				':fecha' => $_POST['fecha'] ,
				':hora' => $_POST['hora'] ,
				':tipo_de_solicitud' => $_POST['tipo_de_solicitud'] ,
				':numero' => $_POST['numero'] ,						
				':fecha_documento' => $_POST['fecha_documento'] ,
				':tipo_de_requerimiento' => $_POST['tipo_de_requerimiento'] ,			
				':status' => $_POST['status'] ,
				':descripcion' => $_POST['descripcion'] ,	
				':solucion' => $_POST['solucion'] ,
				':observaciones' => $_POST['observaciones'],
				':Modulo' => $_POST['Modulo']				
			);
				$telefono = array(
				':num_cel' => $_POST['num_cel'] ,							
				':cod_area' => $_POST['cod_area']
			);
				$datos_has_telefono = array(
				':persona' => $_POST['persona']
			);
				$requerimiento_has_persona = array(
				':persona' => $_POST['persona']
			);
				$requerimiento_analista = array(
			);

			$this->_reque->insertRequerimiento($requerimiento,$telefono,$datos_has_telefono,$requerimiento_has_persona,$requerimiento_analista);
			$this->_view->redirect('requerimientos/funcionarios');
			
			}else{

				$persona = $this->_reque->REGperson($id);
				$this->_view->_persona = $persona;
				$this->_view->render('nuevorequerimiento', 'requerimientos', '',$this->_sidebar_menu);

			}		
				
		}

		function nuevorequerimientos(){
			
			Session::accessRole(array('Administrador','Super Usuario','Usuario'));

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
				$requerimiento = array(
				':fecha' => $_POST['fecha'] ,
				':hora' => $_POST['hora'] ,
				':tipo_de_solicitud' => $_POST['tipo_de_solicitud'] ,
				':numero' => $_POST['numero'] ,						
				':fecha_documento' => $_POST['fecha_documento'] ,
				':tipo_de_requerimiento' => $_POST['tipo_de_requerimiento'] ,			
				':status' => $_POST['status'] ,
				':descripcion' => $_POST['descripcion'] ,	
				':solucion' => $_POST['solucion'] ,
				':observaciones' => $_POST['observaciones'],
				':Modulo' => $_POST['Modulo']				
			);
				$telefono = array(
				':num_cel' => $_POST['num_cel'] ,							
				':cod_area' => $_POST['cod_area']
			);
				$datos_has_telefono = array(
			);
				$requerimiento_has_persona = array(
			);
				$requerimiento_analista = array(
			);		
			$this->_reque->insert($persona,$requerimiento,$telefono,$datos_has_telefono,$requerimiento_has_persona,$requerimiento_analista);
			$this->_view->redirect('requerimientos/funcionarios');			
			}else{
				$this->_view->render('nuevorequerimientos', 'requerimientos', '',$this->_sidebar_menu);
			}				
		}	


		function readrequerimiento(){
		Session::accessRole(array('Administrador','Super Usuario','Usuario'));
			$lista = $this->_reque->listarrequerimientos();
			$this->_view->_lista = $lista;
			$this->_view->render('readrequerimiento','requerimientos','',$this->_sidebar_menu);
		}


		function totalrequerimiento(){
		Session::accessRole(array('Administrador','Super Usuario'));
			$lista = $this->_reque->totalrequeri();
			$this->_view->_lista = $lista;
			$this->_view->render('totalrequerimiento','requerimientos','',$this->_sidebar_menu);
		}			

		function funcionarios(){
		Session::accessRole(array('Administrador','Super Usuario','Usuario'));
			$lista = $this->_reque->getFuncionarios();
			$this->_view->_lista = $lista;
			$this->_view->render('funcionarios','requerimientos','',$this->_sidebar_menu);

		}

		function viewrequerimiento($id = false){
		Session::accessRole(array('Administrador','Super Usuario','Usuario'));
			$requerimiento = $this->_reque->getRequerimiento($id);
			$this->_view->_requerimiento = $requerimiento;
			$this->_view->render('viewrequerimiento','requerimientos','',$this->_sidebar_menu);
		}
	

		function updaterequerimiento($id= false){

			Session::accessRole(array('Administrador','Super Usuario'));
			if($_SERVER['REQUEST_METHOD']=='POST'){

				$requerimiento = array(

				':id' => $_POST['id'] ,
				':fecha' => $_POST['fecha'] ,
				':hora' => $_POST['hora'] ,
				':tipo_de_solicitud' => $_POST['tipo_de_solicitud'] ,
				':numero' => $_POST['numero'],						
				':fecha_documento' => $_POST['fecha_documento'],
				':tipo_de_requerimiento' => $_POST['tipo_de_requerimiento'],		
				':status' => $_POST['status'],
				':descripcion' => $_POST['descripcion'],	
				':solucion' => $_POST['solucion'],
				':observaciones' => $_POST['observaciones'],
				':Modulo' => $_POST['Modulo']

				);

			$this->_reque->updateRequerimiento($requerimiento);

			$this->_view->redirect('requerimientos/updateRequerimiento/'.$requerimiento[':id']);


			}else{

				$requerimiento = $this->_reque->getRequerimiento($id);
				$this->_view->_requerimiento = $requerimiento;
				$this->_view->render('updaterequerimiento','requerimientos','','');
			}

		}


			function pdf($id){

			Session::accessRole(array('Administrador','Super Usuario','Usuario'));
			require("C:/xampp/htdocs/scrr/libs/fpdf/fpdf.php");
			$d=40;
			$requerimiento = $this->_reque->getRequerimiento($id);
			$celda= new FPDF();
			$celda->Addpage();

			$celda->Image('C:\xampp\htdocs\scrr\libs\fpdf\tutorial\avatar6.png',165,8,28);
			$celda->Image('C:\xampp\htdocs\scrr\libs\fpdf\tutorial\mep.png',12,10,28);
			$celda->SetFont('Arial','B',07);
			$celda->Cell(82);
			$celda->Cell(30,10,'REPUBLICA BOLIVARIANA DE VENEZUELA',2,0,'C');
			$celda->Ln(05);
			$celda->Cell(82);
			$celda->Cell(30,10,'MINISTERIO DEL PODER POPULAR PARA LAS RELACIONES INTERIORES, JUSTICIA Y PAZ',2,0,'C');
			$celda->Ln(05);
			$celda->Cell(82);			
			$celda->Cell(30,10,'CUERPO DE INVESTIGACIONES CIENTIFICAS PENALES Y CRIMINALISTICA',2,0,'C');
			$celda->Ln(05);
			$celda->Cell(82);			
			$celda->Cell(30,10,'COORDINACION DE APOYO ADMINISTRATIVO',2,0,'C');
			$celda->Ln(05);
			$celda->Cell(82);			
			$celda->Cell(30,10,'DIRECCION DE TECNOLOGIA - DIVISION DE SISTEMAS',2,0,'C');
			$celda->Line(9.5 , 42 , 200, 42);
			$celda->Ln(14);
			$celda->Cell(82);			
			$celda->Cell(30,10,'REQUERIMIENTO',2,0,'C');
			$celda->Line(95.5, 51 , 118, 51);

			$celda->Ln(10);
			$celda->Cell(20);			
			$celda->Cell(160,5,'Datos del Solicitante:',1,0,'C');			
			$celda->Ln();
			$celda->Cell(20);
			$celda->Cell(40, 5, "Cedula:",1,0,'C');	
			$celda->Cell(40, 5, "Credencial:",1,0,'C');
			$celda->Cell(40, 5, "Nombre:",1,0,'C');
			$celda->Cell(40, 5, "Apellido:",1,0,'C');

			$celda->Ln();

			for($i=0;$i<count($requerimiento);$i++)
			{
				$v=$i*0;
				$celda->Cell(20);
				$celda->Cell($d,6,$requerimiento[0][3],1,0,'C');
				$celda->Cell($d,6,$requerimiento[0][4],1,0,'C');
				$celda->Cell($d,6,$requerimiento[0][5],1,0,'C');
				$celda->Cell($d,6,$requerimiento[0][7],1,0,'C');

				$celda->Ln();
			}

			$celda->Ln();
			$celda->Cell(20);

			$celda->Cell(53.33, 5, "Jerarquia:",1,0,'C');
			$celda->Cell(53.33, 5, "Cargo:",1,0,'C');
			$celda->Cell(53.34, 5, "Correo:",1,0,'C');	


			$celda->Ln();

			for($i=0;$i<count($requerimiento);$i++)
			{
				$v=$i*0;
				$celda->Cell(20);
				
				$celda->Cell(53.33,6,$requerimiento[0][11],1,0,'C');
				$celda->Cell(53.33,6,$requerimiento[0][10],1,0,'C');
				$celda->Cell(53.34,6,$requerimiento[0][9],1,0,'C');
				$celda->Ln();
			}

			$celda->Ln();
			$celda->Cell(20);
			$celda->Cell(160, 5, "Despacho:",1,0,'C');
			$celda->Ln();
			for($i=0;$i<count($requerimiento);$i++)
			{
				$v=$i*0;
				$celda->Cell(20);
				$celda->Cell(160,6,$requerimiento[0][12],1,0,'C');
				$celda->Ln();
			}			

			$celda->Ln(10);
			$celda->Cell(20);			
			$celda->Cell(160,5,'Datos del Requerimiento:',1,0,'C');
			$celda->Ln();
			$celda->Cell(20);
			$celda->Cell(40, 5, "Fecha del Requerimiento:",1,0,'C');	
			$celda->Cell(40, 5, "Fecha del Documento:",1,0,'C');
			$celda->Cell(40, 5, "Hora:",1,0,'C');
			$celda->Cell(40, 5, "status:",1,0,'C');


			$celda->Ln();
			for($i=0;$i<count($requerimiento);$i++)
			{
				$v=$i*0;
				$celda->Cell(20);
				$celda->Cell($d,6,$requerimiento[0][13],1,0,'C');
				$celda->Cell($d,6,$requerimiento[0][17],1,0,'C');
				$celda->Cell($d,6,$requerimiento[0][14],1,0,'C');
				$celda->Cell($d,6,$requerimiento[0][19],1,0,'C');
				$celda->Ln();
			}

			$celda->Ln(07);
			$celda->Cell(20);
			$celda->Cell(40, 5, "Tipo de Solicitud:",1,0,'C');	
			$celda->Cell(40, 5, "Nro:",1,0,'C');
			$celda->Cell(40, 5, "Tipo de Requerimiento:",1,0,'C');
			$celda->Cell(40, 5, "Modulo del Sistema:",1,0,'C');

			$celda->Ln();

			for($i=0;$i<count($requerimiento);$i++)
			{
				$v=$i*0;
				$celda->Cell(20);
				$celda->Cell($d,6,$requerimiento[0][15],1,0,'C');
				$celda->Cell($d,6,$requerimiento[0][16],1,0,'C');
				$celda->Cell($d,6,$requerimiento[0][18],1,0,'C');
				$celda->Cell($d,6,$requerimiento[0][23],1,0,'C');
				$celda->Ln();
			}

			$celda->Ln(10);
			$celda->Cell(20);
			$celda->Cell(160, 5, "Descripcion:",1,0,'C');

			$celda->Ln();

			for($i=0;$i<count($requerimiento);$i++)
			{
				$v=$i*0;
				$celda->Cell(20);
				$celda->Cell(160,6,$requerimiento[0][20],1,0,'C');
				$celda->Ln();
			}

			$celda->Ln(12);
			$celda->Cell(20);
			$celda->Cell(160, 5, "Solucion:",1,0,'C');	

			$celda->Ln();

			for($i=0;$i<count($requerimiento);$i++)
			{
				$v=$i*0;
				$celda->Cell(20);
				$celda->Cell(160,6,$requerimiento[0][21],1,0,'C');
				$celda->Ln();
			}		

			$celda->Ln(10);
			$celda->Cell(20);
			$celda->Cell(160, 5, "Observaciones:",1,0,'C');	

			$celda->Ln();
			for($i=0;$i<count($requerimiento);$i++)
			{
				$v=$i*0;
				$celda->Cell(20);
				$celda->CELL(160,6,$requerimiento[0][22],1,0,'C');
				$celda->Ln();
			}
			
			$celda->Ln(55);
			$celda->Cell(20);
			$celda->Cell(40, 7, "Sello de la Division:",0,0,'C');	
			$celda->Line(30 , 260 , 70, 260);  //Horizontal
			$celda->Cell(180, 7, "Firma y Cedula del Analista:",0,0,'C');
			$celda->Line(140 , 260 , 180, 260);  //Horizontal
			$celda->Ln(10);
			$celda->output();
		}		



}?>