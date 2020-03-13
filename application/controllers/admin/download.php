<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Download extends CI_Controller{
	function __construct() {
        parent::__construct();
		if(!$this->session->userdata('login')){
			redirect(base_url("login"));
		}
    }
	function index($id=0){
		$this->load->library('pagination');
		$jum=$this->db->get('download_center');
		$config['base_url']=base_url()."admin/download_v/index/";
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
		
		$data['data']=$this->db->query("select * from download_center limit $id,{$config['per_page']}")->result();
		$data['page']=$this->pagination->create_links();
		$data['konten']	='admin/page/download_v';
		$this->load->view('admin/template/index',$data);
	}
	
	function tambah(){
		$data['konten']	='admin/page/tambah_download_v';
		$this->load->view('admin/template/index',$data);
	}
	
	function do_tambah(){		
		$this->load->library('upload');
		$data	=array("peraturan"=>$this->input->post('judul'),"deskripsi"=>$this->master->replace_tag($this->input->post('isi')));					
		
		$this->db->insert('download_center',$data);			
		$id					=mysql_insert_id();		
		
		$this->load->library('upload');
		$files 	= $_FILES;
		$cpt 	= count($_FILES['userfile']['name']);
		for($i=0; $i<$cpt; $i++)
		{
	
			$_FILES['userfile']['name']= $files['userfile']['name'][$i];
			$_FILES['userfile']['type']= $files['userfile']['type'][$i];
			$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
			$_FILES['userfile']['error']= $files['userfile']['error'][$i];
			$_FILES['userfile']['size']= $files['userfile']['size'][$i];    
	
			$this->upload->initialize($this->set_upload_options());
			$this->upload->do_upload();
			$data_image	=$this->upload->data();
			echo $this->upload->display_errors();
			
			$data_gambar	=array("nama_file"=>$data_image['file_name'],"id_download"=>$id);
			$this->db->insert('file_download',$data_gambar);
		}
		
		redirect(base_url("admin/download"));
	}
	
	function edit($id){
		$this->db->where("id_download",$id);
		$data['data']		=$this->db->get("download_center")->row();
		$this->db->where('id_download',$id);
		$data['file']		=$this->db->get('file_download')->result();
		$data['konten']		='admin/page/edit_download_v';
		$this->load->view('admin/template/index',$data);
	}
	
	function do_edit(){
		
		$cek	=$this->input->post('slider');
		$ganti	=$this->input->post('cek');
		if($ganti=="on"){		
			$this->load->library('upload');
			$data	=array("peraturan"=>$this->input->post('judul'),"deskripsi"=>$this->master->replace_tag($this->input->post('isi')));					
			
			$this->db->where('id_download',$this->input->post('id'));
			$this->db->update('download_center',$data);	
			
			$id		=$this->input->post('id');
			$files 	= $_FILES;
			$cpt 	= count($_FILES['userfile']['name']);
			for($i=0; $i<$cpt; $i++)
			{
		
				$_FILES['userfile']['name']= $files['userfile']['name'][$i];
				$_FILES['userfile']['type']= $files['userfile']['type'][$i];
				$_FILES['userfile']['tmp_name']= $files['userfile']['tmp_name'][$i];
				$_FILES['userfile']['error']= $files['userfile']['error'][$i];
				$_FILES['userfile']['size']= $files['userfile']['size'][$i];    
		
				$this->upload->initialize($this->set_upload_options());
				$this->upload->do_upload();
				$data_image	=$this->upload->data();
				
				$data_gambar	=array("nama_file"=>$data_image['file_name'],"id_download"=>$id);
				$this->db->insert('file_download',$data_gambar);
			}
		
		}else{
			$data	=array("peraturan"=>$this->input->post('judul'),"deskripsi"=>$this->master->replace_tag($this->input->post('isi')));					
			$this->db->where('id_download',$this->input->post('id'));
			$this->db->update('download_center',$data);
		}
		redirect(base_url("admin/download"));
	}
	
	function cari($kategori="",$id=0){
		$this->load->library('pagination');
		if($this->uri->segment(4)==""){
			$kategori	=$this->input->get('produk');
		}else{
			$kategori	=$this->uri->segment(4);
		}
		$jum=$this->db->query("select * from download_center where peraturan like '%$kategori%' ");
		$config['base_url']=base_url()."admin/download/cari/$kategori/";
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
		
		$config['uri_segment'] = 5;
		
		$this->pagination->initialize($config);
		$data['data']	=$this->db->query("select * from download_center where peraturan like '%$kategori%' limit $id,{$config['per_page']}")->result();
		$data['halaman']=$this->pagination->create_links();
		
		$data['konten']	='admin/page/download_cari_v';
		$this->load->view('admin/template/index',$data);
		
	}
	function hapus($id){
		$this->db->where('id_download',$id);
		$this->db->delete('download_center');
	}
	
	function hapus_file($id){
		$this->db->where('id',$id);
		$this->db->delete('file_download');
	}
	
	private function set_upload_options(){   

		$config = array();
		$config['upload_path'] =realpath(APPPATH.'../gambar/produk_hukum/');
		$config['allowed_types'] = 'jpg|png|jpeg|docx|doc|xlsx|xls|pdf|gif';	
		$config['overwrite']=true;
		return $config;
	}
}