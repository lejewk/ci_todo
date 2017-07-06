<?php

/**
 * Created by IntelliJ IDEA.
 * User: Lee-jaewook
 * Date: 2017-07-06
 * Time: 오후 12:55
 */
class Session_service extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function userLogin($user) {
		$sessionData = array(
			'user' => array(
				'id' => $user->id,
				'username' => $user->username
			)
		);

		$this->session->set_userdata($sessionData);
	}

	public function userLogout() {
		$this->session->unset_userdata('user');
	}
}
