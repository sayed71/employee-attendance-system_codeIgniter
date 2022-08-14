<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/////////////////////////////////////////////////////////////
class Attendance extends CI_Controller 
{
	//////////////////////////////////////////////////
	public function __construct()
	{
		parent::__construct();
		$this->load->model('attendance_model');
		$this->load->helper("url");
		$this->load->helper("form");
		//$this->SessionCheck();
	}
	///////////////////////////////////////////////////
	public function index()
	{
		$data['Msg']="Welcome to attendance information";
		$this->load->view('AttendanceView',$data);
	}
	///////////////////////////////////////////////////
	public function create()
	{
		$data['btnAdd'] =  $this->input->post('btnAdd');
		if($data['btnAdd'] == "Add")
		{
			$data['BtnValue']=$data['btnAdd'];
		}
		$this->load->library('form_validation');
		$this->form_validation->set_rules('txtUserName', 'User ID', 'required');
		$this->form_validation->set_rules('txtPassword', 'Password', 'required');
		if ($this->form_validation->run() === FALSE)
		{
			$data['Msg']="Welcome to attendance information";
			$this->load->view('AttendanceView', $data);
		}
		else
		{
			if($this->input->post('btnAdd'))
			{
				$Result=$this->attendance_model->set_attendance();
				if($Result=="Login" || $Result=="Logout")
				{
					$data['Msg']=$Result." Successfully";
					$this->load->view('AttendanceView',$data);
				}
				else
				{
					$data['Msg']="Your user & password is wrong";
					$this->load->view('AttendanceView',$data);	
				}
			}
			else if($this->input->post('btnReport'))
			{
				$Result=$this->attendance_model->set_report();
				if($Result==1)
				{
					////////////////////session set//////////////
					$data=array('AttendanceSession'=>$this->input->post('hdnUserID'));
					$this->session->set_userdata($data);
					/////////////////////////////////////////////
					$data['UserName'] = $this->input->post('txtUserName');
					$data['LoginStatus']="Login";
					$this->load->view('UserDetailsView',$data);
				}
				else
				{
					$data['Msg']="Your user & password is wrong";
					$this->load->view('AttendanceView',$data);	
				}
			}
		}
	}
	/////////////////////Welcome Page//////////////////////
	public function Welcome()
	{
		$this->load->view('WelcomeView');	
	}
	/////////////////////session unset/////////////////////
	/*private function SessionCheck()
	{
		if(!$this->session->userdata('AttendanceSession'))	
		{
			//redirect('attendance');	
		}
	}*/
	///////////////////////////////////////////////////////
	/*public function PersonalInfo()
	{
		$data['PerData']=$this->attendance_model->set_personal_info();
		$this->load->view('Personal_info_view',$data);	
	}*/
	///////////////////////////////////////////////////////
	/*public function ChangePassword()
	{
		$data['Pass']=$this->attendance_model->change_pass_info();
		$this->load->view('Password_change_view',$data);	
	}*/
	///////////////////////////////////////////////////////

}
/////////////////////////////////////////////////////////////////////////

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */