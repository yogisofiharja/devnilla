<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends MX_Controller {

	
	public function index()
	{
		$this->load->view('header');
		$this->load->view('container');
		$this->load->view('footer');
	}
}
