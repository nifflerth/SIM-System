<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subject_model extends CI_Model {

  /*function Student_model(){
    parent::Model();
    $this->load->helper('url');               
  }*/
	function __constuctor(){
		parent::__construct();
	}
	
	function general(){
	
		$data['l_name']   	= 'Subject Name :';
		$data['l_acname']   = 'Activity Name :';
		$data['l_acclass']  = 'Activity class :';
		$data['l_hour']   	= 'Hour :';
		$data['l_desc']		= 'Description :';
		$data['l_credit']  	= 'Credits :';
		$data['l_code']  	= 'Subject code :';
		$data['l_type']		= 'Subject type :';
		$data['l_grp']		= 'Subject group :';
		$data['l_subclass']	= 'Subject class :';
		$data['l_status']	= 'Status :';
		$data['formattr']   = array('class' => 'form-horizontal');
		$data["subjectgroup"] 	= $this->db->get('subjectgroup')->result(); 
		$data["subjecttype"] 	= $this->db->get('subjecttype')->result(); 
		$data["subjectclass"] 	= $this->db->get('subjectclass')->result(); 
		return $data;   
	}
	
	function entry_insert(){
		$this->load->database();
		$query = $this->db->query("SELECT * FROM subjects WHERE subject_code ='".$this->input->post('inputcode')."'");
		if ($query->num_rows() == 0){
	  	$dataSubject = array(
	  						'subject_code'=>$this->input->post('inputcode'),
	  						'subject_group'=>$this->input->post('inputgroup'),
	  						'subject_type'=>$this->input->post('inputtype'),
	              			'subject_name'=>$this->input->post('inputname'),
	              			'credit'=>$this->input->post('inputcredit'),
	              			'description'=>$this->input->post('inputdesc'),
	              			'status'=>'1'
	            			);
	   	$this->db->insert('subjects',$dataSubject);
	   	return $this->db->insert_id();
		}else{
			return $this->input->post('inputcode');
		}
	}
	
	function entry_insertac(){
		$this->load->database();
		if($this->input->post('inputclass')){
			$class = $this->input->post('inputclass');
			$type = 0;
		}else{
			$class = 0;
			$type = 1;
		}
	  	$dataActivity = array(
	  						'activity_type'=>$type,
	  						'activity_class'=>$class,
	  						'activity_name'=>$this->input->post('inputname'),
	  						'hour'=>$this->input->post('inputhour'),
	              			'status'=>'1'
	            			);
	   	$this->db->insert('activities',$dataActivity);
	   	return $this->db->insert_id();
		
	}
	
	function get_subject($id){
		$this->load->database();
		$sql = "SELECT * 
				FROM subjects 	LEFT OUTER JOIN subjectgroup 
					ON subjects.subject_group = subjectgroup.group_id
								LEFT OUTER JOIN subjecttype
					ON subjects.subject_type = subjecttype.subject_type
								LEFT OUTER JOIN subjectclass
					ON subjects.subject_class = subjectclass.class_id
				WHERE subjects.subject_id = ?"; 
	
		$query = $this->db->query($sql, array($id));
		/*$query = $this->db->get_where('subjects',array('subject_id'=>$id));*/
		return $query->row_array();
	}
	
	function get_activity($id){
		$this->load->database();
		$sql = "SELECT * 
				FROM activities
				WHERE activities.activity_id = ?"; 
	
		$query = $this->db->query($sql, array($id));
		/*$query = $this->db->get_where('subjects',array('subject_id'=>$id));*/
		return $query->row_array();
	}

	function get_all(){
		$this->load->database();
		$sql = "SELECT * 
				FROM subjects 	LEFT OUTER JOIN subjectgroup 
					ON subjects.subject_group = subjectgroup.group_id
								LEFT OUTER JOIN subjecttype
					ON subjects.subject_type = subjecttype.subject_type
								LEFT OUTER JOIN subjectclass
					ON subjects.subject_class = subjectclass.class_id"; 
		$data["subject"] = $this->db->query($sql)->result();
		return $data;
	}
	
  	function get_ac_all($type){
		$this->load->database();
		$sql = "SELECT * 
				FROM activities 	LEFT OUTER JOIN subjectclass
					ON activities.activity_class = subjectclass.class_id
				WHERE activity_type = ?"; 
		$data["activity"] = $this->db->query($sql, array($type))->result();
		return $data;
	}
	
	function update_subject(){
		if ($this->input->post('subjectid') <> ''){
			$dataSubject = array(
		  						'subject_group'=>$this->input->post('inputgroup'),
		  						'subject_type'=>$this->input->post('inputtype'),
		  						'description'=>$this->input->post('inputdesc'),
		  						'status'=>$this->input->post('selectstatus')
		            			);	
		
			$this->db->where('subject_id', $this->input->post('subjectid'));
			$this->db->update('subjects', $dataSubject);
			return 'changed';
		}else{
			return 'invalid';
		}
	}
	
	function update_activity(){
		if ($this->input->post('activityid') <> ''){
			$dataActivity = array(
		  						'hour'=>$this->input->post('inputhour'),
		  						'status'=>$this->input->post('selectstatus')
		            			);	
		
			$this->db->where('activity_id', $this->input->post('activityid'));
			$this->db->update('activities', $dataActivity);
			return 'changed';
		}else{
			return 'invalid';
		}
	}
}
?>