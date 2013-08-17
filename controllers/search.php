<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search extends CI_Controller {

	/*public function index(){

		$module["module"] = $this->load->view("search");
	}*/
	function student_id(){
		$this->load->view('studentid');
	}
	function class_room(){
		$this->load->view('classroom');
	}
	
}

?>