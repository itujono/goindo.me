<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Province extends Admin_Controller{

	public function __construct (){
		parent::__construct();
		$this->load->model('Province_m');
		$this->load->model('More_province_m');
	}

	public function index_province($id = NULL){
		$data['addONS'] = 'plugins_datatables';
		$id = decode(urldecode($id));

		$data['listprovince'] = $this->Province_m->selectall_province()->result();

		foreach ($data['listprovince'] as $key => $value) {

			if($value->statusPROVINCE == 1){
				$status='<a href="#" data-uk-tooltip title="Aktif"><i class="material-icons md-36 uk-text-success">&#xE86C;</i></a>';
			} else {
				$status='<a href="#" data-uk-tooltip title="Tak Aktif"><i class="material-icons  md-36 uk-text-danger">&#xE5C9;</i></a>';
			}
			$data['listprovince'][$key]->status = $status;
		}

		if($id == NULL){
	        $data['tab'] = array(
	            'data-tab' => 'uk-active',
	            'form-tab' => '',
	        );
			$data['getprovince'] = $this->Province_m->get_new();
		} else {
			
			//conf tab (optional)
	        $data['tab'] = array(
	            'data-tab' => '',
	            'form-tab' => 'uk-active',
	        );
			$data['getprovince'] = $this->Province_m->selectall_province($id)->row();
		}

		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }

		$data['subview'] = $this->load->view($this->data['backendDIR'].'province', $data, TRUE);
		$this->load->view('templates/_layout_base',$data);
	}

	public function saveprovince() {
		if(empty($this->input->post('namePROVINCE'))){
			$rules = $this->Province_m->rules_province;
			$this->form_validation->set_rules($rules);
			$this->form_validation->set_message('required', 'Form %s tidak boleh dikosongkan');
	        $this->form_validation->set_message('trim', 'Form %s adalah Trim');
	        $this->form_validation->set_message('is_unique', 'Duplicate Province Name');

			if ($this->form_validation->run() == TRUE) {
				$data = $this->Province_m->array_from_post(array('namePROVINCE','statusPROVINCE'));
				if($data['statusPROVINCE'] == 'on')$data['statusPROVINCE']=1;
				else $data['statusPROVINCE']=0;
				$id = decode(urldecode($this->input->post('idPROVINCE')));

				if(empty($id))$id=NULL;
				$data = $this->security->xss_clean($data);
		      	if ($this->Province_m->save($data, $id)) {
		        	$data = array(
		            	'title' => 'Success',
	                    'text' => 'Successfully Saved',
	                    'type' => 'success'
		          	);
		        	$this->session->set_flashdata('message', $data);
		  			redirect('Administrator/province/index_province');
		   		}

			} else {
					$data = array(
			            'title' => 'Warning',
			            'text' => 'please check your input.',
			            'type' => 'warning'
			        );
		        $this->session->set_flashdata('message',$data);
		        $this->index_province();
			}
		} else {
			$data = $this->Province_m->array_from_post(array('namePROVINCE','statusPROVINCE'));
			if($data['statusPROVINCE'] == 'on')$data['statusPROVINCE']=1;
			else $data['statusPROVINCE']=0;
			$id = decode(urldecode($this->input->post('idPROVINCE')));

			if(empty($id))$id=NULL;
			$data = $this->security->xss_clean($data);
	      	if ($this->Province_m->save($data, $id)) {
	        	$data = array(
	            	'title' => 'Success',
                    'text' => 'Successfully Saved',
                    'type' => 'success'
	          	);
	        	$this->session->set_flashdata('message', $data);
	  			redirect('Administrator/province/index_province');
	   		}
		}
	}

	public function actiondelete_province($id=NULL){
		$id = decode(urldecode($id));
		if($id != 0){
			$this->Province_m->delete($id);
			$data = array(
                    'title' => 'Success',
                    'text' => 'Successfully Deleted',
                    'type' => 'success'
                );
                $this->session->set_flashdata('message',$data);
                redirect('Administrator/province/index_province');
		}else{
			$data = array(
	            'title' => 'Error',
	            'text' => 'Sorry, your data is not successfully deleted, please check back later.',
	            'type' => 'error'
		        );
		        $this->session->set_flashdata('message',$data);
		        redirect('Administrator/province/index_province');
		}
	}

	public function actionchange_status_province($id=NULL , $id2=NULL){
		$id = decode(urldecode($id));
		$ss = 0;

		if($id2 != NULL)$ss = 1;
		if($id != 0){
			$data['statusPROVINCE'] = $ss;
			$this->Province_m->save($data, $id);
			$data = array(
                    'title' => 'Sukses',
                    'text' => 'Perubahan Data berhasil dilakukan',
                    'type' => 'success'
                );
                $this->session->set_flashdata('message',$data);
                redirect('Administrator/province/index_province');
		}else{
			$data = array(
	            'title' => 'Terjadi Kesalahan',
	            'text' => 'Maaf, Sesuatu yang memalukan terjadi',
	            'type' => 'error'
		        );
		        $this->session->set_flashdata('message',$data);
		        redirect('Administrator/province/index_province');
		}
	}
}