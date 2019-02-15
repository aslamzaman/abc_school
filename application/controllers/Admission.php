<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Admission extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('admission_model');
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$data['admissions']     = $this->admission_model->select_all();
		$this->load->view('layout/header');
		$this->load->view('layout/header_closing');
		$this->load->view('layout/navbar');
		$this->load->view('admission/index',$data);
		$this->load->view('layout/footer');
		$this->load->view('layout/footer_closing');
	}




	public function add()
	{
		$data['student']     = $this->admission_model->drop_down_student(1);
		$data['class_name']     = $this->admission_model->drop_down_option('class_name',1);
		$data['section']     = $this->admission_model->drop_down_option('section',1);
		
		$this->load->view('layout/header');
		$this->load->view('layout/header_closing');
		$this->load->view('layout/navbar');
		$this->load->view('admission/add',$data);
		$this->load->view('layout/footer');
		$this->load->view('layout/footer_closing');
	}


	public function save()
	{
		$this->form_validation->set_rules('class_roll', 'Class roll', 'required|max_length[4]');
		$this->form_validation->set_error_delimiters('<span class="small text-danger"><i> *', '</i></span>'); 

		if ($this->form_validation->run())
		{
			$data['student_id']            = $this->input->post('student_id');	
			$data['class_name_id']            = $this->input->post('class_name_id');	
			$data['section_id']            = $this->input->post('section_id');	
			$data['class_roll']            = $this->input->post('class_roll');	
			$data['entry_dt']            = date('Y-m-d h:i:sa');        
			$ret = $this->admission_model->add($data);
			if($ret)
			{
				$_SESSION['msg'] = 'Record saved successfully';
			}
			else
			{
				$_SESSION['msg'] = 'Record failed to save!';
			}
			redirect('admission');
		}
		else
		{
			$this->add();
		}
	}


	public function edit($id,$id1,$id2,$id3)
	{
		
		$data['student']     = $this->admission_model->drop_down_student($id1);
		$data['class_name']     = $this->admission_model->drop_down_option('class_name',$id2);
		$data['section']     = $this->admission_model->drop_down_option('section',$id3);
		
		$data['admission']     = $this->admission_model->select_one($id);
		$this->load->view('layout/header');
		$this->load->view('layout/header_closing');
		$this->load->view('layout/navbar');
		$this->load->view('admission/edit',$data);
		$this->load->view('layout/footer');
		$this->load->view('layout/footer_closing');
	}


	public function update()
	{
		$this->form_validation->set_rules('class_roll', 'Class roll', 'required|max_length[4]');
		$this->form_validation->set_error_delimiters('<span class="small text-danger"><i> *', '</i></span>'); 
		if ($this->form_validation->run())
		{
			$data['student_id']            = $this->input->post('student_id');	
			$data['class_name_id']            = $this->input->post('class_name_id');	
			$data['section_id']            = $this->input->post('section_id');	
			$data['class_roll']            = $this->input->post('class_roll');	
			$ret = $this->admission_model->edit($data, $this->input->post('id'));
			if($ret)
			{
				$_SESSION['msg'] = 'Record updated successfully';
			}
			else
			{
				$_SESSION['msg'] = 'Record failed to update!';
			}
			redirect('admission');
		}
		else
		{
			$this->edit($this->input->post('id'),$this->input->post('student_id'),$this->input->post('class_name_id'),$this->input->post('section_id'));
		}
	}


	public function remove($id)
	{
		$ret = $this->admission_model->remove($id);
		if($ret)
		{
			$_SESSION['msg'] = 'Record deleted successfully';
		}
		else
		{
			$_SESSION['msg'] = 'Record failed to delete!';
		}
		redirect('admission');
	}


	public function view($id)
	{
		$data['admission']     = $this->admission_model->select_one($id);
		$this->load->view('layout/header');
		$this->load->view('layout/header_closing');
		$this->load->view('layout/navbar');
		$this->load->view('admission/view',$data);
		$this->load->view('layout/footer');
		$this->load->view('layout/footer_closing');
	}

	
	
/** ------------   Admission route  ---------    
$route['add-admission']							= 'admission/add_admission';
$route['save-admission']							= 'admission/save_admission';
$route['edit-admission/(:any)']					= 'admission/edit_admission/$1';
$route['update-admission']							= 'admission/update_admission';
$route['view-admission/(:any)']					= 'admission/view_admission/$1';
$route['delete-admission/(:any)']					= 'admission/delete_admission/$1';

 ------------  /.Admission route  ---------    */		

}