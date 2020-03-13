<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Index extends CI_Controller{
	function __construct() {
        parent::__construct();
		if(!$this->session->userdata('login')){
			redirect(base_url("login"));
		}
    }
	function index(){
		$data['menu']	=$this->db->get('menu')->result();
		$data['halaman']=$this->db->get('halaman')->result();
		$data['konten']	='admin/page/dashboard_v';
		$this->load->view('admin/template/index',$data);
	}
}