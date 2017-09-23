<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class City_m extends MY_Model{
	
	protected $_table_name = 'goindo_city';
	protected $_order_by = 'idCITY';
	protected $_primary_key = 'idCITY';

	public $rules_city = array(
		'idPROVINCE' => array(
			'field' => 'idPROVINCE', 
			'label' => 'Province Name', 
			'rules' => 'trim|required'
		),
		'nameCITY' => array(
			'field' => 'nameCITY', 
			'label' => 'City Name', 
			'rules' => 'trim|required'
		)
	);

	function __construct (){
		parent::__construct();
	}
	
	public function get_new(){
		$city = new stdClass();
		$city->idCITY = '';
		$city->idPROVINCE = '';
		$city->nameCITY = '';
		$city->statusCITY = '';
		return $city;
	}

	public function selectall_city($id = NULL, $status = NULL) {
		$this->db->select('*');
		$this->db->select('province.namePROVINCE');
		$this->db->from('city');
		$this->db->join('province', 'province.idPROVINCE = city.idPROVINCE');
		if ($id != NULL) {
			$this->db->where('city.idCITY',$id);
		}

		if ($status != NULL) {
			$this->db->where('city.statusCITY',$status);
		}
		
		return $this->db->get();
	}
}