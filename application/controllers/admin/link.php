<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Link extends CI_Controller{
	function __construct() {
        parent::__construct();
		if(!$this->session->userdata('login')){
			redirect(base_url("login"));
		}
    }
	function index($id=0){
		$this->load->library('pagination');
		$jum=$this->db->get('link');
		$config['base_url']=base_url()."admin/link/index/";
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
		
		$data['data']=$this->db->query("select * from link limit $id,{$config['per_page']}")->result();
		$data['page']=$this->pagination->create_links();
		$data['konten']	='admin/page/link_v';
		$this->load->view('admin/template/index',$data);
	}
	
	function tambah(){
		$data['konten']	='admin/page/tambah_link_v';
		$this->load->view('admin/template/index',$data);
	}
	
	function do_tambah(){
		$data	=array("link"=>$this->input->post('link'),"judul"=>$this->input->post('judul'));
		$this->db->insert('link',$data);
		redirect(base_url("admin/link"));
	}
	
	function hapus($id){
		$data=$this->db->query("select * from link where id=$id")->result_array();
		// $image_nm= $data[0]['url_gambar'];
		// $del="gambar/slider/".$image_nm;
  		// unlink($del);
		$this->db->where('id',$id);
		$this->db->delete('link');
	}
}