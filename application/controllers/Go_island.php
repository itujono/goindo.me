<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Go_island extends CI_Controller {

	public function __construct (){
		parent::__construct();
		$this->load->model('Island_m');
		$this->load->model('More_island_m');
	}

	public function d($id=NULL) {
		$data['listisland'] = $this->Island_m->selectall_island()->result();
		$data['getisland'] = $this->Island_m->selectall_island($id)->row();
		$map = directory_map('assets/upload/island/pic-island-'.replacesymbolforslug($data['getisland']->nameISLAND), FALSE, TRUE);
		
		if (empty($map)) {
			$data['getisland']->imageISLAND = '';
		} else {
			$data['getisland']->imageISLAND = base_url() . 'assets/upload/island/pic-island-'.replacesymbolforslug($data['getisland']->nameISLAND).'/'.$map[0];
		}

		$data['moreisland'] = $this->More_island_m->selectall_more_desc(NULL,NULL,$id)->result();
		$this->load->view('templates/frontend/home',$data);
	}
}
