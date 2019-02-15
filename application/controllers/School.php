<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class School extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('school_model');
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		// SELECT `id`, `name`, `address`, `mobile`, `mail`, `web`, `start_dt`, `reg_no`, `pic`, `entry_dt` FROM `school` WHERE 1
		
		$data['schools']     = $this->school_model->select_all();
		$this->load->view('layout/header');
		$this->load->view('layout/header_closing');
		$this->load->view('layout/navbar');
		$this->load->view('school/index',$data);
		$this->load->view('layout/footer');
		$this->load->view('layout/footer_closing');
	}


	public function edit($id)
	{
		$data['school']     = $this->school_model->select_one($id);
		$this->load->view('layout/header');
		$this->load->view('layout/header_closing');
		$this->load->view('layout/navbar');
		$this->load->view('school/edit',$data);
		$this->load->view('layout/footer');
		$this->load->view('layout/footer_closing');
	}


	public function update()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|max_length[50]');
		$this->form_validation->set_rules('address', 'Address', 'required|max_length[100]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required|max_length[50]');
		$this->form_validation->set_error_delimiters('<span class="small text-danger"><i> *', '</i></span>'); 
		if ($this->form_validation->run())
		{
			$data['name']			= $this->input->post('name');	
			$data['address']		= $this->input->post('address');	
			$data['mobile']			= $this->input->post('mobile');	
			$data['mail']			= $this->input->post('mail');	
			$data['web']			= $this->input->post('web');	
			$data['start_dt']		= $this->input->post('start_dt');	
			$data['reg_no']			= $this->input->post('reg_no');
			
			$ret = $this->school_model->edit($data, $this->input->post('id'));
			if($ret)
			{
				$_SESSION['msg'] = 'Record updated successfully';
			}
			else
			{
				$_SESSION['msg'] = 'Record failed to update!';
			}
			redirect('school');
		}
		else
		{
			$this->edit($this->input->post('id'));
		}
	}



}