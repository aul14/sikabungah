<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Home extends CI_Controller {
	public function index() {
		if($this->session->userdata("SIKABUNGAH_STATUS") == "LOGIN") {
			$data = array(
				"login_name" => $this->session->userdata('SIKABUNGAH_NAMA_USER')
			);

			$this->load->view('home', $data);
		}
		else {
			redirect(base_url('login'));
		}
	}
}
