<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller{
	function __construct() {
        parent::__construct();
		if(!$this->session->userdata('login')){
			redirect(base_url("login"));
		}
	}
	//======================================================================================
	function index(){
		$data['data']=$this->db->query("select * from admin order by id desc")->result();
		$data['konten']	='admin/page/user_v';
		$this->load->view('admin/template/index',$data);
	
	}

	//======================================================================================
	function edit($id){
		$data['user'] = $this->db->get_where('admin', array('id' => $id))->row();
		$data['konten']	='admin/page/edit_user_v';
		$this->load->view('admin/template/index',$data);
	}
	
	//======================================================================================
	function tambah(){
		$data['konten']	='admin/page/tambah_user_v';
		$this->load->view('admin/template/index',$data);
	}
	
	//======================================================================================
	function do_tambah(){
		$data = array(
			"user"=>$this->input->post('username'),
			"nama"=>$this->input->post('nama'),
			"level"=>$this->input->post('level'),
			"notelp"=>$this->input->post('telp'),
			"pass"=>sha1($this->input->post('password')),
		);				
		$this->db->insert('admin',$data);
		$this->session->set_flashdata('msg','i');
		redirect('admin/user');
	}
	//======================================================================================
	function do_edit(){
		if($this->input->post('password')!=''){
			$data = array(
				"user"=>$this->input->post('username'),
				"nama"=>$this->input->post('nama'),
				"level"=>$this->input->post('level'),
				"notelp"=>$this->input->post('telp'),
				"pass"=>sha1($this->input->post('password')),
			);
		}else{
			$data = array(
				"user"=>$this->input->post('username'),
				"nama"=>$this->input->post('nama'),
				"level"=>$this->input->post('level'),
				"notelp"=>$this->input->post('telp'),
			);
		}
		
		$this->db->where('id', $this->input->post('kode'));
		$this->db->update('admin', $data);
		$this->session->set_flashdata('msg','e');
		redirect('admin/user');
	}
	//======================================================================================
	function hapus($id){
		$this->db->where('id',$id);
		$this->db->delete('admin');
		$this->session->set_flashdata('msg','h');
		redirect('admin/user');
	}
}