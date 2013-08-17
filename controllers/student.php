<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class student extends CI_Controller {

	function create($code=''){
		$this->load->helper('form');  
		$this->load->model("student_model");
		$data = $this->student_model->general();
		if($code == 'err'){
			$data['code'] = 'c/r';
		}else{
			$data['code'] = '';
		}
		$data['path'] = array( 	array('page'=>'New Student','path'=>'/student/create'));
		$data['mlink'] = 'student';
		$data['slink'] = 'create_student';
		$this->load->view('add_student',$data);
		
	}
	
	function input(){
		$this->load->model("student_model");
		if($this->input->post('selectprefix_s')){	
        	$id = $this->student_model->entry_insert();
        	if($id == 'class'){
        		redirect('index.php/student/create/err');
        	}else{
        		redirect('index.php/student/view/'.$id);
        	}
       	}
	}
	
	function liststudent_id(){
		$this->load->model("student_model");	
		$data = $this->student_model->get_all();
		$data['path'] = array( 	array('page'=>'List Student by ID','path'=>'/student/liststudent_id'));
		$data['mlink'] = 'student';
		$data['slink'] = 'list_student_id';
		$this->load->view("liststudentid", $data);	
	}
	
	function print_s($filename){
			// As PDF creation takes a bit of memory, we're saving the created file in /downloads/reports/
		$pdfFilePath = FCPATH."downloads/reports/$filename.pdf";
		$data['page_title'] = 'Hello world'; // pass data to the view
		ini_set('memory_limit','32M'); // boost the memory limit if it's low <img src="http://davidsimpson.me/wp-includes/images/smilies/icon_wink.gif" alt=";)" class="wp-smiley firstChild">
	    $html = $this->load->view('transcript', $data, true); // render the view into HTML
	 	
	    $this->load->library('pdf');
	    
	    $pdf = $this->pdf->load();
	    $pdf->SetAutoFont(AUTOFONT_THAIVIET);
	    //$pdf->SetFooter($_SERVER['HTTP_HOST'].'|{PAGENO}|'.date(DATE_RFC822)); // Add a footer for good measure <img src="http://davidsimpson.me/wp-includes/images/smilies/icon_wink.gif" alt=";)" class="wp-smiley lastChild">
	    $pdf->WriteHTML($html); // write the HTML into the PDF
	    $pdf->Output($pdfFilePath, 'I'); // save to file because we can
			
	}
	
	function view($studentid=0){
		$this->load->model("student_model");
		$this->load->helper('form'); 
		if((int)$studentid > 0){	
			$id = (int)$studentid;
			$query = $this->student_model->get_student($id);
			$data = $this->student_model->general();
			$data['id'] = $studentid;
			$data['code_s']   		= $query['student_id'];
	    	$data['fname_g']   		= $query['guardian_fname'];
	    	$data['fsurname_g']		= $query['guardian_fsurname'];
	    	$data['mname_g']   		= $query['guardian_mname'];
		    $data['msurname_g']		= $query['guardian_msurname'];
		    $data['address_g']  	= $query['address'];
			$data['name_s']    		= $query['student_name'];
		    $data['sname_s']   		= $query['student_surname'];
		    $data['inputidno_s']	= $query['student_idcard'];
		    $data['dob_s']     		= $query['student_dob'];
		    $data['nat_s']     		= $query['NATIONALITY_NAME'];
		    $data['rel_s']     		= $query['RELIGIOUS_NAME'];
		    $data['enroll_s']     	= $query['firstenroll_date'];
		    $data['lstschool_s']  	= $query['last_school'];
		    $data['province_s']   	= $query['province'];
		    $data['room_s']   		= 'Room';
		    $data['class_s']   		= 'Class';
		    
			switch ($query['prefix_id']) {
    			case 1:
        			$data['prefix_s'] = 'ด.ช.';
        			break;
    			case 2:
        			$data['prefix_s'] = 'ด.ญ.';
        			break;
    			case 3:
        			$data['prefix_s'] = 'นาย';
        			break;
        		case 4:
        			$data['prefix_s'] = 'นางสาว';        		
        		break;
        		
			}
			switch ($query['gender']) {
    			case 1:
        			$data['gender_s'] = 'Male';
        			break;
    			case 2:
        			$data['gender_s'] = 'Female';
        			break;
   			}
   			$data['path'] = array( 	array('page'=>'List Student by ID','path'=>'/student/liststudent_id'),
   									array('page'=>'View Student','path'=>'/student/liststudent_id/#'));
			$data['mlink'] = 'student';
			$data['slink'] = 'list_student_id';
			$this->load->view("viewstudent",$data);
		}
	}
}
?>