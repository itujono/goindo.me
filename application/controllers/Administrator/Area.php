<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Area extends Admin_Controller {

	public function __construct (){
		parent::__construct();
		$this->load->model('Area_m');
		$this->load->model('City_m');
	}

	public function index_area($id = NULL){
		$data['addONS'] = 'plugins_datatables';
		$id = decode(urldecode($id));

		$data['listarea'] = $this->Area_m->selectall_area()->result();
		
		foreach ($data['listarea'] as $key => $value) {

			if($value->statusAREA == 1){
				$status='<a href="#" data-uk-tooltip title="Aktif"><i class="material-icons md-36 uk-text-success">&#xE86C;</i></a>';
			} else {
				$status='<a href="#" data-uk-tooltip title="Tak Aktif"><i class="material-icons  md-36 uk-text-danger">&#xE5C9;</i></a>';
			}
			$data['listarea'][$key]->status = $status;
		}

		if($id == NULL){
	        $data['tab'] = array(
	            'data-tab' => 'uk-active',
	            'form-tab' => '',
	        );
			$data['getarea'] = $this->Area_m->get_new();
		} else {
			
			//conf tab (optional)
	        $data['tab'] = array(
	            'data-tab' => '',
	            'form-tab' => 'uk-active',
	        );
			$data['getarea'] = $this->Area_m->selectall_area($id)->row();
		}
		$data['getcity'] = $this->City_m->dropdown_getcity(1);
		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }

		$data['subview'] = $this->load->view($this->data['backendDIR'].'area', $data, TRUE);
		$this->load->view('templates/_layout_base',$data);
	}

	public function savearea() {
		if(empty($this->input->post('nameAREA'))){
			$rules = $this->Area_m->rules_area;
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_message('required', 'Form %s tidak boleh dikosongkan');
	        $this->form_validation->set_message('trim', 'Form %s adalah Trim');
	        $this->form_validation->set_message('is_unique', 'Duplicate Province Name');

			if ($this->form_validation->run() == TRUE) {
				$data = $this->Area_m->array_from_post(array('nameAREA','idCITY','statusAREA'));
				if($data['statusAREA'] == 'on')$data['statusAREA']=1;
				else $data['statusAREA']=0;
				$id = decode(urldecode($this->input->post('idAREA')));

				if(empty($id))$id=NULL;
				$data = $this->security->xss_clean($data);
		      	if ($this->Area_m->save($data, $id)) {
		        	$data = array(
		            	'title' => 'Success',
	                    'text' => 'Successfully Saved',
	                    'type' => 'success'
		          	);
		        	$this->session->set_flashdata('message', $data);
		  			redirect('Administrator/area/index_area');
		   		}

			} else {
					$data = array(
			            'title' => 'Warning',
			            'text' => 'please check your input.',
			            'type' => 'warning'
			        );
		        $this->session->set_flashdata('message',$data);
		        $this->index_area();
			}
		} else {
			$data = $this->Area_m->array_from_post(array('nameAREA','idCITY','statusAREA'));
			if($data['statusAREA'] == 'on')$data['statusAREA']=1;
			else $data['statusAREA']=0;
			$id = decode(urldecode($this->input->post('idAREA')));

			if(empty($id))$id=NULL;
			$data = $this->security->xss_clean($data);
	      	if ($this->Area_m->save($data, $id)) {
	        	$data = array(
	            	'title' => 'Success',
                    'text' => 'Successfully Saved',
                    'type' => 'success'
	          	);
	        	$this->session->set_flashdata('message', $data);
	  			redirect('Administrator/area/index_area');
	   		}
		}
	}

	public function actiondelete_area($id=NULL){
		$id = decode(urldecode($id));
		if($id != 0){
			$this->Area_m->delete($id);
			$data = array(
                    'title' => 'Success',
                    'text' => 'Successfully Deleted',
                    'type' => 'success'
                );
                $this->session->set_flashdata('message',$data);
                redirect('Administrator/area/index_area');
		}else{
			$data = array(
		            'title' => 'Error',
		            'text' => 'Sorry, your data is not successfully deleted, please check back later.',
		            'type' => 'error'
		        );
		        $this->session->set_flashdata('message',$data);
		        redirect('Administrator/area/index_area');
		}
	}

	public function actionchange_status_area($id=NULL , $id2=NULL){
		$id = decode(urldecode($id));
		$ss = 0;
		if($id2 != NULL)$ss = 1;
		if($id != 0){
			$data['statusAREA'] = $ss;
			$this->Area_m->save($data, $id);
			$data = array(
                    'title' => 'Success',
                    'text' => 'Successfully Deleted',
                    'type' => 'success'
                );
                $this->session->set_flashdata('message',$data);
                redirect('Administrator/area/index_area');
		}else{
			$data = array(
		            'title' => 'Error',
		            'text' => 'Sorry, your data is not successfully changed, please check back later.',
		            'type' => 'error'
		        );
		        $this->session->set_flashdata('message',$data);
		        redirect('Administrator/area/index_area');
		}
	}
}