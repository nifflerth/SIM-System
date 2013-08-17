<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Course extends CI_Controller {

	function manage_course($code = ''){
		$this->load->model("course_model");
		$this->load->helper('form'); 
		$data = $this->course_model->general();
		if($code == 'val'){
			$data['exist'] = 'err2';
		}else{
			$data['exist'] = '';
		}
		$data['path'] = array( 	array('page'=>'Manage Course','path'=>'/course/manage_course'));
		$data['mlink'] = 'course';
		$data['slink'] = 'manage_course';		
		$this->load->view("choose_class",$data);
		
	}
	
	function v_course_class($year='',$class='',$room=''){
			$this->load->model("course_model");	
			$this->load->helper('form'); 
			$data = $this->course_model->general();
			$data['year'] = $year;

			if($this->course_model->check_class($year,$class,$room) == 'found'){
				$year_num = substr($year, strlen($year)-2,2);
				$data['classid'] = $year_num.$class.$room;

				$data['subject'] = $this->course_model->get_course_all($year,$class,$room);
				$data['path'] = array( 	array('page'=>'Manage Course','path'=>'/course/manage_course'),
										array('page'=>'View Course','path'=>'/course/manage_course/#'));
				$data['mlink'] = 'course';
				$data['slink'] = 'manage_course';
				$this->load->view("listclasssub",$data);
			}else{
				$data['path'] = array( 	array('page'=>'Manage Course','path'=>'/course/manage_course'));
				$data['mlink'] = 'course';
				$data['slink'] = 'manage_course';
				$data['exist'] = 'err1';
				$this->load->view("choose_class",$data);
			}
			
		
	}
	
	function add_subject($classid='',$year='',$row =''){
		if($classid <> '' and $year <> ''){
			$this->load->model("course_model");	
			$this->load->helper('form'); 
			$data = $this->course_model->general();
			$query = $this->course_model->get_class1($classid);
			$data['classcode']	= $query['class_code'];
			$data['roomcode']	= $query['room_code'];
			$data['class'] 		= $query['class_name'];
			$data['room'] 		= $query['room_name'];
			$data['classclass'] = $query['classclass_id'];	
			$data['year'] 		= $year;
			$data['classid'] 	= $classid;
			$data['row'] = $row;
			$data['path'] = array( 	array('page'=>'Manage Course','path'=>'/course/manage_course'),
									array('page'=>'Add Subject','path'=>'/course/manage_course/#'));
			$data['mlink'] = 'course';
			$data['slink'] = 'manage_course';
			$this->load->view("add_class_sub",$data);
		}
	
	}
	
	function manage_class($code=''){
		$this->load->model("course_model");
		$this->load->helper('form'); 
		$data = $this->course_model->general();
		if($code == 'val'){
			$data['code'] = 'err1';
		}else{
			$data['code'] = '';
		}
		$data['path'] = array( 	array('page'=>'Manage Class','path'=>'/course/manage_class'));
		$data['mlink'] = 'course';
		$data['slink'] = 'manage_class';
		$this->load->view("choose_year",$data);
	}
	
	
	function v_class($year=''){
		if($year <> '' or $this->input->post('inputyear') <> ''){
			$this->load->model("course_model");	
			$this->load->helper('form'); 
			$data = $this->course_model->general();
			if($this->input->post('inputyear') <> ''){
				$year = $this->input->post('inputyear');
			}
			$data['year'] = $year;
			$data['class'] = $this->course_model->get_class_all($year);
			$year_num = substr($year, strlen($year)-2,2);
			/*$data['classid'] = $year_num.$this->input->post('selectclass').$this->input->post('selectroom');*/
			$data['path'] = array( 	array('page'=>'Manage Class','path'=>'/course/manage_class'),
									array('page'=>'View Class','path'=>'/course/manage_class/#'));
			$data['mlink'] = 'course';
			$data['slink'] = 'manage_class';
			$this->load->view("listclassyr",$data);
		}
	}
	
	function v_class_student($code='',$year='',$class='',$room=''){
		if($year<>'' and $class<>'' and $room<>''){
			$this->load->model("course_model");	
			$this->load->helper('form'); 
			$data = $this->course_model->general();
			$year_num = substr($year, strlen($year)-2,2);
			$data['classid'] = $year_num.$class.$room;
			$data['student'] = $this->course_model->get_class_student($data['classid']);
			
			$data['path'] = array( 	array('page'=>'List Student by Class&Room','path'=>'/course/class_student')
									);
			$data['mlink'] = 'student';
			$data['slink'] = 'list_student_cr';
			$this->load->view("listclassstu",$data);
		
		}else{
			$data['path'] = 'null';
			$data['mlink'] = 'home';
			$data['slink'] = '';
			redirect('index.php/dashboard');	
		}
	
	}
	
	function add_class($year='',$code=''){
		$this->load->model("course_model");	
		$this->load->helper('form'); 
		$data = $this->course_model->general();
		$data['exist'] = $code;
		
		$data['year'] = $year;
		$data['path'] = array( 	array('page'=>'Manage Class','path'=>'/course/manage_class'),
								array('page'=>'Create Class','path'=>'/course/manage_class/#'));
		$data['mlink'] = 'course';
		$data['slink'] = 'manage_class';
	    $this->load->view("addclass",$data);
	}
	
	function class_student($code='',$classid=''){
		$this->load->model("course_model");	
		$this->load->helper('form'); 
		$data = $this->course_model->general();
		/*if($code == 's' and $classid == ''){
			$data['path'] = array( 	array('page'=>'List Student by Class&Room','path'=>'/course/class_student'),
									array('page'=>'List Student ','path'=>'/course/class_student/#'));
			$data['mlink'] = 'student';
			$data['slink'] = 'list_student_cr';
			$this->load->view("list_class_s",$data);
			
		}else*/
		if($code == 'val'){
			$data['code'] = 'err1';
		}else{
			$data['code'] = '';
		}
		$data['path'] = array( 	array('page'=>'List Student by Class&Room','path'=>'/course/class_student'));
		$data['mlink'] = 'student';
		$data['slink'] = 'list_student_cr';
		$this->load->view("choose_class_s",$data);

	}
	
	function inputclass(){
		$this->load->helper('url');
		$this->load->model("course_model");
		if($this->input->post('submit') and $this->input->post('teacherid') <> ''){	
        	$id = $this->course_model->class_insert();
        	if ($id <> 0){
        		redirect('index.php/course/add_class/'.$this->input->post('inputyear').'/succeed');
        	}else{
        		redirect('index.php/course/add_class/'.$this->input->post('inputyear').'/err1');
        	}
       	}else{
       		redirect('index.php/course/add_class/'.$this->input->post('inputyear').'/err');
       	}
	
	}
	
	function inputcourse(){
		$this->load->helper('url');
		$this->load->model("course_model");
		if($this->input->post('submit')){
			$result = $this->course_model->course_insert();
			redirect('index.php/course/add_subject/'.$this->input->post("classid").'/'.$this->input->post("inputyear").'/'.$result);
		}
	}
	
	function edit($classid='',$code=''){
		if($classid<>''){
			$this->load->model("course_model");
			$this->load->helper('form');
			$query = $this->course_model->get_class1($classid);
			$data = $this->course_model->general();
			if(! empty($query) ){
				$data['classid'] 	= $classid;
				$data['year']		= $query['class_year'];
				$data['class'] 		= $query['class_name'];
				$data['room'] 		= $query['room_name'];
				$data['teacherid'] 	= $query['teacher_id'];
				$data['teacher'] 	= $query['teacher_name'] + " " + $query['teacher_surname'];
				$data['match'] 	= '';
				
				$data['exist'] = $code;
				
				$data['path'] = array( 	array('page'=>'Manage Class','path'=>'/course/manage_class'),
										array('page'=>'View Class','path'=>'/course/manage_class/#'),
										array('page'=>'Edit Class','path'=>'/course/manage_class/#'));
				$data['mlink'] = 'course';
				$data['slink'] = 'manage_class';
				$this->load->view("edit_class",$data);
			}else{
				$data['path'] = 'null';
				$data['mlink'] = 'home';
				$data['slink'] = '';
				redirect('index.php/dashboard');
			}
		}else{
			$data['path'] = 'null';
			$data['mlink'] = 'home';
			$data['slink'] = '';
			$this->load->view("dashboard",$data);
		}
	}
	
	function edit_input(){
		$this->load->helper('url');
		$this->load->model("course_model");
		if($this->input->post('submit') and $this->input->post('teacherid') <> ''){	
        	$return = $this->course_model->class_update();
        	if ($return == 'changed'){
        		redirect('index.php/course/edit/'.$this->input->post('classid').'/succeed');
        	}else{
        		redirect('index.php/course/edit/'.$this->input->post('classid').'/err1');
        	}
       	}else{
       		redirect('index.php/course/edit/'.$this->input->post('classid').'/err');
       	}

	}
	
	function manage_activity($code=''){
		$this->load->model("course_model");
		$this->load->helper('form');
		$data = $this->course_model->general();
		$data['code'] = $code;
		$data['path'] = array( 	array('page'=>'Manage Free Activity','path'=>'/course/manage_activity'));
		$data['mlink'] = 'course';
		$data['slink'] = 'manage_activity';
		$this->load->view("choose_ac_room",$data);
	}
	
	function manage_reactivity($code=''){
		$this->load->model("course_model");
		$this->load->helper('form');
		$data = $this->course_model->general();
		$data['code'] = $code;
		$data['path'] = array( 	array('page'=>'Manage Required Activity','path'=>'/course/manage_reactivity'));
		$data['mlink'] = 'course';
		$data['slink'] = 'manage_reactivity';
		$this->load->view("choose_ac_class",$data);
	}
	
	function v_reactivity($year='',$class='',$room='',$part='',$result=''){
		if($year <> '' and $class <> '' and $room <> '' and $part <> ''){
			$this->load->model("course_model");
			$this->load->helper('form');
			$data = $this->course_model->general();
			$year_num = substr($year, strlen($year)-2,2);
			$classid = $year_num.$class.$room;
			
			$data['activity'] = $this->course_model->get_class_reac($classid,$part);
			$data['year'] 		= $year;
			$data['class'] 		= $class;
			$data['classid']	= $classid;
			$data['room']		= $room;
			$data['part']		= $part;
			$query = $this->course_model->get_class_name($class);
			$data['classname'] = $query['class_name'];
			$query = $this->course_model->get_room_name($room);
			$data['roomname'] = $query['room_name'];
			$data['result'] = $result;
			$data['path'] = array( 	array('page'=>'Manage Required Activity','path'=>'/course/manage_reactivity'),
									array('page'=>'Activity List','path'=>'/course/manage_reactivity/#'));
			$data['mlink'] = 'course';
			$data['slink'] = 'manage_reactivity';
			$this->load->view("listacclass",$data);
			
		}else{
			redirect('index.php/course/manage_reactivity/err1');
		}
	}
	
	function v_activity($year='',$class='',$room='',$part='',$result=''){
		if($year <> '' and $class <> '' and $room <> '' and $part <> ''){
			$this->load->model("course_model");
			$this->load->helper('form');
			$data = $this->course_model->general();
			$year_num = substr($year, strlen($year)-2,2);
			$classid = $year_num.$class.$room;
			
			$data['activity'] 	= $this->course_model->get_stu_ac($classid,$part);
			
			$query = $this->course_model->get_class_name($class);
			$data['classname'] = $query['class_name'];
			
			
			$data['aclist']		= $this->course_model->get_aclist(1,0);
			
			$data['year'] 		= $year;
			$data['class'] 		= $class;
			$data['classid']	= $classid;
			$data['room']		= $room;
			$data['part']		= $part;
			$query = $this->course_model->get_room_name($room);
			$data['roomname'] = $query['room_name'];
			$data['result'] = $result;
			$data['path'] = array( 	array('page'=>'Manage Free Activity','path'=>'/course/manage_activity'),
									array('page'=>'Student List','path'=>'/course/manage_activity/#'));
			$data['mlink'] = 'course';
			$data['slink'] = 'manage_activity';
			$this->load->view("listacstu",$data);
			
		}else{
			redirect('index.php/course/manage_activity/err1');
		}
	
	}
	
	function facupdate(){
		if($this->input->post('submit')){
			$this->load->model("course_model");
			$this->load->helper('form');
			$data = $this->course_model->general();
			$studentid = $this->input->post("student_id");
			$activity = $this->input->post("selectac");
			$classid = $this->input->post("classid");
			$part = $this->input->post("part");
			$result = $this->course_model->update_fac($studentid,$activity,$classid,$part);
			redirect('index.php/course/v_activity/'.$this->input->post("year").'/'.$this->input->post("class").'/'.$this->input->post("room").'/'.$part.'/'.$result);
		}else{
			redirect('index.php/dashboard');
		}
	
	}
	
	function racupdate(){
		if($this->input->post('submit')){
			$this->load->model("course_model");
			$this->load->helper('form');
			$data = $this->course_model->general();
			$activity = $this->input->post("chkac");
			$classid = $this->input->post("classid");
			$part = $this->input->post("part");
			$result = $this->course_model->update_rac($activity,$classid,$part);
			redirect('index.php/course/v_reactivity/'.$this->input->post("year").'/'.$this->input->post("class").'/'.$this->input->post("room").'/'.$part.'/'.$result);
		}else{
			redirect('index.php/dashboard');
		}
	}
	
	function m_reactivity($year='',$class='',$room='',$part=''){
		if($year <> '' and $class <> '' and $room <> '' and $part <> ''){
			$this->load->model("course_model");
			$this->load->helper('form');
			$data = $this->course_model->general();
			$year_num = substr($year, strlen($year)-2,2);
			$classid = $year_num.$class.$room;
			
			$this->load->database();
			$result = $this->db->query('SELECT classclass_id FROM class WHERE class_code = ?', array($class))->row_array();
			$classclass_id = $result['classclass_id'];
			
			$data['aclist']		= $this->course_model->get_aclist(0,$classclass_id);
			$data['activity'] = $this->course_model->get_class_reac($classid,$part);
			
			$query = $this->course_model->get_class_name($class);
			$data['classname'] = $query['class_name'];
			$query = $this->course_model->get_room_name($room);
			$data['roomname'] = $query['room_name'];
			$data['year'] 		= $year;
			$data['class'] 		= $class;
			$data['classid']	= $classid;
			$data['room']		= $room;
			$data['part']		= $part;
			$data['code']	= '';
			$data['path'] = array( 	array('page'=>'Manage Required Activity','path'=>'/course/manage_reactivity'),
									array('page'=>'Activity List','path'=>'/course/manage_reactivity/#'));
			$data['mlink'] = 'course';
			$data['slink'] = 'manage_reactivity';
			$this->load->view("listcheckerac",$data);
		}else{
			redirect('index.php/dashboard');
		}
	}
	
	function getResult($search){
	      $search= $this->input->post('search');
	      $this->db->like('teacher_name',$search);
	      echo json_encode( $this->db->get('teachers')->result() ); 
   	}
   	
   	function getSubject($class,$search){
	      $this->db->like('subject_code',$search);
	      $this->db->where('subject_class',$class);
	      echo json_encode( $this->db->get('subjects')->result() ); 
   	}

}

?>