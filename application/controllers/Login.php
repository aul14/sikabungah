<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Login extends CI_Controller {
	public function index() {
		if($this->session->userdata("SIKABUNGAH_STATUS") == "LOGIN") {
			redirect(base_url());
		}
		else {
			$this->load->view('Login');
		}
	}

	public function login_process() {
		$username = $this->input->post('username');
		$password = $this->input->post('password');

		if ($username != "" && $password != "") {
			$m_query = $this->model_login->m_login($username, $password);
			$patchData 	= $m_query->result_array();
			$countData 	= $m_query->num_rows();

			if ($countData > 0) {
				$USERID 	= "";
				$USERNAME 	= "";
				$PASSWORD 	= "";

				foreach ($patchData as $row) {
					$USERID 	= $row['USERID'];
					$USERNAME 	= $row['USERNAME'];
					$NAMA_USER 	= $row['NAMA_USER'];
					$PASSWORD 	= $row['PASSWORD'];
				}

				$this->session->set_userdata('SIKABUNGAH_USERID', $USERID);
				$this->session->set_userdata('SIKABUNGAH_USERNAME', $USERNAME);
				$this->session->set_userdata('SIKABUNGAH_NAMA_USER', $NAMA_USER);
				$this->session->set_userdata('SIKABUNGAH_PASSWORD', $PASSWORD);
				$this->session->set_userdata('SIKABUNGAH_STATUS', "LOGIN");

				$data = array('status' => 1, 'message' => 'OK');
			}
			else {
				$data = array('status' => 0, 'message' => 'Username dan Password Anda tidak terdaftar!');
			}
		}
		else {
			$data = array('status' => 0, 'message' => 'Username dan Password tidak boleh kosong!');
		}

		echo json_encode($data);
	}

	public function logout() {
		$this->session->sess_destroy();

		redirect(base_url('login'));
	}
}
