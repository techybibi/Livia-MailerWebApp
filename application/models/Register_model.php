<?php

class Register_model extends CI_Model {
	function insert($data)
	{
		$this->db->insert('livia_user',$data);
		header('Location:'.base_url().'user/auth-sign-in');
	}


}
