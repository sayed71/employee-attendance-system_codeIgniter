<?php
class Datewise_report_model extends CI_Model 
{
	public $TotalRow;
	public $RecPos;
	public function __construct()
	{
		$this->load->database();
	}
	////////////////////////////////////////////
	/*public function SelectUserType()
	{
		$sql="SELECT UserID,UserName FROM holiday_info";
		$query = $this->db->query($sql);
		$row['SelectUT'] = $query->result_array();
		return $row ;	
	}*/
	////////////////////////////////////////////
	public function ButtonWorkModel($Keyword)
	{
		$StartDate =  $this->input->post('txtStartDate');
		$Startday = explode('-',$StartDate);
		$EndDate = $this->input->post('txtEndDate');
		$Endday = explode('-',$EndDate);

		//$Date =  $this->input->post('txtDate');
		//$SelectUserType = $this->input->post('SelectUserType');	
		/////////////////////////////////////////////////////
		if($Keyword=="Show")
		{
			$sql_holiday="SELECT a.JoinDate holiday,b.UserName holi_type FROM year_planner a INNER JOIN holiday_info b ON a.SelectUserType=b.UserID WHERE a.JoinDate>='".$StartDate."' AND a.JoinDate<='".$EndDate."' ";
			$query_holiday = $this->db->query($sql_holiday);
			$fetch_holiday = $query_holiday->result_array();
			$i=$Startday[0];
			$UserID=$this->session->userdata('AttendanceSession');
			for($i;$i<=$Endday[0];$i++)
			{
				if($i<=9 && $i != 1)
				{
					$i="0".$i;	
				}
				$set_date=$i."-".$Startday[1]."-".$Startday[2];
				$set_date1=$Startday[2]."-".$Startday[1]."-".$i;
				//////////////////////////////////////////
				$WorkingTime="";
				$LogTime="";
				$holiday_status="";
				$fetch_login2['aaa']="";
				//////////////////////////////////////////
				foreach($fetch_holiday as $fetch_data)
				{
					if($set_date==$fetch_data['holiday'])
					{
						$holiday_status=$fetch_data['holi_type'];	
						$WorkingTime="--";
						$LogTime="--";
						$fetch_login2['aaa']="--";
					}
					else
					{
						//$holiday_status="--";
							
					}	
				}
				if($holiday_status=="")
				{
					$holiday_status="--";	
				}
				//////////////////////////////////////////
				$sql_login="SELECT ifnull(DATE_FORMAT(AttendanceDate,'%r'),'--') as  tam,count(*) as lnC FROM attendance WHERE DATE_FORMAT(AttendanceDate,'%Y-%m-%d')='".$set_date1."' AND UserID='".$UserID."' AND LoginPerDay='1'";
				$query_login = $this->db->query($sql_login);
				$fetch_login = $query_login->row_array(); 
				/////////////////////////////////////////////
				$sql_login1="SELECT count(*) cnt FROM attendance WHERE DATE_FORMAT(AttendanceDate,'%Y-%m-%d')='".$set_date1."' AND UserID='".$UserID."' and (LoginPerDay%2)='1'";
				$query_login1 = $this->db->query($sql_login1);
				$LogTime = $query_login1->row('cnt');
				if($LogTime==0)
				{
					$LogTime="--";
				}
				////////////////////////////////////////
				$sql_login2="SELECT ifnull(DATE_FORMAT(AttendanceDate,'%h'),0) as  aaa,count(*) as uuu FROM attendance WHERE 
DATE_FORMAT(AttendanceDate,'%Y-%m-%d')='".$set_date1."' AND UserID='".$UserID."' AND LoginPerDay='1' and DATE_FORMAT(AttendanceDate,'%h-%i')<='09-00'";
				$query_login2 = $this->db->query($sql_login2);
				$fetch_login2 = $query_login2->row_array();
				if($fetch_login2['aaa']>0)
				{
					$fetch_login2['aaa']="No-Late";	
				}
				else
				{
					$fetch_login2['aaa']="--";	
				}
				/////////////////////////////////////////
				$sql_logout="SELECT ifnull(DATE_FORMAT(AttendanceDate,'%r'),'--') as tpm,count(*) as loC FROM attendance WHERE 
DATE_FORMAT(AttendanceDate,'%Y-%m-%d')='".$set_date1."' AND UserID='".$UserID."' and LoginPerDay=(SELECT max(LoginPerDay) FROM attendance WHERE 
DATE_FORMAT(AttendanceDate,'%Y-%m-%d')='".$set_date1."' AND UserID='".$UserID."' )";
				$query_logout = $this->db->query($sql_logout);
				$fetch_logout = $query_logout->row_array();
				
				////////////////////////////////////////
				@$tab.=' <tr style="color:#428bca;">
              		<td>'.$i.'</td>
                    <td align="center">'.$set_date.'</td>
					<td align="center">'.$holiday_status.'</td> 
					<td align="center">'.$fetch_login['tam'].'</td>
					<td align="center">'.$fetch_logout['tpm'].'</td>
					<td align="center">'.$WorkingTime.'</td>
					<td align="center">'.$LogTime.'</td>
					<td align="center">'.$fetch_login2['aaa'].'</td>
				  </tr>';
			}
			//$sql="SELECT UserID,EmailAddress,Address,JoinDate FROM year_planner ORDER BY UserID DESC LIMIT 10";
			//$query = $this->db->query($sql);
			//$row['res'] = $query->result_array();
			//@$row['Msg']=$query>0 ? "Show data successfully..." : "Show data un-successfully...";
			return  @$tab;
		}
		/////////////////////////////////////////////////
	}
	/////////////////////////////////////////////////////
}


