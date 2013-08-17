<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Student_model extends CI_Model {

  /*function Student_model(){
    parent::Model();
    $this->load->helper('url');               
  }*/
	function __constuctor(){
  		parent::__construct();
  	}
  	
  	function general(){
		$data['l_code_s']   	= 'Student ID :';
	    $data['l_fname_g']   	= 'Father\'s name :';
	    $data['l_fsurname_g']	= 'Father\'s surname :';
	    $data['l_mname_g']   	= 'Mother\'s name :';
	    $data['l_msurname_g']	= 'Mother\'s surname :';
	    $data['l_address_g']  	= 'Address :';
		$data['l_name_s']     	= 'Name :';
	    $data['l_sname_s']     	= 'Surname :';
	    $data['l_prefix_s']    	= 'Prefix :';
	    $data['l_inputidno_s']  = 'Identification number :';
	    $data['l_dob_s']     	= 'Date of birth :';
	    $data['l_nat_s']     	= 'Nationality :';
	    $data['l_rel_s']     	= 'Religious :';
	    $data['l_enroll_s']     = 'Enroll date :';
	    $data['l_lstschool_s']  = 'Last school :';
	    $data['l_province_s']   = 'Province :';
	    $data['l_gender_s']   	= 'Gender :';
	    $data['l_room_s']   	= 'Room :';
	    $data['l_class_s']   	= 'Class :';
	    
		$data["nationality"] 	= $this->db->get('nationality')->result(); 
		$data["religious"] 		= $this->db->get('religious')->result(); 
		$data["provinces"] 		= $this->db->get('provinces')->result();
		$data['formattr']       = array('class' => 'form-horizontal');
	    return $data;   
	 }
	 
	function entry_insert(){
		date_default_timezone_set('UTC');
		$this->load->database();
		$currentyr = date('y');
		$classid = $currentyr.$this->input->post('selectclass_s').$this->input->post('selectroom_s');
		
		$course = $this->db->query("SELECT * FROM courses WHERE class_id ='".$classid."'");
		if ($course->num_rows() > 0){
		
	    	
	    	$query = $this->db->get_where('running_number',array('data'=>'student_id'));
	    	$student_id =  $query->row_array();
	    	$year = $student_id['year'];
	    	
	    	if ( $year < $currentyr ){
	    		$student_id['number'] = 0;
	    		$student_id['year'] = $currentyr;
	    	}
	    	
	    	$student_number = $student_id['number'];
	    	$student_number = (int)$student_number + 1;
	    	$student_id['number'] = $student_number;
	    	$student_number = '0000'.$student_number;
	    	$student_number = substr($student_number, strlen($student_number)-4,4);
	    	$student = $currentyr.$student_number;
	
	       	$dataGuardian = array(
	              			'guardian_fname'=>$this->input->post('inputfname_g'),
	              			'guardian_fsurname'=>$this->input->post('inputfsname_g'),
	              			'guardian_mname'=>$this->input->post('inputmname_g'),
	              			'guardian_msurname'=>$this->input->post('inputmsname_g'),
	              			'address'=>$this->input->post('inputaddr_g')              			
	            			);
	    	$this->db->insert('guardians',$dataGuardian);
	  
	  		if($this->input->post('selectprefix_s') == 1 or $this->input->post('selectprefix_s') == 3){
	  			$gender = 1;
	  		}elseif($this->input->post('selectprefix_s') == 2 or $this->input->post('selectprefix_s') == 4){
	  			$gender = 2;
	  		}
	  		
	    	$dataStudent = array(
	    					'student_id'=>$student,
	              			'guardian_id'=>$this->db->insert_id(),
	              			'prefix_id'=>$this->input->post('selectprefix_s'),
	              			'student_name'=>$this->input->post('inputname_s'),
	              			'student_surname'=>$this->input->post('inputsname_s'),
	              			'student_idcard'=>$this->input->post('inputidno_s'),
	              			'student_dob'=>date('Y-m-d',strtotime($this->input->post('inputdob_s'))),
	              			'gender'=>$gender,
	              			'nationality_id'=>$this->input->post('selectnat_s'),
	              			'religious_id'=>$this->input->post('selectrel_s'),
	              			'firstenroll_date'=>date('Y-m-d',strtotime($this->input->post('inputfenroll_s'))),
	              			'last_school'=>$this->input->post('inputlstschool_s'),
	              			'province_id'=>$this->input->post('selectprovince_s'),
	              			'status'=>'1'
	    					);
	    	$this->db->insert('students',$dataStudent);
	
	    	$this->db->where('data','student_id');
	    	$this->db->update('running_number', $student_id);
	    	
	    	$dataStudent = array(
	    					'class_id'=>$classid,
	    					'part'=>1,
	    					'student_id'=>$student
	    				   );
	    	$this->db->insert('student_study',$dataStudent);
	    	
	    	$dataStudent = array(
	    					'class_id'=>$classid,
	    					'part'=>2,
	    					'student_id'=>$student
	    				   );
	    	$this->db->insert('student_study',$dataStudent);
	    		
	    	return $student;
    	}else{
    		return 'class';
    	}
	    	
	}
	
	function get_student($id){
  		$this->load->database();
	  	$sql = "SELECT * 
	  			FROM students LEFT OUTER JOIN guardians 
	  				ON students.guardian_id = guardians.guardian_id
	  				LEFT OUTER JOIN nationality
	  				ON students.nationality_id = nationality.NATIONALITY_ID
	  				LEFT OUTER JOIN religious
	  				ON students.religious_id = religious.RELIGIOUS_ID
	  				LEFT OUTER JOIN provinces
	  				ON students.province_id = provinces.province_id
	  			WHERE students.student_id = ?"; 
	
		$query = $this->db->query($sql, array($id));
		return $query->row_array();
  	}
  	
	function get_all(){
		$this->load->database();
		$sql = "SELECT * 
	  			FROM students LEFT OUTER JOIN guardians 
	  				ON students.guardian_id = guardians.guardian_id
	  				LEFT OUTER JOIN nationality
	  				ON students.nationality_id = nationality.NATIONALITY_ID
	  				LEFT OUTER JOIN religious
	  				ON students.religious_id = religious.RELIGIOUS_ID
	  				LEFT OUTER JOIN provinces
	  				ON students.province_id = provinces.province_id
	  				LEFT OUTER JOIN status
	  				ON students.status = status.status_id
	  				LEFT OUTER JOIN prefix
	  				ON students.prefix_id = prefix.prefix_id";  
		$data["student"] = $this->db->query($sql)->result();
		return $data;
	}

}
?>