<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Score extends CI_Controller {

	
	function class_student($code='',$classid=''){
		$this->load->model("score_model");	
		$this->load->helper('form'); 
		$data = $this->score_model->general();
		if($code == 'val'){
			$data['code'] = 'err1';
		}elseif( $code == 'val1'){
			$data['code'] = 'err2';
		}else{
			$data['code'] = '';
		}
		$data['path'] = array( 	array('page'=>'Student\'s Score','path'=>'/score/class_student'));
		$data['mlink'] = 'score';
		$data['slink'] = 's_score';
		$this->load->view("choose_class_r",$data);
	}
	
	function manage_activity($code='',$classid=''){
		$this->load->model("score_model");	
		$this->load->helper('form'); 
		$data = $this->score_model->general();
		if($code == 'val'){
			$data['code'] = 'err1';
		}elseif( $code == 'val1'){
			$data['code'] = 'err2';
		}else{
			$data['code'] = '';
		}
		$data['path'] = array( 	array('page'=>'Activity','path'=>'/score/manage_activity'));
		$data['mlink'] = 'score';
		$data['slink'] = 'activity';
		$this->load->view("choose_class_ac",$data);
	}
	
	function status_class($code=''){
	
		$this->load->model("score_model");	
		$this->load->helper('form'); 
		$data = $this->score_model->general();
		
		if($code == 'val'){
			$data['code'] = 'err1';
		}elseif( $code == 'val1'){
			$data['code'] = 'err2';
		}else{
			$data['code'] = '';
		}
		$data['path'] = array( 	array('page'=>'Student Status','path'=>'/score/status_class'));
		$data['mlink'] = 'score';
		$data['slink'] = 'status';
		$this->load->view("choose_class_sts",$data);
	}
	
	function promote_class($code=''){
		$this->load->model("score_model");	
		$this->load->helper('form'); 
		$data = $this->score_model->general();
		
		if($code == 'val'){
			$data['code'] = 'err1';
		}elseif( $code == 'val1'){
			$data['code'] = 'err2';
		}else{
			$data['code'] = '';
		}
		$data['path'] = array( 	array('page'=>'Promote','path'=>'/score/promote_class'));
		$data['mlink'] = 'score';
		$data['slink'] = 'promote';
		$this->load->view("choose_class_pro",$data);
	}
	
	function student_pro($year='',$class='',$room=''){
		$this->load->model("score_model");	
		$this->load->helper('form'); 
		$data = $this->score_model->general();
		
		
		$data['path'] = array( 	array('page'=>'Promote','path'=>'/score/promote_class'));
		$data['mlink'] = 'score';
		$data['slink'] = 'promote';
		$this->load->view("liststudentpro",$data);
		
	}
	
	function student_sts($year='',$class='',$room=''){
		$this->load->model("score_model");	
		$this->load->helper('form'); 
		$data = $this->score_model->general();
		
		
		$data['path'] = array( 	array('page'=>'Student Status','path'=>'/score/status_class'));
		$data['mlink'] = 'score';
		$data['slink'] = 'status';

		$this->load->view("liststudentsts",$data);
	
	}
	
	function add_eval($year='',$class='',$room='',$part='',$ac='',$code=''){
		$this->load->model("score_model");	
		$this->load->helper('form'); 
		$data = $this->score_model->general();
		if($year <> '' and $class <> '' and $room <> '' and $part<> '' and $ac <> ''){
			$year_num = substr($year,strlen($year)-2,2);
			$classid = $year_num.$class.$room;
			if($ac == 'free'){
				$data['student'] = $this->score_model->get_freeac($classid,$part);
				
				$query = $this->score_model->get_class_name($class);
				$data['classname'] = $query['class_name'];
				$query = $this->score_model->get_room_name($room);
				$data['roomname'] = $query['room_name'];
				$data['classid'] = $classid;
				$data['year']	= $year;
				$data['class']	= $class;
				$data['room']	= $room;				
				$data['part'] 	= $part;
				$data['code']   = $code;
				$data['path'] = array( 	array('page'=>'Activity','path'=>'/score/manage_activity'),
										array('page'=>'Evaluate Activity','path'=>'/score/manage_activity/#'));
				$data['mlink'] = 'score';
				$data['slink'] = 'activity';
				$this->load->view("addscorefac",$data);
			}else{
				$data['student'] = $this->score_model->get_reqac($classid,$part,$ac);
				
				if($data['student'] <> 'none'){
					$query = $this->score_model->get_class_name($class);
					$data['classname'] = $query['class_name'];
					$query = $this->score_model->get_room_name($room);
					$data['roomname'] = $query['room_name'];
					$data['classid'] = $classid;
					$data['year']	= $year;
					$data['class']	= $class;
					$data['room']	= $room;				
					$data['part'] 	= $part;
					$data['code']   = $code;
					$data['activityid'] = $ac;
					$data['path'] = array( 	array('page'=>'Activity','path'=>'/score/manage_activity'),
											array('page'=>'Evaluate Activity','path'=>'/score/manage_activity/#'));
					$data['mlink'] = 'score';
					$data['slink'] = 'activity';
					$this->load->view("addscorerac",$data);
				}
			}		
		}else{
			redirect('index.php/dashboard');	
		}
	}
	
	function choose_activity($year='',$class='',$room='',$part='',$code=''){
		$this->load->model("score_model");	
		$this->load->helper('form'); 
		$data = $this->score_model->general();
		if($year <> '' and $class <> '' and $room <> '' and $part<> ''){
			$year_num = substr($year,strlen($year)-2,2);
			$classid = $year_num.$class.$room;

			$data['activity'] = $this->score_model->get_reactivity($classid,$part);
			if($data['activity'] == 'none'){
				redirect('index.php/score/manage_activity/val1');
			}else{
				$query = $this->score_model->get_class_name($class);
				$data['classname'] = $query['class_name'];
				$query = $this->score_model->get_room_name($room);
				$data['roomname'] = $query['room_name'];
				$data['classid'] = $classid;
				$data['year']	= $year;
				$data['class']	= $class;
				$data['room']	= $room;				
				$data['part'] 	= $part;
				$data['code']	= $code;
				$data['path'] = array( 	array('page'=>'Activity','path'=>'/score/manage_activity'),
										array('page'=>'List Activity','path'=>'/score/manage_activity/#'));
				$data['mlink'] = 'score';
				$data['slink'] = 'activity';
				$this->load->view("listallacclass",$data);
			}

		}else{
			redirect('index.php/dashboard');		
		}
	}
	
	function by_subject($year='',$class='',$room='',$part='',$code=''){
		$this->load->model("score_model");	
		$this->load->helper('form'); 
		$data = $this->score_model->general();
		if($year <> '' and $class <> '' and $room <> '' and $part<> ''){
			$year_num = substr($year,strlen($year)-2,2);
			$classid = $year_num.$class.$room;
			$data['subject'] = $this->score_model->get_subject($classid,$part);
			
			if($data['subject'] == 'none'){
				redirect('index.php/score/class_student/val1');
			}else{
				$query = $this->score_model->get_class_name($class);
				$data['classname'] = $query['class_name'];
				$query = $this->score_model->get_room_name($room);
				$data['roomname'] = $query['room_name'];
				$data['classid'] = $classid;
				$data['year']	= $year;
				$data['class']	= $class;
				$data['room']	= $room;				
				$data['part'] 	= $part;
				$data['code']	= $code;
				$data['path'] = array( 	array('page'=>'Student\'s Score','path'=>'/score/class_student'),
										array('page'=>'List Subject','path'=>'/score/class_student/#'));
				$data['mlink'] = 'score';
				$data['slink'] = 's_score';
				$this->load->view("listscoreclass",$data);
			}
		}else{
			redirect('index.php/dashboard');		
		}
	}
	
	function add_score($year='',$class='',$room='',$part='',$subject=''){
		$this->load->model("score_model");	
		$this->load->helper('form'); 
		$data = $this->score_model->general();
		if($year <> '' and $class <> '' and $room <> '' and $part<> '' and $subject <> ''){
			$year_num = substr($year,strlen($year)-2,2);
			$classid = $year_num.$class.$room;

			$data['student'] = $this->score_model->student_subject($classid,$part,$subject);
			$data['subjectid'] = $subject; 
			$data['subjectname'] = $data['student'][0]->subject_name;
			$data['classid'] = $classid;
			$data['year']	= $year;
			$data['class']	= $class;
			$data['room']	= $room;
			$data['part'] 	= $part;
			$data['path'] = array( 	array('page'=>'Student\'s Score','path'=>'/score/class_student'),
									array('page'=>'List Subject','path'=>'/score/class_student/#'),
									array('page'=>'Add Score','path'=>'/score/class_student/#'));
			$data['mlink'] = 'score';
			$data['slink'] = 's_score';
			$this->load->view("addscoresubject",$data);
		
		}else{
			redirect('index.php/dashboard');		
		}
	}
	
	function facupdate(){
		if($this->input->post('submit')){
			$this->load->model("score_model");	
			$this->load->helper('form'); 
			$data = $this->score_model->general();
			$studentid = $this->input->post("studentid");
			$activityid = $this->input->post("activityid");
			$result = $this->input->post("result");
			$data['result'] = $this->score_model->update_fac($result,$studentid,$activityid);
			redirect('index.php/score/add_eval/'.$this->input->post("year").'/'.$this->input->post("class").'/'.$this->input->post("room").'/'.$this->input->post("part").'/free/update');
		}
	}
	
	function racupdate(){
		if($this->input->post('submit')){
			$this->load->model("score_model");	
			$this->load->helper('form'); 
			$data = $this->score_model->general();
			$studentid = $this->input->post("studentid");
			$activityid = $this->input->post("acid");
			$result = $this->input->post("result");
			$data['result'] = $this->score_model->update_rac($result,$studentid,$activityid);
			redirect('index.php/score/add_eval/'.$this->input->post("year").'/'.$this->input->post("class").'/'.$this->input->post("room").'/'.$this->input->post("part").'/'.$this->input->post("acid").'/update');
		}
	}
	
	function scoreupdate(){
		if($this->input->post('submit')){
			$this->load->model("score_model");	
			$this->load->helper('form'); 
			$data = $this->score_model->general();
			$score = $this->input->post("score");
			$grade = $this->input->post("grade");
			$studentid = $this->input->post("studentid");
			$data['result'] = $this->score_model->update_score($score,$grade,$studentid);
			redirect('index.php/score/by_subject/'.$this->input->post("year").'/'.$this->input->post("class").'/'.$this->input->post("room").'/'.$this->input->post("part").'/update');
		}
	}
}

?>