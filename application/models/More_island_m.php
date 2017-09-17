<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class More_island_m extends MY_Model{
	
	protected $_table_name = 'goindo_more_desc';
	protected $_order_by = 'idDESC';
	protected $_primary_key = 'idDESC';

	public $rules_moreisland = array(
		'idISLAND' => array(
			'field' => 'idISLAND', 
			'label' => 'Title', 
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
		$more->idISLAND = '';
		$more->titleDESC = '';
		$more->moreDESC = '';
		$more->statusDESC = '';
		return $more;
	}

	public function selectall_more_desc($id = NULL, $status = NULL, $id2=NULL) {
		$this->db->select('*');
		$this->db->select('island.*');
		$this->db->from('more_desc');
		$this->db->join('island', 'island.idISLAND = more_desc.idISLAND');
		if ($id != NULL) {
			$this->db->where('more_desc.idDESC',$id);
		}

		if ($status != NULL) {
			$this->db->where('more_desc.statusDESC',$status);
		}

		if ($id2 != NULL) {
			$this->db->where('more_desc.idISLAND',$id2);
		}
		
		return $this->db->get();
	}
}