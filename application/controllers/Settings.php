<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Settings extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('settings_model');
		$this->load->helper(array('form', 'url'));
	}
	public function index()
	{
		if($this->session->userdata('uid')) {
			$SMTPData = $this->settings_model->getSMTPData();
			//var_dump($SMTPData);
			$_arr = array(
				'SMTP_ID'			=>		$SMTPData[0]['SMTP_ID'],
				'email'				=>		$SMTPData[0]['email'],
				'protocol'			=>		$SMTPData[0]['protocol'],
				'smtp_host'			=>		$SMTPData[0]['smtp_host'],
				'smtp_port'			=>		$SMTPData[0]['smtp_port'],
				'smtp_user'			=>		$SMTPData[0]['smtp_user'],
				'smtp_pass'			=>		$SMTPData[0]['smtp_pass'],
				'smtp_crypto'		=>		$SMTPData[0]['smtp_crypto'],
				'mailtype'			=>		$SMTPData[0]['mailtype'],
				'smtp_timeout'		=>		$SMTPData[0]['smtp_timeout']
			);
			$this->load->view('user/smtp_settings',$_arr);
		}
		else{
			header('Location:'.base_url().'login');
		}
	}

	public function update_smtp($SMTP_ID)
	{
		if(!$this->session->userdata('uid'))
		{
			$this->load->view('user/auth-sign-in');
		}
		else{
			try{
				$this->form_validation->set_rules('protocol', 'Protocol', 'required');
				$this->form_validation->set_rules('email', 'Email', 'required');
				$this->form_validation->set_rules('host', 'Host', 'required');
				$this->form_validation->set_rules('crypto', 'Crypto', 'required');
				$this->form_validation->set_rules('port', 'Port', 'required');
				$this->form_validation->set_rules('user', 'User', 'required');
				$this->form_validation->set_rules('password', 'Password', 'required');
				$this->form_validation->set_rules('type', 'Type', 'required');
				$this->form_validation->set_rules('timeout', 'Timeout', 'required');

				if($this->form_validation->run())
				{
					$_data = array(
						'SMTP_ID'			=>	$SMTP_ID,
						'email'				=>	$this->input->post('email'),
						'protocol'			=>	$this->input->post('protocol'),
						'smtp_host'			=>	$this->input->post('host'),
						'smtp_port'			=>	$this->input->post('port'),
						'smtp_user'			=>	$this->input->post('user'),
						'smtp_pass'			=>	$this->input->post('password'),
						'smtp_crypto'		=>	$this->input->post('crypto'),
						'mailtype'			=>	$this->input->post('type'),
						'smtp_timeout'		=>	$this->input->post('timeout')
					);
					$id = $this->settings_model->updateSMTP($_data);
					$msg['retnVal'] = "Successfully Updated";
					$this->load->view('user/success',$msg);

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
}
