<?php 
    class Staff_salary_model extends  CI_Model{

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
/* 	
 Salary
- check this month salary list is avilable
- if false
- call previous salary sheet and copy for this month
- else
- Call all current staff (thoes sttaffs status are avilable)
- check current salary sheet one by one all staff and find which staff is not in this.
- after identitify the absent staff add in this month salary sheet.
 */
	
		// Is there a salary update this month?
		private function is_salary_update()
        {
            $m = date('Y').date('m');
			$this->db->select('*');
            $this->db->from('staff_salary');
           
			$this->db->where('salary_month',$m);
            $query = $this->db->get();
			
            if($query->num_rows() > 0){
                return 	TRUE;
            }else{
                return FALSE;
            }
        } 
		
		// The last inserted salary month
		private function last_salary_month()
        {
			$this->db->select('salary_month');
            $this->db->from('staff_salary');           
			$this->db->order_by('salary_month','DESC');
            $query = $this->db->get();
			
            if($query->num_rows() > 0){
                return $query->row_array();
            }else{
                return FALSE;
            }
        }  
 
 
        private function add_from_last_salary($data=array())
        {
			return $this->db->insert('staff_salary', $data);
        } 
	

	
		// Salary sheets are fixed till the current month
		public function salary_fixed_till_month()
        {
            $data = array();
			$f = $this->is_salary_update();
			if($f)
			{
				return FALSE;	
			}
			else
			{
				$m = $this->last_salary_month();	

				$this->db->select('*');
				$this->db->from('staff_salary');
			   
				$this->db->where('salary_month',$m);
				$query = $this->db->get();
				
				if($query->num_rows() > 0){
					$s = $query->result_array();
					
					$data = array();
					foreach($s as $row)
					{
						// SELECT `id`, `staff_id`, `salary_month`, `amount`, `deduct`, `add_any`, `arear`, `note`, `entry_dt` FROM `staff_salary` WHERE 1
						$m = date('Y').date('m');
						
						$data['id'] 			= NULL;
						$data['staff_id'] 		= $row['staff_id'];
						$data['salary_month'] 	= $m;
						$data['amount'] 		= $row['amount'];
						$data['deduct'] 		= 0;
						$data['add_any'] 		= 0;
						$data['arear'] 			= 0;
						$data['note'] 			= '';
						$data['entry_dt'] 		= date('Y-m-d h:i:sa');
						$this->add_from_last_salary($data);
					}	
				
				}else{
					return FALSE;
				}				
				
			}
        }  
		


    
    /**
    --------------------------------------------------------
    ========================================================
    --------------------------------------------------------
    */
    
        public function edit($data=array(), $id)
        {    
			$this->db->where('id', $id);
			return $this->db->update('student', $data);
        } 

    
    
    
    
    /**
    --------------------------------------------------------
    ========================================================
    --------------------------------------------------------
    */
    


      public function select_all()
        {
			$this->db->select('`staff_salary`.`id`, `staff_salary`.`staff_id`, `staff_salary`.`salary_month`, `staff_salary`.`amount`, `staff_salary`.`deduct`, `staff_salary`.`add_any`, `staff_salary`.`arear`, `staff_salary`.`note`, `staff_salary`.`entry_dt`');
			$this->db->select('`staff`.`name` as staff');

            $this->db->from('staff_salary');
            $this->db->join('staff', '`staff_salary`.`staff_id` = `staff`.`id`', 'left');            
			
			$this->db->order_by('`staff_salary`.`amount`','DESC');
            $query = $this->db->get();
			
            if($query->num_rows() > 0){
                return $query->result_array();
            }else{
                return FALSE;
            }
        }  
    
    
  
    
    
    /**
    --------------------------------------------------------
    ========================================================
    --------------------------------------------------------
    */
    
    


       public function select_one($id)
        {
			$this->db->select('`staff_salary`.`id`, `staff_salary`.`staff_id`, `staff_salary`.`salary_month`, `staff_salary`.`amount`, `staff_salary`.`deduct`, `staff_salary`.`add_any`, `staff_salary`.`arear`, `staff_salary`.`note`, `staff_salary`.`entry_dt`');
			$this->db->select('`staff`.`name` as staff');

            $this->db->from('staff_salary');
            $this->db->join('staff', '`staff_salary`.`staff_id` = `staff`.`id`', 'left');            
			
			$this->db->where('`staff_salary`.`id`',$id);
            $query = $this->db->get();
			
            if($query->num_rows() > 0){
                return $query->row_array();
            }else{
                return FALSE;
            }
         
        }  
    

}
?>