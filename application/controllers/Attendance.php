<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Attendance extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('attendance_model');
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$data['class_name']     = $this->attendance_model->drop_down_option('class_name',1);
		$data['section']     	= $this->attendance_model->drop_down_option('section',1);
		$this->load->view('layout/header');
		$this->load->view('layout/header_closing');
		$this->load->view('layout/navbar');
		$this->load->view('attendance/option',$data);
		$this->load->view('layout/footer');
		$this->load->view('attendance/js');
		$this->load->view('layout/footer_closing');
	}

	public function show_list($class_name_id, $section_id)
	{

		$data['class_name']     	= $this->attendance_model->select_one_row('class_name', $class_name_id);
		$data['section']     	= $this->attendance_model->select_one_row('section', $section_id);
		

		$data['attendances']     	= $this->attendance_model->select_all($class_name_id, $section_id);
		
		$this->load->view('layout/header');
		$this->load->view('layout/header_closing');
		$this->load->view('layout/navbar');
		$this->load->view('attendance/index',$data);
		$this->load->view('layout/footer');
		//$this->load->view('attendance/js');
		$this->load->view('layout/footer_closing');
	}

	public function update()
	{
		$class 		=  $this->input->post('class_name');
		$section 	=  $this->input->post('section');
		$atts 		=  $this->input->post('checkbox1');	

		// reset all attendec should be zero
		$this->attendance_model->reset_all_zero($class, $section);
		
		// add attendance
		if(!empty($atts))
		{
			foreach($atts as $att)
			{			
				$data['attend'] = 1;
				$this->attendance_model->edit($data, $att); 
			}
			$_SESSION['msg'] = 'Record updated successfully';	
		}
		else
		{
			$_SESSION['msg'] = 'No selected data!';	
		}
		
		$this->show_list($class, $section);
	}

	

}