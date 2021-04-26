<?php
if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Members extends CI_Controller {

	function __construct() {
		parent::__construct();

		// Load member model
		$this->load->model('member');

		// Load form validation library
		$this->load->library('form_validation');

		// Load file helper
		$this->load->helper('file');
	}

	public function index(){
		$data = array();

		// Get messages from the session
		if($this->session->userdata('success_msg')){
			$data['success_msg'] = $this->session->userdata('success_msg');
			$this->session->unset_userdata('success_msg');
		}
		if($this->session->userdata('error_msg')){
			$data['error_msg'] = $this->session->userdata('error_msg');
			$this->session->unset_userdata('error_msg');
		}

		// Get rows
		$data['members'] = $this->member->getRows();

		// Load the list page view
		$this->load->view('user/subscribers', $data);
	}

	public function import(){
		$data = array();
		$memData = array();

		// If import request is submitted
		if($this->input->post('importSubmit')){
			// Form field validation rules
			$this->form_validation->set_rules('file', 'CSV file', 'callback_file_check');

			// Validate submitted form data
			if($this->form_validation->run() == true){
				$insertCount = $updateCount = $rowCount = $notAddCount = 0;

				// If file uploaded
				if(is_uploaded_file($_FILES['file']['tmp_name'])){
					// Load CSV reader library
					$this->load->library('CSVReader');

					// Parse data from CSV file
					$csvData = $this->csvreader->parse_csv($_FILES['file']['tmp_name']);

					// Insert/update CSV data into database
					if(!empty($csvData)){
						foreach($csvData as $row){ $rowCount++;

							// Prepare data for DB insertion
							$memData = array(
								'NAME' => $row['Name'],
								'EMAIL' => $row['Email'],
								'GRP' => $row['Grp'],
								'STATUS' => $row['Status'],
							);

							// Check whether email already exists in the database
							$con = array(
								'where' => array(
									'EMAIL' => $row['Email']
								),
								'returnType' => 'count'
							);
							$prevCount = $this->member->getRows($con);

							if($prevCount > 0){
								// Update member data
								$condition = array('EMAIL' => $row['Email']);
								$update = $this->member->update($memData, $condition);

								if($update){
									$updateCount++;
								}
							}else{
								// Insert member data
								$insert = $this->member->insert($memData);

								if($insert){
									$insertCount++;
								}
							}
						}

						// Status message with imported data count
						$notAddCount = ($rowCount - ($insertCount + $updateCount));
						$successMsg = 'Members imported successfully. Total Rows ('.$rowCount.') | Inserted ('.$insertCount.') | Updated ('.$updateCount.') | Not Inserted ('.$notAddCount.')';
						$this->session->set_userdata('success_msg', $successMsg);
					}
				}else{
					$this->session->set_userdata('error_msg', 'Error on file upload, please try again.');
				}
			}else{
				$this->session->set_userdata('error_msg', 'Invalid file, please select only CSV file.');
			}
		}
		redirect('members');
	}

	/*
	 * Callback function to check file value and type during validation
	 */
	public function file_check($str){
		$allowed_mime_types = array('text/x-comma-separated-values', 'text/comma-separated-values', 'application/octet-stream', 'application/vnd.ms-excel', 'application/x-csv', 'text/x-csv', 'text/csv', 'application/csv', 'application/excel', 'application/vnd.msexcel', 'text/plain');
		if(isset($_FILES['file']['name']) && $_FILES['file']['name'] != ""){
			$mime = get_mime_by_extension($_FILES['file']['name']);
			$fileAr = explode('.', $_FILES['file']['name']);
			$ext = end($fileAr);
			if(($ext == 'csv') && in_array($mime, $allowed_mime_types)){
				return true;
			}else{
				$this->form_validation->set_message('file_check', 'Please select only CSV file to upload.');
				return false;
			}
		}else{
			$this->form_validation->set_message('file_check', 'Please select a CSV file to upload.');
			return false;
		}
	}
}
