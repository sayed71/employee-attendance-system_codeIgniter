<?php
class LoginModel extends CI_Model 
{
	public function __construct()
	{
		$this->load->database();
	}
	////////////////////////////////////////////
	public function check_admin()
	{
		//$this->load->helper('url');

		$UserName =  $this->input->post('txtUser');
		$Password = $this->input->post('txtPassword');

		$query = $this->db->query("SELECT COUNT(*) aa FROM admin_information WHERE UserName='".$UserName."' AND UserPassword='".$Password."'");  
		return $query->row('aa');
	}
	////////////////////////////////////////////
   
}


