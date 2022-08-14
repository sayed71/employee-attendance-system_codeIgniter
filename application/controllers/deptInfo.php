<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class DeptInfo extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->helper("form");
		$this->load->model('dept_info_model');
		$this->SessionCheck();
	}

	/**
	 * Index Page for this controller.
	 *
	 * Maps to the following URL
	 * 		http://example.com/index.php/welcome
	 *	- or -  
	 * 		http://example.com/index.php/welcome/index
	 *	- or -
	 * Since this controller is set as the default controller in 
	 * config/routes.php, it's displayed at http://example.com/
	 *
	 * So any other public methods not prefixed with an underscore will
	 * map to /index.php/welcome/<method_name>
	 * @see http://codeigniter.com/user_guide/general/urls.html
	 */
	public function index()
	{
		$data['Msg']=$this->dept_info_model->First_data();
		$this->load->view('DeptInfoView',$data);
	}
	/////////////////////session unset//////////////////
	private function SessionCheck()
	{
		if(!$this->session->userdata('UserName'))	
		{
			redirect('login');	
		}
	}
	///////////////////////////////////////////////
	public function ButtonWork()
	{
		/*$this->load->library('form_validation');
		$this->form_validation->set_rules('txtUserName', 'User Name', 'required');
		$this->form_validation->set_rules('txtPassword', 'Password', 'required');
		$this->form_validation->set_rules('txtConfirmPassword', 'Confirm Password', 'required');
		$this->form_validation->set_rules('txtContactNumber', 'Contact Number', 'required');
		/////////////////////////////////////////////////
		if ($this->form_validation->run() === FALSE)
		{
			$data['BtnValue']="FALSE";
			$this->load->view('userInfoView', $data);
		}
		else
		{*/
			$data['btnAdd'] =  $this->input->post('btnAdd');
			if($data['btnAdd'] == "Add")
			{
				$data['BtnValue']=$data['btnAdd'];
			}
			$data['btnEdit'] =  $this->input->post('btnEdit');
			if($data['btnEdit'] == "Edit")
			{
				$data['BtnValue']=$data['btnEdit'];	
			}
			$data['btnDelete'] =  $this->input->post('btnDelete');
			if($data['btnDelete'] == "Delete")
			{
				$data['BtnValue']=$data['btnDelete'];	
			}
			$data['btnFirst'] =  $this->input->post('btnFirst');
			if($data['btnFirst'] == "First")
			{
				$data['BtnValue']=$data['btnFirst'];	
			}
			$data['btnPrevious'] =  $this->input->post('btnPrevious');
			if($data['btnPrevious'] == "Previous")
			{
				$data['BtnValue']=$data['btnPrevious'];	
			}
			$data['btnNext'] =  $this->input->post('btnNext');
			if($data['btnNext'] == "Next")
			{
				$data['BtnValue']=$data['btnNext'];	
			}
			$data['btnLast'] =  $this->input->post('btnLast');
			if($data['btnLast'] == "Last")
			{
				$data['BtnValue']=$data['btnLast'];	
			}
			$data['btnShow'] =  $this->input->post('btnShow');
			if($data['btnShow'] == "Show")
			{
				$data['BtnValue']=$data['btnShow'];	
			}
			
			$data['Msg']=$this->dept_info_model->ButtonWorkModel($data['BtnValue']);
			$this->load->view('DeptInfoView',$data);
		//}
	}
	/////////////////////////////////////////////////
	
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */