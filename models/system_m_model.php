<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class System_m_model extends CI_Model {

	/*function Student_model(){
	parent::Model();
	$this->load->helper('url');               
	}*/
	function __constuctor(){
		parent::__construct();
	}
	
	function general(){
		$data['l_userid'] 		= 'User ID :';
		$data['l_resetpass'] 	= 'Reset password :';
		$data['l_username'] 	= 'Username :';
		$data['l_password'] 	= 'Password :';
		$data['l_passre'] 		= 'Confirmed password :';
		$data['l_level']		= 'Level :';
		$data['l_teacherid']	= 'Teacher ID :';
		$data['l_status'] 		= 'Account status :';
   		$data['formattr']   	= array('class' => 'form-horizontal');
    	return $data;   
  	}
  	
  	function entry_insert(){
		$this->load->database();
	  	$query = $this->db->query("SELECT * FROM accounts WHERE ACCOUNT_USERNAME ='".$this->input->post('inputusername')."'");
	  	if ($query->num_rows() == 0){
	  		$password = md5($this->input->post('inputpass'));
		  	$dataAccount = array(
		  						'ACCOUNT_USERNAME'=>$this->input->post('inputusername'),
		  						'ACCOUNT_PASSWORD'=>$password,
		              			'ACCOUNT_LEVEL'=>$this->input->post('inputlevel'),
		              			'TEACHER_ID'=>$this->input->post('inputteacherid'),
		              			'status'=>'1'
		            			);
		   	$this->db->insert('accounts',$dataAccount);
		   	return $this->db->insert_id();
	   	}else{
	   		return $this->input->post('inputusername');
	   	}  	
  	}
  	
  	function get_all(){
	  	$this->load->database();
	  	$sql = "SELECT * 
	  			FROM accounts 	LEFT OUTER JOIN teachers 
	  				ON accounts.teacher_id = teachers.teacher_id
	  							LEFT OUTER JOIN account_level
	  				ON accounts.ACCOUNT_LEVEL = account_level.level_no
	  			";
  		$data["user"] = $this->db->query($sql)->result();
  		return $data;
  	}
  	
  	function get_user($id){
  		$sql = "SELECT * 
  				FROM accounts 	LEFT OUTER JOIN teachers 
	  				ON accounts.teacher_id = teachers.teacher_id
  				WHERE accounts.ACCOUNT_ID = ?"; 

		$query = $this->db->query($sql, array($id));
		/*$query = $this->db->get_where('subjects',array('subject_id'=>$id));*/
		return $query->row_array();
  	}
  	
  	function get_level(){
  		return $this->db->get('account_level')->result(); 
  	}
  	
	function change_pass(){
		$session_data = $this->session->userdata('logged_in');
     	$user_id = $session_data['account_id'];
	
		if(($this->input->post('inputpass') == $this->input->post('inputrepass')) and $this->input->post('inputpass') <> ''){
			$password = md5($this->input->post('inputpass'));
			$dataAccount = array(
		  						'ACCOUNT_PASSWORD'=>$password
		            			);
			$this->db->where('ACCOUNT_ID', $user_id);
			$this->db->update('accounts', $dataAccount);
			return 'changed';
		}else{
			return 'invalid';	
		}
	}
	
	function update_user(){
		if ($this->input->post('userid') <> ''){
			if($this->input->post('checkresetpass') == 'resetpass'){
				$password = md5('initial');
				$dataAccount = array(
			  						'ACCOUNT_PASSWORD'=>$password,
			  						'ACCOUNT_LEVEL'=>$this->input->post('inputlevel')
			            			);	
			}else{
				$dataAccount = array(
			  						'ACCOUNT_LEVEL'=>$this->input->post('inputlevel')
			            			);
			}
			$this->db->where('ACCOUNT_ID', $this->input->post('userid'));
			$this->db->update('accounts', $dataAccount);
			return 'changed';
		}else{
			return 'invalid';
		}

	}
  
}