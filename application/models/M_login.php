<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class M_login extends CI_Model {

	

	function login($username,$password){
		$query = $this->db->query("SELECT * FROM users WHERE username='$username' AND password='$password'");
		return $query;

	}

	


}