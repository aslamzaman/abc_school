<?php 
    class Attendance_model extends  CI_Model{

        public function __construct()
        {
            parent::__construct();
            $this->db = $this->load->database("default",TRUE);
        }
    

		
		/**
		--------------------------------------------------------
		========================================================
		--------------------------------------------------------
		*/
    
	
        public function edit($data=array(), $id)
        {    
			$this->db->where('id', $id);
			return $this->db->update('attendance', $data);
        } 
		
		
		/**
		--------------------------------------------------------
		========================================================
		--------------------------------------------------------
		*/


        public function reset_all_zero($class, $section)
        {    
			$dt = date('Y-m-d');
			$data['attend']		= 0;
			$this->db->where('class_name_id', $class);
			$this->db->where('section_id', $section);
			$this->db->where('dt', $dt);
			return $this->db->update('attendance', $data);
        } 
   
    
    
		/**
		--------------------------------------------------------
		========================================================
		--------------------------------------------------------
		*/


		public function select_all($class,$section)
        {
            // Checking all admited students are in attendace table. If not then added
			$this->checking_admission_attendance_equel($class, $section);

			$this->db->select('`attendance`.`id`, `attendance`.`student_id`, `attendance`.`dt`, `attendance`.`class_name_id`, `attendance`.`section_id`, `attendance`.`attend`, `attendance`.`entry_dt`');
			$this->db->select('`student`.`name` as `student`');			

            $this->db->from('attendance');
			$this->db->join('`student`',	 '`attendance`.`student_id` = `student`.`id`',	'left');
			
			$this->db->where('`attendance`.`class_name_id`',$class);
			$this->db->where('`attendance`.`section_id`',$section);
			
			$this->db->where('`attendance`.`dt`', date('Y-m-d'));
			
			$this->db->order_by('`attendance`.`student_id`','ASC');
            $query = $this->db->get();
			
            if($query->num_rows() > 0){
                return $query->result_array();
            }else{
                return FALSE;
            }
        }  
		
        public function checking_admission_attendance_equel($class, $section)
        {
            // select all admited student
			$stds = $this->select_admission_all($class, $section);
			
			if($stds)
			{
				foreach($stds as $std)
				{
					$this->db->select('*');
					$this->db->where('student_id', $std['student_id']);
					$this->db->where('dt', date("Y-m-d"));
					$query = $this->db->get('attendance');
					if(!$query->num_rows() > 0)
					{
						// `id`, `student_id`, `dt`, `class_name_id`, `section_id`, `attendance`, `entry_dt`
						$data['student_id'] 	= $std['student_id'];
						$data['dt'] 			= date('Y-m-d');
						$data['class_name_id'] 	= $class;
						$data['section_id'] 	= $section;
						$data['attend'] 		= 0;
						$data['entry_dt'] 		= date('Y-m-d h:i:sa');
						
						$this->add($data);
					}
				}
			}
        }     
	
		public function select_admission_all($class,$section)
        {
            $this->db->select('*');
			
			$this->db->where('class_name_id',$class);
			$this->db->where('section_id',$section);
			$this->db->where('status',1);
			
            $query = $this->db->get('admission');
			
            if($query->num_rows() > 0){
                return $query->result_array();
            }else{
                return FALSE;
            }
        }  
		
		public function add($data=array())
        {
			return $this->db->insert('attendance', $data);
        } 		
		




        
        
        /**
        --------------------------------------------------------
        ========================================================
        --------------------------------------------------------
        */
 

        public function drop_down_option($table,$selected_id)
        {
            $dropdown	= '';
            $this->db->select('`id`,`name`');
            $this->db->order_by('name','ASC');
            $query 		= $this->db->get($table);
            $result 	= $query->result_array();
            $dropdown .="\n";			
            foreach($result as $row)
            {
                if($selected_id == $row['id'])
                {
                    $dropdown .= "<option value=".$row['id']." selected>".$row['name']."</option>\n";
                }
                else
                {
                    $dropdown .= "<option value=".$row['id'].">".$row['name']."</option>\n";
                }
            }			
            return $dropdown;
        } 


        
        /**
        --------------------------------------------------------
        ========================================================
        --------------------------------------------------------
        */
 

       public function select_one_row($table, $id)
        {
            $this->db->where('id',$id);
            $query = $this->db->get($table);
            if($query->num_rows() > 0){
                return $query->row_array();
            }else{
                return FALSE;
            }
        }  
    


}
?>