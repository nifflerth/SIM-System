<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Add_model extends CI_Model {
	
    var $id;
    var $fName;
    var $sName;
	var $id_card;
    var $id_student;
    var $dob;
    var $gender;
    var $family_id;
    var $nationality;
    var $religious;
    var $first_enroll;
    var $last_school;
    var $city_last_school;
    var $last_class;


	
    function __constuctor(){
		parent::__construct();
    }
	
    function init($id=null){
		$this->id = null;
	    $this->fName = null;
		$this->sName = null;
		$this->id_card = null;
		$this->id_student = null;
		$this->dob = date("Y-m-d");
	    $this->family_id = null;
	    $this->nationality = null;
	    $this->religious = null;
	    $this->first_enroll = date("Y-m-d");
	    $this->last_school = null;
	    $this->city_last_school = null;
	    $this->last_class = date("Y-m-d");

	    if($id!=null){
	    	$query = $this->db->get_where('student',array('id'=>$id));

	    	if($query->num_rows()){
	    		$this->id = $query->row()->id;
	    		$this->fName = $query->row()->fName;
	    		$this->sName = $query->row()->sName;
	    		$this->id_card = $query->row()->id_card;
	    		$this->id_student = $query->row()->id_student;
	    	}
	    }
			
		return $this;
    } 
	function general(){
		$data['formattr']       = array('class' => 'form-horizontal bbq wizard');
		$data["nationality"] 	= $this->db->get('nationality')->result(); 
		$data["religious"] 		= $this->db->get('religious')->result(); 
		$data["provinces"] 		= $this->db->get('provinces')->result(); 
		return $data;
	}
	
	function getGuardian($search){
		$sql = $this->db->query('select * from guardians where GUARDIAN_SURNAME like "'. mysql_real_escape_string($search) .'%" order by GUARDIAN_SURNAME asc limit 0,10');
		return $sql->result();
	}    
	
	function entry_insert(){

    	$this->load->database();
    	$query = $this->db->getwhere('running_number',array('data'=>'student_id'));
    	$student_id =  $query->row_array() + 1;
    	$dataGuardian = array(
              			'guardian_name'=>$this->input->post('inputName_G'),
              			'guardian_surname'=>$this->input->post('inputName_G'),
              			'address'=>$this->input->post('inputAddress_G'),
              			'telno'=>$this->input->post('inputTel_G'),
              			'email'=>$this->input->post('inputEmail_G')
            			);
    	$this->db->insert('guardians',$dataGuardian);
  
    	$dataStudent = array(
    					'student_id'=>$student_id,
              			'guardian_id'=>$this->db->insert_id()
    					);
    	$this->db->insert('students',$dataStudent);

    	
  }
	
	
	
	function update(){
		$res = $this->db->update('student',$this,array('id'=>$this->id));
		return $res;
    }
    function delete(){
		$res = $this->db->delete('student',array('id'=>$this->id));
		return $res;
    }
    function insert(){
		$res = $this->db->insert('student',$this,array('id'=>$this->id));
		if($res) return $this->db->insert_id();
    }
}

?>