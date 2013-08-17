<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add extends CI_Controller {

	public function index(){
		$this->load->helper('form');  
		$this->load->model("add_model");	
		echo '1';
		if($this->input->post('submit')){
			echo '2';
			
        	$this->add_model->entry_insert();
    	}
   		$data = $this->add_model->general();
		$module["module"] = $this->load->view("add",$data);
				
	}
	
	function save(){
		$this->load->model("add_model");
		if($this->input->post('submit')){
			
        	$this->add_model->entry_insert();
    	}
	}

}
?>