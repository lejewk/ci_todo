<?php

/**
 * Created by IntelliJ IDEA.
 * User: Lee-jaewook
 * Date: 2017-07-02
 * Time: 오후 2:11
 */

/**
 * Class Regist_service
 * @property Lib_encrypt $lib_encrypt
 * @property User_dao $user_dao
 */
class Regist_service extends CI_Model {
	public function __construct() {
		parent::__construct();

		$this->load->library('lib_encrypt');
		$this->load->model('dao/user_dao');
	}

	public function regist($username, $password, $ip_address) {
		return $this->user_dao->insert(
			$username,
			$this->lib_encrypt->passwordEncode($password),
			$ip_address
		);
	}
}
