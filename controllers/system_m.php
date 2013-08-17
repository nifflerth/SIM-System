<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class System_m extends CI_Controller {

	function change_password($code=''){
	
		$this->load->model("system_m_model");
		$this->load->helper('form');	
		$data = $this->system_m_model->general();
		$data['match'] = '';
		if($code == 'err'){
			$data['match'] = 'err';
		}elseif($code == 'succeed'){
			$data['match'] = 'succeed';
		}
		$data['path'] = array( 	array('page'=>'Change Password','path'=>'/system_m/change_password'));
		$data['mlink'] = 'system';
		$data['slink'] = 'change_password';
		$this->load->view("change_pass", $data);
	
	}
	
	function edit_pass(){
		$this->load->model("system_m_model");
		if($this->input->post('submit')){	
			$data = $this->system_m_model->change_pass();
		
			if($data == 'changed'){
				redirect('index.php/system_m/change_password/succeed');
	
			
			}elseif($data == 'invalid'){
			
				redirect('index.php/system_m/change_password/err');
	
			}
		}else{		
			redirect('index.php/dashboard');
		}
	}
	
	function list_user(){
		$this->load->model("system_m_model");	
		$data = $this->system_m_model->get_all();
		$data['path'] = array( 	array('page'=>'List User','path'=>'/system_m/list_user'));
		$data['mlink'] = 'system';
		$data['slink'] = 'list_user';
		$this->load->view("listuser", $data);
	}
	
	function edituser($user_id=0,$code=''){
	
		$this->load->model("system_m_model");
		$this->load->helper('form');
		$query = $this->system_m_model->get_user($user_id);
		$data = $this->system_m_model->general();
		if(! empty($query) ){
			$data['levellist'] = $this->system_m_model->get_level();
			$data['status'] 		= $query['status'];
			$data['username'] 		= $query['ACCOUNT_USERNAME'];
			$data['level'] 			= $query['ACCOUNT_LEVEL'];
			$data['userid'] 		= $user_id;
			$data['teachersname'] 	= $query['teacher_name'];
			$data['teachername'] 	= $query['teacher_surname'];
			$data['teacherid'] 		= $query['TEACHER_ID'];
			$data['match'] = '';
			if($code == 'err'){
				$data['match'] = 'err';
			}elseif($code == 'succeed'){
				$data['match'] = 'succeed';
			}
			$data['path'] = array( 	array('page'=>'List User','path'=>'/system_m/list_user'),
									array('page'=>'Edit User','path'=>'/system_m/list_user/#'));
			$data['mlink'] = 'system';
			$data['slink'] = 'list_user';
			$this->load->view("edit_user",$data);
		}else{
			redirect('index.php/dashboard');
		}
	
	}
	
	function edit_input(){
		$this->load->model("system_m_model");
		if($this->input->post('submit')){	

			$data = $this->system_m_model->update_user();
		
			if($data == 'changed'){
				redirect('index.php/system_m/edituser/'.$this->input->post('userid').'/succeed');
			}elseif($data == 'invalid'){
				redirect('index.php/system_m/edituser/'.$this->input->post('userid').'/err');
			}
		}else{
			redirect('index.php/dashboard');
		}
	}
	
	function create_user($code=''){
	
		$this->load->model("system_m_model");
		$this->load->helper('form');	
		$data = $this->system_m_model->general();
		$data['level'] = $this->system_m_model->get_level();
		if($code <> ''){
			$data['exist'] = 'Username "'.$code.'" already exist.';
		}else{
			$data['exist'] = '';
		}
		$data['path'] = array( 	array('page'=>'Create User','path'=>'/system_m/create_user'));
		$data['mlink'] = 'system';
		$data['slink'] = 'create_user';
		$this->load->view("create_user", $data);

	}
	
	function acc_input(){
		$this->load->helper('url');
		$this->load->library('encrypt');
		$this->load->model("system_m_model");
		
		if($this->input->post('submit')){	
        	$id = $this->system_m_model->entry_insert();
        	if ($id <> 0){
        		redirect('index.php/system_m/viewuser/'.$id);
        	}else{
        		redirect('index.php/system_m/create_user/'.$id);
        	}
       	}else{
       		redirect('index.php/dashboard');
       	}
	
	}
}

?>