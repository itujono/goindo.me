<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class User_m extends MY_Model{
	
	protected $_table_name = 'goindo_users_admin';
	protected $_order_by = 'idADMIN';
	protected $_primary_key = 'idADMIN';

	public $rules_login = array(
		'email' => array(
			'field' => 'email',
			'label' => 'Email',
			'rules' => 'trim|required|valid_email'
			),
		'password' => array(
			'field' => 'password',
			'label' => 'Kata sandi',
			'rules' => 'trim|required|min_length[8]'
			),
		);

	function __construct (){
		parent::__construct();
	}

	public function get_new(){
		$new = new stdClass();
		$new->idADMIN = '';
		$new->emailADMIN = '';
		$new->passwordADMIN = '';
		return $new;
	}

	public function hash ($string){
		return hash('sha512', $string . config_item('encryption_key'));
	}

	public function login($email, $pass){

		$datalog = array(
			'emailADMIN' => $email,
			'passwordADMIN' => $this->hash($pass)
		);

		$Administrator = $this->db->get_where('goindo_users_admin',$datalog)->row();
		if(count($Administrator)){
			$data = array(
				'Email' => $Administrator->emailADMIN,
				'idUSER' => $Administrator->idADMIN,
				'akses' => 'admin',
				'loggedin' => TRUE,
			);
			$this->session->set_userdata($data);
			return "ADMIN";
		}
	}

	public function logout(){
		$this->session->sess_destroy();
	}
}