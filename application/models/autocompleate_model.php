<?php
class Autocompleate_model extends CI_Model{
	 public function __construct() {
       $this->load->database(); 
    }
	/////////////////////////////////////////
    function lookup($keyword)
	{
        //$this->db->select('*')->from('user_information');
        //$this->db->like('UserName',$keyword,'after');
		
        $query = $this->db->query("SELECT UserID,UserName,ImageName FROM user_information WHERE UserName LIKE '".$keyword."%'");    
         
        return $query->result();
    }
	//////////////////////////////////////////
	function MCheckPass($id,$pass)
	{
        $query = $this->db->query("SELECT COUNT(*) aa FROM user_information WHERE UserID='".$id."' AND UserPassword='".$pass."'");    
        return $query->row('aa');
    }
	//////////////////////////////////////////
	
}
