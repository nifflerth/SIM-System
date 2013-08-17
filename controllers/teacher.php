<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class teacher extends CI_Controller {

	function create($code = ''){
		$this->load->helper('form');  
		$this->load->model("teacher_model");
		$data = $this->teacher_model->general();
		$data['path'] = array( 	array('page'=>'Create Teacher','path'=>'/teacher/create'));
		$data['mlink'] = 'teacher';
		$data['slink'] = 'create_teacher';
		if($code == 'err'){
			$data['code'] = 'err';
		}else{
			$data['code'] = '';
		}
		$this->load->view('add_teacher',$data);
	}
	
	function input(){
		$this->load->model("teacher_model");
		if($this->input->post('submit')){	
        	$id = $this->teacher_model->entry_insert();
        	if($id == 'err'){
        		redirect('index.php/teacher/create/err');
        	}else{
        		redirect('index.php/teacher/view/'.$id.'/create');
        	}
       	}
	}
	
	function view($teacherid=0,$code=''){
		$this->load->model("teacher_model");
		$this->load->helper('form'); 
		if((int)$teacherid > 0){	
			$id = (int)$teacherid;
			$query = $this->teacher_model->get_teacher($id);
			$data = $this->teacher_model->general();
			if(! empty($query) ){
				$data['id'] = $teacherid;
				$data['name_t']   	= $query['teacher_name'];
		    	$data['sname_t']   	= $query['teacher_surname'];
		    	$data['prefix_t'] 	= $query['name_full'];
				$data['status_t']	= $query['status'];	
				switch ($query['gender']) {
	    			case 1:
	        			$data['gender_t'] = 'Male';
	        			break;
	    			case 2:
	        			$data['gender_t'] = 'Female';
	        			break;
	   			}
	   			
	   			if($code == 'create'){
	   				$data['code'] = 'create';
	   			}else{
	   				$data['code'] = '';
	   			}
	   			
	   			$data['path'] = array( 	array('page'=>'List Teacher','path'=>'/teacher/list_teacher'),
	   									array('page'=>'View Teacher','path'=>'/teacher/list_teacher/#'));
				$data['mlink'] = 'teacher';
				$data['slink'] = 'list_teacher';
				$this->load->view("viewteacher",$data);
			}else{
				redirect('index.php/dashboard');
			}
		}
	}
	
	
	
	function edit($teacherid=0,$code=''){
		$this->load->model("teacher_model");
		$this->load->helper('form');
		$query = $this->teacher_model->get_teacher($teacherid);
		$data = $this->teacher_model->general();
		if(! empty($query) ){
			$data['id'] = $teacherid;
			$data['name_t']   	= $query['teacher_name'];
	    	$data['sname_t']   	= $query['teacher_surname'];
	    	$data['prefix_t'] 	= $query['prefix_id'];
			$data['status_t']	= $query['status'];	
			
			switch ($query['gender']) {
    			case 1:
        			$data['gender_t'] = 'Male';
        			break;
    			case 2:
        			$data['gender_t'] = 'Female';
        			break;
   			}
			$data['match'] 	= '';
			if($code == 'err'){
				$data['match'] = 'err';
			}elseif($code == 'succeed'){
				$data['match'] = 'succeed';
			}
			$data['path'] = array( 	array('page'=>'List Teacher','path'=>'/teacher/list_teacher'),
									array('page'=>'Edit Teacher','path'=>'/teacher/list_teacher/#'));
			$data['mlink'] = 'teacher';
			$data['slink'] = 'list_teacher';
			
			$this->load->view("edit_teacher",$data);
		}else{
			redirect('index.php/dashboard');
		}
	}
	
	
	function list_teacher(){
		$this->load->model("teacher_model");	
		$data = $this->teacher_model->get_all();
		$data['path'] = array( 	array('page'=>'List Teacher','path'=>'/teacher/list_teacher'));
		$data['mlink'] = 'teacher';
		$data['slink'] = 'list_teacher';
		$this->load->view("listteacher", $data);
	}
	
	function edit_input(){
		$this->load->model("teacher_model");
		if($this->input->post('submit')){	

			$data = $this->teacher_model->update_teacher();
		
			if($data == 'changed'){
				redirect('index.php/teacher/edit/'.$this->input->post('teacherid').'/succeed');
	
			
			}elseif($data == 'invalid'){
			
				redirect('index.php/teacher/edit/'.$this->input->post('teacherid').'/err');
	
			}
		}else{
			redirect('index.php/dashboard');

		}
	}
}
?>