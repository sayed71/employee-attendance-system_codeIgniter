<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
/////////////////////////////////////////////////////////////
class UserAdmin extends CI_Controller 
{
	//////////////////////////////////////////////////
	public function __construct()
	{
		parent::__construct();
		$this->load->model('attendance_model');
		$this->load->helper("url");
		$this->load->helper("form");
		$this->SessionCheck();
	}
	///////////////////////////////////////////////////
	public function index()
	{
		$this->load->view('UserDetailsView');
	}	
	/////////////////////Welcome Page//////////////////////
	public function Welcome()
	{
		$this->load->view('WelcomeView');	
	}
	/////////////////////session unset/////////////////////
	private function SessionCheck()
	{
		if(!$this->session->userdata('AttendanceSession'))	
		{
			redirect('attendance');	
		}
	}
	///////////////////////////////////////////////////////
	public function PersonalInfo()
	{
		$data['PerData']=$this->attendance_model->set_personal_info();
		$this->load->view('Personal_info_view',$data);	
	}
	///////////////////////////////////////////////////////
	public function ChangePassword()
	{
		$data['Pass']=$this->attendance_model->change_pass_info();
		$this->load->view('Password_change_view',$data);	
	}
	///////////////////////////////////////////////////////

}
/////////////////////////////////////////////////////////////////////////

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */