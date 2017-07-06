<?php

/**
 * Created by IntelliJ IDEA.
 * User: Lee-jaewook
 * Date: 2017-07-01
 * Time: 오후 8:18
 */

/**
 * Class Logout
 * @property Session_service $session_service
 */
class Logout extends CI_Controller {
	public function __construct() {
		parent::__construct();

		$this->load->model('services/session_service');
	}

	public function action() {
		$this->session_service->userLogout();
		$this->load->helper('url');

		redirect('/');
	}
}
