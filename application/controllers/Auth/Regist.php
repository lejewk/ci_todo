<?php

/**
 * Created by IntelliJ IDEA.
 * User: Lee-jaewook
 * Date: 2017-07-01
 * Time: 오후 8:18
 */

/**
 * Class Regist
 * @property Regist_service $regist_service
 * @property User_dao $user_dao
 * @property Login_service $login_service
 */
class Regist extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->library('form_validation');
		$this->load->model('services/regist_service');
		$this->load->model('services/login_service');
		$this->load->model('dao/user_dao');
	}

	public function index() {
		$this->load->helper(array('form'));

		$this->load->view('templates/header');
		$this->load->view("pages/auth/regist");
		$this->load->view('templates/footer');
	}

	public function action() {
		$this->form_validation->set_rules('username', 'Username', 'required');
		$this->form_validation->set_rules('password', 'Password', 'required');
		$this->form_validation->set_rules('passconf', 'Password Confirmation', 'required|matches[password]');

		$result = false;
		$data = array();

		// 폼검증 및 가입처리
		if ($this->form_validation->run() === true) {
			$username = $this->input->post('username');
			$password = $this->input->post('password');
			$ip_address = $this->input->ip_address();

			$result = $this->regist_service->regist(
				$username,
				$password,
				$ip_address
			);

			if ($result === false) {
				$data['myError'] = '계정이 이미 존재함.';
			}
		}

		//로그인처리
		if ($result === true) {
			$this->login_service->login($username, $password, $ip_address);
		}

		if ($result === false) {
			$this->load->view('templates/header');
			$this->load->view("pages/auth/regist", $data);
			$this->load->view('templates/footer');
		} else {
			$this->load->helper('url');
			redirect('/');
		}
	}
}
