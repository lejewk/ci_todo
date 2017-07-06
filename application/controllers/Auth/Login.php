<?php

/**
 * Created by IntelliJ IDEA.
 * User: Lee-jaewook
 * Date: 2017-07-01
 * Time: 오후 8:18
 */

/**
 * Class Login
 * @property Login_service $login_service
 */
class Login extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('services/login_service');
	}

	public function index() {
        $this->load->view('templates/header');
        $this->load->view("pages/auth/login");
        $this->load->view('templates/footer');
    }

    public function action() {
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');

		$result = false;
		// 폼검증 및 가입처리
		if ($this->form_validation->run() === true) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$ip_address = $this->input->ip_address();

			$result = $this->login_service->login(
				$username,
				$password,
				$ip_address
			);
		}

		if ($result === false) {
			$data['myError'] = '계정이 없음.';

			$this->load->view('templates/header');
			$this->load->view("pages/auth/login");
			$this->load->view('templates/footer');
		} else {
			$this->load->helper('url');
			redirect('/');
		}
    }
}
