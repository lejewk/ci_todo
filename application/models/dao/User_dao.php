<?php

/**
 * Created by IntelliJ IDEA.
 * User: Lee-jaewook
 * Date: 2017-07-02
 * Time: 오후 1:56
 */
class User_dao extends CI_Model {
	public function __construct() {
		parent::__construct();
	}

	public function findByUsername($username) {
		$this->db->flush_cache();

		$query = $this->db
			->select(array('id', 'username'))
		 	->get_where(
				'user',
				array(
					'username' => $username
				)
			);

		return $query->row();
	}

	public function findByUsernameAndPassword($username, $password) {
		$this->db->flush_cache();

		$query = $this->db
			->select(array('id', 'username'))
			->get_where(
				'user',
				array(
					'username' => $username,
					'password' => $password
				)
			);

		return $query->row();
	}

	public function insert($username, $password, $ip_address) {
		$this->db->flush_cache();

		$insertData = array(
			'username' => $username,
			'password' => $password,
			'ip_address' => $ip_address
		);
		$this->db->insert('user', $insertData);
	}
}
