<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Datewise_report extends CI_Controller 
{
	///////////////////////////////////////////////////	
	public function __construct()
	{
		parent::__construct();
		$this->load->helper("url");
		$this->load->helper("form");
		$this->load->model('datewise_report_model');
		$this->SessionCheck();
	}
	///////////////////////////////////////////////////
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
	////////////////////////////////////////////////////
	public function index()
	{
		//$data['STU']=$this->datewise_report_model->SelectUserType();
		$this->load->view('DateWiseReportView');
	}
	/////////////////////session unset//////////////////
	private function SessionCheck()
	{
		if(!$this->session->userdata('AttendanceSession'))	
		{
			redirect('attendance');	
		}
	}
	///////////////////////////////////////////////
	public function ButtonWork()
	{
		$data['btnShow'] =  $this->input->post('btnShow');
		if($data['btnShow'] == "Show")
		{
			$data['BtnValue']=$data['btnShow'];	
		}
		//$data['STU']=$this->datewise_report_model->SelectUserType();
		$data['Msg']=$this->datewise_report_model->ButtonWorkModel($data['BtnValue']);
		$this->load->view('DateWiseReportView',$data);
	}
	/////////////////////////////////////////////////

}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */