<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class Welcome extends CI_Controller {

	
	public function index()
	{
		$this->load->spark('Twiggy/0.8.5');
		$this->load->helper('url'); // load the CodeIgniter URL helper
		// map the base_url() function as a Twig function 
		$this->twiggy->register_function('base_url'); 
		//$this->load->view('header');
		//$this->load->view('container');
		//$this->load->view('footer');
		$this->twiggy->display();
	}
}
