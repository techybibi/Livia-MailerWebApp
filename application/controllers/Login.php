<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->library('encrypt');
		$this->load->model('login_model');
	}
	public function index()
	{
		if($this->session->userdata('uid')) {
			$this->load->view('user/index');
		}
		else{
			$this->load->view('user/auth-sign-in');
		}
	}
	function validation()
	{
		try{
			$this->form_validation->set_rules('email', 'Email Address', 'required|trim|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if($this->form_validation->run())
			{
				$data = array(
					'email'			=>	$this->input->post('email'),
					'password'			=>	$this->input->post('password')
				);
				$result = $this->login_model->can_login($data['email'], $data['password']);
				if($result['VALUE'] == true)
				{
						header('Location:'.base_url().'home');
				}
				else
				{
					$this->session->set_flashdata('message',$result['uAccType']);
					redirect('login');
				}

			}
			else{
				$this->session->set_flashdata('message', 'Invalid email ID or password');
				redirect('login','refresh');
			}
		}
		catch(Exception $e)
		{

		}
	}
	public function logout()
	{
		$data=$this->session->all_userdata();
		foreach( $data as $row => $rows_value)
		{
			$this->session->unset_userdata($row);
		}
		$this->load->view('user/auth-sign-in');
	}

	public function profile($uid)
	{
		if(!$this->session->userdata('uid'))
		{
			$this->load->view('login');
		}
		else{
			$getProfileQuery=$this->db->query("SELECT * FROM livia_user WHERE UID = $uid");
			$getProfile = $getProfileQuery->row();
			$data = array(
				'name'		=>	$getProfile->Full_Name,
				'email'		=>	$getProfile->Email
			);
			$this->load->view('user/profile',$data);
		}
	}

	public function pro_update($uid)
	{
		try {
			$this->form_validation->set_rules('name', 'Name', 'required');
			$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');
			$this->form_validation->set_rules('password', 'Password', 'required');

			if ($this->form_validation->run()) {
				$encrypted_password = $this->encrypt->encode($this->input->post('password'));

				$data = array(
					'UID' 				=> $this->session->userdata('uid'),
					'FULL_NAME' 		=> $this->input->post('name'),
					'EMAIL' 			=> $this->input->post('email'),
					'PASSWORD' 			=> $encrypted_password,
				);
				$this->login_model->updateUser($data);
				$rtn['retnVal'] = "Updated Successfully";
				$this->load->view('user/success', $rtn);
			}
			else{
				echo validation_errors();
			}
		} catch (Exception $e) {

		}
	}


}
