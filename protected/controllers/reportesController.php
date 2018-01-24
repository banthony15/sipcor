<?php 
	class reportesController extends Controller{
		
		
		protected $_sidebar_menu;
		private $_person;
		
		public function __construct(){
	
			parent::__construct();
			$this->_report = $this->loadModel('reportes');

		//Objeto donde almacenamos todas las funciones de PersonsModel.php
		$this->_view->setJS(array('js/requerimientos/requerimientos'));
		$this->_view->setJS(array('js/requerimientoval'));

		}
		
		function index(){
		
			
			$this->_view->render('index', 'requerimientos', '',$this->_sidebar_menu);
			// clase  metodo 	  vista    carpeta dentro de views 
		}



		function reportesporanalista(){

			Session::accessRole(array('Administrador','Super Usuario','Usuario'));
			require("C:/xampp/htdocs/scrr/libs/fpdf/fpdf.php");
			$d=30;
			$requerimiento = $this->_report->totalanalista();
			$total = $this->_report->total();
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
			$celda->Ln(20);
			$celda->Cell(82);			
			$celda->Cell(30,10,'REQUERIMIENTOS',2,0,'C');
			$celda->Line(95.5, 57 , 118, 57);
			$celda->Ln(30);
			$celda->Cell(8);			
			$celda->Cell(180,5,'Total de Requerimientos por Analistas:',1,0,'C');			
			$celda->Ln();
			$celda->Cell(8);			
			$celda->Cell(30, 5, "Credencial:",1,0,'C');
			$celda->Cell(30, 5, "Nombre:",1,0,'C');
			$celda->Cell(30, 5, "Apellido:",1,0,'C');
			$celda->Cell(30, 5, "Periodo:",1,0,'C');
			$celda->Cell(30, 5, "Mes:",1,0,'C');
			$celda->Cell(30, 5, "Requerimientos:",1,0,'C');
			$celda->Ln();
			for($i=0;$i<count($requerimiento);$i++)
			{
				$v=$i*0;
				$celda->Cell(8);
				$celda->Cell($d,6,$requerimiento[$i][1],1,0,'C');
				$celda->Cell($d,6,$requerimiento[$i][2],1,0,'C');
				$celda->Cell($d,6,$requerimiento[$i][3],1,0,'C');
				$celda->Cell($d,6,$requerimiento[$i][4],1,0,'C');
				$celda->Cell($d,6,$requerimiento[$i][5],1,0,'C');
				$celda->Cell($d,6,$requerimiento[$i][6],1,0,'C');

				$celda->Ln();
			}
			$celda->Ln(0);
			$celda->Cell(8);			
			$celda->Cell(150,5, "total:",1,0,'C');			
			$celda->Cell($d,5,$total[0][1],1,0,'C');

			$celda->output();
		}



		function reportespordespacho(){

			Session::accessRole(array('Administrador','Super Usuario','Usuario'));
			require("C:/xampp/htdocs/scrr/libs/fpdf/fpdf.php");
			$d=60;
			$requerimiento = $this->_report->totaldespacho();
			$total = $this->_report->total1();
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
			$celda->Ln(20);
			$celda->Cell(15);			
			$celda->Cell(160,5,'Total de Requerimientos por Despacho:',1,0,'C');			
			$celda->Ln();
			$celda->Cell(15);			
			$celda->Cell(130,5, "Despacho:",1,0,'C');
			$celda->Cell(30,5, "Requerimientos :",1,0,'C');
			$celda->Ln();
			for($i=0;$i<count($requerimiento);$i++)
			{
				$v=$i*0;
				$celda->Cell(15);
				$celda->Cell(130,6,$requerimiento[$i][1],1,0,'C');
				$celda->Cell(30,6,$requerimiento[$i][2],1,0,'C');
				$celda->Ln();
			}
			$celda->Ln(0);
			$celda->Cell(15);			
			$celda->Cell(130,5, "total:",1,0,'C');			
			$celda->Cell(30,5,$total[0][1],1,0,'C');	

			$celda->output();
		}


}?>