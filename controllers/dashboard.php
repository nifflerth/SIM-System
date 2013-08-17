<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function index(){
		$this->load->model("users_model");
		$this->load->model("add_model");
		/*$this->users_model->checkLogin();*/
		
		$data['path'] = 'null';
		$data['mlink'] = 'home';
		$data['slink'] = '';
		$module["module"] = $this->load->view("dashboard",$data);
	}
	
}

?>