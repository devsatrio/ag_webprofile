<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class GantiPass extends CI_Controller{
	function __construct() {
        parent::__construct();
		if(!$this->session->userdata('login')){
			redirect(base_url("login"));
		}
    }
	function index(){
		$sesi	=$this->session->userdata('login');
		$data['profil']	=$this->db->query("select * from admin where id='{$sesi['sesi_id']}'")->row();
		$data['konten']	='admin/page/gantiPass_v';
		$this->load->view('admin/template/index',$data);
	}
	function do_ganti(){
		$sesi	=$this->session->userdata('login');
		$data	=array("user"=>$this->input->post('username'),"pass"=>sha1($this->input->post('password')));
		$this->db->where('id',$sesi['sesi_id']);
		$this->db->update('admin',$data);
	}
}