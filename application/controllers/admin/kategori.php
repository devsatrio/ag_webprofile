<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Kategori extends CI_Controller{
	function __construct() {
        parent::__construct();
		if(!$this->session->userdata('login')){
			redirect(base_url("login"));
		}
    }
	function index($id=0){
		$data['kategori']=$this->db->get("kategori")->result();
		$data['konten']	='admin/page/kategori_v';
		$this->load->view('admin/template/index',$data);
	}
	function do_tambah_kategori(){
		$data	=array('nama_kategori'=>$this->input->post('nama_kategori'));
		$this->db->insert('kategori',$data);
		$data['id']		=mysql_insert_id();
		echo json_encode($data);
	}
	function edit_kategori(){
		$data	=array('nama_kategori'=>$this->input->post('nama_kategori'));
		$id		=$this->input->post('id_kategori');
		$this->db->where('id_kategori',$id);
		$this->db->update('kategori',$data);
		echo json_encode($data);
	}
	function hapus(){
		$id	=$this->input->post('id');
		$this->db->where('id_kategori',$id);
		$this->db->delete('kategori');
	}
}