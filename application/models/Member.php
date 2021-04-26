<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Member extends CI_Model{

	function __construct() {
		// Set table name
		$this->table = 'livia_subscribers';
	}

	/*
	 * Fetch members data from the database
	 * @param array filter data based on the passed parameters
	 */
	function getRows($params = array()){
		$this->db->select('*');
		$this->db->from($this->table);

		if(array_key_exists("where", $params)){
			foreach($params['where'] as $key => $val){
				$this->db->where($key, $val);
			}
		}

		if(array_key_exists("returnType",$params) && $params['returnType'] == 'count'){
			$result = $this->db->count_all_results();
		}else{
			if(array_key_exists("id", $params)){
				$this->db->where('UID', $params['id']);
				$query = $this->db->get();
				$result = $query->row_array();
			}else{
				$this->db->order_by('UID', 'desc');
				if(array_key_exists("start",$params) && array_key_exists("limit",$params)){
					$this->db->limit($params['limit'],$params['start']);
				}elseif(!array_key_exists("start",$params) && array_key_exists("limit",$params)){
					$this->db->limit($params['limit']);
				}

				$query = $this->db->get();
				$result = ($query->num_rows() > 0)?$query->result_array():FALSE;
			}
		}

		// Return fetched data
		return $result;
	}

	/*
	 * Insert members data into the database
	 * @param $data data to be insert based on the passed parameters
	 */
	public function insert($data = array()) {
		if(!empty($data)){
			// Add created and modified date if not included
			if(!array_key_exists("created", $data)){
				$data['CREATED'] = date("Y-m-d H:i:s");
			}
			if(!array_key_exists("modified", $data)){
				$data['MODIFIED'] = date("Y-m-d H:i:s");
			}

			// Insert member data
			$insert = $this->db->insert($this->table, $data);

			// Return the status
			return $insert?$this->db->insert_id():false;
		}
		return false;
	}

	/*
	 * Update member data into the database
	 * @param $data array to be update based on the passed parameters
	 * @param $condition array filter data
	 */
	public function update($data, $condition = array()) {
		if(!empty($data)){
			// Add modified date if not included
			if(!array_key_exists("modified", $data)){
				$data['MODIFIED'] = date("Y-m-d H:i:s");
			}

			// Update member data
			$update = $this->db->update($this->table, $data, $condition);

			// Return the status
			return $update?true:false;
		}
		return false;
	}
}
