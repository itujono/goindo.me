<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {

	public function __construct (){
		parent::__construct();
		$this->load->model('User_m');
	}

	public function index() {

		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        } else {
        	$data['message'] = '';
        }

		$this->load->view('login', $data);
	}

	public function processing(){
			
		$rules = $this->User_m->rules_login;
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_message('required', 'Form %s tidak boleh dikosongkan');
		$this->form_validation->set_message('min_length', 'Form %s minimal 8 karakter');
		$this->form_validation->set_message('valid_email', 'Email anda tidak valid');

		if($this->form_validation->run() == TRUE){
			
			$email = $this->input->post('email');
			$pass = $this->input->post('password');

			if ($this->User_m->login($email, $pass) == "ADMIN") {
				
				$data = array(
		            'title' => 'Welcome!',
		            'text' => 'Hallo, Selamat datang '. $this->session->userdata('Email').' !',
		            'type' => 'success'
		        );
		        $this->session->set_flashdata('message',$data);
				redirect('administrator/dashboard');

			} elseif($this->User_m->login($email, $pass) == "USER"){

				$data = array(
		            'text' => 'Hallo, Selamat datang '. $this->session->userdata('Email').' !',
		        );
		        
		        $this->session->set_flashdata('message',$data);
				redirect('user_dashboard');

			}  else {
				$data = array(
			  		'text' => 'email atau kata sandi yang anda masukkan salah'
			    );
		 	 	$this->session->set_flashdata('message',$data);
				redirect('login');
			}
			
		} else {
			$data = array(
	            'text' => 'Silakan ulangi email anda kata sandi anda dibawah!'
        	);
	        $this->session->set_flashdata('message',$data);
			$this->index();
		}
	}

	public function Logout (){
		$this->User_m->logout();
		$data = array(
			'title' => 'Success',
			'type' => 'success',
	  		'text' => 'Successfully Logout'
	    );
 	 	$this->session->set_flashdata('message',$data);
		$this->index();
	}
}
