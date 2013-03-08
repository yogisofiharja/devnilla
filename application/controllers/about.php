<?php if ( ! defined('BASEPATH')) exit('No direct script access allowed');

class About extends CI_Controller {

	public function index()
	{
			$this->load->spark('Twiggy/0.8.5');
			$this->load->helper('url'); // load the CodeIgniter URL helper
			// map the base_url() function as a Twig function
			$this->twiggy->register_function('base_url');
			$this->twiggy->template('home')->display();
			//$this->twiggy->display();
	}
}
