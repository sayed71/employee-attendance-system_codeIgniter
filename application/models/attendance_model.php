<?php
class Attendance_model extends CI_Model 
{
	public function __construct()
	{
		$this->load->database();
	}
	////////////////////////////////////////////
	public function set_attendance()
	{
		//$this->load->helper('url');
	
		//$slug = url_title($this->input->post('title'), 'dash', TRUE);

		//$AttendanceID = $this->input->post('AttendanceID');
		$UserID =  $this->input->post('hdnUserID');
		$Remarks = $this->input->post('txtRemarks');

		//return $this->db->insert('attendance', $data);
		$sql_attendance="SELECT COUNT(*) LoginPerDay FROM attendance WHERE DATE_FORMAT(AttendanceDate,'%Y-%m-%d')=DATE_FORMAT(NOW(),'%Y-%m-%d') AND UserID='".$UserID."'";
		$Qry_attendace = $this->db->query($sql_attendance);
		$LoginStatus1 = $Qry_attendace->row('LoginPerDay');
		$LoginStatus=($LoginStatus1+1);
		$sql="INSERT INTO attendance SET UserID='".$UserID."',AttendanceDate=NOW(),Remarks='".$Remarks."',LoginPerDay='".$LoginStatus."'";
		$Result = $this->db->query($sql);
		if($Result==1)
		{
			if($LoginStatus%2==0)
			{
				return "Logout";
			}	
			else
			{
				return "Login";	
			}
		}
	}
	////////////////////////////////////////////
	public function set_report()
	{
		$UserID =  $this->input->post('hdnUserID');
		$UserName = $this->input->post('txtUserName');
		$Password = $this->input->post('txtPassword');
		$sql="SELECT COUNT(*) tr FROM user_information WHERE UserID='".$UserID."' AND UserName='".$UserName."' AND UserPassword='".$Password."'";	
		$ResultCount = $this->db->query($sql);
		$TotalRow = $ResultCount->row('tr');
		return $TotalRow;
	}
   ////////////////////////////////////////////////
   public function set_personal_info()
   {
	    $UserID =  $this->session->userdata('AttendanceSession');
		//$UserName = $this->input->post('txtUserName');
	    $sql="SELECT UserName,Address,EmailAddress,ContactNumber,JoinDate,Gender,ImageName FROM user_information WHERE UserID='".$UserID."'";
		$query = $this->db->query($sql);
		$row = $query->row_array();
		return $row;
   }
   ////////////////////////////////////////////////
   public function change_pass_info()
   {
	    $UserID =  $this->session->userdata('AttendanceSession');
		$Old_pass =  $this->input->post('txt_old_pass');
		$New_pass = $this->input->post('txt_new_pass');
		$Confirm_pass = $this->input->post('txt_confirm_pass');
	    $sql="SELECT COUNT(*) tr FROM user_information WHERE UserID='".$UserID."' AND UserPassword='".$Old_pass."'";
		$query = $this->db->query($sql);
		$Result = $query->row('tr');
		if($Old_pass!="" && $New_pass!="" && $Confirm_pass!="")
		{
		if($Result==1)
		{
			if($New_pass==$Confirm_pass)
			{
				$sqlUpdate="UPDATE user_information SET UserPassword='".$New_pass."' WHERE UserID='".$UserID."'";
				$x = $this->db->query($sqlUpdate);
				if($x >0)
				{
					return "Password change successfully";
				}
				else
				{
					return "Password change unsuccessfully";	
				}
			}
			else
			{
				return "Confirm password is wrong";	
			}
		}
		else
		{
			return "Your old password is wrong";	
		}
		}
		
   }
   ////////////////////////////////////////////////
   
   
}


