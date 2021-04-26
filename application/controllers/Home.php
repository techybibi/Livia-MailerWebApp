<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		if($this->session->userdata('uid')) {
			$this->load->view('user/index');
		}
		else{
			$query=$this->db->select('COUNT(uid) as cuid')->from('livia_user')->get();
			$cuidData = $query->row()->cuid;
			if($cuidData>=1)
			{
				header('Location:'.base_url().'login');
			}
			else
				header('Location:'.base_url().'register');
		}
	}


}
