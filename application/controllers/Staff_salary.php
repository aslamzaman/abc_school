<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Staff_salary extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('staff_salary_model');
		$this->load->library(array('session','form_validation','tcpdf_lib'));
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		// Salary sheets are fixed till the current month
		$this->staff_salary_model->salary_fixed_till_month();
		
		$data['staffs']     = $this->staff_salary_model->select_all();
		$this->load->view('layout/header');
		$this->load->view('layout/header_closing');
		$this->load->view('layout/navbar');
		$this->load->view('staff/index',$data);
		$this->load->view('layout/footer');
		$this->load->view('layout/footer_closing');
	}

	

	public function edit($id)
	{
		$data['staff']     = $this->staff_salary_model->select_one($id);
		$this->load->view('layout/header');
		$this->load->view('layout/header_closing');
		$this->load->view('layout/navbar');
		$this->load->view('staff/edit',$data);
		$this->load->view('layout/footer');
		$this->load->view('layout/footer_closing');
	}


	public function update()
	{
		// SELECT `id`, `staff_id`, `salary_month`, `amount`, `deduct`, `add_any`, `arear`, `note`, `entry_dt` FROM `staff_salary` WHERE 1
		
		$this->form_validation->set_rules('amount', 'Amount', 'required|max_length[11]');
		if ($this->form_validation->run())
		{
			$data['amount'] 		= $this->input->post('amount');
			$data['deduct'] 		= $this->input->post('deduct');
			$data['add_any'] 		= $this->input->post('add_any');
			$data['arear'] 			= $this->input->post('arear');
			$data['note'] 			= $this->input->post('note');
			
			$ret = $this->staff_salary_model->edit($data, $this->input->post('id'));
			if($ret)
			{
				$_SESSION['msg'] = 'Record updated successfully';
			}
			else
			{
				$_SESSION['msg'] = 'Record failed to update!';
			}
			redirect('student');
		}
		else
		{
			$this->edit($this->input->post('id'));
		}
	}


	public function view($id)
	{
		ob_start();
		// Call initial data
							// ini_data($header=false,$footer=false,$orientation='P',$format='A4', $left_margin='20',$top_margin='25', $right_margin='10', $bottom_margin='10',$title='Student Info')
		$this->tcpdf_lib->ini_data(             true,          true,             'P',        'A4',                20,              35,                 10,                  10,       'Test Docment');
		
		// -------------------------------------------------------------------

		// set JPEG quality
		$this->tcpdf_lib->setJPEGQuality(75);


		$student     = $this->student_model->select_one($id);
		
		// Image example with resizing
		$img_location = base_url('assets/pic/student/'.$student['pic']);
		
				              // Image($file,$x='', $y='', $w=0, $h=0, $type='',     $link='', $align='',  $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false, $alt=false, $altimgs=array()) {
		$this->tcpdf_lib->Image($img_location,  '',    '',  '50',  '',       '', $img_location,      'N',          false,      150,         'C',         false,           false,       0,          false,         false,           false);
		
		// - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - - -
		$this->tcpdf_lib->SetFont('times', 'B', 16);
		$this->tcpdf_lib->Cell(0, 0, $student['name'], 0, 1, 'C');
		$this->tcpdf_lib->SetFont('times', 'N', 12);
		$this->tcpdf_lib->Cell(0, 0, 'Father: '.$student['fname'].'; Mother: '.$student['mname'], 0, 1, 'C');
		
		$this->tcpdf_lib->Cell(0, 0, 'Address: '.$student['address'].'; Mobile: '.$student['mobile'].'; Birth date: '.$student['bdate'].'; Sex: '.$student['sex'], 0, 1, 'C');		
		$this->tcpdf_lib->Cell(0, 0, 'Roll: '.$student['roll'].'; Session: '.$student['session_name'].'; Class: '.$student['class_name'].'; Section: '.$student['section'], 0, 1, 'C');		
		
		$this->tcpdf_lib->LN(6);		
		$this->tcpdf_lib->SetFont('times', 'NI', 10);
		$this->tcpdf_lib->Cell(0, 0, $student['remarks'], 0, 1, 'C');	

		$this->tcpdf_lib->LN(20);
		$this->tcpdf_lib->SetFont('times', 'N', 12);		
		$this->tcpdf_lib->Cell(0, 0,'Responsible Officer', 0, 1, 'R');
		$this->tcpdf_lib->Cell(0, 0,'ABC Hight School', 0, 1, 'R');	
		$this->tcpdf_lib->Cell(0, 0,'Dhanmodi, Dhaka-1209', 0, 1, 'R');			
		$this->tcpdf_lib->Cell(0, 0,'Contact: 01275848848', 0, 1, 'R');			
					

		// -------------------------------------------------------------------
		
		
		//Close and output PDF document
		$this->tcpdf_lib->Output('example_009.pdf', 'I');

	}


	
	

	

	
	
}