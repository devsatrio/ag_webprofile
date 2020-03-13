<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Submenu extends CI_Controller{
	function __construct() {
        parent::__construct();
		if(!$this->session->userdata('login')){
			redirect(base_url("login"));
		}
    }
	function index($id=0){
		$this->load->library('pagination');
			$jum=$this->db->get('submenu');
			$config['base_url']=base_url().'admin/submenu/index/';
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
		
			$data['menu']	=$this->db->get('menu')->result();
			$data['submenu']=$this->db->query("select * from submenu join menu on menu.id=submenu.id_menu join halaman on halaman.id_halaman=submenu.id_halaman order by submenu.id_submenu limit $id, {$config['per_page']}")->result();
			$data['halaman']=$this->db->get('halaman')->result();
			$data['page']=$this->pagination->create_links();
			$data['konten']	='admin/page/submenu_v';
			$this->load->view('admin/template/index',$data);
	}
	function do_tambah_menu(){
		$data_insert	=array('nama_submenu'=>$this->input->post('nama_submenu'),'id_halaman'=>$this->input->post('halaman'),
							'id_menu'=>$this->input->post('menu'));
		$this->db->insert('submenu',$data_insert);
		$data_insert['id']		=mysql_insert_id();
		$data_insert['halaman']	=$this->master->get_halaman($this->input->post('halaman'));
		$data_insert['menu']	=$this->master->get_menu($data_insert['id_menu']);
		echo json_encode($data_insert);
	}
	function edit_menu(){
		$data	=array('nama_submenu'=>$this->input->post('nama_submenu'),'id_halaman'=>$this->input->post('halaman'),
						'id_menu'=>$this->input->post('menu'));
		$id		=$this->input->post('id_submenu');
		$this->db->where('id_submenu',$id);
		$this->db->update('submenu',$data);
		$data['halaman']	=$this->master->get_halaman($this->input->post('halaman'));
		$data['menu']		=$this->master->get_menu($this->input->post('menu'));
		echo json_encode($data);
	}
	function hapus(){
		$id	=$this->input->post('id');
		$this->db->where('id_submenu',$id);
		$this->db->delete('submenu');
	}
}