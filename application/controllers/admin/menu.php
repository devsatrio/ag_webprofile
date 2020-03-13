<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Menu extends CI_Controller{
	function __construct() {
        parent::__construct();
		if(!$this->session->userdata('login')){
			redirect(base_url("login"));
		}
    }
	function index(){
		$data['menu']	=$this->db->get('menu')->result();
		$data['halaman']=$this->db->get('halaman')->result();
		$data['konten']	='admin/page/menu_v';
		$this->load->view('admin/template/index',$data);
	}
	function do_tambah_menu(){
		$data_insert	=array('nama_menu'=>$this->input->post('nama_menu'),'id_halaman'=>$this->input->post('halaman'));
		$this->db->insert('menu',$data_insert);
		$data_insert['id']		=mysql_insert_id();
		$data_insert['halaman']	=$this->master->get_halaman($this->input->post('halaman'));
		echo json_encode($data_insert);
	}
	function edit_menu(){
		$data	=array('nama_menu'=>$this->input->post('nama_menu'),'id_halaman'=>$this->input->post('halaman'));
		$id_menu=$this->input->post('id_menu');
		$this->db->where('id',$id_menu);
		$this->db->update('menu',$data);
		$data['halaman']	=$this->master->get_halaman($this->input->post('halaman'));
		echo json_encode($data);
	}
	function hapus(){
		$id	=$this->input->post('id');
		$this->db->where('id',$id);
		$this->db->delete('menu');
	}
}