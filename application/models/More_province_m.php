<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class More_province_m extends MY_Model{
	
	protected $_table_name = 'goindo_more_desc';
	protected $_order_by = 'idDESC';
	protected $_primary_key = 'idDESC';

	public $rules_moreprovince = array(
		'idPROVINCE' => array(
			'field' => 'idPROVINCE', 
			'label' => 'Province Name', 
			'rules' => 'trim|required'
		),
		'titleDESC' => array(
			'field' => 'titleDESC', 
			'label' => 'Title', 
			'rules' => 'trim|required'
		),
		'moreDESC' => array(
			'field' => 'moreDESC', 
			'label' => 'Island Density', 
			'rules' => 'trim|required'
		)
	);

	function __construct (){
		parent::__construct();
	}
	
	public function get_new(){
		$more = new stdClass();
		$more->idDESC = '';
		$more->idPROVINCE = '';
		$more->titleDESC = '';
		$more->moreDESC = '';
		$more->statusDESC = '';
		return $more;
	}

	public function selectall_more_desc($id = NULL, $status = NULL, $id2=NULL) {
		$this->db->select('*');
		$this->db->select('province.*');
		$this->db->from('more_desc');
		$this->db->join('province', 'province.idPROVINCE = more_desc.idPROVINCE');
		if ($id != NULL) {
			$this->db->where('more_desc.idDESC',$id);
		}

		if ($status != NULL) {
			$this->db->where('more_desc.statusDESC',$status);
		}

		if ($id2 != NULL) {
			$this->db->where('more_desc.idPROVINCE',$id2);
		}
		
		return $this->db->get();
	}
}