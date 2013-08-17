<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Subject extends CI_Controller {

	/*public function index(){

		$module["module"] = $this->load->view("subject");
	}*/
	function list_subject(){
		$this->load->model("subject_model");	
		$data = $this->subject_model->get_all();
		$data['path'] = array( 	array('page'=>'List Subject','path'=>'/subject/list_subject'));
		$data['mlink'] = 'subject';
		$data['slink'] = 'list_subject';
		$this->load->view("listsubject", $data);
	}
	
	function list_activity(){
		$this->load->model("subject_model");	
		$data = $this->subject_model->get_ac_all(1);
		$data['path'] = array( 	array('page'=>'List Free Activity','path'=>'/subject/list_activity'));
		$data['mlink'] = 'subject';
		$data['slink'] = 'list_activity';
		$this->load->view("listactivity", $data);
	}
	
	function list_reactivity(){
		$this->load->model("subject_model");	
		$data = $this->subject_model->get_ac_all(0);
		$data['path'] = array( 	array('page'=>'List Required Activity','path'=>'/subject/list_reactivity'));
		$data['mlink'] = 'subject';
		$data['slink'] = 'list_reactivity';
		$this->load->view("listreactivity", $data);
	}

	function add_subject($code=''){	
		$this->load->helper('form');  
		$this->load->model("subject_model");
		$data = $this->subject_model->general();
		if($code <> ''){
			$data['exist'] = 'Subject code "'.$code.'" already exist.';
		}else{
			$data['exist'] = '';
		}
		$data['path'] = array( 	array('page'=>'Create Subject','path'=>'/subject/add_subject'));
		$data['mlink'] = 'subject';
		$data['slink'] = 'create_subject';
		$this->load->view("addsubject",$data);
	}
	
	function add_activity($code=''){	
		$this->load->helper('form');  
		$this->load->model("subject_model");
		$data = $this->subject_model->general();
		$data['path'] = array( 	array('page'=>'Create Activity','path'=>'/subject/add_activity'));
		$data['mlink'] = 'subject';
		$data['slink'] = 'create_activity';
		$this->load->view("addactivity",$data);
	}

	
	function input(){
		$this->load->helper('url');
		$this->load->model("subject_model");
		if($this->input->post('inputname')){	
        	$id = $this->subject_model->entry_insert();
        	if ($id <> 0){
        		redirect('index.php/subject/view/'.$id);
        	}else{
        		redirect('index.php/subject/add_subject/'.$id);
        	}
       	}
	}
	
	function inputac(){
		$this->load->helper('url');
		$this->load->model("subject_model");
		if($this->input->post('submit')){	
        	$id = $this->subject_model->entry_insertac();
        	if ($id <> 0){
        		redirect('index.php/subject/list_activity');
        	}else{
        		redirect('index.php/subject/add_activity/'.$id);
        	}
       	}
	}
	
	function view($subjectid=0){
		$this->load->model("subject_model");
		$this->load->helper('form'); 
		if((int)$subjectid > 0){	
			$id = (int)$subjectid;
			$query = $this->subject_model->get_subject($id);
			$data = $this->subject_model->general();
			if(! empty($query) ){
				$data['id'] = $subjectid;
				$data['code'] = $query['subject_code'];
				$data['group'] = $query['group_name'];
				$data['type'] = $query['type_name'];
				$data['class'] = $query['class_name'];
				$data['name'] = $query['subject_name'];
				$data['credit'] = $query['credit'];
				$data['desc'] = $query['description'];
				$data['status'] = $query['status'];
				$data['path'] = array( 	array('page'=>'List Subject','path'=>'/subject/list_subject'),
										array('page'=>'View Subject','path'=>'/subject/list_subject/#'));
				$data['mlink'] = 'subject';
				$data['slink'] = 'list_subject';
				$this->load->view("viewsubject",$data);
			}else{
				$data['path'] = 'null';
				$data['mlink'] = 'home';
				$data['slink'] = '';
				redirect('index.php/dashboard');
			}
		}
	}
	
	function edit($subid=0, $code=''){
		$this->load->model("subject_model");
		$this->load->helper('form');
		$query = $this->subject_model->get_subject($subid);
		$data = $this->subject_model->general();
		if(! empty($query) ){
			$data['id'] 	= $subid;
			$data['code'] 	= $query['subject_code'];
			$data['group'] 	= $query['subject_group'];
			$data['type'] 	= $query['subject_type'];
			$data['class'] = $query['class_name'];
			$data['name'] 	= $query['subject_name'];
			$data['credit'] = $query['credit'];
			$data['desc'] 	= $query['description'];
			$data['status'] = $query['status'];
			$data['match'] 	= '';
			if($code == 'err'){
				$data['match'] = 'err';
			}elseif($code == 'succeed'){
				$data['match'] = 'succeed';
			}
			$data['path'] = array( 	array('page'=>'List Subject','path'=>'/subject/list_subject'),
									array('page'=>'Edit Subject','path'=>'/subject/list_subject/#'));
			$data['mlink'] = 'subject';
			$data['slink'] = 'list_subject';
			$this->load->view("edit_subject",$data);
		}else{
			$data['path'] = 'null';
			$data['mlink'] = 'home';
			$data['slink'] = '';
			redirect('index.php/dashboard');
		}
	}
	
	function edit_ac($acid=0, $code=''){
		$this->load->model("subject_model");
		$this->load->helper('form');
		$query = $this->subject_model->get_activity($acid);
		$data = $this->subject_model->general();
		if(! empty($query) ){
			$data['id'] 	= $acid;
			$data['name'] 	= $query['activity_name'];
			$data['hour'] 	= $query['hour'];
			$data['status'] 	= $query['status'];
			$data['match'] 	= '';
			if($code == 'err'){
				$data['match'] = 'err';
			}elseif($code == 'succeed'){
				$data['match'] = 'succeed';
			}
			$data['path'] = array( 	array('page'=>'List Activity','path'=>'/subject/list_activity'),
									array('page'=>'Edit Activity','path'=>'/subject/list_activity/#'));
			$data['mlink'] = 'subject';
			$data['slink'] = 'list_activity';
			$this->load->view("edit_activity",$data);
		}else{
			$data['path'] = 'null';
			$data['mlink'] = 'home';
			$data['slink'] = '';
			redirect('index.php/dashboard');
		}
	}
	
	function edit_input(){
		$this->load->model("subject_model");
		if($this->input->post('submit')){	

			$data = $this->subject_model->update_subject();
		
			if($data == 'changed'){
				redirect('index.php/subject/edit/'.$this->input->post('subjectid').'/succeed');
	
			
			}elseif($data == 'invalid'){
			
				redirect('index.php/subject/edit/'.$this->input->post('subjectid').'/err');
	
			}
		}else{
			redirect('index.php/dashboard');

		}
	}
	
	function edit_inputac(){
		$this->load->model("subject_model");
		if($this->input->post('submit')){	

			$data = $this->subject_model->update_activity();
		
			if($data == 'changed'){
				redirect('index.php/subject/edit_ac/'.$this->input->post('activityid').'/succeed');
	
			
			}elseif($data == 'invalid'){
			
				redirect('index.php/subject/edit_ac/'.$this->input->post('activityid').'/err');
	
			}
		}else{
			redirect('index.php/dashboard');

		}
	}
}

?>