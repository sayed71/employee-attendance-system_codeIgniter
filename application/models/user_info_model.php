<?php
class User_info_model extends CI_Model 
{
	public $TotalRow;
	public $RecPos;
	public function __construct()
	{
		$this->load->database();
		//$this->load->library('upload');
	}
	////////////////////////////////////////////
	public function SelectUserType1()
	{
		$sql="SELECT UserID,UserName FROM dept_information";
		$query = $this->db->query($sql);
		$row['SelectD'] = $query->result_array();
		return $row ;	
	}
	////////////////////////////////////////////
	public function SelectUserType()
	{
		$sql="SELECT UserTypeID,UserTypeName FROM user_type";
		$query = $this->db->query($sql);
		$row['SelectUT'] = $query->result_array();
		return $row ;	
	}
	/////////////////////////////////////////////
	public function First_data()
	{
		$sql="SELECT UserID,UserName,UserPassword,EmailAddress,Address,JoinDate,Gender,ContactNumber,SelectUserType,DepartmentType,DesignationType,SalaryAmount,MAC_Address
 FROM user_information LIMIT 1";
		$query = $this->db->query($sql);
		$row = $query->row_array();
		@$row['Msg']="Welcome to attendance information";
		$row['RecPos']=0;
		return $row ;	
	}
	/////////////////////////////////////////////
	public function First_data_UT()
	{
		$sql="SELECT UserTypeID,UserTypeName,StartTime,EndTime FROM user_type LIMIT 1";
		$query = $this->db->query($sql);
		$row = $query->row_array();
		@$row['Msg']="Welcome to attendance information";
		$row['RecPos']=0;
		return $row ;	
	}
	////////////////////////////////////////////
	function do_upload()
    {
		$config['file_name']=rand();
		$config['upload_path'] = './assets/img/UserImage/';
		$config['allowed_types'] = 'jpg';
		$config['max_size'] = '100';
		$config['max_width']  = '1024';
		$config['max_height']  = '768';
		$config['overwrite'] = TRUE;
		$config['encrypt_name'] = FALSE;
		$config['remove_spaces'] = TRUE;
		if ( ! is_dir($config['upload_path']) ) die("THE UPLOAD DIRECTORY DOES NOT EXIST");
		$this->load->library('upload', $config);
		if ( ! $this->upload->do_upload('FileUserImg'))
		{
			echo 'error';
		}
		else
		{
	
			//return array('upload_data' => $this->upload->data());
			return $config['file_name'];
		}
	}
	////////////////////////////////////////////
	public function ButtonWorkModel($Keyword)
	{
		$UserName =  $this->input->post('txtUserName');
		$ContactNumber = $this->input->post('txtContactNumber');
		$Email =  $this->input->post('txtEmail');
		$Address = $this->input->post('txtAddress');
		$Date =  $this->input->post('txtDate');
		$Gender = $this->input->post('RadioGender');
		$Password =  $this->input->post('txtPassword');
		$ConfirmPass = $this->input->post('txtConfirmPassword');	
		$SelectUserType = $this->input->post('SelectUserType');	
		$SelectUserType2 = $this->input->post('SelectUserType2');	
		////////////////////////////////////
		$Designation = $this->input->post('txtDesignation');	
		$Salary = $this->input->post('txtSalary');	
		$MAC = $this->input->post('txtMAC_Address');
		//////////////////////////////////
		if($Password != $ConfirmPass)
		{
			$Keyword="";
			$sql="SELECT UserID,UserName,UserPassword,EmailAddress,Address,JoinDate,Gender,ContactNumber,SelectUserType,DesignationType,SalaryAmount,MAC_Address
,DepartmentType FROM user_information LIMIT 1";
			$query = $this->db->query($sql);
			$row = $query->row_array();
			@$row['Msg']="Confirm password is wrong...";
			$row['RecPos']=0;
			return $row ;	
		}
		/////////////////////////////////////////////////////
		if($Keyword=="Add")
		{
			if($SelectUserType!="select-one")
			{
				$ImgName = $this->do_upload();
				$sql="INSERT INTO user_information SET UserID='',UserName='".$UserName."',UserPassword='".$Password."',EmailAddress='".$Email."',Address='".$Address."',JoinDate='".$Date."',Gender='".$Gender."',ContactNumber='".$ContactNumber."',SelectUserType='".$SelectUserType."',ImageName='".$ImgName."',DepartmentType='".$SelectUserType2."',DesignationType='".$Designation."',SalaryAmount='".$Salary."',MAC_Address='".$MAC."'";
				$Result = $this->db->query($sql);
				///////////////////////////////////////////
				$sqlCount="SELECT COUNT(*) tr FROM user_information";
				$ResultCount = $this->db->query($sqlCount);
				$TotalRow = $ResultCount->row('tr');
				$RecPos=$TotalRow-1;
				$sql="SELECT UserID,UserName,UserPassword,EmailAddress,Address,JoinDate,Gender,ContactNumber,DepartmentType,DesignationType,SalaryAmount,MAC_Address
 FROM user_information LIMIT ".$RecPos.",1";
				$query = $this->db->query($sql);
				$row = $query->row_array();
				$row['RecPos']=$RecPos;
				$row['Msg']=$Result>0 ? "Data Insert Successfully..." : "Data Insert Unsuccessfully...";
				return $row ;
			}
			else
			{
				$row['Msg']="Please select user type...";
				return $row ;	
			}
		}
		///////////////////////////////////////////////////////
		if($Keyword=="First")
		{
			$RecPos=0;
			$sql="SELECT UserID,UserName,UserPassword,EmailAddress,Address,JoinDate,Gender,ContactNumber,SelectUserType,DesignationType,SalaryAmount,MAC_Address
,DepartmentType FROM user_information LIMIT ".$RecPos.",1";
			$query = $this->db->query($sql);
			$row = $query->row_array();
			@$row['Msg']=$query>0 ? "This is first data...(1)" : "First data show Unsuccessfully...";
			@$row['RecPos']=$RecPos;
			return @$row ;
		}
		///////////////////////////////////////////////////////
		if($Keyword=="Last")
		{
			$sqlCount="SELECT COUNT(*) tr FROM user_information";
			$ResultCount = $this->db->query($sqlCount);
			$TotalRow = $ResultCount->row('tr');
			$RecPos=$TotalRow-1;
			$sql="SELECT UserID,UserName,UserPassword,EmailAddress,Address,DesignationType,SalaryAmount,MAC_Address
,JoinDate,Gender,ContactNumber,SelectUserType,DepartmentType FROM user_information LIMIT ".$RecPos.",1";
			$query = $this->db->query($sql);
			$row = $query->row_array();
			@$row['Msg']=$query>0?"This is last data...(".$TotalRow.")":"Last data show Unsuccessfully...";
			$row['RecPos']=$RecPos;
			return $row ;
		}
		///////////////////////////////////////////////////////
		if($Keyword=="Next")
		{
			$sqlCount="SELECT COUNT(*) tr FROM user_information";
			$ResultCount = $this->db->query($sqlCount);
			$TotalRow = $ResultCount->row('tr');
			$RecPos=$this->input->post('hdnRecPos')+1;
			if($RecPos<$TotalRow)
			{
				$sql="SELECT UserID,UserName,UserPassword,EmailAddress,Address,DesignationType,SalaryAmount,MAC_Address
,JoinDate,Gender,ContactNumber,SelectUserType,DepartmentType FROM user_information LIMIT ".$RecPos.",1";
				$query = $this->db->query($sql);
				$row = $query->row_array();
				@$row['Msg']=$query>0?"This is first data...(".$RecPos.")":"First data show Unsuccessfully...";
				//$RecPos++;
				$row['RecPos']=$RecPos;
				return $row ;
			}
			else
			{
				$sqlCount="SELECT COUNT(*) tr FROM user_information";
				$ResultCount = $this->db->query($sqlCount);
				$TotalRow = $ResultCount->row('tr');
				$RecPos=$TotalRow-1;
				$sql="SELECT UserID,UserName,UserPassword,EmailAddress,Address,DesignationType,SalaryAmount,MAC_Address
,JoinDate,Gender,ContactNumber,SelectUserType,DepartmentType FROM user_information LIMIT ".$RecPos.",1";
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
			$sqlCount="SELECT COUNT(*) tr FROM user_information";
			$ResultCount = $this->db->query($sqlCount);
			$TotalRow = $ResultCount->row('tr');
			$RecPos=$this->input->post('hdnRecPos')-1;
			if($RecPos>0)
			{
				$sql="SELECT UserID,UserName,UserPassword,EmailAddress,Address,DesignationType,SalaryAmount,MAC_Address
,JoinDate,Gender,ContactNumber,SelectUserType,DepartmentType FROM user_information LIMIT ".$RecPos.",1";
				$query = $this->db->query($sql);
				$row = $query->row_array();
				@$row['Msg']=$query>0?"This is first data...(".$RecPos.")":"First data show Unsuccessfully...";
				$row['RecPos']=$RecPos;
				return $row ;
			}
			else
			{
				$sqlCount="SELECT COUNT(*) tr FROM user_information";
				$ResultCount = $this->db->query($sqlCount);
				$TotalRow = $ResultCount->row('tr');
				$RecPos=0;
				$sql="SELECT UserID,UserName,UserPassword,EmailAddress,Address,DesignationType,SalaryAmount,MAC_Address
,JoinDate,Gender,ContactNumber,SelectUserType,DepartmentType FROM user_information LIMIT ".$RecPos.",1";
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
			$sql="UPDATE user_information SET UserName='".$UserName."',UserPassword='".$Password."',EmailAddress='".$Email."',Address='".$Address."',JoinDate='".$Date."',Gender='".$Gender."',ContactNumber='".$ContactNumber."',SelectUserType='".$SelectUserType."',DepartmentType='".$SelectUserType2."',DesignationType='".$Designation."',SalaryAmount='".$Salary."',MAC_Address='".$MAC."' WHERE UserID='".$UserID."'";
			$Result = $this->db->query($sql);
			////////////////////////////////////////////////
			$sql1="SELECT UserID,UserName,UserPassword,EmailAddress,Address,DesignationType,SalaryAmount,MAC_Address
,JoinDate,Gender,ContactNumber,SelectUserType,DepartmentType FROM user_information ".$RecPos.",1";
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
			$sql="DELETE FROM user_information WHERE UserID='".$UserID."'";
			$Result = $this->db->query($sql);
			////////////////////////////////////////////////
			$sql1="SELECT UserID,UserName,UserPassword,DesignationType,SalaryAmount,MAC_Address
,EmailAddress,Address,JoinDate,Gender,ContactNumber,SelectUserType,DepartmentType FROM user_information LIMIT ".$RecPos.",1";
			$query = $this->db->query($sql1);
			$row = $query->row_array();				
			$row['RecPos']=$RecPos;
			$row['Msg']=$Result>0 ? "Delete Data Successfully...(".$RecPos.")" : "Delete Data Unsuccessfully...";
			return $row ;
		}
		///////////////////////////////////////////////////////
		if($Keyword=="Show")
		{
			$sql="SELECT UserID,UserName,ContactNumber,EmailAddress,Address,JoinDate,Gender,UserPassword,DesignationType,SalaryAmount,MAC_Address
 FROM user_information ORDER BY UserID DESC LIMIT 10";
			$query = $this->db->query($sql);
			$row['res'] = $query->result_array();
			@$row['Msg']=$query>0 ? "Show data successfully..." : "Show data un-successfully...";
			return $row ;
		}
		/////////////////////////////////////////////////
		
	}
	/////////////////////////////////////////////////////
	/////////////////////////////////////////////////////
   	public function ButtonWorkModel_UT($Keyword)
	{
		$UserType =  $this->input->post('txtUserType');
		$StartDate = $this->input->post('txtStartDate');
		$EndDate =  $this->input->post('txtEndDate');	
		/////////////////////////////////////////////////////
		if($Keyword=="Add")
		{
			$sql="INSERT INTO user_type SET UserTypeID='',UserTypeName='".$UserType."',StartTime='".$StartDate."',EndTime='".$EndDate."'";
			$Result = $this->db->query($sql);
			///////////////////////////////////////////
			$sqlCount="SELECT COUNT(*) tr FROM user_type";
			$ResultCount = $this->db->query($sqlCount);
			$TotalRow = $ResultCount->row('tr');
			$RecPos=$TotalRow-1;
			$sql="SELECT UserTypeID,UserTypeName,StartTime,EndTime FROM user_type LIMIT ".$RecPos.",1";
			$query = $this->db->query($sql);
			$row = $query->row_array();
			////////////////////////////////////////////
			$row['RecPos']=$RecPos;
			$row['Msg']=$Result>0 ? "Data Insert Successfully..." : "Data Insert Unsuccessfully...";
			return $row ;
		}
		///////////////////////////////////////////////////////
		if($Keyword=="First")
		{
			$RecPos=0;
			$sql="SELECT UserTypeID,UserTypeName,StartTime,EndTime FROM user_type LIMIT ".$RecPos.",1";
			$query = $this->db->query($sql);
			$row = $query->row_array();
			@$row['Msg']=$query>0 ? "This is first data...(1)" : "First data show Unsuccessfully...";
			@$row['RecPos']=$RecPos;
			return @$row ;
		}
		///////////////////////////////////////////////////////
		if($Keyword=="Last")
		{
			$sqlCount="SELECT COUNT(*) tr FROM user_type";
			$ResultCount = $this->db->query($sqlCount);
			$TotalRow = $ResultCount->row('tr');
			$RecPos=$TotalRow-1;
			$sql="SELECT UserTypeID,UserTypeName,StartTime,EndTime FROM user_type LIMIT ".$RecPos.",1";
			$query = $this->db->query($sql);
			$row = $query->row_array();
			@$row['Msg']=$query>0?"This is last data...(".$TotalRow.")":"Last data show Unsuccessfully...";
			$row['RecPos']=$RecPos;
			return $row ;
		}
		///////////////////////////////////////////////////////
		if($Keyword=="Next")
		{
			$sqlCount="SELECT COUNT(*) tr FROM user_type";
			$ResultCount = $this->db->query($sqlCount);
			$TotalRow = $ResultCount->row('tr');
			$RecPos=$this->input->post('hdnRecPos')+1;
			if($RecPos<$TotalRow)
			{
				$sql="SELECT UserTypeID,UserTypeName,StartTime,EndTime FROM user_type LIMIT ".$RecPos.",1";
				$query = $this->db->query($sql);
				$row = $query->row_array();
				@$row['Msg']=$query>0?"This is first data...(".$RecPos.")":"First data show Unsuccessfully...";
				//$RecPos++;
				$row['RecPos']=$RecPos;
				return $row ;
			}
			else
			{
				$sqlCount="SELECT COUNT(*) tr FROM user_type";
				$ResultCount = $this->db->query($sqlCount);
				$TotalRow = $ResultCount->row('tr');
				$RecPos=$TotalRow-1;
				$sql="SELECT UserTypeID,UserTypeName,StartTime,EndTime FROM user_type ".$RecPos.",1";
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
			$sqlCount="SELECT COUNT(*) tr FROM user_type";
			$ResultCount = $this->db->query($sqlCount);
			$TotalRow = $ResultCount->row('tr');
			$RecPos=$this->input->post('hdnRecPos')-1;
			if($RecPos>0)
			{
				$sql="SELECT UserTypeID,UserTypeName,StartTime,EndTime FROM user_type LIMIT ".$RecPos.",1";
				$query = $this->db->query($sql);
				$row = $query->row_array();
				@$row['Msg']=$query>0?"This is first data...(".$RecPos.")":"First data show Unsuccessfully...";
				$row['RecPos']=$RecPos;
				return $row ;
			}
			else
			{
				$sqlCount="SELECT COUNT(*) tr FROM user_type";
				$ResultCount = $this->db->query($sqlCount);
				$TotalRow = $ResultCount->row('tr');
				$RecPos=0;
				$sql="SELECT UserTypeID,UserTypeName,StartTime,EndTime FROM user_type LIMIT ".$RecPos.",1";
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
			$sql="UPDATE user_type SET StartTime='".$StartDate."',UserTypeName='".$UserType."',EndTime='".$EndDate."' WHERE UserTypeID='".$UserID."'";
			$Result = $this->db->query($sql);
			////////////////////////////////////////////////
			$sql1="SELECT UserTypeID,UserTypeName,StartTime,EndTime FROM user_type LIMIT ".$RecPos.",1";
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
			$sql="DELETE FROM user_type WHERE UserTypeID='".$UserID."'";
			$Result = $this->db->query($sql);
			////////////////////////////////////////////////
			if($Result>0)
			{
				$sql1="SELECT UserTypeID,UserTypeName,StartTime,EndTime FROM user_type LIMIT ".$RecPos.",1";
				$query = $this->db->query($sql1);
				$row = $query->row_array();				
				$row['RecPos']=$RecPos;
			}
			$row['Msg']=$Result>0 ? "Delete Data Successfully...(".$RecPos.")" : "Delete Data Unsuccessfully...";
			return $row ;
		}
		///////////////////////////////////////////////////////
		if($Keyword=="Show")
		{
			$sql="SELECT UserTypeID,UserTypeName,StartTime,EndTime FROM user_type LIMIT 10";
			$query = $this->db->query($sql);
			$row['res'] = $query->result_array();
			@$row['Msg']=$query>0 ? "Show data successfully..." : "Show data un-successfully...";
			return $row ;
		}
		/////////////////////////////////////////////////
		
	}
}


