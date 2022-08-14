<?php
class Dept_info_model extends CI_Model 
{
	public $TotalRow;
	public $RecPos;
	public function __construct()
	{
		$this->load->database();
	}
	/////////////////////////////////////////////
	public function First_data()
	{
		$sql="SELECT UserID,UserName,UserPassword FROM dept_information LIMIT 1";
		$query = $this->db->query($sql);
		$row = $query->row_array();
		@$row['Msg']="Welcome to attendance information";
		$row['RecPos']=0;
		return $row ;	
	}
	////////////////////////////////////////////
	public function ButtonWorkModel($Keyword)
	{
		$UserName =  $this->input->post('txtUserName');//Dept. Name
		$Password =  $this->input->post('txtPassword');	//Remarks	
		/////////////////////////////////////////////////////
		if($Keyword=="Add")
		{
			$sql="INSERT INTO dept_information SET UserID='',UserName='".$UserName."',UserPassword='".$Password."'";
			$Result = $this->db->query($sql);
			///////////////////////////////////////////
			$sqlCount="SELECT COUNT(*) tr FROM dept_information";
			$ResultCount = $this->db->query($sqlCount);
			$TotalRow = $ResultCount->row('tr');
			//////////////////////////////////
			$RecPos=$TotalRow-1;
			$sql="SELECT UserID,UserName,UserPassword FROM dept_information LIMIT ".$RecPos.",1";
			$query = $this->db->query($sql);
			$row = $query->row_array();
			///////////////////////////////////
			$row['RecPos']=$RecPos;
			$row['Msg']=$Result>0 ? "Data Insert Successfully..." : "Data Insert Unsuccessfully...";
			return $row ;
		}
		///////////////////////////////////////////////////////
		if($Keyword=="First")
		{
			$RecPos=0;
			$sql="SELECT UserID,UserName,UserPassword FROM dept_information LIMIT ".$RecPos.",1";
			$query = $this->db->query($sql);
			$row = $query->row_array();
			@$row['Msg']=$query>0 ? "This is first data...(1)" : "First data show Unsuccessfully...";
			@$row['RecPos']=$RecPos;
			return @$row ;
		}
		///////////////////////////////////////////////////////
		if($Keyword=="Last")
		{
			$sqlCount="SELECT COUNT(*) tr FROM dept_information";
			$ResultCount = $this->db->query($sqlCount);
			$TotalRow = $ResultCount->row('tr');
			$RecPos=$TotalRow-1;
			$sql="SELECT UserID,UserName,UserPassword FROM dept_information LIMIT ".$RecPos.",1";
			$query = $this->db->query($sql);
			$row = $query->row_array();
			@$row['Msg']=$query>0?"This is last data...(".$TotalRow.")":"Last data show Unsuccessfully...";
			$row['RecPos']=$RecPos;
			return $row ;
		}
		///////////////////////////////////////////////////////
		if($Keyword=="Next")
		{
			$sqlCount="SELECT COUNT(*) tr FROM dept_information";
			$ResultCount = $this->db->query($sqlCount);
			$TotalRow = $ResultCount->row('tr');
			$RecPos=$this->input->post('hdnRecPos')+1;
			if($RecPos<$TotalRow)
			{
				$sql="SELECT UserID,UserName,UserPassword FROM dept_information LIMIT ".$RecPos.",1";
				$query = $this->db->query($sql);
				$row = $query->row_array();
				@$row['Msg']=$query>0?"This is first data...(".$RecPos.")":"First data show Unsuccessfully...";
				//$RecPos++;
				$row['RecPos']=$RecPos;
				return $row ;
			}
			else
			{
				$sqlCount="SELECT COUNT(*) tr FROM dept_information";
				$ResultCount = $this->db->query($sqlCount);
				$TotalRow = $ResultCount->row('tr');
				$RecPos=$TotalRow-1;
				$sql="SELECT UserID,UserName,UserPassword FROM dept_information LIMIT ".$RecPos.",1";
				$query = $this->db->query($sql);
				$row = $query->row_array();
				@$row['Msg']=$query>0?"This is last data...(".$TotalRow.")":"First data show Unsuccessfully...";
				
				$row['RecPos']=$RecPos;
				return $row ;
			}
		}
		///////////////////////////////////////////////////////
		if($Keyword=="Previous")
		{
			$sqlCount="SELECT COUNT(*) tr FROM dept_information";
			$ResultCount = $this->db->query($sqlCount);
			$TotalRow = $ResultCount->row('tr');
			$RecPos=$this->input->post('hdnRecPos')-1;
			if($RecPos>0)
			{
				$sql="SELECT UserID,UserName,UserPassword FROM dept_information LIMIT ".$RecPos.",1";
				$query = $this->db->query($sql);
				$row = $query->row_array();
				@$row['Msg']=$query>0?"This is first data...(".$RecPos.")":"First data show Unsuccessfully...";
				$row['RecPos']=$RecPos;
				return $row ;
			}
			else
			{
				$sqlCount="SELECT COUNT(*) tr FROM dept_information";
				$ResultCount = $this->db->query($sqlCount);
				$TotalRow = $ResultCount->row('tr');
				$RecPos=0;
				$sql="SELECT UserID,UserName,UserPassword FROM dept_information LIMIT ".$RecPos.",1";
				$query = $this->db->query($sql);
				$row = $query->row_array();
				@$row['Msg']=$query>0?"This is first data...(1)":"First data show Unsuccessfully...";
				
				$row['RecPos']=$RecPos;
				return $row ;
			}
		}
		////////////////////////////////////////////
		if($Keyword=="Edit")
		{
			$UserID=$this->input->post('hdnUserID');
			$RecPos=$this->input->post('hdnRecPos');
			$sql="UPDATE dept_information SET UserName='".$UserName."',UserPassword='".$Password."' WHERE UserID='".$UserID."'";
			$Result = $this->db->query($sql);
			////////////////////////////////////////////////
			$sql1="SELECT UserID,UserName,UserPassword FROM dept_information LIMIT ".$RecPos.",1";
			$query = $this->db->query($sql1);
			$row = $query->row_array();				
			$row['RecPos']=$RecPos;
			$row['Msg']=$Result>0 ? "Edit Data Successfully...(".$RecPos.")" : "Edit Data Unsuccessfully...";
			//$row['Msg']=$RecPos;
			return $row ;
		}
		/////////////////////////////////////////////////
		if($Keyword=="Delete")
		{
			$UserID=$this->input->post('hdnUserID');
			$RecPos=$this->input->post('hdnRecPos')-1;
			$sql="DELETE FROM dept_information WHERE UserID='".$UserID."'";
			$Result = $this->db->query($sql);
			////////////////////////////////////////////////
			$sql1="SELECT UserID,UserName,UserPassword FROM dept_information LIMIT ".$RecPos.",10";
			$query = $this->db->query($sql1);
			$row = $query->row_array();				
			$row['RecPos']=$RecPos;
			$row['Msg']=$Result>0 ? "Delete Data Successfully...(".$RecPos.")" : "Delete Data Unsuccessfully...";
			return $row ;
		}
		///////////////////////////////////////////////////////
		if($Keyword=="Show")
		{
			$sql="SELECT UserID,UserName,UserPassword FROM dept_information ORDER BY UserID DESC LIMIT 10";
			$query = $this->db->query($sql);
			$row['res'] = $query->result_array();
			@$row['Msg']=$query>0 ? "Show data successfully..." : "Show data un-successfully...";
			return $row ;
		}
		/////////////////////////////////////////////////
		
	}
	////////////////////////////////////////////
   
}


