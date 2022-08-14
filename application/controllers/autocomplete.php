<?php  if (!defined('BASEPATH')) exit('No direct script access allowed');

class Autocomplete extends CI_Controller { 
 
 public function __construct()  {
        parent:: __construct();
  $this->load->model("autocompleate_model");
  $this->load->helper("url");
  $this->load->helper('form');
    }
     
    public function index(){
       // $this->load->view('AttendanceView');
    }
    //////////////////////////////////////////////////////////////// 
    public function lookup(){
        // process posted form data
        $keyword = $this->input->post('term');//get value autocompleate textbox all-time
        $data['response'] = 'false'; //Set default response
        $query = $this->autocompleate_model->lookup($keyword); //Search DB
        if( ! empty($query) )
        {
            $data['response'] = 'true'; //Set response
            $data['message'] = array(); //Create array
            foreach( $query as $row )
            {
                $data['message'][] = array( 
                                        'id'=>$row->UserID,
                                        'value' => $row->UserName,
										'ImageName' => $row->ImageName
                                     );  //Add a row to array
            }
        }
		////////////////////////////////
        if('IS_AJAX')
        {
            echo json_encode($data); //echo json string if ajax request
             
        }
        else
        {
            $this->load->view('AttendanceView',$data); //Load html view of search results
        }
    }
	///////////////////////////////////////////////////////////////////
	public function CheckPass()
	{
		$pass = $_REQUEST['pass'];
		$id = $_REQUEST['Uid'];
		$user = $_REQUEST['Uname'];
		$data['message'] = array();
		@$query = $this->autocompleate_model->MCheckPass($id,$pass);

		print ($query);
	}
	////////////////////////////////////////////////////////////////////
	
}