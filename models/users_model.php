<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Users_model extends CI_Model {
	
    var $account_id;
    var $account_username;
    var $account_password;
    var $account_level;
    var $teacher_id;
	
    function __constuctor(){
	parent::__construct();
    }
    function init($id=null){
	$this->acccount_id = null;
	$this->account_username = null;
	$this->account_password = null;
	$this->account_level = null;
	$this->teacher_id = null;
		
	if($id!=null){
	    $query = $this->db->get_where('accounts',array('id'=>$id));
			
	    if($query->num_rows()){
		$this->account_id = $query->row()->account_id;
		$this->account_username = $query->row()->account_username;
		$this->account_password = $query->row()->account_password;
		$this->account_level = $query->row()->account_level;
		$this->teacher_id = $query->row()->teacher_id;
	    }
	}
	return $this;
    }

    function login($username, $password){
    	$this->db->select('account_id, account_username, account_level, teacher_id');
    	$this->db->from('accounts');
    	$this->db->where('account_username', $username);
    	$this->db->where('account_password', MD5($password));
    	$this->db->limit(1);

    	$query = $this->db->get();

    	if($query->num_rows() == 1){
    		return $query->result();
    	}else{
    		return false;
    	}
    }


    function update(){
	$res = $this->db->update('accounts',$this,array('id'=>$this->id));
	return $res;
    }
    function delete(){
	$res = $this->db->delete('accounts',array('id'=>$this->id));
	return $res;
    }
    function insert(){
	$res = $this->db->insert('accounts',$this,array('id'=>$this->id));
	return $res;
    }
    function checkLogin(){
	if($this->session->userdata("ac_user_id") == NULL){
		redirect("/");
	}
    }
}
?>