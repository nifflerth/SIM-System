<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course_model extends CI_Model {
	/*function __constuctor(){
  		parent::__construct();
  	}*/
  	
  	function general(){
  		$data['l_year']   	= 'ปีการศึกษา :';
	    $data['l_class']   	= 'Class :';
	    $data['l_room']		= 'Room :';
	    $data['l_teacher']  = 'Class\'s Teacher :';
	    $data['l_search_sub'] = 'Subject code :';
	    $data['l_part'] = 'ภาคการศึกษา :';
	    $data['exist'] = '';
   		$data['formattr']   = array('class' => 'form-horizontal');
    	return $data;   
  	}
  	
  	function get_course_all($year='',$class='',$room=''){
		$this->load->database();
		$year_num = substr($year,strlen($year)-2,2);
		$classid = $year_num.$class.$room;
		$sql = "SELECT * 
				FROM courses LEFT OUTER JOIN subjects
				ON courses.subject_id = subjects.subject_id
								LEFT OUTER JOIN subjectgroup
				ON subjects.subject_group = subjectgroup.group_id
				and subjects.status = 1
				WHERE courses.class_id =?";
		
		$query = $this->db->query($sql, array($classid));
		return $query->result();	
	}
	
	function get_class_student($classid){
		$this->load->database();
		$sql = "SELECT * 
				FROM (	SELECT distinct student_id 
						FROM study
						WHERE class_id = ? ) AS study 	LEFT OUTER JOIN students 
						ON study.student_id = students.student_id
														LEFT OUTER JOIN status
	  					ON students.status = status.status_id
	  													LEFT OUTER JOIN prefix
	  					ON students.prefix_id = prefix.prefix_id";
		
		$query = $this->db->query($sql, array($classid));
		return $query->result();	
	}
	
	function check_class($year='',$class='',$room=''){
		$this->load->database();
		$year_num = substr($year, strlen($year)-2,2);
		$classid = $year_num.$class.$room;
		$query = $this->db->query("SELECT * FROM classes WHERE class_id ='".$classid."'");
		if ($query->num_rows() == 0){
			return 'notfound';
		}else{
			return 'found';
		}
	
	}
	
	function class_insert(){
		$this->load->database();
		$year_num = substr($this->input->post('inputyear'), strlen($this->input->post('inputyear'))-2,2);
		$classid = $year_num.$this->input->post('selectclass').$this->input->post('selectroom');
		$query = $this->db->query("SELECT * FROM classes WHERE class_id ='".$classid."'");
		if ($query->num_rows() == 0){
		  	$dataClass = array(
		  						'class_id'=>$classid,
		  						'class_year'=>$this->input->post('inputyear'),
		  						'teacher_id'=>$this->input->post('teacherid'),
		              			'class_code'=>$this->input->post('selectclass'),
		              			'room_code'=>$this->input->post('selectroom')
		            			);
		   	$this->db->insert('classes',$dataClass);
		   	return 1;
		}else{
			return 0;
		}
	
	}
	
	function course_insert(){
		$classid = $this->input->post("classid");
		$id = $this->input->post("id");
		$id = array_unique($id);
		$inserted = 0;
		foreach($id as $subid){
    		$query = $this->db->query("SELECT * FROM courses WHERE class_id ='".$classid."' and subject_id ='".$subid."'");
    		if ($query->num_rows() == 0){
    			$dataCourse = array(
		  						'class_id'=>$classid,
		  						'subject_id'=>$subid,
		  						'part'=>$this->input->post("selectpart")
		            			);
		   		$this->db->insert('courses',$dataCourse);
		   		$inserted = $inserted + 1;
    		}
		}	
		return $inserted;
	}
	
	function class_update(){
		if ($this->input->post('classid') <> ''){
			$dataClass = array(
		  						'teacher_id'=>$this->input->post('teacherid')
		  						
		            			);	
		
			$this->db->where('class_id', $this->input->post('classid'));
			$this->db->update('classes', $dataClass);
			return 'changed';
		}else{
			return 'invalid';
		}	
	}
	
	function get_class1($classid){
		$this->load->database();
		$sql = "SELECT * 
				FROM classes 	LEFT OUTER JOIN teachers
				ON classes.teacher_id = teachers.teacher_id
								LEFT OUTER JOIN class
				ON classes.class_code = class.class_code
								LEFT OUTER JOIN room
				ON classes.room_code = room.room_code
				WHERE classes.class_id = ?"; 
	
		$query = $this->db->query($sql, array($classid));
		return $query->row_array();
	}
	
	function get_class_all($year=''){
		$this->load->database();
		$year_num = $year;
		$sql = "SELECT * 
				FROM classes 	LEFT OUTER JOIN teachers
				ON classes.teacher_id = teachers.teacher_id
								LEFT OUTER JOIN class
				ON classes.class_code = class.class_code
								LEFT OUTER JOIN room
				ON classes.room_code = room.room_code
				WHERE classes.class_year =?";
		
		$query = $this->db->query($sql, array($year_num));
		return $query->result();	
	}
	
	function get_class_reac($classid, $part){
		$this->load->database();
		$sql = "SELECT *
				FROM class_activity INNER JOIN activities 
					ON class_activity.activity_id = activities.activity_id
				WHERE activities.activity_type = 0
				  AND class_activity.class_id = ?
				  AND class_activity.part = ?";
		/*$sql = "SELECT * 
				FROM (	SELECT distinct class_id, activity_id, part 
						FROM activity
						WHERE class_id = ?
				  		AND part = ? ) activity
					LEFT OUTER JOIN activities 
					ON activity.activity_id = activities.activity_id
				WHERE activities.activity_type = 0";*/
		
		$query = $this->db->query($sql, array($classid, $part));
		return $query->result();	
	}
	
	function get_stu_ac($classid, $part){
		$this->load->database();
		$sql = "SELECT *
				FROM (	SELECT *
						FROM student_study
						WHERE class_id = ?
						  AND part = ? ) student_study
						LEFT OUTER JOIN activity
					ON  student_study.class_id = activity.class_id
					AND student_study.part = activity.part
					AND student_study.student_id = activity.student_id
						INNER JOIN students
					ON student_study.student_id = students.student_id
						LEFT OUTER JOIN prefix
					ON students.prefix_id = prefix.prefix_id
						LEFT OUTER JOIN activities 
					ON activity.activity_id = activities.activity_id
					";
		
		$query = $this->db->query($sql, array($classid, $part));
		return $query->result();	
	}
	
	function get_aclist($type,$class){
		$this->load->database();
		$sql = "SELECT *
				FROM activities
				WHERE activity_type = ?
				  AND activity_class = ?
				  AND status = 1";
		
		$query = $this->db->query($sql, array($type, $class));
		return $query->result();	
	}
	
	function update_fac($studentid,$activity,$classid,$part){
		$this->load->database();
		$index = 0;
		
		foreach($studentid as $row){
			$sql = "SELECT activity.* 
					FROM activity LEFT OUTER JOIN activities
						ON activity.activity_id = activities.activity_id
					WHERE ( ( activity.activity_id <> '' and activities.activity_type = 1 ) 
					   OR ( activity.activity_id = 0 ) )
					  AND activity.class_id = ?
					  AND activity.part = ?
					  AND activity.student_id = ?";
			$query = $this->db->query($sql, array(
											$classid,
											$part,
											$row)
											);		
			$activ = $query->row_array();								  		  		
			if($query->num_rows() > 0 and $activ['activity_id'] <> $activity[$index]){
				$sql = "DELETE FROM activity
						WHERE activity_id=?
						  AND class_id=?
						  AND part=?
						  AND student_id=?";
				$query = $this->db->query($sql, array($activ['activity_id'], 
													  $classid, 
													  $part,
													  $row)
										 );
				$dataAc = array(
	    					'class_id'=>$classid,
	              			'activity_id'=>$activity[$index],
	              			'part'=>$part,
	              			'student_id'=>$row
	    					);
	    		$this->db->insert('activity',$dataAc);	
	    		
			}elseif($query->num_rows() == 0){
				$dataAc = array(
	    					'class_id'=>$classid,
	              			'activity_id'=>$activity[$index],
	              			'part'=>$part,
	              			'student_id'=>$row
	    					);
	    		$this->db->insert('activity',$dataAc);	
			}
			$index = $index + 1;
		}
		return $index;
	}
	
	function update_rac($activity,$classid,$part){
		$index = 0;
		$sql = "DELETE FROM class_activity
						WHERE class_id=?
						  AND part=?";
				$query = $this->db->query($sql, array($classid, 
													  $part)
										 );		
		foreach($activity as $row){
			$dataAc = array(
	    					'class_id'=>$classid,
	              			'activity_id'=>$row,
	              			'part'=>$part
	    					);
	    		$this->db->insert('class_activity',$dataAc);	
			$index = $index + 1;
		
		}
		return $index;
	}
	function get_room_name($room){
		
		$this->load->database();
			
		$sql = "SELECT *
				FROM room
				WHERE room_code = ?";

		
		$query = $this->db->query($sql, array($room));
		
		return $query->row_array();

	}
	
	function get_class_name($class){

		$this->load->database();
			
		$sql = "SELECT *
				FROM class
				WHERE class_code = ?";
		
		$query = $this->db->query($sql, array($class));
		return $query->row_array();

	}

}