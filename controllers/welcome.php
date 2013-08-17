<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	/*public function index(){
		if(isset($_POST["submit"])){
			$username = $this->input->post("username");
			$password = $this->input->post("password");
			
			if(!empty($username) && !empty($password)){
				
				$sql = "SELECT 	account_id,account_username,account_level,teacher_id
					FROM 	accounts
					WHERE 	account_username = '$username'
					AND account_password = md5('$password')";
					
				$query = $this->db->query($sql);
				if($query->num_rows() > 0){
					$row = $query->row_array();
					
					$this->session->set_userdata('ac_user_id',$row["account_id"]);
					$this->session->set_userdata('ac_username',$row["account_username"]);
					$this->session->set_userdata('ac_role',$row["account_level"]);

					}
			}
		}
		$data = NULL;
		$module["module"] = $this->load->view("dashboard",$data,true);
		$this->load->view('template',$module);
		
		
	}*/

	public function __construct(){
		parent::__construct();
	}

	public function index(){
		$this->load->helper(array('form'));
		$this->load->view('template');
	}

/*	public function logout(){
		$this->session->unset_userdata('ac_user_id');
		$this->session->unset_userdata('ac_username');
		$this->session->unset_userdata('ac_role');
				
				
		$this->index();
	}*/
}

?>