<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Register extends CI_Controller {

	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		// $this->load->library('encryption');
		$this->load->model('register_model');
		$this->load->helper('date');
		$this->load->helper(array('form', 'url'));
	}

	public function index()
	{
		$query=$this->db->select('COUNT(uid) as cuid')->from('livia_user')->get();
		$cuidData = $query->row()->cuid;
		if($cuidData>=1)
		{
			$this->load->view('user/auth-sign-in');
		}
		else
			$this->load->view('user/auth-sign-up');
	}

	function validation()
	{
		try{
			$this->form_validation->set_rules('fname', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|is_unique[livia_user.email]');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run())
			{

				$verification_key = md5(rand());
				$encrypted_password = $this->encrypt->encode($this->input->post('password'));


				$data = array(
					'FULL_NAME'			=>	$this->input->post('fname'),
					'EMAIL'				=>	$this->input->post('email'),
					'PASSWORD'			=>	$encrypted_password,
					'VERIFICATION_KEY '	=>	$verification_key,
				);

				$id = $this->register_model->insert($data);


			}
			else{
				echo 'error';
			}
		}
		catch(Exception $e)
		{

		}



	}

	public function success()
	{
		$this->load->view('success');
	}
}
