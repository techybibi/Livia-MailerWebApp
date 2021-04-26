<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');
class  Login_model extends CI_Model {
	function can_login($email,$password)
	{
		$this->db->where('EMAIL', $email);
		$query = $this->db->get('livia_user');
		$data = $query->result_array();
		if($data>0)
		{

			$enc_pass = $data[0]['Password'];
			$acc_uid = $data[0]['UID'];
			$acc_uname = $data[0]['Full_Name'];

			$store_password = $this->encrypt->decode($enc_pass);

			if($password == $store_password)
			{
				$this->session->set_userdata('uid',$acc_uid);
				$currUserData = array(
					'VALUE'				=> true,
					'uFullName'			=>	$acc_uname
				);
				return $currUserData;
			}
			else
			{
				$this->session->set_flashdata('message', 'Invalid password');
				redirect('login','refresh');
			}

		}
		else
		{
			$this->session->set_flashdata('message', 'Invalid email ID or password');
			redirect('login','refresh');
		}
	}

	function updateUser($data)
	{
		$this->db->where('UID', $data['UID']);
		$dbdata = array(
			"Full_Name" 		=> $data['FULL_NAME'],
			"Email" 			=> $data['EMAIL'],
			"Password" 			=> $data['PASSWORD'],
		);
		$this->db->update('livia_user', $dbdata);

	}
}
