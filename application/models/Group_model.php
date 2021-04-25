<?php

class Group_model extends CI_Model {
	function addGroup($data)
	{
		$this->db->insert('livia_group',$data);
	}
	function getGroupData($GID)
	{
		if($GID != '')
		{
			$query = $this->db->query("SELECT * FROM livia_group WHERE GID=$GID ORDER BY GID DESC");
			return $query->result_array();
		}
		else
		{
			$query = $this->db->query("SELECT * FROM livia_group ORDER BY GID DESC");
			return $query->result_array();
		}

	}
	function updateGroup($data){
		$this->db->where('GID', $data['GID']);
		$dbdata = array(
			"GName" 		=> $data['GName']
		);
		$this->db->update('livia_group', $dbdata);
	}

	function deleteGroup($GID)
	{
		$this->db->query("DELETE FROM livia_group WHERE GID=$GID");
	}


}
