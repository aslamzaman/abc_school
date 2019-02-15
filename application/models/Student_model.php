<?php 
    class Student_model extends  CI_Model{

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
    
    
        public function add($data=array())
        {
			return $this->db->insert('student', $data);
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
    
    

        public function remove($id)
        {
            $this->db->where('id', $id);
            return $this->db->delete('student');
        }
    
    
    
    
    /**
    --------------------------------------------------------
    ========================================================
    --------------------------------------------------------
    */
    
    

      public function select_all()
        {
            $this->db->select('*');
            $this->db->order_by('id','DESC');
            $query = $this->db->get('student');
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
            $this->db->where('id',$id);
            $query = $this->db->get('student');
            if($query->num_rows() > 0){
                return $query->row_array();
            }else{
                return FALSE;
            }
        }  
    
   
        public function view($id)
        {
            $this->db->select('`student`.`id`, `student`.`name`, `student`.`fname`, `student`.`mname`, `student`.`address`, `student`.`mobile`, `student`.`bdate`, `student`.`sex_id`, `student`.`school_name`, `student`.`marks`, `student`.`position`, `student`.`remarks`, `student`.`pic`, `student`.`entry_dt`');
            $this->db->select('`sex`.`name` as sex');
			$this->db->select('`class_name`.`name` as class_name');
            
			$this->db->from('student');			
            $this->db->join('sex', '`student`.`sex_id` = `sex`.`id`', 'left');
			$this->db->join('class_name', '`student`.`class_name_id`= `class_name`.`id`', 'left');
			
            $this->db->where('`student`.`id`',$id);            
            $query = $this->db->get();
			
            if($query->num_rows() > 0){
                return $query->row_array();
            }else{
                return FALSE;
            }
        }  
      

        
        
        
        /**
        --------------------------------------------------------
        ========================================================
        --------------------------------------------------------
        */
        
  
        

        public function join_2table()
        {
            $this->db->select('`student`.`id`, `student`.`name`, `student`.`fname`, `student`.`mname`, `student`.`address`, `student`.`mobile`, `student`.`bdate`, `student`.`sex_id`, `student`.`school_name`, `student`.`class_id`, `student`.`marks`, `student`.`position`, `student`.`remarks`, `student`.`pic`, `student`.`entry_dt`');
            $this->db->select($sql);
            $this->db->from('student');
            $this->db->join($table2, $key, 'left');
            $this->db->order_by('`student`.`id`','DESC');            
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


}
?>