<?php

/**
 * Created by IntelliJ IDEA.
 * User: Lee-jaewook
 * Date: 2017-07-06
 * Time: 오전 11:34
 */

/**
 * @property User_dao $user_dao
 * @property Lib_encrypt $lib_encrypt
 * @property Session_service $session_service
 * @property Login_dao $login_dao
 */
class Login_service extends CI_Model {
	public function __construct() {
		parent::__construct();

		$this->load->library('lib_encrypt');
		$this->load->model('dao/user_dao');
		$this->load->model('dao/login_dao');
		$this->load->model('services/session_service');
	}

	public function login($username, $password, $ip_address) {
		$user = $this->user_dao->findByUsernameAndPassword(
			$username,
			$this->lib_encrypt->passwordEncode($password)
		);

		if ($user !== null) {
			// 로그 기록
			$this->login_dao->insert($user, $ip_address);

			// 세션 등록
			$this->session_service->userLogin($user);

			return true;
		} else {
			return false;
		}
	}
}
