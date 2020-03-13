<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class User extends CI_Controller{
	function __construct() {
        parent::__construct();
		if(!$this->session->userdata('login')){
			redirect(base_url("login"));
		}
    }
	function index($id=0){
		$this->load->library('pagination');
		$jum=$this->db->get('admin');
		$config['base_url']=base_url()."admin/user/index/";
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
		
		$data['data']=$this->db->query("select * from admin limit $id,{$config['per_page']}")->result();
		$data['page']=$this->pagination->create_links();
		$data['konten']	='admin/page/user_v';
		$this->load->view('admin/template/index',$data);
	
	}

	function get_data($id=''){
		$data = $this->db->get_where('admin', array('id' => $id))->result();
		foreach($data as $d => $isi){
			$json = array(
				'id' => $isi->id,
				'user' => $isi->user,
				'pass' => $isi->pass,
				'status' => $isi->status,
				'type' => $isi->type
			);
		}
		echo json_encode($json);
	}
	
	// function tambah(){
	// 	$data['konten']	='admin/page/tambah_user_v';
	// 	$this->load->view('admin/template/index',$data);
	// }
	
	// function do_tambah(){
	// 	$upload_config['upload_path'] =realpath(APPPATH.'../gambar/user/');
	// 	$upload_config['allowed_types'] = 'jpg|png|jpeg';	
	// 	$upload_config['overwrite']=true;
	// 	$this->load->library('upload');
	// 	$this->upload->initialize($upload_config);
	// 	$this->upload->do_upload('gambar');
	// 	$data_image		=$this->upload->data();
	// 	$data	=array("link"=>$this->input->post('link'),"judul"=>$this->input->post('judul'),"keterangan"=>$this->input->post('keterangan'),"url_gambar"=>$data_image['file_name']);				
	// 	$this->db->insert('user',$data);
	// 	redirect(base_url("admin/user"));
	// }
	
	function hapus($id){
		$data=$this->db->query("select url_gambar from user where id=$id")->result_array();
		$image_nm= $data[0]['url_gambar'];
		$del="gambar/user/".$image_nm;
      	unlink($del);

		$this->db->where('id',$id);
		$this->db->delete('user');
	}
}