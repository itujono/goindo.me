<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends Admin_Controller {

	public function __construct (){
		parent::__construct();
	}

	public function index_dashboard() {
		$data['addONS'] = '';
		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }
        
		$data['subview'] = $this->load->view('templates/backend/dashboard', $data, TRUE);
		$this->load->view('templates/_layout_base',$data);
	}
}
