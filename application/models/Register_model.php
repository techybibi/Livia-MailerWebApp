<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class Register_model extends CI_Model {
	function insert($data)
	{
		$this->db->insert('livia_user',$data);
		header('Location:'.base_url().'login');
	}


}
