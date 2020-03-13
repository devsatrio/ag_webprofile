<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Slider extends CI_Controller{
	function __construct() {
        parent::__construct();
		if(!$this->session->userdata('login')){
			redirect(base_url("login"));
		}
    }
	function index($id=0){
		$this->load->library('pagination');
		$jum=$this->db->get('slider');
		$config['base_url']=base_url()."admin/slider/index/";
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
		
		$data['data']=$this->db->query("select * from slider limit $id,{$config['per_page']}")->result();
		$data['page']=$this->pagination->create_links();
		$data['konten']	='admin/page/slider_v';
		$this->load->view('admin/template/index',$data);
	}
	
	function tambah(){
		$data['konten']	='admin/page/tambah_slider_v';
		$this->load->view('admin/template/index',$data);
	}
	
	function do_tambah(){
		$upload_config['upload_path'] =realpath(APPPATH.'../gambar/slider/');
		$upload_config['allowed_types'] = 'jpg|png|jpeg';	
		$upload_config['overwrite']=true;
		$this->load->library('upload');
		$this->upload->initialize($upload_config);
		$this->upload->do_upload('gambar');
		$data_image		=$this->upload->data();
		$data	=array("link"=>$this->input->post('link'),"judul"=>$this->input->post('judul'),"keterangan"=>$this->input->post('keterangan'),"url_gambar"=>$data_image['file_name']);				
		$this->db->insert('slider',$data);
		redirect(base_url("admin/slider"));
	}
	
	function hapus($id){
		$data=$this->db->query("select url_gambar from slider where id=$id")->result_array();
		$image_nm= $data[0]['url_gambar'];
		$del="gambar/slider/".$image_nm;
      	unlink($del);

		$this->db->where('id',$id);
		$this->db->delete('slider');
	}
}