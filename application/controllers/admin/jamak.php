<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Jamak extends CI_Controller{
	function __construct() {
        parent::__construct();
		if(!$this->session->userdata('login')){
			redirect(base_url("login"));
		}
    }
	function do_tambah(){
		$data	=array("judul"=>$this->input->post('judul'),"tanggal"=>$this->master->get_date($this->input->post('tanggal')),
					"isi"=>$this->master->replace_tag($this->input->post('isi')),"id_halaman"=>$this->input->post('id_halaman'));
		$upload_config['upload_path'] =realpath(APPPATH.'../gambar/jamak/');
		$upload_config['allowed_types'] = 'jpg|png|jpeg';	
		$upload_config['overwrite']=true;
		$this->load->library('upload');
		$this->upload->initialize($upload_config);
		$this->upload->do_upload('gambar');
		$data_image		=$this->upload->data();
		$data['gambar']	=$data_image['file_name'];
		$this->db->insert('majemuk',$data);
		redirect($_SERVER['HTTP_REFERER']);
	}
	function edit($id, $id_jamak){
		$data['jamak']	=$this->db->query("select * from majemuk where id_majemuk='$id'")->row();
		$data['halaman']=$this->db->get('halaman')->result();
		$data['id_jamak'] = $id_jamak;
		$data['konten']	='admin/page/edit_isi_jamak_v';
		$this->load->view('admin/template/index',$data);
	}
	function do_edit_isi(){
		$data	=array("judul"=>$this->input->post('judul'),"tanggal"=>$this->master->get_date($this->input->post('tanggal')),
					"isi"=>$this->master->replace_tag($this->input->post('isi')),"id_halaman"=>$this->input->post('id_halaman'));
		$id		=$this->input->post('id_majemuk');
		$id_jamak		=$this->input->post('id_jamak');
		$this->db->where('id_majemuk',$id);
		$this->db->update('majemuk',$data);
		redirect(base_url("admin/halaman/edit_jamak/".$id_jamak));
	}
	function hapus($id){
		$this->db->where('id_majemuk',$id);
		$this->db->delete('majemuk');
	}
}