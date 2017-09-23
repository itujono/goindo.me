<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Province extends CI_Controller{

	public function __construct (){
		parent::__construct();
		$this->load->model('Province_m');
		$this->load->model('More_province_m');
	}

	public function index (){
		$this->provincelist();
	}

	public function provincelist($id = NULL){
		$data['addONS'] = 'plugins_datatables';
		$id = decode(urldecode($id));

		$data['listprovince'] = $this->Province_m->selectall_province()->result();

		foreach ($data['listprovince'] as $key => $value) {
			$map = directory_map('assets/upload/province/pic-province-'.replacesymbolforslug($data['listprovince'][$key]->namePROVINCE), FALSE, TRUE);
			
			if (empty($map)) {
				$data['listprovince'][$key]->imagePROVINCE = base_url() . 'assets/upload/no-image-available.png';
			} else {
				$data['listprovince'][$key]->imagePROVINCE = base_url() . 'assets/upload/province/pic-province-'.replacesymbolforslug($data['listprovince'][$key]->namePROVINCE).'/'.$map[0];
			}

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
			$map = directory_map('assets/upload/province/pic-province-'.replacesymbolforslug($data['getprovince']->namePROVINCE), FALSE, TRUE);
			
			if (empty($map)) {
				$data['getprovince']->imagePROVINCE = '';
			} else {
				$data['getprovince']->imagePROVINCE = base_url() . 'assets/upload/province/pic-province-'.replacesymbolforslug($data['getprovince']->namePROVINCE).'/'.$map[0];
			}
		}

		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }

		$data['subview'] = $this->load->view('templates/backend/province', $data, TRUE);
		$this->load->view('templates/_layout_base',$data);
	}

	public function saveprovince() {
		$rules = $this->Province_m->rules_province;
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_message('required', 'Form %s tidak boleh dikosongkan');
        $this->form_validation->set_message('trim', 'Form %s adalah Trim');

		if ($this->form_validation->run() == TRUE) {
			$data = $this->Province_m->array_from_post(array('namePROVINCE','populationPROVINCE','statusPROVINCE','densityPROVINCE','areaPROVINCE','capitalPROVINCE','largestcityPROVINCE','descPROVINCE'));
			if($data['statusPROVINCE'] == 'on')$data['statusPROVINCE']=1;
			else $data['statusPROVINCE']=0;
			$id = decode(urldecode($this->input->post('idPROVINCE')));

			if(empty($id))$id=NULL;
			$subject = $this->input->post('namePROVINCE');
			$filenamesubject = 'pic-province-'.replacesymbolforslug($subject);

			$data = $this->security->xss_clean($data);
			$this->Province_m->save($data, $id);

			$path = 'assets/upload/province/'.$filenamesubject;
			$map = directory_map($path, FALSE, TRUE);

			if (!file_exists( $path )){
            	mkdir($path, 0777, true);
        	}

			$config['upload_path']          = $path;
	      	$config['allowed_types']        = 'jpg|png|jpeg';
	      	$config['overwrite']             = TRUE;
	      	$config['file_name']             = $this->security->sanitize_filename($filenamesubject);

	      	$this->upload->initialize($config);

	      	if ($this->upload->do_upload('imgPROVINCE')) {

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
	  		redirect('Administrator/province');

		} else {
				$data = array(
		            'title' => 'Terjadi Kesalahan',
		            'text' => 'mohon ulangi inputan form anda dibawah.',
		            'type' => 'warning'
		        );
	        $this->session->set_flashdata('message',$data);
	        $this->provincelist();
		}
	}

	public function actionedit($id=NULL , $id2=NULL){
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
                redirect('Administrator/province');
		}else{
			$data = array(
	            'title' => 'Terjadi Kesalahan',
	            'text' => 'Maaf, data tidak berhasil dirubah silakan coba beberapa saat kembali',
	            'type' => 'error'
		        );
		        $this->session->set_flashdata('message',$data);
		        redirect('Administrator/province');
		}
	}

	public function deleteimgprovince($id1=NULL){
		if($id1 != NULL){
			$id = decode(urldecode($id1));
			$provincedata = $this->Province_m->selectall_province($id)->row();
			$map = directory_map('assets/upload/province/pic-province-'.replacesymbolforslug($provincedata->namePROVINCE), FALSE, TRUE);
			$path = 'assets/upload/province/pic-province-'.replacesymbolforslug($provincedata->namePROVINCE);
			foreach ($map as $value) {
				unlink('assets/upload/province/pic-province-'.replacesymbolforslug($provincedata->namePROVINCE).'/'.$value);
			}
			if(is_dir($path)){
				rmdir($path);
			}
		}
		redirect('Administrator/province/provincelist/'.$id1);
	}

	public function more_desc_provincelist($id = NULL){
		$data['addONS'] = 'plugins_datatables';
		$id = decode(urldecode($id));

		$data['moreprovince'] = $this->More_province_m->selectall_more_desc()->result();
		
		foreach ($data['moreprovince'] as $key => $value) {

			if($value->statusPROVINCE == 1){
				$status='<a href="#" data-uk-tooltip title="Aktif"><i class="material-icons md-36 uk-text-success">&#xE86C;</i></a>';
			} else {
				$status='<a href="#" data-uk-tooltip title="Tak Aktif"><i class="material-icons  md-36 uk-text-danger">&#xE5C9;</i></a>';
			}
			$data['moreprovince'][$key]->status = $status;
		}

		if($id == NULL){
	        $data['tab'] = array(
	            'data-tab' => 'uk-active',
	            'form-tab' => '',
	        );
			$data['getmore'] = $this->More_province_m->get_new();
		} else {
			
			//conf tab (optional)
	        $data['tab'] = array(
	            'data-tab' => '',
	            'form-tab' => 'uk-active',
	        );
			$data['getmore'] = $this->More_province_m->selectall_more_desc($id)->row();
		}

		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }
        $data['getprovince'] = $this->Province_m->dropdown_getprovince(1);
		$data['subview'] = $this->load->view('templates/backend/more_province', $data, TRUE);
		$this->load->view('templates/_layout_base',$data);
	}

	public function save_descprovince() {
		$rules = $this->More_province_m->rules_moreprovince;
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_message('required', 'Form %s tidak boleh dikosongkan');
        $this->form_validation->set_message('trim', 'Form %s adalah Trim');

		if ($this->form_validation->run() == TRUE) {
			$data = $this->More_province_m->array_from_post(array('idPROVINCE','titleDESC','moreDESC','statusDESC'));
			if($data['statusDESC'] == 'on')$data['statusDESC']=1;
			else $data['statusDESC']=0;
			$id = decode(urldecode($this->input->post('idDESC')));
			if(empty($id))$id=NULL;
		
			$data = $this->security->xss_clean($data);
			$saving = $this->More_province_m->save($data, $id);

	      	if ($saving) {
	        	$data = array(
	            	'title' => 'Sukses',
                    'text' => 'Penyimpanan Data berhasil dilakukan',
                    'type' => 'success'
	          	);
	        	
	   		} else {
				$data = array(
					'title' => 'Sukses',
                    'text' => 'Penyimpanan Data tidak berhasil dilakukan',
                    'type' => 'danger'
				);
      		}
	    	$this->session->set_flashdata('message', $data);
	  		redirect('Administrator/province/more_desc_provincelist');

		} else {
				$data = array(
		            'title' => 'Terjadi Kesalahan',
		            'text' => 'mohon ulangi inputan form anda dibawah.',
		            'type' => 'warning'
		        );
	        $this->session->set_flashdata('message',$data);
	        $this->more_desc_provincelist();
		}
	}

	public function actionedit_more($id=NULL , $id2=NULL){
		$id = decode(urldecode($id));
		$ss = 0;
		if($id2 != NULL)$ss = 1;
		if($id != 0){
			$data['statusDESC'] = $ss;
			$this->More_province_m->save($data, $id);
			$data = array(
                    'title' => 'Sukses',
                    'text' => 'Perubahan Data berhasil dilakukan',
                    'type' => 'success'
                );
                $this->session->set_flashdata('message',$data);
                redirect('Administrator/province/more_desc_provincelist');
		}else{
			$data = array(
	            'title' => 'Terjadi Kesalahan',
	            'text' => 'Maaf, data tidak berhasil dirubah silakan coba beberapa saat kembali',
	            'type' => 'error'
		        );
		        $this->session->set_flashdata('message',$data);
		        redirect('Administrator/province/more_desc_provincelist');
		}
	}
}