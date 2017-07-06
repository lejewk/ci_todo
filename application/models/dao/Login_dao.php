<?php

/**
 * Created by IntelliJ IDEA.
 * User: Lee-jaewook
 * Date: 2017-07-06
 * Time: 오전 11:31
 */

class Login_dao extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function insert($user, $ip_address) {
		$this->db->flush_cache();

		$insertData = array(
			'user_id' => $user->id,
			'ip_address' => $ip_address
		);
		$this->db->insert('login', $insertData);
	}
}
