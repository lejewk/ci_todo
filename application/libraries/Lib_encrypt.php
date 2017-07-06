<?php
defined('BASEPATH') OR exit('No direct script access allowed');
/**
 * Created by IntelliJ IDEA.
 * User: Lee-jaewook
 * Date: 2017-07-06
 * Time: 오후 12:19
 */
class Lib_encrypt {
	protected $CI = null;

	public function __construct() {
		$this->CI =& get_instance();
	}

	public function passwordEncode($password) {
		$encryptionKey = $this->CI->config->item('encryption_key');
		$encodedPassword = hash_hmac('sha512', $password, $encryptionKey);
		return $encodedPassword;
	}
}
