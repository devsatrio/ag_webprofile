<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Login extends CI_Controller{
	function __construct() {
        parent::__construct();
    }
	function index(){
		$this->load->view('login');
	}
	function do_login(){
		$user	=addslashes($this->input->post('username'));
		$pass	=sha1($this->input->post('password'));
		$sql	=$this->db->query("select * from admin where user='$user' AND pass='$pass' AND status='1'");
		if($sql->num_rows() ==1){
			$data	=$sql->row();
			$sesi	=array(
				'sesi_id'=>$data->id,
				'user'=>$data->user,
				'type'=>$data->type
			);
			// print_r($sesi); exit();
			$this->session->set_userdata('login',$sesi);
			redirect('admin/index'); 
			// redirect(base_url("admin/index"));
		}else{
			redirect(base_url("login"));
		}
	}
	function logout(){
		$this->session->unset_userdata('login');
		redirect(base_url("login"));
	}
}