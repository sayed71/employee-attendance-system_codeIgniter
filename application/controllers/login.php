<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Login extends CI_Controller {
	
	public function __construct()
	{
		parent::__construct();
		$this->load->model('login_model');
		$this->load->helper("url");
		$this->load->helper("form");
		//$this->output->enable_profiler(true);
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
		$this->load->view('LoginView');
	}
	////////////////////////////////////////////////
	public function CheckAdmin()
	{
		$this->load->library('form_validation');
		
		$this->form_validation->set_rules('txtUser', 'User Name', 'required');
		$this->form_validation->set_rules('txtPassword', 'Password', 'required');
	
		if ($this->form_validation->run() === FALSE)
		{
			$data['Msg']="Welcome to login information";
			$this->load->view('LoginView', $data);
		}
		else
		{
			$Result=$this->login_model->check_admin();
			if($Result==1)
			{
				////////////////////session set/////////////////////////
				$data=array('UserName'=>$this->input->post('txtUser'));
				$this->session->set_userdata($data);
				/////////////////////////////////////////////
				redirect('admin');
			}
			else
			{
				$data['Msg']="Login un-successfully...";
				redirect('login',$data);
				
			}
		}	
	}
	///////////////////////////////////////////////
	public function do_logout()
	{
		$this->session->sess_destroy();
		redirect('login');	
	}
}

/* End of file welcome.php */
/* Location: ./application/controllers/welcome.php */