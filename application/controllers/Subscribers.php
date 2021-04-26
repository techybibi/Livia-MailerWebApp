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
				$this->form_validation->set_rules('group', 'Group Name', 'required');

				if($this->form_validation->run())
				{
					$_data = array(
						'EMAIL'			=>	$this->input->post('email'),
						'NAME'			=>	$this->input->post('fullName'),
						'GRP'			=>	$this->input->post('group'),
						'STATUS'		=>	"Active"
					);
					$id = $this->subscriber_model->addUser($_data);
					header('Location:'.base_url().'subscribers');
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
			'GRP'		=>		$subData[0]['GRP'],
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
				$this->form_validation->set_rules('group', 'Group Name', 'required');

				if($this->form_validation->run())
				{
					$_data = array(
						'UID'			=>	$UID,
						'EMAIL'			=>	$this->input->post('email'),
						'NAME'			=>	$this->input->post('fullName'),
						'GRP'			=>	$this->input->post('group'),
						'STATUS'		=>	"Active"
					);
					$id = $this->subscriber_model->updateUser($_data);
					header('Location:'.base_url().'subscribers');
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
			header('Location:'.base_url().'subscribers');
		}
	}
}
