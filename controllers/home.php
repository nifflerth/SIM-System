<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
session_start(); //we need to call PHP's session object to access it through CI
class Home extends CI_Controller {

 function __construct()
 {
   parent::__construct();
 }

 function index()
 {
   if($this->session->userdata('logged_in'))
   {
     $session_data = $this->session->userdata('logged_in');
     $data['username'] = $session_data['account_username'];
     $data['path'] = 'null';
	 $data['mlink'] = 'home';
     $data['slink'] = '';
     $this->load->view('dashboard', $data);
   }
   else
   {
     //If no session, redirect to login page
     redirect('/index.php/welcome', 'refresh');
   }
 }

 function logout()
 {
   $this->session->unset_userdata('logged_in');
   session_destroy();
   redirect('/index.php/home', 'refresh');
 }

}

?>
