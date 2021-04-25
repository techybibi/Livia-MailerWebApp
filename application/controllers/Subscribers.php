<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Subscribers extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('subscriber_model');
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		if($this->session->userdata('uid')) {
			$this->load->view('user/subscribers');
		}
		else{
			header('Location:'.base_url().'login');
		}
	}

	public function add_user()
	{
		if(!$this->session->userdata('uid'))
		{
			$this->load->view('user/auth-sign-in');
		}
		else{
			try{
				$this->form_validation->set_rules('fullName', 'Name', 'required');
				$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email|is_unique[livia_subscribers.EMAIL]');

				if($this->form_validation->run())
				{
					$_data = array(
						'EMAIL'			=>	$this->input->post('email'),
						'NAME'			=>	$this->input->post('fullName'),
						'STATUS'		=>	"Active"
					);
					$id = $this->subscriber_model->addUser($_data);
					$this->load->view('user/subscribers');

				}
				else{
					$msg['retnVal'] = validation_errors();
					$this->load->view('user/rtn_msg',$msg);
				}
			}
			catch(Exception $e)
			{

			}
		}
	}

	public function edit($UID)
	{
		if($this->session->userdata('uid')) {
			$subData = $this->subscriber_model->getSubscriberData($UID);
			//var_dump($subData);
			$_arr = array(
			'UID'		=>		$subData[0]['UID'],
			'EMAIL'		=>		$subData[0]['EMAIL'],
			'NAME'		=>		$subData[0]['NAME']
			);
			$this->load->view('user/edit_subscribers',$_arr);
		}
		else{
			header('Location:'.base_url().'login');
		}
	}

	public function update_user($UID)
	{
		if(!$this->session->userdata('uid'))
		{
			$this->load->view('user/auth-sign-in');
		}
		else{
			try{
				$this->form_validation->set_rules('fullName', 'Name', 'required');
				$this->form_validation->set_rules('email', 'Email Address', 'required|valid_email');

				if($this->form_validation->run())
				{
					$_data = array(
						'UID'			=>	$UID,
						'EMAIL'			=>	$this->input->post('email'),
						'NAME'			=>	$this->input->post('fullName'),
						'STATUS'		=>	"Active"
					);
					$id = $this->subscriber_model->updateUser($_data);
					$this->load->view('user/subscribers');

				}
				else{
					$msg['retnVal'] = validation_errors();
					$this->load->view('user/rtn_msg',$msg);
				}
			}
			catch(Exception $e)
			{

			}
		}
	}

	public function delete($uid)
	{
		if(!$this->session->userdata('uid'))
		{
			$this->load->view('user/auth-sign-in');
		}
		else{
			$id = $this->subscriber_model->deleteUser($uid);
			$this->load->view('user/subscribers');
		}
	}
}
