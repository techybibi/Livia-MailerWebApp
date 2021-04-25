<?php

class Subscriber_model extends CI_Model {
	function addUser($data)
	{
		$this->db->insert('livia_subscribers',$data);
	}
	function getSubscriberData($uid)
	{
		if($uid != '')
		{
			$query = $this->db->query("SELECT * FROM livia_subscribers WHERE UID=$uid ORDER BY UID DESC");
			return $query->result_array();
		}
		else
		{
			$query = $this->db->query("SELECT * FROM livia_subscribers ORDER BY UID DESC");
			return $query->result_array();
		}

	}
	function updateUser($data){
		$this->db->where('UID', $data['UID']);
		$dbdata = array(
			"EMAIL" 		=> $data['EMAIL'],
			"NAME" 			=> $data['NAME'],
			"GROUP" 			=> $data['GROUP'],
			"STATUS" 		=> $data['STATUS'],
		);
		$this->db->update('livia_subscribers', $dbdata);
	}

	function deleteUser($UID)
	{
		$this->db->query("DELETE FROM livia_subscribers WHERE UID=$UID");
	}


}
