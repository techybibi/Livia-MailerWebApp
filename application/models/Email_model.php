<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Email_model extends CI_Model {
	function addLog($data)
	{
		$this->db->insert('livia_mail_log',$data);
	}
	function getGroupData($GID)
	{
			$query = $this->db->query("SELECT * FROM livia_mail_log ORDER BY LID DESC");
			return $query->result_array();
	}

}
