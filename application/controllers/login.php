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
				'type'=>$data->type,
				'nama'=>$data->nama,
				'telp'=>$data->notelp,
			);
			$this->session->set_userdata('login',$sesi);
			redirect('admin/index'); 
		}else{
			$this->session->set_flashdata('msg','e');
			redirect('login');
		}
	}
	function logout(){
		$this->session->unset_userdata('login');
		redirect(base_url("login"));
	}
}