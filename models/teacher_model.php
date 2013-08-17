<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Teacher_model extends CI_Model {

  /*function Student_model(){
    parent::Model();
    $this->load->helper('url');               
  }*/
	function __constuctor(){
  		parent::__construct();
  	}
  	
  	function general(){
  		$data['l_name_t']     	= 'Name :';
	    $data['l_sname_t']     	= 'Surname :';
	    $data['l_prefix_t']    	= 'Prefix :';
	    $data['l_gender_t']    	= 'Gender :';
	    $data['l_status_t']    	= 'Status :';
  		$data['formattr']       = array('class' => 'form-horizontal');
  		return $data;   
	}
  	
	function entry_insert(){
		if(	$this->input->post('inputname_t') <> '' and 
			$this->input->post('inputsname_t')<> '' and 
			$this->input->post('selectprefix_t') <> ''){
			$this->load->database();
			if($this->input->post('selectprefix_t') == 3){
				$gender = 1;
			}else{
				$gender = 2;
			}
	       	$dataTeacher = array(
	              			'teacher_name'=>$this->input->post('inputname_t'),
	              			'teacher_surname'=>$this->input->post('inputsname_t'),
	              			'status'=>'1',
	              			'prefix_id'=>$this->input->post('selectprefix_t'),
	              			'gender'=>$gender           			
	            			);
	            			
	    	$this->db->insert('teachers',$dataTeacher);
	
	    	return $this->db->insert_id();    	
	    }else{
	    	return 'err';
	    }
	}
	
  	function get_teacher($id){
	  	$this->load->database();
	  	$sql = "SELECT * 
	  			FROM teachers LEFT OUTER JOIN prefix
	  			ON teachers.prefix_id = prefix.prefix_id
	  			WHERE teachers.teacher_id = ?"; 
	
		$query = $this->db->query($sql, array($id));
		/*$query = $this->db->get_where('subjects',array('subject_id'=>$id));*/
		return $query->row_array();
  	}
  	
  	function get_all(){
		$this->load->database();
		$sql = "SELECT * 
				FROM teachers LEFT OUTER JOIN prefix 
				ON teachers.prefix_id = prefix.prefix_id"; 
		$data["subject"] = $this->db->query($sql)->result();
		return $data;
	}

  	function update_teacher(){
		if ($this->input->post('teacherid') <> ''){
			if($this->input->post('inputprefix') == 3){
				$gender_id = 1;
			}else{
				$gender_id = 2;
			}
			$dataTeacher = array(
		  						'teacher_name'=>$this->input->post('inputname'),
		  						'teacher_surname'=>$this->input->post('inputsname'),
		  						'prefix_id'=>$this->input->post('inputprefix'),
		  						'gender'=>$gender_id,
		  						'status'=>$this->input->post('selectstatus')
		            			);	
		
			$this->db->where('teacher_id', $this->input->post('teacherid'));
			$this->db->update('teachers', $dataTeacher);
			return 'changed';
		}else{
			return 'invalid';
		}
	
	}
}
?>