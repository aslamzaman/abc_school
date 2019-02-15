<?php 
    class Admission_model extends  CI_Model{

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
			return $this->db->insert('admission', $data);
        } 



    
    /**
    --------------------------------------------------------
    ========================================================
    --------------------------------------------------------
    */
    
        public function edit($data=array(), $id)
        {    
			$this->db->where('id', $id);
			return $this->db->update('admission', $data);
        } 

    
    
    
    
    /**
    --------------------------------------------------------
    ========================================================
    --------------------------------------------------------
    */
    
    

        public function remove($id)
        {
            $this->db->where('id', $id);
            return $this->db->delete('admission');
        }
    
    
    
    
    /**
    --------------------------------------------------------
    ========================================================
    --------------------------------------------------------
    */
    
    

      public function select_all()
        {
            $this->db->select('`admission`.`id`, `admission`.`student_id`, `admission`.`class_name_id`, `admission`.`section_id`, `admission`.`class_roll`, `admission`.`entry_dt`');
			$this->db->select('`student`.`name` as `student`');
			$this->db->select('`class_name`.`name` as `class_name`');
			$this->db->select('`section`.`name` as `section`');
			
            $this->db->from('admission');
            $this->db->join('student', '`admission`.`student_id`= `student`.`id`', 'left');
			$this->db->join('class_name', '`admission`.`class_name_id`=`class_name`.`id`', 'left');
			$this->db->join('section','`admission`.`section_id`= `section`.`id`', 'left');			
			
           $this->db->where('`admission`.`status`','1');
		   $this->db->order_by('`admission`.`id`','DESC');
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
            $this->db->where('id',$id);
            $query = $this->db->get('admission');
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

        public function drop_down_student($selected_id)
        {
            $dropdown	= '';
            $this->db->select('`id`,`name`');
            $this->db->order_by('id','ASC');
            $query 		= $this->db->get('`student`');
            $result 	= $query->result_array();
            $dropdown .="\n";			
            foreach($result as $row)
            {
                if($selected_id == $row['id'])
                {
                    $dropdown .= "<option value=".$row['id']." selected>".$row['id'].'. '.$row['name']."</option>\n";
                }
                else
                {
                    $dropdown .= "<option value=".$row['id'].">".$row['id'].'. '.$row['name']."</option>\n";
                }
            }			
            return $dropdown;
        } 

}
?>