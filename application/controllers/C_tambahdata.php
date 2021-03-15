<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_tambahdata extends CI_Controller {

	public function __construct(){

		parent::__construct();
		$this->load->helper(array('form','url'));
		
	}

	public function index()
	{
		$this->load->view('welcome_message');
	}
}
