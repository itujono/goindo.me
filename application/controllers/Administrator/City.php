<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class City extends Admin_Controller {

	public function __construct (){
		parent::__construct();
		$this->load->model('City_m');
		$this->load->model('Province_m');
	}

	public function index_city($id = NULL){
		$data['addONS'] = 'plugins_datatables';
		$id = decode(urldecode($id));

		$data['listcity'] = $this->City_m->selectall_city()->result();
		
		foreach ($data['listcity'] as $key => $value) {

			if($value->statusCITY == 1){
				$status='<a href="#" data-uk-tooltip title="Aktif"><i class="material-icons md-36 uk-text-success">&#xE86C;</i></a>';
			} else {
				$status='<a href="#" data-uk-tooltip title="Tak Aktif"><i class="material-icons  md-36 uk-text-danger">&#xE5C9;</i></a>';
			}
			$data['listcity'][$key]->status = $status;
		}

		if($id == NULL){
	        $data['tab'] = array(
	            'data-tab' => 'uk-active',
	            'form-tab' => '',
	        );
			$data['getcity'] = $this->City_m->get_new();
		} else {
			
			//conf tab (optional)
	        $data['tab'] = array(
	            'data-tab' => '',
	            'form-tab' => 'uk-active',
	        );
			$data['getcity'] = $this->City_m->selectall_city($id)->row();
		}
		$data['getprovince'] = $this->Province_m->dropdown_getprovince(1);
		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }

		$data['subview'] = $this->load->view($this->data['backendDIR'].'city', $data, TRUE);
		$this->load->view('templates/_layout_base',$data);
	}

	public function savecity() {
		if(empty($this->input->post('nameCITY'))){
			$rules = $this->City_m->rules_city;
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_message('required', 'Form %s tidak boleh dikosongkan');
	        $this->form_validation->set_message('trim', 'Form %s adalah Trim');
	        $this->form_validation->set_message('is_unique', 'Duplicate Province Name');

			if ($this->form_validation->run() == TRUE) {
				$data = $this->City_m->array_from_post(array('nameCITY','idPROVINCE','statusCITY'));
				if($data['statusCITY'] == 'on')$data['statusCITY']=1;
				else $data['statusCITY']=0;
				$id = decode(urldecode($this->input->post('idCITY')));

				if(empty($id))$id=NULL;
				$data = $this->security->xss_clean($data);
		      	if ($this->City_m->save($data, $id)) {
		        	$data = array(
		            	'title' => 'Success',
	                    'text' => 'Successfully Saved',
	                    'type' => 'success'
		          	);
		        	$this->session->set_flashdata('message', $data);
		  			redirect('Administrator/city/index_city');
		   		}

			} else {
					$data = array(
			            'title' => 'Warning',
			            'text' => 'please check your input.',
			            'type' => 'warning'
			        );
		        $this->session->set_flashdata('message',$data);
		        $this->index_city();
			}
		} else {
			$data = $this->City_m->array_from_post(array('nameCITY','idPROVINCE','statusCITY'));
			if($data['statusCITY'] == 'on')$data['statusCITY']=1;
			else $data['statusCITY']=0;
			$id = decode(urldecode($this->input->post('idCITY')));

			if(empty($id))$id=NULL;
			$data = $this->security->xss_clean($data);
	      	if ($this->City_m->save($data, $id)) {
	        	$data = array(
	            	'title' => 'Success',
                    'text' => 'Successfully Saved',
                    'type' => 'success'
	          	);
	        	$this->session->set_flashdata('message', $data);
	  			redirect('Administrator/city/index_city');
	   		}
		}
	}

	public function actiondelete_city($id=NULL){
		$id = decode(urldecode($id));
		if($id != 0){
			$this->City_m->delete($id);
			$data = array(
                    'title' => 'Success',
                    'text' => 'Successfully Deleted',
                    'type' => 'success'
                );
                $this->session->set_flashdata('message',$data);
                redirect('Administrator/city/index_city');
		}else{
			$data = array(
	            'title' => 'Error',
	            'text' => 'Sorry, your data is not successfully deleted, please check back later.',
	            'type' => 'error'
		        );
		        $this->session->set_flashdata('message',$data);
		        redirect('Administrator/city/index_city');
		}
	}

	public function actionchange_status_city($id=NULL , $id2=NULL){
		$id = decode(urldecode($id));
		$ss = 0;
		if($id2 != NULL)$ss = 1;
		if($id != 0){
			$data['statusCITY'] = $ss;
			$this->City_m->save($data, $id);
			$data = array(
                    'title' => 'Success',
                    'text' => 'Successfully Deleted',
                    'type' => 'success'
                );
                $this->session->set_flashdata('message',$data);
                redirect('Administrator/city/index_city');
		}else{
			$data = array(
		            'title' => 'Error',
		            'text' => 'Sorry, your data is not successfully changed, please check back later.',
		            'type' => 'error'
		        );
		        $this->session->set_flashdata('message',$data);
		        redirect('Administrator/city/index_city');
		}
	}
}