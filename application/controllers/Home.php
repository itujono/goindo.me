<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {

	public function __construct (){
		parent::__construct();
		$this->load->model('Province_m');
		$this->load->model('More_province_m');
	}

	public function index() {
		$data['listprovince'] = $this->Province_m->selectall_province()->result();
		$id = 4;
		$data['getprovince'] = $this->Province_m->selectall_province($id)->row();
		$map = directory_map('assets/upload/province/pic-province-'.replacesymbolforslug($data['getprovince']->namePROVINCE), FALSE, TRUE);
		
		if (empty($map)) {
			$data['getprovince']->imagePROVINCE = '';
		} else {
			$data['getprovince']->imagePROVINCE = base_url() . 'assets/upload/province/pic-province-'.replacesymbolforslug($data['getprovince']->namePROVINCE).'/'.$map[0];
		}

		$data['moreprovince'] = $this->More_province_m->selectall_more_desc(NULL,NULL,$id)->result();
		$this->load->view('templates/frontend/home',$data);
	}
}
