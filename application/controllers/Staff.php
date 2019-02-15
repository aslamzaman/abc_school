<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Staff extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('staff_model');
		$this->load->library(array('session','form_validation'));
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$data['teachers']     = $this->staff_model->select_all();
		$this->load->view('layout/header');
		$this->load->view('layout/header_closing');
		$this->load->view('layout/navbar');
		$this->load->view('staff/index',$data);
		$this->load->view('layout/footer');
		$this->load->view('layout/footer_closing');
	}




	public function add()
	{
		$this->load->view('layout/header');
		$this->load->view('layout/header_closing');
		$this->load->view('layout/navbar');
		$this->load->view('staff/add');
		$this->load->view('layout/footer');
		$this->load->view('layout/footer_closing');
	}


	public function save()
	{
		
		$this->form_validation->set_rules('id', 'Id', 'required|max_length[50]');
		$this->form_validation->set_rules('name', 'Name', 'required|max_length[50]');
		$this->form_validation->set_rules('fname', 'Fname', 'required|max_length[50]');
		$this->form_validation->set_rules('mname', 'Mname', 'required|max_length[50]');
		$this->form_validation->set_rules('address', 'Address', 'required|max_length[50]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required|max_length[50]');
		$this->form_validation->set_rules('bdate', 'Bdate', 'required|max_length[50]');
		$this->form_validation->set_rules('sex_id', 'Sex_id', 'required|max_length[50]');
		$this->form_validation->set_rules('max_qualification', 'Max_qualification', 'required|max_length[50]');
		$this->form_validation->set_rules('designation', 'Designation', 'required|max_length[50]');
		$this->form_validation->set_rules('remarks', 'Remarks', 'required|max_length[50]');
		$this->form_validation->set_rules('pic', 'Pic', 'required|max_length[50]');
		$this->form_validation->set_rules('entry_dt', 'Entry_dt', 'required|max_length[50]');
		$this->form_validation->set_error_delimiters('<span class="small text-danger"><i> *', '</i></span>'); 

		if ($this->form_validation->run())
		{
				
			$data['id']            = $this->input->post('id');	
			$data['name']            = $this->input->post('name');	
			$data['fname']            = $this->input->post('fname');	
			$data['mname']            = $this->input->post('mname');	
			$data['address']            = $this->input->post('address');	
			$data['mobile']            = $this->input->post('mobile');	
			$data['bdate']            = $this->input->post('bdate');	
			$data['sex_id']            = $this->input->post('sex_id');	
			$data['max_qualification']            = $this->input->post('max_qualification');	
			$data['designation']            = $this->input->post('designation');	
			$data['remarks']            = $this->input->post('remarks');	
			$data['pic']            = $this->input->post('pic');	
			$data['entry_dt']            = $this->input->post('entry_dt');        
			$ret = $this->staff_model->add($data);
			if($ret)
			{
				$_SESSION['msg'] = 'Record saved successfully';
			}
			else
			{
				$_SESSION['msg'] = 'Record failed to save!';
			}
			redirect('staff');
		}
		else
		{
			$this->add();
		}
	}


	public function edit($id)
	{
		$data['staff']     = $this->staff_model->select_one($id);
		$this->load->view('layout/header');
		$this->load->view('layout/header_closing');
		$this->load->view('layout/navbar');
		$this->load->view('staff/edit',$data);
		$this->load->view('layout/footer');
		$this->load->view('layout/footer_closing');
	}


	public function update()
	{
		
		$this->form_validation->set_rules('id', 'Id', 'required|max_length[50]');
		$this->form_validation->set_rules('name', 'Name', 'required|max_length[50]');
		$this->form_validation->set_rules('fname', 'Fname', 'required|max_length[50]');
		$this->form_validation->set_rules('mname', 'Mname', 'required|max_length[50]');
		$this->form_validation->set_rules('address', 'Address', 'required|max_length[50]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required|max_length[50]');
		$this->form_validation->set_rules('bdate', 'Bdate', 'required|max_length[50]');
		$this->form_validation->set_rules('sex_id', 'Sex_id', 'required|max_length[50]');
		$this->form_validation->set_rules('max_qualification', 'Max_qualification', 'required|max_length[50]');
		$this->form_validation->set_rules('designation', 'Designation', 'required|max_length[50]');
		$this->form_validation->set_rules('remarks', 'Remarks', 'required|max_length[50]');
		$this->form_validation->set_rules('pic', 'Pic', 'required|max_length[50]');
		$this->form_validation->set_rules('entry_dt', 'Entry_dt', 'required|max_length[50]');
		$this->form_validation->set_error_delimiters('<span class="small text-danger"><i> *', '</i></span>'); 
		if ($this->form_validation->run())
		{
				
			$data['id']            = $this->input->post('id');	
			$data['name']            = $this->input->post('name');	
			$data['fname']            = $this->input->post('fname');	
			$data['mname']            = $this->input->post('mname');	
			$data['address']            = $this->input->post('address');	
			$data['mobile']            = $this->input->post('mobile');	
			$data['bdate']            = $this->input->post('bdate');	
			$data['sex_id']            = $this->input->post('sex_id');	
			$data['max_qualification']            = $this->input->post('max_qualification');	
			$data['designation']            = $this->input->post('designation');	
			$data['remarks']            = $this->input->post('remarks');	
			$data['pic']            = $this->input->post('pic');	
			$data['entry_dt']            = $this->input->post('entry_dt');			
			$ret = $this->staff_model->edit($data, $this->input->post('id'));
			if($ret)
			{
				$_SESSION['msg'] = 'Record updated successfully';
			}
			else
			{
				$_SESSION['msg'] = 'Record failed to update!';
			}
			redirect('staff');
		}
		else
		{
			$this->edit($this->input->post('id'));
		}
	}


	public function remove($id)
	{
		$ret = $this->staff_model->remove($id);
		if($ret)
		{
			$_SESSION['msg'] = 'Record deleted successfully';
		}
		else
		{
			$_SESSION['msg'] = 'Record failed to delete!';
		}
		redirect('staff');
	}


	public function view($id)
	{
		$data['staff']     = $this->staff_model->select_one($id);
		$this->load->view('layout/header');
		$this->load->view('layout/header_closing');
		$this->load->view('layout/navbar');
		$this->load->view('staff/view',$data);
		$this->load->view('layout/footer');
		$this->load->view('layout/footer_closing');
	}

	
	public function img_save($id)
	{
		$student     					= $this->staff_model->select_one($id);
		
		$config['upload_path']          =  './assets/pic/student/';
		$config['allowed_types']        = 'gif|jpg';
		$config['file_ext_tolower']		= True;
		$config['overwrite']			= True;		
		$config['max_size']             = 70;
		$config['max_width']            = 252;
		$config['max_height']           = 336;
		$config['file_name']           = $this->img_name($student['pic']);
		

		$this->load->library('upload', $config);

		if (!$this->upload->do_upload('student_img'))
		{
				$error = $this->upload->display_errors();
				$_SESSION['msg'] = $error;
				redirect('student');
		}
		else
		{
				$data['pic'] = $this->upload->data('file_name');	
				$this->student_model->edit($data,$id);
				redirect('student');
		}
	}
	
	
	public function img_name($img_name)
	{
		$new_name = "";
		if ($img_name == 'blank.png')
		{
			$new_name = strtotime(date("Y-m-d h:i:sa"));
		}
		else
		{
			$x = explode('.',$img_name);
			$new_name = $x[0];
		}
		return $new_name;
	}			

}