<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Province_m extends MY_Model{
	
	protected $_table_name = 'goindo_province';
	protected $_order_by = 'idPROVINCE';
	protected $_primary_key = 'idPROVINCE';

	public $rules_province = array(
		'namePROVINCE' => array(
			'field' => 'namePROVINCE', 
			'label' => 'Province Name', 
			'rules' => 'trim|required'
		),
		'populationPROVINCE' => array(
			'field' => 'populationPROVINCE', 
			'label' => 'Province Population', 
			'rules' => 'trim|required'
		),
		'densityPROVINCE' => array(
			'field' => 'densityPROVINCE', 
			'label' => 'Province Density', 
			'rules' => 'trim|required'
		),
		'areaPROVINCE' => array(
			'field' => 'areaPROVINCE', 
			'label' => 'Province Area', 
			'rules' => 'trim|required'
		),
		'capitalPROVINCE' => array(
			'field' => 'capitalPROVINCE', 
			'label' => 'Province Capital', 
			'rules' => 'trim|required'
		),
		'largestcityPROVINCE' => array(
			'field' => 'largestcityPROVINCE', 
			'label' => 'Province Largest City', 
			'rules' => 'trim|required'
		)
	);

	function __construct (){
		parent::__construct();
	}
	
	public function get_new(){
		$province = new stdClass();
		$province->idPROVINCE = '';
		$province->namePROVINCE = '';
		$province->populationPROVINCE = '';
		$province->densityPROVINCE = '';
		$province->areaPROVINCE = '';
		$province->capitalPROVINCE = '';
		$province->largestcityPROVINCE = '';
		$province->descPROVINCE = '';
		$province->statusPROVINCE = '';
		return $province;
	}

	public function selectall_province($id = NULL, $status = NULL) {
		$this->db->select('*');
		$this->db->from('province');
		if ($id != NULL) {
			$this->db->where('province.idPROVINCE',$id);
		}

		if ($status != NULL) {
			$this->db->where('province.statusPROVINCE',$status);
		}
		
		return $this->db->get();
	}

	public function dropdown_getprovince($dropdown=NULL){
		$this->db->cache_on();
		$this->db->from('province');
		if($dropdown != NULL){
			$ddown = array();
			foreach ($this->db->get()->result() as $value) {
				$ddown[$value->idPROVINCE] = $value->namePROVINCE;
			}
			return $ddown;
		}else{
			return $this->db->get();
		}
	}
}