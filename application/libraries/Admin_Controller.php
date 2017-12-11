<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Admin_Controller extends MY_Controller{

	function __construct (){
		parent::__construct();
		$this->load->helper('andhana');

		$this->data['folBACKEND'] = $this->data['folder_admin'];
		$this->data['backendDIR'] = 'templates/backend/';
        $this->data['asback'] = 'assets/backend/templates/';
		$this->data['asbackbower'] = 'assets/backend/bower_components/';
		$this->data['rootDIR'] = 'templates/';
        $this->data['asfront'] = 'assets/frontend/';
        $this->data['emailadmin'] = 'magicwarms@gmail.com';
        if($this->session->userdata('loggedin') != TRUE OR $this->session->userdata('akses') != 'admin') {
            $data = array(
                'title' => 'Warning',
                'type' => 'danger',
                'text' => 'You should login first!'
            );
            $this->session->set_flashdata('message',$data);
            redirect('login');
        }
	}

	function mail_config(){
        $config['protocol'] = 'smtp';
        $config['smtp_host'] = ''; 
        $config['smtp_port'] = '587'; 
        $config['smtp_timeout'] = 30;
        $config['smtp_user'] = '';
        $config['smtp_pass'] = '';
        $config['mailtype'] = 'html';
        $config['charset'] = 'iso-8859-1';
        $config['wordwrap'] = TRUE;
        $config['validate'] = TRUE;
        $config['newline'] = "\r\n";
        return $config;
    }
}