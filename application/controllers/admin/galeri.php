<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Galeri extends CI_Controller{
	function __construct() {
        parent::__construct();
		if(!$this->session->userdata('login')){
			redirect(base_url("login"));
		}
    }
	function index($id=0){
		$this->load->library('pagination');
		$jum=$this->db->get('galeri');
		$config['base_url']=base_url()."admin/galeri/index/";
		$config['total_rows']=$jum->num_rows();
		$config['per_page']=10;

		$config['full_tag_open'] = '<ul class="pagination pagination-sm">';
		$config['full_tag_close'] = '</ul></div>';

		$config['first_link'] = '&laquo; Pertama';
		$config['first_tag_open'] = '<li class="prev page">';
		$config['first_tag_close'] = '</li>';

		$config['last_link'] = 'Terakhir &raquo;';
		$config['last_tag_open'] = '<li class="next page">';
		$config['last_tag_close'] = '</li>';

		$config['next_link'] = 'Selanjutnya &rarr;';
		$config['next_tag_open'] = '<li class="next page">';
		$config['next_tag_close'] = '</li>';

		$config['prev_link'] = '&larr; Sebelumnya';
		$config['prev_tag_open'] = '<li class="prev page">';
		$config['prev_tag_close'] = '</li>';

		$config['cur_tag_open'] = '<li class="active"><a href="">';
		$config['cur_tag_close'] = '</a></li>';

		$config['num_tag_open'] = '<li class="page">';
		$config['num_tag_close'] = '</li>';

		$config['uri_segment'] = 4;

		$this->pagination->initialize($config);

		$data['data']=$this->db->query("select * from galeri join kategori on kategori.id_kategori=galeri.idkategori limit $id,{$config['per_page']}")->result();
		$data['page']=$this->pagination->create_links();
		$data['konten']	='admin/page/geleri_v';
		$this->load->view('admin/template/index',$data);
	}

	function tambah(){
		$data['kategori']=$this->db->get("kategori")->result();
		$data['konten']	='admin/page/tambah_galeri_v';
		$this->load->view('admin/template/index',$data);
	}

	function do_tambah(){
		$upload_config['upload_path'] ='./gambar/galeri';
		$upload_config['allowed_types'] = 'jpg|png|jpeg';
		$upload_config['overwrite']=true;
		$this->load->library('upload');
		$this->upload->initialize($upload_config);
		$this->upload->do_upload('gambar');
		$data_image		=$this->upload->data();

		$cek			=$this->input->post('tampil');
		if($cek=="on"){
			$tampil = 1;
		}else {
			$tampil = 0;
		}

		$data	=array(
				"judul"=>$this->input->post('judul'),
				"keterangan"=>$this->input->post('keterangan'),
				"idkategori"=>$this->input->post('kategori'),
				"tampil"=>$tampil,
				"gambar"=>$data_image['file_name']);
		$this->db->insert('galeri',$data);
		redirect(base_url("admin/galeri"));
	}

	function hapus($id){

		$this->db->where('id_galeri',$id);
		$this->db->delete('galeri');

	}
}
