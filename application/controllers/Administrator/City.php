<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class City extends CI_Controller{

	public function __construct (){
		parent::__construct();
		$this->load->model('City_m');
		$this->load->model('Province_m');
	}

	public function index (){
		$this->citylist();
	}

	public function citylist($id = NULL){
		$data['addONS'] = 'plugins_datatables';
		$id = decode(urldecode($id));

		$data['listcity'] = $this->City_m->selectall_city()->result();

		foreach ($data['listcity'] as $key => $value) {
			$map = directory_map('assets/upload/city/pic-city-'.replacesymbolforslug($data['listcity'][$key]->nameCITY), FALSE, TRUE);
			
			if (empty($map)) {
				$data['listcity'][$key]->imageCITY = base_url() . 'assets/upload/no-image-available.png';
			} else {
				$data['listcity'][$key]->imageCITY = base_url() . 'assets/upload/city/pic-city-'.replacesymbolforslug($data['listcity'][$key]->nameCITY).'/'.$map[0];
			}

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
			$map = directory_map('assets/upload/city/pic-city-'.replacesymbolforslug($data['getcity']->nameCITY), FALSE, TRUE);
			
			if (empty($map)) {
				$data['getcity']->imageCITY = '';
			} else {
				$data['getcity']->imageCITY = base_url() . 'assets/upload/city/pic-city-'.replacesymbolforslug($data['getcity']->nameCITY).'/'.$map[0];
			}
		}

		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }
        $data['getprovince'] = $this->Province_m->dropdown_getprovince(1);
		$data['subview'] = $this->load->view('templates/backend/city', $data, TRUE);
		$this->load->view('templates/_layout_base',$data);
	}

	public function savecity() {
		$rules = $this->City_m->rules_city;
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_message('required', 'Form %s tidak boleh dikosongkan');
        $this->form_validation->set_message('trim', 'Form %s adalah Trim');

		if ($this->form_validation->run() == TRUE) {
			$data = $this->City_m->array_from_post(array('idPROVINCE','nameCITY','statusCITY'));
			if($data['statusCITY'] == 'on')$data['statusCITY']=1;
			else $data['statusCITY']=0;
			$id = decode(urldecode($this->input->post('idCITY')));

			if(empty($id))$id=NULL;
			$subject = $this->input->post('nameCITY');
			$filenamesubject = 'pic-city-'.replacesymbolforslug($subject);

			$data = $this->security->xss_clean($data);
			$this->City_m->save($data, $id);

			$path = 'assets/upload/city/'.$filenamesubject;
			$map = directory_map($path, FALSE, TRUE);

			if (!file_exists( $path )){
            	mkdir($path, 0777, true);
        	}

			$config['upload_path']          = $path;
	      	$config['allowed_types']        = 'jpg|png|jpeg';
	      	$config['overwrite']             = TRUE;
	      	$config['file_name']             = $this->security->sanitize_filename($filenamesubject);

	      	$this->upload->initialize($config);

	      	if ($this->upload->do_upload('imgCITY')) {

				$data['uploads'] = $this->upload->data();
	        	$data = array(
	            	'title' => 'Sukses',
                    'text' => 'Penyimpanan Data berhasil dilakukan',
                    'type' => 'success'
	          	);
	        	
	   		} else {

				$data = array(
					'title' => 'Sukses',
                    'text' => 'Penyimpanan Data berhasil dilakukan',
                    'type' => 'success'
				);
      		}
	    	$this->session->set_flashdata('message', $data);
	  		redirect('Administrator/city');

		} else {
				$data = array(
		            'title' => 'Terjadi Kesalahan',
		            'text' => 'mohon ulangi inputan form anda dibawah.',
		            'type' => 'warning'
		        );
	        $this->session->set_flashdata('message',$data);
	        $this->citylist();
		}
	}

	public function actiondelete($id=NULL){
		$id = decode(urldecode($id));
		if($id != 0){
			$this->City_m->delete($id);
			$data = array(
                    'title' => 'Sukses',
                    'text' => 'Penghapusan Data berhasil dilakukan',
                    'type' => 'success'
                );
                $this->session->set_flashdata('message',$data);
                redirect('Administrator/city');
		}else{
			$data = array(
	            'title' => 'Terjadi Kesalahan',
	            'text' => 'Maaf, data tidak berhasil dihapus silakan coba beberapa saat kembali',
	            'type' => 'error'
		        );
		        $this->session->set_flashdata('message',$data);
		        redirect('Administrator/city');
		}
	}

	public function deleteimgcity($id1=NULL){
		if($id1 != NULL){
			$id = decode(urldecode($id1));
			$citydata = $this->City_m->selectall_city($id)->row();
			$map = directory_map('assets/upload/city/pic-city-'.replacesymbolforslug($citydata->nameCITY), FALSE, TRUE);
			$path = 'assets/upload/city/pic-city-'.replacesymbolforslug($citydata->nameCITY);
			foreach ($map as $value) {
				unlink('assets/upload/city/pic-city-'.replacesymbolforslug($citydata->nameCITY).'/'.$value);
			}
			if(is_dir($path)){
				rmdir($path);
			}
		}
		redirect('Administrator/city/citylist/'.$id1);
	}
}