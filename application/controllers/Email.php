<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Email extends CI_Controller {
	public function __construct()
	{
		parent::__construct();
		$this->load->library('form_validation');
		$this->load->model('settings_model');
		$this->load->helper(array('form', 'url'));
	}
	public function compose_email()
	{
		if($this->session->userdata('uid')) {
			$this->load->view('user/compose_email');
		}
		else{
			header('Location:'.base_url().'login');
		}
	}

	function send_email() {
		$data = array(
			'TO'	=>	$this->input->post('to'),
			'subject'	=>	$this->input->post('subject'),
			'message'	=>	$this->input->post('message')
		);
		$sec	=	$this->input->post('time');
		//$this->load->config('email');
		$SMTPData = $this->settings_model->getSMTPData();
		$config = array(
			'protocol' 		=> $SMTPData[0]['protocol'], // 'mail', 'sendmail', or 'smtp'
			'smtp_host' 	=> $SMTPData[0]['smtp_host'],
			'smtp_port' 	=> $SMTPData[0]['smtp_port'],
			'smtp_user' 	=> $SMTPData[0]['smtp_user'],
			'smtp_pass' 	=> $SMTPData[0]['smtp_pass'],
			'smtp_crypto' 	=> $SMTPData[0]['smtp_crypto'], //can be 'ssl' or 'tls' for example
			'mailtype' 		=> $SMTPData[0]['mailtype'], //plaintext 'text' mails or 'html'
			'smtp_timeout' 	=> $SMTPData[0]['smtp_timeout'], //in seconds
			'charset' 		=> 'iso-8859-1',
			'wordwrap' 		=> TRUE
		);

		$this->load->library('email',$config);

		//$from = $this->config->item('smtp_user');
		foreach ($data['TO'] as $adrs)
		{
			$from = $SMTPData[0]['email'];
			$to = $adrs;
			$subject = $data['subject'];
			$message = $data['message'];
			$uid = $this->session->userdata('uid');

			$this->email->set_newline("\r\n");
			$this->email->from($from);
			$this->email->bcc($to);
			$this->email->subject($subject);
			$this->email->message($message);
			if ($this->email->send()) {
				//$this->admin_model->add_msg($_arr);
				$msg['retnVal'] = "Successfully Completed";
				$this->load->view('user/success',$msg);
			} else {
				//show_error($this->email->print_debugger());
				$msg['retnVal'] = $this->email->print_debugger();
				$this->load->view('user/success',$msg);
			}
			sleep($sec);
		}
	}


}
