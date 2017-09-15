<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Dashboard extends CI_Controller {

	public function __construct (){
		parent::__construct();
		if($this->session->userdata('loggedin') != TRUE AND $this->session->userdata('akses') != 'admin') {
			$data = array(
				'title' => 'Warning',
				'type' => 'danger',
		  		'text' => 'You should login first!'
		    );
	 	 	$this->session->set_flashdata('message',$data);
			redirect('login');
		}
	}

	public function index() {
		$data['addONS'] = '';
		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }
        
		$data['subview'] = $this->load->view('templates/backend/dashboard', $data, TRUE);
		$this->load->view('templates/_layout_base',$data);
	}
}
