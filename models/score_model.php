<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Score_model extends CI_Model {
	function __constuctor(){
		parent::__construct();
	}
	function general(){
		$data['l_year']   	= 'ปีการศึกษา :';
	    $data['l_class']   	= 'Class :';
	    $data['l_room']		= 'Room :';
		$data['l_part']		= 'ภาคการศึกษา :';
		$data['l_name']   	= 'Subject Name :';
		$data['l_acname']   = 'Activity Name :';
		$data['l_hour']   	= 'Hour :';
		$data['l_desc']		= 'Description :';
		$data['l_credit']  	= 'Credits :';
		$data['l_code']  	= 'Subject code :';
		$data['l_type']		= 'Subject type :';
		$data['l_grp']		= 'Subject group :';
		$data['l_status']	= 'Status :';
		$data['formattr']   = array('class' => 'form-horizontal');
		return $data;   
	}
	


	function get_subject($classid='',$part=''){
		$this->load->database();
		$sql = "SELECT * 
				FROM courses	LEFT OUTER JOIN subjects
					ON courses.subject_id = subjects.subject_id
								LEFT OUTER JOIN subjectgroup
					ON subjects.subject_group = subjectgroup.group_id
				WHERE subjects.status = 1
				  AND courses.class_id = ?
				  AND courses.part = ?";
				
		$query = $this->db->query($sql, array($classid, $part));
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return 'none';
		}	
	}
	
	function get_reactivity($classid='',$part=''){
		$this->load->database();
		$sql = "SELECT * 
				FROM class_activity	INNER JOIN activities
					ON class_activity.activity_id = activities.activity_id
				WHERE class_activity.class_id = ?
				  AND class_activity.part = ?";
				
		$query = $this->db->query($sql, array($classid, $part));
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return 'none';
		}	
	}
	
	function get_freeac($classid='',$part=''){
		$this->load->database();
		$sql = "SELECT * 
				FROM student_study	LEFT OUTER JOIN activity
					ON student_study.class_id = activity.class_id
					AND student_study.part = activity.part
					AND student_study.student_id = activity.student_id
									LEFT OUTER JOIN activities
					ON activity.activity_id = activities.activity_id
									LEFT OUTER JOIN students
					ON 	student_study.student_id = students.student_id
									LEFT OUTER JOIN prefix
					ON 	students.prefix_id = prefix.prefix_id
					
				WHERE student_study.class_id = ?
				  AND student_study.part = ?
				  AND activities.activity_type = 1";
				
		$query = $this->db->query($sql, array($classid, $part));
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return 'none';
		}	
	}
	
	function get_reqac($classid='',$part='',$activity=''){
		$this->load->database();
		$sql = "SELECT * 
				FROM student_study	LEFT OUTER JOIN class_activity
					ON student_study.class_id = class_activity.class_id
					AND student_study.part = class_activity.part
									LEFT OUTER JOIN activity
					ON class_activity.class_id = activity.class_id
					AND class_activity.activity_id = activity.activity_id
					AND class_activity.part = activity.part
					AND student_study.student_id = activity.student_id
									LEFT OUTER JOIN activities
					ON class_activity.activity_id = activities.activity_id
									LEFT OUTER JOIN students
					ON 	student_study.student_id = students.student_id
									LEFT OUTER JOIN prefix
					ON 	students.prefix_id = prefix.prefix_id
					
				WHERE student_study.class_id = ?
				  AND student_study.part = ?
				  AND class_activity.activity_id = ?
				  AND activities.activity_type = 0";
				
		$query = $this->db->query($sql, array($classid, $part, $activity));
		if($query->num_rows() > 0){
			return $query->result();
		}else{
			return 'none';
		}
	}
	
	function student_subject($classid='',$part='',$subjectid=''){
		$this->load->database();
		$sql = "SELECT *
				FROM student_study 	INNER JOIN courses
					ON 	student_study.class_id = courses.class_id
					AND student_study.part = courses.part
									LEFT OUTER JOIN study
					ON 	student_study.class_id = study.class_id
					AND student_study.part = study.part
					AND student_study.student_id = study.student_id
					AND courses.subject_id = study.subject_id
									LEFT OUTER JOIN subjects
					ON 	courses.subject_id = subjects.subject_id
									LEFT OUTER JOIN students
					ON 	student_study.student_id = students.student_id
									LEFT OUTER JOIN prefix
					ON 	students.prefix_id = prefix.prefix_id
				WHERE student_study.class_id = ?
				  AND student_study.part = ?	
				  AND courses.subject_id = ?
				  and subjects.status = 1 ";
			
		$query = $this->db->query($sql, array($classid, $part, $subjectid));
		return $query->result();
	}
	
	function update_fac($result,$studentid,$activityid){
		$index = 0;
		foreach($studentid as $row){
			$sql = "SELECT *
					FROM activity
					WHERE class_id=?
					  AND activity_id=?
					  AND part=?
					  AND student_id=?";
			$query = $this->db->query($sql, array(
											$this->input->post("classid"),
											$activityid[$index],
											$this->input->post("part"),
											$row)
											);		  		  		
			if($query->num_rows() > 0){
				$sql = "UPDATE activity
						SET result=?
						WHERE class_id=?
						  AND activity_id=?
						  AND part=?
						  AND student_id=?";
				$query = $this->db->query($sql, array($result[$index], 
												$this->input->post("classid"),
												$activityid[$index],
												$this->input->post("part"),
												$row)
									);
			}else{
				$dataActivity = array(
	    					'class_id'=>$this->input->post("classid"),
	              			'activity_id'=>$activityid[$index],
	              			'part'=>$this->input->post("part"),
	              			'student_id'=>$row,
	              			'result'=>$result[$index]
	    					);
	    		$this->db->insert('activity',$dataActivity);			
	    	}		  
		   	$index = $index + 1;
    	}
    	return $index;
	}
	
	function update_rac($result,$studentid,$activityid){
		$index = 0;
		foreach($studentid as $row){
			$sql = "SELECT *
					FROM activity
					WHERE class_id=?
					  AND activity_id=?
					  AND part=?
					  AND student_id=?";
			$query = $this->db->query($sql, array(
											$this->input->post("classid"),
											$activityid,
											$this->input->post("part"),
											$row)
											);		  		  		
			if($query->num_rows() > 0){
				$sql = "UPDATE activity
						SET result=?
						WHERE class_id=?
						  AND activity_id=?
						  AND part=?
						  AND student_id=?";
				$query = $this->db->query($sql, array($result[$index], 
												$this->input->post("classid"),
												$activityid,
												$this->input->post("part"),
												$row)
									);
			}else{
				$dataActivity = array(
	    					'class_id'=>$this->input->post("classid"),
	              			'activity_id'=>$activityid,
	              			'part'=>$this->input->post("part"),
	              			'student_id'=>$row,
	              			'result'=>$result[$index]
	    					);
	    		$this->db->insert('activity',$dataActivity);			
	    	}		  
		   	$index = $index + 1;
    	}
    	return $index;
	}
	
	function update_score($score,$grade,$studentid){
		$index = 0;
		foreach($studentid as $row){
			$sql = "SELECT *
					FROM study
					WHERE class_id=?
					  AND subject_id=?
					  AND part=?
					  AND student_id=?";
			$query = $this->db->query($sql, array(
											$this->input->post("classid"),
											$this->input->post("subjectid"),
											$this->input->post("part"),
											$row)
											);		  		  		
			if($query->num_rows() > 0){
				$sql = "UPDATE study
						SET score=?, 
							grade=?
						WHERE class_id=?
						  AND subject_id=?
						  AND part=?
						  AND student_id=?";
				$query = $this->db->query($sql, array($score[$index], 
												$grade[$index], 
												$this->input->post("classid"),
												$this->input->post("subjectid"),
												$this->input->post("part"),
												$row)
									);
			}else{
				$dataStudy = array(
	    					'class_id'=>$this->input->post("classid"),
	              			'subject_id'=>$this->input->post("subjectid"),
	              			'part'=>$this->input->post("part"),
	              			'student_id'=>$row,
	              			'score'=>$score[$index],
	              			'grade'=>$grade[$index]
	    					);
	    		$this->db->insert('study',$dataStudy);			
	    	}		  
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
?>
