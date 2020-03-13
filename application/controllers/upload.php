<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Upload extends CI_Controller{
	function __construct(){
		parent::__construct();
		$this->load->library('Spreadsheet_Excel_Reader');
	}
	
	function index(){
		
	}
}