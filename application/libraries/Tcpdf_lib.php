<?php
defined('BASEPATH') OR exit('No direct script access allowed');
include "tcpdf/tcpdf.php";
class Tcpdf_lib extends TCPDF
{

	public function ini_data($header=false,$footer=false,$orientation='P',$format='A4', $left_margin='20', $top_margin='25', $right_margin='10' ,$bottom_margin='10', $title='Student Info')
	{
		$this->SetCreator(PDF_CREATOR);
		$this->SetAuthor('Aslam Zaman');
		$this->SetTitle($title);
		$this->SetSubject('Individual Student Information');

		// set default header data
		$this->SetHeaderData(PDF_HEADER_LOGO, PDF_HEADER_LOGO_WIDTH, PDF_HEADER_TITLE, PDF_HEADER_STRING);

		// set header and footer fonts
		$this->setHeaderFont(Array(PDF_FONT_NAME_MAIN, '', PDF_FONT_SIZE_MAIN));
		$this->setFooterFont(Array(PDF_FONT_NAME_DATA, '', PDF_FONT_SIZE_DATA));

		// set default monospaced font
		$this->SetDefaultMonospacedFont(PDF_FONT_MONOSPACED);

		// set margins
		$this->SetMargins($left_margin, $top_margin, $right_margin);
		$this->SetHeaderMargin(15);
		$this->SetFooterMargin(10);
		
		$this->setPrintHeader($header);
		$this->setPrintFooter($footer);
		
		// set auto page breaks
		$this->SetAutoPageBreak(TRUE, $bottom_margin);

		// set image scale factor
		$this->setImageScale(PDF_IMAGE_SCALE_RATIO);

		// set some language-dependent strings (optional)
		if (@file_exists(dirname(__FILE__).'/lang/eng.php')) {
			require_once(dirname(__FILE__).'/lang/eng.php');
			$this->setLanguageArray($l);
		}
		
		$this->AddPage($orientation,$format);
		//AddPage($orientation='', $format='', $keepmargins=false, $tocpage=false) {
	}

	
	public function Header()
	{
		$this->SetFont('times', 'B', 16);		
		$this->Cell(0, 0,'ABC High School', 0, 1, 'C');
		$this->SetFont('times', 'N', 12);	
		$this->Cell(0, 0,'House# 71, Road# 9/A, Dhanmondi R/A, Dhaka -1209', 0, 1, 'C');
		$this->LN(4);
		$this->writeHTML('<hr>', true, false, true, false, '');
	}
	
	public function Footer()
	{
		$this->SetFont('times', 'N', 10);
		//$this->writeHTML('<hr>', true, false, true, false, '');		
		$this->Cell(0, 0,'Page '.$this->getAliasNumPage().'/'.$this->getAliasNbPages(), 0, 1, 'R');
	}
}
?>