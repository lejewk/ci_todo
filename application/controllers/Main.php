<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Main extends CI_Controller {
	public function index() {
		$user = $this->session->userdata('user');
		$test = $this->session->userdata('test');
		$this->load->view('templates/header', array('user' => $user));
		$this->load->view('pages/dashboard/dashboard');
		$this->load->view('templates/footer');
	}
}
