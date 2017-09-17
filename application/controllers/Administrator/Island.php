<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Island extends CI_Controller{

	public function __construct (){
		parent::__construct();
		$this->load->model('Island_m');
		$this->load->model('More_island_m');
	}

	public function index (){
		$this->islandlist();
	}

	public function islandlist($id = NULL){
		$data['addONS'] = 'plugins_datatables';
		$id = decode(urldecode($id));

		$data['listisland'] = $this->Island_m->selectall_island()->result();

		foreach ($data['listisland'] as $key => $value) {
			$map = directory_map('assets/upload/island/pic-island-'.replacesymbolforslug($data['listisland'][$key]->nameISLAND), FALSE, TRUE);
			
			if (empty($map)) {
				$data['listisland'][$key]->imageISLAND = base_url() . 'assets/upload/no-image-available.png';
			} else {
				$data['listisland'][$key]->imageISLAND = base_url() . 'assets/upload/island/pic-island-'.replacesymbolforslug($data['listisland'][$key]->nameISLAND).'/'.$map[0];
			}

			if($value->statusISLAND == 1){
				$status='<a href="#" data-uk-tooltip title="Aktif"><i class="material-icons md-36 uk-text-success">&#xE86C;</i></a>';
			} else {
				$status='<a href="#" data-uk-tooltip title="Tak Aktif"><i class="material-icons  md-36 uk-text-danger">&#xE5C9;</i></a>';
			}
			$data['listisland'][$key]->status = $status;
		}

		if($id == NULL){
	        $data['tab'] = array(
	            'data-tab' => 'uk-active',
	            'form-tab' => '',
	        );
			$data['getisland'] = $this->Island_m->get_new();
		} else {
			
			//conf tab (optional)
	        $data['tab'] = array(
	            'data-tab' => '',
	            'form-tab' => 'uk-active',
	        );
			$data['getisland'] = $this->Island_m->selectall_island($id)->row();
			$map = directory_map('assets/upload/island/pic-island-'.replacesymbolforslug($data['getisland']->nameISLAND), FALSE, TRUE);
			
			if (empty($map)) {
				$data['getisland']->imageISLAND = '';
			} else {
				$data['getisland']->imageISLAND = base_url() . 'assets/upload/island/pic-island-'.replacesymbolforslug($data['getisland']->nameISLAND).'/'.$map[0];
			}
		}

		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }

		$data['subview'] = $this->load->view('templates/backend/island', $data, TRUE);
		$this->load->view('templates/_layout_base',$data);
	}

	public function saveisland() {
		$rules = $this->Island_m->rules_island;
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_message('required', 'Form %s tidak boleh dikosongkan');
        $this->form_validation->set_message('trim', 'Form %s adalah Trim');

		if ($this->form_validation->run() == TRUE) {
			$data = $this->Island_m->array_from_post(array('nameISLAND','populationISLAND','statusISLAND','densityISLAND','areaISLAND','capitalISLAND','largestcityISLAND','descISLAND'));
			if($data['statusISLAND'] == 'on')$data['statusISLAND']=1;
			else $data['statusISLAND']=0;
			$id = decode(urldecode($this->input->post('idISLAND')));

			if(empty($id))$id=NULL;
			$subject = $this->input->post('nameISLAND');
			$filenamesubject = 'pic-island-'.replacesymbolforslug($subject);

			$data = $this->security->xss_clean($data);
			$this->Island_m->save($data, $id);

			$path = 'assets/upload/island/'.$filenamesubject;
			$map = directory_map($path, FALSE, TRUE);

			if (!file_exists( $path )){
            	mkdir($path, 0777, true);
        	}

			$config['upload_path']          = $path;
	      	$config['allowed_types']        = 'jpg|png|jpeg';
	      	$config['overwrite']             = TRUE;
	      	$config['file_name']             = $this->security->sanitize_filename($filenamesubject);

	      	$this->upload->initialize($config);

	      	if ($this->upload->do_upload('imgISLAND')) {

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
	  		redirect('Administrator/island');

		} else {
				$data = array(
		            'title' => 'Terjadi Kesalahan',
		            'text' => 'mohon ulangi inputan form anda dibawah.',
		            'type' => 'warning'
		        );
	        $this->session->set_flashdata('message',$data);
	        $this->islandlist();
		}
	}

	public function actionedit($id=NULL , $id2=NULL){
		$id = decode(urldecode($id));
		$ss = 0;
		if($id2 != NULL)$ss = 1;
		if($id != 0){
			$data['statusISLAND'] = $ss;
			$this->Island_m->save($data, $id);
			$data = array(
                    'title' => 'Sukses',
                    'text' => 'Perubahan Data berhasil dilakukan',
                    'type' => 'success'
                );
                $this->session->set_flashdata('message',$data);
                redirect('Administrator/island');
		}else{
			$data = array(
	            'title' => 'Terjadi Kesalahan',
	            'text' => 'Maaf, data tidak berhasil dirubah silakan coba beberapa saat kembali',
	            'type' => 'error'
		        );
		        $this->session->set_flashdata('message',$data);
		        redirect('Administrator/island');
		}
	}

	public function deleteimgisland($id1=NULL){
		if($id1 != NULL){
			$id = decode(urldecode($id1));
			$islanddata = $this->Island_m->selectall_island($id)->row();
			$map = directory_map('assets/upload/island/pic-island-'.replacesymbolforslug($islanddata->nameISLAND), FALSE, TRUE);
			$path = 'assets/upload/island/pic-island-'.replacesymbolforslug($islanddata->nameISLAND);
			foreach ($map as $value) {
				unlink('assets/upload/island/pic-island-'.replacesymbolforslug($islanddata->nameISLAND).'/'.$value);
			}
			if(is_dir($path)){
				rmdir($path);
			}
		}
		redirect('Administrator/island/islandlist/'.$id1);
	}

	public function more_desc_islandlist($id = NULL){
		$data['addONS'] = 'plugins_datatables';
		$id = decode(urldecode($id));

		$data['moreisland'] = $this->More_island_m->selectall_more_desc()->result();

		foreach ($data['moreisland'] as $key => $value) {

			if($value->statusISLAND == 1){
				$status='<a href="#" data-uk-tooltip title="Aktif"><i class="material-icons md-36 uk-text-success">&#xE86C;</i></a>';
			} else {
				$status='<a href="#" data-uk-tooltip title="Tak Aktif"><i class="material-icons  md-36 uk-text-danger">&#xE5C9;</i></a>';
			}
			$data['moreisland'][$key]->status = $status;
		}

		if($id == NULL){
	        $data['tab'] = array(
	            'data-tab' => 'uk-active',
	            'form-tab' => '',
	        );
			$data['getmore'] = $this->More_island_m->get_new();
		} else {
			
			//conf tab (optional)
	        $data['tab'] = array(
	            'data-tab' => '',
	            'form-tab' => 'uk-active',
	        );
			$data['getmore'] = $this->More_island_m->selectall_more_desc($id)->row();
		}

		if(!empty($this->session->flashdata('message'))) {
            $data['message'] = $this->session->flashdata('message');
        }
        $data['getisland'] = $this->Island_m->dropdown_getisland(1);
		$data['subview'] = $this->load->view('templates/backend/more_island', $data, TRUE);
		$this->load->view('templates/_layout_base',$data);
	}

	public function save_descisland() {
		$rules = $this->More_island_m->rules_moreisland;
		$this->form_validation->set_rules($rules);
		$this->form_validation->set_message('required', 'Form %s tidak boleh dikosongkan');
        $this->form_validation->set_message('trim', 'Form %s adalah Trim');

		if ($this->form_validation->run() == TRUE) {
			$data = $this->More_island_m->array_from_post(array('idISLAND','titleDESC','moreDESC','statusDESC'));
			if($data['statusDESC'] == 'on')$data['statusDESC']=1;
			else $data['statusDESC']=0;
			$id = decode(urldecode($this->input->post('idDESC')));
			if(empty($id))$id=NULL;
		
			$data = $this->security->xss_clean($data);
			$saving = $this->More_island_m->save($data, $id);

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
	  		redirect('Administrator/island/more_desc_islandlist');

		} else {
				$data = array(
		            'title' => 'Terjadi Kesalahan',
		            'text' => 'mohon ulangi inputan form anda dibawah.',
		            'type' => 'warning'
		        );
	        $this->session->set_flashdata('message',$data);
	        $this->more_desc_islandlist();
		}
	}

	public function actionedit_more($id=NULL , $id2=NULL){
		$id = decode(urldecode($id));
		$ss = 0;
		if($id2 != NULL)$ss = 1;
		if($id != 0){
			$data['statusDESC'] = $ss;
			$this->More_island_m->save($data, $id);
			$data = array(
                    'title' => 'Sukses',
                    'text' => 'Perubahan Data berhasil dilakukan',
                    'type' => 'success'
                );
                $this->session->set_flashdata('message',$data);
                redirect('Administrator/island/more_desc_islandlist');
		}else{
			$data = array(
	            'title' => 'Terjadi Kesalahan',
	            'text' => 'Maaf, data tidak berhasil dirubah silakan coba beberapa saat kembali',
	            'type' => 'error'
		        );
		        $this->session->set_flashdata('message',$data);
		        redirect('Administrator/island/more_desc_islandlist');
		}
	}
}