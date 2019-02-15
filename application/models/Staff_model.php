<?php 
    class Staff_model extends  CI_Model{

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
			return $this->db->insert('staff', $data);
        } 



    
    /**
    --------------------------------------------------------
    ========================================================
    --------------------------------------------------------
    */
    
        public function edit($data=array(), $id)
        {    
			$this->db->where('id', $id);
			return $this->db->update('staff', $data);
        } 

    
    
    
    
    /**
    --------------------------------------------------------
    ========================================================
    --------------------------------------------------------
    */
    
    

        public function remove($id)
        {
            $this->db->where('id', $id);
            return $this->db->delete('staff');
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
			
			$this->db->where('status','1');
            $query = $this->db->get('staff');
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
            $query = $this->db->get('staff');
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


}
?>