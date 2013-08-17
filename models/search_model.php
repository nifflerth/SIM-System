<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Search_model extends CI_Model {

	var $student_id;
	var $score;
	var $room_id;
	var $class_id;
	var $subject_name;
	
    function getAll($class_id=null,$room=null){

    	$sql = "SELECT DISTINCT students.STUDENT_ID as student_id, students.STUDENT_NAME as student_name";

		if(!empty($class_id) && (empty($room))){
    	$sql .= "FROM students,score,class,room
				where SCORE.CLASS_ID = CLASS.CLASS_ID
				and SCORE.STUDENT_ID = STUDENTS.STUDENT_ID
				and SCORE.ROOM_ID = ROOM.ROOM_ID
				and SCORE.CLASS_ID = $class_id";
		}else if(!empty($class_id) && (!empty($room))){
		$sql .= "FROM students,score,class,room
				where SCORE.CLASS_ID = CLASS.CLASS_ID
				and SCORE.STUDENT_ID = STUDENTS.STUDENT_ID
				and SCORE.ROOM_ID = ROOM.ROOM_ID
				and SCORE.CLASS_ID = $class_id
				and SCORE.ROOM_ID = $room";
		}else if(empty($class_id) && (!empty($room))){
		$sql .= "FROM students,score,class,room
				where SCORE.CLASS_ID = CLASS.CLASS_ID
				and SCORE.STUDENT_ID = STUDENTS.STUDENT_ID
				and SCORE.ROOM_ID = ROOM.ROOM_ID
				and SCORE.ROOM_ID = $room";	
		}

		$query = $this->db->query($sql);
		return $query->result_array();
    }

    function getRoom(){
    	$sql = "SELECT room_id, room_name from room";
    	$query = $this->db->query($sql);
    	return $query->result_array();
    }

    function classGet(){
    	$sql = "SELECT CLASS_ID, CLASS_NAME from class";
    	$query = $this->db->query($sql);
    	return $query->result_array();
    }

    function subjectList(){
		$sql = "SELECT subject_name from subjects where SUBJECT_CLASS_ID = '10' and SUBJECT_SEMESTER = '1'";
		$query = $this->db->query($sql);
		return $query->result_array();
    }

    function scoreList(){
    	$sql = "SELECT score from score s 
				INNER JOIN students st ON s.STUDENT_ID = st.STUDENT_ID 
				INNER JOIN class c ON s.CLASS_ID = c.CLASS_ID
				WHERE s.CLASS_ID = '10'
				ORDER BY s.SCORE_ID asc";
		$query = $this->db->query($sql);
		return $query->result_array();
    }

   function studentList(){
    	$sql = "SELECT DISTINCT STUDENT_NAME,STUDENT_SURNAME from score s,students st,class c,subjects sj
				where c.CLASS_ID = s.CLASS_ID
				and st.STUDENT_ID = s.SCORE_ID
				and s.CLASS_ID = '10'";
		$query = $this->db->query($sql);
		return $query->result_array();				
    }
}

?>