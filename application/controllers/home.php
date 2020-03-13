<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Home extends CI_Controller{
	function __construct(){
		parent::__construct();
	}
	 

	public function index(){
		$data['menu']	=$this->db
							->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman order by menu.id")->result();
		$data['berita']	=$this->db
							->query("select * from post where tampil = 1 ORDER BY tanggal DESC limit 0,3")->result();

		$data['link']=$this->db->query("select * from link")->result();

		$data['galleri_arsip']	=$this->db
									->query("select * from galeri p join kategori k on p.idkategori=k.id_kategori where k.nama_kategori='arsip' and tampil = 1 limit 0,3")->result();
		$data['galleri_perpus']	=$this->db
									->query("select * from galeri p join kategori k on p.idkategori=k.id_kategori where k.nama_kategori='perpustakaan' and tampil = 1 limit 0,3")->result();
		$data['slider']	=$this->db->query("select * from slider")->result();
		// $data['informasi']=$this->master->get_info();

		$ip      = $_SERVER['REMOTE_ADDR']; // Mendapatkan IP komputer user
		$tanggal = date("Ymd"); // Mendapatkan tanggal sekarang
		$waktu   = time(); //
		$s = $this->db->query("SELECT * FROM statistik WHERE ip='$ip' AND tanggal='$tanggal'")->num_rows();
		if($s == 0){
		    $this->db->query("INSERT INTO statistik(ip, tanggal, hits, online) VALUES('$ip','$tanggal','1','$waktu')");
		}else{
		    $this->db->query("UPDATE statistik SET hits=hits+1, online='$waktu' WHERE ip='$ip' AND tanggal='$tanggal'");
		}

		$data['pengunjung'] = $this->db->query("SELECT * FROM statistik WHERE tanggal='$tanggal' GROUP BY ip")->num_rows(); // Hitung jumlah pengunjung
		$data['totalpengunjung']  = $this->db->query("SELECT COUNT(hits) AS jum FROM statistik")->row(); // hitung total pengunjung
		$bataswaktu = time() - 300;
		$data['pengunjungonline'] = $this->db->query("SELECT * FROM statistik WHERE online > '$bataswaktu'")->num_rows(); // hitung pengunjung online

		$data['page']	='page/beranda';
		$this->load->view('template/index',$data);
	}
	
	// function ktp(){
	// 	$data['menu']	=$this->db->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman")->result();
	// 	$data['galeri']	=$this->db->query("select * from galeri")->result();
	// 	$data['agenda']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Agenda'  ORDER BY tanggal DESC limit 0,2")->result();

	// 	$data['page'] 	='page/cek_nik';
	// 	$this->load->view('template/index',$data);
	// }

	// function cek_(){
	// 	$nik = $this->input->post('nik');
	// 	$key = '4ndR11d4';

	// 	$url = 'http://penduduk-layanan.kedirikota.go.id/webservice/cekKTP_web.php/'.$nik.'/'.$key;
	// 	//echo $url;
	// 	$jsonUrl = file_get_contents($url, False);
	// 	$json_show = json_decode($jsonUrl, true);

	// 	if($json_show['count'] == 1){
	// 		$data = array("nik" => $json_show['item'][0]["NIK"],
	// 					'nama' => $json_show['item'][0]["NAMA_LGKP"],
	// 					'status' => ($json_show['item'][0]["FLAG_STATUS"] == 0) ? "Aktif":"Non Aktif",
	// 					'c' => '1');
	// 	}else{
	// 		$data = array("nik" => "",
	// 					'nama' => "",
	// 					'status' => "",
	// 					'c' => '0');
	// 	}

	// 	echo json_encode($data);
	// }

	function page(){
		$data['menu']	=$this->db->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman order by menu.id")->result();
		$id				=$this->uri->segment(2);
		$data['data']	=$this->master->tampil_tunggal($id);
		$data['agenda']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Agenda'  ORDER BY tanggal DESC limit 0,2")->result();
		$data['pengumuman']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Pengumuman'  ORDER BY tanggal DESC limit 0,3")->result();

		$data['page'] 	='page/page';
		$this->load->view('template/index',$data);
	}

	function post($id,$judul,$page=0){
		$this->load->library('pagination');
		$jum=$this->db->query("select * from post where id_kategori='$id'");
		$config['base_url']=base_url()."read/post/$id/$judul/";
		$config['total_rows']=$jum->num_rows();
		$config['per_page']=10;
		
		$config['full_tag_open'] = '<ul class="pagination pagination-sm">';
		$config['full_tag_close'] = '</ul>';
		
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
		
		$data['menu']	=$this->db->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman order by menu.id")->result();
		$data['data']	=$this->db->query("select * from post join kategori on kategori.id_kategori=post.id_kategori where post.id_kategori='$id' limit $page,{$config['per_page']}")->result();
		$data['halaman']=$this->pagination->create_links();
		$data['agenda']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Agenda'  ORDER BY tanggal DESC limit 0,2")->result();
		$data['pengumuman']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Pengumuman'  ORDER BY tanggal DESC limit 0,3")->result();

		$data['page'] 	='page/post';
		$data['slider']	='template/slider';
		$this->load->view('template/index',$data);
	}
	
	function jamak($id="",$bentuk,$judul="",$page=0){
		$data['menu']	=$this->db->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman order by menu.id")->result();
		$id				=$this->uri->segment(2);
		
		if($this->uri->segment(5)=="")$page=0;
		else $page	=$this->uri->segment(5);
		$judul		=$this->uri->segment(4);
		$this->load->library('pagination');
		$jum=$this->db->query("select * from majemuk where id_halaman='$id'");
		$config['base_url']=base_url()."read/$id/2/$judul/";
		$config['total_rows']=$jum->num_rows();
		$config['per_page']=9;
		
		$config['full_tag_open'] = '<ul class="pagination pagination-sm">';
		$config['full_tag_close'] = '</ul>';
		
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

		$data['halaman']=$this->pagination->create_links();
		
		$data['data']	=$this->db->query("select * from majemuk join halaman on halaman.id_halaman=majemuk.id_halaman where majemuk.id_halaman='$id' limit $page,{$config['per_page']}")->result();
		
		$data['judul']	=$this->master->get_judul_jamak($id);

		$data['berita']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Berita'  ORDER BY tanggal DESC limit 0,6")->result();	 
		$data['agenda']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Agenda'  ORDER BY tanggal DESC limit 0,2")->result();
		$data['pengumuman']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Pengumuman'  ORDER BY tanggal DESC limit 0,3")->result();

		$data['page'] 	='page/jamak';
		$this->load->view('template/index',$data);
	}
	
	function detail_jamak(){
		$data['menu']	=$this->db->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman order by menu.id")->result();
		$id_jamak		=$this->uri->segment(7);
		$id_halaman		=$this->uri->segment(6);
		$data['data']	=$this->master->tampil_jamak($id_jamak);
		
	 	$data['latest'] = $this->db->query(" SELECT * FROM post p, kategori k WHERE p.id_kategori = k.id_kategori AND k.nama_kategori='Berita' ORDER BY tanggal DESC limit 0,6")->result();
	 	$data['agenda']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Agenda'  ORDER BY tanggal DESC limit 0,2")->result();
	 	$data['pengumuman']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Pengumuman'  ORDER BY tanggal DESC limit 0,3")->result();

		$data['page'] 	='page/detail_jamak';
		$this->load->view('template/index',$data);
	}
	
	function detail(){
		$data['menu']	=$this->db->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman order by menu.id")->result();
		$id				=$this->uri->segment(7);
		$kategori		=$this->uri->segment(6);
		$data['data']	=$this->master->tampil_post($id,$kategori);
		 
		if($kategori==1){
			$data['lainya']	=$this->db->query("select * from post where id_kategori='$kategori' order by rand() limit 0,10")->result();
		}else{
			$data['lainya']	=$this->db->query("select * from post where id_kategori='2' OR id_kategori='3' order by rand() limit 0,10")->result();
		}

		$data['agenda']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Agenda'  ORDER BY tanggal DESC limit 0,2")->result();
		$data['pengumuman']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Pengumuman'  ORDER BY tanggal DESC limit 0,3")->result();
		
		$data['page'] 	='page/detail';
		$this->load->view('template/index',$data);
	}
	
	function galleri_arsip(){
		$data['menu']	=$this->db
							->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman")->result();
		$data['galeri']	=$this->db
							->query("select * from galeri p join kategori k on p.idkategori=k.id_kategori where k.nama_kategori='arsip' ")->result();
		$data['berita']	=$this->db
							->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='arsip'  ORDER BY tanggal DESC limit 0,3")->result();

		$data['agenda']	=$this->db
							->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Agenda'  ORDER BY tanggal DESC limit 0,2")->result();
		$data['pengumuman']	=$this->db
							->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Pengumuman'  ORDER BY tanggal DESC limit 0,3")->result();

		$data['page'] 	='page/galleri_arsip';
		$this->load->view('template/index',$data);
	}

	function galleri_perpus(){
		$data['menu']	=$this->db
							->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman")->result();
		$data['galeri']	=$this->db
							->query("select * from galeri p join kategori k on p.idkategori=k.id_kategori where k.nama_kategori='perpustakaan' ")->result();
		$data['berita']	=$this->db
							->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='perpustakaan'  ORDER BY tanggal DESC limit 0,3")->result();

		$data['agenda']	=$this->db
							->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Agenda'  ORDER BY tanggal DESC limit 0,2")->result();
		$data['pengumuman']	=$this->db
							->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Pengumuman'  ORDER BY tanggal DESC limit 0,3")->result();

		$data['page'] 	='page/galleri_perpus';
		$this->load->view('template/index',$data);
	}

	function profil(){
		$data['menu']	=$this->db->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman")->result();
		// $data['galeri']	=$this->db->query("select * from galeri")->result();
		$data['agenda']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Agenda'  ORDER BY tanggal DESC limit 0,2")->result();
		$data['pengumuman']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Pengumuman'  ORDER BY tanggal DESC limit 0,3")->result();

		$data['page'] 	='page/profil';
		$this->load->view('template/index',$data);
	}
	
	function search(){
		$key	=addslashes($this->input->get('q'));
		$data['menu']	=$this->db->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman")->result();
		$data['data']	=$this->db->query("select * from post join kategori on kategori.id_kategori=post.id_kategori where post.judul like '%$key%'")->result();
		 
		
		$data['page'] 	='page/cari';
		$data['slider']	='template/slider';
		$this->load->view('template/index',$data);
	}
	
	function get_image_galeri($id){
		$data	=$this->db->query("select gambar from galeri where id_galeri='$id'")->row();
		$hasil['gambar']=$data->gambar1;
		echo json_encode($hasil);
	}

	function berita_agenda($id=0){

		$data['menu']	=$this->db->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman order by menu.id")->result();
		$id				=$this->uri->segment(3);

		if($id=="")	$id=0;

		$this->load->library('pagination');
		$jum=$this->db->query("SELECT * FROM post p, kategori k WHERE p.id_kategori = k.id_kategori ORDER BY tanggal DESC");
		$config['base_url']=base_url()."read/post/";
		$config['total_rows']=$jum->num_rows();
		$config['per_page']=3;
		
		$config['full_tag_open'] = '<ul class="pagination pagination-sm">';
		$config['full_tag_close'] = '</ul>';
		
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
		
		$config['uri_segment'] = 3;
		
		$this->pagination->initialize($config);

		$data['latest'] = $this->db->query(" SELECT * FROM post p, kategori k WHERE p.id_kategori = k.id_kategori ORDER BY tanggal DESC limit 0,6")->result();

		$data['halaman']=$this->pagination->create_links();
		
		$data['data']	=$this->db->query(" SELECT * FROM post p, kategori k WHERE p.id_kategori = k.id_kategori ORDER BY tanggal DESC limit $id,{$config['per_page']}")->result();
			 
		$data['page'] 	='page/post';
		$this->load->view('template/index',$data);
	}

	function detail_post($id){
		$data['menu']	=$this->db->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman order by menu.id")->result();
		$id				=$this->uri->segment(2);
		$data['data']	=$this->db->query("SELECT * FROM post p, kategori k WHERE p.id_kategori = k.id_kategori AND id_post=$id")->result();
		$data['latest'] = $this->db->query(" SELECT * FROM post p, kategori k WHERE p.id_kategori = k.id_kategori ORDER BY tanggal DESC limit 0,6")->result();

		$data['agenda']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Agenda'  ORDER BY tanggal DESC limit 0,2")->result();
		$data['pengumuman']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Pengumuman'  ORDER BY tanggal DESC limit 0,3")->result();

		$data['page'] 	='page/detail_jamak';
		$this->load->view('template/index',$data);
	}

	// Download Center
	function downloadcenter($id=0){
		$data['menu']	=$this->db->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman order by menu.id")->result();
		$id				=$this->uri->segment(3);
		
		$data['data']	=$this->db->query("select * from download_center a 
									JOIN file_download b ON a.id_download=b.id_download")->result();

		$data['agenda']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Agenda'  ORDER BY tanggal DESC limit 0,2")->result();
		$data['pengumuman']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Pengumuman'  ORDER BY tanggal DESC limit 0,3")->result();

		$data['page'] 	='page/download_v';
		$this->load->view('template/index',$data);
	}

	function berita(){
		$data['menu']	=$this->db->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman order by menu.id")->result();
		$id				=$this->uri->segment(3);
		
		$data['berita']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Berita'  ORDER BY tanggal DESC limit 0,10")->result();;

		$data['agenda']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Agenda'  ORDER BY tanggal DESC limit 0,2")->result();
		$data['pengumuman']	=$this->db->query("select * from post p join kategori k on p.id_kategori=k.id_kategori where k.nama_kategori='Pengumuman'  ORDER BY tanggal DESC limit 0,3")->result();

		$data['page'] 	='page/berita_v';
		$this->load->view('template/index',$data);
	}

	function pendaftaran(){
		$data['menu']	=$this->db->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman order by menu.id")->result();
		$id				=$this->uri->segment(3);		
		$data['page'] 	='page/pendaftaran';
		$this->load->view('template/index',$data);
	}

	function tambah_member(){
		$getPost = $this->input->post(null, true);

    	$add['tgl'] = date('Y-m-d');
    	$add['nik'] = $getPost['nik'];
    	$add['nama'] = $getPost['nama'];
    	$add['tempat_lhr'] = $getPost['tempat_lhr'];
    	$add['tgl_lhr'] = $getPost['tgl_lhr'];
    	$add['jenkel'] = $getPost['jenkel'];
    	$add['alamat'] = $getPost['alamat'];
    	$add['kecamatan'] = $getPost['kecamatan'];
    	$add['propinsi'] = $getPost['propinsi'];
    	$add['rt'] = $getPost['rt'];
    	$add['rw'] = $getPost['rw'];
    	$add['kota'] = $getPost['kota'];
    	$add['kelurahan'] = $getPost['kelurahan'];
    	$add['hp'] = $getPost['hp'];
    	$add['agama'] = $getPost['agama'];
    	$add['pekerjaan'] = $getPost['pekerjaan'];
    	$add['namainstitusi'] = $getPost['namainstitusi'];
    	$add['alamatinstitusi'] = $getPost['alamatinstitusi'];
    	$add['prodi'] = $getPost['prodi'];
    	$add['kelas'] = $getPost['kelas'];
    	$add['email'] = $getPost['email'];
    	$add['ibukandung'] = $getPost['ibukandung'];
    	$add['namakeluarga'] = $getPost['namakeluarga'];
    	$add['statuskeluarga'] = $getPost['statuskeluarga'];
    	$add['hpkeluarga'] = $getPost['hpkeluarga'];

    	$upload_config['upload_path'] ='./gambar/member/';
		$upload_config['allowed_types'] = 'jpg|png|jpeg';
		$upload_config['overwrite']=true;
		$this->load->library('upload');
		$this->upload->initialize($upload_config);
		$this->upload->do_upload('gambar');
		$data_image		=$this->upload->data();
    	$add['gambar'] = $data_image['file_name'];

    	$upload_config['upload_path'] ='./gambar/member/';
		$upload_config['allowed_types'] = 'jpg|png|jpeg';
		$upload_config['overwrite']=true;
		$this->load->library('upload');
		$this->upload->initialize($upload_config);
		$this->upload->do_upload('foto');
		$data_image		=$this->upload->data();
    	$add['foto'] = $data_image['file_name'];
    	// print_r($add); exit();

		$insert = $this->db->insert('member', $add);
		redirect('home/pendaftaran');

	}

	function aduan(){
		$data['menu']	=$this->db->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman order by menu.id")->result();
		$id				=$this->uri->segment(3);		
		$data['page'] 	='page/aduan_v';
		$this->load->view('template/index',$data);
	}

    function simpan_aduan(){
        $getPost = $this->input->post(null,true);
        $add['nama']  = $getPost['nama'];
        $add['isi'] = $getPost['keperluan'];

        $simpan = $this->db->insert('aduan',$add);
        if ($simpan > 0) {
            echo '<script>alert("Data berhasil dikirim");</script>';
            redirect('read/kritiksaran', 'refresh');
        }else {
            echo '<script>alert("DATA GAGAL DIKIRIM !!!!!!");</script>';
            redirect('read/kritiksaran');
        }
    }
	
	function cek_data(){
		$data['menu']	=$this->db->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman order by menu.id")->result();
		// $id				=$this->uri->segment(3);		
		$data['page'] 	='page/cek_data_v';
		$this->load->view('template/index',$data);
	}

    function cek_($nama=''){
		$data = $this->db->get_where("arsip_imb", array('nama_pemilik' => $nama))->row();
		// print_r($data);
		// echo $data->id_arsip_imb; exit();
		if ($data->id_arsip_imb != 0) {
			$json = array('status' => '1');
		} else {
			$json = array('status' => '0');
		}

		// print_r($json);exit();
		echo json_encode($json);
    }


	// function detail_file($id,$judul){
	// 	$data['menu']	=$this->db->query("select * from menu LEFT JOIN halaman on halaman.id_halaman=menu.id_halaman order by menu.id")->result();
	// 	$id				=$this->uri->segment(3);
	// 	$data['data']	=$this->db->query("select * from download_center where id_download='$id'")->row();
		 
	// 	$data['file']	=$this->db->query("select * from file_download where id_download='$id'")->result();

	// 	$data['page'] 	='page/detail_download_v';
	// 	$this->load->view('template/index',$data);
	// }

	function download($file){
		header("Content-Type: application/force-download");
		header("content-disposition: attachment;filename=$file");
		readfile(base_url() . "gambar/produk_hukum/$file");
	}
}
	