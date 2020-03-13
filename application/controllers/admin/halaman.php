<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Halaman extends CI_Controller{
	function __construct() {
        parent::__construct();
		if(!$this->session->userdata('login')){
			redirect(base_url("login"));
		}
    }
	function index($id=0){
		if(isset($_POST['cari'])){
			$bentuk	=$this->input->post('bentuk');
			$nama	=$this->input->post('nama_halaman');			
			$data['halaman']=$this->db->query("select * from halaman where nama_halaman like '$nama%' AND bentuk_halaman='$bentuk'")->result();
			$data['konten']	='admin/page/halaman_v';
			$data['page']	="";
			$this->load->view('admin/template/index',$data);
		}else{
			$this->load->library('pagination');
			$jum=$this->db->get('halaman');
			$config['base_url']=base_url().'admin/halaman/index/';
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
			
			$data['halaman']=$this->master->tampil_halaman($id,$config['per_page']);
			$data['page']	=$this->pagination->create_links();
			$data['konten']	='admin/page/halaman_v';
			$this->load->view('admin/template/index',$data);
		}
	}
	function do_tambah_halaman(){
		$data_insert	=array('nama_halaman'=>$this->input->post('nama_halaman'),'bentuk_halaman'=>$this->input->post('bentuk'));
		$this->db->insert('halaman',$data_insert);
		$data_insert['id']		=mysql_insert_id();
		$data_insert['bentuk']	=$data_insert['bentuk_halaman']==1 ? "Tunggal":"Jamak";
		echo json_encode($data_insert);
		$data	=array("tanggal"=>date("Y-m-d"),'isi'=>'','id_halaman'=>$data_insert['id']);
		$this->db->insert('tunggal',$data);
	}
	function hapus($id){
		$this->db->where('id_halaman',$id);
		$this->db->delete('halaman');
	}
	function edit_halaman(){
		$data			=array('nama_halaman'=>$this->input->post('nama_halaman'),'bentuk_halaman'=>$this->input->post('bentuk'));
		$this->db->where('id_halaman',$this->input->post('id_halaman'));
		$this->db->update('halaman',$data);
		$data['bentuk']	=($data['bentuk_halaman']==1) ? "Tunggal":"Jamak";
		echo json_encode($data);
	}
	function edit_tunggal($id){
		$data['halaman']=$this->db->get('halaman')->result();
		$data['tunggal']=$this->db->query("select * from tunggal where id_halaman='$id'")->row();
		$data['konten']	='admin/page/edit_tunggal_v';
		$this->load->view('admin/template/index',$data);
	}
	function do_edit_tunggal(){
		$data	=array('isi'=>$this->master->replace_tag($this->input->post('isi')),'tanggal'=>$this->master->get_date($this->input->post('tanggal')),'id_halaman'=>$this->input->post('halaman'));
		$this->db->where('id_tunggal',$this->input->post('id_tunggal'));
		$this->db->update('tunggal',$data);
		redirect(base_url("admin/halaman"));
	}
	function edit_jamak($id){
		$data['halaman']=$this->db->get('halaman')->result();
		$data['jamak']	=$this->db->query("select * from majemuk where id_halaman='$id'")->result();
		$data['konten']	='admin/page/edit_jamak_v'; 
		$data['id_jamak'] = $id;
		$this->load->view('admin/template/index',$data);
	}
	
	
	
}