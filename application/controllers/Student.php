<?php
defined('BASEPATH') OR exit('No direct script access allowed');
class Student extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->model('student_model');
		$this->load->library(array('session','form_validation','tcpdf_lib'));
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$data['students']     = $this->student_model->select_all();
		$this->load->view('layout/header');
		$this->load->view('layout/header_closing');
		$this->load->view('layout/navbar');
		$this->load->view('student/index',$data);
		$this->load->view('layout/footer');
		$this->load->view('layout/footer_closing');
	}




	public function add()
	{
		$data['sex']    		= $this->student_model->drop_down_option('sex',1);
		$data['class_name']     = $this->student_model->drop_down_option('class_name',1);
		$this->load->view('layout/header');
		$this->load->view('layout/header_closing');
		$this->load->view('layout/navbar');
		$this->load->view('student/add',$data);
		$this->load->view('layout/footer');
		$this->load->view('layout/footer_closing');
	}


	public function save()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|max_length[50]');
		$this->form_validation->set_rules('fname', 'Father name', 'required|max_length[50]');
		$this->form_validation->set_rules('mname', 'Mother name', 'required|max_length[50]');
		$this->form_validation->set_rules('address', 'Address', 'required|max_length[50]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required|max_length[50]');
		$this->form_validation->set_rules('bdate', 'Birth date', 'required|max_length[10]');
		$this->form_validation->set_rules('school_name', 'School name', 'required|max_length[50]');
		$this->form_validation->set_rules('marks', 'Marks', 'required|max_length[6]');
		$this->form_validation->set_rules('position', 'Position', 'required|max_length[50]');
		$this->form_validation->set_rules('remarks', 'Remarks', 'required|max_length[100]');
		$this->form_validation->set_error_delimiters('<span class="small text-danger"><i> *', '</i></span>'); 

		if ($this->form_validation->run())
		{
			$data['name']				= $this->input->post('name');	
			$data['fname']				= $this->input->post('fname');	
			$data['mname']				= $this->input->post('mname');	
			$data['address']			= $this->input->post('address');	
			$data['mobile']				= $this->input->post('mobile');	
			$data['bdate']				= $this->input->post('bdate');	
			$data['sex_id']				= $this->input->post('sex_id');	
			$data['school_name']		= $this->input->post('school_name');	
			$data['class_name_id']		= $this->input->post('class_name_id');	
			$data['marks']				= $this->input->post('marks');	
			$data['position']			= $this->input->post('position');	
			$data['remarks']			= $this->input->post('remarks');	
			$data['pic']				= 'blank.png';	
			$data['entry_dt']			= date("Y-m-d h:i:sa");        
			$ret = $this->student_model->add($data);
			if($ret)
			{
				$_SESSION['msg'] = 'Record saved successfully';
			}
			else
			{
				$_SESSION['msg'] = 'Record failed to save!';
			}
			redirect('student');
		}
		else
		{
			$this->add();
		}
	}


	public function edit($id, $sex_id, $class_id)
	{
		$data['sex']     		= $this->student_model->drop_down_option('sex',$sex_id);
		$data['class_name']     = $this->student_model->drop_down_option('class_name',$class_id);
		
		$data['student']     	= $this->student_model->select_one($id);
		$this->load->view('layout/header');
		$this->load->view('layout/header_closing');
		$this->load->view('layout/navbar');
		$this->load->view('student/edit',$data);
		$this->load->view('layout/footer');
		$this->load->view('layout/footer_closing');
	}


	public function update()
	{
		$this->form_validation->set_rules('name', 'Name', 'required|max_length[50]');
		$this->form_validation->set_rules('fname', 'Father name', 'required|max_length[50]');
		$this->form_validation->set_rules('mname', 'Mother name', 'required|max_length[50]');
		$this->form_validation->set_rules('address', 'Address', 'required|max_length[50]');
		$this->form_validation->set_rules('mobile', 'Mobile', 'required|max_length[50]');
		$this->form_validation->set_rules('bdate', 'Birth date', 'required|max_length[10]');
		$this->form_validation->set_rules('school_name', 'School name', 'required|max_length[50]');
		$this->form_validation->set_rules('marks', 'Marks', 'required|max_length[6]');
		$this->form_validation->set_rules('position', 'Position', 'required|max_length[50]');
		$this->form_validation->set_rules('remarks', 'Remarks', 'required|max_length[100]');
		$this->form_validation->set_error_delimiters('<span class="small text-danger"><i> *', '</i></span>'); 
		if ($this->form_validation->run())
		{
			$data['name']				= $this->input->post('name');	
			$data['fname']				= $this->input->post('fname');	
			$data['mname']				= $this->input->post('mname');	
			$data['address']			= $this->input->post('address');	
			$data['mobile']				= $this->input->post('mobile');	
			$data['bdate']				= $this->input->post('bdate');	
			$data['sex_id']				= $this->input->post('sex_id');	
			$data['school_name']		= $this->input->post('school_name');	
			$data['class_name_id']		= $this->input->post('class_name_id');	
			$data['marks']				= $this->input->post('marks');	
			$data['position']			= $this->input->post('position');	
			$data['remarks']			= $this->input->post('remarks');	
			$ret = $this->student_model->edit($data, $this->input->post('id'));
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
			
			$this->edit($this->input->post('id'),$this->input->post('sex_id'),$this->input->post('class_name_id'));
		}
	}


	public function remove($id)
	{
		$ret = $this->student_model->remove($id);
		if($ret)
		{
			$_SESSION['msg'] = 'Record deleted successfully';
		}
		else
		{
			$_SESSION['msg'] = 'Record failed to delete!';
		}
		redirect('student');
	}


	public function view($id)
	{
		ob_start();
		$student     = $this->student_model->view($id);
		// "(`id`, `student_id`,  `class_name_id`, `section_id`,  `class_roll`,  `entry_dt`) ".
					//    ini_data($header=false,$footer=false,$orientation='P',$format='A4', $left_margin='20', $top_margin='25', $right_margin='10' ,$bottom_margin='10', $title='Student Info')
		$this->tcpdf_lib->ini_data($header=true,$footer=true,$orientation='P',  $format='A4', $left_margin='20', $top_margin='25', $right_margin='10' ,$bottom_margin='10', $title='Student Information');
		
		$imgPath = base_url('assets/pic/student/'.$student['pic']);

		// `id`, `name`, `fname`, `mname`, `address`, `mobile`, `bdate`, `sex_id`, `school_name`, `class_name_id`, `marks`, `position`, `remarks`, `pic`, `entry_dt`
		//                   Image($file, $x='', $y='', $w=0, $h=0, $type='', $link='', $align='', $resize=false, $dpi=300, $palign='', $ismask=false, $imgmask=false, $border=0, $fitbox=false, $hidden=false, $fitonpage=false)
		$this->tcpdf_lib->Image($imgPath,    '',     34,    0,    0,       '', $imgPath,       'N',        true,       150,        'C',        false,          false,         0,         false,         false,            false);
		$this->tcpdf_lib->SetFont('times', 'B', 14);
		$this->tcpdf_lib->Cell(0, 0, $student['id'].". ". $student['name'], 0, 1, 'C');
		$this->tcpdf_lib->SetFont('times', 'N', 12);
		$this->tcpdf_lib->Cell(0, 0, 'Father: '.$student['fname'].'; Mother: '. $student['mname'].'; Mobile: ' .$student['mobile'], 0, 1, 'C');
		$this->tcpdf_lib->Cell(0, 0, $student['address'], 0, 1, 'C');
		$this->tcpdf_lib->Cell(0, 0,'Birth Date: '. $student['bdate'].'; Sex: '.$student['sex'], 0, 1, 'C');
		$this->tcpdf_lib->Cell(0, 0,'School: ' .$student['school_name'], 0, 1, 'C');
		$this->tcpdf_lib->Cell(0, 0,'Class: '. $student['class_name'].'; Position: '.$student['position'].'; Marks: '.$student['marks'], 0, 1, 'C');
		$this->tcpdf_lib->SetFont('times', 'NI', 12);
		$this->tcpdf_lib->Ln(5);
		//                MultiCell($w, $h,                $txt, $border=0, $align='J',$fill=0, $ln=1, $x='', $y='', $reseth=true, $stretch=0, $ishtml=false, $autopadding=true, $maxh=0)
		$this->tcpdf_lib->MultiCell(0,   0, $student['remarks'],         0,        'C',      0,     1);
		$this->tcpdf_lib->Output('student.pdf', 'I');
	}

	public function img_edit($id)
	{
		$data['student']     = $this->student_model->select_one($id);
		$this->load->view('layout/header');
		$this->load->view('layout/header_closing');
		$this->load->view('layout/navbar');
		$this->load->view('student/edit_img',$data);
		$this->load->view('layout/footer');
		$this->load->view('layout/footer_closing');
	}
	
	public function img_save($id)
	{
		$student     					= $this->student_model->select_one($id);
		
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