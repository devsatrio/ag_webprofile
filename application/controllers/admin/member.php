<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Member extends CI_Controller{
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
		
		$data['data']=$this->db->query("select * from member limit $id,{$config['per_page']}")->result();
		$data['page']=$this->pagination->create_links();
		$data['konten']	='admin/page/member_v';
		$this->load->view('admin/template/index',$data);
	}

	public function export(){
    // Load plugin PHPExcel nya
    include APPPATH.'../PHPExcel/PHPExcel.php';
    
    // Panggil class PHPExcel nya
    $excel = new PHPExcel();
    // Settingan awal fil excel
    $excel->getProperties()->setCreator('My Notes Code')
                 ->setLastModifiedBy('My Notes Code')
                 ->setTitle("Data Siswa")
                 ->setSubject("Siswa")
                 ->setDescription("Laporan Semua Data Siswa")
                 ->setKeywords("Data Siswa");
    // Buat sebuah variabel untuk menampung pengaturan style dari header tabel
    $style_col = array(
      'font' => array('bold' => true), // Set font nya jadi bold
      'alignment' => array(
        'horizontal' => PHPExcel_Style_Alignment::HORIZONTAL_CENTER, // Set text jadi ditengah secara horizontal (center)
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    // Buat sebuah variabel untuk menampung pengaturan style dari isi tabel
    $style_row = array(
      'alignment' => array(
        'vertical' => PHPExcel_Style_Alignment::VERTICAL_CENTER // Set text jadi di tengah secara vertical (middle)
      ),
      'borders' => array(
        'top' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border top dengan garis tipis
        'right' => array('style'  => PHPExcel_Style_Border::BORDER_THIN),  // Set border right dengan garis tipis
        'bottom' => array('style'  => PHPExcel_Style_Border::BORDER_THIN), // Set border bottom dengan garis tipis
        'left' => array('style'  => PHPExcel_Style_Border::BORDER_THIN) // Set border left dengan garis tipis
      )
    );
    $excel->setActiveSheetIndex(0)->setCellValue('A1', "DATA MEMBER"); // Set kolom A1 dengan tulisan "DATA SISWA"
    $excel->getActiveSheet()->mergeCells('A1:E1'); // Set Merge Cell pada kolom A1 sampai E1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setBold(TRUE); // Set bold kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getFont()->setSize(15); // Set font size 15 untuk kolom A1
    $excel->getActiveSheet()->getStyle('A1')->getAlignment()->setHorizontal(PHPExcel_Style_Alignment::HORIZONTAL_CENTER); // Set text center untuk kolom A1
    // Buat header tabel nya pada baris ke 3
    $excel->setActiveSheetIndex(0)->setCellValue('A3',"NO"); // SET KOLOM A3 DENGAN TULISAN "NO"
    $excel->setActiveSheetIndex(0)->setCellValue('B3',"TANGGAL"); // SET KOLOM B3 DENGAN TULISAN "NIS"
    $excel->setActiveSheetIndex(0)->setCellValue('C3',"NIK"); // SET KOLOM C3 DENGAN TULISAN "NAMA"
    $excel->setActiveSheetIndex(0)->setCellValue('D3',"NAMA"); // SET KOLOM D3 DENGAN TULISAN "
    $excel->setActiveSheetIndex(0)->setCellValue('E3',"TEMPAT LAHIR"); // SET KOLOM E3 DENGAN TULISAN "ALAMAT"
    $excel->setActiveSheetIndex(0)->setCellValue('F3',"TGL LHR");
    $excel->setActiveSheetIndex(0)->setCellValue('G3',"JENKEL");
    $excel->setActiveSheetIndex(0)->setCellValue('H3',"ALAMAT");
    $excel->setActiveSheetIndex(0)->setCellValue('I3',"KELURAHAN");
    $excel->setActiveSheetIndex(0)->setCellValue('J3',"RT");
    $excel->setActiveSheetIndex(0)->setCellValue('K3',"RW");
    $excel->setActiveSheetIndex(0)->setCellValue('L3',"KECAMATAN");
    $excel->setActiveSheetIndex(0)->setCellValue('M3',"KOTA");
    $excel->setActiveSheetIndex(0)->setCellValue('N3',"PROPINSI");
    $excel->setActiveSheetIndex(0)->setCellValue('O3',"HP");
    $excel->setActiveSheetIndex(0)->setCellValue('P3',"AGAMA");
    $excel->setActiveSheetIndex(0)->setCellValue('Q3',"PEKERJAAN");
    $excel->setActiveSheetIndex(0)->setCellValue('R3',"NAMA INSTITUSI");
    $excel->setActiveSheetIndex(0)->setCellValue('S3',"ALAMAT INSTITUSI");
    $excel->setActiveSheetIndex(0)->setCellValue('T3',"PRODI");
    $excel->setActiveSheetIndex(0)->setCellValue('U3',"KELAS");
    $excel->setActiveSheetIndex(0)->setCellValue('V3',"EMAIL");
    $excel->setActiveSheetIndex(0)->setCellValue('W3',"IBU KANDUNG");
    $excel->setActiveSheetIndex(0)->setCellValue('X3',"NAMA KELUARGA");
    $excel->setActiveSheetIndex(0)->setCellValue('Y3',"STATUS KELUARGA");
    $excel->setActiveSheetIndex(0)->setCellValue('Z3',"HP KELUARGA");

    // Apply style header yang telah kita buat tadi ke masing-masing kolom header
    $excel->getActiveSheet()->getStyle('A3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('B3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('C3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('D3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('E3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('F3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('G3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('H3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('I3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('J3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('K3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('L3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('M3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('N3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('O3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('P3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('Q3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('R3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('S3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('T3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('U3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('V3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('W3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('X3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('Y3')->applyFromArray($style_col);
    $excel->getActiveSheet()->getStyle('Z3')->applyFromArray($style_col);
    // Panggil function view yang ada di SiswaModel untuk menampilkan semua data siswanya
    $member = $this->db->get('member')->result();
    $no = 1; // Untuk penomoran tabel, di awal set dengan 1
    $numrow = 4; // Set baris pertama untuk isi tabel adalah baris ke 4
    foreach($member as $data){ // Lakukan looping pada variabel member
      $excel->setActiveSheetIndex(0)->setCellValue('A'.$numrow, $no);
      $excel->setActiveSheetIndex(0)->setCellValue('B'.$numrow, $data->tgl);
      $excel->setActiveSheetIndex(0)->setCellValue('C'.$numrow, $data->nik);
      $excel->setActiveSheetIndex(0)->setCellValue('D'.$numrow, $data->nama);
      $excel->setActiveSheetIndex(0)->setCellValue('E'.$numrow, $data->tempat_lhr);
      $excel->setActiveSheetIndex(0)->setCellValue('F'.$numrow, $data->tgl_lhr);
      $excel->setActiveSheetIndex(0)->setCellValue('G'.$numrow, $data->jenkel);
      $excel->setActiveSheetIndex(0)->setCellValue('H'.$numrow, $data->alamat);
      $excel->setActiveSheetIndex(0)->setCellValue('I'.$numrow, $data->kelurahan);
      $excel->setActiveSheetIndex(0)->setCellValue('J'.$numrow, $data->rt);
      $excel->setActiveSheetIndex(0)->setCellValue('K'.$numrow, $data->rw);
      $excel->setActiveSheetIndex(0)->setCellValue('L'.$numrow, $data->kecamatan);
      $excel->setActiveSheetIndex(0)->setCellValue('M'.$numrow, $data->kota);
      $excel->setActiveSheetIndex(0)->setCellValue('N'.$numrow, $data->propinsi);
      $excel->setActiveSheetIndex(0)->setCellValue('O'.$numrow, $data->hp);
      $excel->setActiveSheetIndex(0)->setCellValue('P'.$numrow, $data->agama);
      $excel->setActiveSheetIndex(0)->setCellValue('Q'.$numrow, $data->pekerjaan);
      $excel->setActiveSheetIndex(0)->setCellValue('R'.$numrow, $data->namainstitusi);
      $excel->setActiveSheetIndex(0)->setCellValue('S'.$numrow, $data->alamatinstitusi);
      $excel->setActiveSheetIndex(0)->setCellValue('T'.$numrow, $data->prodi);
      $excel->setActiveSheetIndex(0)->setCellValue('U'.$numrow, $data->kelas);
      $excel->setActiveSheetIndex(0)->setCellValue('V'.$numrow, $data->email);
      $excel->setActiveSheetIndex(0)->setCellValue('W'.$numrow, $data->ibukandung);
      $excel->setActiveSheetIndex(0)->setCellValue('X'.$numrow, $data->namakeluarga);
      $excel->setActiveSheetIndex(0)->setCellValue('Y'.$numrow, $data->statuskeluarga);
      $excel->setActiveSheetIndex(0)->setCellValue('Z'.$numrow, $data->hpkeluarga);
      
      // Apply style row yang telah kita buat tadi ke masing-masing baris (isi tabel)
      $excel->getActiveSheet()->getStyle('A'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('B'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('C'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('D'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('E'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('F'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('G'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('H'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('I'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('J'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('K'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('L'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('M'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('N'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('O'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('P'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('Q'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('R'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('S'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('T'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('U'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('V'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('W'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('X'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('Y'.$numrow)->applyFromArray($style_row);
      $excel->getActiveSheet()->getStyle('Z'.$numrow)->applyFromArray($style_row);
      
      $no++; // Tambah 1 setiap kali looping
      $numrow++; // Tambah 1 setiap kali looping
    }
    // Set width kolom
    $excel->getActiveSheet()->getColumnDimension('A')->setWidth(5); // Set width kolom A
    $excel->getActiveSheet()->getColumnDimension('B')->setWidth(15); // Set width kolom B
    $excel->getActiveSheet()->getColumnDimension('C')->setWidth(25); // Set width kolom C
    $excel->getActiveSheet()->getColumnDimension('D')->setWidth(20); // Set width kolom D
    $excel->getActiveSheet()->getColumnDimension('E')->setWidth(30); // Set width kolom E
      $excel->getActiveSheet()->getColumnDimension('F')->setWidth(30); // 
      $excel->getActiveSheet()->getColumnDimension('G')->setWidth(30); // 
      $excel->getActiveSheet()->getColumnDimension('H')->setWidth(30); // 
      $excel->getActiveSheet()->getColumnDimension('I')->setWidth(30); // 
      $excel->getActiveSheet()->getColumnDimension('J')->setWidth(30); // 
      $excel->getActiveSheet()->getColumnDimension('K')->setWidth(30); // 
      $excel->getActiveSheet()->getColumnDimension('L')->setWidth(30); // 
      $excel->getActiveSheet()->getColumnDimension('M')->setWidth(30); // 
      $excel->getActiveSheet()->getColumnDimension('N')->setWidth(30); // 
      $excel->getActiveSheet()->getColumnDimension('O')->setWidth(30); // 
      $excel->getActiveSheet()->getColumnDimension('P')->setWidth(30); // 
      $excel->getActiveSheet()->getColumnDimension('Q')->setWidth(30); // 
      $excel->getActiveSheet()->getColumnDimension('R')->setWidth(30); // 
      $excel->getActiveSheet()->getColumnDimension('S')->setWidth(30); // 
      $excel->getActiveSheet()->getColumnDimension('T')->setWidth(30); // 
      $excel->getActiveSheet()->getColumnDimension('U')->setWidth(30); // 
      $excel->getActiveSheet()->getColumnDimension('V')->setWidth(30); // 
      $excel->getActiveSheet()->getColumnDimension('W')->setWidth(30); // 
      $excel->getActiveSheet()->getColumnDimension('X')->setWidth(30); // 
      $excel->getActiveSheet()->getColumnDimension('Y')->setWidth(30); // 
      $excel->getActiveSheet()->getColumnDimension('Z')->setWidth(30); // 
    
    // Set height semua kolom menjadi auto (mengikuti height isi dari kolommnya, jadi otomatis)
    $excel->getActiveSheet()->getDefaultRowDimension()->setRowHeight(-1);
    // Set orientasi kertas jadi LANDSCAPE
    $excel->getActiveSheet()->getPageSetup()->setOrientation(PHPExcel_Worksheet_PageSetup::ORIENTATION_LANDSCAPE);
    // Set judul file excel nya
    $excel->getActiveSheet(0)->setTitle("Data Member ".date("Y-m-d")."");
    $excel->setActiveSheetIndex(0);
    // Proses file excel
    $tgl = date("d-M-Y");
    header('Content-Type: application/vnd.openxmlformats-officedocument.spreadsheetml.sheet');
    header('Content-Disposition: attachment; filename="Data Member '.$tgl.'.xlsx"'); // Set nama file excel nya
    header('Cache-Control: max-age=0');
    $write = PHPExcel_IOFactory::createWriter($excel, 'Excel2007');
    $write->save('php://output');
  }

		
	function hapus($id){
		$data=$this->db->query("select * from member where id=$id")->result_array();
		$this->db->where('id_member',$id);
		$this->db->delete('link');
	}

	function get_data($id=''){
		$data = $this->db->get_where('member', array('id_member' => $id))->result();
		foreach($data as $d => $isi){
			$json = array(
				'id_member' => $isi->id_member,
				'tgl' => $isi->tgl,
				'nik' => $isi->nik,
				'nama' => $isi->nama,
				'tempat_lhr' => $isi->tempat_lhr,
				'tgl_lhr' => $isi->tgl_lhr,
				'jenkel' => $isi->jenkel,
				'alamat' => $isi->alamat,
				'kelurahan' => $isi->kelurahan,
				'rt' => $isi->rt,
				'rw' => $isi->rw,
				'kecamatan' => $isi->kecamatan,
				'kota' => $isi->kota,
				'propinsi' => $isi->propinsi,
				'hp' => $isi->hp,
				'agama' => $isi->agama,
				'pekerjaan' => $isi->pekerjaan,
				'namainstitusi' => $isi->namainstitusi,
				'alamatinstitusi' => $isi->alamatinstitusi,
				'prodi' => $isi->prodi,
				'kelas' => $isi->kelas,
				'email' => $isi->email,
				'ibukandung' => $isi->ibukandung,
				'namakeluarga' => $isi->namakeluarga,
				'statuskeluarga' => $isi->statuskeluarga,
				'hpkeluarga' => $isi->hpkeluarga
			);
		}
		echo json_encode($json);
	}
}