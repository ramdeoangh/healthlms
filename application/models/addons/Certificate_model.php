<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Certificate_model extends CI_Model
{

	function __construct()
	{
		parent::__construct();
	}

	/*
	* CERTIFICATE OPERATIONS
	*/
	// If the course progress is 100%, create certificate
	function check_certificate_eligibility($course_id = "", $user_id = ""){
		$checker = array(
			'course_id' => $course_id,
			'student_id' => $user_id
		);
		$previous_data = $this->db->get_where('certificates', $checker)->num_rows();
		if($previous_data == 0){
			$certificate_identifier = substr(sha1($user_id.'-'.$course_id.'-'.date('d-M-Y')), 0, 10);
			$certificate_link = base_url('uploads/certificates/'.$certificate_identifier.'.jpg');
			$insert_data = array(
				'course_id' => $course_id,
				'student_id' => $user_id,
				'shareable_url' => $certificate_identifier
			);
			$this->db->insert('certificates', $insert_data);
			$this->email_model->notify_on_certificate_generate($user_id, $course_id);
		}
	}


	//CERTIFICATE TEMPLATE TEXT UPDATE
	public function update_certificate_template_text() {
		$data['value'] = trim(preg_replace('/\s+/', ' ', $this->input->post('certificate_template')));
		if (strlen($this->input->post('certificate_template')) > 120 || strlen($this->input->post('certificate_template')) == 0) {
			$this->session->set_flashdata('error_message', get_phrase('certificate_template_has_a_limit_of_120_charecters_and_it_can_not_be_empty_either'));
			redirect(site_url('addons/certificate/settings'), 'refresh');
		}

		$this->db->where('key', 'certificate_template');
		$this->db->update('settings', $data);
		$this->session->set_flashdata('flash_message', get_phrase('certificate_template_has_been_updated'));
		redirect(site_url('addons/certificate/settings'), 'refresh');
	}
	//CERTIFICATE TEMPLATE UPDATE
	public function update_certificate_template() {

		$max_size = 1048576; //1MB in bytes

		if ($_FILES['certificate_template']['error'] === UPLOAD_ERR_OK) {

			if (isset($_FILES['certificate_template']) && $_FILES['certificate_template']['name'] != "") {
				if ($_FILES['certificate_template']['size'] > $max_size) {
					$this->session->set_flashdata('error_message', get_phrase('file_size_has_to_be_less_than_1MB'));
					redirect(site_url('addons/certificate/settings'), 'refresh');
				}
				move_uploaded_file($_FILES['certificate_template']['tmp_name'], 'uploads/certificates/template.jpg');
				$this->session->set_flashdata('flash_message', get_phrase('template_updated_successfully'));
				redirect(site_url('addons/certificate/settings'), 'refresh');
			}

		} else {
			$this->session->set_flashdata('error_message', get_phrase('invalid_file'));
			redirect(site_url('addons/certificate/settings'), 'refresh');
			//die("Upload failed with error code " . $_FILES['file']['error']);
		}
	}

	// FOR GETTING CERTIFICATE SHAREABLE URL
	public function get_certificate_url($user_id = "", $course_id = "") {
		$checker = array(
			'course_id' => $course_id,
			'student_id' => $user_id
		);
		$result = $this->db->get_where('certificates', $checker);
		if ($result->num_rows() > 0) {
			$result = $result->row_array();
			$exploded_result = explode('.',$result['shareable_url']);
			return site_url('certificate/'.$exploded_result[0]) ;
		}else{
			return "#";
		}
	}
}
