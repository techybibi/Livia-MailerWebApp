<?php

class Settings_model extends CI_Model {
	function getSMTPData()
	{
			$query = $this->db->query("SELECT * FROM livia_smtp");
			return $query->result_array();
	}
	function updateSMTP($data){
		$this->db->where('SMTP_ID', $data['SMTP_ID']);
		$dbdata = array(
			"protocol" 			=> $data['protocol'],
			"email" 			=> $data['protocol'],
			"smtp_host" 		=> $data['smtp_host'],
			"smtp_port" 		=> $data['smtp_port'],
			"smtp_user" 		=> $data['smtp_user'],
			"smtp_pass" 		=> $data['smtp_pass'],
			"smtp_crypto" 		=> $data['smtp_crypto'],
			"mailtype" 			=> $data['mailtype'],
			"smtp_timeout" 		=> $data['smtp_timeout'],
		);
		$this->db->update('livia_smtp', $dbdata);
	}



}
