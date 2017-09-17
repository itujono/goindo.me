<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Island_m extends MY_Model{
	
	protected $_table_name = 'goindo_island';
	protected $_order_by = 'idISLAND';
	protected $_primary_key = 'idISLAND';

	public $rules_island = array(
		'nameISLAND' => array(
			'field' => 'nameISLAND', 
			'label' => 'Island Name', 
			'rules' => 'trim|required'
		),
		'populationISLAND' => array(
			'field' => 'populationISLAND', 
			'label' => 'Island Population', 
			'rules' => 'trim|required'
		),
		'densityISLAND' => array(
			'field' => 'densityISLAND', 
			'label' => 'Island Density', 
			'rules' => 'trim|required'
		),
		'areaISLAND' => array(
			'field' => 'areaISLAND', 
			'label' => 'Island Area', 
			'rules' => 'trim|required'
		),
		'capitalISLAND' => array(
			'field' => 'capitalISLAND', 
			'label' => 'Island Capital', 
			'rules' => 'trim|required'
		),
		'largestcityISLAND' => array(
			'field' => 'largestcityISLAND', 
			'label' => 'Island Largest City', 
			'rules' => 'trim|required'
		)
	);

	function __construct (){
		parent::__construct();
	}
	
	public function get_new(){
		$island = new stdClass();
		$island->idISLAND = '';
		$island->nameISLAND = '';
		$island->populationISLAND = '';
		$island->densityISLAND = '';
		$island->areaISLAND = '';
		$island->capitalISLAND = '';
		$island->largestcityISLAND = '';
		$island->descISLAND = '';
		$island->statusISLAND = '';
		return $island;
	}

	public function selectall_island($id = NULL, $status = NULL) {
		$this->db->select('*');
		$this->db->from('island');
		if ($id != NULL) {
			$this->db->where('island.idISLAND',$id);
		}

		if ($status != NULL) {
			$this->db->where('island.statusISLAND',$status);
		}
		
		return $this->db->get();
	}

	public function dropdown_getisland($dropdown=NULL){
		$this->db->cache_on();
		$this->db->from('island');
		if($dropdown != NULL){
			$ddown = array();
			foreach ($this->db->get()->result() as $value) {
				$ddown[$value->idISLAND] = $value->nameISLAND;
			}
			return $ddown;
		}else{
			return $this->db->get();
		}
	}
}