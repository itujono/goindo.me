<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Area_m extends MY_Model{
	
	protected $_table_name = 'goindo_area';
	protected $_order_by = 'idAREA';
	protected $_primary_key = 'idAREA';

	public $rules_area = array(
		'nameAREA' => array(
			'field' => 'nameAREA', 
			'label' => 'Area Name',
			'rules' => 'trim|required|is_unique[goindo_city.nameAREA]'
		)
	);

	function __construct (){
		parent::__construct();
	}
	
	public function get_new(){
		$area = new stdClass();
		$area->idAREA = '';
		$area->idCITY = '';
		$area->nameAREA = '';
		$area->statusAREA = '';
		return $area;
	}

	public function selectall_area($id = NULL, $status = NULL) {
		$this->db->select('*');
		$this->db->select('city.nameCITY');
		$this->db->from('area');
		$this->db->join('city', 'city.idCITY = area.idCITY', 'left');
		if ($id != NULL) {
			$this->db->where('area.idAREA',$id);
		}

		if ($status != NULL) {
			$this->db->where('area.statusAREA',$status);
		}
		
		return $this->db->get();
	}

	public function dropdown_getarea($dropdown=NULL){
		$this->db->cache_on();
		$this->db->from('area');
		if($dropdown != NULL){
			$ddown = array();
			foreach ($this->db->get()->result() as $value) {
				$ddown[$value->idAREA] = $value->nameAREA;
			}
			return $ddown;
		}else{
			return $this->db->get();
		}
	}
}