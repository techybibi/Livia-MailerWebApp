<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Group extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('group_model');
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		if($this->session->userdata('uid')) {
			$this->load->view('user/group');
		}
		else{
			header('Location:'.base_url().'login');
		}
	}

	public function add_group()
	{
		if(!$this->session->userdata('uid'))
		{
			$this->load->view('user/auth-sign-in');
		}
		else{
			try{
				$this->form_validation->set_rules('gpName', 'Group Name', 'required');

				if($this->form_validation->run())
				{
					$_data = array(
						'GName'			=>	$this->input->post('gpName')
					);
					$id = $this->group_model->addGroup($_data);
					header('Location:'.base_url().'group');

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

	public function edit($GID)
	{
		if($this->session->userdata('uid')) {
			$subData = $this->group_model->getGroupData($GID);
			//var_dump($subData);
			$_arr = array(
				'GID'		=>		$subData[0]['GID'],
				'GName'		=>		$subData[0]['GName'],
			);
			$this->load->view('user/edit_group',$_arr);
		}
		else{
			header('Location:'.base_url().'login');
		}
	}

	public function update_group($GID)
	{
		if(!$this->session->userdata('uid'))
		{
			$this->load->view('user/auth-sign-in');
		}
		else{
			try{
				$this->form_validation->set_rules('gpName', 'Group Name', 'required');

				if($this->form_validation->run())
				{
					$_data = array(
						'GID'			=>	$GID,
						'GName'			=>	$this->input->post('gpName')
					);
					$id = $this->group_model->updateGroup($_data);
					header('Location:'.base_url().'group');

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

	public function delete($GID)
	{
		if(!$this->session->userdata('uid'))
		{
			$this->load->view('user/auth-sign-in');
		}
		else{
			$id = $this->group_model->deleteGroup($GID);
			header('Location:'.base_url().'group');
		}
	}
}
