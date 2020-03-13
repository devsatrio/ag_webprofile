<?php
class Master extends CI_Model{
	function __construct(){
		parent::__construct();
	}
	
	function query_nop($kd_prov,$kd_dati,$kd_kecamatan,$kd_kelurahan,$kd_blok,$no_urut,$jenis){
		$tahun = date("Y");
		return $this->db->query("SELECT a.KD_PROPINSI,a.KD_DATI2,a.KD_KECAMATAN,a.KD_KELURAHAN,a.KD_BLOK,a.NO_URUT,a.KD_JNS_OP,
        a.NM_WP_SPPT,a.JLN_WP_SPPT,a.BLOK_KAV_NO_WP_SPPT,a.RW_WP_SPPT,a.RT_WP_SPPT,a.KELURAHAN_WP_SPPT,a.KOTA_WP_SPPT,
        b.JALAN_OP,b.BLOK_KAV_NO_OP,b.RW_OP,b.RT_OP,
        a.KD_KLS_TANAH,a.THN_AWAL_KLS_TANAH,a.KD_KLS_BNG,a.THN_AWAL_KLS_BNG,a.TGL_JATUH_TEMPO_SPPT,a.LUAS_BUMI_SPPT,a.LUAS_BNG_SPPT,a.NJOP_BUMI_SPPT,
        a.NJOP_BNG_SPPT,a.NJOP_SPPT,a.NJOPTKP_SPPT,a.NJKP_SPPT,a.PBB_TERHUTANG_SPPT ,a.FAKTOR_PENGURANG_SPPT,a.PBB_YG_HARUS_DIBAYAR_SPPT
        FROM 
        (SELECT * FROM SPPT
        WHERE KD_PROPINSI='$kd_prov' AND KD_DATI2='$kd_dati' AND KD_KECAMATAN='$kd_kecamatan' AND KD_KELURAHAN='$kd_kelurahan' 
        AND KD_BLOK='$kd_blok' AND NO_URUT='$no_urut' AND KD_JNS_OP='$jenis' AND THN_PAJAK_SPPT='$tahun') a,
        (SELECT * FROM DAT_OBJEK_PAJAK
        WHERE KD_PROPINSI='$kd_prov' AND KD_DATI2='$kd_dati' AND KD_KECAMATAN='$kd_kecamatan' AND KD_KELURAHAN='$kd_kelurahan' 
        AND KD_BLOK='$kd_blok' AND NO_URUT='$no_urut' AND KD_JNS_OP='$jenis') b
        WHERE a.KD_PROPINSI=b.KD_PROPINSI AND a.KD_DATI2=b.KD_DATI2 AND a.KD_KECAMATAN=b.KD_KECAMATAN AND a.KD_KELURAHAN=b.KD_KELURAHAN AND a.KD_BLOK=b.KD_BLOK
        AND a.NO_URUT=b.NO_URUT AND a.KD_JNS_OP=b.KD_JNS_OP");
	}

function history($kd_prov,$kd_dati,$kd_kecamatan,$kd_kelurahan,$kd_blok,$no_urut,$jenis){
return $this->db->query("SELECT THN_PAJAK_SPPT,TGL_PEMBAYARAN_SPPT, (DENDA_SPPT+JML_SPPT_YG_DIBAYAR) AS total FROM `pembayaran_sppt` WHERE KD_PROPINSI='$kd_prov' AND KD_DATI2='$kd_dati' AND KD_KECAMATAN='$kd_kecamatan' AND KD_KELURAHAN='$kd_kelurahan' 
        AND KD_BLOK='$kd_blok' AND NO_URUT='$no_urut' AND KD_JNS_OP='$jenis' order by THN_PAJAK_SPPT desc")->result();
}

function query_nop_2($kd_prov,$kd_dati,$kd_kecamatan,$kd_kelurahan,$kd_blok,$no_urut,$jenis){
		$tahun = date("Y");
		return $this->db->query("SELECT a.KD_PROPINSI,a.KD_DATI2,a.KD_KECAMATAN,a.KD_KELURAHAN,a.KD_BLOK,a.NO_URUT,a.KD_JNS_OP,
        a.NM_WP_SPPT,a.JLN_WP_SPPT,a.BLOK_KAV_NO_WP_SPPT,a.RW_WP_SPPT,a.RT_WP_SPPT,a.KELURAHAN_WP_SPPT,a.KOTA_WP_SPPT,
        b.JALAN_OP,b.BLOK_KAV_NO_OP,b.RW_OP,b.RT_OP,
        a.KD_KLS_TANAH,a.THN_AWAL_KLS_TANAH,a.KD_KLS_BNG,a.THN_AWAL_KLS_BNG,a.TGL_JATUH_TEMPO_SPPT,a.LUAS_BUMI_SPPT,a.LUAS_BNG_SPPT,a.NJOP_BUMI_SPPT,
        a.NJOP_BNG_SPPT,a.NJOP_SPPT,a.NJOPTKP_SPPT,a.NJKP_SPPT,a.PBB_TERHUTANG_SPPT ,a.FAKTOR_PENGURANG_SPPT,a.PBB_YG_HARUS_DIBAYAR_SPPT, d.tp, d.kec
        FROM 
        (SELECT * FROM SPPT
        WHERE KD_PROPINSI='$kd_prov' AND KD_DATI2='$kd_dati' AND KD_KECAMATAN='$kd_kecamatan' AND KD_KELURAHAN='$kd_kelurahan' 
        AND KD_BLOK='$kd_blok' AND NO_URUT='$no_urut' AND KD_JNS_OP='$jenis' AND THN_PAJAK_SPPT='$tahun') a,
        (SELECT * FROM DAT_OBJEK_PAJAK
        WHERE KD_PROPINSI='$kd_prov' AND KD_DATI2='$kd_dati' AND KD_KECAMATAN='$kd_kecamatan' AND KD_KELURAHAN='$kd_kelurahan' 
        AND KD_BLOK='$kd_blok' AND NO_URUT='$no_urut' AND KD_JNS_OP='$jenis') b , desa d
        WHERE a.KD_KECAMATAN=d.keccode and a.KD_KELURAHAN=d.desacode and a.KD_PROPINSI=b.KD_PROPINSI AND a.KD_DATI2=b.KD_DATI2 AND a.KD_KECAMATAN=b.KD_KECAMATAN AND a.KD_KELURAHAN=b.KD_KELURAHAN AND a.KD_BLOK=b.KD_BLOK
        AND a.NO_URUT=b.NO_URUT AND a.KD_JNS_OP=b.KD_JNS_OP");
	}

function query_nop1($kd_prov,$kd_dati,$kd_kecamatan,$kd_kelurahan,$kd_blok,$no_urut,$jenis){
		return $this->db->query("select n.TGL_JATUH_TEMPO_SPPT, n.NJOP_BUMI_SPPT, n.NJOP_BNG_SPPT, n.NJOP_SPPT, n.NJOPTKP_SPPT, n.NJKP_SPPT, n.JALAN_OP, n.RT_OP, n.RW_OP, d.tp, d.kec, n.LUAS_BUMI_SPPT, n.LUAS_BNG_SPPT, n.NM_WP_SPPT, n.JLN_WP_SPPT, n.RT_WP_SPPT, n.RW_WP_SPPT, n.KELURAHAN_WP_SPPT, n.KOTA_WP_SPPT, n.PBB_YG_HARUS_DIBAYAR_SPPT, n.STATUS from nop n, desa d WHERE n.KD_KELURAHAN=d.desacode AND n.KD_KECAMATAN=d.keccode AND n.KD_PROPINSI='$kd_prov' AND n.KD_DATI2='$kd_dati' AND n.KD_KECAMATAN='$kd_kecamatan' AND n.KD_KELURAHAN='$kd_kelurahan' AND n.KD_BLOK='$kd_blok' AND n.NO_URUT='$no_urut' AND n.KD_JNS_OP='$jenis'");
	}
	
	function get_komentar($id_pengaduan){
		$this->db->where("id_pengaduan",$id_pengaduan);
		return $this->db->get("komentar")->result();
	}
	
	function pajak(){
		return $this->db->query("select * from pajak where type='pajak'")->result();
	}
	
	function kecmojo(){
		return $this->db->query("select * from desa where kec='mojoroto'")->result();
	}

	function keckota(){
		return $this->db->query("select * from desa where kec='kota'")->result();
	}
	function kecpesantren(){
		return $this->db->query("select * from desa where kec='pesantren'")->result();
	}

	function read_pajak($id){
		return $this->db->query("select * from pajak where id_pajak='$id'")->row();
	}
	
	function retribusi(){
		return $this->db->query("select * from pajak where type='retribusi'")->result();
	}
	
	function get_info(){
		return $this->db->query("select * from kategori k join post p on p.id_kategori=k.id_kategori where k.nama_kategori='Agenda'")->result();
	}
	
	function google_map($koordinat,$titik_tengah,$keterangan=""){
		$this->load->library('googlemaps');
		$config['center']                   = $titik_tengah;
		$config['zoom']                     = '14'; 
		$config['map_type']                 = 'TRAIN';
		$this->googlemaps->initialize($config);
		$marker             = array();
		$marker['infowindow_content'] = $keterangan; 
		$marker['position'] = $koordinat;
		$this->googlemaps->add_marker($marker);
		return $this->googlemaps->create_map();	
	}
	
	function replace_tag($konten){
		$a=array("<!DOCTYPE html>","<html>","<head>","</head>","<body>","</body>","</html>");
		return trim(str_ireplace($a,'',$konten));
	}
	
	function get_halaman($id){
		$sql	=$this->db->query("select nama_halaman from halaman where id_halaman='$id'");
		if($sql->num_rows==1){
			$data	=$sql->row();
			return $data->nama_halaman;
		}else
			return "-";	
	}
	
	function get_menu($id){
		$data	=$this->db->query("select nama_menu from menu where id='$id'")->row();
		return $data->nama_menu;
	}
	
	function get_kategori($id){
		$data	=$this->db->query("select nama_kategori from kategori where id_kategori='$id'")->row();
		return $data->nama_kategori;
	}
	
	function tampil_halaman($id,$limit){
		return $this->db->query("select * from halaman limit $id,$limit")->result();
	}
	
	function tampil_pajak($id,$limit){
		return $this->db->query("select * from pajak limit $id,$limit")->result();
	}
	
	function tampil_jamak($id_jamak){
		return $this->db->query("select * from majemuk where id_majemuk='$id_jamak'")->row();
	}
	
	function get_judul_jamak($id){
		$sql	=$this->db->query("select nama_halaman from halaman where id_halaman='$id'")->row();
		$data	=$sql->nama_halaman;
		return $data;
	}	
	
	function get_date($tgl){
		$x	=explode("-",$tgl);
		return $x[2]."-".$x[1]."-".$x[0];
	}
	
	function tampil_hari($tgl){
		$timestamp 	= strtotime($tgl);
		$day 		= date('l', $timestamp);
		return $day;
	}
	
	function tampil_bulan($tgl){
		$timestamp 	= strtotime($tgl);
		$day 		= date('M', $timestamp);
		return $day;
	}
	
	function get_submenu($id_menu){
		return $this->db->query("select * from submenu join halaman on halaman.id_halaman=submenu.id_halaman where id_menu='$id_menu'")->result();
	}
	
	function hitung_jumlah_submenu($id_menu){
		return $this->db->query("select * from submenu where id_menu='$id_menu'")->num_rows();
	}
	
	function buat_tanggal($tanggal){
		$bulan	=array('','Jan','Feb','Mar','Apr','Mei','Jun','Jul','Ags','Sep','Okt','Nov','Des');
		$tgl	=explode('-',$tanggal);
		$bulan1	=(int)$tgl[1];
		return array($tgl[2],$bulan[$bulan1],$tgl[0]); 
	}
	
	function tampil_tunggal($id_halaman){
		return $this->db->query("select * from halaman hl join tunggal tg on tg.id_halaman=hl.id_halaman where hl.id_halaman='$id_halaman' ")->row();
	}
	
	function tampil_post($id,$kategori){
		return $this->db->query("select * from post where id_post='$id' AND id_kategori='$kategori'")->row();
	}
	
	function cek_nop($nop){
		if(strlen($nop)==18){		
			$kd_prov	=substr($nop,0,2);
			$kd_dati	=substr($nop,2,2);
			$kd_kec		=substr($nop,4,3);
			$kd_kel		=substr($nop,7,3);
			$kd_blok	=substr($nop,10,3);
			$no_urut	=substr($nop,13,4);
			$jenis		=substr($nop,17,1);
			$jumlah		=$this->query_nop($kd_prov,$kd_dati,$kd_kec,$kd_kel,$kd_blok,$no_urut,$jenis)->num_rows();
			if($jumlah==1){
				$status	=true;
			}else{
				$status	=false;
			}
		}else{
			$status	=false;
		}
		return $status;
	}
	
	function get_id_halaman_pengadaan(){
		$sql	=$this->db->query("select id_halaman from halaman where nama_halaman like 'pengadaa%'")->row();
		return $sql->id_halaman;
	}
	
	function tampilLokasi($a,$b){
	$kueri=$this->db->query("select * from desa limit $a,$b");
	$no=1;
	//$a=$b+1;
	foreach($kueri->result() as $tampil){
		$hasil[$no]['no']=$a+1;
		$hasil[$no]['nama']=$tampil->nama;
		$hasil[$no]['kec']=$tampil->kec;
		$hasil[$no]['desid']=$tampil->desid;

		$a++;
		$no++;
	}
	
	return $hasil;
	}
}